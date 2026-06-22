<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\CouponCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CouponsExport;
use App\Imports\CouponsImport;

class CouponCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = CouponCode::paginate(10);
        return view('Admin.coupon.list');
    }

    public function filter(Request $request)
    {
        // Filter criteria
        $prefix = $request->input('prefix');
        $status = $request->input('status');

        // Query builder for coupon codes
        $query = CouponCode::query();

        // Apply filters if provided
        if ($prefix) {
            $query->where('prefix', 'like', '%' . $prefix . '%');
        }
        if ($status !== null) {
            $query->where('status', $status);
        }

        // Paginate the results
        $coupons = $query->paginate(10); // You can adjust the number of items per page as needed
        // Get distinct prefixes based on the filters applied


        // return view('Admin.coupon.list', compact('coupons'));
        return view('administrator.dashboard.coupon_list', compact('coupons'));
    }

    public function lists(Request $request)
    {
        // $coupons = CouponCode::orderByDesc('created_at')->where('status', 1)->with('corporate')->get();
        $coupons = CouponCode::orderByDesc('created_at')->where('status', 1)->with('corporate')->paginate(10);

        $counts = '';
        $appliedCount = '';
        $prefix = '';
        $codeValue = '';
        $issuedCount = '';

        if ($request->method() == 'POST') {
            $name = $request->input('name');

            $filteredCoupons = $coupons->where('prefix', $name);

            $counts = $filteredCoupons->count();

            $appliedCount = $filteredCoupons->where('is_applied', 1)->count();

            $issuedCount = $filteredCoupons->where('is_issued', 1)->count();

            $codeType = $filteredCoupons->first()?->valueType;

            $prefix = $filteredCoupons->first()?->prefix;

            $codeValue = $filteredCoupons->first()?->value;

            $codeValue = $codeValue ? $codeValue . '  ' . ($codeType == 'amount' ? 'Rs.' : '%') : '';

            return response()->json(['issuedCount' => $issuedCount, 'coupons' => $filteredCoupons, 'counts' => $counts, 'appliedCount' => $appliedCount, 'codeValue' => $codeValue, 'prefix' => $prefix]);
        }
        // $counts = $coupons->count();

        // $appliedCount = $coupons->where('is_applied', 1)->count();

        // return print_r($coupons->toArray());

        return view('administrator.dashboard.coupon_list', compact('issuedCount', 'coupons', 'prefix', 'codeValue'));
    }

    public function saveCoupon(Request $request)
    {
   
        $request->validate([
            'prefix' => 'required | unique:coupon_codes',
            'name' => 'required|unique:coupon_codes',
            'number_of_coupons' => 'required|integer|min:1',
            'discount_type' => 'required',
            'discount_value' => 'required|numeric|min:0',
            'coupon_type' => 'nullable',
            'description' => 'nullable',
            'coupon_length' => 'nullable|integer|in:12,16',
        ]);
        // Generate coupon codes
        $prefix = $request->input('prefix');
        $coupon_type = $request->input('coupon_type') ?? null;
        $description = $request->input('description') ?? null;
        $length = $request->input('coupon_length') ? (int)$request->input('coupon_length') : 12;
        $value = $request->input('discount_value');
        $valueType = $request->input('discount_type');
        $name = $request->input('name');
        $numberOfCoupons = $request->input('number_of_coupons') ?? 1;

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
        while (count($generatedCodes) < $numberOfCoupons) {
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

            $needed = $numberOfCoupons - count($codesList);
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
                'name' => $name,
                'couponcode' => $couponCode,
                'coupon_type' => $coupon_type,
                'description' => $description,
                'prefix' => $prefix,
                'digit' => $length,
                'value' => $value,
                'valueType' => $valueType,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert coupon codes into the database
        DB::table('coupon_codes')->insert($coupons);

        return redirect()->route('coupon.lists')->with('success', 'Coupons added successfully.');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function createCoupon()
    {
        return view('administrator.dashboard.geenrate_coupon_code');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CouponCode $couponCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CouponCode $couponCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CouponCode $couponCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CouponCode $couponCode)
    {
        //
    }

    public function printCoupons(Request $request)
    {
        $query = CouponCode::orderByDesc('created_at');

        if ($prefix = $request->input('prefix')) {
            $query->where('prefix', $prefix);
        }
        
        if ($status = $request->input('status')) {
            if ($status == 'active') {
                $query->where('status', 1)->where('is_applied', 0);
            } else if ($status == 'inactive') {
                $query->where('status', 0)->where('is_applied', 0);
            } else if ($status == 'applied') {
                $query->where('is_applied', 1);
            }
        }
        
        if ($issued = $request->input('issued')) {
            if ($issued == 'issued') {
                $query->whereNotNull('corporate_id');
            } else if ($issued == 'not-issued') {
                $query->whereNull('corporate_id');
            }
        }
        
        if ($value = $request->input('value')) {
            $query->where('value', $value);
        }
        
        if ($corporateId = $request->input('corporate_id')) {
            if ($corporateId == 'admin-only') {
                $query->whereNull('corporate_id');
            } else {
                $query->where('corporate_id', $corporateId);
            }
        }
        
        if ($valueType = $request->input('valueType')) {
            $query->where('valueType', $valueType);
        }
        
        if ($search = $request->input('search')) {
            $query->where('couponcode', 'LIKE', '%' . $search . '%');
        }

        $totalCount = $query->count();
        
        $batch = (int)$request->input('batch', 1);
        $perBatch = 500;
        
        if ($totalCount > $perBatch) {
            $query->skip(($batch - 1) * $perBatch)->take($perBatch);
            $isLimited = true;
        } else {
            $isLimited = false;
        }

        $coupons = $query->get();

        $half = (int)ceil($coupons->count() / 2);
        $leftCoupons = $coupons->slice(0, $half)->values();
        $rightCoupons = $coupons->slice($half)->values();

        $pdf = Pdf::loadView('administrator.download.print-coupons', compact('leftCoupons', 'rightCoupons', 'isLimited', 'totalCount', 'batch', 'perBatch', 'half'));
        
        return $pdf->stream('Coupons List on ' . date('d-m-Y His A') . '.pdf');
    }

    public function exportCoupons(Request $request)
    {
        $query = CouponCode::orderByDesc('created_at');

        if ($prefix = $request->input('prefix')) {
            $query->where('prefix', $prefix);
        }
        
        if ($status = $request->input('status')) {
            if ($status == 'active') {
                $query->where('status', 1)->where('is_applied', 0);
            } else if ($status == 'inactive') {
                $query->where('status', 0)->where('is_applied', 0);
            } else if ($status == 'applied') {
                $query->where('is_applied', 1);
            }
        }
        
        if ($issued = $request->input('issued')) {
            if ($issued == 'issued') {
                $query->whereNotNull('corporate_id');
            } else if ($issued == 'not-issued') {
                $query->whereNull('corporate_id');
            }
        }
        
        if ($value = $request->input('value')) {
            $query->where('value', $value);
        }
        
        if ($corporateId = $request->input('corporate_id')) {
            if ($corporateId == 'admin-only') {
                $query->whereNull('corporate_id');
            } else {
                $query->where('corporate_id', $corporateId);
            }
        }
        
        if ($valueType = $request->input('valueType')) {
            $query->where('valueType', $valueType);
        }
        
        if ($search = $request->input('search')) {
            $query->where('couponcode', 'LIKE', '%' . $search . '%');
        }

        $totalCount = $query->count();
        
        $batch = (int)$request->input('batch', 1);
        $perBatch = 500;
        
        if ($totalCount > $perBatch) {
            $query->skip(($batch - 1) * $perBatch)->take($perBatch);
        }

        $filename = 'Coupons_List_' . date('d-m-Y_H_i_s_A') . '.xlsx';
        return Excel::download(new CouponsExport($query), $filename);
    }

    public function importCoupons(Request $request)
    {
        $request->validate([
            'excel' => 'required|file|mimes:xlsx,xls,csv'
        ]);

        try {
            if ($request->hasFile('excel')) {
                Excel::import(new CouponsImport, $request->file('excel'));
                return redirect()->route('coupon.lists')->with('success', 'Coupons successfully restored/imported.');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Error importing Excel file: ' . $th->getMessage());
        }

        return redirect()->back()->withErrors('Please upload a valid file.');
    }
}
