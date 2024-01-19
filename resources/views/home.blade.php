@php use App\Models\Province;

@endphp
@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <style>
        /*d none when size = sm*/
        @media (max-width: 480px) {
            .d-sm-block {
                display: block !important;
            }
        }

        /*d block when size = md*/
        @media (min-width: 481px) {
            .d-md-block {
                display: block !important;
            }
        }

        *, *:before, *:after {
            box-sizing: border-box;
        }

        img {
            max-width: auto;
            height: auto;
        }

        .container {
            max-width: 1170px;
            width: 100%;
            /*margin: auto;*/
        }

        .carousel {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .carousel img {
            padding: 0px 2px;
        }

        @media screen and (max-width: 1200px) {
            .container {
                max-width: 100%;
            }
        }

        @media screen and (max-width: 1024px) {
            .carousel img {
                width: 100%;
            }
        }

        .slick-initialized .slick-prev {
            left: 40%;
            top: 725px;
        }

        .slick-initialized .slick-next {
            right: 40%;
            top: 725px;
        }

        .slick-next:before, .slick-prev:before {
            font-size: 32px !important;
            line-height: 1;
            opacity: .75;
            color: #000 !important;
        }

        .slick-dots {
            display: none !important;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css">
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js') }}"></script>

    {{--    <link href="{{ asset('css/home.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/style-home.css') }}" rel="stylesheet">
    @include('layouts.partials.header')
    <div class="container pb-md-5 mt-200 mt-70">
        <div class="slide-container">
            <div class="slide">
                <img src="{{asset('img/homeNew-img/Rectangle 23820.png')}}" alt="">
            </div>
            <div class="slide">
                <img src="{{asset('img/homeNew-img/Rectangle 23821.png')}}" alt="">
            </div>
            <div class="slide">
                <img src="{{asset('img/homeNew-img/Rectangle 23822.png')}}" alt="">
            </div>

            <a href="#" class="prev d-none" title="Previous">&#10094</a>
            <a href="#" class="next d-none" title="Next">&#10095</a>
        </div>
        <div class="dots-container">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
    <div class="container mt-24">
        <div class="titleServiceHomeNew">{{ __('home.Dịch vụ toàn diện') }}</div>
        <div class="mainServiceHomeNew row">
            <div class="col-md-6">
                <a href="{{route('home.specialist')}}">
                    <div class="border-HomeNew">
                        <div class="w-75 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"
                                 fill="none">
                                <g clip-path="url(#clip0_5948_32876)">
                                    <path d="M1.67334 37.5176H62.3269V59.4979H1.67334V37.5176Z"
                                          fill="url(#paint0_linear_5948_32876)"/>
                                    <path d="M1.67334 37.5176H62.3269V48.9421H1.67334V37.5176Z"
                                          fill="url(#paint1_linear_5948_32876)"/>
                                    <path d="M45.9292 37.5176H62.3266V59.4979H45.9292V37.5176Z"
                                          fill="url(#paint2_linear_5948_32876)"/>
                                    <path d="M7.89746 37.5176H24.2949V59.4979H7.89746V37.5176Z"
                                          fill="url(#paint3_linear_5948_32876)"/>
                                    <path
                                        d="M62.4216 40.8522H1.57842C0.706635 40.8522 0 40.1456 0 39.2738V35.7601C0 34.8883 0.706635 34.1816 1.57842 34.1816H62.4216C63.2934 34.1816 64 34.8883 64 35.7601V39.2738C64 40.1456 63.2934 40.8522 62.4216 40.8522Z"
                                        fill="url(#paint4_linear_5948_32876)"/>
                                    <path
                                        d="M47.904 63.9996H16.0957V10.36C16.0957 8.68448 17.454 7.32617 19.1296 7.32617H44.8701C46.5456 7.32617 47.904 8.68448 47.904 10.36V63.9996Z"
                                        fill="url(#paint5_linear_5948_32876)"/>
                                    <path
                                        d="M37.4867 63.9997H26.5133C25.6649 63.9997 24.9771 63.3118 24.9771 62.4634V44.7648C24.9771 43.9163 25.6649 43.2285 26.5133 43.2285H37.4867C38.3351 43.2285 39.0229 43.9163 39.0229 44.7648V62.4634C39.0229 63.3118 38.3351 63.9997 37.4867 63.9997Z"
                                        fill="url(#paint6_linear_5948_32876)"/>
                                    <path
                                        d="M36.3961 63.9995H27.6042C26.8671 63.9995 26.2695 63.4019 26.2695 62.6648V46.1179C26.2695 45.3808 26.8671 44.7832 27.6042 44.7832H36.3962C37.1333 44.7832 37.7309 45.3808 37.7309 46.1179V62.6648C37.7309 63.4019 37.1333 63.9995 36.3961 63.9995Z"
                                        fill="url(#paint7_linear_5948_32876)"/>
                                    <path
                                        d="M36.3959 44.7832H32V63.9995H36.3959C37.1331 63.9995 37.7306 63.4019 37.7306 62.6648V46.1179C37.7308 45.3808 37.1332 44.7832 36.3959 44.7832Z"
                                        fill="url(#paint8_linear_5948_32876)"/>
                                    <path
                                        d="M44.8703 7.32617H24.9771V10.2862L47.9041 33.2133V10.3599C47.9041 8.68435 46.5458 7.32617 44.8703 7.32617Z"
                                        fill="url(#paint9_linear_5948_32876)"/>
                                    <path
                                        d="M38.4552 4.15548H36.043C35.5616 4.15548 35.1713 3.76521 35.1713 3.28383V0.871655C35.1713 0.390275 34.7811 0 34.2997 0H29.7005C29.2191 0 28.8288 0.390275 28.8288 0.871655V3.28383C28.8288 3.76521 28.4385 4.15548 27.9572 4.15548H25.545C25.0636 4.15548 24.6733 4.54576 24.6733 5.02714V9.62635C24.6733 10.1077 25.0636 10.498 25.545 10.498H27.9572C28.4385 10.498 28.8288 10.8883 28.8288 11.3697V13.7818C28.8288 14.2632 29.2191 14.6535 29.7005 14.6535H34.2997C34.7811 14.6535 35.1713 14.2632 35.1713 13.7818V11.3695C35.1713 10.8882 35.5616 10.4979 36.043 10.4979H38.4552C38.9366 10.4979 39.3268 10.1076 39.3268 9.62623V5.02701C39.3268 4.54563 38.9366 4.15548 38.4552 4.15548Z"
                                        fill="url(#paint10_linear_5948_32876)"/>
                                    <path
                                        d="M62.4216 64.0006H1.57842C0.706635 64.0006 0 63.294 0 62.4222V58.9085C0 58.0367 0.706635 57.3301 1.57842 57.3301H62.4216C63.2934 57.3301 64 58.0367 64 58.9085V62.4222C64 63.294 63.2934 64.0006 62.4216 64.0006Z"
                                        fill="url(#paint11_linear_5948_32876)"/>
                                    <path
                                        d="M28.4605 28.5519H21.4937C20.5927 28.5519 19.8623 27.8215 19.8623 26.9205V19.9536C19.8623 19.0526 20.5927 18.3223 21.4937 18.3223H28.4605C29.3615 18.3223 30.0919 19.0526 30.0919 19.9536V26.9205C30.0919 27.8215 29.3615 28.5519 28.4605 28.5519Z"
                                        fill="url(#paint12_linear_5948_32876)"/>
                                    <path
                                        d="M27.3909 26.9806H22.5635C21.9392 26.9806 21.4331 26.4745 21.4331 25.8502V21.023C21.4331 20.3987 21.9392 19.8926 22.5635 19.8926H27.3909C28.0152 19.8926 28.5213 20.3987 28.5213 21.023V25.8502C28.5213 26.4745 28.0152 26.9806 27.3909 26.9806Z"
                                        fill="url(#paint13_linear_5948_32876)"/>
                                    <path
                                        d="M42.5064 28.5519H35.5396C34.6386 28.5519 33.9082 27.8215 33.9082 26.9205V19.9536C33.9082 19.0526 34.6386 18.3223 35.5396 18.3223H42.5064C43.4074 18.3223 44.1378 19.0526 44.1378 19.9536V26.9205C44.1378 27.8215 43.4074 28.5519 42.5064 28.5519Z"
                                        fill="url(#paint14_linear_5948_32876)"/>
                                    <path
                                        d="M41.4368 26.9806H36.6094C35.9851 26.9806 35.479 26.4745 35.479 25.8502V21.023C35.479 20.3987 35.9851 19.8926 36.6094 19.8926H41.4367C42.061 19.8926 42.5671 20.3987 42.5671 21.023V25.8502C42.5671 26.4745 42.061 26.9806 41.4368 26.9806Z"
                                        fill="url(#paint15_linear_5948_32876)"/>
                                    <path
                                        d="M28.4605 40.8526H21.4937C20.5927 40.8526 19.8623 40.1223 19.8623 39.2213V32.2544C19.8623 31.3534 20.5927 30.623 21.4937 30.623H28.4605C29.3615 30.623 30.0919 31.3534 30.0919 32.2544V39.2213C30.0919 40.1223 29.3615 40.8526 28.4605 40.8526Z"
                                        fill="url(#paint16_linear_5948_32876)"/>
                                    <path
                                        d="M27.3909 39.2814H22.5635C21.9392 39.2814 21.4331 38.7753 21.4331 38.151V33.3238C21.4331 32.6995 21.9392 32.1934 22.5635 32.1934H27.3909C28.0152 32.1934 28.5213 32.6995 28.5213 33.3238V38.151C28.5213 38.7753 28.0152 39.2814 27.3909 39.2814Z"
                                        fill="url(#paint17_linear_5948_32876)"/>
                                    <path
                                        d="M42.5064 40.8526H35.5396C34.6386 40.8526 33.9082 40.1223 33.9082 39.2213V32.2544C33.9082 31.3534 34.6386 30.623 35.5396 30.623H42.5064C43.4074 30.623 44.1378 31.3534 44.1378 32.2544V39.2213C44.1378 40.1223 43.4074 40.8526 42.5064 40.8526Z"
                                        fill="url(#paint18_linear_5948_32876)"/>
                                    <path
                                        d="M41.4368 39.2814H36.6094C35.9851 39.2814 35.479 38.7753 35.479 38.151V33.3238C35.479 32.6995 35.9851 32.1934 36.6094 32.1934H41.4367C42.061 32.1934 42.5671 32.6995 42.5671 33.3238V38.151C42.5671 38.7753 42.061 39.2814 41.4368 39.2814Z"
                                        fill="url(#paint19_linear_5948_32876)"/>
                                    <path
                                        d="M11.962 54.3741H4.99514C4.09412 54.3741 3.36377 53.6438 3.36377 52.7427V45.7759C3.36377 44.8749 4.09412 44.1445 4.99514 44.1445H11.962C12.863 44.1445 13.5934 44.8749 13.5934 45.7759V52.7427C13.5934 53.6438 12.863 54.3741 11.962 54.3741Z"
                                        fill="url(#paint20_linear_5948_32876)"/>
                                    <path
                                        d="M10.8923 52.8029H6.06499C5.44067 52.8029 4.93457 52.2968 4.93457 51.6725V46.8453C4.93457 46.2209 5.44067 45.7148 6.06499 45.7148H10.8923C11.5167 45.7148 12.0228 46.2209 12.0228 46.8453V51.6725C12.0226 52.2968 11.5165 52.8029 10.8923 52.8029Z"
                                        fill="url(#paint21_linear_5948_32876)"/>
                                    <path
                                        d="M59.005 54.3741H52.0381C51.1371 54.3741 50.4067 53.6438 50.4067 52.7427V45.7759C50.4067 44.8749 51.1371 44.1445 52.0381 44.1445H59.005C59.906 44.1445 60.6363 44.8749 60.6363 45.7759V52.7427C60.6363 53.6438 59.906 54.3741 59.005 54.3741Z"
                                        fill="url(#paint22_linear_5948_32876)"/>
                                    <path
                                        d="M57.9352 52.8029H53.108C52.4836 52.8029 51.9775 52.2968 51.9775 51.6725V46.8453C51.9775 46.2209 52.4836 45.7148 53.108 45.7148H57.9352C58.5595 45.7148 59.0656 46.2209 59.0656 46.8453V51.6725C59.0656 52.2968 58.5595 52.8029 57.9352 52.8029Z"
                                        fill="url(#paint23_linear_5948_32876)"/>
                                </g>
                                <defs>
                                    <linearGradient id="paint0_linear_5948_32876" x1="1.67334" y1="48.5078" x2="62.327"
                                                    y2="48.5078" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#D8ECFE"/>
                                        <stop offset="1" stop-color="#A8D3D8"/>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_5948_32876" x1="32.0002" y1="46.014" x2="32.0002"
                                                    y2="40.9046" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#A8D3D8" stop-opacity="0"/>
                                        <stop offset="1" stop-color="#6CABCA"/>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_5948_32876" x1="53.0404" y1="48.5078" x2="47.6697"
                                                    y2="48.5078" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#A8D3D8" stop-opacity="0"/>
                                        <stop offset="1" stop-color="#6CABCA"/>
                                    </linearGradient>
                                    <linearGradient id="paint3_linear_5948_32876" x1="12.0473" y1="48.5078" x2="23.9626"
                                                    y2="48.5078" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#A8D3D8" stop-opacity="0"/>
                                        <stop offset="1" stop-color="#6CABCA"/>
                                    </linearGradient>
                                    <linearGradient id="paint4_linear_5948_32876" x1="31.7387" y1="33.0092" x2="32.408"
                                                    y2="44.5543" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#98D5B9"/>
                                        <stop offset="1" stop-color="#1E9C6F"/>
                                    </linearGradient>
                                    <linearGradient id="paint5_linear_5948_32876" x1="14.4681" y1="24.049" x2="56.2034"
                                                    y2="53.4333" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#D8ECFE"/>
                                        <stop offset="1" stop-color="#A8D3D8"/>
                                    </linearGradient>
                                    <linearGradient id="paint6_linear_5948_32876" x1="37.7575" y1="59.3716" x2="23.1084"
                                                    y2="44.7225" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#D8ECFE"/>
                                        <stop offset="1" stop-color="#A8D3D8"/>
                                    </linearGradient>
                                    <linearGradient id="paint7_linear_5948_32876" x1="27.0788" y1="49.4699" x2="33.7012"
                                                    y2="56.0924" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#5A5A5A"/>
                                        <stop offset="1" stop-color="#444444"/>
                                    </linearGradient>
                                    <linearGradient id="paint8_linear_5948_32876" x1="30.3896" y1="50.3065" x2="35.8863"
                                                    y2="55.8031" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#433F43" stop-opacity="0"/>
                                        <stop offset="1" stop-color="#1A1A1A"/>
                                    </linearGradient>
                                    <linearGradient id="paint9_linear_5948_32876" x1="40.7839" y1="19.9484" x2="34.1329"
                                                    y2="4.72212" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#A8D3D8" stop-opacity="0"/>
                                        <stop offset="1" stop-color="#6CABCA"/>
                                    </linearGradient>
                                    <linearGradient id="paint10_linear_5948_32876" x1="28.0695" y1="3.39602"
                                                    x2="37.1122"
                                                    y2="12.4387" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FD4755"/>
                                        <stop offset="1" stop-color="#A72B2B"/>
                                    </linearGradient>
                                    <linearGradient id="paint11_linear_5948_32876" x1="31.7387" y1="56.1576" x2="32.408"
                                                    y2="67.7027" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#5A5A5A"/>
                                        <stop offset="1" stop-color="#444444"/>
                                    </linearGradient>
                                    <linearGradient id="paint12_linear_5948_32876" x1="29.8388" y1="28.2987"
                                                    x2="17.5673"
                                                    y2="16.0273" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#D8ECFE"/>
                                        <stop offset="1" stop-color="#A8D3D8"/>
                                    </linearGradient>
                                    <linearGradient id="paint13_linear_5948_32876" x1="19.486" y1="17.9453" x2="27.9275"
                                                    y2="26.3868" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFDFCF"/>
                                        <stop offset="1" stop-color="#0593FC"/>
                                    </linearGradient>
                                    <linearGradient id="paint14_linear_5948_32876" x1="43.8847" y1="28.2987"
                                                    x2="31.6132"
                                                    y2="16.0273" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#D8ECFE"/>
                                        <stop offset="1" stop-color="#A8D3D8"/>
                                    </linearGradient>
                                    <linearGradient id="paint15_linear_5948_32876" x1="33.5318" y1="17.9453"
                                                    x2="41.9732"
                                                    y2="26.3868" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFDFCF"/>
                                        <stop offset="1" stop-color="#0593FC"/>
                                    </linearGradient>
                                    <linearGradient id="paint16_linear_5948_32876" x1="29.8388" y1="40.5995"
                                                    x2="17.5673"
                                                    y2="28.3281" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#D8ECFE"/>
                                        <stop offset="1" stop-color="#A8D3D8"/>
                                    </linearGradient>
                                    <linearGradient id="paint17_linear_5948_32876" x1="19.486" y1="30.2461" x2="27.9275"
                                                    y2="38.6876" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFDFCF"/>
                                        <stop offset="1" stop-color="#0593FC"/>
                                    </linearGradient>
                                    <linearGradient id="paint18_linear_5948_32876" x1="43.8847" y1="40.5995"
                                                    x2="31.6132"
                                                    y2="28.3281" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#D8ECFE"/>
                                        <stop offset="1" stop-color="#A8D3D8"/>
                                    </linearGradient>
                                    <linearGradient id="paint19_linear_5948_32876" x1="33.5318" y1="30.2461"
                                                    x2="41.9732"
                                                    y2="38.6876" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFDFCF"/>
                                        <stop offset="1" stop-color="#0593FC"/>
                                    </linearGradient>
                                    <linearGradient id="paint20_linear_5948_32876" x1="13.3402" y1="54.121" x2="1.06881"
                                                    y2="41.8496" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#D8ECFE"/>
                                        <stop offset="1" stop-color="#A8D3D8"/>
                                    </linearGradient>
                                    <linearGradient id="paint21_linear_5948_32876" x1="2.98734" y1="43.7676"
                                                    x2="11.4288"
                                                    y2="52.2091" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFDFCF"/>
                                        <stop offset="1" stop-color="#0593FC"/>
                                    </linearGradient>
                                    <linearGradient id="paint22_linear_5948_32876" x1="60.3832" y1="54.121" x2="48.1118"
                                                    y2="41.8496" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#D8ECFE"/>
                                        <stop offset="1" stop-color="#A8D3D8"/>
                                    </linearGradient>
                                    <linearGradient id="paint23_linear_5948_32876" x1="50.0303" y1="43.7676"
                                                    x2="58.4718"
                                                    y2="52.2091" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFDFCF"/>
                                        <stop offset="1" stop-color="#0593FC"/>
                                    </linearGradient>
                                    <clipPath id="clip0_5948_32876">
                                        <rect width="64" height="64" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <span class="ml-3">Khám chuyên khoa</span></div>
                        <div class="svg-containerNho">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                      d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"
                                      fill="#D8F6FF"/>
                            </svg>
                        </div>
                        <div class="svg-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"
                                 fill="none">
                                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                      d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"
                                      fill="#D8F6FF"/>
                            </svg>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-md-6">
                <a href="{{route('examination.index')}}">
                    <div class="border-HomeNew">
                        <div class="w-75 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"
                                 fill="none">
                                <g clip-path="url(#clip0_5948_32927)">
                                    <path
                                        d="M38.342 44.9657C37.5629 45.7448 37.0317 46.737 36.8156 47.8174L36.7355 48.2177C36.5715 49.037 36.1687 49.7897 35.5777 50.3805C34.3127 51.6455 32.2619 51.6455 30.997 50.3805L12.1307 31.5143C10.8657 30.2493 10.8657 28.1984 12.1307 26.9335C12.7216 26.3427 13.4742 25.9398 14.2936 25.7758L14.6939 25.6957C15.7742 25.4794 16.7665 24.9484 17.5456 24.1693C19.0036 22.7113 19.0036 20.3474 17.5456 18.8894L12.0349 13.3787C10.5769 11.9207 8.21298 11.9207 6.75498 13.3787L5.56011 14.5735L5.56648 14.5799C-1.98989 22.5784 -1.85327 35.1892 5.97761 43.02L19.491 56.5334C27.3219 64.3643 39.9326 64.5009 47.9311 56.9445L47.9375 56.9509L49.1324 55.756C50.5904 54.298 50.5904 51.9342 49.1324 50.4762L43.6216 44.9654C42.1639 43.5078 39.8 43.5078 38.342 44.9657Z"
                                        fill="url(#paint0_linear_5948_32927)"/>
                                    <path
                                        d="M32.1767 51.1326C31.7462 50.9758 31.3422 50.7254 30.9969 50.3802L12.1306 31.5139C11.7854 31.1687 11.535 30.7646 11.3782 30.3341L1.62998 20.5859C-1.53577 28.0222 -0.0877719 36.9544 5.9776 43.0198L19.491 56.5332C25.5564 62.5986 34.4886 64.0466 41.9249 60.8808L32.1767 51.1326Z"
                                        fill="url(#paint1_linear_5948_32927)"/>
                                    <path
                                        d="M49.1326 50.4764L43.6219 44.9656C42.1639 43.5076 39.8 43.5076 38.342 44.9656C37.5629 45.7448 37.0319 46.737 36.8156 47.8174L36.7355 48.2176C36.5715 49.037 36.1688 49.7896 35.5778 50.3805C34.3128 51.6455 32.2619 51.6455 30.997 50.3805L21.5638 40.9473L12.7344 49.7766L19.4913 56.5335C27.3221 64.3644 39.9329 64.501 47.9314 56.9446L47.9378 56.951L49.1326 55.7561C50.5906 54.2981 50.5906 51.9344 49.1326 50.4764Z"
                                        fill="url(#paint2_linear_5948_32927)"/>
                                    <path
                                        d="M34.5286 51.43L35.578 50.3806C34.313 51.6456 32.2621 51.6456 30.9972 50.3806L12.131 31.5143C10.866 30.2493 10.866 28.1985 12.131 26.9336L11.0816 27.983C8.84324 30.2213 8.84324 33.8505 11.0816 36.0888L26.4229 51.4301C28.661 53.6683 32.2902 53.6683 34.5286 51.43Z"
                                        fill="url(#paint3_linear_5948_32927)"/>
                                    <path
                                        d="M43.0685 1.48828C31.5082 1.48828 22.1367 9.52716 22.1367 19.4435C22.1367 22.4383 22.9916 25.2618 24.5032 27.7443C26.233 30.5849 25.3347 34.3108 22.4999 36.0499C22.4796 36.0623 22.4594 36.0747 22.4391 36.0869C21.9546 36.3798 22.0766 37.1179 22.6319 37.2268C23.2034 37.3389 23.7935 37.3988 24.3987 37.3988C27.1412 37.3988 29.6015 36.192 31.2789 34.2809C34.6366 36.2479 38.6956 37.3988 43.0685 37.3988C54.6287 37.3988 64.0002 29.36 64.0002 19.4435C64.0002 9.52703 54.6287 1.48828 43.0685 1.48828Z"
                                        fill="url(#paint4_linear_5948_32927)"/>
                                    <path
                                        d="M62.1224 26.8856C59.5912 31.6455 54.7071 35.2917 48.7444 36.729L40.6899 28.6745V17.0645H52.3013L62.1224 26.8856Z"
                                        fill="url(#paint5_linear_5948_32927)"/>
                                    <path d="M52.3008 17.0662H42.7588V12.8939L45.4435 10.209L52.3008 17.0662Z"
                                          fill="url(#paint6_linear_5948_32927)"/>
                                    <path d="M40.6895 19.6719V28.6766L33.8589 21.846L40.6895 19.6719Z"
                                          fill="url(#paint7_linear_5948_32927)"/>
                                    <path
                                        d="M22.1367 19.444C22.1367 22.4387 22.9916 25.2622 24.5032 27.7447C26.233 30.5854 25.3347 34.3112 22.4999 36.0504C22.4796 36.0627 22.4594 36.0751 22.4391 36.0874C21.9546 36.3802 22.0766 37.1184 22.6319 37.2272C23.2034 37.3394 23.7935 37.3992 24.3987 37.3992C27.1412 37.3992 29.6015 36.1925 31.2789 34.2814C34.6366 36.2484 38.6956 37.3992 43.0685 37.3992C54.6287 37.3992 64.0002 29.3605 64.0002 19.444C64.0002 19.0817 63.9862 18.7222 63.9616 18.3652H22.1755C22.1507 18.7222 22.1367 19.0817 22.1367 19.444Z"
                                        fill="url(#paint8_linear_5948_32927)"/>
                                    <path
                                        d="M43.0687 1.48828C40.3769 1.48828 37.8041 1.92453 35.4404 2.71841V36.1679C37.8042 36.9622 40.3768 37.3989 43.0687 37.3989C54.6289 37.3988 64.0004 29.36 64.0004 19.4435C64.0004 9.52703 54.6289 1.48828 43.0687 1.48828Z"
                                        fill="url(#paint9_linear_5948_32927)"/>
                                    <path
                                        d="M51.2824 16.64H45.8721V11.2297C45.8721 10.4384 45.2306 9.79688 44.4393 9.79688H41.6969C40.9055 9.79688 40.264 10.4384 40.264 11.2297V16.64H34.8538C34.0624 16.64 33.4209 17.2815 33.4209 18.0729V20.8153C33.4209 21.6066 34.0624 22.2481 34.8538 22.2481H40.264V27.6584C40.264 28.4497 40.9055 29.0912 41.6969 29.0912H44.4393C45.2306 29.0912 45.8721 28.4497 45.8721 27.6584V22.248H51.2824C52.0738 22.248 52.7153 21.6065 52.7153 20.8151V18.0728C52.7153 17.2815 52.0738 16.64 51.2824 16.64Z"
                                        fill="url(#paint10_linear_5948_32927)"/>
                                    <path
                                        d="M40.2642 27.6583C40.2642 28.4497 40.9057 29.0912 41.697 29.0912H44.4394C45.2308 29.0912 45.8723 28.4497 45.8723 27.6583V22.248H40.2642V27.6583Z"
                                        fill="url(#paint11_linear_5948_32927)"/>
                                    <path
                                        d="M52.7152 20.8159V18.0735C52.7152 17.2821 52.0737 16.6406 51.2823 16.6406H45.8721V22.2487H51.2823C52.0737 22.2487 52.7152 21.6072 52.7152 20.8159Z"
                                        fill="url(#paint12_linear_5948_32927)"/>
                                </g>
                                <defs>
                                    <linearGradient id="paint0_linear_5948_32927" x1="30.4061" y1="29.8354" x2="15.1092"
                                                    y2="54.8378" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#C1E9AF"/>
                                        <stop offset="0.1072" stop-color="#B6E4AA"/>
                                        <stop offset="0.2935" stop-color="#99D69E"/>
                                        <stop offset="0.5365" stop-color="#6BC18A"/>
                                        <stop offset="0.8238" stop-color="#2CA36F"/>
                                        <stop offset="1" stop-color="#02905D"/>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_5948_32927" x1="16.1121" y1="46.39" x2="10.9428"
                                                    y2="51.5593" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#026841" stop-opacity="0"/>
                                        <stop offset="0.2182" stop-color="#026841" stop-opacity="0.033"/>
                                        <stop offset="0.4099" stop-color="#026841" stop-opacity="0.137"/>
                                        <stop offset="0.5916" stop-color="#026841" stop-opacity="0.31"/>
                                        <stop offset="0.7671" stop-color="#026841" stop-opacity="0.553"/>
                                        <stop offset="0.9367" stop-color="#026841" stop-opacity="0.864"/>
                                        <stop offset="1" stop-color="#026841"/>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_5948_32927" x1="33.4899" y1="54.8763" x2="37.8152"
                                                    y2="63.2104" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#026841" stop-opacity="0"/>
                                        <stop offset="0.2182" stop-color="#026841" stop-opacity="0.033"/>
                                        <stop offset="0.4099" stop-color="#026841" stop-opacity="0.137"/>
                                        <stop offset="0.5916" stop-color="#026841" stop-opacity="0.31"/>
                                        <stop offset="0.7671" stop-color="#026841" stop-opacity="0.553"/>
                                        <stop offset="0.9367" stop-color="#026841" stop-opacity="0.864"/>
                                        <stop offset="1" stop-color="#026841"/>
                                    </linearGradient>
                                    <linearGradient id="paint3_linear_5948_32927" x1="21.699" y1="40.8038" x2="17.7381"
                                                    y2="44.7648" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#026841" stop-opacity="0"/>
                                        <stop offset="0.2182" stop-color="#026841" stop-opacity="0.033"/>
                                        <stop offset="0.4099" stop-color="#026841" stop-opacity="0.137"/>
                                        <stop offset="0.5916" stop-color="#026841" stop-opacity="0.31"/>
                                        <stop offset="0.7671" stop-color="#026841" stop-opacity="0.553"/>
                                        <stop offset="0.9367" stop-color="#026841" stop-opacity="0.864"/>
                                        <stop offset="1" stop-color="#026841"/>
                                    </linearGradient>
                                    <linearGradient id="paint4_linear_5948_32927" x1="31.9209" y1="9.01803" x2="51.1679"
                                                    y2="37.8884" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#F3FAFF"/>
                                        <stop offset="1" stop-color="#D5DAF3"/>
                                    </linearGradient>
                                    <linearGradient id="paint5_linear_5948_32927" x1="56.1279" y1="32.5018" x2="45.6968"
                                                    y2="22.0707" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#DBD5EF" stop-opacity="0"/>
                                        <stop offset="0.2667" stop-color="#D8D2EC" stop-opacity="0.023"/>
                                        <stop offset="0.4431" stop-color="#D1C9E2" stop-opacity="0.098"/>
                                        <stop offset="0.5933" stop-color="#C4B9D1" stop-opacity="0.225"/>
                                        <stop offset="0.7288" stop-color="#B2A4BA" stop-opacity="0.405"/>
                                        <stop offset="0.8545" stop-color="#9A889C" stop-opacity="0.638"/>
                                        <stop offset="0.9713" stop-color="#7E6678" stop-opacity="0.92"/>
                                        <stop offset="1" stop-color="#765D6E"/>
                                    </linearGradient>
                                    <linearGradient id="paint6_linear_5948_32927" x1="50.4027" y1="13.6376" x2="45.5273"
                                                    y2="13.6376" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#DBD5EF" stop-opacity="0"/>
                                        <stop offset="0.2667" stop-color="#D8D2EC" stop-opacity="0.023"/>
                                        <stop offset="0.4431" stop-color="#D1C9E2" stop-opacity="0.098"/>
                                        <stop offset="0.5933" stop-color="#C4B9D1" stop-opacity="0.225"/>
                                        <stop offset="0.7288" stop-color="#B2A4BA" stop-opacity="0.405"/>
                                        <stop offset="0.8545" stop-color="#9A889C" stop-opacity="0.638"/>
                                        <stop offset="0.9713" stop-color="#7E6678" stop-opacity="0.92"/>
                                        <stop offset="1" stop-color="#765D6E"/>
                                    </linearGradient>
                                    <linearGradient id="paint7_linear_5948_32927" x1="37.2743" y1="28.3305" x2="37.2743"
                                                    y2="21.8645" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#DBD5EF" stop-opacity="0"/>
                                        <stop offset="0.2667" stop-color="#D8D2EC" stop-opacity="0.023"/>
                                        <stop offset="0.4431" stop-color="#D1C9E2" stop-opacity="0.098"/>
                                        <stop offset="0.5933" stop-color="#C4B9D1" stop-opacity="0.225"/>
                                        <stop offset="0.7288" stop-color="#B2A4BA" stop-opacity="0.405"/>
                                        <stop offset="0.8545" stop-color="#9A889C" stop-opacity="0.638"/>
                                        <stop offset="0.9713" stop-color="#7E6678" stop-opacity="0.92"/>
                                        <stop offset="1" stop-color="#765D6E"/>
                                    </linearGradient>
                                    <linearGradient id="paint8_linear_5948_32927" x1="43.0685" y1="21.395" x2="43.0685"
                                                    y2="39.5116" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#DBD5EF" stop-opacity="0"/>
                                        <stop offset="0.2667" stop-color="#D8D2EC" stop-opacity="0.023"/>
                                        <stop offset="0.4431" stop-color="#D1C9E2" stop-opacity="0.098"/>
                                        <stop offset="0.5933" stop-color="#C4B9D1" stop-opacity="0.225"/>
                                        <stop offset="0.7288" stop-color="#B2A4BA" stop-opacity="0.405"/>
                                        <stop offset="0.8545" stop-color="#9A889C" stop-opacity="0.638"/>
                                        <stop offset="0.9713" stop-color="#7E6678" stop-opacity="0.92"/>
                                        <stop offset="1" stop-color="#765D6E"/>
                                    </linearGradient>
                                    <linearGradient id="paint9_linear_5948_32927" x1="42.4091" y1="16.7555" x2="57.8312"
                                                    y2="33.4783" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#DBD5EF" stop-opacity="0"/>
                                        <stop offset="0.2667" stop-color="#D8D2EC" stop-opacity="0.023"/>
                                        <stop offset="0.4431" stop-color="#D1C9E2" stop-opacity="0.098"/>
                                        <stop offset="0.5933" stop-color="#C4B9D1" stop-opacity="0.225"/>
                                        <stop offset="0.7288" stop-color="#B2A4BA" stop-opacity="0.405"/>
                                        <stop offset="0.8545" stop-color="#9A889C" stop-opacity="0.638"/>
                                        <stop offset="0.9713" stop-color="#7E6678" stop-opacity="0.92"/>
                                        <stop offset="1" stop-color="#765D6E"/>
                                    </linearGradient>
                                    <linearGradient id="paint10_linear_5948_32927" x1="40.4099" y1="16.7857"
                                                    x2="46.0161"
                                                    y2="22.392" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FE646F"/>
                                        <stop offset="0.235" stop-color="#FA5964"/>
                                        <stop offset="0.6415" stop-color="#EF3D49"/>
                                        <stop offset="1" stop-color="#E41F2D"/>
                                    </linearGradient>
                                    <linearGradient id="paint11_linear_5948_32927" x1="43.0682" y1="26.8873"
                                                    x2="43.0682"
                                                    y2="29.4855" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#A72B2B" stop-opacity="0"/>
                                        <stop offset="0.1561" stop-color="#A32B2A" stop-opacity="0.066"/>
                                        <stop offset="0.386" stop-color="#982C29" stop-opacity="0.248"/>
                                        <stop offset="0.6615" stop-color="#872F28" stop-opacity="0.545"/>
                                        <stop offset="0.97" stop-color="#6F3226" stop-opacity="0.956"/>
                                        <stop offset="1" stop-color="#6D3326"/>
                                    </linearGradient>
                                    <linearGradient id="paint12_linear_5948_32927" x1="50.5519" y1="19.4447"
                                                    x2="53.0963"
                                                    y2="19.4447" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#A72B2B" stop-opacity="0"/>
                                        <stop offset="0.1561" stop-color="#A32B2A" stop-opacity="0.066"/>
                                        <stop offset="0.386" stop-color="#982C29" stop-opacity="0.248"/>
                                        <stop offset="0.6615" stop-color="#872F28" stop-opacity="0.545"/>
                                        <stop offset="0.97" stop-color="#6F3226" stop-opacity="0.956"/>
                                        <stop offset="1" stop-color="#6D3326"/>
                                    </linearGradient>
                                    <clipPath id="clip0_5948_32927">
                                        <rect width="64" height="64" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <span class="ml-3">Khám từ xa</span></div>
                        <div class="svg-containerNho">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                      d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"
                                      fill="#D8F6FF"/>
                            </svg>
                        </div>
                        <div class="svg-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"
                                 fill="none">
                                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                      d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"
                                      fill="#D8F6FF"/>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="{{route('examination.mentoring')}}">
                    <div class="border-HomeNew">
                        <div class="w-75 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"
                                 fill="none">
                                <path
                                    d="M43 34H45V36H43C42.7348 36 42.4804 36.1054 42.2929 36.2929C42.1054 36.4804 42 36.7348 42 37V39H40V37C40 36.7348 39.8946 36.4804 39.7071 36.2929C39.5196 36.1054 39.2652 36 39 36H37V34H39C39.2652 34 39.5196 33.8946 39.7071 33.7071C39.8946 33.5196 40 33.2652 40 33V31H42V33C42 33.2652 42.1054 33.5196 42.2929 33.7071C42.4804 33.8946 42.7348 34 43 34ZM24 25C24.0012 23.9395 24.423 22.9228 25.1729 22.1729C25.9228 21.423 26.9395 21.0012 28 21H38V15C37.9995 14.4697 37.7886 13.9613 37.4136 13.5864C37.0387 13.2114 36.5303 13.0005 36 13H10C9.46973 13.0005 8.96133 13.2114 8.58637 13.5864C8.21141 13.9613 8.00053 14.4697 8 15V35C8.00053 35.5303 8.21141 36.0387 8.58637 36.4136C8.96133 36.7886 9.46973 36.9995 10 37H12.5859L16.2929 40.707C16.3858 40.7999 16.496 40.8736 16.6173 40.9238C16.7386 40.9741 16.8687 41 17 41C17.1313 41 17.2613 40.9741 17.3826 40.9238C17.5039 40.8736 17.6142 40.7999 17.707 40.707L21.4141 37H24V25ZM56 25V45C55.9995 45.5303 55.7886 46.0387 55.4136 46.4136C55.0387 46.7886 54.5303 46.9995 54 47H45.4141L41.7075 50.707C41.6147 50.7999 41.5045 50.8736 41.3832 50.9238C41.2618 50.9741 41.1318 51 41.0005 51C40.8692 51 40.7391 50.9741 40.6178 50.9238C40.4965 50.8736 40.3863 50.7999 40.2935 50.707L36.5859 47H28C27.4697 46.9995 26.9613 46.7886 26.5864 46.4136C26.2114 46.0387 26.0005 45.5303 26 45V25C26.0005 24.4697 26.2114 23.9613 26.5864 23.5864C26.9613 23.2114 27.4697 23.0005 28 23H54C54.5303 23.0005 55.0387 23.2114 55.4136 23.5864C55.7886 23.9613 55.9995 24.4697 56 25ZM47 33C47 32.7348 46.8946 32.4804 46.7071 32.2929C46.5196 32.1054 46.2652 32 46 32H44V30C44 29.7348 43.8946 29.4804 43.7071 29.2929C43.5196 29.1054 43.2652 29 43 29H39C38.7348 29 38.4804 29.1054 38.2929 29.2929C38.1054 29.4804 38 29.7348 38 30V32H36C35.7348 32 35.4804 32.1054 35.2929 32.2929C35.1054 32.4804 35 32.7348 35 33V37C35 37.2652 35.1054 37.5196 35.2929 37.7071C35.4804 37.8946 35.7348 38 36 38H38V40C38 40.2652 38.1054 40.5196 38.2929 40.7071C38.4804 40.8946 38.7348 41 39 41H43C43.2652 41 43.5196 40.8946 43.7071 40.7071C43.8946 40.5196 44 40.2652 44 40V38H46C46.2652 38 46.5196 37.8946 46.7071 37.7071C46.8946 37.5196 47 37.2652 47 37V33Z"
                                    fill="url(#paint0_linear_5948_22235)"/>
                                <defs>
                                    <linearGradient id="paint0_linear_5948_22235" x1="8" y1="32" x2="56" y2="32"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#11998E"/>
                                        <stop offset="1" stop-color="#38EF7D"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                            <span class="ml-3">Tư vẫn sức khoẻ</span></div>
                        <div class="svg-containerNho">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                      d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"
                                      fill="#D8F6FF"/>
                            </svg>
                        </div>
                        <div class="svg-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"
                                 fill="none">
                                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                      d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"
                                      fill="#D8F6FF"/>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="{{route('clinic')}}">
                    <div class="border-HomeNew">
                        <div class="w-75 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"
                                 fill="none">
                                <path
                                    d="M23.8277 53.3715L15.2828 61.9164C14.5139 62.6853 15.0584 63.9999 16.1458 63.9999H47.8548C48.9422 63.9999 49.4867 62.6853 48.7178 61.9164L40.1729 53.3715C35.6593 48.8579 28.3412 48.8579 23.8277 53.3715Z"
                                    fill="url(#paint0_linear_5948_34587)"/>
                                <path
                                    d="M47.8547 64.0005H16.1455C15.0589 64.0005 14.5135 62.6855 15.2831 61.917L21.3417 55.8574H42.6585L48.7181 61.917C49.4867 62.6855 48.9424 64.0005 47.8547 64.0005Z"
                                    fill="url(#paint1_linear_5948_34587)"/>
                                <path
                                    d="M40.1726 53.371C37.4771 50.6755 33.7815 49.5904 30.2803 50.1142V63.9994H47.8545C48.9419 63.9994 49.4864 62.6848 48.7175 61.9159L40.1726 53.371Z"
                                    fill="url(#paint2_linear_5948_34587)"/>
                                <path
                                    d="M48.7177 61.9165L40.1727 53.3715C36.8906 50.0894 32.1263 49.1965 28.0351 50.6876L27.9858 50.7329L41.253 64H47.8547C48.942 64 49.4866 62.6854 48.7177 61.9165Z"
                                    fill="url(#paint3_linear_5948_34587)"/>
                                <path
                                    d="M53.3563 21.3561C53.3563 9.5615 43.7948 0 32.0002 0C20.2055 0 10.644 9.5615 10.644 21.3561C10.644 33.1507 25.0312 52.2075 32.0002 52.2075C38.9692 52.2075 53.3563 33.1507 53.3563 21.3561Z"
                                    fill="url(#paint4_linear_5948_34587)"/>
                                <path
                                    d="M32.0002 39.2533C41.7184 39.2533 49.5966 31.3751 49.5966 21.6569C49.5966 11.9387 41.7184 4.06055 32.0002 4.06055C22.282 4.06055 14.4038 11.9387 14.4038 21.6569C14.4038 31.3751 22.282 39.2533 32.0002 39.2533Z"
                                    fill="url(#paint5_linear_5948_34587)"/>
                                <path
                                    d="M32.0004 52.2075C30.5194 52.2075 28.702 51.3405 26.7603 49.8719V0.65C28.4371 0.226875 30.192 0 32.0004 0C43.795 0 53.3565 9.5615 53.3565 21.3561C53.3565 33.1507 38.9693 52.2075 32.0004 52.2075Z"
                                    fill="url(#paint6_linear_5948_34587)"/>
                                <path
                                    d="M10.9746 24.6738C13.1569 36.4051 25.6535 52.2083 32 52.2083C38.3465 52.2083 50.843 36.4051 53.0254 24.6738H10.9746Z"
                                    fill="url(#paint7_linear_5948_34587)"/>
                                <path
                                    d="M32.0004 36.8142C40.3709 36.8142 47.1565 30.0286 47.1565 21.6581C47.1565 13.2876 40.3709 6.50195 32.0004 6.50195C23.6299 6.50195 16.8442 13.2876 16.8442 21.6581C16.8442 30.0286 23.6299 36.8142 32.0004 36.8142Z"
                                    fill="url(#paint8_linear_5948_34587)"/>
                                <path
                                    d="M39.8431 18.981H34.6774V13.8154C34.6774 13.0598 34.0649 12.4473 33.3093 12.4473H30.6909C29.9354 12.4473 29.3228 13.0598 29.3228 13.8154V18.981H24.1572C23.4016 18.981 22.7891 19.5935 22.7891 20.3491V22.9675C22.7891 23.7231 23.4016 24.3356 24.1572 24.3356H29.3228V29.5013C29.3228 30.2569 29.9353 30.8694 30.6909 30.8694H33.3093C34.0649 30.8694 34.6774 30.2569 34.6774 29.5013V24.3356H39.8431C40.5987 24.3356 41.2112 23.7231 41.2112 22.9675V20.3491C41.2112 19.5935 40.5987 18.981 39.8431 18.981Z"
                                    fill="url(#paint9_linear_5948_34587)"/>
                                <path
                                    d="M16.8442 21.6583C16.8442 30.0288 23.6299 36.8144 32.0004 36.8144C40.3709 36.8144 47.1565 30.0288 47.1565 21.6583C47.1565 21.2393 47.1387 20.8244 47.1054 20.4141H16.8954C16.862 20.8244 16.8442 21.2393 16.8442 21.6583Z"
                                    fill="url(#paint10_linear_5948_34587)"/>
                                <path
                                    d="M32.0003 6.50195C31.0239 6.50195 30.0695 6.59545 29.1445 6.77183V36.5443C30.0695 36.7207 31.0239 36.8142 32.0003 36.8142C40.3708 36.8142 47.1564 30.0286 47.1564 21.6581C47.1564 13.2876 40.3708 6.50195 32.0003 6.50195Z"
                                    fill="url(#paint11_linear_5948_34587)"/>
                                <path
                                    d="M42.6537 10.8789L21.2212 32.3114C23.9687 35.0913 27.7832 36.8144 32.0006 36.8144C40.3711 36.8144 47.1567 30.0288 47.1567 21.6583C47.1567 17.4409 45.4336 13.6264 42.6537 10.8789Z"
                                    fill="url(#paint12_linear_5948_34587)"/>
                                <defs>
                                    <linearGradient id="paint0_linear_5948_34587" x1="26.4874" y1="56.993" x2="40.9445"
                                                    y2="56.993" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#C1E9AF"/>
                                        <stop offset="0.1072" stop-color="#B6E4AA"/>
                                        <stop offset="0.2935" stop-color="#99D69E"/>
                                        <stop offset="0.5365" stop-color="#6BC18A"/>
                                        <stop offset="0.8238" stop-color="#2CA36F"/>
                                        <stop offset="1" stop-color="#02905D"/>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_5948_34587" x1="32.0004" y1="60.1982" x2="32.0004"
                                                    y2="65.2209" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#026841" stop-opacity="0"/>
                                        <stop offset="0.2182" stop-color="#026841" stop-opacity="0.033"/>
                                        <stop offset="0.4099" stop-color="#026841" stop-opacity="0.137"/>
                                        <stop offset="0.5916" stop-color="#026841" stop-opacity="0.31"/>
                                        <stop offset="0.7671" stop-color="#026841" stop-opacity="0.553"/>
                                        <stop offset="0.9367" stop-color="#026841" stop-opacity="0.864"/>
                                        <stop offset="1" stop-color="#026841"/>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_5948_34587" x1="38.2304" y1="57.8999" x2="41.572"
                                                    y2="55.2266" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#026841" stop-opacity="0"/>
                                        <stop offset="0.2182" stop-color="#026841" stop-opacity="0.033"/>
                                        <stop offset="0.4099" stop-color="#026841" stop-opacity="0.137"/>
                                        <stop offset="0.5916" stop-color="#026841" stop-opacity="0.31"/>
                                        <stop offset="0.7671" stop-color="#026841" stop-opacity="0.553"/>
                                        <stop offset="0.9367" stop-color="#026841" stop-opacity="0.864"/>
                                        <stop offset="1" stop-color="#026841"/>
                                    </linearGradient>
                                    <linearGradient id="paint3_linear_5948_34587" x1="37.8832" y1="54.0694" x2="36.606"
                                                    y2="48.9307" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#026841" stop-opacity="0"/>
                                        <stop offset="0.2182" stop-color="#026841" stop-opacity="0.033"/>
                                        <stop offset="0.4099" stop-color="#026841" stop-opacity="0.137"/>
                                        <stop offset="0.5916" stop-color="#026841" stop-opacity="0.31"/>
                                        <stop offset="0.7671" stop-color="#026841" stop-opacity="0.553"/>
                                        <stop offset="0.9367" stop-color="#026841" stop-opacity="0.864"/>
                                        <stop offset="1" stop-color="#026841"/>
                                    </linearGradient>
                                    <linearGradient id="paint4_linear_5948_34587" x1="20.6794" y1="18.0053" x2="45.3669"
                                                    y2="32.8178" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FE646F"/>
                                        <stop offset="0.235" stop-color="#FA5964"/>
                                        <stop offset="0.6415" stop-color="#EF3D49"/>
                                        <stop offset="1" stop-color="#E41F2D"/>
                                    </linearGradient>
                                    <linearGradient id="paint5_linear_5948_34587" x1="42.2137" y1="31.8704" x2="20.9007"
                                                    y2="10.5574" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FE646F"/>
                                        <stop offset="0.235" stop-color="#FA5964"/>
                                        <stop offset="0.6415" stop-color="#EF3D49"/>
                                        <stop offset="1" stop-color="#E41F2D"/>
                                    </linearGradient>
                                    <linearGradient id="paint6_linear_5948_34587" x1="28.0816" y1="24.886" x2="49.7306"
                                                    y2="30.2032" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#A72B2B" stop-opacity="0"/>
                                        <stop offset="0.1561" stop-color="#A32B2A" stop-opacity="0.066"/>
                                        <stop offset="0.386" stop-color="#982C29" stop-opacity="0.248"/>
                                        <stop offset="0.6615" stop-color="#872F28" stop-opacity="0.545"/>
                                        <stop offset="0.97" stop-color="#6F3226" stop-opacity="0.956"/>
                                        <stop offset="1" stop-color="#6D3326"/>
                                    </linearGradient>
                                    <linearGradient id="paint7_linear_5948_34587" x1="32" y1="29.1432" x2="32"
                                                    y2="52.8408"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#A72B2B" stop-opacity="0"/>
                                        <stop offset="0.1561" stop-color="#A32B2A" stop-opacity="0.066"/>
                                        <stop offset="0.386" stop-color="#982C29" stop-opacity="0.248"/>
                                        <stop offset="0.6615" stop-color="#872F28" stop-opacity="0.545"/>
                                        <stop offset="0.97" stop-color="#6F3226" stop-opacity="0.956"/>
                                        <stop offset="1" stop-color="#6D3326"/>
                                    </linearGradient>
                                    <linearGradient id="paint8_linear_5948_34587" x1="23.8001" y1="13.4578" x2="40.807"
                                                    y2="30.4647" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#F3FAFF"/>
                                        <stop offset="1" stop-color="#D5DAF3"/>
                                    </linearGradient>
                                    <linearGradient id="paint9_linear_5948_34587" x1="28.5191" y1="18.3085" x2="35.6094"
                                                    y2="25.1314" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FE646F"/>
                                        <stop offset="0.235" stop-color="#FA5964"/>
                                        <stop offset="0.6415" stop-color="#EF3D49"/>
                                        <stop offset="1" stop-color="#E41F2D"/>
                                    </linearGradient>
                                    <linearGradient id="paint10_linear_5948_34587" x1="32.2627" y1="23.6692"
                                                    x2="34.0689"
                                                    y2="36.9136" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#DBD5EF" stop-opacity="0"/>
                                        <stop offset="0.2667" stop-color="#D8D2EC" stop-opacity="0.023"/>
                                        <stop offset="0.4431" stop-color="#D1C9E2" stop-opacity="0.098"/>
                                        <stop offset="0.5933" stop-color="#C4B9D1" stop-opacity="0.225"/>
                                        <stop offset="0.7288" stop-color="#B2A4BA" stop-opacity="0.405"/>
                                        <stop offset="0.8545" stop-color="#9A889C" stop-opacity="0.638"/>
                                        <stop offset="0.9713" stop-color="#7E6678" stop-opacity="0.92"/>
                                        <stop offset="1" stop-color="#765D6E"/>
                                    </linearGradient>
                                    <linearGradient id="paint11_linear_5948_34587" x1="32.3272" y1="21.7081" x2="46.926"
                                                    y2="23.9656" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#DBD5EF" stop-opacity="0"/>
                                        <stop offset="0.2667" stop-color="#D8D2EC" stop-opacity="0.023"/>
                                        <stop offset="0.4431" stop-color="#D1C9E2" stop-opacity="0.098"/>
                                        <stop offset="0.5933" stop-color="#C4B9D1" stop-opacity="0.225"/>
                                        <stop offset="0.7288" stop-color="#B2A4BA" stop-opacity="0.405"/>
                                        <stop offset="0.8545" stop-color="#9A889C" stop-opacity="0.638"/>
                                        <stop offset="0.9713" stop-color="#7E6678" stop-opacity="0.92"/>
                                        <stop offset="1" stop-color="#765D6E"/>
                                    </linearGradient>
                                    <linearGradient id="paint12_linear_5948_34587" x1="35.7684" y1="25.4262"
                                                    x2="43.2494"
                                                    y2="32.907" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#DBD5EF" stop-opacity="0"/>
                                        <stop offset="0.2667" stop-color="#D8D2EC" stop-opacity="0.023"/>
                                        <stop offset="0.4431" stop-color="#D1C9E2" stop-opacity="0.098"/>
                                        <stop offset="0.5933" stop-color="#C4B9D1" stop-opacity="0.225"/>
                                        <stop offset="0.7288" stop-color="#B2A4BA" stop-opacity="0.405"/>
                                        <stop offset="0.8545" stop-color="#9A889C" stop-opacity="0.638"/>
                                        <stop offset="0.9713" stop-color="#7E6678" stop-opacity="0.92"/>
                                        <stop offset="1" stop-color="#765D6E"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                            <span class="ml-3">Y tế gần bạn</span>
                        </div>
                        <div class="svg-containerNho">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                      d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"
                                      fill="#D8F6FF"/>
                            </svg>
                        </div>
                        <div class="svg-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"
                                 fill="none">
                                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                      d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"
                                      fill="#D8F6FF"/>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="background-image_HomeNew--departments">
        <div class="container">
            <div id="map-location" class="pb-5 d-flex justify-content-center">
                <div class="content-item  justify-content-center w-100">
                    <div class="title-clinics">
                        <h2>{{ __('home.Clinics/Pharmacies') }}</h2>
                        <p>{{ __('home.Find your suitable clinics/pharmacies and book now') }}!</p>
                    </div>
                    <div class="d-flex clip-path-container">
                        <div id="allAddressesMap" class="p-2 w-100">

                        </div>
                    </div>
                    <div id="" class="w-100 d-md-flex">
                        <div class="col-md-4 mt-4 d-flex text-map--homeNew">
                            <div class="mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"
                                     fill="none">
                                    <g clip-path="url(#clip0_4225_13428)">
                                        <mask id="mask0_4225_13428" style="mask-type:luminance"
                                              maskUnits="userSpaceOnUse"
                                              x="0" y="0" width="64" height="64">
                                            <path d="M0 7.62939e-06H64V64H0V7.62939e-06Z" fill="white"/>
                                        </mask>
                                        <g mask="url(#mask0_4225_13428)">
                                            <path
                                                d="M36.1292 51.8662L38.8236 50.6817C39.6451 50.3207 40.6073 50.5924 41.1188 51.3297L43.2787 54.4437C43.2787 54.4437 45.7977 53.4954 49.6464 49.6466C53.4952 45.7979 54.4436 43.2789 54.4436 43.2789L51.3296 41.119C50.5922 40.6075 50.3206 39.6452 50.6816 38.8237L55.4029 28.0835C55.7508 27.2922 56.5936 26.8427 57.4451 26.9912C58.4846 27.1724 59.8754 27.6294 61.0063 28.7601C65.3608 33.1147 62.7218 44.9129 53.8172 53.8174C44.9127 62.722 33.1146 65.361 28.7599 61.0065C27.6292 59.8756 27.1722 58.4847 26.9911 57.4452C26.8426 56.5937 27.2921 55.751 28.0833 55.4031L32.7446 53.3541"
                                                stroke="#088180" stroke-width="3" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round"/>
                                            <path
                                                d="M11.7607 50.3398C7.36537 45.4922 4.6875 39.0587 4.6875 31.9998C4.6875 16.9155 16.9157 4.68735 32 4.68735C33.8856 4.68735 35.7265 4.87835 37.5044 5.24222"
                                                stroke="#088180" stroke-width="3" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M27.4086 58.9277C24.1228 58.3715 21.0367 57.2284 18.2617 55.6101"
                                                  stroke="#088180" stroke-width="3" stroke-miterlimit="10"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M39.2871 30.3453H47.3737L40.912 45.0449" stroke="#088180"
                                                  stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M39.6513 19.9842L28.6348 45.0449" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path
                                                d="M30.5375 30.3451H21.3066C21.3066 30.3451 26.194 21.4862 27.0005 20.4967C27.8161 19.4961 28.5884 20.1202 28.6619 21.0028C28.7354 21.8855 28.6251 34.6836 28.6251 34.6836"
                                                stroke="#088180" stroke-width="3" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round"/>
                                            <path
                                                d="M20.2431 34.793L12.7525 34.77C12.7525 34.77 13.2956 34.0606 17.9846 27.3607C18.8602 26.1096 19.3423 25.054 19.5475 24.1696L19.6201 23.601C19.6201 21.5236 17.936 19.8397 15.8587 19.8397C14.0308 19.8397 12.5075 21.1435 12.168 22.872"
                                                stroke="#088180" stroke-width="3" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round"/>
                                            <path
                                                d="M58.2024 12.6879C58.2024 16.4933 55.1175 19.5781 51.3121 19.5781C47.5069 19.5781 44.4219 16.4933 44.4219 12.6879C44.4219 8.8825 47.5069 5.79763 51.3121 5.79763C55.1175 5.79763 58.2024 8.8825 58.2024 12.6879Z"
                                                stroke="#088180" stroke-width="3" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round"/>
                                            <path
                                                d="M12.9087 44.4283C14.6395 45.2989 15.8276 47.0898 15.8276 49.1593C15.8276 52.0829 13.4575 54.4531 10.5337 54.4531C8.46423 54.4531 6.67336 53.2649 5.80273 51.5343C5.91986 55.2369 8.95623 58.2031 12.6874 58.2031C16.4927 58.2031 19.5776 55.1183 19.5776 51.3129C19.5776 47.5818 16.6115 44.5454 12.9087 44.4283Z"
                                                stroke="#088180" stroke-width="3" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M51.3125 5.79688V0.937501" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M47.8671 6.7207L45.4375 2.51233" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M57.2793 16.1329L61.4877 18.5625" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M58.2031 12.6875H63.0625" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M44.4219 12.6875H39.5625" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M45.3451 9.24219L41.1367 6.81256" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M54.7578 18.6549L57.1874 22.8633" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M51.3125 19.5781V24.4375" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M57.2793 9.24219L61.4877 6.81256" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M54.7578 6.7207L57.1874 2.51233" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M2.81836 43.4434V48.4434" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M0.943359 45.9434H4.69336" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M18.9922 59.7738V63.0625" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M17.7598 61.418H20.2263" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                        </g>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4225_13428">
                                            <rect width="64" height="64" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="title--newAddress">
                                <h3>{{ __('home.24/7 AVAILABLE') }}</h3>
                                <p>{{ __('home.You can find available clinics/pharmacies') }}</p>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4 d-flex text-map--homeNew">
                            <div class="mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"
                                     fill="none">
                                    <g clip-path="url(#clip0_4225_13482)">
                                        <path
                                            d="M36.8484 31.4238C34.9455 31.4238 33.2247 32.2187 32.0005 33.4935C30.7763 32.2187 29.0554 31.4238 27.1526 31.4238C23.4456 31.4238 20.4297 34.4397 20.4297 38.1467C20.4297 41.2818 21.804 44.2393 24.2002 46.261L32.0005 52.8424L39.8008 46.261C42.197 44.2393 43.5713 41.2818 43.5713 38.1467C43.5714 34.4397 40.5555 31.4238 36.8484 31.4238ZM37.3828 43.395L32.0005 47.9361L26.6182 43.3949C25.0684 42.0873 24.1794 40.1744 24.1794 38.1467C24.1794 36.5074 25.5131 35.1737 27.1524 35.1737C28.7917 35.1737 30.1254 36.5074 30.1254 38.1467H33.8753C33.8753 36.5074 35.209 35.1737 36.8483 35.1737C38.4876 35.1737 39.8213 36.5074 39.8213 38.1467C39.8216 40.1745 38.9326 42.0873 37.3828 43.395Z"
                                            fill="#088180"/>
                                        <path
                                            d="M63.9025 28.1582C63.6036 26.4282 62.649 24.9181 61.2143 23.9061L32.0001 3.29883L2.78575 23.9063C1.35105 24.9182 0.396467 26.4283 0.0976033 28.1584C-0.20126 29.8883 0.191475 31.6312 1.20356 33.0658C2.21552 34.5004 3.72559 35.4551 5.45564 35.7539C5.83375 35.8193 6.21236 35.8516 6.58847 35.8516C7.11583 35.8516 7.63756 35.7871 8.14491 35.6621V56.9519H3.9712V60.7017H60.0289V56.9519H55.8552V35.6576C58.4046 36.2818 61.1943 35.3369 62.7965 33.0658C63.8086 31.6311 64.2012 29.8883 63.9025 28.1582ZM11.8948 56.9519V33.5675L32 19.3854L52.1053 33.5675V56.9519H11.8948ZM59.7324 30.9042C58.8349 32.1762 57.0703 32.4809 55.7985 31.5838L32 14.7965L8.20141 31.5838C7.58519 32.0186 6.83709 32.1868 6.09387 32.0588C5.3509 31.9305 4.7023 31.5205 4.26769 30.9042C3.83308 30.2881 3.66446 29.5397 3.79271 28.7967C3.92108 28.0537 4.33119 27.4051 4.94729 26.9705L32.0001 7.88765L59.0528 26.9704C59.669 27.405 60.079 28.0536 60.2074 28.7966C60.3357 29.5396 60.167 30.288 59.7324 30.9042Z"
                                            fill="#088180"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4225_13482">
                                            <rect width="64" height="64" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="title--newAddress"><h3>{{ __('home.HOME CARE SERVICE') }}</h3>
                                <p>{{ __("home.Don't come to us! We will come to you") }}!</p>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4 d-flex text-map--homeNew">
                            <div class="mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"
                                     fill="none">
                                    <path
                                        d="M32.0006 0C20.4563 0 11.0645 9.39188 11.0645 20.9361C11.0645 25.6241 14.3508 33.9281 20.8325 45.6174C25.5777 54.175 32.0006 64 32.0006 64C32.0006 64 38.4235 54.1749 43.1686 45.6174C49.6502 33.928 52.9366 25.624 52.9366 20.936C52.9366 9.39188 43.5447 0 32.0006 0ZM20.7572 37.4868C19.9593 35.9074 19.205 34.3466 18.5177 32.8361C19.3955 31.5266 20.8801 30.7126 22.4882 30.7126H25.3595C27.927 30.7126 30.0268 32.7487 30.1316 35.2909C30.1301 35.3573 30.1265 35.4233 30.1265 35.4899V37.4869L20.7572 37.4868ZM21.4655 24.5265C21.4655 23.1766 22.5637 22.0784 23.9135 22.0784C25.2633 22.0784 26.3616 23.1766 26.3616 24.5265C26.3616 25.8764 25.2633 26.9745 23.9135 26.9745C22.5637 26.9745 21.4655 25.8764 21.4655 24.5265ZM30.5692 18.6795H33.4406C34.457 18.6795 35.4547 19.0336 36.2775 19.6426C34.8211 20.7755 33.8813 22.5427 33.8813 24.5266C33.8813 25.7546 34.2425 26.8993 34.8621 27.8625C33.7483 28.4167 32.7727 29.2075 32.0008 30.1691C31.2253 29.2031 30.2445 28.4093 29.1242 27.8547C29.7407 26.893 30.0998 25.7514 30.0998 24.5268C30.0998 22.5413 29.1586 20.7726 27.7001 19.6399C28.5138 19.028 29.515 18.6795 30.5692 18.6795ZM29.5467 12.4934C29.5467 11.1435 30.645 10.0454 31.9947 10.0454C33.3446 10.0454 34.4428 11.1435 34.4428 12.4934C34.4428 13.8433 33.3446 14.9415 31.9947 14.9415C30.645 14.9415 29.5467 13.8433 29.5467 12.4934ZM32.0006 57.1306C29.4448 53.0885 25.9071 47.208 22.7042 41.2249H41.2972C38.0941 47.2079 34.5562 53.0885 32.0006 57.1306ZM43.2436 37.4868H33.8643V35.4897H33.8645H33.8746C33.8746 35.423 33.8711 35.3571 33.8695 35.2907C33.9742 32.7485 36.0742 30.7125 38.6416 30.7125H41.5128C43.121 30.7125 44.6056 31.5264 45.4833 32.836C44.796 34.3466 44.0415 35.9074 43.2436 37.4868ZM37.6192 24.5266C37.6192 23.1768 38.7175 22.0785 40.0672 22.0785C41.417 22.0785 42.5152 23.1768 42.5152 24.5266C42.5152 25.8765 41.417 26.9746 40.0672 26.9746C38.7175 26.9746 37.6192 25.8765 37.6192 24.5266ZM45.2771 27.8554C45.8938 26.8935 46.2532 25.7515 46.2532 24.5265C46.2532 21.1743 43.5726 18.4384 40.2427 18.3447C39.4255 17.2715 38.38 16.4142 37.2005 15.8285C37.8197 14.8652 38.1807 13.7209 38.1807 12.4932C38.1807 9.08225 35.4056 6.30725 31.9946 6.30725C28.5837 6.30725 25.8086 9.08225 25.8086 12.4932C25.8086 13.7204 26.1692 14.8642 26.788 15.8271C25.6063 16.4126 24.5658 17.2703 23.7593 18.3442C20.4195 18.4265 17.7273 21.1671 17.7273 24.5265C17.7273 25.7546 18.0886 26.8994 18.7083 27.8629C18.0596 28.1847 17.4532 28.5874 16.9056 29.0621C15.6098 25.7809 14.8023 22.9321 14.8023 20.9359C14.8023 11.4529 22.5173 3.73787 32.0005 3.73787C41.4835 3.73787 49.1985 11.4529 49.1985 20.936C49.1985 22.9323 48.3909 25.7809 47.0952 29.0621C46.5433 28.5837 45.9316 28.1785 45.2771 27.8554Z"
                                        fill="#088180"/>
                                </svg>
                            </div>
                            <div class="title--newAddress"><h3>{{ __('home.MANY LOCATION') }}</h3>
                                <p>{{ __('home.More than 1500 Doctors, 1000 Pharmacists, 1000 Hospitals always wait for you') }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="">
                <div class="titleServiceHomeNew d-flex justify-content-between align-items-center">Chuyên khoa khám <a
                        class="pc-hidden" href="{{route('home.specialist')}}">see more</a></div>
                <div class="mainServiceHomeNew row">
                    @php
                        $departments = \App\Models\Department::where('status', \App\Enums\DepartmentStatus::ACTIVE)->get();
                        $departmentsMobile = \App\Models\Department::where('status', \App\Enums\DepartmentStatus::ACTIVE)->get();
                    @endphp
                    @foreach($departments as $index => $departmentItem)
                        @php
                            $showDesktop = $index > 5;
                        @endphp
                        <div class="col-md-4 d-none {{ $showDesktop == true ? 'd-md-block' : 'd-sm-block' }}">
                            <a href="{{route('home.specialist.department',$departmentItem->id)}}">
                                <div class="border-HomeNew">
                                    <div class="w-75 d-flex align-items-center ">
                                        <img src="{{$departmentItem->thumbnail}}" alt="thumbnail">
                                        <span>{{$departmentItem->name}}</span>
                                    </div>
                                    <div class="svg-containerNho">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             fill="none">
                                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"
                                                  fill="#D8F6FF"/>
                                        </svg>
                                    </div>
                                    <div class="svg-container">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                             viewBox="0 0 60 60"
                                             fill="none">
                                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"
                                                  fill="#D8F6FF"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="bg-homeNew">
        <div class="container pt-3">
            <div id="find-doctor--homeNew">
                <div class="title-findDoctor--homeNew">
                    <span class="py-3 text-center">{{ __('home.Find a doctor') }}</span>
                </div>
                <div class="d-flex nav-header--homeNew justify-content-center mt-3">
                    <ul class="nav nav-pills nav-fill d-flex justify-content-between">
                        <li class="nav-item">
                            <a class="nav-link active font-14-mobi" id="available-tab" data-toggle="tab"
                               href="#available"
                               role="tab" aria-controls="available"
                               aria-selected="true">{{ __('home.24/7 AVAILABLE') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-14-mobi" id="findMedicine-tab" data-toggle="tab"
                               href="#findMedicine"
                               role="tab" aria-controls="findMedicine"
                               aria-selected="false">{{ __('home.Find my medicine') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-14-mobi" id="mentoring-tab" data-toggle="tab" href="#mentoring"
                               role="tab" aria-controls="mentoring"
                               aria-selected="true">{{ __('home.Mentoring') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content py-4" id="myTabContent">
                    <div class="tab-pane fade show active" id="available" role="tabpanel"
                         aria-labelledby="available-tab">
                        @php
                            $doctors = \App\Models\User::where('member', \App\Enums\TypeUser::DOCTORS)->paginate(12);
                        @endphp
                        <div class="row">

                            @foreach($doctors as $doctor)
                                @if($doctor == '')
                                    <h1 class="d-flex align-items-center justify-content-center mt-4">{{ __('home.null') }}</h1>
                                @else
                                    @php
                                        $isFavourite = null;
                                        if (Auth::check()){
                                            $isFavourite = \App\Models\MedicalFavourite::where('user_id', Auth::user()->id)
                                                                ->where('medical_id', $doctor->id)
                                                                ->first();
                                        }

                                        $class = !$isFavourite ? 'bi-heart' : 'bi-heart-fill text-danger';
                                    @endphp
                                    <div class="col-md-3 col-6">
                                        <div class="">
                                            <div class="product-item">
                                                <div class="img-pro justify-content-center d-flex">
                                                    <img src="{{$doctor->avt}}" alt="">
                                                    <a class="button-heart button-doctor-heart"
                                                       data-doctor="{{$doctor->id}}"
                                                       data-isFavourite="{{ $isFavourite ? 1 : 0 }}">
                                                        <i class="bi {{ $class }}"></i>
                                                    </a>
                                                    <s class="icon-chuyen-khoa">
                                                        @php
                                                            $department = \App\Models\Department::where('id',$doctor->department_id)->value('thumbnail');
                                                        @endphp
                                                        <img src="{{$department}}">
                                                    </s>
                                                </div>
                                                <div class="content-pro p-md-3 p-2">
                                                    <div class="">
                                                        <div class="name-product" style="height: auto">
                                                            <a class="name-product--fleaMarket"
                                                               href="{{ route('examination.doctor_info', $doctor->id) }}">{{$doctor->name}}</a>
                                                        </div>
                                                        <div class="location-pro d-flex">
                                                            <p>{!! $doctor->service !!}</p>
                                                        </div>
                                                        <div class="price-pro">
                                                            @php
                                                                if ($doctor->province_id == null) {
                                                                    $addressP = 'Ha Noi';
                                                                    }
                                                                else {
                                                                    $addressP = Province::find($doctor->province_id)->name;
                                                                    }
                                                            @endphp
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                                 height="21" viewBox="0 0 21 21" fill="none">
                                                                <g clip-path="url(#clip0_5506_14919)">
                                                                    <path
                                                                        d="M4.66602 12.8382C3.12321 13.5188 2.16602 14.4673 2.16602 15.5163C2.16602 17.5873 5.89698 19.2663 10.4993 19.2663C15.1017 19.2663 18.8327 17.5873 18.8327 15.5163C18.8327 14.4673 17.8755 13.5188 16.3327 12.8382M15.4993 7.59961C15.4993 10.986 11.7493 12.5996 10.4993 15.0996C9.24935 12.5996 5.49935 10.986 5.49935 7.59961C5.49935 4.83819 7.73793 2.59961 10.4993 2.59961C13.2608 2.59961 15.4993 4.83819 15.4993 7.59961ZM11.3327 7.59961C11.3327 8.05985 10.9596 8.43294 10.4993 8.43294C10.0391 8.43294 9.66602 8.05985 9.66602 7.59961C9.66602 7.13937 10.0391 6.76628 10.4993 6.76628C10.9596 6.76628 11.3327 7.13937 11.3327 7.59961Z"
                                                                        stroke="white" stroke-width="2"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_5506_14919">
                                                                        <rect width="20" height="20" fill="white"
                                                                              transform="translate(0.5 0.933594)"/>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg> &nbsp;
                                                            {{$addressP}}
                                                        </div>
                                                        <div class="price-pro">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                                 height="21" viewBox="0 0 21 21" fill="none">
                                                                <g clip-path="url(#clip0_5506_14923)">
                                                                    <path
                                                                        d="M10.4993 5.93294V10.9329L13.8327 12.5996M18.8327 10.9329C18.8327 15.5353 15.1017 19.2663 10.4993 19.2663C5.89698 19.2663 2.16602 15.5353 2.16602 10.9329C2.16602 6.33057 5.89698 2.59961 10.4993 2.59961C15.1017 2.59961 18.8327 6.33057 18.8327 10.9329Z"
                                                                        stroke="white" stroke-width="2"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_5506_14923">
                                                                        <rect width="20" height="20" fill="white"
                                                                              transform="translate(0.5 0.933594)"/>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg> &nbsp; {{$doctor->time_working_1}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="pagination mt-4 d-flex align-items-center justify-content-center">
                            {{ $doctors->links() }}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="findMedicine" role="tabpanel" aria-labelledby="findMedicine-tab">
                        <div class="row">
                            @if($medicines == '')
                                <h1 class="d-flex align-items-center justify-content-center mt-4">{{ __('home.null') }}</h1>
                            @else
                                @foreach($medicines as $medicine)
                                    <div class="col-md-3 col-6">
                                        <div class="">
                                            <div class="product-item">
                                                <div
                                                    class="img-pro justify-content-center d-flex img_product--homeNew">
                                                    <img src="{{$medicine->thumbnail}}" alt="">
                                                    <a class="button-heart" data-favorite="0">
                                                        <i class="bi-heart bi"
                                                           data-product-id=""
                                                           onclick=""></i>
                                                    </a>
                                                </div>
                                                <div class="content-pro p-md-3 p-2">
                                                    <div class="">
                                                        <div class="name-product" style="height: auto">
                                                            <a class="name-product--fleaMarket"
                                                               href="{{ route('examination.doctor_info', $medicine->id) }}">{{$medicine->name}}</a>
                                                        </div>
                                                        <div class="location-pro">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                                 height="21" viewBox="0 0 21 21" fill="none">
                                                                <g clip-path="url(#clip0_5506_14919)">
                                                                    <path
                                                                        d="M4.66602 12.8382C3.12321 13.5188 2.16602 14.4673 2.16602 15.5163C2.16602 17.5873 5.89698 19.2663 10.4993 19.2663C15.1017 19.2663 18.8327 17.5873 18.8327 15.5163C18.8327 14.4673 17.8755 13.5188 16.3327 12.8382M15.4993 7.59961C15.4993 10.986 11.7493 12.5996 10.4993 15.0996C9.24935 12.5996 5.49935 10.986 5.49935 7.59961C5.49935 4.83819 7.73793 2.59961 10.4993 2.59961C13.2608 2.59961 15.4993 4.83819 15.4993 7.59961ZM11.3327 7.59961C11.3327 8.05985 10.9596 8.43294 10.4993 8.43294C10.0391 8.43294 9.66602 8.05985 9.66602 7.59961C9.66602 7.13937 10.0391 6.76628 10.4993 6.76628C10.9596 6.76628 11.3327 7.13937 11.3327 7.59961Z"
                                                                        stroke="white" stroke-width="2"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_5506_14919">
                                                                        <rect width="20" height="20" fill="white"
                                                                              transform="translate(0.5 0.933594)"/>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg> &nbsp; {{$medicine->location_name}}
                                                        </div>
                                                        <div class="prices-pro">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                                 height="21" viewBox="0 0 21 21" fill="none">
                                                                <g clip-path="url(#clip0_5506_14923)">
                                                                    <path
                                                                        d="M10.4993 5.93294V10.9329L13.8327 12.5996M18.8327 10.9329C18.8327 15.5353 15.1017 19.2663 10.4993 19.2663C5.89698 19.2663 2.16602 15.5353 2.16602 10.9329C2.16602 6.33057 5.89698 2.59961 10.4993 2.59961C15.1017 2.59961 18.8327 6.33057 18.8327 10.9329Z"
                                                                        stroke="white" stroke-width="2"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_5506_14923">
                                                                        <rect width="20" height="20" fill="white"
                                                                              transform="translate(0.5 0.933594)"/>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                            &nbsp;{{number_format($medicine->price, 0, ',', '.') }} {{$medicine->price_unit ?? 'VND'}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <div class="SeeDetail">
                                                        <a href="{{ route('medicine.detail', $medicine->id) }}"
                                                           target="_blank">{{ __('home.See details') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="pagination mt-4 d-flex align-items-center justify-content-center">
                            {{ $medicines->links() }}
                        </div>
                    </div>
                    <div class="tab-pane fade " id="mentoring" role="tabpanel" aria-labelledby="mentoring-tab">
                        <div class="section1-content">
                            @foreach($questions as $question)
                                <div class="mb-1">
                                    <a href="{{ route('examination.mentoring.show', $question->id) }}" target="_blank">
                                        <div class="content__item d-flex gap-3">
                                            @php
                                                $thumbnail = explode(',', $question->gallery_public)[0];
                                            @endphp
                                            <img
                                                class="content__item__image" loading="lazy"
                                                src="{{ $thumbnail ? asset($thumbnail) : asset('img/icons_logo/image 1.jpeg')}}"
                                                alt=""
                                            />
                                            <div>
                                                <h6>
                                                    {{ $question->title }}
                                                </h6>
                                                <p class="ellipse-4-line">
                                                    {!! $question->content !!}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner1 m-0">
        <img src="{{asset('img/icons_logo/Rectangle 23814.png')}}" alt="">
    </div>
    <div class="container pb-5 mt-4">
        <div id="recruitment-homeNew" class="">
            <div class="title-recruitment--homeNew">
                <span>{{ __('home.Recruitment') }}</span>
                <p>{{ __('home.Hire staffs cheaper, find your staffs faster') }}</p>
            </div>
            <div class="d-md-flex main-recruitment--homeNew justify-content-between">
                <div class="col-md-6 col-12 pl-0 main-card--homeNew">
                    <div class="d-flex content-recruitment--homeNew">
                        <div class="col-md-3 col-4 p-0">
                            <img src="{{asset('img/icons_logo/image 1.jpeg')}}" alt=""/>
                        </div>
                        <div class="col-md-9 col-8 text-title--card">
                            <span>
                                {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}
                            </span>
                            <div class="content__item__describe">
                                {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex content-recruitment--homeNew">
                        <div class="col-md-3 col-4 p-0">
                            <img src="{{asset('img/icons_logo/image 1.jpeg')}}" alt=""/>
                        </div>
                        <div class="col-md-9 col-8 text-title--card">
                            <span>
                                {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}
                            </span>
                            <div class="content__item__describe">
                                {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex content-recruitment--homeNew">
                        <div class="col-md-3 col-4 p-0">
                            <img src="{{asset('img/icons_logo/image 1.jpeg')}}" alt=""/>
                        </div>
                        <div class="col-md-9 col-8 text-title--card">
                            <span>
                                {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}
                            </span>
                            <div class="content__item__describe">
                                {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex content-recruitment--homeNew">
                        <div class="col-md-3 col-4 p-0">
                            <img src="{{asset('img/icons_logo/image 1.jpeg')}}" alt=""/>
                        </div>
                        <div class="col-md-9 col-8 text-title--card">
                            <span>
                                {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}
                            </span>
                            <div class="content__item__describe">
                                {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 main-title-card--homeNew col-12">
                    <div class="w-100">
                        <div class="describe-item d-md-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4" width="64" height="64"
                                 viewBox="0 0 64 64"
                                 fill="none">
                                <g clip-path="url(#clip0_5901_81337)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M50.1316 51.9878L39.6232 41.4926C39.4078 41.2775 39.3844 40.9542 39.5123 40.6781C39.6402 40.4018 39.9007 40.2353 40.2051 40.2353H45.0993L45.0992 17.2473C45.0992 16.4066 45.7851 15.7207 46.6258 15.7207H54.8008C55.6414 15.7207 56.3273 16.4068 56.3273 17.2473L56.3276 40.2353H61.2218C61.5262 40.2353 61.7867 40.4017 61.9144 40.6781C62.0423 40.9543 62.0006 41.2606 61.8036 41.4927L51.2949 51.988C51.1309 52.1517 50.9452 52.2572 50.7132 52.2572C50.4815 52.2571 50.2957 52.1518 50.1316 51.9878Z"
                                          fill="#B9EA6A"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M50.1315 51.9878L48.8374 50.6955L59.3035 40.2426L59.3095 40.2353H61.2217C61.526 40.2353 61.7865 40.4017 61.9143 40.6781C62.0422 40.9543 62.0004 41.2606 61.8034 41.4927L51.2948 51.988C51.1308 52.1517 50.945 52.2572 50.713 52.2572C50.4814 52.2571 50.2957 52.1518 50.1315 51.9878ZM53.802 15.7207C53.8185 15.8105 53.8273 15.9028 53.8273 15.9973L53.8275 40.2355H56.3277L56.3274 17.2475C56.3274 16.407 55.6415 15.7208 54.8009 15.7208L53.802 15.7207Z"
                                          fill="#A1E42C"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M20.2045 61.1951L6.75042 47.758C6.47467 47.4825 6.44479 47.0687 6.60842 46.7151C6.77204 46.3615 7.10554 46.1482 7.49529 46.1482H13.7615L13.7614 16.7162C13.7614 15.6398 14.6397 14.7617 15.7159 14.7617H26.1825C27.2588 14.7617 28.137 15.6401 28.137 16.7162L28.1373 46.1482H34.4037C34.7933 46.1482 35.1269 46.3613 35.2905 46.7151C35.4543 47.0688 35.4008 47.4608 35.1487 47.7581L21.6943 61.1952C21.4843 61.405 21.2464 61.54 20.9495 61.54C20.6524 61.5398 20.4147 61.4051 20.2045 61.1951Z"
                                          fill="#B9EA6A"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M20.2046 61.1952L19.0674 60.0595C19.1109 60.0246 19.1531 59.9863 19.1943 59.9452L32.6486 46.508C32.7414 46.3987 32.8073 46.2766 32.8453 46.1482H34.4038C34.7934 46.1482 35.127 46.3613 35.2906 46.7151C35.4544 47.0688 35.4009 47.4608 35.1488 47.7581L21.6944 61.1953C21.4844 61.4051 21.2465 61.5401 20.9496 61.5401C20.6525 61.54 20.4148 61.4052 20.2046 61.1952ZM25.5054 14.7617C25.5904 14.9805 25.6373 15.2181 25.6373 15.4662L25.6375 46.1483H28.1375L28.1373 16.7163C28.1373 15.6402 27.2591 14.7618 26.1828 14.7618L25.5054 14.7617Z"
                                          fill="#A1E42C"/>
                                    <path
                                        d="M34.3339 34.7853C41.7284 27.3909 41.7284 15.4021 34.3339 8.00767C26.9395 0.613234 14.9507 0.613234 7.55629 8.00767C0.161856 15.4021 0.161856 27.3909 7.55629 34.7853C14.9507 42.1797 26.9395 42.1797 34.3339 34.7853Z"
                                        fill="#FCDD2E"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M20.9496 2.45898C31.4085 2.45898 39.8871 10.9376 39.8871 21.3965C39.8871 31.8554 31.4085 40.334 20.9496 40.334C20.5433 40.334 20.1406 40.3196 19.7407 40.2945C29.6361 39.671 37.4693 31.4491 37.4693 21.3965C37.4693 11.3439 29.6361 3.12211 19.7407 2.49848C20.1406 2.47323 20.5435 2.45898 20.9496 2.45898Z"
                                          fill="#FBD307"/>
                                    <path
                                        d="M20.9497 36.2968C29.1784 36.2968 35.849 29.6261 35.849 21.3974C35.849 13.1687 29.1784 6.49805 20.9497 6.49805C12.721 6.49805 6.05029 13.1687 6.05029 21.3974C6.05029 29.6261 12.721 36.2968 20.9497 36.2968Z"
                                        fill="#FBD307"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M20.9497 6.49805C21.3567 6.49805 21.7597 6.51505 22.1584 6.54705C14.4952 7.16242 8.46792 13.5757 8.46792 21.3974C8.46792 29.219 14.4952 35.6324 22.1584 36.2478C21.7597 36.2798 21.3567 36.2968 20.9497 36.2968C12.7209 36.2968 6.05029 29.6262 6.05029 21.3974C6.05029 13.1688 12.721 6.49805 20.9497 6.49805Z"
                                          fill="#F9C301"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M26.1723 16.9921C26.4214 17.7817 25.9834 18.6237 25.1938 18.8729C24.4042 19.1221 23.562 18.6841 23.3129 17.8944C23.2028 17.5452 22.9292 17.2286 22.5504 16.9908C22.122 16.7218 21.5675 16.5617 20.9495 16.5617C20.2223 16.5617 19.5783 16.7886 19.125 17.1554C18.7607 17.4503 18.5352 17.8316 18.5352 18.2291C18.5352 18.6266 18.7605 19.0079 19.125 19.3028C19.5783 19.6696 20.2224 19.8966 20.9495 19.8966C22.3842 19.8966 23.6974 20.3788 24.6608 21.1583C25.713 22.0098 26.3639 23.2124 26.3639 24.5641C26.3639 25.9158 25.713 27.1183 24.6608 27.9698C24.0463 28.4671 23.2894 28.8432 22.4495 29.0506V29.6291C22.4495 30.4574 21.7779 31.1291 20.9495 31.1291C20.1212 31.1291 19.4495 30.4574 19.4495 29.6291V29.0502C18.9239 28.9202 18.4309 28.7239 17.9854 28.4733C17.0632 27.9546 16.3352 27.1938 15.9194 26.2878C15.5764 25.5371 15.9069 24.6503 16.6577 24.3073C17.4084 23.9643 18.2952 24.2948 18.6382 25.0456C18.7834 25.3622 19.07 25.6461 19.4502 25.8599C19.8664 26.0941 20.3827 26.2314 20.9495 26.2314C21.6767 26.2314 22.3208 26.0046 22.774 25.6377C23.1384 25.3428 23.3639 24.9616 23.3639 24.5641C23.3639 24.1664 23.1384 23.7852 22.774 23.4903C22.3207 23.1236 21.6767 22.8966 20.9495 22.8966C19.5149 22.8966 18.2017 22.4143 17.2383 21.6348C16.186 20.7833 15.5352 19.5808 15.5352 18.2291C15.5352 16.8773 16.186 15.6748 17.2383 14.8233C17.8528 14.3261 18.6097 13.9498 19.4495 13.7426V13.1641C19.4495 12.3357 20.1212 11.6641 20.9495 11.6641C21.7779 11.6641 22.4495 12.3357 22.4495 13.1641V13.7442C23.066 13.8976 23.6389 14.1423 24.1442 14.4596C25.1194 15.0718 25.8459 15.9572 26.1723 16.9921Z"
                                          fill="#F4F8F8"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_5901_81337">
                                        <rect width="64" height="64" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <div class="title-re">
                                <span>{{ __('home.HIRE CHEAPER') }}</span>
                                <p>{{ __('home.Only 500000vnđ, you can hire your staffs.') }}</p>
                            </div>
                        </div>
                        <div class="describe-item d-md-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4" width="64" height="64"
                                 viewBox="0 0 64 64"
                                 fill="none">
                                <g clip-path="url(#clip0_5901_81351)">
                                    <path
                                        d="M59.7812 38.6884H58.5312C60.8613 38.6884 62.75 36.7996 62.75 34.4696C62.75 32.1396 60.8613 30.2509 58.5312 30.2509H49.7261L52.5353 19.7667C53.1383 17.5162 51.8026 15.2029 49.5521 14.5999C47.3016 13.9969 44.9884 15.3325 44.3853 17.583L43.3493 21.4492C41.9584 26.6409 37.2537 30.2509 31.879 30.2509H22.75V59.0009H29.9375L30.875 60.2509C32.6455 62.6115 35.4241 64.0009 38.375 64.0009H54.7812C57.1113 64.0009 59 62.1121 59 59.7821C59 57.4521 57.1113 55.5634 54.7812 55.5634H57.2812C59.6113 55.5634 61.5 53.6746 61.5 51.3446C61.5 49.0146 59.6113 47.1259 57.2812 47.1259H59.7812C62.1113 47.1259 64 45.2371 64 42.9071C64 40.5771 62.1113 38.6884 59.7812 38.6884Z"
                                        fill="#FFDECF"/>
                                    <path
                                        d="M61.5 51.3438C61.5 49.0138 59.6113 47.125 57.2812 47.125H22.75V59H29.9375L30.875 60.25C32.6455 62.6106 35.4241 64 38.375 64H54.7812C57.1113 64 59 62.1112 59 59.7812C59 57.4513 57.1113 55.5625 54.7812 55.5625H57.2812C59.6113 55.5625 61.5 53.6737 61.5 51.3438Z"
                                        fill="#FFCDBE"/>
                                    <path
                                        d="M16.9496 1.15125C16.9442 1.137 16.9386 1.12275 16.9328 1.10863C16.6558 0.435 16.0065 0 15.2782 0C15.2776 0 15.277 0 15.2763 0C14.5473 0.00075 13.8981 0.43725 13.6222 1.112C13.6173 1.12363 13.6127 1.1355 13.6082 1.14725L9.85322 11.0064C9.5461 11.8129 9.95085 12.7155 10.7572 13.0228C11.5637 13.3298 12.4665 12.9251 12.7736 12.1188L13.3255 10.6696H17.2015L17.7466 12.1143C17.9827 12.74 18.5773 13.1255 19.2087 13.1255C19.392 13.1255 19.5785 13.093 19.7602 13.0244C20.5676 12.7196 20.9751 11.8183 20.6703 11.0109L16.9496 1.15125ZM14.5157 7.5445L15.2725 5.55763L16.0222 7.5445H14.5157Z"
                                        fill="#613393"/>
                                    <path
                                        d="M5.77612 3.125C6.639 3.125 7.33862 2.42537 7.33862 1.5625C7.33862 0.699625 6.639 0 5.77612 0H1.5625C0.699625 0 0 0.6995 0 1.5625V11.5625C0 12.4254 0.699625 13.125 1.5625 13.125H5.77612C6.639 13.125 7.33862 12.4254 7.33862 11.5625C7.33862 10.6996 6.639 10 5.77612 10H3.125V8.125H5.46537C6.32837 8.125 7.02787 7.4255 7.02787 6.5625C7.02787 5.6995 6.32837 5 5.46537 5H3.125V3.125H5.77612Z"
                                        fill="#613393"/>
                                    <path
                                        d="M43.9774 0.27847C43.2541 -0.192155 42.2863 0.0122198 41.8155 0.735595L39.955 3.5936L38.0711 0.70847C37.5994 -0.0140302 36.6311 -0.21753 35.9086 0.25447C35.186 0.72622 34.9828 1.69447 35.4546 2.41697L38.3935 6.91785L38.3821 11.559C38.38 12.422 39.0779 13.1232 39.9408 13.1253H39.9446C40.8058 13.1253 41.5049 12.4283 41.5071 11.5667L41.5185 6.92035L44.4346 2.44072C44.9053 1.71722 44.7006 0.749345 43.9774 0.27847Z"
                                        fill="#613393"/>
                                    <path
                                        d="M29.6304 5.18651C28.4605 4.75501 27.3675 4.28614 26.9759 4.11539C26.8678 4.01051 26.8584 3.87876 26.8725 3.78014C26.9078 3.53451 27.1164 3.33689 27.445 3.23789C28.6153 2.88514 29.5028 3.46389 29.6809 3.59351C30.1428 4.16564 30.9599 4.34776 31.6323 3.98877C32.3934 3.58214 32.6807 2.63539 32.274 1.87426C31.7352 0.865765 29.2918 -0.582235 26.5438 0.24564C25.0475 0.696265 23.9883 1.88051 23.7794 3.33601C23.5823 4.70926 24.1779 6.03064 25.3339 6.78427C25.4029 6.82927 25.4754 6.86876 25.5507 6.90227C25.6088 6.92827 26.992 7.54389 28.5492 8.11827C29.1327 8.33352 29.73 8.71114 29.656 9.12539C29.593 9.47801 29.0943 9.99989 28.2235 9.99989C27.3194 9.99989 26.4524 9.63889 25.9044 9.03414C25.3249 8.39464 24.3367 8.34601 23.6974 8.92552C23.0579 9.50502 23.0093 10.4931 23.5888 11.1325C24.7362 12.3986 26.4254 13.1248 28.2235 13.1248C30.4792 13.1248 32.3754 11.6738 32.7324 9.67452C33.0029 8.15789 32.3303 6.18239 29.6304 5.18651Z"
                                        fill="#613393"/>
                                    <path
                                        d="M24.625 62.75H15.875C14.8395 62.75 14 61.9105 14 60.875V28.375C14 27.3395 14.8395 26.5 15.875 26.5H24.625C25.6605 26.5 26.5 27.3395 26.5 28.375V60.875C26.5 61.9105 25.6605 62.75 24.625 62.75Z"
                                        fill="#FF7D47"/>
                                    <path
                                        d="M14 47.125V60.875C14 61.9105 14.8395 62.75 15.875 62.75H24.625C25.6605 62.75 26.5 61.9105 26.5 60.875V47.125H14Z"
                                        fill="#FF405C"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_5901_81351">
                                        <rect width="64" height="64" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <div class="title-re">
                                <span>{{ __('home.EASY TO FIND STAFFS') }}</span>
                                <p>{{ __("home.Through us, find your staffs more easier") }}!</p>
                            </div>
                        </div>
                        <div class="describe-item d-md-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-4" width="64" height="64"
                                 viewBox="0 0 64 64"
                                 fill="none">
                                <g clip-path="url(#clip0_5901_81312)">
                                    <path
                                        d="M52.5858 30.9291L58.7968 26.2173L52.5858 21.4929L56.1512 14.5512L48.5039 13.0142L48.7055 5.20315L41.159 7.13071L37.959 0L32 5.03937L26.0409 0L22.8409 7.13071L15.2945 5.19055L15.496 13.0142L7.84879 14.5512L11.4141 21.4929L5.20312 26.2173L11.4141 30.9291L7.84879 37.8835L15.496 39.4205L15.2945 47.2315L22.8409 45.3039L26.0409 52.4347L32 47.3953L37.959 52.4347L41.159 45.3039L48.7055 47.2315L48.5039 39.4205L56.1512 37.8835L52.5858 30.9291Z"
                                        fill="#FFD15C"/>
                                    <path
                                        d="M22.8409 45.3042L15.2944 47.2318L15.4708 40.1641L13.9842 42.8097L5.83301 57.2349L15.1432 54.6523L17.7259 64.0003L24.3905 52.2208L25.2472 50.6837L22.8409 45.3042Z"
                                        fill="#FF7058"/>
                                    <path
                                        d="M50.0031 42.3429L48.5165 39.6973L48.7055 47.2311L41.159 45.3036L38.8535 50.4311L39.7228 51.9681L46.526 63.9996L49.1086 54.6516L58.4189 57.2343L50.0031 42.3429Z"
                                        fill="#FF7058"/>
                                    <path
                                        d="M25.2471 50.6837L24.3904 52.2208L22.0345 46.9798L13.8203 49.0837L13.9841 42.8097L15.4707 40.1641L15.2943 47.2318L22.8408 45.3042L25.2471 50.6837Z"
                                        fill="#F1543F"/>
                                    <path
                                        d="M50.1795 49.0831L41.9653 46.9792L39.7228 51.9681L38.8535 50.4311L41.159 45.3036L48.7055 47.2311L48.5165 39.6973L50.0031 42.3429L50.1795 49.0831Z"
                                        fill="#F1543F"/>
                                    <path
                                        d="M31.9999 42.9093C41.1914 42.9093 48.6425 35.4356 48.6425 26.2164C48.6425 16.9971 41.1914 9.52344 31.9999 9.52344C22.8085 9.52344 15.3574 16.9971 15.3574 26.2164C15.3574 35.4356 22.8085 42.9093 31.9999 42.9093Z"
                                        fill="#F8B64C"/>
                                    <path
                                        d="M28.0317 34.8101L21.7451 28.5109L24.6554 25.5881L28.0317 28.9771L39.3451 17.6133L42.2554 20.5361L28.0317 34.8101Z"
                                        fill="#F2F2F2"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_5901_81312">
                                        <rect width="64" height="64" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <div class="title-re">
                                <span>{{ __('home.BETTER MATCHING RATE') }}</span>
                                <p>{{ __('home.Through us, you can hire right person') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-auto p-2 button-bottom-right">
                        <button class="btn-see-all ">{{ __('home.Visit') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner1 m-0">
        <img src="{{asset('img/icons_logo/Rectangle 23818.png')}}" alt="" style="">
    </div>

    <div class="">
        <div class="background-image_HomeNew" id="find-doctor--homeNew">
            <div class="container pb-5 mt-4">
                <div class="pc-hidden tt-flea">
                    Flea market
                </div>
                <div class="carousel pc-hidden">
                    @foreach($productsFlea as $product)
                        <div class="product-itemFlea">
                            <div class="img-proFlea justify-content-center d-flex">
                                <img src="{{$product->thumbnail}}" alt="">
                                <a class="button-heart" data-favorite="0">
                                    <i class="bi-heart bi"
                                       data-product-id="${product.id}"
                                       onclick="addProductToWishList(${product.id})"></i>
                                </a>
                            </div>
                            <div class="content-proFlea p-md-3 p-2">
                                <div class="">
                                    <div class="name-productFlea" style="min-height: 55px">
                                        <a class="name-product--fleaMarket"
                                           href="{{ route('flea.market.product.detail', $product->id) }}"
                                           target="_blank">{{$product->name}}</a>
                                    </div>
                                    <div class="location-proFlea">
                                        @php
                                            $addressP = \App\Models\Province::where('id', $product->province_id)->value('name');
                                        @endphp
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                             height="21" viewBox="0 0 21 21" fill="none">
                                            <g clip-path="url(#clip0_5506_14919)">
                                                <path
                                                    d="M4.66602 12.8382C3.12321 13.5188 2.16602 14.4673 2.16602 15.5163C2.16602 17.5873 5.89698 19.2663 10.4993 19.2663C15.1017 19.2663 18.8327 17.5873 18.8327 15.5163C18.8327 14.4673 17.8755 13.5188 16.3327 12.8382M15.4993 7.59961C15.4993 10.986 11.7493 12.5996 10.4993 15.0996C9.24935 12.5996 5.49935 10.986 5.49935 7.59961C5.49935 4.83819 7.73793 2.59961 10.4993 2.59961C13.2608 2.59961 15.4993 4.83819 15.4993 7.59961ZM11.3327 7.59961C11.3327 8.05985 10.9596 8.43294 10.4993 8.43294C10.0391 8.43294 9.66602 8.05985 9.66602 7.59961C9.66602 7.13937 10.0391 6.76628 10.4993 6.76628C10.9596 6.76628 11.3327 7.13937 11.3327 7.59961Z"
                                                    stroke="white" stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_5506_14919">
                                                    <rect width="20" height="20" fill="white"
                                                          transform="translate(0.5 0.933594)"/>
                                                </clipPath>
                                            </defs>
                                        </svg> &nbsp; {{$addressP}}
                                    </div>
                                    <div class="prices-proFlea">
                                        {{number_format($product->price, 0, ',', '.') }} {{$product->price_unit ?? 'VND'}}
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="SeeDetailFlea">
                                    <a href="{{ route('flea.market.product.detail', $product->id) }}"
                                       target="_blank">{{ __('home.See details') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="tab-content mt-4 header-pc" id="myTabContent">
                    <div class="tab-pane fade show active" id="popularProduct" role="tabpanel"
                         aria-labelledby="popularProduct-tab">
                        <div id="cCarousel">
                            <div style="z-index: 0;" class="arrow" id="prevFlea"><i
                                    class="fa-solid fa-chevron-left"></i></div>
                            <div style="z-index: 0;" class="arrow" id="nextFlea"><i
                                    class="fa-solid fa-chevron-right"></i></div>
                            <div id="carousel-vp">
                                <div id="cCarousel-inner">
                                    @if($productsFlea == '')
                                        <h1 class="d-flex align-items-center justify-content-center mt-4">{{ __('home.null') }}</h1>
                                    @else
                                        @foreach($productsFlea as $product)
                                            @php
                                                $isFavourite = null;
                                                if (Auth::check()){
                                                    $isFavourite = \App\Models\WishList::where('user_id', Auth::user()->id)
                                                                        ->where('product_id', $product->id)
                                                                        ->where('type_product', \App\Enums\TypeProductCart::FLEA_MARKET)
                                                                        ->first();
                                                }

                                                $class = !$isFavourite ? 'bi-heart' : 'bi-heart-fill text-danger';
                                            @endphp
                                            <div class="cCarousel-item">
                                                <div class="product-item">
                                                    <div
                                                        class="img-pro justify-content-center h-auto d-flex img_product--homeNew">
                                                        <img src="{{$product->thumbnail}}" alt="">
                                                        <a class="button-heart button-flea-market-heart"
                                                           data-product="{{$product->id}}"
                                                           data-isFavourite="{{ $isFavourite ? 1 : 0 }}">
                                                            <i class="bi {{ $class }}"></i>
                                                        </a>
                                                    </div>
                                                    <div class="content-pro p-md-3 p-2">
                                                        <div class="">
                                                            <div class="name-product" style="min-height: 48px">
                                                                <a class="name-product--fleaMarket"
                                                                   href="{{ route('examination.doctor_info', $product->id) }}">{{$product->name}}</a>
                                                            </div>
                                                            <div class="location-pro">
                                                                @php
                                                                    $addressP = \App\Models\Province::where('id', $product->province_id)->value('name');
                                                                @endphp
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                                     height="21" viewBox="0 0 21 21" fill="none">
                                                                    <g clip-path="url(#clip0_5506_14919)">
                                                                        <path
                                                                            d="M4.66602 12.8382C3.12321 13.5188 2.16602 14.4673 2.16602 15.5163C2.16602 17.5873 5.89698 19.2663 10.4993 19.2663C15.1017 19.2663 18.8327 17.5873 18.8327 15.5163C18.8327 14.4673 17.8755 13.5188 16.3327 12.8382M15.4993 7.59961C15.4993 10.986 11.7493 12.5996 10.4993 15.0996C9.24935 12.5996 5.49935 10.986 5.49935 7.59961C5.49935 4.83819 7.73793 2.59961 10.4993 2.59961C13.2608 2.59961 15.4993 4.83819 15.4993 7.59961ZM11.3327 7.59961C11.3327 8.05985 10.9596 8.43294 10.4993 8.43294C10.0391 8.43294 9.66602 8.05985 9.66602 7.59961C9.66602 7.13937 10.0391 6.76628 10.4993 6.76628C10.9596 6.76628 11.3327 7.13937 11.3327 7.59961Z"
                                                                            stroke="white" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"/>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_5506_14919">
                                                                            <rect width="20" height="20" fill="white"
                                                                                  transform="translate(0.5 0.933594)"/>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg> &nbsp; {{$addressP}}
                                                            </div>
                                                            <div class="prices-pro">
                                                                {{number_format($product->price, 0, ',', '.') }} {{$product->price_unit ?? 'VND'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <div class="SeeDetail">
                                                            <a href="{{ route('flea.market.product.detail', $product->id) }}"
                                                               target="_blank">{{ __('home.See details') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner1 m-0">
        <img src="{{asset('img/Rectangle 23815.png')}}" alt="">
    </div>
    <div class="bg-homeNew">
        <div class="container pb-5 pt-3">
            <div id="find-doctor--homeNew" class="item-information">
                <div class="title-findProduct--homeNew">
                    <span class="py-3 text-center">{{ __('home.Buy online') }}</span>
                    <p>{{ __("home.Don't struggle finding, we are always ready for you") }}</p>
                </div>
                <div class="d-flex nav-header--homeNew justify-content-center mt-3">
                    <ul class="nav nav-pills nav-fill d-flex justify-content-between">
                        <li class="nav-item">
                            <a class="nav-link active font-14-mobi" id="popularProduct-tab" data-toggle="tab"
                               href="#popularProduct"
                               role="tab" aria-controls="popularProduct"
                               aria-selected="true">{{ __('home.Popular') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-14-mobi" id="recommended-tab" data-toggle="tab" href="#recommended"
                               role="tab" aria-controls="recommended"
                               aria-selected="false">{{ __('home.Recommended') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-14-mobi" id="newProducts-tab" data-toggle="tab" href="#newProducts"
                               role="tab" aria-controls="newProducts"
                               aria-selected="true">{{ __('home.New product') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-14-mobi" id="hotDeal-tab" data-toggle="tab" href="#hotDeal"
                               role="tab" aria-controls="hotDeal"
                               aria-selected="true">{{ __('home.Hot deal') }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <g clip-path="url(#clip0_5435_17445)">
                                        <path
                                            d="M22.8428 12.5865C22.6738 12.2145 22.6738 11.7865 22.8428 11.4145L23.7378 9.44552C24.0708 8.71252 24.0858 7.86552 23.7778 7.12252C23.4688 6.37852 22.8608 5.78952 22.1068 5.50752L20.0828 4.74752C19.6988 4.60352 19.3968 4.30252 19.2538 3.91852L18.4938 1.89452C18.2118 1.14052 17.6228 0.532519 16.8788 0.223519C16.1378 -0.0844809 15.2888 -0.0694809 14.5558 0.263519L12.5868 1.15852C12.2138 1.32852 11.7858 1.32852 11.4148 1.15852L9.44477 0.263519C8.71277 -0.0704809 7.86377 -0.0854809 7.12177 0.223519C6.37777 0.531519 5.78877 1.14052 5.50677 1.89452L4.74677 3.91852C4.60377 4.30252 4.30177 4.60352 3.91777 4.74752L1.89377 5.50752C1.13977 5.78952 0.53077 6.37852 0.22277 7.12252C-0.0852295 7.86552 -0.0702295 8.71252 0.262771 9.44552L1.15777 11.4145C1.32677 11.7865 1.32677 12.2145 1.15777 12.5865L0.262771 14.5555C-0.0702295 15.2885 -0.0852295 16.1355 0.22277 16.8785C0.53177 17.6225 1.13977 18.2115 1.89377 18.4935L3.91777 19.2535C4.30177 19.3975 4.60377 19.6985 4.74677 20.0825L5.50677 22.1065C5.78877 22.8605 6.37777 23.4685 7.12177 23.7775C7.47677 23.9245 7.85677 23.9985 8.23677 23.9985C8.64977 23.9985 9.06277 23.9115 9.44477 23.7375L11.4138 22.8425C11.7868 22.6725 12.2148 22.6725 12.5858 22.8425L14.5548 23.7375C15.2868 24.0715 16.1358 24.0855 16.8778 23.7775C17.6218 23.4685 18.2108 22.8605 18.4928 22.1065L19.2528 20.0825C19.3968 19.6985 19.6978 19.3965 20.0818 19.2535L22.1058 18.4935C22.8598 18.2115 23.4678 17.6225 23.7768 16.8785C24.0848 16.1355 24.0698 15.2885 23.7368 14.5555L22.8428 12.5865Z"
                                            fill="#F44336"/>
                                        <path
                                            d="M13.414 9.70072C12.537 8.82372 11.109 8.82372 10.232 9.70072C9.35497 10.5777 9.35497 12.0057 10.232 12.8827L11.646 14.2967C12.084 14.7347 12.661 14.9547 13.237 14.9547C13.813 14.9547 14.389 14.7347 14.828 14.2967C15.705 13.4197 15.705 11.9917 14.828 11.1147L13.414 9.70072ZM13.768 13.2357C13.475 13.5287 13 13.5287 12.707 13.2357L11.293 11.8217C11.001 11.5297 11.001 11.0527 11.293 10.7607C11.439 10.6137 11.631 10.5417 11.823 10.5417C12.015 10.5417 12.207 10.6137 12.353 10.7607L13.767 12.1747C14.06 12.4677 14.06 12.9437 13.768 13.2357Z"
                                            fill="#FAFAFA"/>
                                        <path
                                            d="M8.81781 12.1768C8.52481 11.8838 8.04981 11.8838 7.75681 12.1768C7.46381 12.4698 7.46381 12.9448 7.75681 13.2378L8.99381 14.4748L7.93281 15.5368L6.69481 14.2988C6.40181 14.0058 5.92681 14.0058 5.63381 14.2988C5.34081 14.5918 5.34081 15.0668 5.63381 15.3598L9.16981 18.8958C9.31581 19.0418 9.50781 19.1158 9.69981 19.1158C9.89181 19.1158 10.0838 19.0428 10.2298 18.8958C10.5228 18.6028 10.5228 18.1278 10.2298 17.8348L8.99281 16.5978L10.0538 15.5358L11.2908 16.7728C11.4368 16.9188 11.6288 16.9928 11.8208 16.9928C12.0128 16.9928 12.2048 16.9198 12.3508 16.7728C12.6438 16.4798 12.6438 16.0048 12.3508 15.7118L8.81781 12.1768Z"
                                            fill="#FAFAFA"/>
                                        <path
                                            d="M18.3631 9.70152L15.3571 6.69552L15.8871 6.16552C16.1801 5.87252 16.1801 5.39752 15.8871 5.10452C15.5941 4.81152 15.1191 4.81152 14.8261 5.10452L13.7671 6.16452L13.7651 6.16552L13.7641 6.16652L12.7041 7.22752C12.4111 7.52052 12.4111 7.99552 12.7041 8.28852C12.8501 8.43451 13.0431 8.50852 13.2341 8.50852C13.4261 8.50852 13.6181 8.43552 13.7641 8.28852L14.2941 7.75752L17.3001 10.7635C17.4461 10.9095 17.6381 10.9835 17.8301 10.9835C18.0221 10.9835 18.2141 10.9105 18.3601 10.7635C18.6561 10.4695 18.6561 9.99452 18.3631 9.70152Z"
                                            fill="#FAFAFA"/>
                                        <path
                                            d="M13.025 11.436L11.964 12.497L12.706 13.239C12.852 13.385 13.044 13.459 13.236 13.459C13.428 13.459 13.62 13.386 13.766 13.239C14.058 12.947 14.058 12.47 13.766 12.178L13.025 11.436ZM19.834 4.62695L16.561 7.89995L18.364 9.70295C18.657 9.99595 18.657 10.471 18.364 10.764C18.218 10.91 18.026 10.984 17.834 10.984C17.642 10.984 17.45 10.911 17.304 10.764L15.5 8.95995L14.085 10.375L14.827 11.117C15.704 11.994 15.704 13.422 14.827 14.299C14.389 14.737 13.812 14.957 13.236 14.957C12.66 14.957 12.084 14.737 11.645 14.299L10.903 13.557L10.549 13.911L12.352 15.714C12.645 16.007 12.645 16.482 12.352 16.775C12.206 16.921 12.014 16.995 11.822 16.995C11.63 16.995 11.438 16.922 11.292 16.775L10.055 15.538L8.994 16.6L10.231 17.837C10.524 18.13 10.524 18.605 10.231 18.898C10.085 19.044 9.893 19.118 9.701 19.118C9.509 19.118 9.317 19.045 9.171 18.898L7.368 17.095L4.625 19.838C4.673 19.916 4.714 19.999 4.746 20.086L5.506 22.11C5.788 22.864 6.377 23.472 7.121 23.781C7.476 23.928 7.856 24.002 8.236 24.002C8.649 24.002 9.062 23.915 9.444 23.741L11.413 22.846C11.6 22.761 11.8 22.719 12 22.719C12.2 22.719 12.4 22.761 12.585 22.846L14.554 23.741C14.935 23.915 15.349 24.002 15.762 24.002C16.142 24.002 16.522 23.928 16.878 23.781C17.622 23.472 18.211 22.864 18.493 22.11L19.253 20.086C19.397 19.702 19.698 19.4 20.082 19.257L22.106 18.497C22.86 18.215 23.468 17.626 23.777 16.882C24.085 16.139 24.07 15.292 23.737 14.559L22.842 12.59C22.673 12.218 22.673 11.79 22.842 11.418L23.737 9.44895C24.07 8.71595 24.085 7.86895 23.777 7.12595C23.468 6.38195 22.86 5.79295 22.106 5.51095L20.082 4.75095C19.995 4.71495 19.912 4.67495 19.834 4.62695Z"
                                            fill="#D43A2F"/>
                                        <path
                                            d="M14.0863 10.373L13.0253 11.434L13.7673 12.176C14.0593 12.468 14.0593 12.944 13.7673 13.237C13.6203 13.383 13.4293 13.457 13.2373 13.457C13.0453 13.457 12.8533 13.384 12.7073 13.237L11.9653 12.495L10.9043 13.556L11.6463 14.298C12.0843 14.736 12.6613 14.956 13.2373 14.956C13.8133 14.956 14.3893 14.736 14.8283 14.298C15.7053 13.421 15.7053 11.993 14.8283 11.116L14.0863 10.373Z"
                                            fill="#DADADA"/>
                                        <path
                                            d="M10.5511 13.9082L7.36914 17.0902L9.17214 18.8932C9.31814 19.0392 9.51014 19.1132 9.70214 19.1132C9.89414 19.1132 10.0861 19.0402 10.2321 18.8932C10.5251 18.6002 10.5251 18.1252 10.2321 17.8322L8.99514 16.5952L10.0561 15.5332L11.2931 16.7702C11.4391 16.9162 11.6311 16.9902 11.8231 16.9902C12.0151 16.9902 12.2071 16.9172 12.3531 16.7702C12.6461 16.4772 12.6461 16.0022 12.3531 15.7092L10.5511 13.9082Z"
                                            fill="#DADADA"/>
                                        <path
                                            d="M16.561 7.89844L15.5 8.95844L17.303 10.7614C17.449 10.9074 17.641 10.9814 17.833 10.9814C18.025 10.9814 18.217 10.9084 18.363 10.7614C18.656 10.4684 18.656 9.99344 18.363 9.70044L16.561 7.89844Z"
                                            fill="#DADADA"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_5435_17445">
                                            <rect width="24" height="24" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="tab-content mt-4" id="myTabContent">
                    <div class="tab-pane fade show active" id="popularProduct" role="tabpanel"
                         aria-labelledby="popularProduct-tab">
                        <div class="row">
                            @if($products == '')
                                <h1 class="d-flex align-items-center justify-content-center mt-4">{{ __('home.null') }}</h1>
                            @else
                                @foreach($products as $product)
                                    @php
                                        $isFavourite = null;
                                        if (Auth::check()){
                                            $isFavourite = \App\Models\WishList::where('user_id', Auth::user()->id)
                                                                ->where('product_id', $product->id)
                                                                ->where('type_product', \App\Enums\TypeProductCart::MEDICINE)
                                                                ->first();
                                        }

                                        $class = !$isFavourite ? 'bi-heart' : 'bi-heart-fill text-danger';
                                    @endphp
                                    <div class="col-md-3 col-6">
                                        <div class="">
                                            <div class="product-item">
                                                <div
                                                    class="img-pro justify-content-center d-flex img_product--homeNew">
                                                    <img src="{{$product->thumbnail}}" alt="">
                                                    <a class="button-heart button-product-heart"
                                                       data-product="{{$product->id}}"
                                                       data-isFavourite="{{ $isFavourite ? 1 : 0 }}">
                                                        <i class="bi {{ $class }}"></i>
                                                    </a>
                                                </div>
                                                <div class="content-pro p-md-3 p-2">
                                                    <div class="">
                                                        <div class="name-product" style="height: auto">
                                                            <a class="name-product--fleaMarket"
                                                               href="{{ route('examination.doctor_info', $product->id) }}">{{$product->name}}</a>
                                                        </div>
                                                        <div class="location-pro">
                                                            @php
                                                                $addressP = \App\Models\Province::where('id', $product->province_id)->value('name');
                                                            @endphp
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                                 height="21" viewBox="0 0 21 21" fill="none">
                                                                <g clip-path="url(#clip0_5506_14919)">
                                                                    <path
                                                                        d="M4.66602 12.8382C3.12321 13.5188 2.16602 14.4673 2.16602 15.5163C2.16602 17.5873 5.89698 19.2663 10.4993 19.2663C15.1017 19.2663 18.8327 17.5873 18.8327 15.5163C18.8327 14.4673 17.8755 13.5188 16.3327 12.8382M15.4993 7.59961C15.4993 10.986 11.7493 12.5996 10.4993 15.0996C9.24935 12.5996 5.49935 10.986 5.49935 7.59961C5.49935 4.83819 7.73793 2.59961 10.4993 2.59961C13.2608 2.59961 15.4993 4.83819 15.4993 7.59961ZM11.3327 7.59961C11.3327 8.05985 10.9596 8.43294 10.4993 8.43294C10.0391 8.43294 9.66602 8.05985 9.66602 7.59961C9.66602 7.13937 10.0391 6.76628 10.4993 6.76628C10.9596 6.76628 11.3327 7.13937 11.3327 7.59961Z"
                                                                        stroke="white" stroke-width="2"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_5506_14919">
                                                                        <rect width="20" height="20" fill="white"
                                                                              transform="translate(0.5 0.933594)"/>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg> &nbsp; {{$addressP}}
                                                        </div>
                                                        <div class="prices-pro">
                                                            {{number_format($product->price, 0, ',', '.') }} {{$product->price_unit ?? 'VND'}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <div class="SeeDetail">
                                                        <a href="{{ route('flea.market.product.detail', $product->id) }}"
                                                           target="_blank">{{ __('home.See details') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="pagination mt-4 d-flex align-items-center justify-content-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="recommended" role="tabpanel" aria-labelledby="recommended-tab">
                        <div class="row">
                            @if($products == '')
                                <h1 class="d-flex align-items-center justify-content-center mt-4">{{ __('home.null') }}</h1>
                            @else
                                @foreach($products as $product)
                                    @php
                                        $isFavourite = null;
                                        if (Auth::check()){
                                            $isFavourite = \App\Models\WishList::where('user_id', Auth::user()->id)
                                                                ->where('product_id', $product->id)
                                                                ->where('type_product', \App\Enums\TypeProductCart::MEDICINE)
                                                                ->first();
                                        }

                                        $class = !$isFavourite ? 'bi-heart' : 'bi-heart-fill text-danger';
                                    @endphp
                                    <div class="col-md-3 col-6">
                                        <div class="">
                                            <div class="product-item">
                                                <div
                                                    class="img-pro justify-content-center d-flex img_product--homeNew">
                                                    <img src="{{$product->thumbnail}}" alt="">
                                                    <a class="button-heart button-product-heart"
                                                       data-product="{{$product->id}}"
                                                       data-isFavourite="{{ $isFavourite ? 1 : 0 }}">
                                                        <i class="bi {{ $class }}"></i>
                                                    </a>
                                                </div>
                                                <div class="content-pro p-md-3 p-2">
                                                    <div class="">
                                                        <div class="name-product" style="height: auto">
                                                            <a class="name-product--fleaMarket"
                                                               href="{{ route('examination.doctor_info', $product->id) }}">{{$product->name}}</a>
                                                        </div>
                                                        <div class="location-pro">
                                                            @php
                                                                $addressP = \App\Models\Province::where('id', $product->province_id)->value('name');
                                                            @endphp
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                                 height="21" viewBox="0 0 21 21" fill="none">
                                                                <g clip-path="url(#clip0_5506_14919)">
                                                                    <path
                                                                        d="M4.66602 12.8382C3.12321 13.5188 2.16602 14.4673 2.16602 15.5163C2.16602 17.5873 5.89698 19.2663 10.4993 19.2663C15.1017 19.2663 18.8327 17.5873 18.8327 15.5163C18.8327 14.4673 17.8755 13.5188 16.3327 12.8382M15.4993 7.59961C15.4993 10.986 11.7493 12.5996 10.4993 15.0996C9.24935 12.5996 5.49935 10.986 5.49935 7.59961C5.49935 4.83819 7.73793 2.59961 10.4993 2.59961C13.2608 2.59961 15.4993 4.83819 15.4993 7.59961ZM11.3327 7.59961C11.3327 8.05985 10.9596 8.43294 10.4993 8.43294C10.0391 8.43294 9.66602 8.05985 9.66602 7.59961C9.66602 7.13937 10.0391 6.76628 10.4993 6.76628C10.9596 6.76628 11.3327 7.13937 11.3327 7.59961Z"
                                                                        stroke="white" stroke-width="2"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_5506_14919">
                                                                        <rect width="20" height="20" fill="white"
                                                                              transform="translate(0.5 0.933594)"/>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg> &nbsp; {{$addressP}}
                                                        </div>
                                                        <div class="prices-pro">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                                 height="21" viewBox="0 0 21 21" fill="none">
                                                                <g clip-path="url(#clip0_5506_14923)">
                                                                    <path
                                                                        d="M10.4993 5.93294V10.9329L13.8327 12.5996M18.8327 10.9329C18.8327 15.5353 15.1017 19.2663 10.4993 19.2663C5.89698 19.2663 2.16602 15.5353 2.16602 10.9329C2.16602 6.33057 5.89698 2.59961 10.4993 2.59961C15.1017 2.59961 18.8327 6.33057 18.8327 10.9329Z"
                                                                        stroke="white" stroke-width="2"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_5506_14923">
                                                                        <rect width="20" height="20" fill="white"
                                                                              transform="translate(0.5 0.933594)"/>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                            &nbsp;{{number_format($product->price, 0, ',', '.') }} {{$product->price_unit ?? 'VND'}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <div class="SeeDetail">
                                                        <a href="{{ route('flea.market.product.detail', $product->id) }}"
                                                           target="_blank">{{ __('home.See details') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="pagination mt-4 d-flex align-items-center justify-content-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="newProducts" role="tabpanel" aria-labelledby="newProducts-tab">
                        <div class="row">
                            @if($products == '')
                                <h1 class="d-flex align-items-center justify-content-center mt-4">{{ __('home.null') }}</h1>
                            @else
                                @foreach($products as $product)
                                    @php
                                        $isFavourite = null;
                                        if (Auth::check()){
                                            $isFavourite = \App\Models\WishList::where('user_id', Auth::user()->id)
                                                                ->where('product_id', $product->id)
                                                                ->where('type_product', \App\Enums\TypeProductCart::MEDICINE)
                                                                ->first();
                                        }

                                        $class = !$isFavourite ? 'bi-heart' : 'bi-heart-fill text-danger';
                                    @endphp
                                    <div class="col-md-3 col-6">
                                        <div class="">
                                            <div class="product-item">
                                                <div
                                                    class="img-pro justify-content-center d-flex img_product--homeNew">
                                                    <img src="{{$product->thumbnail}}" alt="">
                                                    <a class="button-heart button-product-heart"
                                                       data-product="{{$product->id}}"
                                                       data-isFavourite="{{ $isFavourite ? 1 : 0 }}">
                                                        <i class="bi {{ $class }}"></i>
                                                    </a>
                                                </div>
                                                <div class="content-pro p-md-3 p-2">
                                                    <div class="">
                                                        <div class="name-product" style="height: auto">
                                                            <a class="name-product--fleaMarket"
                                                               href="{{ route('examination.doctor_info', $product->id) }}">{{$product->name}}</a>
                                                        </div>
                                                        <div class="location-pro">
                                                            @php
                                                                $addressP = \App\Models\Province::where('id', $product->province_id)->value('name');
                                                            @endphp
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                                 height="21" viewBox="0 0 21 21" fill="none">
                                                                <g clip-path="url(#clip0_5506_14919)">
                                                                    <path
                                                                        d="M4.66602 12.8382C3.12321 13.5188 2.16602 14.4673 2.16602 15.5163C2.16602 17.5873 5.89698 19.2663 10.4993 19.2663C15.1017 19.2663 18.8327 17.5873 18.8327 15.5163C18.8327 14.4673 17.8755 13.5188 16.3327 12.8382M15.4993 7.59961C15.4993 10.986 11.7493 12.5996 10.4993 15.0996C9.24935 12.5996 5.49935 10.986 5.49935 7.59961C5.49935 4.83819 7.73793 2.59961 10.4993 2.59961C13.2608 2.59961 15.4993 4.83819 15.4993 7.59961ZM11.3327 7.59961C11.3327 8.05985 10.9596 8.43294 10.4993 8.43294C10.0391 8.43294 9.66602 8.05985 9.66602 7.59961C9.66602 7.13937 10.0391 6.76628 10.4993 6.76628C10.9596 6.76628 11.3327 7.13937 11.3327 7.59961Z"
                                                                        stroke="white" stroke-width="2"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_5506_14919">
                                                                        <rect width="20" height="20" fill="white"
                                                                              transform="translate(0.5 0.933594)"/>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg> &nbsp; {{$addressP}}
                                                        </div>
                                                        <div class="prices-pro">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                                 height="21" viewBox="0 0 21 21" fill="none">
                                                                <g clip-path="url(#clip0_5506_14923)">
                                                                    <path
                                                                        d="M10.4993 5.93294V10.9329L13.8327 12.5996M18.8327 10.9329C18.8327 15.5353 15.1017 19.2663 10.4993 19.2663C5.89698 19.2663 2.16602 15.5353 2.16602 10.9329C2.16602 6.33057 5.89698 2.59961 10.4993 2.59961C15.1017 2.59961 18.8327 6.33057 18.8327 10.9329Z"
                                                                        stroke="white" stroke-width="2"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_5506_14923">
                                                                        <rect width="20" height="20" fill="white"
                                                                              transform="translate(0.5 0.933594)"/>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                            &nbsp;{{number_format($product->price, 0, ',', '.') }} {{$product->price_unit ?? 'VND'}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <div class="SeeDetail">
                                                        <a href="{{ route('flea.market.product.detail', $product->id) }}"
                                                           target="_blank">{{ __('home.See details') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="pagination mt-4 d-flex align-items-center justify-content-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="hotDeal" role="tabpanel" aria-labelledby="hotDeal-tab">
                        <div class="row">
                            @if($products == '')
                                <h1 class="d-flex align-items-center justify-content-center mt-4">{{ __('home.null') }}</h1>
                            @else
                                @foreach($products as $product)
                                    @php
                                        $isFavourite = null;
                                        if (Auth::check()){
                                            $isFavourite = \App\Models\WishList::where('user_id', Auth::user()->id)
                                                                ->where('product_id', $product->id)
                                                                ->where('type_product', \App\Enums\TypeProductCart::MEDICINE)
                                                                ->first();
                                        }

                                        $class = !$isFavourite ? 'bi-heart' : 'bi-heart-fill text-danger';
                                    @endphp
                                    <div class="col-md-3 col-6">
                                        <div class="">
                                            <div class="product-item">
                                                <div
                                                    class="img-pro justify-content-center d-flex img_product--homeNew">
                                                    <img src="{{$product->thumbnail}}" alt="">
                                                    <a class="button-heart button-product-heart"
                                                       data-product="{{$product->id}}"
                                                       data-isFavourite="{{ $isFavourite ? 1 : 0 }}">
                                                        <i class="bi {{ $class }}"></i>
                                                    </a>
                                                </div>
                                                <div class="content-pro p-md-3 p-2">
                                                    <div class="">
                                                        <div class="name-product" style="height: auto">
                                                            <a class="name-product--fleaMarket"
                                                               href="{{ route('examination.doctor_info', $product->id) }}">{{$product->name}}</a>
                                                        </div>
                                                        <div class="location-pro">
                                                            @php
                                                                $addressP = \App\Models\Province::where('id', $product->province_id)->value('name');
                                                            @endphp
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                                 height="21" viewBox="0 0 21 21" fill="none">
                                                                <g clip-path="url(#clip0_5506_14919)">
                                                                    <path
                                                                        d="M4.66602 12.8382C3.12321 13.5188 2.16602 14.4673 2.16602 15.5163C2.16602 17.5873 5.89698 19.2663 10.4993 19.2663C15.1017 19.2663 18.8327 17.5873 18.8327 15.5163C18.8327 14.4673 17.8755 13.5188 16.3327 12.8382M15.4993 7.59961C15.4993 10.986 11.7493 12.5996 10.4993 15.0996C9.24935 12.5996 5.49935 10.986 5.49935 7.59961C5.49935 4.83819 7.73793 2.59961 10.4993 2.59961C13.2608 2.59961 15.4993 4.83819 15.4993 7.59961ZM11.3327 7.59961C11.3327 8.05985 10.9596 8.43294 10.4993 8.43294C10.0391 8.43294 9.66602 8.05985 9.66602 7.59961C9.66602 7.13937 10.0391 6.76628 10.4993 6.76628C10.9596 6.76628 11.3327 7.13937 11.3327 7.59961Z"
                                                                        stroke="white" stroke-width="2"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_5506_14919">
                                                                        <rect width="20" height="20" fill="white"
                                                                              transform="translate(0.5 0.933594)"/>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg> &nbsp; {{$addressP}}
                                                        </div>
                                                        <div class="prices-pro">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                                 height="21" viewBox="0 0 21 21" fill="none">
                                                                <g clip-path="url(#clip0_5506_14923)">
                                                                    <path
                                                                        d="M10.4993 5.93294V10.9329L13.8327 12.5996M18.8327 10.9329C18.8327 15.5353 15.1017 19.2663 10.4993 19.2663C5.89698 19.2663 2.16602 15.5353 2.16602 10.9329C2.16602 6.33057 5.89698 2.59961 10.4993 2.59961C15.1017 2.59961 18.8327 6.33057 18.8327 10.9329Z"
                                                                        stroke="white" stroke-width="2"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_5506_14923">
                                                                        <rect width="20" height="20" fill="white"
                                                                              transform="translate(0.5 0.933594)"/>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                            &nbsp; {{number_format($product->price, 0, ',', '.') }} {{$product->price_unit ?? 'VND'}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <div class="SeeDetail">
                                                        <a href="{{ route('flea.market.product.detail', $product->id) }}"
                                                           target="_blank">{{ __('home.See details') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="pagination mt-4 d-flex align-items-center justify-content-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $addresses = \App\Models\Clinic::all();
        $coordinatesArray = $addresses->toArray();
    @endphp

    <script>

        $('.carousel').slick({
            dots: true,
            slidesPerRow: 2,
            rows: 2,
            responsive: [
                {
                    breakpoint: 480,
                    settings: {
                        slidesPerRow: 2,
                        rows: 2,
                    }
                }
            ]
        });

        let currentSlide = 0;
        const slides = document.querySelectorAll(".slide")
        const dots = document.querySelectorAll('.dot')

        const init = (n) => {
            slides.forEach((slide, index) => {
                slide.style.display = "none"
                dots.forEach((dot, index) => {
                    dot.classList.remove("active")
                })
            })
            slides[n].style.display = "block"
            dots[n].classList.add("active")
        }
        document.addEventListener("DOMContentLoaded", init(currentSlide))
        const next = () => {
            currentSlide >= slides.length - 1 ? currentSlide = 0 : currentSlide++
            init(currentSlide)
        }

        const prev = () => {
            currentSlide <= 0 ? currentSlide = slides.length - 1 : currentSlide--
            init(currentSlide)
        }

        document.querySelector(".next").addEventListener('click', next)

        document.querySelector(".prev").addEventListener('click', prev)


        setInterval(() => {
            next()
        }, 5000);

        dots.forEach((dot, i) => {
            dot.addEventListener("click", () => {
                console.log(currentSlide)
                init(i)
                currentSlide = i
            })
        })

    </script>
    <script>
        let accessToken = `Bearer ` + token;
        let headers = {
            "Authorization": accessToken
        };

        $(document).ready(function () {
            $('.button-doctor-heart').click(function () {
                let element = $(this);
                let doctorID = element.data('doctor')
                doctorWishList(doctorID, element);
            })

            $('.button-product-heart').click(function () {
                let element = $(this);
                let productID = element.data('product')
                productWishList(productID, `{{ \App\Enums\TypeProductCart::MEDICINE }}`, element)
            })

            $('.button-flea-market-heart').click(function () {
                let element = $(this);
                let productID = element.data('product')
                productWishList(productID, `{{ \App\Enums\TypeProductCart::FLEA_MARKET }}`, element)
            })
        })

        async function productWishList(productID, type, element) {
            loadingMasterPage();

            if (!type) {
                type = `{{ \App\Enums\TypeProductCart::MEDICINE }}`;
            }

            let productWishListUrl = `{{ route('api.backend.wish.lists.medical.update')  }}`;

            let data = {
                'user_id': `{{ Auth::check() ? Auth::user()->id : '' }}`,
                'product_id': productID,
                'product_type': type,
                '_token': `{{ csrf_token() }}`
            };

            let heart = `bi-heart-fill text-danger`;
            let unHeart = `bi-heart`;

            await $.ajax({
                url: productWishListUrl,
                method: 'POST',
                headers: headers,
                data: data,
                success: function (response) {
                    loadingMasterPage();
                    isFavourite = response.isFavourite
                    if (isFavourite === true) {
                        element.find('i').removeClass(unHeart)
                        element.find('i').addClass(heart)
                    } else {
                        element.find('i').removeClass(heart)
                        element.find('i').addClass(unHeart)
                    }
                    alert(response.message);
                },
                error: function (error) {
                    loadingMasterPage();
                    alert('Create error!');
                }
            });
        }

        async function doctorWishList(doctorID, element) {
            loadingMasterPage();

            let doctorWishListUrl = `{{ route('api.backend.medical.favourites.update.wishlist')  }}`;

            let data = {
                'user_id': `{{ Auth::check() ? Auth::user()->id : '' }}`,
                'medical_id': doctorID
            };

            let heart = `bi-heart-fill text-danger`;
            let unHeart = `bi-heart`;

            await $.ajax({
                url: doctorWishListUrl,
                method: 'POST',
                headers: headers,
                data: data,
                success: function (response) {
                    isFavourite = response.isFavourite
                    if (isFavourite === true) {
                        element.find('i').removeClass(unHeart)
                        element.find('i').addClass(heart)
                    } else {
                        element.find('i').removeClass(heart)
                        element.find('i').addClass(unHeart)
                    }
                    loadingMasterPage();
                    alert(response.message);
                },
                error: function (error) {
                    loadingMasterPage();
                    alert('Create error!');
                }
            });
        }
    </script>
    <script>
        function viewCoupon(id) {
            window.location.href = "/coupon/" + id;
        }
    </script>
    <script>
        var locations = {!! json_encode($coordinatesArray) !!};
        var infoWindows = [];

        function getCurrentLocation(callback) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var currentLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    callback(currentLocation);
                });
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        }

        function calculateDistance(lat1, lng1, lat2, lng2) {
            var R = 6371; // Độ dài trung bình của trái đất trong km
            var dLat = toRadians(lat2 - lat1);
            var dLng = toRadians(lng2 - lng1);

            var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(toRadians(lat1)) * Math.cos(toRadians(lat2)) *
                Math.sin(dLng / 2) * Math.sin(dLng / 2);

            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

            var distance = R * c;
            return distance;
        }

        function toRadians(degrees) {
            return degrees * (Math.PI / 180);
        }

        function formatTime(dateTimeString) {
            const date = new Date(dateTimeString);
            const hours = date.getHours().toString().padStart(2, '0');
            const minutes = date.getMinutes().toString().padStart(2, '0');
            return `${hours}:${minutes}`;
        }

        function initMap(currentLocation, locations) {
            var map = new google.maps.Map(document.getElementById('allAddressesMap'), {
                center: currentLocation,
                zoom: 10
            });

            var currentLocationMarker = new google.maps.Marker({
                position: currentLocation,
                map: map,
                title: 'Your Location'
            });

            locations.forEach(function (location) {
                var distance = calculateDistance(
                    currentLocation.lat, currentLocation.lng,
                    parseFloat(location.latitude), parseFloat(location.longitude)
                );

                // Chọn bán kính tìm kiếm (ví dụ: 5 km)
                var searchRadius = 10;

                if (distance <= searchRadius) {
                    var marker = new google.maps.Marker({
                        position: {lat: parseFloat(location.latitude), lng: parseFloat(location.longitude)},
                        map: map,
                        title: 'Location'
                    });
                    var urlDetail = "{{ route('clinic.detail', ['id' => ':id']) }}".replace(':id', location.id);
                    let img = '';
                    let gallery = location.gallery;
                    let arrayGallery = gallery.split(',');


                    var infoWindowContent = `<div class="p-0 m-0 tab-pane fade show active background-modal b-radius" id="modalBooking">
                <div>

                    <img class="b-radius" src="${arrayGallery[0]}" alt="img">
                </div>
                <div class="p-md-3 p-2">
                    <div class="form-group">
                        <div class="d-flex justify-content-between mt-md-2">
                            <div class="fs-18px">${location.name}</div>
                            <div class="button-follow fs-12p ">
                                <a class="text-follow-12" href="">{{ __('home.FOLLOW') }}</a>
                            </div>
                        </div>
                        <div class="d-flex mt-md-2">
                            <div class="d-flex col-md-6 justify-content-center align-items-center">
                                <a class="row p-2" href="">
                                    <div class="justify-content-center d-flex">
                                        <i class="border-button-address fa-solid fa-bullseye"></i>
                                    </div>
                                    <div class="d-flex justify-content-center">{{ __('home.Start') }}</div>
                                </a>
                            </div>
                            <div class="d-flex col-md-6 justify-content-center align-items-center">
                                <a class="row p-2" href="">
                                    <div class="justify-content-center d-flex">
                                        <i class="border-button-address fa-regular fa-circle-right"></i>
                                    </div>
                                    <div class="d-flex justify-content-center">{{ __('home.Direction') }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-md-3 mb-md-3">
                    <a class="w-100 btn btn-secondary border-button-address font-weight-800 fs-14 justify-content-center" href="${urlDetail}" >
                    {{ __('home.Booking') }}
                    </a>
                    </div>
                    <div class="border-top">
                        <div class="mt-md-2"><i class="text-gray mr-md-2 fa-solid fa-location-dot"></i>
                            <span class="fs-14 font-weight-600">${location.address_detail}</span>
                        </div>
                        <div class="mt-md-2">
                            <i class="text-gray mr-md-2 fa-regular fa-clock"></i>
                            <span class="fs-14 font-weight-600">
                                Open: ${formatTime(location.open_date)} - ${formatTime(location.close_date)}
                            </span>
                        </div>
                        <div class="mt-md-2">
                            <i class="text-gray mr-md-2 fa-solid fa-globe"></i>
                            <span class="fs-14 font-weight-600"> ${location.email}</span>
                        </div>
                        <div class="mt-md-2">
                            <i class="text-gray mr-md-2 fa-solid fa-phone-volume"></i> <span
                                class="fs-14 font-weight-600"> ${location.phone}</span>
                        </div>
                        <div class="mt-md-2 mb-md-2">
                            <i class="text-gray mr-md-2 fa-solid fa-bookmark"></i> <span
                                class="fs-14 font-weight-600"> ${location.type}</span>
                        </div>
                        @for($i=0; $i<3; $i++)
                    <div class="border-top mb-md-2">
                        <div
                            class="d-flex justify-content-between rv-header align-items-center mt-md-2">
                            <div class="d-flex rv-header--left">
                                <div class="avt-24 mr-md-2">
                                    <img src="{{asset('img/detail_doctor/ellipse _14.png')}}">
                                        </div>
                                        <p class="fs-16px">Trần Đình Phi</p>
                                    </div>
                                    <div class="rv-header--right">
                                        <p class="fs-14 font-weight-400">10:20 07/04/2023</p>
                                    </div>
                                </div>
                                <div class="content">
                                    <p>
                                        {{ __('home.Lần đầu tiên sử dụng dịch vụ qua app nhưng chất lượng và dịch vụ tại salon quá tốt. Book giờ nào thì cứ đúng giờ đến k sợ phải chờ đợi như mọi chỗ khác. Hy vọng thi thoảng app có nhiều ưu đãi để giới thiệu cho bạn bè cùng sử dụng') }}
                    </p>
                </div>
            </div>
@endfor
                    <div class="border-top">
                        <div
                            class="d-flex justify-content-between rv-header align-items-center mt-md-2">
                            <div class="d-flex rv-header--left">
                                <div class="avt-24 mr-md-2">
                                    <img src="{{asset('img/detail_doctor/ellipse _14.png')}}">
                                    </div>
                                    <p class="fs-16px">Trần Đình Phi</p>
                                </div>
                                <div class="rv-header--right">
                                    <p class="fs-14 font-weight-400">10:20 07/04/2023</p>
                                </div>
                            </div>
                            <div class="content">
                                <p>
                                    {{ __('home.Lần đầu tiên sử dụng dịch vụ qua app nhưng chất lượng và dịch vụ tại salon quá tốt. Book giờ nào thì cứ đúng giờ đến k sợ phải chờ đợi như mọi chỗ khác. Hy vọng thi thoảng app có nhiều ưu đãi để giới thiệu cho bạn bè cùng sử dụng') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>`;

                    var infoWindow = new google.maps.InfoWindow({
                        content: infoWindowContent
                    });

                    marker.addListener('click', function () {
                        closeAllInfoWindows();
                        infoWindow.open(map, marker);
                    });

                    infoWindows.push(infoWindow);
                }
            });
        }

        function closeAllInfoWindows() {
            infoWindows.forEach(function (infoWindow) {
                infoWindow.close();
            });
        }

        getCurrentLocation(function (currentLocation) {
            initMap(currentLocation, locations);
        });
    </script>
    <script>
        const prevFlea = document.getElementById("prevFlea");
        const nextFlea = document.getElementById("nextFlea");

        let carouselVp = document.getElementById("carousel-vp");

        let cCarouselInner = document.getElementById("cCarousel-inner");
        let carouselInnerWidth = cCarouselInner.getBoundingClientRect().width;

        let leftValue = 0;

        // Variable used to set the carousel movement value (card's width + gap)
        const totalMovementSize =
            parseFloat(
                document.querySelector(".cCarousel-item").getBoundingClientRect().width,
                10
            ) +
            parseFloat(
                window.getComputedStyle(cCarouselInner).getPropertyValue("gap"),
                10
            );

        prevFlea.addEventListener("click", () => {
            if (leftValue !== 0) {
                leftValue -= -totalMovementSize;
                cCarouselInner.style.left = leftValue + "px";
            }
        });

        nextFlea.addEventListener("click", () => {
            const carouselVpWidth = carouselVp.getBoundingClientRect().width;
            if (carouselInnerWidth - Math.abs(leftValue) > carouselVpWidth) {
                leftValue -= totalMovementSize;
                cCarouselInner.style.left = leftValue + "px";
            }
        });

        const mediaQuery510 = window.matchMedia("(max-width: 510px)");
        const mediaQuery770 = window.matchMedia("(max-width: 770px)");

        mediaQuery510.addEventListener("change", mediaManagement);
        mediaQuery770.addEventListener("change", mediaManagement);

        let oldViewportWidth = window.innerWidth;

        function mediaManagement() {
            const newViewportWidth = window.innerWidth;

            if (leftValue <= -totalMovementSize && oldViewportWidth < newViewportWidth) {
                leftValue += totalMovementSize;
                cCarouselInner.style.left = leftValue + "px";
                oldViewportWidth = newViewportWidth;
            } else if (
                leftValue <= -totalMovementSize &&
                oldViewportWidth > newViewportWidth
            ) {
                leftValue -= totalMovementSize;
                cCarouselInner.style.left = leftValue + "px";
                oldViewportWidth = newViewportWidth;
            }
        }

    </script>
@endsection
