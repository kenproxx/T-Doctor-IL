@php use App\Models\MedicalFavourite;use App\Models\Province; @endphp
@php use App\Models\Department;use Illuminate\Support\Facades\Auth; @endphp
<style>
    .bi-heart-fill {
        color: red;
    }

    .find-my-medicine .frame {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
        padding: 0px 0px 16px;
        position: relative;
        background-color: #088180;
        border-radius: 16px;
    }

    .find-my-medicine .frame .rectangle {
        position: relative;
        width: 100%;
        height: 273px;
    }

    .find-my-medicine .frame .div {
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

    .find-my-medicine .frame .text-wrapper {
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

    .find-my-medicine .frame .div-2 {
        display: inline-flex;
        align-items: flex-start;
        gap: 12px;
        position: relative;
        flex: 0 0 auto;
    }

    .find-my-medicine .frame .img {
        position: relative;
        width: 20px;
        height: 20px;
    }

    .find-my-medicine .frame .text-wrapper-2 {
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

    .find-my-medicine .frame .frame-wrapper-heart {
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

    .find-my-medicine .frame .frame-wrapper-heart i {
        font-size: 24px;
    }

    .find-my-medicine .frame .component {
        position: absolute;
        top: 217px;
        left: 15px;
    }

    .find-my-medicine .department-div {
        padding: 8px;
        background-color: white;
        border-radius: 50%;
    }

    .find-my-medicine .department-div .fills {
        border-radius: 50%;
        width: 30px;
        height: 30px;
    }

    .find-my-medicine .frame .group {
        position: absolute;
        width: 116px;
        height: 114px;
        top: -19px;
        left: -19px;
    }

    .find-my-medicine .frame .overlap-group {
        position: relative;
        width: 95px;
        height: 95px;
        top: 19px;
        left: 19px;
        background-image: url(https://c.animaapp.com/ItWXPcpR/img/rectangle-23800-2.svg);
        background-size: 100% 100%;
    }

    .find-my-medicine .frame .text-wrapper-3 {
        position: absolute;
        height: 23px;
        top: 25px;
        left: 16px;
        transform: rotate(-45deg);
        font-family: var(--body-1-extra-font-family);
        font-weight: var(--body-1-extra-font-weight);
        color: #ffffff;
        font-size: var(--body-1-extra-font-size);
        letter-spacing: var(--body-1-extra-letter-spacing);
        line-height: var(--body-1-extra-line-height);
        font-style: var(--body-1-extra-font-style);
    }

    .find-my-medicine .border-img {
        border-radius: 13px 13px 0px 100px;
        object-fit: cover;
    }

    .find-my-medicine .frame:hover, .find-my-medicine-2 .frame:hover {
        border-radius: 22px;
        background: #088180;
        box-shadow: 0px 8px 10px 0px rgba(0, 0, 0, 0.25);
    }

</style>

<div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
    <div class="frame m-4">
        <img loading="lazy" class="rectangle border-img"
             src="{{asset($pharmacist->avt)}}"/>
        <div class="div mt-3">
            <a target="_blank" href="{{ route('examination.doctor_info', ['id' => $pharmacist->id]) }}">
                <div class="text-wrapper">{{ $pharmacist->name ?? __('home.no name') }}</div>
            </a>
            <div class="div-2">
                @php
                    $province = Province::find($pharmacist->province_id)
                @endphp
                <img loading="lazy" class="img" src="{{ asset('img/location.png') }}"/>
                <div class="text-wrapper-2">{{ $province->name ?? __('home.Toàn quốc') }}</div>
            </div>
            <div class="div-2">
                <img loading="lazy" class="img" src="{{ asset('img/clock.png') }}"/>
                <div
                    class="text-wrapper-2">{{ $pharmacist->time_working_1 ?? '' }} {{ $pharmacist->time_working_2 ?? '' }}</div>
            </div>
        </div>
        @php
            $department = Department::find($pharmacist->department_id);
            $isFavourite = MedicalFavourite::where([
                ['user_id', '=', Auth::user()->id ?? ''],
                ['medical_id', '=', $pharmacist->id],
                ['type', '=', $pharmacist->type],
            ])->first();

            $heart = 'bi-heart';
            if ($isFavourite){
                $heart = 'bi-heart-fill';
            }

        @endphp
        @if(Auth::check())
            <div class="frame-wrapper-heart"
                 onclick="handleAddToWishList('{{ $pharmacist->id }}', '{{ $pharmacist->type }}')">
                <i class="{{ $heart }} bi"></i></div>
        @endif
        <div class="component department-div">
            <img loading="lazy" class="fills" src="{{ $department->thumbnail }}"/>
        </div>
    </div>
</div>


<script>
    function handleAddToWishList(id, type) {

        let headers = {
            'Authorization': `Bearer ${token}`
        };

        let user_id = `{{ Auth::user()->id ?? ''}}`;
        // chèn dữ liệu vào bảng Medical-favourites
        let url = `{{ route('api.backend.medical.favourites.update.wishlist') }}`;

        let data = new FormData();
        data.append('user_id', user_id);
        data.append('medical_id', id);
        data.append('medical_type', type);

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
                    console.log(response)
                },
                error: function (exception) {
                }
            });
        } catch (error) {
            throw error;
        }

    }

</script>
