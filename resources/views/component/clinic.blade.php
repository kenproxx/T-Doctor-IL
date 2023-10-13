<div class="clinic-item">
    <a href="{{route('clinic.detail')}}" class="name">
        Phòng khám tai mũi họng Đông Á
    </a>
    <div class="time d-flex">
        <p>09:00 - 19:00 </p>/ Dental Clinic
    </div>
    <div class="location">
        <i class="fa-solid fa-location-dot"></i> Toà V7-B7 The Terra An Hưng, La Khê, Hà Đông - <span>3 Km</span>
    </div>
    <div class="service">
        Service: Implant, Brightening, Crown
    </div>
    <div class="star d-flex">
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-fill"></i>
        <i class="bi bi-star-half"></i>
        <i class="bi bi-star"></i>
    </div>
    <div class="img-detail row">
        @for($i = 0; $i < 3; $i++)
            <div class="col-3 img-item">
                <img src="{{asset('img/Rectangle 23810.png')}}" alt="">
            </div>
        @endfor
    </div>
</div>
