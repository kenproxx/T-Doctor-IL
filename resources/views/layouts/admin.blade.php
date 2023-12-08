<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('admin/img/favicon.png')}}" rel="icon">
    <link href="{{ asset('admin/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

</head>

<style>
    .loading-overlay-master {
        display: none;
        background: rgba(255, 255, 255, 0.7);
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        top: 0;
        z-index: 9998;
        align-items: center;
        justify-content: center;
    }

    .loading-overlay-master.is-active {
        display: flex;
    }

    .code {
        font-family: monospace;
        /*   font-size: .9em; */
        color: #dd4a68;
        background-color: rgb(238, 238, 238);
        padding: 0 3px;
    }
</style>

@php
    //lấy ra toàn bộ role của user hiện tại
    $roles = \App\Models\RoleUser::where('user_id', Auth::user()->id)->pluck('role_id')->toArray();
    $isStaff = false;
    $isNormal = false;
    foreach ($roles as $role){
        $roleNames = \App\Models\Role::where('id', $role)->pluck('name');
            if ($roleNames->contains('PAITENTS')
                    || $roleNames->contains('NORMAL PEOPLE')
            ){
                $isNormal = true;
                break;
            }
            if ($roleNames->contains('DOCTORS')
                    || $roleNames->contains('PHAMACISTS')
                    || $roleNames->contains('THERAPISTS')
                    || $roleNames->contains('ESTHETICIANS')
                    || $roleNames->contains('NURSES')
                    || $roleNames->contains('NURSES')
                    ){
                    $isStaff = true;
                    break;
            }

    }
@endphp
<body>
<div class="loading-overlay-master">
    <span class="fas fa-spinner fa-3x fa-spin"></span>
</div>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
            <img src="{{ asset('admin/img/logo.png')}}" alt="">
            <span class="d-none d-lg-block">KRMEDI</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">4</span>
                </a><!-- End Notification Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        {{ __('home.You have 4 new notifications') }}
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">{{ __('home.View all') }}</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-exclamation-circle text-warning"></i>
                        <div>
                            <h4>Lorem Ipsum</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>30 min. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-x-circle text-danger"></i>
                        <div>
                            <h4>Atque rerum nesciunt</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>1 hr. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-check-circle text-success"></i>
                        <div>
                            <h4>Sit rerum fuga</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>2 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-info-circle text-primary"></i>
                        <div>
                            <h4>Dicta reprehenderit</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>4 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="dropdown-footer">
                        <a href="#">{{ __('home.Show all notifications') }}</a>
                    </li>

                </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav -->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-chat-left-text"></i>
                    <span class="badge bg-success badge-number">3</span>
                </a><!-- End Messages Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                    <li class="dropdown-header">
                        {{ __('home.You have 3 new messages') }}
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">{{ __('home.View all') }}</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="{{ asset('admin/img/messages-1.jpg')}}" alt="" class="rounded-circle">
                            <div>
                                <h4>Maria Hudson</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="{{ asset('admin/img/messages-2.jpg')}}" alt="" class="rounded-circle">
                            <div>
                                <h4>Anna Nelson</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>6 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="{{ asset('admin/img/messages-3.jpg')}}" alt="" class="rounded-circle">
                            <div>
                                <h4>David Muldon</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>8 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="dropdown-footer">
                        <a href="#">{{ __('home.Show all messages') }}</a>
                    </li>

                </ul><!-- End Messages Dropdown Items -->

            </li><!-- End Messages Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('admin/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->username }}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Auth::user()->username }}</h6>
                        <span>{{ __('home.Web Designer') }}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-person"></i>
                            <span>{{ __('home.My Profile') }}</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-gear"></i>
                            <span>{{ __('home.Account Settings') }}</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                            <i class="bi bi-question-circle"></i>
                            <span>Need Help?</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logoutProcess') }}">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header>
<!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        @if(!$isNormal)
            <!-- Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.home') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->

            <!-- Selling/Buying Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#selling-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>{{ __('home.Selling/Buying') }}</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="selling-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('homeAdmin.list.product') }}">
                            <i class="bi bi-circle"></i><span>{{ __('home.Selling/Buying') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Selling/Buying Nav -->

            <!-- Order Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#orders-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-view-list"></i><span>{{ __('home.Order') }}</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="orders-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('view.admin.orders.index') }}">
                            <i class="bi bi-circle"></i><span>{{ __('home.Order') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Order Nav -->

            <!-- List Coupon Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#coupon-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-medium"></i><span>{{ __('home.List Coupon') }}</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="coupon-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('homeAdmin.list.coupons') }}">
                            <i class="bi bi-circle"></i><span>{{ __('home.List Coupon') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End List Coupon Nav -->

            <!-- Call video Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#call-video-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-camera-video"></i><span>{{ __('home.Call video') }}</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="call-video-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('api.backend.connect.video.index3') }}">
                            <i class="bi bi-circle"></i><span>{{ __('home.Call video') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Call video Nav -->

            @if(!$isStaff)
                <!-- Clinics Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#clinics-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-robot"></i><span>{{ __('home.Clinics/Pharmacies') }}</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="clinics-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('homeAdmin.list.clinics') }}">
                                <i class="bi bi-circle"></i><span>{{ __('home.List Clinics') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.service.clinics.list') }}">
                                <i class="bi bi-circle"></i><span>{{ __('home.Service Clinics') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Clinics Nav -->

                <!-- Review Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#reviews-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-image-alt"></i><span>{{ __('home.Reviews') }}</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="reviews-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('view.admin.reviews.index') }}">
                                <i class="bi bi-circle"></i><span>{{ __('home.Reviews') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Review Nav -->

                <!-- Videos Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#videos-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-film"></i><span>{{ __('home.Videos') }}</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="videos-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="#">
                                <i class="bi bi-circle"></i><span>{{ __('home.Short Videos') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.topic.videos.list') }}">
                                <i class="bi bi-circle"></i><span>{{ __('home.Topic Videos') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Videos Nav -->

                <!-- Product Medicine Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-file-medical"></i><span>{{ __('home.Product Medicine') }}</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('api.backend.product-medicine.index') }}">
                                <i class="bi bi-circle"></i><span>{{ __('home.Product Medicine') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('api.backend.category-product.index') }}">
                                <i class="bi bi-circle"></i><span>{{ __('home.Category Product') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Product Medicine Nav -->

                <!-- News/Events Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-newspaper"></i><span>{{ __('home.New Event') }}</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('api.new-event.index') }}">
                                <i class="bi bi-circle"></i><span>{{ __('home.New Event') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End News/Events Nav -->

                <!-- Examination Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-layout-text-window-reverse"></i><span>{{ __('home.Examination') }}</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('homeAdmin.list.doctors') }}">
                                <i class="bi bi-circle"></i><span>{{ __('home.Examination') }}<</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('api.backend.account-register.index') }}">
                                <i class="bi bi-circle"></i><span>{{ __('home.Duyệt đăng ký phòng khám') }}<</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('homeAdmin.list.staff') }}">
                                <i class="bi bi-circle"></i><span>{{ __('home.Nhân viên') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Examination Nav -->

                <!-- Booking Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-bar-chart"></i><span>{{ __('home.Booking') }}</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('homeAdmin.list.booking') }}">
                                <i class="bi bi-circle"></i><span>{{ __('home.Booking') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Booking Nav -->

                <!-- Config Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-gem"></i><span>{{ __('home.Cấu hình chung') }}</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('homeAdmin.list.config') }}">
                                <i class="bi bi-circle"></i><span>{{ __('home.Cấu hình chung') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Config Nav -->

                <!-- End Departments/Symptoms Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#department-symptom-nav" data-bs-toggle="collapse"
                       href="#">
                        <i class="bi bi-bar-chart"></i><span>{{ __('home.departments') }}</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="department-symptom-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('department.index') }}">
                                <i class="bi bi-circle"></i><span>{{ __('home.departments') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('symptom.index') }}">
                                <i class="bi bi-circle"></i><span>{{ __('home.symptoms') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Departments/Symptoms Nav -->
            @endif
        @endif

        <li class="nav-heading">{{ __('home.Settings') }}</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('profile') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
        <!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('about') }}">
                <i class="bi bi-play"></i>
                <span>{{ __('home.About') }}</span>
            </a>
        </li>
        <!-- End About Page Nav -->

    </ul>

</aside>
<!-- End Sidebar-->

<!-- ======= Main ======= -->
<main id="main" class="main">
    @yield('main-content')
</main>
<!-- End -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>KRMEDI</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Designed by <a href="#">KRMEDI</a>
    </div>
</footer>
<!-- End Footer -->
@include('components.head.tinymce-config')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('admin/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('admin/vendor/chart.js/chart.umd.js')}}"></script>
<script src="{{ asset('admin/vendor/echarts/echarts.min.js')}}"></script>
<script src="{{ asset('admin/vendor/quill/quill.min.js')}}"></script>
<script src="{{ asset('admin/vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{ asset('admin/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('admin/js/main.js')}}"></script>
<script>
    function loadingMasterPage() {
        let overlay = document.getElementsByClassName('loading-overlay-master')[0]
        overlay.classList.toggle('is-active')
    }
</script>
</body>

</html>
