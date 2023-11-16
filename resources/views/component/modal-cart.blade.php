<style>
    .change-quantity {
        width: 100%;
        display: flex;
        align-items: center;
    }

    .value-button {
        display: inline-block;
        width: 40px;
        text-align: center;
        font-size: 24px;
    }

    .value-button:hover {
        cursor: pointer;
    }

    input.number {
        text-align: center;
        border: none;
        width: 40px;
        height: 40px;
        font-size: 18px;
        font-weight: 800;
    }

    input:focus-visible {
        border: none !important;
    }
</style>
<div class="modal modal-cart fade" id="modalCart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Carts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($carts as $cart)
                    @php
                        if ($cart->type_product == \App\Enums\TypeProductCart::MEDICINE){
                            $product = \App\Models\online_medicine\ProductMedicine::find($cart->product_id);
                        } else {
                            $product = \App\Models\ProductInfo::find($cart->product_id);
                        }
                    @endphp
                    <div class="product-cart row">
                        <div class="col-2 img">
                            <img src="{{asset($product->thumbnail)}}" alt="">
                        </div>
                        <div class="col-8 title">
                            <div class="title-name">
                                {{ $product->name }}
                            </div>
                            <div class="price">
                                {{ $product->price }}  {{ $product->unit_price }}
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="change-quantity">
                                <div class="value-button btnChangeQty" data-type="decrease" data-id="{{ $cart->id }}"
                                     id="decrease">-
                                </div>
                                <input id="number_{{$cart->id}}" class="number mr-2 ml-2" value="{{ $cart->quantity }}"
                                       min="1"/>
                                <div class="value-button btnChangeQty" data-type="increase" data-id="{{ $cart->id }}"
                                     id="increase">+
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn cancel" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn pay">Pay</button>
            </div>
        </div>
    </div>
</div>
@if(Auth::check())
    <input type="text" id="accessToken" class="d-none" value="{{ $_COOKIE['accessToken'] }}">
@endif
<script>
    $(document).ready(function () {
        $('.btnChangeQty').on('click', function () {
            let id = $(this).data('id');
            let type = $(this).data('type');
            changeQuantity(id, type);
        })
    })

    async function changeQuantity(id, type) {
        let token = document.getElementById('accessToken').value;

        const headers = {
            'Authorization': `Bearer ${token}`
        };

        let quantity = document.getElementById('number_' + id).value;
        if (type == 'decrease') {
            quantity--;
        } else {
            quantity++;
        }

        let route = `{{route('api.backend.cart.change.quantity', ['id' => ':id'])}}`;
        route = route.replace(':id', id);

        let data = {
            quantity: quantity
        }

        try {
            $.ajax({
                url: route,
                method: 'POST',
                headers: headers,
                data: data,
                success: function (response) {
                    console.log(response)
                },
                error: function (exception) {
                    console.log(exception)
                }
            });
        } catch (error) {
            throw error;
        }
    }
</script>
