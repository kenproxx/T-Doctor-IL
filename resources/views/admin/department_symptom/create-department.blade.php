@extends('layouts.admin')
@section('title')
    {{ __('home.Create Department') }}
@endsection
@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('home.Create Department') }}</div>

                    <div class="card-body">
                        <form action="{{ route('departments.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">{{ __('home.Name') }}:</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('home.Mô tả') }}:</label>
                                <input name="description" id="description" class="form-control" required></input>
                            </div>

                            <div class="form-group">
                                <label for="image">{{ __('home.Ảnh đại diện') }}:</label>
                                <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('home.Thêm mới') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
