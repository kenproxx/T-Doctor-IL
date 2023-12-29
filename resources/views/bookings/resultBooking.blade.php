@extends('layouts.master')
@section('title', 'Result Detail')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="container">
        <h1>Result Detail</h1>
        <div id="nameResult">


        </div>
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
            console.log(response)
            let html = ``;
            let nameResult = ``;
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
                                                    <i id="icon-heart" class="bi-heart bi"
                                                       data-product-id="${data.id}"
                                                       onclick="addProductToWishList(${data.id})"></i>
                                                </a>
                                            </div>
                                            <div class="content-pro p-3">
                                                <div class="">
                                                    <div class="name-product" style="height: auto">
                                                        <a class="name-product--fleaMarket"
                                                           href="${reviewDetailUrl}">${data.name}</a>
                                                    </div>
                                                    <div class="location-pro">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                            <g clip-path="url(#clip0_5506_14919)">
                                                                <path d="M4.66602 12.8382C3.12321 13.5188 2.16602 14.4673 2.16602 15.5163C2.16602 17.5873 5.89698 19.2663 10.4993 19.2663C15.1017 19.2663 18.8327 17.5873 18.8327 15.5163C18.8327 14.4673 17.8755 13.5188 16.3327 12.8382M15.4993 7.59961C15.4993 10.986 11.7493 12.5996 10.4993 15.0996C9.24935 12.5996 5.49935 10.986 5.49935 7.59961C5.49935 4.83819 7.73793 2.59961 10.4993 2.59961C13.2608 2.59961 15.4993 4.83819 15.4993 7.59961ZM11.3327 7.59961C11.3327 8.05985 10.9596 8.43294 10.4993 8.43294C10.0391 8.43294 9.66602 8.05985 9.66602 7.59961C9.66602 7.13937 10.0391 6.76628 10.4993 6.76628C10.9596 6.76628 11.3327 7.13937 11.3327 7.59961Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_5506_14919">
                                                                    <rect width="20" height="20" fill="white" transform="translate(0.5 0.933594)"/>
                                                                </clipPath>
                                                            </defs>
                                                        </svg> &nbsp; ${data.location_name}}
                </div>
                <div class="prices-pro">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                        <g clip-path="url(#clip0_5506_14923)">
                            <path d="M10.4993 5.93294V10.9329L13.8327 12.5996M18.8327 10.9329C18.8327 15.5353 15.1017 19.2663 10.4993 19.2663C5.89698 19.2663 2.16602 15.5353 2.16602 10.9329C2.16602 6.33057 5.89698 2.59961 10.4993 2.59961C15.1017 2.59961 18.8327 6.33057 18.8327 10.9329Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_5506_14923">
                                <rect width="20" height="20" fill="white" transform="translate(0.5 0.933594)"/>
                            </clipPath>
                        </defs>
                    </svg> &nbsp;${data.price} ${data.price_unit ?? 'VND'}
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
                nameResult = nameResult + data.name + '<br> ';
            }
            await $('#resultBookingDetail').empty().append(html);
            await $('#nameResult').empty().append(nameResult);
        }
    </script>
@endsection

