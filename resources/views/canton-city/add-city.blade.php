@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Add New City</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <form action="{{ route('admin.addCityFormSubmit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="item form-group">
                                {{-- name --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="name">City Name * </label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                                        class="form-control" oninput="removeError('nameErr')">
                                    @error('name')
                                        <span class="text-danger" id="nameErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- short_name --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="canton">Canton *</label>
                                    <select class="form-control" id="canton" name="canton_id"
                                        oninput="removeError('cantonErr')">
                                        <option value="">Select Canton</option>
                                        @foreach ($allcanton as $canton)
                                            <option value="{{ $canton->id }}">{{ $canton->name }}({{$canton->short_name}})</option>
                                        @endforeach
                                    </select>
                                    @error('canton_id')
                                        <span class="text-danger" id="cantonErr">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- description --}}
                                <div class="col-md-4 col-sm-4">
                                    <label for="description">Description(optional)</label>
                                    <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                                </div>

                            </div>

                            {{-- submit --}}
                            <div class="item form-group">
                                <div class="col-md-4 col-sm-4 offset-md-4 mt-3">
                                    <a href=""> <button class="btn btn-primary" type="button">Cancel</button></a>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- /page content -->
@endsection
