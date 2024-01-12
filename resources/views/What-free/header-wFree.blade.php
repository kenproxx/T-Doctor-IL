<link rel="stylesheet" href="{{asset('css/clinics-style.css')}}">
<div class="background-image_Clinics">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center mb-150">
            <div class="title-list-clinic">Y tế gần bạn</div>
        </div>
        <div class="border-search-clinics">
            <div class="col-md-12 p-0">
                <label for="search_input_clinics" class="label-input-clinic">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M14.8571 7.42857C14.8571 3.32588 11.5313 0 7.42857 0C3.32588 0 0 3.32588 0 7.42857C0 11.5313 3.32588 14.8571 7.42857 14.8571C9.26857 14.8571 10.96 14.1829 12.2629 13.0743L12.5714 13.3829V14.2857L18.2857 20L20 18.2857L14.2857 12.5714H13.3829L13.0743 12.2629C14.1829 10.96 14.8571 9.26857 14.8571 7.42857ZM2.28571 7.42857C2.28571 4.57143 4.57143 2.28571 7.42857 2.28571C10.2857 2.28571 12.5714 4.57143 12.5714 7.42857C12.5714 10.2857 10.2857 12.5714 7.42857 12.5714C4.57143 12.5714 2.28571 10.2857 2.28571 7.42857Z"
                              fill="black"/>
                    </svg>
                </label>
                <input class="m-0 form-select" type="search" name="focus" onkeypress="processSearchClinics();"
                       placeholder="{{ __('home.Search for anything…') }}"
                       id="search_input_clinics" value="">
            </div>
            <div class="col-md-12 p-0 d-flex">
                <div class="col-md-5 pl-0">
                    <select class="form-select_clinics" aria-label="Default select example" id="clinic_specialist">
                        <option selected>Select specialist</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <select class="form-select_clinics" aria-label="Default select example" id="clinic_location">
                        <option selected>Select location</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex justify-content-between pr-0">
                    <a href="">
                        <div class="reset-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path
                                    d="M2 14C2 14 2.12132 14.8492 5.63604 18.364C9.15076 21.8787 14.8492 21.8787 18.364 18.364C19.6092 17.1187 20.4133 15.5993 20.7762 14M2 14V20M2 14H8M22 10C22 10 21.8787 9.15076 18.364 5.63604C14.8492 2.12132 9.15076 2.12132 5.63604 5.63604C4.39076 6.88131 3.58669 8.40072 3.22383 10M22 10V4M22 10H16"
                                    stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </a>
                    <div class="search-button--clinics col-md-8 p-0" id="btnSearchClinics" style="cursor: pointer">
                        Tìm kiếm
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<script>
    let accessToken = `Bearer ` + token;

    $(document).ready(function () {
        $('#btnSearchClinics').click(function () {
            searchClinics();
        })

        $('#clinic_specialist').change(function () {
            searchClinics();
        })

        $('#clinic_location').change(function () {
            searchClinics();
        })

        loadSpecialist();
        loadLocation();
    })

    async function processSearchClinics() {
        if (event.keyCode === 13 && !event.shiftKey) {
            await searchClinics();
        }
    }

    async function searchClinics() {
        loadingMasterPage();
        let urlSearch = `{{route('clinics.restapi.search')}}`;

        let search_input_clinics = document.getElementById('search_input_clinics').value;
        let clinic_specialist = document.getElementById('clinic_specialist').value;
        let clinic_location = document.getElementById('clinic_location').value;

        urlSearch = urlSearch + `?search_input_clinics=${search_input_clinics}&clinic_specialist=${clinic_specialist}&clinic_location=${clinic_location}`;

        await $.ajax({
            url: urlSearch,
            method: 'GET',
            headers: {
                "Authorization": accessToken
            },
            success: function (response) {
                renderClinics(response);
                setTimeout(() => {
                    loadingMasterPage();
                }, '500');
            },
            error: function (exception) {
                console.log(exception)
                setTimeout(() => {
                    loadingMasterPage();
                }, '500');
            }
        });
    }

    function renderClinics(response) {
        console.log(response);
        let html = ``;
        for (let i = 0; i < response.length; i++) {
            let data = response[i];

            let urlDetail = "{{ route('clinic.detail', ['id' => ':id']) }}".replace(':id', data.id);

            let img = '';
            let gallery = data.gallery;
            let arrayGallery = gallery.split(',');
            img += `<img class="mr-2 img-item1" src="${arrayGallery[0]}" alt="">`;


            let openDate = new Date(data.open_date);
            let closeDate = new Date(data.close_date);
            let open = openDate.getHours() + ":" + openDate.getMinutes();
            let close = closeDate.getHours() + ":" + closeDate.getMinutes();

            html += `
                    <div class="specialList-clinics col-md-6 mt-5">
                        <a href="${urlDetail}">
                            <div class="border-specialList">
                                 <div class="content__item d-flex gap-3">
                                      <div class="specialList-clinics--img">
                                           ${img}
                                      </div>
                                      <div class="specialList-clinics--main w-100">
                                           <div class="title-specialList-clinics">
                                                ${data.name}
                                           </div>
                                      <div class="address-specialList-clinics">
                                 <div class="d-flex align-items-center address-clinics">
                                      <i class="fas fa-map-marker-alt mr-2"></i>
                                      <div>${data.address_detail} ${data.addressInfo}</div>
                                 </div>
                            </div>
                            <div class="time-working">
                                 <span class="color-timeWorking">
                                    <span class="fs-14 font-weight-600">${open} - ${close}</span>
                                    </span>
                            </div>
                            </div>
                            </div>
                            </div>
                        </a>
                    </div>
                    `;
        }
        let main = `<div class="row">${html}</div>`
        $('#listClinics').empty().append(main);
    }

    async function loadSpecialist() {
        let urlList = `{{ route('clinics.restapi.specialist') }}`;

        await $.ajax({
            url: urlList,
            method: 'GET',
            headers: {
                "Authorization": accessToken
            },
            success: function (response) {
                renderSpecialist(response);
            },
            error: function (exception) {
                console.log(exception)
            }
        });
    }

    function renderSpecialist(response) {
        console.log(response);
        let html = `<option value="">Select specialist</option>`;
        for (let i = 0; i < response.length; i++) {
            let data = response[i];

            html += `<option value="${data.representative_doctor}">${data.name}</option>`;
        }
        $('#clinic_specialist').empty().append(html);
    }

    async function loadLocation() {
        let urlList = `{{ route('restapi.get.provinces') }}`;

        let accessToken = `Bearer ` + token;
        await $.ajax({
            url: urlList,
            method: 'GET',
            headers: {
                "Authorization": accessToken
            },
            success: function (response) {
                renderLocation(response);
            },
            error: function (exception) {
                console.log(exception)
            }
        });
    }

    function renderLocation(response) {
        let html = `<option value="">Select location</option>`;
        for (let i = 0; i < response.length; i++) {
            let data = response[i];

            html += `<option value="${data.name}">${data.full_name}</option>`;
        }
        $('#clinic_location').empty().append(html);
    }
</script>
