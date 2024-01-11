@extends('layouts.master')
@section('title', 'Booking Clinic')
@section('content')
    <link rel="stylesheet" href="{{asset('css/homeSpecialist.css')}}">
    <link href="{{ asset('css/detailclinics.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.1.0/foundation.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    @include('layouts.partials.header')
    <div class="container">
        <div class="detail-clinic-theo-chuyen-khoa-title border-bottom">
            <a href="{{route('home.specialist')}}">
                <div class="title-detail-clinic"><i class="fa-solid fa-arrow-left"></i> {{ __('home.Detail') }}</div>
            </a>
            <div class="specialList-clinics col-md-12 mt-5 mb-5">
                <div class="border-specialList">
                    <div class="content__item d-flex gap-3">
                        @php
                        $arrayGallery = explode(',', $clinicDetail->gallery);

                        @endphp
                        <div class="specialList-clinics--img">
                            <img class="content__item__image" src="{{$arrayGallery[0] ?? ''}}"
                                 alt=""/>
                        </div>
                        <div class="specialList-clinics--main">
                            <div class="title-specialList-clinics">
                                {{$clinicDetail->name}}
                            </div>
                            <div class="address-specialList-clinics d-flex">
                                <i class="fas fa-map-marker-alt"></i>
                                @php
                                    $array = explode(',', $clinicDetail->address);
                                    $addressP = \App\Models\Province::where('id', $array[1] ?? null)->first();
                                    $addressD = \App\Models\District::where('id', $array[2] ?? null)->first();
                                    $addressC = \App\Models\Commune::where('id', $array[3] ?? null)->first();
                                @endphp
                                <div class="ml-1">{{$clinicDetail->address_detail}}
                                    , {{$addressC->name ?? ''}} , {{$addressD->name ?? ''}}
                                    , {{$addressP->name ?? ''}}</div>
                            </div>
                            <div class="time-working">
                                <i class="fa-solid fa-clock"></i>
                                {{$clinicDetail->time_work}}
                                | {{ \Carbon\Carbon::parse($clinicDetail->open_date)->format('H:i') }}
                                - {{ \Carbon\Carbon::parse($clinicDetail->close_date)->format('H:i') }}
                            </div>
                            <div class="group-button d-flex mt-3">
                                <a href="" class="mr-2">
                                    <div class="button-follow-specialList">
                                        {{ __('home.Theo dõi') }}

                                    </div>
                                </a>
                                <a href="{{route('clinic.detail',$clinicDetail->id)}}" class="">
                                    <div class="button-direct-specialList">
                                        {{ __('home.Chỉ đường') }}
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{route('clinic.booking.store')}}" METHOD="post">
            <div>
                <div>Chọn thời gian</div>
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
            <div>
                @if(Auth::check())
                    <span>{{ __('home.select member family') }}</span>
                    <div>
                        Bản thân
                        <select class="form-control" name="member_family_id" id="member_family_id">
                            <option value="">{{ __('home.Bản thân') }}</option>
                            {{--                    @foreach($memberFamily as $member)--}}
                            {{--                        <option value="{{$member->id}}">{{$member->name}}</option>--}}
                            {{--                    @endforeach--}}
                        </select>
                    </div>
                @endif
            </div>
            <div>
                <div>Select service</div>
                <div>
                    @foreach($services as $service)
                        <div class="d-flex justify-content-between mt-md-2 border-booking-sv align-items-center">
                            <div class="fs-14 font-weight-600">
                                <span>{{$service->name}}</span>
                            </div>
                            <div class="checkbox-button">
                                <input type="checkbox" id="myCheckbox{{$service->id}}" value="{{$service->id}}"
                                       name="service[]">
                                <label class="d-flex" for="myCheckbox{{$service->id}}">{{ __('home.Booking') }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn mt-4 btn-primary btn-block up-date-button button-apply-booking"
                    id="activate">Apply
            </button>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            loadData();
        });

        function loadData() {
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
                            checkInInput.value = date;
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
                                checkInInput.value = date;
                            });
                        }, 500);
                    }
                    document.getElementById('check_in').value = date;
                }
            });
        }
    </script>
@endsection
