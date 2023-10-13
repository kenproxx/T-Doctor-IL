<div class="modal modal-cart fade" id="modalCreatPrescription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create prescription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @for($i=0; $i<6; $i++)
                    <div class="product-cart row">
                        <div class="col-2 img">
                            <img src="{{asset('img/Rectangle 23798.png')}}" alt="">
                        </div>
                        <div class="col-8 title">
                            <div class="title-name">
                                Menevit Viên Uống Hỗ Trợ Sinh Lý Nam Giới, Tăng Khả Năng Có Con 90 Viên
                            </div>
                            <div class="price">
                                599,000 VND/box
                            </div>
                        </div>
                        <div class="col-2">
                            <form>
                                <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                <input id="number" value="0" />
                                <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                            </form>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="modal-footer">
                <button type="button" class="btn cancel" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn pay">Pay</button>
            </div>
        </div>
    </div>
</div>
