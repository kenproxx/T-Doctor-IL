@extends('layouts.admin')
@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('Create') }}</h1>
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div>
        <label>name</label>
        <input type="text" class="form-control" id="name" name="name" value="">
    </div>
    <div>
        <label>category_id</label>
        <input type="text" class="form-control" id="category_id" name="category_id" value="">
    </div>
    <div>
        <label>name_en</label>
        <input type="text" class="form-control" id="name_en" name="name_en" value="">
    </div>
    <div>
        <label>brand_name</label>
        <input type="text" class="form-control" id="brand_name" name="brand_name" value="">
    </div>
    <div>
        <label>brand_name_en</label>
        <input type="text" class="form-control" id="brand_name_en" name="brand_name_en" value="">
    </div>
    <div>
        <label>province_id</label>
        <input type="text" class="form-control" id="province_id" name="province_id" value="">
    </div>
    <div>
        <label>thumbnail</label>
        <input type="text" class="form-control" id="thumbnail" name="thumbnail" value="">
    </div>
    <div>
        <label>price</label>
        <input type="text" class="form-control" id="price" name="price" value="">
    </div>
    <div>
        <label>price_unit</label>
        <input type="text" class="form-control" id="price_unit" name="price_unit" value="">
    </div>
    <div>
        <label>ads_plan</label>
        <input type="text" class="form-control" id="ads_plan" name="ads_plan" value="">
    </div>
    <div>
        <label>ads_period</label>
        <input type="text" class="form-control" id="ads_period" name="ads_period" value="">
    </div>
    <div>
        <label>ads_period</label>
        <input type="text" class="form-control" id="ads_period" name="ads_period" value="{{Auth::user()->id}}">
    </div>


    <button id="submitBtn">Gửi dữ liệu</button>

    <script>
        var token = `{{ $_COOKIE['accessToken'] }}`;
        $(document).ready(function () {
            $("#submitBtn").click(function () {
                var priceValue = $("#price").val();
                var priceUnitValue = $("#price_unit").val();
                var name = $("#name").val();
                var category_id = $("#category_id").val();
                var name_en = $("#name_en").val();
                var brand_name = $("#brand_name").val();
                var brand_name_en = $("#brand_name_en").val();
                var province_id = $("#province_id").val();
                var thumbnail = $("#thumbnail").val();
                var gallery = $("#gallery").val();
                var ads_period = $("#ads_period").val();
                var ads_plan = $("#ads_plan").val();
                var user_id = $("#user_id").val();
                var data = {
                    price: priceValue,
                    price_unit: priceUnitValue,
                    name: name,
                    category_id: category_id,
                    name_en: name_en,
                    brand_name: brand_name,
                    brand_name_en: brand_name_en,
                    province_id: province_id,
                    thumbnail: thumbnail,
                    gallery: gallery,
                    ads_period: ads_period,
                    ads_plan: ads_plan,
                    user_id: user_id
                };

                $.ajax({
                    type: "POST",
                    url: `{{route('api.backend.products.create')}}`,
                    data: JSON.stringify(data),
                    contentType: "application/json",
                    success: function (response) {

                        console.log("Gửi dữ liệu thành công:", response);
                    },
                    error: function (error) {
                        // Xử lý lỗi nếu có
                        console.error("Lỗi:", error);
                    }
                });
            });
        });
    </script>

@endsection
