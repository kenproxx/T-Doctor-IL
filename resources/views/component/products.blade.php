@php
    $isFavourite = \App\Models\MedicalFavourite::where([
                ['user_id', '=', Auth::user()->id ?? ''],
                ['medical_id', '=', $medicine->id],
                ['is_favorite', '=', 1],
            ])->first();

            $heart = 'bi-heart d-flex';
            if ($isFavourite == true){
                $heart = 'bi-heart-fill d-flex';
            }

@endphp
<style>
    .bi-heart-fill {
        color: red;
    }
    .product-item .img-pro i {
        padding: 8px;
        border-radius: 36px;
        background: #EAEAEA;
        align-items: center;
        justify-content: center;
    }
</style>
<div class="product-item">
    <div class="img-pro">
        <img src="{{asset($medicine->thumbnail)}}" alt="">
        <a class="button-heart" data-favorite="0">
            <i id="heart-icon-{{$medicine->id}}" class="{{$heart}} bi" data-product-id="${data.id}"
               onclick="handleAddMedicineToWishList({{$medicine->id}})"></i>
        </a>
    </div>
    <div class="content-pro">
        <div class="name-pro">
            <a href="{{route('medicine.detail', $medicine->id)}}">{{ $medicine->name }}</a>
        </div>
        <div class="location-pro d-flex">
            {{ __('home.Location') }}: <p>{{ $medicine->location_name ??  __('home.Toàn quốc') }}</p>
        </div>
        <div class="price-pro">
            {{ number_format($medicine->price, 0, ',', '.') }} {{ $medicine->unit_price ?? 'VND' }}
        </div>
    </div>
</div>
<div>
</div>

<script>
    $(document).ready(function () {
        $('#button-heart').on('click', function () {
            $('#bi-heart').addClass('d-none')
            $('#bi-heart-fill').removeClass('d-none')
        })

        $('#button-heart-fill').on('click', function () {
            $('#bi-heart').removeClass('d-none')
            $('#bi-heart-fill').addClass('d-none')
        })
    })

    $(document).ready(function () {
        $('.frame.component-medicine .frame-wrapper-heart').on('click', function () {
            $(this).find('i').toggleClass('bi-heart');
            $(this).find('i').toggleClass('bi-heart-fill');
        })
    });

    function handleAddMedicineToWishList(id) {

        let headers = {
            'Authorization': `Bearer ${token}`
        };

        let user_id = `{{ Auth::user()->id ?? ''}}`;
        console.log(user_id)
        let url = `{{ route('api.backend.wish.lists.medical.update', ['id' => ':id']) }}`;

        url = url.replace(':id', id);

        let data = new FormData();
        data.append('user_id', user_id);
        data.append('product_id', id);
        data.append('_token', '{{ csrf_token() }}');
        if (user_id == '') {
            alert('Bạn cần đăng nhập để thực hiện chức năng này')

        } else {
            try {
                $.ajax({
                    url: url,
                    method: 'POST',
                    headers: headers,
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: data,
                    success: function (response) {
                        let heartIcon = $('#heart-icon-' + id);

                        if (response.is_favorite == true) {
                            heartIcon.removeClass('bi-heart')
                            heartIcon.addClass('bi-heart-fill');
                        } else {
                            heartIcon.removeClass('bi-heart-fill');
                            heartIcon.addClass('bi-heart');
                        }
                    },
                    error: function (exception) {
                    }
                });
            } catch (error) {
                throw error;
            }
        }

    }
</script>
