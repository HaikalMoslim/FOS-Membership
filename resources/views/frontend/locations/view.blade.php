@extends('layouts.front')

@section('title')
    My Orders
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning">
    <div class="container">
        <h6 class="mb-0">
            <a class ="route-nav" href="{{url('/')}}">
                Home
            </a> /
            <a class ="route-nav" href="{{url('map/')}}">
                Maps
            </a> /
            <a class ="route-nav" href="{{url('map/'.$locations->id)}}">
                {{$locations->name}}
            </a>
        </h6>
    </div>
</div>

    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">FOS Location
                            <a href="{{url('map')}}" class="btn btn-warning float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 location-details">
                            <h4>Location Details</h4>
                                <hr>
                                <label for="">Place Name</label>
                                <div class="border">{{$locations->name}}</div>
                                <label for="">Telephone Number</label>
                                <div class="border">{{$locations->telno}}</div>
                                <label for="">Mobile Number</label>
                                <div class="border">{{$locations->mobileno}}</div>
                                <label for="">Email</label>
                                <div class="border">{{$locations->email}}</div>
                                <label for="">Operation Hour</label>
                                <div class="border">{{$locations->operation}}</div>
                                <label for="">Location Address</label>
                                <div class="border">
                                    {{$locations->address}}, <br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Google Map</h4>
                                    <hr>
                                    <div id="map" style="height: 500px;" ></div>
                            </div>
                        </div>
                            <div class="row py-5">
                                <div class="">
                                    <h4>Trending Products</h4>
                                    <hr>
                                    <div class="owl-carousel featured-carousel owl-theme">
                                        @foreach ($trendingProducts as $prod)
                                            <div class="item">
                                                <div class="card">
                                                    <img src="{{asset('assets/uploads/prodoutlet/'.$prod->image)}}" alt="Product Image">
                                                    <div class="card-body">
                                                        <h5>{{$prod->name}}</h5>
                                                        <span class="float-start">{{$prod->selling_price}}</span>
                                                        <span class="float-end"><s>{{$prod->original_price}}</s></span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        var map;
        var infoWindow;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 1.9344, lng: 103.3587},
                zoom: 9
            });

            infoWindow = new google.maps.InfoWindow();

            const locationButton = document.createElement("button");
            locationButton.textContent = "Pan to Current Location";
            locationButton.classList.add("custom-map-control-button");
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);

            locationButton.addEventListener("click", function (event) {
            // Prevent default form submission behavior
            event.preventDefault();

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };

                        infoWindow.setPosition(pos);
                        infoWindow.setContent("Your Location.");
                        infoWindow.open(map);
                        map.panTo(pos);
                        // Remove the following line to keep the marker static
                        // marker.setPosition(pos);
                        updateHiddenFields(pos.lat, pos.lng);
                    },
                    () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                    },
                );
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
            });

            marker = new google.maps.Marker({
                position: {lat: {{$locations->latitude}}, lng: {{$locations->longitude}}},
                map: map,
                draggable: false
            });
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation
                    ? "Error: The Geolocation service failed."
                    : "Error: Your browser doesn't support geolocation.",
            );
            infoWindow.open(map);
        }

        // Ensure the initMap function is called after the DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            initMap();
        });
    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap">
    </script>
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