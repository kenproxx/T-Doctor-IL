@extends('layouts.admin')
@section('title')
    List Survey
@endsection
@section('main-content')
    <h3 class="text-center">List Survey</h3>
    <a href="{{ route('view.admin.category.create') }}" class="btn btn-primary mb-3">{{ __('home.create') }}</a>
    <table class="table table-striped" id="tableSurveyManagement">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('home.Title') }}</th>
            <th scope="col">{{ __('home.Description') }}</th>
            <th scope="col">{{ __('home.Parent') }}</th>
            <th scope="col">{{ __('home.Status') }}</th>
            <th scope="col">{{ __('home.Action') }}</th>
        </tr>
        </thead>
        <tbody id="tbodyTableSurveyManagement">

        </tbody>
    </table>

    <script>
        let accessToken = `Bearer ` + token;
        let headers = {
            "Authorization": accessToken
        };

        function confirmDeleteSurvey(id) {
            if (confirm('Are you sure you want to delete!')) {
                deleteSurvey(id);
            }
        }

        async function deleteSurvey(id) {
            let categoryDeleteUrl = `{{ route('api.business.categories.delete', ['id'=>':id']) }}`;
            categoryDeleteUrl = categoryDeleteUrl.replace(':id', id);

            await $.ajax({
                url: categoryDeleteUrl,
                method: "DELETE",
                headers: headers,
                success: function (response) {
                    alert('Delete success!');
                    window.location.reload();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection
