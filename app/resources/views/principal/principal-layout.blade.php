<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>IPT | Dashboard</title>

        <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">

        <link rel="stylesheet" href="{{asset('assets/css/ministyle.css')}}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <!--<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />-->
        <script src="//unpkg.com/alpine.js" defer></script>
        <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/fonts/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome5-overrides.min.css')}}">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('css/style.css')}}"></link>
        <!-- Styles -->

        <link rel="stylsheet" href="{{asset('assets/fonts/Feather144f.svg')}}"></link>

        <link rel="stylesheet" href="{{asset('assets/bootstrap.min.css')}}"></link>
        <style>

            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <header class="header" id="header">
           <!-- <h1 class="collapse-side-menu" onclick="hideContentSideMenu()">&#9776;</h1>-->
            <h1 class="intro-head-titl">IPT MANAGEMENT PORTAL</h1>
            <button class="message-action-module" onclick="showMessageBody()"><span style="color: #000;">{{count($messages)}}</span><i class="fas fa-comment"></i>
            </button>
            <button class="notification-action-card" onclick="showNotificationBody()"><span style="color: #000;">{{count($completeapplications)}}</span><i class="fa fa-bell"></i></button>
            <p class="admin-profile-cont" style=" float: right; cursor:pointer;"  onclick="showAdminData()"> <img id="profileImagex" src="{{Auth::guard('principal')->user()->profile ? asset('storage/' . Auth::guard('principal')->user()->profile) : asset('/images/profile.png')}}" alt="Profile" class="profileImagex"> <span style="float: right;">{{Auth::guard('principal')->user()->full_name}} <i class="fas fa-angle-down"></i></span> </p><!-- <p style="float: right;">M</p> --><br>
            <!--<h1 class="profile-header" onclick="showhiddenfile()"><span><i class="fa fa-user"></i> {{Auth::guard('principal')->user()->full_name}}  </span></h1>-->

        </header>

        <script>
            //document.addEventListener('DOMContentLoaded', function(){
                function hideContentSideMenu(){
                    document.querySelector('.group-analytics-data').style.animation='slowClass 2s';
                    document.querySelector('.container-centered-ajax').style.animation='slowClass 2s';
                    document.querySelector('.group-analytics-data').style.marginLeft='10%';
                    document.querySelector('.container-centered-ajax').style.marginLeft='10%';
                    document.querySelector('.image-profile-logo').style.left='1%';
                    document.querySelector('.image-profile-logo').style.animation='slowImage 2s';
                    document.querySelector('.image-profile-logo').style.width='100px';
                    document.querySelector('.image-profile-logo').style.height='40px';
                    document.querySelector('.side-menu-container').style.width='10%';
                    document.querySelector('.side-menu-container').style.animation='slowMotion 2s forwards';
                    document.querySelector('.unhidden').style.display='none';
                    document.querySelector('.unhidden0').style.display='none';
                    document.querySelector('.unhidden1').style.display='none';
                    document.querySelector('.unhidden2').style.display='none';
                    document.querySelector('.unhidden3').style.display='none';
                    document.querySelector('.unhidden4').style.display='none';
                    document.querySelector('.unhidden5').style.display='none';
                    document.querySelector('.unhidden6').style.display='none';
                    document.querySelector('.unhidden7').style.display='none';
                    document.querySelector('.unhidden8').style.display='none';
                    document.querySelector('.unhidden9').style.display='none';
                    document.querySelector('.unhidden10').style.display='none';
                    document.querySelector('.unhidden11').style.display='none';
                    document.querySelector('.unhidden12').style.display='none';
                    document.querySelector('.unhidden13').style.display='none';
                    document.querySelector('.unhidden14').style.display='none';
                    document.querySelector('.unhidden15').style.display='none';
                    document.querySelector('.unhidden16').style.display='none';
                    document.querySelector('.unhidden17').style.display='none';
                    document.querySelector('.unhidden18').style.display='none';
                    document.querySelector('.unhidden19').style.display='none';
                    document.querySelector('.unhidden20').style.display='none';
                    document.querySelector('.unhidden21').style.display='none';
                    document.querySelector('.unhidden22').style.display='none';
                    document.querySelector('.unhidden23').style.display='none';
                }
            //});
        </script>

        <div class="hidden-admin-file">
            <span onclick="hideContent()" class="close-button">&times;</span><br><br>
                <form action="/signout" method="POST" class="sign-out">
                    <a href="#" style="text-transform: uppercase;">{{Auth::guard('principal')->user()->full_name}}</a>
                    <a href="#"><i class="fas fa-user-shield"></i> College Principal</a><hr><hr>
                    <a href="/admin-profile"><i class="fa fa-user"></i> My Profile</a>
                    <a href="/admin-report"><i class="fas fa-calendar-check"></i> Report</a>
                    <button type="submit"><i class="fa fa-sign-out"></i> Logout</button>
                </form>
            </div>

            <div class="notification-component-card">
                <a href="#"><i class="fa fa-eye"></i> All Notifications</a> <a href="#" onclick="closeNotification()" style="float: right; color:red; font-size:16px; padding:10px;">&times;</a><br>

                <div class="single-notification">

                @foreach ($completeapplications as $apps)



                    @foreach ($students as $student)
                    @if ($student->username==$apps->reg_number)
        <img src="{{$student->profile ? asset('storage/' . $student->profile) : asset('images/profile.png')}}" alt="My Profile">
        <p><span>{{$student->full_name}}</span> applied for IPT at {{$apps->firm_name}} on {{$apps->created_at}}. <i style="color: orange;">new</i></p>
                    @endif

                    @endforeach




                @endforeach
            </div>
            </div>



            <script>
                function showAdminData(){
                    document.querySelector('.hidden-admin-file').style.display='block';
                }

                function showNotificationBody(){
                    document.querySelector('.notification-component-card').style.display='block';
                }

                function hideContent(){
                    location.reload();
                }

                function closeNotification(){
                    location.reload();
                }
            </script>

        <main>
            @yield('content')
        </main>

        <div class="image-profile-logo">
            <img src="{{asset('images/logo-profile.jpg')}}" alt="Logo Profile">
            </div>

            <div class="message-container-parent">
                <button onclick="hideMessageBody()" class="hideMessageBody">&times;</button>
        <br>
                <div class="message-child-content-holder">
                    @if (count($messages) == 0)
                    <p>Message body is empty!</p>

                    @else

                    @foreach ($messages as $message)
                    <div class="sub-component-container">
                        <div class="profile-layout">
                            <img src="{{$message->profile ? asset('storage/' . $message->profile) : asset('images/profile.png')}}" alt="My Profile"><br>
                            <p>Sender: {{$message->sender_name}}</p>
                        </div><br>
                        <p class="message-sent"><em style="color: #FFFFFF;">{{$message->message}}</em></p>
                    </div><br>
                    @endforeach
                    @endif
                </div>
                <form action="/messages" method="POST" class="message-sender-class">
                    @csrf
                    <input type="hidden" name="profile" id="" value="{{Auth::guard('principal')->user()->profile}}">
                    <input type="hidden" name="sender_name" id="" value="{{Auth::guard('principal')->user()->full_name}}">
                    <input type="text" name="message" id="" placeholder="Start a message conversation here"><button type="submit"><i class="fa fa-paper-plane"></i></button>
                </form>
            </div><br><br>

            <script>
                function showMessageBody(){
                    document.querySelector('.message-container-parent').style.display='block';
                    document.querySelector('.container-centered-ajax').style.opacity='0';
                    document.querySelector('.group-analytics-data').style.opacity='0';

                    /*document.querySelector('.message-sender-class').addEventListener('submit', function(e){
                        e.preventDefault();
                        document.querySelector('.message-child-content-holder').style.display='block';
                    });*/
                }

                function hideMessageBody(){
                    location.reload();
                }
            </script>

        <center>
            <footer>
                <h4>IPT Management Portal, Developed by Paschal Mbowe <em class="yearShow"></em></h4>
            </footer>
        </center>

        <script>
            const showYear=new Date();

            const yearOptions={weekly: 'long' , year: 'numeric'};

            const fomartYear=showYear.toLocaleDateString('en-US',yearOptions);

            document.querySelector('.yearShow').textContent=fomartYear;
        </script>
        </div>
    </body>
</html>
