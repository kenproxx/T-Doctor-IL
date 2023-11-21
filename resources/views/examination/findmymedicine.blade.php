@extends('layouts.master')
@section('title', 'Find By Medicine')
<style>
    .list-category {
        width: 80%;
        overflow: hidden;
        margin: auto 8px;
    }

    .item-category {
        cursor: pointer;
        margin: auto 8px;
    }

    .center-container{
        height: 60%;
    }

    .img-item-category{
        max-width: 200px;
        border:  1px solid #ccc;
        border-radius: 50%;
    }

    .swiper-container {
        width: 800px;
        height: 250px;
    }

    .swiper-wrapper-0 {
        z-index: 0!important;
    }
</style>
@section('content')
    @include('layouts.partials.header_3')
    @include('component.banner')
    <div id="examination-scene" class="container ">
        <div class="d-flex justify-content-center">
            <div id="filter" class="box--1 d-flex ">
                <div class="d-flex flex-fill">
                    <div class="filter_option" style="list-style: none;">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Category
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($categoryMedicines as $categoryMedicine)
                                    <a class="dropdown-item medicine-product" href="#"
                                       data-medicine="{{ $categoryMedicine }}">{{ $categoryMedicine->name }}</a>
                                @endforeach
                            </div>
                        </li>
                    </div>
                    <div class="filter_option"><p>Location</p></div>
                </div>
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control" placeholder="Search for anything…">
                </div>
            </div>
        </div>
        <div class="list-category container">
{{--            <nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <ul class="navbar-nav mr-auto">--}}
{{--                        @foreach($categoryMedicines as $categoryMedicine)--}}
{{--                            <li class="nav-item item-category medicine-product text-center " data-medicine="{{ $categoryMedicine }}">--}}
{{--                                <div class="center-container d-flex justify-content-center align-items-center">--}}
{{--                                    <img class="img-item-category" src="{{ asset($categoryMedicine->thumbnail) }}" alt="">--}}
{{--                                </div>--}}
{{--                                <p class="nav-link">{{ $categoryMedicine->name }}</p>--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </nav>--}}
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper swiper-wrapper-0">
                    <!-- Slides -->
                    @foreach($categoryMedicines as $categoryMedicine)
                        <div class="nav-item swiper-slide">
                            <div class="item-category medicine-product text-center" data-medicine="{{ $categoryMedicine }}">
                                <div class="center-container d-flex justify-content-center align-items-center">
                                    <img class="img-item-category" src="{{ asset($categoryMedicine->thumbnail) }}" alt="">
                                </div>
                                <p class="nav-link">{{ $categoryMedicine->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="list-find-my-medicine">
            <div class="d-flex justify-content-center" style="padding: 12px">
                <div class="list-title d-flex">
                    <div class="list--doctor p-0">
                        <p>Best Pharmacists</p>
                    </div>
                    <div class="ms-auto p-2"><a href="{{route('examination.bestpharmacists')}}">See all</a></div>
                </div>
            </div>
            <div class="row list-doctor m-auto">
                @if(count($bestPhamrmacists) > 0)
                    @foreach($bestPhamrmacists as $bestPhamrmacist)
                        <div class="col-md-3">
                            <div class="card">
                                <i class="bi bi-heart"></i>
                                @php
                                    $arrayGallery=[];
                                    $gallery = $bestPhamrmacist->gallery;
                                    if ($gallery){
                                        $arrayGallery = explode(',', $gallery);
                                    }
                                    $text = '';
                                    switch ($bestPhamrmacist->time_work){
                                        case \App\Enums\TypeTimeWork::ALL:
                                            $text = '24/7';
                                            break;
                                        case \App\Enums\TypeTimeWork::OTHER:
                                            $text = 'Other';
                                            break;
                                        case \App\Enums\TypeTimeWork::ONLY_MORNING:
                                            $text = 'All morning';
                                            break;
                                        case \App\Enums\TypeTimeWork::ONLY_AFTERNOON:
                                            $text = 'All afternoon';
                                            break;
                                        default:
                                            $text = 'Private';
                                            break;

                                    }

                                @endphp
                                @if(count($arrayGallery) > 0)
                                    <img src="{{asset($arrayGallery[0])}}" class="card-img-top" alt="...">
                                @endif
                                <div class="card-body">
                                    <a href="#"><h5
                                            class="card-title"> {{ $bestPhamrmacist->name }}</h5></a>
                                    <p class="card-text_1">Location: <b>{{ $bestPhamrmacist->address_detail }}</b></p>
                                    <p class="card-text_1">Working time: <b> {{ $text }}</b></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="d-flex justify-content-center" style="padding: 12px">
                <div class=" list-title d-flex">
                    <div class="list--doctor p-0">
                        <p>New Pharmacists</p>
                    </div>
                    <div class="ms-auto p-2"><a href="{{route('examination.newpharmacists')}}">See all</a></div>
                </div>
            </div>
            <div class="row list-doctor m-auto">
                @if(count($newPhamrmacists) > 0)
                    @foreach($newPhamrmacists as $newPhamrmacist)
                        <div class="col-md-3">
                            <div class="card ">
                                <i class="bi bi-heart"></i>
                                @php
                                    $arrayGallery=[];
                                    $gallery = $newPhamrmacist->gallery;
                                    if ($gallery){
                                        $arrayGallery = explode(',', $gallery);
                                    }
                                    $text = '';
                                    switch ($newPhamrmacist->time_work){
                                        case \App\Enums\TypeTimeWork::ALL:
                                            $text = '24/7';
                                            break;
                                        case \App\Enums\TypeTimeWork::OTHER:
                                            $text = 'Other';
                                            break;
                                        case \App\Enums\TypeTimeWork::ONLY_MORNING:
                                            $text = 'All morning';
                                            break;
                                        case \App\Enums\TypeTimeWork::ONLY_AFTERNOON:
                                            $text = 'All afternoon';
                                            break;
                                        default:
                                            $text = 'Private';
                                            break;

                                    }

                                @endphp
                                @if(count($arrayGallery) > 0)
                                    <img src="{{asset($arrayGallery[0])}}" class="card-img-top" alt="...">
                                @endif
                                <div class="card-body">
                                    <a href="#"><h5
                                            class="card-title"> {{ $newPhamrmacist->name }}</h5></a>
                                    <p class="card-text_1">Location: <b>{{ $newPhamrmacist->address_detail }}</b></p>
                                    <p class="card-text_1">Working time: <b> {{ $text }}</b></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="d-flex justify-content-center" style="padding: 12px">
                <div class=" list-title d-flex">
                    <div class="list--doctor p-0">
                        <p>24/7 Available Pharmacists</p>
                    </div>
                    <div class="ms-auto p-2"><a href="{{route('examination.availablepharmacists')}}">See all</a></div>
                </div>
            </div>
            <div class="row list-doctor m-auto">
                @if(count($allPhamrmacists) > 0)
                    @foreach($allPhamrmacists as $allPhamrmacist)
                        <div class=" col-md-3">
                            <div class=card>
                                <i class="bi bi-heart"></i>
                                @php
                                    $arrayGallery=[];
                                    $gallery = $allPhamrmacist->gallery;
                                    if ($gallery){
                                        $arrayGallery = explode(',', $gallery);
                                    }
                                    $text = '';
                                    switch ($allPhamrmacist->time_work){
                                        case \App\Enums\TypeTimeWork::ALL:
                                            $text = '24/7';
                                            break;
                                        case \App\Enums\TypeTimeWork::OTHER:
                                            $text = 'Other';
                                            break;
                                        case \App\Enums\TypeTimeWork::ONLY_MORNING:
                                            $text = 'All morning';
                                            break;
                                        case \App\Enums\TypeTimeWork::ONLY_AFTERNOON:
                                            $text = 'All afternoon';
                                            break;
                                        default:
                                            $text = 'Private';
                                            break;

                                    }

                                @endphp
                                @if(count($arrayGallery) > 0)
                                    <img src="{{asset($arrayGallery[0])}}" class="card-img-top" alt="...">
                                @endif
                                <div class="card-body">
                                    <a href="#"><h5
                                            class="card-title"> {{ $allPhamrmacist->name }}</h5></a>
                                    <p class="card-text_1">Location: <b>{{ $allPhamrmacist->address_detail }}</b></p>
                                    <p class="card-text_1">Working time: <b> {{ $text }}</b></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="d-flex justify-content-center" style="padding: 12px">
                <div class=" list-title d-flex">
                    <div class="list--doctor p-0">
                        <p>Hot deal medicine</p>
                    </div>
                    <div class="ms-auto p-2"><a href="{{route('examination.hotdealmedicine')}}">See all</a></div>
                </div>
            </div>
            <div class="row list-doctor m-auto">
                @if(count($hotMedicines) > 0)
                    @foreach($hotMedicines as $hotMedicine)
                        @php
                            $user = \App\Models\User::find($hotMedicine->user_id);
                        @endphp
                        <div class="col-md-3">
                            <div class="card">
                                <i class="bi bi-heart"></i>
                                <img src="{{asset($hotMedicine->thumbnail)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <a href="{{ route('medicine.detail', $hotMedicine->id) }}"><h5
                                            class="card-title">{{ $hotMedicine->name }}</h5></a>
                                    <p class="card-text_1">Location: <b>{{ $user->address_code }}</b></p>
                                    <p class="card-text_1">Price:
                                        <b>{{ $hotMedicine->price }} {{ $hotMedicine->unit_price }}</b></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="d-flex justify-content-center" style="padding: 12px">
                <div class=" list-title d-flex">
                    <div class="list--doctor p-0">
                        <p>New medicine</p>
                    </div>
                    <div class="ms-auto p-2"><a href="{{route('examination.newmedicine')}}">See all</a></div>
                </div>
            </div>
            <div class="row list-doctor  m-auto">
                @if(count($newMedicines) > 0)
                    @foreach($newMedicines as $newMedicine)
                        @php
                            $user = \App\Models\User::find($newMedicine->user_id);
                        @endphp
                        <div class="col-md-3">
                            <div class="card">
                                <i class="bi bi-heart"></i>
                                <img src="{{asset($newMedicine->thumbnail)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <a href="{{ route('medicine.detail', $newMedicine->id) }}"><h5
                                            class="card-title">{{ $newMedicine->name }}</h5></a>
                                    <p class="card-text_1">Location: <b>{{ $user->address_code }}</b></p>
                                    <p class="card-text_1">Price:
                                        <b>{{ $newMedicine->price }} {{ $newMedicine->unit_price }}</b></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="d-flex justify-content-center" style="padding: 12px">
                <div class=" list-title d-flex">
                    <div class="list--doctor p-0">
                        <p>Recommended</p>
                    </div>
                    <div class="ms-auto p-2"><a href="{{route('examination.recommended')}}">See all</a></div>
                </div>
            </div>
            <div class="row list-doctor m-auto">
                @if(count($recommendedMedicines) > 0)
                    @foreach($recommendedMedicines as $recommendedMedicine)
                        @php
                            $user = \App\Models\User::find($recommendedMedicine->user_id);
                        @endphp
                        <div class="col-md-3">
                            <div class="card">
                                <i class="bi bi-heart"></i>
                                <img src="{{asset($recommendedMedicine->thumbnail)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <a href="{{ route('medicine.detail', $recommendedMedicine->id) }}"><h5
                                            class="card-title">{{ $recommendedMedicine->name }}</h5></a>
                                    <p class="card-text_1">Location: <b>{{ $user->address_code }}</b></p>
                                    <p class="card-text_1">Price:
                                        <b>{{ $recommendedMedicine->price }} {{ $recommendedMedicine->unit_price }}</b>
                                    </p>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endif
            </div>
            <div class="d-flex justify-content-center" style="padding: 12px">
                <div class=" list-title d-flex">
                    <div class="list--doctor p-0">
                        <p>Functional Foods</p>
                    </div>
                    <div class="ms-auto p-2"><a href="#">See all</a></div>
                </div>
            </div>
            <div class="row list-doctor m-auto">
                @if($function_foods)
                    @if(count($function_foods) > 0)
                        @foreach($function_foods as $function_food)
                            @php
                                $user = \App\Models\User::find($function_food->user_id);
                            @endphp
                            <div class=" col-md-3">
                                <div class="card">
                                    <i class="bi bi-heart"></i>
                                    <img src="{{asset($function_food->thumbnail)}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <a href="{{ route('medicine.detail', $function_food->id) }}"><h5
                                                class="card-title">{{ $function_food->name }}</h5></a>
                                        <p class="card-text_1">Location: <b>{{ $user->address_code }}</b></p>
                                        <p class="card-text_1">Price:
                                            <b>{{ $function_food->price }} {{ $function_food->unit_price }}</b></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.medicine-product').on('click', function () {
                $('.medicine-product').removeClass('active');
                $(this).addClass('active');
                let medicine = $(this).data('medicine');
                callListDoctorByDepartment(medicine);
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
                    html = html + `<div class=" col-md-3">
                                <div class="card">
                            <i class="bi bi-heart"></i>
                            <img src="${url}${myArray[1]}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="${mainUrl}"><h5 class="card-title">${item['name']}</h5></a>
                                <p class="card-text_1">Location: <b>${item['address_code']}</b></p>
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

            var mySwiper = new Swiper ('.swiper-container', {
                speed: 400,
                spaceBetween: 100,
                initialSlide: 0,
                //truewrapper adoptsheight of active slide
                autoHeight: false,
                // Optional parameters
                direction: 'horizontal',
                loop: true,
                // delay between transitions in ms
                autoplay: 5000,
                autoplayStopOnLast: false, // loop false also
                // If we need pagination
                pagination: '.swiper-pagination',
                paginationType: "bullets",

                // Navigation arrows
                nextButton: '.swiper-button-next',
                prevButton: '.swiper-button-prev',

                // And if we need scrollbar
                //scrollbar: '.swiper-scrollbar',
                // "slide", "fade", "cube", "coverflow" or "flip"
                effect: 'slide',
                // Distance between slides in px.
                spaceBetween: 60,
                //
                slidesPerView: 2,
                //
                centeredSlides: true,
                //
                slidesOffsetBefore: 0,
                //
                grabCursor: true,
            })

        })
    </script>
@endsection

