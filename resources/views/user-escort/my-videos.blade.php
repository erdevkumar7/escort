@extends('user.layout-auth')
@section('auth_content')
    <div class="escort-profile">

        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link ms-0"
                    href="{{ route('escorts.dashboard', Auth::guard('escort')->user()->id) }}">Dashboard</a>
                <a class="nav-link" href="{{ route('escorts.profile', Auth::guard('escort')->user()->id) }}">Profile</a>
                <a class="nav-link" href="{{ route('escorts.myPictures', Auth::guard('escort')->user()->id) }}">My
                    Pictures</a>
                <a class="nav-link active" href="#">My Videos</a>
            </nav>
            <div class="row escort-pictures">
                @if (empty($videos))
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h4 class="no-videos">No Pictures Available</h4>
                        <div class="escort-no-videos">
                            <span onclick="document.getElementById('addImageInput').click();">
                                <img src="{{ asset('/public/images/static_img/add_more_video1.png') }}"
                                    class="menu-img img-fluid" alt="Add Image">
                                <p>Add More</p>
                            </span>
                            <!-- Hidden file input for adding images -->
                            <input type="file" id="addImageInput" accept="image/*" name="pictures[]" multiple
                                style="display: none;" onchange="this.form.submit()">
                        </div>
                    </form>
                @else
                    <form action="{{ route('escort.add.media.myVideos', Auth::guard('escort')->user()->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="escort-videos-and-addvideo">
                            @foreach ($videos as $vdo)
                                <video controls>
                                    <source src="{{ asset('/public/videos') . '/' . $vdo->name }}" type="video/mp4">
                                </video>
                            @endforeach

                            <span onclick="document.getElementById('addVideoInput').click();">
                                <img src="{{ asset('/public/images/static_img/add_more_video1.png') }}"
                                    class="menu-img img-fluid" alt="Add Image">
                                <p>Add More</p>
                            </span>
                            <input type="hidden" name="type" value="video">
                            <input type="file" id="addVideoInput" name="name[]" multiple style="display: none;"
                                onchange="this.form.submit()">
                        </div>

                    </form>
                @endif
            </div>

        </div>

    </div>
@endsection
