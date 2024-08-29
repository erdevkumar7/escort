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
                    <a href="{{ route('agency.escort_listing', Auth::guard('agency')->user()->id) }}"><i class='fas fa-arrow-left'></i></a>
                </div>

         

                <div class="col-md-6 three-members-content">
                    <div class="members-count">
                        @if (!empty($pictures) && is_array($pictures) && count($pictures) > 0)
                            <p>{{ count($pictures) }} <span>Photos</span></p>
                        @else
                            <p> 0 <span>Photos</span></p>
                        @endif

                        @if (!empty($video) && is_array($video) && count($video) > 0)
                            <p>{{ count($video) }} <span>Videos</span></p>
                        @else
                            <p> 0 <span>Videos</span></p>
                        @endif

                        <p> 0 <span>Members</span></p>

                    </div>
                </div>

       <div class="col-md-12 second-members-content">
                    @if (!empty($pictures) && is_array($pictures) && count($pictures) > 0)
                        <img src="{{ asset('/public/images/escorts_img') . '/' . $pictures[0] }}" alt="" />
                    @else
                        <img src="{{ asset('/public/images/escorts_img') . '/' . 'escort_profile.png' }}"
                            alt="Default Profile Picture">
                    @endif

                    <!--  <button>Private apart..</button> -->
                    <h3>{{ $escort->nickname ?? 'Not Available' }}</h3>
                    <p>Call: {{ $escort->phone_number ?? 'Not Available' }}</p>

                    <div class="experience-inner-part">
                        <p>
                            @if ($escort->rates_in_chf)
                                | {{ $escort->rates_in_chf }} Chf |
                            @endif
                            @if ($escort->weight)
                                {{ $escort->weight }}Kg |
                            @endif
                            @if ($escort->type)
                                {{ $escort->type }}
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
                                    <img src="{{ asset('/public/images/escorts_img') . '/' . $picture }}"
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
                        @if ($video)
                            @foreach ($video as $vdo)
                                <div class="col-lg-3 menu-item">
                                    <video controls>
                                        <source src="{{ asset('/public/videos') . '/' . $vdo }}" type="video/mp4">
                                    </video>
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
    </section>
@endsection
