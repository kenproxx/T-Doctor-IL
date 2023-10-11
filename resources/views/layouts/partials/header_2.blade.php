<header class="header">
    <div class="container-fluid d-flex header-detail">
        <div class="row">
            <div class="col-md-4 header-detail--left d-flex justify-content-between">
                <a class="logo" href="{{ route('home') }}">
                    <img src="{{asset('img/icons_logo/image 1.png')}}" alt="Logo" width="177px" height="42px"
                         class="d-inline-block align-text-top">
                </a>
                <a class="back" href="#"><h5><< Recruitment</h5></a>
            </div>
            <div class="col-md-4 header-detail--center">
                <div class="nav_2 d-flex justify-content-between">
                    <a href="#">My job</a>
                    <a href="#">My CV</a>
                    <a href="#">Match Up</a>
                </div>
            </div>
            <div class="col-md-4 header-detail--right">
                <div class=" nav_3 d-flex ">
                    <div class="btn_option">
                        <button>Business service</button>
                    </div>
                    <div class="btn_option">
                        <button>Register recruitment</button>
                    </div>
                    <div class="btn_user">
                        <button><img src="{{asset('img/user-circle.png')}}" alt="Avatar"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
