<div class="">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Thumbnail</th>
            <th scope="col">Name</th>
            <th scope="col">Location</th>
            <th scope="col">Prise</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody id="ProductsAdmin">

        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        var token = `{{ $_COOKIE['accessToken'] }}`;
        callListProduct(token);
        console.log(token);

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
                console.log(item.id);
                let rowNumber = i + 1;
                html = html + `<tr>
            <th scope="row">${rowNumber}</th>
            <td>${item.thumbnail}</td>
            <td>${item.name}</td>
            <td>${item.province_id}</td>
            <td>${item.price} ${item.price_unit}</td>
            <td><a href="#">Edit</a> | <a href="{{route('product.delete'+ item.id)}}">Delete</a></td>
        </tr>`;
            }
            await $('#ProductsAdmin').empty().append(html);
        }
    });
</script>
