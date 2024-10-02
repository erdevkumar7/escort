@extends('user.layout-escort')
@section('auth_content')
    <div class="escort-profile">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link ms-0"
                    href="{{ route('escorts.dashboard', Auth::guard('escort')->user()->id) }}">Dashboard</a>
                <a class="nav-link" href="{{ route('escorts.profile', Auth::guard('escort')->user()->id) }}">Profile</a>
                <a class="nav-link active" href="#">My Pictures</a>
                <a class="nav-link " href="{{ route('escorts.myVideos', Auth::guard('escort')->user()->id) }}">My Videos</a>
            </nav>

            <div class="row escort-pictures">
                @foreach ($pictures as $picture)
                    <div class="col-lg-3 menu-item escort-image">
                        <!-- Delete Image Form-->
                        <span class="cross-escort-button">
                            <form
                                action="{{ route('escorts.deleteMedia', ['escort_id' => Auth::guard('escort')->user()->id, 'media_id' => $picture->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="name" value="{{ $picture->name }}">
                                <input type="hidden" name="type" value="image">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-xmark"></i></button>
                            </form>
                        </span>
                        <!-- Show images-->
                        <img src="{{ asset('/public/images/escorts_img/' . ($picture->name ?? 'escort_profile.png')) }}"
                            class="menu-img img-fluid" alt="Picture">
                    </div>
                @endforeach
                <!-- Add Image Form-->
                <form class="add-picture-form"
                    action="{{ route('escort.add.media.myPictures', Auth::guard('escort')->user()->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="col-lg-3 menu-item escort-add-more-pic">
                        <span onclick="document.getElementById('addImageInput').click();">
                            <img src="{{ asset('/public/images/static_img/add_more_pic1.png') }}" class="menu-img img-fluid"
                                alt="Add Image">
                            <p>Add More</p>
                        </span>
                        <input type="hidden" name="media_type_image" value="image">
                        <input type="file" id="addImageInput" accept="image/*" name="pictures[]" multiple
                            style="display: none;" onchange="this.form.submit()">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
