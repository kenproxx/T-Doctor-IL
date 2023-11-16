<div class="product-item">
    <div class="img-pro">
        <img src="{{asset($medicine->thumbnail)}}" alt="">
    </div>
    <div class="content-pro">
        <div class="name-pro">
            <a href="{{route('medicine.detail', $medicine->id)}}">{{ $medicine->name }}</a>
        </div>
        <div class="location-pro d-flex">
                Location: <p>{{ $medicine->location_name ?? 'Toàn quốc'}}</p>
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
