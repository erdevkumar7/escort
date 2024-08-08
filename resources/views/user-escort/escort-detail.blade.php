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
                        <i class="fa fa-wechat"></i>
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
                <div class="col-md-4 first-members-content">
                    <a href="#"><i class='fas fa-arrow-left'></i></a>
                </div>

                <div class="col-md-4 second-members-content">
                    @if (!empty($pictures) && is_array($pictures) && count($pictures) > 0)
                        <img src="{{ asset('/public/images/escorts_img') . '/' . $pictures[0] }}" alt="" />
                    @else
                        <img src="{{ asset('/public/images/escorts_img') . '/' . 'escort_profile.png' }}"
                            alt="Default Profile Picture">
                    @endif

                    <button>Private apart..</button>
                    <h3>{{ $escort->nickname ?? 'Not Available' }}<span><img src=""></span></h3>
                    <p>Origin: {{ $escort->origin ?? 'Not Available' }}</p>

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
                            💃✨
                            {{ $escort->text_description }}🔥
                        </p>
                    </div>

                    <div class="contact-btn">
                        <a class="follow-btn" href="#">Follow</a>
                        <a class="contact-btn" href="#">Contact</a>

                    </div>
                </div>

                <div class="col-md-4 three-members-content">
                    <div class="members-count">
                        <p>15 <span>Photos</span></p>
                        <p>2 <span>Videos</span></p>
                        <p>62 <span>Members</span></p>

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
                        <a><i class="fak fa-c-medias"></i></a>
                        <a href="#"><i class='fas fa-video'></i></a>
                        <a href="#"><i class='fas fa-lock'></i></a>
                        <a href="#"><i class='fas fa-file-contract'></i></a>
                        <a href="#"><i class='fas fa-mars-double'></i></a>

                    </div>
                </div>
            </div>
        </div>



    </section>
@endsection
