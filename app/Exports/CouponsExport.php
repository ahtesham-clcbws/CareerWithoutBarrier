<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CouponsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $query;
    protected $rowNumber = 1;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function collection()
    {
        // Execute the query with relationships loaded
        return $this->query->with('corporate')->get();
    }

    public function headings(): array
    {
        return [
            'Sr. No.',
            'Prefix',
            'Name',
            'Description',
            'Coupon Code',
            'Issued To',
            'Value',
            'Value Type',
            'Status',
            'Created At',
        ];
    }

    public function map($coupon): array
    {
        $statusStr = 'Inactive';
        if ($coupon->status) {
            $statusStr = $coupon->is_applied ? 'Applied' : 'Active';
        }

        return [
            $this->rowNumber++,
            $coupon->prefix,
            $coupon->name,
            $coupon->description,
            $coupon->couponcode,
            $coupon->corporate?->institute_name ?? 'N/A',
            $coupon->value,
            ucfirst($coupon->valueType),
            $statusStr,
            $coupon->created_at ? $coupon->created_at->format('d-m-Y h:i A') : 'N/A',
        ];
    }
}
