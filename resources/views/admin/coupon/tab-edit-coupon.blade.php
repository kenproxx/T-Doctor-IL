@extends('layouts.admin')

@section('main-content')

    <style>

        .box {
            display: block;
            width: 300px;
            height: 300px;
            margin: 10px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            overflow: hidden;
        }

        .upload-options {
            position: relative;
            height: 75px;
            background-color: cadetblue;
            cursor: pointer;
            overflow: hidden;
            text-align: center;
            transition: background-color ease-in-out 150ms;
        }
        .upload-options:hover {
            background-color: #7fb1b3;
        }
        .upload-options input {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }
        .upload-options label {
            display: flex;
            align-items: center;
            width: 100%;
            height: 100%;
            font-weight: 400;
            text-overflow: ellipsis;
            white-space: nowrap;
            cursor: pointer;
            overflow: hidden;
        }
        .upload-options label::after {
            content: "add";
            font-family: "Material Icons";
            position: absolute;
            font-size: 2.5rem;
            color: #e6e6e6;
            top: calc(50% - 2.5rem);
            left: calc(50% - 1.25rem);
            z-index: 0;
        }
        .upload-options label span {
            display: inline-block;
            width: 50%;
            height: 100%;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            vertical-align: middle;
            text-align: center;
        }
        .upload-options label span:hover i.material-icons {
            color: lightgray;
        }

        .js--image-preview {
            height: 225px;
            width: 100%;
            position: relative;
            overflow: hidden;
            background-image: url("");
            background-color: white;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .js--image-preview::after {
            position: relative;
            font-size: 4.5em;
            color: #e6e6e6;
            top: calc(50% - 3rem);
            left: calc(50% - 2.25rem);
            z-index: 0;
        }
        .js--image-preview.js--no-default::after {
            display: none;
        }
        .js--image-preview:nth-child(2) {
            background-image: url("http://bastianandre.at/giphy.gif");
        }

        i.material-icons {
            transition: color 100ms ease-in-out;
            font-size: 2.25em;
            line-height: 55px;
            color: white;
            display: block;
        }

        .drop {
            display: block;
            position: absolute;
            background: rgba(95, 158, 160, 0.2);
            border-radius: 100%;
            transform: scale(0);
        }

        .animate {
            -webkit-animation: ripple 0.4s linear;
            animation: ripple 0.4s linear;
        }

        @-webkit-keyframes ripple {
            100% {
                opacity: 0;
                transform: scale(2.5);
            }
        }

        @keyframes ripple {
            100% {
                opacity: 0;
                transform: scale(2.5);
            }
        }
    </style>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Coupon</h1>
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form id="form" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-4"><label>tiêu đề việt</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $coupon->title }}"></div>
            <div class="col-sm-4"><label>tiêu đề anh</label>
                <input type="text" class="form-control" id="title_en" name="title_en" value="{{ $coupon->title_en }}"></div>
            <div class="col-sm-4"><label>tiêu đề lào</label>
                <input type="text" class="form-control" id="title_laos" name="title_laos"
                       value="{{ $coupon->title_laos }}"></div>
        </div>
        <div class="row">
            <div class="col-sm-4"><label>Mô tả ngắn việt</label>
                <textarea class="form-control" name="short_description" id="short_description">{{ $coupon->short_description }}</textarea>
            </div>
            <div class="col-sm-4"><label>Mô tả ngắn anh</label>
                <textarea class="form-control" name="short_description_en" id="short_description_en">{{ $coupon->short_description_en }}</textarea>
            </div>
            <div class="col-sm-4"><label>Mô tả ngắn lào</label>
                <textarea class="form-control" name="short_description_laos" id="short_description_laos">{{ $coupon->short_description_laos }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"><label>Mô tả dài việt</label>
                <textarea class="form-control" name="description" id="description">{{ $coupon->description }}</textarea>
            </div>
            <div class="col-sm-4"><label>Mô tả dài anh</label>
                <textarea class="form-control" name="description_en" id="description_en">{{ $coupon->description_en }}</textarea>
            </div>
            <div class="col-sm-4"><label>Mô tả dài lào</label>
                <textarea class="form-control" name="description_laos" id="description_laos">{{ $coupon->description_laos }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6"><label>Thời gian bắt đầu</label>
                <input type="datetime-local" class="form-control" id="startDate" name="startDate" value="{{ $coupon->startDate }}"></div>
            <div class="col-sm-6"><label>Thời gian kết thúc</label>
                <input type="datetime-local" class="form-control" id="endDate" name="endDate" value="{{ $coupon->endDate }}"></div>
        </div>
        <div class="row">
            <div class="col-sm-6"><label>Số lượng đký tối đa</label>
                <input type="number" class="form-control" id="max_register" name="max_register" value="{{ $coupon->max_register }}">
            </div>
            <div class="col-sm-6"><label>Trạng thái</label>
                <select class="custom-select" id="status" name="status">
                    <option value="{{ \App\Enums\CouponStatus::ACTIVE }}" {{ $coupon->status === \App\Enums\CouponStatus::ACTIVE ? 'selected' : '' }}>
                        {{ \App\Enums\CouponStatus::ACTIVE }}
                    </option>
                    <option value="{{ \App\Enums\CouponStatus::INACTIVE }}" {{ $coupon->status === \App\Enums\CouponStatus::INACTIVE ? 'selected' : '' }}>
                        {{ \App\Enums\CouponStatus::INACTIVE }}
                    </option>
                    <option value="{{ \App\Enums\CouponStatus::DELETED }}" {{ $coupon->status === \App\Enums\CouponStatus::DELETED ? 'selected' : '' }}>
                        {{ \App\Enums\CouponStatus::DELETED }}
                    </option>
                </select>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12"><label>Ảnh bìa</label>
                <div class="box">

                    <div class="js--image-preview"><img src="{{ asset($coupon->thumbnail) }}" class="w-100 h-100" style="object-fit: cover" alt=""></div>
                    <div class="upload-options">
                        <label>
                            <input type="file" class="image-upload" accept="image/*" id="thumbnail" name="thumbnail"/>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary up-date-button mt-md-4">Lưu</button>
    </form>
    <script>

        const token = `{{ $_COOKIE['accessToken'] }}`;
        $(document).ready(function () {
            $('.up-date-button').on('click', function () {
                const headers = {
                    'Authorization': `Bearer ${token}`
                };
                const formData = new FormData();

                const fieldNames = [
                    "title", "title_en", "title_laos", "startDate", "endDate",
                    "max_register", "status"
                ];

                const fieldTextareaTiny = [
                    "short_description", "short_description_en", "short_description_laos",
                    "description", "description_en", "description_laos"
                ];

                fieldNames.forEach(fieldName => {
                    formData.append(fieldName, $(`#${fieldName}`).val());
                });
                fieldTextareaTiny.forEach(fieldTextarea => {
                    const content = tinymce.get(fieldTextarea).getContent();
                    formData.append(fieldTextarea, content);
                });

                formData.append("user_id", '{{ \Illuminate\Support\Facades\Auth::user()->id }}');
                formData.append("thumbnail", $('#thumbnail')[0].files[0]);

                try {
                    $.ajax({
                        url: `{{route('api.backend.coupons.update', ['id' => $coupon->id])}}`,
                        method: 'post',
                        headers: headers,
                        contentType: false,
                        cache: false,
                        processData: false,
                        data: formData,
                        success: function () {
                            alert('success');
                            window.location.href = '/admin/home/list-coupon';
                        },
                        error: function (exception) {
                            console.log(exception);
                        }
                    });
                } catch (error) {
                    throw error;
                }
            })
        })
    </script>

    <script>
        function initImageUpload(box) {
            let uploadField = box.querySelector('.image-upload');

            uploadField.addEventListener('change', getFile);

            function getFile(e){
                let file = e.currentTarget.files[0];
                checkType(file);
            }

            function previewImage(file){
                let thumb = box.querySelector('.js--image-preview'),
                    reader = new FileReader();

                thumb.innerHTML = '';
                reader.onload = function() {
                    thumb.style.backgroundImage = 'url(' + reader.result + ')';
                }
                reader.readAsDataURL(file);
                thumb.className += ' js--no-default';
            }

            function checkType(file){
                let imageType = /image.*/;
                if (!file.type.match(imageType)) {
                    throw 'Datei ist kein Bild';
                } else if (!file){
                    throw 'Kein Bild gewählt';
                } else {
                    previewImage(file);
                }
            }

        }

        var boxes = document.querySelectorAll('.box');

        for (let i = 0; i < boxes.length; i++) {
            let box = boxes[i];
            initDropEffect(box);
            initImageUpload(box);
        }

        function initDropEffect(box){
            let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;

            // get clickable area for drop effect
            area = box.querySelector('.js--image-preview');
            area.addEventListener('click', fireRipple);

            function fireRipple(e){
                area = e.currentTarget
                // create drop
                if(!drop){
                    drop = document.createElement('span');
                    drop.className = 'drop';
                    this.appendChild(drop);
                }
                // reset animate class
                drop.className = 'drop';

                // calculate dimensions of area (longest side)
                areaWidth = getComputedStyle(this, null).getPropertyValue("width");
                areaHeight = getComputedStyle(this, null).getPropertyValue("height");
                maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

                // set drop dimensions to fill area
                drop.style.width = maxDistance + 'px';
                drop.style.height = maxDistance + 'px';

                // calculate dimensions of drop
                dropWidth = getComputedStyle(this, null).getPropertyValue("width");
                dropHeight = getComputedStyle(this, null).getPropertyValue("height");

                // calculate relative coordinates of click
                // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
                x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10)/2);
                y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10)/2) - 30;

                // position drop and animate
                drop.style.top = y + 'px';
                drop.style.left = x + 'px';
                drop.className += ' animate';
                e.stopPropagation();

            }
        }

    </script>
@endsection
