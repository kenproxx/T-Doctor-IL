@extends('layouts.master')
@section('title', 'What free')
@section('content')

    <link href="{{ asset('css/reply-link.css') }}" rel="stylesheet">
    @include('layouts.partials.header')
    @include('component.banner')
        @php
            $couponApply = \App\Models\CouponApply::where('id', $id)->first();
        @endphp
        <div class="container">
            @if($couponApply->content == null)
                <form action="{{route('what.free.reply.link.social',$couponApply->id)}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="container">
                        <h1>Form nhập thông tin review</h1>
                        <p>Xin hãy nhập biểu mẫu bên dưới.</p>
                        <hr>
                        @php
                            $sns_option =$couponApply->sns_option;
                            $sns_option = explode(',',$sns_option);
                        @endphp
                        <div>
                            <label for="link_fb"><b>thông tin review FaceBook</b></label>
                            <input class="link-social" type="text" placeholder="Nhập Link" name="link_fb" id="link_fb">
                        </div>
                        <div>
                            <label for="link_tt"><b>thông tin review Tiktok</b></label>
                            <input class="link-social" type="text" placeholder="Nhập Link" name="link_tt" id="link_tt">
                        </div>
                        <div>
                            <label for="link_ig"><b>thông tin review Instagram</b></label>
                            <input class="link-social" type="text" placeholder="Nhập Link" name="link_ig" id="link_ig">
                        </div>
                        <div>
                            <label for="link_yt"><b>thông tin review Youtube</b></label>
                            <input class="link-social" type="text" placeholder="Nhập Link" name="link_yt" id="link_yt">
                        </div>
                        <div>
                            <label for="link_gg"><b>thông tin review Google Review</b></label>
                            <input class="link-social" type="text" placeholder="Nhập Link" name="link_gg" id="link_gg">
                        </div>
                        <div class="clearfix">
                            <button type="submit" class="signupbtn">Sign Up</button>
                        </div>
                    </div>
                </form>
            @else
                <div class="container d-flex justify-content-center">
                    <h4>Bạn đã gửi liên kết đăng bài</h4>

                </div>
            @endif

        </div>



        @endsection
