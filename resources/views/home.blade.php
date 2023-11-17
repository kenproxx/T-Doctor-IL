@php use App\Models\Province; @endphp
@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <style>
        .border-flea-market {
            border-radius: 16px;
            padding: 16px;
        }

        .object-fit-cover {
            object-fit: cover;
        }

        .title-div-flea-market {
            white-space: nowrap;
            overflow: hidden;
        }
    </style>
    @include('layouts.partials.header')
    @include('component.banner')
    <div>
        <div class="section1 d-flex justify-content-evenly">
            <div class="section1__side">
                <div class="section1__side_1">
                    <img src="{{asset('img/image 16.png')}}" alt="" style="width:165px; height: 313px">
                </div>
                <div class="section1__side_2">
                    <img src="{{asset('img/banner33.png')}}" alt="" style="width:165px; height: 313px">
                </div>

            </div>
            <div class="section1-main d-flex">
                <div class="section1__item order-1">
                    <div class="section1-label position-relative">
                        <h3 class="py-3 text-center">WHAT’S FREE?</h3>
                        <a href="#"><p class="section1_link">See all</p></a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <ul class="nav nav-pills nav-fill">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Free today</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Free with mission</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Discounted service</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="section1-content">
                                @foreach($coupons as $coupon)
                                    <a href="{{ route('what.free.detail', $coupon->id) }}" target="_blank">
                                        <div class="px-5 py-2">
                                            <div class="content__item d-flex gap-3">
                                                <img
                                                    class="content__item__image"
                                                    src="{{asset($coupon->thumbnail ?? 'img/icons_logo/image 1.jpeg')}}"
                                                    alt=""
                                                />
                                                <div class="w-100 overflow-hidden">
                                                    <h6>
                                                        {!! $coupon->title !!}
                                                    </h6>
                                                    <div class="content__item__describe">
                                                        {!! $coupon->short_description !!}
                                                    </div>
                                                    <p class="content__item-link">Read</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
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
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <div class="content__item__describe">
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </div>
                                            <p class="content__item-link">Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-2">
                                    <div class="content__item d-flex gap-3">
                                        <img
                                            class="content__item__image"
                                            src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                            alt=""
                                        />
                                        <div>
                                            <h6>
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <div class="content__item__describe">
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </div>
                                            <p class="content__item-link">Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-2">
                                    <div class="content__item d-flex gap-3">
                                        <img
                                            class="content__item__image"
                                            src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                            alt=""
                                        />
                                        <div>
                                            <h6>
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <div class="content__item__describe">
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </div>
                                            <p class="content__item-link">Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-2">
                                    <div class="content__item d-flex gap-3">
                                        <img
                                            class="content__item__image"
                                            src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                            alt=""
                                        />
                                        <div>
                                            <h6>
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <div class="content__item__describe">
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </div>
                                            <p class="content__item-link">Read</p>
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
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <p>
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </p>
                                            <p class="content__item-link">Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-2">
                                    <div class="content__item d-flex gap-3">
                                        <img
                                            class="content__item__image"
                                            src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                            alt=""
                                        />
                                        <div>
                                            <h6>
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <p>
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </p>
                                            <p class="content__item-link">Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-2">
                                    <div class="content__item d-flex gap-3">
                                        <img
                                            class="content__item__image"
                                            src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                            alt=""
                                        />
                                        <div>
                                            <h6>
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <p>
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </p>
                                            <p class="content__item-link">Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-2">
                                    <div class="content__item d-flex gap-3">
                                        <img
                                            class="content__item__image"
                                            src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                            alt=""
                                        />
                                        <div>
                                            <h6>
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <p>
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </p>
                                            <p class="content__item-link">Read</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section1__item order-1">
                    <div class="section1-label position-relative">
                        <h3 class="py-3 text-center">News / Events</h3>
                        <a href="#"><p class="section1_link">See all</p></a>
                    </div>
                    <div class="d-flex ">
                        <ul class="nav nav-pills nav-fill" style="gap:50px">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">New</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Event</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <div class="content__item__describe">
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </div>
                                            <p class="content__item-link">Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-2">
                                    <div class="content__item d-flex gap-3">
                                        <img
                                            class="content__item__image"
                                            src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                            alt=""
                                        />
                                        <div>
                                            <h6>
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <div class="content__item__describe">
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </div>
                                            <p class="content__item-link">Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-2">
                                    <div class="content__item d-flex gap-3">
                                        <img
                                            class="content__item__image"
                                            src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                            alt=""
                                        />
                                        <div>
                                            <h6>
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <div class="content__item__describe">
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </div>
                                            <p class="content__item-link">Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-2">
                                    <div class="content__item d-flex gap-3">
                                        <img
                                            class="content__item__image"
                                            src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                            alt=""
                                        />
                                        <div>
                                            <h6>
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <div class="content__item__describe">
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </div>
                                            <p class="content__item-link">Read</p>
                                        </div>
                                    </div>
                                </div>
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
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <div class="content__item__describe">
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </div>
                                            <p class="content__item-link">Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-2">
                                    <div class="content__item d-flex gap-3">
                                        <img
                                            class="content__item__image"
                                            src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                            alt=""
                                        />
                                        <div>
                                            <h6>
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <div class="content__item__describe">
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </div>
                                            <p class="content__item-link">Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-2">
                                    <div class="content__item d-flex gap-3">
                                        <img
                                            class="content__item__image"
                                            src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                            alt=""
                                        />
                                        <div>
                                            <h6>
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <div class="content__item__describe">
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </div>
                                            <p class="content__item-link">Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-2">
                                    <div class="content__item d-flex gap-3">
                                        <img
                                            class="content__item__image"
                                            src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                            alt=""
                                        />
                                        <div>
                                            <h6>
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <div class="content__item__describe">
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </div>
                                            <p class="content__item-link">Read</p>
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
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <p>
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </p>
                                            <p class="content__item-link">Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-2">
                                    <div class="content__item d-flex gap-3">
                                        <img
                                            class="content__item__image"
                                            src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                            alt=""
                                        />
                                        <div>
                                            <h6>
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <p>
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </p>
                                            <p class="content__item-link">Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-2">
                                    <div class="content__item d-flex gap-3">
                                        <img
                                            class="content__item__image"
                                            src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                            alt=""
                                        />
                                        <div>
                                            <h6>
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <p>
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </p>
                                            <p class="content__item-link">Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-2">
                                    <div class="content__item d-flex gap-3">
                                        <img
                                            class="content__item__image"
                                            src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                            alt=""
                                        />
                                        <div>
                                            <h6>
                                                Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                                khám Med247
                                            </h6>
                                            <p>
                                                Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                                kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                                đầy. Dù đã có ...
                                            </p>
                                            <p class="content__item-link">Read</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section1__side">
                <div class="section1__side_1">
                    <img src="{{asset('img/banner44.png')}}" alt="" style="width:165px; height: 313px">
                </div>
                <div class="section1__side_2">
                    <img src="{{asset('img/banner55.png')}}" alt="" style="width:165px; height: 313px">
                </div>
            </div>
        </div>
    </div>
    <div class="banner1">
        <img src="{{asset('img/Rectangle 23815.png')}}" alt="">
    </div>
    <div id="map-location" class="d-flex justify-content-center">
        <div class="content-item d-flex justify-content-center">
            <div id="address" class="p-2 w-100">
                <h2>Clinics/Pharmacies</h2>
                <p>Find your suitable clinics/pharmacies and book now!</p>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d760.8895710809026!2d105.75723237632864!3d20.973456865015233!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313453779ecd7b59%3A0x21695bf72a03120f!2zQ8O0bmcgdHkgVE5ISCBJTCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1696643777380!5m2!1svi!2s"
                    width="770" height="417" style="border:1px; border-radius: 8px" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div id="describe" class="mt-auto p-2">
                <div class="describe-item">
                    <h3>24/7 AVAILABLE</h3>
                    <p>You can find available clinics/pharmacies</p>
                </div>
                <div class="describe-item" hidden="">
                    <h3>HOME CARE SERVICE</h3>
                    <p>Don't come to us! We will come to you!</p>
                </div>
                <div class="describe-item">
                    <h3>MANY LOCATION</h3>
                    <p>More than 1500 Doctors, 1000 Pharmacists, 1000 Hospitals always wait for you</p>
                </div>
                <button class="btn-visit">Visit</button>
            </div>
        </div>
    </div>
    <div id="doctor-information">
        <h1>Find a doctor</h1>
        <div id="list-option" class="d-flex justify-content-around ">
            <div class="option-menu d-flex justify-content-center">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">24/7 Available</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Find my medicine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mentoring</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="list-doctor  " class="d-flex justify-content-center container list-doctor11">
            <div class="card">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/pngtree-cartoon-anime-male-doctor-element-png-image_4073784.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">BS Nguyễn Khắc Quý</h5>
                    <p class="card-text">respiratory doctor</p>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
            <div class="card">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/11111.jpeg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">BS Lê Hải Thành</h5>
                    <p class="card-text">respiratory doctor</p>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
            <div class="card">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/22222.jpeg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">BS Phạm Đức Long</h5>
                    <p class="card-text">respiratory doctor</p>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
            <div class="card">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/doctor.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">BS Trần Đình </h5>
                    <p class="card-text">respiratory doctor</p>
                    <p class="card-text_1">Location: <b>Hanoi</b></p>
                    <p class="card-text_1">Working time: <b>8:00 - 16:00</b></p>
                </div>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="banner1">
        <img src="{{asset('img/Rectangle 23815.png')}}" alt="">
    </div>
    <div id="recruitment_board" class="d-flex justify-content-center">
        <div id="content-bkg" class="content-item d-flex justify-content-center ">
            <div id="recruitment" class="p-2 w-100">
                <h2>Recruitment</h2>
                <p>Hire staffs cheaper, find your staffs faster</p>
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
                                        Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                        khám Med247
                                    </h6>
                                    <div class="content__item__describe">
                                        Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                        kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                        đầy. Dù đã có ...
                                    </div>
                                    <p class="content__item-link">Read</p>
                                </div>
                            </div>
                        </div>
                        <div class="item-bkg">
                            <div class="recruitment__item d-flex ">
                                <img
                                    class="content__item__image"
                                    src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                    alt=""
                                />
                                <div>
                                    <h6>
                                        Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                        khám Med247
                                    </h6>
                                    <div class="content__item__describe">
                                        Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                        kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                        đầy. Dù đã có ...
                                    </div>
                                    <p class="content__item-link">Read</p>
                                </div>
                            </div>
                        </div>
                        <div class="item-bkg">
                            <div class="recruitment__item d-flex ">
                                <img
                                    class="content__item__image"
                                    src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                    alt=""
                                />
                                <div>
                                    <h6>
                                        Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                        khám Med247
                                    </h6>
                                    <div class="content__item__describe">
                                        Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                        kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                        đầy. Dù đã có ...
                                    </div>
                                    <p class="content__item-link">Read</p>
                                </div>
                            </div>
                        </div>
                        <div class="item-bkg">
                            <div class="recruitment__item d-flex ">
                                <img
                                    class="content__item__image"
                                    src="{{asset('img/icons_logo/image 1.jpeg')}}"
                                    alt=""
                                />
                                <div>
                                    <h6>
                                        Nhận liền tay voucher khám online trị giá 250k từ Phòng
                                        khám Med247
                                    </h6>
                                    <div class="content__item__describe">
                                        Chiều qua, nhận được cuộc gọi của một đồng nghiệp, hỏi ý
                                        kiến về một cô gái bị mù mắt sau khi được tiêm chất làm
                                        đầy. Dù đã có ...
                                    </div>
                                    <p class="content__item-link">Read</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="describe" class="d-flex align-items-center flex-column mb-3">
                <div class="p-5 w-100">
                    <div class="describe-item">
                        <h3>24/7 AVAILABLE</h3>
                        <p>You can find available clinics/pharmacies</p>
                    </div>
                    <div class="describe-item" hidden="">
                        <h3>HOME CARE SERVICE</h3>
                        <p>Don't come to us! We will come to you!</p>
                    </div>
                    <div class="describe-item">
                        <h3>MANY LOCATION</h3>
                        <p>More than 1500 Doctors, 1000 Pharmacists, 1000 Hospitals always wait for you</p>
                    </div>
                </div>
                <div class="mt-auto p-2">
                    <button class="btn-see-all ">See all</button>
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
                <h2>Flea market</h2>
                <p>Hire staffs cheaper, find your staffs faster</p>
                <div class="section1-content">

                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-sm-4 pt-4">
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
                                                <p class="card-text">Location: <b>{{ $province->name}}</b></p>
                                            @endif
                                        @endif
                                        <h4>{{ $product->price }}</h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <div id="describe" class="d-flex align-items-center flex-column mb-3">
                <div class="p-5 w-100">
                    <div class="describe-item">
                        <h3>24/7 AVAILABLE</h3>
                        <p>You can find available clinics/pharmacies</p>
                    </div>
                    <div class="describe-item" hidden="">
                        <h3>HOME CARE SERVICE</h3>
                        <p>Don't come to us! We will come to you!</p>
                    </div>
                    <div class="describe-item">
                        <h3>MANY LOCATION</h3>
                        <p>More than 1500 Doctors, 1000 Pharmacists, 1000 Hospitals always wait for you</p>
                    </div>
                </div>
                <div class="mt-auto p-2">
                    <button class="btn-see-all ">See all</button>
                </div>
            </div>
        </div>
    </div>
    <div class="banner1">
        <img src="{{asset('img/Rectangle 23815.png')}}" alt="">
    </div>
    <div id="item-information" style="padding-top: 15px">
        <h1>Buy online</h1>
        <p>Don't struggle finding, we are always ready for you</p>
        <div id="list-option" style="padding-top: 15px" class="d-flex justify-content-around ">
            <div class="option-menu d-flex justify-content-center">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Popular</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Recommended</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">New product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hot deal</a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="list-item" class="d-flex justify-content-center container">
            <div class="card" style="width: 237px; height: 361px">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/item_shopping.png')}}" class="card-img-top" alt="..." width="237px"
                     height="237px">
                <div class="card-body">
                    <h5 class="card-title">Máy tạo oxy 5 lít Reiwa K5BW</h5>
                    <p class="card-text">Location: <b>Hanoi</b></p>
                    <h4>599.000</h4>
                </div>
            </div>
            <div class="card" style="width: 237px; height: 361px">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/item_shopping.png')}}" class="card-img-top" alt="..." width="237px"
                     height="237px">
                <div class="card-body">
                    <h5 class="card-title">Máy tạo oxy 5 lít Reiwa K5BW</h5>
                    <p class="card-text">Location: <b>Hanoi</b></p>
                    <h4>599.000</h4>
                </div>
            </div>
            <div class="card" style="width: 237px; height: 361px">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/item_shopping.png')}}" class="card-img-top" alt="..." width="237px"
                     height="237px">
                <div class="card-body">
                    <h5 class="card-title">Máy tạo oxy 5 lít Reiwa K5BW</h5>
                    <p class="card-text">Location: <b>Hanoi</b></p>
                    <h4>599.000</h4>
                </div>
            </div>
            <div class="card" style="width: 237px; height: 361px">
                <i class="bi bi-heart"></i>
                <img src="{{asset('img/item_shopping.png')}}" class="card-img-top" alt="..." width="237px"
                     height="237px">
                <div class="card-body">
                    <h5 class="card-title">Máy tạo oxy 5 lít Reiwa K5BW</h5>
                    <p class="card-text">Location: <b>Hanoi</b></p>
                    <h4>599.000</h4>
                </div>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <script>
        function viewCoupon(id) {
            window.location.href = "/coupon/" + id;
        }
    </script>
@endsection
