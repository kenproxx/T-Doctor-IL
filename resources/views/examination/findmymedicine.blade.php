@php use App\Models\Department;use App\Models\MedicalFavourite;use App\Models\Province; @endphp
@php use App\Models\User;use Illuminate\Support\Facades\Auth;
 $currentUserId = Auth::user()->id ?? '';
@endphp
@extends('layouts.master')
@section('title', 'Find By Medicine')
<link href="{{ asset('css/findmymedicine.css') }}" rel="stylesheet">
@section('content')
    @include('layouts.partials.header_3')
    @include('component.banner')

    <div class="container">
        <div id="examination-scene">

            <div class="row medicine-search">
                <div class="medicine-search--left col-md-3 d-flex justify-content-around">
                    <div class="title">
                        <select class="form-select" id="category_id" name="category_id"
                                onchange="searchByCategory(this.value)">
                            <option value="">{{ __('home.Category') }}</option>
                            @if($categoryMedicines)
                                @foreach($categoryMedicines as $index => $cateProductMedicine)
                                    <option
                                        value="{{ $cateProductMedicine->id }}">{{ $cateProductMedicine->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="title">
                        <select class="form-select" id="location_id" name="location_id"
                                onchange="searchByLocation(this.value)">
                            <option value="">{{ __('home.Location') }}</option>
                            @if($provinces)
                                @foreach($provinces as $index => $province)
                                    <option value="{{ $province->id }}">{{ $province->full_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="medicine-search--center col-md-6 row d-flex justify-content-between">
                    <form class="search-box col-md-10">
                        <input type="search" oninput="searchByName(this.value)" name="focus"
                               placeholder="{{ __('home.Search for anything…') }}" id="search-input" value="">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </form>
                </div>
            </div>

            <div id="list-find-my-medicine">
                <div class="d-flex justify-content-center" style="padding: 12px">
                    <div class="list-title d-flex">
                        <div class="list--doctor p-0">
                            <p>{{ __('home.Best Pharmacists') }}</p>
                        </div>
                        <div class="ms-auto p-2"><a
                                href="{{route('examination.bestpharmacists')}}">{{ __('home.See all') }}</a></div>
                    </div>
                </div>
                <div class="row list-doctor m-auto find-my-medicine">
                    @if(count($bestPhamrmacists) > 0)
                        @foreach($bestPhamrmacists as $pharmacist)
                            @include('examination.component_doctor_findmymedicine', ['pharmacist' => $pharmacist])
                        @endforeach
                    @else
                        <h3 class="no-data text-center">{{ __('home.no data') }}</h3>
                    @endif
                </div>
                <div class="d-flex justify-content-center" style="padding: 12px">
                    <div class=" list-title d-flex">
                        <div class="list--doctor p-0">
                            <p>{{ __('home.New Pharmacists') }}</p>
                        </div>
                        <div class="ms-auto p-2"><a
                                href="{{route('examination.newpharmacists')}}">{{ __('home.See all') }}</a></div>
                    </div>
                </div>
                <div class="row list-doctor m-auto find-my-medicine">
                    @if(count($newPhamrmacists) > 0)
                        @foreach($newPhamrmacists as $pharmacist)
                            @include('examination.component_doctor_findmymedicine', ['pharmacist' => $pharmacist])
                        @endforeach
                    @else
                        <h3 class="no-data text-center">{{ __('home.no data') }}</h3>
                    @endif
                </div>
                <div class="d-flex justify-content-center" style="padding: 12px">
                    <div class=" list-title d-flex">
                        <div class="list--doctor p-0">
                            <p>{{ __('home.24/7 Available Pharmacists') }}</p>
                        </div>
                        <div class="ms-auto p-2"><a
                                href="{{route('examination.availablepharmacists')}}">{{ __('home.See all') }}</a>
                        </div>
                    </div>
                </div>
                <div class="row list-doctor m-auto find-my-medicine">
                    @if(count($allPhamrmacists) > 0)
                        @foreach($allPhamrmacists as $pharmacist)
                            @include('examination.component_doctor_findmymedicine', ['pharmacist' => $pharmacist])
                        @endforeach
                    @else
                        <h3 class="no-data text-center">{{ __('home.no data') }}</h3>
                    @endif
                </div>
                <div class="d-flex justify-content-center" style="padding: 12px">
                    <div class=" list-title d-flex">
                        <div class="list--doctor p-0">
                            <p>{{ __('home.Hot deal medicine') }}</p>
                        </div>
                        <div class="ms-auto p-2"><a
                                href="{{route('examination.hotdealmedicine')}}">{{ __('home.See all') }}</a></div>
                    </div>
                </div>
                <div class="row list-doctor m-auto find-my-medicine-2">
                    @if(count($hotMedicines) > 0)
                        @foreach($hotMedicines as $medicine)
                            @include('examination.component_medicine_findmymedicine', ['medicine' => $medicine])
                        @endforeach
                    @else
                        <h3 class="no-data text-center">{{ __('home.no data') }}</h3>
                    @endif
                </div>
                <div class="d-flex justify-content-center" style="padding: 12px">
                    <div class=" list-title d-flex">
                        <div class="list--doctor p-0">
                            <p>{{ __('home.New medicine') }}</p>
                        </div>
                        <div class="ms-auto p-2"><a
                                href="{{route('examination.newmedicine')}}">{{ __('home.See all') }}</a></div>
                    </div>
                </div>
                <div class="row list-doctor m-auto find-my-medicine-2">
                    @if(count($newMedicines) > 0)
                        @foreach($newMedicines as $medicine)
                            @include('examination.component_medicine_findmymedicine', ['medicine' => $medicine])
                        @endforeach
                    @else
                        <h3 class="no-data text-center">{{ __('home.no data') }}</h3>
                    @endif
                </div>
                <div class="d-flex justify-content-center" style="padding: 12px">
                    <div class=" list-title d-flex">
                        <div class="list--doctor p-0">
                            <p>{{ __('home.Recommended') }}</p>
                        </div>
                        <div class="ms-auto p-2"><a
                                href="{{route('examination.recommended')}}">{{ __('home.See all') }}</a></div>
                    </div>
                </div>
                <div class="row list-doctor m-auto find-my-medicine-2">
                    @if(count($recommendedMedicines) > 0)
                        @foreach($recommendedMedicines as $medicine)
                            @include('examination.component_medicine_findmymedicine', ['medicine' => $medicine])
                        @endforeach
                    @else
                        <h3 class="no-data text-center">{{ __('home.no data') }}</h3>
                    @endif
                </div>
                <div class="d-flex justify-content-center" style="padding: 12px">
                    <div class=" list-title d-flex">
                        <div class="list--doctor p-0">
                            <p>{{ __('home.Functional Foods') }}</p>
                        </div>
                        <div class="ms-auto p-2"><a href="#">{{ __('home.See all') }}</a></div>
                    </div>
                </div>
                <div class="row list-doctor m-auto find-my-medicine-2">
                    @if(count($function_foods) > 0)
                        @foreach($function_foods as $medicine)
                            @include('examination.component_medicine_findmymedicine', ['medicine' => $medicine])
                        @endforeach
                    @else
                        <h3 class="no-data text-center">{{ __('home.no data') }}</h3>
                    @endif
                </div>
            </div>
        </div>
        <script>

            let category_id = '';
            let location_id = '';
            let name = '';

            function handleSearch() {
                let url = `{{ route('examination.findmymedicine') }}`;
                url += `?category_id=${category_id}&location_id=${location_id}&name=${name}`;

                try {
                    $.ajax({
                        url: url,
                        method: 'GET',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (response) {
                            console.log(response)
                        },
                        error: function (exception) {
                        }
                    });
                } catch (error) {
                    throw error;
                }

            }


            function searchByCategory(value) {
                category_id = value;
                handleSearch();
            }

            function searchByLocation(value) {
                location_id = value;
                handleSearch();
            }

            function searchByName(value) {
                name = value;
                handleSearch();
            }


            $(document).ready(function () {
                $('.medicine-product').on('click', function () {
                    $('.medicine-product').removeClass('active');
                    $(this).addClass('active');
                    let medicine = $(this).data('medicine');
                    callListDoctorByDepartment(medicine);
                })

                $('.frame .frame-wrapper-heart').on('click', function () {
                    $(this).find('i').toggleClass('bi-heart');
                    $(this).find('i').toggleClass('bi-heart-fill');
                })

                function showListMedicineByCategory(res, medicine) {
                    let html = ``;
                    let url = `{{ asset('storage') }}`;
                    let detail = `{{ route('medicine.detail', ['id' => ':id']) }}`;
                    for (let i = 0; i < res.length; i++) {
                        let item = res[i];
                        let mainUrl = detail.replace(':id', item['id']);
                        let imageDoctor = item['thumbnail'];
                        let myArray = imageDoctor.split("/storage");
                        html = html + `<div class=" col-sm-3">
                                <div class="card">
                            <i class="bi bi-heart"></i>
                            <img loading="lazy" src="${url}${myArray[1]}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="${mainUrl}"><h5 class="card-title">${item['name']}</h5></a>
                                <p class="card-text_1">{{ __('home.Location') }}: <b>${item['address_code']}</b></p>
                                <p class="card-text_1">Price: <b>${item['price']} ${item['unit_price']}</b></p>
                            </div>
                            </div>
                        </div>`;
                    }
                    let listDoctor = `<div class="list-doctor row m-auto"> ${html} </div>`;
                    let showMedicine = ` <div class="d-flex justify-content-center">
                <div class=" list-title d-flex">
                    <div class="list--doctor p-0">
                        <p>${medicine.name}</p>
                    </div>
                    <div class="ms-auto p-2"><a href="{{route('examination.findmymedicine')}}">See all</a></div>
                </div>
            </div>`;
                    let allHtml = showMedicine + listDoctor;
                    $('#list-find-my-medicine').empty().append(allHtml);
                }

                async function callListDoctorByDepartment(department) {
                    let url = `{{route('restapi.get.products.medicines.category', ['id' => ':id'])}}/?size=4`;
                    url = url.replace(':id', department['id']);
                    await $.ajax({
                        url: url,
                        method: 'GET',
                        success: function (response) {
                            showListMedicineByCategory(response, department);
                        },
                        error: function (exception) {
                            console.log(exception)
                        }
                    });
                }

                var mySwiper = new Swiper('.swiper-container', {
                    loop: true,
                    nextButton: '.swiper-button-next',
                    prevButton: '.swiper-button-prev',
                    slidesPerView: 3,
                    paginationClickable: true,
                    spaceBetween: 20,
                    breakpoints: {
                        1920: {
                            slidesPerView: 4,
                            spaceBetween: 20
                        },
                        1028: {
                            slidesPerView: 3,
                            spaceBetween: 20
                        },
                        480: {
                            slidesPerView: 2,
                            spaceBetween: 10
                        }
                    }
                });
            })
        </script>
    </div>
@endsection

