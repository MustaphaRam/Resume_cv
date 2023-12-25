<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cv</title>
    <!-- <script defer src="{{ asset('css/assets/fontawesome/js/all.min.js')}}"></script> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/orbit-1.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/boot3.3.7.css') }}"> -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    @vite(['resources/sass/app.scss'])
    <style></style>
<style>    
    /* .container{
        position: relative;
        display: -webkit-inline-box;
    }*/
    @page { 
        margin: 0px;
        font-family: Arial, Helvetica, sans-serif;
    }

    /* .page{
        width: 612px; 
        height: 792px; 
        overflow: hidden; 
        font-family: Arial, Helvetica; 
        position: relative; 
        color: #545554;
        page-break-after: always;
    } */

    h1, h2, h3, h4, h5, h6 {
        font-weight: 700;
    }

    p {
    line-height: 1.5;
    }

    .sidebar-wrapper {
        background: #e6e6e6;
        /* height: 1123px; */
        color: #7b07a8;
        padding-bottom: 8px;
        background-clip: content-box;
        padding: 0;
        height: screen;
    }
    .sidebar-wrapper a {
    color: #fff;
    }
    .sidebar-wrapper .profile-container {
        padding: 30px 0;
        text-align: center;
        color: #fff;
    }

    .sidebar-wrapper .profile-image {
        /* background: #e6e6e6;
        border-radius: 50%; */
        width: 100%
        inline-size: min-content;
        margin: auto; 
        margin-top: 15px;
    }

    .sidebar-wrapper .name {
        font-size: 20px;
        font-weight: 900;
        margin-top: 0;
        margin-bottom: 10px;
    }
    .sidebar-wrapper .tagline {
    color: rgba(255, 255, 255, 0.6);
    font-size: 16px;
    font-weight: 400;
    margin-top: 0;
    margin-bottom: 0;
    }
    .sidebar-wrapper .profile {
    margin-bottom: 15px;
    }

    .setcolor{
        background-color: {{ $cv->templet->color }};
    }

    .c55{
        display: flex;
        padding-bottom: 6px;
    }
    .sidebar-wrapper .c55{
        display: block;
        padding-bottom: 15px;
        color: {{ $cv->templet->color }};
    }
    .c55 span{
        color: black;
    }

    .sidebar-wrapper .contact-list .svg-inline--fa {
        width: 20px;
        margin-right: 5px;
        font-size: 18px;
        vertical-align: middle;
        margin-top: 2px;
    }
    .sidebar-wrapper .contact-list li {
    margin-bottom: 15px;
    }
    .sidebar-wrapper .contact-list li:last-child {
    margin-bottom: 0;
    }
    .sidebar-wrapper .contact-list .email .svg-inline--fa {
    font-size: 14px;
    }
    .sidebar-wrapper .container-block {
    padding: 30px 13px;
    }
    .sidebar-wrapper .container-block-title {
    text-transform: uppercase;
    font-size: 20px;
    font-weight: 700;
    margin-top: 0;
    font-weight: bold;

    }
    .sidebar-wrapper .degree {
    font-size: 14px;
    margin-top: 0;
    margin-bottom: 5px;
    }
    .sidebar-wrapper .education-container .item {
    margin-bottom: 15px;
    }
    .sidebar-wrapper .education-container .item:last-child {
    margin-bottom: 0;
    }
    .sidebar-wrapper .education-container .meta {
    color: rgba(255, 255, 255, 0.6);
    font-weight: 500;
    margin-bottom: 0px;
    margin-top: 0;
    font-size: 14px;
    }
    .sidebar-wrapper .education-container .time {
    color: rgba(255, 255, 255, 0.6);
    font-weight: 500;
    margin-bottom: 0px;
    }

    .list-unstyled{
    padding-left: 10px;
    list-style: none;
    font-weight: bold;
    font-size: 17px;
    }
    .sidebar-wrapper .interests-list li {
    margin-bottom: 10px;
    padding-left: 10px;
    }

    .lang{
    font-weight: bold;
    font-size: 17px;
    }

    .lan_lev{
    margin-bottom: 10px;
    }

    .main-wrapper {
        /* padding: 15px;*/
        margin-top: 10px;
    }
    .main-wrapper .section-title {
        text-transform: uppercase;
        font-size: 20px;
        color: #2d7788;
        position: relative;
        margin-bottom: 10px;
        border-bottom: 1px solid;
        border-color: #e6e6e6;
    }
    .main-wrapper .section-title .icon-holder {
        width: 30px;
        height: 30px;
        margin-right: 10px;
        /* display: inline-block; */
        color: #fff;
        border-radius: 50%;
        -moz-background-clip: padding;
        /* -webkit-background-clip: padding-box; */
        /* background-clip: padding-box; */
        /* background: #2d7788; */
        /* text-align: center; */
        /* font-size: 16px; */
        position: relative;
        /* top: -2px; */
        /* padding-top: 2px;*/
    }
    .main-wrapper .section {
        margin-top: 15px;
    }
    .main-wrapper .experiences-section .item {
        margin-bottom: 30px;
    }
    .main-wrapper .upper-row {
        position: relative;
        /* overflow: hidden; */
        margin-bottom: 2px;
    }

    .main-wrapper .inline{
        display: -webkit-box;
        width: 100%;
    }
    .main-wrapper .job-title {
        color: #3F4650;
        font-size: 14pt;
        margin-top: 0;
        margin-bottom: 0;
        font-weight: bold;
    }
    .main-wrapper .date {
        text-align: end;
        color: rgb(187,187,187) !important;
        padding-right: 10px;
        font-weight: bold;
        float: right;
        /* width: 35%; */
        text-align: right;
    }
    .main-wrapper .compa {
        color: rgb(187,187,187) !important;
        font-weight: bold;
        padding-left: 0;
        /* width: 65%; */
    }
    .main-wrapper .project-title {
        font-size: 16px;
        font-weight: 400;
        margin-top: 0;
        margin-bottom: 5px;
    }
    .main-wrapper .projects-section .intro {
        margin-bottom: 30px;
    }
    .main-wrapper .item {
        margin-bottom: 10px;
    }

    #skillset .item {
        display: -webkit-inline-box;
    } 

    .row {
        margin-right: 0px;
        margin-left: 0px;
    }
    .main-wrapper .section h2 {
        align-items: center;
        margin: 5px 0;
    }

    .meta{
        margin-bottom: 5px;
        display: block;
    }
    .main-wrapper p {
        padding-right: 30px;
    }
    .main-wrapper .svg-inline--fa {
        width: 20px;
        margin: auto;
        vertical-align: middle;
    }
</style>

@php
    $leval = ["Beginner","Moderate","Good","Very good","Fluent"]
@endphp

</head>
<body>
<div id="app">
    <div class="row w-100" style="/* display: -webkit-box;width: 100%; */">
        <div class="sidebar-wrapper col-xs-4 col-4">
            <div class="setcolor profile-container" style="">
                <h1 id="fullName" class="font size name">{{ $cv->profile['name']." ".$cv->profile['lastname']}}</h1>
                <h3 id="tit" class="tagline">{{ $cv->title }}</h3>
                <div  class="row">
                        <div id="cader-imag" class="profile-image">
                            @php
                                if ($cv->profile->image_profile){
                                    $imagePath = base_path('upload/images/'.$cv->profile->image_profile);  // Replace this with the path to your image
                                    $base64Image = base64_encode(file_get_contents($imagePath));
                                }
                                else 
                                $base64Image = "";
                            @endphp
                            <img id="imagPro" src="data:image/jpg;base64,{{ $base64Image }}" class="rounded mx-auto d-block" style="width: 60%; border-radius: 50%;border: 5px solid;border-color: honeydew;" alt="image" >
                            
                        </div>
                    </div>
            </div><!--//profile-container-->
            <div class="contact-container container-block">
                <div class="contact-list">
                    <div class="c55">
                        <svg class="svg-inline--fa fa-house" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="house" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6H511.8L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5L575.8 255.5z"></path>
                        </svg>
                        <!-- <icon class="fa-solid fa-home"></icon> Font Awesome fontawesome.com -->
                        <span id="address">{{$cv->contact->address}}</span>
                    </div>
                    <div class="c55">
                        <svg class="svg-inline--fa fa-envelope" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M464 64C490.5 64 512 85.49 512 112C512 127.1 504.9 141.3 492.8 150.4L275.2 313.6C263.8 322.1 248.2 322.1 236.8 313.6L19.2 150.4C7.113 141.3 0 127.1 0 112C0 85.49 21.49 64 48 64H464zM217.6 339.2C240.4 356.3 271.6 356.3 294.4 339.2L512 176V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V176L217.6 339.2z"></path>
                        </svg>
                        <!-- <icon class="fa-solid fa-envelope"></icon> Font Awesome fontawesome.com --><span id="email">{{ $cv->contact->email }}</span></div>
                    <div class="c55">
                        <svg class="svg-inline--fa fa-phone" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M511.2 387l-23.25 100.8c-3.266 14.25-15.79 24.22-30.46 24.22C205.2 512 0 306.8 0 54.5c0-14.66 9.969-27.2 24.22-30.45l100.8-23.25C139.7-2.602 154.7 5.018 160.8 18.92l46.52 108.5c5.438 12.78 1.77 27.67-8.98 36.45L144.5 207.1c33.98 69.22 90.26 125.5 159.5 159.5l44.08-53.8c8.688-10.78 23.69-14.51 36.47-8.975l108.5 46.51C506.1 357.2 514.6 372.4 511.2 387z"></path>
                        </svg>
                        <!-- <icon class="fa-solid fa-phone"></icon> Font Awesome fontawesome.com -->
                        <span id="tel">{{ $cv->contact->phone1 }}</span>
                    </div>
                    @if($cv->contact->linkedin)
                    <div class="c55">
                        <svg class="svg-inline--fa fa-linkedin-in" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M100.3 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.6 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.3 61.9 111.3 142.3V448z"></path>
                        </svg>
                        <!-- <icon class="fa-brands fa-linkedin-in"></icon> Font Awesome fontawesome.com -->
                        <span id="linkedin">{{ $cv->contact->linkedin }}</span>
                    </div>
                    @endif
                </div>
            </div>
            @if(count($cv->language)>0)
            <div class="languages-container container-block">
                <h2 class="c55 container-block-title" style="color: rgb(58, 91, 135);">Languages</h2>
                <div id="seclang" class="lan_lev" style="display: grid;">
                @foreach($cv->language as $lang)
                    <div class="lan_lev row justify-content-between align-items-center" style="/* align-items: center;display: -webkit-inline-box; */">
                        <div class="col-6" style="/* display: -webkit-inline-box; */"><span class="lang">{{ $lang->language_name }}</span></div>
                        <div class="col-6 d-flex justify-content-around" style="/* display: -webkit-inline-box;margin: auto 0; */">
                            @for($index = 0; $index < count($leval); $index++)
                                @if($index <= array_search($lang->level, $leval))
                                    <div class="setcolor" style="margin-right: 4px;height: 15px; width: 15px; border-radius: 50%;"></div>
                                @else
                                    <div class="" style="background-color: #bbbbbb; margin-right: 4px; height: 15px; width: 15px; border-radius: 50%;"></div>
                                @endif
                            @endfor
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            @endif
            @if($cv->profile->hobbies)
            @php
                $hobbies = explode(',', $cv->profile->hobbies);
            @endphp
            <div class="interests-container container-block">
                <h2 class="c55 container-block-title" style="color: rgb(58, 91, 135);">Hobbies</h2>
                <ul id="hobbies" class="list-unstyled interests-list">
                    @foreach($hobbies as $hobby)
                        <li>{{ $hobby }}</li>
                    @endforeach
                </ul>
            </div><!--//interests-->
            @endif
        </div><!--//sidebar-wrapper-->
        
        <div class="main-wrapper col-xs-8 col-8" style="">
            <section style="white-space: normal;" class="section">
                <h2 class="c55 section-title mb-3" style="color: rgb(58, 91, 135);">
                    <span class="setcolor icon-holder" style="">
                        <svg class="svg-inline--fa fa-user position-absolute top-50 start-50 translate-middle" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path>
                        </svg><!-- <i class="fa-solid fa-user"></i> Font Awesome fontawesome.com -->
                    </span>
                    Profile
                </h2>
                <div style="box-sizing: border-box;" class="summary">
                    <p class="fs-6" id="Profile" style="widht: 100%">{{ $cv->profile->my_profile}}</p>
                </div><!--//summary-->
            </section><!--//section-->
                
            <!-- Education -->
            <section style="white-space: normal;" class="section projects-section">
                <h2 class="c55 section-title mb-3" style="color: rgb(58, 91, 135);">
                    <span class="setcolor icon-holder" style="">
                        <svg class="svg-inline--fa fa-box-archive position-absolute top-50 start-50 translate-middle" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="box-archive" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M32 432C32 458.5 53.49 480 80 480h352c26.51 0 48-21.49 48-48V160H32V432zM160 236C160 229.4 165.4 224 172 224h168C346.6 224 352 229.4 352 236v8C352 250.6 346.6 256 340 256h-168C165.4 256 160 250.6 160 244V236zM480 32H32C14.31 32 0 46.31 0 64v48C0 120.8 7.188 128 16 128h480C504.8 128 512 120.8 512 112V64C512 46.31 497.7 32 480 32z"></path>
                        </svg>
                    </span>
                    Education
                </h2>

                <div id="secEdu" >
                @foreach($cv->education as $edu)
                    <div class="item">
                        <div class="meta">
                            <div class="text-uppercase">
                                <h5 class="job-title h4">{{ $edu->certificate.' '. $edu->Specialty_name }}</h5>
                            </div>
                            <div class="upper-row d-flex justify-content-between">
                                <div class="col-xs-7 compa">{{ $edu->institute_name }}</div>
                                <div class="col-xs-5 date">{{ $edu->date_obtaining }}</div>
                            </div>
                        </div>
                        <div class="text-wrap"><p>{{ $edu->description}}</p></div>
                    </div>
                @endforeach 
            </section>

            <!-- experiences -->
            <section class="section experiences-section">
                <h2 class="c55 section-title mb-3" style="color: rgb(58, 91, 135);">
                    <span class="setcolor icon-holder" style="">
                        <svg class="svg-inline--fa fa-briefcase position-absolute top-50 start-50 translate-middle" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="briefcase" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M320 336c0 8.844-7.156 16-16 16h-96C199.2 352 192 344.8 192 336V288H0v144C0 457.6 22.41 480 48 480h416c25.59 0 48-22.41 48-48V288h-192V336zM464 96H384V48C384 22.41 361.6 0 336 0h-160C150.4 0 128 22.41 128 48V96H48C22.41 96 0 118.4 0 144V256h512V144C512 118.4 489.6 96 464 96zM336 96h-160V48h160V96z"></path>
                        </svg><!-- <i class="fa-solid fa-briefcase"></i> Font Awesome fontawesome.com -->
                    </span>
                    Experiences
                </h2>
                <div id="secExp">
                @foreach($cv->experience as $exp)
                    <div class="item">
                        <div class="meta">
                            <div class="text-uppercase"><h2 class="job-title">{{ $exp->name_post }}</h2></div>
                            <div class="upper-row d-flex justify-content-between">
                                <div class="col-xs-7 compa">{{ $exp->name_company.", ".$exp->city }}</div>
                                <div class="col-xs-5 date">{{ $exp->start_date." - ".$exp->end_date }}</div>
                            </div>
                        </div>
                        <div class="text-wrap"><p>{{ $exp->description }}</p></div>
                    </div>
                @endforeach
                </div>                  
            </section>
            
            <!-- skills -->
            <section class="skills-section section">
                <h2 class="c55 section-title mb-3" style="color: rgb(58, 91, 135);">
                    <span class="setcolor icon-holder" style="">
                        <svg class="svg-inline--fa fa-rocket position-absolute top-50 start-50 translate-middle" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="rocket" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M156.6 384.9L125.7 353.1C117.2 345.5 114.2 333.1 117.1 321.8C120.1 312.9 124.1 301.3 129.8 288H24C15.38 288 7.414 283.4 3.146 275.9C-1.123 268.4-1.042 259.2 3.357 251.8L55.83 163.3C68.79 141.4 92.33 127.1 117.8 127.1H200C202.4 124 204.8 120.3 207.2 116.7C289.1-4.07 411.1-8.142 483.9 5.275C495.6 7.414 504.6 16.43 506.7 28.06C520.1 100.9 516.1 222.9 395.3 304.8C391.8 307.2 387.1 309.6 384 311.1V394.2C384 419.7 370.6 443.2 348.7 456.2L260.2 508.6C252.8 513 243.6 513.1 236.1 508.9C228.6 504.6 224 496.6 224 488V380.8C209.9 385.6 197.6 389.7 188.3 392.7C177.1 396.3 164.9 393.2 156.6 384.9V384.9zM384 167.1C406.1 167.1 424 150.1 424 127.1C424 105.9 406.1 87.1 384 87.1C361.9 87.1 344 105.9 344 127.1C344 150.1 361.9 167.1 384 167.1z"></path>
                        </svg>
                        <!-- <i class="fa-solid fa-rocket"></i> Font Awesome fontawesome.com -->
                    </span>
                    Skills &amp; Proficiency
                </h2>
                <div id="skillset">
                @foreach($cv->skill as $skil)
                    <div class="container">
                        <div class="upper-row inline">
                            <div class="col-md-3 col-xs-offset-1"><h6 class="level-title">{{ $skil->name }}</h6></div>
                            <div class="col-xs-4" style="align-items: center;">
                                <div class="progress" style="height: 12px;width: 190px;margin-top: 3px; background-color: #e6e6e6;">
                                    <div class="progress-bar setcolor" role="progressbar" style="width: {{ (array_search($skil->level, $leval)*2)*10 }}%; " aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                @endforeach
                </div>  
            </section>
        </div><!--//main-body-->
    </div>
</div>
</body>
</html>
