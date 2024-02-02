@extends('layouts.admin')
@section('title')
    {{ __('home.Edit') }}
@endsection
@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('home.Edit') }}</div>

                    <div class="card-body">
                        <form action="{{ route('view.admin.department.update', $department->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="name">{{ __('home.Name') }}:</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                           value="{{ $department->name }}" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="name_en">{{ __('home.name_en') }}:</label>
                                    <input type="text" name="name_en" id="name_en" class="form-control"
                                           value="{{ $department->name_en }}" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="name_laos">{{ __('home.name_laos') }}:</label>
                                    <input type="text" name="name_laos" id="name_laos" class="form-control"
                                           value="{{ $department->name_laos }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('home.Description') }}:</label>
                                <textarea class="form-control" name="description" id="description"
                                          rows="3">{{ $department->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description_en">{{ __('home.Description English') }}:</label>
                                <textarea class="form-control" name="description_en" id="description_en"
                                          rows="3">{{ $department->description_en }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description_laos">{{ __('home.Description Laos') }}:</label>
                                <textarea class="form-control" name="description_laos" id="description_laos"
                                          rows="3">{{ $department->description_laos }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">{{ __('home.Ảnh đại diện') }}:</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                <img src="{{ asset($department->thumbnail) }}" alt="" width="80px">
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('home.Thêm mới') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
