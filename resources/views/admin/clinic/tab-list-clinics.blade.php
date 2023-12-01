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
            <th scope="col">status</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody id="ClinicsAdmin">
        </tbody>
    </table>
</div>
<script>
    const token = `{{ $_COOKIE['accessToken'] }}`;
    $(document).ready(() => {

        callListProduct(token, 'CLINICS');

        $('#type_medical').on('change', function () {
            const type = $(this).val();
            renderClinics(token, type);
        });

        async function callListProduct(token, type) {
            const accessToken = `Bearer ${token}`;
            let url;

            switch (type) {
                case "PHARMACIES":
                    url = `{{ route('api.backend.pharmacies.list') }}`;
                    console.log(url)
                    break;
                case "HOSPITALS":
                    url = `{{ route('api.backend.hospitals.list') }}`;
                    console.log(url)
                    break;
                default:
                    url = `{{ route('api.backend.clinics.list') }}`;
                    console.log(url)
                    break;
            }

            $('#listTextMedical').text(`List ${type}`);

            try {
                const response = await $.ajax({
                    url: url,
                    method: 'GET',
                    headers: {
                        Authorization: accessToken,
                    },
                });
                await renderClinics(response);
            } catch (exception) {
                console.log(exception);
            }
        }

        async function renderClinics(res) {
            console.log(res)
            let html = ``;

            for (let i = 0; i < res.length; i++) {
                let urlEdit = `{{route('clinics.edit', ['id' => ':id'])}}`;
                urlEdit = urlEdit.replace(':id', res[i].id);
                let item = res[i];
                let rowNumber = i + 1;

                let gallery = item.gallery;
                let arrayGallery = [];

                if (gallery) {
                    arrayGallery = gallery.split(',');
                }

                let img = ``;
                for (let j = 0; j < arrayGallery.length; j++) {
                    img = img + `<img class="mr-2 w-auto h-100" src="${arrayGallery[j]}" alt="">`;
                }


                html = html + `<tr>
            <th scope="row">${rowNumber}</th>
            <td>${img}</td>
            <td>${item.name}</td>
            <td>${item.address_detail}</td>
            <td>${item.open_date}</td>
            <td>${item.close_date}</td>
            <td>${item.status}</td>
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
    });

</script>
