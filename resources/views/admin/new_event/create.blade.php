@php use App\Enums\NewEventStatus; @endphp
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
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="col-sm-4">
                <label>Title Anh</label>
                <input type="text" class="form-control" id="title_en" name="title_en">
            </div>
            <div class="col-sm-4">
                <label>Title Lào</label>
                <input type="text" class="form-control" id="title_laos" name="title_laos">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label>Short Description</label>
                <textarea type="text" class="form-control" id="short_description" name="short_description"></textarea>
            </div>
            <div class="col-sm-4">
                <label>Short Description Anh</label>
                <textarea type="text" class="form-control" id="short_description_en"
                          name="short_description_en"></textarea>
            </div>
            <div class="col-sm-4">
                <label>Short Description Lào</label>
                <textarea type="text" class="form-control" id="short_description_laos"
                          name="short_description_laos"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label>Description </label>
                <textarea type="text" class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="col-sm-4">
                <label>Description Anh</label>
                <textarea type="text" class="form-control" id="description_en" name="description_en"></textarea>
            </div>
            <div class="col-sm-4">
                <label>Description Lào</label>
                <textarea type="text" class="form-control" id="description_laos" name="description_laos"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label>Status</label>
                <select class="custom-select" id="status" name="status">
                    <option
                        value="{{ NewEventStatus::ACTIVE }}">{{ NewEventStatus::ACTIVE }}</option>
                    <option
                        value="{{ NewEventStatus::INACTIVE }}">{{ NewEventStatus::INACTIVE }}</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label>thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*">
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

            const arrField = ['title', 'title_en', 'title_laos', 'status'];

            const fieldTextareaTiny = [
                'short_description', 'short_description_en', 'short_description_laos',
                'description', 'description_en', 'description_laos',
            ];
            fieldTextareaTiny.forEach(fieldTextarea => {
                const content = tinymce.get(fieldTextarea).getContent();
                formData.append(fieldTextarea, content);
            });

            arrField.forEach((field) => {
                formData.append(field, $(`#${field}`).val().trim());
            });

            const photo = $('#thumbnail')[0].files[0];
            formData.append('thumbnail', photo);

            formData.append('_token', '{{ csrf_token() }}');

            try {
                $.ajax({
                    url: `{{route('api.new-event.store')}}`,
                    method: 'POST',
                    headers: headers,
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: formData,
                    success: function (data) {
                        alert(data);
                        loadingMasterPage();
                        window.location.href = `{{route('api.new-event.index')}}`;
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
