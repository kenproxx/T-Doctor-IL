<div class="product-item">
    <div class="img-pro">
        <img src="{{asset('img/flea-market/product2.png')}}" alt="">
        <button id="button-heart" type="#">
            <i id="bi-heart" class="bi bi-heart"></i>
        </button>
        <button id="button-heart-fill">
            <i id="bi-heart-fill" class="bi bi-heart-fill d-none"></i>
        </button>
    </div>
    <div class="content-pro">
        <div class="name-pro">
            <a href="{{route('flea.market.product.detail')}}">Máy tạo oxy 5 lít Reiwa K5BW</a>
        </div>
        <div class="location-pro d-flex">
            Location: <p>Ha Noi</p>
        </div>
        <div class="price-pro">
            599,000 VND
        </div>
    </div>
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
    </script>
