@extends('layouts.master')
@section('title')
    Perscrition Result
@endsection
@section('content')
    @include('layouts.partials.header')
    @include('component.banner')
    <div class="container">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="full_name_value">{{ __('home.Full Name') }}</label>
                <input type="text" class="form-control full_name"
                       value="{{ $user ? $user->last_name . ' ' . $user->name : '' }}" id="full_name_value"
                       name="full_name">
            </div>
            <div class="form-group col-md-6">
                <label for="email_value">{{ __('home.Email') }}</label>
                <input type="text" class="form-control" id="email_value" value="{{ $user ? $user->email : '' }}"
                       placeholder="{{ __('home.E-Mail Address') }}">
            </div>
        </div>
        <div class="list-service-result mt-2 mb-3">
            <div id="list-service-result">

            </div>
            <button type="button"
                    class="btn btn-outline-primary mt-3 btnAddNewResult">{{ __('home.Add') }}
            </button>
        </div>
        <button type="button" class="btn btn-primary " id="btnCreate">Create</button>
    </div>
    <script>
        let accessToken = `Bearer ` + token;
        let headers = {
            "Authorization": accessToken
        };

        $(document).ready(function () {
            $('#btnCreate').click(function () {
                createPrescription();
            });
        });

        async function createPrescription() {
            const formData = new FormData();

            let full_name_value = $('#full_name_value').val();
            let email_value = $('#email_value').val();

            if (!full_name_value) {
                alert('Please enter full name!')
                return;
            }

            if (!email_value) {
                alert('Please enter email!')
                return;
            }

            formData.append('full_name', full_name_value);
            formData.append('email', email_value);
            formData.append('created_by', `{{ \Illuminate\Support\Facades\Auth::user()->id }}`);

            const itemList = [
                'prescriptions',
            ];

            let my_array = [];

            let medicine_name = document.getElementsByClassName('medicine_name');
            let medicine_ingredients = document.getElementsByClassName('medicine_ingredients');
            let quantity = document.getElementsByClassName('quantity');
            let detail = document.getElementsByClassName('detail_value');

            for (let j = 0; j < medicine_name.length; j++) {
                let name = medicine_name[j].value;
                let ingredients = medicine_ingredients[j].value;
                let quantity_value = quantity[j].value;
                let detail_value = detail[j].value;

                if (!name || !ingredients || !quantity_value) {
                    alert('Please enter medicine name or medicine ingredients or quantity!')
                    return;
                }
                let item = {
                    medicine_name: name,
                    medicine_ingredients: ingredients,
                    quantity: quantity_value,
                    note: detail_value ?? '',
                }
                item = JSON.stringify(item);
                my_array.push(item);
            }

            itemList.forEach(item => {
                formData.append(item, my_array.toString());
            });

            try {
                await $.ajax({
                    url: `{{ route('api.backend.prescription.result.create') }}`,
                    method: 'POST',
                    headers: headers,
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        console.log(response)
                        alert('Create success!')
                        window.location.href = `{{ route('view.prescription.result.doctor') }}`;
                    },
                    error: function (error) {
                        alert(error.responseJSON.message);
                    }
                });
            } catch (e) {
                console.log(e)
                alert('Error, Please try again!');
            }
        }
    </script>
    {{-- Handle input --}}
    <script>
        let html = `<div class="service-result-item d-flex align-items-center justify-content-between border p-3">
                    <div class="row w-75">
                        <div class="form-group">
                            <label for="medicine_name">Medicine Name</label>
                            <input type="text" class="form-control medicine_name" value="" id="medicine_name"
                                   name="medicine_name">
                        </div>
                        <div class="form-group">
                            <label for="medicine_ingredients">Medicine Ingredients</label>
                            <input type="text" class="form-control medicine_ingredients" id="medicine_ingredients">
                        </div>
                        <div class="form-group">
                            <label for="quantity">{{ __('home.Quantity') }}</label>
                            <input type="number" min="1" class="form-control quantity" id="quantity">
                        </div>
                        <div class="form-group">
                            <label for="detail_value">Detail</label>
                            <input type="text" class="form-control detail_value" id="detail_value">
                        </div>
                    </div>
                    <div class="action mt-3">
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
