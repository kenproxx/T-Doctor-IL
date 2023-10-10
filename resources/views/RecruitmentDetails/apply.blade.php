@extends('layouts.master')
@section('title', 'Home')
@section('content')
<body>
    <div class="banner1">
    </div>
    <div class="container d-flex">
        <div class="apply-mr border apply-border">
            <div class="apply-margin">
                <div class="w-100 apply-img">
                    <img src="{{asset('img/recruitment-img/apply_img_1.png')}}" alt="">
                </div>
                <div>
                    <strong>CV Trần Đình Phi</strong>
                    <div class="mt-1">
                        <span>Update: </span><strong> 29/09/2023</strong>
                    </div>
                </div>
                <div class="d-flex">
                    <button class="apply-bt apply-bt_delete">Delete</button>
                    <form action="{{ route('recruitment.add.cv') }}">
                        <button type="submit" class="apply-bt apply-bt_edit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="apply-mr border apply-border">
            <div class="apply-margin">
                <div class="w-100 apply-img">
                    <img src="{{asset('img/recruitment-img/apply_img_2.png')}}" alt="">
                </div>
                <div>
                    <strong>CV Trần Đình Phi</strong>
                    <div class="mt-1">
                        <span>Update: </span><strong> 29/09/2023</strong>
                    </div>
                </div>
                <div class="d-flex">
                    <button class="apply-bt apply-bt_delete">Delete</button>
                    <form action="{{ route('recruitment.add.cv') }}">
                        <button type="submit" class="apply-bt apply-bt_edit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="apply-mr border apply-border">
            <div class="apply-margin">
                <div class="w-100 apply-img">
                    <img src="{{asset('img/recruitment-img/apply_img_3.png')}}" alt="">
                </div>
                <div>
                    <strong>CV Trần Đình Phi</strong>
                    <div class="mt-1">
                        <span>Update: </span><strong> 29/09/2023</strong>
                    </div>
                </div>
                <div class="d-flex">
                    <button class="apply-bt apply-bt_delete">Delete</button>
                    <form action="{{ route('recruitment.add.cv') }}">
                        <button type="submit" class="apply-bt apply-bt_edit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class=" border apply-border" style="background: #D9D9D9">
            <div class="apply-margin apply-add">
                <strong>Add new CV</strong>
            </div>
        </div>





    </div>
</body>
@endsection
