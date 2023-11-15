@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.partials.header_3')
    @include('component.banner')
    <div id="examination-scene" class="container ">
        <div class="d-flex justify-content-center">
            <div id="filter" class="box--3 d-flex ">
                <div class="d-flex flex-fill">
                    <div class="filter_option"><p>Category <i class="bi bi-chevron-expand"></i></p></div>
                    <div class="filter_option"><p>Position <i class="bi bi-chevron-expand"></i></p></div>
                    <div class="filter_option"><p>Location <i class="bi bi-chevron-expand"></i></p></div>
                    <div class="filter_option"><p>Experience <i class="bi bi-chevron-expand"></i></p></div>
                </div>
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control" placeholder="Search for anything…">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div id="list-title-best" class="list-title d-flex">
                <div class="list--doctor p-0">
                    <p>Best doctor</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.best_doctor')}}">See all</a></div>
            </div>
        </div>
        <div id="list-doctor-best" class="list-doctor d-flex justify-content-center">

        </div>
        <div class="d-flex justify-content-center">
            <div id="list-title-new" class="list-title d-flex">
                <div class="list--doctor p-0">
                    <p>New doctor</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.new_doctor')}}">See all</a></div>
            </div>
        </div>
        <div id="list-doctor-new" class="list-doctor d-flex justify-content-center">

        </div>
        <div class="d-flex justify-content-center">
            <div id="list-title-available" class="list-title d-flex">
                <div class="list--doctor p-0">
                    <p>24/7 Available doctor</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.available_doctor')}}">See all</a></div>
            </div>
        </div>
        <div id="list-doctor-available" class="list-doctor d-flex justify-content-center">

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
                    let imageDoctor = item['thumbnail'];
                    let myArray = imageDoctor.split("/storage");
                    html = html + `<div class="card" >
                <i class="bi bi-heart"></i>
                <img src=" ${url}${myArray[1]} " class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="${mainUrl}"><h5 class="card-title">${item['name']}</h5></a>
                    <p class="card-text">Specialty: ${item['specialty']}</p>
                    <p class="card-text_1">Location: <b>${item['detail_address']}</b></p>
                    <p class="card-text_1">Working time: <b>${item['time_working_1']}</b></p>
                </div>
            </div>`;

                }
                $('#list-doctor-new').empty().append(html);
                $('#list-doctor-best').empty().append(html);
                $('#list-doctor-available').empty().append(html);
            }
        })
    </script>
@endsection

