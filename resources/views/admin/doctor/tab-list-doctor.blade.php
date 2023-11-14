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
            <th scope="col">Chuyên Môn</th>
            <th scope="col">Năm kinh nghiệm</th>
            <th scope="col">Dịch vụ cung cấp</th>
            <th scope="col">Thời gian</th>
            <th scope="col">Những ngày làm việc</th>
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
                url: `{{route('api.backend.doctors.info.list')}}`,
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
            let urlEdit = `{{route('doctor.edit', ['id' => ':id'])}}`;
            urlEdit = urlEdit.replace(':id', res[i].id);
            let item = res[i];
            let rowNumber = i + 1;

            let thumbnail = item.thumbnail;
            let arrayGallery = thumbnail.split(',')
            let img = ``;
            for (let j = 0; j < arrayGallery.length; j++) {
                img = img + `<img class="mr-2 w-auto h-100" src="${arrayGallery[j]}" alt="">`;
            }
            html = html + `<tr>
            <th scope="row">${ i + 1 }</th>
            <td>${img}</td>
            <td>${item.specialty}</td>
            <td>${item.year_of_experience}</td>
            <td>${item.service} </td>
            <td>${item.time_working_1}</td>
            <td>${item.time_working_2}</td>
            <td><a href="${urlEdit}"> Edit</a> | <a href="#" onclick="checkDelete(${item.id})">Delete</a></td>
        </tr>`;
        }
        await $('#ProductsAdmin').empty().append(html);
    }

    async function deleteCoupon(token, id) {
        let accessToken = `Bearer ` + token;
        let urlDelete = `{{route('api.backend.doctors.info.delete', ['id' => ':id'])}}`;
        urlDelete = urlDelete.replace(':id', id);
        console.log(urlDelete)
        await $.ajax({
            url: urlDelete,
            method: 'DELETE',
            headers: {
                "Authorization": accessToken,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
            deleteCoupon(token, value)
        }
    }

</script>
