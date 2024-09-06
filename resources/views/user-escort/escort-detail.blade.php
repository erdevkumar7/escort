@extends('user.layout')
@section('page_content')
    <section class="escort-details">
        <div class="container">
            <div class="row details-inner-content">
                <div class="col-md-4 first-details-content">
                    <a href="#">Escorts</a>
                </div>

                <div class="col-md-4 second-details-content">
                    {{-- <h1 class="bemy-text">BeMyGirl</h1> --}}
                </div>

                <div class="col-md-4 threee-details-content">
                    <div class="detials-icons">
                        <a href="#"><i class="bi bi-chat-right-dots"></i></a>
                        <a href="#"><i class='fas fa-book-open'></i></a>
                        <a href="#"><i class="fa fa-shopping-bag"></i></a>
                        <a href="#"><i class='far fa-user-circle'></i></a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="members-content">
        <div class="container">
            <div class="row members-inner-content">
                <div class="col-md-6 first-members-content">
                    <a href="{{ route('escort.list') }}"><i class='fas fa-arrow-left'></i></a>
                </div>



                <div class="col-md-6 three-members-content">
                    <div class="members-count">
                        @if ($pictures)
                            <p> {{ count($pictures) }} <span>Photos</span> </p>
                        @else
                            <p> 0 <span>Photos</span> </p>
                        @endif

                        @if ($videos)
                            <p> {{ count($videos) }} <span>Videos</span> </p>
                        @else
                            <p> 0 <span>Videos</span> </p>
                        @endif

                        <p> 0 <span>Members</span></p>

                    </div>
                </div>

                <div class="col-md-12 second-members-content">
                    @if ($escort->profile_pic)
                        <img src="{{ asset('/public/images/profile_img') . '/' . $escort->profile_pic }}"
                            alt="Profile_pic" />
                    @else
                        <img src="{{ asset('/public/images/static_img') . '/' . 'default_profile.png' }}"
                            alt="Default Profile Picture">
                    @endif

                    <!--  <button>Private apart..</button> -->
                    <h3>{{ $escort->nickname ?? 'Not Available' }}</h3>
                    <p>Call: {{ $escort->phone_number ?? 'Not Available' }}</p>

                    <div class="experience-inner-part">
                        <p>
                            @if ($escort->type)
                                Category : {{ $escort->type }} |
                            @endif
                            @if ($escort->rates_in_chf)
                                Rate : {{ $escort->rates_in_chf }} Chf |
                            @endif
                            @if ($escort->height)
                                Height : {{ $escort->height }}Kg |
                            @endif
                            @if ($escort->weight)
                                Weight : {{ $escort->weight }}Kg |
                            @endif
                            @if ($escort->hair_color)
                                Hair Color : {{ $escort->hair_color }} |
                            @endif
                            @if ($escort->hair_length)
                                Hair Length : {{ $escort->hair_length }} |
                            @endif

                            @if ($escort->text_description)
                                <div class="escort-dec">
                                    💃✨
                                    {{ $escort->text_description }}🔥
                                </div>
                            @endif
                        </p>
                    </div>

                    <div class="contact-btn">
                        <a class="follow-btn" href="#">Follow</a>
                        <a class="contact-btn" href="#">Contact</a>

                    </div>
                </div>

            </div>
        </div>

    </section>


    <section class="select-gallary">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="media-profile">
                        <a href="#escort-detail"><i class="fa-solid fa-image"></i></a>
                        <a href="#escort-videos"><i class='fas fa-video'></i></a>
                        <a href="#"><i class='fas fa-lock'></i></a>
                        <a href="#"><i class='fas fa-file-contract'></i></a>
                        <a href="#"><i class='fas fa-mars-double'></i></a>

                    </div>
                </div>
            </div>
            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                <div class="tab-pane fade active show" id="menu-starters">
                    <!-- Pictures Section -->
                    <div class="row gy-5 " id="escort-detail">
                        @if ($pictures)
                            @foreach ($pictures as $picture)
                                <div class="col-lg-3 menu-item">
                                    <img src="{{ asset('/public/images/escorts_img') . '/' . $picture->name }}"
                                        class="menu-img img-fluid" alt="Picture">
                                </div>
                            @endforeach
                        @else
                            <div class="col-12">

                            </div>
                        @endif
                    </div>

                    <!-- Videos Section -->
                    <div class="row gy-5 " id="escort-videos">
                        @if ($videos)
                            @foreach ($videos as $vdo)
                                <div class="col-lg-3 menu-item">

                                    {{-- <div class="video-thumbnail escort-detail-video">
                                        <img src="{{ asset('/public/images/static_img/video_play.png') }}"
                                            alt="Video Thumbnail"
                                            onclick="loadVideo(this, '{{ asset('/public/videos') . '/' . $vdo->name }}')">
                                    </div> --}}
                                    <div class="video-thumbnail escort-image-video-thumbnail"
                                        onclick="loadVideo(this, '{{ asset('/public/videos') . '/' . $vdo->name }}')">

                                        <img class="vidio-ply-img1"
                                            src="{{ asset('/public/images/static_img/video_play4.jfif') }}">
                                        <img class="video-thumb9mg2"
                                            src="{{ $vdo->thumb_nail ? asset('/public/images/thumb_nails/' . $vdo->thumb_nail) : asset('/public/images/static_img/default_thumbnail.png') }}"
                                            alt="">

                                    </div>
                                    {{-- <video controls>
                                        <source src="{{ asset('/public/videos') . '/' . $vdo->name }}" type="video/mp4">
                                    </video> --}}
                                </div>
                            @endforeach
                        @else
                            <div class="col-12">

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <script>
            function loadVideo(element, videoSrc) {
                const videoContainer = document.createElement('div'); // Container for the video
                const videoElement = document.createElement('video'); // The video element
                // Autoplay the video, but remove all controls for interaction
                videoElement.setAttribute('autoplay', ''); // Automatically play the video
                // videoElement.setAttribute('muted', ''); // Mute the video to avoid autoplay restrictions
                // videoElement.setAttribute('playsinline', ''); // Allow playback without full-screen on mobile devices
                // videoElement.setAttribute('controlsList',
                // 'nodownload nofullscreen noremoteplayback'); // Disable all video controls

                const sourceElement = document.createElement('source'); // Source element for video
                sourceElement.setAttribute('src', videoSrc);
                sourceElement.setAttribute('type', 'video/mp4');

                videoElement.appendChild(sourceElement); // Add the source to the video element
                videoContainer.appendChild(videoElement); // Append video to the container

                // Replace the clicked thumbnail with the video player
                element.parentNode.replaceChild(videoContainer, element);
            }
        </script>
    </section>
@endsection
