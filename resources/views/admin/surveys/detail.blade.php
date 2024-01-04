@extends('layouts.admin')
@section('title')
    Detail Survey
@endsection
@section('main-content')
    <h3 class="text-center">Detail Survey</h3>
    <div class="container">
        <div class="container">
            <form>
                <div class="row">
                    <div class="form-group">
                        <label for="question">Question</label>
                        <input type="text" class="form-control" id="question" maxlength="200" required
                               value="{{ $survey->question }}">
                    </div>
                    <div class="form-group">
                        <label for="question_en">Question EN</label>
                        <input type="text" class="form-control" maxlength="200" id="question_en" required
                               value="{{ $survey->question_en }}">
                    </div>
                    <div class="form-group">
                        <label for="question_laos">Question Laos</label>
                        <input type="text" class="form-control" maxlength="200" id="question_laos" required
                               value="{{ $survey->question_laos }}">
                    </div>
                </div>

                <div class="text-danger">Lưu ý các câu trả lời được viết ngăn cách bởi dấu phẩy (,)</div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="answer">{{ __('home.Answer') }}</label>
                        <textarea class="form-control" id="answer" placeholder="{{ __('home.Description') }}"
                                  rows="3">{{ $survey->answer }}</textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="answer_en">Answer En</label>
                        <textarea class="form-control" id="answer_en"
                                  placeholder="{{ __('home.Description English') }}"
                                  rows="3">{{ $survey->answer_en }}</textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="answer_laos">Answer Laos</label>
                        <textarea class="form-control" id="answer_laos" placeholder="{{ __('home.Description Laos') }}"
                                  rows="3">{{ $survey->answer_laos }}</textarea>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-3">
                        <label for="department_id">{{ __('home.Department') }}</label>
                        <select id="department_id" name="department_id" class="form-select">
                            @foreach($departments as $department)
                                <option value="{{$department->id}}" data-limit="300"
                                        {{ $department->id == $survey->department_id ? 'selected' : '' }}
                                        class="text-shortcut">
                                    {{$department->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="type">{{ __('home.type') }}</label>
                        <select id="type" name="type" class="form-select">
                            @foreach($types as $item)
                                <option
                                    {{ $item == $survey->type ? 'selected' : '' }}
                                    value="{{ $item }}">
                                    {{ $item }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <button type="button" class="btn btn-primary" id="btnSaveSurvey">{{ __('home.Save') }}</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let accessToken = `Bearer ` + token;
        let headers = {
            "Authorization": accessToken
        };

        $(document).ready(function () {
            $('#btnSaveSurvey').on('click', function () {
                updateSurvey();
            })

            async function updateSurvey() {
                let surveyUrl = `{{ route('view.admin.surveys.index') }}`;
                let surveyUpdateUrl = `{{ route('api.medical.surveys.update', $survey->id) }}`;

                const formData = new FormData();

                const fieldNames = [
                    "question", "question_en", "question_laos",
                    "department_id", "type", "status",
                ];

                let isValid = true;

                const fieldTextareaTiny = [
                    'description', 'description_en', 'description_laos',
                    'answer', 'answer_en', 'answer_laos',
                ];

                fieldTextareaTiny.forEach(fieldTextarea => {
                    const content = tinymce.get(fieldTextarea).getContent();
                    formData.append(fieldTextarea, content);
                });

                isValid = appendDataForm(fieldNames, formData, isValid);
                formData.append("user_id", '{{ $survey->user_id }}');
                formData.append("thumbnail", $('#thumbnail')[0].files[0]);

                if (isValid) {
                    try {
                        await $.ajax({
                            url: surveyUpdateUrl,
                            method: 'POST',
                            headers: headers,
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: formData,
                            success: function (response) {
                                alert('Update success!')
                                window.location.href = surveyUrl;
                            },
                            error: function (error) {
                                console.log(error);
                                alert('Update error!')
                            }
                        });
                    } catch (e) {
                        console.log(e)
                        alert('Error, Please try again!');
                    }
                } else {
                    alert('Please check input require!')
                }
            }
        })
    </script>
@endsection
