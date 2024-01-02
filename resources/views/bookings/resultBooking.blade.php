@extends('layouts.master')
@section('title', 'Result Detail')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <style>
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
        <h1>Result Detail</h1>
        <div id="nameResult">

        </div>
        <h1>Suggest</h1>
        <div class="row" id="resultBookingDetail">

        </div>
    </div>
    <script>
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
            let descriptionResult = ``;
            for (let i = 0; i < response.length; i++) {
                let data = response[i];
                let reviewDetailUrl = `{{ route('medicine.detail', ['id'=>':id']) }}`;
                reviewDetailUrl = reviewDetailUrl.replace(':id', data.id);

                html = html + `
                    <div class="col-md-3 col-12">
                        <div class="p-3">
                             <div class="product-item">
                                  <div class="img-pro h-100 justify-content-center d-flex img_product--homeNew">
                                       <img src="${data.thumbnail}" alt="">
                                       <a class="button-heart" data-favorite="0">
                                            <i id="icon-heart" class="bi-heart bi" data-product-id="${data.id}"
                                                       onclick="addProductToWishList(${data.id})"></i>
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
                nameResult = nameResult + '-' + data.name + '<br> '+ `<div class="p-2"><h4>Ingredient</h4> <div class="pl-3">${data.description}</div> </div>` ;
            }
            await $('#resultBookingDetail').empty().append(html);
            await $('#nameResult').empty().append(nameResult);
        }
    </script>
@endsection

