@extends('layouts.admin')
@section('title', 'List Coupon')
@section('main-content')
    <link href="{{ asset('css/listcoupon.css') }}" rel="stylesheet">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('home.List Coupon') }}</h1>
    <a href="{{route('coupon.create.product')}}" class="btn btn-primary mb-3">{{ __('home.Add') }}</a>
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('home.Tiêu đề') }}</th>
                <th scope="col">{{ __('home.Lượng người đăng ký') }}</th>
                <th scope="col">{{ __('home.Thời hạn') }}</th>
                <th scope="col">{{ __('home.Trạng thái') }}</th>
                <th scope="col">{{ __('home.Thao tác') }}</th>
            </tr>
            </thead>
            <tbody id="ProductsAdmin">

            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            callListProduct(token);
            async function callListProduct(token) {
                let accessToken = `Bearer ` + token;
                await $.ajax({
                    url: `{{route('api.backend.coupons.list')}}`,
                    method: 'GET',
                    headers: {
                        "Authorization": accessToken
                    },
                    success: function (response) {
                        renderProduct(response);
                    },
                    error: function (exception) {
                        console.log(exception)
                    }
                });
            }
        });

        async function renderProduct(res, id) {
            let html = ``;

            for (let i = 0; i < res.length; i++) {
                let urlEdit = `{{route('coupon.edit', ['id' => ':id'])}}`;
                let urlView = `{{route('homeAdmin.list.apply.coupons', ['id' => ':id'])}}`;
                urlEdit = urlEdit.replace(':id', res[i].id);
                urlView = urlView.replace(':id', res[i].id);

                let item = res[i];

                html = html + `<tr>
            <th scope="row">${ i + 1 }</th>
            <td>${item.title}</td>
            <td>${item.registered} / ${item.max_register ?? 0}</td>
            <td>${item.startDate} - ${item.endDate}</td>
            <td>${item.status}</td>
            <td><a href="${urlView}"> {{ __('home.Xem đơn đăng ký') }} </a> | <a href="${urlEdit}"> {{ __('home.Edit') }}</a> | <a href="#" onclick="checkDelete(${item.id})">{{ __('home.Delete') }}</a></td>
        </tr>`;
            }
            await $('#ProductsAdmin').empty().append(html);
        }

        async function deleteCoupon(token, id) {
            let accessToken = `Bearer ` + token;
            let urlDelete = `{{route('api.backend.coupons.delete', ['id' => ':id'])}}`;
            urlDelete = urlDelete.replace(':id', id);
            await $.ajax({
                url: urlDelete,
                method: 'DELETE',
                headers: {
                    "Authorization": accessToken
                },
                success: function (response) {
                    alert('Delete Success!');
                    window.location.reload();
                },
                error: function (exception) {
                    console.log(exception)
                }
            });
        }

        function checkDelete(value) {
            if (confirm('Are you sure you want to delete?') == true) {
                deleteCoupon(token, value)
            }
        }

    </script>

@endsection
