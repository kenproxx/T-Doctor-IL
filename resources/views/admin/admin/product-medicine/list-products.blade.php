@extends('layouts.admin')
@section('title')
    List Products
@endsection
@section('main-content')
    <div class="">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"> List Products </h1>
        <div class="d-flex align-items-center justify-content-between">
            <div class="mb-3 col-md-3">
                <input class="form-control" id="inputSearchProduct" type="text" placeholder="Search.."/>
            </div>
        </div>
        <br>
        <table class="table" id="tableListProduct">
            <thead>
            <tr>
                <th scope="col">{{ __('home.STT') }}</th>
                <th scope="col">{{ __('home.Product name') }}</th>
                <th scope="col">{{ __('home.Price') }}</th>
                <th scope="col">{{ __('home.Quantity') }}</th>
                <th scope="col">{{ __('home.Status') }}</th>
                <th scope="col">{{ __('home.Action') }}</th>
            </tr>
            </thead>
            <tbody id="tbodyListProduct">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

