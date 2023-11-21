@extends('layout.app')

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title font-weight-bold text-uppercase"> Edit Party </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- Start Form  -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!--Include alert file-->

                    <h4 class="header-title text-uppercase"> Basic Info</h4>
                    <hr>
                    <form class="needs-validation" method="post" >
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="party_type">Type</label>
                                    <select name="party_type" class="form-control border-bottom" id="party_type" placeholder="Please select Type">
                                        <option value="">Please select</option>
                                        <option value="client" selected>Client</option>
                                        <option value="vendor">Vendor</option>
                                        <option value="employee">Employee</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" name="full_name" class="form-control border-bottom" id="full_name" placeholder="Enter client's full name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="phone_no">Phone/Mobile Number</label>
                                    <input type="text" name="phone_no" class="form-control border-bottom" id="phone_no" placeholder="Enter phone/mobile number">
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control border-bottom" id="address" placeholder="Enter Address">
                                </div>
                            </div>
                        </div>
                    
                        <h4 class="header-title text-uppercase">Bank Details</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="account_holder_name">Account Holder Name</label>
                                    <input type="text" name="account_holder_name" class="form-control border-bottom" id="account_holder_name" placeholder="Enter Account Holder name">
                                </div>
                            </div>
                    
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="account_no">Account Number</label>
                                    <input type="text" name="account_no" class="form-control border-bottom" id="account_no" placeholder="Enter Account Number">
                                </div>
                            </div>
                    
                            <div class="col-md-4">
                                <div class form-group mb-3>
                                    <label for="bank_name">Bank Name</label>
                                    <input type="text" name="bank_name" class="form-control border-bottom" id="bank_name" placeholder="Enter Bank Name">
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="ifsc_code">IFSC Code</label>
                                    <input type="text" name="ifsc_code" class="form-control border-bottom" id="ifsc_code" placeholder="Enter IFSC Code">
                                </div>
                            </div>
                    
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="branch_address">Branch Address</label>
                                    <input type="text" name="branch_address" class="form-control border-bottom" id="branch_address" placeholder="Enter Branch Address">
                                </div>
                            </div>
                        </div>
                    
                        <br>
                    
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="manage-parties.php" class="btn btn-secondary">Cancel</a>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
