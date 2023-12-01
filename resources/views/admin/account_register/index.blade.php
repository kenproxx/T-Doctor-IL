@php use App\Enums\online_medicine\ObjectOnlineMedicine; @endphp
@php use App\Enums\online_medicine\FilterOnlineMedicine;use App\Enums\UserStatus;use App\Models\User; @endphp
@extends('layouts.admin')

@section('main-content')
    <style>

    </style>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List account register</h1>
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Username</th>
            <th scope="col">email</th>
            <th scope="col">type</th>
            <th scope="col">member</th>
            <th scope="col">status</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $index => $user)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->type }}</td>
                <td>{{ User::getMemberNameByID($user->id) }}</td>
                <td>{{ $user->status }}</td>
                <td>
                    <a href="{{ url('/') . asset($user->business_license_img ?? $user->medical_license_img) }}"
                       class="btn btn-info" target="_blank">View License
                    </a>
                    <button onclick="updateUser('{{ $user->id }}', '{{ UserStatus::DELETED }}')"
                            class="btn btn-danger">Reject
                    </button>
                    <button onclick="updateUser('{{ $user->id }}', '{{ UserStatus::ACTIVE }}')"
                            class="btn btn-primary">Approve
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
        <div> {{$users->links()}}</div>
    </table>
    <div class="d-flex justify-content-center align-items-center">
        {{$users->links()}}
    </div>
    <script>
        const token = `{{ $_COOKIE['accessToken'] ?? ''}}`;

        function updateUser(id, value) {
            if (confirm('Bạn có chắc chắn muốn thay đổi không?')) {

                loadingMasterPage();
                let url = '{{ route('api.backend.account-register.update', ['id' => ':id']) }}';
                url = url.replace(':id', id);

                const headers = {
                    'Authorization': `Bearer ${token}`
                };
                const formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('status', value);

                try {
                    $.ajax({
                        url: url,
                        method: 'POST',
                        headers: headers,
                        contentType: false,
                        cache: false,
                        data: formData,
                        processData: false,
                        success: function (data) {
                            alert(data);
                            loadingMasterPage();
                            window.location.href = `{{route('api.backend.account-register.index')}}`;
                        },
                        error: function (exception) {
                            alert(exception.responseText);
                            loadingMasterPage();
                        }
                    });
                } catch (error) {
                    loadingMasterPage();
                }
            }
        }

    </script>

@endsection
