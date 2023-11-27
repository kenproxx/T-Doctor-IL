@extends('layouts.master')
@section('title', 'Flea Market')
@section('content')
    @include('layouts.partials.headerFleaMarket')
    <body>
    @include('component.banner')
    <div class="container content-add">
        <div class="add-cv_text">
            <div class="ac-text_content font-18-mobi"><a href="{{route('flea-market.index')}}"><i
                        class="fa-solid fa-arrow-left mr-4"
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
                                    <input class="ac-email font-16-mobi checkValid" required name="name" id="name"
                                           value=""
                                           placeholder="example123">
                                </div>
                            </div>
                        </div>
                        <div class="d-block d-md-flex ">
                            <div class="col-md-6 pl-0 pr-0 pr-md-3">
                                <div class="text-font-16 mt-md-4 mt-3 font-14-mobi">
                                    <p><span>Category </span><span class="red-color"> *</span></p>
                                    <div class="w-100 mt-md-2">

                                        <select class="ac-choose font-16-mobi mt-2" name="category_id checkValid"
                                                required id="category_id">
                                            @foreach($category as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="text-font-16 font-14-mobi mt-45 mt-3">
                                    <p><span>Location </span> <span class="red-color">*</span></p>
                                    <div class="w-100 mt-2">
                                        <select class="ac-choose font-16-mobi mt-2" id="province_id"
                                                name="province_id checkValid"
                                                required>
                                            @foreach($province as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0 pl-0 pl-md-3">
                                <div class="text-font-16 font-14-mobi mt-md-4 mt-3">
                                    <p><span>Brand name </span></p>
                                    <div class="w-100 mt-2 d-flex col-12 p-0">
                                        <div class="p-0 col-md-9 mt-2 col-8">
                                            <input class="web ac-nation font-16-mobi" style="max-width: 100%"
                                                   name="brand_name" id="brand_name" placeholder="0123456789">
                                        </div>
                                        <div class="pr-0 col-md-3 mt-2 col-4">
                                            <a href="#" id="disabledInput" class="no-brand">No Brand</a>
                                        </div>
                                    </div>
                                    <small class="fs-12">If you don't remember the brand name, you can leave it blank or
                                        click to select no brand</small>
                                </div>
                                <div class="text-font-16 font-14-mobi mt-md-4 mt-3">
                                    <p><span>Price </span> <span class="red-color">*</span></p>
                                    <div class="w-100 mt-2">
                                        <input class="web ac-nation font-16-mobi mt-2" name="price checkValid" required
                                               id="price"
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
                        <textarea class="form-control ac-textarea mt-md-3 checkValid" name="description"
                                  id="description" required
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
                        <div class="pl-0 d-flex">
                            <div class="p-0 d-flex">
                                <div id="imagePreview"></div>
                                <label for="gallery" class="p-0">
                                    <img class="p-0 img-sell-product"
                                         src="{{asset('img/flea-market/add-photo.png')}}">
                                </label>
                                <input type="file" id="gallery" name="gallery[]" style="display: none;" multiple
                                       accept="image/*">
                                <button id="chooseImageBtn" type="button" style="display: none">Chọn ảnh</button>
                            </div>
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
                            <input type="radio" class="web-tick-box" name="ads_period" value="1">
                            <label class="ml-2"><strong>5 Day</strong></label>
                        </div>
                        <div class="col-md-3 d-flex text-wrapper-input pl-0 ">
                            <input type="radio" class="web-tick-box" name="ads_period" value="2">
                            <label class=" ml-2"><strong>10 Day</strong></label>
                        </div>
                        <div class="col-md-3 d-flex text-wrapper-input pl-0">
                            <input type="radio" class="web-tick-box" name="ads_period" value="3">
                            <label class=" ml-2"><strong>15 Day</strong></label>
                        </div>
                        <div class="col-md-3 d-flex text-wrapper-input pl-0">
                            <input type="radio" class="web-tick-box" name="ads_period" value="4">
                            <label class=" ml-2"><strong>20 Day</strong></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-md-3 col-6">
                    <button type="submit" class="add-cv-bt w-100 apply-bt_delete">Cancel</button>
                </div>
                <div class="col-md-3 col-6">
                    <button type="button" id="submitButton" class="add-cv-bt w-100 apply-bt_edit create-button">
                        Register
                    </button>
                </div>
            </div>
        </form>
    </div>
    </body>
    <script>
        document.getElementById('chooseImageBtn').addEventListener('click', function () {
            document.getElementById('gallery').click();
        });
        document.getElementById('gallery').addEventListener('change', function () {
            const selectedImages = this.files;
            for (let i = 0; i < selectedImages.length; i++) {
            }
        });
    </script>
    <script>
        document.getElementById('disabledInput').addEventListener('click', function (event) {
            event.preventDefault();

            const inputElement = document.getElementById('brand_name');

            if (inputElement.disabled) {
                inputElement.disabled = false;
                alert('You can enter the brand name')
            } else {
                inputElement.disabled = true;
                alert('You can not enter the brand name')
            }
        });
    </script>
    <script>
        document.getElementById('submitButton').addEventListener('click', function () {
            const inputElements = document.getElementsByClassName('checkValid');
            for (let i = 0; i < inputElements.length; i++) {
                const inputElement = inputElements[i];
                if (!inputElement.checkValidity()) {
                    alert('Please fill out the required field in element ' + (i + 1));
                    return;
                }
            }
            alert('Form is valid. Submitting...');
        });
    </script>
    <script>
        const token = `{{ $_COOKIE['accessToken'] }}`;
        let imgGallery = [];
        document.getElementById('gallery').addEventListener('change', function () {
            const imagePreviews = document.getElementById('imagePreview');
            imagePreviews.innerHTML = '';

            const selectedImages = this.files;
            for (let i = 0; i < selectedImages.length; i++) {
                const file = this.files[i];

                const image = document.createElement('img');
                image.src = URL.createObjectURL(file);
                image.alt = 'Preview Image';
                image.className = 'img-sell-product col-6 b-radius-8px';
                // image.className = 'col-6';
                // image.style.maxHeight = '200px';
                // image.style.maxWidth = '200px';
                image.style.paddingBottom = '16px';
                imagePreviews.appendChild(image);
            }
        });

        let selectedValue = '';
        document.querySelectorAll('input[name="ads_period"]').forEach(function (radio) {
            radio.addEventListener('change', function () {
                if (this.checked) {
                    selectedValue = this.value;
                }
            });
        });
        let selectedValueAdd = '';
        document.querySelectorAll('input[name="ads_plan"]').forEach(function (radio) {
            radio.addEventListener('change', function () {
                if (this.checked) {
                    selectedValueAdd = this.value;
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
                formData.append("name_laos", $('#name').val());
                formData.append("category_id", $('#category_id').val());
                formData.append("brand_name", $('#brand_name').val());
                formData.append("brand_name_en", $('#brand_name').val());
                formData.append("brand_name_laos", $('#brand_name').val());
                formData.append("province_id", $('#province_id').val());
                formData.append("price", $('#price').val());
                formData.append("price_unit", 'VND');
                formData.append("ads_plan", (selectedValueAdd));
                const fieldTextareaTiny = ["description"];
                console.log(fieldTextareaTiny)
                fieldTextareaTiny.forEach(fieldTextarea => {
                    const content = tinymce.get(fieldTextarea).getContent();
                    formData.append(fieldTextarea, content);
                    console.log(content)
                });
                formData.append("ads_period", (selectedValue));
                formData.append("user_id", {{Auth::user()->id}});
                let photo = '';
                var filedata = document.getElementById("gallery");
                var i = 0, len = filedata.files.length, img, reader, file;
                for (i; i < len; i++) {
                    file = filedata.files[i];
                    if (i == 0) {
                        photo = file;
                    }
                    formData.append('gallery[]', file);
                }
                formData.append('thumbnail', photo);
                formData.append('status', 'ACTIVE');
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
                        }
                    });
                } catch (error) {
                    throw error;
                }
            });
        })
    </script>
@endsection
