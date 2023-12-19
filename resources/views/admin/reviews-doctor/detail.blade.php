@extends('layouts.admin')
@section('title')
    {{ __('home.Detail Review') }}
@endsection
@section('main-content')
    <h3 class="text-center">{{ __('home.Detail Review') }}</h3>
    <div class="container">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="title">Title</label>
                <input disabled type="text" class="form-control" id="title" value="{{ $review->title }}">
            </div>
            <div class="form-group col-md-4">
                <label for="title_en">Title English</label>
                <input disabled value="{{ $review->title_en }}" type="text" class="form-control" id="title_en">
            </div>
            <div class="form-group col-md-4">
                <label for="title_laos">Title Laos</label>
                <input disabled value="{{ $review->title_laos }}" type="text" class="form-control" id="title_laos">
            </div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input disabled value="{{ $review->description }}" type="text" class="form-control" id="description">
        </div>
        <div class="form-group">
            <label for="description_en">Description English</label>
            <input disabled value="{{ $review->description_en }}" type="text" class="form-control" id="description_en">
        </div>
        <div class="form-group">
            <label for="description_laos">Description Laos</label>
            <input disabled value="{{ $review->description_laos }}" type="text" class="form-control" id="description_laos">
        </div>
        <div class="row">
            @if($medical)
                <div class="form-group col-md-6">
                    <label for="medical">MedicalName</label>
                    <input disabled value="{{ $medical->name }}" type="text" class="form-control" id="medical">
                </div>
            @endif
            <div class="form-group col-md-2">
                <label for="star">Star</label>
                <input disabled value="{{ $review->number_star }}" type="text" class="form-control" id="star">
            </div>
            <div class="form-group col-md-4">
                <label for="status">Status</label>
                <select id="status" class="form-select">
                    @foreach($status as $item)
                        @if($item != 'DELETED')
                            <option
                                {{ $item == $review->status ? 'selected' : '' }} value="{{ $item }}">{{ $item }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="text-center mt-3 ">
            <button type="button" class="btn btn-primary" id="btnSaveReview">Save</button>
        </div>
    </div>

    <script>
        let accessToken = `Bearer ` + token;
        let headers = {
            "Authorization": accessToken
        };

        $(document).ready(function () {
            $('#btnSaveReview').on('click', function () {
                updateReview();
            })

            async function updateReview() {
                let reviewUrl = `{{ route('view.reviews.doctor.index') }}`;
                let reviewUpdateUrl = `{{ route('api.medical.reviews.doctors.change.status', $review->id) }}`;

                let data = {
                    'status': $('#status').val()
                };

                await $.ajax({
                    url: reviewUpdateUrl,
                    method: "PUT",
                    headers: headers,
                    data: data,
                    success: function (response) {
                        window.location.href = reviewUrl;
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }
        })
    </script>
@endsection
