<link rel="stylesheet" href="{{asset('css/clinics-style.css')}}">
<div class="background-image_Clinics">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center mb-150">
            <div class="title-list-clinic">Y tế gần bạn</div>
        </div>
        <div class="border-search-clinics">
            <div class="col-md-12 p-0">
                <label for="search-input" class="label-input-clinic">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M14.8571 7.42857C14.8571 3.32588 11.5313 0 7.42857 0C3.32588 0 0 3.32588 0 7.42857C0 11.5313 3.32588 14.8571 7.42857 14.8571C9.26857 14.8571 10.96 14.1829 12.2629 13.0743L12.5714 13.3829V14.2857L18.2857 20L20 18.2857L14.2857 12.5714H13.3829L13.0743 12.2629C14.1829 10.96 14.8571 9.26857 14.8571 7.42857ZM2.28571 7.42857C2.28571 4.57143 4.57143 2.28571 7.42857 2.28571C10.2857 2.28571 12.5714 4.57143 12.5714 7.42857C12.5714 10.2857 10.2857 12.5714 7.42857 12.5714C4.57143 12.5714 2.28571 10.2857 2.28571 7.42857Z"
                              fill="black"/>
                    </svg>
                </label>
                <input class="m-0 form-select" type="search" name="focus" placeholder="{{ __('home.Search for anything…') }}"
                       id="search-input" value="">
            </div>
            <div class="col-md-12 p-0 d-flex">
                <div class="col-md-5 pl-0">
                    <select class="form-select_clinics" aria-label="Default select example">
                        <option value="" selected>Select specialist</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <select class="form-select_clinics" aria-label="Default select example">
                        <option value="" selected>Location</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex justify-content-between pr-0">
                    <a href="">
                        <div class="reset-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M2 14C2 14 2.12132 14.8492 5.63604 18.364C9.15076 21.8787 14.8492 21.8787 18.364 18.364C19.6092 17.1187 20.4133 15.5993 20.7762 14M2 14V20M2 14H8M22 10C22 10 21.8787 9.15076 18.364 5.63604C14.8492 2.12132 9.15076 2.12132 5.63604 5.63604C4.39076 6.88131 3.58669 8.40072 3.22383 10M22 10V4M22 10H16"
                                    stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </a>
                    <a href="" class="col-md-8 p-0">
                        <div class="search-button--clinics">
                            Tìm kiếm
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>
{{--    <div class="row clinic-search">--}}
{{--        <div class="clinic-search--left col-md-12 d-flex justify-content-between clinic-search--center align-items-center">--}}
{{--            --}}{{--        <div class="clinic-search--left col-md-6 justify-content-around mobile-hidden">--}}
{{--            --}}{{--            <div class="title mobile-hidden">{{ __('home.All') }}<i class="bi bi-arrow-down-up"></i></div>--}}
{{--            --}}{{--            <div class="title mobile-hidden">{{ __('home.Category') }}<i class="bi bi-arrow-down-up"></i></div>--}}
{{--            --}}{{--            <div class="title mobile-hidden">{{ __('home.Location') }} <i class="bi bi-arrow-down-up"></i></div>--}}
{{--            --}}{{--        </div>--}}

{{--            <form class="search-box col-md-5">--}}
{{--                <input class="m-0" type="search" name="focus" placeholder="{{ __('home.Search for anything…') }}"--}}
{{--                       id="search-input" value="">--}}
{{--                <i class="fa-solid fa-magnifying-glass"></i>--}}
{{--            </form>--}}
{{--            <div class="flex-fill">--}}
{{--                <button class="css-button"><i class="bi bi-filter"></i></button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
