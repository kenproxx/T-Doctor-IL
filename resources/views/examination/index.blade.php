@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.partials.header_3')
    @include('component.banner')
    <div id="examination-scene" class="container ">
        <div class="d-flex w-100">
            <div id="filter" class="box--3 d-flex justify-content-between w-100">
                <div class="d-flex flex-fill">
                    <div class="filter_option" style="list-style: none;">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('home.Department') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($departments as $department)
                                    <a class="dropdown-item doctor-department" href="#"
                                       data-department="{{$department}}">{{$department->name}}</a>
                                @endforeach
                            </div>
                        </li>
                    </div>
                    <div class="filter_option"><p>{{ __('home.Position') }}</p></div>
                    <div class="filter_option"><p>{{ __('home.Location') }}</p></div>
                    <div class="filter_option"><p>{{ __('home.Experience') }}</p></div>
                </div>
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control" placeholder="{{ __('home.Search for anything…') }}">
                </div>
            </div>
        </div>
        <div id="show-doctor">
            <div class="d-flex justify-content-center" style="padding: 12px">
                <div id="list-title-best" class="list-title d-flex">
                    <div class="list--doctor p-0">
                        <p>{{ __('home.Best doctor') }}</p>
                    </div>
                    <div class="ms-auto p-2"><a href="{{route('examination.best_doctor')}}">{{ __('home.See all') }}</a></div>
                </div>
            </div>
            <div id="list-doctor-best" class="list-doctor row m-auto p-0">

            </div>
            <div class="d-flex justify-content-center" style="padding: 12px">
                <div id="list-title-new" class="list-title d-flex">
                    <div class="list--doctor p-0">
                        <p>{{ __('home.New doctor') }}</p>
                    </div>
                    <div class="ms-auto p-2"><a href="{{route('examination.new_doctor')}}">{{ __('home.See all') }}</a></div>
                </div>
            </div>
            <div id="list-doctor-new" class="list-doctor row m-auto">

            </div>
            <div class="d-flex justify-content-center" style="padding: 12px;">
                <div id="list-title-available" class="list-title d-flex">
                    <div class="list--doctor p-0">
                        <p>{{ __('home.24/7 Available doctor') }}</p>
                    </div>
                    <div class="ms-auto p-2"><a href="{{route('examination.available_doctor')}}">{{ __('home.See all') }}</a></div>
                </div>
            </div>
            <div id="list-doctor-available" class="list-doctor row m-auto">

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            async function callListDoctor() {
                await $.ajax({
                    url: `{{route('doctors.info.restapi.list')}}/?size=4`,
                    method: 'GET',
                    success: function (response) {
                        showListDoctor(response);
                    },
                    error: function (exception) {
                        console.log(exception)
                    }
                });
            }

            callListDoctor();

            function showListDoctor(res) {
                let html = ``;
                let url = `{{ asset('storage') }}`;
                let detailDoctor = `{{ route('examination.doctor_info', ['id' => ':id']) }}`;
                for (let i = 0; i < res.length; i++) {
                    let item = res[i];
                    let mainUrl = detailDoctor.replace(':id', item['id']);
                    let imageDoctor = item.avt;
                    let myArray = [];
                    if (imageDoctor) {
                        myArray = imageDoctor.split("/storage");
                    }
                    html = html + `<div class="col-md-3" >
                                    <div class="card">
                            <i class="bi bi-heart"></i>
                            <img src=" ${url}${myArray[1]} " class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="${mainUrl}"><h5 class="card-title">${item['name']}</h5></a>
                                <p class="card-text">{{ __('home.Specialty') }}: ${item['specialty']}</p>
                                <p class="card-text_1">{{ __('home.Location') }}: <b>${item['detail_address']}</b></p>
                                <p class="card-text_1">{{ __('home.Working time') }}: <b>${item['time_working_1']}</b></p>
                            </div>
                        </div>
                    </div>`;
                }
                $('#list-doctor-new').empty().append(html);
                $('#list-doctor-best').empty().append(html);
                $('#list-doctor-available').empty().append(html);
            }

            $('.doctor-department').on('click', function () {
                let department = $(this).data('department');
                callListDoctorByDepartment(department);
            })

            function showListDoctorDepartment(res, department) {
                let html = ``;
                let url = `{{ asset('storage') }}`;
                let detailDoctor = `{{ route('examination.doctor_info', ['id' => ':id']) }}`;
                for (let i = 0; i < res.length; i++) {
                    let item = res[i];
                    let mainUrl = detailDoctor.replace(':id', item['id']);
                    let imageDoctor = item['thumbnail'];
                    let myArray = [];
                    if (imageDoctor) {
                        myArray = imageDoctor.split("/storage");
                    }
                    html = html + `<div class="card col-md-3" >
                              <i class="bi bi-heart"></i>
                            <img src=" ${url}${myArray[1]} " class="card-img-top" alt="...">
                            <div class="card-body">
                                <a href="${mainUrl}"><h5 class="card-title">${item['name']}</h5></a>
                                <p class="card-text">{{ __('home.Specialty') }}: ${item['specialty']}</p>
                                <p class="card-text_1">{{ __('home.Location') }}: <b>${item['detail_address']}</b></p>
                                <p class="card-text_1">{{ __('home.Working time') }}: <b>${item['time_working_1']}</b></p>
                            </div>
                        </div>`;
                }

                let listDoctor = `<div id="list-doctor-department" class="list-doctor row container m-auto"> ${html} </div>`;
                let showDepartment = `<div class="d-flex justify-content-center">
                        <div id="list-title-department" class="list-title d-flex">
                            <div class="list--doctor p-0">
                                <p>${department['name']}</p>
                            </div>
                        <div class="ms-auto p-2"><a href="{{route('examination.index')}}">{{ __('home.See all') }}</a></div>
                        </div>
                    </div>`;
                let allHtml = showDepartment + listDoctor;
                $('#show-doctor').empty().append(allHtml);
            }

            async function callListDoctorByDepartment(department) {
                let url = `{{route('doctors.info.restapi.department', ['id' => ':id'])}}/?size=4`;
                url = url.replace(':id', department['id']);
                await $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (response) {
                        showListDoctorDepartment(response, department);
                    },
                    error: function (exception) {
                        console.log(exception)
                    }
                });
            }
        })
    </script>
@endsection

