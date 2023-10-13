@extends('layouts.master')
@section('title', 'Online Medicine')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')

    <div class="medicine container">
        <div class="row medicine-search">
            <div class="medicine-search--left col-md-3 d-flex justify-content-around">
                <div class="title">Category <i class="bi bi-arrow-down-up"></i></div>
                <div class="title">Location <i class="bi bi-arrow-down-up"></i></div>
            </div>
            <div class="medicine-search--center col-md-6 row d-flex justify-content-between">
                <form class="search-box col-md-10">
                    <input type="search" name="focus" placeholder="Search" id="search-input" value="">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </form>
                <button  type="button" data-toggle="modal" data-target="#exampleModal" class="shopping-bag">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <div class="text-wrapper">1</div>
                </button>
                @include('component.modal-cart')
            </div>
            <div class="medicine-search--right col-md-3 d-flex row justify-content-between">
                <div class="col-md-6 ">
                    <div class="div-wrapper">
                        <a href="#">Create prescription</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="div-wrapper">
                        <a href="#">Wish list</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="medicine-list row">
            <div class="col-md-3 medicine-list--filter">
                <div class="filter">
                    <div class="filter-header d-flex justify-content-between">
                        <div class="text-wrapper">Filter</div>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="filter-body">
                        <div class="d-flex item">
                            <input type="checkbox">
                            <div class="text-all">All (96)</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox">
                            <div class="text">Health</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox">
                            <div class="text">Beauty</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox">
                            <div class="text">Kids</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox">
                            <div class="text">Pet</div>
                        </div>
                    </div>
                </div>
                <div class="filter">
                    <div class="filter-header d-flex justify-content-between">
                        <div class="text-wrapper">Object</div>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="filter-body">
                        <div class="d-flex item">
                            <input type="checkbox">
                            <div class="text">For kids</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox">
                            <div class="text">For women</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox">
                            <div class="text">For men</div>
                        </div>
                        <div class="d-flex item">
                            <input type="checkbox">
                            <div class="text">For adults</div>
                        </div>
                    </div>
                </div>
                <div class="price">

                </div>
            </div>
            <div class="col-md-9 medicine-list--item">
                <div class="page row ">
                    @for($i = 0; $i < 12; $i++)
                        <div class="col-md-4 item">
                            @include('component.products')
                        </div>
                    @endfor
                </div>
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
