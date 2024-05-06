@extends('hrs.hr-layout')


@section('content')
<br><br><br>

@include('partials.hr-card')

<x-success_sent-message />

<center>
    <div class="hr-dashboard-container">
        <p class="head-main-head">Send Feedbacks</p><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>
        <button class="load-items-hidden" onclick="showFeedbackForm()">Load Form</button><br><br>

        <form action="/studentfeedbacks" method="POST" class="send-feedbacks-feed">
            @csrf
            <input type="hidden" name="full_name" value="{{auth()->guard('hr')->user()->full_name}}">
            <label for="">Feedbacks</label><br>
            <textarea name="feedback" id="" placeholder="Enter Your Feedbacks on the Students"></textarea><br><br>
            <button class="send-ffedbacks" type="submit">Submit Feedbacks</button><br><br>
        </form>
    </div>

    <script>
        function showFeedbackForm(){
            document.querySelector('.send-feedbacks-feed').style.display='block';
            document.querySelector('.send-feedbacks-feed').style.animation='slideSlowly 3s forwards';
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
