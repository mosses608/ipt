@extends('student.student-layout')

@section('content')
<br><br><br>

@include('partials.student-card')

<x-weekly-summary />

<center>
    <div class="weekly_summary-container">
        <div class="sub-head">
            <a href="/student/student-dashboard">Dashboard</a> / <a href="/student/add-weekly-summary">Weekly Summary</a>
        </div><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>
        <button class="load-items-hidden" onclick="showSummaryForm()">Load Form</button><br><br>

        <form action="/summaries" method="POST" class="writable-summary-form">
            @csrf
            <input type="hidden" name="reg_number" id="" value="{{auth()->guard('student')->user()->username}}">
            <input type="hidden" name="full_name" id="" value="{{auth()->guard('student')->user()->full_name}}">
            <textarea name="weekly_summary" id="" placeholder="Write Your Full Weekly Summary Here"></textarea><br><br>
            <button type="submit">Submit Weekly Summary</button><br><br><br>
        </form>

        <script>

            function showSummaryForm(){
                document.querySelector('.writable-summary-form').style.display='block';
                document.querySelector('.writable-summary-form').style.animation='slideSlowly 3s forwards';
            }
        </script>
    </div>

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

</center>

@endsection
