@extends('layouts.admin')

@section('title')
    Edit Map
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Location</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-location/'.$locations->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{$locations->name}}" name="name">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Address</label>
                        <textarea name="address" rows="3" class="form-control">{{$locations->address}}</textarea>
                    </div>

                    <div id="map" style="height: 500px;" class="mt-5"></div>
                    
                    <div class="col-md-3 py-3">
                        <input type="text" class="form-control" value="{{$locations->latitude}}" name="latitude" id="_latitude" value="{{ old('latitude') ?? '0' }}" />
                    </div>
                    <div class="col-md-3 py-3">
                        <input type="text" class="form-control" value="{{$locations->longitude}}" name="longitude" id="_longitude" value="{{ old('longitude') ?? '0' }}" />
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Telefon Number</label>
                        <input type="text" class="form-control" value="{{$locations->telno}}" name="telno">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Mobile Number</label>
                        <input type="text" name="mobileno" class="form-control" value="{{$locations->mobileno}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" rows="3" class="form-control" value="{{$locations->email}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Operation Hours</label>
                        <input type="text" name="operation" class="form-control" value="{{$locations->operation}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Active</label>
                        <input type="checkbox" name="active" {{$locations->active =="1" ? 'checked':''}}>
                    </div>
                    @if($locations->image)
                        <img src="{{asset('assets/uploads/locations/'.$locations->image)}}" alt="Product image">
                    @endif
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
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

            locationButton.addEventListener("click", function(event) {
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
                            // infoWindow.setContent("Location found.");
                            // infoWindow.open(map);
                            map.panTo(pos);
                            marker.setPosition(pos);
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
                draggable: true
            });

            google.maps.event.addListener(marker, 'position_changed', function(){
                let lat = marker.position.lat()
                let lng = marker.position.lng()
                updateHiddenFields(lat, lng);
            });

            google.maps.event.addListener(map, 'click', function(event){
                const pos = event.latLng;
                marker.setPosition(pos);
                map.panTo(pos);
                updateHiddenFields(pos.lat(), pos.lng());
            });

            function updateHiddenFields(latitude, longitude) {
                document.getElementById('_latitude').value = latitude;
                document.getElementById('_longitude').value = longitude;
            }
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