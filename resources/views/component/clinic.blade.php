<div class="body row" id="listClinic">

</div>
<script>
    $(document).ready(function () {
        callListProduct();

        async function callListProduct() {
            await $.ajax({
                url: `{{route('clinics.restapi.list')}}`,
                method: 'GET',
                success: function (response) {
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
                let gallery = item.gallery;
                let arrayGallery = gallery.split(',')
                let img = ``;
                for (let j = 0; j < arrayGallery.length; j++) {
                    img = img + `<img class="mr-2 w-auto h-100 img-item1 " src="${arrayGallery[j]}" alt="">`;
                }
                let serviceHtml = ``;
                let service = item.services;
                for (let j = 0; j < service.length; j++) {
                    let serviceItem = service[j];
                    serviceHtml = serviceHtml + `<span>${serviceItem.name},</span>`;
                }
                html = html + `
                <div class="col-md-4 mb-md-3">
                    <div class="clinic-item">
                        <a class="text-overflow" href="${urlDetail}">
                          ${item.name}
                        </a>
                        <div class="time d-flex">
                            <p>${item.open_date} - ${item.close_date} </p>
                        </div>
                        <div class="location">
                            <div class="text-overflow d-flex"><i class="fa-solid fa-location-dot pr-2"></i>${item.addressInfo}</div> - <span>>=10Km</span>
                        </div>
                        <div class="service">
                            Service: ${serviceHtml}
                        </div>
                        <div class="star d-flex">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <i class="bi bi-star"></i>
                        </div>
                        <div class="img-detail row over-x-hidden">
                        <div class="col-3 img-item d-flex">
                                ${img}
                        </div>
                                </div>
                            </div>
                        </div>
                `;
            }
            await $('#listClinic').empty().append(html);
        }
    });
</script>


