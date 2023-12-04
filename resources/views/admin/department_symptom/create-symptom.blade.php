@extends('layouts.admin')
@section('title')
    Create Symptoms
@endsection
@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Symptom</div>

                    <div class="card-body">
                        <form action="{{ route('symptom.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Tên:</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Mô tả:</label>
                                <input name="description" id="description" class="form-control" required></input>
                            </div>

                            <div class="form-group">
                                <label for="image">Ảnh đại diện:</label>
                                <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
                            </div>

                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
