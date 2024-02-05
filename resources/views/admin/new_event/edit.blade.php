@php use App\Enums\NewEventStatus; @endphp
@php use App\Enums\NewEventType; @endphp
@extends('layouts.admin')
@section('title', 'News Events')
@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('home.Edit') }}</h1>
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
                <label for="title">{{ __('home.Title') }}</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $newEvent->title ?? '' }}">
            </div>
            <div class="col-sm-4">
                <label for="title_en">{{ __('home.Title Anh') }}</label>
                <input type="text" class="form-control" id="title_en" name="title_en"
                       value="{{ $newEvent->title_en ?? '' }}">
            </div>
            <div class="col-sm-4">
                <label for="title_laos">{{ __('home.Title Lào') }}</label>
                <input type="text" class="form-control" id="title_laos" name="title_laos"
                       value="{{ $newEvent->title_laos ?? '' }}">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="short_description">{{ __('home.Mô tả ngắn việt') }}</label>
                <textarea type="text" class="form-control" id="short_description"
                          name="short_description">{{ $newEvent->short_description ?? '' }}</textarea>
            </div>
            <div class="col-sm-4">
                <label for="short_description_en">{{ __('home.Mô tả ngắn anh') }}</label>
                <textarea type="text" class="form-control" id="short_description_en"
                          name="short_description_en">{{ $newEvent->short_description_en ?? '' }}</textarea>
            </div>
            <div class="col-sm-4">
                <label for="short_description_laos">{{ __('home.Mô tả ngắn lào') }}</label>
                <textarea type="text" class="form-control" id="short_description_laos"
                          name="short_description_laos">{{ $newEvent->short_description_laos ?? '' }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="description">{{ __('home.Mô tả dài việt') }}</label>
                <textarea type="text" class="form-control" id="description"
                          name="description">{{ $newEvent->description ?? '' }}</textarea>
            </div>
            <div class="col-sm-4">
                <label for="description_en">{{ __('home.Mô tả dài anh') }}</label>
                <textarea type="text" class="form-control" id="description_en"
                          name="description_en">{{ $newEvent->description_en ?? '' }}</textarea>
            </div>
            <div class="col-sm-4">
                <label for="description_laos">{{ __('home.Mô tả dài lào') }}</label>
                <textarea type="text" class="form-control" id="description_laos"
                          name="description_laos">{{ $newEvent->description_laos ?? '' }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="status">{{ __('home.Status') }}</label>
                <select class="form-select" id="status" name="status">
                    <option
                        value="{{ NewEventStatus::ACTIVE }}" {{ $newEvent->status === NewEventStatus::ACTIVE ? 'selected' : '' }}>{{ NewEventStatus::ACTIVE }}</option>
                    <option
                        value="{{ NewEventStatus::INACTIVE }}" {{ $newEvent->status === NewEventStatus::INACTIVE ? 'selected' : '' }}>{{ NewEventStatus::INACTIVE }}</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label for="type">{{ __('home.Loại') }}</label>
                <select class="form-select" id="type" name="type">
                    <option
                        value="{{ NewEventType::NEWS }}" {{ $newEvent->type === NewEventType::NEWS ? 'selected' : '' }}>{{ NewEventType::NEWS }}</option>
                    <option
                        value="{{ NewEventType::EVENT }}" {{ $newEvent->type === NewEventType::EVENT ? 'selected' : '' }}>{{ NewEventType::EVENT }}</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label>{{ __('home.Thumbnail') }}</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*">
                <img loading="lazy" src="{{ asset($newEvent->thumbnail) }}" alt="" style="max-width: 100px">
            </div>
            <input type="hidden" id="id" name="id" value="{{ $newEvent->id ?? '' }}">
        </div>
    </form>
    <button type="button" onclick="submitForm()" class="btn btn-primary up-date-button mt-md-4">{{ __('home.Save') }}</button>
    <script>

        function submitForm() {
            loadingMasterPage();
            const headers = {
                'Authorization': `Bearer ${token}`
            };
            const formData = new FormData();

            const arrField = ['title', 'title_en', 'title_laos', 'status', 'id', 'type'];

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
                    url: `{{route('api.new-event.update')}}`,
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
