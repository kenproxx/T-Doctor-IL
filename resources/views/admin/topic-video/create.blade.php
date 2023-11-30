@extends('layouts.admin')
@section('title')
    Create Service Clinics
@endsection
@section('main-content')
    <div class="container">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Create Service Clinics</h1>
        @if (session('success'))
            <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="name_en">Name EN</label>
                    <input type="text" class="form-control" id="name_en" name="name_en">
                </div>
                <div class="form-group col-md-4">
                    <label for="name_laos">Name Laos</label>
                    <input type="text" class="form-control" id="name_laos" name="name_laos">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" class="form-control" id="thumbnail" name="thumbnail" multiple accept="image/*">
                </div>
                <div class="form-group col-md-4">
                    <label for="status">Status</label>
                    <select id="status" class="form-control">
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="INACTIVE">INACTIVE</option>
                    </select>
                </div>
            </div>
            <button type="button" id="btnCreateTopic" class="btn btn-primary float-right">Save</button>
        </form>
    </div>
    <script>
        let token = `{{ $_COOKIE['accessToken'] ?? '' }}`;
        let accessToken = `Bearer ` + token;

        $(document).ready(function () {
            let formDataCreate = new FormData();

            $('#btnCreateTopic').on('click', function () {
                let url = `{{ route('api.admin.topic.videos.create') }}`;
                let headers = {
                    'Authorization': `Bearer ${token}`
                };

                formDataCreate.append('name', document.getElementById('name').value);
                formDataCreate.append('name_en', document.getElementById('name_en').value);
                formDataCreate.append('name_laos', document.getElementById('name_laos').value);
                formDataCreate.append('user_id', `{{ Auth::check() ? Auth::user()->id : '' }}`);
                formDataCreate.append('status', document.getElementById('status').value);
                let photo = $('#thumbnail')[0].files[0];
                formDataCreate.append('thumbnail', photo);

                if (document.getElementById('name').value) {
                    try {
                        $.ajax({
                            url: url,
                            method: 'POST',
                            headers: headers,
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: formDataCreate,
                            success: function () {
                                alert('success');
                                window.location.href = `{{route('user.topic.videos.list')}}`;
                            },
                            error: function (exception) {
                                alert('Create error!')
                                console.log(exception)
                            }
                        });
                    } catch (error) {
                        alert('Error, Please try again!')
                        throw error;
                    }
                } else {
                    alert('Please enter input!')
                }
            });

        })
    </script>
@endsection
