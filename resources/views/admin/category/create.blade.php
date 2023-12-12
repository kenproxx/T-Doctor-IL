@extends('layouts.admin')
@section('title')
    {{ __('home.Create Category') }}
@endsection
@section('main-content')
    <h3 class="text-center"> {{ __('home.Create Category') }}</h3>
    <div class="container">
        <form>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="name">{{ __('home.Name') }}</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="name_en">{{ __('home.name_en') }}</label>
                    <input type="text" class="form-control" id="name_en">
                </div>
                <div class="form-group col-md-4">
                    <label for="name_laos">{{ __('home.name_laos') }}</label>
                    <input type="text" class="form-control" id="name_laos">
                </div>
            </div>
            <div class="form-group">
                <label for="description">{{ __('home.Description') }}</label>
                <input type="text" class="form-control" id="description" placeholder="{{ __('home.Description') }}">
            </div>
            <div class="form-group">
                <label for="description_en">{{ __('home.Description English') }}</label>
                <input type="text" class="form-control" id="description_en" placeholder="{{ __('home.Description English') }}">
            </div>
            <div class="form-group">
                <label for="description_laos">{{ __('home.Description Laos') }}</label>
                <input type="text" class="form-control" id="description_laos" placeholder="{{ __('home.Description Laos') }}">
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="thumbnail">{{ __('home.Thumbnail') }}</label>
                    <input type="file" class="form-control" id="thumbnail" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="parent_id">{{ __('home.Parent') }}</label>
                    <select id="parent_id" class="form-select">
                        <option value="0">{{ __('home.Choose...') }}</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="status">{{ __('home.Status') }}</label>
                    <select id="status" class="form-select">
                        @foreach($status as $item)
                            @if($item != 'DELETED')
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="text-center mt-3">
                <button type="button" class="btn btn-primary" id="btnCreate">{{ __('home.create') }}</button>
            </div>
        </form>
    </div>
    <script>
        let token = `{{ $_COOKIE['accessToken'] }}`;
        let accessToken = `Bearer ` + token;
        let headers = {
            "Authorization": accessToken
        };

        $(document).ready(function () {
            $('#btnCreate').on('click', function () {
                createCategory();
            })

            async function createCategory() {
                let categoryUrl = `{{ route('api.business.categories.create')  }}`;

                const formData = new FormData();

                const fieldNames = [
                    "name", "name_en", "name_laos",
                    "description", "description_en", "description_laos",
                    "parent_id", "status",
                ];

                fieldNames.forEach(fieldName => {
                    formData.append(fieldName, $(`#${fieldName}`).val());
                });

                formData.append("user_id", '{{ Auth::user()->id }}');
                formData.append("thumbnail", $('#thumbnail')[0].files[0]);

                if ($('#name').val() && $('#description').val()) {
                    await $.ajax({
                        url: categoryUrl,
                        method: 'POST',
                        headers: headers,
                        contentType: false,
                        cache: false,
                        processData: false,
                        data: formData,
                        success: function (response) {
                            alert('Create success!');
                            window.location.href = `{{ route('view.admin.category.index') }}`;
                        },
                        error: function (error) {
                            console.log(error);
                            alert('Create error!');
                        }
                    });
                } else {
                    alert('Please check input require!')
                }
            }
        })
    </script>
@endsection
