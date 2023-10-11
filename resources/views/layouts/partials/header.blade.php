
<header class="header d-flex justify-content-around container-fluid align-items-center ">
    <div class="header-left">
        <img src="{{asset('img/icons_logo/image 1.png')}}" alt="logo">
    </div>
    <div class="header-center d-flex">
        <a href="{{route('recruitment.index')}}">Recruitment</a>
        <a href="#">Real market</a>
        <a href="#">Examination</a>
        <a href="#">New/Events</a>
        <a href="#">Online Medicine</a>
        <a href="#">Clinic/Pharmacies</a>
        <a href="#">What's free?</a>
    </div>
    <div class="header-right d-flex ">
        <button class="account_control" id="show_login" data-toggle="modal" data-target="#staticBackdrop">Log In</button>
        <div></div>
        |
        <button type="button" class="account_control" data-toggle="modal" data-target="#modalRegister">Sign Up</button>
    </div>
    <div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal_login">
                <div class="modal-body">
                    <div class="close-btn">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="popup d-lg-flex justify-content-center">
                        <div class="form">
                            <div class="form-element">
                                <label for="user">Phone/Email</label>
                                <input id="user" type="text" placeholder="exmaple123">
                            </div>
                            <div class="form-element">
                                <label for="password">Password</label>
                                <input id="password" type="password" placeholder="********">
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
                            <div class="form-signin" style="display: flex; justify-content: space-around" >
                                <button type="button" class="login-with-btn"><img src="{{asset('img/icons_logo/facebook_logo.png')}}"/></button>
                                <button type="button" class="login-with-btn"><img src="{{asset('img/icons_logo/google_logo.png')}}"/></button>
                                <button type="button" class="login-with-btn"><img src="{{asset('img/icons_logo/apple_logo.png')}}"/></button>
                                <button type="button" class="login-with-btn"><img src="{{asset('img/icons_logo/kakao-talk_logo.png')}}"/></button>
                            </div>
                            <div class="sign--up d-flex justify-content-center" >
                                <p>Do not have an account?</p>
                                <a href="" data-toggle="modal" data-target="#modalRegister" data-dismiss="modal" >Sign up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalRegister" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal_register">
                <div class="modal-body">
                    <div class="close-btn">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="popup">
                        <div class="form">
                            <div class="user-option">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="User-tab" data-toggle="tab" href="#User" role="tab" aria-controls="home" aria-selected="true">User</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Doctor-tab" data-toggle="tab" href="#Doctor" role="tab" aria-controls="profile" aria-selected="false">Doctor</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Pharmacist-tab" data-toggle="tab" href="#Pharmacist" role="tab" aria-controls="contact" aria-selected="false">Pharmacist</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="User" role="tabpanel" aria-labelledby="User-tab">
                                    <div>
                                        <div class="form-element">
                                            <label for="user">Phone/Email</label>
                                            <input id="user" type="text" placeholder="exmaple123">
                                        </div>

                                        <div class="form-element">
                                            <label for="password">Password</label>
                                            <input id="password" type="password" placeholder="********">
                                        </div>
                                        <div class="form-element">
                                            <label for="cfrm_password">Enter the Password</label>
                                            <input id="cfrm_password" type="password" placeholder="********">
                                        </div>
                                        <div class="form-element">
                                            <input id="remember-me" type="checkbox">
                                            <label for="remember-me">Agree to Terms of Service and Privacy Policy</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Doctor" role="tabpanel" aria-labelledby="Doctor-tab">
                                    <div>
                                        <div class="form-element">
                                            <label for="user">Name Doctor</label>
                                            <input id="user" type="text" placeholder="exmaple123">
                                        </div>
                                        <div class="form-element">
                                            <label for="user">Workplace</label>
                                            <input id="user" type="text" placeholder="exmaple123">
                                        </div>
                                        <div class="form-element">
                                            <label for="user">Phone/Email</label>
                                            <input id="user" type="text" placeholder="exmaple123">
                                        </div>

                                        <div class="form-element">
                                            <label for="password">Password</label>
                                            <input id="password" type="password" placeholder="********">
                                        </div>
                                        <div class="form-element">
                                            <label for="password">Enter the Password</label>
                                            <input id="password" type="password" placeholder="********">
                                        </div>
                                        <div class="form-element">
                                            <input id="remember-me" type="checkbox">
                                            <label for="remember-me">Agree to Terms of Service and Privacy Policy</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Pharmacist" role="tabpanel" aria-labelledby="Pharmacist-tab">
                                    <div>
                                        <div class="form-element">
                                            <label for="user">Name Pharmacist</label>
                                            <input id="user" type="text" placeholder="exmaple123">
                                        </div>
                                        <div class="form-element">
                                            <label for="user">Workplace</label>
                                            <input id="user" type="text" placeholder="exmaple123">
                                        </div>
                                        <div class="form-element">
                                            <label for="user">Phone/Email</label>
                                            <input id="user" type="text" placeholder="exmaple123">
                                        </div>

                                        <div class="form-element">
                                            <label for="password">Password</label>
                                            <input id="password" type="password" placeholder="********">
                                        </div>
                                        <div class="form-element">
                                            <label for="password">Enter the Password</label>
                                            <input id="password" type="password" placeholder="********">
                                        </div>
                                        <div class="form-element">
                                            <input id="remember-me" type="checkbox">
                                            <label for="remember-me">Agree to Terms of Service and Privacy Policy</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="other-option">
                            <div class="form-element text-center">
                                <button>Sign up</button>
                            </div>
                            <div class="other_sign">
                                <div class="line"></div>
                                <div class="text-center">
                                    Or
                                </div>
                                <div class="line"></div>
                            </div>
                            <div class="form-signin" style="display: flex; justify-content: space-around" >
                                <button type="button" class="login-with-btn"><img src="{{asset('img/icons_logo/facebook_logo.png')}}"/></button>
                                <button type="button" class="login-with-btn"><img src="{{asset('img/icons_logo/google_logo.png')}}"/></button>
                                <button type="button" class="login-with-btn"><img src="{{asset('img/icons_logo/apple_logo.png')}}"/></button>
                                <button type="button" class="login-with-btn"><img src="{{asset('img/icons_logo/kakao-talk_logo.png')}}"/></button>
                            </div>
                            <div class="sign--up d-flex justify-content-center">
                                <p>Do you already have an account?</p>
                                <a href="" data-toggle="modal" data-target="#staticBackdrop" data-dismiss="modal">Log in</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</header>

