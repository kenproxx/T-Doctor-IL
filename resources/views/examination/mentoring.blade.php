@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.partials.header_3')
    @include('component.banner')
    <div id="mentoring" class="container">
        <div class="nav d-flex justify-content-around">
            <a class="tab active" href="#">All</a>
            <a class="tab" href="#">Health</a>
            <a class="tab" href="#">Beauty</a>
            <a class="tab" href="#">New/Events</a>
            <a class="tab" href="#">Kids</a>
            <a class="tab" href="#">Pets</a>
            <a class="tab" href="#">Other</a>
        </div>
        <div id="mentor_doc" class="d-flex justify-content-center flex-column">
            <div id="mentor-qus" class="justify-content-center">
                <div id="user_qus" class="d-flex">
                    <div id="user" class="d-flex">
                        <img src="{{asset('img/detail_doctor/ellipse _14.png')}}">
                        <p>Trần Đình Phi</p>
                    </div>
                    <div id="tags">
                        <button>Health</button>
                    </div>
                </div>
                <div class="qus flex-column">
                    <p>
                        I have cancer and have been examined at a provincial hospital, but need to consult a central doctor but haven't been able to go to the hospital yet. I saw a central doctor in the tdoctor system but at first I didn't believe that I would be able to chat and call a real doctor to examine me directly. When you call, you'll know it's correct. The doctor at tdoctor is very enthusiastic. Very convenient for online examination and further consultation.
                    </p>
                    <div class="qus_sts d-flex">
                        <p class="qus_view"><i class="bi bi-question-circle"></i> Reply: 200</p>
                        <p class="qus_view"><i class="bi bi-chat-dots"></i> Comment: 200</p>
                        <p class="qus_view"><i class="bi bi-eye"></i> Views: 200</p>
                        <p class="qus_view"><i class="bi bi-clock"></i> Date: 23/09/2023</p>
                    </div>
                </div>
            </div>
            <div id="mentor-qus" class="justify-content-center">
                <div id="user_qus" class="d-flex">
                    <div id="user" class="d-flex">
                        <img src="{{asset('img/detail_doctor/ellipse _14.png')}}">
                        <p>Trần Đình Phi</p>
                    </div>
                    <div id="tags">
                        <button>Beauty</button>
                    </div>
                </div>
                <div class="qus flex-column">
                    <p>
                        I have cancer and have been examined at a provincial hospital, but need to consult a central doctor but haven't been able to go to the hospital yet. I saw a central doctor in the tdoctor system but at first I didn't believe that I would be able to chat and call a real doctor to examine me directly. When you call, you'll know it's correct. The doctor at tdoctor is very enthusiastic. Very convenient for online examination and further consultation.
                    </p>
                    <div class="qus_sts d-flex">
                        <p class="qus_view"><i class="bi bi-question-circle"></i> Reply: 200</p>
                        <p class="qus_view"><i class="bi bi-chat-dots"></i> Comment: 200</p>
                        <p class="qus_view"><i class="bi bi-eye"></i> Views: 200</p>
                        <p class="qus_view"><i class="bi bi-clock"></i> Date: 23/09/2023</p>
                    </div>
                </div>
            </div>
            <div id="mentor-qus" class="justify-content-center">
                <div id="user_qus" class="d-flex">
                    <div id="user" class="d-flex">
                        <img src="{{asset('img/detail_doctor/ellipse _14.png')}}">
                        <p>Trần Đình Phi</p>
                    </div>
                    <div id="tags">
                        <button>Kids</button>
                    </div>
                </div>
                <div class="qus flex-column">
                    <p>
                        I have cancer and have been examined at a provincial hospital, but need to consult a central doctor but haven't been able to go to the hospital yet. I saw a central doctor in the tdoctor system but at first I didn't believe that I would be able to chat and call a real doctor to examine me directly. When you call, you'll know it's correct. The doctor at tdoctor is very enthusiastic. Very convenient for online examination and further consultation.
                    </p>
                    <div class="qus_sts d-flex">
                        <p class="qus_view"><i class="bi bi-question-circle"></i> Reply: 200</p>
                        <p class="qus_view"><i class="bi bi-chat-dots"></i> Comment: 200</p>
                        <p class="qus_view"><i class="bi bi-eye"></i> Views: 200</p>
                        <p class="qus_view"><i class="bi bi-clock"></i> Date: 23/09/2023</p>
                    </div>
                </div>
            </div>
            <div id="mentor-qus" class="justify-content-center">
                <div id="user_qus" class="d-flex">
                    <div id="user" class="d-flex">
                        <img src="{{asset('img/detail_doctor/ellipse _14.png')}}">
                        <p>Trần Đình Phi</p>
                    </div>
                    <div id="tags">
                        <button>Pets</button>
                    </div>
                </div>
                <div class="qus flex-column">
                    <p>
                        I have cancer and have been examined at a provincial hospital, but need to consult a central doctor but haven't been able to go to the hospital yet. I saw a central doctor in the tdoctor system but at first I didn't believe that I would be able to chat and call a real doctor to examine me directly. When you call, you'll know it's correct. The doctor at tdoctor is very enthusiastic. Very convenient for online examination and further consultation.
                    </p>
                    <div class="qus_sts d-flex">
                        <p class="qus_view"><i class="bi bi-question-circle"></i> Reply: 200</p>
                        <p class="qus_view"><i class="bi bi-chat-dots"></i> Comment: 200</p>
                        <p class="qus_view"><i class="bi bi-eye"></i> Views: 200</p>
                        <p class="qus_view"><i class="bi bi-clock"></i> Date: 23/09/2023</p>
                    </div>
                </div>
            </div>
            <div id="mentor-qus" class="justify-content-center">
                <div id="user_qus" class="d-flex">
                    <div id="user" class="d-flex">
                        <img src="{{asset('img/detail_doctor/ellipse _14.png')}}">
                        <p>Trần Đình Phi</p>
                    </div>
                    <div id="tags">
                        <button>Other</button>
                    </div>
                </div>
                <div class="qus flex-column">
                    <p>
                        I have cancer and have been examined at a provincial hospital, but need to consult a central doctor but haven't been able to go to the hospital yet. I saw a central doctor in the tdoctor system but at first I didn't believe that I would be able to chat and call a real doctor to examine me directly. When you call, you'll know it's correct. The doctor at tdoctor is very enthusiastic. Very convenient for online examination and further consultation.
                    </p>
                    <div class="qus_sts d-flex">
                        <p class="qus_view"><i class="bi bi-question-circle"></i> Reply: 200</p>
                        <p class="qus_view"><i class="bi bi-chat-dots"></i> Comment: 200</p>
                        <p class="qus_view"><i class="bi bi-eye"></i> Views: 200</p>
                        <p class="qus_view"><i class="bi bi-clock"></i> Date: 23/09/2023</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
