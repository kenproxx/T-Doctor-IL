<style>
    td {
        overflow: hidden;
        max-width: 300px;
        height: 80px;
    }
</style>
<div class="">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Thumbnail</th>
            <th scope="col">Gallery</th>
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
    var token = `{{ $_COOKIE['accessToken'] }}`;
    $(document).ready(function () {
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
                    renderProduct(response);
                },
                error: function (exception) {
                    console.log(exception)
                }
            });
        }
    });

    async function renderProduct(res, id) {
        let html = ``;

        for (let i = 0; i < res.length; i++) {
            let urlEdit = `{{route('product.edit', ['id' => ':id'])}}`;
            urlEdit = urlEdit.replace(':id', res[i].id);
            let item = res[i];
            let rowNumber = i + 1;

            let gallery = item.gallery;
            let arrayGallery = gallery.split(',')
            let img = ``;
            for (let j = 0; j < arrayGallery.length; j++) {
                img = img + `<img class="mr-2 w-auto h-100" src="${arrayGallery[j]}" alt="">`;
            }
            html = html + `<tr>
            <th scope="row">${rowNumber}</th>
            <td><img class="mr-2 w-auto h-100" src="${item.thumbnail}" alt=""></td>
            <td>${img}</td>
            <td>${item.name}</td>
            <td>${item.province_name}</td>
            <td>${item.price} ${item.price_unit}</td>
            <td><a href="${urlEdit}"> Edit</a> | <a href="#" onclick="checkDelete(${item.id})">Delete</a></td>
        </tr>`;
        }
        await $('#ProductsAdmin').empty().append(html);
    }

    async function deleteProduct(token, id) {
        let accessToken = `Bearer ` + token;
        let urlDelete = `{{route('api.backend.products.delete', ['id' => ':id'])}}`;
        urlDelete = urlDelete.replace(':id', id);
        await $.ajax({
            url: urlDelete,
            method: 'DELETE',
            headers: {
                "Authorization": accessToken
            },
            success: function (response) {
               // alert('Delete Success!');
               window.location.reload();
            },
            error: function (exception) {
                console.log(exception)
            }
        });
    }

    function checkDelete(value) {
        if (confirm("Press a button!") == true) {
            deleteProduct(token, value)
        }
    }

</script>
