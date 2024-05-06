@extends('student.student-layout')

@section('content')
<br><br><br>

@include('partials.student-card')

<x-report-submitted />

<center>
<div class="field-report-body">
    <div class="sub-head">
        <a href="/student/student-dashboard">Dashboard</a> / <a href="/student/upload-field-report">Field Report</a>
    </div><br><br>
    <div class="academic-year-status">
        <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
    </div>
    <br>
    <button class="load-items-hidden" onclick="showReportForm()">Load Form</button><br><br>

    <form action="/reports" method="POST" class="upload-field-report-final" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="full_name" id="" value="{{auth()->guard('student')->user()->full_name}}">
        <input type="hidden" name="reg_number" value="{{auth()->guard('student')->user()->username}}">
        <label for="">Upload a field report in a PDF format</label><br>
        <input type="file" name="field_report" id=""><br><br>
        <button type="submit" class="upload-report">Submit Field Report</button><br><br>
    </form>

    <script>
        function showReportForm(){
            document.querySelector('.upload-field-report-final').style.display='block';
            document.querySelector('.upload-field-report-final').style.animation='slideSlowly 3s forwards';
        }
    </script>
</div>
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
