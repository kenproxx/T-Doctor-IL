@extends('layouts.master')
@section('title', 'Home')
@section('content')

    <header class="header d-flex justify-content-around container-fluid align-items-center ">
        <div class="nav_1">
            <nav class="navbar">
                <div class="d-flex flex-nowrap container-fluid">
                    <a class="navbar-brand order-2 p-2" href="#">
                        <img src="{{asset('img/icons_logo/image 1.png')}}" alt="Logo" width="177px" height="42px" class="d-inline-block align-text-top">
                    </a>
                    <a class="navbar-brand order-3 p-2" href="#"><h5><< Recruitment</h5></a>
                </div>
            </nav>
        </div>
        <div class="nav_2 d-flex justify-content-between">
            <a href="#">My job</a>
            <a href="{{ route('recruitment.apply') }}">My CV</a>
            <a href="#">Match Up</a>
        </div>
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
    </header>
    @include('component.banner')
    <div class="container">
        <div class="d-flex">
            <div id="filter" class="d-flex justify-content-around ">
                <div class="d-flex flex-fill">
                    <div class="filter_option"><p>Category</p></div>
                    <div class="filter_option"><p>Position</p></div>
                </div>
                <div class="filter_search flex-fill">
                    <label for="filter_search"><i class="bi bi-search"></i></label>
                    <input type="text" name="filter_search" id="filter_search" placeholder="Search for anything.....">
                </div>
                <div class="d-flex flex-fill">
                    <div class="filter_option"><p>Location</p></div>
                    <div class="filter_option"><p>Experience</p></div>
                </div>
                <div class="flex-fill"><button><i class="bi bi-filter"></i></button></div>
            </div>
        </div>
        <div class="recruitment_rank d-flex flex-column container">
            <div id="recruitment_ctn" class="flex-column">
                <div id="rank" class="d-flex">
                    <div class="rank_title p-0">
                        <img src="{{asset('img/platinum_rank.png')}}" width="398px" height="60px">
                        <h2>PLATINUM</h2>
                    </div>
                    <div class="ms-auto p-2"><a href="#">See all</a></div>
                </div>
                <div id="ctn" class="d-flex">
                    <div class="card">
                        <div id="crd_ctn">
                            <div id="card-image">
                                <i class="bi bi-heart"></i>
                                <img src="{{asset('img/recruitment/Rectangle 23798.png')}}" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <div id="time">
                                <i class="bi bi-clock"></i>
                                    <div class="time-txt">9/18/2023</div>
                                </div>
                                <h6>Bên mình đang cần tuyển dụng 2 BS chuyên khoa VLTL hoặc YHCT</h6>
                                <p>Bên mình đang cần tuyển dụng 2 BS chuyên khoa VLTL hoặc YHCTĐịa điểm làm việc: 77
                                    Hoàng Hoa Thám, Phường 13, Quận Tân Bình, TPHCM</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div id="crd_ctn">
                            <div id="card-image">
                                <i class="bi bi-heart"></i>
                                <img src="{{asset('img/recruitment/Rectangle 23798.png')}}" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <div id="time">
                                <i class="bi bi-clock"></i>
                                    <div class="time-txt">9/18/2023</div>
                                </div>
                                <h6>Bên mình đang cần tuyển dụng 2 BS chuyên khoa VLTL hoặc YHCT</h6>
                                <p>Bên mình đang cần tuyển dụng 2 BS chuyên khoa VLTL hoặc YHCTĐịa điểm làm việc: 77
                                    Hoàng Hoa Thám, Phường 13, Quận Tân Bình, TPHCM</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div id="crd_ctn">
                            <div id="card-image">
                                <i class="bi bi-heart"></i>
                                <img src="{{asset('img/recruitment/Rectangle 23798.png')}}" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <div id="time">
                                <i class="bi bi-clock"></i>
                                    <div class="time-txt">9/18/2023</div>
                                </div>
                                <h6>Bên mình đang cần tuyển dụng 2 BS chuyên khoa VLTL hoặc YHCT</h6>
                                <p>Bên mình đang cần tuyển dụng 2 BS chuyên khoa VLTL hoặc YHCTĐịa điểm làm việc: 77
                                    Hoàng Hoa Thám, Phường 13, Quận Tân Bình, TPHCM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="recruitment_ctn" class="flex-column">
                <div id="rank" class="d-flex">
                    <div class="rank_title p-0">
                        <img src="{{asset('img/premium_rank.png')}}" width="398px" height="60px">
                        <h2>PREMIUM</h2>
                    </div>
                    <div class="ms-auto p-2"><a href="#">See all</a></div>
                </div>
                <div id="ctn" class="d-flex">
                    <div class="card">
                        <div id="crd_ctn">
                            <div id="card-image">
                                <i class="bi bi-heart"></i>
                                <img src="{{asset('img/recruitment/Rectangle 23798.png')}}" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <div id="time">
                                <i class="bi bi-clock"></i>
                                    <div class="time-txt">9/18/2023</div>
                                </div>
                                <h6>Bên mình đang cần tuyển dụng 2 BS chuyên khoa VLTL hoặc YHCT</h6>
                                <p>Bên mình đang cần tuyển dụng 2 BS chuyên khoa VLTL hoặc YHCTĐịa điểm làm việc: 77
                                    Hoàng Hoa Thám, Phường 13, Quận Tân Bình, TPHCM</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div id="crd_ctn">
                            <div id="card-image">
                                <i class="bi bi-heart"></i>
                                <img src="{{asset('img/recruitment/Rectangle 23798.png')}}" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <div id="time">
                                <i class="bi bi-clock"></i>
                                    <div class="time-txt">9/18/2023</div>
                                </div>
                                <h6>Bên mình đang cần tuyển dụng 2 BS chuyên khoa VLTL hoặc YHCT</h6>
                                <p>Bên mình đang cần tuyển dụng 2 BS chuyên khoa VLTL hoặc YHCTĐịa điểm làm việc: 77
                                    Hoàng Hoa Thám, Phường 13, Quận Tân Bình, TPHCM</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div id="crd_ctn">
                            <div id="card-image">
                                <i class="bi bi-heart"></i>
                                <img src="{{asset('img/recruitment/Rectangle 23798.png')}}" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <div id="time">
                                <i class="bi bi-clock"></i>
                                    <div class="time-txt">9/18/2023</div>
                                </div>
                                <h6>Bên mình đang cần tuyển dụng 2 BS chuyên khoa VLTL hoặc YHCT</h6>
                                <p>Bên mình đang cần tuyển dụng 2 BS chuyên khoa VLTL hoặc YHCTĐịa điểm làm việc: 77
                                    Hoàng Hoa Thám, Phường 13, Quận Tân Bình, TPHCM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="recruitment_ctn" class="flex-column">
                <div id="rank" class="d-flex">
                    <div class="rank_title p-0">
                        <img src="{{asset('img/silver_rank.png')}}" width="398px" height="60px">
                        <h2>SILVER</h2>
                    </div>
                    <div class="ms-auto p-2"><a href="#">See all</a></div>
                </div>
                <div id="ctn" class="d-flex">
                    <div class="card">
                        <div id="crd_ctn">
                            <div id="card-image">
                                <i class="bi bi-heart"></i>
                                <img src="{{asset('img/recruitment/Rectangle 23798.png')}}" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <div id="time">
                                <i class="bi bi-clock"></i>
                                    <div class="time-txt">9/18/2023</div>
                                </div>
                                <h6>Bên mình đang cần tuyển dụng 2 BS chuyên khoa VLTL hoặc YHCT</h6>
                                <p>Bên mình đang cần tuyển dụng 2 BS chuyên khoa VLTL hoặc YHCTĐịa điểm làm việc: 77
                                    Hoàng Hoa Thám, Phường 13, Quận Tân Bình, TPHCM</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div id="crd_ctn">
                            <div id="card-image">
                                <i class="bi bi-heart"></i>
                                <img src="{{asset('img/recruitment/Rectangle 23798.png')}}" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <div id="time">
                                <i class="bi bi-clock"></i>
                                    <div class="time-txt">9/18/2023</div>
                                </div>
                                <h6>Bên mình đang cần tuyển dụng 2 BS chuyên khoa VLTL hoặc YHCT</h6>
                                <p>Bên mình đang cần tuyển dụng 2 BS chuyên khoa VLTL hoặc YHCTĐịa điểm làm việc: 77
                                    Hoàng Hoa Thám, Phường 13, Quận Tân Bình, TPHCM</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div id="crd_ctn">
                            <div id="card-image">
                                <i class="bi bi-heart"></i>
                                <img src="{{asset('img/recruitment/Rectangle 23798.png')}}" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <div id="time">
                                <i class="bi bi-clock"></i>
                                    <div class="time-txt">9/18/2023</div>
                                </div>
                                <h6>Bên mình đang cần tuyển dụng 2 BS chuyên khoa VLTL hoặc YHCT</h6>
                                <p>Bên mình đang cần tuyển dụng 2 BS chuyên khoa VLTL hoặc YHCTĐịa điểm làm việc: 77
                                    Hoàng Hoa Thám, Phường 13, Quận Tân Bình, TPHCM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
