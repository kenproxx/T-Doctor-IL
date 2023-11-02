<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add a default marker to a web map</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
    <style>
        body { margin: 0; padding: 0; }
        #map { position: absolute; top: 0; bottom: 0; width: 100%; }
    </style>
</head>
<body>
<div id="map"></div>

<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiZGFuaWVsbmd1eWVuMTk5MyIsImEiOiJjbG9oM29qZmMxOGd4MmpuMG41OHhzb2U0In0.6zVNE3WJd-sOkWlE-fI9ow';
    const map = new mapboxgl.Map({
        container: 'map',
        // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
        style: 'mapbox://styles/mapbox/streets-v12',
        center: [12.550343, 55.665957],
        zoom: 8
    });

    // Create a default Marker and add it to the map.
    const marker1 = new mapboxgl.Marker()
        .setLngLat([20.9732919, 105.7542978])
        .addTo(map);

</script>

</body>
</html>
