@extends('layouts.master')
@section('title', 'Online Medicine')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="recruitment-details ">
        <div class="container">
            <div class="row medicine-search">
                <div class="medicine-search--left col-md-3 d-flex justify-content-around">
                    <div class="title" style="list-style: none;">
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
                    <div class="title">Location <i class="bi bi-arrow-down-up"></i></div>
                </div>
                <div class="medicine-search--center col-md-6 row d-flex justify-content-between">
                    <form class="search-box col-md-10">
                        <input type="search" name="focus" placeholder="Search" id="search-input" value="">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </form>
                    <button type="button" data-toggle="modal" data-target="#modalCart" class="shopping-bag">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <div class="text-wrapper">1</div>
                    </button>
                    @include('component.modal-cart')
                </div>
                <div class="medicine-search--right col-md-3 d-flex row justify-content-between">
                    <div class="col-md-6 ">
                        <div class="div-wrapper">
                            <button type="button" data-toggle="modal" data-target="#modalCreatPrescription">Create
                                prescription
                            </button>
                        </div>
                    </div>
                    @include('component.modalCreatPrescription')
                    <div class="col-md-6">
                        <div class="div-wrapper">
                            <a href="{{route('medicine.wishList')}}">Wish list</a>
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{route('medicine')}}" class="recruitment-details--title"><i class="fa-solid fa-arrow-left"></i>
                Product details</a>
            <div class="row recruitment-details--content">
                <div class="col-md-8 recruitment-details--content--left">
                    <div class="img-main">
                        <img src="{{asset($medicine->thumbnail)}}" alt="show" class="main">
                    </div>
                    <div class="list d-flex">
                        @php
                            $gallery = $medicine->gallery;
                            $arrayGallery = explode(',', $gallery);
                        @endphp
                        @foreach($arrayGallery as $item)
                            <div class="item">
                                <img src="{{asset($item)}}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4 recruitment-details--content--right">
                    <div class="product-details">
                        <div class="body">
                            <p class="text-wrapper">{{ $medicine->name }}</p>
                            <div class="price">{{ $medicine->price }} {{ $medicine->unit_price }}</div>
                            <div class="brand-name d-flex">
                                <div class="text-wrapper-2">Location:</div>
                                @php
                                    $user = \App\Models\User::find($medicine->user_id)
                                @endphp
                                <div class="text-wrapper-3">{{ $user->address_code }}</div>
                            </div>
                            <div class="brand-name d-flex">
                                <div class="text-wrapper-2">Category:</div>
                                @php
                                    $category = \App\Models\online_medicine\CategoryProduct::find($medicine->category_id)
                                @endphp
                                <div class="text-wrapper-3">{{ $category->name }}</div>
                            </div>
                            <div class="brand-name d-flex">
                                <div class="text-wrapper-2">Brand name:</div>
                                <div class="text-wrapper-3">{{ $medicine->brand_name }}</div>
                            </div>
                        </div>
                        <div class="button row justify-content-between">
                            <div class="col-6"><button class="div-wrapper">Visit store</button></div>
                            <div class="col-6"><button id="button-apply" class="text-wrapper-5">Buy now</button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="recruitment-details--text">
                {!! $medicine->description !!}
            </div>
        </div>
    </div>

    <script>
        $('.list img').click(function () {
            $(".main").attr("src", $(this).attr('src'));
        })
    </script>
@endsection
