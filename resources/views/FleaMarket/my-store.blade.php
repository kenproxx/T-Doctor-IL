@extends('layouts.master')
@section('title', 'Flea Market')
@section('content')
    @include('layouts.partials.headerFleaMarket')
    <body>
    @include('component.banner')
    <div class="container mt-70">
        <div class="d-flex mt-88">
            <div class="col-md-3 mr-2">
                <div class="">
                    <div class="flea-adv row align-items-center justify-content-center">
                        <div class="">ADVERTISEMENT</div>
                    </div>
                </div>
                <div class="">
                    <div class="flea-adv row align-items-center justify-content-center">
                        <div class="">ADVERTISEMENT</div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 medicine-list--item">
                @include('component.avt-info')
                <div class="page row ">
                    @for($i = 0; $i < 12; $i++)
                        <div class="col-md-4 item">
                            @include('component.edit-product')
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
