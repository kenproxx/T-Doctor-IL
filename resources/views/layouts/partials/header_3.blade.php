<header class="header">
    <div class="container">
        <div class="row header-detail">
            <div class="col-md-4 header-detail--left d-flex justify-content-around">
                <a class="logo" href="{{ route('home') }}">
                    <img src="{{asset('img/icons_logo/image 1.png')}}" alt="Logo" width="177px" height="42px"
                         class="d-inline-block align-text-top">
                </a>
                <a class="back" href="#"><h5><i class="fa-solid fa-angles-left"></i> Examination</h5></a>
            </div>
            <div class="col-md-5 header-detail--center d-flex justify-content-sm-around">
                <a class="active" href="{{ route('examination.index') }}">Find a doctor</a>
                <a  href="{{ route('examination.findmymedicine') }}">Find my medicine</a>
                <a href="#">Mentoring</a>
                <a href="{{ route('examination.mypersonaldoctor') }}">My personal doctor</a>
            </div>
            <div class="col-md-3 header-detail--right d-flex">
                <div class="user-1">
                    <img src="{{asset('img/user-circle.png')}}">
                </div>
                <div class="option">
                    <a href="#">Ask a question</a>
                </div>
            </div>
        </div>
    </div>
</header>
