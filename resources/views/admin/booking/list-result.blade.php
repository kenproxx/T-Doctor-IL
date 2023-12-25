@extends('layouts.admin')
@section('title')
    List Result
@endsection
@section('main-content')
    <div class="container-fluid">
        <h3 class="title">List Result</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ServiceName</th>
                <th scope="col">Result</th>
                <th scope="col">Code</th>
                <th scope="col">Create By</th>
                <th scope="col">BusinessName</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>Larry</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>Larry</td>
                <td>Larry</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
