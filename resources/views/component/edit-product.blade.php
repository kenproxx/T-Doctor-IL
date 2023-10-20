<div class="product-item">
    <div class="img-pro">
        <img src="{{asset('img/flea-market/product2.png')}}" alt="">
    </div>
    <div class="content-pro">
        <div class="">
            <div class="name-product" style="height: auto">
                <a href="{{route('medicine.detail')}}">Máy tạo oxy 5 lít Reiwa K5BW</a>
            </div>
            <div class="location-pro d-flex" style="color: #929292">
                Location: <p> Ha Noi</p>
            </div>
            <div class="price-pro">
                599,000 VND
            </div>
        </div>

        <div class="justify-content-between edit-button">
            <button class="apply-bt apply-bt_delete w-45">Delete</button>
            <form action="{{ route('recruitment.edit.cv') }}" class="w-45">
                <button type="submit" class="apply-bt apply-bt_edit w-100">Edit</button>
            </form>
        </div>
    </div>
</div>
