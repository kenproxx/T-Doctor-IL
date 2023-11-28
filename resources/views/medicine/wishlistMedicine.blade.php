@extends('layouts.master')
@section('title', 'Online Medicine')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')

    <div class="medicine container">
        <div class="row medicine-search">
            <div class="medicine-search--left col-md-3 d-flex justify-content-around">
                <div class="title">{{ __('home.Category') }} <i class="bi bi-arrow-down-up"></i></div>
                <div class="title">{{ __('home.Location') }} <i class="bi bi-arrow-down-up"></i></div>
            </div>
            <div class="medicine-search--center col-md-6 row d-flex justify-content-between">
                <form class="search-box col-md-10">
                    <input type="search" name="focus" placeholder="{{ __('home.Search for...') }}" id="search-input" value="">
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
                        <button type="button" data-toggle="modal" data-target="#modalCreatPrescription">{{ __('home.Create prescription') }}
                        </button>
                    </div>
                </div>
                @include('component.modalCreatPrescription')
                <div class="col-md-6">
                    <div class="div-wrapper">
                        <a href="{{route('medicine.wishList')}}">{{ __('home.Wish list') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="medicine-list row">
            <div class="col-md-3 medicine-list--filter">
                <div class="filter">
                    <div class="filter-header d-flex justify-content-between">
                        <div class="text-wrapper">{{ __('home.Filter') }}</div>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="filter-body">
                        <div class="d-flex item">
                            <input type="checkbox">
                            <div class="text-all">{{ __('home.All') }} (96)</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox">
                            <div class="text">{{ __('home.Heath') }}</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox">
                            <div class="text">{{ __('home.Beauty') }}</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox">
                            <div class="text">{{ __('home.Kids') }}</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox">
                            <div class="text">{{ __('home.Pets') }}</div>
                        </div>
                    </div>
                </div>
                <div class="filter">
                    <div class="filter-header d-flex justify-content-between">
                        <div class="text-wrapper">{{ __('home.Object') }}</div>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="filter-body">
                        <div class="d-flex item">
                            <input type="checkbox">
                            <div class="text">{{ __('home.For kids') }}</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox">
                            <div class="text">{{ __('home.For women') }}</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox">
                            <div class="text">{{ __('home.For men') }}</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox">
                            <div class="text">{{ __('home.For adults') }}</div>
                        </div>
                    </div>
                </div>
                <div class="price">
                    <div class="text-wrapper">{{ __('home.Price') }}</div>
                    <div class="wrapper">
                        <div class="price-input">
                            <div class="field">
                                <input type="number" class="input-min" value="0">
                            </div>
                            <div class="separator">-</div>
                            <div class="field">
                                <input type="number" class="input-max" value="0">
                            </div>
                        </div>
                        <div class="slider">
                            <div class="progress"></div>
                        </div>
                        <div class="range-input">
                            <input type="range" class="range-min" min="0" max="10000" value="2500" step="100">
                            <input type="range" class="range-max" min="0" max="10000" value="7500" step="100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 medicine-list--item">
                <div class="page row ">
                    @for($i = 0; $i < 12; $i++)
                        <div class="col-md-4 item">
                            @include('component.product-wish')
                        </div>
                    @endfor
                </div>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">{{ __('home.Previous') }}</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">{{ __('home.Next') }}</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script>
        const rangeInput = document.querySelectorAll(".range-input input"),
            priceInput = document.querySelectorAll(".price-input input"),
            range = document.querySelector(".slider .progress");
        let priceGap = 1000;

        priceInput.forEach((input) => {
            input.addEventListener("input", (e) => {
                let minPrice = parseInt(priceInput[0].value),
                    maxPrice = parseInt(priceInput[1].value);

                if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
                    if (e.target.className === "input-min") {
                        rangeInput[0].value = minPrice;
                        range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
                    } else {
                        rangeInput[1].value = maxPrice;
                        range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                    }
                }
            });
        });

        rangeInput.forEach((input) => {
            input.addEventListener("input", (e) => {
                let minVal = parseInt(rangeInput[0].value),
                    maxVal = parseInt(rangeInput[1].value);

                if (maxVal - minVal < priceGap) {
                    if (e.target.className === "range-min") {
                        rangeInput[0].value = maxVal - priceGap;
                    } else {
                        rangeInput[1].value = minVal + priceGap;
                    }
                } else {
                    priceInput[0].value = minVal;
                    priceInput[1].value = maxVal;
                    range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                    range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                }
            });
        });

    </script>
@endsection
