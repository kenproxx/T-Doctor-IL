@php use App\Enums\online_medicine\ObjectOnlineMedicine; @endphp
@php use App\Enums\online_medicine\FilterOnlineMedicine;use App\Enums\online_medicine\OnlineMedicineStatus; @endphp
@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create</h1>
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
                    <label for="name">name</label>
                    <input type="text" class="form-control" id="name" name="name" value="">
                </div>
                <div class="col-md-4">
                    <label for="name_en">name_en</label>
                    <input type="text" class="form-control" id="name_en" name="name_en" value="">
                </div>
                <div class="col-md-4">
                    <label for="name_laos">name_laos</label>
                    <input type="text" class="form-control" id="name_laos" name="name_laos" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4"><label>Mô tả dài việt</label>
                    <textarea class="form-control" name="description" id="description"></textarea>
                </div>
                <div class="col-sm-4"><label>Mô tả dài anh</label>
                    <textarea class="form-control" name="description_en" id="description_en"></textarea>
                </div>
                <div class="col-sm-4"><label>Mô tả dài lào</label>
                    <textarea class="form-control" name="description_laos" id="description_laos"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>brand_name</label>
                    <input type="text" class="form-control" id="brand_name" name="brand_name"
                           value="">
                </div>
                <div class="col-md-4">
                    <label>brand_name_en</label>
                    <input type="text" class="form-control" id="brand_name_en" name="brand_name_en"
                           value="">
                </div>
                <div class="col-md-4">
                    <label>brand_name_laos</label>
                    <input type="text" class="form-control" id="brand_name_laos" name="brand_name_laos"
                           value="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>category_id</label>
                    <select class="custom-select" id="category_id" name="category_id">
                        <option value="0">Khác</option>
                        @if($categoryProductMedicine)
                            @foreach($categoryProductMedicine as $index => $cateProductMedicine)
                                <option value="{{ $cateProductMedicine->id }}">{{ $cateProductMedicine->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Object</label>
                    <select class="custom-select" id="object_" name="object_">
                        <option value="{{ ObjectOnlineMedicine::KIDS }}">KIDS</option>
                        <option value="{{ ObjectOnlineMedicine::FOR_WOMEN }}">FOR_WOMEN
                        </option>
                        <option value="{{ ObjectOnlineMedicine::FOR_MEN }}">FOR_MEN</option>
                        <option value="{{ ObjectOnlineMedicine::FOR_ADULT }}">FOR_ADULT
                        </option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Filter</label>
                    <select class="custom-select" id="filter_" name="filter_">
                        <option value="{{ FilterOnlineMedicine::HEALTH }}">Health</option>
                        <option value="{{ FilterOnlineMedicine::BEAUTY }}">Beauty</option>
                        <option value="{{ FilterOnlineMedicine::PET }}">Pet</option>
                    </select>
                </div>
            </div>
            <div>
                <label>thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*">
            </div>
            <div>
                <label>gallery</label>
                <input type="file" class="form-control" id="gallery" name="gallery[]" multiple accept="image/*">
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>price</label>
                    <input type="number" class="form-control" id="price" name="price" value="">
                </div>
                <div class="col-md-4">
                    <label>unit_price</label>
                    <input type="text" class="form-control" id="unit_price" name="unit_price" value="">
                </div>
                <div class="col-md-4">
                    <label>status</label>
                    <select class="custom-select" id="status" name="status">
                        <option
                            value="{{ OnlineMedicineStatus::APPROVED }}">{{ OnlineMedicineStatus::APPROVED }}</option>
                        <option
                            value="{{ OnlineMedicineStatus::PENDING }}">{{ OnlineMedicineStatus::PENDING }}</option>
                    </select>
                </div>
            </div>
        </div>
    </form>

    <button type="button" onclick="submitForm()" class="btn btn-primary up-date-button mt-md-4">Lưu</button>
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
                'category_id', 'object_', 'filter_', 'price', 'status', 'unit_price'
            ];

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
            formData.append('user_id', '{{ Auth::user()->id }}');
            formData.append('_token', '{{ csrf_token() }}');

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