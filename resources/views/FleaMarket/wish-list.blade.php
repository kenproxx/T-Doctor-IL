@extends('layouts.master')
@section('title', 'Flea Market')
@section('content')
    @include('layouts.partials.headerFleaMarket')
    <body>
    @include('component.banner')
    <div class="container mt-70">
        <div class="pc-hidden">@include('What-free.header-wFree')</div>
        <div class="d-flex mt-88">
            <div class="col-md-3  mobile-hidden">
                <div class="border-radius ">
                    <div class="flea-text">{{ __('home.Filter') }}</div>
                    @foreach($categoryProduct as $category)
                        <div>
                            <input type="checkbox" value="{{ $category->id }}" name="category" onchange="callListProduct()">
                            <label class="flea-text-gray">{{ $category->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="border-radius mt-3 ">
                    <div class="d-flex">
                        <div class="wrapper">
                            <header>
                                <h2>{{ __('home.Price') }}</h2>
                            </header>
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
                <div class="mt-100">
                    <div class=" w-100 row align-items-center justify-content-center">
                        <div class="p-0">
                            <img src="{{asset('img/image 16.png')}}" alt="" style="height: 682px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 medicine-list--item">
                <div class="page row" id="listWishList">
                </div>
            </div>
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
    </body>
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

        function addProductToWishList() {
            let productId = $(event.target).data('product-id');
            let userId = {{ Auth::check() ? Auth::user()->id : null }};
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
                        "Authorization": `Bearer ${token}`
                    },
                    success: function (response) {
                        location.reload();
                        alert('remove product to wish list success')
                    },
                    error: function (exception) {
                    }
                });
            }
        }

        callListProduct();

        async function callListProduct() {

            // log   category checked
            let category = [];
            for (let i = 0; i < document.getElementsByName('category').length; i++) {
                if (document.getElementsByName('category')[i].checked) {
                    category.push(document.getElementsByName('category')[i].value);
                }
            }

            let accessToken = `Bearer ` + token;
            $.ajax({
                url: `{{ route('api.backend.wish.lists.list') }}`,
                method: 'GET',
                headers: {
                    "Authorization": accessToken
                },
                data: {
                    user_id: {{ Auth::check() ? Auth::user()->id : null }},
                    category: category
                },
                success: function (response) {
                    renderWishList(response);
                },
                error: function (exception) {
                    console.log(exception);
                }
            });
        }

        async function renderWishList(res) {
            let html = ``;
            for (let i = 0; i < res.length; i++) {
                let product = res[i];
                let url = `{{ route('flea.market.product.detail', ['id' => ':id']) }}`.replace(':id', product.id);
                html += `
                        <div class="col-md-3 col-6">
                            <div class="product-item">
                                <div class="img-pro">
                                    <img class="b-radius-8px" src="${product.thumbnail}" alt="">
                                    <a class="button-heart" data-favorite="0">
                                        <i id="bi-heart" class="bi bi-heart-fill" style="color: red;" data-product-id="${product.id}" onclick="addProductToWishList()"></i>
                                    </a>
                                </div>
                                <div class="content-pro">
                                    <div class="name-pro">
                                        <a href="${url}">${product.name}</a>
                                    </div>
                                    <div class="location-pro d-flex">
                                        {{ __('home.Location') }}: <p>${product.province_id}</p>
                                    </div>
                                    <div class="price-pro">
                                        ${product.price} ${product.price_unit}
                                    </div>
                                </div>
                            </div>
                        </div>
                 `;
            }
            $('#listWishList').empty().append(html);
        }

    </script>
@endsection
