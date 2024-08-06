<section class="profile-moment">
    <!-- <h1 class="text-white">HOT profiles of the moment</h1> -->
    <!-- <p class="text-white pb-5 featured-text">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna
        aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex. </p> -->

    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-carousel">
                <div class="owl-carousel carousel-main text-white text-center">
                    <div>
                        <img src="{{asset('/public/images/static_img/abella.png')}}">
                        <h4>Abella</h4>
                        <p>Geneva</p>
                    </div>
                    <div><img src="{{asset('/public/images/static_img/angela.png')}}">
                        <h4>Angela</h4>
                        <p>Geneva</p>
                    </div>
                    <div><img src="{{asset('/public/images/static_img/violet.png')}}">
                        <h4>Violet</h4>
                        <p>Geneva</p>
                    </div>
                    <div><img src="{{asset('/public/images/static_img/brandi.png')}}">
                        <h4>Brandi</h4>
                        <p>Geneva</p>
                    </div>
                    <div><img src="{{asset('/public/images/static_img/natasha.png')}}">
                        <h4>Natasha</h4>
                        <p>Geneva</p>
                    </div>
                    <div><img src="{{asset('/public/images/static_img/view-all.png')}}">
                        <h4>View-all</h4>
                        <p>Geneva</p>
                    </div>
                    <div>
                        <img src="{{asset('/public/images/static_img/abella.png')}}">
                        <h4>Abella</h4>
                        <p>Geneva</p>
                    </div>
                    <div><img src="{{asset('/public/images/static_img/angela.png')}}">
                        <h4>Angela</h4>
                        <p>Geneva</p>
                    </div>
                    <div><img src="{{asset('/public/images/static_img/violet.png')}}">
                        <h4>Violet</h4>
                        <p>Geneva</p>
                    </div>
                    <div><img src="{{asset('/public/images/static_img/brandi.png')}}">
                        <h4>Brandi</h4>
                        <p>Geneva</p>
                    </div>
                    <div><img src="{{asset('/public/images/static_img/natasha.png')}}">
                        <h4>Natasha</h4>
                        <p>Geneva</p>
                    </div>
                    <div><img src="{{asset('/public/images/static_img/view-all.png')}}">
                        <h4>View-all</h4>
                        <p>Geneva</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- listing page start -->

<div class="table-list">
    <div class="container">
        <table class="inner-list-img">
            <tr>
                @foreach ($allescorts as $escort)                    
                <td>
                    <img src="{{asset('/public/images/static_img/liza.png')}}">
                    <h3>{{$escort->nickname}} <img src="{{asset('/public/images/static_img/right-check.png')}}"></h3>
                    <p>Category:{{$escort->origin}}</p>
                    <a href="{{route('escort.detail_by_id', $escort->id)}}"><p>view</p></a>
                </td>
                @endforeach
                {{-- <td>
                    <img src="{{asset('/public/images/static_img/liza.png')}}">
                    <h3>Natasha <img src="{{asset('/public/images/static_img/right-check.png')}}"></h3>
                    <p>Category:</p>
                    <span class="city-text">New photo</span>
                </td>
                <td>
                    <img src="{{asset('/public/images/static_img/liza.png')}}">
                    <h3>Natasha <img src="{{asset('/public/images/static_img/right-check.png')}}"></h3>
                    <p>Category:</p>
                </td>
                <td>
                    <img src="{{asset('/public/images/static_img/liza.png')}}">
                    <h3>Natasha <img src="{{asset('/public/images/static_img/right-check.png')}}"></h3>
                    <p>Category:</p>
                </td> --}}
            </tr>

            {{-- <tr>
                <td>
                    <img src="{{asset('/public/images/static_img/liza.png')}}">
                    <h3>Natasha <img src="{{asset('/public/images/static_img/right-check.png')}}"></h3>
                    <p>Category:</p>
                </td>
                <td>
                    <img src="{{asset('/public/images/static_img/liza.png')}}">
                    <h3>Natasha <img src="{{asset('/public/images/static_img/right-check.png')}}"></h3>
                    <p>Category:</p>
                </td>
                <td>
                    <img src="{{asset('/public/images/static_img/liza.png')}}">
                    <h3>Natasha <img src="{{asset('/public/images/static_img/right-check.png')}}"></h3>
                    <p>Category:</p>
                </td>
                <td>
                    <img src="{{asset('/public/images/static_img/liza.png')}}">
                    <h3>Natasha <img src="{{asset('/public/images/static_img/right-check.png')}}"></h3>
                    <p>Category:</p>
                </td>
            </tr>

            <tr>
                <td>
                    <img src="{{asset('/public/images/static_img/liza.png')}}">
                    <h3>Natasha <img src="{{asset('/public/images/static_img/right-check.png')}}"></h3>
                    <p>Category:</p>
                </td>
                <td>
                    <img src="{{asset('/public/images/static_img/liza.png')}}">
                    <h3>Natasha <img src="{{asset('/public/images/static_img/right-check.png')}}"></h3>
                    <p>Category:</p>
                </td>
                <td>
                    <img src="{{asset('/public/images/static_img/liza.png')}}">
                    <h3>Natasha <img src="{{asset('/public/images/static_img/right-check.png')}}"></h3>
                    <p>Category:</p>
                </td>
                <td>
                    <img src="{{asset('/public/images/static_img/liza.png')}}">
                    <h3>Natasha <img src="{{asset('/public/images/static_img/right-check.png')}}"></h3>
                    <p>Category:</p>
                </td>
            </tr>

            <tr>
                <td>
                    <img src="{{asset('/public/images/static_img/liza.png')}}">
                    <h3>Natasha <img src="{{asset('/public/images/static_img/right-check.png')}}"></h3>
                    <p>Category:</p>
                </td>
                <td>
                    <img src="{{asset('/public/images/static_img/liza.png')}}">
                    <h3>Natasha <img src="{{asset('/public/images/static_img/right-check.png')}}"></h3>
                    <p>Category:</p>
                </td>
                <td>
                    <img src="{{asset('/public/images/static_img/liza.png')}}">
                    <h3>Natasha <img src="{{asset('/public/images/static_img/right-check.png')}}"></h3>
                    <p>Category:</p>
                </td>
                <td>
                    <img src="{{asset('/public/images/static_img/liza.png')}}">
                    <h3>Natasha <img src="{{asset('/public/images/static_img/right-check.png')}}"></h3>
                    <p>Category:</p>
                </td>
            </tr> --}}

        </table>
    </div>
</div>

</section>
