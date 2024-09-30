@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Update Canton</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <form>
                            <div class="item form-group">
                                {{-- name --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="name">Conton Name * </label>
                                    <input type="text" id="name" name="name" value="{{$canton->name}}"
                                        class="form-control" disabled>                                  
                                </div>
                                {{-- short_name --}}
                                <div class="col-md-4 col-sm-4 ">
                                    <label for="short_name">Short Name *</label>
                                    <input type="text" id="short_name" name="short_name"
                                        value="{{ $canton->short_name }}" class="form-control" disabled>                                
                                </div>

                                {{-- description --}}
                                <div class="col-md-4 col-sm-4">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" disabled>{{ $canton->description ?? "Not Avialable" }}</textarea>
                                </div>

                            </div>

                            {{-- submit --}}
                            {{-- <div class="item form-group">
                                <div class="col-md-4 col-sm-4 offset-md-4 mt-3">
                                    <a href="{{route('admin.getAllCanton')}}"> <button class="btn btn-primary" type="button">Cancel</button></a>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- /page content -->
@endsection
