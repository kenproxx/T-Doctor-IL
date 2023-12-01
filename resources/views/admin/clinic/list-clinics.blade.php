@extends('layouts.admin')

@section('main-content')
    <style>

    </style>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('List Clinics') }}</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand btn btn-primary mb-3" href="{{route('clinics.create.product')}}"> <span
                class="text-white">Add</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="form-group">
                <select id="type_medical" class="form-control">
                    @foreach($types as $type)
                        <option value="{{$type}}"> {{$type}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </nav>

    @include('admin.clinic.tab-list-clinics')

@endsection
