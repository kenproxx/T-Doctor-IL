@extends('layouts.master')
@section('title', 'Flea Market')
@section('content')
    <style>
        section {
            margin-top: 20px;
        }

        .ui-datepicker-calendar tbody tr td .ui-state-default {
            border: none;
            font-size: 12px;
            font-weight: 800;        }

        @media only screen and (max-width: 639px) {
            .flex-container {
                margin-top: 30px;
            }
        }

        .spin-me {
            text-align: center;
            margin-top: 10px;
        }

        .flex-container-morning, .flex-container-afternoon {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .master-container-slots.fade-in {
            animation: fadein 1s;
        }

        .master-container-slots.fade-out {
            animation: fadeout .5s;
        }

        .item {
            flex: 0 0 25%;
        }

        .item .button {
            width: 95%;
        }

        @media only screen and (min-width: 640px) {
            .item .button {
                margin-left: 10%;
                /*width: 100%;*/
                margin-right: 10%;
            }
        }

        .form-submit {
            /*width: 100%;*/
            margin-top: 50px;
        }

        @keyframes fadein {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeout {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }
        .button-apply-booking {
            display: flex;
            padding: 11px 50px;
            justify-content: center;
            align-items: center;
            gap: 10px;
            flex: 1 0 0;
            border-radius: 8px;
            background:  #45C3D2;
        }
        .button-Reset-booking {
            display: flex;
            padding: 11px 50px;
            justify-content: center;
            align-items: center;
            gap: 10px;
            flex: 1 0 0;
            border-radius: 8px;
            background:  #D6D6D6;
        }
        .item button {
            border-radius: 8px;
            background:  #F3F3F3;
            color:  #929292;
            display: flex;
            width: 65px;
            padding: 6px 16px;
            justify-content: center;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }
    </style>
<section>
    <div class="row col-md-2 d-block">
        <div class="small-12 ">
            <div id="datepicker"></div>
        </div>
        <div class="small-12 ">
            <div class="spin-me"></div>
            <div class="master-container-slots">
                <div class="morning-container fs-16px">
                    <p>AM</p>
                    <div class="flex-container-morning"></div>
                </div>
                <div class="afternoon-container fs-16px">
                    <p>PM</p>
                    <div class="flex-container-afternoon"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-md-2">
        <div class=" medium-centered d-md-flex justify-content-between">
            <div class="col-md-6 pl-0">
            <a class= 'button form-submit button-Reset-booking w-100'>{{ __('home.Reset') }}</a>
            </div>
            <div class="col-md-6 pr-0">
            <a class='button form-submit w-100 button-apply-booking disabled'>{{ __('home.Apply') }}</a>
            </div>
        </div>
    </div>
</section>


<script>
    let cachedData = {};

    function serviceCallSlots(date) {
        const dt = new Date(date);
        let ms = dt.getTime();
        let startMs = ms - (60 * 60 * 24 * 1000 * 2);
        const dtArr = [1, 2, 3, 4, 5].map((e) => {
            const innerDt = new Date(startMs);
            startMs += 60 * 60 * 24 * 1000;
            return innerDt;
        });
        const timeArrs = [
            ['9', '10', '11', '12', '1', '2', '3', '4', '5'],
            ['9', '10', '11', '1', '2', '3', '4', '5'],
            ['9', '10', '11', '12', '3', '4', '5'],
            ['10', '11', '2', '4'],
            ['11', '12', '1', '4', '5']
        ];
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                //construct object
                const obj = dtArr.reduce((accum, e) => {
                    const randomNum = Math.floor(Math.random() * 5);
                    const dtString = e.toLocaleDateString();
                    let parts = dtString.split('/');
                    parts[0] = parts[0].length === 1 ? '0' + parts[0] : parts[0];
                    parts[1] = parts[1].length === 1 ? '0' + parts[1] : parts[1];
                    accum[parts.join('/')] = timeArrs[randomNum];
                    return accum;
                }, {});
                resolve(obj);
            }, 2000);
        })
    }

    function spinner(startOrStop) {
        const spin = document.querySelector('.spin-me');
        if (startOrStop === 'start') {
            const spinner = document.createElement('i');
            spinner.setAttribute('class', 'fas fa-spinner fa-4x fa-spin');
            spin.appendChild(spinner);
        } else {
            spin.innerHTML = '';
        }
    }

    function createSlotsDom(formSubmit, morning, afternoon, arr) {
        [9, 10, 11, 12, 1, 2, 3, 4, 5].map((e) => {
            const div = document.createElement('div');
            div.setAttribute('class', 'item');
            const button = document.createElement('button');
            button.setAttribute('class', 'hollow button');
            button.setAttribute('href', 'javascript:void(0)');
            const time = (e < 10 ? '0' : '') + e + ':00';
            const txt = document.createTextNode(time);
            button.appendChild(txt);
            button.onclick = function (e) {
                formSubmit.classList.remove('disabled');
            }
            if (!arr.filter(r => r == e).length) {
                button.setAttribute('disabled', 'true');
            }
            div.appendChild(button);
            if (e >= 9 && e < 12) {
                morning.appendChild(div);
            } else {
                afternoon.appendChild(div);
            }
        });
    }

    $("#datepicker").datepicker({
        onSelect: function (date) {
            const container = document.querySelector('.master-container-slots');
            const morning = document.querySelector('.flex-container-morning');
            const afternoon = document.querySelector('.flex-container-afternoon');
            const formSubmit = document.querySelector('.button-apply-booking');
            formSubmit.classList.add('disabled');
            container.classList.add('hide');
            if (cachedData[date]) {
                spinner('start');
                setTimeout(() => {
                    morning.innerHTML = '';
                    afternoon.innerHTML = '';
                    createSlotsDom(formSubmit, morning, afternoon, cachedData[date]);
                    spinner('stop');
                    container.classList.remove('hide');
                    container.classList.add('fade-in');
                }, 500);
            } else {
                spinner('start');
                const prom = serviceCallSlots(date);
                setTimeout(() => {
                    morning.innerHTML = '';
                    afternoon.innerHTML = '';
                    prom.then((payload) => {
                        Object.keys(payload).map((e) => {
                            const cachedKeys = Object.keys(cachedData);
                            if (!cachedKeys.includes(e)) {
                                cachedData[e] = payload[e];
                            }
                        });
                        createSlotsDom(formSubmit, morning, afternoon, cachedData[date]);
                        spinner('stop');
                        container.classList.remove('hide');
                        container.classList.add('fade-in');
                    });
                }, 500);
            }
        }
    });
</script>
@endsection
