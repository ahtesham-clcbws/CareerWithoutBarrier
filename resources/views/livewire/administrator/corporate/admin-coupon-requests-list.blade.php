<div class="h-100">
    <style>
        .boxShadow {
            margin: 10px auto;
            background-color: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .coupons_table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #dee2e6;
        }

        .coupons_table td,
        .coupons_table th {
            padding: 2px;
            vertical-align: middle;
        }

        .coupons_table .sortHead {
            cursor: pointer;
            min-width: 100px;
        }

        .headerGridBox .flex-fill {
            min-width: 100px;
        }

        .opacity-half {
            opacity: 0.5;
        }
    </style>

    <h3 style="padding-top: 10px;padding-left: 10px;">
        Institutes Coupon Requests:
    </h3>
    <div class="row">
        <div class="col-lg-12 col-md-12 col" style="margin-left: auto;margin-right:auto">

            <div class="container boxShadow">

                <div class="d-flex justify-content-between mb-2">
                    <div class="d-flex flex-wrap gap-2 align-items-end">
                        @if (count($selectedCupons))
                        <div class="flex-fill"><button class="btn btn-danger" wire:click="deleteSelected">Delete Selected</button></div>
                        @endif
                        <div class="flex-fill">
                            <select class="form-select" id="showResutsPerPage" wire:model.live="perPage">
                                <option value="10">10 Results</option>
                                <option value="20">20 Results</option>
                                <option value="30">30 Results</option>
                                <option value="50">50 Results</option>
                                <option value="100">100 Results</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="flex-fill">
                            <input class="form-control" type="search" id="couponCodeSearch" wire:model.live="couponCodeSearch" placeholder="Coupon code search" />
                        </div>
                    </div>
                </div>

                <table class="table coupons_table" style="width:100%">
                    <thead class="thead-light">
                        <tr class="">
                            <th>
                                <input type="checkbox" id="selectAll" wire:model.live="selectAll">
                                <label for="selectAll" class="sr-only">Select All</label>
                            </th>
                            <th>#</th>
                            <th>
                                <span>Institute</span>
                            </th>
                            <th>
                                <span>Requested At</span>
                            </th>
                            <th>
                                <span>Status</span>
                            </th>
                            <th>
                                <span>Coupons List</span>
                            </th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-striped table-striped-coupon">
                        @if (count($coupons))
                        @foreach ($coupons as $coupon)
                        <tr style="<?= $coupon->status == 'completed' ? 'background-color: #2180614d;' : ($coupon->status == 'rejected' ? 'color: red;' : '') ?>">
                            <td> <input type="checkbox" class="selectSingle" value="{{ $coupon->id }}" wire:model.live="selectedCupons" <?= $coupon->status == 'completed' ? 'disabled' : '' ?>></td>

                            <td style="font-size: 13px">{{ $loop->index+1 }}</td>
                            <td style="font-size: 13px">{{ $coupon->corporate->institute_name }}</td>
                            <td style="font-size: 13px">
                                {{ $coupon->created_at->format('d-M-Y') }}
                            </td>
                            <td style="font-size: 13px">
                                    @if ($coupon->status == 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                    @elseif($coupon->status == 'completed')
                                    <span class="badge badge-success">Completed</span>
                                    @else
                                    <span class="badge badge-danger">Rejected</span>
                                    @if ($coupon->status == 'rejected' && $coupon->reject_reason)
                                    <br /><span>{{ $coupon->reject_reason }}</span>
                                    @endif
                                    @endif
                            </td>
                            <td style="font-size: 13px">
                                <a href="{{ route('institute.CoprporateCouponlists', $coupon->corporate_id) }}" class="">View list</a>
                            </td>
                            <td class="text-end">
                                @if($coupon->status == 'pending')
                                <a type='button' class='btn btn-success btn-sm' href="{{ route('institute.view',[$coupon->corporate]) }}">Allot</a>
                                <button type='button' class='btn btn-warning btn-sm' wire:click="rejectRequest({{ $coupon->id }}, false)">Reject</button>
                                @endif
                                <button type="button" class="btn btn-danger btn-sm" wire:confirm="Are you sure you want to delete this?" wire:click="delete({{ $coupon->id }})">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td rowspan="7" colspan="9" class="text-center py-5">
                                <h2>No results found</h2>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <div class="">
                    {{ $coupons->onEachSide(3)->links('vendor.livewire.bootstrap') }}
                </div>
            </div>

        </div>
    </div>
</div>