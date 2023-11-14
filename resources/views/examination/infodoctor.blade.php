@extends('layouts.master')
@section('title', 'Doctor Info')
@section('content')
    @include('layouts.partials.header_3')
    @include('component.banner')
    @if($doctor)
        <div id="show_inf" class="container">
            <div id="title" class="d-flex justify-content-center">
                <div id="list-title" class="d-flex">
                    <div class="list--doctor p-0">
                        <a class="back" href="{{route('examination.index')}}"><p><i class="bi bi-arrow-left"></i>Detailed
                                information Doctor</p></a>
                    </div>
                </div>
            </div>
            <div id="inf-doctor" class="d-flex justify-content-center">
                <div id="img_info" style="width: 470px; height: 951px; margin-right: 15px">
                    <div id="doc" style="margin-bottom: 32px">
                        <img src="{{asset( $doctor->thumbnail )}}">
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
                        <p id="qrContent">
                            {!! $qrCodes !!}
                        </p>

                    </div>
                </div>
                <div id="about" style="width: 670px; height: 670px; margin-left: 15px">
                    <h5 style="font-size: 48px; font-weight: 800;">{{ $doctor->name }}</h5>
                    <div class="dess">
                        <p>Hospital: </p>
                        <span> {{ $doctor->hospital }} </span>
                    </div>
                    <div class="dess">
                        <p>Specialty:</p>
                        <span> {{ $doctor->specialty }}</span>
                    </div>
                    <div class="dess">
                        <p>Experience: </p>
                        <span> {{ $doctor->year_of_experience }} years</span>
                    </div>
                    <div class="dess">
                        <p>Services: </p>
                        <span> {{ $doctor->service }}</span>
                    </div>
                    <div class="dess">
                        <p>Working time: </p>
                        <span> {{ $doctor->time_working_1 }} ({{ $doctor->time_working_2 }})</span>
                    </div>
                    <div class="dess">
                        <p>Service prices:</p>
                        <span>{{ $doctor->service_price }}</span>
                    </div>
                    <div class="dess">
                        <p>Respond rate: </p>
                        <span>{{ $doctor->response_rate }}%</span>
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
                            <img src="{{asset('img/detail_doctor/ellipse _14.png')}}" alt="">
                            <p>Trần Đình Phi</p>
                        </div>
                        <div id="time">
                            <p>10:20 07/04/2023</p>
                        </div>
                    </div>
                    <div class="cmt flex-column">
                        <p><b>"Dịch vụ cực tốt"</b><br>
                            Lần đầu tiên sử dụng dịch vụ qua app nhưng chất lượng và dịch vụ tại salon quá tốt. Book giờ
                            nào
                            thì cứ đúng giờ đến k sợ phải chờ đợi như mọi chỗ khác. Hy vọng thi thoảng app có nhiều ưu
                            đãi
                            để giới thiệu cho bạn bè cùng sử dụng :D
                        </p>
                        <button><i class="bi bi-reply-fill"></i> Reply</button>
                    </div>
                </div>
            </div>

        </div>
    @endif
@endsection

