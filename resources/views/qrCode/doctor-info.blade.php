@extends('layouts.master')
@section('title', 'Doctor Info')
<style>
    #chat1 .form-outline .form-control ~ .form-notch div {
        pointer-events: none;
        border: 1px solid;
        border-color: #eee;
        box-sizing: border-box;
        background: transparent;
    }

    #chat1 .form-outline .form-control ~ .form-notch .form-notch-leading {
        left: 0;
        top: 0;
        height: 100%;
        border-right: none;
        border-radius: .65rem 0 0 .65rem;
    }

    #chat1 .form-outline .form-control ~ .form-notch .form-notch-middle {
        flex: 0 0 auto;
        max-width: calc(100% - 1rem);
        height: 100%;
        border-right: none;
        border-left: none;
    }

    #chat1 .form-outline .form-control ~ .form-notch .form-notch-trailing {
        flex-grow: 1;
        height: 100%;
        border-left: none;
        border-radius: 0 .65rem .65rem 0;
    }

    #chat1 .form-outline .form-control:focus ~ .form-notch .form-notch-leading {
        border-top: 0.125rem solid #39c0ed;
        border-bottom: 0.125rem solid #39c0ed;
        border-left: 0.125rem solid #39c0ed;
    }

    #chat1 .form-outline .form-control:focus ~ .form-notch .form-notch-leading,
    #chat1 .form-outline .form-control.active ~ .form-notch .form-notch-leading {
        border-right: none;
        transition: all 0.2s linear;
    }

    #chat1 .form-outline .form-control:focus ~ .form-notch .form-notch-middle {
        border-bottom: 0.125rem solid;
        border-color: #39c0ed;
    }

    #chat1 .form-outline .form-control:focus ~ .form-notch .form-notch-middle,
    #chat1 .form-outline .form-control.active ~ .form-notch .form-notch-middle {
        border-top: none;
        border-right: none;
        border-left: none;
        transition: all 0.2s linear;
    }

    #chat1 .form-outline .form-control:focus ~ .form-notch .form-notch-trailing {
        border-top: 0.125rem solid #39c0ed;
        border-bottom: 0.125rem solid #39c0ed;
        border-right: 0.125rem solid #39c0ed;
    }

    #chat1 .form-outline .form-control:focus ~ .form-notch .form-notch-trailing,
    #chat1 .form-outline .form-control.active ~ .form-notch .form-notch-trailing {
        border-left: none;
        transition: all 0.2s linear;
    }

    #chat1 .form-outline .form-control:focus ~ .form-label {
        color: #39c0ed;
    }

    #chat1 .form-outline .form-control ~ .form-label {
        color: #bfbfbf;
    }
</style>
@section('content')
    @include('layouts.partials.header_3')
    <div class="container" style="margin-top: 100px">
        <h3 class="text-center">Doctor Information QrCode</h3>
        @if($doctor)
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-6">
                                <div class="white-box text-center"><img src="{{asset($doctor->thumbnail)}}" alt=""
                                                                        class="img-responsive"></div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-6">
                                <h3 class="box-title mt-5">{{ $doctor->name }}</h3>
                                <div class="table-responsive">
                                    <table class="table table-striped table-product">
                                        @if($doctor->apply_for == 'all')
                                            <tbody>
                                            <tr>
                                                <td width="390">Hospital:</td>
                                                <td>{{ $doctor->hospital }}</td>
                                            </tr>
                                            <tr>
                                                <td>Specialty:</td>
                                                <td>{{ $doctor->specialty }}</td>
                                            </tr>
                                            <tr>
                                                <td>Experience:</td>
                                                <td>{{ $doctor->year_of_experience }} years</td>
                                            </tr>
                                            <tr>
                                                <td>Services:</td>
                                                <td>{{ $doctor->service }}</td>
                                            </tr>
                                            <tr>
                                                <td>Working time:</td>
                                                <td>{{ $doctor->time_working_1 }} ({{ $doctor->time_working_2 }})</td>
                                            </tr>
                                            <tr>
                                                <td>Service prices:</td>
                                                <td>{{ $doctor->service_price }}</td>
                                            </tr>
                                            <tr>
                                                <td>Respond rate:</td>
                                                <td>{{ $doctor->response_rate }}%</td>
                                            </tr>
                                            </tbody>
                                        @elseif($doctor->apply_for != 'none')
                                            @php
                                                $listItem = $doctor->apply_for;
                                                $arrayItem = explode(',', $listItem);
                                            @endphp
                                            <tbody>
                                                @foreach($arrayItem as $item)
                                                    @php
                                                        $item = str_replace(' ', '', $item);
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $item }}:</td>
                                                        <td>{{ $doctor[$item] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        @else
                                            <p class="text-danger">The information is encrypted</p>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <h3 class="text-center">Chat History</h3>
        @if(count($messageDoctor) > 0)
            <section style="background-color: #eee;" class="ml-3">
                <div class="container py-5">

                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-4">

                            <div class="card" id="chat1" style="border-radius: 15px;">
                                <div
                                    class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0"
                                    style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                                    <p class="mb-0 fw-bold">{{ $doctor->name }}</p>
                                </div>
                                <div class="card-body" style="overflow-y: scroll; max-height: 500px">
                                    @foreach($messageDoctor as $message)
                                        @if($message->from_user_id == Auth::user()->id)
                                            <div class="d-flex flex-row justify-content-end mb-4">
                                                <div class="p-3 me-3 border"
                                                     style="border-radius: 15px; background-color: #fbfbfb;">
                                                    <p class="small mb-0">{!! $message->chat_message !!}</p>
                                                </div>
                                                <img src="{{ Auth::user()->avt }}"
                                                     alt="avatar 1" style="width: 45px; height: 100%;">
                                            </div>
                                        @else
                                            <div class="d-flex flex-row justify-content-start mb-4">
                                                <img src="{{ $doctor->thumbnail }}"
                                                     alt="avatar 1" style="width: 45px; height: 100%;">
                                                <div class="p-3 ms-3"
                                                     style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                                                    <p class="small mb-0">{!! $message->chat_message !!}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </section>
        @endif
    </div>
@endsection
