@extends('layouts.admin')
@section('title')
    Create Survey
@endsection
@section('main-content')
    <h3 class="text-center"> Create Survey </h3>
    <div class="container">
        <form>
            <div class="row">
                <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" class="form-control" id="question" maxlength="200" required>
                </div>
                <div class="form-group">
                    <label for="question_en">Question EN</label>
                    <input type="text" class="form-control" maxlength="200" id="question_en" required>
                </div>
                <div class="form-group">
                    <label for="question_laos">Question Laos</label>
                    <input type="text" class="form-control" maxlength="200" id="question_laos" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="description">{{ __('home.Description') }}</label>
                    <textarea class="form-control" id="description" placeholder="{{ __('home.Description') }}"
                              rows="3"></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label for="description_en">{{ __('home.Description English') }}</label>
                    <textarea class="form-control" id="description_en"
                              placeholder="{{ __('home.Description English') }}"
                              rows="3"></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label for="description_laos">{{ __('home.Description Laos') }}</label>
                    <textarea class="form-control" id="description_laos" placeholder="{{ __('home.Description Laos') }}"
                              rows="3"></textarea>
                </div>
            </div>
            <div class="text-danger">Lưu ý các câu trả lời được viết ngăn cách bởi dấu phẩy (,)</div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="answer">{{ __('home.Answer') }}</label>
                    <textarea class="form-control" id="answer" placeholder="{{ __('home.Description') }}"
                              rows="3"></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label for="answer_en">Answer En</label>
                    <textarea class="form-control" id="answer_en"
                              placeholder="{{ __('home.Description English') }}"
                              rows="3"></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label for="answer_laos">Answer Laos</label>
                    <textarea class="form-control" id="answer_laos" placeholder="{{ __('home.Description Laos') }}"
                              rows="3"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="thumbnail">{{ __('home.Thumbnail') }}</label>
                    <input type="file" class="form-control" id="thumbnail" accept="image/*">
                </div>
                <div class="form-group col-md-3">
                    <label for="department_id">{{ __('home.Department') }}</label>
                    <select id="department_id" name="department_id" class="form-select">
                        @foreach($departments as $category)
                            <option value="{{$category->id}}" data-limit="30"
                                    class="text-shortcut">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="type">{{ __('home.type') }}</label>
                    <select id="type" name="type" class="form-select">
                        @foreach($types as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="status">{{ __('home.type') }}</label>
                    <select id="status" name="status" class="form-select">
                        <option value="{{ \App\Enums\SurveyStatus::ACTIVE }}">{{ \App\Enums\SurveyStatus::ACTIVE }}</option>
                        <option value="{{ \App\Enums\SurveyStatus::INACTIVE }}">{{ \App\Enums\SurveyStatus::INACTIVE }}</option>
                    </select>
                </div>
            </div>
            <div class="text-center mt-3">
                <button type="button" class="btn btn-primary" id="btnCreate">{{ __('home.create') }}</button>
            </div>
        </form>
    </div>
    <script>
        let accessToken = `Bearer ` + token;
        let headers = {
            "Authorization": accessToken
        };

        $(document).ready(function () {
            $('#btnCreate').on('click', function () {
                createCategory();
            })

            async function createCategory() {
                let categoryUrl = `{{ route('api.medical.surveys.create')  }}`;

                const formData = new FormData();

                const fieldNames = [
                    "question", "question_en", "question_laos",
                    "department_id", "type", "status",
                ];

                let isValid = true;
                isValid = appendDataForm(fieldNames, formData, isValid);

                const fieldTextareaTiny = [
                    'description', 'description_en', 'description_laos',
                    'answer', 'answer_en', 'answer_laos',
                ];
                fieldTextareaTiny.forEach(fieldTextarea => {
                    const content = tinymce.get(fieldTextarea).getContent();
                    formData.append(fieldTextarea, content);
                });

                let file = $('#thumbnail')[0].files[0];
                formData.append("user_id", '{{ Auth::user()->id }}');
                formData.append("thumbnail", file);

                if (isValid) {
                    await $.ajax({
                        url: categoryUrl,
                        method: 'POST',
                        headers: headers,
                        contentType: false,
                        cache: false,
                        processData: false,
                        data: formData,
                        success: function (response) {
                            alert('Create success!');
                            window.location.href = `{{ route('view.admin.surveys.index') }}`;
                        },
                        error: function (error) {
                            console.log(error);
                            alert('Create error!');
                        }
                    });
                } else {
                    alert('Please check input require!')
                }
            }
        })
    </script>
@endsection
