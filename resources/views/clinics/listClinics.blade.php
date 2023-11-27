@extends('layouts.master')
@section('title', 'Online Medicine')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
<div class="container">
    @include('What-free.header-wFree')
    @php
        $addresses = \App\Models\Clinic::where('status', \App\Enums\ClinicStatus::ACTIVE)
        ->orderBy('id', 'desc')
        ->get();
        $coordinatesArray = $addresses->toArray();
    @endphp
    <div class="clinics-list">
        <div class="clinics-header row">
            <div class=" d-flex justify-content-between">
                <span class="fs-32px">Suggestions near you</span>
                <span>
                    <a href="">See all</a>
                </span>
            </div>
        </div>
        <div class="body row" id="productInformation"></div>

    </div>
    <div class="other-clinics">
        <div class="title">
            Other Clinics/Pharmacies
        </div>
        @include('component.clinic')
    </div>
</div>
    <script>
        var locations = {!! json_encode($coordinatesArray) !!};
        var infoWindows = [];
        function getCurrentLocation(callback) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
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

        function initShowProducts(currentLocation, locations) {
            var productInformationDiv = document.getElementById('productInformation');
            locations.forEach(function (item) {
                var distance = calculateDistance(
                    currentLocation.lat, currentLocation.lng,
                    parseFloat(item.latitude), parseFloat(item.longitude)
                );

                // Chọn bán kính tìm kiếm (ví dụ: 10 km)
                var searchRadius = 10;
                if (distance <= searchRadius) {
                    var urlDetail = "{{ route('clinic.detail', ['id' => ':id']) }}".replace(':id', item.id);

                    let img = '';
                    console.log(item)
                    let gallery = item.gallery;
                    let arrayGallery = gallery.split(',');
                    for (let j = 0; j < arrayGallery.length; j++) {
                        img += `<img class="mr-2 w-auto h-100 img-item1" src="${arrayGallery[j]}" alt="">`;
                    }

                    let html = `
                    <div class="col-md-4 mb-md-3">
                        <div class="clinic-item over-x-hidden">
                            <a href="${urlDetail}">
                                ${item.name}
                            </a>
                            <div class="time d-flex">
                                <p>${item.open_date} - ${item.close_date}</p>
                            </div>
                            <div class="location">
                                <i class="fa-solid fa-location-dot"></i>${item.address_detail} ${item.address} - <span>${distance.toFixed(2)} Km</span>
                            </div>
                            <div class="service">
                                Service: Implant, Brightening, Crown(null)
                            </div>
                            <div class="star d-flex">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                                <i class="bi bi-star"></i>
                            </div>
                            <div class="img-detail row">
                                <div class="col-3 img-item d-flex">
                                    ${img}
                                </div>
                            </div>
                        </div>
                    </div>`;

                    productInformationDiv.innerHTML += html;
                }
            });
        }

        function loadProductInformation() {
            getCurrentLocation(function (currentLocation) {
                initShowProducts(currentLocation, locations);
            });
        }

        loadProductInformation();
    </script>



@endsection
