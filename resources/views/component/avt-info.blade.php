    <div class=" row d-flex align-content-center mb-42">
        <div class="col-md-2 d-flex justify-content-center col-2">
            <img class="img-info" src="{{asset('img/flea-market/avatar-phi.png')}}">
        </div>
        <div class="col-md-8 col-10">
            <div class="d-mb-flex">
                <div class="info col-8 pl-0">
                    @php
                    if (Auth::user() != null) {
                        $user = Auth::user();
                    } else {
                        $user = \App\Models\User::find($id);}
                    @endphp
                    <div class="name font-18-mobi">{{$user->name}} {{$user->last_name}}</div>
                    <p class="location-info font-14-mobi">Location: <strong class="hanoi font-14-mobi">HANOI</strong></p>
                </div>
                <div class="col-4 pc-hidden">
                        <form action="{{route('flea.market.sell.product')}}" class=" flea-button">
                            <button class="flea-btn width-88">Sell my product</button>
                        </form>
                </div>
            </div>
            <div class=" margin-info row mt-2">
                @php
                if (Auth::user() != null) {
                    $id = Auth::user()->id;
                } else {
                    $id = $id;
                }
                $count = \App\Models\ProductInfo::where('created_by', $id )->where('status', \App\Enums\ProductStatus::ACTIVE)->count();
                @endphp
                <div class="col-4 col-md-3 font-12-mobi">Product: <span>{{$count}}</span></div>
                <div class="col-4 col-md-3 font-12-mobi">Sold: <span>1000</span></div>
                <div class="col-4 col-md-3 font-12-mobi">Sold out: <span>10</span></div>
                <div class="col-4 col-md-3 font-12-mobi">Following: <span>50</span></div>
            </div>
        </div>
        <div class="col-md-2 mobile-hidden">
            <div class="d-flex col-md-4">
{{--                @if(!$id)--}}
                    <form action="{{route('flea.market.sell.product')}}" class=" flea-button mr-3">
                        <button class="flea-btn width-88">Sell my product</button>
                    </form>
{{--                @else--}}
{{--                    @if($follow == null)--}}
{{--                        <form action="{{route('flea.market.follow', $id)}}" method="post" class="flea-button">--}}
{{--                            @csrf--}}
{{--                            <button class="flea-btn width-88">Follow</button>--}}
{{--                        </form>--}}
{{--                    @else--}}
{{--                        <form action="{{route('flea.market.unfollow', $id)}}" method="post" class="flea-button">--}}
{{--                            @csrf--}}
{{--                            <button class="flea-btn width-88">Unfollow</button>--}}
{{--                        </form>--}}
{{--                    @endif--}}
{{--                @endif--}}
            </div>
        </div>
    </div>

