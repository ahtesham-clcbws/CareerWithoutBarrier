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
        Discount Voucher Details:
    </h3>
    <div class="row">
        <div class="col-lg-12 col-md-12 col" style="margin-left: auto;margin-right:auto">

            <div class="container boxShadow d-flex">
                <div class="d-flex flex-wrap gap-2 align-items-end headerGridBox" style="width: 100%;">
                    <div class="flex-fill">
                        <label for="couponCode">Coupon Code:</label>
                        <select class="form-select" id="couponCode" wire:model.live="selectedPrefix">
                            <option value="">All</option>
                            @foreach($prefixes as $value)
                            <option value="{{$value}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-fill">
                        <label for="couponInstitutes">Institutes:</label>
                        <select class="form-select" id="couponInstitutes" wire:model.live="selectedInstitute">
                            <option value="">All</option>
                            @foreach ($institutes as $institute)
                            <option value="{{ $institute->id }}">{{ $institute->institute_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-fill">
                        <label for="couponIssued">Issue Status:</label>
                        <select class="form-select" id="couponIssued" wire:model.live="selectedIssued">
                            <option value="">All</option>
                            <option value="issued">Issued only</option>
                            <option value="not-issued">Not-Issued</option>
                        </select>
                    </div>
                    <div class="flex-fill">
                        <label for="couponStatuses">Status:</label>
                        <select class="form-select" id="couponStatuses" wire:model.live="selectedStatus">
                            <option value="">All</option>
                            <option value="active">Active only</option>
                            <option value="inactive">Inactive only</option>
                            <option value="applied">Applied only</option>
                        </select>
                    </div>
                    <div class="flex-fill">
                        <label for="couponValues">Value:</label>
                        <select class="form-select" id="couponValues" wire:model.live="selectedValue">
                            <option value="">All</option>
                            @foreach($values as $value)
                            <option value="{{$value}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-fill">
                        <label for="couponValueTypes">Value type:</label>
                        <select class="form-select" id="couponValueTypes" wire:model.live="selectedValueType">
                            <option value="">All</option>
                            <option value="amount">Amount</option>
                            <option value="percentage">Percentage</option>
                        </select>
                    </div>
                    @if (!empty(trim($selectedPrefix)) || !empty(trim($selectedIssued)) || !empty(trim($selectedStatus)) || !empty(trim($selectedValue)) || !empty(trim($selectedValueType)))
                    <div class="flex-fill">
                        <!-- <label>&nbsp;</label><br /> -->
                        <button class="btn btn-danger w-100" wire:click="resetFilters"><i class="bi bi-arrow-clockwise"></i> Reset</button>
                    </div>
                    @endif

                </div>
            </div>
            <!-- datatablecl -->
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
                            <th class="sortHead" data-type="prefix">
                                <span>Prefix</span>
                                <span type="button" class="<?= $sortType == 'prefix' ? '' : 'opacity-half' ?> d-none">
                                    @if ($sortType == 'prefix' && $sortDirection == 'asc')
                                    <i class="bi bi-sort-alpha-down"></i>
                                    @else
                                    <i class="bi bi-sort-alpha-up"></i>
                                    @endif
                                </span>
                            </th>
                            <th class="sortHead" data-type="name">
                                <span>Name</span>
                                <span type="button" class="<?= $sortType == 'name' ? '' : 'opacity-half' ?> d-none">
                                    @if ($sortType == 'name' && $sortDirection == 'asc')
                                    <i class="bi bi-sort-alpha-down"></i>
                                    @else
                                    <i class="bi bi-sort-alpha-up"></i>
                                    @endif
                                </span>
                            </th>
                            <th class="sortHead" data-type="couponcode">
                                <span>Coupon Code</span>
                                <span type="button" class="<?= $sortType == 'couponcode' ? '' : 'opacity-half' ?> d-none">
                                    @if ($sortType == 'couponcode' && $sortDirection == 'asc')
                                    <i class="bi bi-sort-alpha-down"></i>
                                    @else
                                    <i class="bi bi-sort-alpha-up"></i>
                                    @endif
                                </span>
                            </th>
                            <th class="sortHead" data-type="issued">
                                <span>Issued to</span>
                                <span type="button" class="<?= $sortType == 'issued' ? '' : 'opacity-half' ?> d-none">
                                    @if ($sortType == 'issued' && $sortDirection == 'asc')
                                    <i class="bi bi-sort-alpha-down"></i>
                                    @else
                                    <i class="bi bi-sort-alpha-up"></i>
                                    @endif
                                </span>
                            </th>
                            <th class="sortHead" data-type="value">
                                <span>Value</span>
                                <span type="button" class="<?= $sortType == 'value' ? '' : 'opacity-half' ?> d-none">
                                    @if ($sortType == 'value' && $sortDirection == 'asc')
                                    <i class="bi bi-sort-alpha-down"></i>
                                    @else
                                    <i class="bi bi-sort-alpha-up"></i>
                                    @endif
                                </span>
                            </th>
                            <th class="sortHead" data-type="status">
                                <span>Status</span>
                                <span type="button" class="<?= $sortType == 'status' ? '' : 'opacity-half' ?> d-none">
                                    @if ($sortType == 'status' && $sortDirection == 'asc')
                                    <i class="bi bi-sort-alpha-down"></i>
                                    @else
                                    <i class="bi bi-sort-alpha-up"></i>
                                    @endif
                                </span>
                            </th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-striped table-striped-coupon">
                        @foreach ($coupons as $coupon)
                        <tr style="<?= $coupon->is_applied ? 'background-color: #2180614d;' : ($coupon->status ? '' : 'color: red;') ?>">
                            <td> <input type="checkbox" class="selectSingle" value="{{ $coupon->id }}" wire:model.live="selectedCupons" <?= $coupon->is_applied ? 'disabled' : '' ?>></td>
                            <td style="font-size: 13px">{{ $loop->index+1 }}</td>
                            <td style="font-size: 13px">{{ $coupon->prefix }}</td>
                            <td style="font-size: 13px">
                                {{ $coupon->name }}
                                @if (!empty(trim($coupon->description)))
                                <br /><small class="wrap">{{ $coupon->description }}</small>
                                @endif
                            </td>
                            <td style="font-size: 13px">{{ $coupon->couponcode }}</td>
                            <td style="font-size: 13px">{{ $coupon->corporate?->institute_name }}</td>
                            <td style="font-size: 13px">{{ $coupon->valueType == 'amount' ? '₹ ' : '' }}{{ $coupon->value }}{{ $coupon->valueType == 'amount' ? '' : '%' }}</td>
                            <td style="font-size: 13px">{{ $coupon->status ? ($coupon->is_applied ? 'Applied' : 'Active') : 'Inactive' }}</td>
                            <td class="text-end">
                                @if($coupon->status && !$coupon->is_applied)
                                <button type='button' class='btn btn-warning btn-sm' wire:click="statusChange({{ $coupon->id }}, false)">De-Activate</button>
                                @endif
                                @if(!$coupon->status)
                                <button type='button' class='btn btn-success btn-sm' wire:click="statusChange({{ $coupon->id }}, true)">Activate this</button>
                                @endif
                                @if(!$coupon->is_applied)
                                <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $coupon->id }})">Delete</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="">
                    {{ $coupons->onEachSide(3)->links('vendor.livewire.bootstrap') }}
                </div>
            </div>

        </div>
    </div>
</div>