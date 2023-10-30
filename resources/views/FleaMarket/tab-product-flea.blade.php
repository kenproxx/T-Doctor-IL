<style>
    .bi-heart-fill {
        color: red;
    }
</style>
<div class="page row" id="listProducts">

</div>


<script>
    var token = `${getCookie('accessToken')}`;
    function isLogin() {
        if (token == 'undefined') {
            $('#staticBackdrop').modal('show');
        }
    }

    function addProductToWishList() {
        isLogin();
        let productId = $(event.target).data('product-id');
        let userId = {{ Auth::check() ? Auth::user()->id : null }};
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
                    if (response.isFavorite == true) {
                        alert('Add product to wish list success');

                    } else {
                        alert('Remove product from wish list success');
                    }
                },
                error: function (exception) {
                }
            });
        } else {
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
                    if (response.isFavorite == true) {
                        alert('Add product to wish list success');

                    } else {
                        alert('Remove product from wish list success');
                    }
                },
                error: function (exception) {
                }
            });
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
                html += `
            <div class="col-md-4 col-6 item">
                <div class="product-item">
                    <div class="img-pro">
                        <img src="${item.thumbnail}" alt="">
                        <a class="button-heart" data-favorite="0">
{{--                    @php// $isFavorites =\App\Models\WishList::where('isFavorite','=', 1)->get()->toArray();--}}
{{--                    @endphp--}}
{{--                    @foreach($isFavorites as $isFavorite)--}}

{{--                    @endforeach--}}
{{--                    @if(!$isFavorites)--}}
                    <i id="bi-heart" class="bi bi-heart" data-product-id="${item.id}" onclick="addProductToWishList()"></i>
{{--                    @else--}}
{{--                    <i id="bi-heart" class="bi bi-heart-fill" style="color: red;" data-product-id="${item.id}" onclick="addProductToWishList()"></i>--}}
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
        `;
            }


            $('#listProducts').empty().append(html);
        }


    });
</script>
