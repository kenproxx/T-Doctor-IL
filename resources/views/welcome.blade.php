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
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    </head>
    <body>
    <div id="header"></div>
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
                    <ul class="nav nav-underline" id="myTab" role="tablist">
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
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">                    <div class="section1-content mt-5">
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
    <div class="banner">
        <!-- Add content for your banner here -->
    </div>
    <div id="footer"></div>
    </body>
@endsection
