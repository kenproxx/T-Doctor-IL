@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Coupon</h1>
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form id="form">
        @csrf
        <div class="row">
            <div class="col-sm-4"><label>tiêu đề việt</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $coupon->title }}"></div>
            <div class="col-sm-4"><label>tiêu đề anh</label>
                <input type="text" class="form-control" id="title_en" name="title_en" value="{{ $coupon->title_en }}"></div>
            <div class="col-sm-4"><label>tiêu đề lào</label>
                <input type="text" class="form-control" id="title_laos" name="title_laos"
                       value="{{ $coupon->title_laos }}"></div>
        </div>
        <div class="row">
            <div class="col-sm-4"><label>Mô tả ngắn việt</label>
                <textarea class="form-control" name="short_description" id="short_description">{{ $coupon->short_description }}</textarea>
            </div>
            <div class="col-sm-4"><label>Mô tả ngắn anh</label>
                <textarea class="form-control" name="short_description_en" id="short_description_en">{{ $coupon->short_description_en }}</textarea>
            </div>
            <div class="col-sm-4"><label>Mô tả ngắn lào</label>
                <textarea class="form-control" name="short_description_laos" id="short_description_laos">{{ $coupon->short_description_laos }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"><label>Mô tả dài việt</label>
                <textarea class="form-control" name="description" id="description">{{ $coupon->description }}</textarea>
            </div>
            <div class="col-sm-4"><label>Mô tả dài anh</label>
                <textarea class="form-control" name="description_en" id="description_en">{{ $coupon->description_en }}</textarea>
            </div>
            <div class="col-sm-4"><label>Mô tả dài lào</label>
                <textarea class="form-control" name="description_laos" id="description_laos">{{ $coupon->description_laos }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6"><label>Thời gian bắt đầu</label>
                <input type="datetime-local" class="form-control" id="startDate" name="startDate" value="{{ $coupon->startDate }}"></div>
            <div class="col-sm-6"><label>Thời gian kết thúc</label>
                <input type="datetime-local" class="form-control" id="endDate" name="endDate" value="{{ $coupon->endDate }}"></div>
        </div>
        <div class="row">
            <div class="col-sm-6"><label>Số lượng đký tối đa</label>
                <input type="number" class="form-control" id="max_register" name="max_register" value="{{ $coupon->max_register }}">
            </div>
            <div class="col-sm-6"><label>Trạng thái</label>
                <select class="custom-select" id="status" name="status">
                    <option value="{{ \App\Enums\CouponStatus::ACTIVE }}" {{ $coupon->status === \App\Enums\CouponStatus::ACTIVE ? 'selected' : '' }}>
                        {{ \App\Enums\CouponStatus::ACTIVE }}
                    </option>
                    <option value="{{ \App\Enums\CouponStatus::INACTIVE }}" {{ $coupon->status === \App\Enums\CouponStatus::INACTIVE ? 'selected' : '' }}>
                        {{ \App\Enums\CouponStatus::INACTIVE }}
                    </option>
                    <option value="{{ \App\Enums\CouponStatus::DELETED }}" {{ $coupon->status === \App\Enums\CouponStatus::DELETED ? 'selected' : '' }}>
                        {{ \App\Enums\CouponStatus::DELETED }}
                    </option>
                </select>

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

                const fieldNames = [
                    "title", "title_en", "title_laos", "short_description",
                    "short_description_en", "short_description_laos", "description",
                    "description_en", "description_laos", "startDate", "endDate",
                    "max_register", "status"
                ];

                fieldNames.forEach(fieldName => {
                    formData.append(fieldName, $(`#${fieldName}`).val());
                });
                formData.append("user_id", '{{ \Illuminate\Support\Facades\Auth::user()->id }}');

                try {
                    $.ajax({
                        url: `{{route('api.backend.coupons.update', ['id' => $coupon->id])}}`,
                        method: 'post',
                        headers: headers,
                        contentType: false,
                        cache: false,
                        processData: false,
                        data: formData,
                        success: function () {
                            alert('success');
                            window.location.href = '/admin/home/list-coupon';
                        },
                        error: function (exception) {
                            console.log(exception);
                        }
                    });
                } catch (error) {
                    throw error;
                }
            })
        })
    </script>
@endsection
