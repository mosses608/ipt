@extends('student.student-layout')


@section('content')
<br><br><br>

@include('partials.student-card')

<x-student-login-success />

<center>
    <div class="main-container-on-dashboard">
        <div class="left-seide-class-p">
            <a href="/student/student-dashboard">Student Dashboard</a>
        </div><br><br>
        <div class="active-academic-yr-sho">
            <div class="left-profile-less">
               <img src="{{auth()->guard('student')->user()->profile ? asset('storage/' . auth()->guard('student')->user()->profile) : asset('images/profile.png')}}" alt="Profile"> <p>{{auth()->guard('student')->user()->full_name}}</p>
            </div>
            <div class="centered-container">
                <p>Active Academic Year: <span class="previousYr"></span>/<span class="currentYr"></span> </p><br>
            </div><br><br>
        </div>

        <script>
            const newYr=new Date();

            const newYrOptions={weekly: 'long', year: 'numeric'};

            const formattedNewYr=newYr.toLocaleDateString('en-US',newYrOptions);

            document.querySelector('.currentYr').textContent=formattedNewYr;

            document.querySelector('.previousYr').textContent=formattedNewYr-1;
        </script>
        <br><br>

<div class="firm-profile-number-count"><br>
    <h1><i class="fa fa-book"></i></h1><br>
    <h1>Arrival Note <br></h1>
</div>
<div class="student-profile-number-count"><br>
    <h1><i class="fa fa-tasks"></i></h1><br>
    <h1>Daily Activity <br></h1>
</div>

<div class="vacancy-profile-number-count"><br>
    <h1><i class="fas fa-tasks"></i></h1><br>
    <h1>Weekly Summary <br></h1>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
</center>

@endsection
