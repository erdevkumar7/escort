@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Create Advertise</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_content">
                            <br />
                            @if (session('success'))
                                <div>
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('admin.ads_edit_submit', $ads->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="item form-group p-2">
                                    {{-- Ads Name --}}
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="name">Advertise Name * </label>
                                        <input type="text" id="name" name="name" class="form-control" disabled
                                            value="{{ $ads->name }}">
                                    </div>
                                    {{-- time_duration --}}
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="time_duration">Time Duration (In-Days) * </label>
                                        <input type="text" id="time_duration" name="time_duration" class="form-control"
                                            value="{{ $ads->time_duration }}" disabled>
                                      
                                    </div>
                                </div>

                                <div class="item form-group p-2">
                                    {{-- Price --}}
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="price">Price (In-CHF) *</label>
                                        <input type="text" id="price" name="price" class="form-control"
                                            value="{{ $ads->price }}" disabled>                                       
                                    </div>
                                    {{-- remark --}}
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="Remark">Remark</label>
                                        <input type="text" id="remark" name="remark" class="form-control"
                                            value="{{ $ads->remark }}" disabled>
                                    </div>

                                </div>

                                <div class="item form-group p-2">
                                    {{-- description --}}
                                    <div class="col-md-12 col-sm-12 ">
                                        <label for="description">Description *</label>
                                        <textarea class="form-control" id="description" name="description" disabled>{{ $ads->description }}</textarea>                                       
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
