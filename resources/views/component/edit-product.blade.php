<div class="page row" id="showMyProduct">

</div>

<script>
    $(document).ready(function () {
        callListProduct(token);

        async function callListProduct(token) {
            let accessToken = `Bearer ` + token;
            let userId = `{{ Auth::check() ? Auth::user()->id : null }}`;
            let url = '{{ route('api.backend.products.user', ':userId') }}';
            url = url.replace(':userId', userId);
            $.ajax({
                url: url,
                method: 'GET',
                headers: {
                    "Authorization": accessToken
                },
                data: {
                    user_id: {{ Auth::check() ? Auth::user()->id : null }}
                },
                success: function (response) {
                    renderProductUser(response);
                },
                error: function (exception) {
                }
            });
        }

        async function renderProductUser(res) {
            let accessToken = `Bearer ` + token;
            let html = ``;
            for (let i = 0; i < res.length; i++) {
                let productId = res[i].id;
                $.ajax({
                    url: `{{ route('api.backend.products.detail', ['id' => ':id']) }}`.replace(':id', productId),
                    method: 'GET',
                    headers: {
                        "Authorization": accessToken
                    },
                    success: function (data) {
                        let url = `{{ route('flea.market.product.detail', ['id' => ':id']) }}`.replace(':id', data.product.id);
                        let urlEdit = `{{ route('flea.market.edit.product', ['id' => ':id']) }}`.replace(':id', data.product.id);
                        html += `
                        <div class="col-md-4 col-6 item">
                            <div class="product-item">
                                <div class="img-pro justify-content-center d-flex">
                                    <img src="${data.product.thumbnail}" alt="">
                                </div>
                                <div class="content-pro">
                                    <div class="">
                                        <div class="name-product" style="height: auto">
                                            <a href="${url}">${data.product.name}</a>
                                        </div>
                                        <div class="location-pro d-flex" style="color: #929292">
                                            Location: <p>${data.province.name}</p>
                                        </div>
                                        <div class="price-pro">
                                             ${data.product.price} ${data.product.price_unit}
                                        </div>
                                    </div>

                                    <div class="justify-content-between edit-button">
                                        <a onclick="deleteProduct(${data.product.id})" class="apply-bt apply-bt_delete w-45 align-items-center justify-content-center d-flex">{{ __('home.Delete') }}</a>
                                        <form action="${urlEdit}" class="w-45">
                                            <button type="submit" class="apply-bt apply-bt_edit w-100">{{ __('home.Edit') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                        $('#showMyProduct').empty().append(html);
                    },
                    error: function (exception) {
                    }
                });

            }
        }
    });

    function deleteProduct(product) {
        console.log(product)
        let urlDelete = `{{ route('api.backend.products.delete', ['id' => ':id']) }}`.replace(':id', product);
        $.ajax({
            url: urlDelete,
            method: 'DELETE',
            headers: {
                "Authorization": `Bearer ${token}`
            },
            success: function (response) {
                alert('Delete success')
                location.reload();
            },
            error: function (exception) {
            }
        });
    }
</script>
