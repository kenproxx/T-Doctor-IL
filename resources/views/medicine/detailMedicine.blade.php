@php use App\Http\Controllers\MainController; @endphp
@php use App\Models\User; @endphp
@php use App\Models\online_medicine\CategoryProduct; @endphp
@php use Illuminate\Support\Facades\Auth; @endphp
@php use App\Enums\TypeProductCart; @endphp
@extends('layouts.master')
@section('title', 'Online Medicine')
@section('content')
    @php
        $isAdmin = (new MainController())->checkAdmin();
        $isBusiness = (new MainController())->checkBusiness();
        $isMedical = (new MainController())->checkMedical();
    @endphp
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="recruitment-details ">
        <div class="container">
            <div class="row medicine-search">
                <div class="col-md-10"></div>
                <div class="medicine-search--center col-md-2">
                    @if(Auth::check())
                        @if($isMedical)
                            <button type="button" data-toggle="modal" data-target="#modalCart"
                                    class="shopping-bag float-right">
                                <i class="fa-solid fa-bag-shopping"></i>
                                @if($carts && count($carts) > 0)
                                    <div class="text-wrapper"> {{ count($carts) }}</div>
                                @endif
                            </button>
                            @include('component.modal-cart')
                        @endif
                    @endif

                </div>
            </div>

            <a href="{{route('medicine')}}" class="recruitment-details--title"><i class="fa-solid fa-arrow-left"></i>
                {{ __('home.Product details') }}</a>
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
                                <div class="text-wrapper-2">{{ __('home.Location') }}:</div>
                                @php
                                    $user = User::find($medicine->user_id)
                                @endphp
                                <div class="text-wrapper-3">{{ $user->address_code ?? '' }}</div>
                            </div>
                            <div class="brand-name d-flex">
                                <div class="text-wrapper-2">{{ __('home.Category') }}:</div>
                                @php
                                    $category = CategoryProduct::find($medicine->category_id)
                                @endphp
                                <div class="text-wrapper-3">{{ $category->name ?? ''}}</div>
                            </div>
                            <div class="brand-name d-flex">
                                <div class="text-wrapper-2">{{ __('home.Brand name') }}:</div>
                                <div class="text-wrapper-3">{{ $medicine->brand_name }}</div>
                            </div>
                            <div class="brand-name mt-2 mb-2">
                                <label class="text-wrapper-2" for="quantity">{{ __('home.Số lượng') }}: </label>
                                <input type="number" min="1" value="1" id="quantity" class="w-25 input-quantity">
                            </div>
                        </div>
                        <input type="text" value="{{ $medicine->id }}" id="productID" class="d-none">
                        <input type="text" value="{{ TypeProductCart::MEDICINE }}" id="type_product"
                               class="d-none">
                        <div class="row">
                            <div class="col-6">
                                <button id="btnVisitStore" class="btn btn-secondary w-100">{{ __('home.Visit store') }}</button>
                            </div>
                            <div class="col-6">
                                <button id="btnBuyNow" class="btn btn-primary w-100">{{ __('home.Buy now') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="recruitment-details--text">
                {!! $medicine->description !!}
            </div>
        </div>
    </div>
    @if(Auth::check())
        <input type="text" id="accessToken" class="d-none" value="{{ $_COOKIE['accessToken'] }}">
        <input type="text" id="userID" class="d-none" value="{{ Auth::user()->id }}">
    @endif

    <script>
        $(document).ready(function () {
            $('.list img').click(function () {
                $(".main").attr("src", $(this).attr('src'));
            })

            $('#btnBuyNow').on('click', function () {
                const headers = {
                    'Authorization': `Bearer ${token}`
                };
                let userID = document.getElementById('userID').value;

                let productID = $('#productID').val();
                let typeProduct = '{{ TypeProductCart::MEDICINE }}';
                let quantity = $('#quantity').val();

                let data = {
                    user_id: userID,
                    product_id: productID,
                    type_product: typeProduct,
                    quantity: quantity,
                };

                try {
                    $.ajax({
                        url: `{{route('api.backend.cart.create')}}`,
                        method: 'POST',
                        headers: headers,
                        data: data,
                        success: function (response) {
                            alert('Success!');
                            window.location.reload();
                        },
                        error: function (exception) {
                        }
                    });
                } catch (error) {
                    throw error;
                }

            })
        })
    </script>
@endsection
