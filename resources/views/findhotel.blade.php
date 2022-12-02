<!DOCTYPE html>
<html>
    <head>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">
    function initialize() {

$('form').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
        e.preventDefault();
        return false;
    }
});
const locationInputs = document.getElementsByClassName("map-input");

const autocompletes = [];
const geocoder = new google.maps.Geocoder;
for (let i = 0; i < locationInputs.length; i++) {

    const input = locationInputs[i];
    const fieldKey = input.id.replace("-input", "");
    const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';

    const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || {{$lati}};
    const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || {{$longi    }};

    const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
        center: {lat: latitude, lng: longitude},
        zoom: 13
    });
    const marker = new google.maps.Marker({
        map: map,
        position: {lat: latitude, lng: longitude},
    });

    marker.setVisible(isEdit);

    const autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.key = fieldKey;
    autocompletes.push({input: input, map: map, marker: marker, autocomplete: autocomplete});
}

for (let i = 0; i < autocompletes.length; i++) {
    const input = autocompletes[i].input;
    const autocomplete = autocompletes[i].autocomplete;
    const map = autocompletes[i].map;
    const marker = autocompletes[i].marker;

    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        marker.setVisible(false);
        const place = autocomplete.getPlace();

        geocoder.geocode({'placeId': place.place_id}, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                const lat = results[0].geometry.location.lat();
                const lng = results[0].geometry.location.lng();
                setLocationCoordinates(autocomplete.key, lat, lng);
            }
        });

        if (!place.geometry) {
            window.alert("No details available for input: '" + place.name + "'");
            input.value = "";
            return;
        }

        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

    });
}
}

function setLocationCoordinates(key, lat, lng) {
const latitudeField = document.getElementById(key + "-" + "latitude");
const longitudeField = document.getElementById(key + "-" + "longitude");
latitudeField.value = lat;
longitudeField.value = lng;
}

    </script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <style type="text/css">
        #map {
          height: 30em;
          width: 100%;
        }
    </style>
    </head>
    <body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Find Hotel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mt-5">

                    <div class="form-group">
                        <div style="width: 30%; margin-left: 5em; margin-bottom: 2em;">
                            <x-jet-label for="name" value="{{ __('Enter Location') }}" />
                            <x-jet-input name="address_address" id="address-input" class="block mt-1 w-full map-input" type="text" required autofocus autocomplete="name" />
                        </div>

                        <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                        <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
                    </div>
                    <div id="address-map-container" style="width:100%;height:400px; ">
                        <div style="width: 100%; height: 100%" id="address-map"></div>
                    </div>

                </div>

                {{-- <script type="text/javascript">
                    function initMap() {
                      const myLatLng = { lat: {{$lati}}, lng: {{$longi}} };
                      const map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 15,
                        center: myLatLng,
                      });

                      new google.maps.Marker({
                        position: myLatLng,
                        map,
                        title: "Me",
                      });
                    }

                    window.initMap = initMap;
                </script> --}}
                <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>



            </div>
        </div>
    </div></div>


    <div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <center><h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin: 5em;">
                    {{ __('Hotels') }}
                </h2></center>

                @if($counter > 0)
@for ($i=0; $i < $counter; $i++)
<a href="uhrooms?id={{0}}&hid={{$ids[$i]}}">
<div class="bg-white rounded-lg max-w-sm dark:bg-gray-800" style="border:0px; shadow:0px; display:inline-block; width: 20em; margin-left: 2em;">

			<img class="rounded-t-lg p-8" src="Uploads/{{$pfp[$i]}}" alt="Hotel image">

			<div class="px-5 pb-5">
				<a href="#">
					<h3 class="text-gray-900 font-semibold text-xl tracking-tight dark:text-white">{{$hname[$i]}}</h3>
				</a>
				<div class="flex items-center mt-2.5 mb-5">

					<span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{$rating[$i]}}</span>
				</div>
				<div class="flex items-center justify-between">
				</div>
			</div>
	</div>
    </a>
<!-- {{$near[$i]}} -->



@endfor

@else

<center><h4 class="font-semibold text-m text-gray-500 leading-tight" style="margin: 5em;">
                  No hotels yet
                </h4></center>


@endif

</div></div>
    </div>
</x-app-layout>
    </body></html>
