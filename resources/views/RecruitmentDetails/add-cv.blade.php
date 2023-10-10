@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <body>
    <div class="banner1">
    </div>
    <div class="container">
        <div><i class="fa-solid fa-arrow-left"></i>Add CV</div>
        <div>
            <div>
                <div>
                    <div>
                        <strong>About Me</strong>
                    </div>
                    <div>
                        <textarea placeholder="Enter an introduction about yourself"></textarea>
                    </div>
                </div>

                <div>
                    <div>
                        <strong>Personal information</strong>
                    </div>
                    <div>
                        <strong>Email</strong>
                        <div>
                            <input placeholder="example123">
                        </div>
                    </div>
                    <div>
                        <strong>Date of birth </strong>
                        <div>
                            <input type="date">
                        </div>
                    </div>
                    <div>
                        <strong>Sexs</strong>
                        <section>
                            <div>
                            <input type="radio">
                                <label>man</label>
                            </div>
                            <div>
                                <input type="radio">
                                <label>women</label>
                            </div>
                        </section>
                    </div>
                    <div>
                        <strong>Address</strong>
                        <div>
                            <section>
                            </section>
                            <section>
                            </section>
                            <input placeholder="House number, specific address">
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <div></div>
    </div>


    </body>
@endsection
