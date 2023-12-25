@extends('layouts.admin')
@section('title')
    List Result
@endsection
@section('main-content')
    <div class="container-fluid">
        <h3 class="title">List Result</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ServiceName</th>
                <th scope="col">Result</th>
                <th scope="col">Code</th>
                <th scope="col">Create By</th>
                <th scope="col">BusinessName</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($results as $result)
                <tr>
                    <th scope="row"> {{ $loop->index + 1 }}</th>
                    @php
                        $list_service = $result->service_name;
                        $array_service = explode(',', $list_service);
                        $services = \App\Models\ServiceClinic::whereIn('id', $array_service)
                            ->where('status', \App\Enums\ServiceClinicStatus::ACTIVE)
                            ->get();
                        $service_name = null;
                        foreach ($services as $item){
                            if ($service_name){
                                $service_name = $service_name . ', ' . $item->name;
                            } else {
                                $service_name = $item->name;
                            }
                        }
                    @endphp
                    <td>
                        {{ $service_name }}
                    </td>
                    <td>
                        {{ $result->result }}
                    </td>
                    <td>
                        {{ $result->code }}
                    </td>
                    @php
                        $created_by = \App\Models\User::find($result->created_by);
                    @endphp
                    <td>
                        @if($created_by)
                            {{ $created_by->username }}
                        @endif
                    </td>
                    @php
                        $booking = \App\Models\Booking::find($result->booking_id);
                        $business = \App\Models\Clinic::find($booking->clinic_id);
                    @endphp
                    <td>
                        @if($business)
                            {{ $business->name }}
                        @endif
                    </td>
                    <td>
                        {{ $result->status }}
                    </td>
                    <td>
                        <div class="list-action d-flex align-items-center">
                            <a href="{{ route('web.booking.result.detail', $result->id) }}" class="btn btn-primary">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button type="button" class="btn btn-danger btnDelete" data-id="{{ $result->id }}">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        let accessToken = `Bearer ` + token;
        let headers = {
            "Authorization": accessToken
        };

        $(document).ready(function () {
            $('.btnDelete').on('click', function () {
                let id = $(this).data('id');
                if (confirm('Are you sure you want to delete?') === true) {
                    deleteResult(id);
                }
            })

            function deleteResult(id) {
                let url = `{{ route('api.medical.booking.result.delete', ['id'=>':id']) }}`
                url = url.replace(':id', id);

                try {
                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        headers: headers,
                        success: function (response) {
                            alert('Delete success!')
                            window.location.reload();
                        },
                        error: function (error) {
                            console.log(error);
                            alert('Delete error!')
                        }
                    });
                } catch (e) {
                    console.log(e)
                    alert('Error, Please try again!');
                }
            }
        })
    </script>
@endsection
