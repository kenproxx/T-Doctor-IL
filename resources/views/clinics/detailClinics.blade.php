@extends('layouts.master')
@section('title', 'Online Medicine')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="container">
        @include('What-free.header-wFree')

        <div class="detail-clinics">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.4779394253983!2d105.75396807499916!3d20.973470389675743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313453005de9eab7%3A0x9050a578a1b5975e!2zVGhlIFRlcnJhIEFuIEjGsG5nIC0gVOG7kSBI4buvdSwgSMOgIMSQw7RuZw!5e0!3m2!1sen!2s!4v1697177853055!5m2!1sen!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
