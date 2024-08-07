<!-- resources/views/user-escort/partials/escort-list.blade.php -->
<div class="row gy-5">
    @if($allescorts->isEmpty())
        <div class="col-12">
            <p>No Data Available</p>
        </div>
    @else
        @foreach ($allescorts as $escort)
            <div class="col-lg-3 menu-item">
                <a href="{{ route('escort.detail_by_id', $escort->id) }}" class="glightbox"><img src="{{ asset('/public/images/static_img/liza.png') }}" class="menu-img img-fluid" alt=""></a>
                <h4>{{ $escort->nickname }}</h4>
                <p class="ingredients">{{ $escort->origin }}</p>
            </div>
        @endforeach
    @endif
</div>
