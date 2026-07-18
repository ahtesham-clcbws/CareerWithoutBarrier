<div>
    <div class="row">
        <h5>
            <div class="panel-heading py-3">Direct Coupon Allotment:</div>
        </h5>
    </div>
    <div class="row">
        <div class="col-md-8 col-lg-8 col" style="margin-left: auto; margin-right: auto;">
            <div class="panel panel-default m-t-15">
                <div class="panel-body">
                    <div class="card alert">
                        <div class="card-body">
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form wire:submit.prevent="allot">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <p class="text-dark m-b-15 f-s-12">Select Institute/Corporate<span class="text-danger">*</span></p>
                                            <select wire:model="corporate_id" class="form-control">
                                                <option value="">-- Choose Institute --</option>
                                                @foreach($corporates as $corp)
                                                    <option value="{{ $corp->id }}">
                                                        {{ $corp->institute_name ?: $corp->name }} ({{ $corp->email }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('corporate_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 m-t-15">
                                        <div class="form-group">
                                            <p class="text-dark m-b-15 f-s-12">Paste Coupon Codes<span class="text-danger">*</span></p>
                                            <textarea wire:model="coupon_input" class="form-control input-focus" rows="6" placeholder="Paste codes here. You can separate them by newlines, commas, or spaces."></textarea>
                                            <small class="text-muted">Example: ABCD-EFGH-IJKL, WXYZ-1234-5678</small>
                                            @error('coupon_input')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-warning btn-flat m-b-10 m-l-5" wire:target="allot" wire:loading.attr="disabled">
                                            <span wire:target="allot" wire:loading.remove>Allot Coupons</span>
                                            <span wire:target="allot" wire:loading>Processing...</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($report)
        <div class="row m-t-25">
            <div class="col-md-10 col-lg-10 col" style="margin-left: auto; margin-right: auto;">
                <!-- Summary Section -->
                <div class="card alert alert-info">
                    <div class="card-body">
                        <h5>Allotment Summary for: <strong>{{ $summary['institute'] }}</strong></h5>
                        <div class="row m-t-15 text-center">
                            <div class="col-md-4">
                                <div class="p-10 bg-dark text-white rounded">
                                    <h3>{{ $summary['total'] }}</h3>
                                    <p class="m-0">Total Inputted</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-10 bg-success text-white rounded">
                                    <h3>{{ $summary['success'] }}</h3>
                                    <p class="m-0">Successfully Alloted</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-10 bg-danger text-white rounded">
                                    <h3>{{ $summary['failed'] }}</h3>
                                    <p class="m-0">Failed / Skipped</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Report Table -->
                <div class="panel panel-default m-t-15">
                    <div class="panel-heading">Allotment Report Details</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Coupon Code</th>
                                        <th>Status</th>
                                        <th>Reason / Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($report as $index => $row)
                                        <tr class="{{ $row['status'] == 'success' ? 'table-success' : 'table-danger' }}">
                                            <td>{{ $index + 1 }}</td>
                                            <td><strong>{{ $row['code'] }}</strong></td>
                                            <td>
                                                @if($row['status'] == 'success')
                                                    <span class="badge bg-success">Success</span>
                                                @else
                                                    <span class="badge bg-danger">Failed</span>
                                                @endif
                                            </td>
                                            <td>{{ $row['reason'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
