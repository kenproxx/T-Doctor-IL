@php use App\Enums\Role; @endphp
@extends('layouts.admin')
@section('title')
    {{ __('home.create') }}
@endsection
@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('home.create') }}</h1>
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div>
        <form>
            <div>
                <label for="username">{{ __('home.Username') }}</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div>
                <label for="member">{{ __('home.Member') }}</label>
                <select id="member" name="member" class="form-select form-control">
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
                <label for="email">{{ __('home.Email') }}</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div>
                <label for="phone">{{ __('home.PhoneNumber') }}</label>
                <input type="number" class="form-control" id="phone" name="phone">
            </div>
            <div>
                <label for="password">{{ __('home.Password') }}</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div>
                <label for="password_confirm">{{ __('home.Enter the Password') }}</label>
                <input type="password" class="form-control" id="password_confirm" name="password_confirm">
            </div>
        </form>
        <div hidden>
            <label for="manager_id"></label><input type="text" class="form-control" id="manager_id" name="manager_id"
                                                   value="{{Auth::user()->id}}">
        </div>
    </div>
    <button type="button" class="btn btn-primary up-date-button mt-md-4">{{ __('home.Save') }}</button>
    <script>
        $(document).ready(function () {
            $('.up-date-button').on('click', function () {
                const headers = {
                    'Authorization': `Bearer ${token}`
                };
                const formData = new FormData();

                const arrField = ['username', 'member', 'email', 'phone', 'password', 'password_confirm', 'manager_id'];

                let isValid = true
                /* Tạo fn appendDataForm ở admin blade*/
                isValid = appendDataForm(arrField, formData, isValid);


                formData.append('_token', '{{ csrf_token() }}');

                if (isValid){
                    try {
                        $.ajax({
                            url: `{{route('api.backend.staffs.store')}}`,
                            method: 'POST',
                            headers: headers,
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: formData,
                            success: function () {
                                alert('Create success!');
                                window.location.href = `{{route('homeAdmin.list.staff')}}`;
                            },
                            error: function (exception) {
                                alert(exception.responseText);
                            }
                        });
                    } catch (error) {
                        alert('Create error!');
                    }
                }
            })
        })
    </script>
@endsection
