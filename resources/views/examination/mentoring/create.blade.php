@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @include('layouts.partials.header_3')
    @include('component.banner')

    <style>
        .button_create_question {
            padding: 10px 110px;
            display: flex;
            align-items: center;
        }
    </style>
    <div class="container">
        <form>
            <div class="form-group">
                <label for="content-question">Content Question</label>
                <textarea type="text" class="form-control" id="content-question"
                          placeholder="Enter question here"></textarea>
            </div>
            <div class="form-group">
                <label for="category">Password</label>
                <select class="custom-select" id="category">
                    <option selected value="0">Choose...</option>
                    <option value="1">Heath</option>
                    <option value="2">Beauty</option>
                    <option value="3">Kids</option>
                    <option value="3">Pet</option>
                    <option value="3">Other</option>
                </select>
            </div>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-secondary mx-2 button_create_question" onclick="history.back()">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary mx-2 button_create_question" id="btn_submit" onclick="submitButton()">Submit</button>
            </div>
        </form>
    </div>

    <script>
        const token = `{{ $_COOKIE['accessToken'] }}`;
        function submitButton() {
            const message = document.getElementById('content-question').value;
            const headers = {
                'Authorization': `Bearer ${token}`
            };
            const formData = new FormData();
            formData.append("content", message);
            formData.append("content_en", message);
            formData.append("content_laos", message);
            formData.append("category_id", $('#category').val());
            formData.append("status", '{{ \App\Enums\QuestionStatus::APPROVED }}');
            formData.append("user_id", '{{ Auth::user()->id }}');


            try {
                $.ajax({
                    url: `{{route('api.backend.questions.create')}}`,
                    method: 'POST',
                    headers: headers,
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        alert('success');
                        window.location.reload();
                    },
                    error: function (exception) {
                    }
                });
            } catch (error) {
                throw error;
            }
        }
    </script>
@endsection
