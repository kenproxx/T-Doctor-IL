<header class="header">
    <div class="container">
        <div class="row header-detail">
            <div class="col-md-4 header-detail--left d-flex justify-content-around">
                <a class="logo" href="{{ route('home') }}">
                    <img src="{{asset('img/icons_logo/image 1.png')}}" alt="Logo" width="177px" height="42px"
                         class="d-inline-block align-text-top">
                </a>
                <a class="back" href="{{route('home')}}"><h5><i class="fa-solid fa-angles-left"></i> Flea market</h5></a>
            </div>
            <div class="col-md-4 header-detail--center d-flex justify-content-sm-around">
                <a class="active" href="{{route('flea-market.index')}}">My store</a>
                <a href="{{route('flea.market.sell.product')}}">Sell my product</a>
                <a href="{{route('flea.market.wish.list')}}">Wish list</a>
            </div>
            <div class="col-md-4 header-detail--right d-flex">
                <strong>Trần đình phi</strong>
                <div class="ml-2 user">
                    <img src="{{asset('img/user-circle.png')}}">
                </div>
            </div>
        </div>
    </div>
</header>
