@extends('student.student-layout')

@section('content')
<br><br><br>

@include('partials.student-card')

<x-feedbacks />

<center>
    <div class="feedbacks-class-container">
        <div class="sub-head">
            <a href="/student/student-dashboard">Dashboard</a> / <a href="/student/feedbacks">Feedbacks</a>
        </div><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div>
        <br>
        <button class="load-items-hidden" onclick="showFeedbackForm()">Load Form</button><br><br>

        <form action="/feedbacks" method="POST" class="send-feedbacks-feed">
            @csrf
            <input type="hidden" name="full_name" value="{{auth()->guard('student')->user()->full_name}}">
            <input type="hidden" name="reg_number" value="{{auth()->guard('student')->user()->username}}">
            <label for="">Feedbacks</label><br>
            <textarea name="feedback" id="" placeholder="Enter Your Feedbacks on the Firm IPT"></textarea><br><br>
            <button class="send-ffedbacks" type="submit">Submit Feedbacks</button><br><br>
        </form>
    </div><br>

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
