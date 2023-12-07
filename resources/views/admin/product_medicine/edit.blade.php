@php use App\Enums\online_medicine\ObjectOnlineMedicine; @endphp
@php use App\Enums\online_medicine\FilterOnlineMedicine;use App\Enums\online_medicine\OnlineMedicineStatus; @endphp
@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('home.Update') }}</h1>
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form id="form" method="post" action="{{ route('api.backend.products.create') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div>
            <div class="row">
                <div class="col-md-4">
                    <label for="name">{{ __('home.Name') }}</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="{{ $productMedicine->name ?? '' }}">
                </div>
                <div class="col-md-4">
                    <label for="name_en">{{ __('home.name_en') }}</label>
                    <input type="text" class="form-control" id="name_en" name="name_en"
                           value="{{ $productMedicine->name_en ?? '' }}">
                </div>
                <div class="col-md-4">
                    <label for="name_laos">{{ __('home.name_laos') }}</label>
                    <input type="text" class="form-control" id="name_laos" name="name_laos"
                           value="{{ $productMedicine->name_laos ?? '' }}">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <label for="description">{{ __('home.Mô tả dài việt') }}</label>
                    <textarea class="form-control" name="description"
                              id="description">{{ $productMedicine->description ?? '' }}</textarea>
                </div>
                <div class="col-sm-4">
                    <label for="description_en">{{ __('home.Mô tả dài anh') }}</label>
                    <textarea class="form-control" name="description_en"
                              id="description_en">{{ $productMedicine->description_en ?? '' }}</textarea>
                </div>
                <div class="col-sm-4">
                    <label for="description_laos">{{ __('home.Mô tả dài lào') }}</label>
                    <textarea class="form-control" name="description_laos"
                              id="description_laos">{{ $productMedicine->description_laos ?? '' }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="brand_name">{{ __('home.Brand Name') }}</label>
                    <input type="text" class="form-control" id="brand_name" name="brand_name"
                           value="{{ $productMedicine->brand_name ?? '' }}">
                </div>
                <div class="col-md-4">
                    <label for="brand_name_en">{{ __('home.Brand Name English') }}</label>
                    <input type="text" class="form-control" id="brand_name_en" name="brand_name_en"
                           value="{{ $productMedicine->brand_name_en ?? '' }}">
                </div>
                <div class="col-md-4">
                    <label for="brand_name_laos">{{ __('home.Brand Name Laos') }}</label>
                    <input type="text" class="form-control" id="brand_name_laos" name="brand_name_laos"
                           value="{{ $productMedicine->brand_name_laos ?? '' }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="category_id">{{ __('home.Category') }}</label>
                    <select class="custom-select" id="category_id" name="category_id">
                        <option value="0">{{ __('home.Khác') }}</option>
                        @if($categoryProductMedicine)
                            @foreach($categoryProductMedicine as $index => $cateProductMedicine)
                                <option
                                    {{ $productMedicine->category_id == $cateProductMedicine->id ? 'selected' : '' }}
                                    value="{{ $cateProductMedicine->id }}">
                                    {{ $cateProductMedicine->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="object_">{{ __('home.Object') }}</label>
                    <select class="custom-select" id="object_" name="object_">
                        <option
                            {{ $productMedicine->object_ ==ObjectOnlineMedicine::KIDS ? 'selected' : '' }}
                            value="{{ ObjectOnlineMedicine::KIDS }}">{{ __('home.For kids') }}</option>
                        <option
                            {{ $productMedicine->object_ == ObjectOnlineMedicine::FOR_WOMEN ? 'selected' : '' }}
                            value="{{ ObjectOnlineMedicine::FOR_WOMEN }}">{{ __('home.For women') }}
                        </option>
                        <option {{ $productMedicine->object_ == ObjectOnlineMedicine::FOR_MEN ? 'selected' : '' }}
                                value="{{ ObjectOnlineMedicine::FOR_MEN }}">{{ __('home.For men') }}
                        </option>
                        <option {{ $productMedicine->object_ == ObjectOnlineMedicine::FOR_ADULT ? 'selected' : '' }}
                                value="{{ ObjectOnlineMedicine::FOR_ADULT }}">{{ __('home.For adults') }}
                        </option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="filter_">{{ __('home.Filter') }}</label>
                    <select class="custom-select" id="filter_" name="filter_">
                        <option
                            {{ $productMedicine->filter_ == FilterOnlineMedicine::HEALTH ? 'selected' : '' }}
                            value="{{ FilterOnlineMedicine::HEALTH }}">{{ __('home.Heath') }}
                        </option>
                        <option
                            {{ $productMedicine->filter_ == FilterOnlineMedicine::BEAUTY ? 'selected' : '' }}
                            value="{{ FilterOnlineMedicine::BEAUTY }}">{{ __('home.Beauty') }}
                        </option>
                        <option
                            {{ $productMedicine->filter_ == FilterOnlineMedicine::PET  ? 'selected' : '' }}
                            value="{{ FilterOnlineMedicine::PET }}">{{ __('home.Pets') }}
                        </option>
                    </select>
                </div>
            </div>
            <div>
                <label>{{ __('home.Thumbnail') }}</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*">
                <img class="mt-3" src="{{ asset($productMedicine->thumbnail) }}" alt="" width="80px" height="80xp">
            </div>
            <div>
                <label>{{ __('home.gallery') }}</label>
                <input type="file" class="form-control" id="gallery" name="gallery[]" multiple accept="image/*">
                @php
                    $gallery = $productMedicine->gallery;
                    $arrayGallery = explode(',',$gallery);
                @endphp
                @foreach($arrayGallery as $itemGallery)
                    <img src="{{ asset($itemGallery) }}" alt="" width="80px" height="80xp" class="mr-3 mt-3">
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="price">{{ __('home.Price') }}</label>
                    <input type="number" class="form-control" id="price" name="price"
                           value="{{ $productMedicine->price ?? '' }}">
                </div>
                <div class="col-md-4">
                    <label for="unit_price">{{ __('home.Price Unit') }}</label>
                    <input type="text" class="form-control" id="unit_price" name="unit_price" value="{{ $productMedicine->unit_price ?? '' }}">
                </div>
                <div class="col-md-4">
                    <label for="status">{{ __('home.Status') }}</label>
                    <select class="custom-select" id="status" name="status">
                        <option
                            value="{{ OnlineMedicineStatus::APPROVED }}" {{ $productMedicine->price == OnlineMedicineStatus::APPROVED ? 'selected' : '' }}>{{ OnlineMedicineStatus::APPROVED }}</option>
                        <option
                            value="{{ OnlineMedicineStatus::DELETED }}" {{ $productMedicine->price == OnlineMedicineStatus::DELETED ? 'selected' : '' }}>{{ \App\Enums\online_medicine\OnlineMedicineStatus::DELETED }}</option>
                    </select>
                </div>
            </div>
            <input type="hidden" id="id" name="id" value="{{ $productMedicine->id ?? '' }}">
        </div>
    </form>

    <button type="button" onclick="submitForm()" class="btn btn-primary up-date-button mt-md-4">{{ __('home.Save') }}</button>
    <script>
        const token = `{{ $_COOKIE['accessToken'] }}`;

        function submitForm() {
            loadingMasterPage();

            const headers = {
                'Authorization': `Bearer ${token}`
            };
            const formData = new FormData();

            const arrField = [
                'name', 'name_en', 'name_laos',
                'brand_name', 'brand_name_en', 'brand_name_laos',
                'category_id', 'object_', 'filter_', 'price', 'status', 'id', 'unit_price'
            ]

            var filedata = document.getElementById("gallery");
            var i = 0, len = filedata.files.length, img, reader, file;
            for (i; i < len; i++) {
                file = filedata.files[i];
                formData.append('gallery[]', file);
            }

            const fieldTextareaTiny = [
                'description', 'description_en', 'description_laos',
            ];
            fieldTextareaTiny.forEach(fieldTextarea => {
                const content = tinymce.get(fieldTextarea).getContent();
                formData.append(fieldTextarea, content);
            });

            arrField.forEach((field) => {
                formData.append(field, $(`#${field}`).val().trim());
            });

            const photo = $('#thumbnail')[0].files[0];
            formData.append('thumbnail', photo);

            formData.append('_token', '{{ csrf_token() }}');

            try {
                $.ajax({
                    url: `{{route('api.backend.product-medicine.update')}}`,
                    method: 'POST',
                    headers: headers,
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: formData,
                    success: function (data) {
                        alert(data);
                        loadingMasterPage();
                        window.location.href = `{{route('api.backend.product-medicine.index')}}`;
                    },
                    error: function (exception) {
                        alert(exception.responseText);
                        loadingMasterPage();
                    }
                });
            } catch (error) {
                loadingMasterPage();
                throw error;
            }
        }
    </script>
@endsection
