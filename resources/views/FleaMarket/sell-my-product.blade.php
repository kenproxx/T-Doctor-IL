@extends('layouts.master')
@section('title', 'Flea Market')
@section('content')
    @include('layouts.partials.headerFleaMarket')
    <body>
    @include('component.banner')
    <div class="container content-add">
        <div class="add-cv_text">
            <div class="ac-text_content font-18-mobi"><a href=""><i class="fa-solid fa-arrow-left mr-4"
                                                                    style="color: black"></i></a>Product details
            </div>
        </div>
        <form action="#">
            <div class="d-flex row">
                <div class="col-md-12">
                    <div class="">
                        <div class="">
                            <div class="text-font-24 font-16-mobi mt-3 mt-md-4">Product information</div>
                        </div>
                        <div class="p-0 col-md-12 border-top">
                            <div class="text-font-16 mt-4 font-14-mobi">
                                <p><span>Product name </span><span class="red-color"> *</span></p>
                                <div class="w-100 mt-2">
                                    <input class="ac-email font-16-mobi" name="name" id="name" value=""
                                           placeholder="example123" required>
                                </div>
                            </div>
                        </div>
                        <div class="d-block d-md-flex ">
                            <div class="col-md-6 pl-0 pr-0 pr-md-3">
                                <div class="text-font-16 mt-md-4 mt-3 font-14-mobi">
                                    <p><span>Category </span><span class="red-color"> *</span></p>
                                    <div class="w-100 mt-md-2">

                                        <select class="ac-choose font-16-mobi mt-2" name="category_id" id="category_id">
                                            <option value="">Please choose....</option>
                                            <option value="">123</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-font-16 font-14-mobi mt-md-4 mt-3">
                                    <p><span>Location </span> <span class="red-color">*</span></p>
                                    <div class="w-100 mt-2">
                                        <select class="ac-choose font-16-mobi mt-2" name="province_id">
                                            <option value="">Please choose....</option>
                                            <option value="">123</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0 pl-0 pl-md-3">
                                <div class="text-font-16 font-14-mobi mt-md-4 mt-3">
                                    <p><span>Brand name </span></p>
                                    <div class="w-100 mt-2 d-flex col-12 p-0">
                                        <div class="p-0 col-md-9 mt-2 col-8"><input class="web ac-nation font-16-mobi "
                                                                                    style="max-width: 100%"
                                                                                    name="brand_name" id="brand_name"
                                                                                    placeholder="0123456789"></div>
                                        <div class="pr-0 col-md-3 mt-2 col-4"><a href="" class=" no-brand ">No
                                                Brand </a></div>
                                    </div>
                                </div>
                                <div class="text-font-16 font-14-mobi mt-md-4 mt-3">
                                    <p><span>Price </span> <span class="red-color">*</span></p>
                                    <div class="w-100 mt-2">
                                        <input class="web ac-nation font-16-mobi mt-2" name="price" id="price"
                                               placeholder="Please choose....">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cv-about col-md-12">
                    <div class="">
                        <div class="text-font-24 font-14-mobi mt-md-4 mt-3">Detailed description</div>
                    </div>
                    <div class="mt-md-3 mt-2 font-16-mobi">
                        <textarea class="ac-textarea mt-md-3" name="description" id="description"
                                  placeholder="Enter an introduction about yourself"></textarea>
                    </div>
                    <div class="d-flex mt-2 font-10-mobi">
                        <i class="fa-solid fa-circle-exclamation text-center"
                           style="color: red;    padding: 4px 8px;"></i>
                        <p>When promoting your website and exposing the website address, use of site will be
                            suspended</p>
                    </div>
                </div>
                <div class="">
                    <div class="text-font-24 font-14-mobi">Photo</div>
                    <div class="d-flex mt-2">
                        <div class=" pl-0 d-flex">
                            <div class="d-flex" id="galleryPreviews"></div>
                            <a id="galleryButton" class="p-0"><img class=" p-0" width="200px" height="200px"
                                                                        src="{{asset('img/flea-market/add-photo.png')}}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text-font-24 mt-4 col-md-12 font-14-mobi">
                    <p><span>Please choose you adertisement plan </span><span class="red-color">*</span></p>
                    <div class="mt-2 d-flex font-12-mobi">
                        <div class="text-wrapper-input col-md-4 d-flex pl-0">
                            <input type="radio" class="web-tick-box" name="ads_plan" id="ads_plan" value="1">
                            <label class="ml-2"><strong>Platinum</strong></label>
                        </div>
                        <div class="col-md-4 d-flex text-wrapper-input ">
                            <input type="radio" class="web-tick-box" name="ads_plan" id="ads_plan" value="2">
                            <label class=" ml-2"><strong>Premium</strong></label>
                        </div>
                        <div class="col-md-4 d-flex text-wrapper-input">
                            <input type="radio" class="web-tick-box" name="ads_plan" id="ads_plan" value="3">
                            <label class=" ml-2"><strong>Silver</strong></label>
                        </div>
                    </div>
                </div>
                <div class="text-font-24 mt-4 col-md-12 mb-80 font-14-mobi">
                    <p><span>Advetisement period</span><span class="red-color">*</span></p>
                    <div class="mt-2 d-flex font-12-mobi">
                        <div class="text-wrapper-input col-md-3 d-flex pl-0">
                            <input type="radio" class="web-tick-box" name="ads_period" id="ads_period" value="1">
                            <label class="ml-2"><strong>5 Day</strong></label>
                        </div>
                        <div class="col-md-3 d-flex text-wrapper-input pl-0 ">
                            <input type="radio" class="web-tick-box" name="ads_period" id="ads_period" value="2">
                            <label class=" ml-2"><strong>10 Day</strong></label>
                        </div>
                        <div class="col-md-3 d-flex text-wrapper-input pl-0">
                            <input type="radio" class="web-tick-box" name="ads_period" id="ads_period" value="3">
                            <label class=" ml-2"><strong>15 Day</strong></label>
                        </div>
                        <div class="col-md-3 d-flex text-wrapper-input pl-0">
                            <input type="radio" class="web-tick-box" name="ads_period" id="ads_period" value="4">
                            <label class=" ml-2"><strong>20 Day</strong></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-3">
                    <button type="submit" class="add-cv-bt w-100 apply-bt_delete">Cancel</button>
                </div>
                <div class="col-3">
                    <button type="button" class="add-cv-bt w-100 apply-bt_edit create-button">Register</button>
                </div>
            </div>
        </form>

    </div>
    </body>
    <script>
        const token = `{{ $_COOKIE['accessToken'] }}`;
        let imgGallery = [];
        document.getElementById('galleryButton').addEventListener('click', function () {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            input.multiple = true;
            // Lắng nghe sự kiện change của thẻ input
            input.addEventListener('change', function () {
                imgGallery = this.files;
                const imagePreviews = document.getElementById('galleryPreviews');
                imagePreviews.innerHTML = ''; // Xóa các hình ảnh hiển thị trước
                // Lặp qua danh sách các tệp đã chọn
                for (let i = 0; i < 4; i++) {
                    const file = this.files[i];

                        // Tạo một thẻ <img> để hiển thị hình ảnh
                        const image = document.createElement('img');
                        image.src = URL.createObjectURL(file); // Tạo URL dựa trên tệp
                        image.alt = 'Preview Image';
                        image.style.maxHeight = '200px';
                        image.style.maxWidth = '200px';
                        image.style.paddingRight = '8px';
                        imagePreviews.appendChild(image);

                }
                console.log(imgGallery)
            });
            input.click();
        });
        document.querySelectorAll('input[name="ads_period"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                if (this.checked) {
                    const selectedValue = this.value;
                    console.log('Selected value: ' + selectedValue);
                }
            });
        });
        $(document).ready(function () {
            $('.create-button').on('click', function () {
                const headers = {
                    'Authorization': `Bearer ${token}`
                };
                const formData = new FormData();
                formData.append("name", $('#name').val());
                formData.append("name_en", $('#name').val());
                formData.append("category_id", $('#category_id').val());
                formData.append("brand_name", $('#brand_name').val());
                formData.append("brand_name_en", $('#brand_name').val());
                formData.append("province_id", '1');
                formData.append("price", $('#price').val());
                formData.append("price_unit", 'VND');
                formData.append("ads_plan", $('#ads_plan').val());
                formData.append("description", $('#description').val());
                formData.append("ads_period", $('#ads_period').val());
                formData.append("user_id", {{Auth::user()->id}});
                formData.append("gallery", imgGallery);

                console.log(imgGallery)

                formData.append('status', 'ACTIVE');
                console.log(formData)
                try {
                    $.ajax({
                        url: `{{route('api.backend.products.create')}}`,
                        method: 'POST',
                        headers: headers,
                        contentType: false,
                        cache: false,
                        processData: false,
                        data: formData,
                        success: function (response) {
                            alert('success');
                            window.location.reload();
                        },
                        error: function (exception) {
                            console.log(exception)
                        }
                    });
                } catch (error) {
                    console.log(error);
                    throw error;
                }
            })

        })
    </script>
@endsection
