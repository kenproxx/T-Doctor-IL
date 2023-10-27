<div class="body row" id="listClinic">

</div>



<script>
    $(document).ready(function () {
        var token = `{{ $_COOKIE['accessToken'] }}`;
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
                    // console.log(response)
                    renderClinics(response);
                },
                error: function (exception) {
                    console.log(exception)
                }
            });
        }

        async function renderClinics(res) {
            let html = ``;
            const baseUrl = '{{ route("clinic.detail", ["id" => ":id"]) }}';
            for (let i = 0; i < res.length; i++) {
                let item = res[i];
                let urlDetail = baseUrl.replace(':id', item.id);
                console.log(urlDetail)
                let gallery = item.gallery;
                let arrayGallery = gallery.split(',')

                let img = ``;
                for (let j = 0; j < arrayGallery.length; j++) {
                    img = img + `<img class="mr-2 w-auto h-100" src="${arrayGallery[j]}" alt="">`;
                }

                html = html + `<div class="col-md-4 mb-md-3">
    <div class="clinic-item">
        <a href="${urlDetail}">
          ${item.name}
        </a>
        <div class="time d-flex">
            <p>${item.open_date} - ${item.close_date} </p>
        </div>
        <div class="location">
            <i class="fa-solid fa-location-dot"></i> ${item.address} - <span>3 Km</span>
        </div>
        <div class="service">
            Service: Implant, Brightening, Crown(null)
        </div>
        <div class="star d-flex">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-half"></i>
            <i class="bi bi-star"></i>
        </div>
        <div class="img-detail row">
        <div class="col-3 img-item d-flex">
                ${img}
        </div>
                </div>
            </div>
        </div>`;
            }

            await $('#listClinic').empty().append(html);
        }
    });

</script>
