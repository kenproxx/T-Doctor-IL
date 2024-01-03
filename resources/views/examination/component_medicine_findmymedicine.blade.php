<style>
    .bi-heart-fill {
        color: red;
    }

    .find-my-medicine-2 .frame {
        display: inline-flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 12px;
        position: relative;
        background-color: #088180;
        border-radius: 24px;
        border: 1px solid;
        border-color: var(--grey-medium);
    }

    .find-my-medicine-2 .frame .rectangle {
        position: relative;
        object-fit: cover;
    }

    .find-my-medicine-2 .frame .div {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 16px;
        position: relative;
        align-self: stretch;
        width: 100%;
        flex: 0 0 auto;
    }

    .find-my-medicine-2 .frame .div-2 {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
        padding: 0px 0px 0px 16px;
        position: relative;
        align-self: stretch;
        width: 100%;
        flex: 0 0 auto;
    }

    .find-my-medicine-2 .frame .text-wrapper {
        position: relative;
        width: fit-content;
        margin-top: -1px;
        font-family: var(--body-1-extra-font-family);
        font-weight: var(--body-1-extra-font-weight);
        color: var(--white);
        font-size: var(--body-1-extra-font-size);
        text-align: center;
        letter-spacing: var(--body-1-extra-letter-spacing);
        line-height: var(--body-1-extra-line-height);
        font-style: var(--body-1-extra-font-style);
    }

    .find-my-medicine-2 .frame .div-3 {
        display: inline-flex;
        align-items: flex-start;
        gap: 12px;
        position: relative;
        flex: 0 0 auto;
    }

    .find-my-medicine-2 .frame .marker-pin {
        position: relative;
        width: 20px;
        height: 20px;
    }

    .find-my-medicine-2 .frame .text-wrapper-2 {
        position: relative;
        width: fit-content;
        margin-top: -1px;
        font-family: var(--body-4-extra-font-family);
        font-weight: var(--body-4-extra-font-weight);
        color: var(--white);
        font-size: var(--body-4-extra-font-size);
        text-align: center;
        letter-spacing: var(--body-4-extra-letter-spacing);
        line-height: var(--body-4-extra-line-height);
        font-style: var(--body-4-extra-font-style);
    }

    .find-my-medicine-2 .frame .text-wrapper-3 {
        position: relative;
        width: fit-content;
        font-family: var(--subtitle-1-extra-font-family);
        font-weight: var(--subtitle-1-extra-font-weight);
        color: var(--white);
        font-size: var(--subtitle-1-extra-font-size);
        text-align: center;
        letter-spacing: var(--subtitle-1-extra-letter-spacing);
        line-height: var(--subtitle-1-extra-line-height);
        font-style: var(--subtitle-1-extra-font-style);
    }

    .find-my-medicine-2 .frame .div-wrapper {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 16px 40px;
        position: relative;
        flex: 0 0 auto;
        margin-bottom: -1px;
        margin-right: -1px;
        background-color: var(--white);
        border-radius: 60px 0px 24px 0px;
        overflow: hidden;
    }

    .find-my-medicine-2 .frame .text-wrapper-4 {
        position: relative;
        width: fit-content;
        font-family: var(--subtitle-1-extra-font-family);
        font-weight: var(--subtitle-1-extra-font-weight);
        color: var(--black);
        font-size: var(--subtitle-1-extra-font-size);
        letter-spacing: var(--subtitle-1-extra-letter-spacing);
        line-height: var(--subtitle-1-extra-line-height);
        font-style: var(--subtitle-1-extra-font-style);
    }

    .find-my-medicine-2 .frame .img {
        position: absolute;
        width: 24px;
        height: 24px;
        top: 20px;
        left: 225px;
    }

    .find-my-medicine-2 .frame .group {
        position: absolute;
        width: 116px;
        height: 114px;
        top: -19px;
        left: -19px;
    }

    .find-my-medicine-2 .frame .overlap-group {
        position: relative;
        width: 95px;
        height: 95px;
        top: 19px;
        left: 19px;
        background-image: url(https://c.animaapp.com/ItWXPcpR/img/rectangle-23800-2.svg);
        background-size: 100% 100%;
    }

    .find-my-medicine-2 .frame .text-wrapper-5 {
        position: absolute;
        height: 23px;
        top: 26px;
        left: 19px;
        transform: rotate(-45deg);
        font-family: var(--body-1-extra-font-family);
        font-weight: var(--body-1-extra-font-weight);
        color: #ffffff;
        font-size: var(--body-1-extra-font-size);
        letter-spacing: var(--body-1-extra-letter-spacing);
        line-height: var(--body-1-extra-line-height);
        font-style: var(--body-1-extra-font-style);
    }

    .find-my-medicine-2 .text-wrapper.text-ellipsis {
        text-overflow: ellipsis;
    }

    .find-my-medicine-2 .frame .frame-wrapper-heart {
        display: inline-flex;
        align-items: flex-start;
        gap: 10px;
        padding: 8px;
        position: absolute;
        top: 8px;
        right: 8px;
        background-color: var(--light);
        border-radius: 51px;
    }

    .find-my-medicine-2 .frame .frame-wrapper-heart i {
        font-size: 24px;
    }

    .find-my-medicine-2 .border-img {
        border-radius: 13px 13px 100px 0px;
        object-fit: cover;
    }

    .find-my-medicine .frame:hover, .find-my-medicine-2 .frame:hover {
        border-radius: 22px;
        background: #088180;
        box-shadow: 0px 8px 10px 0px rgba(0, 0, 0, 0.25);
    }
    .rectangle {
        height: 273px;
    }

</style>

@php
    use App\Models\Province;
    use App\Models\User;use App\Models\WishList;use Illuminate\Support\Facades\Auth;
    $user = User::find($medicine->user_id);
    $province = Province::find($user->province_id);
    $isFavourite = \App\Models\MedicalFavourite::where([
                ['user_id', '=', Auth::user()->id ?? ''],
                ['medical_id', '=', $medicine->id],
                ['is_favorite', '=', '1']
            ])->first();

            $heart = 'bi-heart';
            if ($isFavourite){
                $heart = 'bi-heart-fill';
            }
@endphp
<div class="col-sm-3 mb-3">
    <div class="m-4">
        <div class="frame component-medicine w-100">
            <img loading="lazy" class="rectangle border-img"
                                      src="{{asset($medicine->thumbnail)}}"/>
            <div class="div">
                <div class="div-2">
                    <a target="_blank" class="w-100" href="{{ route('medicine.detail', $medicine->id) }}">
                        <div
                            class="text-wrapper text-nowrap overflow-hidden text-ellipsis w-100">{{ $medicine->name }}</div>
                    </a>
                    <div class="div-3"><img loading="lazy" class="marker-pin"
                                            src="{{ asset('img/location.png') }}"/>

                        <div
                            class="text-wrapper-2">{{ $province->name ?? ( __('home.Toàn quốc')) }}</div>
                    </div>
                    <div
                        class="text-wrapper-3">{{ number_format($medicine->price, 0, ',', '.' ) }} {{ $medicine->unit_price ?? 'VND'}}</div>
                </div>
                <div class="div-wrapper">
                    <a href="{{ route('medicine.detail', $medicine->id) }}">
                        <div class="text-wrapper-4">{{ __('home.See details') }}</div>
                    </a>
                </div>
            </div>
            @if(Auth::check())
                <div class="frame-wrapper-heart" onclick="handleAddMedicineToWishList('{{ $medicine->id }}')"><i
                        class="{{ $heart }} bi" id="heart-icon-{{ $medicine->id }}"></i></div>
            @endif
            <div class="group">
                <div class="overlap-group">
                    <div class="text-wrapper-5">75%</div>
                </div>
            </div>

        </div>
    </div>

</div>


<script>

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
        // chèn dữ liệu vào bảng Medical-favourites
        let url = `{{ route('api.backend.wish.lists.medical.update', ['id' => ':id']) }}`;

        url = url.replace(':id', id);

        let data = new FormData();
        data.append('user_id', user_id);
        data.append('product_id', id);
        data.append('_token', '{{ csrf_token() }}');

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
</script>
