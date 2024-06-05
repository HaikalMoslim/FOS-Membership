@extends('layouts.front')

@section('title')
    F.O.S Maps
@endsection

@section('content')

<div class="py-3 mb-3 shadow-sm bg-warning">
    <div class="container">
        <h6 class="mb-0">
            <a class ="route-nav" href="{{url('/')}}">
                Home
            </a> /
            <a class ="route-nav" href="{{url('map')}}">
                Maps
            </a>
        </h6>
    </div>
</div>

<div class="container py-3">
    <div class="row">
        <div class="col-md-12">
            <h2>F.O.S Outlet Stores</h2>
            <div class="row py-3">
                <div id="map" style="height: 500px;" ></div>
            </div>
        </div>
    </div>
</div>

<div class="container py-3">
    <h2>Featured Products</h2>
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                @if($locations->count() > 0)
                    @foreach($locations as $item)
                        <div class="row py-3 list-item">
                            <div class="col-md-2 my-auto">
                                <img src="{{ asset('assets/uploads/locations/' . $item->image) }}" height=90px" width="90px" alt="Image Here">
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{ $item->name }}</h6>
                            </div>
                            <div class="col-md-3 my-auto">
                                <h6>{{ $item->address }}</h6>
                            </div>
                            <div class="col-md-3 my-auto">
                                <h6>{{ $item->operation }}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                            <a href="{{url('map/'.$item->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4>There are no locations</h4>
                @endif
            </div>
        </div>
    </div>
</div>


<script>
    var map;
    var infoWindow;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 1.9344, lng: 103.3587 },
            zoom: 9
        });

        infoWindow = new google.maps.InfoWindow();

        const locationButton = document.createElement("button");
        locationButton.textContent = "Pan to Current Location";
        locationButton.classList.add("custom-map-control-button");
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);

        locationButton.addEventListener("click", function (event) {
            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };

                        infoWindow.setPosition(pos);
                        infoWindow.setContent("Your Location");
                        infoWindow.open(map);
                        map.panTo(pos);
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

        @foreach ($locations as $location)
        var marker = new google.maps.Marker({
            position: { lat: {{ $location->latitude }}, lng: {{ $location->longitude }} },
            map: map,
            title: '{{ $location->name }}'
        });

        // Associate details with each marker using closure
        (function (marker) {
            var details = '{{ $location->operation }}';
            marker.addListener('click', function () {
                showDetails(infoWindow, marker, details);
            });
        })(marker);
        @endforeach
    }

    function showDetails(infoWindow, marker, details) {
        var content = '<strong>' + marker.getTitle() + '</strong><br>' + details;
        infoWindow.setContent(content);
        infoWindow.open(map, marker);
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
    document.addEventListener('DOMContentLoaded', function () {
        initMap();
    });
</script>


    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap">
    </script>

@endsection
