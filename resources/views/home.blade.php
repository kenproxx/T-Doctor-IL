@php use App\Models\Province;

@endphp
@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-home.css') }}" rel="stylesheet">
    @include('layouts.partials.header')
    <div class="container pb-5" style="margin-top: 168px;">
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
    <div class="container">
        <div class="titleServiceHomeNew">Dịch vụ toàn diện</div>
        <div class="mainServiceHomeNew row">
            <div class="col-md-6">
                <a href="">
                    <div class="border-HomeNew">
                        <div class="w-75">
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
                            <span>Khám chuyên khoa</span></div>
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
                <a href="">
                    <div class="border-HomeNew">
                        <div class="w-75">
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
                            <span>Khám từ xa</span></div>
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
                <a href="">
                    <div class="border-HomeNew">
                        <div class="w-75">
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
                            <span>Tư vẫn sức khoẻ</span></div>
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
                <a href="">
                    <div class="border-HomeNew">
                        <div class="w-75">
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
                            <span>Y tế gần bạn</span>
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
    {{--    <div class="bg-homeNew">--}}
    {{--        <div class="container pt-3">--}}
    {{--            <div class="align-center">--}}
    {{--                <div class="title-whatFree--homeNew">--}}
    {{--                    <span class="py-3 text-center">{{ __('home.WHAT’S FREE') }}?</span>--}}
    {{--                </div>--}}
    {{--                <div class="d-flex nav-header--homeNew justify-content-center mt-3">--}}
    {{--                    <ul class="nav nav-pills nav-fill d-flex justify-content-between">--}}
    {{--                        <li class="nav-item">--}}
    {{--                            <a class="nav-link active font-14-mobi" id="home-tab" data-toggle="tab" href="#home"--}}
    {{--                               role="tab" aria-controls="home" aria-selected="true">{{ __('home.Free today') }}</a>--}}
    {{--                        </li>--}}
    {{--                        <li class="nav-item">--}}
    {{--                            <a class="nav-link font-14-mobi" id="profile-tab" data-toggle="tab" href="#profile"--}}
    {{--                               role="tab" aria-controls="profile"--}}
    {{--                               aria-selected="false">{{ __('home.Free with mission') }}</a>--}}
    {{--                        </li>--}}
    {{--                        <li class="nav-item">--}}
    {{--                            <a class="nav-link font-14-mobi" id="contact-tab" data-toggle="tab" href="#contact"--}}
    {{--                               role="tab" aria-controls="home"--}}
    {{--                               aria-selected="true">{{ __('home.Discounted service') }}</a>--}}
    {{--                        </li>--}}
    {{--                    </ul>--}}
    {{--                </div>--}}

    {{--                <div class="tab-content" id="myTabContent">--}}
    {{--                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">--}}
    {{--                        <div class="row">--}}
    {{--                            @if($coupons == '')--}}
    {{--                                <h1 class="d-flex align-items-center justify-content-center mt-4">{{ __('home.Hết Voucher') }}</h1>--}}
    {{--                            @else--}}
    {{--                                @foreach($coupons as $coupon)--}}
    {{--                                    <a href="{{ route('what.free.detail', $coupon->id) }}" class="col-md-4"--}}
    {{--                                       target="_blank">--}}
    {{--                                        <div class="card-homeNew mt-4">--}}
    {{--                                            <div class="content__item w-100">--}}
    {{--                                                <img--}}
    {{--                                                    class="content__item__img"--}}
    {{--                                                    src="{{asset($coupon->thumbnail ?? 'img/icons_logo/image 1.jpeg')}}"--}}
    {{--                                                    alt="">--}}
    {{--                                                <div class="w-100 overflow-hidden">--}}
    {{--                                                    <div class="content__item__title">--}}
    {{--                                                        {!! $coupon->title !!}--}}
    {{--                                                    </div>--}}
    {{--                                                    <div class="content__item__describe">--}}
    {{--                                                        {!! $coupon->short_description !!}--}}
    {{--                                                    </div>--}}
    {{--                                                    <div>--}}
    {{--                                                        <p class="content__item-link">{{ __('home.Learn more') }}</p>--}}
    {{--                                                    </div>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </a>--}}
    {{--                                @endforeach--}}
    {{--                            @endif--}}
    {{--                        </div>--}}
    {{--                        <div class="pagination mt-4 d-flex align-items-center justify-content-center">--}}
    {{--                            {{ $coupons->links() }}--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">--}}
    {{--                        <div class="section1-content">--}}
    {{--                            <div class="px-5 py-2">--}}
    {{--                                <div class="content__item d-flex gap-3">--}}
    {{--                                    <img--}}
    {{--                                        class="content__item__image"--}}
    {{--                                        src="{{asset('img/icons_logo/image 1.jpeg')}}"--}}
    {{--                                        alt=""--}}
    {{--                                    />--}}
    {{--                                    <div>--}}
    {{--                                        <h6>--}}
    {{--                                            {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}--}}
    {{--                                        </h6>--}}
    {{--                                        <div class="content__item__describe">--}}
    {{--                                            {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}--}}
    {{--                                        </div>--}}
    {{--                                        <p class="content__item-link">{{ __('home.Read') }}</p>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">--}}
    {{--                        <div class="section1-content mt-5">--}}
    {{--                            <div class="px-5 py-2">--}}
    {{--                                <div class="content__item d-flex gap-3">--}}
    {{--                                    <img--}}
    {{--                                        class="content__item__image"--}}
    {{--                                        src="{{asset('img/icons_logo/image 1.jpeg')}}"--}}
    {{--                                        alt=""--}}
    {{--                                    />--}}
    {{--                                    <div>--}}
    {{--                                        <h6>--}}
    {{--                                            {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}--}}
    {{--                                        </h6>--}}
    {{--                                        <p>--}}
    {{--                                            {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}--}}
    {{--                                        </p>--}}
    {{--                                        <p class="content__item-link">{{ __('home.Read') }}</p>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="background-image_HomeNew--departments">
        <div class="container">
            <div id="map-location" class="pb-5 d-flex justify-content-center">
                <div class="content-item  justify-content-center w-100">
                    <div class="title-clinics">
                        <h2>{{ __('home.Clinics/Pharmacies') }}</h2>
                        <p>{{ __('home.Find your suitable clinics/pharmacies and book now') }}!</p>
                    </div>
                    <div class="d-flex clip-path-container" style="height: 700px;">
                        <div id="allAddressesMap" class="p-2 w-100">

                        </div>
                    </div>
                    <div id="" class="w-100 d-md-flex">
                        <div class="col-md-4 mt-4 d-flex text-map--homeNew">
                            <div class="mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"
                                     fill="none">
                                    <g clip-path="url(#clip0_4225_13428)">
                                        <mask id="mask0_4225_13428" style="mask-type:luminance" maskUnits="userSpaceOnUse"
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
                                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
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
                                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M47.8671 6.7207L45.4375 2.51233" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M57.2793 16.1329L61.4877 18.5625" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M58.2031 12.6875H63.0625" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M44.4219 12.6875H39.5625" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M45.3451 9.24219L41.1367 6.81256" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M54.7578 18.6549L57.1874 22.8633" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M51.3125 19.5781V24.4375" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M57.2793 9.24219L61.4877 6.81256" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M54.7578 6.7207L57.1874 2.51233" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M2.81836 43.4434V48.4434" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M0.943359 45.9434H4.69336" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M18.9922 59.7738V63.0625" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M17.7598 61.418H20.2263" stroke="#088180" stroke-width="3"
                                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4225_13428">
                                            <rect width="64" height="64" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div>
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
                            <div><h3>{{ __('home.HOME CARE SERVICE') }}</h3>
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
                            <div><h3>{{ __('home.MANY LOCATION') }}</h3>
                                <p>{{ __('home.More than 1500 Doctors, 1000 Pharmacists, 1000 Hospitals always wait for you') }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="">
                <div class="titleServiceHomeNew">Chuyên khoa khám</div>
                <div class="mainServiceHomeNew row">
                    @php
                        $departments = \App\Models\Department::where('status', \App\Enums\DepartmentStatus::ACTIVE)->get();
                    @endphp
                    @foreach($departments as $departmentItem)
                        <div class="col-md-4">
                            <a href="">
                                <div class="border-HomeNew">
                                    <div class="w-75 d-flex align-items-center ">
                                        <img src="{{$departmentItem->thumbnail}}" alt="thumbnail">
                                        <span>{{$departmentItem->name}}</span>
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
                    @endforeach
                    {{--            <div class="col-md-4">--}}
                    {{--                <div class="border-HomeNew">--}}
                    {{--                    <div class="w-75 d-flex align-items-center ">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">--}}
                    {{--                            <g clip-path="url(#clip0_5948_21314)">--}}
                    {{--                                <path--}}
                    {{--                                    d="M45.7912 12.2849L45.3907 28.8399C45.3881 30.8809 44.9452 32.8962 44.0915 34.7505L41.9551 39.3864C41.3821 40.629 39.8677 41.4106 39.7517 42.7692C39.7364 42.947 40.0582 43.283 40.3595 43.6075L40.3646 43.6126C40.6221 43.8895 40.8655 44.1586 40.8732 44.3145V44.3223L41.8571 64H18.9911C18.5644 64 18.2185 63.6541 18.2185 63.2274V45.7181C18.2185 45.1947 18.3271 44.6214 18.391 44.0583C18.391 44.0583 19.0597 42.8796 18.9521 42.4499C18.5632 40.8981 17.5011 39.3005 16.516 38.014L12.1166 32C10.9964 30.5362 9.23274 27.9256 9.23274 27.9256C9.09361 27.1986 9.02149 26.4565 9.02149 25.7081V13.4734C9.02024 11.44 9.97699 9.63075 11.4644 8.46925C11.4644 8.46925 12.774 8.21937 13.414 7.99025C13.7489 7.8705 14.2369 7.6555 14.6412 7.47C15.0442 7.28462 15.365 7.12875 15.365 7.12875V3.9005C15.365 2.82263 15.808 1.84787 16.5214 1.14225C17.2346 0.4365 18.2197 0 19.3052 0C21.6064 0.327125 22.9225 2.1505 22.9225 4.30487L23.2251 6.01375C23.2251 4.93725 23.6616 3.96113 24.3674 3.2555C25.073 2.54988 26.0479 2.11325 27.1257 2.11325C29.3097 2.62575 30.6476 4.5715 30.6476 6.72587L31.0249 8.12825C31.0249 7.00025 31.4614 6.02538 32.1671 5.33138C32.8727 4.63863 33.8476 4.22775 34.9241 4.22775C37.2034 4.82787 38.5169 6.77225 38.5169 8.92663L38.8246 10.8556C38.8246 9.77913 39.265 8.803 39.9759 8.09863C40.6867 7.393 41.6654 6.95638 42.7419 6.95638C44.9542 7.65688 45.7912 10.1305 45.7912 12.2849Z"--}}
                    {{--                                    fill="#FFDCD0"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M35.9853 19.4256C36.5187 19.4256 36.951 18.9933 36.951 18.4599C36.951 17.9265 36.5187 17.4941 35.9853 17.4941C35.4519 17.4941 35.0195 17.9265 35.0195 18.4599C35.0195 18.9933 35.4519 19.4256 35.9853 19.4256Z"--}}
                    {{--                                    fill="#FF7E7B"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M33.603 16.7538C34.1363 16.7538 34.5687 16.3214 34.5687 15.788C34.5687 15.2546 34.1363 14.8223 33.603 14.8223C33.0696 14.8223 32.6372 15.2546 32.6372 15.788C32.6372 16.3214 33.0696 16.7538 33.603 16.7538Z"--}}
                    {{--                                    fill="#FF7E7B"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M29.7963 26.0331C30.3297 26.0331 30.7621 25.6007 30.7621 25.0673C30.7621 24.5339 30.3297 24.1016 29.7963 24.1016C29.2629 24.1016 28.8306 24.5339 28.8306 25.0673C28.8306 25.6007 29.2629 26.0331 29.7963 26.0331Z"--}}
                    {{--                                    fill="#FF7E7B"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M29.1762 30.0585C29.7096 30.0585 30.1419 29.6261 30.1419 29.0927C30.1419 28.5593 29.7096 28.127 29.1762 28.127C28.6428 28.127 28.2104 28.5593 28.2104 29.0927C28.2104 29.6261 28.6428 30.0585 29.1762 30.0585Z"--}}
                    {{--                                    fill="#FF7E7B"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M25.706 27.9276C26.2394 27.9276 26.6717 27.4952 26.6717 26.9618C26.6717 26.4285 26.2394 25.9961 25.706 25.9961C25.1726 25.9961 24.7402 26.4285 24.7402 26.9618C24.7402 27.4952 25.1726 27.9276 25.706 27.9276Z"--}}
                    {{--                                    fill="#FF7E7B"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M16.3085 21.9042C16.8419 21.9042 17.2743 21.4718 17.2743 20.9384C17.2743 20.405 16.8419 19.9727 16.3085 19.9727C15.7752 19.9727 15.3428 20.405 15.3428 20.9384C15.3428 21.4718 15.7752 21.9042 16.3085 21.9042Z"--}}
                    {{--                                    fill="#FF7E7B"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M13.6025 18.8592C14.1358 18.8592 14.5682 18.4269 14.5682 17.8935C14.5682 17.3601 14.1358 16.9277 13.6025 16.9277C13.0691 16.9277 12.6367 17.3601 12.6367 17.8935C12.6367 18.4269 13.0691 18.8592 13.6025 18.8592Z"--}}
                    {{--                                    fill="#FF7E7B"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M26.0107 43.6678C26.544 43.6678 26.9764 43.2354 26.9764 42.7021C26.9764 42.1687 26.544 41.7363 26.0107 41.7363C25.4773 41.7363 25.0449 42.1687 25.0449 42.7021C25.0449 43.2354 25.4773 43.6678 26.0107 43.6678Z"--}}
                    {{--                                    fill="#FF7E7B"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M24.3412 47.0487C24.8746 47.0487 25.307 46.6163 25.307 46.0829C25.307 45.5496 24.8746 45.1172 24.3412 45.1172C23.8079 45.1172 23.3755 45.5496 23.3755 46.0829C23.3755 46.6163 23.8079 47.0487 24.3412 47.0487Z"--}}
                    {{--                                    fill="#FF7E7B"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M46.6243 10.8563L46.6182 16.9009L45.2632 27.4835L46.5612 29.9444C46.4288 31.6003 46.0058 33.2224 45.3094 34.7372L43.173 39.373L38.3105 41.5158C38.4612 40.3298 38.7934 39.1708 39.2957 38.0802L41.432 33.4443C42.2845 31.5913 42.7275 29.5747 42.7288 27.5337L42.7417 6.95703C44.8885 6.96741 46.6243 8.70841 46.6243 10.8563Z"--}}
                    {{--                                    fill="#FFC7B6"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M19.3052 0C21.4623 0.0155 23.2251 1.756 23.2251 3.90025V8.285C23.2251 9.36175 22.3522 10.2347 21.2753 10.2347C20.1986 10.2347 19.3256 9.36187 19.3256 8.285L19.3052 0Z"--}}
                    {{--                                    fill="#FFC7B6"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M34.9243 12.0736V4.22656C37.0776 4.22656 38.8237 5.97244 38.8237 8.12706V12.0736C38.8237 13.1503 37.9508 14.0233 36.8739 14.0233C35.7972 14.0232 34.9243 13.1503 34.9243 12.0736Z"--}}
                    {{--                                    fill="#FFC7B6"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M15.3644 7.12891L15.3641 12.1318C15.3641 13.2085 14.4912 14.0815 13.4144 14.0815C12.3376 14.0815 11.4646 13.2087 11.4646 12.1318L11.4644 8.46928C12.5399 7.62916 13.8949 7.12891 15.3644 7.12891Z"--}}
                    {{--                                    fill="#FFC7B6"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M27.1254 9.94016L27.125 2.11328C29.2782 2.11328 31.0247 3.85978 31.0247 6.01303V9.94016C31.0247 11.0169 30.1519 11.8899 29.075 11.8899C27.9983 11.8898 27.1254 11.0169 27.1254 9.94016Z"--}}
                    {{--                                    fill="#FFC7B6"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M20.8878 38.5024C20.5762 38.7742 20.4615 39.199 20.5684 39.597C20.616 39.7748 20.6508 39.9589 20.6727 40.1469C20.8672 41.8519 19.8949 43.4229 18.3908 44.059C18.4462 43.5762 18.468 43.1009 18.3599 42.6709C17.971 41.1192 16.7734 39.8353 15.7883 38.5489L11.4499 32.879C10.3295 31.4149 9.57505 29.7177 9.23242 27.9264C9.71405 26.1932 11.2464 24.8565 13.1754 24.7367C15.3478 24.6028 17.3039 26.1352 17.7275 28.2689C17.7288 28.2792 17.7314 28.2895 17.7327 28.2998C17.8138 28.7222 18.128 29.0569 18.5465 29.1535C20.7164 29.6544 22.438 31.474 22.7047 33.8125C22.9147 35.6475 22.1807 37.3718 20.8878 38.5024Z"--}}
                    {{--                                    fill="#FF7E7B"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M42.7353 17.8009C42.5036 18.0005 42.2872 18.2271 42.0851 18.4731C40.854 19.972 40.7857 22.0504 41.7645 23.6472C41.9525 23.9525 41.9383 24.3375 41.7361 24.6246C41.731 24.6324 41.7271 24.6387 41.722 24.6465C40.7098 26.1106 40.9248 28.1182 42.25 29.3672C42.353 29.4639 42.4598 29.554 42.5693 29.6364C43.4488 30.3026 44.5318 30.5216 45.5307 30.3205V16.7854C44.3808 16.775 43.4755 17.159 42.7353 17.8009Z"--}}
                    {{--                                    fill="#FF7E7B"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M46.618 16.9005L46.6063 28.8261C46.5941 28.9899 46.6356 28.773 46.56 29.9439C45.3353 30.6237 43.7643 30.5414 42.5693 29.6361C42.675 28.942 42.729 28.2402 42.729 27.5332L42.7353 17.8006C43.6948 16.9687 44.9297 16.567 46.618 16.9005Z"--}}
                    {{--                                    fill="#FF6464"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M38.075 33.2387C38.075 34.5969 35.6156 34.6172 35.6156 34.6172C35.6156 34.6172 33.1562 34.5969 33.1562 33.2387C33.1562 31.8804 34.2574 30.7793 35.6156 30.7793C36.9739 30.7793 38.075 31.8804 38.075 33.2387Z"--}}
                    {{--                                    fill="#FF7E7B"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M26.8011 59.1723C26.8011 60.5305 24.3417 60.5508 24.3417 60.5508C24.3417 60.5508 21.8823 60.5305 21.8823 59.1723C21.8823 57.814 22.9834 56.7129 24.3417 56.7129C25.6999 56.7129 26.8011 57.814 26.8011 59.1723Z"--}}
                    {{--                                    fill="#FF7E7B"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M27.0586 19.1665C27.0586 20.9185 23.8862 20.9446 23.8862 20.9446C23.8862 20.9446 20.7139 20.9185 20.7139 19.1665C20.7139 17.4145 22.1342 15.9941 23.8862 15.9941C25.6382 15.9941 27.0586 17.4144 27.0586 19.1665Z"--}}
                    {{--                                    fill="#FF7E7B"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M28.7358 50.8788C28.7358 52.3391 28.9738 53.7438 29.4141 55.0559C31.6647 59.6519 35.9936 63.2976 41.78 63.2976C49.0266 63.2976 54.3001 58.1256 54.3001 50.8789C54.3001 45.0927 50.6371 41.1272 46.0342 38.4358C44.7222 37.9956 43.3172 37.7578 41.8568 37.7578C34.6103 37.7577 28.7358 43.6322 28.7358 50.8788Z"--}}
                    {{--                                    fill="#8DB9FF"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M54.9783 50.8783C54.9783 58.1253 49.1038 63.9997 41.8569 63.9997C36.0702 63.9997 31.1586 60.2543 29.4141 55.0557C30.7266 55.4974 32.1326 55.7357 33.5928 55.7357C40.8397 55.7357 46.7142 49.8612 46.7142 42.6143C46.7142 41.154 46.4759 39.7482 46.0342 38.4355C51.2329 40.1799 54.9783 45.0915 54.9783 50.8783Z"--}}
                    {{--                                    fill="#70ABF2"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M35.0726 48.48H39.1789C39.3328 48.48 39.4576 48.3553 39.4576 48.2014V44.095C39.4576 43.9412 39.5823 43.8164 39.7362 43.8164H43.9776C44.1314 43.8164 44.2562 43.9412 44.2562 44.095V48.2014C44.2562 48.3553 44.3809 48.48 44.5348 48.48H45.3332L48.3986 48.6889C48.5524 48.6889 48.6772 48.8137 48.6772 48.9675L48.7657 52.8067C48.7657 52.9605 48.6409 53.0853 48.4871 53.0853L44.3278 53.0714C44.1739 53.0714 44.0492 53.1962 44.0492 53.35L44.1886 57.2892C44.1886 57.443 44.0638 57.5678 43.9099 57.5678L39.9794 57.7374C39.8256 57.7374 39.7008 57.6127 39.7008 57.4588L39.4576 54.3554V53.5573C39.4576 53.4034 39.3328 53.2787 39.1789 53.2787H35.0726C34.9187 53.2787 34.7939 53.1539 34.7939 53V48.7587C34.7938 48.6048 34.9187 48.48 35.0726 48.48Z"--}}
                    {{--                                    fill="#F5F8F9"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M48.9201 48.7573V52.9988C48.9201 53.1534 48.7948 53.2774 48.6415 53.2774H44.5353C44.382 53.2774 44.2566 53.4028 44.2566 53.556V57.6623C44.2566 57.8169 44.1313 57.9409 43.978 57.9409H39.7366C39.5834 57.9409 39.458 57.8169 39.458 57.6623V54.3544C41.9954 53.085 44.0645 51.0159 45.3339 48.4785H48.6418C48.7946 48.4786 48.9201 48.604 48.9201 48.7573Z"--}}
                    {{--                                    fill="#E8EDF2"/>--}}
                    {{--                            </g>--}}
                    {{--                            <defs>--}}
                    {{--                                <clipPath id="clip0_5948_21314">--}}
                    {{--                                    <rect width="64" height="64" fill="white"/>--}}
                    {{--                                </clipPath>--}}
                    {{--                            </defs>--}}
                    {{--                        </svg>--}}
                    {{--                        <span>Dermatology</span>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-containerNho">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-container">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}
                    {{--            <div class="col-md-4">--}}
                    {{--                <div class="border-HomeNew">--}}
                    {{--                    <div class="w-75 d-flex align-items-center ">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">--}}
                    {{--                            <g clip-path="url(#clip0_5948_23425)">--}}
                    {{--                                <path--}}
                    {{--                                    d="M46.4217 34.208C45.6749 34.7389 45.1464 35.5232 44.9351 36.4148H44.9201C41.9168 36.4148 38.9136 36.4148 37.5171 35.6313C37.652 34.3955 37.8023 33.1597 37.9375 31.9128C39.6647 31.1657 41.5384 30.8187 43.4184 30.8977C43.4184 33.1045 46.4217 34.208 46.4217 34.208Z"--}}
                    {{--                                    fill="#285680"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M27.5747 32.5638C27.5516 31.7142 27.5399 30.8535 27.5168 30.0039C26.566 30.6056 25.4599 30.9163 24.3348 30.8976C23.5309 30.894 22.7292 30.8165 21.9396 30.6659C20.8979 31.3089 19.7498 31.761 18.5493 32.001C18.5493 32.001 20.8635 34.2078 20.8635 36.4146C20.7251 37.8472 19.8473 39.1029 18.5493 39.7249C20.285 41.38 19.7063 44.1385 19.7063 44.1385C20.1345 44.5468 20.5048 44.955 20.8519 45.3522C20.8519 45.3191 20.8635 45.286 20.8635 45.2419C20.8635 41.9868 25.272 37.529 27.5862 35.4104C27.5862 34.4617 27.5747 33.5127 27.5747 32.5638Z"--}}
                    {{--                                    fill="#D75E72"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M27.5864 32.5637C25.0724 33.5062 22.7061 34.803 20.5589 36.4146C20.5589 34.2078 18.1357 32.001 18.1357 32.001C19.3868 31.7627 20.5877 31.3111 21.6858 30.6659C22.5134 30.8165 23.3527 30.8941 24.194 30.8976C25.3664 30.9179 26.521 30.6083 27.5259 30.0039C27.55 30.8534 27.5621 31.714 27.5864 32.5637Z"--}}
                    {{--                                    fill="#802D40"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M16.5523 12.1387C6.62155 12.1387 0.000976562 23.3567 0.000976562 35.3104C0.000976562 47.2641 4.41461 59.5856 14.3455 59.5856C22.0694 59.5856 23.1728 52.9651 23.1728 50.7582C23.1728 48.5514 22.0694 46.3446 19.8626 44.1377C19.8626 44.1377 20.4143 41.3791 18.7591 39.724C20.0191 39.0781 20.8543 37.8253 20.9659 36.4138C20.9659 34.2069 18.7591 32.0001 18.7591 32.0001C18.7591 32.0001 25.3797 30.8967 25.3797 24.2762C25.3797 17.6558 22.0694 12.1387 16.5523 12.1387Z"--}}
                    {{--                                    fill="#CC4B4C"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M32.7505 27.1347C33.4459 17.7115 33.9754 8.7407 34.152 3.20161C34.2099 1.37641 35.7365 -0.0561799 37.5615 0.00169351C39.3867 0.0595669 40.8193 1.58615 40.7615 3.41123C40.6952 5.54079 40.5738 8.14485 40.4193 11.091V11.102L39.68 22.7982C39.4704 25.7775 39.2497 28.8449 39.0069 31.9124C38.9076 33.1593 38.7971 34.3951 38.698 35.631C37.771 46.7755 36.6787 57.28 35.7187 62.2012C35.4832 63.3913 34.3396 64.1748 33.1448 63.9647C31.9499 63.7546 31.1423 62.6279 31.3271 61.4289L32.7505 27.1347Z"--}}
                    {{--                                    fill="#D75E72"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M63.9994 29.793C63.9994 41.743 59.5858 54.0682 49.6549 54.0682C41.931 54.0682 40.8276 47.4476 40.8276 45.2408C40.8276 43.034 41.931 40.8272 44.1378 38.6202C44.0136 37.8895 44.0173 37.1428 44.1488 36.4134C44.2757 35.5824 44.6575 34.8113 45.2412 34.2066C43.9812 33.5606 43.146 32.3079 43.0344 30.8963C43.0344 28.6895 45.2412 26.4827 45.2412 26.4827C42.9753 26.0326 40.9776 24.7086 39.68 22.7973C39.3389 22.2464 39.0822 21.6477 38.9186 21.0208C38.7166 20.284 38.6164 19.5229 38.6207 18.7588C38.6207 18.3946 38.6317 18.0415 38.6539 17.6884C38.6649 17.3684 38.698 17.0594 38.7311 16.7506C38.7276 16.6981 38.7351 16.6454 38.7532 16.5961C38.7754 16.3423 38.8084 16.0996 38.8525 15.8568C38.8629 15.73 38.8851 15.6043 38.9187 15.4817C38.9449 15.2812 38.9817 15.0824 39.0291 14.8859C39.0652 14.6882 39.1131 14.493 39.1726 14.301C39.1954 14.1698 39.2286 14.0406 39.272 13.9148C39.3227 13.7163 39.3853 13.521 39.4595 13.3299C39.503 13.1644 39.5583 13.0022 39.6248 12.8444C39.6438 12.7793 39.6698 12.7164 39.7022 12.6568C39.8963 12.1187 40.1363 11.5981 40.4194 11.101V11.09C41.729 8.3913 44.4488 6.66209 47.4481 6.62109C57.3789 6.62122 63.9994 17.843 63.9994 29.793Z"--}}
                    {{--                                    fill="#CC4B4C"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M16.7367 33.1053C11.3996 33.1053 9.88987 28.8258 9.21963 25.6066C9.13714 25.2201 9.26776 24.8189 9.56212 24.5551C9.85649 24.2913 10.2695 24.2051 10.6447 24.3293C11.02 24.4534 11.3001 24.7689 11.3791 25.1561C12.2303 29.2346 13.782 30.8985 16.7367 30.8985C17.346 30.8985 17.8401 31.3924 17.8401 32.0019C17.8401 32.6114 17.346 33.1053 16.7367 33.1053Z"--}}
                    {{--                                    fill="#802F34"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M16.7365 40.8283C14.3422 40.8983 12.03 39.9524 10.3714 38.2243C9.98283 37.7559 10.0468 37.0612 10.5146 36.6716C10.9823 36.2821 11.677 36.3448 12.0675 36.8116C13.3064 38.0351 14.9968 38.6903 16.7365 38.6213C17.3459 38.6213 17.84 39.1153 17.84 39.7248C17.84 40.3343 17.3459 40.8283 16.7365 40.8283Z"--}}
                    {{--                                    fill="#802F34"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M13.0577 47.4503C10.7246 47.4565 8.408 47.0565 6.21206 46.2682C5.64595 46.0423 5.37008 45.4003 5.59595 44.8342C5.82182 44.2681 6.4638 43.9922 7.02991 44.2181C8.96698 44.8976 11.0051 45.2443 13.0577 45.2435C15.883 45.2435 16.6169 43.757 16.6471 43.6939C16.9031 43.1494 17.5449 42.906 18.0975 43.1438C18.6458 43.3798 18.9027 44.0126 18.674 44.564C18.6255 44.682 17.4219 47.4503 13.0577 47.4503Z"--}}
                    {{--                                    fill="#802F34"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M47.2636 27.5878C46.6543 27.5878 46.1602 27.0938 46.1602 26.4843C46.1602 25.8749 46.6541 25.3809 47.2636 25.3809C50.2183 25.3809 51.77 23.7172 52.6212 19.6385C52.7001 19.2513 52.9803 18.9358 53.3556 18.8117C53.7308 18.6876 54.1438 18.7737 54.4382 19.0376C54.7325 19.3014 54.8632 19.7025 54.7807 20.089C54.1104 23.3083 52.6007 27.5878 47.2636 27.5878Z"--}}
                    {{--                                    fill="#802F34"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M47.2636 35.3108C46.6543 35.3108 46.1602 34.8168 46.1602 34.2073C46.1602 33.5979 46.6541 33.1039 47.2636 33.1039C49.0013 33.161 50.6874 32.5075 51.9326 31.2941C52.3231 30.8272 53.0178 30.7646 53.4856 31.1541C53.9533 31.5435 54.0173 32.2383 53.6287 32.7068C51.97 34.435 49.6578 35.3809 47.2636 35.3108Z"--}}
                    {{--                                    fill="#802F34"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M50.9425 41.9332C46.5784 41.9332 45.3748 39.1649 45.3263 39.0471C45.0952 38.4886 45.3564 37.8481 45.9122 37.6106C46.4679 37.373 47.1114 37.6267 47.3554 38.1797C47.4018 38.2767 48.1527 39.7265 50.9425 39.7265C52.9952 39.731 55.0335 39.3844 56.9694 38.7018C57.3357 38.5541 57.7532 38.6134 58.0638 38.8576C58.3745 39.1017 58.531 39.4932 58.4741 39.8842C58.4172 40.2751 58.1556 40.6059 57.7882 40.7513C55.5923 41.5395 53.2757 41.9395 50.9425 41.9332Z"--}}
                    {{--                                    fill="#802F34"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M31.289 61.7013C33.9517 44.5484 33.0817 15.1853 30.3102 2.15678C30.0481 0.902443 28.9429 0.0033425 27.6615 0.00196754H27.6611C26.8577 -0.000657388 26.0949 0.355333 25.5809 0.972816C25.0668 1.5903 24.8551 2.4049 25.0033 3.19463C27.5661 16.4763 28.3417 44.1031 25.8919 60.9043C25.7827 61.685 26.0177 62.4746 26.5359 63.0686C27.0542 63.6626 27.8045 64.0026 28.5929 64.0003C29.9357 64.0043 31.0807 63.028 31.289 61.7013Z"--}}
                    {{--                                    fill="#4482C3"/>--}}
                    {{--                            </g>--}}
                    {{--                            <defs>--}}
                    {{--                                <clipPath id="clip0_5948_23425">--}}
                    {{--                                    <rect width="64" height="64" fill="white"/>--}}
                    {{--                                </clipPath>--}}
                    {{--                            </defs>--}}
                    {{--                        </svg>--}}
                    {{--                        <span>Kidney</span>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-containerNho">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-container">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}
                    {{--            <div class="col-md-4">--}}
                    {{--                <div class="border-HomeNew">--}}
                    {{--                    <div class="w-75 d-flex align-items-center ">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">--}}
                    {{--                            <g clip-path="url(#clip0_5948_32629)">--}}
                    {{--                                <path--}}
                    {{--                                    d="M21.2129 6.25989C22.0004 5.56339 23.2128 3.91652 23.2128 3.91652C25.7089 2.54902 28.769 1.74414 32.0753 1.74414C35.3553 1.74414 38.3929 2.53652 40.878 3.88427C40.878 3.88427 42.5569 5.45089 43.3398 6.13164C43.3398 6.13164 42.6166 9.73814 33.0178 9.73814C23.4189 9.73814 21.2129 6.25989 21.2129 6.25989Z"--}}
                    {{--                                    fill="#FFDCD0"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M14.4838 24.5982H12.3987C11.5097 24.5982 10.7891 23.8774 10.7891 22.9885C10.7891 22.0995 11.5098 21.3789 12.3987 21.3789H14.4838C16.9099 21.3789 19.2377 20.228 20.7106 18.3004C21.2506 17.594 22.2608 17.4589 22.9669 17.9988C23.6733 18.5385 23.8083 19.5488 23.2687 20.255C21.1906 22.9745 17.9064 24.5982 14.4838 24.5982Z"--}}
                    {{--                                    fill="#FFC7B6"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M49.5159 24.5982H51.601C52.49 24.5982 53.2107 23.8774 53.2107 22.9885C53.2107 22.0995 52.4899 21.3789 51.601 21.3789H49.5159C47.0898 21.3789 44.762 20.228 43.2892 18.3004C42.7492 17.594 41.7389 17.4589 41.0328 17.9988C40.3264 18.5385 40.1914 19.5488 40.731 20.255C42.8092 22.9745 46.0933 24.5982 49.5159 24.5982Z"--}}
                    {{--                                    fill="#FFC7B6"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M46.2785 20.6718C46.2103 21.7793 46.0339 22.8699 45.7531 23.9311C43.7841 23.2151 42.0239 21.9479 40.731 20.2558C40.1914 19.5488 40.3266 18.5392 41.0324 17.9984C41.7394 17.4589 42.7489 17.5941 43.2898 18.3011C44.079 19.3338 45.1144 20.1438 46.2785 20.6718Z"--}}
                    {{--                                    fill="#FFB5A5"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M23.2692 20.2558C21.9763 21.9479 20.2159 23.2151 18.2471 23.9311C17.9663 22.8699 17.7899 21.7792 17.7217 20.6718C18.8858 20.1438 19.9212 19.3338 20.7106 18.3011C21.2514 17.5941 22.2609 17.4589 22.9679 17.9984C23.6736 18.5393 23.8088 19.5488 23.2692 20.2558Z"--}}
                    {{--                                    fill="#FFB5A5"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M41.1342 27.6318C42.7455 25.266 43.6071 22.4698 43.6071 19.6073V9.23047H20.3926V19.6075C20.3926 22.4698 21.2542 25.2661 22.8655 27.632C23.9741 29.2598 24.567 31.1838 24.567 33.1533C24.567 34.4483 24.3291 35.7322 23.8652 36.9413C23.0377 39.0978 22.8621 41.4501 23.3603 43.7055L24.4606 44.7781H39.5377L40.6395 43.7055C41.1377 41.45 40.9621 39.0978 40.1346 36.9413C39.6707 35.7323 39.4327 34.4483 39.4327 33.1533C39.4327 31.1837 40.0256 29.2597 41.1342 27.6318Z"--}}
                    {{--                                    fill="#FFDCD0"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M43.515 5.70189C43.515 5.70189 42.6162 9.73889 33.0174 9.73889C23.4187 9.73889 20.5508 5.77527 20.5508 5.77527C21.3375 5.07864 22.2313 4.45402 23.2125 3.91702C24.016 4.42189 24.8222 4.84164 25.6618 5.10052L25.7429 5.12627L25.8228 5.15589C27.802 5.90664 29.8804 6.28777 32 6.28777H32.0824C35.0958 6.28777 38.1683 5.43402 40.8777 3.88477C41.8474 4.41027 42.732 5.02064 43.515 5.70189Z"--}}
                    {{--                                    fill="#FFC7B6"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M61.5678 19.3208L57.4303 24.5206L53.173 16.9565H54.6218C58.4155 16.9565 61.0863 13.1229 59.6581 9.61001C59.6259 9.53014 59.5911 9.45164 59.5564 9.37301C58.2365 6.42151 55.1923 4.69339 51.9806 5.07201C50.483 5.24839 49.0833 5.85876 47.9346 6.83489C46.8071 7.93989 43.889 10.1346 42.0033 10.8964C41.7294 11.0408 41.4781 11.216 41.253 11.4166C40.462 12.1214 39.4651 12.905 39.4651 13.9926L39.4409 18.6709C39.4409 21.0184 38.7465 23.0886 37.2528 24.9005L36.6411 25.6423C34.9361 27.7104 33.8174 30.4853 33.8174 33.1663L34.0598 40.2685C34.0598 40.6291 34.2053 40.9536 34.4409 41.1905C34.5568 41.3176 35.0971 41.5004 35.2873 41.5591C35.8579 41.7354 36.6456 41.5713 36.9489 40.871C37.0264 40.744 37.1171 40.63 37.218 40.5298C37.5613 40.1886 37.9194 40.3126 38.3891 40.3126C38.7433 40.3126 39.1 40.4156 39.4168 40.632C40.277 41.1999 40.1632 42.1266 40.073 43.1529C40.0549 43.3781 40.0469 43.4466 39.9416 43.9449L36.2394 60.8153C36.1995 60.9943 36.0862 61.1475 35.9264 61.2376L35.5426 61.454C34.2575 62.179 33.4244 62.5205 32.0001 62.5205C31.5703 62.5205 31.116 62.7438 30.6904 62.6781C29.5683 62.5049 28.4748 62.1035 27.4814 61.4761C27.3359 61.3848 27.2329 61.2391 27.1968 61.0705L26.3186 57.0965L26.5453 55.8546L25.5248 53.5039L25.014 51.1923L25.1758 49.625L24.173 47.3821L23.3605 43.7041C23.3328 43.4756 23.2465 43.4164 23.2189 42.6663C23.2189 41.73 23.6876 40.848 24.4795 40.3251C25.341 39.7354 26.5115 39.9878 27.0511 40.8711C27.1726 40.9775 27.2801 41.5639 28.2629 41.6579C28.9828 41.6579 29.5661 41.0745 29.5661 40.3546V33.5335C29.5661 30.8525 28.6338 28.2564 26.9289 26.1883L26.3173 25.4465C24.8235 23.6346 24.007 21.3593 24.007 19.0116V14.2264C24.007 12.8291 23.2331 11.5479 21.9969 10.8963C20.2224 10.195 17.2186 7.97189 16.0655 6.83476C14.9169 5.85863 13.517 5.24826 12.0194 5.07189C8.80777 4.69326 5.76352 6.42139 4.44365 9.37289C4.4089 9.45139 4.37415 9.53001 4.3419 9.60989C2.91377 13.1229 5.58452 16.9564 9.37827 16.9564H10.827L6.56977 24.5205L2.43227 19.3206C-0.172853 16.0473 -0.730478 11.6406 0.978397 7.82251C2.97952 3.34764 7.5974 0.72576 12.465 1.30139C17.3046 1.67251 20.2645 6.26439 24.8634 7.68476C27.162 8.55651 29.5816 8.99188 32 8.99188C36.778 9.01326 41.7103 7.16651 45.4749 3.94264C47.1966 2.47976 49.2918 1.56551 51.535 1.30151C56.4026 0.725885 61.0205 3.34776 63.0216 7.82264C64.7305 11.6406 64.1729 16.0473 61.5678 19.3208Z"--}}
                    {{--                                    fill="#FF7E7B"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M41.4236 11.2734C40.53 11.9791 39.993 13.0621 39.993 14.2262V19.0114C39.993 21.3589 39.1766 23.6344 37.6828 25.4463L37.0711 26.1881C35.3661 28.2562 34.4339 30.8523 34.4339 33.5333V40.3544C34.4339 40.7151 34.5794 41.0396 34.815 41.2764C35.0005 41.4799 35.3146 41.6048 35.6495 41.6216L34.1196 41.5842C32.8619 41.5534 31.8584 40.5251 31.8584 39.2669V33.5333C31.8584 30.8523 32.7908 28.2562 34.4956 26.1881L35.1073 25.4463C36.601 23.6344 37.4175 21.3591 37.4175 19.0114V15.8836C37.4175 14.7774 37.903 13.7433 38.7181 13.0377C38.9976 12.7956 41.0863 11.4228 41.4236 11.2734Z"--}}
                    {{--                                    fill="#FF6464"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M40.7708 42.9122C40.7528 43.1376 40.7451 43.2059 40.6394 43.7042L38.3626 54.0152L37.3563 55.7092L37.6821 57.0967L36.8086 61.0526C36.7687 61.2316 36.6553 61.3849 36.4956 61.475L36.1118 61.6914C34.8267 62.4164 33.3998 62.7769 31.9756 62.7769C31.5454 62.7769 31.1167 62.7446 30.6904 62.6777C31.1571 62.6051 31.7638 62.4274 32.3684 62.2066C33.4741 61.8029 34.2979 60.8632 34.5503 59.7136L38.0641 43.7042C38.1697 43.2059 38.1773 43.1376 38.1954 42.9122C38.2753 42.0005 37.9057 41.1159 37.2193 40.5312C37.5606 40.1887 38.0228 40.0059 38.4928 40.0059C38.8469 40.0059 39.2037 40.1089 39.5204 40.3252C40.3807 40.893 40.8611 41.8859 40.7708 42.9122Z"--}}
                    {{--                                    fill="#FF6464"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M39.9417 46.8652C39.9417 46.8665 39.9404 46.8691 39.9404 46.8704L39.9417 46.8652Z"--}}
                    {{--                                    fill="#FF6464"/>--}}
                    {{--                                <path d="M24.0612 46.8769C24.06 46.873 24.06 46.8691 24.0586 46.8652L24.0612 46.8769Z"--}}
                    {{--                                      fill="#FF6464"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M32 49.7782C29.7298 49.7782 27.4594 49.3198 25.3308 48.403C24.6869 48.1261 24.2157 47.5595 24.061 46.877L25.0139 51.1922C27.2545 52.0486 29.6279 52.4761 31.9999 52.4761C33.8938 52.4761 35.7883 52.2027 37.6157 51.657L38.2715 48.5682C36.259 49.3748 34.1295 49.7782 32 49.7782Z"--}}
                    {{--                                    fill="#FF6464"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M32.0001 55.3845C30.1071 55.3845 28.2141 55.002 26.4383 54.2371C25.9232 54.0156 25.5446 53.5623 25.4185 53.0176L26.3186 57.0958C28.1485 57.7538 30.075 58.0822 32.0001 58.0822C33.472 58.0822 34.9443 57.8896 36.374 57.5051L37.0215 54.4553C35.4045 55.0741 33.7025 55.3845 32.0001 55.3845Z"--}}
                    {{--                                    fill="#FF6464"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M39.9403 46.8711L38.986 51.1927C38.0885 51.5352 37.1703 51.8096 36.2393 52.0143L36.8896 49.0538C37.491 48.871 38.0859 48.6546 38.6693 48.4036C38.9925 48.2645 39.2733 48.0521 39.4908 47.7881C39.7085 47.5266 39.8644 47.2123 39.9403 46.8711Z"--}}
                    {{--                                    fill="#F25555"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M38.5869 52.998L37.6817 57.0957C36.7957 57.4138 35.8866 57.6558 34.9658 57.8194L35.6032 54.9143C36.2677 54.7379 36.9231 54.5125 37.5618 54.2369C37.8232 54.1249 38.0486 53.9537 38.2237 53.7412C38.4002 53.5285 38.5264 53.2749 38.5869 52.998Z"--}}
                    {{--                                    fill="#F25555"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M25.4182 53.0174C25.4156 53.0109 25.4143 53.0045 25.4131 52.998L25.4182 53.0174Z"--}}
                    {{--                                    fill="#FF6464"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M11.9461 26.8077C15.2624 25.2774 16.9044 21.7693 15.6137 18.9721C14.3229 16.175 10.5881 15.148 7.27181 16.6783C3.95549 18.2086 2.31346 21.7168 3.60422 24.5139C4.89498 27.3111 8.62975 28.3381 11.9461 26.8077Z"--}}
                    {{--                                    fill="white"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M60.5687 24.5415C61.8595 21.7444 60.2175 18.2363 56.9011 16.7059C53.5848 15.1756 49.8501 16.2026 48.5593 18.9997C47.2685 21.7969 48.9106 25.305 52.2269 26.8354C55.5432 28.3657 59.278 27.3387 60.5687 24.5415Z"--}}
                    {{--                                    fill="white"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M37.6011 50.6498C37.6011 51.9994 37.8211 53.2977 38.228 54.5102C40.308 58.7578 44.3087 62.1269 49.6563 62.1269C56.3536 62.1269 61.2273 57.3469 61.2273 50.6498C61.2273 45.3022 57.8421 41.6373 53.5882 39.1501C52.3756 38.7432 51.0772 38.5234 49.7276 38.5234C43.0303 38.5233 37.6011 43.9526 37.6011 50.6498Z"--}}
                    {{--                                    fill="#8DB9FF"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M61.8542 50.6499C61.8542 57.3474 56.425 62.7765 49.7275 62.7765C44.3795 62.7765 39.8403 59.315 38.228 54.5105C39.441 54.9188 40.7404 55.1389 42.0899 55.1389C48.7874 55.1389 54.2165 49.7098 54.2165 43.0123C54.2165 41.6628 53.9963 40.3634 53.5882 39.1504C58.3928 40.7625 61.8542 45.3019 61.8542 50.6499Z"--}}
                    {{--                                    fill="#70ABF2"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M43.4577 48.433H47.2527C47.3949 48.433 47.5102 48.3178 47.5102 48.1755V44.3805C47.5102 44.2383 47.6254 44.123 47.7677 44.123H51.6874C51.8297 44.123 51.9449 44.2383 51.9449 44.3805V48.1755C51.9449 48.3178 52.0602 48.433 52.2024 48.433H52.9403L55.7733 48.6262C55.9156 48.6262 56.0308 48.7414 56.0308 48.8837L56.1126 52.4318C56.1126 52.574 55.9973 52.6893 55.8551 52.6893L52.0112 52.6765C51.8689 52.6765 51.7537 52.7918 51.7537 52.934L51.8824 56.5745C51.8824 56.7168 51.7672 56.832 51.6249 56.832L47.9924 56.9888C47.8502 56.9888 47.7349 56.8735 47.7349 56.7313L47.5102 53.8632V53.1255C47.5102 52.9833 47.3949 52.868 47.2527 52.868H43.4577C43.3154 52.868 43.2002 52.7528 43.2002 52.6105V48.6908C43.2002 48.5483 43.3154 48.433 43.4577 48.433Z"--}}
                    {{--                                    fill="#F5F8F9"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M56.2551 48.6893V52.6091C56.2551 52.752 56.1393 52.8666 55.9976 52.8666H52.2026C52.061 52.8666 51.9451 52.9825 51.9451 53.1241V56.9191C51.9451 57.062 51.8293 57.1766 51.6876 57.1766H47.7678C47.6261 57.1766 47.5103 57.062 47.5103 56.9191V53.862C49.8553 52.6889 51.7675 50.7766 52.9406 48.4316H55.9978C56.1391 48.4318 56.2551 48.5476 56.2551 48.6893Z"--}}
                    {{--                                    fill="#E8EDF2"/>--}}
                    {{--                            </g>--}}
                    {{--                            <defs>--}}
                    {{--                                <clipPath id="clip0_5948_32629">--}}
                    {{--                                    <rect width="64" height="64" fill="white"/>--}}
                    {{--                                </clipPath>--}}
                    {{--                            </defs>--}}
                    {{--                        </svg>--}}
                    {{--                        <span>Obstetrics gynecology</span>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-containerNho">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-container">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}
                    {{--            <div class="col-md-4">--}}
                    {{--                <div class="border-HomeNew">--}}
                    {{--                    <div class="w-75 d-flex align-items-center ">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">--}}
                    {{--                            <path--}}
                    {{--                                d="M29 12.39C26.6902 14.0863 24.7251 16.2075 23.21 18.64C22.5603 18.1967 21.786 17.9725 21 18C21.6121 16.0566 21.9487 14.0369 22 12C21.8872 10.0284 21.2895 8.11521 20.26 6.43C20.0889 6.12814 19.9993 5.78697 20 5.44V2C20 1.73478 20.1054 1.48043 20.2929 1.29289C20.4804 1.10536 20.7348 1 21 1H25C25.2652 1 25.5196 1.10536 25.7071 1.29289C25.8946 1.48043 26 1.73478 26 2V4H28L32.44 1.33C32.8077 1.11654 33.2248 1.00278 33.65 1C34.2728 1.00158 34.8696 1.24968 35.31 1.69005C35.7503 2.13042 35.9984 2.72723 36 3.35V4.65C36.0004 4.95872 35.9399 5.26448 35.8219 5.54977C35.704 5.83507 35.5309 6.09429 35.3126 6.31258C35.0943 6.53088 34.8351 6.70396 34.5498 6.82192C34.2645 6.93988 33.9587 7.00039 33.65 7H33L29 10V12.39Z"--}}
                    {{--                                fill="#F8A88D"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M29 12.39C31.0291 10.8868 33.4753 10.0516 36 10C36.69 10 37.36 10.02 37.99 10.07C39.0015 10.1323 40.0073 10.266 41 10.47C41.38 10.54 41.74 10.63 42.09 10.73C43.2406 11.0211 44.3423 11.4793 45.36 12.09C47.12 13.19 48 14.59 48 16C48 19 46 19 46 19H42C42 19 42 17 36 17C30 17 29 25 29 25H25C25 25 25.66 20.37 23.21 18.64C24.725 16.2075 26.6901 14.0863 29 12.39Z"--}}
                    {{--                                fill="#F9C3B9"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M50.0001 19C50.53 19.0016 51.0378 19.2128 51.4125 19.5875C51.7873 19.9623 51.9985 20.4701 52.0001 21V23C51.9985 23.5299 51.7873 24.0377 51.4125 24.4125C51.0378 24.7872 50.53 24.9984 50.0001 25C49.3048 24.1594 48.9482 23.0896 49.0001 22C48.9482 20.9104 49.3048 19.8406 50.0001 19Z"--}}
                    {{--                                fill="#E07857"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M50.8401 19.193C50.5779 19.0671 50.2909 19.0011 50.0001 19C49.3048 19.8406 48.9482 20.9104 49.0001 22C48.9482 23.0896 49.3048 24.1594 50.0001 25C50.2909 24.9989 50.5779 24.9329 50.8401 24.807C50.2655 23.986 49.9709 23.0017 50.0001 22C49.9709 20.9983 50.2655 20.014 50.8401 19.193Z"--}}
                    {{--                                fill="#CF6542"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M50 19C49.3047 19.8406 48.9481 20.9104 49 22C48.9481 23.0896 49.3047 24.1594 50 25H45L44.83 25.21C43.7361 24.3674 42.3794 23.9388 41 24C35 24 35 29 35 29C35 29 29 29 29 26V25C29 25 30 17 36 17C42 17 42 19 42 19H50Z"--}}
                    {{--                                fill="#F7B39C"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M41.0002 4.5V10.47C40.0076 10.266 39.0017 10.1323 37.9902 10.07L38.0002 10V4.5C38.0002 4.10218 38.1583 3.72064 38.4396 3.43934C38.7209 3.15804 39.1024 3 39.5002 3C39.8981 3 40.2796 3.15804 40.5609 3.43934C40.8422 3.72064 41.0002 4.10218 41.0002 4.5Z"--}}
                    {{--                                fill="#AD313B"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M46.9998 6.73989V7.65989C47.0016 7.88222 46.9608 8.10283 46.8798 8.30989L45.3598 12.0899C44.3422 11.4792 43.2404 11.021 42.0898 10.7299L43.5998 6.18989C43.7311 5.79728 43.9976 5.46411 44.3518 5.24989C44.706 5.03566 45.1249 4.95434 45.5335 5.02044C45.9421 5.08655 46.314 5.29577 46.5826 5.61075C46.8512 5.92572 46.9991 6.32593 46.9998 6.73989Z"--}}
                    {{--                                fill="#2963A3"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M16.01 33.3603C14.7164 33.7878 13.3624 34.0039 12 34.0003V31.0003C12 31.0003 14 28.0003 14 26.0003C14 24.0003 16 18.0003 21 18.0003C21.786 17.9728 22.5603 18.197 23.21 18.6403C25.66 20.3703 25 25.0003 25 25.0003C23.8245 27.3964 22.1342 29.5033 20.05 31.1703C18.8386 32.1261 17.4721 32.8669 16.01 33.3603Z"--}}
                    {{--                                fill="#F24754"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M46.81 45.68C46.2423 47.0973 45.5911 48.4797 44.86 49.82C44.16 48.91 41 44.67 41 42C41 42 45.48 43.79 46.81 45.68Z"--}}
                    {{--                                fill="#C2313C"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M29.9999 57C30.0279 58.145 30.4273 59.2499 31.138 60.1482C31.8486 61.0464 32.832 61.6893 33.9399 61.98C32.7245 62.6237 31.375 62.9731 29.9999 63C28.9076 63.0022 27.8331 62.7233 26.8799 62.19L26.9999 62C29.9999 61 29.9999 57 29.9999 57Z"--}}
                    {{--                                fill="#AD313B"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M37 36C37 36 41 39 41 42C41 44.67 44.16 48.91 44.86 49.82C44.1113 51.2194 43.2833 52.575 42.38 53.88C41.6361 54.9588 40.8349 55.9969 39.98 56.99C39.66 56.71 34.9 52.64 34.11 48.98C34.0394 48.658 34.0026 48.3296 34 48C34 44.36 36.49 39.88 36.93 36.09C36.98 36.03 37 36 37 36Z"--}}
                    {{--                                fill="#AD313B"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M34.11 48.9805C34.9 52.6405 39.66 56.7105 39.98 56.9905C38.311 59.0314 36.2592 60.7265 33.94 61.9805C32.8321 61.6898 31.8487 61.0469 31.1381 60.1487C30.4274 59.2504 30.028 58.1455 30 57.0005C30 53.0005 34 49.0005 34 49.0005L34.11 48.9805Z"--}}
                    {{--                                fill="#C2313C"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M47 33.9999C47 33.9999 48 35.9999 48 40.9999C47.8691 42.6157 47.4668 44.1978 46.81 45.6799C45.48 43.7899 41 41.9999 41 41.9999C41 38.9999 37 35.9999 37 35.9999C37 35.9999 36.98 36.0299 36.93 36.0899C36.9779 35.7286 37.0013 35.3644 37 34.9999C37.1038 32.8206 36.3906 30.6811 35 28.9999C35 28.9999 35 23.9999 41 23.9999C42.3794 23.9387 43.7361 24.3673 44.83 25.2099C45.4951 25.8215 46.03 26.5609 46.4028 27.3839C46.7757 28.2069 46.9788 29.0966 47 29.9999V33.9999Z"--}}
                    {{--                                fill="#C2313C"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M36.93 36.09C36.49 39.88 34 44.36 34 48C34.0026 48.3296 34.0394 48.658 34.11 48.98L34 49C34 49 30 53 30 57C30 57 30 61 27 62L26.88 62.19C26.3374 61.8959 25.8446 61.5179 25.42 61.07C24.5725 60.2652 24.0646 59.167 24 58C24 55 12 47 12 41V34C13.3624 34.0036 14.7164 33.7875 16.01 33.36C17.4721 32.8666 18.8386 32.1258 20.05 31.17C22.1342 29.503 23.8245 27.3961 25 25H29V26C29 29 35 29 35 29C36.3906 30.6812 37.1038 32.8207 37 35C37.0013 35.3645 36.9779 35.7287 36.93 36.09Z"--}}
                    {{--                                fill="#DB3744"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M45.36 12.0909C44.6177 11.6396 43.8257 11.2755 43 11.0059C43 15.0009 41 15.0009 36 15.0009C33.7661 15.0323 31.6063 15.8063 29.861 17.2009C29.2849 17.641 28.5683 17.8566 27.845 17.8072C27.1217 17.7579 26.441 17.4471 25.93 16.9329L25.075 16.0779C24.3975 16.8902 23.7745 17.7464 23.21 18.6409C25.66 20.3709 25 25.0009 25 25.0009H29C29 25.0009 30 17.0009 36 17.0009C42 17.0009 42 19.0009 42 19.0009H46C46 19.0009 48 19.0009 48 16.0009C48 14.5909 47.12 13.1909 45.36 12.0909Z"--}}
                    {{--                                fill="#F8A88D"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M30.0598 25C30.2798 25.0801 30.5135 25.1154 30.7474 25.1039C30.9812 25.0924 31.2103 25.0343 31.4214 24.9331C31.6325 24.8318 31.8212 24.6894 31.9765 24.5143C32.1318 24.3391 32.2506 24.1347 32.3258 23.913C32.8728 22.445 34.1998 20 36.9998 20C38.2208 19.9575 39.4343 20.2078 40.5388 20.73C40.691 20.8091 40.8609 20.8476 41.0323 20.8421C41.2037 20.8365 41.3708 20.7869 41.5175 20.6982C41.6642 20.6094 41.7856 20.4844 41.8701 20.3352C41.9546 20.1859 41.9992 20.0175 41.9998 19.846V19C41.9998 19 41.9998 17 35.9998 17C31.2628 17 29.6468 21.975 29.1748 24.074C29.2491 24.2818 29.3662 24.4717 29.5187 24.6312C29.6712 24.7908 29.8556 24.9164 30.0598 25Z"--}}
                    {{--                                fill="#FBD2C4"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M50 19H48V21C48 21.5304 47.7893 22.0391 47.4142 22.4142C47.0391 22.7893 46.5304 23 46 23H45C45 23 44 22 39 22C37.8306 21.9781 36.6815 22.3073 35.701 22.9451C34.7206 23.5829 33.9539 24.5 33.5 25.578C33.2839 26.0367 32.8976 26.3932 32.423 26.5719C31.9485 26.7505 31.423 26.7373 30.958 26.535C30.232 26.1873 29.57 25.7194 29 25.151V26C29 29 35 29 35 29C35 29 35 24 41 24C42.3794 23.9388 43.7361 24.3674 44.83 25.21L45 25H50C49.3047 24.1594 48.9481 23.0896 49 22C48.9481 20.9104 49.3047 19.8406 50 19Z"--}}
                    {{--                                fill="#F8A183"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M24.817 8.433C24.5114 7.15343 23.8862 5.97228 23 5V1H21C20.7348 1 20.4804 1.10536 20.2929 1.29289C20.1054 1.48043 20 1.73478 20 2V5.44C19.9993 5.78697 20.0889 6.12814 20.26 6.43C21.2895 8.11521 21.8872 10.0284 22 12C21.9487 14.0369 21.6121 16.0566 21 18C21.786 17.9725 22.5603 18.1967 23.21 18.64C24.7251 16.2075 26.6902 14.0863 29 12.39V10H26.764C26.3102 9.99711 25.8707 9.84066 25.5172 9.55611C25.1636 9.27157 24.9168 8.87571 24.817 8.433Z"--}}
                    {{--                                fill="#F79274"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M33.65 1.00004C33.2248 1.00282 32.8077 1.11657 32.44 1.33004L28 4.00004H26C26 4.53047 26.2107 5.03918 26.5858 5.41425C26.9609 5.78932 27.4696 6.00004 28 6.00004H28.394C28.7891 6.00013 29.1753 5.88321 29.504 5.66404L34.613 2.25804C34.8653 2.08988 35.1618 2.00011 35.465 2.00004C35.504 2.00004 35.541 2.00904 35.579 2.01204C35.4996 1.89653 35.4095 1.78872 35.31 1.69004C35.0935 1.46992 34.835 1.29545 34.5499 1.17693C34.2648 1.05842 33.9588 0.998268 33.65 1.00004Z"--}}
                    {{--                                fill="#F9C3B9"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M18.035 32.4781C18.3889 28.8579 19.0241 25.2707 19.935 21.7491C20.1268 21.0067 20.4879 20.3189 20.99 19.7394C21.4921 19.1599 22.1215 18.7046 22.829 18.4091C22.2619 18.1252 21.634 17.9844 21 17.9991C16 17.9991 14 23.9991 14 25.9991C14 27.9991 12 30.9991 12 30.9991V33.9991C13.3624 34.0027 14.7164 33.7866 16.01 33.3591C16.7088 33.1236 17.3863 32.8288 18.035 32.4781Z"--}}
                    {{--                                fill="#DB3744"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M18 39.9995C17.7767 37.4969 17.7884 34.9789 18.035 32.4785C17.3863 32.8293 16.7088 33.124 16.01 33.3595C14.7164 33.787 13.3624 34.0031 12 33.9995V40.9995C12 46.9995 24 54.9995 24 57.9995C24.0646 59.1665 24.5725 60.2647 25.42 61.0695C25.8446 61.5174 26.3374 61.8954 26.88 62.1895L27 61.9995C30 60.9995 30 56.9995 30 56.9995V55.9995C30 49.9995 19 49.9995 18 39.9995Z"--}}
                    {{--                                fill="#C2313C"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M36.7999 33C36.5749 31.5278 35.9526 30.1448 34.9999 29C34.9999 29 28.9999 29 28.9999 26V25H24.9999C24.9999 25 24.0159 32.913 36.7999 33Z"--}}
                    {{--                                fill="#C2313C"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M38 28C38.0175 27.3926 38.1655 26.7961 38.434 26.251C38.717 25.6534 39.1465 25.1371 39.6825 24.75C40.2186 24.363 40.8438 24.1177 41.5 24.037C41.33 24.027 41.178 24 41 24C35 24 35 29 35 29C35.9524 30.1449 36.5748 31.5278 36.8 33H37C39 33 38 30 38 28Z"--}}
                    {{--                                fill="#AD313B"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M16.615 39.183L16.621 39.195C16.628 39.209 16.633 39.226 16.641 39.24C16.8828 39.752 17.28 40.1748 17.776 40.448C19.187 41.154 19.5 44.701 19.5 46.001C19.5 46.1336 19.5527 46.2608 19.6464 46.3545C19.7402 46.4483 19.8674 46.501 20 46.501C20.1326 46.501 20.2598 46.4483 20.3536 46.3545C20.4473 46.2608 20.5 46.1336 20.5 46.001C20.5 45.46 20.435 40.71 18.25 39.571C19.829 39.729 21.5 40.166 21.5 41.001C21.5 41.1336 21.5527 41.2608 21.6464 41.3545C21.7402 41.4483 21.8674 41.501 22 41.501C22.1326 41.501 22.2598 41.4483 22.3536 41.3545C22.4473 41.2608 22.5 41.1336 22.5 41.001C22.5 38.92 18.939 38.566 17.41 38.51C16.8551 36.9651 16.5559 35.3402 16.524 33.699C17.6948 33.2669 18.8024 32.6797 19.817 31.953C20.2191 33.0003 20.9302 33.9006 21.8559 34.5343C22.7816 35.168 23.8782 35.5051 25 35.501C25.1326 35.501 25.2598 35.4483 25.3536 35.3545C25.4473 35.2608 25.5 35.1336 25.5 35.001C25.5 34.8684 25.4473 34.7412 25.3536 34.6474C25.2598 34.5537 25.1326 34.501 25 34.501C24.0338 34.4924 23.0944 34.1824 22.3128 33.6143C21.5312 33.0462 20.9464 32.2483 20.64 31.332C22.662 29.6527 24.3039 27.5629 25.457 25.201C25.4854 25.1381 25.5 25.07 25.5 25.001H25C25 25.001 25.026 24.814 25.048 24.51C24.9452 24.5004 24.842 24.5228 24.7525 24.5742C24.6629 24.6256 24.5915 24.7034 24.548 24.797C23.4024 27.116 21.7642 29.1568 19.748 30.777C18.5819 31.6973 17.2664 32.4107 15.859 32.886C14.6138 33.296 13.3109 33.5036 12 33.501V34.501C13.1959 34.4994 14.386 34.3359 15.538 34.015C15.5749 35.7894 15.9401 37.5416 16.615 39.183Z"--}}
                    {{--                                fill="#FF8F8F"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M47.011 45.1288C45.65 43.5108 42.455 42.0718 41.474 41.6558C41.231 38.8738 38.174 36.2908 37.453 35.7208C37.473 35.4848 37.5 35.2568 37.5 35.0008C37.6084 32.6884 36.8423 30.4199 35.354 28.6468C35.2705 28.566 35.161 28.5174 35.045 28.5098C35.0197 28.6723 35.0046 28.8363 35 29.0008C35 29.0008 34.808 29.0008 34.5 28.9838C34.4973 29.0517 34.5086 29.1195 34.533 29.1829C34.5574 29.2463 34.5945 29.3041 34.642 29.3528C35.9292 30.9459 36.59 32.9545 36.5 35.0008C36.4985 35.2993 36.4792 35.5975 36.442 35.8938C35.2273 37.3131 33.7976 38.5332 32.205 39.5098C30.7627 38.2448 28.9182 37.5329 27 37.5008C26.8674 37.5008 26.7402 37.5534 26.6464 37.6472C26.5527 37.741 26.5 37.8682 26.5 38.0008C26.5 38.1334 26.5527 38.2606 26.6464 38.3543C26.7402 38.4481 26.8674 38.5008 27 38.5008C28.5303 38.5332 30.0091 39.0594 31.216 40.0008C30.518 40.3134 29.7646 40.4834 29 40.5008C24.552 40.5008 24.5 43.9658 24.5 44.0008C24.5 44.1334 24.5527 44.2606 24.6464 44.3543C24.7402 44.4481 24.8674 44.5008 25 44.5008C25.1326 44.5008 25.2598 44.4481 25.3536 44.3543C25.4473 44.2606 25.5 44.1334 25.5 44.0008C25.5 43.9008 25.54 41.5008 29 41.5008C31.821 41.5008 34.558 39.2598 36.115 37.7108C35.829 38.8998 35.427 40.1368 35.023 41.3498C34.887 41.7608 34.75 42.1748 34.617 42.5888C33.208 42.9928 26.5 45.2208 26.5 51.0008C26.5 51.1334 26.5527 51.2605 26.6464 51.3543C26.7402 51.4481 26.8674 51.5008 27 51.5008C27.1326 51.5008 27.2598 51.4481 27.3536 51.3543C27.4473 51.2605 27.5 51.1334 27.5 51.0008C27.5 46.6008 32.26 44.4638 34.253 43.7618C33.8048 45.1326 33.5514 46.5595 33.5 48.0008C33.5033 48.2457 33.5247 48.49 33.564 48.7318C32.969 49.3498 29.5 53.1158 29.5 57.0008C29.5 57.0378 29.47 60.6508 26.842 61.5268C26.7515 61.5574 26.6716 61.6133 26.6119 61.6879C26.5522 61.7626 26.5151 61.8527 26.505 61.9478C26.63 62.0288 26.749 62.1208 26.88 62.1908C27.011 62.2608 27.18 62.3358 27.327 62.4048C27.9713 62.1432 28.5496 61.742 29.0202 61.23C29.4907 60.7179 29.8418 60.1079 30.048 59.4438C30.7438 60.7496 31.8924 61.7566 33.278 62.2758C33.499 62.1818 33.721 62.0908 33.94 61.9758C34.097 61.8978 34.253 61.8088 34.41 61.7228C34.3645 61.6493 34.3003 61.5892 34.224 61.5488C34.1754 61.528 34.1256 61.5099 34.075 61.4948C33.0733 61.2331 32.1834 60.6536 31.5388 59.8434C30.8942 59.0331 30.5297 58.0357 30.5 57.0008C30.5 54.0778 32.821 51.0888 33.859 49.9008C34.985 53.1218 38.499 56.3698 39.627 57.3488C39.633 57.3548 39.643 57.3578 39.65 57.3638C39.76 57.2408 39.871 57.1208 39.98 56.9948C40.089 56.8688 40.188 56.7368 40.294 56.6098C40.284 56.6028 40.279 56.5898 40.269 56.5838C37.882 54.5048 35.142 51.3918 34.6 48.8838C34.5353 48.5938 34.5018 48.2978 34.5 48.0008C34.6722 45.8275 35.1683 43.6923 35.972 41.6658C36.5278 40.1111 36.9716 38.5187 37.3 36.9008C38.37 37.8388 40.5 39.9618 40.5 42.0008V42.0128C40.508 44.7738 43.535 48.9188 44.459 50.1198C44.529 50.2138 44.568 50.2628 44.59 50.2908C44.677 50.1338 44.776 49.9768 44.859 49.8208C44.942 49.6648 45.023 49.4918 45.11 49.3208C44.344 48.3048 42.073 45.1418 41.595 42.7998C42.905 43.3908 45.495 44.6758 46.4 45.9668C46.4552 46.0415 46.5034 46.1212 46.544 46.2048C46.544 46.2168 46.562 46.2208 46.568 46.2328C46.644 46.0508 46.739 45.8558 46.809 45.6778C46.879 45.4998 46.942 45.3148 47.011 45.1288Z"--}}
                    {{--                                fill="#FF8F8F"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M40.0199 26.5484C40.1296 26.896 40.3285 27.2088 40.5969 27.4554L42.9179 30.0174C43.2142 30.3967 43.5959 30.7006 44.0319 30.9044C44.2372 30.9898 44.4621 31.0171 44.6819 30.9834C44.9987 30.9041 45.2727 30.7057 45.4469 30.4294C45.8765 29.8198 46.0646 29.0724 45.9748 28.332C45.885 27.5915 45.5237 26.9108 44.9609 26.4214C44.0197 25.6426 42.874 25.1517 41.6609 25.0074C41.4476 24.9807 41.231 25.0013 41.0266 25.0679C40.8222 25.1344 40.635 25.2452 40.4783 25.3923C40.3216 25.5395 40.1993 25.7194 40.12 25.9192C40.0408 26.119 40.0066 26.3339 40.0199 26.5484Z"--}}
                    {{--                                fill="#DB3744"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M43.021 38.6288C43.0803 39.1806 43.3078 39.7009 43.6727 40.1191C44.0376 40.5373 44.5223 40.8332 45.061 40.9668C45.2205 41.0098 45.3885 41.0098 45.548 40.9668C45.6749 40.9173 45.7886 40.8389 45.88 40.7378C46.6166 39.9141 47.0148 38.8426 46.995 37.7378C47.1029 37.1723 46.998 36.5868 46.7004 36.094C46.4029 35.6011 45.9337 35.2357 45.383 35.0678C44.167 34.7288 43.666 35.7678 43.338 36.6218C43.0719 37.2554 42.9631 37.944 43.021 38.6288Z"--}}
                    {{--                                fill="#DB3744"/>--}}
                    {{--                        </svg>--}}
                    {{--                        <span>Cardiology</span>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-containerNho">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-container">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}
                    {{--            <div class="col-md-4">--}}
                    {{--                <div class="border-HomeNew">--}}
                    {{--                    <div class="w-75 d-flex align-items-center ">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">--}}
                    {{--                            <g clip-path="url(#clip0_5948_28199)">--}}
                    {{--                                <path--}}
                    {{--                                    d="M49.2002 37.5398H46.476V41.4426C46.476 42.3133 45.975 43.1081 45.188 43.4816L43.2546 44.4026C42.9442 44.5507 42.8734 44.9616 43.1167 45.2063L44.1162 46.2058C44.5684 46.6579 44.8221 47.2697 44.8221 47.9099V50.5349C44.8221 53.4601 42.2176 55.6974 39.326 55.2569L30.034 53.8388L29.9837 53.8323C29.569 53.8014 29.2212 54.1594 29.2754 54.5807L30.1821 61.6147C30.3457 62.8797 29.3604 64.0003 28.0852 64.0003H19.1236L16.4771 60.9233L14.7475 64.0003H9.13673C7.81911 64.0003 6.82336 62.8088 7.05523 61.5118L8.21186 55.0664C8.85073 51.5076 8.72836 47.8547 7.85248 44.3459L3.43323 26.6274C2.96311 24.7443 2.72998 22.8226 2.72998 20.9046C2.72998 17.7784 3.35086 14.6639 4.57573 11.7466C7.36561 5.10794 13.8639 0.789062 21.0654 0.789062H29.5086C39.3867 0.789062 47.3945 8.79694 47.3945 18.6749V29.2602C47.3945 29.8333 47.5837 30.3898 47.9342 30.8444L50.7164 34.4574C51.6862 35.7159 50.7885 37.5398 49.2002 37.5398Z"--}}
                    {{--                                    fill="#FFCEBF"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M28.0852 63.9991H24.6011C25.8763 63.9991 26.8616 62.8785 26.6993 61.6136L25.7642 54.2163C25.7023 53.7321 26.1158 53.3211 26.6002 53.3856L29.9839 53.8312C29.5692 53.8003 29.2214 54.1583 29.2756 54.5796L30.1823 61.6136C30.3457 62.8785 29.3603 63.9991 28.0852 63.9991Z"--}}
                    {{--                                    fill="#FFB09E"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M50.7165 34.4566L47.934 30.8438C47.5843 30.3896 47.3945 29.8324 47.3945 29.2592V18.6747C47.3945 8.79669 39.3869 0.789062 29.5089 0.789062H26.0249C35.9028 0.789062 43.9105 8.79669 43.9105 18.6747V29.2022C43.9105 29.8124 44.1124 30.4056 44.4848 30.8889L47.2324 34.4566C48.202 35.7154 47.3045 37.5394 45.7155 37.5394H42.9918V41.4416C42.9918 42.3131 42.4905 43.1068 41.7038 43.4816L40.173 44.2106C39.6658 44.4521 39.5503 45.1229 39.9475 45.5202L40.6324 46.2051C41.0843 46.6569 41.3382 47.2697 41.3382 47.9087V50.5349C41.3382 52.6699 39.9494 54.4374 38.075 55.0654L39.3262 55.2563C42.2173 55.6973 44.8223 53.4597 44.8223 50.5351V47.9088C44.8223 47.2698 44.5684 46.6569 44.1167 46.2052L43.1167 45.2052C42.873 44.9616 42.9439 44.5503 43.2549 44.4022L45.188 43.4817C45.9749 43.1069 46.476 42.3132 46.476 41.4417V37.5396H49.1999C50.7887 37.5394 51.6862 35.7154 50.7165 34.4566Z"--}}
                    {{--                                    fill="#FFB09E"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M23.7837 37.5389H42.9921C42.9921 37.5389 39.0227 26.4476 29.1627 27.0448C26.8248 27.1864 24.8174 27.5008 23.1083 27.9049C18.2002 29.0655 14.7476 33.4686 14.7476 38.5121V63.9991H19.1238V48.8438C19.1238 48.0234 19.7889 47.3583 20.6093 47.3583H32.7281C33.7172 47.3583 37.1752 46.5981 37.2218 45.6101C37.2714 44.5553 33.8239 43.6844 32.7799 43.6844H20.6093C19.7889 43.6844 19.1238 43.0193 19.1238 42.1989C19.1238 39.6251 21.2102 37.5389 23.7837 37.5389Z"--}}
                    {{--                                    fill="#FE76A8"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M29.1625 27.0448C28.6131 27.078 28.0826 27.1211 27.5693 27.1725C36.4603 28.4574 42.9918 37.5389 42.9918 37.5389H49.1997C49.1997 37.5389 39.0225 26.4476 29.1625 27.0448Z"--}}
                    {{--                                    fill="#FE5694"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M37.1856 43.6836H32.7799C33.8239 43.6836 34.6645 44.5545 34.6148 45.6093C34.5683 46.5973 33.7172 47.3576 32.728 47.3576H37.1338C38.1229 47.3576 38.974 46.5975 39.0205 45.6093C39.0703 44.5545 38.2297 43.6836 37.1856 43.6836Z"--}}
                    {{--                                    fill="#FE5694"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M59.5644 12.6303C59.5644 25.5961 45.7884 24.9383 45.7884 24.9383C40.1856 23.6456 36.0083 18.6258 36.0083 12.6303C36.0083 6.63477 40.1856 1.61489 45.7884 0.322266C45.7884 0.322266 59.5644 0.322267 59.5644 12.6303Z"--}}
                    {{--                                    fill="#F2FBFF"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M48.6396 0C47.6591 0 46.7047 0.11175 45.7886 0.323125C51.3914 1.61575 55.5687 6.63563 55.5687 12.6311C55.5687 18.6266 51.3914 23.6465 45.7886 24.9391C46.7048 25.1505 47.6592 25.2623 48.6396 25.2623C55.6156 25.2623 61.2707 19.6071 61.2707 12.6311C61.2707 5.65513 55.6156 0 48.6396 0Z"--}}
                    {{--                                    fill="#DFF6FD"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M55.2117 9.643H52.1394C51.8567 9.643 51.6276 9.41387 51.6276 9.13112V5.48062C51.6276 4.87 51.1326 4.375 50.5219 4.375H46.7564C46.1458 4.375 45.6508 4.87 45.6508 5.48062V9.13112C45.6508 9.41387 45.4217 9.643 45.1389 9.643H41.4884C40.8778 9.643 40.3828 10.138 40.3828 10.7486V14.5141C40.3828 15.1248 40.8778 15.6198 41.4884 15.6198H45.1389C45.4217 15.6198 45.6508 15.8489 45.6508 16.1316V19.7821C45.6508 20.3927 46.1458 20.8878 46.7564 20.8878H50.5221C51.1327 20.8878 51.6277 20.3927 51.6277 19.7821V16.1316C51.6277 15.8489 51.8568 15.6198 52.1396 15.6198H55.2117C55.8223 15.6198 56.3173 15.1248 56.3173 14.5141V10.7486C56.3173 10.138 55.8223 9.643 55.2117 9.643Z"--}}
                    {{--                                    fill="#8AC9FE"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M55.7902 9.64258H55.2119C55.4444 10.6007 55.5685 11.6013 55.5685 12.631C55.5685 13.6606 55.4444 14.6612 55.2119 15.6193H55.7902C56.4008 15.6193 56.8958 15.1243 56.8958 14.5137V10.7482C56.8958 10.1376 56.4008 9.64258 55.7902 9.64258Z"--}}
                    {{--                                    fill="#60B7FF"/>--}}
                    {{--                            </g>--}}
                    {{--                            <defs>--}}
                    {{--                                <clipPath id="clip0_5948_28199">--}}
                    {{--                                    <rect width="64" height="64" fill="white"/>--}}
                    {{--                                </clipPath>--}}
                    {{--                            </defs>--}}
                    {{--                        </svg>--}}
                    {{--                        <span>Rhinology</span>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-containerNho">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-container">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}
                    {{--            <div class="col-md-4">--}}
                    {{--                <div class="border-HomeNew">--}}
                    {{--                    <div class="w-75 d-flex align-items-center ">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">--}}
                    {{--                            <g clip-path="url(#clip0_5948_28275)">--}}
                    {{--                                <path--}}
                    {{--                                    d="M12.5703 21.0393C12.5703 21.0393 13.0219 2.97956 29.6415 0.284056C46.2612 -2.41144 51.5 14.6601 51.5 26.7897C51.5 38.9193 38.8547 47.6348 33.7062 57.5182C28.5577 67.4016 16.9962 64.3467 14.467 59.1354C11.9379 53.9242 12.5703 21.0393 12.5703 21.0393Z"--}}
                    {{--                                    fill="#FDBA91"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M31.0437 0.102172C43.5179 1.44192 47.6258 16.051 47.6258 26.7897C47.6258 38.9193 34.9804 47.6348 29.8319 57.5182C27.8002 61.4184 24.7698 63.3025 21.6899 63.8357C25.8929 64.5408 30.8124 63.073 33.7062 57.5182C38.8546 47.6348 51.4999 38.9193 51.4999 26.7897C51.4999 15.0082 46.5564 -1.43345 31.0437 0.102172Z"--}}
                    {{--                                    fill="#FC997D"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M25.9145 31.6092C27.2873 26.9417 17.5737 22.5403 20.8909 12.9702C22.6072 8.01878 26.4868 4.55078 31.9745 4.55078C41.1025 4.55078 44.9503 16.2243 44.9503 24.8383C44.9503 32.0009 37.2099 46.8087 24.685 46.8087C19.7317 46.8087 19.1343 42.6647 19.1343 39.8463C19.1344 34.643 24.5418 36.2767 25.9145 31.6092Z"--}}
                    {{--                                    fill="#FC997D"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M31.9741 4.55078C31.2687 4.55078 30.5903 4.60903 29.9393 4.71941C37.747 6.17266 41.0757 16.8275 41.0757 24.8383C41.0757 31.5537 34.2718 44.9892 23.1001 46.6409C23.5717 46.7487 24.0966 46.8087 24.6847 46.8087C37.2096 46.8087 44.95 32.0009 44.95 24.8383C44.95 16.2244 41.1022 4.55078 31.9741 4.55078Z"--}}
                    {{--                                    fill="#EB866C"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M34.8036 33.0365C34.6581 33.5305 34.1377 33.8179 33.6386 33.6702C33.1423 33.5227 32.8586 33.0015 33.0061 32.5052C33.0148 32.4727 33.9623 29.1477 32.6048 26.9252C31.9848 25.909 30.9861 25.2815 29.5511 25.004C25.3811 24.2002 22.7836 22.8277 21.4111 21.8977C20.9173 20.8702 20.5248 19.7615 20.3311 18.5527C21.6143 19.6901 23.6802 21.9622 29.9061 23.164C31.8648 23.5415 33.3123 24.4815 34.2111 25.9565C35.9973 28.8965 34.8536 32.869 34.8036 33.0365Z"--}}
                    {{--                                    fill="#EB866C"/>--}}
                    {{--                            </g>--}}
                    {{--                            <defs>--}}
                    {{--                                <clipPath id="clip0_5948_28275">--}}
                    {{--                                    <rect width="64" height="64" fill="white"/>--}}
                    {{--                                </clipPath>--}}
                    {{--                            </defs>--}}
                    {{--                        </svg>--}}
                    {{--                        <span>Otology</span>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-containerNho">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-container">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}
                    {{--            <div class="col-md-4">--}}
                    {{--                <div class="border-HomeNew">--}}
                    {{--                    <div class="w-75 d-flex align-items-center ">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">--}}
                    {{--                            <g clip-path="url(#clip0_5948_32522)">--}}
                    {{--                                <path--}}
                    {{--                                    d="M28.0347 2.16114L28.5658 3.72214C29.014 5.03927 29.2426 6.42102 29.2426 7.81239V14.3451C29.2426 16.5136 28.5496 18.6254 27.2648 20.3724L16.9463 34.4021C14.5628 37.6429 13.2773 41.5605 13.2773 45.5834C13.2773 47.6479 13.7291 49.6753 14.5873 51.5281C15.1825 52.813 17.1095 52.3874 17.1095 50.9713V47.8719C17.1095 43.5038 18.6247 39.2709 21.3968 35.8951L31.8011 23.2254C31.9041 23.0999 32.0961 23.0999 32.1992 23.2254L42.6035 35.8951C45.3756 39.2709 46.8908 43.5038 46.8908 47.8719V50.9713C46.8908 52.3874 48.8177 52.813 49.413 51.5281C50.2712 49.6753 50.723 47.6479 50.723 45.5834C50.723 41.5605 49.4375 37.6429 47.054 34.4021L36.7355 20.3724C35.4507 18.6255 34.7577 16.5138 34.7577 14.3453V7.81239C34.7577 6.42114 34.9863 5.03927 35.4345 3.72214L35.9656 2.16114C36.0508 1.91052 35.8646 1.65039 35.5998 1.65039H28.4005C28.1357 1.65039 27.9495 1.91052 28.0347 2.16114Z"--}}
                    {{--                                    fill="#F25555"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M63.6638 56.4404C63.3895 56.9271 62.9594 57.325 62.4236 57.5555L57.0654 59.8656C53.0554 61.595 48.4853 61.4521 44.5913 59.4767C42.5928 58.462 40.88 57.0211 39.555 55.2839C38.2286 53.5467 37.2899 51.5134 36.8405 49.3191V49.3179C36.4014 47.1815 36.1181 45.0195 35.9893 42.8496L41.6893 46.0854C43.1096 47.3229 44.7283 48.2835 46.4641 48.9339C48.2 49.5841 50.0504 49.9254 51.9344 49.9254C55.7241 49.9254 59.4469 52.112 62.2928 54.614L63.6638 56.4404Z"--}}
                    {{--                                    fill="#F25555"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M63.335 53.5726V55.1668L62.2928 54.615C61.817 54.1967 61.17 54.4386 60.652 54.0842C58.0715 52.3187 55.0063 51.3612 51.85 51.3612C49.9662 51.3612 48.1157 51.02 46.3798 50.3697C44.6439 49.7195 43.0253 48.7587 41.6049 47.5212L35.9892 42.8506C35.8243 40.1181 35.9068 37.3726 36.2364 34.6465L36.4775 32.6467L37.3747 31.8541L36.7255 30.5901L37.2548 26.2002L38.0534 25.2125L37.4877 24.2687L39.1635 10.3665C39.2988 9.24733 40.024 8.3297 41.005 7.9082C41.005 7.9082 41.8237 7.94795 42.2529 7.94795C44.6777 7.94795 46.5358 9.16208 48.2703 10.8567C50.7132 13.2428 52.1352 15.8738 53.5787 18.9102C55.0222 21.9467 55.8888 24.944 56.1965 28.3448C56.282 29.3176 56.6289 30.529 57.2705 31.5925C61.0075 38.353 63.335 45.8476 63.335 53.5726Z"--}}
                    {{--                                    fill="#FF7E7B"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M63.9998 53.5657V55.16C63.9998 55.6183 63.88 56.0574 63.6636 56.4412L62.1441 55.2436C61.669 54.8251 61.1694 54.4387 60.6516 54.0846V53.5656C60.6516 45.8406 58.6904 38.243 54.9535 31.4825C54.4331 30.5838 54.0023 29.5372 53.8795 28.2348C53.5718 24.834 52.6626 21.5438 51.2191 18.5073C49.7756 15.4708 47.8003 12.6881 45.3574 10.302C44.1418 9.11333 42.6339 8.29183 41.0049 7.90808C41.3784 7.74708 41.7878 7.6582 42.2179 7.6582C44.6426 7.6582 46.9709 8.6072 48.7054 10.302C51.1481 12.6881 53.1235 15.4708 54.5671 18.5073C56.0106 21.5438 56.9198 24.834 57.2275 28.2348C57.313 29.2076 57.6599 30.419 58.3015 31.4825C62.0385 38.2431 63.9998 45.8407 63.9998 53.5657Z"--}}
                    {{--                                    fill="#FF6464"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M47.0354 36.623C46.1623 37.1187 45.1863 37.4111 44.1883 37.4818C45.2609 38.9151 46.6079 40.1358 48.148 41.0578L49.258 41.7223C49.7152 41.9966 49.8645 42.5902 49.5903 43.0473C49.4087 43.35 49.0894 43.5173 48.761 43.5173C48.591 43.5173 48.421 43.4736 48.2653 43.3796L47.1553 42.7151C44.8838 41.354 42.9779 39.4262 41.6452 37.138C40.5854 35.3185 39.0195 33.8826 37.1163 32.9837C37.1022 32.9773 37.0879 32.9708 37.0738 32.9631L36.4775 32.6463L36.726 30.5898L37.9623 31.2478C39.9969 32.2123 41.7044 33.6983 42.9393 35.5668H43.7235C44.5489 35.5668 45.3642 35.3505 46.08 34.9436C47.0883 34.3706 48.2332 34.068 49.392 34.068H49.607C50.1402 34.068 50.5728 34.5006 50.5728 35.0337C50.5728 35.5668 50.1402 35.9995 49.607 35.9995H49.392C48.5665 35.9997 47.7528 36.2147 47.0354 36.623Z"--}}
                    {{--                                    fill="#FF6464"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M38.7015 26.2005H37.2554L37.4885 24.2688H38.7015C39.3274 24.2688 39.9506 24.332 40.5622 24.4505L40.5802 24.4337C41.922 23.249 43.5639 22.4738 45.332 22.1918C45.8574 22.1081 46.3531 22.4661 46.4369 22.9941C46.5219 23.5207 46.1626 24.0152 45.6359 24.099C44.625 24.26 43.667 24.6256 42.8119 25.1677C43.4917 25.4767 44.1395 25.8618 44.7357 26.319C45.1581 26.6435 45.238 27.25 44.9135 27.6736C44.7229 27.9208 44.437 28.0508 44.1472 28.0508C43.9412 28.0508 43.7339 27.9865 43.5587 27.8512C42.1732 26.7877 40.4477 26.2005 38.7015 26.2005Z"--}}
                    {{--                                    fill="#FF6464"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M0.335938 56.4404C0.610188 56.9271 1.04031 57.325 1.57606 57.5555L6.93431 59.8656C10.9443 61.595 15.5144 61.4521 19.4084 59.4767C21.4069 58.462 23.1197 57.0211 24.4447 55.2839C25.7711 53.5467 26.7098 51.5134 27.1592 49.3191V49.3179C27.5983 47.1815 27.8816 45.0195 28.0104 42.8496L21.6677 46.2884C20.2473 47.5259 18.6287 48.4865 16.8928 49.1369C15.1569 49.7871 13.3066 50.1284 11.4226 50.1284C7.63281 50.1284 4.49181 51.8695 1.64594 54.3715L0.335938 56.4404Z"--}}
                    {{--                                    fill="#F25555"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M0 53.5654V55.1596C0 55.618 0.11975 56.0571 0.336125 56.4409L1.85563 55.2433C4.7015 52.7413 8.35987 51.3608 12.1496 51.3608C14.0335 51.3608 15.884 51.0195 17.6199 50.3693C19.3557 49.719 20.9744 48.7583 22.3948 47.5208L28.0105 42.8501C28.1754 40.1176 27.6209 37.6096 27.2913 34.8835L24.4795 10.8623C24.2927 9.31702 23.2489 8.02627 21.692 8.02627C21.025 8.02627 20.5149 7.92927 19.8131 7.86914C18.1211 8.23652 16.5518 9.07314 15.2942 10.3016C12.8515 12.6878 10.8761 15.4705 9.4325 18.507C7.989 21.5435 7.07987 24.8336 6.77212 28.2345C6.68662 29.2073 6.33975 30.4186 5.69812 31.4821C1.96125 38.2428 0 45.8404 0 53.5654Z"--}}
                    {{--                                    fill="#FF7E7B"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M28.0106 42.8503L25.0644 45.3008C25.1467 42.276 24.9677 37.0838 24.6729 34.6462L21.7459 10.3662C21.6067 9.21245 20.8406 8.27233 19.813 7.86933C20.4556 7.7302 21.1149 7.6582 21.7819 7.6582C23.3387 7.6582 24.6496 8.82095 24.8364 10.3663L26.5124 24.2685L26.255 25.2183L26.7452 26.2001L27.2745 30.59L26.7449 31.854L27.5224 32.6466L27.7635 34.6463C28.093 37.3723 28.1755 40.1178 28.0106 42.8503Z"--}}
                    {{--                                    fill="#FF6464"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M21.0607 35.5679H20.2765C19.4511 35.5679 18.6359 35.3515 17.92 34.9447C16.9117 34.3717 15.7669 34.069 14.608 34.069H14.393C13.8599 34.069 13.4272 34.5017 13.4272 35.0348C13.4272 35.5679 13.8599 36.0005 14.393 36.0005H14.608C15.4334 36.0005 16.2472 36.2155 16.9645 36.6238C17.8376 37.1195 18.8136 37.4119 19.8116 37.4827C18.739 38.9159 17.392 40.1367 15.8519 41.0587L14.7419 41.7232C14.2847 41.9974 14.1354 42.591 14.4096 43.0482C14.5912 43.3508 14.9105 43.5182 15.2389 43.5182C15.4089 43.5182 15.5789 43.4744 15.7346 43.3804L16.8446 42.7159C19.1161 41.3548 21.022 39.427 22.3547 37.1388C23.2474 35.6062 24.5001 34.3474 26.01 33.4509C25.8372 32.8313 25.5906 32.2283 25.359 31.5977C23.6227 32.5563 22.1557 33.9113 21.0607 35.5679Z"--}}
                    {{--                                    fill="#FF6464"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M23.4379 24.4505L23.4199 24.4337C22.0781 23.249 20.4362 22.4738 18.6681 22.1918C18.1427 22.1081 17.647 22.4661 17.5632 22.9941C17.4782 23.5207 17.8375 24.0152 18.3642 24.099C19.3751 24.26 20.3331 24.6256 21.1882 25.1677C20.5084 25.4767 19.8606 25.8618 19.2644 26.319C18.842 26.6435 18.7621 27.25 19.0866 27.6736C19.2772 27.9208 19.5631 28.0508 19.8529 28.0508C20.0589 28.0508 20.2662 27.9865 20.4414 27.8512C21.7491 26.8473 23.3597 26.2685 25.0046 26.2065C24.9365 25.5642 24.8002 24.9488 24.702 24.29C24.2771 24.317 23.8546 24.3697 23.4379 24.4505Z"--}}
                    {{--                                    fill="#FF6464"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M25.299 26.1991C24.753 26.1991 24.2082 26.2571 23.6751 26.3678L23.4434 24.4478C24.0537 24.3307 24.6744 24.2676 25.299 24.2676H26.512L26.7451 26.1992H25.299V26.1991Z"--}}
                    {{--                                    fill="#F25555"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M27.523 32.6463C26.6107 33.116 25.5337 33.6555 24.6449 34.4157L24.3784 32.1982C24.9025 31.8415 25.4575 31.5235 26.0383 31.2478L27.2745 30.5898L27.523 32.6463Z"--}}
                    {{--                                    fill="#F25555"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M19.8735 50.2239C19.8735 51.5735 20.0935 52.8717 20.5004 54.0843C22.5803 58.3318 26.581 61.7009 31.9287 61.7009C38.6258 61.7009 43.4995 56.921 43.4995 50.2239C43.4995 44.8764 40.1143 41.2115 35.8604 38.7243C34.6478 38.3174 33.3494 38.0977 31.9998 38.0977C25.3027 38.0977 19.8735 43.5268 19.8735 50.2239Z"--}}
                    {{--                                    fill="#8DB9FF"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M44.1264 50.224C44.1264 56.9215 38.6974 62.3505 31.9999 62.3505C26.652 62.3505 22.1127 58.8891 20.5005 54.0846C21.7135 54.4929 23.0129 54.713 24.3624 54.713C31.0597 54.713 36.4889 49.284 36.4889 42.5865C36.4889 41.237 36.2686 39.9376 35.8605 38.7246C40.665 40.3369 44.1264 44.8761 44.1264 50.224Z"--}}
                    {{--                                    fill="#70ABF2"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M25.7297 48.0073H29.5247C29.6669 48.0073 29.7822 47.892 29.7822 47.7498V43.9548C29.7822 43.8125 29.8974 43.6973 30.0397 43.6973H33.9594C34.1017 43.6973 34.2169 43.8125 34.2169 43.9548V47.7498C34.2169 47.892 34.3322 48.0073 34.4744 48.0073H35.2123L38.0453 48.2004C38.1875 48.2004 38.3028 48.3156 38.3028 48.4579L38.3845 52.0059C38.3845 52.1481 38.2693 52.2634 38.127 52.2634L34.2832 52.2506C34.1409 52.2506 34.0257 52.3659 34.0257 52.5081L34.1544 56.1486C34.1544 56.2909 34.0392 56.4061 33.8969 56.4061L30.2644 56.5629C30.1222 56.5629 30.0069 56.4476 30.0069 56.3054L29.7822 53.4373V52.6996C29.7822 52.5574 29.6669 52.4421 29.5247 52.4421H25.7297C25.5874 52.4421 25.4722 52.3269 25.4722 52.1846V48.2649C25.472 48.1225 25.5874 48.0073 25.7297 48.0073Z"--}}
                    {{--                                    fill="#F5F8F9"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M38.5271 48.2635V52.1834C38.5271 52.3262 38.4112 52.4409 38.2696 52.4409H34.4746C34.333 52.4409 34.2171 52.5567 34.2171 52.6984V56.4932C34.2171 56.6361 34.1012 56.7507 33.9596 56.7507H30.0397C29.8981 56.7507 29.7822 56.6361 29.7822 56.4932V53.4362C32.1272 52.2631 34.0395 50.3509 35.2126 48.0059H38.2696C38.4111 48.0059 38.5271 48.1219 38.5271 48.2635Z"--}}
                    {{--                                    fill="#E8EDF2"/>--}}
                    {{--                            </g>--}}
                    {{--                            <defs>--}}
                    {{--                                <clipPath id="clip0_5948_32522">--}}
                    {{--                                    <rect width="64" height="64" fill="white"/>--}}
                    {{--                                </clipPath>--}}
                    {{--                            </defs>--}}
                    {{--                        </svg>--}}
                    {{--                        <span>Internal medicine</span>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-containerNho">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-container">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}
                    {{--            <div class="col-md-4">--}}
                    {{--                <div class="border-HomeNew">--}}
                    {{--                    <div class="w-75 d-flex align-items-center ">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">--}}
                    {{--                            <path--}}
                    {{--                                d="M53.771 60.8331C54.1013 61.5168 54.0569 62.3223 53.6534 62.9656C53.25 63.6089 52.5441 63.9996 51.7848 64H29.5282C28.5806 63.9961 27.7412 63.3876 27.4427 62.4882C26.8132 60.5397 25.8335 58.7223 24.5517 57.1255C23.9836 56.446 23.2761 55.8966 22.4772 55.5145L22.4661 55.5034C19.3239 56.6412 16.123 57.61 12.8772 58.4055C11.295 58.7429 9.7295 57.7676 9.3351 56.1986C8.39717 53.4841 9.69924 52.7448 9.27993 51.1227C8.99303 49.9972 7.93372 49.7213 7.0951 49.1255C6.422 48.651 7.63579 47.0951 7.63579 47.0951C7.63579 47.0951 6.34476 46.1351 5.88131 45.7158C5.39579 45.3076 6.0689 44.6234 6.68683 43.3324C6.93905 42.7761 7.00858 42.1541 6.88545 41.5558C6.66476 40.3641 4.87717 39.9227 3.99441 39.2607C2.15165 37.8924 2.05234 37.5613 6.86338 32.3641C7.87095 31.1928 8.50842 29.7489 8.6951 28.2151C8.78338 27.6965 9.31303 27.1338 9.302 26.5048C9.27993 24.9269 6.99579 24.2758 6.78614 22.742C6.62062 21.5503 8.15441 19.3765 8.65096 17.2469C8.92256 15.9433 9.27263 14.6572 9.69924 13.3958C10.6154 10.8556 12.0382 8.52803 13.8813 6.55445C16.5848 3.68549 20.3365 2.44962 24.1323 1.56686C38.0137 -1.63314 44.9765 0.121347 52.8882 6.3448C55.872 8.56598 58.0494 11.7003 59.0896 15.2717C59.8862 18.2199 60.2578 21.2667 60.193 24.32C60.0827 32.4193 54.9296 35.2551 52.6344 40.4965C51.2303 43.7268 50.705 47.2709 51.1117 50.7696C51.4169 54.2395 52.3126 57.6317 53.7599 60.8L53.771 60.8331Z"--}}
                    {{--                                fill="#FDD7AD"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M34.7584 49.6322C34.8246 52.3797 32.4633 54.5315 27.7405 56.0211C27.4315 56.1204 26.8026 56.3411 25.986 56.628C25.5557 56.7715 25.0702 56.948 24.5515 57.1246C23.9835 56.4451 23.276 55.8957 22.4771 55.5135C23.5253 55.1494 24.4743 54.8184 25.2467 54.5425C26.1074 54.2446 26.7474 54.0129 27.0784 53.9135C31.6467 52.4791 32.5736 50.8129 32.5515 49.6763C32.5456 49.3836 32.6562 49.1006 32.8591 48.8895C33.0619 48.6784 33.3402 48.5566 33.6329 48.5508H33.655C34.2559 48.5507 34.7464 49.0314 34.7584 49.6322Z"--}}
                    {{--                                fill="#F9C795"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M47.8765 27.5141C46.7129 26.1408 45.0496 25.2884 43.2553 25.1461C43.5791 23.9855 43.5277 22.7523 43.1085 21.6227C43.8633 19.6761 45.1401 17.9752 46.7984 16.7069C47.1229 16.4775 47.2989 16.0913 47.2593 15.696C47.2197 15.3006 46.9705 14.9571 46.6071 14.7965C46.2436 14.636 45.8219 14.6833 45.503 14.9204C43.8374 16.172 42.493 17.8012 41.5802 19.6741C40.8742 19.1452 40.1065 18.7042 39.2939 18.361C38.2037 16.2854 38.6175 13.3138 39.1835 11.1367C39.3374 10.5468 38.9839 9.94379 38.394 9.78992C37.8041 9.63604 37.2011 9.98952 37.0473 10.5794C36.408 12.7808 36.2637 15.0964 36.6246 17.3601C35.6867 17.0659 34.6568 16.7907 33.535 16.5347C32.5198 16.3063 31.5543 16.1121 30.6462 15.9477C29.4432 14.8899 28.6225 13.465 28.3113 11.8936C28.1827 11.2973 27.595 10.9182 26.9987 11.0467C26.4024 11.1753 26.0232 11.763 26.1518 12.3593C26.3802 13.4287 26.78 14.4542 27.3358 15.396C24.7195 15.012 22.2787 14.7571 20.4944 14.6004C20.0983 14.5592 19.7107 14.7347 19.4802 15.0596C19.2498 15.3845 19.2124 15.8083 19.3823 16.1686C19.5521 16.5288 19.903 16.7696 20.3002 16.7985C22.7002 17.0103 26.3173 17.3998 29.9278 18.0553L30.1044 18.0884C28.7627 19.1688 27.5984 20.4526 26.6539 21.8931C26.4203 22.2201 26.383 22.6483 26.5565 23.0108C26.73 23.3734 27.0869 23.6129 27.4881 23.636C27.8894 23.6592 28.2715 23.4624 28.4856 23.1223C29.5086 21.4956 30.8924 20.1261 32.5298 19.1201C32.7938 18.979 33.0682 18.8583 33.3507 18.7593C34.9104 19.1066 36.4408 19.5747 37.9278 20.1596C37.9619 20.1786 37.9969 20.1959 38.0326 20.2114L38.0514 20.2203L38.0691 20.2291C39.0013 20.5689 39.8604 21.083 40.6004 21.7441C40.7364 21.8798 40.8537 22.033 40.9491 22.1998C41.4566 23.055 41.3452 24.3229 40.596 26.1954C40.1866 27.2283 39.6481 28.3041 39.0776 29.4429C37.1311 33.3281 34.9264 37.732 38.4829 40.5877C42.6329 43.908 42.7797 55.3739 42.4862 59.5096C42.4649 59.8017 42.5607 60.0903 42.7523 60.3118C42.944 60.5332 43.2158 60.6694 43.508 60.6903H43.5863C44.1664 60.6918 44.6486 60.2439 44.6898 59.6652C44.7372 59.0109 45.7678 43.5847 39.8666 38.8641C37.8528 37.2498 39.0291 34.4779 41.0539 30.4338C41.546 29.4528 42.036 28.4476 42.4509 27.4655C43.6062 27.0826 44.8972 27.6067 46.2953 29.0501C46.7205 29.482 47.4144 29.4901 47.8496 29.0682C48.2848 28.6464 48.2983 27.9525 47.8798 27.5141H47.8765Z"--}}
                    {{--                                fill="#FF5364"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M39.1722 11.0348C41.0004 11.0348 42.4825 9.55266 42.4825 7.72441C42.4825 5.89615 41.0004 4.41406 39.1722 4.41406C37.3439 4.41406 35.8618 5.89615 35.8618 7.72441C35.8618 9.55266 37.3439 11.0348 39.1722 11.0348Z"--}}
                    {{--                                fill="#F29C1F"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M49.1033 17.6558C50.9316 17.6558 52.4137 16.1738 52.4137 14.3455C52.4137 12.5172 50.9316 11.0352 49.1033 11.0352C47.2751 11.0352 45.793 12.5172 45.793 14.3455C45.793 16.1738 47.2751 17.6558 49.1033 17.6558Z"--}}
                    {{--                                fill="#F29C1F"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M27.0345 12.1383C28.8627 12.1383 30.3448 10.6562 30.3448 8.82792C30.3448 6.99967 28.8627 5.51758 27.0345 5.51758C25.2062 5.51758 23.7241 6.99967 23.7241 8.82792C23.7241 10.6562 25.2062 12.1383 27.0345 12.1383Z"--}}
                    {{--                                fill="#F29C1F"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M17.1033 18.7594C18.9316 18.7594 20.4137 17.2773 20.4137 15.449C20.4137 13.6208 18.9316 12.1387 17.1033 12.1387C15.2751 12.1387 13.793 13.6208 13.793 15.449C13.793 17.2773 15.2751 18.7594 17.1033 18.7594Z"--}}
                    {{--                                fill="#F29C1F"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M25.931 28.689C27.7592 28.689 29.2413 27.207 29.2413 25.3787C29.2413 23.5505 27.7592 22.0684 25.931 22.0684C24.1027 22.0684 22.6206 23.5505 22.6206 25.3787C22.6206 27.207 24.1027 28.689 25.931 28.689Z"--}}
                    {{--                                fill="#F29C1F"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M49.1033 34.2066C50.9316 34.2066 52.4137 32.7245 52.4137 30.8963C52.4137 29.068 50.9316 27.5859 49.1033 27.5859C47.2751 27.5859 45.793 29.068 45.793 30.8963C45.793 32.7245 47.2751 34.2066 49.1033 34.2066Z"--}}
                    {{--                                fill="#F29C1F"/>--}}
                    {{--                        </svg>--}}
                    {{--                        <span>Nerve</span>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-containerNho">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-container">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}
                    {{--            <div class="col-md-4">--}}
                    {{--                <div class="border-HomeNew">--}}
                    {{--                    <div class="w-75 d-flex align-items-center ">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">--}}
                    {{--                            <g clip-path="url(#clip0_5948_34829)">--}}
                    {{--                                <path--}}
                    {{--                                    d="M58 1H46C46 1 41.79 5.24 38.78 8.25C34.55 12.49 28.71 7.25 17.98 18C7.25 28.75 12.48 34.59 8.24 38.83C5.23 41.84 1 46 1 46V63H18C18 63 22.21 58.76 25.22 55.75C29.45 51.51 35.29 56.75 46.02 46C56.75 35.25 51.52 29.41 55.76 25.17C58.77 22.16 63 18 63 18V1H58Z"--}}
                    {{--                                    fill="#FCB8AE"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M19.2697 21.4478C14.9407 25.9188 12.6237 32.7698 14.8947 38.5648C15.4797 39.9356 16.1823 41.2532 16.9947 42.5028C17.7137 43.8052 18.591 45.0137 19.6067 46.1008C22.2247 48.6748 26.1627 49.4168 29.8307 49.2758C32.8729 49.2616 35.8526 48.4109 38.4437 46.8168C40.4881 45.3028 42.2486 43.4391 43.6437 41.3118C46.2013 37.9494 48.3238 34.2773 49.9607 30.3828C51.14 27.8146 51.51 24.9483 51.0217 22.1648C50.6584 20.8205 50.0929 19.5392 49.3447 18.3648C46.3587 13.3648 41.0127 9.46979 35.2167 12.3958C29.6527 15.2008 23.7507 16.8198 19.2697 21.4478Z"--}}
                    {{--                                    fill="#FC8F90"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M23.8299 24.9421C22.6866 25.8001 21.7426 26.8955 21.0629 28.1531C20.5775 29.3128 20.3293 30.5579 20.3329 31.8151C20.1633 33.3209 20.4622 34.8424 21.1889 36.1721C21.6693 36.8471 22.2643 37.4326 22.9469 37.9021C24.6329 39.253 26.642 40.1409 28.7759 40.4781C30.3936 40.5913 32.0167 40.3552 33.5351 39.7858C35.0535 39.2164 36.4316 38.3271 37.5759 37.1781C39.8477 34.8637 41.6568 32.1369 42.9059 29.1441C43.7785 27.3442 44.489 25.4701 45.0289 23.5441C45.3272 22.5673 45.4411 21.5436 45.365 20.5251C45.3233 20.0161 45.1764 19.5212 44.9335 19.0719C44.6906 18.6227 44.357 18.2287 43.9539 17.9151C41.3539 16.0791 36.632 17.8931 34.0739 18.8941C30.3562 20.346 26.8971 22.3882 23.8299 24.9421Z"--}}
                    {{--                                    fill="#FB6769"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M25.06 48.1399C25.1559 48.2411 25.2596 48.3347 25.37 48.4199L25.36 48.4299C20.01 48.4299 19.19 49.7799 17.55 51.4199L6 62.9999H1V57.9999L12.63 46.4999C14.27 44.8599 15.62 44.0399 15.62 38.6799L15.63 38.6699C15.72 38.7699 15.81 38.8699 15.91 38.9699C15.91 38.9699 18.64 42.1999 22.32 42.1999C22.65 46.6299 25.06 48.1399 25.06 48.1399Z"--}}
                    {{--                                    fill="#FFFAED"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M25.06 48.1399C25.06 48.1399 22.65 46.6299 22.32 42.1999C18.64 42.1999 15.91 38.9699 15.91 38.9699C15.81 38.8699 15.72 38.7699 15.63 38.6699L15.62 38.6799C15.6421 39.8843 15.5392 41.0878 15.313 42.2709C16.7251 43.446 18.4845 44.1238 20.32 44.1999C20.3937 45.8131 20.8888 47.3787 21.756 48.7409C22.9418 48.5115 24.1484 48.4073 25.356 48.4299L25.366 48.4199C25.257 48.3346 25.1547 48.241 25.06 48.1399Z"--}}
                    {{--                                    fill="#E7E3D8"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M51.2598 17.61C49.6198 19.25 48.2698 20.07 48.2698 25.43L48.2598 25.44C48.1698 25.34 48.0798 25.24 47.9798 25.14C47.9798 25.14 45.2498 21.91 41.5698 21.91H41.5598C41.2398 17.48 38.8198 15.98 38.8198 15.98C38.7238 15.8788 38.6202 15.7852 38.5098 15.7L38.5298 15.68C43.8798 15.68 44.6998 14.33 46.3398 12.69L57.9998 1H62.9998V6L51.2598 17.61Z"--}}
                    {{--                                    fill="#FFFAED"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M43.5699 19.9091H43.5599C43.4903 18.2959 42.9956 16.7297 42.1259 15.3691C40.94 15.5981 39.7334 15.702 38.5259 15.6791L38.5059 15.6991C38.6163 15.7843 38.7199 15.8779 38.8159 15.9791C38.8159 15.9791 41.2359 17.4791 41.5559 21.9091H41.5659C45.2459 21.9091 47.9759 25.1391 47.9759 25.1391C48.0759 25.2391 48.1659 25.3391 48.2559 25.4391L48.2659 25.4291C48.2437 24.2247 48.3466 23.0213 48.5729 21.8381C47.1618 20.6639 45.4039 19.9861 43.5699 19.9091Z"--}}
                    {{--                                    fill="#E7E3D8"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M22.32 42.1992C18.64 42.1992 15.91 38.9692 15.91 38.9692C15.81 38.8692 15.72 38.7692 15.63 38.6692C14.5596 37.3147 14.0383 35.6069 14.1699 33.8855C14.3015 32.1641 15.0762 30.5553 16.34 29.3792C19.11 26.6092 23.4 26.4192 25.92 28.9492C29.45 32.4792 25.12 35.5392 26.8 37.2292C28.48 38.9192 30.81 33.8392 35.08 38.1092C37.6 40.6392 37.41 44.9392 34.65 47.7092C33.4784 48.9771 31.8707 49.7549 30.1494 49.8866C28.4282 50.0183 26.7208 49.4941 25.37 48.4192C25.2596 48.334 25.1559 48.2404 25.06 48.1392C25.06 48.1392 22.65 46.6292 22.32 42.1992Z"--}}
                    {{--                                    fill="#D7D3C8"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M35.0797 38.1092C30.8097 33.8392 28.4897 38.9192 26.7997 37.2292C25.1097 35.5392 29.4497 32.4792 25.9197 28.9492C23.3997 26.4192 19.1097 26.6092 16.3397 29.3792C15.9202 29.8018 15.551 30.2716 15.2397 30.7792C16.478 29.9512 17.9603 29.5671 19.4449 29.6895C20.9294 29.8119 22.3288 30.4336 23.4147 31.4532C26.9447 34.9832 22.6147 38.0432 24.2947 39.7332C25.9747 41.4232 28.3047 36.3432 32.5747 40.6132C33.5923 41.7072 34.2113 43.1123 34.3316 44.6016C34.4519 46.0908 34.0665 47.5771 33.2377 48.8202C33.7501 48.5061 34.224 48.1333 34.6497 47.7092C37.4097 44.9392 37.5997 40.6392 35.0797 38.1092Z"--}}
                    {{--                                    fill="#C8C5BB"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M41.5699 21.9091C45.2499 21.9091 47.9799 25.1391 47.9799 25.1391C48.0799 25.2391 48.1699 25.3391 48.2599 25.4391C49.3303 26.7936 49.8516 28.5014 49.72 30.2228C49.5885 31.9442 48.8137 33.553 47.5499 34.7291C44.7799 37.4991 40.4899 37.6891 37.9699 35.1591C34.4399 31.6291 38.7699 28.5691 37.0899 26.8791C35.4099 25.1891 33.0799 30.2691 28.8099 25.9991C26.2899 23.4691 26.4799 19.1691 29.2399 16.3991C30.4106 15.1326 32.0175 14.3563 33.7373 14.2264C35.4571 14.0965 37.1623 14.6227 38.5099 15.6991C38.6203 15.7843 38.724 15.8779 38.8199 15.9791C38.8199 15.9791 41.2399 17.4791 41.5599 21.9091H41.5699Z"--}}
                    {{--                                    fill="#D7D3C8"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M40.47 32.7492C36.94 29.2192 41.27 26.1592 39.59 24.4692C37.91 22.7792 35.58 27.8592 31.31 23.5892C30.2741 22.473 29.652 21.0356 29.5474 19.5163C29.4427 17.9971 29.8619 16.4879 30.735 15.2402C30.1895 15.5637 29.6857 15.953 29.235 16.3992C26.475 19.1692 26.285 23.4692 28.805 25.9992C33.075 30.2692 35.395 25.1892 37.085 26.8792C38.775 28.5692 34.435 31.6292 37.965 35.1592C40.485 37.6892 44.775 37.4992 47.545 34.7292C47.9228 34.3488 48.2596 33.9299 48.55 33.4792C47.3153 34.2779 45.8487 34.64 44.3841 34.5077C42.9196 34.3754 41.5416 33.7563 40.47 32.7492Z"--}}
                    {{--                                    fill="#C8C5BB"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M45.2197 12.4C43.9197 13.739 43.0387 14.632 38.8537 14.677C37.5824 13.7064 36.0241 13.1867 34.4247 13.2C32.2082 13.2249 30.0909 14.1233 28.5327 15.7C25.3847 18.853 25.1917 23.792 28.1057 26.709C31.2247 29.833 33.7157 28.64 35.2057 27.927C36.0857 27.506 36.2637 27.473 36.3797 27.59C36.5937 27.804 36.5077 28.19 36.1417 29.256C35.5797 30.883 34.7317 33.341 37.2597 35.872C37.9315 36.5382 38.7288 37.0644 39.6055 37.4203C40.4821 37.7761 41.4207 37.9545 42.3667 37.945C44.5836 37.9202 46.7013 37.0218 48.2597 35.445C49.6514 34.1349 50.521 32.3647 50.7073 30.4625C50.8935 28.5603 50.3839 26.6551 49.2727 25.1C49.3187 20.916 50.2107 20.036 51.5477 18.734L63.6997 6.71097L62.2997 5.28897L50.5537 16.906L50.1537 17.299C49.2946 18.0248 48.6014 18.9266 48.1209 19.9434C47.6405 20.9603 47.3839 22.0684 47.3687 23.193C45.9736 22.0148 44.2799 21.2454 42.4747 20.97C42.2889 19.3889 41.71 17.8796 40.7907 16.58C41.9106 16.5622 43.0136 16.3043 44.0252 15.8236C45.0368 15.343 45.9335 14.6509 46.6547 13.794L58.7077 1.70697L57.2917 0.292969L45.6327 11.979L45.2197 12.4ZM42.5197 24.563C42.5727 24.019 42.5997 23.502 42.6037 23.013C44.4065 23.4692 46.0313 24.4549 47.2687 25.843C49.4037 27.981 49.2127 31.652 46.8427 34.026C45.6602 35.2286 44.0512 35.9163 42.3647 35.94C41.6818 35.9488 41.0039 35.822 40.3703 35.5669C39.7367 35.3118 39.1601 34.9335 38.6737 34.454C37.0287 32.807 37.5147 31.396 38.0297 29.904C38.4297 28.746 38.9297 27.304 37.7937 26.172C37.602 25.966 37.3698 25.8018 37.1117 25.6896C36.8536 25.5774 36.5752 25.5196 36.2937 25.52C35.6066 25.5743 34.9399 25.7792 34.3407 26.12C32.9517 26.784 31.6407 27.413 29.5217 25.292C27.3867 23.154 27.5787 19.483 29.9497 17.109C31.1323 15.9089 32.7401 15.2231 34.4247 15.2C35.1078 15.1912 35.7857 15.3182 36.4193 15.5734C37.0529 15.8287 37.6295 16.2072 38.1157 16.687C38.1683 16.7372 38.2252 16.7827 38.2857 16.823C38.3997 16.898 41.0857 18.729 40.5277 24.374L42.5197 24.563Z"--}}
                    {{--                                    fill="black"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M18.6688 51.7093C19.9688 50.3703 20.8498 49.4763 25.0358 49.4313C26.3062 50.4044 27.8646 50.9265 29.4648 50.9153C31.6808 50.8906 33.7976 49.9921 35.3548 48.4153C38.5048 45.2633 38.6968 40.3243 35.7828 37.4073C32.6638 34.2833 30.1748 35.4763 28.6828 36.1883C27.8038 36.6073 27.6268 36.6433 27.5078 36.5253C27.2948 36.3123 27.3808 35.9253 27.7468 34.8593C28.3078 33.2323 29.1558 30.7743 26.6278 28.2443C25.9561 27.5779 25.1589 27.0514 24.2822 26.6954C23.4055 26.3393 22.4669 26.1609 21.5208 26.1703C19.3046 26.1957 17.1879 27.094 15.6298 28.6703C14.2384 29.9798 13.3688 31.7492 13.182 33.6507C12.9952 35.5522 13.5039 37.457 14.6138 39.0123C14.5678 43.1963 13.6748 44.0773 12.3388 45.3783L0.299805 57.2883L1.6998 58.7103L13.3358 47.1993L13.7358 46.8063C14.5952 46.081 15.2887 45.1794 15.7692 44.1627C16.2497 43.1459 16.506 42.0378 16.5208 40.9133C17.9166 42.0909 19.6105 42.8602 21.4158 43.1363C21.6011 44.7184 22.1801 46.2287 23.0998 47.5293C21.9795 47.5473 20.8761 47.8055 19.8641 48.2865C18.8522 48.7674 17.9552 49.46 17.2338 50.3173L5.2918 62.2923L6.7078 63.7063L18.2578 52.1303L18.6688 51.7093ZM21.3688 39.5453C21.3148 40.0903 21.2888 40.6063 21.2848 41.0963C19.4817 40.6403 17.8567 39.6542 16.6198 38.2653C14.4838 36.1273 14.6758 32.4573 17.0458 30.0823C18.2283 28.8803 19.8368 28.1926 21.5228 28.1683C22.206 28.1595 22.8841 28.2864 23.5179 28.5417C24.1516 28.797 24.7284 29.1755 25.2148 29.6553C26.8598 31.3023 26.3738 32.7123 25.8578 34.2053C25.4578 35.3633 24.9628 36.8053 26.0948 37.9373C27.2468 39.0903 28.5768 38.4553 29.5478 37.9903C30.9348 37.3253 32.2478 36.6963 34.3658 38.8183C36.4998 40.9563 36.3118 44.6263 33.9398 46.9993C32.7586 48.2021 31.1505 48.8902 29.4648 48.9143C28.7816 48.923 28.1035 48.7961 27.4698 48.5408C26.836 48.2856 26.2592 47.9071 25.7728 47.4273C25.7211 47.3762 25.6645 47.3303 25.6038 47.2903C25.4888 47.2153 22.8088 45.3853 23.3608 39.7393L21.3688 39.5453Z"--}}
                    {{--                                    fill="black"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M8.9468 39.5358C10.8258 37.6538 11.0778 35.5578 11.3688 33.1358C11.8018 29.5358 12.3388 25.0608 18.6848 18.7088C25.0308 12.3568 29.4988 11.8188 33.0918 11.3868C35.5178 11.0948 37.6118 10.8418 39.4918 8.95978C42.5008 5.94678 46.7088 1.71078 46.7088 1.71078L45.2908 0.300781C45.2908 0.300781 41.0848 4.53478 38.0758 7.54678C36.6858 8.93978 35.0758 9.13278 32.8528 9.40078C29.1588 9.84578 24.1018 10.4548 17.2698 17.3008C10.4378 24.1468 9.8278 29.2008 9.3838 32.9008C9.1158 35.1278 8.9228 36.7378 7.5308 38.1308C4.5258 41.1328 0.299805 45.2868 0.299805 45.2878L1.6998 46.7138C1.6998 46.7138 5.9358 42.5518 8.9468 39.5358Z"--}}
                    {{--                                    fill="black"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M55.053 24.4659C53.174 26.3479 52.922 28.4439 52.631 30.8709C52.198 34.4709 51.661 38.9459 45.315 45.2979C38.969 51.6499 34.5 52.1879 30.908 52.6199C28.482 52.9119 26.388 53.1649 24.508 55.0469C21.5 58.0599 17.291 62.3009 17.291 62.3009L18.709 63.7109C18.709 63.7109 22.915 59.4769 25.924 56.4649C27.314 55.0719 28.924 54.8789 31.147 54.6109C34.841 54.1659 39.898 53.5569 46.73 46.7159C53.562 39.8749 54.172 34.8159 54.616 31.1159C54.884 28.8889 55.077 27.2789 56.469 25.8859C59.469 22.8759 63.7 18.7219 63.701 18.7209L62.301 17.2949C62.301 17.2949 58.064 21.4499 55.053 24.4659Z"--}}
                    {{--                                    fill="black"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M45.7847 51.0576L46.6777 52.8476C50.1104 51.1363 53.0194 48.533 55.0997 45.3106L53.4177 44.2266C51.5331 47.1478 48.8964 49.5075 45.7847 51.0576Z"--}}
                    {{--                                    fill="black"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M43.2827 54.5891L43.5997 56.5641C46.5315 56.0915 49.3178 54.9598 51.7487 53.2541L50.5997 51.6191C48.4165 53.1493 45.9148 54.1647 43.2827 54.5891Z"--}}
                    {{--                                    fill="black"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M15.8727 13.4911L14.6457 11.9121C11.2271 14.5821 8.72041 18.2463 7.4707 22.4001L9.3867 22.9711C10.5172 19.2168 12.7831 15.905 15.8727 13.4911Z"--}}
                    {{--                                    fill="black"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M20.2179 7.83986L19.8129 5.88086C15.8129 6.70886 11.9559 9.16486 8.35693 13.1809L9.84793 14.5159C13.1539 10.8249 16.6439 8.57986 20.2179 7.83986Z"--}}
                    {{--                                    fill="black"/>--}}
                    {{--                            </g>--}}
                    {{--                            <defs>--}}
                    {{--                                <clipPath id="clip0_5948_34829">--}}
                    {{--                                    <rect width="64" height="64" fill="white"/>--}}
                    {{--                                </clipPath>--}}
                    {{--                            </defs>--}}
                    {{--                        </svg>--}}
                    {{--                        <span>Bone</span>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-containerNho">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-container">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}
                    {{--            <div class="col-md-4">--}}
                    {{--                <div class="border-HomeNew">--}}
                    {{--                    <div class="w-75 d-flex align-items-center ">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">--}}
                    {{--                            <path--}}
                    {{--                                d="M53.4123 36.2823H37V21.7372C37 17.2094 40.6704 13.5391 45.1981 13.5391H45.2143C49.742 13.5391 53.4124 17.2094 53.4124 21.7372V36.2823H53.4123Z"--}}
                    {{--                                fill="#494A47"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M46.663 13.6693C46.1925 13.5853 45.7089 13.5391 45.2142 13.5391H45.1981C40.6704 13.5391 37 17.2094 37 21.7372V36.2823H39.9136V21.7372C39.9136 17.7042 42.8267 14.3537 46.663 13.6693Z"--}}
                    {{--                                fill="#333331"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M27.0001 27.6089H10.5879V18.8065C10.5879 16.8299 12.1903 15.2275 14.1669 15.2275C15.6425 13.8172 17.7211 13.2299 19.7165 13.6595L23.2418 14.4184C25.4345 14.8904 27.0001 16.8291 27.0001 19.072V27.6089Z"--}}
                    {{--                                fill="#494A47"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M17.0804 15.2275C17.8765 14.4666 18.8489 13.9477 19.8884 13.6965L19.7165 13.6595C17.721 13.2299 15.6424 13.8172 14.1669 15.2275C12.1903 15.2275 10.5879 16.8299 10.5879 18.8065V27.6089H13.5015V18.8065C13.5014 16.8299 15.1038 15.2275 17.0804 15.2275Z"--}}
                    {{--                                fill="#333331"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M32.0001 63.0588H9.255C7.23 63.0588 5.58838 61.4172 5.58838 59.3922V44.5484C5.58838 41.1087 8.37675 38.3203 11.8165 38.3203H25.7721C29.2119 38.3203 32.0003 41.1087 32.0003 44.5484V63.0588H32.0001Z"--}}
                    {{--                                fill="#68C0E0"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M8.50188 59.3922V44.5484C8.50188 41.1087 11.2903 38.3203 14.73 38.3203H11.8165C8.37675 38.3203 5.58838 41.1087 5.58838 44.5484V59.3922C5.58838 61.4172 7.23 63.0588 9.255 63.0588H12.1685C10.1435 63.0588 8.50188 61.4172 8.50188 59.3922Z"--}}
                    {{--                                fill="#3282A1"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M18.7944 42.2595C16.817 42.2595 15.2139 40.6565 15.2139 38.6791V34.2129H22.3747V38.6791C22.3749 40.6565 20.7717 42.2595 18.7944 42.2595Z"--}}
                    {{--                                fill="#FFCEBF"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M18.1274 38.6791V34.2129H15.2139V38.6791C15.2139 40.6565 16.8169 42.2595 18.7942 42.2595C19.3132 42.2595 19.8059 42.1483 20.251 41.9496C18.9999 41.3915 18.1274 40.1376 18.1274 38.6791Z"--}}
                    {{--                                fill="#FFB09E"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M54.7451 63.0764H32V46.4601C32 41.9744 35.6365 38.3379 40.1222 38.3379H50.2896C54.7754 38.3379 58.4119 41.9744 58.4119 46.4601V59.4098C58.4118 61.4348 56.7701 63.0764 54.7451 63.0764Z"--}}
                    {{--                                fill="#E15F4F"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M45.206 42.2771C43.2286 42.2771 41.6255 40.6741 41.6255 38.6967V34.2305H48.7864V38.6967C48.7864 40.6741 47.1834 42.2771 45.206 42.2771Z"--}}
                    {{--                                fill="#FFCEBF"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M44.5391 38.6967V34.2305H41.6255V38.6967C41.6255 40.6741 43.2285 42.2771 45.2059 42.2771C45.7249 42.2771 46.2175 42.1658 46.6626 41.9672C45.4116 41.4091 44.5391 40.1551 44.5391 38.6967Z"--}}
                    {{--                                fill="#FFB09E"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M42.7588 63.0586H21.1055V55.0046C21.1055 51.327 24.0867 48.3457 27.7643 48.3457H36.0998C39.7775 48.3457 42.7587 51.327 42.7587 55.0046V63.0586H42.7588Z"--}}
                    {{--                                fill="#F8D250"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M30.678 48.3457H27.7643C24.0867 48.3457 21.1055 51.327 21.1055 55.0046V63.0586H24.019V55.0046C24.019 51.3271 27.0003 48.3457 30.678 48.3457Z"--}}
                    {{--                                fill="#F8AE46"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M31.932 52.1283C30.3108 52.1283 28.9966 50.814 28.9966 49.1929V45.5312H34.8673V49.1929C34.8673 50.814 33.5532 52.1283 31.932 52.1283Z"--}}
                    {{--                                fill="#FFCEBF"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M10.8421 57.8049V51.9258H5.58838V59.3919C5.58838 61.4169 7.23 63.0585 9.255 63.0585H21.1053V57.8048L10.8421 57.8049Z"--}}
                    {{--                                fill="#FFCEBF"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M8.50188 59.3919V51.9258H5.58838V59.3919C5.58838 61.4169 7.23 63.0585 9.255 63.0585H12.1686C10.1435 63.0585 8.50188 61.4169 8.50188 59.3919Z"--}}
                    {{--                                fill="#FFB09E"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M53.1579 57.8225V51.9434H58.4117V59.4095C58.4117 61.4345 56.77 63.0761 54.745 63.0761H42.9673V57.8224H53.1579V57.8225Z"--}}
                    {{--                                fill="#FFCEBF"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M14.3404 20.8574C13.3496 24.4077 10.5879 25.2369 10.5879 25.2369V27.6094C10.5879 32.1415 14.2619 35.8155 18.794 35.8155C23.3261 35.8155 27.0001 32.1415 27.0001 27.6094V24.9837C21.2484 25.4774 14.3404 20.8574 14.3404 20.8574Z"--}}
                    {{--                                fill="#FFCEBF"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M13.5015 27.6095V25.237C13.5015 25.237 15.5178 24.6297 16.7228 22.2375C15.2669 21.4768 14.3404 20.8574 14.3404 20.8574C13.3496 24.4077 10.5879 25.2369 10.5879 25.2369V27.6094C10.5879 32.1415 14.2619 35.8155 18.794 35.8155C19.2915 35.8155 19.7778 35.7688 20.2508 35.684C16.4141 34.9964 13.5015 31.6443 13.5015 27.6095Z"--}}
                    {{--                                fill="#FFB09E"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M45.2061 20.875C45.2061 20.875 40.1689 27.6271 37 27.6271C37 32.1593 40.674 35.8332 45.2061 35.8332C49.7383 35.8332 53.4123 32.1593 53.4123 27.6271C50.2434 27.6271 45.2061 20.875 45.2061 20.875Z"--}}
                    {{--                                fill="#FFCEBF"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M39.9135 27.6271C42.0128 27.6271 44.9314 24.6645 46.6629 22.6641C45.7805 21.6448 45.2061 20.875 45.2061 20.875C45.2061 20.875 40.1689 27.6271 37 27.6271C37 32.1593 40.674 35.8332 45.2061 35.8332C45.7036 35.8332 46.1899 35.7865 46.6629 35.7018C42.8261 35.014 39.9135 31.6619 39.9135 27.6271Z"--}}
                    {{--                                fill="#FFB09E"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M31.9319 48.3456C28.2162 48.3456 25.2041 45.3335 25.2041 41.6179V37.7277C25.2041 34.0121 28.2162 31 31.9319 31C35.6475 31 38.6596 34.0121 38.6596 37.7277V41.618C38.6596 45.3336 35.6475 48.3456 31.9319 48.3456Z"--}}
                    {{--                                fill="#FFCEBF"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M28.1396 41.618V37.7277C28.1396 34.5165 30.3902 31.8325 33.3996 31.1625C32.927 31.0573 32.4362 31 31.9319 31C28.2162 31 25.2041 34.0121 25.2041 37.7277V41.618C25.2041 45.3336 28.2162 48.3457 31.9319 48.3457C32.4362 48.3457 32.9269 48.2885 33.3996 48.1833C30.3902 47.5133 28.1396 44.8293 28.1396 41.618Z"--}}
                    {{--                                fill="#FFB09E"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M21.9765 63.058H20.2345C19.2717 63.058 18.4912 62.2775 18.4912 61.3147V56.5518C18.4912 55.5891 19.2717 54.8086 20.2345 54.8086H21.9765C22.9392 54.8086 23.7197 55.5891 23.7197 56.5518V61.3147C23.7197 62.2775 22.9392 63.058 21.9765 63.058Z"--}}
                    {{--                                fill="#FFCEBF"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M21.4047 61.3147V56.5518C21.4047 55.7948 21.8881 55.1525 22.5622 54.9116C22.3788 54.8461 22.1823 54.8086 21.9765 54.8086H20.2345C19.2717 54.8086 18.4912 55.5891 18.4912 56.5518V61.3147C18.4912 62.2775 19.2717 63.058 20.2345 63.058H21.9765C22.1823 63.058 22.3788 63.0205 22.5622 62.955C21.888 62.714 21.4047 62.0716 21.4047 61.3147Z"--}}
                    {{--                                fill="#FFB09E"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M43.6298 63.058H41.8878C40.925 63.058 40.1445 62.2775 40.1445 61.3147V56.5518C40.1445 55.5891 40.925 54.8086 41.8878 54.8086H43.6298C44.5925 54.8086 45.373 55.5891 45.373 56.5518V61.3147C45.373 62.2775 44.5925 63.058 43.6298 63.058Z"--}}
                    {{--                                fill="#FFCEBF"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M43.0825 61.3147V56.5518C43.0825 55.7995 43.56 55.1603 44.2278 54.9161C44.041 54.8477 43.8402 54.8086 43.6298 54.8086H41.8878C40.925 54.8086 40.1445 55.5891 40.1445 56.5518V61.3147C40.1445 62.2775 40.925 63.058 41.8878 63.058H43.6298C43.8402 63.058 44.041 63.0188 44.2278 62.9505C43.56 62.7062 43.0825 62.067 43.0825 61.3147Z"--}}
                    {{--                                fill="#FFB09E"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M38.3939 4.85283H34.4806V0.939453H29.5198V4.85283H25.6064V9.8137H29.5198V13.7271H34.4806V9.8137H38.3939V4.85283Z"--}}
                    {{--                                fill="#68C0E0"/>--}}
                    {{--                            <path d="M29.52 9.81445H32.4336V13.7278H29.52V9.81445Z" fill="#3282A1"/>--}}
                    {{--                            <path d="M29.52 0.939453H32.4336V4.85283H29.52V0.939453Z" fill="#3282A1"/>--}}
                    {{--                            <path d="M25.6064 4.85352H28.5201V9.81439H25.6064V4.85352Z" fill="#3282A1"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M50.2896 37.7129H49.4114V36.9082H53.4121C53.7574 36.9082 54.0371 36.6283 54.0371 36.2832V21.7382C54.0371 16.8731 50.0791 12.9151 45.214 12.9151H45.198C40.3329 12.9151 36.3749 16.8731 36.3749 21.7382V31.8739C35.1398 30.9341 33.6001 30.3747 31.9319 30.3747C27.8885 30.3747 24.5978 33.6554 24.58 37.6948H22.9998V35.3733C25.7528 33.8762 27.6255 30.9573 27.6255 27.6093V24.9836V19.0723C27.6255 16.5522 25.8374 14.3381 23.3736 13.8077L19.8484 13.0488C17.7279 12.5924 15.5284 13.1754 13.915 14.6103C11.7139 14.7411 9.96313 16.5734 9.96313 18.8068V25.2367V27.6092C9.96313 30.9572 11.8359 33.8761 14.5889 35.3732V37.6947H11.8165C8.03763 37.6947 4.96338 40.7689 4.96338 44.5478V51.9254V59.3916C4.96338 61.7581 6.88863 63.6832 9.255 63.6832L54.7453 63.7013C57.1118 63.7013 59.0369 61.7761 59.0369 59.4097V51.9437V46.4602C59.0369 41.6369 55.1129 37.7129 50.2896 37.7129ZM57.7869 46.4602V51.3187H53.7819V48.9024C53.7819 48.5573 53.5021 48.2774 53.1569 48.2774C52.8116 48.2774 52.5319 48.5573 52.5319 48.9024V53.2834C52.5319 53.2881 52.5331 53.2922 52.5333 53.2967V57.1976H45.998V56.5521C45.998 55.2462 44.9356 54.1838 43.6298 54.1838H43.3349C42.9256 50.5527 39.8386 47.7203 36.0999 47.7203H36.0286C37.9913 46.3987 39.2849 44.1564 39.2849 41.6176V39.0108C39.56 38.9799 39.8393 38.9628 40.1225 38.9628H41.01C41.1475 41.1584 42.9765 42.9029 45.2063 42.9029C47.436 42.9029 49.2649 41.1584 49.4024 38.9628H50.2899C54.4236 38.9629 57.7869 42.3262 57.7869 46.4602ZM19.1159 61.3151V56.5522C19.1159 55.9356 19.6175 55.4339 20.2341 55.4339H21.9761C22.5928 55.4339 23.0944 55.9356 23.0944 56.5522V61.3151C23.0944 61.9317 22.5928 62.4333 21.9761 62.4333H20.2341C19.6175 62.4333 19.1159 61.9317 19.1159 61.3151ZM21.9763 54.1839H21.7875C22.189 51.2436 24.7154 48.9704 27.7643 48.9704H28.3716V49.1927C28.3716 51.1559 29.9688 52.7531 31.932 52.7531C33.8953 52.7531 35.4924 51.1559 35.4924 49.1927V48.9704H36.0998C39.1484 48.9704 41.6731 51.2439 42.075 54.1839H41.8876C40.5818 54.1839 39.5194 55.2463 39.5194 56.5522V61.3151C39.5194 61.7193 39.6216 62.1001 39.801 62.4333H38.3043V58.9336C38.3043 58.5884 38.0245 58.3086 37.6793 58.3086C37.334 58.3086 37.0543 58.5884 37.0543 58.9336V62.4333H26.9463V58.9336C26.9463 58.5884 26.6664 58.3086 26.3213 58.3086C25.9761 58.3086 25.6963 58.5884 25.6963 58.9336V62.4333H25.3971H24.063C24.2424 62.0999 24.3446 61.7193 24.3446 61.3151V56.5522C24.3445 55.2463 23.282 54.1839 21.9763 54.1839ZM29.6215 48.5964C30.3486 48.8378 31.1249 48.9704 31.9319 48.9704C32.739 48.9704 33.5153 48.8378 34.2423 48.5964V49.1927C34.2423 50.4666 33.2058 51.5031 31.9319 51.5031C30.658 51.5031 29.6215 50.4666 29.6215 49.1927V48.5964ZM41.8876 62.4333C41.271 62.4333 40.7694 61.9317 40.7694 61.3151V56.5522C40.7694 55.9356 41.2711 55.4339 41.8876 55.4339H43.6298C44.2464 55.4339 44.748 55.9356 44.748 56.5522V61.3151C44.748 61.9317 44.2463 62.4333 43.6298 62.4333H41.8876ZM45.2059 35.2087C41.2125 35.2087 37.9303 32.1047 37.645 28.1827C40.4373 27.6027 43.8853 23.5633 45.206 21.8981C46.5268 23.5634 49.9746 27.6027 52.7669 28.1827C52.4818 32.1047 49.1995 35.2087 45.2059 35.2087ZM45.206 36.4587C46.2423 36.4587 47.2368 36.2778 48.1614 35.9483V38.6976C48.1614 40.3272 46.8356 41.6531 45.206 41.6531H45.2059C43.5764 41.6531 42.2505 40.3273 42.2505 38.6976V35.9482C43.1753 36.2777 44.1698 36.4587 45.206 36.4587ZM41.0006 37.7129H40.1224C39.8396 37.7129 39.5605 37.7284 39.2848 37.7554V37.7274C39.2848 37.4504 39.268 37.1774 39.238 36.9082H41.0008V37.7129H41.0006ZM52.7871 35.6582H49.4114V35.3914C50.8058 34.6332 51.9734 33.5094 52.7871 32.1506V35.6582ZM45.198 14.1651H45.214C49.3898 14.1651 52.7871 17.5623 52.7871 21.7382V26.9047C50.4139 26.2302 46.943 22.1576 45.7069 20.5017C45.589 20.3436 45.4033 20.2506 45.206 20.2506C45.0088 20.2506 44.8231 20.3437 44.7051 20.5017C43.469 22.1576 39.9981 26.2302 37.6248 26.9047V21.7382C37.6249 17.5623 41.0223 14.1651 45.198 14.1651ZM41.0006 35.3916V35.6583H38.9863C38.7061 34.7048 38.2388 33.8308 37.6249 33.0803V32.1507C38.4386 33.5094 39.6063 34.6332 41.0006 35.3916ZM25.8291 37.7274C25.8291 34.3624 28.5668 31.6247 31.9319 31.6247C35.297 31.6247 38.0346 34.3623 38.0346 37.7274V41.6177C38.0346 44.9827 35.297 47.7204 31.9319 47.7204C28.5669 47.7204 25.8291 44.9828 25.8291 41.6177V37.7274ZM14.1671 15.8529C14.328 15.8529 14.4826 15.7909 14.599 15.6798C15.9264 14.4112 17.7906 13.8846 19.5853 14.2709L23.1105 15.0298C25.0024 15.4371 26.3755 17.1372 26.3755 19.0724V24.3917C21.0273 24.5264 14.7529 20.3809 14.6879 20.3376C14.5213 20.2264 14.3114 20.2018 14.1235 20.2712C13.9356 20.3408 13.7925 20.4962 13.7386 20.6892C13.1751 22.7086 12.0059 23.7483 11.2131 24.2433V18.8069C11.2131 17.1781 12.5383 15.8529 14.1671 15.8529ZM11.2131 27.6093V25.6594C12.0269 25.2852 13.7469 24.2399 14.6826 21.8116C16.5184 22.9244 21.6628 25.7517 26.3754 25.6427V27.6093C26.3754 31.7896 22.9745 35.1904 18.7943 35.1904C14.614 35.1904 11.2131 31.7897 11.2131 27.6093ZM18.7943 36.4406C19.8306 36.4406 20.825 36.2597 21.7498 35.9302V38.6794C21.7498 40.3091 20.424 41.6349 18.7943 41.6349C17.1645 41.6349 15.8388 40.3092 15.8388 38.6794V35.9302C16.7635 36.2596 17.758 36.4406 18.7943 36.4406ZM11.8165 38.9448H14.5981C14.7356 41.1404 16.5646 42.8849 18.7944 42.8849C21.0241 42.8849 22.8531 41.1404 22.9906 38.9448H24.5794V41.6177C24.5794 44.1566 25.873 46.3988 27.8355 47.7204H27.7643C24.0256 47.7204 20.9399 50.5529 20.5306 54.1839H20.2344C18.9285 54.1839 17.8661 55.2463 17.8661 56.5522V57.1796H11.4674V53.2654V51.9256V48.8843C11.4674 48.5392 11.1875 48.2593 10.8424 48.2593C10.4973 48.2593 10.2174 48.5392 10.2174 48.8843V51.3006H6.21363V44.5479C6.21338 41.4583 8.72688 38.9448 11.8165 38.9448ZM6.21338 59.3917V52.5506H10.2171V53.2654V57.8046C10.2171 58.1497 10.497 58.4296 10.8421 58.4296H17.8659V61.3151C17.8659 61.7193 17.9681 62.1001 18.1475 62.4333H9.255C7.57788 62.4333 6.21338 61.0688 6.21338 59.3917ZM57.7869 59.4098C57.7869 61.0869 56.4224 62.4514 54.7453 62.4514H45.7065C45.892 62.1138 45.9979 61.7267 45.9979 61.3151V58.4477H53.1581C53.5034 58.4477 53.7831 58.1678 53.7831 57.8227V52.5687H57.7868V59.4098H57.7869Z"--}}
                    {{--                                fill="black"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M25.6064 10.4387H28.8948V13.7271C28.8948 14.0722 29.1747 14.3521 29.5198 14.3521H34.4807C34.8259 14.3521 35.1057 14.0722 35.1057 13.7271V10.4387H38.3941C38.7393 10.4387 39.0191 10.1588 39.0191 9.8137V4.85283C39.0191 4.5077 38.7393 4.22783 38.3941 4.22783H35.1057V0.939453C35.1057 0.594328 34.8259 0.314453 34.4807 0.314453H29.5198C29.1747 0.314453 28.8948 0.594328 28.8948 0.939453V4.22783H25.6064C25.2613 4.22783 24.9814 4.5077 24.9814 4.85283V9.8137C24.9814 10.1588 25.2612 10.4387 25.6064 10.4387ZM26.2314 5.47783H29.5198C29.8649 5.47783 30.1448 5.19795 30.1448 4.85283V1.56445H33.8557V4.85283C33.8557 5.19795 34.1354 5.47783 34.4807 5.47783H37.7691V9.1887H34.4807C34.1354 9.1887 33.8557 9.46858 33.8557 9.8137V13.1021H30.1448V9.8137C30.1448 9.46858 29.8649 9.1887 29.5198 9.1887H26.2314V5.47783Z"--}}
                    {{--                                fill="black"/>--}}
                    {{--                        </svg>--}}
                    {{--                        <span>Family Medicine</span>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-containerNho">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-container">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}
                    {{--            <div class="col-md-4">--}}
                    {{--                <div class="border-HomeNew">--}}
                    {{--                    <div class="w-75 d-flex align-items-center ">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">--}}
                    {{--                            <path--}}
                    {{--                                d="M31.9997 14.307C17.4517 -2.49996 -1.89431 13.073 4.12869 29.009C6.14069 34.372 10.6397 38.372 11.9067 44.027C12.5407 46.854 12.0647 49.739 12.7977 52.546C13.7337 56.127 15.8977 59.791 20.1037 59.691C29.5747 59.466 26.8467 43.257 32.0037 42.657C37.1557 43.257 34.4287 59.466 43.9037 59.691C48.1117 59.791 50.2737 56.127 51.2097 52.546C51.9427 49.739 51.4667 46.854 52.1007 44.027C53.3677 38.372 57.8667 34.372 59.8787 29.009C65.8937 13.073 46.5477 -2.49996 31.9997 14.307Z"--}}
                    {{--                                fill="#E4F4FD"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M51.8308 6.41838L52.4998 5.20038C52.6474 4.93155 52.8644 4.70731 53.1283 4.55111C53.3922 4.39491 53.6932 4.3125 53.9998 4.3125C54.3065 4.3125 54.6075 4.39491 54.8714 4.55111C55.1353 4.70731 55.3523 4.93155 55.4998 5.20038L56.1678 6.42138C56.7959 7.56941 57.7398 8.51335 58.8878 9.14138L60.1088 9.80938C60.3777 9.9569 60.6019 10.174 60.7581 10.4378C60.9143 10.7017 60.9967 11.0027 60.9967 11.3094C60.9967 11.616 60.9143 11.917 60.7581 12.1809C60.6019 12.4448 60.3777 12.6619 60.1088 12.8094L58.8878 13.4774C57.7398 14.1054 56.7959 15.0494 56.1678 16.1974L55.4998 17.4174C55.3523 17.6862 55.1353 17.9105 54.8714 18.0667C54.6075 18.2229 54.3065 18.3053 53.9998 18.3053C53.6932 18.3053 53.3922 18.2229 53.1283 18.0667C52.8644 17.9105 52.6474 17.6862 52.4998 17.4174L51.8308 16.2004C51.2028 15.0524 50.2589 14.1084 49.1108 13.4804L47.8898 12.8124C47.621 12.6649 47.3968 12.4478 47.2406 12.1839C47.0844 11.92 47.002 11.619 47.002 11.3124C47.002 11.0057 47.0844 10.7047 47.2406 10.4408C47.3968 10.177 47.621 9.9599 47.8898 9.81238L49.1108 9.14438C50.2597 8.51473 51.2037 7.56862 51.8308 6.41838Z"--}}
                    {{--                                fill="#01CADB"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M45.1077 20.6491L45.4817 19.9651C45.5642 19.8143 45.6857 19.6884 45.8336 19.6007C45.9815 19.5131 46.1502 19.4668 46.3222 19.4668C46.4941 19.4668 46.6628 19.5131 46.8107 19.6007C46.9586 19.6884 47.0802 19.8143 47.1627 19.9651L47.5367 20.6491C47.8885 21.2921 48.4174 21.8207 49.0607 22.1721L49.7447 22.5461C49.8955 22.6286 50.0214 22.7502 50.109 22.898C50.1967 23.0459 50.243 23.2147 50.243 23.3866C50.243 23.5585 50.1967 23.7273 50.109 23.8752C50.0214 24.023 49.8955 24.1446 49.7447 24.2271L49.0607 24.6011C48.4174 24.9529 47.8884 25.4818 47.5367 26.1251L47.1627 26.8091C47.0802 26.9599 46.9586 27.0858 46.8107 27.1735C46.6628 27.2611 46.4941 27.3074 46.3222 27.3074C46.1502 27.3074 45.9815 27.2611 45.8336 27.1735C45.6857 27.0858 45.5642 26.9599 45.4817 26.8091L45.1077 26.1251C44.7557 25.4817 44.2269 24.9525 43.5837 24.6001L42.8997 24.2261C42.7488 24.1436 42.623 24.022 42.5353 23.8742C42.4476 23.7263 42.4014 23.5575 42.4014 23.3856C42.4014 23.2137 42.4476 23.0449 42.5353 22.897C42.623 22.7492 42.7488 22.6276 42.8997 22.5451L43.5837 22.1711C44.2266 21.8197 44.7554 21.2915 45.1077 20.6491Z"--}}
                    {{--                                fill="#01CADB"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M10.7309 14.0926C10.8132 14.195 10.9148 14.2802 11.03 14.3433C11.1452 14.4064 11.2717 14.4461 11.4023 14.4604C11.5328 14.4746 11.6649 14.4629 11.791 14.4261C11.917 14.3892 12.0346 14.3279 12.1369 14.2456C13.8424 12.8531 15.9703 12.0812 18.1719 12.0566C18.4372 12.0566 18.6915 11.9513 18.879 11.7637C19.0666 11.5762 19.1719 11.3219 19.1719 11.0566C19.1719 10.7914 19.0666 10.5371 18.879 10.3495C18.6915 10.162 18.4372 10.0566 18.1719 10.0566C15.5148 10.0816 12.9451 11.0094 10.8849 12.6876C10.6783 12.8536 10.5461 13.0948 10.5172 13.3583C10.4883 13.6217 10.5652 13.8858 10.7309 14.0926Z"--}}
                    {{--                                fill="white"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M38.9997 18.1354C34.6817 18.0954 33.9817 16.0354 32.8997 13.8604C32.7803 13.623 32.5716 13.4428 32.3194 13.3593C32.0671 13.2758 31.7921 13.296 31.5547 13.4154C31.3173 13.5347 31.1371 13.7435 31.0536 13.9957C30.9702 14.2479 30.9903 14.523 31.1097 14.7604L31.3157 15.1784C32.2757 17.1534 33.7267 20.1404 39.0047 20.1404C39.2699 20.1404 39.5243 20.035 39.7118 19.8475C39.8993 19.6599 40.0047 19.4056 40.0047 19.1404C40.0047 18.8751 39.8993 18.6208 39.7118 18.4332C39.5243 18.2457 39.2699 18.1404 39.0047 18.1404L38.9997 18.1354Z"--}}
                    {{--                                fill="#C9DFEB"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M9 17.3066C9.55228 17.3066 10 16.8589 10 16.3066C10 15.7544 9.55228 15.3066 9 15.3066C8.44772 15.3066 8 15.7544 8 16.3066C8 16.8589 8.44772 17.3066 9 17.3066Z"--}}
                    {{--                                fill="white"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M27.1897 36.2312C15.9997 31.3792 7.36966 25.4472 3.47066 19.0742C3.47066 19.0862 3.46266 19.0982 3.45967 19.1112C2.67291 22.4027 2.90659 25.8557 4.12967 29.0112C6.13967 34.3712 10.6397 38.3712 11.9097 44.0312C12.5397 46.8512 12.0597 49.7412 12.7997 52.5512C13.7297 56.1312 15.8997 59.7912 20.0997 59.6912C29.5797 59.4712 26.8497 43.2612 31.9997 42.6612C37.1497 43.2612 34.4197 59.4712 43.8997 59.6912C48.0997 59.7912 50.2697 56.1312 51.1997 52.5512C51.9397 49.7412 51.4597 46.8512 52.0897 44.0312C52.2693 43.2404 52.511 42.465 52.8127 41.7122C44.9047 42.2192 36.7457 40.1102 27.1897 36.2312Z"--}}
                    {{--                                fill="#FFC107"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M61.6899 37.241C60.6279 39.75 57.7529 41.332 53.3499 41.681C45.2739 42.321 36.9619 40.198 27.1899 36.231C15.4999 31.161 6.58287 24.912 2.95987 18.211C2.44515 17.3142 2.12642 16.3184 2.02472 15.2893C1.92302 14.2602 2.04066 13.2213 2.36987 12.241C3.48487 9.28803 9.05087 7.10103 12.9899 8.04103C11.754 8.52177 10.5872 9.16401 9.51987 9.95103C7.43987 10.301 5.04087 11.139 4.20987 13.011C3.99757 13.7426 3.93862 14.5101 4.0367 15.2655C4.13478 16.0209 4.38779 16.7479 4.77987 17.401C7.62987 22.991 16.7099 29.651 27.9699 34.391C37.3199 38.321 46.7289 40.191 53.1499 39.691C56.2399 39.451 59.1689 38.215 59.8499 36.461C60.0986 35.6004 60.1283 34.6913 59.9362 33.8163C59.7441 32.9413 59.3363 32.1283 58.7499 31.451C59.0946 30.8162 59.4018 30.1618 59.6699 29.491C61.6619 31.466 62.7769 34.673 61.6899 37.241Z"--}}
                    {{--                                fill="#01CADB"/>--}}
                    {{--                        </svg>--}}
                    {{--                        <span>Dentistry</span>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-containerNho">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-container">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}
                    {{--            <div class="col-md-4">--}}
                    {{--                <div class="border-HomeNew">--}}
                    {{--                    <div class="w-75 d-flex align-items-center ">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">--}}
                    {{--                            <g clip-path="url(#clip0_5948_34274)">--}}
                    {{--                                <path--}}
                    {{--                                    d="M58.1942 38.1303C61.3978 38.1303 63.9948 35.5329 63.9948 32.3288C63.9948 29.1248 61.3978 26.5273 58.1942 26.5273C54.9906 26.5273 52.3936 29.1248 52.3936 32.3288C52.3936 35.5329 54.9906 38.1303 58.1942 38.1303Z"--}}
                    {{--                                    fill="#FFCBBE"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M31.6707 11.603C34.8743 11.603 37.4714 9.00558 37.4714 5.8015C37.4714 2.59742 34.8743 0 31.6707 0C28.4671 0 25.8701 2.59742 25.8701 5.8015C25.8701 9.00558 28.4671 11.603 31.6707 11.603Z"--}}
                    {{--                                    fill="#FFDDCF"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M58.3311 33.0124C54.2518 37.0923 48.8037 38.9685 43.465 38.6396C15.3645 14.0244 39.5205 0.691881 39.5205 0.691881C46.006 -1.08924 53.2362 0.568631 58.3311 5.66426C65.8823 13.2153 65.8823 25.46 58.3311 33.0124Z"--}}
                    {{--                                    fill="#FFDDCF"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M43.465 38.6392C38.9223 38.3605 34.4578 36.483 30.9872 33.0119C23.4359 25.4595 23.4359 13.2148 30.9872 5.66378C33.4422 3.20841 36.3954 1.55053 39.5207 0.691406C35.9832 6.73978 29.3192 22.4917 43.465 38.6392Z"--}}
                    {{--                                    fill="#FFCBBE"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M39.6293 14.8578C40.8531 13.6323 40.5976 11.393 39.0587 9.8562C37.5197 8.31942 35.2801 8.06712 34.0562 9.29267C32.8324 10.5182 33.0879 12.7575 34.6268 14.2943C36.1658 15.8311 38.4055 16.0834 39.6293 14.8578Z"--}}
                    {{--                                    fill="#FFA1AC"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M54.7391 29.9262C55.9629 28.7006 55.7075 26.4613 54.1685 24.9246C52.6296 23.3878 50.3899 23.1355 49.1661 24.361C47.9423 25.5866 48.1978 27.8259 49.7367 29.3627C51.2757 30.8994 53.5153 31.1517 54.7391 29.9262Z"--}}
                    {{--                                    fill="#FFA1AC"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M46.649 19.838C47.4367 19.0486 47.5175 17.8517 46.8292 17.1647C46.141 16.4777 44.9445 16.5607 44.1567 17.3501C43.369 18.1395 43.2882 19.3364 43.9765 20.0234C44.6646 20.7104 45.8612 20.6274 46.649 19.838Z"--}}
                    {{--                                    fill="#495560"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M42.0758 12.8533C41.3415 12.8533 40.6345 12.5631 40.1117 12.0413C39.5429 11.4734 39.2479 10.6873 39.3023 9.88444C39.3383 9.35382 39.7964 8.95169 40.3283 8.98869C40.8589 9.02469 41.2599 9.48406 41.2239 10.0148C41.2072 10.2619 41.2977 10.5037 41.4722 10.6779C41.6467 10.8521 41.8882 10.9422 42.1358 10.9251C42.6657 10.8882 43.1264 11.2883 43.1634 11.8189C43.2003 12.3496 42.8002 12.8097 42.2697 12.8467C42.205 12.8511 42.1403 12.8532 42.0758 12.8533Z"--}}
                    {{--                                    fill="#455059"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M53.9274 24.6852C53.1931 24.6852 52.4861 24.3951 51.9632 23.8732C51.3946 23.3055 51.0996 22.5194 51.1538 21.7165C51.1897 21.1857 51.6489 20.7845 52.1797 20.8206C52.7103 20.8565 53.1114 21.3159 53.0754 21.8466C53.0587 22.0939 53.1492 22.3356 53.3238 22.5099C53.4983 22.684 53.7408 22.7739 53.9876 22.7569C54.5174 22.7209 54.9782 23.1201 55.0151 23.6509C55.0519 24.1815 54.6517 24.6416 54.1212 24.6785C54.0564 24.683 53.9918 24.6852 53.9274 24.6852Z"--}}
                    {{--                                    fill="#455059"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M5.87227 59.7243L4.27977 58.1315C-1.42073 52.4301 -1.42073 43.1864 4.27977 37.485L6.19552 35.569C11.8961 29.8676 21.1385 29.8676 26.8391 35.569L28.4314 37.1615C34.1319 42.8629 34.132 52.1066 28.4314 57.8081L26.5156 59.7241C20.8153 65.4256 11.5729 65.4256 5.87227 59.7243Z"--}}
                    {{--                                    fill="#BBBBEF"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M53.1621 44.7021L48.6167 49.8259C42.5922 56.6193 33.0738 59.1234 24.4852 56.1749L23.9998 56.0079H23.9986C18.5621 46.7117 17.7467 36.4652 18.6494 27.6672H18.6507C21.4793 27.2936 24.3927 27.4592 27.2342 28.2027L49.9584 34.1472C54.6297 35.3686 56.3656 41.0909 53.1621 44.7021Z"--}}
                    {{--                                    fill="#DEDEF9"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M23.998 56.0086L5.38267 49.6172C-0.197581 47.7012 -1.63058 40.4725 2.79792 36.5725L6.79242 33.0551C10.1707 30.0796 14.3115 28.2393 18.6502 27.668C17.7463 36.4658 18.5603 46.7111 23.998 56.0086Z"--}}
                    {{--                                    fill="#D2D2FF"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M30.9446 57.2112L27.5329 61.0869L27.4277 61.2064C-0.178303 48.3889 23.1327 9.21594 23.1327 9.21594C26.0667 9.01694 29.0159 10.8392 29.8519 14.0393L35.7956 36.7669C37.6779 43.9648 35.8597 51.6276 30.9446 57.2112Z"--}}
                    {{--                                    fill="#EFEDFE"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M27.533 61.086L27.4278 61.2055C23.5283 65.6346 16.3007 64.2015 14.3849 58.6203L7.82754 39.5153C4.87954 30.9253 7.38329 21.4057 14.1757 15.3802L19.2988 10.8342C20.4352 9.82484 21.7833 9.30609 23.1328 9.21484C19.6955 18.1182 12.4139 42.6282 27.533 61.086Z"--}}
                    {{--                                    fill="#DEDEF9"/>--}}
                    {{--                            </g>--}}
                    {{--                            <defs>--}}
                    {{--                                <clipPath id="clip0_5948_34274">--}}
                    {{--                                    <rect width="64" height="64" fill="white"/>--}}
                    {{--                                </clipPath>--}}
                    {{--                            </defs>--}}
                    {{--                        </svg>--}}
                    {{--                        <span>Pediatrics</span>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-containerNho">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-container">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}
                    {{--            <div class="col-md-4">--}}
                    {{--                <div class="border-HomeNew">--}}
                    {{--                    <div class="w-75 d-flex align-items-center ">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">--}}
                    {{--                            <g clip-path="url(#clip0_5948_34959)">--}}
                    {{--                                <path--}}
                    {{--                                    d="M24.7514 28.3059C23.7912 28.3059 23.0127 27.5275 23.0127 26.5672V14.7212C23.0127 13.7609 23.7911 12.9824 24.7514 12.9824C25.7118 12.9824 26.4902 13.7608 26.4902 14.7212V26.5673C26.4901 27.5275 25.7117 28.3059 24.7514 28.3059Z"--}}
                    {{--                                    fill="#FE5694"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M31.8979 29.7923C30.9377 29.7923 30.1592 29.014 30.1592 28.0536V22.1846C30.1592 19.1686 32.6129 16.7148 35.6289 16.7148H39.9628C40.9231 16.7148 41.7016 17.4932 41.7016 18.4536C41.7016 19.414 40.9232 20.1923 39.9628 20.1923H35.6289C34.5303 20.1923 33.6366 21.0861 33.6366 22.1847V28.0537C33.6367 29.0138 32.8583 29.7923 31.8979 29.7923Z"--}}
                    {{--                                    fill="#FE76A8"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M24.7187 54.4524C24.7187 55.6801 24.0115 56.7979 22.9021 57.3237L17.7082 59.7858C16.8052 60.2138 15.7536 60.1921 14.8691 59.7272C13.1721 58.8355 12.6452 56.6556 13.7474 55.0872L15.983 51.9062H22.1726C23.5787 51.9062 24.7187 53.0461 24.7187 54.4524Z"--}}
                    {{--                                    fill="#6C7FD8"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M22.1724 51.9062H18.6887C20.095 51.9062 21.2349 53.0462 21.2349 54.4524C21.2349 55.6801 20.5276 56.7979 19.4182 57.3237L14.6357 59.5907C14.7111 59.6387 14.7882 59.6849 14.8689 59.7272C15.7534 60.1921 16.8051 60.2138 17.708 59.7858L22.9019 57.3237C24.0112 56.7979 24.7185 55.68 24.7185 54.4524C24.7186 53.0461 23.5786 51.9062 22.1724 51.9062Z"--}}
                    {{--                                    fill="#4F66D0"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M36.4888 32.4219V46.9791C36.4888 47.3294 36.4463 47.6707 36.3676 47.9966C35.9388 49.7597 34.4216 51.1107 32.5386 51.2654L20.0588 52.288C19.6516 52.3214 19.0972 52.43 18.7051 52.5286C18.7051 52.5286 14.1001 53.373 13.1686 54.2694L11.0408 58.6477C10.1483 59.5055 8.95825 59.9846 7.7205 59.9846H4.79325C1.84775 59.9846 -0.400874 57.3521 0.0601256 54.4427L2.359 39.9112C3.83375 30.5982 12.3326 24.0659 21.7113 25.037L30.6661 25.9642C33.9748 26.3069 36.4888 29.0952 36.4888 32.4219Z"--}}
                    {{--                                    fill="#C38F86"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M36.4887 33.0585L34.5977 37.8774L36.4887 42.3907C36.4887 44.8514 38.5493 46.8104 41.0069 46.6862C46.945 46.3858 51.8987 42.0445 52.9755 36.1972L54.2138 29.4733C54.4923 27.9609 53.3312 26.5664 51.7933 26.5664H42.9808C39.3953 26.5664 36.4887 29.473 36.4887 33.0585Z"--}}
                    {{--                                    fill="#C38F86"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M51.7935 26.5664H48.3099C49.8476 26.5664 51.0089 27.9609 50.7304 29.4733L49.4921 36.1972C48.5298 41.423 44.47 45.4432 39.3794 46.4538C39.8869 46.6302 40.436 46.715 41.0073 46.6862C46.9454 46.3858 51.899 42.0447 52.9759 36.1972L54.2141 29.4733C54.4925 27.9609 53.3314 26.5664 51.7935 26.5664Z"--}}
                    {{--                                    fill="#B87D72"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M16.5757 52.6735C14.8798 52.8123 13.2837 53.1456 12.0567 54.3245L7.55716 58.6476C6.73016 59.4422 5.64791 59.911 4.50879 59.9757C4.60291 59.9812 4.69779 59.9842 4.79341 59.9842H7.72041C8.95829 59.9842 10.1482 59.5052 11.0409 58.6476L15.5404 54.3245C16.4733 53.4282 17.6197 52.7983 18.8608 52.4863L16.5757 52.6735Z"--}}
                    {{--                                    fill="#B87D72"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M30.6658 25.964L21.711 25.0365C20.4971 24.9107 19.2981 24.9118 18.127 25.0273C18.1605 25.0306 18.1938 25.033 18.2273 25.0365L27.1822 25.964C30.4911 26.3067 33.0055 29.095 33.0055 32.4216V44.3775C33.0055 44.6697 32.7245 44.8797 32.4441 44.797L31.3578 44.4762V42.4195C31.3578 41.8897 30.9487 41.4285 30.4192 41.4138C29.8722 41.3988 29.426 41.8371 29.426 42.3793V43.8965L27.565 43.3375C27.0537 43.1842 26.5153 43.474 26.3621 43.9853C26.2088 44.4953 26.4986 45.035 27.01 45.1882L30.1022 46.1155C30.1035 46.1167 30.1061 46.1167 30.1073 46.1181L32.7052 46.8875C32.8888 46.9418 33.0188 47.1093 33.0191 47.3007C33.0221 49.1441 31.7587 50.948 29.9673 51.4755L32.5391 51.2648C34.7708 51.0821 36.489 49.2175 36.489 46.9782V32.4216C36.4891 29.095 33.9747 26.3067 30.6658 25.964Z"--}}
                    {{--                                    fill="#B87D72"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M62.2942 16.5371C62.2942 29.5015 48.5197 28.8437 48.5197 28.8437C42.9175 27.5512 38.7407 22.532 38.7407 16.5371C38.7407 10.5422 42.9175 5.52284 48.5197 4.23047C48.5197 4.23047 62.2942 4.23047 62.2942 16.5371Z"--}}
                    {{--                                    fill="#F2FBFF"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M51.3703 3.9082C50.3899 3.9082 49.4357 4.01995 48.5195 4.23133C54.1218 5.52383 58.2985 10.5431 58.2985 16.538C58.2985 22.5328 54.1218 27.5522 48.5195 28.8446C49.4357 29.056 50.3899 29.1677 51.3703 29.1677C58.3455 29.1677 64 23.5132 64 16.538C64 9.5627 58.3455 3.9082 51.3703 3.9082Z"--}}
                    {{--                                    fill="#DFF6FD"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M57.9424 13.5506H54.8705C54.5879 13.5506 54.3587 13.3215 54.3587 13.0388V9.3887C54.3587 8.7782 53.8637 8.2832 53.2532 8.2832H49.4881C48.8776 8.2832 48.3826 8.7782 48.3826 9.3887V13.0388C48.3826 13.3215 48.1535 13.5506 47.8709 13.5506H44.2207C43.6102 13.5506 43.1152 14.0456 43.1152 14.6561V18.4212C43.1152 19.0317 43.6102 19.5267 44.2207 19.5267H47.8709C48.1535 19.5267 48.3826 19.7558 48.3826 20.0385V23.6886C48.3826 24.2991 48.8776 24.7941 49.4881 24.7941H53.2532C53.8637 24.7941 54.3587 24.2991 54.3587 23.6886V20.0386C54.3587 19.756 54.5879 19.5268 54.8705 19.5268H57.9424C58.5529 19.5268 59.0479 19.0318 59.0479 18.4213V14.6562C59.0479 14.0455 58.5529 13.5506 57.9424 13.5506Z"--}}
                    {{--                                    fill="#8AC9FE"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M58.5201 13.5508H57.9419C58.1744 14.5089 58.2985 15.5093 58.2985 16.5388C58.2985 17.5683 58.1744 18.5688 57.9419 19.5269H58.5201C59.1306 19.5269 59.6256 19.0319 59.6256 18.4214V14.6563C59.6256 14.0457 59.1308 13.5508 58.5201 13.5508Z"--}}
                    {{--                                    fill="#60B7FF"/>--}}
                    {{--                            </g>--}}
                    {{--                            <defs>--}}
                    {{--                                <clipPath id="clip0_5948_34959">--}}
                    {{--                                    <rect width="64" height="64" fill="white"/>--}}
                    {{--                                </clipPath>--}}
                    {{--                            </defs>--}}
                    {{--                        </svg>--}}
                    {{--                        <span>Hepatology</span>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-containerNho">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-container">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}
                    {{--            <div class="col-md-4">--}}
                    {{--                <div class="border-HomeNew">--}}
                    {{--                    <div class="w-75 d-flex align-items-center ">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">--}}
                    {{--                            <path--}}
                    {{--                                d="M15.1454 23.5664C13.2321 23.5664 11.6809 25.1175 11.6809 27.0309C9.20093 27.0309 7.19043 29.0414 7.19043 31.5214V31.5759C7.19043 34.0559 9.20093 36.0664 11.6809 36.0664H19.5648L25.8148 29.8164L19.5648 23.5664H15.1454Z"--}}
                    {{--                                fill="#C8866A"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M43.6846 0.9375H35.8652C31.2239 0.9375 26.7727 2.78125 23.4908 6.06313L19.4141 10.1399C15.7803 13.7736 15.6963 19.6974 19.3268 23.3344C19.4052 23.4129 19.4846 23.4905 19.5649 23.567C14.7126 27.7803 11.6822 34.0369 11.8137 40.9976C12.0469 53.3491 22.3279 63.259 34.6801 63.0595C36.9063 63.0236 39.0534 62.6629 41.0776 62.0251L46.3268 55.4977V1.20362C45.4732 1.02912 44.5896 0.9375 43.6846 0.9375Z"--}}
                    {{--                                fill="#FFB5C0"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M56.8094 14.062C56.8094 7.71825 52.3089 2.42575 46.3265 1.20312C42.8135 1.8225 39.5472 3.506 36.9906 6.06262L32.9139 10.1394C29.2801 13.7731 29.1961 19.6969 32.8266 23.3339C32.905 23.4124 32.9844 23.49 33.0647 23.5665C29.5692 26.6016 27.1804 30.7169 26.0767 35.3722C23.2541 47.2789 30.1021 58.5573 41.0774 62.0247C50.1962 59.1519 56.8094 50.6299 56.8094 40.5621V20.9731L54.3094 17.1968L56.8094 14.062Z"--}}
                    {{--                                fill="#FFDBE0"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M31.9833 43.1337H30.6083V41.7587C30.6083 40.371 29.8538 39.1601 28.7333 38.5117H25.1499V55.2558H28.7333C29.8538 54.6073 30.6083 53.3966 30.6083 52.0088V50.6338H31.9833C34.0543 50.6338 35.7333 48.9548 35.7333 46.8838C35.7333 44.8128 34.0543 43.1337 31.9833 43.1337Z"--}}
                    {{--                                fill="#FF8E9E"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M26.8584 52.0078V41.7578C26.8584 40.3701 27.6129 39.1592 28.7334 38.5108C28.1816 38.1916 27.5416 38.0078 26.8584 38.0078C24.7874 38.0078 23.1084 39.6868 23.1084 41.7578V43.1328H21.7334C19.6624 43.1328 17.9834 44.8118 17.9834 46.8828C17.9834 48.9538 19.6624 50.6328 21.7334 50.6328H23.1084V52.0078C23.1084 54.0788 24.7874 55.7578 26.8584 55.7578C27.5416 55.7578 28.1816 55.5742 28.7334 55.2548C27.6129 54.6064 26.8584 53.3956 26.8584 52.0078Z"--}}
                    {{--                                fill="#EA5B70"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M36.7205 28.5625C35.3675 29.9155 35.3675 32.109 36.7205 33.462C34.9669 35.2156 34.9669 38.0589 36.7205 39.8125L36.7591 39.8511C38.5127 41.6047 41.356 41.6047 43.1096 39.8511L48.6844 34.2764V25.4375H39.8455L36.7205 28.5625Z"--}}
                    {{--                                fill="#DB9E82"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M50.5596 7.8125C47.1078 7.8125 44.3096 10.6107 44.3096 14.0625V20.9736L39.8457 25.4375L48.6846 34.2764L53.1485 29.8125C55.4927 27.4683 56.8096 24.2889 56.8096 20.9736V14.0625C56.8096 10.6107 54.0113 7.8125 50.5596 7.8125Z"--}}
                    {{--                                fill="#FFB5C0"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M56.8096 14.0625C56.8096 7.71875 52.3091 2.42625 46.3267 1.20362C45.4732 1.02912 44.5896 0.9375 43.6846 0.9375H35.8652C31.2239 0.9375 26.7727 2.78125 23.4908 6.06313L19.4141 10.1399C15.7803 13.7736 15.6963 19.6974 19.3268 23.3344C19.4052 23.4129 19.4846 23.4905 19.5649 23.567C14.7126 27.7802 11.6822 34.0369 11.8137 40.9976C12.0469 53.3491 22.3279 63.259 34.6801 63.0595C36.9063 63.0236 39.0534 62.6629 41.0776 62.0251C50.1964 59.1522 56.8096 50.6302 56.8096 40.5625V20.9736"--}}
                    {{--                                stroke="black" stroke-width="0.5" stroke-miterlimit="10" stroke-linecap="round"--}}
                    {{--                                stroke-linejoin="round"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M36.7205 28.5625C35.3676 29.9155 35.3676 32.109 36.7205 33.462C34.9669 35.2156 34.9669 38.0589 36.7205 39.8125L36.7591 39.8511C38.5127 41.6047 41.356 41.6047 43.1096 39.8511L48.6844 34.2764L39.8455 25.4375L36.7205 28.5625Z"--}}
                    {{--                                stroke="black" stroke-width="0.5" stroke-miterlimit="10" stroke-linecap="round"--}}
                    {{--                                stroke-linejoin="round"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M44.3096 11.5625V20.9736L39.8457 25.4375L48.6846 34.2764L53.1485 29.8125C55.4927 27.4683 56.8096 24.2889 56.8096 20.9736V14.0625"--}}
                    {{--                                stroke="black" stroke-width="0.5" stroke-miterlimit="10" stroke-linecap="round"--}}
                    {{--                                stroke-linejoin="round"/>--}}
                    {{--                            <path d="M44.3096 20.9727L46.4533 21.892" stroke="black" stroke-width="0.5"--}}
                    {{--                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M18.5648 23.5664H15.1454C13.2321 23.5664 11.6809 25.1175 11.6809 27.0309C9.20093 27.0309 7.19043 29.0414 7.19043 31.5214V31.5759C7.19043 34.0559 9.20093 36.0664 11.6809 36.0664H12.2602"--}}
                    {{--                                stroke="black" stroke-width="0.5" stroke-miterlimit="10" stroke-linecap="round"--}}
                    {{--                                stroke-linejoin="round"/>--}}
                    {{--                            <path d="M19.5649 23.5664H22.5569" stroke="black" stroke-width="0.5" stroke-miterlimit="10"--}}
                    {{--                                  stroke-linecap="round" stroke-linejoin="round"/>--}}
                    {{--                            <path d="M38.6724 23.5664H41.6644" stroke="black" stroke-width="0.5" stroke-miterlimit="10"--}}
                    {{--                                  stroke-linecap="round" stroke-linejoin="round"/>--}}
                    {{--                            <path d="M36.7207 33.4619L37.5946 32.5879" stroke="black" stroke-width="0.5"--}}
                    {{--                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
                    {{--                            <path--}}
                    {{--                                d="M31.9834 43.1328H30.6084V41.7578C30.6084 39.6774 28.9166 38.0078 26.8584 38.0078C24.7874 38.0078 23.1084 39.6868 23.1084 41.7578V43.1328H21.7334C19.6624 43.1328 17.9834 44.8118 17.9834 46.8828C17.9834 48.9538 19.6624 50.6328 21.7334 50.6328H23.1084V52.0078C23.1084 54.0788 24.7874 55.7578 26.8584 55.7578C28.9145 55.7578 30.6084 54.0906 30.6084 52.0078V50.6328H31.9834C34.0544 50.6328 35.7334 48.9538 35.7334 46.8828C35.7334 44.8118 34.0544 43.1328 31.9834 43.1328Z"--}}
                    {{--                                stroke="black" stroke-width="0.5" stroke-miterlimit="10" stroke-linecap="round"--}}
                    {{--                                stroke-linejoin="round"/>--}}
                    {{--                            <path d="M23.1084 43.1328L23.3584 43.3828" stroke="black" stroke-width="0.5"--}}
                    {{--                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
                    {{--                            <path d="M30.6084 43.1328L30.3584 43.3828" stroke="black" stroke-width="0.5"--}}
                    {{--                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
                    {{--                            <path d="M23.1084 50.6328L23.3584 50.3828" stroke="black" stroke-width="0.5"--}}
                    {{--                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
                    {{--                            <path d="M30.6084 50.6328L30.3584 50.3828" stroke="black" stroke-width="0.5"--}}
                    {{--                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
                    {{--                        </svg>--}}
                    {{--                        <span>Obstetrics</span>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-containerNho">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-container">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}
                    {{--            <div class="col-md-4">--}}
                    {{--                <div class="border-HomeNew">--}}
                    {{--                    <div class="w-75 d-flex align-items-center ">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">--}}
                    {{--                            <g clip-path="url(#clip0_5948_29008)">--}}
                    {{--                                <path--}}
                    {{--                                    d="M32 64C49.6731 64 64 49.6731 64 32C64 14.3269 49.6731 0 32 0C14.3269 0 0 14.3269 0 32C0 49.6731 14.3269 64 32 64Z"--}}
                    {{--                                    fill="#FFBEAA"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M11.0171 39.8964L35.0617 63.8559C51.2986 62.3146 64 48.6409 64 32.0005C64 30.37 63.878 28.7681 63.6427 27.2032L52.9922 16.5527L11.0171 39.8964Z"--}}
                    {{--                                    fill="#FAA68E"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M31.9999 48.6446C26.7228 48.6446 21.544 47.2361 17.0233 44.5714C12.6345 41.9842 8.96652 38.2863 6.41602 33.877C8.96652 29.4679 12.6344 25.7697 17.0233 23.1826C21.5439 20.5179 26.7228 19.1094 31.9999 19.1094C37.277 19.1094 42.4558 20.5179 46.9765 23.1826C51.3654 25.7697 55.0333 29.4678 57.5838 33.877C55.0333 38.2863 51.3653 41.9842 46.9765 44.5714C42.4558 47.2361 37.277 48.6446 31.9999 48.6446Z"--}}
                    {{--                                    fill="white"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M57.584 33.8769C52.4796 25.0529 42.941 19.1149 32.0151 19.1094V48.6444C42.9411 48.639 52.4796 42.701 57.584 33.8769Z"--}}
                    {{--                                    fill="#E9EDF5"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M32 47.2696C39.396 47.2696 45.3916 41.2739 45.3916 33.878C45.3916 26.482 39.396 20.4863 32 20.4863C24.604 20.4863 18.6084 26.482 18.6084 33.878C18.6084 41.2739 24.604 47.2696 32 47.2696Z"--}}
                    {{--                                    fill="#64E1DC"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M45.3918 33.8778C45.3918 26.4868 39.4043 20.4946 32.0151 20.4863V47.2692C39.4043 47.2612 45.3918 41.2688 45.3918 33.8778Z"--}}
                    {{--                                    fill="#1CADB5"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M31.9998 40.4538C35.6319 40.4538 38.5763 37.5094 38.5763 33.8773C38.5763 30.2452 35.6319 27.3008 31.9998 27.3008C28.3677 27.3008 25.4233 30.2452 25.4233 33.8773C25.4233 37.5094 28.3677 40.4538 31.9998 40.4538Z"--}}
                    {{--                                    fill="#707789"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M38.5766 33.8769C38.5766 30.2498 35.6403 27.3089 32.0151 27.3008V40.453C35.6404 40.4449 38.5766 37.504 38.5766 33.8769Z"--}}
                    {{--                                    fill="#555A66"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M46.3692 32.8195C51.606 32.8195 55.8512 28.5742 55.8512 23.3375C55.8512 18.1007 51.606 13.8555 46.3692 13.8555C41.1324 13.8555 36.8872 18.1007 36.8872 23.3375C36.8872 28.5742 41.1324 32.8195 46.3692 32.8195Z"--}}
                    {{--                                    fill="#FF7045"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M55.8508 23.3367C55.8508 18.1096 51.621 13.871 46.3975 13.8555V32.818C51.621 32.8025 55.8508 28.564 55.8508 23.3367Z"--}}
                    {{--                                    fill="#DE4726"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M52.4328 21.0186H48.6877V17.2734H44.0508V21.0186H40.3057V25.6554H44.0508V29.4006H48.6877V25.6554H52.4328V21.0186Z"--}}
                    {{--                                    fill="white"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M48.6873 21.0186V17.2734H46.3975V29.4006H48.6873V25.6554H52.4325V21.0186H48.6873Z"--}}
                    {{--                                    fill="#E9EDF5"/>--}}
                    {{--                            </g>--}}
                    {{--                            <defs>--}}
                    {{--                                <clipPath id="clip0_5948_29008">--}}
                    {{--                                    <rect width="64" height="64" fill="white"/>--}}
                    {{--                                </clipPath>--}}
                    {{--                            </defs>--}}
                    {{--                        </svg>--}}
                    {{--                        <span>Ophthalmology</span>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-containerNho">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-container">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}
                    {{--            <div class="col-md-4">--}}
                    {{--                <div class="border-HomeNew">--}}
                    {{--                    <div class="w-75 d-flex align-items-center ">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">--}}
                    {{--                            <g clip-path="url(#clip0_5948_29797)">--}}
                    {{--                                <path--}}
                    {{--                                    d="M28 0V0.03C28 1.32139 28.3334 2.5909 28.968 3.71563L34.2164 14.7895C33.2523 16.7185 32.716 18.8328 32.644 20.988C32.5719 23.1432 32.9659 25.2886 33.799 27.2776L35.7115 31.8385C38.1819 37.7305 33.8956 43.9902 27.5556 43.9902L12.6455 44C10.6178 44 8.67312 44.8055 7.23932 46.2393C5.80551 47.6731 5 49.6178 5 51.6455V64H14V54.7832C14 54.5216 14.0783 54.2659 14.225 54.0491C14.3716 53.8323 14.5798 53.6645 14.8227 53.5671C15.0656 53.4697 15.3321 53.4474 15.5879 53.5028C15.8436 53.5583 16.0769 53.6891 16.2576 53.8784L20.1005 57.9021C22.633 60.5538 27.9861 62.2838 31.6196 62.7755C36.3406 63.414 41.1456 62.683 45.4631 60.6694C52.7216 57.287 57.8036 50.8806 60.0006 43.1232L61.4839 37.8046C61.5779 37.5321 61.6641 37.257 61.7383 36.9784C63.4618 30.4955 63.7071 23.5919 60.6468 17.6214L59 14.3C56.258 8.95 52.4033 6.39437 47.5037 7.12337C46.7495 7.23115 45.9808 7.17168 45.2521 6.94918C44.5234 6.72668 43.8525 6.3466 43.2871 5.83588L40.25 3.118C39.8568 2.76628 39.5422 2.33555 39.3268 1.85394C39.1114 1.37234 39 0.850703 39 0.323125V0L28 0Z"--}}
                    {{--                                    fill="#FFD4CF"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M49.7254 37.6894L48.2754 36.3114L49.4187 35.1086C50.804 33.2371 51.4099 30.9015 51.1094 28.5926C50.8088 26.2836 49.6251 24.1811 47.8069 22.7265L43.7771 19.5026C38.1711 15.0178 34.376 8.65697 33.0917 1.59352L33.0167 1.17927C33.0084 1.13268 33.0032 1.08556 33.0014 1.03827L32.9639 0.0382656L34.9617 -0.0371094L34.997 0.891891L35.0595 1.23627C36.2573 7.82483 39.7974 13.758 45.0266 17.9411L49.0564 21.165C51.288 22.9503 52.7373 25.5341 53.0972 28.3692C53.4572 31.2044 52.6996 34.0683 50.9849 36.3546C50.9616 36.3857 50.9366 36.4155 50.9099 36.4436L49.7254 37.6894Z"--}}
                    {{--                                    fill="#FF6672"/>--}}
                    {{--                                <path d="M32 46H36V48H32V46Z" fill="#FFEFED"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M43.0488 52.2129L44.9887 51.7269L45.9906 55.7264L44.0507 56.2123L43.0488 52.2129Z"--}}
                    {{--                                    fill="#FFEFED"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M35.3589 54.0273L38.2147 50.3846L39.7887 51.6186L36.9329 55.2613L35.3589 54.0273Z"--}}
                    {{--                                    fill="#FFEFED"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M30.0002 39.0008L27.7571 30.7758C29.0945 27.8181 29.3615 24.4874 28.5125 21.3544C27.6635 18.2214 25.7513 15.4812 23.1036 13.6035C20.4559 11.7257 17.2375 10.8272 14 11.0621C10.7626 11.2969 7.70755 12.6504 5.35853 14.8906C3.00951 17.1308 1.51274 20.1182 1.12473 23.3409C0.736721 26.5636 1.48163 29.8209 3.23179 32.5547C4.98196 35.2884 7.62841 37.3283 10.7176 38.3249C13.8068 39.3214 17.1465 39.2126 20.1642 38.0169L30.0002 39.0008Z"--}}
                    {{--                                    fill="#80DAFF"/>--}}
                    {{--                                <path d="M24 22H18V16H12V22H6V28H12V34H18V28H24V22Z" fill="#F2FAFF"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M45.7979 36.2044L39.5479 44.0144C38.5123 45.3084 38.7218 47.1969 40.0159 48.2324C41.3099 49.268 43.1983 49.0584 44.2339 47.7644L50.4839 39.9544C51.5194 38.6604 51.3099 36.772 50.0159 35.7364C48.7218 34.7009 46.8334 34.9104 45.7979 36.2044Z"--}}
                    {{--                                    fill="#FDBF44"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M39.5331 44.0294C39.2869 44.3369 39.1037 44.6899 38.9939 45.0683C38.8841 45.4467 38.8499 45.8429 38.8932 46.2345C38.9366 46.6261 39.0566 47.0053 39.2465 47.3505C39.4364 47.6956 39.6925 48 40 48.2463C40.3075 48.4925 40.6606 48.6757 41.0389 48.7855C41.4173 48.8953 41.8136 48.9295 42.2051 48.8862C42.5967 48.8428 42.9759 48.7228 43.3211 48.5328C43.6663 48.3429 43.9706 48.0869 44.2169 47.7794L46.0919 45.4375L41.4081 41.6875L39.5331 44.0294Z"--}}
                    {{--                                    fill="#FF6672"/>--}}
                    {{--                            </g>--}}
                    {{--                            <defs>--}}
                    {{--                                <clipPath id="clip0_5948_29797">--}}
                    {{--                                    <rect width="64" height="64" fill="white"/>--}}
                    {{--                                </clipPath>--}}
                    {{--                            </defs>--}}
                    {{--                        </svg>--}}
                    {{--                        <span>Endoscopy department</span>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-containerNho">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M16.6666 0H7.3333V7.33268L0 7.33268V16.666H7.3333V24H16.6666V16.666H24V7.33268L16.6666 7.33268V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="svg-container">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"--}}
                    {{--                             fill="none">--}}
                    {{--                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"--}}
                    {{--                                  d="M41.6667 0H18.3333V18.3327H0V41.666H18.3333V60H41.6667V41.666H60V18.3327H41.6667V0Z"--}}
                    {{--                                  fill="#D8F6FF"/>--}}
                    {{--                        </svg>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}

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
                <div class="tab-content mt-4" id="myTabContent">
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
                                    <div class="col-md-3 col-12">
                                        <div class="p-3">
                                            <div class="product-item">
                                                <div class="img-pro h-100 justify-content-center d-flex">
                                                    <img src="{{$doctor->avt}}" alt="">
                                                    <a class="button-heart" data-favorite="0">
                                                        <i id="icon-heart" class="bi-heart bi"
                                                           data-product-id="${product.id}"
                                                           onclick="addProductToWishList(${product.id})"></i>
                                                    </a>
                                                    <s class="icon-chuyen-khoa">
                                                        @php
                                                            $department = \App\Models\Department::where('id',$doctor->department_id)->value('thumbnail');
                                                        @endphp
                                                        <img src="{{$department}}">
                                                    </s>
                                                </div>
                                                <div class="content-pro p-3">
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
                                    <div class="col-md-3 col-12">
                                        <div class="p-3">
                                            <div class="product-item">
                                                <div
                                                    class="img-pro h-100 justify-content-center d-flex img_product--homeNew">
                                                    <img src="{{$medicine->thumbnail}}" alt="">
                                                    <a class="button-heart" data-favorite="0">
                                                        <i id="icon-heart" class="bi-heart bi"
                                                           data-product-id="${product.id}"
                                                           onclick="addProductToWishList(${product.id})"></i>
                                                    </a>
                                                </div>
                                                <div class="content-pro p-3">
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
                    <div class="tab-pane fade" id="mentoring" role="tabpanel" aria-labelledby="mentoring-tab">
                        <div class="section1-content mt-5">
                            <div class="px-5 py-2">
                                <div class="content__item d-flex gap-3">
                                    <img
                                        class="content__item__image"
                                        src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                        alt=""
                                    />
                                    <div>
                                        <h6>
                                            {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}
                                        </h6>
                                        <p>
                                            {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                                        </p>
                                        <p class="content__item-link">{{ __('home.Read') }}</p>
                                    </div>
                                </div>
                            </div>
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
        <div id="recruitment-homeNew" class="p-3">
            <div class="title-recruitment--homeNew">
                <span>{{ __('home.Recruitment') }}</span>
                <p>{{ __('home.Hire staffs cheaper, find your staffs faster') }}</p>
            </div>
            <div class="d-md-flex main-recruitment--homeNew justify-content-between">
                <div class="col-md-6 col-12 pl-0 main-card--homeNew">
                    <div class="d-flex content-recruitment--homeNew">
                        <div class="col-md-3 p-0">
                            <img src="{{asset('img/icons_logo/image 1.jpeg')}}" alt=""/>
                        </div>
                        <div class="col-md-9 text-title--card">
                            <span>
                                {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}
                            </span>
                            <div class="content__item__describe">
                                {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex content-recruitment--homeNew">
                        <div class="col-md-3 p-0">
                            <img src="{{asset('img/icons_logo/image 1.jpeg')}}" alt=""/>
                        </div>
                        <div class="col-md-9 text-title--card">
                            <span>
                                {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}
                            </span>
                            <div class="content__item__describe">
                                {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex content-recruitment--homeNew">
                        <div class="col-md-3 p-0">
                            <img src="{{asset('img/icons_logo/image 1.jpeg')}}" alt=""/>
                        </div>
                        <div class="col-md-9 text-title--card">
                            <span>
                                {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}
                            </span>
                            <div class="content__item__describe">
                                {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex content-recruitment--homeNew">
                        <div class="col-md-3 p-0">
                            <img src="{{asset('img/icons_logo/image 1.jpeg')}}" alt=""/>
                        </div>
                        <div class="col-md-9 text-title--card">
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
                            <div>
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
                            <div>
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
                            <div>
                                <span>{{ __('home.BETTER MATCHING RATE') }}</span>
                                <p>{{ __('home.Through us, you can hire right person') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-auto p-2 button-bottom-right">
                        <button class="btn-see-all ">{{ __('home.See all') }}</button>
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
                <div class="tab-content mt-4" id="myTabContent">
                    <div class="tab-pane fade show active" id="popularProduct" role="tabpanel"
                         aria-labelledby="popularProduct-tab">
                        <div class="row">
                            @if($productsFlea == '')
                                <h1 class="d-flex align-items-center justify-content-center mt-4">{{ __('home.null') }}</h1>
                            @else
                                @foreach($productsFlea as $product)
                                    <div class="col-md-3 col-12">
                                        <div class="p-3">
                                            <div class="product-item">
                                                <div
                                                    class="img-pro h-100 justify-content-center d-flex img_product--homeNew">
                                                    <img src="{{$product->thumbnail}}" alt="">
                                                    <a class="button-heart" data-favorite="0">
                                                        <i id="icon-heart" class="bi-heart bi"
                                                           data-product-id="${product.id}"
                                                           onclick="addProductToWishList(${product.id})"></i>
                                                    </a>
                                                </div>
                                                <div class="content-pro p-3">
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
                    </div>
                </div>

                {{--            <div id="recruitment-homeNew" class="p-3">--}}
                {{--                <div class="title-recruitment--homeNew">--}}
                {{--                    <span>{{ __('home.Flea market') }}</span>--}}
                {{--                    <p>{{ __('home.Hire staffs cheaper, find your staffs faster') }}</p>--}}
                {{--                </div>--}}
                {{--                <div class="d-md-flex main-recruitment--homeNew">--}}
                {{--                    <div class="col-md-7 col-12 pl-0 main-card--homeNew">--}}

                {{--                        <div class="d-flex justify-content-center align-items-center">--}}
                {{--                            {{$products->links()}}--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="col-md-5 main-title-card--homeNew col-12">--}}
                {{--                        <div class="w-100">--}}
                {{--                            <div class="describe-item">--}}
                {{--                                <span>{{ __('home.BUY YOUR EQUIPMENT CHEAP') }}</span>--}}
                {{--                                <p>{{ __('home.Find your products you though us.') }}</p>--}}
                {{--                            </div>--}}
                {{--                            <div class="describe-item">--}}
                {{--                                <span>{{ __('home.EASY TO FIND YOUR BUYER') }}</span>--}}
                {{--                                <p>{{ __("home.Please find your buyers around you more easy") }}!</p>--}}
                {{--                            </div>--}}
                {{--                            <div class="describe-item">--}}
                {{--                                <span>{{ __('home.SELL YOUR OLD MACHINE FAST') }}</span>--}}
                {{--                                <p>{{ __('home.Throrugh us, you can sell your unnecessarry  products in you clinics to other clinics around you.') }}</p>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                        <div class="mt-auto p-2 button-bottom-right">--}}
                {{--                            <button class="btn-see-all ">{{ __('home.See all') }}</button>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--            </div>--}}
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
                                    <div class="col-md-3 col-12">
                                        <div class="p-3">
                                            <div class="product-item">
                                                <div
                                                    class="img-pro h-100 justify-content-center d-flex img_product--homeNew">
                                                    <img src="{{$product->thumbnail}}" alt="">
                                                    <a class="button-heart" data-favorite="0">
                                                        <i id="icon-heart" class="bi-heart bi"
                                                           data-product-id="${product.id}"
                                                           onclick="addProductToWishList(${product.id})"></i>
                                                    </a>
                                                </div>
                                                <div class="content-pro p-3">
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
                                    <div class="col-md-3 col-12">
                                        <div class="p-3">
                                            <div class="product-item">
                                                <div
                                                    class="img-pro h-100 justify-content-center d-flex img_product--homeNew">
                                                    <img src="{{$product->thumbnail}}" alt="">
                                                    <a class="button-heart" data-favorite="0">
                                                        <i id="icon-heart" class="bi-heart bi"
                                                           data-product-id="${product.id}"
                                                           onclick="addProductToWishList(${product.id})"></i>
                                                    </a>
                                                </div>
                                                <div class="content-pro p-3">
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
                                    <div class="col-md-3 col-12">
                                        <div class="p-3">
                                            <div class="product-item">
                                                <div
                                                    class="img-pro h-100 justify-content-center d-flex img_product--homeNew">
                                                    <img src="{{$product->thumbnail}}" alt="">
                                                    <a class="button-heart" data-favorite="0">
                                                        <i id="icon-heart" class="bi-heart bi"
                                                           data-product-id="${product.id}"
                                                           onclick="addProductToWishList(${product.id})"></i>
                                                    </a>
                                                </div>
                                                <div class="content-pro p-3">
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
                                    <div class="col-md-3 col-12">
                                        <div class="p-3">
                                            <div class="product-item">
                                                <div
                                                    class="img-pro h-100 justify-content-center d-flex img_product--homeNew">
                                                    <img src="{{$product->thumbnail}}" alt="">
                                                    <a class="button-heart" data-favorite="0">
                                                        <i id="icon-heart" class="bi-heart bi"
                                                           data-product-id="${product.id}"
                                                           onclick="addProductToWishList(${product.id})"></i>
                                                    </a>
                                                </div>
                                                <div class="content-pro p-3">
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
    {{-- SLIDE  --}}
    <script>
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
    {{-- END SLIDE --}}
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
                <div class="p-3">
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
@endsection
