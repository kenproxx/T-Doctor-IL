<div class="product-item">
    <div class="img-pro">
        <img src="{{asset($medicine->thumbnail)}}" alt="">
{{--        <button id="button-heart" type="#">--}}
{{--            <i id="bi-heart" class="bi bi-heart"></i>--}}
{{--        </button>--}}
{{--        <button id="button-heart-fill">--}}
{{--            <i id="bi-heart-fill" class="bi bi-heart-fill d-none"></i>--}}
{{--        </button>--}}
    </div>
    <div class="content-pro">
        <div class="name-pro">
            <a href="{{route('medicine.detail', $medicine->id)}}">{{ $medicine->name }}</a>
        </div>
        <div class="location-pro d-flex">
            @php
                $user = \App\Models\User::find($medicine->user_id)
            @endphp
            Location: <p>{{ $user->address_code }}</p>
        </div>
        <div class="price-pro">
            {{ $medicine->price }} {{ $medicine->unit_price }}
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
