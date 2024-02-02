@extends('layouts.admin')
@section('title')
    List Products
@endsection
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
@section('main-content')
    <div class="">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"> List Products </h1>
        <div class="d-flex align-items-center justify-content-between">
            <div class="mb-3 col-md-3">
                <input class="form-control" id="inputSearchProduct" type="text" placeholder="Search.."/>
            </div>
        </div>
        <br>
        <table class="table" id="tableListProduct">
            <thead>
            <tr>
                <th scope="col">{{ __('home.STT') }}</th>
                <th scope="col">{{ __('home.Product name') }}</th>
                <th scope="col">{{ __('home.Price') }}</th>
                <th scope="col">{{ __('home.Quantity') }}</th>
                <th scope="col">{{ __('home.Status') }}</th>
                <th scope="col">{{ __('home.Action') }}</th>
            </tr>
            </thead>
            <tbody id="tbodyListProduct">
            @foreach($products as $product)
                <tr>
                    <td> {{ $loop->index + 1 }} </td>
                    <td> {{ $product->name }} </td>
                    <td> {{ $product->price }} </td>
                    <td> {{ $product->quantity }} </td>
                    <td>
                        <span id="product_status_{{ $product->id }}">
                            {{ $product->status }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="w-25 d-flex justify-content-center align-items-center">
                                <a href="{{ route('api.backend.product-medicine.edit', $product->id) }}" class="btn btn-success mr-3 ml-3">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                            <div class="w-50 d-flex justify-content-center align-items-center">
                                <label class="switch">
                                    <input type="checkbox" class="product_action"
                                           {{ $product->status == \App\Enums\online_medicine\OnlineMedicineStatus::PENDING ? '' : 'checked'}}
                                           data-product="{{$product->id}}">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        let accessToken = `Bearer ` + token;
        let headers = {
            'Authorization': accessToken
        };

        $(document).ready(function () {
            loadPaginate('tableListProduct', 20);
            searchMain('inputSearchProduct', 'tableListProduct');

            $('.product_action').click(function () {
                let product = $(this).data('product');
                changeStatus(product);
            });

            async function changeStatus(productID) {
                loadingMasterPage();
                let update_url = `{{ route('api.admin.products.medicine.change') }}`;

                let data = {
                    product_id: productID,
                    _token: '{{ csrf_token() }}'
                }

                try {
                    await $.ajax({
                        url: update_url,
                        method: 'POST',
                        headers: headers,
                        data: data,
                        success: function (response) {
                            loadingMasterPage();
                            processChangeStatus(response, productID);
                        },
                        error: function (xhr, status, exception) {
                            loadingMasterPage();
                            alert(xhr.responseJSON.message);
                        }
                    });
                } catch (e) {
                    console.log(e)
                    alert('Error, Please try again!');
                }
            }

            function processChangeStatus(product, productID) {
                let status_text = $('#product_status_' + productID);
                status_text.text(product.status);
            }
        })
    </script>
@endsection

