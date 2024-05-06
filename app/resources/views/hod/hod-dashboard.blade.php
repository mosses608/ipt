@extends('hod.hod-layout')


@section('content')
<br><br><br>

@include('partials.hod-card')

<x-staff_hod_success />


<center>
    <div class="hr-dashboard-container">
        <p class="head-main-head">HoD Dashboard</p><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>
    </div>




    <button class="message-action-module" onclick="showMessageBody()"><span style="color: #0000FF;">{{count($messages)}}</span><i class="fa fa-bell"></i></button>

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
                    <img src="{{$message->profile ? asset('storage/' . auth()->guard('hod')->user()->profile) : asset('images/profile.png')}}" alt="My Profile"><br>
                    <p>Sender: {{$message->sender_name}}</p>
                </div><br>
                <p class="message-sent"><em style="color: #FFFFFF; padding:10px;">{{$message->message}}</em></p>
            </div><br>

            @endforeach
            @endif
        </div>
        <form action="/messages" method="POST" class="message-sender-class">
            @csrf
            <input type="hidden" name="profile" id="" value="{{auth()->guard('hod')->user()->profile}}">
            <input type="hidden" name="sender_name" id="" value="{{auth()->guard('hod')->user()->full_name}}">
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
</center>

<script>
    const currentYear=new Date();

    const yearOption={weekly: 'long' , year: 'numeric'};

    //

    const formattedYear=currentYear.toLocaleDateString('en-US', yearOption);

    //

    document.querySelector('.currentYear').textContent=formattedYear;

    document.querySelector('.previousYear').textContent=formattedYear-1;

    //
</script>

@endsection
