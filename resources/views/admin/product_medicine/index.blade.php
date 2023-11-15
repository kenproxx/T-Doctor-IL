@extends('layouts.admin')

@section('main-content')
    <style>

    </style>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List product medicine</h1>
    <a href="{{ route('api.backend.product-medicine.create') }}" class="btn btn-primary mb-3">Add</a>
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
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Ảnh thumb</th>
            <th scope="col">object_</th>
            <th scope="col">filter_</th>
            <th scope="col">category</th>
            <th scope="col">trạng thái</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productMedicines as $index => $productMedicine)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $productMedicine->name }}</td>
                <td><img src="{{ $productMedicine->thumb }}" alt="" width="100px"></td>
                <td>{{ $productMedicine->object_ }}</td>
                <td>{{ $productMedicine->filter_ }}</td>
                <td>{{ $productMedicine->category_id }}</td>
                <td>{{ $productMedicine->status }}</td>
                <td>
                    <a href="{{ route('api.backend.product-medicine.edit', ['id' => $productMedicine->id]) }}"
                       class="btn btn-primary">Edit</a>
                    <button onclick="deleteCategoryProduct({{ $productMedicine->id }})" class="btn btn-danger">Delete
                    </button>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <script>
        const token = `{{ $_COOKIE['accessToken'] ?? ''}}`;

        function deleteCategoryProduct(id) {
            if (confirm('Bạn có chắc chắn muốn xóa không?')) {

                loadingMasterPage();
                let url = '{{ route('api.backend.product-medicine.destroy', ['id' => ':id']) }}';
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
                            window.location.href = `{{route('api.backend.product-medicine.index')}}`;
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
