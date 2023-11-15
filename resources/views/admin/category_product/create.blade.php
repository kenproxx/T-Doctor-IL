@php use App\Enums\NewEventStatus; @endphp
@php use App\Enums\NewEventType; @endphp
@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">create</h1>
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-4">
                <label>Title </label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="col-sm-4">
                <label>Title Anh</label>
                <input type="text" class="form-control" id="name_en" name="name_en">
            </div>
            <div class="col-sm-4">
                <label>Title Lào</label>
                <input type="text" class="form-control" id="name_laos" name="name_laos">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label>status</label>
                <select class="custom-select" id="status" name="status">
                    <option
                        value="1" selected>Active</option>
                    <option
                        value="0">Inactive</option>
                </select>
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

            const arrField = ['name', 'name_en', 'name_laos', 'status' ];

            arrField.forEach((field) => {
                formData.append(field, $(`#${field}`).val().trim());
            });

            formData.append('_token', '{{ csrf_token() }}');

            try {
                $.ajax({
                    url: `{{route('api.backend.category-product.store')}}`,
                    method: 'POST',
                    headers: headers,
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: formData,
                    success: function (data) {
                        alert(data);
                        loadingMasterPage();
                        window.location.href = `{{route('api.backend.category-product.index')}}`;
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
