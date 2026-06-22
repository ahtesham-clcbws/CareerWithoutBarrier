<?php

namespace App\Imports;

use App\Models\CouponCode;
use App\Models\Corporate;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CouponsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Skip heading row
        $rows->shift();

        foreach ($rows as $row) {
            // Check if coupon code is present
            $couponCode = isset($row[4]) ? trim($row[4]) : null;
            if (empty($couponCode)) {
                continue;
            }

            // Check if coupon already exists
            $existing = CouponCode::where('couponcode', $couponCode)->first();
            if ($existing) {
                continue;
            }

            // Determine status and is_applied
            $statusText = isset($row[8]) ? trim(strtolower($row[8])) : 'active';
            $status = 1;
            $isApplied = 0;

            if ($statusText === 'inactive') {
                $status = 0;
            } elseif ($statusText === 'applied') {
                $isApplied = 1;
            }

            // Look up corporate_id from "Issued To" name
            $corporateId = null;
            $issuedTo = isset($row[5]) ? trim($row[5]) : '';
            if (!empty($issuedTo) && $issuedTo !== 'N/A') {
                $corporate = Corporate::where('institute_name', $issuedTo)->first();
                if ($corporate) {
                    $corporateId = $corporate->id;
                }
            }

            // Determine valueType
            $valueTypeText = isset($row[7]) ? trim(strtolower($row[7])) : 'amount';
            $valueType = ($valueTypeText === 'percentage') ? 'percentage' : 'amount';

            // Calculate length/digit (digits excluding hyphens)
            $cleanCode = str_replace('-', '', $couponCode);
            $digit = strlen($cleanCode);

            // Create new coupon record
            $coupon = new CouponCode();
            $coupon->prefix = isset($row[1]) ? trim($row[1]) : '';
            $coupon->name = isset($row[2]) ? trim($row[2]) : '';
            $coupon->description = isset($row[3]) ? trim($row[3]) : null;
            $coupon->couponcode = $couponCode;
            $coupon->corporate_id = $corporateId;
            $coupon->value = isset($row[6]) ? (float)$row[6] : 0.0;
            $coupon->valueType = $valueType;
            $coupon->digit = $digit;
            $coupon->status = $status;
            $coupon->is_applied = $isApplied;

            // Handle created_at date parsing if available
            $createdAtText = isset($row[9]) ? trim($row[9]) : null;
            if (!empty($createdAtText) && $createdAtText !== 'N/A') {
                try {
                    $coupon->created_at = \Carbon\Carbon::createFromFormat('d-m-Y h:i A', $createdAtText);
                } catch (\Throwable $e) {
                    // Fallback to current time if parsing fails
                    $coupon->created_at = now();
                }
            } else {
                $coupon->created_at = now();
            }
            $coupon->updated_at = now();

            $coupon->save();
        }
    }
}
