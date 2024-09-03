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

            <div class="row escort-videos">
                @foreach ($videos as $vdo)
                    <div class="col-lg-3 menu-item escort-videos">
                        <!-- Delete video Form-->
                        <span class="escort-video-delete-from">
                            <form
                                action="{{ route('escorts.deleteMedia', ['escort_id' => Auth::guard('escort')->user()->id, 'media_id' => $vdo->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="name" value="{{ $vdo->name }}">
                                <input type="hidden" name="type" value="video">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-xmark"></i></button>
                            </form>
                        </span>
                        <!-- Show-Videos-->
                        <video controls>
                            <source src="{{ asset('/public/videos') . '/' . $vdo->name }}" type="video/mp4">
                        </video>
                    </div>
                @endforeach
                <!-- Add-Video Form -->
                <form class="add-video-form"
                    action="{{ route('escort.add.media.myVideos', Auth::guard('escort')->user()->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="col-lg-3 menu-item escort-add-more-videos">
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
            </div>
        </div>
    </div>
@endsection
