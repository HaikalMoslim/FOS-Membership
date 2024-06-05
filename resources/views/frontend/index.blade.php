@extends('layouts.front')

@section('title')
    Welcome to Factory Outlet Store
@endsection

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            @foreach($promotions->where('status', 1) as $promo => $promotion)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $promo }}" class="{{ $promo == 0 ? 'active' : '' }}" aria-current="{{ $promo == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $promo + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach($promotions->where('status', 1) as $promo => $promotion)
                <div class="carousel-item {{ $promo == 0 ? 'active' : '' }}">
                    <img src="{{ asset('assets/uploads/promotion/' .$promotion->image) }}" class="d-block w-100" alt="Slide {{ $promo + 1 }}">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <style>
        /* Add this CSS for balanced image sizes */
        .featured-carousel .item .card img {
            height: 300px; /* Adjust the height as needed */
            object-fit: cover;
        }
    </style>

    <div class="py-3">
        <div class="container">
            <div class="row">
                <h2>Featured Products</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                        @foreach ($featured_products as $prod)
                        <div class="item">
                            <a href="{{url('category/' . $prod->category->slug . '/' . $prod->slug)}}">
                            <div class="card">
                                <img src="{{asset('assets/uploads/products/'.$prod->image)}}" alt="Product Image">
                                <div class="card-body">
                                    <h5>{{$prod->name}}</h5>
                                    <span class="float-start">{{$prod->selling_price}}</span>
                                    <span class="float-end"><s>{{$prod->original_price}}</s></span>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="container">
            <div class="row">
                <h2>Trending Categories</h2>
                    <div class="owl-carousel featured-carousel owl-theme">
                            @foreach ($trending_category as $tcategory)
                                <div class="item">
                                    <a href="{{url('category/'.$tcategory->slug)}}">
                                        <div class="card">
                                            <img src="{{asset('assets/uploads/category/'.$tcategory->image)}}" alt="Product Image">
                                            <div class="card-body">
                                                <h5>{{$tcategory->name}}</h5>
                                                <p>
                                                    {{$tcategory->description}}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                    </div>
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="container">
            <div class="row">
                <h2>Prefer Tops</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @php
                        $user_products_tops = auth()->check() ? $user_products_tops : [];
                    @endphp

                    @forelse ($user_products_tops as $top)
                        <div class="item">
                            <a href="{{url('category/' . $top->category->slug . '/' . $top->slug)}}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/products/' . $top->image) }}" alt="Product Image">
                                <div class="card-body">
                                    <h5>{{ $top->name }}</h5>
                                    <span class="float-start">{{ $top->selling_price }}</span>
                                    <span class="float-end"><s>{{ $top->original_price }}</s></span>
                                </div>
                            </div>
                            </a>
                        </div>
                    @empty
                        <p>No preferred tops available.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="container">
            <div class="row">
                <h2>Prefer Bottoms</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @php
                        $user_products_bottoms = auth()->check() ? $user_products_bottoms : [];
                    @endphp

                    @forelse ($user_products_bottoms as $bottom)
                        <div class="item">
                            <a href="{{url('category/' . $bottom->category->slug . '/' . $bottom->slug)}}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/products/' . $bottom->image) }}" alt="Product Image">
                                <div class="card-body">
                                    <h5>{{ $bottom->name }}</h5>
                                    <span class="float-start">{{ $bottom->selling_price }}</span>
                                    <span class="float-end"><s>{{ $bottom->original_price }}</s></span>
                                </div>
                            </div>
                            </a>
                        </div>
                    @empty
                        <p>No preferred bottoms available.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection