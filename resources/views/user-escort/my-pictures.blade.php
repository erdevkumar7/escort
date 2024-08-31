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
            </nav>

            {{-- <div class="row escort-pictures">
                @if (empty($pictures))
                    <div class="escort-no-pic-heading">
                        <h4>No Pictures Available</h4>
                    </div>
                @else
                    @foreach ($pictures as $picture)
                        <div class="col-lg-3 menu-item escort-image-cross">
                            <img src="{{ asset('/public/images/escorts_img/' . ($picture ?? 'escort_profile.png')) }}"
                                class="menu-img img-fluid" alt="Picture">
                            <span class="cross-escort-button">
                                <a href="#">
                                    <i class="fa-solid fa-xmark"></i>
                                </a>
                            </span>
                        </div>
                    @endforeach
                @endif
            </div> --}}

            <div class="row escort-pictures">
                @if (empty($pictures))
                    <form action="{{ route('escorts.pictures.update', Auth::guard('escort')->user()->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h4 class="no-pic">No Pictures Available</h4>
                        <div class="col-lg-3 menu-item escort-add-more-pic">
                            <span onclick="document.getElementById('addImageInput').click();">
                                <img src="{{ asset('/public/images/static_img/add_more_pic1.png') }}"
                                    class="menu-img img-fluid" alt="Add Image">
                                <p>Add More</p>
                            </span>
                            <!-- Hidden file input for adding images -->
                            <input type="file" id="addImageInput" accept="image/*" name="pictures[]" multiple
                                style="display: none;" onchange="this.form.submit()">
                        </div>
                    </form>
                @else
                    @foreach ($pictures as $picture)
                        <div class="col-lg-3 menu-item escort-image">
                            <span class="cross-escort-button">                               
                                <form action="{{ route('escorts.pictures.delete', Auth::guard('escort')->user()->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="image_name" value="{{ $picture }}">
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></button>
                                </form>
                            </span>
                            <img src="{{ asset('/public/images/escorts_img/' . ($picture ?? 'escort_profile.png')) }}"
                                class="menu-img img-fluid" alt="Picture">

                        </div>
                    @endforeach
                    <!-- Add default image icon for adding more images -->
                    <form action="{{ route('escorts.pictures.update', Auth::guard('escort')->user()->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-lg-3 menu-item escort-add-more-pic">
                            <span onclick="document.getElementById('addImageInput').click();">
                                <img src="{{ asset('/public/images/static_img/add_more_pic1.png') }}"
                                    class="menu-img img-fluid" alt="Add Image">
                                <p>Add More</p>
                            </span>
                            <!-- Hidden file input for adding images -->
                            <input type="file" id="addImageInput" accept="image/*" name="pictures[]" multiple
                                style="display: none;" onchange="this.form.submit()">
                        </div>
                    </form>
                @endif
            </div>

        </div>

    </div>
@endsection
