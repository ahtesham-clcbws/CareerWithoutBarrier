<div>
    {{-- Header Banner --}}
    <div class="w-100" style="margin-top:0;background-color:#f26b3c;">
        <div class="container py-4 py-md-5 text-center">
            <h3 class="text-white mb-0" style="font-size: clamp(16px, 2.5vw, 22px); font-weight: 800; line-height: 1.4;">
                Authorised Coaching Institutes, School/ Colleges, Trust/ Societies, Social Workers<br />
                <span style="font-size: 85%; opacity: 0.95;">For Free Form Distribution in Uttar Pradesh</span>
            </h3>
        </div>
    </div>

    <style>
        .small {
            font-size: 82%;
        }

        /* Controls Bar Styling */
        .cwb-controls-bar {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 20px;
        }

        @media (min-width: 992px) {
            .cwb-controls-bar {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
        }

        .cwb-filters-group {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
        }

        .cwb-search-box {
            width: 100%;
        }

        @media (min-width: 992px) {
            .cwb-search-box {
                width: 320px;
            }
        }

        /* Prevent style.css from breaking .input-group on mobile */
        .cwb-search-box .input-group .form-control {
            width: 1% !important;
            flex: 1 1 auto !important;
            border-radius: 6px 0 0 6px !important;
        }

        .cwb-search-box .input-group-append .input-group-text {
            border-radius: 0 6px 6px 0 !important;
            background: #ffffff;
            color: #64748b;
        }

        /* Table Card Container */
        .cwb-table-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            margin-bottom: 24px;
        }

        .cwb-table-card .table-responsive {
            margin-bottom: 0;
            border: none;
            -webkit-overflow-scrolling: touch;
        }

        #institutes-table {
            min-width: 860px;
            margin-bottom: 0;
        }

        #institutes-table thead th {
            background: #f8fafc;
            color: #0f172a;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.4px;
            text-transform: uppercase;
            border-bottom: 2px solid #e2e8f0;
            border-top: none;
            padding: 12px 14px;
            vertical-align: middle;
            white-space: nowrap;
        }

        #institutes-table tbody td {
            padding: 12px 14px;
            vertical-align: middle;
            border-color: #f1f5f9;
        }

        #institutes-table tbody tr:hover {
            background-color: #fafafa;
        }

        /* Swipe hint indicator */
        .cwb-scroll-hint {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f1f5f9;
            color: #475569;
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 12px;
            border: 1px dashed #cbd5e1;
        }

        /* View Toggle (Cards vs Table on Mobile) */
        .cwb-view-toggle {
            display: inline-flex;
            background: #e2e8f0;
            padding: 3px;
            border-radius: 8px;
            margin-bottom: 14px;
        }

        .cwb-view-toggle-btn {
            border: none;
            background: transparent;
            font-size: 12px;
            font-weight: 600;
            color: #475569;
            padding: 5px 12px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .cwb-view-toggle-btn.active {
            background: #ffffff;
            color: #0f172a;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        /* Mobile Card Style */
        .cwb-mobile-cards {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 24px;
        }

        .cwb-institute-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .cwb-card-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 10px;
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 10px;
        }

        .cwb-card-title-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cwb-card-index {
            width: 26px;
            height: 26px;
            background: #f1f5f9;
            color: #475569;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .cwb-card-name {
            font-size: 15px;
            font-weight: 700;
            color: #0284c7;
            margin: 0;
            line-height: 1.25;
        }

        .cwb-card-city-badge {
            background: #e0f2fe;
            color: #0369a1;
            font-size: 11px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 20px;
            white-space: nowrap;
        }

        .cwb-card-body {
            display: flex;
            flex-direction: column;
            gap: 8px;
            font-size: 13px;
            color: #334155;
        }

        .cwb-card-row {
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

        .cwb-card-row i {
            color: #64748b;
            margin-top: 3px;
            width: 14px;
            text-align: center;
            flex-shrink: 0;
        }

        .cwb-card-person {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .cwb-card-person img {
            width: 28px;
            height: 28px;
            border-radius: 6px;
            object-fit: cover;
        }

        .cwb-card-footer {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            border-top: 1px solid #f1f5f9;
            padding-top: 10px;
        }
    </style>

    <div class="container py-4 py-md-5">
        {{-- Filters and Search Bar --}}
        <div class="cwb-controls-bar">
            <div class="cwb-filters-group">
                @if (count($districts))
                    <div class="input-group mb-0" style="width: auto;">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="selectCity" style="font-size: 13px;">City</label>
                        </div>
                        <select class="custom-select" id="selectCity" wire:model.change="selectedDistrict" style="font-size: 13px;">
                            <option value='' selected>All Cities</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district['id'] }}">{{ $district['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="input-group mb-0" style="width: auto;">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="showEntries" style="font-size: 13px;">Show</label>
                    </div>
                    <select class="custom-select" id="showEntries" wire:model.change="entriesPerPage" style="font-size: 13px;">
                        @foreach ($entiresArray as $entry)
                            <option value="{{ $entry }}">{{ $entry == 0 ? 'All' : $entry }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="cwb-search-box">
                <div class="input-group mb-0">
                    <input class="form-control" type="text" aria-label="Search" placeholder="Search institute/school ..."
                        wire:model.live="search" style="font-size: 13px;">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Mobile View Toggle (Cards vs Table) --}}
        <div class="d-md-none d-flex justify-content-between align-items-center mb-2" id="cwbMobileViewControls">
            <div class="cwb-view-toggle">
                <button type="button" class="cwb-view-toggle-btn active" id="btnShowCards" onclick="switchCwbView('cards')">
                    <i class="fa fa-th-large mr-1"></i> Cards
                </button>
                <button type="button" class="cwb-view-toggle-btn" id="btnShowTable" onclick="switchCwbView('table')">
                    <i class="fa fa-table mr-1"></i> Table
                </button>
            </div>
            <span class="small text-muted font-weight-bold">
                {{ count($mainInstitutes) + count($institutes) }} Institutes
            </span>
        </div>

        {{-- Mobile Swipe Hint (visible only when Table is active on mobile) --}}
        <div class="cwb-scroll-hint d-none" id="cwbScrollHint">
            <span><i class="fa fa-arrows-h text-primary mr-1"></i> Scroll horizontally to view all columns</span>
            <span class="badge badge-secondary">7 Columns</span>
        </div>

        {{-- Mobile Cards View (Active by default on mobile) --}}
        <div class="cwb-mobile-cards d-md-none" id="cwbCardsContainer">
            @foreach ($mainInstitutes as $institute)
                <div class="cwb-institute-card">
                    <div class="cwb-card-header">
                        <div class="cwb-card-title-group">
                            <span class="cwb-card-index">{{ $loop->index + 1 }}</span>
                            <h4 class="cwb-card-name">{{ $institute->institute_name }}</h4>
                        </div>
                        <span class="cwb-card-city-badge">{{ $institute->district->name }}</span>
                    </div>

                    <div class="cwb-card-body">
                        <div class="cwb-card-row cwb-card-person">
                            <img src="{{ $institute->attachment }}" alt="{{ $institute->name }}">
                            <div>
                                <span class="text-muted small">Authorised Person:</span>
                                <div><strong>{{ $institute->name }}</strong></div>
                            </div>
                        </div>

                        @if ($institute->phone)
                            <div class="cwb-card-row">
                                <i class="fa fa-phone text-primary"></i>
                                <div>
                                    <a href="tel:{{ preg_replace('/[^0-9]/', '', $institute->phone) }}" class="text-dark font-weight-bold">
                                        {{ $institute->phone }}
                                    </a>
                                    @if ($institute->message)
                                        <div class="text-muted small">{{ $institute->message }}</div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if ($institute->address)
                            <div class="cwb-card-row">
                                <i class="fa fa-map-marker text-danger"></i>
                                <div>{{ $institute->address }}</div>
                            </div>
                        @endif
                    </div>

                    <div class="cwb-card-footer">
                        <div>
                            <span class="badge badge-success px-2 py-1">
                                <i class="fa fa-check mr-1"></i> 100% Free Coupon
                            </span>
                            <span class="text-danger small font-weight-bold ml-1">Limited</span>
                        </div>

                        @if ($institute->available_button)
                            <div>
                                <span class="badge badge-primary px-2 py-1">
                                    <i class="fa fa-check mr-1"></i> Upto 60%
                                </span>
                                <span class="text-success small font-weight-bold ml-1">Available</span>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach

            @foreach ($institutes as $institute)
                <div class="cwb-institute-card">
                    <div class="cwb-card-header">
                        <div class="cwb-card-title-group">
                            <span class="cwb-card-index">{{ $loop->index + 1 + count($mainInstitutes) }}</span>
                            <h4 class="cwb-card-name">{{ $institute->institute_name }}</h4>
                        </div>
                        @if ($institute->district && $institute->district->name)
                            <span class="cwb-card-city-badge">{{ $institute->district->name }}</span>
                        @endif
                    </div>

                    <div class="cwb-card-body">
                        <div class="cwb-card-row cwb-card-person">
                            <img src="{{ asset('/storage/' . $institute->attachment) }}" alt="{{ $institute->name }}">
                            <div>
                                <span class="text-muted small">Authorised Person:</span>
                                <div><strong>{{ $institute->name }}</strong></div>
                            </div>
                        </div>

                        @if ($institute->phone || $institute->email)
                            <div class="cwb-card-row">
                                <i class="fa fa-phone text-primary"></i>
                                <div>
                                    @if ($institute->phone)
                                        <a href="tel:{{ preg_replace('/[^0-9]/', '', $institute->phone) }}" class="text-dark font-weight-bold">
                                            {{ $institute->phone }}
                                        </a>
                                    @endif
                                    @if ($institute->email)
                                        <div class="text-muted small">{{ $institute->email }}</div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if ($institute->address)
                            <div class="cwb-card-row">
                                <i class="fa fa-map-marker text-danger"></i>
                                <div>{{ $institute->address }}{{ $institute->pincode ? ', ' . $institute->pincode : '' }}</div>
                            </div>
                        @endif
                    </div>

                    <div class="cwb-card-footer">
                        <div>
                            <span class="badge badge-success px-2 py-1">
                                <i class="fa fa-check mr-1"></i> 100% Free Coupon
                            </span>
                            <span class="text-danger small font-weight-bold ml-1">Limited</span>
                        </div>

                        <div>
                            <span class="badge badge-primary px-2 py-1">
                                <i class="fa fa-check mr-1"></i> Upto 60%
                            </span>
                            <span class="text-success small font-weight-bold ml-1">Available</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Desktop & Full Table View --}}
        <div class="cwb-table-card d-none d-md-block" id="cwbTableContainer">
            <div class="table-responsive">
                <table class="table table-bordered" id="institutes-table" style="line-height: 1.4;">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 45px; text-align: center;">#</th>
                            <th scope="col" style="width: 120px;">City/State</th>
                            <th scope="col" style="width: 150px;">Authorised Person</th>
                            <th scope="col" style="width: 240px;">Institute / School<br /><span class="small font-weight-normal text-muted">E-mail & Mobile</span></th>
                            <th scope="col" style="min-width: 170px;">Address</th>
                            <th scope="col" style="width: 140px; text-align: center;">100% Discount<br /><span class="small font-weight-normal text-muted">Coupon</span></th>
                            <th scope="col" style="width: 140px; text-align: center;">Other Discount<br /><span class="small font-weight-normal text-muted">Coupon</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mainInstitutes as $institute)
                            <tr>
                                <td class="small font-weight-bold text-center" style="color: #64748b;">{{ $loop->index + 1 }}</td>
                                <td class="small font-weight-bold text-primary">{{ $institute->district->name }}</td>
                                <td class="small">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded mr-2"
                                            src="{{ $institute->attachment }}"
                                            alt="{{ $institute->name }}" style="width: 32px; height: 32px; object-fit: cover;">
                                        <span class="text-dark font-weight-bold">{{ $institute->name }}</span>
                                    </div>
                                </td>
                                <td class="small">
                                    <span class="text-primary font-weight-bold" style="font-size: 13.5px;">{{ $institute->institute_name }}</span><br />
                                    <span class="text-dark">{{ $institute->phone }}</span><br />
                                    <small class="text-muted">{{ $institute->message }}</small>
                                </td>
                                <td class="small text-muted">{{ $institute->address }}</td>
                                <td class="text-center">
                                    <span class="badge badge-success px-2 py-1">100% Free <i class="fa fa-check"></i></span><br />
                                    <small class="text-danger font-weight-bold">Limited Forms</small>
                                </td>
                                <td class="text-center">
                                    @if ($institute->available_button)
                                        <span class="badge badge-primary px-2 py-1">Upto 60% <i class="fa fa-check"></i></span><br />
                                        <small class="text-success font-weight-bold">Available</small>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        @foreach ($institutes as $institute)
                            <tr>
                                <td class="small font-weight-bold text-center" style="color: #64748b;">{{ $loop->index + 1 + count($mainInstitutes) }}</td>
                                <td class="small font-weight-bold text-primary">{{ $institute->district && $institute->district->name ? $institute->district->name : '' }}</td>
                                <td class="small">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded mr-2"
                                            src="{{ asset('/storage/' . $institute->attachment) }}"
                                            alt="{{ $institute->name }}" style="width: 32px; height: 32px; object-fit: cover;">
                                        <span class="text-dark font-weight-bold">{{ $institute->name }}</span>
                                    </div>
                                </td>
                                <td class="small">
                                    <span class="text-primary font-weight-bold" style="font-size: 13.5px;">{{ $institute->institute_name }}</span><br />
                                    <span class="text-dark">{{ $institute->phone }}</span>
                                    @if ($institute->email)
                                        <br /><small class="text-muted">{{ $institute->email }}</small>
                                    @endif
                                </td>
                                <td class="small text-muted">{{ $institute->address }}{{ $institute->pincode ? ', ' . $institute->pincode : '' }}</td>
                                <td class="text-center">
                                    <span class="badge badge-success px-2 py-1">100% Free <i class="fa fa-check"></i></span><br />
                                    <small class="text-danger font-weight-bold">Limited</small>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-primary px-2 py-1">Upto 60% <i class="fa fa-check"></i></span><br />
                                    <small class="text-success font-weight-bold">Available</small>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if ($entriesPerPage > 0)
            <div class="d-flex justify-content-center mt-3">
                {{ $institutes->links() }}
            </div>
        @endif
    </div>

    <script>
        function switchCwbView(view) {
            var cards = document.getElementById('cwbCardsContainer');
            var table = document.getElementById('cwbTableContainer');
            var btnCards = document.getElementById('btnShowCards');
            var btnTable = document.getElementById('btnShowTable');
            var hint = document.getElementById('cwbScrollHint');

            if (view === 'cards') {
                if (cards) cards.classList.remove('d-none');
                if (table) {
                    table.classList.add('d-none');
                    table.classList.remove('d-block');
                }
                if (btnCards) btnCards.classList.add('active');
                if (btnTable) btnTable.classList.remove('active');
                if (hint) hint.classList.add('d-none');
            } else {
                if (cards) cards.classList.add('d-none');
                if (table) {
                    table.classList.remove('d-none');
                    table.classList.add('d-block');
                }
                if (btnCards) btnCards.classList.remove('active');
                if (btnTable) btnTable.classList.add('active');
                if (hint) hint.classList.remove('d-none');
            }
        }
    </script>
</div>
