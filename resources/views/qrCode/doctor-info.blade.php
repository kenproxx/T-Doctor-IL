@extends('layouts.master')
@section('title', 'Doctor Info')
<style>
    #chat-message .form-outline .form-control ~ .form-notch div {
        pointer-events: none;
        border: 1px solid;
        border-color: #eee;
        box-sizing: border-box;
        background: transparent;
    }

    #chat-message .form-outline .form-control ~ .form-notch .form-notch-leading {
        left: 0;
        top: 0;
        height: 100%;
        border-right: none;
        border-radius: .65rem 0 0 .65rem;
    }

    #chat-message .form-outline .form-control ~ .form-notch .form-notch-middle {
        flex: 0 0 auto;
        max-width: calc(100% - 1rem);
        height: 100%;
        border-right: none;
        border-left: none;
    }

    #chat-message .form-outline .form-control ~ .form-notch .form-notch-trailing {
        flex-grow: 1;
        height: 100%;
        border-left: none;
        border-radius: 0 .65rem .65rem 0;
    }

    #chat-message .form-outline .form-control:focus ~ .form-notch .form-notch-leading {
        border-top: 0.125rem solid #39c0ed;
        border-bottom: 0.125rem solid #39c0ed;
        border-left: 0.125rem solid #39c0ed;
    }

    #chat-message .form-outline .form-control:focus ~ .form-notch .form-notch-leading,
    #chat-message .form-outline .form-control.active ~ .form-notch .form-notch-leading {
        border-right: none;
        transition: all 0.2s linear;
    }

    #chat-message .form-outline .form-control:focus ~ .form-notch .form-notch-middle {
        border-bottom: 0.125rem solid;
        border-color: #39c0ed;
    }

    #chat-message .form-outline .form-control:focus ~ .form-notch .form-notch-middle,
    #chat-message .form-outline .form-control.active ~ .form-notch .form-notch-middle {
        border-top: none;
        border-right: none;
        border-left: none;
        transition: all 0.2s linear;
    }

    #chat-message .form-outline .form-control:focus ~ .form-notch .form-notch-trailing {
        border-top: 0.125rem solid #39c0ed;
        border-bottom: 0.125rem solid #39c0ed;
        border-right: 0.125rem solid #39c0ed;
    }

    #chat-message .form-outline .form-control:focus ~ .form-notch .form-notch-trailing,
    #chat-message .form-outline .form-control.active ~ .form-notch .form-notch-trailing {
        border-left: none;
        transition: all 0.2s linear;
    }

    #chat-message .form-outline .form-control:focus ~ .form-label {
        color: #39c0ed;
    }

    #chat-message .form-outline .form-control ~ .form-label {
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
                                        @if($doctor->apply_for != 'none')
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
                                            <p class="text-danger">{{ __('home.The information is encrypted') }}</p>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <h3 class="text-center">{{ __('home.Chat History') }}</h3>
        @if(count($messageDoctor) > 0)
            <section style="background-color: #eee;" class="ml-3">
                <div class="container py-5">

                    <div class="row d-flex justify-content-center mr-4">
                        <div class="col-md-8 col-lg-6 col-xl-4">
                            <div class="card" style="border-radius: 15px;">
                                <div class="text-center">
                                    <h3 class="file-shared">{{ __('home.Shared files') }}</h3>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                    data-bs-target="#images" type="button" role="tab"
                                                    aria-controls="home"
                                                    aria-selected="true">{{ __('home.Images') }}
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                                    data-bs-target="#videos" type="button" role="tab"
                                                    aria-controls="profile" aria-selected="false">{{ __('home.Videos') }}
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                                    data-bs-target="#audios" type="button" role="tab"
                                                    aria-controls="contact" aria-selected="false">{{ __('home.Audios') }}
                                            </button>
                                        </li>
                                    </ul>
                                    @php
                                        $arrayImages = [];
                                        $arrayVideos = [];
                                        $arrayAudios = [];
                                    @endphp
                                    @foreach($messageDoctor as $message)
                                        @php
                                            if (isset($message->files)){
                                                if (str_contains($message->files, '.mp4') || str_contains($message->files, '.webm')){
                                                     $arrayVideos[] = $message->files;
                                                } elseif (str_contains($message->files, '.mp3')){
                                                     $arrayAudios[] = $message->files;
                                                } else{
                                                    $arrayImages[] = $message->files;
                                                }
                                            }
                                        @endphp
                                    @endforeach
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="images" role="tabpanel"
                                             aria-labelledby="home-tab">
                                            <div class="row" id="list-images">
                                                @foreach($arrayImages as $image)
                                                    <div class="col-md-3">
                                                        <img src="{{  asset($image) }}" alt="">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="videos" role="tabpanel"
                                             aria-labelledby="profile-tab">
                                            <div class="row" id="list-videos">
                                                @foreach($arrayVideos as $video)
                                                    <div class="col-md-3">
                                                        <video style="max-width: 150px" controls>
                                                            <source src="{{  asset($video) }}" type="video/*">
                                                        </video>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="audios" role="tabpanel"
                                             aria-labelledby="contact-tab">
                                            <div class="row" id="list-audios">
                                                @foreach($arrayAudios as $audio)
                                                    <div class="col-md-3">
                                                        <audio controls="controls" style="max-width: 150px">
                                                            <source src="{{  asset($audio) }}"
                                                                    type="audio/mpeg">
                                                        </audio>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4 col-lg-6 col-xl-8">

                            <div class="card" id="chat-message" style="border-radius: 15px;">
                                <div
                                    class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0"
                                    style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                                    <p class="mb-0 fw-bold">{{ $doctor->name }}</p>
                                </div>
                                <div class="card-body" style="overflow-y: scroll; max-height: 500px" id="message_area">
                                    @foreach($messageDoctor as $message)
                                        @if($message->from_user_id == Auth::user()->id)
                                            <div class="d-flex flex-row justify-content-end mb-4">
                                                <div class="p-3 me-3 border"
                                                     style="border-radius: 15px; background-color: #fbfbfb;">
                                                    <p class="small mb-0">{!! $message->chat_message !!}</p>
                                                    @if(isset($message->files))
                                                        @if(str_contains($message->files, '.mp4'))
                                                            <video src="{{  asset($message->files) }}" controls
                                                                   style="max-width: 300px">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        @elseif(str_contains($message->files, '.mp3'))
                                                            <audio controls="controls" style="max-width: 300px">
                                                                <source src="{{  asset($message->files) }}"
                                                                        type="audio/mpeg">
                                                            </audio>
                                                        @else
                                                            <img src="{{  asset($message->files) }}" alt=""
                                                                 style="max-width: 300px">
                                                        @endif
                                                    @endif
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
                                                    @if(isset($message->files))
                                                        @if(str_contains($message->files, '.mp4'))
                                                            <video src="{{  asset($message->files) }}" controls
                                                                   style="max-width: 300px">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        @elseif(str_contains($message->files, '.mp3'))
                                                            <audio controls="controls" style="max-width: 300px">
                                                                <source src="{{  asset($message->files) }}"
                                                                        type="audio/mpeg">
                                                            </audio>
                                                        @else
                                                            <img src="{{  asset($message->files) }}" alt=""
                                                                 style="max-width: 300px">
                                                        @endif
                                                    @endif
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
    <script>
        function scrollTo() {
            var elem = document.getElementById('message_area');
            elem.scrollTop = elem.scrollHeight;
        }

        scrollTo();
    </script>
@endsection
