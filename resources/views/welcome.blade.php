@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <head>
        <meta charset="UTF-8">
        <title>TDOCTOR</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,400;1,700&family=Inter:wght@400;500;600;700&family=Mulish:wght@300;400;500;600;700&family=Noto+Sans+KR:wght@300;400;500;700&family=Nunito+Sans:wght@400;500&family=Poppins:wght@300&family=Roboto+Slab:wght@400;500&family=Roboto:wght@500&family=Rubik:wght@300;400;500&display=swap" rel="stylesheet">


    </head>
    <body>
    <div class="container-fluid">
        <div class="row">
            <div class="banner">
                <!-- Add content for your banner here -->
            </div>
        </div>
    </div>
    <div>
        <div class="section1 d-flex gap-3">
            <div class="section1__side"></div>
            <div class="section1-main d-flex gap-4">
                <div class="section1__item order-1">
                    <div class="section1-label position-relative">
                        <h3 class="py-3 text-center">WHAT’S FREE?</h3>
                        <a href="#"><p class="section1_link">See all</p></a>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Free today</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Free with mission</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Discounted service</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                    <ul class="nav nav-tabs" id="myTab1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab1" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">News</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab1" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Events</button>
                        </li>
                    </ul>
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
            <div class="section1__side"></div>
        </div>
    </div>
    <div class="banner1">
        <!-- Add content for your banner here -->
    </div>
    <div id="map-location" class="d-flex justify-content-center">
        <div class="content-item d-flex justify-content-center" >
            <div id="address" class="p-2 w-100">
                <h2>Clinics/Pharmacies</h2>
                <p>Find your suitable clinics/pharmacies and book now!</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d760.8895710809026!2d105.75723237632864!3d20.973456865015233!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313453779ecd7b59%3A0x21695bf72a03120f!2zQ8O0bmcgdHkgVE5ISCBJTCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1696643777380!5m2!1svi!2s"
                        width="770" height="417" style="border:1px; border-radius: 8px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div id="describe" class="mt-auto p-2">
                <div class="describe-item">
                    <h3>24/7 AVAILABLE</h3>
                    <p>You can find available clinics/pharmacies</p>
                </div>
                <div class="describe-item">
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
            <div class="option-menu">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#">24/7 Available</a>
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
        <div id="list-doctor" class="d-flex justify-content-evenly container">
            <div class="col-3 card" style="width: 15rem;">
                <img src="{{asset('img/icons_logo/image 1.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
            <div class="col-3 card" style="width: 15rem;">
                <img src="{{asset('img/icons_logo/image 1.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
            <div class="col-3 card" style="width: 15rem;">
                <img src="{{asset('img/icons_logo/image 1.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
            <div class="col-3 card" style="width: 15rem;">
                <img src="{{asset('img/icons_logo/image 1.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
        <!-- Add content for your banner here -->
    </div>
    <div id="recruitment_board" class="d-flex justify-content-center">
        <div class="content-item d-flex justify-content-center" >
            <div id="recruitment" class="p-2 w-100">
                <h2>Recruitment</h2>
                <p>Hire staffs cheaper, find your staffs faster</p>
                <div>
                    <div class="section1-content mt-1">
                        <div class="">
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
                        <div class="">
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
                        <div class="">
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
                        <div class="">
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
            <div id="describe" class="mt-auto p-2 align-self-baseline">
                <div class="describe-item">
                    <h3>24/7 AVAILABLE</h3>
                    <p>You can find available clinics/pharmacies</p>
                </div>
                <div class="describe-item">
                    <h3>HOME CARE SERVICE</h3>
                    <p>Don't come to us! We will come to you!</p>
                </div>
                <div class="describe-item">
                    <h3>MANY LOCATION</h3>
                    <p>More than 1500 Doctors, 1000 Pharmacists, 1000 Hospitals always wait for you</p>
                </div>
                <button class="btn-see-all mt-auto p-2">See all</button>
            </div>
        </div>
    </div>
    <div class="banner1">
        <!-- Add content for your banner here -->
    </div>
    <div id="flea_market_board" class="d-flex justify-content-center">
        <div class="content-item d-flex justify-content-center">
            <div id="flea-market" class="p-2 w-100">
                <h2>Flea market</h2>
                <p>Hire staffs cheaper, find your staffs faster</p>
                <div>
                    <div class="section1-content mt-1 container row">
                        <div class="col-2 card" style="width: 10rem;">
                            <img src="{{asset('img/icons_logo/image 1.png')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                        <div class="col-2 card" style="width: 10rem;">
                            <img src="{{asset('img/icons_logo/image 1.png')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                        <div class="col-2 card" style="width: 10rem;">
                            <img src="{{asset('img/icons_logo/image 1.png')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="describe" class="mt-auto p-2">
                    <div class="describe-item">
                        <h3>24/7 AVAILABLE</h3>
                        <p>You can find available clinics/pharmacies</p>
                    </div>
                    <div class="describe-item">
                        <h3>HOME CARE SERVICE</h3>
                        <p>Don't come to us! We will come to you!</p>
                    </div>
                    <div class="describe-item">
                        <h3>MANY LOCATION</h3>
                        <p>More than 1500 Doctors, 1000 Pharmacists, 1000 Hospitals always wait for you</p>
                    </div>
                <button class="btn-see-all mt-auto p-2">See all</button>
            </div>
        </div>
    </div>
    <div class="banner1">
        <!-- Add content for your banner here -->
    </div>
    <div id="item-information">
        <h1>Buy online</h1>
        <p>Don't struggle finding, we are always ready for you</p>
        <div id="list-option" class="d-flex justify-content-around ">
            <div class="option-menu">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Popular</a>
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
        <div id="list-item" class="d-flex justify-content-evenly container">
            <div class="col-3 card" style="width: 18rem;">
                <img src="{{asset('img/icons_logo/image 1.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
            <div class="col-3 card" style="width: 18rem;">
                <img src="{{asset('img/icons_logo/image 1.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
            <div class="col-3 card" style="width: 18rem;">
                <img src="{{asset('img/icons_logo/image 1.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
            <div class="col-3 card" style="width: 18rem;">
                <img src="{{asset('img/icons_logo/image 1.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
    </body>
@endsection
