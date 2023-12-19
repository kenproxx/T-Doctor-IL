@php use App\Enums\CouponStatus; @endphp
@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.admin')
@section('title', 'List Coupon')
@section('main-content')
    <link href="{{ asset('css/tabcreatecoupon.css') }}" rel="stylesheet">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('home.Create Coupon') }}</h1>
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
            <div class="col-sm-4"><label for="title">{{ __('home.tiêu đề việt') }}</label>
                <input type="text" class="form-control" id="title" name="title"></div>
            <div class="col-sm-4"><label for="title_en">{{ __('home.tiêu đề anh') }}</label>
                <input type="text" class="form-control" id="title_en" name="title_en" value=""></div>
            <div class="col-sm-4"><label for="title_laos">{{ __('home.tiêu đề lào') }}</label>
                <input type="text" class="form-control" id="title_laos" name="title_laos"
                       value=""></div>
        </div>
        <div class="row">
            <div class="col-sm-4"><label for="short_description">{{ __('home.Mô tả ngắn việt') }}</label>
                <textarea class="form-control" name="short_description" id="short_description"></textarea>
            </div>
            <div class="col-sm-4"><label for="short_description_en">{{ __('home.Mô tả ngắn anh') }}</label>
                <textarea class="form-control" name="short_description_en" id="short_description_en"></textarea>
            </div>
            <div class="col-sm-4"><label for="short_description_laos">{{ __('home.Mô tả ngắn lào') }}</label>
                <textarea class="form-control" name="short_description_laos" id="short_description_laos"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"><label for="description">{{ __('home.Mô tả dài việt') }}</label>
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>
            <div class="col-sm-4"><label for="description_en">{{ __('home.Mô tả dài anh') }}</label>
                <textarea class="form-control" name="description_en" id="description_en"></textarea>
            </div>
            <div class="col-sm-4"><label for="description_laos">{{ __('home.Mô tả dài lào') }}</label>
                <textarea class="form-control" name="description_laos" id="description_laos"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6"><label for="startDate">{{ __('home.Thời gian bắt đầu') }}</label>
                <input type="datetime-local" class="form-control" id="startDate" name="startDate"></div>
            <div class="col-sm-6"><label for="endDate">{{ __('home.Thời gian kết thúc') }}</label>
                <input type="datetime-local" class="form-control" id="endDate" name="endDate"></div>
        </div>
        <div class="row">
            <div class="col-sm-6"><label for="max_register">{{ __('home.Số lượng đký tối đa') }}</label>
                <input type="number" class="form-control" id="max_register" name="max_register">
            </div>
            <div class="col-sm-6"><label for="clinic_id">{{ __('home.Đơn vị áp dụng') }}</label>
                <select class="form-select" id="clinic_id">
                    <option selected>{{ __('home.Choose...') }}</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6"><label>{{ __('home.Ảnh bìa') }}</label>
                <div class="box">
                    <div class="js--image-preview"></div>
                    <div class="upload-options">
                        <label>
                            <input type="file" class="image-upload" accept="image/*" id="thumbnail" name="thumbnail"/>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary up-date-button mt-md-4">{{ __('home.Save') }}</button>
    </form>
    <script>


        $(document).ready(function () {
            $('.up-date-button').on('click', function () {
                const headers = {
                    'Authorization': `Bearer ${token}`
                };
                const formData = new FormData();

                const fieldNames = [
                    "title", "title_en", "title_laos", "startDate", "endDate",
                    "max_register", "status" ,"clinic_id"
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

                formData.append("user_id", '{{ Auth::user()->id }}');
                formData.append("thumbnail", $('#thumbnail')[0].files[0]);

                try {
                    $.ajax({
                        url: `{{route('api.backend.coupons.create')}}`,
                        method: 'POST',
                        headers: headers,
                        contentType: false,
                        cache: false,
                        processData: false,
                        data: formData,
                        success: function () {
                            alert('success');
                            window.location.href = '{{ route('homeAdmin.list.coupons') }}'
                        },
                        error: function (exception) {
                            console.log(exception)
                        }
                    });
                } catch (error) {
                    throw error;
                }
            })
        })

        genSelectOption();

        async function genSelectOption() {
            const headers = {
                'Authorization': `Bearer ${token}`
            };
            let response = await fetch(`{{route('api.backend.clinics.all-clinic-active')}}`, {
                method: 'GET',
                headers: headers,
            });
            let html = '';
            if (response.ok) {
                const data = await response.json();
                data.forEach(item => {
                    html += `<option value="${item.id}">${item.name}</option>`
                })
                $('#clinic_id').html(html);
            }
        }
    </script>

    <script>
        function initImageUpload(box) {
            let uploadField = box.querySelector('.image-upload');

            uploadField.addEventListener('change', getFile);

            function getFile(e) {
                let file = e.currentTarget.files[0];
                checkType(file);
            }

            function previewImage(file) {
                let thumb = box.querySelector('.js--image-preview'),
                    reader = new FileReader();

                thumb.innerHTML = '';
                reader.onload = function () {
                    thumb.style.backgroundImage = 'url(' + reader.result + ')';
                }
                reader.readAsDataURL(file);
                thumb.className += ' js--no-default';
            }

            function checkType(file) {
                let imageType = /image.*/;
                if (!file.type.match(imageType)) {
                    throw 'Datei ist kein Bild';
                } else if (!file) {
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

        function initDropEffect(box) {
            let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;

            // get clickable area for drop effect
            area = box.querySelector('.js--image-preview');
            area.addEventListener('click', fireRipple);

            function fireRipple(e) {
                area = e.currentTarget
                // create drop
                if (!drop) {
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
                x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10) / 2);
                y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10) / 2) - 30;

                // position drop and animate
                drop.style.top = y + 'px';
                drop.style.left = x + 'px';
                drop.className += ' animate';
                e.stopPropagation();

            }
        }

    </script>

@endsection
