@extends('layouts.master')
@section('title', 'Flea Market')
@section('content')
    @include('layouts.partials.headerFleaMarket')
    <body>
    @include('component.banner')
    <div class="container mt-70">
        <div class="d-flex mt-70">
            <div class="col-md-3 flea-content ">Flea market</div>
            <div class="col-md-4 flea-search d-flex">
                <input placeholder="Search for anything…">
                <div class="icons-icon-fill">
                    <div class="icons-filter"><img class="icon" src="{{asset('img/flea-market/filter.png')}}"/></div>
                </div>
            </div>
            <div class="d-flex col-md-4">
                <form action="#" class="col-md-4 flea-button mr-3">
                <button class="flea-btn">Sell my product</button>
                </form>
                <form action="{{route('flea.market.my.store')}}" class="col-md-4 flea-button mr-3">
                    <button class="flea-btn" >Go to my store</button>
                </form>
                <form action="{{route('flea.market.wish.list')}}" class="col-md-4 flea-button">
                <button class="flea-btn">Wish list</button>
                </form>
            </div>
        </div>
        <div class="d-flex mt-88">
            <div class="col-md-3 ">
                <div class="border-radius ">
                    <div class="flea-text">Filter</div>
                    <div>
                        <input type="checkbox">
                        <label class="flea-text-gray">All (96)</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label class="flea-text-gray">Equipments (71)</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label class="flea-text-gray">Furniture (55)</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label class="flea-text-gray">Medicine (54)</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label class="flea-text-gray">Cosmetics (49)</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label class="flea-text-gray">Furniture (53)</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label class="flea-text-gray">Others (47)</label>
                    </div>
                    <div class="flea-text-sp">See all categories</div>
                </div>
                <div class="border-radius mt-3">
                    <h4>Price</h4>
                    <div class="d-flex">
                        <input class="flea-input-price" placeholder="$ 0">
                        <div><img src="{{asset('img/flea-market/line.png')}}"></div>
                        <input class="flea-input-price" placeholder="$ 0">
                    </div>
                    <div><img class="w-100 h-100 m-0" src="{{asset('img/flea-market/sixebar.png')}}"></div>
                </div>
                <div class="mt-100">
                    <div class="flea-adv row align-items-center justify-content-center">
                        <div class="">ADVERTISEMENT</div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="img-union"><img src="{{asset('img/flea-market/platinum.png')}}"></div>
                <div class=" d-flex">
                    <div class="col-md-4">
                        <a href="{{route('flea.market.product.detail')}}">
                            <div class="border-radius-product d-block">
                                <div class="justify-content-end row">
                                    <i class="bi bi-heart"></i>
                                </div>
                                <div>
                                    <img src="{{asset('img/item_shopping.png')}}">
                                </div>
                                <div>
                                    <div class="flea-content-product"><strong>Máy tạo oxy 5 lít Reiwa K5BW</strong>
                                    </div>
                                    <p>Location: <strong>Ha Noi</strong></p>
                                    <div class="flea-prise">
                                        <strong>599,000 VND</strong>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <div class="border-radius-product d-block">
                                <div class="justify-content-end row">
                                    <i class="bi bi-heart"></i>
                                </div>
                                <div>
                                    <img src="{{asset('img/item_shopping.png')}}">
                                </div>
                                <div>
                                    <div class="flea-content-product"><strong>Máy tạo oxy 5 lít Reiwa K5BW</strong>
                                    </div>
                                    <p>Location: <strong>Ha Noi</strong></p>
                                    <div class="flea-prise">
                                        <strong>599,000 VND</strong>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <div class="border-radius-product d-block">
                                <div class="justify-content-end row">
                                    <i class="bi bi-heart"></i>
                                </div>
                                <div>
                                    <img src="{{asset('img/item_shopping.png')}}">
                                </div>
                                <div>
                                    <div class="flea-content-product"><strong>Máy tạo oxy 5 lít Reiwa K5BW</strong>
                                    </div>
                                    <p>Location: <strong>Ha Noi</strong></p>
                                    <div class="flea-prise">
                                        <strong>599,000 VND</strong>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="img-union mt-60"><img src="{{asset('img/flea-market/premium.png')}}"></div>
                <div class=" d-flex">
                    <div class="col-md-4">
                        <a href="#">
                            <div class="border-radius-product d-block">
                                <div class="justify-content-end row">
                                    <i class="bi bi-heart"></i>
                                </div>
                                <div>
                                    <img src="{{asset('img/item_shopping.png')}}">
                                </div>
                                <div>
                                    <div class="flea-content-product"><strong>Máy tạo oxy 5 lít Reiwa K5BW</strong>
                                    </div>
                                    <p>Location: <strong>Ha Noi</strong></p>
                                    <div class="flea-prise">
                                        <strong>599,000 VND</strong>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <div class="border-radius-product d-block">
                                <div class="justify-content-end row">
                                    <i class="bi bi-heart"></i>
                                </div>
                                <div>
                                    <img src="{{asset('img/item_shopping.png')}}">
                                </div>
                                <div>
                                    <div class="flea-content-product"><strong>Máy tạo oxy 5 lít Reiwa K5BW</strong>
                                    </div>
                                    <p>Location: <strong>Ha Noi</strong></p>
                                    <div class="flea-prise">
                                        <strong>599,000 VND</strong>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <div class="border-radius-product d-block">
                                <div class="justify-content-end row">
                                    <i class="bi bi-heart"></i>
                                </div>
                                <div>
                                    <img src="{{asset('img/item_shopping.png')}}">
                                </div>
                                <div>
                                    <div class="flea-content-product"><strong>Máy tạo oxy 5 lít Reiwa K5BW</strong>
                                    </div>
                                    <p>Location: <strong>Ha Noi</strong></p>
                                    <div class="flea-prise">
                                        <strong>599,000 VND</strong>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="img-union mt-60"><img src="{{asset('img/flea-market/silver.png')}}"></div>
                <div class=" d-flex">
                    <div class="col-md-4">
                        <a href="#">
                            <div class="border-radius-product d-block">
                                <div class="justify-content-end row">
                                    <i class="bi bi-heart"></i>
                                </div>
                                <div>
                                    <img src="{{asset('img/item_shopping.png')}}">
                                </div>
                                <div>
                                    <div class="flea-content-product"><strong>Máy tạo oxy 5 lít Reiwa K5BW</strong>
                                    </div>
                                    <p>Location: <strong>Ha Noi</strong></p>
                                    <div class="flea-prise">
                                        <strong>599,000 VND</strong>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <div class="border-radius-product d-block">
                                <div class="justify-content-end row">
                                    <i class="bi bi-heart"></i>
                                </div>
                                <div>
                                    <img src="{{asset('img/item_shopping.png')}}">
                                </div>
                                <div>
                                    <div class="flea-content-product"><strong>Máy tạo oxy 5 lít Reiwa K5BW</strong>
                                    </div>
                                    <p>Location: <strong>Ha Noi</strong></p>
                                    <div class="flea-prise">
                                        <strong>599,000 VND</strong>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <div class="border-radius-product d-block">
                                <div class="justify-content-end row">
                                    <i class="bi bi-heart"></i>
                                </div>
                                <div>
                                    <img src="{{asset('img/item_shopping.png')}}">
                                </div>
                                <div>
                                    <div class="flea-content-product"><strong>Máy tạo oxy 5 lít Reiwa K5BW</strong>
                                    </div>
                                    <p>Location: <strong>Ha Noi</strong></p>
                                    <div class="flea-prise">
                                        <strong>599,000 VND</strong>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

@endsection
