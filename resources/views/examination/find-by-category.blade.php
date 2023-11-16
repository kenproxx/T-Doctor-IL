@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.partials.header_3')
    @include('component.banner')

    <div id="title" class="d-flex justify-content-center">
        <div class="list-title">
            <div class="list--doctor p-0">
                <a class="back" href="{{route('examination.findmymedicine')}}"><p><i class="bi bi-arrow-left"></i><b> {{ $categoryProduct->name }}</b></p></a>
            </div>
        </div>
    </div>
    <div class="row list-doctor container m-auto">
        @if(count($productCategories) > 0)
            @foreach($productCategories as $productCategory)
                @php
                    $user = \App\Models\User::find($productCategory->user_id);
                @endphp
                <div class="card col-md-3">
                    <i class="bi bi-heart"></i>
                    <img src="{{asset($productCategory->thumbnail)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="{{ route('medicine.detail', $productCategory->id) }}"><h5 class="card-title">{{ $productCategory->name }}</h5></a>
                        <p class="card-text_1">Location: <b>{{ $user->address_code }}</b></p>
                        <p class="card-text_1">Price: <b>{{ $productCategory->price }} {{ $productCategory->unit_price }}</b></p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
