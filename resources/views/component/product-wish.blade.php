<div class="page row" id="listWishList">
</div>
<script>
    function addProductToWishList() {
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
                    location.reload();
                    alert('remove product to wish list success')
                },
                error: function (exception) {
                }
            });
        }
    }
    var token = `{{ $_COOKIE['accessToken'] }}`;
    $(document).ready(function () {
        callListProduct(token);
        async function callListProduct(token) {
            let accessToken = `Bearer ` + token;
            $.ajax({
                url: `{{ route('api.backend.wish.lists.list') }}`,
                method: 'GET',
                headers: {
                    "Authorization": accessToken
                },
                data: {
                    user_id: {{ Auth::check() ? Auth::user()->id : null }}
                },
                success: function (response) {
                    renderWishList(response);
                },
                error: function (exception) {
                    console.log(exception);
                }
            });
        }
        async function renderWishList(res) {
            let accessToken = `Bearer ` + token;
            let html = ``;
            for (let i = 0; i < res.length; i++) {
                let productId = res[i].product_id;
                $.ajax({
                    url: `{{ route('api.backend.products.detail', ['id' => ':id']) }}`.replace(':id', productId),
                    method: 'GET',
                    headers: {
                        "Authorization": accessToken
                    },
                    success: function (product) {
                        let url = `{{ route('flea.market.product.detail', ['id' => ':id']) }}`.replace(':id', product.id);
                        html += `
                        <div class="col-md-4 col-6 item">
                            <div class="product-item">
                                <div class="img-pro">
                                    <img src="${product.thumbnail}" alt="">
                                    <a class="button-heart" data-favorite="0">
                                        <i id="bi-heart" class="bi bi-heart-fill" style="color: red;" data-product-id="${product.id}" onclick="addProductToWishList()"></i>
                                    </a>
                                </div>
                                <div class="content-pro">
                                    <div class="name-pro">
                                        <a href="${url}">${product.name}</a>
                                    </div>
                                    <div class="location-pro d-flex">
                                        Location: <p>${product.province_id}</p>
                                    </div>
                                    <div class="price-pro">
                                        ${product.price} ${product.price_unit}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                        $('#listWishList').empty().append(html);
                    },
                    error: function (exception) {
                        // console.log(exception);
                    }
                });

            }
        }
    });
</script>
