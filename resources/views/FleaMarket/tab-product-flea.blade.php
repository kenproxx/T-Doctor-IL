<style>
    .bi-heart-fill {
        color: red;
    }
</style>
<div class="page row" id="listProducts">

</div>
<div class="listProductWishlist">
@php
    $isFavorites =\App\Models\WishList::where('isFavorite','=', 1)->where('user_id', '=',6)->get()->toArray();
    foreach ($isFavorites as $isFavorite){
    $product = \App\Models\ProductInfo::where('id', '=', $isFavorite['product_id'])->get()->toArray();
    foreach ($product as $item){
    }
    }
@endphp
    @if(!$isFavorite['id']== $item['id'])
        <i id="icon-heart-{{$item['id']}}" class="bi bi-heart" data-product-id="{{$item['id']}}" onclick="addProductToWishList({{$item['id']}})"></i>
    @else
        <i id="icon-heart-{{$item['id']}}" class="bi bi-heart-fill" style="color: red;" data-product-id="{{$item['id']}}" onclick="addProductToWishList({{$item['id']}})"></i>
@endif

</div>
<script>
    var token = `${getCookie('accessToken')}`;
    function isLogin() {
        if (token == 'undefined') {
            $('#staticBackdrop').modal('show');
        }
    }

    function addProductToWishList(id) {
        isLogin();
        let productId = id;
        let userId = `{{ Auth::check() ? Auth::user()->id : null }}`;
        if (userId) {
            let url = '{{ route('api.backend.wish.lists.update', ':productId') }}';
            url = url.replace(':productId', productId);
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    user_id: userId,
                    product_id: productId
                },
                headers: {
                    "Authorization": `Bearer ${token}`
                },
                success: function (response) {
                    let item = $('#icon-heart-' + id);
                    if (response.isFavorite == true) {
                        item.removeClass('bi-heart');
                        item.addClass('bi-heart-fill');
                        alert('Add product to wish list success');
                    } else {
                        item.addClass('bi-heart');
                        item.removeClass('bi-heart-fill');
                        alert('Remove product from wish list success');
                    }
                },
                error: function (exception) {
                }
            });
        } else {
            $('#staticBackdrop').modal('show');
        }
    }
    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length === 2) return parts.pop().split(";").shift();
    }

    $(document).ready(function () {
        callListProduct(token);

        async function callListProduct(token) {
            let accessToken = `Bearer ` + token;
            await $.ajax({
                url: `{{route('backend.products.list')}}`,
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

        async function renderProduct(res) {
            let html = ``;
            for (let i = 0; i < res.length; i++) {
                let url = `{{ route('flea.market.product.detail', ['id' => ':id']) }}`;
                url = url.replace(':id', res[i].id);
                let item = res[i];
                let isFavorite = item.isFavorit ?  'bi-heart-fill' : 'bi-heart';
                html += `
            <div class="col-md-4 col-6 item">
                <div class="product-item">
                    <div class="img-pro">
                        <img src="${item.thumbnail}" alt="">
                        <a class="button-heart" data-favorite="0">

{{--                --}}
{{--                  <i id="bi-heart" class="bi bi-heart-fill" style="color: red;" data-product-id="${item.id}" onclick="addProductToWishList()"></i>  --}}

{{--                @else--}}
                <i id="icon-heart-${item.id}" class="${isFavorite} bi" data-product-id="${item.id}" onclick="addProductToWishList(${item.id})"></i>
{{--                    @endif--}}



    </a>
                    </div>
                    <div class="content-pro">
                        <div class="name-pro">
                            <a href="${url}">${item.name}</a>
                        </div>
                        <div class="location-pro d-flex">
                            Location: <p>${item.province_id}</p>
                        </div>
                        <div class="price-pro">
                            ${item.price} ${item.price_unit}
                        </div>
                    </div>
                </div>
            </div>
        `;}
            $('#listProducts').empty().append(html);
        }
    });
</script>
