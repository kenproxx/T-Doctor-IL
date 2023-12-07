@extends('layouts.admin')
@section('title')
    {{ __('home.Create Service Clinics') }}
@endsection
@section('main-content')
    <div class="container">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">  {{ __('home.Create Service Clinics') }}</h1>
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
                    <label for="name">{{ __('home.Name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="name_en">{{ __('home.name_en') }}</label>
                    <input type="text" class="form-control" id="name_en" name="name_en">
                </div>
                <div class="form-group col-md-4">
                    <label for="name_laos">{{ __('home.name_laos') }}</label>
                    <input type="text" class="form-control" id="name_laos" name="name_laos">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="status">{{ __('home.Status') }}</label>
                    <select id="status" class="form-control">
                        <option value="ACTIVE">{{ __('home.Active') }}</option>
                        <option value="INACTIVE">{{ __('home.Inactive') }}</option>
                    </select>
                </div>
            </div>
            <button type="button" onclick="createService();" class="btn btn-primary float-right">{{ __('home.Save') }}</button>
        </form>
    </div>
    <script>
        let token = `{{ $_COOKIE['accessToken'] ?? '' }}`;
        let accessToken = `Bearer ` + token;

        async function createService() {
            let url = `{{ route('api.admin.service.clinic.create') }}`;

            let data = {
                name: document.getElementById('name').value,
                name_en: document.getElementById('name_en').value,
                name_laos: document.getElementById('name_laos').value,
                user_id: `{{ Auth::check() ? Auth::user()->id : '' }}`,
                status: document.getElementById('status').value,
            };

            if (document.getElementById('name').value) {
                fetch(url, {
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
                            window.location.href = `{{ route('user.service.clinics.list') }}`;
                        } else {
                            alert("Error! Please fill in the data completely...");
                        }
                    })
                    .catch(error => console.log(error));
            } else {
                alert('Please enter input!')
            }
        }
    </script>
@endsection
