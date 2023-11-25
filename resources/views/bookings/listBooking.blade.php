@extends('layouts.master')
@section('title', 'Online Medicine')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="container">
        <div class="d-flex p-0">
            <ul class="nav nav-pills nav-fill d-flex w-100">
                <li class="nav-item col-md-4 justify-content-center p-0">
                    <a class="nav-link active font-14-mobi" id="Pending-tab" data-toggle="tab" href="#Pending"
                       role="tab" aria-controls="home" aria-selected="true">Pending</a>
                </li>
                <li class="nav-item col-md-4 justify-content-center">
                    <a class="nav-link font-14-mobi" id="Cancel-tab" data-toggle="tab" href="#Cancel"
                       role="tab" aria-controls="profile" aria-selected="false">Event</a>
                </li>
                <li class="nav-item col-md-4 justify-content-center">
                    <a class="nav-link font-14-mobi" id="Complete-tab" data-toggle="tab" href="#Complete"
                       role="tab" aria-controls="profile" aria-selected="false">Event</a>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Pending" role="tabpanel" aria-labelledby="Pending-tab">
                <div class="section1-content" id="listBookingPending">

                </div>
            </div>
            <div class="tab-pane fade" id="Cancel" role="tabpanel" aria-labelledby="Cancel-tab">
                <div class="section1-content" id="listBookingCancel">

                </div>
            </div>
            <div class="tab-pane fade" id="Complete" role="tabpanel" aria-labelledby="Complete-tab">
                <div class="section1-content" id="listBookingComplete">

                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    var token = `{{ $_COOKIE['accessToken'] }}`;
    $(document).ready(function () {
        callListProduct();

        // Mặc định trạng thái là "PENDING"
        let defaultStatus = 'PENDING';

        // Gọi hàm để hiển thị danh sách khi trang được tải
        callListProduct(defaultStatus);

        // Hàm xử lý khi click vào tab
        function onTabClick(status) {
            callListProduct(status);
        }

        // Thiết lập sự kiện click cho mỗi tab
        $('#Pending-tab').on('click', function () {
            onTabClick('PENDING');
        });

        $('#Cancel-tab').on('click', function () {
            onTabClick('CANCEL');
        });

        $('#Complete-tab').on('click', function () {
            onTabClick('COMPLETE');
        });

        // Hàm gọi API
        async function callListProduct(status) {
            console.log(status)
            let routeName = "{{ route('api.backend.wish.lists.list') }}";
            let id = "{{ $id }}";
            let accessToken = `Bearer ` + token;

            await $.ajax({
                url: routeName,
                method: 'GET',
                data: { id: id, status: status },
                headers: {
                    "Authorization": accessToken
                },
                success: function (response) {
                    console.log(response);
                    renderClinics(response);
                },
                error: function (exception) {
                    console.log(exception);
                }
            });
        }




        async function renderClinics(res) {
            let htmlPending = ``;
            let htmlCancel = ``;
            let htmlComplete = ``;

            const baseUrl = '{{ route("clinic.detail", ["id" => ":id"]) }}';

            for (let i = 0; i < res.length; i++) {
                let item = res[i];
                let urlDetail = baseUrl.replace(':id', item.id);
                let gallery = item.gallery;
                let arrayGallery = gallery.split(',');
                let img = ``;

                for (let j = 0; j < arrayGallery.length; j++) {
                    img = img + `<img class="mr-2 w-auto h-100 img-item1 " src="${arrayGallery[j]}" alt="">`;
                }

                // Tùy thuộc vào trạng thái, thêm vào chuỗi HTML của tab tương ứng
                if (item.status === 'PENDING') {
                    htmlPending = htmlPending + `
                <div>
                    <h3>${item.name}</h3>
                    <p>Date: ${item.date}</p>
                    <p>Status: ${item.status}</p>
                    ${img}
                    <a href="${urlDetail}">View Details</a>
                </div>
            `;
                } else if (item.status === 'CANCEL') {
                    htmlCancel = htmlCancel + `
                <div>
                    <div>
                    <h3>${item.name}</h3>
                    <p>Date: ${item.date}</p>
                    <p>Status: ${item.status}</p>
                    ${img}
                    <a href="${urlDetail}">View Details</a>
                </div>
                </div>
            `;
                } else if (item.status === 'COMPLETE') {
                    htmlComplete = htmlComplete + `
                <div>
                    <div>
                    <h3>${item.name}</h3>
                    <p>Date: ${item.date}</p>
                    <p>Status: ${item.status}</p>
                    ${img}
                    <a href="${urlDetail}">View Details</a>
                </div>
                </div>
            `;
                }
            }

            // Hiển thị chuỗi HTML trong các phần tử tương ứng với từng tab
            $('#listBookingPending').empty().append(htmlPending);
            $('#listBookingCancel').empty().append(htmlCancel);
            $('#listBookingComplete').empty().append(htmlComplete);
        }

    });
</script>
