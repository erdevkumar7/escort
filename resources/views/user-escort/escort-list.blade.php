@extends('user.layout')

@section('page_content')
    <section class="profile-moment">
        <!-- listing page start -->
        <div class="table-list">
            <div class="container">
                {{-- <div class="search-escort col-sm-4 p-3">
                <input type="text" id="search" class="form-control" placeholder="Search escort"
                    value="{{ request()->input('search') }}">
            </div> --}}

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                    <div class="tab-pane fade active show" id="menu-starters">
                        <div class="row gy-5" id="escort-list">
                            @if ($allescorts->isEmpty())
                                <div class="col-12">
                                    <p>No Data Available</p>
                                </div>
                            @else
                                @foreach ($allescorts as $escort)
                                    <div class="col-lg-3 menu-item">
                                        <a href="{{ route('escort.detail_by_id', $escort->id) }}" class="glightbox">
                                            @if ($escort->profile_pic)
                                                <img src="{{ asset('/public/images/profile_img/' . $escort->profile_pic) }}" class="menu-img img-fluid" alt="Profile_Picture">
                                            @else
                                                <img src="{{ asset('/public/images/profile_img/default_profile.png') }}" class="menu-img img-fluid" alt="Profile_Picture">
                                            @endif
                                            <h4>{{ $escort->nickname }}</h4>
                                        </a>
                                        
                                        <p class="ingredients"> Categoty:
                                            {{ $escort->type ? $escort->type : 'Not Available' }}</p>
                                        <p class="ingredients"> City:
                                            {{ $escort->city ? $escort->city : 'Not Available' }}</p>
                                        <p class="ingredients"> Status:
                                            {{ $escort->status === 1 ? 'Active' : 'In-Active' }}</p>                                    
                                        <a href="{{ route('escort.detail_by_id', $escort->id) }}"
                                            class="btn btn-primary btn-block">VIEW DETAILS</a>

                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                let query = $(this).val();
                $.ajax({
                    url: '{{ route('index') }}',
                    type: 'GET',
                    data: {
                        search: query
                    },
                    success: function(data) {
                        $('#escort-list').html(data);
                    }
                });
            });
        });
    </script>
@endsection
