@extends('layouts.master')
@section('title', 'Flea Market')
@section('content')
    <style>
        .bi-heart-fill {
            color: red;
        }
    </style>
    @include('layouts.partials.headerFleaMarket')
    <body>
    @include('component.banner')

    <div class="container mt-70">
        <div class="container pc-hidden">
            <div class="row clinic-search">
                <div
                    class="clinic-search--left col-md-12 d-flex justify-content-between clinic-search--center align-items-center">
                    <div class="clinic-search--left col-md-6 justify-content-around mobile-hidden">
                        <div class="title mobile-hidden">{{ __('home.All') }} <i class="bi bi-arrow-down-up"></i></div>
                        <div class="title mobile-hidden">{{ __('home.Category') }} <i class="bi bi-arrow-down-up"></i>
                        </div>
                        <div class="title mobile-hidden">{{ __('home.Location') }}<i class="bi bi-arrow-down-up"></i>
                        </div>
                    </div>

                    <div class="search-box col-md-5">
                        <input class="m-0" type="Search" onkeyup="performSearch()" name="focus"
                               placeholder="{{ __('home.Search for anything…') }}" id="inputSearchMobile" value="">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="flex-fill">
                        <button class="navbar-toggler border-none css-button" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#filterNavbar" aria-controls="filterNavbar">
                            <i class="bi bi-filter"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex mt-70 mobile-hidden">
            <div class="col-md-3 flea-content ">{{ __('home.Flea market') }}</div>
            <div class="col-md-5 flea-search d-flex align-items-center">
                <i class="fa fa-search form-control-search"></i>
                <label for="inputSearch"></label><input onkeyup="performSearch()" id="inputSearch" type="Search"
                                                        placeholder="{{ __('home.Search for anything…') }}" value="">
            </div>

            @if(Auth::check())
                @if(auth()->user()->type!= \App\Enums\Role::NORMAL)
                    <div class="d-flex col-md-4 justify-content-between align-items-center">
                        <a href="#" onclick="checkLogin()" class="col-md-4 flea-button">
                            {{ __('home.Sell my product') }}
                        </a>
                        <a href="#" onclick="checkLoginWishStore()" class="col-md-4 flea-button flea-btn">
                            {{ __('home.Go to my store') }}
                        </a>
                        <a href="#" onclick="checkLoginWish()" class="col-md-4 flea-button flea-btn">
                            {{ __('home.Wish list') }}
                        </a>
                    </div>
                @else
                    <div class="d-flex col-md-4 justify-content-start align-items-center">
                        <a href="#" onclick="checkLoginWishStore()" class="col-md-4 flea-button flea-btn mr-3">
                            {{ __('home.Go to my store') }}
                        </a>
                        <a href="#" onclick="checkLoginWish()" class="col-md-4 flea-button flea-btn">
                            {{ __('home.Wish list') }}
                        </a>
                    </div>
                @endif
            @endif

        </div>
        <div class="d-flex mt-88">
            <div class="col-md-3  mobile-hidden">
                <div class="border-radius ">
                    <div class="flea-text">{{ __('home.Filter') }}</div>
                    @foreach($departments as $department)
                        <div>
                            <input type="checkbox" onchange="performSearch()" name="category_{{$department->id}}"
                                   id="category_{{$department->id}}">
                            <label for="category_{{$department->id}}"
                                   class="flea-text-gray">{{$department->name}}</label>
                        </div>
                    @endforeach
                    <div class="flea-text-sp">{{ __('home.See all categories') }}</div>
                </div>
                <div class="border-radius mt-3 ">
                    <div class="d-flex">
                        <div class="wrapper">
                            <header>
                                <h2>{{ __('home.Price') }}</h2>
                            </header>
                            <div class="price-input">
                                <div class="field">
                                    <input type="number" onchange="performSearch()" id="inputProductMin"
                                           class="rangePrice input-min" value="0">
                                </div>
                                <div class="separator">-</div>
                                <div class="field">
                                    <input type="number" onchange="performSearch()" id="inputProductMax"
                                           class="rangePrice input-max" value="0">
                                </div>
                            </div>
                            <div class="slider">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input">
                                <input type="range" onchange="performSearch()" class="rangePrice range-min" min="0"
                                       max="100000" value="25000" step="1000">
                                <input type="range" onchange="performSearch()" class="rangePrice range-max" min="0"
                                       max="100000" value="75000" step="1000">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-100">
                    <div class="flea-adv row align-items-center justify-content-center">
                        <div class="">
                            <img src="{{asset('img/image 16.png')}}" alt="" style="width: 270px;height: 682px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="img-union"><img src="{{asset('img/flea-market/platinum.png')}}"></div>
                <div class="page d-flex flex-wrap" id="productsAdsPlan1"></div>
                <div class="img-union "><img src="{{asset('img/flea-market/premium.png')}}"></div>
                <div class="page d-flex flex-wrap" id="productsAdsPlan2"></div>
                <div class="img-union"><img src="{{asset('img/flea-market/silver.png')}}"></div>
                <div class="page d-flex flex-wrap" id="productsAdsPlan3"></div>
            </div>
        </div>
        {{-- modal filter --}}
        <div class="offcanvas offcanvas-start" tabindex="-1" id="filterNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a href="{{route('home')}}" class="offcanvas-title" id="offcanvasNavbarLabel"><img class="w-100"
                                                                                                   src="{{asset('img/icons_logo/logo-new.png')}}"></a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="border-radius ">
                    <div class="flea-text">{{ __('home.Filter') }}</div>
                    @foreach($departments as $department)
                        <div>
                            <input type="checkbox" onchange="performSearch()" name="category_{{$department->id}}"
                                   id="category_{{$department->id}}">
                            <label for="category_{{$department->id}}"
                                   class="flea-text-gray">{{$department->name}}</label>
                        </div>
                    @endforeach
                    <div class="flea-text-sp">{{ __('home.See all categories') }}</div>
                </div>
                <div class="border-radius mt-3 ">
                    <div class="d-flex">
                        <div class="wrapper">
                            <header>
                                <h2>{{ __('home.Price') }}</h2>
                            </header>
                            <div class="price-input">
                                <div class="field">
                                    <input type="number" onchange="performSearch()" id="inputProductMin"
                                           class="rangePrice input-min" value="0">
                                </div>
                                <div class="separator">-</div>
                                <div class="field">
                                    <input type="number" onchange="performSearch()" id="inputProductMax"
                                           class="rangePrice input-max" value="0">
                                </div>
                            </div>
                            <div class="slider">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input">
                                <input type="range" onchange="performSearch()" class="rangePrice range-min" min="0"
                                       max="100000" value="25000" step="1000">
                                <input type="range" onchange="performSearch()" class="rangePrice range-max" min="0"
                                       max="100000" value="75000" step="1000">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="" class="add-cv-bt w-100 apply-bt_delete col-6">{{ __('home.Refresh') }}</a>
                    <form action="#" class="col-6 pr-0">
                        <button type="button" data-bs-dismiss="offcanvas" aria-label="Close"
                                class="add-cv-bt apply-bt_edit w-100">{{ __('home.Apply') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
    <script>
        function getCookie(name) {
            var value = "; " + document.cookie;
            var parts = value.split("; " + name + "=");
            if (parts.length === 2) return parts.pop().split(";").shift();
        }

        function checkLoginWishStore() {
            let userId = `{{ Auth::check() ? Auth::user()->id : null }}`;
            if (!userId) {
                $('#staticBackdrop').modal('show');
            } else {
                window.location.href = '{{route('flea.market.my.store' )}}';
            }
        }

        function checkLoginWish() {
            if (token === undefined) {
                $('#staticBackdrop').modal('show');
            } else {
                window.location.href = '{{ route('flea.market.wish.list') }}';
            }
        }

        function checkLogin() {
            if (token === undefined) {
                $('#staticBackdrop').modal('show');
            } else {
                window.location.href = '{{route('flea.market.sell.product')}}';
            }
        }
    </script>
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


        function performSearch() {
            var searchInput = document.getElementById('inputSearch');
            var searchValue = searchInput.value;
            var inputSearchMobile = document.getElementById('inputSearchMobile');
            var searchValueMobile = inputSearchMobile.value;
            if (searchValueMobile) {
                searchValue = searchValueMobile;
            }
            console.log(searchValue)

            var departmentIds = [];
            var departmentInputs = document.querySelectorAll('input[name^="category_"]');
            for (var i = 0; i < departmentInputs.length; i++) {
                var departmentInput = departmentInputs[i];
                if (departmentInput.checked) {
                    departmentIds.push(departmentInput.name.replace('category_', ''));
                }
            }
            var categoryIdsString = departmentIds.join(',');
            var formData = {
                category_id: categoryIdsString,
                name: searchValue,
                status: 'ACTIVE',
                min_price: $('#inputProductMin').val(),
                max_price: $('#inputProductMax').val(),
            };

            $.ajax({
                url: "{{ route('products.api.search') }}",
                method: "GET",
                data: formData,
                success: function (response) {
                    // console.log(response);
                    renderProduct(response);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function renderProduct(products) {
            $('#productsAdsPlan1').html('');
            $('#productsAdsPlan2').html('');
            $('#productsAdsPlan3').html('');

            for (var i = 0; i < products.length; i++) {
                let url = `{{ route('flea.market.product.detail', ['id' => ':id']) }}`;
                url = url.replace(':id', products[i].id);
                var product = products[i];
                console.log(product)
                var adsPlan = product.ads_plan;
                var isFavoriteClass = product.isFavorit ? 'bi-heart-fill' : 'bi-heart';

                var productHtml = `
    <div class="col-md-3 col-6">
        <div class="product-item">
            <div class="img-pro">
                <img class="b-radius-8px" src="${product.thumbnail}" alt="">
                <a class="button-heart" data-favorite="0">
                    <i id="icon-heart-${product.id}" class="${isFavoriteClass} bi" data-product-id="${product.id}" onclick="addProductToWishList(${product.id})"></i>
                </a>
            </div>
            <div class="content-pro">
                <div class="name-pro">
                    <a href="${url}">${product.name}</a>
                </div>
                <div class="location-pro d-flex">
                    Location: <p>${product.province_id}</p>
                </div>
                <div class="price-pro">
                    ${formatCurrency(product.price)} ${product.price_unit}
                </div>
            </div>
        </div>
    </div>
`;

                function formatCurrency(amount) {
                    // Sử dụng hàm toLocaleString để định dạng số tiền
                    return amount.toLocaleString('en-US');
                }


                if (adsPlan === 1) {
                    $('#productsAdsPlan1').append(productHtml);
                } else if (adsPlan === 2) {
                    $('#productsAdsPlan2').append(productHtml);
                } else if (adsPlan === 3) {
                    $('#productsAdsPlan3').append(productHtml);
                }
            }
        }


    </script>
    <script>
        function addProductToWishList(id) {
            let productId = id;
            let userId = `{{ Auth::check() ? Auth::user()->id : null }}`;
            if (userId) {
                let url = '{{ route('api.backend.wish.lists.update', ':productId') }}';
                url = url.replace(':productId', productId);
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        user_id: userId,
                        product_id: productId
                    },
                    headers: {
                        "Authorization": `Bearer ${token}`,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        let item = $('#icon-heart-' + id);
                        if (response.isFavorite == true) {
                            item.removeClass('bi-heart');
                            item.addClass('bi-heart-fill');
                            alert('Add product to wish list success');
                        } else {
                            item.addClass('bi-heart');
                            item.removeClass('bi-heart-fill');
                            alert('Remove product from wish list success');
                        }
                    },
                    error: function (exception) {
                    }
                });
            } else {
                $('#staticBackdrop').modal('show');
            }
        }

        function getCookie(name) {
            var value = "; " + document.cookie;
            var parts = value.split("; " + name + "=");
            if (parts.length === 2) return parts.pop().split(";").shift();
        }

        $(document).ready(function () {
            callListProduct(token);

            async function callListProduct(token) {
                let accessToken = `Bearer ` + token;
                await $.ajax({
                    url: `{{route('products.api.list')}}`,
                    method: 'GET',
                    headers: {
                        "Authorization": accessToken
                    },
                    success: function (response) {
                        renderProduct(response);
                    },
                    error: function (exception) {
                        console.log(exception)
                    }
                });
            }

            async function renderProduct(res) {
                var productsAdsPlan1 = [];
                var productsAdsPlan2 = [];
                var productsAdsPlan3 = [];

                for (let i = 0; i < res.length; i++) {
                    let url = `{{ route('flea.market.product.detail', ['id' => ':id']) }}`;
                    url = url.replace(':id', res[i].id);
                    let item = res[i];
                    let adsPlan = item.ads_plan;
                    let userId = `{{ Auth::check() ? Auth::user()->id : null }}`;

                    if (adsPlan === 1) {
                        productsAdsPlan1.push(item);
                    } else if (adsPlan === 2) {
                        productsAdsPlan2.push(item);
                    } else if (adsPlan === 3) {
                        productsAdsPlan3.push(item);
                    }

                    let isFavorite = item.isFavorit ? 'bi-heart-fill' : 'bi-heart';
                    let created_by = item.created_by;
                    let tab = ``;
                    if (userId != created_by) {
                        tab = `
                             <a class="button-heart" data-favorite="0">
                                <i id="icon-heart-${item.id}" class="${isFavorite} bi" data-product-id="${item.id}" onclick="addProductToWishList(${item.id})"></i>
                            </a>`;
                    }
                    var html = `
                    <div class="col-md-3 col-6">
                        <div class="product-item">
                            <div class="img-pro">
                                <img class="b-radius-8px" src="${item.thumbnail}" alt="">
                                ${tab}
                            </div>
                            <div class="content-pro">
                                <div class="name-pro">
                                    <a href="${url}">${item.name}</a>
                                </div>
                                <div class="location-pro d-flex">
                                    Location: <p>${item.province_id}</p>
                                </div>
                                <div class="price-pro">
                                    ${formatCurrency(item.price)} ${item.price_unit}
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                    function formatCurrency(amount) {
                        return amount.toLocaleString('en-US');
                    }
                    if (adsPlan === 1) {
                        $('#productsAdsPlan1').append(html);
                    } else if (adsPlan === 2) {
                        $('#productsAdsPlan2').append(html);
                    } else if (adsPlan === 3) {
                        $('#productsAdsPlan3').append(html);
                    }
                }
            }
        });
    </script>
@endsection
