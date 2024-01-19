@php
    $isFavourite = \App\Models\WishList::where([
                ['user_id', '=', Auth::user()->id ?? ''],
                ['product_id', '=', $medicine->id],
                ['type_product', '=', \App\Enums\TypeProductCart::MEDICINE],
            ])->first();

            $heart = 'bi-heart d-flex';
            if ($isFavourite == true){
                $heart = 'bi-heart-fill d-flex';
            }

@endphp

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

    async function handleAddMedicineToWishList(id) {
        loadingMasterPage();
        let headers = {
            'Authorization': `Bearer ${token}`
        };

        let user_id = `{{ Auth::user()->id ?? ''}}`;
        let url = `{{ route('api.backend.wish.lists.medical.update') }}`;

        let data = new FormData();
        data.append('user_id', user_id);
        data.append('product_id', id);
        data.append('_token', '{{ csrf_token() }}');
        data.append('product_type', `{{ \App\Enums\TypeProductCart::MEDICINE }}`);
        if (user_id == '') {
            alert('Bạn cần đăng nhập để thực hiện chức năng này')
            return;
        }

        try {
           await $.ajax({
                url: url,
                method: 'POST',
                headers: headers,
                contentType: false,
                cache: false,
                processData: false,
                data: data,
                success: function (response) {
                    let heartIcon = $('#heart-icon-' + id);
                    if (response.isFavourite == true) {
                        heartIcon.removeClass('bi-heart')
                        heartIcon.addClass('bi-heart-fill');
                    } else {
                        heartIcon.removeClass('bi-heart-fill');
                        heartIcon.addClass('bi-heart');
                    }
                    loadingMasterPage();
                },
                error: function (exception) {
                    loadingMasterPage();
                    alert('Create error!')
                }
            });
        } catch (error) {
            loadingMasterPage();
            alert('Error, Please try again!')
        }

    }
</script>
