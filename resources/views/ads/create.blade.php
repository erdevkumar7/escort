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
                            <form action="{{ route('admin.ads.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="item form-group p-2">
                                    {{-- Ads Name --}}
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="name">Advertise Name * </label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}"
                                            oninput="removeError('nameErr')">
                                        @error('name')
                                            <span class="text-danger" id="nameErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- time_duration --}}
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="time_duration">Time Duration (In-Days) * </label>
                                        <input type="text" id="time_duration" name="time_duration" class="form-control" value="{{old('time_duration')}}"
                                            oninput="removeError('time_durationErr')">
                                        @error('time_duration')
                                            <span class="text-danger" id="time_durationErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group p-2">
                                    {{-- Price --}}
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="price">Price (In-CHF) *</label>
                                        <input type="text" id="price" name="price" class="form-control" value="{{old('price')}}"
                                            oninput="removeError('priceErr')">
                                        @error('price')
                                            <span class="text-danger" id="priceErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- remark --}}
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="Remark">Remark</label>
                                        <input type="text" id="remark" name="remark" value="{{old('remark')}}" class="form-control"
                                            oninput="removeError('remarkErr')">
                                        @error('remark')
                                            <span class="text-danger" id="remarkErr">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="item form-group p-2">
                                    {{-- description --}}
                                    <div class="col-md-12 col-sm-12 ">
                                        <label for="description">Description *</label>
                                        <textarea class="form-control" id="description" name="description" oninput="removeError('descripErr')">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="text-danger" id="descripErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Submit --}}
                                <div class="item form-group">
                                    <div class="col-md-4 col-sm-4 offset-md-3">
                                        <a href="{{route('admin.allAds')}}"> <button class="btn btn-primary"
                                                type="button">Cancel</button></a>
                                        <button type="submit" class="btn btn-success">Submit</button>
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
