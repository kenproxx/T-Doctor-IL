<header class="header">
    <div class="container">
        <div class="row header-detail">
            <div class="col-md-4 header-detail--left d-flex justify-content-around">
                <a class="logo" href="{{ route('home') }}">
                    <img src="{{asset('img/icons_logo/logo-new.png')}}" alt="Logo" width="177px" height="42px"
                         class="d-inline-block align-text-top">
                </a>
                <a class="back" href="#"><h5><i class="fa-solid fa-angles-left"></i> Recruitment</h5></a>
            </div>
            <div class="col-md-4 header-detail--center d-flex justify-content-sm-around">
                <a class="active" href="#">My job</a>
                <a href="{{route('recruitment.apply')}}">My CV</a>
                <a href="#">Match Up</a>
            </div>
            <div class="col-md-4 header-detail--right d-flex">
                <div class="option">
                    <a href="#">Business service</a>
                </div>
                <div class="option">
                    <a href="#">Register recruitment</a>
                </div>
                <div class="user">
                    <img src="{{asset('img/user-circle.png')}}">
                </div>
            </div>
        </div>
    </div>
</header>
