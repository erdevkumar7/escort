@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Add Badge</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_content">
                            <br />
                            <form>
                                <div class="item form-group p-2">
                                    {{-- Badge Name --}}
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="name">Badge Name * </label>
                                        <input type="text" class="form-control" value="{{ $badge->name }}" disabled>
                                    </div>
                                    {{-- how_is_it_applied --}}
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="how_is_it_applied">Applied * </label>
                                        <input type="text" class="form-control" value="{{ $badge->how_is_it_applied }}"
                                            disabled>
                                    </div>
                                </div>

                                <div class="item form-group p-2">
                                    {{-- hexa_color --}}
                                    <div class="col-md-6 col-sm-6 ">
                                        <label for="hexa_color">Hex Color *</label>
                                        <input type="text" class="form-control" value="{{ $badge->hexa_color }}"
                                            disabled>
                                    </div>
                                    {{-- icon --}}
                                    <div class="col-md-6 col-sm-6 " >
                                        <div><label for="icon"> Badge Icon *</label></div>
                                        <div style="text-align: center; padding:4px;  border: 1px solid #e9ecef">
                                        <img src="{{ asset('/images/badge_icons') . '/' . $badge->icon }}" alt="Icon"
                                            width="100px" height="100px">
                                        </div>
                                    </div>

                                </div>

                                <div class="item form-group p-2">
                                    {{-- description --}}
                                    <div class="col-md-12 col-sm-12 ">
                                        <label for="description">Description *</label>
                                        <textarea class="form-control" readonly>{{ $badge->description }}</textarea>
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
