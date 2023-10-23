@extends('layouts.master')
@section('title', 'Flea Market')
@section('content')
    @include('layouts.partials.headerFleaMarket')
    <body>
    @include('component.banner')
    <div class="container mt-70">
        <div class="pc-hidden">@include('What-free.header-wFree')</div>
        <div class="d-flex mt-88">
            <div class="col-md-3 mobile-hidden">
                <div class="border-radius ">
                    <div class="flea-text">Filter</div>
                    <div>
                        <input type="checkbox">
                        <label class="flea-text-gray">All (96)</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label class="flea-text-gray">Equipments (71)</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label class="flea-text-gray">Furniture (55)</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label class="flea-text-gray">Medicine (54)</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label class="flea-text-gray">Cosmetics (49)</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label class="flea-text-gray">Furniture (53)</label>
                    </div>
                    <div>
                        <input type="checkbox">
                        <label class="flea-text-gray">Others (47)</label>
                    </div>
                    <div class="flea-text-sp">See all categories</div>
                </div>
                <div class="border-radius mt-3">
                    <h4>Price</h4>
                    <div class="d-flex">
                        <input class="flea-input-price" placeholder="$ 0">
                        <div><img src="{{asset('img/flea-market/line.png')}}"></div>
                        <input class="flea-input-price" placeholder="$ 0">
                    </div>
                    <div><img class="w-100 h-100 m-0" src="{{asset('img/flea-market/sixebar.png')}}"></div>
                </div>
            </div>
            <div class="col-md-9 medicine-list--item">
                <div class="page row ">
                    @for($i = 0; $i < 12; $i++)
                        <div class="col-md-4 col-6 item">
                            @include('component.product-wish')
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
    </body>

@endsection
