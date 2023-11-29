@extends('layouts.master')
@section('title', 'Online Medicine')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="container">
        @include('What-free.header-wFree')
        @php
            $address = DB::table('clinics')
                  ->join('users', 'users.id', '=', 'clinics.user_id')
                        ->where('clinics.status', \App\Enums\ClinicStatus::ACTIVE)
                        ->where('clinics.type', \App\Enums\TypeBussiness::CLINICS)
                        ->select('clinics.*', 'users.email')
                        ->cursor()
                        ->map(function ($item) {
                            $array = explode(',', $item->service_id);
                            $services = \App\Models\ServiceClinic::whereIn('id', $array)->get();
                            $array = explode(',', $item->address);
                            $addressP = \App\Models\Province::where('id', $array[1])->first();
                            $addressD = \App\Models\District::where('id', $array[2])->first();
                            $addressC = \App\Models\Commune::where('id', $array[3])->first();
                            $clinic = (array)$item;
                            $clinic['total_services'] = $services->count();
                            $clinic['services'] = $services->toArray();
                            if ($addressP == null) {
                                $clinic['addressInfo'] = '';
                                return $clinic;
                            }
                            $clinic['addressInfo'] = $addressC['name'] . ',' . $addressD['name'] . ',' . $addressP['name'];
                            return $clinic;
                        });
            $adr = $address->toArray();
        @endphp
        <div class="clinics-list">
            <div class="clinics-header row">
                <div class=" d-flex justify-content-between">
                    <span class="fs-32px">{{ __('home.Suggestions near you') }}</span>
                    <span>
                    <a href="">{{ __('home.See all') }}</a>
                </span>
                </div>
            </div>
            <div class="body row" id="productInformation"></div>

        </div>
        <div class="other-clinics">
            <div class="title">
                {{ __('home.Other Clinics/Pharmacies') }}
            </div>
            @include('component.clinic')
        </div>
    </div>
    <script>
        var addressNew = {!! json_encode($adr) !!};
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
                    let gallery = item.gallery;
                    let arrayGallery = gallery.split(',');
                    for (let j = 0; j < arrayGallery.length; j++) {
                        img += `<img class="mr-2 w-auto h-100 img-item1" src="${arrayGallery[j]}" alt="">`;
                    }
                    let serviceHtml = ``;
                    let service = item.services;
                    for (let j = 0; j < service.length; j++) {
                        let serviceItem = service[j];
                        serviceHtml = serviceHtml + `<span>${serviceItem.name},</span>`;
                    }

                    let html = `
                    <div class="col-md-4 mb-md-3">
                        <div class="clinic-item over-x-hidden">
                            <a class="text-overflow" href="${urlDetail}">
                                ${item.name}
                            </a>
                            <div class="time d-flex">
                                <p>${item.open_date} - ${item.close_date}</p>
                            </div>
                            <div class="location">
                                <div class="text-overflow d-flex"><i class="fa-solid fa-location-dot text-overflow pr-2"></i>${item.address_detail} ${item.addressInfo} </div>- <span>${distance.toFixed(2)} Km</span>
                            </div>
                            <div class="service">
                                Service: ${serviceHtml}
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
                initShowProducts(currentLocation, addressNew);
            });
        }

        loadProductInformation();
    </script>

@endsection
