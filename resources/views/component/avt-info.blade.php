<div class=" row d-flex align-content-center mb-42">
    <div class="col-md-2 d-flex justify-content-center col-2">
        <img class="img-info" src="{{asset('img/flea-market/avatar-phi.png')}}">
    </div>
    <div class="col-md-8 col-10">
        <div class="d-mb-flex">
            <div class="info col-8 pl-0">
                @php
                    if (Auth::user() != null) {
                        $info = Auth::user();
                    } else {
                        $info = \App\Models\User::where('id', $id)->first();
                    }
                    $address = \App\Models\Province::where('id', $info->province_id)->value('name');
                @endphp
                <div class="name font-18-mobi">{{$info->name}} {{$info->last_name}}</div>
                <p class="location-info font-14-mobi">{{ __('home.Location') }}: <strong class="hanoi font-14-mobi">
                        @if(!empty($address))
                            {{$address}}
                        @else
                            {{ __('home.null') }}
                        @endif
                    </strong></p>
            </div>
            <div class="col-4 pc-hidden">
                <form action="{{route('flea.market.sell.product')}}" class=" flea-button">
                    <button class="flea-btn width-88">{{ __('home.Sell my product') }}</button>
                </form>
            </div>
        </div>
        <div class=" margin-info row mt-2">
            @php
                $count = \App\Models\ProductInfo::where('created_by', $id )->where('status', \App\Enums\ProductStatus::ACTIVE)->count();
            @endphp
            <div class="col-4 col-md-3 font-12-mobi">{{ __('home.Product') }}: <span>{{$count}}</span></div>
            <div class="col-4 col-md-3 font-12-mobi">{{ __('home.Sold') }}: <span>1000</span></div>
            <div class="col-4 col-md-3 font-12-mobi">{{ __('home.Sold out') }}: <span>10</span></div>
            <div class="col-4 col-md-3 font-12-mobi">{{ __('home.Following') }}: <span>50</span></div>
        </div>
    </div>
    <div class="col-md-2 mobile-hidden">

        <div class="d-flex col-md-4">
            @if(\Illuminate\Support\Facades\Auth::check())
                @if( $id != Auth::user()->id)
                    <form class=" flea-button mr-3">
                        <button class="flea-btn width-88">{{ __('home.FOLLOW') }}</button>
                    </form>
                @else
                    <form action="{{route('flea.market.sell.product')}}" class=" flea-button mr-3">
                        <button class="flea-btn width-88">{{ __('home.Sell my product') }}</button>
                    </form>
                @endif
            @else
                <form onclick="alertLogin();" class=" flea-button mr-3">
                    <button type="button"
                            class="flea-btn width-88">{{ __('home.FOLLOW') }}</button>
                </form>
            @endif
        </div>
    </div>
</div>

