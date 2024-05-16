@extends('ipt.ipt-layout')

@section('content')
<br><br><br>

@include('partials.coordinator')

<x-ipt-coord-login />

<center>
    <div class="ipt-coordintor-dashboard-class">
        <p class="ipt-parag">IPT Coordinator Dashboard</p><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br><br><br><br>


        <div class="firm-profile-number-count"><br>
            <h1><i class="fa fa-building"></i></h1><br>
            <h1>Total Firms <br>{{count($firms)}}</h1>
        </div>
        <div class="student-profile-number-count"><br>
            <h1><i class="fa fa-graduation-cap"></i></h1><br>
            <h1>Total Students <br>{{count($students)}}</h1>
        </div>

        <div class="vacancy-profile-number-count"><br>
            <h1><i class="fas fa-user"></i></h1><br>
            <h1>Total Staff <br>{{count($hods)}}</h1>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
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
