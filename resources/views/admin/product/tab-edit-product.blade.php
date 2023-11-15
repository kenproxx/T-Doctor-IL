@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Create') }}</h1>
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form id="form" method="post" action="{{ route('api.backend.products.update', ['id' => $product->id]) }}"
          enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div>
            <div class="row">
                <div class="col-md-4">
                    <label>name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                </div>
                <div class="col-md-4">
                    <label>name_en</label>
                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{$product->name_en}}">
                </div>
                <div class="col-md-4">
                    <label>name_laos</label>
                    <input type="text" class="form-control" id="name_laos" name="name_laos" value="{{$product->name_laos}}">
                </div>

            </div>

            <div class="row">
                <div class="col-sm-4"><label>Mô tả việt</label>
                    <textarea class="form-control" name="description"
                              id="description">{{$product->description}}</textarea>
                </div>
                <div class="col-sm-4"><label>Mô tả anh</label>
                    <textarea class="form-control" name="description_en"
                              id="description_en">{{$product->description_en}}</textarea>
                </div>
                <div class="col-sm-4"><label>Mô tả lào</label>
                    <textarea class="form-control" name="description_laos"
                              id="description_laos">{{$product->description_laos}}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>brand_name</label>
                    <input type="text" class="form-control" id="brand_name" name="brand_name"
                           value="{{$product->brand_name}}">
                </div>
                <div class="col-md-4">
                    <label>brand_name_en</label>
                    <input type="text" class="form-control" id="brand_name_en" name="brand_name_en"
                           value="{{$product->brand_name_en}}">
                </div>
                <div class="col-md-4">
                    <label>brand_name_laos</label>
                    <input type="text" class="form-control" id="brand_name_laos" name="brand_name_laos"
                           value="{{$product->brand_name_laos}}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>category_id</label>
                    <select class="custom-select" id="category_id" name="category_id">
                        <option value="{{$product->category_id}}">{{$product->category_id}}</option>
                        <option value="1">category 1</option>
                        <option value="2">category 2</option>
                        <option value="3">category 3</option>
                        <option value="4">category 4</option>
                    </select>
                </div>
                <div class="col-md-6">
                    @php
                        $provinces = \App\Models\Province::find($product->province_id)->get();
                    @endphp
                    <label for="province_id">province_id</label>

                    <select class="custom-select" id="province_id" name="province_id">
                        @foreach($provinces as $province)
                            <option
                                value="{{$province->id}}" {{$province->id == $product->province_id ? 'selected' : ''}}>{{$province->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div>
                <label>thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail" multiple accept="image/*">
                <img width="50px" src="{{$product->thumbnail}}">
            </div>
            <div>
                <label>gallery</label>
                <input type="file" class="form-control" id="gallery" name="gallery[]" multiple accept="image/*">
                @php
                    $galleryArray = explode(',', $product->gallery);
                @endphp
                @foreach($galleryArray as $productImg)
                    <img width="50px" src="{{$productImg}}">
                @endforeach
            </div>
            <div>
                <label>price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}">
            </div>
            <div>
                <label>price_unit</label>
                <input type="text" class="form-control" id="price_unit" name="price_unit"
                       value="{{$product->price_unit}}">
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <label for="ads_plan">ads_plan</label>
                    <select id="ads_plan" name="ads_plan" class="custom-select">
                        <option value="{{$product->ads_plan}}">{{$product->ads_plan}}</option>
                        <option value="1">Platinum</option>
                        <option value="2">Premium</option>
                        <option value="3">Silver</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="ads_period">ads_period</label>
                    <select id="ads_period" name="ads_period" class="custom-select">
                        <option value="{{$product->ads_period}}">{{$product->ads_period}}</option>
                        <option value="1">5 Day</option>
                        <option value="2">10 Day</option>
                        <option value="3">15 Day</option>
                        <option value="4">20 Day</option>
                    </select>
                </div>
                <div class="col-sm-4"><label for="status">Trạng thái</label>
                    <select class="custom-select" id="status" name="status" {{ !$isAdmin ? 'disabled' : '' }}>
                        <option
                            value="{{ \App\Enums\ProductStatus::ACTIVE }}" {{ $product->status === \App\Enums\ProductStatus::ACTIVE ? 'selected' : '' }}>
                            {{ \App\Enums\ProductStatus::ACTIVE }}
                        </option>
                        <option
                            value="{{ \App\Enums\ProductStatus::INACTIVE }}" {{ $product->status === \App\Enums\ProductStatus::INACTIVE ? 'selected' : '' }}>
                            {{ \App\Enums\ProductStatus::INACTIVE }}
                        </option>
                        <option
                            value="{{ \App\Enums\ProductStatus::DELETED }}" {{ $product->status === \App\Enums\ProductStatus::DELETED ? 'selected' : '' }}>
                            {{ \App\Enums\ProductStatus::DELETED }}
                        </option>
                    </select>

                </div>
            </div>

            <div hidden="">
                <label>User</label>
                <input type="text" class="form-control" id="user_id" name="user_id" value="{{Auth::user()->id}}">
            </div>
        </div>
        <button type="button" class="btn btn-primary mt-md-4" id="editProducts">Lưu</button>
    </form>
    <script>
        const token = `{{ $_COOKIE['accessToken'] }}`;
        $(document).ready(function () {
            $('#editProducts').on('click', function () {
                const headers = {
                    'Authorization': `Bearer ${token}`
                };
                const formDataEdit = new FormData();

                const fieldNames = [
                    "name", "name_en", "category_id", "brand_name",
                    "brand_name_en", "province_id", "price",
                    "price_unit", "ads_plan", "ads_period", "user_id","name_laos","brand_name_laos"
                ];
                const fieldTextareaTiny = [
                    "description", "description_en", "description_laos"
                ];
                fieldTextareaTiny.forEach(fieldTextarea => {
                    const content = tinymce.get(fieldTextarea).getContent();
                    formDataEdit.append(fieldTextarea, content);
                });

                fieldNames.forEach(fieldName => {
                    formDataEdit.append(fieldName, $(`#${fieldName}`).val());
                });


                var filedata = document.getElementById("gallery");
                var i = 0, len = filedata.files.length, file;
                for (i; i < len; i++) {
                    file = filedata.files[i];
                    formDataEdit.append('gallery[]', file);
                }
                const photoGallery = $('#gallery')[0].files;
                const photo = $('#thumbnail')[0].files[0];
                formDataEdit.append('thumbnail', photo);
                formDataEdit.append('status', 'ACTIVE');

                try {
                    $.ajax({
                        url: `{{route('api.backend.product.updatePost',$product->id)}}`,
                        method: 'POST',
                        headers: headers,
                        contentType: false,
                        cache: false,
                        processData: false,
                        data: formDataEdit,
                        success: function (response) {
                            alert('success');
                            window.location.href = `{{route('homeAdmin.list.product')}}`
                        },
                        error: function (exception) {
                            console.log(exception)
                        }
                    });
                } catch (error) {
                    throw error;
                }
            })
        })
    </script>
@endsection
