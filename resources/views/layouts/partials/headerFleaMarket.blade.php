<header class="header">
    <div class="container">
        <div class="row header-detail mobile-hidden">
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
            <div class="col-md-4 header-detail--right d-flex">
                <strong>Trần đình phi</strong>
                <div class="ml-2 user">
                    <img src="{{asset('img/user-circle.png')}}">
                </div>
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
    </div>
</header>

