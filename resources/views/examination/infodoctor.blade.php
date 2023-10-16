@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.partials.header_3')
    @include('component.banner')
    <div id="show_inf" class="container">
        <div id="title" class="d-flex justify-content-center">
            <div id="list-title" class="d-flex">
                <div class="list--doctor p-0">
                    <a class="back" href="{{route('examination.index')}}"><p><i class="bi bi-arrow-left"></i>Detailed information Doctor</p></a>
                </div>
            </div>
        </div>
        <div id="inf-doctor" class="d-flex justify-content-center">
            <div id="img_info" style="width: 470px; height: 951px; margin-right: 15px">
                <div id="doc" style="margin-bottom: 32px">
                    <img src="{{asset('img/detail_doctor/img_doc.png')}}">
                </div>
                <div id="qr_code" style="
                     display: flex;
                    padding: 24px 67px 24px 66px;
                    flex-direction: column;
                    align-items: center;
                    gap: 24px;
                    border-radius: 8px;
                    border: 1px solid #EAEAEA;">
                    <p style="
                    color: #000;
                    font-size: 32px;
                    font-weight: 800;
                    ">Doctor's QR Code</p>
                    <img src="{{asset('img/detail_doctor/qr_code.png')}}">
                </div>
            </div>
            <div id="about" style="width: 670px; height: 670px; margin-left: 15px">
                <h5 style="font-size: 48px; font-weight: 800;">BS ĐÔ VĂN ĐỊNH</h5>
                <div id="dess">
                    <p>Hospital: </p>
                    <span> Tan Trieu Department of General Radiology (radiation department 5) - K Hospital </span>
                </div>
                <div id="dess">
                    <p>Specialty:</p>
                    <span> Dermatology</span>
                </div>
                <div id="dess">
                    <p>Experience: </p>
                    <span> 10 years</span>
                </div>
                <div id="dess">
                    <p>Services: </p>
                    <span> Chat, Videocall, Homecare</span>
                </div>
                <div id="dess">
                    <p>Working time: </p>
                    <span> 8 am - 7 pm (Mon, Wed, Fri)</span>
                </div>
                <div id="dess">
                    <p>Service prices: </p>
                </div>
                <div id="dess">
                    <p>Respond rate: </p>
                    <span>95%</span>
                </div>
                <div id="opt_btn" class="d-flex">
                    <button>Chat</button>
                    <button>Videocall</button>
                    <button>Homecare</button>
                </div>
            </div>
        </div>
        <div id="review" class="d-flex justify-content-center">
            <div id="list-title" class="d-flex">
                <div class="list--doctor p-0">
                    <p>Review</p>
                </div>
                <div class="ms-auto p-2"><a href="{{route('examination.available_doctor')}}">See all</a></div>
            </div>
        </div>
        <div id="rv_doc" class="d-flex justify-content-center">
            <div id="rv-ctn" class="justify-content-center">
                <div id="user_rv" class="d-flex">
                    <div id="user" class="d-flex">
                        <img src="{{asset('img/detail_doctor/ellipse _14.png')}}">
                        <p>Trần Đình Phi</p>
                    </div>
                    <div id="time">
                        <p>10:20 07/04/2023</p>
                    </div>
                </div>
                <div class="cmt flex-column">
                    <p><b>"Dịch vụ cực tốt"</b><br>
                        Lần đầu tiên sử dụng dịch vụ qua app nhưng chất lượng và dịch vụ tại salon quá tốt. Book giờ nào thì cứ đúng giờ đến k sợ phải chờ đợi như mọi chỗ khác. Hy vọng thi thoảng app có nhiều ưu đãi để giới thiệu cho bạn bè cùng sử dụng :D
                    </p>
                    <button><i class="bi bi-reply-fill"></i> Reply</button>
                </div>
            </div>
        </div>

    </div>

@endsection

