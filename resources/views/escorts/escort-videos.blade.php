@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Escort Videos</h3>
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
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf      
                                <div class="item form-group">
                                    <div class="col-md-12 col-sm-12 admin-escortVideos">
                                        @if ($videos)
                                            @foreach ($videos as $vdo)
                                                <video width="300" controls>
                                                    <source src="{{ asset('/public/videos') . '/' . $vdo->name }}"
                                                        type="video/mp4">
                                                </video>
                                            @endforeach
                                        @else
                                            <div></div>
                                        @endif
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
