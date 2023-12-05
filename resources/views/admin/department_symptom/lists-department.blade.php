@extends('layouts.admin')
@section('title')
    List Departments
@endsection
@section('main-content')
    <style>

    </style>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800" id="listTextMedical">{{ __('home.list-departments') }}</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand btn btn-primary mb-3" href="{{route('department.create')}}"> <span
                class="text-white">{{ __('home.add-new-department') }}</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </nav>
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Tên chuyên khoa</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Ảnh đại diện</th>
        </tr>
        </thead>
        <tbody id="ProductsAdmin">
            @foreach($departments as $department)
                <tr>
                    <td>{{$department->name}}</td>
                    <td>{{$department->description}}</td>
                    <td><img src="{{ asset($department->thumbnail) }}" alt="Image" width="50px"></td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
