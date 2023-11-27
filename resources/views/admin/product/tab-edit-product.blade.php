@extends('layouts.admin')
@section('title')
    Edit Selling/Buying
@endsection
@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit') }}</h1>
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form id="form" >
        <div>
            <div class="row">
                <div class="col-md-4">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                </div>
                <div class="col-md-4">
                    <label for="name_en">Name English</label>
                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{$product->name_en}}">
                </div>
                <div class="col-md-4">
                    <label for="name_laos">Name Laos</label>
                    <input type="text" class="form-control" id="name_laos" name="name_laos"
                           value="{{$product->name_laos}}">
                </div>

            </div>

            <div class="row">
                <div class="col-sm-4">
                    <label for="description">Mô tả việt</label>
                    <textarea class="form-control" name="description"
                              id="description">{{$product->description}}</textarea>
                </div>
                <div class="col-sm-4">
                    <label for="description_en">Mô tả anh</label>
                    <textarea class="form-control" name="description_en"
                              id="description_en">{{$product->description_en}}</textarea>
                </div>
                <div class="col-sm-4">
                    <label for="description_laos">Mô tả lào</label>
                    <textarea class="form-control" name="description_laos"
                              id="description_laos">{{$product->description_laos}}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="brand_name">Brand Name</label>
                    <input type="text" class="form-control" id="brand_name" name="brand_name"
                           value="{{$product->brand_name}}">
                </div>
                <div class="col-md-4">
                    <label for="brand_name_en">Brand Name English</label>
                    <input type="text" class="form-control" id="brand_name_en" name="brand_name_en"
                           value="{{$product->brand_name_en}}">
                </div>
                <div class="col-md-4">
                    <label for="brand_name_laos">Brand Name Laos</label>
                    <input type="text" class="form-control" id="brand_name_laos" name="brand_name_laos"
                           value="{{$product->brand_name_laos}}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="category_id">Category</label>
                    <select class="custom-select" id="category_id" name="category_id">
                        @foreach($categories as $category)
                            <option {{ $category->id == $product->category_id ? 'checked' : '' }}
                                    value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                        @endforeach
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
                <label>Thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail" multiple accept="image/*">
                <img width="50px" src="{{$product->thumbnail}}" alt="thumbnail">
            </div>
            <div>
                <label for="gallery">Gallery</label>
                <input type="file" class="form-control" id="gallery" name="gallery[]" multiple accept="image/*">
                @php
                    $galleryArray = explode(',', $product->gallery);
                @endphp
                @foreach($galleryArray as $productImg)
                    <img width="50px" src="{{$productImg}}" alt="gallery">
                @endforeach
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}">
            </div>
            <div>
                <label for="price_unit">Price Unit</label>
                <input type="text" class="form-control" id="price_unit" name="price_unit"
                       value="{{$product->price_unit}}">
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <label for="ads_plan">Ads Plan</label>
                    <select id="ads_plan" name="ads_plan" class="custom-select">
                        <option {{$product->ads_plan == 1 ? 'selected' : ''}} value="1">Platinum</option>
                        <option {{$product->ads_plan == 2 ? 'selected' : ''}} value="2">Premium</option>
                        <option {{$product->ads_plan == 3 ? 'selected' : ''}} value="3">Silver</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="ads_period">Ads Period</label>
                    <select id="ads_period" name="ads_period" class="custom-select">
                        <option {{$product->ads_period == 1 ? 'selected' : ''}} value="1">5 Day</option>
                        <option {{$product->ads_period == 2 ? 'selected' : ''}} value="2">10 Day</option>
                        <option {{$product->ads_period == 3 ? 'selected' : ''}} value="3">15 Day</option>
                        <option {{$product->ads_period == 4 ? 'selected' : ''}} value="4">20 Day</option>
                    </select>
                </div>
                <div class="col-sm-4"><label for="status">Trạng thái</label>
                    <select class="custom-select" id="status" name="status" {{ !$isAdmin ? 'disabled' : '' }}>
                        <option value="{{ \App\Enums\ProductStatus::ACTIVE }}"
                            {{ $product->status == \App\Enums\ProductStatus::ACTIVE ? 'selected' : '' }}>
                            {{ \App\Enums\ProductStatus::ACTIVE }}
                        </option>
                        <option value="{{ \App\Enums\ProductStatus::INACTIVE }}"
                            {{ $product->status == \App\Enums\ProductStatus::INACTIVE ? 'selected' : '' }}>
                            {{ \App\Enums\ProductStatus::INACTIVE }}
                        </option>
                    </select>

                </div>
            </div>

            <div hidden="">
                <label for="user_id">User</label>
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
                    "price_unit", "ads_plan", "ads_period", "user_id", "name_laos", "brand_name_laos"
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
