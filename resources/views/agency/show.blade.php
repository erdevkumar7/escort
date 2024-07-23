@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Agency details</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_content">
                            <br />
                            <form>
                                {{-- Agency name --}}
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Agency name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="name" name="name" class="form-control "
                                            value="{{ $agency->name }}" readonly>
                                    </div>
                                </div>
                                {{-- Email --}}
                                <div class="item form-group">
                                    <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">email</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="{{ $agency->email }}" readonly>
                                    </div>
                                </div>
                                {{-- phone number --}}
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone_number">Phone
                                        Number<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            value="{{ $agency->phone_number }}" readonly>
                                    </div>
                                </div>
                                {{-- Address --}}
                                <div class="item form-group">
                                    <label for="address"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ $agency->address }}" readonly>
                                    </div>
                                </div>
                                {{-- Couter --}}
                                <div class="item form-group">
                                    <label for="counter"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Counter</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="number" class="form-control" id="counter" name="counter"
                                            value="{{ $agency->counter }}" readonly>
                                    </div>
                                </div>
                                {{-- View Escorts button --}}
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <a href=""><button class="btn btn-primary" type="button">View
                                                Escorts</button></a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
