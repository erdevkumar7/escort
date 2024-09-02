@extends('user.layout-auth')
@section('auth_content')
    <div class="escort-profile">

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
                @if (empty($pictures))
                    <form action="{{ route('escort.add.media.myPictures', Auth::guard('escort')->user()->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <h4 class="no-pic">No Pictures Available</h4>

                        <div class="col-lg-3 menu-item escort-add-more-pic">
                            <span onclick="document.getElementById('addImageInput').click();">
                                <img src="{{ asset('/public/images/static_img/add_more_pic1.png') }}"
                                    class="menu-img img-fluid" alt="Add Image">
                                <p>Add More</p>
                            </span>
                            <input type="hidden" name="type" value="image">
                            <input type="file" id="addImageInput" accept="image/*" name="name[]" multiple
                                style="display: none;" onchange="this.form.submit()">
                        </div>
                    </form>
                @else
                    @foreach ($pictures as $picture)
                        <div class="col-lg-3 menu-item escort-image">
                            <span class="cross-escort-button">
                                <form
                                    action="{{ route('escorts.deleteMedia', ['escort_id' => Auth::guard('escort')->user()->id, 'media_id' => $picture->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="name" value="{{ $picture->name }}">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-xmark"></i></button>
                                </form>
                            </span>

                            <img src="{{ asset('/public/images/escorts_img/' . ($picture->name ?? 'escort_profile.png')) }}"
                                class="menu-img img-fluid" alt="Picture">
                        </div>
                    @endforeach


                    <form action="{{ route('escort.add.media.myPictures', Auth::guard('escort')->user()->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="col-lg-3 menu-item escort-add-more-pic">
                            <span onclick="document.getElementById('addImageInput').click();">
                                <img src="{{ asset('/public/images/static_img/add_more_pic1.png') }}"
                                    class="menu-img img-fluid" alt="Add Image">
                                <p>Add More</p>
                            </span>
                            <input type="hidden" name="type" value="image">
                            <input type="file" id="addImageInput" accept="image/*" name="name[]" multiple
                                style="display: none;" onchange="this.form.submit()">
                        </div>

                    </form>
                @endif
            </div>

        </div>

    </div>
@endsection
