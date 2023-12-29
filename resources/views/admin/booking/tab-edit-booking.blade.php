@extends('layouts.admin')
@section('title')
    {{ __('home.Edit') }}
@endsection
@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('home.List Booking') }}</h1>
        <form id="form" action="{{route('api.backend.booking.update',$bookings_edit->id)}}" method="post"
              enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label for="user">{{ __('home.Tên người đăng ký') }}</label>
                    @php
                        $user_name = \Illuminate\Foundation\Auth\User::where('id',$bookings_edit->user_id)->value('name');
                    @endphp
                    <input type="text" class="form-control" id="user" name="user" value="{{$user_name}}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="clinic_id">BusinessName</label>
                    @php
                        $clinic_name = \App\Models\Clinic::where('id',$bookings_edit->clinic_id)->value('name');
                    @endphp
                    <input type="text" class="form-control" id="user" name="clinic_id" value="{{$clinic_name}}"
                           disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="service_text">{{ __('home.dịch vụ') }}</label>
                    <input type="text" class="form-control" id="service_text" name="service_text" disabled>
                    @php
                        $arrayService = explode(',', $bookings_edit->service);
                        $list_service_name = \App\Models\ServiceClinic::whereIn('id', $arrayService)
                            ->where('status', \App\Enums\ServiceClinicStatus::ACTIVE)
                            ->get();
                        $names = null;
                        foreach ($list_service_name as $item){
                            if ($names){
                                $names = $names .','. $item->name;
                            } else {
                                $names = $item->name;
                            }
                        }
                    @endphp
                    <ul class="list-service " style="list-style: none; padding-left: 0">
                        @foreach($services as $service)
                            <li class="new-select">
                                <input onchange="getInputService();" class="service_item" value="{{$service->id}}"
                                       id="service_{{$service->id}}"
                                       {{ in_array($service->id, $arrayService) ? 'checked' : '' }}
                                       name="service_item"
                                       type="checkbox">
                                <label for="service_{{$service->id}}">{{$service->name}}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="check_in">{{ __('home.Thời gian bắt đầu') }}</label>
                    <input type="datetime-local" class="form-control" id="check_in" name="check_in"
                           value="{{ $bookings_edit->check_in }}">
                </div>
                <div class="col-md-3">
                    <label for="check_out">{{ __('home.Thời gian kết thúc') }}</label>
                    <input type="datetime-local" class="form-control" id="check_out" name="check_out"
                           value="{{ $bookings_edit->check_out }}">
                </div>
                <div class="col-md-3">
                    <label for="booking_status">{{ __('home.Trạng thái') }}</label>
                    <select class="form-select" id="booking_status" name="status">
                        <option
                            value="{{ \App\Enums\BookingStatus::PENDING }}" {{ $bookings_edit->status === \App\Enums\BookingStatus::PENDING ? 'selected' : '' }}>
                            {{ \App\Enums\BookingStatus::PENDING }}
                        </option>
                        <option
                            value="{{ \App\Enums\BookingStatus::COMPLETE }}" {{ $bookings_edit->status === \App\Enums\BookingStatus::COMPLETE ? 'selected' : '' }}>
                            {{ \App\Enums\BookingStatus::COMPLETE }}
                        </option>
                        <option
                            value="{{ \App\Enums\BookingStatus::APPROVED }}" {{ $bookings_edit->status === \App\Enums\BookingStatus::APPROVED ? 'selected' : '' }}>
                            {{ \App\Enums\BookingStatus::APPROVED }}
                        </option>
                        <option
                            value="{{ \App\Enums\BookingStatus::CANCEL }}" {{ $bookings_edit->status === \App\Enums\BookingStatus::CANCEL ? 'selected' : '' }}>
                            {{ \App\Enums\BookingStatus::CANCEL }}
                        </option>
                    </select>
                </div>
                <div class=" col-md-3 mt-4">
                    <label for="services"></label>
                    <input type="checkbox" name="is_result"
                           {{ $bookings_edit->is_result == 1 ? 'checked' : '' }}
                           class="is_result" id="is_result" value="1">
                    <label for="is_result">Result</label>
                </div>
            </div>
            <input type="text" name="services" id="services"
                   class="form-control d-none">
            <button type="submit" class="btn btn-primary up-date-button mt-4">{{ __('home.Save') }}</button>
            @if($bookings_edit->is_result == 1 && $bookings_edit->status === \App\Enums\BookingStatus::COMPLETE )
                @php
                    $old_result = \App\Models\BookingResult::where('booking_id', $bookings_edit->id)->first();
                @endphp
                @if($old_result)
                    <label for="input_old_result"></label>
                    <input type="text" hidden id="input_old_result" value="{{ $old_result->id }}">
                @endif
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success {{ $old_result ? 'btnUnCreate' : '' }} mt-4"
                        data-toggle="modal"
                        data-target="{{ $old_result ? '' : '#exampleModalComplete' }}">
                    Create result
                </button>
            @else
                <button type="button" class="btn btn-success mt-4" data-toggle="modal" data-target="#exampleModal">
                    Create result
                </button>
            @endif
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalComplete" tabindex="-1" aria-labelledby="exampleModalLabelComplete"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelComplete">Create new result</h5>
                    <button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="list-service-result mt-2 mb-3">
                            <div id="list-service-result">

                            </div>
                            <button type="button" class="btn btn-outline-primary mt-3 btnAddNewResult">Add new result
                            </button>
                        </div>

                        <div class="form-group">
                            <label for="files">File Attachments</label>
                            <input type="file" multiple class="form-control" id="files" name="files[]">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="prescriptions">File Prescriptions
                                    <span class="text-danger"> *</span>
                                </label>
                                <input type="file" multiple class="form-control" id="prescriptions"
                                       accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                       name="prescriptions">
                            </div>
                            <div class="form-group col-md-4">
                                <button type="button" class="btnGetFile btn btn-outline-warning mt-4">
                                    Xem đơn mẫu
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="detail">Detail</label>
                            <textarea class="form-control" id="detail" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="detail_en">Detail En</label>
                            <textarea class="form-control" id="detail_en" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="detail_laos">Detail Lao</label>
                            <textarea class="form-control" id="detail_laos" rows="5"></textarea>
                        </div>
                        <div class="d-none">
                            <label for="booking_id">BookingId </label>
                            <input type="text" class="form-control" name="booking_id "
                                   value="{{ $bookings_edit->id }}" id="booking_id">
                            <label for="family_member">FamilyMember </label>
                            <input type="text" class="form-control" name="family_member"
                                   value="{{ $bookings_edit->member_family_id }}" id="family_member">
                            <label for="user_id">UserID</label>
                            <input type="text" class="form-control" name="user_id" value="{{ $bookings_edit->user_id }}"
                                   id="user_id">
                            <label for="created_by">CreatedBy</label>
                            <input type="text" class="form-control" id="created_by" name="created_by "
                                   value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" name="status"
                                   value="{{ \App\Enums\BookingResultStatus::ACTIVE }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btnCreate">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                    <button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Please update status for booking with "Completed" and Select Result to create result!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        let arrayService = [];
        let arrayNameService = [];

        function removeArray(arr) {
            var what, a = arguments, L = a.length, ax;
            while (L > 1 && arr.length) {
                what = a[--L];
                while ((ax = arr.indexOf(what)) !== -1) {
                    arr.splice(ax, 1);
                }
            }
            return arr;
        }

        function getListName(array, items) {
            for (let i = 0; i < items.length; i++) {
                if (items[i].checked) {
                    if (array.length == 0) {
                        array.push(items[i].nextElementSibling.innerText);
                    } else {
                        let name = array.includes(items[i].nextElementSibling.innerText);
                        if (!name) {
                            array.push(items[i].nextElementSibling.innerText);
                        }
                    }
                } else {
                    removeArray(array, items[i].nextElementSibling.innerText)
                }
            }
            return array;
        }

        function checkArray(array, listItems) {
            for (let i = 0; i < listItems.length; i++) {
                if (listItems[i].checked) {
                    if (array.length == 0) {
                        array.push(listItems[i].value);
                    } else {
                        let check = array.includes(listItems[i].value);
                        if (!check) {
                            array.push(listItems[i].value);
                        }
                    }
                } else {
                    removeArray(array, listItems[i].value);
                }
            }
            return array;
        }

        function getInputService() {
            let items = document.getElementsByClassName('service_item');

            arrayService = checkArray(arrayService, items);
            arrayNameService = getListName(arrayNameService, items)

            let listName = arrayNameService.toString();
            if (listName) {
                $('#service_text').val(listName);
            }

            arrayService.sort();
            let value = arrayService.toString();
            $('#services').val(value);
        }

        getInputService();

        let arrayService2 = [];
        let arrayNameService2 = [];

        function getInputServiceName() {
            let items = document.getElementsByClassName('service_name_item');

            arrayService2 = checkArray(arrayService2, items);
            arrayNameService2 = getListName(arrayNameService2, items)

            let listName = arrayNameService2.toString();
            if (listName) {
                $('#service_name').val(listName);
            }

            arrayService2.sort();
            let value = arrayService2.toString();
            $('#service_result').val(value);
        }

        getInputServiceName();
    </script>
    <script>
        let accessToken = `Bearer ` + token;
        let headers = {
            "Authorization": accessToken
        };

        $(document).ready(function () {
            $(window).on('popstate', function() {
                location.reload();
            });

            $('.btnCreate').on('click', function () {
                createBookingResult();
            })

            $('.btnUnCreate').on('click', function () {
                unCreateBooking();
            })

            $('.btnGetFile').on('click', function () {
                window.location.href = `{{ route('user.download') }}`;
                let alertMessage = `Vui lòng nhập vào file theo định dạng mẫu đã được viết sẵn! Chúng tôi không khuyến khích bất kì hành động thay đổi định dạng file hoặc cấu trúc dữ liệu trong file vì điều này sẽ ảnh hướng đến việc đọc hiểu dữ liệu.`
                alert(alertMessage);
            })

            async function createBookingResult() {
                const formData = new FormData();

                const arrField = [
                    "booking_id", "user_id", "created_by", "status",
                ];

                const itemList = [
                    "result", "result_en", "result_laos", "service_result",
                ];

                let isValid = true
                /* Tạo fn appendDataForm ở admin blade */
                isValid = appendDataForm(arrField, formData, isValid);

                formData.append('family_member', $('#family_member').val());

                let my_array = [];

                let result_list = document.getElementsByClassName('result');
                let result_en_list = document.getElementsByClassName('result_en');
                let result_laos_list = document.getElementsByClassName('result_laos');
                let service_result_list = document.getElementsByClassName('service_result');

                let total_service = null;
                for (let j = 0; j < result_list.length; j++) {
                    let result = result_list[j].value;
                    let result_en = result_en_list[j].value;
                    let result_laos = result_laos_list[j].value;
                    let service_result = service_result_list[j].value;

                    if (!result || !result_en || !result_laos || !service_result) {
                        isValid = false;
                    }

                    if (total_service) {
                        total_service = total_service + ',' + service_result;
                    } else {
                        total_service = service_result;
                    }

                    let item = {
                        result: result,
                        result_en: result_en,
                        result_laos: result_laos,
                        service_result: service_result,
                    }
                    item = JSON.stringify(item);
                    my_array.push(item);
                }

                let array_total = total_service.split(',');
                total_service = removeDuplicates(array_total).toString();

                itemList.forEach(item => {
                    if (item === 'service_result') {
                        formData.append(item, total_service);
                    } else {
                        formData.append(item, my_array.toString());
                    }
                });

                const fieldTextareaTiny = [
                    'detail', 'detail_en', 'detail_laos'
                ];

                fieldTextareaTiny.forEach(fieldTextarea => {
                    const content = tinymce.get(fieldTextarea).getContent();
                    formData.append(fieldTextarea, content);
                });

                let files_data = document.getElementById('files');
                let i = 0, len = files_data.files.length, img, reader, file;
                for (i; i < len; i++) {
                    file = files_data.files[i];
                    formData.append('files[]', file);
                }

                let excel_file = $('#prescriptions')[0].files[0];
                if (!excel_file) {
                    isValid = false;
                }
                formData.append('prescriptions', excel_file);

                if (isValid) {
                    try {
                        await $.ajax({
                            url: `{{ route('api.medical.booking.result.create') }}`,
                            method: 'POST',
                            headers: headers,
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: formData,
                            success: function (response) {
                                alert('Create success!')
                                // window.location.href = ``;
                                window.location.href = `{{ route('web.booking.result.list', $bookings_edit->id) }}`;
                            },
                            error: function (error) {
                                console.log(error);
                                alert('Create error!')
                            }
                        });
                    } catch (e) {
                        console.log(e)
                        alert('Error, Please try again!');
                    }
                } else {
                    alert('Sorry, Please enter input require!');
                }
            }

            function unCreateBooking() {
                alert('Booking result already exist!');
            }
        })

        function removeDuplicates(arr) {
            return arr.filter((item, index) => arr.indexOf(item) === index);
        }
    </script>
    <script>
        let html = `<div class="service-result-item d-flex align-items-center justify-content-between border p-3">
                                <div class="service-result">
                                    <div class="form-group">
                                        <label for="service_name">Service Name</label>
                                        <input type="text" class="form-control" id="service_name" disabled value="{{ $names }}"
                                               placeholder="Apartment, studio, or floor">
                                        <ul class="list-service" style="list-style: none; padding-left: 0">
                                            @foreach($services as $service)
        <li class="new-select">
            <input class="service_name_item" data-name="{{$service->name}}"
                   value="{{$service->id}}" {{ in_array($service->id, $arrayService) ? 'checked' : '' }}
        name="service_name_item"
        type="checkbox">
 <label>{{$service->name}}</label>
                                                                                        </li>
                                                                                    @endforeach
        </ul>
        <div class="d-none">
            <label for="service_result">Service Result</label>
            <input type="text" class="form-control service_result" value="{{$bookings_edit->service}}" id="service_result" name="service_result">
        </div>
    </div>
    <div class="form-group">
        <label for="result">Result</label>
        <input type="text" class="form-control result" id="result" placeholder="result">
    </div>
    <div class="form-group">
        <label for="result_en">Result En</label>
        <input type="text" class="form-control result_en" id="result_en" placeholder="result en">
    </div>
    <div class="form-group">
        <label for="result_laos">Result Laos</label>
        <input type="text" class="form-control result_laos" id="result_laos" placeholder="result laos">
    </div>
</div>
<div class="action">
    <i class="fa-regular fa-trash-can btnTrash" style="cursor: pointer; font-size: 24px"></i>
</div>
</div>`;

        $(document).ready(function () {
            $('#list-service-result').append(html);
            $('.btnAddNewResult').on('click', function () {
                $('#list-service-result').append(html);
                loadTrash();
                loadData();
            })

            loadTrash();

            function loadTrash() {
                $('.btnTrash').on('click', function () {
                    let main = $(this).parent().parent();
                    main.remove();
                })
            }

            loadData();

            function loadData() {
                $('.service_name_item').on('click', function () {
                    let my_array = null;
                    let my_name = null;
                    $(this).parent().parent().find(':checkbox:checked').each(function (i) {
                        let value = $(this).val();
                        if (my_array) {
                            my_array = my_array + ',' + value;
                        } else {
                            my_array = value;
                        }

                        let name = $(this).data('name');
                        if (my_name) {
                            my_name = my_name + ', ' + name;
                        } else {
                            my_name = name;
                        }
                    });
                    $(this).parent().parent().prev().val(my_name);
                    $(this).parent().parent().next().find('input').val(my_array);
                })
            }
        })
    </script>
@endsection
