@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.partials.header_2')
    @include('component.banner')
    <div class="d-flex justify-content-evenly">
        <div id="filter" class="d-flex justify-content-around ">
            <div class="d-flex flex-fill">
                <div class="filter_option"><p>Category</p></div>
                <div class="filter_option"><p>Location</p></div>
                <div class="filter_option"><p>Hospital</p></div>
                <div class="filter_option"><p>Experience</p></div>
            </div>
            <div class="filter_search flex-fill">
                <label for="filter_search"><i class="bi bi-search"></i></label>
                <input type="text" name="filter_search" id="filter_search" placeholder="Search for anything.....">
            </div>
            <div class="flex-fill"><button><i class="bi bi-filter"></i></button></div>
        </div>
    </div>
    <div id="list-doctor" class="d-flex container">
        <div class="list--doctor p-0">
            <h2>Best doctor</h2>
        </div>
        <div class="ms-auto p-2"><a href="{{route('examination.best_doctor')}}">See all</a></div>
    </div>
    <hr>
    <div id="list-doctor" class="d-flex justify-content-evenly container">
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
    </div>
    <div id="list-doctor" class="d-flex justify-content-evenly container">
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
    </div>
    <div id="list-doctor" class="d-flex justify-content-evenly container">
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
    </div>
    <div id="list-doctor" class="d-flex container">
        <div class="list--doctor p-0">
            <h2>New doctor</h2>
        </div>
        <div class="ms-auto p-2"><a href="{{route('examination.new_doctor')}}">See all</a></div>
    </div>
    <hr>
    <div id="list-doctor" class="d-flex justify-content-evenly container">
            <div class="card">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">BS Đô Văn Định</h5>
                    <p  class="card-text">respiratory doctor</p>
                    <p  class="card-text_1">Location: <b>Hanoi</b></p>
                    <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
            <div class="card">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">BS Đô Văn Định</h5>
                    <p  class="card-text">respiratory doctor</p>
                    <p  class="card-text_1">Location: <b>Hanoi</b></p>
                    <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
            <div class="card">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">BS Đô Văn Định</h5>
                    <p  class="card-text">respiratory doctor</p>
                    <p  class="card-text_1">Location: <b>Hanoi</b></p>
                    <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
            <div class="card">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">BS Đô Văn Định</h5>
                    <p  class="card-text">respiratory doctor</p>
                    <p  class="card-text_1">Location: <b>Hanoi</b></p>
                    <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
        </div>
    <div id="list-doctor" class="d-flex justify-content-evenly container">
            <div class="card">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">BS Đô Văn Định</h5>
                    <p  class="card-text">respiratory doctor</p>
                    <p  class="card-text_1">Location: <b>Hanoi</b></p>
                    <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
            <div class="card">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">BS Đô Văn Định</h5>
                    <p  class="card-text">respiratory doctor</p>
                    <p  class="card-text_1">Location: <b>Hanoi</b></p>
                    <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
            <div class="card">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">BS Đô Văn Định</h5>
                    <p  class="card-text">respiratory doctor</p>
                    <p  class="card-text_1">Location: <b>Hanoi</b></p>
                    <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
            <div class="card">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">BS Đô Văn Định</h5>
                    <p  class="card-text">respiratory doctor</p>
                    <p  class="card-text_1">Location: <b>Hanoi</b></p>
                    <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
        </div>
    <div id="list-doctor" class="d-flex justify-content-evenly container">
            <div class="card">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">BS Đô Văn Định</h5>
                    <p  class="card-text">respiratory doctor</p>
                    <p  class="card-text_1">Location: <b>Hanoi</b></p>
                    <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
            <div class="card">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">BS Đô Văn Định</h5>
                    <p  class="card-text">respiratory doctor</p>
                    <p  class="card-text_1">Location: <b>Hanoi</b></p>
                    <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
            <div class="card">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">BS Đô Văn Định</h5>
                    <p  class="card-text">respiratory doctor</p>
                    <p  class="card-text_1">Location: <b>Hanoi</b></p>
                    <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
            <div class="card">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">BS Đô Văn Định</h5>
                    <p  class="card-text">respiratory doctor</p>
                    <p  class="card-text_1">Location: <b>Hanoi</b></p>
                    <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
        </div>
    <div id="list-doctor" class="d-flex container">
        <div class="list--doctor p-0">
            <h2>24/7 Available doctor</h2>
        </div>
        <div class="ms-auto p-2"><a href="{{route('examination.available_doctor')}}">See all</a></div>
    </div>
    <hr>
    <div id="list-doctor" class="d-flex justify-content-evenly container">
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
    </div>
    <div id="list-doctor" class="d-flex justify-content-evenly container">
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
    </div>
    <div id="list-doctor" class="d-flex justify-content-evenly container">
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
        <div class="card">
            <i class="bi bi-heart"></i>
            <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">BS Đô Văn Định</h5>
                <p  class="card-text">respiratory doctor</p>
                <p  class="card-text_1">Location: <b>Hanoi</b></p>
                <p  class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
            </div>
        </div>
    </div>

@endsection
