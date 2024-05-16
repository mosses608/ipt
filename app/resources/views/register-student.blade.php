@extends('admin-layout')

@section('content')
<br><br><br>

@include('partials.card-view')

<x-student-created-message />

<center>
    <form action="/students" method="POST" class="ajax-lg-bx-sudent-comp" enctype="multipart/form-data">


        <p class="head-main-head">Student Registration</p><br><br>
        <div class="academic-year-status" id="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br><br>
        </div><br>

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


        @csrf
        <p>Students Registration Form</p><br><br>
        <div class="left-side-panel">
            <label for="">Full Name</label><br>
            <input type="text" name="full_name" id="" placeholder="Enter student full name" value="{{old('full_name')}}"><br><br>
            <label for="">Registration Number</label><br>
            <input type="number" name="username" id="" placeholder="Enter student registration number as username" value="{{old('regNo')}}"><br><br>
            <label for="">Programme</label><br>
            <select name="programme" id="">
                <option value="//">Choose Programme</option>
                @foreach ($programmes as $program)
                <option value="{{$program->programme_name}}">{{$program->programme_name}}</option>
                @endforeach
            </select><br><br>
            <label for="">Department</label><br>
            <select name="department" id="">
                <option value="//">Choose separtment</option>
                @foreach ($departments as $department)
                <option value="{{$department->department_name}}">{{$department->department_name}}</option>
                @endforeach
            </select><br><br>
            <label for="">College</label><br>
            <select name="college" id="">
                <option value="//">Choose college</option>
                @foreach ($colleges as $college)
                <option value="{{$college->college_name}}">{{$college->college_name}}</option>
                @endforeach
            </select><br><br>
        </div>

        <div class="right-side-panel">
            <label for="">Academic Year</label><br>
            <input type="text" name="year" id="" placeholder="Enter academic year eg 2020/2021" value="{{old('year')}}"><br><br>
            <label for="">Password</label><br>
            <input type="password" name="password" id="" placeholder="Strong password is recommended"><br><br>
            <label for="">Level</label>
            <select name="level" id="">
                <option value="//">Choose level</option>
                <option value="Certificate">Certificate</option>
                <option value="Diploma">Diploma</option>
                <option value="Degree">Degree</option>
            </select><br><br>
            <label for="">Profile Picture</label><br>
            <input type="file" name="profile" id=""><br><br><br>
            <button type="submit">Register</button><br><br>
        </div>
    </form>
</center>
@endsection
