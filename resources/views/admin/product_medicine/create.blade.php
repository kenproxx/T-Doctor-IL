@php use App\Enums\online_medicine\ObjectOnlineMedicine; @endphp
@php use App\Enums\online_medicine\FilterOnlineMedicine;use App\Enums\online_medicine\OnlineMedicineStatus; @endphp
@extends('layouts.admin')
@section('title')
    {{ __('home.Create product medicine') }}
@endsection
@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('home.create') }}</h1>
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
                <div class="col-md-12 form-group">
                    <label for="name">{{ __('home.Name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label for="description">{{ __('home.Mô tả dài việt') }}</label>
                    <textarea class="form-control" name="description" id="description"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="brand_name">{{ __('home.Brand Name') }}</label>
                    <input type="text" class="form-control" id="brand_name" name="brand_name"
                           value="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="category_id">{{ __('home.Category') }}</label>
                    <select class="form-select" id="category_id" name="category_id">
                        <option value="0">{{ __('home.Khác') }}</option>
                        @if($categoryProductMedicine)
                            @foreach($categoryProductMedicine as $index => $cateProductMedicine)
                                <option value="{{ $cateProductMedicine->id }}">{{ $cateProductMedicine->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="object_">{{ __('home.Object') }}</label>
                    <select class="form-select" id="object_" name="object_">
                        <option value="{{ ObjectOnlineMedicine::KIDS }}">{{ __('home.For kids') }}</option>
                        <option value="{{ ObjectOnlineMedicine::FOR_WOMEN }}">{{ __('home.For women') }}
                        </option>
                        <option value="{{ ObjectOnlineMedicine::FOR_MEN }}">{{ __('home.For men') }}</option>
                        <option value="{{ ObjectOnlineMedicine::FOR_ADULT }}">{{ __('home.For adults') }}
                        </option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="filter_">{{ __('home.Filter') }}</label>
                    <select class="form-select" id="filter_" name="filter_">
                        <option value="{{ FilterOnlineMedicine::HEALTH }}">{{ __('home.Heath') }}</option>
                        <option value="{{ FilterOnlineMedicine::BEAUTY }}">{{ __('home.Beauty') }}</option>
                        <option value="{{ FilterOnlineMedicine::PET }}">{{ __('home.Pets') }}</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="thumbnail">{{ __('home.Thumbnail') }}</label>
                    <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*">
                </div>
                <div class="col-md-6">
                    <label for="gallery">{{ __('home.gallery') }}</label>
                    <input type="file" class="form-control" id="gallery" name="gallery[]" multiple accept="image/*">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9">
                    <label for="ingredient">{{ __('home.ingredient') }}</label>
                    <input type="text" class="form-control" id="ingredient" name="ingredient"
                           placeholder="{{ __('home.cac thanh phan thuoc cach nhau boi dau phay') }}">
                </div>
                <div class="col-sm-3">
                    <label for="is_prescription">Is prescription</label>
                    <input type="checkbox" id="is_prescription" name="is_prescription">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="price">{{ __('home.Price') }}</label>
                    <input type="number" class="form-control" id="price" name="price" value="">
                </div>
                <div class="col-md-4">
                    <label for="unit_price">{{ __('home.Price Unit') }}</label>
                    <input type="text" class="form-control" id="unit_price" name="unit_price" value="">
                </div>
                <div class="col-md-4">
                    <label for="status">{{ __('home.Status') }}</label>
                    <select class="form-select" id="status" name="status" disabled>
                        <option
                            value="{{ OnlineMedicineStatus::PENDING }}">{{ OnlineMedicineStatus::PENDING }}</option>
                        <option
                            value="{{ OnlineMedicineStatus::APPROVED }}">{{ OnlineMedicineStatus::APPROVED }}</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="quantity">{{ __('home.Quantity') }}</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="0"
                           value="{{ $productMedicine->quantity ?? '' }}">
                </div>
            </div>
        </div>
    </form>

    <button type="button" onclick="submitForm()"
            class="btn btn-primary up-date-button mt-md-4">{{ __('home.Save') }}</button>
    <script>

        function submitForm() {
            loadingMasterPage();
            const headers = {
                'Authorization': `Bearer ${token}`
            };
            const formData = new FormData();

            const arrField = [
                'name', 'brand_name', 'category_id', 'object_', 'filter_',
                'price', 'status', 'unit_price', 'ingredient', 'quantity'
            ];

            let checked = document.getElementById('is_prescription').checked;
            if (checked) {
                formData.append('is_prescription', 'true');
            }

            let isValid = true
            /* Tạo fn appendDataForm ở admin blade*/
            isValid = appendDataForm(arrField, formData, isValid);

            var filedata = document.getElementById("gallery");
            var i = 0, len = filedata.files.length, img, reader, file;
            if (len > 0) {
                for (i; i < len; i++) {
                    file = filedata.files[i];
                    formData.append('gallery[]', file);
                }
            } else {
                isValid = false;
            }

            const fieldTextareaTiny = [
                'description',
            ];
            fieldTextareaTiny.forEach(fieldTextarea => {
                const content = tinymce.get(fieldTextarea).getContent();
                if (!content) {
                    isValid = false;
                }
                formData.append(fieldTextarea, content);
            });

            const photo = $('#thumbnail')[0].files[0];
            formData.append('thumbnail', photo);
            if (!photo) {
                isValid = false;
            }
            formData.append('user_id', '{{ Auth::user()->id }}');
            formData.append('_token', '{{ csrf_token() }}');

            if (!isValid) {
                alert('Please check input empty!');
                return;
            }

            try {
                $.ajax({
                    url: `{{route('api.backend.product-medicine.store')}}`,
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
