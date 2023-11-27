@extends('layouts.master')
@section('title', 'Doctor Info')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .btn-send {
        background: #45C3D2 !important;
        color: #fff !important;
    }

    .btn-send:hover {
        background: rgba(69, 195, 210, 0.66) !important;
    }

    .fa-2xl {
        cursor: pointer;
    }

    .avt-user-review {
        border: 1px solid #ccc;
        border-radius: 50%;
        width: 80px;
    }

    .checked {
        color: #FFCF26;
    }
</style>
@section('content')
    @include('layouts.partials.header_3')
    @include('component.banner')
    @if($doctor)
        <div class="container">
            <div id="show_inf">
                <div id="title" class="d-flex justify-content-center">
                    <div class="d-flex list-title">
                        <div class="list--doctor p-0">
                            <a class="back" href="{{route('examination.index')}}"><p><i class="bi bi-arrow-left"></i>{{ __('home.Detailed information Doctor') }}</p></a>
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
                    ">{{ __("home.Doctor's QR Code") }}</p>
                            <p id="qrContent">
                                {!! $qrCodes !!}
                            </p>

                        </div>
                    </div>
                    <div id="about" style="width: 670px; height: 670px; margin-left: 15px">
                        <h5 style="font-size: 48px; font-weight: 800;">{{ $doctor->name }}</h5>
                        <div class="dess">
                            <p>{{ __('home.Hospital') }}: </p>
                            <span> {{ $doctor->hospital }} </span>
                        </div>
                        <div class="dess">
                            <p>{{ __('home.Specialty') }}:</p>
                            <span> {{ $doctor->specialty }}</span>
                        </div>
                        <div class="dess">
                            <p>{{ __('home.Experience') }}: </p>
                            <span> {{ $doctor->year_of_experience }} years</span>
                        </div>
                        <div class="dess">
                            <p>{{ __('home.Services') }}: </p>
                            <span> {!! $doctor->service !!}</span>
                        </div>
                        <div class="dess">
                            <p>{{ __('home.Working time') }}: </p>
                            <span> {{ $doctor->time_working_1 }} ({{ $doctor->time_working_2 }})</span>
                        </div>
                        <div class="dess">
                            <p>{{ __('home.Service prices') }}:</p>
                            <span>{{ $doctor->service_price }}</span>
                        </div>
                        <div class="dess">
                            <p>{{ __('home.Respond rate') }}: </p>
                            <span>{{ $doctor->response_rate }}%</span>
                        </div>
                        <div id="opt_btn" class="d-flex">
                            <button>{{ __('home.Chat') }}</button>
                            <button>{{ __('home.Videocall') }}</button>
                        </div>
                    </div>
                </div>
                <div id="review" class="d-flex justify-content-center">
                    <div class="d-flex list-title">
                        <div class="list--doctor p-0">
                            <p>{{ __('home.Review') }}</p>
                        </div>
                        <div class="ms-auto p-2">
                            <button class="btn btn-primary" type="button" onclick="showOrHidden(1);">Add Review</button>
                        </div>
                    </div>
                </div>
                <div class="add-review d-none" id="form_add_review">
                    <div class="row recruitment-details--content">
                        @csrf
                        @method('POST')
                        <div class="font-weight-600 fs-24px text-center row">
                            <span>{{ __('home.Are you satisfied with') }}
                                <strong>
                                    {{ $doctor->name}}
                                </strong>
                                {{ __('home.Services') }}?
                            </span>
                        </div>
                        <div class="mt-md-4 mb-md-5 d-flex justify-content-center">
                            <input class="d-none" id="input-star-edit" value="0">
                            <input type="radio" name="star_number" id="star-edit-1" value="1" hidden="">
                            <label for="star-edit-1" onclick="starCheckEdit(1)">
                                <i id="icon-star-edit-1" class="fa fa-star fa-2xl p-1"></i>
                            </label>
                            <input type="radio" name="star_number" id="star-edit-2" value="2" hidden="">
                            <label for="star-edit-2" onclick="starCheckEdit(2)">
                                <i id="icon-star-edit-2" class="fa fa-star fa-2xl p-1"></i></label>
                            <input type="radio" name="star_number" id="star-edit-3" value="3" hidden="">
                            <label for="star-edit-3" onclick="starCheckEdit(3)">
                                <i id="icon-star-edit-3" class="fa fa-star fa-2xl p-1"></i></label>
                            <input type="radio" name="star_number" id="star-edit-4" value="4" hidden="">
                            <label for="star-edit-4" onclick="starCheckEdit(4)">
                                <i id="icon-star-edit-4" class="fa fa-star fa-2xl p-1"></i></label>
                            <input type="radio" name="star_number" id="star-edit-5" value="5" hidden="" checked>
                            <label for="star-edit-5" onclick="starCheckEdit(5)">
                                <i id="icon-star-edit-5" class="fa fa-star fa-2xl p-1"></i>
                            </label>
                        </div>
                        <div>
                            <label for="review_title"><b>{{ __('home.Title') }}</b></label>
                            <input type="text" class="form-control" id="review_title">
                        </div>
                        <div>
                            <label for="review_content"><b>{{ __('home.Add detailed review') }}</b></label>
                            <textarea class="form-control" id="review_content" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="recruitment-details--btn col-md-6 justify-content-end d-flex">
                            <button type="button" onclick="showOrHidden(0);"
                                    class="btn btn-secondary btnHiddenForm col-md-6">
                                {{ __('home.CANCEL') }}
                            </button>
                        </div>
                        <div class="recruitment-details--btn col-md-6 justify-content-start d-flex">
                            <button class="btn col-md-6 btn-send" type="button" onclick="addReview(0);">
                                {{ __('home.Submit') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="rv_doc" id="list_review">

                </div>
            </div>
        </div>
        <script>
            let token = `{{ $_COOKIE['accessToken'] ?? '' }}`;
            let accessToken = `Bearer ` + token;

            async function addReview(child) {
                let url = `{{ route('api.backend.doctor.reviews.create') }}`;

                const userId = `{{ Auth::check() ? Auth::user()->id : '' }}`;

                let data;

                if (child == 0) {
                    const title = document.getElementById('review_title').value;
                    const description = document.getElementById('review_content').value;
                    const numberStar = document.getElementById('input-star-edit').value;

                    data = {
                        title: title,
                        title_en: title,
                        title_laos: title,

                        description: description,
                        description_en: description,
                        description_laos: description,

                        number_star: numberStar,

                        user_id: userId,
                        doctor_id: `{{ $doctor->id }}`,
                    };
                } else {
                    const title_child = document.getElementById('review_title_' + child).value;
                    const description_child = document.getElementById('review_content_' + child).value;

                    data = {
                        title: title_child,
                        title_en: title_child,
                        title_laos: title_child,

                        description: description_child,
                        description_en: description_child,
                        description_laos: description_child,

                        user_id: userId,
                        parent_id: child,
                    };
                }


                if (data.title && data.description) {
                    await fetch(url, {
                        method: 'POST',
                        headers: {
                            'content-type': 'application/json',
                            'Authorization': `Bearer ${token}`
                        },
                        body: JSON.stringify(data),

                    })
                        .then(response => {
                            if (response.status == 200) {
                                console.log(response);
                                alert('Create success!');
                                window.location.reload();
                            } else {
                                alert("Error! Please fill in the data completely...");
                            }
                        })
                        .catch(error => console.log(error));
                } else {
                    alert('Please enter input!')
                }
            }

            async function getAllReview() {
                let url = `{{ route('api.backend.doctor.reviews.doctor', $doctor->id) }}`;

                await fetch(url, {
                    method: 'GET',
                    headers: {
                        'Authorization': `Bearer ${token}`
                    },

                })
                    .then(response => {
                        if (response.status == 200) {
                            return response.json();
                        }
                    })
                    .then(response => {
                        console.log(response)
                        renderReview(response);
                    })
                    .catch(error => console.log(error));
            }

            getAllReview();

            function renderReview(response) {
                let html = ``;
                for (let i = 0; i < response.length; i++) {
                    let data = response[i];
                    let parent = data.parent;
                    let listChild = data.child;
                    let htmlChild = ``;
                    for (let j = 0; j < listChild.length; j++) {
                        let child = listChild[j];
                        htmlChild = htmlChild + `<div class="rv_ctn justify-content-center mt-5">
                                                        <div class="user_rv d-flex">
                                                    <div class="user d-flex">
                                                        <div class="">
                                                            <img src="${child.avt}" alt="" class="avt-user-review">
                                                        </div>
                                                        <div class="">
                                                            <p>${child.username}</p>
                                                        </div>

                                                    </div>
                                                    <div class="time">
                                                        <p>${child.created_at}</p>
                                                    </div>
                                                </div>
                                                <div class="cmt flex-column">
                                                    <p><b>${child.title}</b><br>
                                                       ${child.description}
                                                    </p>
                                                </div>
                                            </div>`;
                    }

                    let htmlReviewFormChild = `<div class="form-add-review-child d-none mb-2" id="form_add_review_child_${parent.id}">
                        <div>
                            <label for="review_title_${parent.id}"><b>{{ __('home.Title') }}</b></label>
                            <input type="text" class="form-control" id="review_title_${parent.id}">
                        </div>
                        <div>
                            <label for="review_content_${parent.id}"><b>{{ __('home.Add detailed review') }}</b></label>
                            <textarea class="form-control" id="review_content_${parent.id}" rows="6"></textarea>
                        </div>
                        <div class="row mt-2">
                            <div class="recruitment-details--btn col-md-6 justify-content-end d-flex">
                                <button type="button" onclick="showOrHiddenChild(0, '${parent.id}');"
                                        class="btn btn-secondary btnHiddenForm col-md-6">
                                    {{ __('home.CANCEL') }}
                                </button>
                            </div>
                            <div class="recruitment-details--btn col-md-6 justify-content-start d-flex">
                                <button class="btn col-md-6 btn-send" type="button" onclick="addReview('${parent.id}');">
                                    {{ __('home.Submit') }}
                                </button>
                            </div>
                        </div>
                    </div>`;

                    htmlChild = htmlChild + htmlReviewFormChild;

                    html = html + `<div class="rv_ctn justify-content-center">
                        <div class="user_rv d-flex">
                            <div class="user d-flex">
                                <div class="">
                                    <img src="${parent.avt}" alt="" class="avt-user-review">
                                </div>
                                <div class="">
                                    <p>${parent.username}</p>
                                </div>

                            </div>
                            <div class="time">
                                <p>${parent.created_at}</p>
                            </div>
                        </div>
                        <div class="cmt flex-column">
                            <p><b>${parent.title}</b><br>
                               ${parent.description}
                            </p>
                            <button onclick="showOrHiddenChild(1, '${parent.id}');" ><i class="bi bi-reply-fill"></i> Reply</button>
                        </div>
                        <div class="list-review-child ml-5 mt-5">
                            ${htmlChild}
                        </div>
                    </div>`;
                }


                document.getElementById('list_review').innerHTML = html;
            }

            function showOrHidden(data) {
                if (data == 0) {
                    document.getElementById('form_add_review').classList.add('d-none');
                    document.getElementById('list_review').classList.remove('d-none');
                } else {
                    document.getElementById('form_add_review').classList.remove('d-none');
                    document.getElementById('list_review').classList.add('d-none');
                }
            }

            function showOrHiddenChild(data, id) {
                if (data == 0) {
                    document.getElementById('form_add_review_child_' + id).classList.add('d-none');
                } else {
                    document.getElementById('form_add_review_child_' + id).classList.remove('d-none');
                }
            }

            function starCheckEdit(value) {
                console.log(value)
                let input = document.getElementById('input-star-edit');
                let star = document.getElementById('star-edit-' + value);
                let icon = document.getElementById('icon-star-edit-' + value);

                let isChecked = star.checked;

                star.checked = !isChecked;

                for (let i = 1; i <= 5; i++) {
                    let currentStar = document.getElementById('star-edit-' + i);
                    let currentIcon = document.getElementById('icon-star-edit-' + i);

                    if (i <= value) {
                        currentStar.checked = true;
                        currentIcon.classList.add("checked");
                    } else {
                        currentStar.checked = false;
                        currentIcon.classList.remove("checked");
                    }
                }

                input.value = star.checked ? value : value - 1;
            }
        </script>
    @endif
@endsection

