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
                    <select class="custom-select" id="category_id" name="category_id"
                            onchange="categoryFilterMedicine(this.value)">
                        <option value="">Category</option>
                        @if($categoryMedicines)
                            @foreach($categoryMedicines as $index => $cateProductMedicine)
                                <option value="{{ $cateProductMedicine->id }}">{{ $cateProductMedicine->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="title">
                    <select class="custom-select" id="category_id" name="category_id"
                            onchange="locationFilterMedicine(this.value)">
                        <option value="">Location</option>
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
                    <input type="search" name="focus" placeholder="Search" id="search-input" value="">
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
        <div class="medicine-list row">
            <div class="col-md-3 medicine-list--filter">
                <div class="filter">
                    <div class="filter-header d-flex justify-content-between">
                        <div class="text-wrapper">Filter</div>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="filter-body">
                        <div class="d-flex item">
                            <input type="checkbox" name="filter_" value="0" onchange="searchFilterMedicine(this.value)">
                            <div class="text-all">All ({{ $countAllMedicine }})</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox" name="filter_"
                                   value="{{ FilterOnlineMedicine::HEALTH }}"
                                   onchange="searchFilterMedicine(this.value)">
                            <div class="text">Health</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox" name="filter_"
                                   value="{{ FilterOnlineMedicine::BEAUTY }}"
                                   onchange="searchFilterMedicine(this.value)">
                            <div class="text">Beauty</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox" name="filter_"
                                   value="{{ FilterOnlineMedicine::PET }}"
                                   onchange="searchFilterMedicine(this.value)">
                            <div class="text">Pet</div>
                        </div>
                    </div>
                </div>
                <div class="filter">
                    <div class="filter-header d-flex justify-content-between">
                        <div class="text-wrapper">Object</div>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="filter-body">
                        <div class="d-flex item">
                            <input type="checkbox" value="{{ ObjectOnlineMedicine::KIDS }}"
                                   onchange="objectFilterMedicine(this.value)">
                            <div class="text">For kids</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox"
                                   value="{{ ObjectOnlineMedicine::FOR_WOMEN }}"
                                   onchange="objectFilterMedicine(this.value)">
                            <div class="text">For women</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox"
                                   value="{{ ObjectOnlineMedicine::FOR_MEN }}"
                                   onchange="objectFilterMedicine(this.value)">
                            <div class="text">For men</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox"
                                   value="{{ ObjectOnlineMedicine::FOR_ADULT }}"
                                   onchange="objectFilterMedicine(this.value)">
                            <div class="text">For adults</div>
                        </div>
                    </div>
                </div>
                <div class="price">
                    <div class="text-wrapper">Price</div>
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
                <div class="page row" id="content-medicine">
                    @foreach($medicines as $medicine)
                        <div class="col-md-4 item">
                            @include('component.products')
                        </div>
                    @endforeach
                </div>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script>

        let filterMedicine = [];
        let objectMedicine = [];
        let priceMedicine = [];
        let categoryMedicine = '';
        let locationMedicine = [];

        function masterFilterMedicine() {
            const token = `{{ $_COOKIE['accessToken'] ?? '' }}`;

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

            formData.append('_token', '{{ csrf_token() }}');
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
                        renderJson2Html(data.data);
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
            let html = '';
            if (data.length === 0) {
                html = `<div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                No data
                            </div>
                        </div>`;
            } else {
                data.forEach(async function (item) {
                    html += `<div class="col-md-4 item">
                                <div class="product-item">
                                    <div class="img-pro">
                                        <img src="${item.thumbnail}" alt="">
                                    </div>
                                    <div class="content-pro">
                                        <div class="name-pro">
                                            <a href="">${item.name}</a>
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
