@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.partials.header_3')
    @include('component.banner')

    <div class="container">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <textarea type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <button type="button" class="btn btn-secondary" onclick="history.back()">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
