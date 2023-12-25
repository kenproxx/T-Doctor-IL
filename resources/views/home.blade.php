@php use App\Enums\NewEventStatus;use App\Models\NewEvent;use App\Models\Province;

@endphp
@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-home.css') }}" rel="stylesheet">
    @include('layouts.partials.header')
    <div class="container">
        <div class="d-md-flex justify-content-between mt-homeNew align-items-center">
            <div class="col-md-7">
                <div class="title-homeNew">
                    Providing Quality <span class="text-title--new1">Healthcare</span> for a <span
                        class="text-title--new2">Brighter</span> and <span class="text-title--new2">Healthy</span>
                    Future
                </div>
                <div class="content_homeNew">
                    At our hospital, we are dedicated to providing exceptional medical care to our patients and their
                    families.
                    Our experienced team of medical professionals, cutting-edge technology, and compassionate approach
                    make us a leader in the healthcare industry
                </div>
            </div>
            <div class="col-md-5">
                <div class="img-container">
                    <div class="img-doctor__homeNew">
                        <img src="{{asset('img/homeNew-img/Property 1=Variant2.png')}}" alt="Your Image">
                    </div>
                </div>
            </div>
        </div>
        <div class="align-center">
            <div class="title-whatFree--homeNew">
                <span class="py-3 text-center">{{ __('home.WHAT’S FREE') }}?</span>
            </div>
            <div class="d-flex nav-header--homeNew justify-content-center mt-3">
                <ul class="nav nav-pills nav-fill d-flex justify-content-between w-50">
                    <li class="nav-item">
                        <a class="nav-link active font-14-mobi" id="home-tab" data-toggle="tab" href="#home"
                           role="tab" aria-controls="home" aria-selected="true">{{ __('home.Free today') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-14-mobi" id="profile-tab" data-toggle="tab" href="#profile"
                           role="tab" aria-controls="profile"
                           aria-selected="false">{{ __('home.Free with mission') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-14-mobi" id="contact-tab" data-toggle="tab" href="#contact"
                           role="tab" aria-controls="home"
                           aria-selected="true">{{ __('home.Discounted service') }}</a>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        @if($coupons == '')
                            <h1 class="d-flex align-items-center justify-content-center mt-4">Hết Voucher</h1>
                        @else
                            @foreach($coupons as $coupon)
                                <a href="{{ route('what.free.detail', $coupon->id) }}" class="col-md-4" target="_blank">
                                    <div class="card-homeNew mt-4">
                                        <div class="content__item w-100">
                                            <img
                                                class="content__item__img"
                                                src="{{asset($coupon->thumbnail ?? 'img/icons_logo/image 1.jpeg')}}"
                                                alt="">
                                            <div class="w-100 overflow-hidden">
                                                <div class="content__item__title">
                                                    {!! $coupon->title !!}
                                                </div>
                                                <div class="content__item__describe">
                                                    {!! $coupon->short_description !!}
                                                </div>
                                                <div>
                                                    <p class="content__item-link">{{ __('home.Learn more') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                    <div class="pagination mt-4 d-flex align-items-center justify-content-center">
                        {{ $coupons->links() }}
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="section1-content">
                        <div class="px-5 py-2">
                            <div class="content__item d-flex gap-3">
                                <img
                                    class="content__item__image"
                                    src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                    alt=""
                                />
                                <div>
                                    <h6>
                                        {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}
                                    </h6>
                                    <div class="content__item__describe">
                                        {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                                    </div>
                                    <p class="content__item-link">{{ __('home.Read') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="section1-content mt-5">
                        <div class="px-5 py-2">
                            <div class="content__item d-flex gap-3">
                                <img
                                    class="content__item__image"
                                    src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                    alt=""
                                />
                                <div>
                                    <h6>
                                        {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}
                                    </h6>
                                    <p>
                                        {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                                    </p>
                                    <p class="content__item-link">{{ __('home.Read') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="map-location" class="d-flex justify-content-center">
            <div class="content-item  justify-content-center w-100">
                <div class="title-clinics">
                    <h2>{{ __('home.Clinics/Pharmacies') }}</h2>
                    <p>{{ __('home.Find your suitable clinics/pharmacies and book now') }}!</p>
                </div>
                <div class="d-flex clip-path-container" style="height: 700px;">
                    <div id="allAddressesMap" class="p-2 w-100">

                    </div>
                </div>
                <div id="" class="w-100 d-md-flex">
                    <div class="col-md-4 mt-4 d-flex text-map--homeNew">
                        <div class="mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"
                                 fill="none">
                                <g clip-path="url(#clip0_4225_13428)">
                                    <mask id="mask0_4225_13428" style="mask-type:luminance" maskUnits="userSpaceOnUse"
                                          x="0" y="0" width="64" height="64">
                                        <path d="M0 7.62939e-06H64V64H0V7.62939e-06Z" fill="white"/>
                                    </mask>
                                    <g mask="url(#mask0_4225_13428)">
                                        <path
                                            d="M36.1292 51.8662L38.8236 50.6817C39.6451 50.3207 40.6073 50.5924 41.1188 51.3297L43.2787 54.4437C43.2787 54.4437 45.7977 53.4954 49.6464 49.6466C53.4952 45.7979 54.4436 43.2789 54.4436 43.2789L51.3296 41.119C50.5922 40.6075 50.3206 39.6452 50.6816 38.8237L55.4029 28.0835C55.7508 27.2922 56.5936 26.8427 57.4451 26.9912C58.4846 27.1724 59.8754 27.6294 61.0063 28.7601C65.3608 33.1147 62.7218 44.9129 53.8172 53.8174C44.9127 62.722 33.1146 65.361 28.7599 61.0065C27.6292 59.8756 27.1722 58.4847 26.9911 57.4452C26.8426 56.5937 27.2921 55.751 28.0833 55.4031L32.7446 53.3541"
                                            stroke="#088180" stroke-width="3" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                        <path
                                            d="M11.7607 50.3398C7.36537 45.4922 4.6875 39.0587 4.6875 31.9998C4.6875 16.9155 16.9157 4.68735 32 4.68735C33.8856 4.68735 35.7265 4.87835 37.5044 5.24222"
                                            stroke="#088180" stroke-width="3" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M27.4086 58.9277C24.1228 58.3715 21.0367 57.2284 18.2617 55.6101"
                                              stroke="#088180" stroke-width="3" stroke-miterlimit="10"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M39.2871 30.3453H47.3737L40.912 45.0449" stroke="#088180"
                                              stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path d="M39.6513 19.9842L28.6348 45.0449" stroke="#088180" stroke-width="3"
                                              stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path
                                            d="M30.5375 30.3451H21.3066C21.3066 30.3451 26.194 21.4862 27.0005 20.4967C27.8161 19.4961 28.5884 20.1202 28.6619 21.0028C28.7354 21.8855 28.6251 34.6836 28.6251 34.6836"
                                            stroke="#088180" stroke-width="3" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                        <path
                                            d="M20.2431 34.793L12.7525 34.77C12.7525 34.77 13.2956 34.0606 17.9846 27.3607C18.8602 26.1096 19.3423 25.054 19.5475 24.1696L19.6201 23.601C19.6201 21.5236 17.936 19.8397 15.8587 19.8397C14.0308 19.8397 12.5075 21.1435 12.168 22.872"
                                            stroke="#088180" stroke-width="3" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                        <path
                                            d="M58.2024 12.6879C58.2024 16.4933 55.1175 19.5781 51.3121 19.5781C47.5069 19.5781 44.4219 16.4933 44.4219 12.6879C44.4219 8.8825 47.5069 5.79763 51.3121 5.79763C55.1175 5.79763 58.2024 8.8825 58.2024 12.6879Z"
                                            stroke="#088180" stroke-width="3" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                        <path
                                            d="M12.9087 44.4283C14.6395 45.2989 15.8276 47.0898 15.8276 49.1593C15.8276 52.0829 13.4575 54.4531 10.5337 54.4531C8.46423 54.4531 6.67336 53.2649 5.80273 51.5343C5.91986 55.2369 8.95623 58.2031 12.6874 58.2031C16.4927 58.2031 19.5776 55.1183 19.5776 51.3129C19.5776 47.5818 16.6115 44.5454 12.9087 44.4283Z"
                                            stroke="#088180" stroke-width="3" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M51.3125 5.79688V0.937501" stroke="#088180" stroke-width="3"
                                              stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M47.8671 6.7207L45.4375 2.51233" stroke="#088180" stroke-width="3"
                                              stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M57.2793 16.1329L61.4877 18.5625" stroke="#088180" stroke-width="3"
                                              stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M58.2031 12.6875H63.0625" stroke="#088180" stroke-width="3"
                                              stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M44.4219 12.6875H39.5625" stroke="#088180" stroke-width="3"
                                              stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M45.3451 9.24219L41.1367 6.81256" stroke="#088180" stroke-width="3"
                                              stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M54.7578 18.6549L57.1874 22.8633" stroke="#088180" stroke-width="3"
                                              stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M51.3125 19.5781V24.4375" stroke="#088180" stroke-width="3"
                                              stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M57.2793 9.24219L61.4877 6.81256" stroke="#088180" stroke-width="3"
                                              stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M54.7578 6.7207L57.1874 2.51233" stroke="#088180" stroke-width="3"
                                              stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M2.81836 43.4434V48.4434" stroke="#088180" stroke-width="3"
                                              stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M0.943359 45.9434H4.69336" stroke="#088180" stroke-width="3"
                                              stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M18.9922 59.7738V63.0625" stroke="#088180" stroke-width="3"
                                              stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.7598 61.418H20.2263" stroke="#088180" stroke-width="3"
                                              stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                </g>
                                <defs>
                                    <clipPath id="clip0_4225_13428">
                                        <rect width="64" height="64" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <div>
                            <h3>{{ __('home.24/7 AVAILABLE') }}</h3>
                            <p>{{ __('home.You can find available clinics/pharmacies') }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 d-flex text-map--homeNew">
                        <div class="mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"
                                 fill="none">
                                <g clip-path="url(#clip0_4225_13482)">
                                    <path
                                        d="M36.8484 31.4238C34.9455 31.4238 33.2247 32.2187 32.0005 33.4935C30.7763 32.2187 29.0554 31.4238 27.1526 31.4238C23.4456 31.4238 20.4297 34.4397 20.4297 38.1467C20.4297 41.2818 21.804 44.2393 24.2002 46.261L32.0005 52.8424L39.8008 46.261C42.197 44.2393 43.5713 41.2818 43.5713 38.1467C43.5714 34.4397 40.5555 31.4238 36.8484 31.4238ZM37.3828 43.395L32.0005 47.9361L26.6182 43.3949C25.0684 42.0873 24.1794 40.1744 24.1794 38.1467C24.1794 36.5074 25.5131 35.1737 27.1524 35.1737C28.7917 35.1737 30.1254 36.5074 30.1254 38.1467H33.8753C33.8753 36.5074 35.209 35.1737 36.8483 35.1737C38.4876 35.1737 39.8213 36.5074 39.8213 38.1467C39.8216 40.1745 38.9326 42.0873 37.3828 43.395Z"
                                        fill="#088180"/>
                                    <path
                                        d="M63.9025 28.1582C63.6036 26.4282 62.649 24.9181 61.2143 23.9061L32.0001 3.29883L2.78575 23.9063C1.35105 24.9182 0.396467 26.4283 0.0976033 28.1584C-0.20126 29.8883 0.191475 31.6312 1.20356 33.0658C2.21552 34.5004 3.72559 35.4551 5.45564 35.7539C5.83375 35.8193 6.21236 35.8516 6.58847 35.8516C7.11583 35.8516 7.63756 35.7871 8.14491 35.6621V56.9519H3.9712V60.7017H60.0289V56.9519H55.8552V35.6576C58.4046 36.2818 61.1943 35.3369 62.7965 33.0658C63.8086 31.6311 64.2012 29.8883 63.9025 28.1582ZM11.8948 56.9519V33.5675L32 19.3854L52.1053 33.5675V56.9519H11.8948ZM59.7324 30.9042C58.8349 32.1762 57.0703 32.4809 55.7985 31.5838L32 14.7965L8.20141 31.5838C7.58519 32.0186 6.83709 32.1868 6.09387 32.0588C5.3509 31.9305 4.7023 31.5205 4.26769 30.9042C3.83308 30.2881 3.66446 29.5397 3.79271 28.7967C3.92108 28.0537 4.33119 27.4051 4.94729 26.9705L32.0001 7.88765L59.0528 26.9704C59.669 27.405 60.079 28.0536 60.2074 28.7966C60.3357 29.5396 60.167 30.288 59.7324 30.9042Z"
                                        fill="#088180"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_4225_13482">
                                        <rect width="64" height="64" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <div><h3>{{ __('home.HOME CARE SERVICE') }}</h3>
                            <p>{{ __("home.Don't come to us! We will come to you") }}!</p>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 d-flex text-map--homeNew">
                        <div class="mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"
                                 fill="none">
                                <path
                                    d="M32.0006 0C20.4563 0 11.0645 9.39188 11.0645 20.9361C11.0645 25.6241 14.3508 33.9281 20.8325 45.6174C25.5777 54.175 32.0006 64 32.0006 64C32.0006 64 38.4235 54.1749 43.1686 45.6174C49.6502 33.928 52.9366 25.624 52.9366 20.936C52.9366 9.39188 43.5447 0 32.0006 0ZM20.7572 37.4868C19.9593 35.9074 19.205 34.3466 18.5177 32.8361C19.3955 31.5266 20.8801 30.7126 22.4882 30.7126H25.3595C27.927 30.7126 30.0268 32.7487 30.1316 35.2909C30.1301 35.3573 30.1265 35.4233 30.1265 35.4899V37.4869L20.7572 37.4868ZM21.4655 24.5265C21.4655 23.1766 22.5637 22.0784 23.9135 22.0784C25.2633 22.0784 26.3616 23.1766 26.3616 24.5265C26.3616 25.8764 25.2633 26.9745 23.9135 26.9745C22.5637 26.9745 21.4655 25.8764 21.4655 24.5265ZM30.5692 18.6795H33.4406C34.457 18.6795 35.4547 19.0336 36.2775 19.6426C34.8211 20.7755 33.8813 22.5427 33.8813 24.5266C33.8813 25.7546 34.2425 26.8993 34.8621 27.8625C33.7483 28.4167 32.7727 29.2075 32.0008 30.1691C31.2253 29.2031 30.2445 28.4093 29.1242 27.8547C29.7407 26.893 30.0998 25.7514 30.0998 24.5268C30.0998 22.5413 29.1586 20.7726 27.7001 19.6399C28.5138 19.028 29.515 18.6795 30.5692 18.6795ZM29.5467 12.4934C29.5467 11.1435 30.645 10.0454 31.9947 10.0454C33.3446 10.0454 34.4428 11.1435 34.4428 12.4934C34.4428 13.8433 33.3446 14.9415 31.9947 14.9415C30.645 14.9415 29.5467 13.8433 29.5467 12.4934ZM32.0006 57.1306C29.4448 53.0885 25.9071 47.208 22.7042 41.2249H41.2972C38.0941 47.2079 34.5562 53.0885 32.0006 57.1306ZM43.2436 37.4868H33.8643V35.4897H33.8645H33.8746C33.8746 35.423 33.8711 35.3571 33.8695 35.2907C33.9742 32.7485 36.0742 30.7125 38.6416 30.7125H41.5128C43.121 30.7125 44.6056 31.5264 45.4833 32.836C44.796 34.3466 44.0415 35.9074 43.2436 37.4868ZM37.6192 24.5266C37.6192 23.1768 38.7175 22.0785 40.0672 22.0785C41.417 22.0785 42.5152 23.1768 42.5152 24.5266C42.5152 25.8765 41.417 26.9746 40.0672 26.9746C38.7175 26.9746 37.6192 25.8765 37.6192 24.5266ZM45.2771 27.8554C45.8938 26.8935 46.2532 25.7515 46.2532 24.5265C46.2532 21.1743 43.5726 18.4384 40.2427 18.3447C39.4255 17.2715 38.38 16.4142 37.2005 15.8285C37.8197 14.8652 38.1807 13.7209 38.1807 12.4932C38.1807 9.08225 35.4056 6.30725 31.9946 6.30725C28.5837 6.30725 25.8086 9.08225 25.8086 12.4932C25.8086 13.7204 26.1692 14.8642 26.788 15.8271C25.6063 16.4126 24.5658 17.2703 23.7593 18.3442C20.4195 18.4265 17.7273 21.1671 17.7273 24.5265C17.7273 25.7546 18.0886 26.8994 18.7083 27.8629C18.0596 28.1847 17.4532 28.5874 16.9056 29.0621C15.6098 25.7809 14.8023 22.9321 14.8023 20.9359C14.8023 11.4529 22.5173 3.73787 32.0005 3.73787C41.4835 3.73787 49.1985 11.4529 49.1985 20.936C49.1985 22.9323 48.3909 25.7809 47.0952 29.0621C46.5433 28.5837 45.9316 28.1785 45.2771 27.8554Z"
                                    fill="#088180"/>
                            </svg>
                        </div>
                        <div><h3>{{ __('home.MANY LOCATION') }}</h3>
                            <p>{{ __('home.More than 1500 Doctors, 1000 Pharmacists, 1000 Hospitals always wait for you') }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div id="find-doctor--homeNew">
            <div class="title-findDoctor--homeNew">
                <span class="py-3 text-center">{{ __('home.Find a doctor') }}</span>
            </div>
            <div class="d-flex nav-header--homeNew justify-content-center mt-3">
                <ul class="nav nav-pills nav-fill d-flex justify-content-between w-50">
                    <li class="nav-item">
                        <a class="nav-link active font-14-mobi" id="available-tab" data-toggle="tab" href="#available"
                           role="tab" aria-controls="available" aria-selected="true">{{ __('home.24/7 AVAILABLE') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-14-mobi" id="findMedicine-tab" data-toggle="tab" href="#findMedicine"
                           role="tab" aria-controls="findMedicine"
                           aria-selected="false">{{ __('home.Find my medicine') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-14-mobi" id="mentoring-tab" data-toggle="tab" href="#mentoring"
                           role="tab" aria-controls="mentoring"
                           aria-selected="true">{{ __('home.Mentoring') }}</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content mt-4" id="myTabContent">
                <div class="tab-pane fade show active" id="available" role="tabpanel" aria-labelledby="available-tab">
                    <div class="row">
                        @php
                            $doctors = \App\Models\User::where('member', \App\Enums\TypeUser::DOCTORS)->get();
                        @endphp
                        @if($doctors == '')
                            <h1 class="d-flex align-items-center justify-content-center mt-4">null</h1>
                        @else
                            @foreach($doctors as $doctor)
                                <div class="col-md-3 col-6">
                                    <div class="p-3">
                                        <div class="product-item">
                                            <div class="img-pro h-100 justify-content-center d-flex">
                                                <img src="{{$doctor->avt}}" alt="">
                                                <a class="button-heart" data-favorite="0">
                                                    <i id="icon-heart" class="bi-heart bi"
                                                       data-product-id="${product.id}"
                                                       onclick="addProductToWishList(${product.id})"></i>
                                                </a>
                                                <s class="icon-chuyen-khoa">
                                                    @php
                                                        $department = \App\Models\Department::where('id',$doctor->department_id)->value('thumbnail');
                                                    @endphp
                                                    <img src="{{$department}}">
                                                </s>
                                            </div>
                                            <div class="content-pro p-3">
                                                <div class="">
                                                    <div class="name-product" style="height: auto">
                                                        <a class="name-product--fleaMarket"
                                                           href="{{ route('examination.doctor_info', $doctor->id) }}">{{$doctor->name}}</a>
                                                    </div>
                                                    <div class="location-pro d-flex">
                                                         <p>{!! $doctor->service !!}</p>
                                                    </div>
                                                    <div class="price-pro">
                                                        @php
                                                            $addressP = \App\Models\Province::where('id', $doctor->province_id)->value('name');
                                                        @endphp
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                            <g clip-path="url(#clip0_5506_14919)">
                                                                <path d="M4.66602 12.8382C3.12321 13.5188 2.16602 14.4673 2.16602 15.5163C2.16602 17.5873 5.89698 19.2663 10.4993 19.2663C15.1017 19.2663 18.8327 17.5873 18.8327 15.5163C18.8327 14.4673 17.8755 13.5188 16.3327 12.8382M15.4993 7.59961C15.4993 10.986 11.7493 12.5996 10.4993 15.0996C9.24935 12.5996 5.49935 10.986 5.49935 7.59961C5.49935 4.83819 7.73793 2.59961 10.4993 2.59961C13.2608 2.59961 15.4993 4.83819 15.4993 7.59961ZM11.3327 7.59961C11.3327 8.05985 10.9596 8.43294 10.4993 8.43294C10.0391 8.43294 9.66602 8.05985 9.66602 7.59961C9.66602 7.13937 10.0391 6.76628 10.4993 6.76628C10.9596 6.76628 11.3327 7.13937 11.3327 7.59961Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_5506_14919">
                                                                    <rect width="20" height="20" fill="white" transform="translate(0.5 0.933594)"/>
                                                                </clipPath>
                                                            </defs>
                                                        </svg> &nbsp; {{$addressP}}
                                                    </div>
                                                    <div class="price-pro">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                            <g clip-path="url(#clip0_5506_14923)">
                                                                <path d="M10.4993 5.93294V10.9329L13.8327 12.5996M18.8327 10.9329C18.8327 15.5353 15.1017 19.2663 10.4993 19.2663C5.89698 19.2663 2.16602 15.5353 2.16602 10.9329C2.16602 6.33057 5.89698 2.59961 10.4993 2.59961C15.1017 2.59961 18.8327 6.33057 18.8327 10.9329Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_5506_14923">
                                                                    <rect width="20" height="20" fill="white" transform="translate(0.5 0.933594)"/>
                                                                </clipPath>
                                                            </defs>
                                                        </svg> &nbsp; {{$doctor->time_working_1}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="pagination mt-4 d-flex align-items-center justify-content-center">
                        {{--                        {{ $coupons->links() }}--}}
                    </div>
                </div>
                <div class="tab-pane fade" id="findMedicine" role="tabpanel" aria-labelledby="findMedicine-tab">
                    <div class="section1-content">
                        <div class="px-5 py-2">
                            <div class="content__item d-flex gap-3">
                                <img
                                    class="content__item__image"
                                    src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                    alt=""
                                />
                                <div>
                                    <h6>
                                        {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}
                                    </h6>
                                    <div class="content__item__describe">
                                        {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                                    </div>
                                    <p class="content__item-link">{{ __('home.Read') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="mentoring" role="tabpanel" aria-labelledby="mentoring-tab">
                    <div class="section1-content mt-5">
                        <div class="px-5 py-2">
                            <div class="content__item d-flex gap-3">
                                <img
                                    class="content__item__image"
                                    src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                    alt=""
                                />
                                <div>
                                    <h6>
                                        {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}
                                    </h6>
                                    <p>
                                        {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                                    </p>
                                    <p class="content__item-link">{{ __('home.Read') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="recruitment-homeNew">
            <div class="d-flex">
                <div class="col-md-8">

                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>

    <div class="banner1">
        <img src="{{asset('img/icons_logo/Rectangle 23814.png')}}" alt="">
    </div>
    <div id="recruitment_board" class="d-flex justify-content-center">
        <div id="content-bkg" class="content-item d-flex justify-content-center ">
            <div id="recruitment" class="p-2 w-100">
                <h2>{{ __('home.Recruitment') }}</h2>
                <p>{{ __('home.Hire staffs cheaper, find your staffs faster') }}</p>
                <div>
                    <div class="section1-content">
                        <div class="item-bkg">
                            <div class="recruitment__item d-flex ">
                                <img
                                    class="content__item__image"
                                    src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                    alt=""
                                />
                                <div>
                                    <h6>
                                        {{ __('home.Nhận liền tay voucher khám online trị giá 250k từ Phòng khám Med247') }}
                                    </h6>
                                    <div class="content__item__describe">
                                        {{ __('home.Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý kiến về một cô gái bị mù mắt sau khi được tiêm chất làm đầy. Dù đã có ...') }}
                                    </div>
                                    <p class="content__item-link">{{ __('home.Read') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="describe" class="d-flex align-items-center flex-column mb-3">
                <div class="p-5 w-100">
                    <div class="describe-item">
                        <h3>{{ __('home.24/7 AVAILABLE') }}</h3>
                        <p>{{ __('home.You can find available clinics/pharmacies') }}</p>
                    </div>
                    <div class="describe-item" hidden="">
                        <h3>{{ __('home.HOME CARE SERVICE') }}</h3>
                        <p>{{ __("home.Don't come to us! We will come to you") }}!</p>
                    </div>
                    <div class="describe-item">
                        <h3>{{ __('home.MANY LOCATION') }}</h3>
                        <p>{{ __('home.More than 1500 Doctors, 1000 Pharmacists, 1000 Hospitals always wait for you') }}</p>
                    </div>
                </div>
                <div class="mt-auto p-2">
                    <button class="btn-see-all ">{{ __('home.See all') }}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="banner1">
        <img src="{{asset('img/Rectangle 23815.png')}}" alt="" style="">
    </div>
    <div id="flea_market_board" class="d-flex justify-content-center">
        <div id="content-bkg" class="col-10 content-item d-flex justify-content-center ">
            <div id="flea-market" class="col-8 p-2 w-100">
                <h2>{{ __('home.Flea market') }}</h2>
                <p>{{ __('home.Hire staffs cheaper, find your staffs faster') }}</p>
                <div class="section1-content">

                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-sm-4 pt-4">
                                <a href="{{ route('flea.market.product.detail', $product->id) }}" target="_blank">
                                    <div class="card border-flea-market" style="height: 342px">
                                        <img src="{{asset($product->thumbnail ?? 'img/item_shopping.png')}}"
                                             class="card-img-top object-fit-cover" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title title-div-flea-market">{{ $product->name }}</h5>
                                            @if($product->province_id)
                                                @php
                                                    $province = Province::find($product->province_id);
                                                @endphp
                                                @if($province)
                                                    <p class="card-text">{{ __('home.Location') }}:
                                                        <b>{{ $province->name}}</b></p>
                                                @endif
                                            @endif
                                            <h4>{{ $product->price }}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <div id="describe" class="d-flex align-items-center flex-column mb-3">
                <div class="p-5 w-100">
                    <div class="describe-item">
                        <h3>{{ __('home.24/7 AVAILABLE') }}</h3>
                        <p>{{ __('home.You can find available clinics/pharmacies') }}</p>
                    </div>
                    <div class="describe-item" hidden="">
                        <h3>{{ __('home.HOME CARE SERVICE') }}</h3>
                        <p>{{ __("home.Don't come to us! We will come to you") }}!</p>
                    </div>
                    <div class="describe-item">
                        <h3>{{ __('home.MANY LOCATION') }}</h3>
                        <p>{{ __('home.More than 1500 Doctors, 1000 Pharmacists, 1000 Hospitals always wait for you') }}</p>
                    </div>
                </div>
                <div class="mt-auto p-2">
                    <a href="{{ route('flea-market.index') }}">
                        <button class="btn-see-all ">{{ __('home.See all') }}</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="banner1">
        <img src="{{asset('img/Rectangle 23815.png')}}" alt="">
    </div>
    <div id="item-information" style="padding-top: 15px; margin-top: 20px">
        <h1>{{ __('home.Buy online') }}</h1>
        <p>{{ __("home.Don't struggle finding, we are always ready for you") }}</p>
        <div id="list-option" style="padding-top: 15px" class="d-flex justify-content-around ">
            <div class="option-menu d-flex justify-content-center">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">{{ __('home.Popular') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('home.Recommended') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('home.New product') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('home.Hot deal') }}</a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="container">
            <div id="list-item" class="d-flex row">
                <div class="col-md-3 mt-3">
                    <div class="card" style="width: 237px; height: 361px">
                        <i class="bi bi-heart"></i>
                        <img src="{{asset('img/item_shopping.png')}}" class="card-img-top" alt="..." width="237px"
                             height="237px">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('home.Máy tạo oxy 5 lít Reiwa K5BW') }}</h5>
                            <p class="card-text">{{ __('home.Location') }}: <b>Hanoi</b></p>
                            <h4>599.000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="card" style="width: 237px; height: 361px">
                        <i class="bi bi-heart"></i>
                        <img src="{{asset('img/item_shopping.png')}}" class="card-img-top" alt="..." width="237px"
                             height="237px">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('home.Máy tạo oxy 5 lít Reiwa K5BW') }}</h5>
                            <p class="card-text">{{ __('home.Location') }}: <b>Hanoi</b></p>
                            <h4>599.000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="card" style="width: 237px; height: 361px">
                        <i class="bi bi-heart"></i>
                        <img src="{{asset('img/item_shopping.png')}}" class="card-img-top" alt="..." width="237px"
                             height="237px">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('home.Máy tạo oxy 5 lít Reiwa K5BW') }}</h5>
                            <p class="card-text">{{ __('home.Location') }}: <b>Hanoi</b></p>
                            <h4>599.000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="card" style="width: 237px; height: 361px">
                        <i class="bi bi-heart"></i>
                        <img src="{{asset('img/item_shopping.png')}}" class="card-img-top" alt="..." width="237px"
                             height="237px">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('home.Máy tạo oxy 5 lít Reiwa K5BW') }}</h5>
                            <p class="card-text">{{ __('home.Location') }}: <b>Hanoi</b></p>
                            <h4>599.000</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">{{ __('home.Previous') }}</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">{{ __('home.Next') }}</a>
                </li>
            </ul>
        </nav>
    </div>
    @php
        $addresses = \App\Models\Clinic::all();
        $coordinatesArray = $addresses->toArray();
    @endphp
    <script>
        function viewCoupon(id) {
            window.location.href = "/coupon/" + id;
        }
    </script>
    <script>
        var locations = {!! json_encode($coordinatesArray) !!};
        var infoWindows = [];

        function getCurrentLocation(callback) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var currentLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    callback(currentLocation);
                });
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        }

        function calculateDistance(lat1, lng1, lat2, lng2) {
            var R = 6371; // Độ dài trung bình của trái đất trong km
            var dLat = toRadians(lat2 - lat1);
            var dLng = toRadians(lng2 - lng1);

            var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(toRadians(lat1)) * Math.cos(toRadians(lat2)) *
                Math.sin(dLng / 2) * Math.sin(dLng / 2);

            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

            var distance = R * c;
            return distance;
        }

        function toRadians(degrees) {
            return degrees * (Math.PI / 180);
        }

        function formatTime(dateTimeString) {
            const date = new Date(dateTimeString);
            const hours = date.getHours().toString().padStart(2, '0');
            const minutes = date.getMinutes().toString().padStart(2, '0');
            return `${hours}:${minutes}`;
        }

        function initMap(currentLocation, locations) {
            var map = new google.maps.Map(document.getElementById('allAddressesMap'), {
                center: currentLocation,
                zoom: 10
            });

            var currentLocationMarker = new google.maps.Marker({
                position: currentLocation,
                map: map,
                title: 'Your Location'
            });

            locations.forEach(function (location) {
                var distance = calculateDistance(
                    currentLocation.lat, currentLocation.lng,
                    parseFloat(location.latitude), parseFloat(location.longitude)
                );

                // Chọn bán kính tìm kiếm (ví dụ: 5 km)
                var searchRadius = 10;

                if (distance <= searchRadius) {
                    var marker = new google.maps.Marker({
                        position: {lat: parseFloat(location.latitude), lng: parseFloat(location.longitude)},
                        map: map,
                        title: 'Location'
                    });
                    var urlDetail = "{{ route('clinic.detail', ['id' => ':id']) }}".replace(':id', location.id);
                    let img = '';
                    let gallery = location.gallery;
                    let arrayGallery = gallery.split(',');


                    var infoWindowContent = `<div class="p-0 m-0 tab-pane fade show active background-modal b-radius" id="modalBooking">
                <div>

                    <img class="b-radius" src="${arrayGallery[0]}" alt="img">
                </div>
                <div class="p-3">
                    <div class="form-group">
                        <div class="d-flex justify-content-between mt-md-2">
                            <div class="fs-18px">${location.name}</div>
                            <div class="button-follow fs-12p ">
                                <a class="text-follow-12" href="">{{ __('home.FOLLOW') }}</a>
                            </div>
                        </div>
                        <div class="d-flex mt-md-2">
                            <div class="d-flex col-md-6 justify-content-center align-items-center">
                                <a class="row p-2" href="">
                                    <div class="justify-content-center d-flex">
                                        <i class="border-button-address fa-solid fa-bullseye"></i>
                                    </div>
                                    <div class="d-flex justify-content-center">{{ __('home.Start') }}</div>
                                </a>
                            </div>
                            <div class="d-flex col-md-6 justify-content-center align-items-center">
                                <a class="row p-2" href="">
                                    <div class="justify-content-center d-flex">
                                        <i class="border-button-address fa-regular fa-circle-right"></i>
                                    </div>
                                    <div class="d-flex justify-content-center">{{ __('home.Direction') }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-md-3 mb-md-3">
                    <a class="w-100 btn btn-secondary border-button-address font-weight-800 fs-14 justify-content-center" href="${urlDetail}" >
                    {{ __('home.Booking') }}
                    </a>
                    </div>
                    <div class="border-top">
                        <div class="mt-md-2"><i class="text-gray mr-md-2 fa-solid fa-location-dot"></i>
                            <span class="fs-14 font-weight-600">${location.address_detail}</span>
                        </div>
                        <div class="mt-md-2">
                            <i class="text-gray mr-md-2 fa-regular fa-clock"></i>
                            <span class="fs-14 font-weight-600">
                                Open: ${formatTime(location.open_date)} - ${formatTime(location.close_date)}
                            </span>
                        </div>
                        <div class="mt-md-2">
                            <i class="text-gray mr-md-2 fa-solid fa-globe"></i>
                            <span class="fs-14 font-weight-600"> ${location.email}</span>
                        </div>
                        <div class="mt-md-2">
                            <i class="text-gray mr-md-2 fa-solid fa-phone-volume"></i> <span
                                class="fs-14 font-weight-600"> ${location.phone}</span>
                        </div>
                        <div class="mt-md-2 mb-md-2">
                            <i class="text-gray mr-md-2 fa-solid fa-bookmark"></i> <span
                                class="fs-14 font-weight-600"> ${location.type}</span>
                        </div>
                        @for($i=0; $i<3; $i++)
                    <div class="border-top mb-md-2">
                        <div
                            class="d-flex justify-content-between rv-header align-items-center mt-md-2">
                            <div class="d-flex rv-header--left">
                                <div class="avt-24 mr-md-2">
                                    <img src="{{asset('img/detail_doctor/ellipse _14.png')}}">
                                        </div>
                                        <p class="fs-16px">Trần Đình Phi</p>
                                    </div>
                                    <div class="rv-header--right">
                                        <p class="fs-14 font-weight-400">10:20 07/04/2023</p>
                                    </div>
                                </div>
                                <div class="content">
                                    <p>
                                        {{ __('home.Lần đầu tiên sử dụng dịch vụ qua app nhưng chất lượng và dịch vụ tại salon quá tốt. Book giờ nào thì cứ đúng giờ đến k sợ phải chờ đợi như mọi chỗ khác. Hy vọng thi thoảng app có nhiều ưu đãi để giới thiệu cho bạn bè cùng sử dụng') }}
                    </p>
                </div>
            </div>
@endfor
                    <div class="border-top">
                        <div
                            class="d-flex justify-content-between rv-header align-items-center mt-md-2">
                            <div class="d-flex rv-header--left">
                                <div class="avt-24 mr-md-2">
                                    <img src="{{asset('img/detail_doctor/ellipse _14.png')}}">
                                    </div>
                                    <p class="fs-16px">Trần Đình Phi</p>
                                </div>
                                <div class="rv-header--right">
                                    <p class="fs-14 font-weight-400">10:20 07/04/2023</p>
                                </div>
                            </div>
                            <div class="content">
                                <p>
                                    {{ __('home.Lần đầu tiên sử dụng dịch vụ qua app nhưng chất lượng và dịch vụ tại salon quá tốt. Book giờ nào thì cứ đúng giờ đến k sợ phải chờ đợi như mọi chỗ khác. Hy vọng thi thoảng app có nhiều ưu đãi để giới thiệu cho bạn bè cùng sử dụng') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>`;

                    var infoWindow = new google.maps.InfoWindow({
                        content: infoWindowContent
                    });

                    marker.addListener('click', function () {
                        closeAllInfoWindows();
                        infoWindow.open(map, marker);
                    });

                    infoWindows.push(infoWindow);
                }
            });
        }

        function closeAllInfoWindows() {
            infoWindows.forEach(function (infoWindow) {
                infoWindow.close();
            });
        }

        getCurrentLocation(function (currentLocation) {
            initMap(currentLocation, locations);
        });
    </script>
@endsection
