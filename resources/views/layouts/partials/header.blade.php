@php use App\Enums\CommonType;use App\Enums\Role;use App\Enums\TypeTimeWork;use App\Http\Middleware\MedicalPermission;use Illuminate\Support\Facades\Auth; @endphp

<link href="{{ asset('css/header.css') }}" rel="stylesheet">
<link href="{{ asset('css/loginNew.css') }}" rel="stylesheet">

{{--<style>--}}
{{--    /*.main-header {*/--}}
{{--    /*    z-index: 2 !important;*/--}}
{{--    /*}*/--}}
{{--</style>--}}

<header class="container">
    <div class="main-header">
        <div class="before-header d-flex justify-content-between align-items-center">
            <div class="list-social d-flex justify-content-between align-items-center">
                <div class="social-item">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_3391_30104)">
                                <path
                                    d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z"
                                    fill="#3C5A9A"/>
                                <path
                                    d="M15.9014 3.68359H13.2431C11.6656 3.68359 9.91092 4.34708 9.91092 6.63376C9.91862 7.43053 9.91092 8.1936 9.91092 9.05238H8.08594V11.9565H9.96739V20.3168H13.4247V11.9013H15.7066L15.913 9.04423H13.3651C13.3651 9.04423 13.3708 7.77329 13.3651 7.40421C13.3651 6.50056 14.3054 6.55231 14.3619 6.55231C14.8094 6.55231 15.6794 6.55361 15.9027 6.55231V3.68359H15.9014Z"
                                    fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_3391_30104">
                                    <rect width="24" height="24" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
                <div class="social-item">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_3391_30107)">
                                <path
                                    d="M23.4394 12.2242C23.4394 11.2409 23.3596 10.5234 23.187 9.7793H11.959V14.2173H18.5495C18.4167 15.3202 17.6992 16.9811 16.1047 18.0972L16.0823 18.2458L19.6324 20.996L19.8783 21.0205C22.1372 18.9344 23.4394 15.8649 23.4394 12.2242Z"
                                    fill="#4285F4"/>
                                <path
                                    d="M11.9586 23.9178C15.1874 23.9178 17.898 22.8548 19.878 21.0211L16.1043 18.0978C15.0944 18.8021 13.7391 19.2937 11.9586 19.2937C8.79619 19.2937 6.11212 17.2076 5.15533 14.3242L5.01509 14.3361L1.32367 17.193L1.27539 17.3272C3.24193 21.2337 7.28134 23.9178 11.9586 23.9178Z"
                                    fill="#34A853"/>
                                <path
                                    d="M5.15551 14.3248C4.90305 13.5807 4.75695 12.7834 4.75695 11.9596C4.75695 11.1357 4.90305 10.3385 5.14223 9.59439L5.13554 9.43592L1.39786 6.5332L1.27557 6.59137C0.465069 8.21247 0 10.0329 0 11.9596C0 13.8863 0.465069 15.7066 1.27557 17.3277L5.15551 14.3248Z"
                                    fill="#FBBC05"/>
                                <path
                                    d="M11.9586 4.62403C14.2042 4.62403 15.7189 5.59402 16.5826 6.40461L19.9576 3.10928C17.8849 1.1826 15.1874 0 11.9586 0C7.28134 0 3.24192 2.68406 1.27539 6.59057L5.14205 9.59359C6.11212 6.7102 8.79618 4.62403 11.9586 4.62403Z"
                                    fill="#EB4335"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_3391_30107">
                                    <rect width="24" height="24" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
                <div class="social-item">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_3391_30112)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24C18.6274 24 24 18.6274 24 12ZM22.56 12C22.56 6.16787 17.8321 1.44 12 1.44C6.16787 1.44 1.44 6.16787 1.44 12C1.44 17.8321 6.16787 22.56 12 22.56C17.8321 22.56 22.56 17.8321 22.56 12ZM16.4907 9.37131C15.7981 8.33983 14.7193 8.19852 14.3349 8.18219C13.4168 8.08757 12.5434 8.73236 12.0775 8.73236C11.6127 8.73236 10.8937 8.19618 10.1323 8.21027C9.13159 8.22541 8.20888 8.80251 7.69362 9.71471C6.65389 11.551 7.42736 14.2714 8.44072 15.7607C8.93588 16.4897 9.52633 17.3085 10.3016 17.2792C11.0481 17.2489 11.3304 16.7875 12.233 16.7875C13.1356 16.7875 13.3893 17.2792 14.1794 17.2641C14.9827 17.249 15.4917 16.5212 15.9834 15.79C16.5521 14.9443 16.7862 14.1255 16.8 14.0834C16.7822 14.0752 15.2335 13.4713 15.218 11.6561C15.2031 10.1364 16.4356 9.40752 16.4907 9.37131ZM14.3469 5.28C13.7542 5.30456 13.0358 5.68183 12.6106 6.18879C12.229 6.6385 11.895 7.35628 11.9845 8.04545C12.6462 8.09802 13.3216 7.70322 13.7335 7.19627C14.1449 6.68817 14.4227 5.98324 14.3469 5.28Z"
                                      fill="black"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_3391_30112">
                                    <rect width="24" height="24" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
                <div class="social-item">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_3391_30114)">
                                <path
                                    d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24Z"
                                    fill="#FFEB3B"/>
                                <path
                                    d="M10.4141 11L9.98182 12.219H10.845L10.4141 11ZM10.4141 11L9.98182 12.219H10.845L10.4141 11ZM12 5.80859C7.85864 5.80859 4.5 8.43768 4.5 11.6831C4.5 13.7804 5.90318 15.6213 8.01545 16.659C6.96682 20.2522 6.35046 20.4868 10.6677 17.4636C11.1091 17.5258 11.5543 17.5567 12 17.5563C16.1414 17.5563 19.5 14.9259 19.5 11.6818C19.5 8.43769 16.1414 5.80859 12 5.80859ZM7.85318 13.7327C7.10455 13.7327 7.54636 12.6977 7.42091 10.7695C7.14818 10.7231 6.32045 10.955 6.32045 10.3481C6.32118 10.2363 6.36622 10.1292 6.44571 10.0505C6.52521 9.97178 6.63267 9.92778 6.74455 9.92814C8.31818 10.0413 9.38455 9.63496 9.38455 10.3481C9.38455 10.9659 8.58818 10.7177 8.28545 10.7695C8.16 12.6909 8.60045 13.7327 7.85318 13.7327ZM11.9223 13.6672C11.25 13.9727 11.2336 13.284 11.0727 12.9854H9.75409C9.59182 13.2909 9.57818 13.9781 8.90455 13.6672C8.39864 13.4354 9.22227 12.2586 9.83727 10.3509C9.87663 10.229 9.9536 10.1228 10.0571 10.0475C10.1606 9.97212 10.2854 9.93154 10.4134 9.93154C10.5414 9.93154 10.6662 9.97212 10.7697 10.0475C10.8732 10.1228 10.9502 10.229 10.9895 10.3509C11.6168 12.2954 12.4309 13.4354 11.9223 13.6672ZM12.7214 13.6672C11.9973 13.6672 12.4377 12.6895 12.3123 10.3536C12.3123 9.78496 13.1959 9.78632 13.1959 10.3536V12.8818C13.6132 12.9377 14.5295 12.6759 14.5295 13.2759C14.5241 13.91 13.5395 13.5895 12.7214 13.67V13.6672ZM16.7223 13.5431L15.7077 12.2068L15.5577 12.3568V13.2963C15.5577 13.3531 15.5465 13.4094 15.5247 13.4619C15.5028 13.5143 15.4709 13.5619 15.4306 13.602C15.3903 13.642 15.3424 13.6737 15.2898 13.6952C15.2372 13.7167 15.1809 13.7276 15.1241 13.7272C14.3727 13.7272 14.8227 12.6445 14.6918 10.3563C14.6925 10.2421 14.7384 10.1329 14.8194 10.0524C14.9004 9.97194 15.0099 9.92677 15.1241 9.92678C15.7773 9.92678 15.495 10.8513 15.5564 11.2809C16.7836 10.1095 16.7523 9.98541 17.0045 9.98541C17.3523 9.98541 17.565 10.4177 17.3332 10.6468L16.3473 11.6259L17.4123 13.0277C17.76 13.4818 17.0659 14.0013 16.7223 13.5459V13.5431ZM9.98182 12.219H10.845L10.4141 11L9.98182 12.219ZM10.4141 11L9.98182 12.219H10.845L10.4141 11ZM10.4141 11L9.98182 12.219H10.845L10.4141 11Z"
                                    fill="#3E2723"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_3391_30114">
                                    <rect width="24" height="24" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="list-flag d-flex justify-content-between align-items-center">
                <div class="flag-item">
                    <a href="{{ route('language', ['locale'=>'en']) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="24" viewBox="0 0 32 24" fill="none">
                            <path d="M2 2H34V26H2V2Z" fill="#012169"/>
                            <path
                                d="M5.75 2L17.95 11.05L30.1 2H34V5.1L22 14.05L34 22.95V26H30L18 17.05L6.05 26H2V23L13.95 14.1L2 5.2V2H5.75Z"
                                fill="white"/>
                            <path
                                d="M23.2 16.05L34 24V26L20.45 16.05H23.2ZM14 17.05L14.3 18.8L4.7 26H2L14 17.05ZM34 2V2.15L21.55 11.55L21.65 9.35L31.5 2H34ZM2 2L13.95 10.8H10.95L2 4.1V2Z"
                                fill="#C8102E"/>
                            <path d="M14.05 2V26H22.05V2H14.05ZM2 10V18H34V10H2Z" fill="white"/>
                            <path d="M2 11.65V16.45H34V11.65H2ZM15.65 2V26H20.45V2H15.65Z" fill="#C8102E"/>
                        </svg>
                    </a>
                </div>
                <div class="flag-item">
                    <a href="{{ route('language', ['locale'=>'vi']) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="24" viewBox="0 0 32 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M-2 0H34V24H-2V0Z" fill="#DA251D"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M20.3875 17.8602L16.1875 14.7336L12.0156 17.8883L13.5625 12.7508L9.39062 9.57734L14.5516 9.53047L16.1547 4.40234L17.7813 9.51641L22.9422 9.52109L18.7938 12.7273L20.3828 17.8648L20.3875 17.8602Z"
                                  fill="#FFFF00"/>
                        </svg>
                    </a>
                </div>
                <div class="flag-item">
                    <a href="{{ route('language', ['locale'=>'laos']) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="24" viewBox="0 0 32 24" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M-2 0H34V24H-2V0Z" fill="#CE1126"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M-2 5.96484H34V18.0348H-2V5.96484Z"
                                  fill="#002868"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M21.1701 12.0001C21.1701 13.3712 20.6254 14.6863 19.6558 15.6558C18.6863 16.6254 17.3713 17.1701 16.0001 17.1701C14.6289 17.1701 13.3139 16.6254 12.3443 15.6558C11.3748 14.6863 10.8301 13.3712 10.8301 12.0001C10.8301 10.6289 11.3748 9.3139 12.3443 8.34434C13.3139 7.37477 14.6289 6.83008 16.0001 6.83008C17.3713 6.83008 18.6863 7.37477 19.6558 8.34434C20.6254 9.3139 21.1701 10.6289 21.1701 12.0001Z"
                                  fill="white"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="header-30px d-flex justify-content-around align-items-center header-pc">
            <div class="header-left">
                <a href="{{route('home')}}"><img class="w-100" src="{{asset('img/icons_logo/logo-new.png')}}"
                                                 alt="logo"></a>
            </div>
            <div class="header-center d-flex">
                <a href="{{route('recruitment.index')}}" hidden="">{{ __('home.Recruitment') }}</a>
                <a href="{{route('flea-market.index')}}">{{ __('home.Flea market') }}</a>
                <a href="{{route('examination.index')}}">{{ __('home.Examination') }}</a>
                <a href="{{route('index.new')}}">{{ __('home.New/Events') }}</a>
                <a href="{{route('medicine')}}">{{ __('home.Online Medicine') }}</a>
                <a href="{{route('clinic')}}">{{ __('home.Clinic/Pharmacies') }}</a>
                <a href="{{route('what.free')}}">{{ __("home.What's free") }}?</a>
            </div>
            <div class="header-right d-flex align-items-center">
                @if(Auth::check())
                    <div class="dropdown">
                        <div class="d-flex dropdown-toggle justify-content-between" type="button" data-toggle="dropdown"
                             aria-expanded="false">
                            <div class="d-flex align-items-center mr-2">
                                {{Auth::user()->username}}
                            </div>
                            <img src="{{asset('img/user-circle.png')}}">
                        </div>
                        <div class="dropdown-menu">
                            <a class="dropdown-item"
                               href="{{ route('profile') }}">{{ __('home.Trang cá nhân') }}</a>
                            @if(Auth::user()->type != Role::NORMAL)
                                <a class="dropdown-item"
                                   href="{{ route('view.prescription.result.create') }}">Create Prescription</a>
                            @else
                                <a class="dropdown-item"
                                   href="{{ route('view.prescription.result.my.list') }}">My Prescription</a>
                            @endif
                            <a class="dropdown-item"
                               href="{{route('booking.list.by.user')}}">{{ __('home.My booking') }}</a>
                            <a class="dropdown-item" href="{{route('logoutProcess')}}">{{ __('home.Logout') }}</a>
                        </div>
                    </div>
                @else
                    <button class="account_control" id="show_login" data-toggle="modal"
                            data-target="#staticBackdrop">{{ __('home.Log In') }}
                    </button>
                    <div>|</div>
                    <button type="button" class="account_control" data-toggle="modal"
                            data-target="#modalRegister">{{ __('home.Sign Up') }}
                    </button>
                @endif
            </div>
        </div>
    </div>
    <div class="header-mobile row d-flex d-none">
        <nav class="navbar bg-lights fixed-top d-flex">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <button class="navbar-toggler border-none" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="align-items-center row">
                    <a href="{{route('home')}}">
                        <img class="w-100px" src="{{asset('img/icons_logo/logo-new.png')}}">
                    </a>
                </div>
                <div class="header-right d-flex align-items-center">
                    @if(Auth::check())
                        <div class="dropdown">
                            <div class="d-flex dropdown-toggle justify-content-between" type="button"
                                 data-toggle="dropdown"
                                 aria-expanded="false">
                                <div class="d-flex align-items-center mr-2">
                                    {{Auth::user()->username}}
                                </div>
                                <img src="{{asset('img/user-circle.png')}}">
                            </div>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"
                                   href="{{ route('profile') }}">{{ __('home.Trang cá nhân') }}</a>
                                <a class="dropdown-item"
                                   href="{{route('booking.list.by.user')}}">{{ __('home.My booking') }}</a>
                                <a class="dropdown-item" href="{{route('logoutProcess')}}">{{ __('home.Logout') }}</a>
                            </div>
                        </div>
                    @else
                        <button class="account_control" id="show_login" data-toggle="modal"
                                data-target="#staticBackdrop">{{ __('home.Log In') }}
                        </button>
                        <div>|</div>
                        <button type="button" class="account_control" data-toggle="modal"
                                data-target="#modalRegister">{{ __('home.Sign Up') }}
                        </button>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</header>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">
        <a href="{{route('home')}}" class="offcanvas-title" id="offcanvasNavbarLabel"><img class="w-100"
                                                                                           src="{{asset('img/icons_logo/logo-new.png')}}"></a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item button-nav-header mb-3" hidden="">
                <a class="nav-link" href="{{route('recruitment.index')}}">{{ __('home.Recruitment') }}</a>
            </li>
            <li class="nav-item button-nav-header mb-3">
                <a class="nav-link" href="{{route('flea-market.index')}}">{{ __('home.Flea market') }}</a>
            </li>
            <li class="nav-item button-nav-header mb-3">
                <a class="nav-link" href="{{route('examination.index')}}">{{ __('home.Examination') }}</a>
            </li>
            <li class="nav-item button-nav-header mb-3">
                <a class="nav-link" href="{{route('index.new')}}">{{ __('home.New/Events') }}</a>
            </li>
            <li class="nav-item button-nav-header mb-3">
                <a class="nav-link" href="{{route('medicine')}}">{{ __('home.Online Medicine') }}</a>
            </li>
            <li class="nav-item button-nav-header mb-3">
                <a class="nav-link" href="{{route('clinic')}}">{{ __('home.Clinic/Pharmacies') }}</a>
            </li>
            <li class="nav-item button-nav-header mb-3">
                <a class="nav-link" href="{{route('what.free')}}">{{ __("home.What's free") }}?</a>
            </li>
        </ul>
    </div>
</div>
<div class="modal fade container" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modal_login">
            <div class="modal-body">
                <div class="close-btn">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <form method="post" action="{{ route('loginProcess') }}">
                    @csrf
                    <div class="popup d-lg-flex justify-content-center">
                        <div class="form">
                            <div class="form-element">
                                <label for="email">{{ __('home.Email') }}</label>
                                <input id="email" name="email" type="email" placeholder="exmaple@gmail.com">
                            </div>
                            <div class="form-element">
                                <label for="password">{{ __('home.Password') }}</label>
                                <input id="password" name="password" type="password" placeholder="********">
                            </div>
                            <div class="form-element d-flex justify-content-between align-items-center mt-md-0 mt-2">
                                <div class="remember-me">
                                    <input id="remember-me" type="checkbox">
                                    <label for="remember-me">{{ __('home.Remember password') }}</label>
                                </div>
                                <a href="#" data-toggle="modal" data-target="#modalForgetPassword">
                                    {{ __('home.Forgot Password') }}</a>
                            </div>
                            <div class="form-element text-center d-flex justify-content-center">
                                <button>{{ __('home.Login') }}</button>
                            </div>
                            <div class="other_sign">
                                <div class="line"></div>
                                <div class="text-center">
                                    {{ __('home.Or') }}
                                </div>
                                <div class="line"></div>
                            </div>
                            <div class="form-signin d-flex justify-content-around">
                                <a href="{{ route('login.facebook') }}" class="login-with-btn">
                                    <img src="{{asset('img/icons_logo/facebook_logo.png')}}" alt=""/>
                                </a>
                                <a href="{{ route('login.google') }}" class="login-with-btn">
                                    <img src="{{asset('img/icons_logo/google_logo.png')}}" alt=""/>
                                </a>
                                <a type="button" class="login-with-btn">
                                    <img src="{{asset('img/icons_logo/apple_logo.png')}}" alt=""/>
                                </a>
                                <a href="{{ route('login.kakao') }}" class="login-with-btn">
                                    <img src="{{asset('img/icons_logo/kakao-talk_logo.png')}}" alt=""/>
                                </a>
                            </div>
                            <div class="sign--up d-flex justify-content-center">
                                <p>{{ __('home.Do not have an account') }}?</p>
                                <a href="" data-toggle="modal" data-target="#modalRegister"
                                   data-dismiss="modal">{{ __('home.Sign Up') }}</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade container" id="modalRegister" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="modal_register">
            <div class="modal-body">
                <div class="close-btn">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="popup">
                    <form method="post" action="{{route('registerProcess')}}" id="formSignUp"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="Pharmacist" role="tabpanel"
                                     aria-labelledby="Pharmacist-tab">
                                    <div>
                                        <div class="form-element">
                                            <label for="username">{{ __('home.Username') }}</label>
                                            <input id="username" name="username" type="text" placeholder="exmaple"
                                                   required>
                                        </div>
                                        <div class="form-element">
                                            <label for="type">{{ __('home.Type Account') }}</label>
                                            <select id="type" name="type" class="form-select"
                                                    onchange="showInputFileUpload(this.value)">
                                                <option>Choose...</option>
                                                <option value="{{Role::BUSINESS }}">{{ __('home.BUSINESS') }}</option>
                                                <option value="{{Role::MEDICAL }}">{{ __('home.MEDICAL') }}</option>
                                                <option value="{{Role::NORMAL }}"
                                                        >{{ __('home.NORMAL') }}</option>
                                            </select>
                                        </div>
                                        <div class="form-element">
                                            <label for="member">{{ __('home.Member') }}</label>
                                            <select id="member" name="member" class="form-select">
{{--                                                <option value="{{Role::PAITENTS }}">{{ __('home.PAITENTS') }}</option>--}}
{{--                                                <option value="{{Role::NORMAL_PEOPLE }}">{{ __('home.NORMAL PEOPLE') }}--}}
{{--                                                </option>--}}
                                            </select>
                                        </div>
                                        <div class="form-elementt m-16" id="element-normal" style="display: none;">
                                            <div>
                                                <label for="medical_history">{{ __('home.Tiền sử bệnh án') }}</label>
                                                <textarea id="medical_history" name="medical_history"
                                                          placeholder="{{ __('home.Tiền sử bệnh án') }}"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-element" id="elemet-upload-file-sign-up">
                                            <label for="member" id="labelFileUploadSignup"></label>
                                            <input type="file" id="fileupload" name="fileupload"
                                                   accept="image/*, .pdf, .doc, .docx">
                                        </div>
                                        <div class="form-element" id="element-doctor" style="display: none;">
                                            <div>
                                                <label for="name_doctor">{{ __('home.Name') }}</label>
                                                <input type="text" id="name_doctor" name="name_doctor"
                                                       placeholder="{{ __('home.Name') }}">
                                            </div>
                                            <div class="mt-3">
                                                <label for="identifier">{{ __('home.Mã định danh trên giấy hành nghề') }}</label>
                                                <input type="text" id="identifier" name="identifier"
                                                       placeholder="{{ __('home.Mã định danh trên giấy hành nghề') }}">
                                            </div>
                                            <div class="mt-3">
                                                <label for="contact_phone">{{ __('home.CONTACT INFO') }}</label>
                                                <input type="number" id="contact_phone" name="contact_phone"
                                                       placeholder="0123456789">
                                            </div>
                                            <div class="mt-3">
                                                <label for="experience">{{ __('home.EXPERIENCE') }}</label>
                                                <input type="text" id="experience" name="experience"
                                                       placeholder="{{ __('home.EXPERIENCE') }}">
                                            </div>
                                            <div class="mt-3">
                                                <label for="hospital">{{ __('home.HOSPITAL NAME') }}</label>
                                                <input type="text" id="hospital" name="hospital"
                                                       placeholder="{{ __('home.HOSPITAL NAME') }}">
                                            </div>
                                            <div class="mt-3">
                                                <label
                                                    for="specialized_services">{{ __('home.SPECIALIZED SERVICES') }}</label>
                                                <input type="text" id="specialized_services" name="specialized_services"
                                                       placeholder="{{ __('home.SPECIALIZED SERVICES') }}">
                                            </div>
                                            <div class="mt-3">
                                                <label for="services_info">{{ __('home.SERVICE INFO') }}</label>
                                                <input type="text" id="services_info" name="services_info"
                                                       placeholder="{{ __('home.SERVICE INFO') }}">
                                            </div>
                                        </div>
                                        <div id="element-hospital" style="display: none;">
                                            <div class="d-flex form-element">
                                                <div class="col-md-6 pl-0">
                                                    <label for="open_date">{{ __('home.Thời gian bắt đầu') }}</label>
                                                    <input class="input-time" id="open_date" name="open_date"
                                                           type="time" placeholder="">
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <label for="close_date">{{ __('home.Thời gian kết thúc') }}</label>
                                                    <input class="input-time" id="close_date" name="close_date"
                                                           type="time" placeholder="">
                                                </div>
                                            </div>
                                            <div class="mt-3 form-element">
                                                <label for="experienceHospital">{{ __('home.EXPERIENCE') }}</label>
                                                <input type="number" id="experienceHospital" name="experienceHospital"
                                                       placeholder="{{ __('home.EXPERIENCE') }}">
                                            </div>
                                            <div class="form-element">
                                                <label for="address">{{ __('home.Addresses') }}</label>
                                                <input id="address" name="address" type="text"
                                                       placeholder="{{ __('home.Addresses') }}">
                                            </div>
                                            <div class="form-element">
                                                <label for="province_id">{{ __('home.Tỉnh') }}</label>
                                                <select name="province_id" id="province_id" class="form-control">
                                                </select>
                                            </div>
                                            <div class="form-element">
                                                <label for="district_id">{{ __('home.Quận') }}</label>
                                                <select name="district_id" id="district_id" class="form-control">
                                                </select>
                                            </div>
                                            <div class="form-element">
                                                <label for="commune_id">{{ __('home.Xã') }}</label>
                                                <select name="commune_id" id="commune_id" class="form-control">
                                                </select>
                                            </div>
                                            <div class="form-element">
                                                <label
                                                    for="representative">{{ __('home.REPRESENTATIVE DOCTOR') }}</label>
                                                <input id="representative" name="representative" type="text"
                                                       placeholder="{{ __('home.REPRESENTATIVE DOCTOR') }}">
                                            </div>
                                            <div class="form-element">
                                                <label for="time_work">{{ __('home.Time work') }}</label>
                                                <select class="form-select" id="time_work" name="time_work">
                                                    <option
                                                        value="{{TypeTimeWork::ALL}}">{{TypeTimeWork::ALL}}</option>
                                                    <option
                                                        value="{{TypeTimeWork::NONE}}">{{TypeTimeWork::NONE}}</option>
                                                    <option
                                                        value="{{TypeTimeWork::OFFICE_HOURS}}">{{TypeTimeWork::OFFICE_HOURS}}</option>
                                                    <option
                                                        value="{{TypeTimeWork::ONLY_AFTERNOON}}">{{TypeTimeWork::ONLY_MORNING}}</option>
                                                    <option
                                                        value="{{TypeTimeWork::ONLY_AFTERNOON}}">{{TypeTimeWork::ONLY_AFTERNOON}}</option>
                                                    <option
                                                        value="{{TypeTimeWork::OTHER}}">{{TypeTimeWork::OTHER}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-element">
                                            <label for="email">{{ __('home.Email') }}</label>
                                            <input id="email" name="email" type="email" placeholder="exmaple@gmail.com"
                                                   required>
                                        </div>
                                        <div id="action-doctor" style="display: none">
                                            <div class="form-element">
                                                <input name="prescription" type="checkbox" value="1">
                                                <label
                                                    for="prescription">{{ __('home.prescription') }}</label>
                                            </div>
                                            <div class="form-element">
                                                <input name="free" type="checkbox" value="1">
                                                <label
                                                    for="free">{{ __('home.free') }}</label>
                                            </div>
                                        </div>

                                        <div class="form-element">
                                            <label for="password">{{ __('home.Password') }}</label>
                                            <input id="password" type="password" name="password" minlength="8"
                                                   placeholder="********" required>
                                        </div>
                                        <div class="form-element">
                                            <label for="passwordConfirm">{{ __('home.Enter the Password') }}</label>
                                            <input id="passwordConfirm" name="passwordConfirm" minlength="8"
                                                   type="password" placeholder="********" required>
                                        </div>
                                        <div class="form-element remember-me">
                                            <input id="remember-me" type="checkbox" required>
                                            <label
                                                for="remember-me">{{ __('home.Agree to Terms of Service and Privacy Policy') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="other-option">
                            <div class="form-element text-center d-flex justify-content-center">
                                <button type="submit">{{ __('home.Sign Up') }}</button>
                            </div>
                            <div class="other_sign">
                                <div class="line"></div>
                                <div class="text-center">
                                    {{ __('home.Or') }}
                                </div>
                                <div class="line"></div>
                            </div>
                            <div class="form-signin" style="display: flex; justify-content: space-around">
                                <a href="{{ route('login.facebook') }}" class="login-with-btn">
                                    <img src="{{asset('img/icons_logo/facebook_logo.png')}}" alt=""/>
                                </a>
                                <a href="{{ route('login.google') }}" class="login-with-btn">
                                    <img src="{{asset('img/icons_logo/google_logo.png')}}" alt=""/>
                                </a>
                                <a type="button" class="login-with-btn">
                                    <img src="{{asset('img/icons_logo/apple_logo.png')}}" alt=""/>
                                </a>
                                <a href="{{ route('login.kakao') }}" class="login-with-btn">
                                    <img src="{{asset('img/icons_logo/kakao-talk_logo.png')}}" alt=""/>
                                </a>
                            </div>
                            <div class="sign--up d-flex justify-content-center">
                                <p>{{ __('home.Do you already have an account') }}?</p>
                                <a href="#" data-toggle="modal" data-target="#staticBackdrop" data-dismiss="modal">
                                    {{ __('home.Log In') }}</a>
                            </div>
                        </div>
                        <div hidden="">
                            <input type="text" name="combined_address" id="combined_address" class="form-control">
                            <input type="text" name="longitude" id="longitude" class="form-control">
                            <input type="text" name="latitude" id="latitude" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-xl modal fade" id="modalForgetPassword" data-backdrop="static" data-keyboard="false"
     tabindex="-1" aria-labelledby="modalForgetPasswordLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content container h-80">

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 text-center p-0 mt-3 mb-2">
                            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                <h2 id="heading">{{ __('home.Lấy lại mật khẩu') }}</h2>
                                <form id="msform">
                                    <!-- progressbar -->
                                    <ul id="progressbar">
                                        <li class="active" id="account"><strong>{{ __('home.Thông tin tài khoản') }}</strong></li>
                                        <li id="personal"><strong>{{ __('home.Nhập OTP') }}</strong></li>
                                        <li id="confirm"><strong>{{ __('home.Hoàn thành') }}</strong></li>
                                    </ul>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                             role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <br> <!-- fieldsets -->
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="fs-title">{{ __('home.Account Information') }}:</h2>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps">{{ __('home.Step') }} 1 - 3</h2>
                                                </div>
                                            </div>
                                            <label class="fieldlabels">{{ __('home.Tìm tài khoản của bạn') }}</label>
                                            <select class="custom-select" name="type_account" id="type_account"
                                                    onchange="reloadLabel()">
                                                <option value="{{ CommonType::EMAIL }}">{{ __('home.Email') }}</option>
                                                <option value="{{ CommonType::PHONE }}">{{ __('home.Phone Number') }}</option>
                                            </select>
                                            <label class="fieldlabels" id="label-account-info">{{ __('home.Email') }}: *</label>
                                            <input type="text" required class="form-control" id="valueFindUser"
                                            />
                                        </div>
                                        <input type="button" onclick="sendOTP(this)" name="next"
                                               class="next btn btn-primary mt-2" value="Next"/>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="fs-title">{{ __('home.Đổi mật khẩu') }} </h2>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps">{{ __('home.Step') }} 2 - 3</h2>
                                                </div>
                                            </div>
                                            <label class="fieldlabels">OTP</label>
                                            <input type="number" maxlength="6" class="form-control"
                                                   id="forget-password-otp"
                                            />

                                            <label class="fieldlabels" id="label-account-info">{{ __('home.Mật khẩu mới') }}</label>
                                            <input type="password" class="form-control" id="forget-new-password"/>

                                            <label class="fieldlabels" id="label-account-info">{{ __('home.Nhập lại mật khẩu') }}</label>
                                            <input type="password" class="form-control" id="forget-re-new-password"/>
                                        </div>
                                        <input type="button" name="previous" class="previous btn btn-secondary mt-2"
                                               value="Previous"/>
                                        <input type="button" name="next" class="next btn btn-primary mt-2"
                                               onclick="checkOTP(this)"
                                               value="Next"/>

                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="fs-title">{{ __('home.Finish') }}:</h2>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps">{{ __('home.Step') }} 3 - 3</h2>
                                                </div>
                                            </div>
                                            <br><br>
                                            <h2 class="purple-text text-center"><strong>{{ __('home.SUCCESS') }} !</strong></h2> <br>
                                            <br><br>
                                            <div class="row justify-content-center">
                                                <div class="col-7 text-center">
                                                    <h5 class="purple-text text-center">{{ __('home.You Have Successfully Signed Up') }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('home.Close') }}</button>
            </div>
        </div>
    </div>
</div>

{{--script modal forget password--}}
<script>
    var steps = $("fieldset").length;

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    setProgressBar(current);

    let isNextStep = false;

    function reloadLabel() {
        // document.getElementById('label-account-info').innerHTML = document.getElementById('type_account').value + ': *';
        let type = document.getElementById('type_account').value;
        switch (type) {
            case '{{ CommonType::EMAIL }}':
                document.getElementById('label-account-info').innerHTML = 'Email: *';
                // change type input
                document.getElementById('valueFindUser').type = 'email';
                break;
            case '{{ CommonType::PHONE }}':
                document.getElementById('label-account-info').innerHTML = 'Phone: *';
                // change type input
                document.getElementById('valueFindUser').type = 'number';
                break;
        }

    }

    function sendOTP(element) {
        loadingMasterPage();

        let value = document.getElementById('valueFindUser').value;
        let type_account = document.getElementById('type_account').value;

        let url = '{{ route('user.forget.password.send') }}';
        let data = {
            'type': type_account,
            'value': value
        };

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function (data) {
                loadingMasterPage();
                goToNextStep(element);
            },
            error: function (data) {
                loadingMasterPage();
                alert(data.responseJSON);
            }
        });
    }

    function checkOTP(element) {
        let otp = document.getElementById('forget-password-otp').value;
        let value = document.getElementById('valueFindUser').value;
        let type_account = document.getElementById('type_account').value;

        let password = document.getElementById('forget-new-password').value;
        let rePassword = document.getElementById('forget-re-new-password').value;

        // check password min length 8
        if (password.length < 8) {
            alert('Mật khẩu phải có ít nhất 8 ký tự');
            return;
        }

        if (password !== rePassword) {
            alert('Mật khẩu không trùng khớp');
            return;
        }

        loadingMasterPage();

        let url = '{{ route('user.forget.password.check') }}';

        let data = {
            'type': type_account,
            'value': value,
            'otp': otp,
            'password': password,
            'rePassword': rePassword
        };

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function (data) {
                goToNextStep(element)
                loadingMasterPage();
                alert(data);
            },
            error: function (data) {
                loadingMasterPage();
                alert(data.responseJSON);
            }
        });
    }

    function goToNextStep(element) {
        current_fs = $(element).parent();
        next_fs = $(element).parent().next();

//Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
        next_fs.show();
//hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function (now) {
// for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({'opacity': opacity});
            },
            duration: 500
        });
        setProgressBar(++current);
    }

    $(document).ready(function () {

        $(".previous").click(function () {

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

//Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
            previous_fs.show();

//hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function (now) {
// for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({'opacity': opacity});
                },
                duration: 500
            });
            setProgressBar(--current);
        });


        $(".submit").click(function () {
            return false;
        })

    });

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }

</script>
<script>
    $(document).ready(function () {
        // Lắng nghe sự kiện onchange của các dropdown tỉnh, huyện, xã
        $('#province_id, #district_id, #commune_id').on('change', function () {
            // Gọi hàm để lưu địa chỉ khi có sự thay đổi
            saveAddressOnChange();
        });

        function saveAddressOnChange() {
            // Lấy giá trị từ các dropdown
            var provinceId = $('#province_id').val();
            var codeProvinceId = getCodeFromValue(provinceId);

            var districtId = $('#district_id').val();
            var codeDistrictId = getCodeFromValue(districtId);

            var communeId = $('#commune_id').val();
            var codeCommuneId = getCodeFromValue(communeId);

            // Lấy địa chỉ chi tiết từ input
            var detailAddress = $('#address').val();

            // Gộp các giá trị vào một chuỗi cách nhau bởi dấu phẩy
            var combinedAddress = [detailAddress, codeCommuneId, codeDistrictId, codeProvinceId, 'Việt Nam'].join(',');
            // Gán giá trị vào input ẩn
            $('#combined_address').val(combinedAddress);
            addNewAddress();
        }

        function getCodeFromValue(value) {
            // Hàm này nhận một giá trị của dropdown và trả về mã code nếu có
            if (value) {
                let myArray = value.split('-');
                return myArray.length > 2 ? myArray[2] : '';
            }
            return '';
        }
    });
</script>
<script>
    $('#elemet-upload-file-sign-up').hide();

    function showInputFileUpload(value) {
        if (value === '{{Role::BUSINESS}}') {
            $('#labelFileUploadSignup').text('Upload your business license');
            //show elemet-upload-file-sign-up
            $('#fileupload').attr('required', true);
            $('#elemet-upload-file-sign-up').show();
        } else if (value === '{{Role::MEDICAL}}') {
            $('#labelFileUploadSignup').text('Upload your medical license');
            $('#fileupload').attr('required', true);
            $('#elemet-upload-file-sign-up').show();
        } else {
            $('#elemet-upload-file-sign-up').hide();
            $('#fileupload').attr('required', false);
        }
    }

    $(document).ready(function () {
        $('#type').on('change', function () {
            let value = $(this).val();
            let html = ``;
            switch (value) {
                case 'BUSINESS':
                    html = `<option value="{{Role::PHARMACEUTICAL_COMPANIES}}">PHARMACEUTICAL COMPANIES</option>
                                                <option value="{{Role::HOSPITALS}}">HOSPITALS</option>
                                                <option value="{{Role::CLINICS}}">CLINICS</option>
                                                <option value="{{Role::PHARMACIES}}">PHARMACIES</option>
                                                <option value="{{Role::SPAS}}">SPAS</option>
                                                <option value="{{Role::OTHERS}}">OTHERS</option>`;
                    break;
                case 'MEDICAL':
                    html = `<option value="{{Role::DOCTORS}}">DOCTOR</option>
                                                <option value="{{Role::PHAMACISTS}}">PHAMACISTS</option>
                                                <option value="{{Role::THERAPISTS}}">THERAPISTS</option>
                                                <option value="{{Role::ESTHETICIANS}}">ESTHETICIANS</option>
                                                <option value="{{Role::NURSES}}">NURSES</option>`;
                    break;
                case 'NORMAL':
                    html = `<option value="{{Role::PAITENTS}}">PAITENTS</option>
                                                <option value="{{Role::NORMAL_PEOPLE}}">NORMAL PEOPLE</option>`;
                    break;
                default:
                    html = ``;
                    break;
            }
            $('#member').empty().append(html);

            let type = $(this).val();
            loadData(type);
        });

        function loadData(value) {
            loadDoctor(value);
            loadHospital(value);
            loadNormal(value);
        }

        function loadDoctor(value) {
            if (value == '{{Role::MEDICAL}}') {
                $('#element-doctor').show();
                $('#name_doctor').attr('required', true);
                $('#identifier').attr('required', true);
                $('#contact_phone').attr('required', true);
                $('#experience').attr('required', true);
                $('#hospital').attr('required', true);
                $('#rate').attr('required', true);
                $('#specialized_services').attr('required', true);
                $('#services_info').attr('required', true);
                $('#action-doctor').show();
            } else {
                $('#element-doctor').hide();
                $('#name_doctor').attr('required', false);
                $('#identifier').attr('required', false);
                $('#contact_phone').attr('required', false);
                $('#experience').attr('required', false);
                $('#hospital').attr('required', false);
                $('#rate').attr('required', false);
                $('#specialized_services').attr('required', false);
                $('#services_info').attr('required', false);
                $('#action-doctor').hide();
            }
        }

        function loadHospital(value) {
            if (value == '{{Role::BUSINESS}}') {
                $('#element-hospital').show();
                $('#open_date').attr('required', true);
                $('#close_date').attr('required', true);
                $('#experienceHospital').attr('required', true);
                $('#address').attr('required', true);
                $('#province_id').attr('required', true);
                $('#district_id').attr('required', true);
                $('#commune_id').attr('required', true);
                $('#representative').attr('required', true);
                $('#time_work').attr('required', true);
                $('#action-doctor').show();
            } else {
                $('#element-hospital').hide();
                $('#open_date').attr('required', false);
                $('#close_date').attr('required', false);
                $('#experienceHospital').attr('required', false);
                $('#address').attr('required', false);
                $('#province_id').attr('required', false);
                $('#district_id').attr('required', false);
                $('#commune_id').attr('required', false);
                $('#representative').attr('required', false);
                $('#time_work').attr('required', false);
                $('#action-doctor').hide();
            }
        }
        function loadNormal(value) {
            if (value == '{{Role::NORMAL}}') {
                $('#element-normal').show();
            } else {
                $('#element-normal').hide();
            }
        }
    })
</script>
<script>
    $(document).ready(function () {
        callGetAllProvince();

        $('#province_id').on('change', function () {
            let id_code = $(this).val();
            let myArray = id_code.split('-');
            let code = myArray[1];
            callGetAllDistricts(code);
        })

        $('#district_id').on('change', function () {
            let id_code = $(this).val();
            let myArray = id_code.split('-');
            let code = myArray[1];
            callGetAllCommunes(code);
        })
    })

    async function callGetAllProvince() {
        await $.ajax({
            url: `{{ route('restapi.get.provinces') }}`,
            method: 'GET',
            success: function (response) {
                showAllProvince(response);
            },
            error: function (exception) {
                console.log(exception);
            }
        });
    }

    async function callGetAllDistricts(code) {
        let url = `{{ route('restapi.get.districts', ['code' => ':code']) }}`;
        url = url.replace(':code', code);
        await $.ajax({
            url: url,
            method: 'GET',
            success: function (response) {
                showAllDistricts(response);
            },
            error: function (exception) {
                console.log(exception);
            }
        });
    }

    async function callGetAllCommunes(code) {
        let url = `{{ route('restapi.get.communes', ['code' => ':code']) }}`;
        url = url.replace(':code', code);
        await $.ajax({
            url: url,
            method: 'GET',
            success: function (response) {
                showAllCommunes(response);
            },
            error: function (exception) {
                console.log(exception);
            }
        });
    }

    function showAllProvince(res) {
        let html = ``;
        for (let i = 0; i < res.length; i++) {
            let data = res[i];
            let code = data.code;
            html = html + `<option class="province province-item" data-code="${code}" value="${data.id}-${data.code}-${data.code_name}-${data.name}">${data.name}</option>`;
        }

        $('#province_id').empty().append(html);
    }

    function showAllDistricts(res) {
        let html = ``;
        for (let i = 0; i < res.length; i++) {
            let data = res[i];
            html = html + `<option class="district district-item" value="${data.id}-${data.code}-${data.name}">${data.name}</option>`;
        }
        $('#district_id').empty().append(html);
    }

    function showAllCommunes(res) {
        let html = ``;
        for (let i = 0; i < res.length; i++) {
            let data = res[i];
            html = html + `<option value="${data.id}-${data.code}-${data.name}">${data.name}</option>`;
        }
        $('#commune_id').empty().append(html);
    }

    function addNewAddress() {
        var newAddress = document.getElementById('combined_address').value;

        if (newAddress) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({'address': newAddress}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();

                    if (!isNaN(latitude) && !isNaN(longitude)) {
                        $('#latitude').val(latitude);
                        $('#longitude').val(longitude);
                    }
                }
            });
        }
    }
</script>

