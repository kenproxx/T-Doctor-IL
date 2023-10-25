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
    <form id="form" method="post" action="{{ route('api.backend.products.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div>
            <div>
                <label>name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
            </div>
            <div>
                <label>name_en</label>
                <input type="text" class="form-control" id="name_en" name="name_en" value="{{$product->name_en}}">
            </div>
            <div>
                <label>brand_name</label>
                <input type="text" class="form-control" id="brand_name" name="brand_name"
                       value="{{$product->brand_name}}">
            </div>
            <div>
                <label>category_id</label>
                <input type="text" class="form-control" id="category_id" name="category_id"
                       value="{{$product->category_id}}">
            </div>
            <div>
                <label>brand_name_en</label>
                <input type="text" class="form-control" id="brand_name_en" name="brand_name_en"
                       value="{{$product->brand_name_en}}">
            </div>
            <div>
                <label>province_id</label>
                <input type="text" class="form-control" id="province_id" name="province_id"
                       value="{{$product->province_id}}">
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
                <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}">
            </div>
            <div>
                <label>price_unit</label>
                <input type="text" class="form-control" id="price_unit" name="price_unit"
                       value="{{$product->price_unit}}">
            </div>
            <div>
                <label>ads_plan</label>
                <input type="text" class="form-control" id="ads_plan" name="ads_plan" value="{{$product->ads_plan}}">
            </div>
            <div>
                <label>ads_period</label>
                <input type="text" class="form-control" id="ads_period" name="ads_period"
                       value="{{$product->ads_period}}">
            </div>
            <div>
                <label>status</label>
                <input type="text" class="form-control" id="status" name="status" value="{{$product->status}}">
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
                    "price_unit", "ads_plan", "ads_period", "user_id"
                ];

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
                        url: `{{route('api.backend.products.update',$product->id)}}`,
                        method: 'POST',
                        headers: headers,
                        contentType: false,
                        cache: false,
                        processData: false,
                        data: formDataEdit,
                        success: function (response) {
                            alert('success');
                            window.location.reload();
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
