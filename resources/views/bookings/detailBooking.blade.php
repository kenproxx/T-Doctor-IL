@extends('layouts.master')
@section('title', 'Booking Detail')
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="container">
        <h1>Booking Detail</h1>
        <div class="row d-flex">
            <div class="col-md-4">
                <div>{{ __('home.Status') }}: {{$booking->status}}</div>
                <div>{{ __('home.Start') }}: {{$booking->check_in}}</div>
            </div>
            <div class="col-md-4">
                @php
                    $array = explode(',', $clinic->address);
                    $addressP = \App\Models\Province::where('id', $array[1] ?? null)->first();
                    $addressD = \App\Models\District::where('id', $array[2] ?? null)->first();
                    $addressC = \App\Models\Commune::where('id', $array[3] ?? null)->first();
                @endphp
                <div>{{ __('home.clinics') }}: {{$clinic->name}}</div>
                <div>{{ __('home.Addresses') }}: {{$clinic->address_detail}} - {{$addressC->name}} - {{$addressD->name}} - {{$addressP->name}}</div>
                <div>{{ __('home.Main service') }}:

                    @foreach($service as $item)
                        <div>- {{$item->name}}</div>

                    @endforeach</div>

            </div>
            <div class="col-md-4">
                @if(Auth::user()->id == $booking->member_family_id)
                    <div>{{ __('home.Name') }}: {{$user->name}}</div>
                    <div>{{ __('home.PhoneNumber') }}: {{$user->phone}}</div>
                    <div>{{ __('home.Email') }}: {{$user->email}}</div>
                @else
                    @if($memberFamily != null)
                        <div>{{ __('home.Name') }}: {{$memberFamily->first()->name}}</div>
                        <div>{{ __('home.relationship') }}: {{$memberFamily->first()->relationship}}</div>
                        <div>{{ __('home.Sexs') }}: {{$memberFamily->first()->sex}}</div>
                        <div>{{ __('home.Date of birth') }}: {{$memberFamily->first()->date_of_birth}}</div>
                    @endif

                @endif
            </div>


        </div>
        <div class="justify-content-center align-items-center d-flex mt-4">
            <a href="{{ route("clinic.detail", $booking->clinic_id) }}" class="btn button-apply-booking col-md-4">Clinic
                Detail</a>
        </div>
    </div>
@endsection
