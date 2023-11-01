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
            <th scope="col">Gallery</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">open_date</th>
            <th scope="col">close_date</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody id="ClinicsAdmin">
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
                url: `{{route('api.backend.clinics.list')}}`,
                method: 'GET',
                headers: {
                    "Authorization": accessToken
                },
                success: function (response) {
                    renderClinics(response);
                },
                error: function (exception) {
                    console.log(exception)
                }
            });
        }
    });
    async function renderClinics(res, id) {
        let html = ``;

        for (let i = 0; i < res.length; i++) {
            let urlEdit = `{{route('clinics.edit', ['id' => ':id'])}}`;
            urlEdit = urlEdit.replace(':id', res[i].id);
            let item = res[i];

            let gallery = item.gallery;
            let arrayGallery = gallery.split(',')
            let img = ``;
            for (let j = 0; j < arrayGallery.length; j++) {
                img = img + `<img class="mr-2 w-auto h-100" src="${arrayGallery[j]}" alt="">`;
            }

            let rowNumber = i + 1;
            html = html + `<tr>
            <th scope="row">${rowNumber}</th>
            <td>${img}</td>
            <td>${item.name}</td>
            <td>${item.address_detail}</td>
            <td>${item.open_date}</td>
            <td>${item.close_date}</td>
            <td><a href="${urlEdit}"> Edit</a> | <a href="#" onclick="checkDelete(${item.id})">Delete</a></td>
        </tr>`;
        }
        await $('#ClinicsAdmin').empty().append(html);
    }

    async function deleteClinics(token, id) {
        let accessToken = `Bearer ` + token;
        let urlDelete = `{{route('api.backend.clinics.delete', ['id' => ':id'])}}`;
        urlDelete = urlDelete.replace(':id', id);
        await $.ajax({
            url: urlDelete,
            method: 'DELETE',
            headers: {
                "Authorization": accessToken
            },
            success: function (response) {
                alert('Delete Success!');
                window.location.reload();
            },
            error: function (exception) {
                console.log(exception)
            }
        });
    }

    function checkDelete(value) {
        if (confirm("Press a button!") == true) {
            deleteClinics(token, value)
        }
    }

</script>
