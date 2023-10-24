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
    <form method="post" action="{{ route('api.backend.clinics.create') }}">
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
                <label>address_detail</label>
                <input type="text" class="form-control" id="address_detail" name="address_detail"
                       value="">
            </div>
            <div>
                <label>address_detail_en</label>
                <input type="text" class="form-control" id="address_detail_en" name="address_detail_en"
                       value="">
            </div>
            <div>
                <label>nation_id</label>
                <input type="text" class="form-control" id="nation_id" name="nation_id"
                       value="">
            </div>
            <div>
                <label>province_id</label>
                <input type="text" class="form-control" id="province_id" name="province_id" value="">
            </div>
            <div>
                <label>district_id</label>
                <input type="text" class="form-control" id="district_id" name="district_id" value="">
            </div>
            <div>
                <label>commune_id</label>
                <input type="text" class="form-control" id="commune_id" name="commune_id" value="">
            </div>
            <div>
                <label>introduce</label>
                <input type="text" class="form-control" id="introduce" name="introduce"
                       value="">
            </div>
            <div>
                <label>gallery</label>
                <input type="text" class="form-control" id="gallery" name="gallery" value="">
            </div>
            <div>
                <label>status</label>
                <input type="text" class="form-control" id="status" name="status" value="">
            </div>
            <div hidden="">
                <label>User</label>
                <input type="text" class="form-control" id="user_id" name="user_id" value="{{Auth::user()->id}}">
            </div>
            <div>
                <label>open_date</label>
                <input type="datetime-local" class="form-control" id="open_date" name="open_date" value="">
            </div>
            <div>
                <label>close_date</label>
                <input type="datetime-local" class="form-control" id="close_date" name="close_date" value="">
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
                    address_detail: $('#address_detail').val(),
                    address_detail_en: $('#address_detail_en').val(),
                    nation_id: $('#nation_id').val(),
                    province_id: $('#province_id').val(),
                    gallery: $('#gallery').val(),
                    district_id: $('#district_id').val(),
                    commune_id: $('#commune_id').val(),
                    introduce: $('#introduce').val(),
                    open_date: $('#open_date').val(),
                    close_date: $('#close_date').val(),
                    user_id: $('#user_id').val(),
                    status: "ACTIVE"
                };

                let value = JSON.stringify(item);

                try {
                    $.ajax({
                        url: `{{route('api.backend.clinics.create')}}`,
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
