@extends('layouts.master')
@section('title', 'Booking Clinic')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
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
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="margin-left: 180px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                                    <img src="{{asset('img/doctor.png')}}" alt="img">
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
                                    {{--                                        <a class="border-button-address font-weight-800 fs-14 justify-content-center" href="{{route('clinic.booking.select.date',$id)}}">Please select a date and--}}
                                    {{--                                            time</a>--}}
                                    <button class="w-100 btn btn-secondary border-button-address font-weight-800 fs-14 justify-content-center" id="adsContinue">Please select a date and time</button>
                                </div>
                            </div>
                            <div class="border-bottom fs-16px mb-md-3">
                                <span>Main service</span>
                            </div>
                            @for($i=0; $i<4; $i++)
                                <div class="d-flex justify-content-between mt-md-2 border-booking-sv align-items-center">
                                    <div class="fs-14 font-weight-600">
                                        <span>Botox, filler consultation and reservation</span>
                                    </div>
                                    <div class="button-booking-sv">
                                        <button class="" id="adsContinue">Booking</button>

                                        {{--                                            <a href="{{route('clinic.booking.select.date',$id)}}">Booking</a>--}}
                                    </div>
                                </div>
                            @endfor
                            <div class="border-bottom mt-md-4 fs-16px mb-md-3">
                                <span>Information</span>
                            </div>
                            <div class="fs-14 font-weight-600">
                                    <span>
                                        {{$bookings->introduce}}
                                    </span>
                            </div>
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
                                            <a class= 'button form-submit button-Reset-booking w-100'>Reset</a>
                                        </div>
                                        <div class="">
                                            <button class="btn btn-secondary button form-submit w-100 button-apply-booking disabled" id="placementContinue">Apply</button>
                                            {{--                                                <a class='button form-submit w-100 button-apply-booking disabled'>Apply</a>--}}
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="tab-pane fade" id="schedulePanel" role="tabpanel">
                            <h4>Schedule</h4>
                            <div id="scheduleAccordion" class="mb-3" role="tablist" aria-multiselectable="true">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" data-parent="#scheduleAccordion"
                                               href="#scheduleAccordioncollapseOne" aria-expanded="true"
                                               aria-controls="collapseOne">
                                                Start and Stop Date
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="scheduleAccordioncollapseOne" class="collapse" role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="card-block">
                                            <div class="form-group row">
                                                <label for="example-date-input" class="col-2 col-form-label">Start
                                                    Date</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="date" value="2018-01-09"
                                                           id="start-date">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-date-input" class="col-2 col-form-label">Stop
                                                    Date</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="date" value="2018-01-09"
                                                           id="stop-date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse"
                                               data-parent="#scheduleAccordion" href="#scheduleAccordioncollapseTwo"
                                               aria-expanded="false" aria-controls="collapseTwo">
                                                Rules for Specific Days
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="scheduleAccordioncollapseTwo" class="collapse" role="tabpanel"
                                         aria-labelledby="headingTwo">
                                        <div class="card-block">
                                            <h6>Play on the following days (check all that apply)</h6>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="sunday">
                                                    Sunday
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="monday">
                                                    Monday
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="tuesday">
                                                    Tuesday
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="wednesday">
                                                    Wednesday
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="thursday">
                                                    Thursday
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="friday">
                                                    Friday
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="saturday">
                                                    Saturday
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingThree">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse"
                                               data-parent="#scheduleAccordion"
                                               href="#scheduleAccordioncollapseThree" aria-expanded="false"
                                               aria-controls="collapseThree">
                                                Rules for Specific Times
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="scheduleAccordioncollapseThree" class="collapse" role="tabpanel"
                                         aria-labelledby="headingThree">
                                        <div class="card-block">
                                            <h6>Play during the following timeframes (applies to each day)</h6>
                                            <div class="form-group row">
                                                <label for="example-time-input" class="col-2 col-form-label">Start
                                                    Time</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="time" value="13:45:00"
                                                           id="start-time">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-time-input" class="col-2 col-form-label">End
                                                    Time</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="time" value="13:45:00"
                                                           id="end-time">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-secondary" id="scheduleContinue">Continue</button>
                        </div>
                        <div class="tab-pane fade" id="reviewPanel" role="tabpanel">
                            <h4>Review</h4>
                            <button class="btn btn-primary btn-block" id="activate">Activate this Campaign!</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" hidden="">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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

            $('#activate').click(function (e) {
                e.preventDefault();
                var formData = {
                    campaign_name: $('#campaignName').val(),
                    start_date: $('#start-date').val(),
                    end_date: $('#end-date').val(),
                    days: {
                        sunday: $('#sunday').prop('checked'),
                        monday: $('#monday').prop('checked'),
                        tuesday: $('#tuesday').prop('checked'),
                        wednesday: $('#wednesday').prop('checked'),
                        thurday: $('#thursday').prop('checked'),
                        friday: $('#friday').prop('checked'),
                        saturday: $('#saturday').prop('checked'),
                    },
                    start_time: $('#start-time').val(),
                    end_time: $('#end-time').val()
                }
                alert(JSON.stringify(formData));
                location.reload();
            })
        })
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
                    //construct object
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
                const button = document.createElement('button');
                button.setAttribute('class', 'hollow button');
                button.setAttribute('href', 'javascript:void(0)');
                const time = (e < 10 ? '0' : '') + e + ':00';
                const txt = document.createTextNode(time);
                button.appendChild(txt);
                button.onclick = function (e) {
                    formSubmit.classList.remove('disabled');
                }
                if (!arr.filter(r => r == e).length) {
                    button.setAttribute('disabled', 'true');
                }
                div.appendChild(button);
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
                        });
                    }, 500);
                }
            }
        });
    </script>
@endsection
