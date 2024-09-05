@extends('layouts.master')

@section('title', 'Admin Panel')

@section('pagetype', 'Company Details')

@section('breadcrumb')
    <ol class="breadcrumb text-right">
        <li><a href="{{ route('course.category') }}">Classes</a></li>
        <li><a href="{{ route('course.category') }}">Company</a></li>
    </ol>
@endsection

@section('content')
    <form>
        @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Software Url</label>
                    <input type="text" class="form-control" name="softwareurl" placeholder="Software Url" value="#">
                </div>

            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" class="form-control" name="companyname" placeholder="Company Name" value="#">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Short Name</label>
                    <input type="text" class="form-control" name="shortname" placeholder="Short Name" value="#">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>CIN</label>
                    <input type="text" class="form-control" value="#" name="cin" placeholder="CIN">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>PAN</label>
                    <input type="text" class="form-control" value="#" name="pan" placeholder="PAN">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>TAN</label>
                    <input type="text" class="form-control" value="#" name="tan" placeholder="TAN">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>GST No.</label>
                    <input type="text" class="form-control" value="#" name="gst" placeholder="GST No.">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Company Category</label>
                    <select class="form-control" name="companycategory">
                        <option>Select</option>
                        <option>Company Category</option>
                        <option>Limited by Shares</option>
                        <option>Limited by Guarantee</option>
                        <option>Unlimited Company</option>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Company Class</label>
                    <select class="form-control" name="companyclass">
                        <option>Select</option>
                        <option>Company Class</option>
                        <option>Private Limited Company</option>
                        <option>One Person Private Limited Company</option>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Authorized Capital</label>
                    <input type="text" class="form-control" value="Authorized Capital" name="authorizedcapital"
                        placeholder="Authorized Capital">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Paid Up Capital</label>
                    <input type="text" class="form-control" value="Paid Up Capital" name="paidupcapital"
                        placeholder="Paid Up Capital">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Share Nominal Value</label>
                    <input type="text" class="form-control" value="Share Nominal Value" name="sharenominalvalue"
                        placeholder="Share Nominal Value">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>State of Registration</label>
                    <select class="form-control" name="stateofregistration">
                        <option>State</option>
                        <option>Andhra Pradesh</option>
                        <option>Arunachal Pradesh</option>
                        <option>Assam</option>
                        <option>Bihar</option>
                        <option>Chhattisgarh</option>
                        <option>Goa</option>
                        <option>Gujarat</option>
                        <option>Haryana</option>
                        <option>Himachal Pradesh</option>
                        <option>Jharkhand</option>
                        <option>Karnataka</option>
                        <option>Kerala</option>
                        <option>Madhya Pradesh</option>
                        <option>Maharashtra</option>
                        <option>Manipur</option>
                        <option>Meghalaya</option>
                        <option>Mizoram</option>
                        <option>Nagaland</option>
                        <option>Odisha</option>
                        <option>Punjab</option>
                        <option>Rajasthan</option>
                        <option>Sikkim</option>
                        <option>Tamil Nadu</option>
                        <option>Telangana</option>
                        <option>Tripura</option>
                        <option>Uttar Pradesh</option>
                        <option>Uttarakhand</option>
                        <option>West Bengal</option>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Incorporation Date</label>
                    <input type="date" class="form-control" value="Incorporation Date" name="incorporationdate"
                        placeholder="Share Nominal Value">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" value="Email" name="email" placeholder="Email">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Phone</label>
                    <input type="number" class="form-control" value="Phone" name="phone" placeholder="Phone">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Landline No.</label>
                    <input type="text" class="form-control" value="Landline No." name="landlineno"
                        placeholder="Landline No.">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="city" value="#" placeholder="City">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>State</label>
                    <select class="form-control" name="state">
                        <option>Select State</option>
                        <option>Andhra Pradesh</option>
                        <option>Arunachal Pradesh</option>
                        <option>Assam</option>
                        <option>Bihar</option>
                        <option>Chhattisgarh</option>
                        <option>Goa</option>
                        <option>Gujarat</option>
                        <option>Haryana</option>
                        <option>Himachal Pradesh</option>
                        <option>Jharkhand</option>
                        <option>Karnataka</option>
                        <option>Kerala</option>
                        <option>Madhya Pradesh</option>
                        <option>Maharashtra</option>
                        <option>Manipur</option>
                        <option>Meghalaya</option>
                        <option>Mizoram</option>
                        <option>Nagaland</option>
                        <option>Odisha</option>
                        <option>Punjab</option>
                        <option>Rajasthan</option>
                        <option>Sikkim</option>
                        <option>Tamil Nadu</option>
                        <option>Telangana</option>
                        <option>Tripura</option>
                        <option>Uttar Pradesh</option>
                        <option>Uttarakhand</option>
                        <option>West Bengal</option>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Pincode</label>
                    <input type="number" class="form-control" value="Pincode" name="pincode" placeholder="Pincode">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address">address</textarea>
                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label>About</label>
                    <textarea class="form-control" name="about">#</textarea>
                </div>
            </div>

        </div>
        <input type="submit" class="btn btn-sm btn-danger btn-sm" style="width: 100px" value="Update">
    </form>

    </div>
    </div>







    <!-- /.content -->
    </div>
@endsection
