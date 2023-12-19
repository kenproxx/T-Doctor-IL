@extends('layouts.admin')
@section('title')
    {{ __('home.Detail Category') }}
@endsection
@section('main-content')
    <h3 class="text-center">{{ __('home.Detail Category') }}</h3>
    <div class="container">
        <form>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="name">{{ __('home.Name') }}</label>
                    <input type="text" class="form-control" id="name" required value="{{ $category->name }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="name_en">{{ __('home.name_en') }}</label>
                    <input type="text" class="form-control" id="name_en" value="{{ $category->name_en }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="name_laos">{{ __('home.name_laos') }}</label>
                    <input type="text" class="form-control" id="name_laos" value="{{ $category->name_laos }}">
                </div>
            </div>
            <div class="form-group">
                <label for="description">{{ __('home.Description') }}</label>
                <input type="text" class="form-control" id="description" placeholder="Description" value="{{ $category->description }}">
            </div>
            <div class="form-group">
                <label for="description_en">{{ __('home.Description English') }}</label>
                <input type="text" class="form-control" id="description_en" placeholder="Description English" value="{{ $category->description_en }}">
            </div>
            <div class="form-group">
                <label for="description_laos">{{ __('home.Description Laos') }}</label>
                <input type="text" class="form-control" id="description_laos" placeholder="Description Laos" value="{{ $category->description_laos }}">
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="thumbnail">{{ __('home.Thumbnail') }}</label>
                    <input type="file" class="form-control" id="thumbnail" required>
                    @if($category->thumbnail)
                        <img src="{{ asset($category->thumbnail) }}" alt="" width="80px">
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <label for="parent_id">{{ __('home.Parent') }}</label>
                    <select id="parent_id" class="form-select">
                        <option value="0">{{ __('home.Choose...') }}</option>
                        @foreach($categories as $value)
                            <option {{$category->parent_id == $value->id ? 'selected' : ''}} value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="status">Status</label>
                    <select id="status" class="form-select">
                        @foreach($status as $item)
                            @if($item != 'DELETED')
                                <option {{$category->status == $item ? 'selected' : ''}} value="{{ $item }}">{{ $item }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="text-center mt-3">
                <button type="button" class="btn btn-primary" id="btnSaveCategory">{{ __('home.Save') }}</button>
            </div>
        </form>
    </div>

    <script>
        let accessToken = `Bearer ` + token;
        let headers = {
            "Authorization": accessToken
        };

        $(document).ready(function () {
            $('#btnSaveCategory').on('click', function () {
                updateCategory();
            })

            async function updateCategory() {
                let reviewUrl = `{{ route('view.admin.category.index') }}`;
                let reviewUpdateUrl = `{{ route('api.business.categories.update', $category->id) }}`;

                const formData = new FormData();

                const fieldNames = [
                    "name", "name_en", "name_laos",
                    "description", "description_en", "description_laos",
                    "parent_id", "status",
                ];

                fieldNames.forEach(fieldName => {
                    formData.append(fieldName, $(`#${fieldName}`).val());
                });

                formData.append("thumbnail", $('#thumbnail')[0].files[0]);

                await $.ajax({
                    url: reviewUpdateUrl,
                    method: 'POST',
                    headers: headers,
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        alert('Update success!')
                        window.location.href = reviewUrl;
                    },
                    error: function (error) {
                        console.log(error);
                        alert('Update error!')
                    }
                });
            }
        })
    </script>
@endsection
