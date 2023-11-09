@extends('layouts.admin')

@section('main-content')
    <style>

    </style>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Staff</h1>
    <a href="{{ route('staff.create') }}" class="btn btn-primary mb-3">Add</a>
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
            <th scope="col">username</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">type</th>
            <th scope="col">status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->username }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->type }}</td>
                <td>{{ $user->status }}</td>
                <td><a href="{{ route('staff.edit', $user->id) }}"> Edit</a> | <a href="#"
                                                                                  onclick="deleteStaff('{{ $user->id }}')">Delete</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <script>
        const token = `{{ $_COOKIE['accessToken'] ?? ''}}`;

        function deleteStaff(id) {
            const headers = {
                'Authorization': `Bearer ${token}`
            };
            const formData = new FormData();

            formData.append('_token', '{{ csrf_token() }}');

            let url = `{{route('api.backend.staffs.delete', ['id' => ':id'])}}`;
            url = url.replace(':id', id);

            try {
                //call url with header and form data by ajax jquery
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: headers,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        alert('Delete success');
                        window.location.reload();
                    },
                    error: function (exception) {
                        alert(exception.responseText);
                    }
                });

            } catch (error) {
                console.error(error)
            }
        }
    </script>

@endsection
