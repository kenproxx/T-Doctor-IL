@extends('layouts.master')
@section('title', 'Booking Clinic')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')

    <style>
        .checkbox-button {
            display: inline-block;
            position: relative;
            padding-left: 30px;
            cursor: pointer;
        }

        .checkbox-button input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .checkbox-button label {
            display: flex;
            width: 74px;
            height: 32px;
            padding: 11px 50px;
            justify-content: center;
            align-items: center;
            gap: 10px;
            border-radius: 8px;
            position: relative;
            background-color: #3498db;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .checkbox-button input:checked + label {
            background-color: #2ecc71;
            color: #fff;
        }
    </style>

    <div class="container">
        @include('What-free.header-wFree')
        <a href="#" id="modalToggle" data-toggle="modal" data-target="#exampleModal">
            <img src="{{asset('img/icons_logo/maps.png')}}">
        </a>
        <div class="other-clinics">
            <div class="title">
                Other Clinics/Pharmacies
            </div>
            <div class="body row">
                @include('component.clinic')
            </div>
        </div>
        <div hidden="">
            <input id="room_id" name="room_id" value="{{ $bookings->id }}">
            <input id="user_id" name="user_id" value="{{ Auth::user()->id }}">
            <input id="check_in" name="check_in" value="">
            <input id="check_out" name="check_out" value="">
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="margin-left: 180px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist" hidden="">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#infoPanel" role="tab">Info</a>
                        <li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#ads" role="tab">Ads</a>
                        <li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#placementPanel" role="tab">Placement</a>
                        <li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#schedulePanel" role="tab">Schedule</a>
                        <li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#reviewPanel" role="tab">Review</a>
                        <li>
                    </ul>
                    <div class="tab-content mt-2">
                        <div class="tab-pane fade show active" id="infoPanel" role="tabpanel">
                            <div class="form-group">
                                <div>
                                    <img src="{{$bookings->gallery}}" alt="img">
                                </div>
                                <div class="d-flex justify-content-between mt-md-2">
                                    <div class="fs-18px">{{$bookings->name}}</div>
                                    <div class="button-follow fs-12p ">
                                        <a class="text-follow-12" href="">FOLLOW</a>
                                    </div>
                                </div>
                                <div class="d-flex mt-md-2">
                                    <div class="d-flex col-md-6 justify-content-center align-items-center">
                                        <a class="row p-2" href="">
                                            <div class="justify-content-center d-flex">
                                                <i class="border-button-address fa-solid fa-bullseye"></i>
                                            </div>
                                            <div class="d-flex justify-content-center">Start</div>
                                        </a>
                                    </div>
                                    <div class="d-flex col-md-6 justify-content-center align-items-center">
                                        <a class="row p-2" href="">
                                            <div class="justify-content-center d-flex">
                                                <i class="border-button-address fa-regular fa-circle-right"></i>
                                            </div>
                                            <div class="d-flex justify-content-center">Direction</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-md-3 mb-md-3">
                                {{--                                    <a class="border-button-address font-weight-800 fs-14 justify-content-center" href="{{route('clinic.booking.service',$id)}}">Booking</a>--}}
                                <button
                                    class="w-100 btn btn-secondary border-button-address font-weight-800 fs-14 justify-content-center"
                                    id="infoContinue">Booking
                                </button>
                            </div>
                            <div class="border-top">
                                <div class="mt-md-2"><i class="text-gray mr-md-2 fa-solid fa-location-dot"></i>
                                    <span class="fs-14 font-weight-600">{{$bookings->address_detail}}</span>
                                </div>
                                <div class="mt-md-2">
                                    <i class="text-gray mr-md-2 fa-regular fa-clock"></i>
                                    <span class="fs-14 font-weight-600">Open: {{ \Carbon\Carbon::parse($bookings->open_date)->format('H:i') }} - {{ \Carbon\Carbon::parse($bookings->close_date)->format('H:i') }}</span>
                                </div>
                                <div class="mt-md-2">
                                    <i class="text-gray mr-md-2 fa-solid fa-globe"></i>
                                    <span class="fs-14 font-weight-600"> {{$bookings->email}}</span>
                                </div>
                                <div class="mt-md-2">
                                    <i class="text-gray mr-md-2 fa-solid fa-phone-volume"></i> <span
                                        class="fs-14 font-weight-600">{{$bookings->phone}}</span>
                                </div>
                                <div class="mt-md-2 mb-md-2">
                                    <i class="text-gray mr-md-2 fa-solid fa-bookmark"></i> <span
                                        class="fs-14 font-weight-600"> {{$bookings->type}}</span>
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
                                                Lần đầu tiên sử dụng dịch vụ qua app nhưng chất lượng và dịch vụ tại
                                                salon quá tốt. Book giờ nào thì cứ đúng giờ đến k sợ phải chờ đợi
                                                như mọi chỗ khác. Hy vọng thi thoảng app có nhiều ưu đãi để giới
                                                thiệu cho bạn bè cùng sử dụng :D
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
                                            Lần đầu tiên sử dụng dịch vụ qua app nhưng chất lượng và dịch vụ tại
                                            salon quá tốt. Book giờ nào thì cứ đúng giờ đến k sợ phải chờ đợi như
                                            mọi chỗ khác. Hy vọng thi thoảng app có nhiều ưu đãi để giới thiệu cho
                                            bạn bè cùng sử dụng :D
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="ads" role="tabpanel">
                            <form method="post" action="{{route('clinic.booking.store')}}">
                                @csrf
                                <div class="fs-18px justify-content-start d-flex mb-md-4 mt-2">
                                    <div class="align-items-center">
                                        <i class="fa-solid fa-chevron-left"></i>
                                    </div>
                                    <div class="ml-2">
                                        <span>{{$bookings->name}}</span>
                                    </div>
                                </div>
                                <div class="mb-md-4">
                                    <div class="border-bottom fs-16px">
                                        <span>Booking</span>
                                    </div>
                                    <div class="mt-md-3">


                                        <section>
                                            <div class=" d-block">
                                                <div class="small-12 ">
                                                    <div id="datepicker"></div>
                                                </div>
                                                <div class="small-12 ">
                                                    <div class="spin-me"></div>
                                                    <div class="master-container-slots">
                                                        <div class="morning-container fs-16px">
                                                            <p>AM</p>
                                                            <div class="flex-container-morning"></div>
                                                        </div>
                                                        <div class="afternoon-container fs-16px">
                                                            <p>PM</p>
                                                            <div class="flex-container-afternoon"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input hidden="" type="text" id="selectedTime" name="selectedTime"
                                                       readonly>
                                            </div>
                                        </section>

                                    </div>
                                </div>
                                <div class="border-bottom fs-16px mb-md-3">
                                    <span>Main service</span>
                                </div>
                                <div
                                    class="d-flex justify-content-between mt-md-2 border-booking-sv align-items-center">
                                    <div class="fs-14 font-weight-600">
                                        <span>Botox, filler consultation and reservation</span>
                                    </div>
                                    <div class="checkbox-button">
                                        <input type="checkbox" id="myCheckbox1" value="1" name="service[]">
                                        <label for="myCheckbox1">Booking</label>
                                    </div>
                                </div>
                                <div
                                    class="d-flex justify-content-between mt-md-2 border-booking-sv align-items-center">
                                    <div class="fs-14 font-weight-600">
                                        <span>Botox, filler consultation and reservation</span>
                                    </div>
                                    <div class="checkbox-button">
                                        <input type="checkbox" id="myCheckbox2" value="2" name="service[]">
                                        <label for="myCheckbox2">Booking</label>
                                    </div>
                                </div>
                                <div
                                    class="d-flex justify-content-between mt-md-2 border-booking-sv align-items-center">
                                    <div class="fs-14 font-weight-600">
                                        <span>Botox, filler consultation and reservation</span>
                                    </div>
                                    <div class="checkbox-button">
                                        <input type="checkbox" id="myCheckbox3" value="3" name="service[]">
                                        <label for="myCheckbox3">Booking</label>
                                    </div>
                                </div>
                                <div
                                    class="d-flex justify-content-between mt-md-2 border-booking-sv align-items-center">
                                    <div class="fs-14 font-weight-600">
                                        <span>Botox, filler consultation and reservation</span>
                                    </div>
                                    <div class="checkbox-button">
                                        <input type="checkbox" id="myCheckbox4" value="4" name="service[]">
                                        <label for="myCheckbox4">Booking</label>
                                    </div>
                                </div>
                                <div
                                    class="d-flex justify-content-between mt-md-2 border-booking-sv align-items-center">
                                    <div class="fs-14 font-weight-600">
                                        <span>Botox, filler consultation and reservation</span>
                                    </div>
                                    <div class="checkbox-button">
                                        <input type="checkbox" id="myCheckbox5" value="5" name="service[]">
                                        <label for="myCheckbox5">Booking</label>
                                    </div>
                                </div>
                                <div
                                    class="d-flex justify-content-between mt-md-2 border-booking-sv align-items-center">
                                    <div class="fs-14 font-weight-600">
                                        <span>Botox, filler consultation and reservation</span>
                                    </div>
                                    <div class="checkbox-button">
                                        <input type="checkbox" id="myCheckbox6" value="6" name="service[]">
                                        <label for="myCheckbox6">Booking</label>
                                    </div>
                                </div>
                                <div class="border-bottom mt-md-4 fs-16px mb-md-3">
                                    <span>Information</span>
                                </div>
                                <div class="fs-14 font-weight-600">
                                    <span>
                                        {{$bookings->introduce}}
                                    </span>
                                </div>
                                <div hidden="">
                                    <input id="clinic_id" name="clinic_id" value="{{ $bookings->id }}">
                                    <input id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                                </div>

                                <button class="btn btn-primary btn-block up-date-button" id="activate">Activate this
                                    Campaign!
                                </button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="placementPanel" role="tabpanel">
                            <section>
                                <div class=" d-block">
                                    <div class="small-12 ">
                                        <div id="datepicker"></div>
                                    </div>
                                    <div class="small-12 ">
                                        <div class="spin-me"></div>
                                        <div class="master-container-slots">
                                            <div class="morning-container fs-16px">
                                                <p>AM</p>
                                                <div class="flex-container-morning"></div>
                                            </div>
                                            <div class="afternoon-container fs-16px">
                                                <p>PM</p>
                                                <div class="flex-container-afternoon"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class=" medium-centered d-md-flex justify-content-between">
                                        <div class="">
                                            <a class='button form-submit button-Reset-booking w-100'>Reset</a>
                                        </div>
                                        <div class="">
                                            <button
                                                class="btn btn-secondary button form-submit w-100 button-apply-booking disabled"
                                                id="placementContinue">Apply
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="tab-pane fade" id="reviewPanel" role="tabpanel">
                            <h4>Review</h4>
                            <button class="btn btn-primary btn-block up-date-button" id="activate">Activate this
                                Campaign!
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer" hidden="">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('#modalToggle').click(function () {
                $('#modal').modal({
                    backdrop: 'static'
                });
            });

            $('#infoContinue').click(function (e) {
                e.preventDefault();
                $('.progress-bar').css('width', '40%');
                $('.progress-bar').html('Step 2 of 5');
                $('#myTab a[href="#ads"]').tab('show');
            });

            $('#adsContinue').click(function (e) {
                e.preventDefault();
                $('.progress-bar').css('width', '60%');
                $('.progress-bar').html('Step 3 of 5');
                $('#myTab a[href="#placementPanel"]').tab('show');
            });

            $('#placementContinue').click(function (e) {
                e.preventDefault();
                $('.progress-bar').css('width', '80%');
                $('.progress-bar').html('Step 4 of 5');
                $('#myTab a[href="#reviewPanel"]').tab('show');
            });
        });
    </script>
    <script>
        let cachedData = {};

        function serviceCallSlots(date) {
            const dt = new Date(date);
            let ms = dt.getTime();
            let startMs = ms - (60 * 60 * 24 * 1000 * 2);
            const dtArr = [1, 2, 3, 4, 5].map((e) => {
                const innerDt = new Date(startMs);
                startMs += 60 * 60 * 24 * 1000;
                return innerDt;
            });
            const timeArrs = [
                ['9', '10', '11', '12', '1', '2', '3', '4', '5'],
                ['9', '10', '11', '1', '2', '3', '4', '5'],
                ['9', '10', '11', '12', '3', '4', '5'],
                ['10', '11', '2', '4'],
                ['11', '12', '1', '4', '5']
            ];
            return new Promise((resolve, reject) => {
                setTimeout(() => {
                    const obj = dtArr.reduce((accum, e) => {
                        const randomNum = Math.floor(Math.random() * 5);
                        const dtString = e.toLocaleDateString();
                        let parts = dtString.split('/');
                        parts[0] = parts[0].length === 1 ? '0' + parts[0] : parts[0];
                        parts[1] = parts[1].length === 1 ? '0' + parts[1] : parts[1];
                        accum[parts.join('/')] = timeArrs[randomNum];
                        return accum;
                    }, {});
                    resolve(obj);
                }, 2000);
            })
        }

        function spinner(startOrStop) {
            const spin = document.querySelector('.spin-me');
            if (startOrStop === 'start') {
                const spinner = document.createElement('i');
                spinner.setAttribute('class', 'fas fa-spinner fa-4x fa-spin');
                spin.appendChild(spinner);
            } else {
                spin.innerHTML = '';
            }
        }

        function createSlotsDom(formSubmit, morning, afternoon, arr) {
            [9, 10, 11, 12, 1, 2, 3, 4, 5].map((e) => {
                const div = document.createElement('div');
                div.setAttribute('class', 'item');

                const anchor = document.createElement('a');
                anchor.setAttribute('class', 'hollow button');
                anchor.setAttribute('href', 'javascript:void(0)');

                const time = (e < 10 ? '0' : '') + e + ':00';
                const txt = document.createTextNode(time);
                anchor.appendChild(txt);

                anchor.onclick = function (event) {
                    const selectedTime = event.target.innerText;
                    let date = document.getElementById('check_in').value;
                    const selectedDateTime = date + ' ' + selectedTime;

                    document.getElementById('selectedTime').value = selectedDateTime;
                    console.log(selectedDateTime);

                    formSubmit.classList.remove('disabled');
                }

                if (!arr.filter(r => r == e).length) {
                    anchor.setAttribute('disabled', 'true');
                }

                div.appendChild(anchor);

                if (e >= 9 && e < 12) {
                    morning.appendChild(div);
                } else {
                    afternoon.appendChild(div);
                }
            });
        }


        $("#datepicker").datepicker({
            onSelect: function (date) {
                const container = document.querySelector('.master-container-slots');
                const morning = document.querySelector('.flex-container-morning');
                const afternoon = document.querySelector('.flex-container-afternoon');
                const formSubmit = document.querySelector('.button-apply-booking');
                const checkInInput = document.getElementById('check_in');

                formSubmit.classList.add('disabled');
                container.classList.add('hide');

                if (cachedData[date]) {
                    spinner('start');
                    setTimeout(() => {
                        morning.innerHTML = '';
                        afternoon.innerHTML = '';
                        createSlotsDom(formSubmit, morning, afternoon, cachedData[date]);
                        spinner('stop');
                        container.classList.remove('hide');
                        container.classList.add('fade-in');

                        // Cập nhật giá trị của ô input khi ngày được chọn
                        checkInInput.value = date;
                        console.log(checkInInput.value)
                    }, 500);
                } else {
                    spinner('start');
                    const prom = serviceCallSlots(date);
                    setTimeout(() => {
                        morning.innerHTML = '';
                        afternoon.innerHTML = '';
                        prom.then((payload) => {
                            Object.keys(payload).map((e) => {
                                const cachedKeys = Object.keys(cachedData);
                                if (!cachedKeys.includes(e)) {
                                    cachedData[e] = payload[e];
                                }
                            });
                            createSlotsDom(formSubmit, morning, afternoon, cachedData[date]);
                            spinner('stop');
                            container.classList.remove('hide');
                            container.classList.add('fade-in');

                            // Cập nhật giá trị của ô input khi ngày được chọn
                            checkInInput.value = date;
                        });
                    }, 500);
                }
                document.getElementById('check_in').value = date;
            }
        });
    </script>
@endsection
