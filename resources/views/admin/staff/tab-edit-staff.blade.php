@php use App\Enums\Role; @endphp
@php use App\Enums\UserStatus; @endphp
@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Create') }}</h1>
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form>
        <div>
            <label>Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ $user->username ?? '' }}">
        </div>
        <div>
            <label>Member</label>
            <select id="member" name="member" class="form-select form-control" value="{{ $user->member ?? '' }}">
                <option>Choose...</option>
                <option value="{{ Role::DOCTORS }}">{{ Role::DOCTORS }}</option>
                <option value="{{ Role::PHAMACISTS }}">{{ Role::PHAMACISTS }}</option>
                <option value="{{ Role::THERAPISTS }}">{{ Role::THERAPISTS }}</option>
                <option value="{{ Role::ESTHETICIANS }}">{{ Role::ESTHETICIANS }}</option>
                <option value="{{ Role::NURSES }}">{{ Role::NURSES }}</option>
                <option value="{{ Role::PAITENTS }}">{{ Role::PAITENTS }}</option>
                <option value="{{ Role::NORMAL_PEOPLE }}">{{ Role::NORMAL_PEOPLE }}</option>
            </select>
        </div>
        <div>
            <label>Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? '' }}">
        </div>
        <div>
            <label>Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div>
            <label>Enter the Password</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm">
        </div>
        <div>
            <label>Status</label>
            <select id="status" name="status" class="form-select form-control" value="{{ $user->status ?? '' }}">
                <option>Choose...</option>
                <option value="{{ UserStatus::ACTIVE }}">{{ UserStatus::ACTIVE }}</option>
                <option value="{{ UserStatus::DELETED }}">{{ UserStatus::DELETED }}</option>
            </select></div>

    </form>

    <button type="button" class="btn btn-primary up-date-button mt-md-4" onclick="updateUser()">Lưu</button>

    <script>
        const token = `{{ $_COOKIE['accessToken'] }}`;

        function updateUser() {
            const headers = {
                'Authorization': `Bearer ${token}`
            };
            const formDataEdit = new FormData();

            const arrField = ['username', 'member', 'email', 'password', 'password_confirm', 'status'];

            arrField.forEach(fieldName => {
                formDataEdit.append(fieldName, $(`#${fieldName}`).val());
            });

            formDataEdit.append('_token', '{{ csrf_token() }}');

            try {
                $.ajax({
                    url: `{{route('api.backend.staffs.update', $user->id)}}`,
                    method: 'POST',
                    headers: headers,
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: formDataEdit,
                    success: function (response) {
                        alert('success');
                        window.location.href = `{{route('homeAdmin.list.staff')}}`;
                    },
                    error: function (exception) {
                        alert(exception.responseText);
                    }
                });
            } catch (error) {
                throw error;
            }
        }
    </script>
@endsection
