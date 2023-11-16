@php use App\Enums\TypeProductCart; @endphp
@php use App\Models\online_medicine\ProductMedicine; @endphp
@php use App\Models\ProductInfo;use Illuminate\Support\Facades\Auth; @endphp
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
                @if(Auth::check())
                    @foreach($carts as $cart)
                        @php
                            switch ($cart->type_product){
                                case TypeProductCart::MEDICINE:
                                    $product = ProductMedicine::find($cart->product_id);
                                    break;
                                case TypeProductCart::FLEA_MARKET:
                                    $product = ProductInfo::find($cart->product_id);
                                    break;
                            }
                        @endphp
                        <div class="product-cart row">
                            <div class="col-2 img">
                                <img src="{{asset($product->thumbnail)}}" alt="">
                            </div>
                            <div class="col-7 title">
                                <div class="title-name">
                                    {{ $product->name }}
                                </div>
                                <div class="price">
                                    {{ $product->price }}  {{ $product->unit_price }}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="change-quantity">
                                    <div class="value-button btnChangeQty" data-type="decrease"
                                         onclick="decreaseQuantity('{{ $cart->id }}')">-
                                    </div>
                                    <input id="number_quantity_{{$cart->id}}" type="number" class="number mr-2 ml-2"
                                           value="{{ $cart->quantity }}" min="0"/>
                                    <div class="value-button btnChangeQty" data-type="increase"
                                         onclick="increaseQuantity('{{ $cart->id }}')">+
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fa-solid fa-trash" onclick="deleteProductCart('{{ $cart->id }}')"></i>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn cancel" data-dismiss="modal">Cancel</button>
                <a href="{{ route('user.checkout.index') }}" class="btn pay">Pay</a>
            </div>
        </div>
    </div>
</div>
@if(Auth::check())
    <input type="text" id="accessToken" class="d-none" value="{{ $_COOKIE['accessToken' ?? ''] }}">
@endif
<script>

    function decreaseQuantity(cartId) {
        var inputElement = $('#number_quantity_' + cartId);
        var currentValue = parseInt(inputElement.val());

        if (currentValue > 1) {
            let newQuantity = currentValue - 1;
            inputElement.val(newQuantity);
            changeQuantity(cartId, newQuantity);
        }
    }

    function increaseQuantity(cartId) {
        var inputElement = $('#number_quantity_' + cartId);
        var currentValue = parseInt(inputElement.val());
        let newQuantity = currentValue + 1;

        inputElement.val(newQuantity);
        changeQuantity(cartId, newQuantity);
    }

    function deleteProductCart(id) {
        let ok = confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');
        if (!ok) {
            return;
        }
        loadingMasterPage();
        const token = `{{ $_COOKIE['accessToken'] ?? '' }}`;
        const headers = {
            'Authorization': `Bearer ${token}`
        };
        const formData = new FormData();

        formData.append('_token', '{{ csrf_token() }}');

        let url = `{{route('api.backend.cart.delete', ['id' => ':id'])}}`;
        url = url.replace(':id', id);

        try {
            $.ajax({
                url: url,
                method: 'DELETE',
                headers: headers,
                contentType: false,
                cache: false,
                processData: false,
                data: formData,
                success: function (data) {
                    loadingMasterPage();
                    //reload
                    window.location.reload();
                },
                error: function (exception) {
                    loadingMasterPage();
                }
            });
        } catch (error) {
            loadingMasterPage();
            throw error;
        }
    }

    async function changeQuantity(id, quantity) {
        let token = document.getElementById('accessToken').value;

        const headers = {
            'Authorization': `Bearer ${token}`
        };

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
            });
        } catch (error) {
            throw error;
        }
    }
</script>
