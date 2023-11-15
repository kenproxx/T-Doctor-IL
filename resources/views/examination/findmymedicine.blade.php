@extends('layouts.master')
@section('title', 'Home')
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
                                    <a class="dropdown-item doctor-department" href="#"
                                       data-department="{{ $categoryMedicine->id }}">{{ $categoryMedicine->name }}</a>
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
        <div class="d-flex justify-content-center">
            <div class=" list-title d-flex">
                <div class="list--doctor p-0">
                    <p>Best Pharmacists</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.bestpharmacists')}}">See all</a></div>
            </div>
        </div>
        <div class="d-flex list-doctor">
            @if(count($bestPhamrmacists) > 0)
                @foreach($bestPhamrmacists as $bestPhamrmacist)
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
                @endforeach
            @endif
        </div>
        <div class="d-flex justify-content-center">
            <div class=" list-title d-flex">
                <div class="list--doctor p-0">
                    <p>New Pharmacists</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.newpharmacists')}}">See all</a></div>
            </div>
        </div>
        <div class="d-flex list-doctor">
            @if(count($newPhamrmacists) > 0)
                @foreach($newPhamrmacists as $newPhamrmacist)
                    <div class="card">
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
                @endforeach
            @endif
        </div>
        <div class="d-flex justify-content-center">
            <div class=" list-title d-flex">
                <div class="list--doctor p-0">
                    <p>24/7 Available Pharmacists</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.availablepharmacists')}}">See all</a></div>
            </div>
        </div>
        <div class="d-flex list-doctor">
            @if(count($allPhamrmacists) > 0)
                @foreach($allPhamrmacists as $allPhamrmacist)
                    <div class="card">
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
                @endforeach
            @endif
        </div>
        <div class="d-flex justify-content-center">
            <div class=" list-title d-flex">
                <div class="list--doctor p-0">
                    <p>Hot deal medicine</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.hotdealmedicine')}}">See all</a></div>
            </div>
        </div>
        <div class="d-flex list-doctor">
            @if(count($hotMedicines) > 0)
                @foreach($hotMedicines as $hotMedicine)
                    @php
                        $user = \App\Models\User::find($hotMedicine->user_id);
                    @endphp
                    <div class="card">
                        <i class="bi bi-heart"></i>
                        <img src="{{asset($hotMedicine->thumbnail)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="#"><h5 class="card-title">{{ $hotMedicine->name }}</h5></a>
                            <p class="card-text_1">Location: <b>{{ $user->address_code }}</b></p>
                            <p class="card-text_1">Price: <b>{{ $hotMedicine->price }} {{ $hotMedicine->unit_price }}</b></p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="d-flex justify-content-center">
            <div class=" list-title d-flex">
                <div class="list--doctor p-0">
                    <p>New medicine</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.newmedicine')}}">See all</a></div>
            </div>
        </div>
        <div class="d-flex list-doctor">
            @if(count($newMedicines) > 0)
                @foreach($newMedicines as $newMedicine)
                    @php
                        $user = \App\Models\User::find($newMedicine->user_id);
                    @endphp
                    <div class="card">
                        <i class="bi bi-heart"></i>
                        <img src="{{asset($newMedicine->thumbnail)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="#"><h5 class="card-title">{{ $newMedicine->name }}</h5></a>
                            <p class="card-text_1">Location: <b>{{ $user->address_code }}</b></p>
                            <p class="card-text_1">Price: <b>{{ $newMedicine->price }} {{ $newMedicine->unit_price }}</b></p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="d-flex justify-content-center">
            <div class=" list-title d-flex">
                <div class="list--doctor p-0">
                    <p>Recommended</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.recommended')}}">See all</a></div>
            </div>
        </div>
        <div class="d-flex list-doctor">
            @if(count($recommendedMedicines) > 0)
                @foreach($recommendedMedicines as $recommendedMedicine)
                    @php
                        $user = \App\Models\User::find($recommendedMedicine->user_id);
                    @endphp
                    <div class="card">
                        <i class="bi bi-heart"></i>
                        <img src="{{asset($recommendedMedicine->thumbnail)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="#"><h5 class="card-title">{{ $recommendedMedicine->name }}</h5></a>
                            <p class="card-text_1">Location: <b>{{ $user->address_code }}</b></p>
                            <p class="card-text_1">Price: <b>{{ $recommendedMedicine->price }} {{ $recommendedMedicine->unit_price }}</b></p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection

