@php use App\Http\Middleware\MedicalPermission; @endphp
@php use Illuminate\Support\Facades\Auth; @endphp
@php use App\Enums\Role; @endphp
<header class="header">
    <div class="container">
        <div class="row header-detail mobile-hidden justify-content-between">
            <div class="col-md-4 header-detail--left d-flex justify-content-around">
                <a class="logo" href="{{ route('home') }}">
                    <img src="{{asset('img/icons_logo/logo-new.png')}}" alt="Logo" width="177px" height="42px"
                         class="d-inline-block align-text-top">
                </a>
                <a class="back" href="{{route('home')}}"><h5><i class="fa-solid fa-angles-left"></i> Flea market</h5></a>
            </div>
            <div class="col-md-4 header-detail--center d-flex justify-content-sm-around">
                <a class="active" href="{{route('flea-market.index')}}">My store</a>
                <a href="{{route('flea.market.sell.product')}}">Sell my product</a>
                <a href="{{route('flea.market.wish.list')}}">Wish list</a>
            </div>
            <div class="header-right d-flex align-items-center w-25">
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
                            @if( (new MedicalPermission())->isMedicalPermission())
                                <a class="dropdown-item" href="{{ route('homeAdmin') }}">Dashboard</a>
                            @else
                                <a class="dropdown-item" href="{{ route('profile') }}">Trang cá nhân</a>
                            @endif
                            <a class="dropdown-item" href="{{route('logoutProcess')}}">Logout</a>
                        </div>
                    </div>
                @else
                    <button class="account_control" id="show_login" data-toggle="modal" data-target="#staticBackdrop">Log In
                    </button>
                    <div>|</div>
                    <button type="button" class="account_control" data-toggle="modal" data-target="#modalRegister">Sign Up
                    </button>
                @endif
            </div>
        </div>
        <div class="header-mobile row d-flex d-none">
            <nav class="navbar bg-lights fixed-top d-flex">
                <div class="w-100 d-flex justify-content-between">
                    <div>
                        <button class="navbar-toggler border-none" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#fleaMarketNavbar" aria-controls="fleaMarketNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="align-items-center row">
                        <a href="{{route('home')}}">
                            <img class="w-100px" src="{{asset('img/icons_logo/logo-new.png')}}">
                        </a>
                    </div>
                    <div class="header-detail--right d-flex">
                        <div class="ml-2 user">
                            <img src="{{asset('img/user-circle.png')}}">
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        {{-- modal menu --}}
        <div class="offcanvas offcanvas-start" tabindex="-1" id="fleaMarketNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a href="{{route('home')}}" class="offcanvas-title" id="offcanvasNavbarLabel"><img class="w-100"
                                                                                                   src="{{asset('img/icons_logo/logo-new.png')}}"></a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="text-center-info align-items-start d-flex mb-3">
                    <a href="{{route('home')}}" class="text-center-info"><i class="fa-solid fa-angles-left"></i><span>Flea marrket</span></a>
                </div>
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item button-nav-header mb-3">
                        <a class="nav-link" href="{{route('flea-market.index')}}">My store</a>
                    </li>
                    <li class="nav-item button-nav-header mb-3">
                        <a class="nav-link" href="{{route('flea.market.sell.product')}}">Sell my product</a>
                    </li>
                    <li class="nav-item button-nav-header mb-3">
                        <a class="nav-link" href="{{route('flea.market.wish.list')}}">Wish list</a>
                    </li>
                    <li class="nav-item button-nav-header mb-3">
                        <a class="nav-link" href="{{route('flea.market.my.store')}}">Go to my store</a>
                    </li>
                    <li class="nav-item button-nav-header mb-3">
                        <a class="nav-link" href="#">Log out</a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
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
                                        <label for="email">Email</label>
                                        <input id="email" name="email" type="email" placeholder="exmaple@gmail.com">
                                    </div>
                                    <div class="form-element">
                                        <label for="password">Password</label>
                                        <input id="password" name="password" type="password" placeholder="********">
                                    </div>
                                    <div class="form-element">
                                        <input id="remember-me" type="checkbox">
                                        <label for="remember-me">Remember password</label>
                                        <a href="#">Forgot password?</a>
                                    </div>
                                    <div class="form-element text-center">
                                        <button>Login</button>
                                    </div>
                                    <div class="other_sign">
                                        <div class="line"></div>
                                        <div class="text-center">
                                            Or
                                        </div>
                                        <div class="line"></div>
                                    </div>
                                    <div class="form-signin d-flex justify-content-around">
                                        <button type="button" class="login-with-btn"><img
                                                src="{{asset('img/icons_logo/facebook_logo.png')}}"/></button>
                                        <a href="{{ route('login.google') }}" class="login-with-btn"><img
                                                src="{{asset('img/icons_logo/google_logo.png')}}" alt=""/></a>
                                        <button type="button" class="login-with-btn"><img
                                                src="{{asset('img/icons_logo/apple_logo.png')}}"/></button>
                                        <button type="button" class="login-with-btn"><img
                                                src="{{asset('img/icons_logo/kakao-talk_logo.png')}}"/></button>
                                    </div>
                                    <div class="sign--up d-flex justify-content-center">
                                        <p>Do not have an account?</p>
                                        <a href="" data-toggle="modal" data-target="#modalRegister" data-dismiss="modal">Sign
                                            up</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalRegister" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="modal_register">
                    <div class="modal-body">
                        <div class="close-btn">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                        </div>
                        <div class="popup">
                            <form method="post" action="{{route('registerProcess')}}" id="formSignUp" enctype="multipart/form-data">
                                @csrf
                                <div class="form">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="Pharmacist" role="tabpanel"
                                             aria-labelledby="Pharmacist-tab">
                                            <div>
                                                <div class="form-element">
                                                    <label for="username">Username</label>
                                                    <input id="username" name="username" type="text" placeholder="exmaple"
                                                           required>
                                                </div>
                                                <div class="form-element">
                                                    <label for="type">Type Account</label>
                                                    <select id="type" name="type" class="form-select" onchange="showInputFileUpload(this.value)">
                                                        <option>Choose...</option>
                                                        <option value="{{Role::BUSINESS }}">BUSINESS</option>
                                                        <option value="{{Role::MEDICAL }}">MEDICAL</option>
                                                        <option value="{{Role::NORMAL }}" selected>NORMAL</option>
                                                    </select>
                                                </div>
                                                <div class="form-element">
                                                    <label for="member">Member</label>
                                                    <select id="member" name="member" class="form-select">
                                                        <option value="{{Role::PAITENTS }}">PAITENTS</option>
                                                        <option value="{{Role::NORMAL_PEOPLE }}">NORMAL PEOPLE
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-element" id="elemet-upload-file-sign-up">
                                                    <label for="member" id="labelFileUploadSignup"></label>
                                                    <input type="file" id="fileupload" name="fileupload" accept="image/*, .pdf, .doc, .docx">
                                                </div>
                                                <div class="form-element">
                                                    <label for="email">Email</label>
                                                    <input id="email" name="email" type="email" placeholder="exmaple@gmail.com"
                                                           required>
                                                </div>

                                                <div class="form-element">
                                                    <label for="password">Password</label>
                                                    <input id="password" type="password" name="password" minlength="8"
                                                           placeholder="********" required>
                                                </div>
                                                <div class="form-element">
                                                    <label for="passwordConfirm">Enter the Password</label>
                                                    <input id="passwordConfirm" name="passwordConfirm" minlength="8"
                                                           type="password" placeholder="********" required>
                                                </div>
                                                <div class="form-element">
                                                    <input id="remember-me" type="checkbox" required>
                                                    <label for="remember-me">Agree to Terms of Service and Privacy
                                                        Policy</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="other-option">
                                    <div class="form-element text-center">
                                        <button type="submit">Sign up</button>
                                    </div>
                                    <div class="other_sign">
                                        <div class="line"></div>
                                        <div class="text-center">
                                            Or
                                        </div>
                                        <div class="line"></div>
                                    </div>
                                    <div class="form-signin" style="display: flex; justify-content: space-around">
                                        <button type="button" class="login-with-btn"><img
                                                src="{{asset('img/icons_logo/facebook_logo.png')}}"/></button>
                                        <a href="{{ route('login.google') }}" class="login-with-btn"><img
                                                src="{{asset('img/icons_logo/google_logo.png')}}" alt=""/></a>
                                        <button type="button" class="login-with-btn"><img
                                                src="{{asset('img/icons_logo/apple_logo.png')}}"/></button>
                                        <button type="button" class="login-with-btn"><img
                                                src="{{asset('img/icons_logo/kakao-talk_logo.png')}}"/></button>
                                    </div>
                                    <div class="sign--up d-flex justify-content-center">
                                        <p>Do you already have an account?</p>
                                        <a href="#" data-toggle="modal" data-target="#staticBackdrop" data-dismiss="modal">
                                            Log in</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

