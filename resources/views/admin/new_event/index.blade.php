@extends('layouts.admin')

@section('main-content')
    <style>

    </style>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Staff</h1>
    <a href="{{ route('api.new-event.create') }}" class="btn btn-primary mb-3">Add</a>
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
            <th scope="col">tiêu đề</th>
            <th scope="col">người tạo</th>
            <th scope="col">trạng thái</th>
            <th scope="col">thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listNewEvent as $index => $newEvent)
            <tr>
                <th scope="row">{{ ++$index }}</th>
                <td>{{ $newEvent->title }}</td>
                <td>{{ $newEvent->user_id }}</td>
                <td>{{ $newEvent->status }}</td>
                <td>
                    <a href="{{ route('api.new-event.edit', ['id' => $newEvent->id]) }}"
                       class="btn btn-primary">Edit</a>
                    <button type="button" class="btn btn-danger" onclick="deleteNewEvent({{ $newEvent->id }})">Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        const token = `{{ $_COOKIE['accessToken'] ?? ''}}`;

        function deleteNewEvent(id) {
            if (confirm('Bạn có chắc chắn muốn xóa không?')) {

                loadingMasterPage();
                let url = '{{ route('api.new-event.destroy', ['id' => ':id']) }}';
                url = url.replace(':id', id);

                const headers = {
                    'Authorization': `Bearer ${token}`
                };
                const formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');

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
                            window.location.href = `{{route('api.new-event.index')}}`;
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
