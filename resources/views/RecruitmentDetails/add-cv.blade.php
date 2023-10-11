@extends('layouts.master')
@section('title', 'Home')
@section('content')
<body>
<div class="add-cv">
    <div class="div">
        <div class="group">
            <div class="overlap-group"><div class="text-wrapper-3">Banner</div></div>
        </div>
        <div class="frame-6">
            <i class="fa-solid fa-arrow-left"></i>
            <div class="text-wrapper-4">Add CV</div>
        </div>
        <div class="frame-7">
            <div class="frame-8">
                <div class="optimism-is-the-fait">About Me</div>
                <img class="line-2" src="img/line-6.svg" />
            </div>
            <div>
                <textarea class="frame-wrapper" placeholder="Enter an introduction about yourself"></textarea>
            </div>
        </div>
        <div class="frame-9">
            <div class="frame-8">
                <div class="optimism-is-the-fait">Personal information</div>
                <img class="line-2" src="img/line-6-3.svg" />
            </div>
            <div class="frame-10">
                <div class="frame-11">
                    <div class="frame-10">
                        <div class="frame-12">
                            <p class="p"><span class="span">Email </span> <span class="text-wrapper-6">*</span></p>
                            <div>
                                <input class="frame-13" placeholder="example123">
                            </div>
                        </div>
                        <div class="frame-12">
                            <p class="p"><span class="span">Date of birth </span> <span class="text-wrapper-6">*</span></p>
                            <div class="">
                                <input class="frame-15" type="date">
                            </div>
                        </div>
                        <div class="frame-12">
                            <p class="p"><span class="span">Sexs </span> <span class="text-wrapper-6">*</span></p>
                            <div class="frame-16">
                                <div class="frame-17">
                                    <input type="radio" class="web-tick-box">
                                    <label class="text-wrapper-7">man</label>
                                </div>
                                <div class="frame-18">
                                    <input type="radio" class="web-tick-box">
                                    <label class="text-wrapper-8">women</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="frame-10">
                        <div class="frame-12">
                            <p class="p"><span class="span">Phone number </span> <span class="text-wrapper-6">*</span></p>
                            <div class="frame-19">
                                <select class="web-nhp-liu">
                                    <option><img src="{{asset('img/icons_logo/vietnam.png')}}" alt="#">+84</option>
                                    <option>+85</option>
                                </select>
                                <input class="frame-21" placeholder="0123456789">
                            </div>
                        </div>
                        <div class="frame-12">
                            <p class="p"><span class="span">Nation </span> <span class="text-wrapper-6">*</span></p>
                            <div class="">
                                <input class="web frame-22" placeholder="Please choose....">

                            </div>
                        </div>
                        <div class="frame-12">
                            <p class="p"><span class="span">Marital status </span> <span class="text-wrapper-6">*</span></p>
                            <div class="frame-16">
                                <div class="frame-18">
                                    <div class="web-tick-box"></div>
                                    <div class="text-wrapper-8">Single</div>
                                </div>
                                <div class="frame-17">
                                    <div class="web-tick-box"></div>
                                    <div class="text-wrapper-7">Married</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="frame-23">
                    <div class="text-wrapper-8">Address</div>
                    <div class="frame-24">
                        <div class="frame-25">
                            <div class="web-2">
                                <div class="frame-22">
                                    <div class="text-wrapper-5">Province/City</div>
                                    <div class="web-icon-chevron"></div>
                                </div>
                            </div>
                            <div class="web-2">
                                <div class="frame-22">
                                    <div class="text-wrapper-5">District</div>
                                    <div class="web-icon-chevron"></div>
                                </div>
                            </div>
                        </div>
                        <div class="web-nhp-liu-2">
                            <div class="chung-c-c-u-gi-y-wrapper">
                                <div class="text-wrapper-5">House number, specific address</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="frame-26">
            <div class="text-wrapper-10">Basic information</div>
            <div class="frame-27">
                <img class="profile-circle" src="img/profile-circle.svg" />
                <div class="frame-24">
                    <div class="frame-28">
                        <p class="p"><span class="span">Name </span> <span class="text-wrapper-6">*</span></p>
                        <div class="frame-13">
                            <div class="frame-14"><div class="text-wrapper-5">example123</div></div>
                        </div>
                    </div>
                    <div class="frame-28">
                        <p class="p"><span class="span">Job Title </span> <span class="text-wrapper-6">*</span></p>
                        <div class="frame-13">
                            <div class="frame-14"><div class="text-wrapper-5">example123</div></div>
                        </div>
                    </div>
                    <div class="frame-28">
                        <p class="p"><span class="span">Position </span> <span class="text-wrapper-6">*</span></p>
                        <div class="frame-29">
                            <div class="frame-14"><div class="text-wrapper-5">example123</div></div>
                        </div>
                    </div>
                    <div class="frame-28">
                        <p class="p"><span class="span">Experience </span> <span class="text-wrapper-6">*</span></p>
                        <div class="web-chn">
                            <div class="frame-30">
                                <div class="default">0</div>
                                <div class="VN">year</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="frame-31">
            <div class="frame-32">
                <div class="frame-33">
                    <div class="frame-34">
                        <div class="optimism-is-the-fait">Education</div>
                        <img class="line-3" src="img/image.svg" />
                    </div>
                    <p class="text-wrapper-11">
                        Describe your entire educational background, as well as any qualifications you have earned and training
                        courses you have attended.
                    </p>
                </div>
                <div class="frame-35">
                    <img class="img" src="img/plus-circle.svg" />
                    <div class="text-wrapper-12">Add education</div>
                </div>
            </div>
            <div class="frame-36">
                <div class="frame-37">
                    <div class="text-wrapper-13">Thiết kế đồ hoạ</div>
                    <p class="text-wrapper-14">Trường cao đẳng FPT - Cao đẳng</p>
                    <p class="text-wrapper-14">Từ tháng 9/2021 - 9/2023</p>
                </div>
                <div class="frame-38">
                    <img class="img" src="img/pencil-line.svg" /> <img class="img" src="img/trash-01-2.svg" />
                </div>
            </div>
        </div>
        <div class="frame-39">
            <div class="frame-32">
                <div class="frame-33">
                    <div class="frame-34">
                        <div class="optimism-is-the-fait">Certificate and license</div>
                        <img class="line-3" src="img/line-6-4.svg" />
                    </div>
                </div>
                <div class="frame-35">
                    <img class="img" src="img/plus-circle.svg" />
                    <div class="text-wrapper-12">Add Skill</div>
                </div>
            </div>
            <div class="frame-36">
                <div class="frame-40">
                    <div class="image-wrapper"><img class="image-2" src="img/image-3.png" /></div>
                    <div class="frame-37">
                        <div class="text-wrapper-8">UI/UX cơ bản</div>
                        <div class="text-wrapper-15">mindx technology school</div>
                        <div class="text-wrapper-16">Tháng 9/2023</div>
                    </div>
                </div>
                <div class="frame-38">
                    <img class="img" src="img/pencil-line.svg" /> <img class="img" src="img/trash-01-2.svg" />
                </div>
            </div>
        </div>
        <div class="frame-41">
            <div class="frame-32">
                <div class="frame-33">
                    <div class="frame-34">
                        <div class="optimism-is-the-fait">Skill</div>
                        <img class="line-3" src="img/line-6-2.svg" />
                    </div>
                    <p class="text-wrapper-11">
                        In this section, you should list skills that are relevant to the position or career field you are
                        interested in.
                    </p>
                </div>
                <div class="frame-35">
                    <img class="img" src="img/plus-circle.svg" />
                    <div class="text-wrapper-12">Add Skill</div>
                </div>
            </div>
            <div class="frame-42">
                <div class="frame-43">
                    <div class="frame-44">
                        <div class="text-wrapper-8">Web Design</div>
                        <p class="m-c-th-nh-th-o">
                            <span class="text-wrapper-17">Mức độ thành thạo:</span>
                            <span class="text-wrapper-18"> Competently</span>
                        </p>
                    </div>
                    <img class="trash" src="img/trash-01.svg" />
                </div>
                <div class="frame-43">
                    <div class="frame-44">
                        <div class="text-wrapper-8">Web Design</div>
                        <p class="m-c-th-nh-th-o">
                            <span class="text-wrapper-17">Mức độ thành thạo:</span>
                            <span class="text-wrapper-18"> Competently</span>
                        </p>
                    </div>
                    <img class="trash" src="img/trash-01.svg" />
                </div>
                <div class="frame-43">
                    <div class="frame-44">
                        <div class="text-wrapper-8">Web Design</div>
                        <p class="m-c-th-nh-th-o">
                            <span class="text-wrapper-17">Mức độ thành thạo:</span>
                            <span class="text-wrapper-18"> Competently</span>
                        </p>
                    </div>
                    <img class="trash" src="img/trash-01.svg" />
                </div>
            </div>
        </div>
        <div class="frame-45">
            <div class="frame-46"><div class="text">Save draft</div></div>
            <div class="frame-47"><div class="text-2">Complete</div></div>
        </div>
    </div>
</div>
</body>
@endsection
