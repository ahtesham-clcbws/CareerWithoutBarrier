<div>
    <div class="w-100" style="margin-top:72px;background-color:#f26b3c;">
        <div class="container py-5 pb-4 text-center">
            <h2 class="text-white" style="font-size:32px">Institutes list</h2>
        </div>
    </div>
    <style>
        .small {
            font-size: 80%;
        }
    </style>
    <div class="container py-5">
        <div class="d-flex flex-column flex-lg-row justify-content-between">
            <div class="d-flex gap-2">
                <div class="input-group mb-3 w-auto">
                    @if (count($districts))
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="selectCity">Select city</label>
                        </div>
                        <select class="custom-select" id="selectCity" wire:model.change="selectedDistrict">
                            <option value='' selected>All Cities</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district['id'] }}">{{ $district['name'] }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
                <div class="input-group mb-3 ml-3 w-auto">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="showEntries">Show</label>
                    </div>
                    <select class="custom-select" id="showEntries" wire:model.change="entriesPerPage">
                        @foreach ($entiresArray as $entry)
                            <option value="{{ $entry }}">{{ $entry == 0 ? 'All' : $entry }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="input-group mb-3 w-auto">
                <input class="form-control" type="text" aria-label="Search" placeholder="Search institute/school ..."
                    wire:model.live="query">
                <div class="input-group-append">
                    <i class="input-group-text fa fa-search"></i>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table-bordered table" id="institutes-table" style="line-height: 1.4;">
                <thead>
                    <tr>
                        <th scope="col"><small class="font-weight-bold">#</small>
                        <th scope="col"><small class="font-weight-bold">City/State</small>
                        <th scope="col"><small class="font-weight-bold">Authorised person</small>
                        <th scope="col"><small class="font-weight-bold">Institute/School/Person<br />E-mail &
                                Mobile</small>
                        <th scope="col"><small class="font-weight-bold">Address</small>
                        <th scope="col"><small class="font-weight-bold">100% Discount<br />Coupon</small>
                        <th scope="col"><small class="font-weight-bold">Other Discount<br />Coupon</small>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="small">1</td>
                        <td class="small" style="color: #F26B3C;"><b>Uttar Pradesh</b></td>
                        <td class="small">
                            <div class="media text-muted d-flex flex-column">
                                {{-- <img
                                    data-src="{{ asset('/storage/'.$institute->attachment)}}"
                                    alt="{{ $institute->name }}"
                                    class="mr-2 rounded d-block"
                                    style="width: 32px; height: 32px;"
                                    src="{{ asset('/storage/'.$institute->attachment)}}"
                                    data-holder-rendered="true"> --}}
                                <b class="media-body lh-125 mb-0" style="border-bottom: 1px solid #dedede; color: #F26B3C;">
                                    Ashutosh Pathak</b>
                                <b class="media-body lh-125 mb-0" style="color: #F26B3C;">Shamendra Sharma</b>
                            </div>
                            {{-- <!-- {{ $institute->attachment }}<br /> --> --}}
                            {{-- <!-- {{ $institute->name }} --> --}}
                        </td>
                        <td class="small">
                            <b style="color: #F26B3C;">SQS Foundation</b><br />
                            sqscwb@gmail.com<br />
                            9336171302
                        </td>
                        <td class="small">Raipurwa, Kanpur Nagar, 208003</td>
                        <td colspan="2">
                            <span class="badge badge-success px-3 py-2">100% Free <i
                                    class="fa fa-check"></i></span><br />
                            <small class="text-danger font-weight-bold">Limited forms only</small>
                        </td>
                    </tr>
                    @foreach ($institutes as $institute)
                        <tr>
                            <td class="small">{{ $loop->index + 2 }}</td>
                            <td class="small text-primary">{{ $institute->district->name }}</td>
                            <td class="small">
                                <div class="media text-muted d-flex flex-column">
                                    <img class="d-block mr-2 rounded"
                                        data-src="{{ asset('/storage/' . $institute->attachment) }}"
                                        data-holder-rendered="true"
                                        src="{{ asset('/storage/' . $institute->attachment) }}"
                                        alt="{{ $institute->name }}" style="width: 32px; height: 32px;">
                                    <p class="media-body lh-125 text-primary mb-0">
                                        {{ $institute->name }}
                                    </p>
                                </div>
                                <!-- {{ $institute->attachment }}<br /> -->
                                <!-- {{ $institute->name }} -->
                            </td>
                            <td class="small">
                                <span class="text-primary">{{ $institute->institute_name }}</span><br />
                                {{ $institute->email }}<br />
                                {{ $institute->phone }}
                            </td>
                            <td class="small">{{ $institute->address }}, {{ $institute->pincode }}</td>
                            <td>
                                <small class="text-danger font-weight-bold">Limited</small><br />
                                <span class="badge badge-success px-3 py-2">100% Free <i class="fa fa-check"></i></span>
                            </td>
                            <td>
                                <small class="text-danger font-weight-bold">Available</small><br />
                                <span class="badge badge-primary px-3 py-2">Upto 60% <i class="fa fa-check"></i></span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($entriesPerPage > 0)
            <div class="">
                {{ $institutes->links() }}
            </div>
        @endif

    </div>
</div>
