@extends('layouts.master')
@section('title', 'Online Medicine')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
<div class="container">
    @include('What-free.header-wFree')
    <div class="clinics-list">
        <div class="clinics-header row">
            <div class=" d-flex justify-content-between">
                <span class="near">Suggestions near you</span>
                <span>
                    <a href="">See all</a>
                </span>
            </div>
        </div>
        @include('component.clinic')
    </div>
    <div class="other-clinics">
        <div class="title">
            Other Clinics/Pharmacies
        </div>
        <div class="body row">
            @for($i = 0; $i < 12; $i++)
                <div class="col-md-4">
                    @include('component.clinic')
                </div>
            @endfor
        </div>
        <div class="text-center">
            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
