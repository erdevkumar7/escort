@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>City Detail</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <form>
                            @csrf
                            <div class="item form-group">
                                {{-- name --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="name">City Name * </label>
                                    <input type="text" id="name" name="name" value="{{ $city->name }}"
                                        class="form-control" disabled>
                                </div>
                                {{-- short_name --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="canton">Canton *</label>
                                    <input type="text" value="{{ $city->canton->name }}" class="form-control" disabled>
                                </div>

                                {{-- description --}}
                                <div class="col-md-4 col-sm-4">
                                    <label for="description">Description(optional)</label>
                                    <textarea class="form-control" id="description" name="description" disabled>{{ $city->description ?? 'Not Available' }}</textarea>
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
