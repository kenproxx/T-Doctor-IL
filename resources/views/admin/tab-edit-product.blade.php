@extends('layouts.admin')

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
    <form method="post" action="{{ route('api.backend.products.update', ['id' => $product->id]) }}">
        @csrf
        @method('PUT')

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
                <input type="text" class="form-control" id="thumbnail" name="thumbnail" value="{{$product->thumbnail}}">
            </div>
            <div>
                <label>gallery</label>
                <input type="text" class="form-control" id="gallery" name="gallery" value="{{$product->gallery}}">
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
        <button type="button" class="btn btn-primary up-date-button">Lưu</button>
    </form>

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
                    status: "ACTIVE"
                };

                let value = JSON.stringify(item);

                    try {
                    $.ajax({
                        url: `{{route('api.backend.products.update',$product->id)}}`,
                        method: 'PUT',
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

    {{--    <script>--}}
    {{--        var token = `{{ $_COOKIE['accessToken'] }}`;--}}
    {{--        $(document).ready(function () {--}}
    {{--            callEditProduct(token);--}}

    {{--            async function callEditProduct(token) {--}}
    {{--                $("#submitBtn").click(function (e) {--}}
    {{--                    console.log(12331)--}}
    {{--                    e.preventDefault();--}}
    {{--                    let urlUpdate = `{{ route('api.backend.products.update', ['id' => $product->id]) }}`;--}}
    {{--                    let accessToken = `Bearer ` + token;--}}

    {{--                    var priceValue = $("#price").val();--}}
    {{--                    var priceUnitValue = $("#price_unit").val();--}}
    {{--                    var name = $("#name").val();--}}
    {{--                    var name_en = $("#name_en").val();--}}
    {{--                    var brand_name = $("#brand_name").val();--}}
    {{--                    var brand_name_en = $("#brand_name_en").val();--}}
    {{--                    var province_id = $("#province_id").val();--}}
    {{--                    var thumbnail = $("#thumbnail").val();--}}
    {{--                    var gallery = $("#gallery").val();--}}
    {{--                    var ads_period = $("#ads_period").val();--}}
    {{--                    var ads_plan = $("#ads_plan").val();--}}
    {{--                    var user_id = $("#user_id").val();--}}
    {{--                    var status = $("#status").val();--}}

    {{--                    await $.ajax({--}}
    {{--                        url: urlUpdate,--}}
    {{--                        method: 'PUT',--}}
    {{--                        headers: {--}}
    {{--                            "Authorization": accessToken--}}
    {{--                        },--}}
    {{--                        data: {--}}
    {{--                            price: priceValue,--}}
    {{--                            price_unit: priceUnitValue,--}}
    {{--                            name: name,--}}
    {{--                            name_en: name_en,--}}
    {{--                            brand_name: brand_name,--}}
    {{--                            brand_name_en: brand_name_en,--}}
    {{--                            province_id: province_id,--}}
    {{--                            thumbnail: thumbnail,--}}
    {{--                            gallery: gallery,--}}
    {{--                            ads_period: ads_period,--}}
    {{--                            ads_plan: ads_plan,--}}
    {{--                            user_id: user_id,--}}
    {{--                            status: status--}}
    {{--                        },--}}
    {{--                        success: function (response) {--}}
    {{--                            console.log(response);--}}
    {{--                        },--}}
    {{--                        error: function (exception) {--}}
    {{--                            console.log(exception);--}}
    {{--                        }--}}
    {{--                    });--}}
    {{--                });--}}
    {{--            }--}}
    {{--        });--}}

    {{--    </script>--}}
@endsection
