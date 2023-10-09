@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <head>
        <meta charset="UTF-8">
        <title>TDOCTOR</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,400;1,700&family=Inter:wght@400;500;600;700&family=Mulish:wght@300;400;500;600;700&family=Noto+Sans+KR:wght@300;400;500;700&family=Nunito+Sans:wght@400;500&family=Poppins:wght@300&family=Roboto+Slab:wght@400;500&family=Roboto:wght@500&family=Rubik:wght@300;400;500&display=swap" rel="stylesheet">
    </head>
    <body>
    <div class="container-fluid">
        <div class="row">
            <div class="banner">
                <!-- Add content for your banner here -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-evenly">
            <div id="filter" class="d-flex justify-content-around ">
                <div class="d-flex flex-fill">
                    <div class="filter_option"><p>Category</p></div>
                    <div class="filter_option"><p>Position</p></div>
                </div>
                <div class="filter_search flex-fill">
                    <label for="filter_search"><i class="bi bi-search"></i></label>
                    <input type="text" name="filter_search" id="filter_search" placeholder="Search for anything.....">
                </div>
                <div class="d-flex flex-fill">
                    <div class="filter_option"><p>Location</p></div>
                    <div class="filter_option"><p>Experience</p></div>
                </div>
                <div class="flex-fill"><button><i class="bi bi-filter"></i></button></div>
            </div>
        </div>
        <div class="news_rank d-flex justify-content-evenly">
            <div id="rank" class="d-flex">
                <div id="title" class="d-flex">
                    <div class="rank_title p-2 w-25">
                        <img src="{{asset('img/platinum_rank.png')}}" width="400px" height="60px">
                        <h2>PLATINUM</h2>
                    </div>
                    <div class="ms-auto p-2 flex-shrink-1"><a href="#">See all</a></div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
