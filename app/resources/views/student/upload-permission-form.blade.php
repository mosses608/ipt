@extends('student.student-layout')

@section('content')
<br><br><br>

@include('partials.student-card')

<x-message-card-view />


<center>
    <div class="new-element0-dail-add">
        <p class="head-comp"><a href="/student/student-dashboard">Dashboard</a> / <a href="/student/add-daily-activity">Daily Activities</a></p><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        <button class="permission-open" onclick="showPermissionForm()">Show Form</button><br><br>

        <form action="/permissions" method="POST" class="upload-permission-form-container" enctype="multipart/form-data">
            @csrf
            <label for="">Upload Permission Form</label><br>
            <input type="file" name="permission" id=""><br><br>
            <input type="hidden" name="full_name" id="" value="{{Auth::guard('student')->user()->full_name}}">
            <input type="hidden" name="reg_number" id="" value="{{Auth::guard('student')->user()->username}}">
            <button type="submit" class="submit-form">Submit Form</button><br><br>
        </form><br><br><br><br><br><br><br><br><br>

    </div>
        <script>
            const fillDay=new Date();

            const DateOption={weekly: 'long', year: 'numeric', month: 'long', day: 'numeric'};

            const formatDate=fillDay.toLocaleDateString('en-US',DateOption);

            document.querySelector('.input-date').value=formatDate;

        </script>
<br>

    <script>
        const currentYear=new Date();

        const yearOption={weekly: 'long' , year: 'numeric'};

        //

        const formattedYear=currentYear.toLocaleDateString('en-US', yearOption);

        //

        document.querySelector('.currentYear').textContent=formattedYear;

        document.querySelector('.previousYear').textContent=formattedYear-1;

        //

        function showPermissionForm(){
            document.querySelector('.upload-permission-form-container').style.display='block';
        }
    </script>
</center>

@endsection
