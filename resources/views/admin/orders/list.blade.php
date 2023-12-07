@extends('layouts.admin')
@section('title')
    {{ __('home.List Order') }}
@endsection
@section('main-content')
    <h3 class="text-center">Order Management</h3>
    <table class="table table-striped" id="tableOrderManagement">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">FullName</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Total Product Price</th>
            <th scope="col">Total Shipping Price</th>
            <th scope="col">Total Discount Price</th>
            <th scope="col">Total Price</th>
            <th scope="col">Order Method</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody id="tbodyTableOrderManagement">

        </tbody>
    </table>

    <script>
        let token = `{{ $_COOKIE['accessToken'] }}`;
        let accessToken = `Bearer ` + token;
        let headers = {
            "Authorization": accessToken
        };

        $(document).ready(function () {
            async function loadOrders() {
                let orderUrl = `{{ route('medical.api.orders.list') }}`;
                orderUrl = orderUrl + `?user_id={{ Auth::user()->id }}`;

                await $.ajax({
                    url: orderUrl,
                    method: "GET",
                    headers: headers,
                    success: function (response) {
                        renderOrders(response);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }

            loadOrders();

            function renderOrders(response) {
                let html = ``;
                for (let i = 0; i < response.length; i++) {
                    let data = response[i];

                    let orderDetailUrl = `{{ route('view.admin.orders.detail', ['id'=> ':id']) }}`;
                    orderDetailUrl = orderDetailUrl.replace(':id', '');

                    html = html + `<tr>
                                        <th scope="row">${i + 1}</th>
                                        <td>${data.full_name}</td>
                                        <td>${data.email}</td>
                                        <td>${data.phone}</td>
                                        <td>${data.address}</td>
                                        <td>${data.total_price}</td>
                                        <td>${data.shipping_price}</td>
                                        <td>${data.discount_price}</td>
                                        <td>${data.total}</td>
                                        <td>${data.order_method}</td>
                                        <td>${data.status}</td>
                                        <td>
                                            <a href="${orderDetailUrl + data.id}" class="btn btn-success" >Detail</a>
                                            <button type="button" class="btn btn-danger" id="btnDelete" onclick="confirmDeleteOrder('${data.id}')">Delete</button>
                                        </td>
                                    </tr>`;
                }
                $('#tbodyTableOrderManagement').empty().append(html);
            }

        })

        function confirmDeleteOrder(id) {
            if (confirm('Are you sure you want to delete!')) {
                deleteOrder(id);
            }
        }

        async function deleteOrder(id) {
            let orderDeleteUrl = `{{ route('medical.api.orders.delete', ['id'=>':id']) }}`;
            orderDeleteUrl = orderDeleteUrl.replace(':id', id);

            await $.ajax({
                url: orderDeleteUrl,
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