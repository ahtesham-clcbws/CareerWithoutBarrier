<?php

namespace App\Livewire\Administrator\Dashboard;

use Illuminate\Support\Str;
use App\Models\CouponCode;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('administrator.layouts.master')]
class CreateCoupon extends Component
{
    public $prefix;
    public $name;
    public $coupon_type;
    public $discount_type;
    public $discount_value;
    public $number_of_coupons;
    public $description;
    public $coupon_length = 12;
    public $existingPrefixes = [];
    public $existingCouponsCount = 0;

    protected $rules = [
        'prefix' => 'required|alpha_num',
        'name' => 'required',
        'number_of_coupons' => 'required|integer|min:1',
        'discount_type' => 'required',
        'discount_value' => 'required|numeric|min:0',
        'coupon_type' => 'nullable',
        'description' => 'nullable',
        'coupon_length' => 'required|integer|in:12,16',
    ];

    public function mount()
    {
        $counts = CouponCode::select('prefix', DB::raw('count(*) as aggregate'))
            ->groupBy('prefix')
            ->pluck('aggregate', 'prefix');

        $this->existingPrefixes = CouponCode::orderByDesc('id')
            ->get(['prefix', 'name', 'coupon_type', 'valueType', 'value', 'description'])
            ->unique('prefix')
            ->whereNotNull('prefix')
            ->map(function ($item) use ($counts) {
                $item->count = $counts[$item->prefix] ?? 0;
                return $item;
            })
            ->keyBy('prefix')
            ->toArray();
    }

    public function updatedPrefix($value)
    {
        // Sanitize prefix: remove spaces and non-alphanumeric characters
        $sanitized = preg_replace('/[^a-zA-Z0-9]/', '', $value);
        if ($sanitized !== $value) {
            $this->prefix = $sanitized;
            $value = $sanitized;
        }

        if (isset($this->existingPrefixes[$value])) {
            $data = $this->existingPrefixes[$value];

            // Explicitly cast and handle nulls to ensure Livewire tracking
            $this->name = (string) ($data['name'] ?? '');
            $this->coupon_type = (string) ($data['coupon_type'] ?? '');
            $this->discount_type = (string) ($data['valueType'] ?? '');
            $this->discount_value = $data['value'] ?? 0;
            $this->description = (string) ($data['description'] ?? '');
            $this->existingCouponsCount = $data['count'] ?? 0;
        } else {
            $this->existingCouponsCount = 0;
        }
    }

    public function save()
    {
        $this->validate();

        $length = (int)$this->coupon_length;
        $coupons = [];
        $generatedCodes = [];
        $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789'; // Readable alphanumeric (excl I, O, 0, 1)

        $generateCode = function() use ($chars, $length) {
            $code = '';
            for ($j = 0; $j < $length; $j++) {
                if ($j > 0 && $j % 4 === 0) {
                    $code .= '-';
                }
                $code .= $chars[random_int(0, strlen($chars) - 1)];
            }
            return $code;
        };

        // Generate in-memory unique list
        while (count($generatedCodes) < $this->number_of_coupons) {
            $code = $generateCode();
            $generatedCodes[$code] = true;
        }

        $codesList = array_keys($generatedCodes);

        // Check duplicacy against DB in batch
        $existing = DB::table('coupon_codes')
            ->whereIn('couponcode', $codesList)
            ->pluck('couponcode')
            ->toArray();

        while (!empty($existing)) {
            $existingMap = array_flip($existing);
            $codesList = array_filter($codesList, function($code) use ($existingMap) {
                return !isset($existingMap[$code]);
            });

            $needed = $this->number_of_coupons - count($codesList);
            $newGenerated = [];
            while (count($newGenerated) < $needed) {
                $code = $generateCode();
                if (!in_array($code, $codesList) && !isset($newGenerated[$code])) {
                    $newGenerated[$code] = true;
                }
            }

            $codesList = array_merge($codesList, array_keys($newGenerated));

            $existing = DB::table('coupon_codes')
                ->whereIn('couponcode', array_keys($newGenerated))
                ->pluck('couponcode')
                ->toArray();
        }

        foreach ($codesList as $couponCode) {
            $coupons[] = [
                'name' => $this->name,
                'couponcode' => $couponCode,
                'coupon_type' => $this->coupon_type,
                'description' => $this->description,
                'prefix' => $this->prefix,
                'digit' => $length,
                'value' => $this->discount_value,
                'valueType' => $this->discount_type,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('coupon_codes')->insert($coupons);

        session()->flash('success', 'Coupons added successfully.');

        return redirect()->route('coupon.lists');
    }

    public function render()
    {
        return view('livewire.administrator.dashboard.create-coupon');
    }
}
