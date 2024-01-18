@extends('layouts.admin')
@section('title')
    {{ __('home.List Order') }}
@endsection
@section('main-content')
    <h3 class="text-center">{{ __('home.Order Management') }}</h3>
    <br>
    <div class="container">

    </div>

    <script>
        let accessToken = `Bearer ` + token;
        let headers = {
            "Authorization": accessToken
        };

        $(document).ready(function () {
            loadOrders();
        })

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

        async function renderOrders(response) {
            let html = ``;
            for (let i = 0; i < response.length; i++) {
                let data = response[i];

                let orderDetailUrl = `{{ route('view.admin.orders.detail', ['id'=> ':id']) }}`;
                orderDetailUrl = orderDetailUrl.replace(':id', '');

                html = html + ``;
            }
            $('#tbodyTableOrderManagement').empty().append(html);
        }

        function confirmCancelOrder(id) {
            if (confirm('Are you sure you want to cancel!')) {
                cancelOrder(id);
            }
        }

        async function cancelOrder(id) {
            let orderCancelUrl = ``;
            orderCancelUrl = orderCancelUrl.replace(':id', id);

            await $.ajax({
                url: orderCancelUrl,
                method: "DELETE",
                headers: headers,
                success: function (response) {
                    alert('Cancel success!');
                    window.location.reload();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection
