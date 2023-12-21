@php use App\Enums\online_medicine\FilterOnlineMedicine;use App\Enums\online_medicine\ObjectOnlineMedicine;use App\Http\Controllers\MainController;use App\Models\User;use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.master')
@section('title', 'Online Medicine')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    @php
        $isAdmin = (new MainController())->checkAdmin();
        $isBusiness = (new MainController())->checkBusiness();
        $isMedical = (new MainController())->checkMedical();
    @endphp

    <div class="medicine container">
        <div class="row medicine-search">
            <div class="medicine-search--left col-md-3 d-flex justify-content-around">
                <div class="title">
                    <select class="form-select" id="category_id" name="category_id"
                            onchange="categoryFilterMedicine(this.value)">
                        <option value="">{{ __('home.Category') }}</option>
                        @if($categoryMedicines)
                            @foreach($categoryMedicines as $index => $cateProductMedicine)
                                <option value="{{ $cateProductMedicine->id }}">{{ $cateProductMedicine->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="title">
                    <select class="form-select" id="category_id" name="category_id"
                            onchange="locationFilterMedicine(this.value)">
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
                    <input type="search" onkeyup="performSearch()" name="focus" placeholder="{{ __('home.Search for anything…') }}" id="search-input" value="">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </form>
                @if(Auth::check())
                    @if($isMedical)
                        <button type="button" data-toggle="modal" data-target="#modalCart" class="shopping-bag">
                            <i class="fa-solid fa-bag-shopping"></i>
                            @if($carts && count($carts) > 0)
                                <div class="text-wrapper"> {{ count($carts) }}</div>
                            @endif
                        </button>
                        @include('component.modal-cart')
                    @endif
                @endif
                @include('component.modal-cart')
            </div>
            <div class="medicine-search--right col-md-3 d-flex row justify-content-between">
                <div class="col-md-6 ">
                    <div class="div-wrapper">
                        <a type="button" data-toggle="modal" data-target="#modalCreatPrescription">{{ __('home.Create prescription') }}
                        </a>
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
                            <input type="checkbox" name="filter_" value="0" onchange="searchFilterMedicine(this.value)">
                            <div class="text-all">{{ __('home.All') }} ({{ $countAllMedicine }})</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox" name="filter_"
                                   value="{{ FilterOnlineMedicine::HEALTH }}"
                                   onchange="searchFilterMedicine(this.value)">
                            <div class="text">{{ __('home.Heath') }}</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox" name="filter_"
                                   value="{{ FilterOnlineMedicine::BEAUTY }}"
                                   onchange="searchFilterMedicine(this.value)">
                            <div class="text">{{ __('home.Beauty') }}</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox" name="filter_"
                                   value="{{ FilterOnlineMedicine::PET }}"
                                   onchange="searchFilterMedicine(this.value)">
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
                            <input type="checkbox" value="{{ ObjectOnlineMedicine::KIDS }}"
                                   onchange="objectFilterMedicine(this.value)">
                            <div class="text">{{ __('home.For kids') }}</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox"
                                   value="{{ ObjectOnlineMedicine::FOR_WOMEN }}"
                                   onchange="objectFilterMedicine(this.value)">
                            <div class="text">{{ __('home.For women') }}</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox"
                                   value="{{ ObjectOnlineMedicine::FOR_MEN }}"
                                   onchange="objectFilterMedicine(this.value)">
                            <div class="text">{{ __('home.For men') }}</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox"
                                   value="{{ ObjectOnlineMedicine::FOR_ADULT }}"
                                   onchange="objectFilterMedicine(this.value)">
                            <div class="text">{{ __('home.For adults') }}</div>
                        </div>
                    </div>
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
                                       max="10000000" value="2500000" step="1000">
                                <input type="range" onchange="performSearch()" class="rangePrice range-max" min="0"
                                       max="10000000" value="7500000" step="1000">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 medicine-list--item">
                <div class="page row" id="content-medicine">
                    @foreach($medicines as $medicine)
                        <div class="col-md-3">
                            @include('component.products')
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    {{ $medicines->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function performSearch() {

            var searchInput = document.getElementById('search-input');
            var searchValue = searchInput.value;

            var formData = {
                name: searchValue,
                status: 'ACTIVE',
                min_price: $('#inputProductMin').val(),
                max_price: $('#inputProductMax').val(),
            };

            $.ajax({
                url: `{{route('medicine.search')}}`,
                method: "POST",
                data: formData,
                success: function (response) {
                    renderJson2Html(response);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    </script>
    <script>

        let filterMedicine = [];
        let objectMedicine = [];
        let priceMedicine = [];
        let categoryMedicine = '';
        let locationMedicine = [];

        function masterFilterMedicine() {

            loadingMasterPage();
            const headers = {
                'Authorization': `Bearer ${token}`
            };
            const formData = new FormData();
            formData.append('filter', filterMedicine);
            formData.append('object', objectMedicine);
            formData.append('price', priceMedicine);
            formData.append('category', categoryMedicine);
            formData.append('location', locationMedicine);

            try {
                $.ajax({
                    url: `{{route('medicine.search')}}`,
                    method: 'POST',
                    headers: headers,
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: formData,
                    success: function (data) {
                        renderJson2Html(data);
                    },
                    error: function (exception) {
                    }
                });
            } catch (error) {
                throw error;
            }
            setTimeout(function () {
                loadingMasterPage();
            }, 1000);
        }

        function renderJson2Html(data) {
            console.log(data)
            let html = '';
            data = data.data;
            document.getElementById('content-medicine').innerHTML = html;
            if (data.length === 0) {
                html = `<div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                No data
                            </div>
                        </div>`;
            } else {
                data.forEach(async function (item) {
                    let url = `{{ route('medicine.detail', ['id' => ':id']) }}`;
                    url = url.replace(':id', item.id);
                    html += `<div class="col-md-3">
                                <div class="product-item">
                                    <div class="img-pro">
                                        <img src="${item.thumbnail}" alt="">
                                    </div>
                                    <div class="content-pro">
                                        <div class="name-pro">
                                            <a href="${url}">${item.name}</a>
                                        </div>
                                        <div class="location-pro d-flex">
                                            Location: <p>${item.location_name ?? 'Toàn quốc'}</p>
                                            <br>
                                        </div>
                                        <div class="price-pro">
                                            ${item.price ?? 0} ${item.unit_price ?? 'VND'}
                                            </div>
                                        </div>
                                    </div>
                            </div>`;
                });
            }
            document.getElementById('content-medicine').innerHTML = html;
        }

        function searchFilterMedicine(value) {
            // Kiểm tra xem giá trị có trong mảng hay không
            var index = filterMedicine.indexOf(value);

            if (index === -1) {
                // Nếu giá trị không có trong mảng, thêm vào mảng
                filterMedicine.push(value);
            } else {
                // Nếu giá trị đã có trong mảng, xóa khỏi mảng
                filterMedicine.splice(index, 1);
            }

            masterFilterMedicine();
        }

        function objectFilterMedicine(value) {
            // Kiểm tra xem giá trị có trong mảng hay không
            var index = objectMedicine.indexOf(value);

            if (index === -1) {
                // Nếu giá trị không có trong mảng, thêm vào mảng
                objectMedicine.push(value);
            } else {
                // Nếu giá trị đã có trong mảng, xóa khỏi mảng
                objectMedicine.splice(index, 1);
            }

            masterFilterMedicine();
        }

        function priceFilterMedicine() {
            console.log('priceFilterMedicine')
        }

        function categoryFilterMedicine(value) {
            categoryMedicine = value;

            masterFilterMedicine();
        }

        function locationFilterMedicine(value) {
            locationMedicine = value;

            masterFilterMedicine();
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

    </script>
@endsection
