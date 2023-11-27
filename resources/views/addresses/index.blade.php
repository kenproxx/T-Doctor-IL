<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Addresses</title>
</head>
<body>
<h1>Addresses</h1>

<!-- Form to add new address -->
<form id="addAddressForm">
    @csrf
    <label for="newAddress">New Address:</label>
    <input type="text" id="newAddress" name="newAddress" required>
    <button type="button" onclick="addNewAddress()">Save</button>
</form>
<div id="allAddressesMap" style="height: 800px;"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQO5YhrnYxyI215uOX9bNQ-_xxV_stGf8&callback=initMap"></script>
<script>
    var locations = {!! json_encode($coordinatesArray) !!};
    var infoWindows = [];

    function getCurrentLocation(callback) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var currentLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                callback(currentLocation);
            });
        } else {
            alert('Geolocation is not supported by this browser.');
        }
    }

    function calculateDistance(lat1, lng1, lat2, lng2) {
        var R = 6371; // Độ dài trung bình của trái đất trong km
        var dLat = toRadians(lat2 - lat1);
        var dLng = toRadians(lng2 - lng1);

        var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(toRadians(lat1)) * Math.cos(toRadians(lat2)) *
            Math.sin(dLng / 2) * Math.sin(dLng / 2);

        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

        var distance = R * c;
        return distance;
    }

    function toRadians(degrees) {
        return degrees * (Math.PI / 180);
    }

    function initMap(currentLocation, locations) {
        var map = new google.maps.Map(document.getElementById('allAddressesMap'), {
            center: currentLocation,
            zoom: 10
        });

        var currentLocationMarker = new google.maps.Marker({
            position: currentLocation,
            map: map,
            title: 'Your Location'
        });

        locations.forEach(function(location) {
            var distance = calculateDistance(
                currentLocation.lat, currentLocation.lng,
                parseFloat(location.latitude), parseFloat(location.longitude)
            );

            // Chọn bán kính tìm kiếm (ví dụ: 5 km)
            var searchRadius = 10;

            if (distance <= searchRadius) {
                var marker = new google.maps.Marker({
                    position: { lat: parseFloat(location.latitude), lng: parseFloat(location.longitude) },
                    map: map,
                    title: 'Location'
                });

                var infoWindowContent = '<div><strong>Address:</strong> ' + location.address + '</div>' +
                    '<div><img src="https://tdoctor.2188.info/storage/gallery/IkqGykhRqTF0NMhd80DaqnKw9GDlZ4SZjxuajsRy.png" alt="Image" style="max-width: 100%;"></div>';

                var infoWindow = new google.maps.InfoWindow({
                    content: infoWindowContent
                });

                marker.addListener('click', function() {
                    closeAllInfoWindows();
                    infoWindow.open(map, marker);
                });

                infoWindows.push(infoWindow);
            }
        });
    }

    function closeAllInfoWindows() {
        infoWindows.forEach(function(infoWindow) {
            infoWindow.close();
        });
    }

    getCurrentLocation(function(currentLocation) {
        initMap(currentLocation, locations);
    });

    function addNewAddress() {
        var newAddress = document.getElementById('newAddress').value;

        if (newAddress) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({'address': newAddress}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();

                    if (!isNaN(latitude) && !isNaN(longitude)) {
                        saveAddress(newAddress, latitude, longitude, 'map-new-' + new Date().getTime());
                    } else {
                        console.error('Invalid coordinates:', latitude, longitude);
                        alert('Invalid coordinates. Please try again.');
                    }
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    }

    function saveAddress(address, latitude, longitude, mapId) {
        var formData = new FormData();
        formData.append('address', address);
        formData.append('latitude', latitude);
        formData.append('longitude', longitude);

        fetch('/save-address', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    var map = new google.maps.Map(document.getElementById(mapId), {
                        center: {lat: parseFloat(latitude), lng: parseFloat(longitude)},
                        zoom: 15
                    });
                } else {
                    alert('Failed to save address. Please try again.');
                }
            })
            .catch(error => console.error('Error:', error));
    }
</script>
</body>
</html>
