<div class="h-100 py-4">
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

    <div class="d-flex justify-content-between align-items-center container">
        <h3>Coupon Requests:</h3>
        <button class="btn btn-success" wire:click="createNewRequest">Add New Request</button>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col">

                <div class="container boxShadow">

                    <table class="table coupons_table datatablecl" style="width:100%">
                        <thead class="thead-light">
                            <tr class="">
                                <th>#</th>
                                <th>Status</th>
                                <th>Requested</th>
                                <th>Updated</th>
                            </tr>
                        </thead>
                        <tbody class="table-striped table-striped-coupon">
                            @foreach ($requestsList as $request)
                            <tr>
                                <td style="font-size: 13px">{{ $loop->index+1 }}</td>
                                <td style="font-size: 13px">
                                    @if ($request->status == 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                    @elseif($request->status == 'completed')
                                    <span class="badge badge-success">Completed</span>
                                    @else
                                    <span class="badge badge-danger">Rejected</span>
                                    @if ($request->status == 'rejected' && $request->reject_reason)
                                    <br /><span>{{ $request->reject_reason }}</span>
                                    @endif
                                    @endif
                                </td>
                                <td style="font-size: 13px">{{ date('d M, Y', strtotime($request->created_at)) }}</td>
                                <td style="font-size: 13px">{{ date('d M, Y', strtotime($request->updated_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>