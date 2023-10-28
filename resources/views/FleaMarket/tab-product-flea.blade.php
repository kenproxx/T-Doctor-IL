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
        console.log(productId)
        let url = '{{ route('api.backend.wish.lists.update', ':productId') }}';
        url = url.replace(':productId', productId);
        let favorite = $(event.target).data('favorite');
        if (!favorite) {
            $(event.target).removeClass('bi-heart');
            $(event.target).addClass('bi-heart-fill');
            favorite = 1;
        } else {
            $(event.target).removeClass('bi-heart-fill');
            $(event.target).addClass('bi-heart');
            favorite = 0;
        }
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                {{--user_id: '{{ Auth::user()->id }}',--}}
                product_id: productId
            },
            headers: {
                "Authorization": `Bearer ${token}`
            },
            success: function (response) {
                $(event.target).removeClass('bi-heart');
                $(event.target).addClass('bi-heart-fill');
            },
            error: function (exception) {
            }
        });
    }


    // Hàm để lấy giá trị từ cookie
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
                        <a class="button-heart" data-product-id="${item.id}" data-favorite="0">
                            <i id="bi-heart" class="bi bi-heart" onclick="addProductToWishList()"></i>
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
