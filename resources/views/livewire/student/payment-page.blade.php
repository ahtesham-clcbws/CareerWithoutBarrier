<div class="content admin-1" style="min-height: 100%;">
    <style>
        .d-block {
            color: inherit !important
        }
    </style>
    <div class="row corporate-cards" style="width: 50%;text-align: center;margin-left: 20%;padding-top:5%;margin-right: auto;">
        <div class="col-md-12 col-12" id="prodiv">
            <div class="card">
                <div class="card-header" style="background-color:#18c968 ; color: white;text-align:center;justify-content:center">
                    <div st>
                        <h6 style="color: #000;">Your Application no is: <b> {{$student->latestStudentCode?->application_code}}</b></h6>
                    </div>
                </div>
                <br>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="studentTable">
                                <tbody>
                                    <tr>
                                        <td colspan="2"><b>Name</b></td>
                                        <td class="information-txt" colspan="2">{{$student->name}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Mobile</b></td>
                                        <td class="information-txt" colspan="2">{{$student->mobile}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Email</b></td>
                                        <td class="information-txt" colspan="2">{{$student->email}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Refferell Code Provided By</b></td>
                                        <td class="information-txt" colspan="2">{{$student->latestStudentCode?->corporate_name ? $student->latestStudentCode?->corporate_name : 'SQS Foundation, Kanpur'}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Refferell Subscription Code</b></td>
                                        <td class="information-txt" colspan="2">{{$student->latestStudentCode?->coupan_code ?? '-'}}</td>
                                    </tr>


                                    <tr>
                                        <td colspan="2"><b>Fee Amount</b></td>
                                        <td class="information-txt" colspan="2">750 &#8377;</td>
                                    </tr>


                                    @if($student->latestStudentCode?->is_coupan_code_applied)
                                    @if ($calculateDiscountPercentage < 60)
                                        <tr>
                                        <td colspan="2"><b>Discount Amount</b></td>
                                        <td class="information-txt" colspan="2">
                                            {{ $student->latestStudentCode?->is_coupan_code_applied ? $student->latestStudentCode?->coupan_value : 'No'}}
                                            @if($student->latestStudentCode?->is_coupan_code_applied) &#8377; @endif
                                        </td>
                                        </tr>
                                        @endif
                                        @endif

                                        @if(($student->latestStudentCode?->is_coupan_code_applied && !$student->latestStudentCode?->is_paid && ($student->latestStudentCode?->fee_amount > 0)))
                                        <tr>
                                            <td colspan="2"><b>
                                                    {{ $calculateDiscountPercentage < 60 ? 'Final Payable Amount':'Final online Paid Amount' }}
                                                </b></td>
                                            <td class="information-txt" colspan="2">
                                                {{ $student->latestStudentCode?->fee_amount }} &#8377;
                                            </td>
                                        </tr>
                                        @elseif($student->latestStudentCode?->is_coupan_code_applied && $student->latestStudentCode?->fee_amount <= 0)
                                            <tr>
                                            <td colspan="2"><b>
                                                    {{ $calculateDiscountPercentage < 60 ? 'Final Payable Amount':'Final online Paid Amount' }}
                                                </b></td>
                                            <td class="information-txt" colspan="2">
                                                0 &#8377;
                                            </td>
                                            </tr>
                                            @endif
                                            @if( $student->latestStudentCode?->is_paid && $studentPayment?->payment_amount)
                                            <tr>
                                                <td colspan="2"><b>
                                                        {{ $calculateDiscountPercentage < 60 ? 'Final Payable Amount':'Final online Paid Amount' }}
                                                    </b></td>
                                                <td class="information-txt" colspan="2">
                                                    {!!$studentPayment?->payment_amount .' &#8377;' ?? 0 !!}
                                                </td>
                                            </tr>
                                            @endif
                                            @if(!$studentPayment && !$student->latestStudentCode?->is_paid && ($student->latestStudentCode?->is_coupan_code_applied ? ($student->latestStudentCode?->fee_amount > 0) : true) )
                                            <tr>
                                                <td class="text-center" colspan="4">
                                                    <button type="button" id="exampleModalCenterButton" class="bg-success btn-lg  btn text-white action-button" wire:click="$toggle('modalOpened')"><b>Pay Now</b></button>
                                                </td>
                                            </tr>
                                            @else
                                            <tr class="dn">
                                                <td colspan="4">
                                                    <button type="button" style="width: 5rem;height: 2rem;" class="btn btn-md btn-info" data-print="modal" onclick="PrintDoc()"> Print <i class="fa fa-print"></i></button>
                                                </td>
                                            </tr>
                                            @endif



                                            @if($studentPayment && $studentPayment->payment_status == 'success' )
                                            <tr>
                                                <table class="table table-response">
                                                    <thead>
                                                        <tr>
                                                            <th>Course Type</th>
                                                            <th>Course</th>
                                                            <th>Institute</th>
                                                            <th>Amount</th>
                                                            <th>Payment Order ID </th>
                                                            <th>Payment Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$studentPayment->course_type}}</td>
                                                            <td>{{$studentPayment->course_id}}</td>
                                                            <td>{{$studentPayment->institute_id}}</td>
                                                            <td>{{$studentPayment->payment_amount}}</td>
                                                            <td>{{$studentPayment->payment_order_id }}</td>
                                                            <td>{{ucfirst($studentPayment->payment_status)}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </tr>
                                            @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade @if($modalOpened) show d-block @endif" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form id="couponForm" action="{{route('student.paymentCreate')}}" method="get">
            @csrf
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div style="{{ $student->latestStudentCode?->is_coupan_code_applied ? 'margin-left: 16%;':'' }}">
                            <h6 class="modal-title" id="exampleModalLongTitle"> @if($student->latestStudentCode?->is_coupan_code_applied) Refferel Coupon is Applied Successfully @else Apply Coupon Code: @endif</h6>
                        </div>
                        <button type="button" class="close" wire:click="$toggle('modalOpened')">
                            <span aria-hidden="true"style="color:black;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center fee_amount-dv">
                            <p id="fee_amount" class="text-sucsess font-weight:20px;" style="margin-left: -45px;margin-bottom:0rem;" readonly>Fee Amount (Rs.) : 750</p>
                            @if($student->latestStudentCode?->is_coupan_code_applied)
                            <p class="text-danger fee_discount_amount" style="margin-left: -20px; margin-bottom:0rem;">Discount Amount (Rs.): -{{$student->latestStudentCode?->coupan_value}}</p>

                            <p id="payable_amount" style="font-weight:700; ">Final Payable Amount (Rs.): {{$student->latestStudentCode?->fee_amount}} </p>
                            @endif

                        </div>
                        <div class="modalLoader" id="reply-loader" wire:loading>
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status" style="width: 3rem; height: 3rem;">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>

                        <label for="coupan_code">Coupan code: </label>

                        <div class="input-group">
                            <input type="text" placeholder="Enter coupon code" class="form-control" wire:model="coupan_code"  {{ $coupan_code ? "readonly"  : ""}}>
                            <div class="input-group-append">
                                <button type="button" id="applyCoupon" wire:click="applyCoupon" class="btn btn-primary bg-success" style="display:{{$student->latestStudentCode?->is_coupan_code_applied ? 'none' : 'block'}};"">Apply Coupon</button>
                                <button type="button" id="removeCoupon" wire:click="removeCoupon" class="btn btn-primary text-danger" style="background: #fd0000;color: white !important;border: #f91818;{{$student->latestStudentCode?->is_coupan_code_applied ? 'display:block' : 'display:none'}}">Remove Coupon</button>
                            </div>
                        </div>

                        @error('coupan_code')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror

                    </div>
                    <div class="modal-footer justify-content-center" id="pay-now-btn-modal" style="display:block;text-align:center;">
                        @if ($student->latestStudentCode?->is_coupan_code_applied && intval($student->latestStudentCode?->fee_amount) <= 0)
                            <div style="display:block;text-align:center;">
                            <h6 style="font-weight:700;">Discount Coupon Provided By: {{$student->latestStudentCode?->corporate_name ? $student->latestStudentCode?->corporate_name : 'SQS Foundation, Kanpur'}}</h6>
                            <h6 style="font-weight:700;color:red;">100% Free</h6>
                        </div>
                        @elseif ($student->latestStudentCode?->is_coupan_code_applied && ($student->latestStudentCode?->fee_amount) > 0)
                        <div style="display:block;text-align:center;">
                            <h6 style="font-weight:700;">Discount Coupon Provided By: {{$student->latestStudentCode?->corporate_name ? $student->latestStudentCode?->corporate_name : 'SQS Foundation, Kanpur'}}</h6>
                        </div>
                        @endif
                        @if(!$student->latestStudentCode?->is_paid && ($student->latestStudentCode?->is_coupan_code_applied ? ($student->latestStudentCode?->fee_amount) > 0 : true))
                        <button type="submit" class="btn btn-primary">Pay Now</button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal-backdrop fade @if($modalOpened) show @else d-none @endif"></div>

</div>