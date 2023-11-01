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
    <form id="form" method="post" action="{{ route('api.backend.products.create') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div>
            <div>
                <label>name123</label>
                <input type="text" class="form-control" id="name" name="name" value="">
            </div>
            <div>
                <label>name_en</label>
                <input type="text" class="form-control" id="name_en" name="name_en" value="">
            </div>
            <div>
                <label>brand_name</label>
                <input type="text" class="form-control" id="brand_name" name="brand_name"
                       value="">
            </div>
            <div>
                <label>category_id</label>
                <input type="text" class="form-control" id="category_id" name="category_id"
                       value="">
            </div>
            <div>
                <label>brand_name_en</label>
                <input type="text" class="form-control" id="brand_name_en" name="brand_name_en"
                       value="">
            </div>
            <div>
                <label>province_id</label>
                <input type="text" class="form-control" id="province_id" name="province_id"
                       value="">
            </div>
            <div>
                <label>thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail" multiple accept="image/*">
            </div>
            <div>
                <label>gallery</label>
                <input type="file" class="form-control" id="gallery" name="gallery[]" multiple accept="image/*">
            </div>
            <div>
                <label>price</label>
                <input type="text" class="form-control" id="price" name="price" value="">
            </div>
            <div hidden="">
                <label>price_unit</label>
                <input type="text" class="form-control" id="price_unit" name="price_unit"
                       value="VND">
            </div>
            <div>
                <label>ads_plan</label>
                <input type="text" class="form-control" id="ads_plan" name="ads_plan" value="">
            </div>
            <div>
                <label>ads_period</label>
                <input type="text" class="form-control" id="ads_period" name="ads_period"
                       value="">
            </div>
            <div>
                <label>status</label>
                <input type="text" class="form-control" id="status" name="status" value="">
            </div>
            <div hidden="">
                <label>User</label>
                <input type="text" class="form-control" id="user_id" name="user_id" value="{{Auth::user()->id}}">
            </div>
        </div>
        <button type="button" class="btn btn-primary up-date-button mt-md-4">Lưu</button>
    </form>
    <script>
        const token = `{{ $_COOKIE['accessToken'] }}`;
        $(document).ready(function () {
            $('.up-date-button').on('click', function () {
                const headers = {
                    'Authorization': `Bearer ${token}`
                };
                const formData = new FormData();
                formData.append("name", $('#name').val());
                formData.append("name_en", $('#name_en').val());
                formData.append("category_id", $('#category_id').val());
                formData.append("brand_name", $('#brand_name').val());
                formData.append("brand_name_en", $('#brand_name_en').val());
                formData.append("province_id", $('#province_id').val());
                formData.append("price", $('#price').val());
                formData.append("price_unit", $('#price_unit').val());
                formData.append("ads_plan", $('#ads_plan').val());
                formData.append("ads_period", $('#ads_period').val());
                formData.append("user_id", $('#user_id').val());

                var filedata = document.getElementById("gallery");
                var i = 0, len = filedata.files.length, img, reader, file;
                for (i; i < len; i++) {
                    file = filedata.files[i];
                    formData.append('gallery[]', file);
                }
                const photoGallery = $('#gallery')[0].files;
                const photo = $('#thumbnail')[0].files[0];
                formData.append('thumbnail', photo);
                formData.append('status', 'ACTIVE');
                console.log(formData)
                try {
                    $.ajax({
                        url: `{{route('api.backend.products.create')}}`,
                        method: 'POST',
                        headers: headers,
                        contentType: false,
                        cache: false,
                        processData: false,
                        data: formData,
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
