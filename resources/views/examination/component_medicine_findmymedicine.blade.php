@php $isFavourite = \App\Models\MedicalFavourite::where([
                ['user_id', '=', \Illuminate\Support\Facades\Auth::user()->id ?? ''],
                ['medical_id', '=', $medicine->id],
                ['is_favorite', '=', '1']
            ])->first();

            $heart = 'bi-heart';
            if ($isFavourite){
                $heart = 'bi-heart-fill';
            } @endphp

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
                            class="text-wrapper-2">{{ \App\Models\Province::getNameById($medicine->province_id) ?? ( __('home.Toàn quốc')) }}</div>
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
