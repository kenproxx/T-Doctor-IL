@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('home.List Booking') }}</h1>
    {{--    <a href="{{route('coupon.create.product')}}" class="btn btn-primary mb-3">Add</a>--}}
    <style>
        td {
            overflow: hidden;
            max-width: 300px;
            height: 80px;
        }
    </style>
    <div class="">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('home.Người đăng ký') }}</th>
                <th scope="col">{{ __('home.clinics') }}</th>
                <th scope="col">{{ __('home.giờ vào') }}</th>
                <th scope="col">{{ __('home.dịch vụ') }}</th>
                <th scope="col">{{ __('home.Trạng thái') }}</th>
                <th scope="col">{{ __('home.Thao tác') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bookings as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>
                        @php
                            $user = \App\Models\User::find($item->user_id)->pluck('name')->first();
                        @endphp
                        {{$user}}</td>
                    <td>@php
                            $clinic = \App\Models\Clinic::where('id',$item->clinic_id)->pluck('name')->first();
                        @endphp
                        {{$clinic}}
                    </td>
                    <td>{{$item->check_in}} </td>
                    @php
                        $service_name = explode(',', $item->service);
                        $services = \App\Models\ServiceClinic::whereIn('id', $service_name)->get();
                        $service_names = $services->pluck('name')->implode(', ');
                    @endphp
                    <td>{{$service_names}}</td>
                    <td>{{$item->status}}</td>
                    <td class="d-flex">
                        <form action="{{route('api.backend.booking.edit',$item->id)}}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>

                        <form action="{{route('api.backend.booking.delete',$item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-3 btn btn-primary btn-danger">{{ __('home.Delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center align-items-center">
            {{ $bookings->links() }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Permission Denied',
            text: '{{ session('error') }}',
        });
        @endif
    </script>
@endsection
