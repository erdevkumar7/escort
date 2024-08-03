<section class="new-escorts">
    <h1 class="text-white">New escorts, masseuses and TS</h1>
    <p class="text-white featured-text">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna
        aliqua. Ut enim ad minim veniam,quis nostrud.</p>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-carousel">
                <div class="owl-carousel carousel-main-two">
                    @foreach ($allescorts as $escort)  
                    <div class="card text-white">
                        <img src="{{asset('/public/images/static_img/eliza.png')}}">
                        <h4 class="">{{$escort->nickname}}</h4>
                        <p>City: {{$escort->city}}</p>
                        <p>Origin: {{$escort->origin}}</p>
                        <p>Type: {{$escort->type}}</p>
                        <p>Call: {{$escort->phone_number}}</p>
                        <a href="#"><button>VIEW DETAILS</button></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</section>