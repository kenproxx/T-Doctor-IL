<div class="page row" id="listProducts">

</div>

<script>
    $(document).ready(function () {
        $('#button-heart').on('click', function () {
            $('#bi-heart').addClass('d-none')
            $('#bi-heart-fill').removeClass('d-none')
        })

        $('#button-heart-fill').on('click', function () {
            $('#bi-heart').removeClass('d-none')
            $('#bi-heart-fill').addClass('d-none')
        })

        var token = `{{ $_COOKIE['accessToken'] }}`;
        callListProduct(token);

        async function callListProduct(token) {
            let accessToken = `Bearer ` + token;
            await $.ajax({
                url: `{{route('api.backend.products.list')}}`,
                method: 'GET',
                headers: {
                    "Authorization": accessToken
                },
                success: function (response) {
                    console.log(response)
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
                let item = res[i];
                html = html + `<div class="col-md-4 col-6 item">
        <div class="product-item">
            <div class="img-pro">
                <img src="${item.thumbnail}" alt="">
                <button id="button-heart" type="#">
                    <i id="bi-heart" class="bi bi-heart"></i>
                </button>
                <button id="button-heart-fill">
                    <i id="bi-heart-fill" class="bi bi-heart-fill d-none"></i>
                </button>
            </div>
            <div class="content-pro">
                <div class="name-pro">
                    <a href="{{route('flea.market.product.detail')}}">${item.name}</a>
                </div>
                <div class="location-pro d-flex">
                    Location: <p>${item.province_id}</p>
                </div>
                <div class="price-pro">
                    ${item.price} ${item.price_unit}
                </div>
            </div>
        </div>
    </div>`;
            }

            await $('#listProducts').empty().append(html);
        }
    });
</script>
