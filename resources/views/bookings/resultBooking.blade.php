@extends('layouts.master')
@section('title', 'Result Detail')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <style>
        .bi-heart-fill {
            color: red;
        }
        .product-item {
            border-radius: 25px;
            background: #088180;
            padding: 0;

            .img-pro {
                img {
                    border-radius: 24px 24px 0 100px;
                    height: 300px;
                    object-fit: cover;
                }

                i {
                    display: flex;
                    padding: 8px;
                    align-items: flex-start;
                    gap: 10px;
                    position: absolute;
                    right: 8px;
                    top: 8px;
                    border-radius: 51px;
                    background: #EAEAEA;
                }
            }

            .location-pro {
                color: #FFFFFF;
                font-size: 16px;
                font-style: normal;
                font-weight: 800;
                line-height: normal;
            }

            .prices-pro {
                color: #FFFFFF;
                font-size: 24px;
                font-style: normal;
                font-weight: 800;
                line-height: normal;
            }

            .SeeDetail {
                display: flex;
                padding: 16px 40px;
                justify-content: center;
                align-items: center;
                gap: 10px;
                border-radius: 86px 0 36px 0;
                width: 70%;
                background: #FFFFFF;
                border: 0;
            }

            .img_product--homeNew {
                img {
                    border-radius: 24px 24px 100px 0;
                    background: lightgray 50% / cover no-repeat;
                    height: 300px !important;
                }

            }

            .content-pro {
                .name-product {
                    a {
                        color: #FFFFFF;
                        font-size: 18px;
                        font-style: normal;
                        font-weight: 800;
                        line-height: normal;
                        min-height: 50px;
                    }
                }
            }
        }
    </style>
    <div class="container">
        <h1>{{ __('home.Result Detail') }}</h1>
        <div id="nameResult">

        </div>
        <h1>Suggest medicine</h1>
        <div class="row" id="resultBookingDetail">

        </div>
    </div>
    <script>
        let medical_favourites = `{{ $medical_favourites }}`;

        $(document).ready(function () {
            callListProduct(token);

            async function callListProduct(token) {
                let accessToken = `Bearer ` + token;
                await $.ajax({
                    url: `{{route('restapi.booking.result.list.medicine',$resultBooking->id)}}`,
                    method: 'GET',
                    headers: {
                        "Authorization": accessToken
                    },
                    success: function (response) {
                        renderMedicine(response);
                    },
                    error: function (exception) {
                        console.log(exception)
                    }
                });
            }
        });
        let accessToken = `Bearer ` + token;

        async function renderMedicine(response) {
            let html = ``;
            let nameResult = ``;
            for (let i = 0; i < response.length; i++) {
                let data = response[i];
                let isFavoriteClass = isUserWasWishlist(data.id);
                let reviewDetailUrl = `{{ route('medicine.detail', ['id'=>':id']) }}`;
                reviewDetailUrl = reviewDetailUrl.replace(':id', data.id);

                html = html + `
                    <div class="col-md-3 col-12">
                        <div class="p-3">
                             <div class="product-item">
                                  <div class="img-pro h-100 justify-content-center d-flex img_product--homeNew">
                                       <img src="${data.thumbnail}" alt="">
                                       <a class="button-heart" data-favorite="0">
                                            <i id="heart-icon-${data.id}" class="${isFavoriteClass} bi" data-product-id="${data.id}"
                                                       onclick="handleAddMedicineToWishList(${data.id})"></i>
                                       </a>
                                  </div>
                                  <div class="content-pro p-3">
                                       <div class="">
                                           <div class="name-product" style="height: auto">
                                               <a class="name-product--fleaMarket" href="${reviewDetailUrl}">${data.name}</a>
                                           </div>
                                            <div class="prices-pro">
                                            ${formatCurrency(data.price)} ${data.price_unit ?? 'VND'}
                                            </div>
                                     </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="SeeDetail">
                                        <a href="${reviewDetailUrl}" target="_blank">{{ __('home.See details') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


            `;
                function formatCurrency(amount) {
                    const formattedAmount = amount.toString().replace(/,/g, '.');

                    return parseFloat(formattedAmount).toLocaleString('de-DE');
                }
                nameResult = nameResult + '-' + data.name + '<br> '+ `<div class="p-2"><h4>{{ __('home.Ingredient') }}</h4> <div class="pl-3">${data.description}</div> </div>` ;
            }
            await $('#resultBookingDetail').empty().append(html);
            await $('#nameResult').empty().append(nameResult);
        }

        function isUserWasWishlist(medicineId) {
            let isLogin = `{{ Auth::check() }}`;
            if (!isLogin) {
                return 'bi-heart';
            }

            if (medical_favourites.includes(medicineId)) {
                return 'bi-heart-fill';
            }
            return 'bi-heart';
        }
    </script>
    <script>

        $(document).ready(function () {
            $('.frame.component-medicine .frame-wrapper-heart').on('click', function () {
                $(this).find('i').toggleClass('bi-heart');
                $(this).find('i').toggleClass('bi-heart-fill');
            })
        });

        function handleAddMedicineToWishList(id) {

            let headers = {
                'Authorization': `Bearer ${token}`
            };

            let user_id = `{{ Auth::user()->id ?? ''}}`;
            let url = `{{ route('api.backend.wish.lists.medical.update', ['id' => ':id']) }}`;

            url = url.replace(':id', id);

            let data = new FormData();
            data.append('user_id', user_id);
            data.append('product_id', id);
            data.append('_token', '{{ csrf_token() }}');

            try {
                $.ajax({
                    url: url,
                    method: 'POST',
                    headers: headers,
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: data,
                    success: function (response) {
                        let heartIcon = $('#heart-icon-' + id);

                        if (response.is_favorite == true) {
                            heartIcon.removeClass('bi-heart')
                            heartIcon.addClass('bi-heart-fill');
                        } else {
                            heartIcon.removeClass('bi-heart-fill');
                            heartIcon.addClass('bi-heart');
                        }
                    },
                    error: function (exception) {
                    }
                });
            } catch (error) {
                throw error;
            }
        }
    </script>
@endsection

