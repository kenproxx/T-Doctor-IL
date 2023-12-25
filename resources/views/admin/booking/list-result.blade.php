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
                    <td>

                    </td>
                    <td>Larry</td>
                    <td>Larry</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
