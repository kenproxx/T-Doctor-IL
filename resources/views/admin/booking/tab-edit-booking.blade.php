@extends('layouts.admin')

@section('main-content')
    <form id="form" action="{{route('api.backend.booking.update',$bookings_edit->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-4"><label for="user">Tên người đăng ký</label>
                @php
                    $user_name = \Illuminate\Foundation\Auth\User::where('id',$bookings_edit->user_id)->value('name');
                @endphp
                <input type="text" class="form-control" id="user" name="user" value="{{$user_name}}" disabled></div>
            <div class="col-sm-4"><label for="user">Tên người đăng ký</label>
                @php
                    $clinic_name = \App\Models\Clinic::where('id',$bookings_edit->clinic_id)->value('name');
                @endphp
                <input type="text" class="form-control" id="user" name="user" value="{{$clinic_name}}" disabled></div>
            <div class="col-sm-4" hidden=""><label for="user_id">user_id</label>
                <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $bookings_edit->user_id}}"></div>
            <div class="col-sm-4" hidden=""><label for="clinic_id">clinic_id</label>
                <input type="text" class="form-control" id="clinic_id" name="clinic_id" value="{{ $bookings_edit->clinic_id }}"></div>
            <div class="col-sm-4">
                <label for="service">Dịch vụ</label>
                <!-- Dropdown sử dụng Select2 -->
                <select class="form-control" id="service" name="services[]" multiple>
                    @foreach($service as $item)
                        <option value="{{$item->id}}" {{ in_array($item->id, explode(',', $bookings_edit->service)) ? 'selected' : '' }}>
                            {{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <script>
                $(document).ready(function() {
                    $('#service').select2();
                });
            </script>

        </div>
        <div class="row">
            <div class="col-sm-6"><label for="check_in">Thời gian bắt đầu</label>
                <input type="datetime-local" class="form-control" id="check_in" name="check_in" value="{{ $bookings_edit->check_in }}"></div>
            <div class="col-sm-6"><label for="check_out">Thời gian kết thúc</label>
                <input type="datetime-local" class="form-control" id="check_out" name="check_out" value="{{ $bookings_edit->check_out }}"></div>
        </div>
        <div class="row">
            <div class="col-sm-4"><label for="status">Trạng thái</label>
                <select class="custom-select" id="status" name="status">
                    <option value="{{ \App\Enums\BookingStatus::PENDING }}" {{ $bookings_edit->status === \App\Enums\BookingStatus::PENDING ? 'selected' : '' }}>
                        {{ \App\Enums\BookingStatus::PENDING }}
                    </option>
                    <option value="{{ \App\Enums\BookingStatus::COMPLETE }}" {{ $bookings_edit->status === \App\Enums\BookingStatus::COMPLETE ? 'selected' : '' }}>
                        {{ \App\Enums\BookingStatus::COMPLETE }}
                    </option>
                    <option value="{{ \App\Enums\BookingStatus::APPROVED }}" {{ $bookings_edit->status === \App\Enums\BookingStatus::APPROVED ? 'selected' : '' }}>
                        {{ \App\Enums\BookingStatus::APPROVED }}
                    </option>
                    <option value="{{ \App\Enums\BookingStatus::CANCEL }}" {{ $bookings_edit->status === \App\Enums\BookingStatus::CANCEL ? 'selected' : '' }}>
                        {{ \App\Enums\BookingStatus::CANCEL }}
                    </option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary up-date-button mt-md-4">Lưu</button>
    </form>
@endsection
<script>
    @if(session('error'))
    Swal.fire({
        icon: 'error',
        title: 'Permission Denied',
        text: '{{ session('error') }}',
    });
    @endif
    $(document).ready(function() {
        $('#service').select2();
    });
</script>
