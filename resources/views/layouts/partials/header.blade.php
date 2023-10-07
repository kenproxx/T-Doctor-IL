
<header class="header d-flex justify-content-around container-fluid align-items-center ">
    <div class="header-left">
        <img src="{{asset('img/icons_logo/image 1.png')}}" alt="logo">
    </div>
    <div class="header-center d-flex">
        <a href="#">Recruitment</a>
        <a href="#">Real market</a>
        <a href="#">Examination</a>
        <a href="#">New/Events</a>
        <a href="#">Online Medicine</a>
        <a href="#">Clinic/Pharmacies</a>
        <a href="#">What's free?</a>
    </div>
    <div class="header-right d-flex ">
        <button class="account_control" id="show_login" data-toggle="modal" data-target="#staticBackdrop">Sign in</button>
        <div></div>
        |
        <button class="account_control" id="show_register" data-bs-toggle="modal" data-bs-target="#exampleModal-register">Sign up</button>
    </div>
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    <div class="popup">
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
                                <div class="text-center">
                                    Or
                                </div>

                                <hr>
                            </div>

                            <div class="form-signin" style="display: flex; justify-content: space-around" >
                                <button type="button" class="login-with-btn"><img src="{{asset('img/icons_logo/facebook_logo.png')}}"/></button>
                                <button type="button" class="login-with-btn"><img src="{{asset('img/icons_logo/google_logo.png')}}"/></button>
                                <button type="button" class="login-with-btn"><img src="{{asset('img/icons_logo/apple_logo.png')}}"/></button>
                                <button type="button" class="login-with-btn"><img src="{{asset('img/icons_logo/kakao-talk_logo.png')}}"/></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

