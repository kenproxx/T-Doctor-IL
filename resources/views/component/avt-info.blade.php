    <div class=" row d-flex align-content-center mb-42">
        <div class="col-md-2 d-flex justify-content-center col-2">
            <img class="img-info" src="{{asset('img/flea-market/avatar-phi.png')}}">
        </div>
        <div class="col-md-8 col-10">
            <div class="d-mb-flex">
                <div class="info col-8 pl-0">
                    <div class="name font-18-mobi">Trần đình phi</div>
                    <p class="location-info font-14-mobi">Location: <strong class="hanoi font-14-mobi">HANOI</strong></p>
                </div>
                <div class="col-4 pc-hidden">
                        <form action="{{route('flea.market.sell.product')}}" class=" flea-button">
                            <button class="flea-btn width-88">Sell my product</button>
                        </form>
                </div>
            </div>
            <div class=" margin-info row mt-2">
                <div class="col-4 col-md-3 font-12-mobi">Product: <span>10</span></div>
                <div class="col-4 col-md-3 font-12-mobi">Sold: <span>1000</span></div>
                <div class="col-4 col-md-3 font-12-mobi">Sold out: <span>10</span></div>
                <div class="col-4 col-md-3 font-12-mobi">Following: <span>50</span></div>
            </div>
        </div>
        <div class="col-md-2 mobile-hidden">
            <div class="d-flex col-md-4">
                <form action="{{route('flea.market.sell.product')}}" class=" flea-button mr-3">
                    <button class="flea-btn width-88">Sell my product</button>
                </form>
            </div>
        </div>
    </div>

