@extends('layouts.master')
@section('title', 'Online Medicine')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="container">
        @include('What-free.header-wFree')
        <a href="#
{{--        {{route('clinic.booking',$id)}}--}}
        " id="modalToggle" data-toggle="modal" data-target="#modal">
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
        <!-- Large modal -->
        <div class="container mt-5">
            <button class="btn btn-success btn-block btn-lg" id="modalToggle">Launch the modal</button>
        </div>

        <div id="modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="col-md-3">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="wizard-title">Campaign Wizard</h5>
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
                                <h4>Information</h4>
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
                                <h4>Ads</h4>
                                <div class="form-group">
                                    <label for="exampleInputFile">Fullscreen Ad Image</label>
                                    <input type="file" class="form-control-file" id="exampleInputFile"
                                           aria-describedby="fileHelp">
                                    <small id="fileHelp" class="form-text text-muted">Select a file to use as the
                                        fullscreen ad image. Please ensure the size is at least 1080x1920 with a 9:16
                                        (portrait) aspect ratio.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Banner Ad Image</label>
                                    <input type="file" class="form-control-file" id="exampleInputFile"
                                           aria-describedby="fileHelp">
                                    <small id="fileHelp" class="form-text text-muted">Select a file to use as the banner
                                        ad image. Please ensure the size is exactly 1080x450 for proper
                                        rendering.</small>
                                </div>
                                <button class="btn btn-secondary" id="adsContinue">Continue</button>
                            </div>
                            <div class="tab-pane fade" id="placementPanel" role="tabpanel">
                                <h4>Placement</h4>
                                <div id="accordion" class="mb-3" role="tablist" aria-multiselectable="true">
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingOne">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                                   aria-expanded="true" aria-controls="collapseOne">
                                                    Entire Venue
                                                </a>
                                            </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse" role="tabpanel"
                                             aria-labelledby="headingOne">
                                            <div class="card-block">
                                                <div class="form-group">
                                                    <label for="venueSelect">Select a Venue</label>
                                                    <select class="form-control" id="venueSelect">
                                                        <option selected disabled>Choose a venue</option>
                                                        <option>Venue 1</option>
                                                        <option>Venue 2</option>
                                                        <option>Venue 3</option>
                                                        <option>Venue 4</option>
                                                        <option>Venue 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingTwo">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                                   href="#collapseTwo" aria-expanded="false"
                                                   aria-controls="collapseTwo">
                                                    Specific Kiosks
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" role="tabpanel"
                                             aria-labelledby="headingTwo">
                                            <div class="card-block">
                                                <div class="form-group">
                                                    <label for="kioskSelectVenue">First, choose a venue.</label>
                                                    <select class="form-control" id="kioskSelectVenue">
                                                        <option selected disabled>Choose a venue</option>
                                                        <option>Venue 1</option>
                                                        <option>Venue 2</option>
                                                        <option>Venue 3</option>
                                                        <option>Venue 4</option>
                                                        <option>Venue 5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleSelect2">Then select kiosks (you can select
                                                        multiple)</label>
                                                    <select multiple class="form-control" id="exampleSelect2">
                                                        <option>Kiosk 1</option>
                                                        <option>Kiosk 2</option>
                                                        <option>Kiosk 3</option>
                                                        <option>Kiosk 4</option>
                                                        <option>Kiosk 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingThree">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                                   href="#collapseThree" aria-expanded="false"
                                                   aria-controls="collapseThree">
                                                    Specific Screens
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" role="tabpanel"
                                             aria-labelledby="headingThree">
                                            <div class="card-block">
                                                <div class="form-group">
                                                    <label for="kioskSelectVenue">First, choose a venue.</label>
                                                    <select class="form-control" id="kioskSelectVenue">
                                                        <option selected disabled>Choose a venue</option>
                                                        <option>Venue 1</option>
                                                        <option>Venue 2</option>
                                                        <option>Venue 3</option>
                                                        <option>Venue 4</option>
                                                        <option>Venue 5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleSelect2">Then select screens (you can select
                                                        multiple)</label>
                                                    <select multiple class="form-control" id="exampleSelect2">
                                                        <option>Kiosk 1 - Screen 1</option>
                                                        <option>Kiosk 1 - Screen 2</option>
                                                        <option>Kiosk 2 - Screen 1</option>
                                                        <option>Kiosk 2 - Screen 2</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-secondary" id="placementContinue">Continue</button>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Save for later</button>
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
                $('#myTab a[href="#schedulePanel"]').tab('show');
            });

            $('#scheduleContinue').click(function (e) {
                e.preventDefault();
                $('.progress-bar').css('width', '100%');
                $('.progress-bar').html('Step 5 of 5');
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
            })
        })
    </script>
@endsection
