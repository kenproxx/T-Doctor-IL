<div class="page row" id="listProducts">

</div>


<script>
    $(document).ready(function () {
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
                let url = `{{route('flea.market.product.detail', ['id' => ':id'])}}`;
                url = url.replace(':id', res[i].id);
                let item = res[i];
                html = html + `<div class="col-md-4 col-6 item">
        <div class="product-item">
            <div class="img-pro">
                <img src="${item.thumbnail}" alt="">
                <a class="button-heart" data-product-id="${item.id}" data-favorite="false">
                    <i id="bi-heart" class="bi bi-heart"></i>
                </a>
                <a class="button-heart-fill" data-product-id="${item.id}" data-favorite="true">
                    <i id="bi-heart-fill" class="bi bi-heart-fill d-none"></i>
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
    </div>`;
            }

            await $('#listProducts').empty().append(html);
        }
    });
    $(document).ready(function () {
        $('.button-heart').on('click', function () {
            const $button = $(this);
            const productId = $button.data('product-id');

            // Đặt trạng thái yêu thích thành true
            $button.data('favorite', true);

            // Ẩn biểu tượng trái tim và hiển thị biểu tượng trái tim đầy
            $button.find('.bi-heart').addClass('d-none');
            $button.siblings('.button-heart-fill').find('.bi-heart-fill').removeClass('d-none');

            // Thực hiện các thao tác khác (gửi AJAX request, lưu trạng thái, v.v.)
        });

        $('.button-heart-fill').on('click', function () {
            const $button = $(this);
            const productId = $button.data('product-id');

            // Đặt trạng thái yêu thích thành false
            $button.data('favorite', false);

            // Ẩn biểu tượng trái tim đầy và hiển thị biểu tượng trái tim
            $button.find('.bi-heart-fill').addClass('d-none');
            $button.siblings('.button-heart').find('.bi-heart').removeClass('d-none');

            // Thực hiện các thao tác khác (gửi AJAX request, lưu trạng thái, v.v.)
        });
    });

</script>
