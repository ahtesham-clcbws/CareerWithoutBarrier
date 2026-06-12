<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }
        .header-table {
            width: 100%;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        .logo {
            text-align: center;
        }
        .title {
            font-size: 18px;
            font-weight: bold;
        }
        .timestamp {
            text-align: right;
            font-size: 11px;
            color: #555;
        }
        .columns-container {
            width: 100%;
        }
        .column-td {
            width: 48%;
            vertical-align: top;
        }
        .spacer-td {
            width: 4%;
        }
        .coupon-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        .coupon-table th, .coupon-table td {
            border: 1px solid #ccc;
            padding: 6px 8px;
            text-align: left;
        }
        .coupon-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <table class="header-table">
        <tr>
            <td class="title">Discount Coupons List</td>
            <td class="logo">
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('/upload/main-logo.jpeg'))) }}" style="height: 40px;">
            </td>
            <td class="timestamp">Printed on:<br>{{ date('d/m/Y h:i A') }}</td>
        </tr>
    </table>

    @if(isset($isLimited) && $isLimited)
        <div style="background-color: #fcf8e3; color: #8a6d3b; border: 1px solid #faebcc; padding: 8px; margin-bottom: 15px; font-size: 11px; text-align: center; border-radius: 4px;">
            <strong>Notice:</strong> Displaying Batch {{ $batch }} ({{ ($batch - 1) * $perBatch + 1 }} - {{ min($batch * $perBatch, $totalCount) }}) of {{ $totalCount }} total filtered coupons.
        </div>
    @endif

    <table class="coupon-table" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="width: 4%;">#</th>
                <th style="width: 15%;">Prefix</th>
                <th style="width: 23%;">Coupon Code</th>
                <th style="width: 8%;">Value</th>
                
                <th style="width: 2%; border: none; background: none;"></th> <!-- Spacer -->
                
                <th style="width: 4%;">#</th>
                <th style="width: 15%;">Prefix</th>
                <th style="width: 23%;">Coupon Code</th>
                <th style="width: 8%;">Value</th>
            </tr>
        </thead>
        <tbody>
            @php
                $leftCount = $leftCoupons->count();
                $rightCount = $rightCoupons->count();
                $maxRows = max($leftCount, $rightCount);
            @endphp
            @for($i = 0; $i < $maxRows; $i++)
                <tr>
                    @if($i < $leftCount)
                        @php $coupon = $leftCoupons[$i]; @endphp
                        <td>{{ ($batch - 1) * $perBatch + $i + 1 }}</td>
                        <td>{{ $coupon->prefix }}</td>
                        <td style="font-family: monospace; font-size: 13px; font-weight: bold;">{{ $coupon->couponcode }}</td>
                        <td>{{ $coupon->value }} {{ $coupon->valueType == 'amount' ? 'Rs.' : '%' }}</td>
                    @else
                        <td colspan="4" style="border: none;"></td>
                    @endif
                    
                    <td style="border: none; background: none;"></td> <!-- Spacer -->
                    
                    @if($i < $rightCount)
                        @php $coupon = $rightCoupons[$i]; @endphp
                        <td>{{ ($batch - 1) * $perBatch + $half + $i + 1 }}</td>
                        <td>{{ $coupon->prefix }}</td>
                        <td style="font-family: monospace; font-size: 13px; font-weight: bold;">{{ $coupon->couponcode }}</td>
                        <td>{{ $coupon->value }} {{ $coupon->valueType == 'amount' ? 'Rs.' : '%' }}</td>
                    @else
                        <td colspan="4" style="border: none;"></td>
                    @endif
                </tr>
            @endfor
        </tbody>
    </table>
</body>
</html>
