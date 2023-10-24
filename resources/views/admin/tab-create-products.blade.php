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
    <form method="post" action="{{ route('api.backend.products.create') }}">
        @csrf
        @method('POST')

        <div>
            <div>
                <label>name</label>
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
                <input type="text" class="form-control" id="thumbnail" name="thumbnail" value="">
            </div>
            <div>
                <label>gallery</label>
                <input type="text" class="form-control" id="gallery" name="gallery" value="">
            </div>
            <div>
                <label>price</label>
                <input type="text" class="form-control" id="price" name="price" value="">
            </div>
            <div>
                <label>price_unit</label>
                <input type="text" class="form-control" id="price_unit" name="price_unit"
                       value="">
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
        <button type="button" class="btn btn-primary up-date-button">Lưu</button>
    </form>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script>
        const token = `{{ $_COOKIE['accessToken'] }}`;
        $(document).ready(function () {
            $('.up-date-button').on('click', function () {
                const headers = {
                    'Authorization': `Bearer ${token}`
                };
                let item = {
                    name: $('#name').val(),
                    name_en: $('#name_en').val(),
                    category_id: $('#category_id').val(),
                    brand_name: $('#brand_name').val(),
                    brand_name_en: $('#brand_name_en').val(),
                    province_id: $('#province_id').val(),
                    thumbnail: $('#thumbnail').val(),
                    gallery: $('#gallery').val(),
                    price: $('#price').val(),
                    price_unit: $('#price_unit').val(),
                    ads_plan: $('#ads_plan').val(),
                    ads_period: $('#ads_period').val(),
                    user_id: $('#user_id').val(),
                    status: "ACTIVE"
                };

                let value = JSON.stringify(item);

                try {
                    $.ajax({
                        url: `{{route('api.backend.products.create')}}`,
                        method: 'POST',
                        headers: headers,
                        data: item,
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
