@extends('layouts.admin')

@section('main-content')
    <form id="form" action="{{route('api.backend.booking.update',$bookings_edit->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-4"><label for="user_id">user_id</label>
                <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $bookings_edit->user_id}}"></div>
            <div class="col-sm-4"><label for="clinic_id">clinic_id</label>
                <input type="text" class="form-control" id="clinic_id" name="clinic_id" value="{{ $bookings_edit->clinic_id }}"></div>
            <div class="col-sm-4"><label>service</label>

                <select class="custom-select" id="service" name="service">
                    <option value="{{ $bookings_edit->service }}" selected>{{ $bookings_edit->service }}</option>
                    <option value="1" >dich vu 1</option>
                    <option value="2" >dich vu 2</option>
                    <option value="3" >dich vu 3</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6"><label>Thời gian bắt đầu</label>
                <input type="datetime-local" class="form-control" id="check_in" name="check_in" value="{{ $bookings_edit->check_in }}"></div>
            <div class="col-sm-6"><label>Thời gian kết thúc</label>
                <input type="datetime-local" class="form-control" id="check_out" name="check_out" value="{{ $bookings_edit->check_out }}"></div>
        </div>
        <div class="row">
            <div class="col-sm-4"><label>Trạng thái</label>
                <select class="custom-select" id="status" name="status" {{ !$isAdmin ? 'disabled' : '' }}>
                    <option value="{{ \App\Enums\BookingStatus::PENDING }}" {{ $bookings_edit->status === \App\Enums\BookingStatus::PENDING ? 'selected' : '' }}>
                        {{ \App\Enums\BookingStatus::PENDING }}
                    </option>
                    <option value="{{ \App\Enums\BookingStatus::APPROVED }}" {{ $bookings_edit->status === \App\Enums\BookingStatus::APPROVED ? 'selected' : '' }}>
                        {{ \App\Enums\BookingStatus::APPROVED }}
                    </option>
                    <option value="{{ \App\Enums\BookingStatus::DELETE }}" {{ $bookings_edit->status === \App\Enums\BookingStatus::DELETE ? 'selected' : '' }}>
                        {{ \App\Enums\BookingStatus::DELETE }}
                    </option>

                </select>

            </div>
        </div>

        <button type="submit" class="btn btn-primary up-date-button mt-md-4">Lưu</button>
    </form>
@endsection
