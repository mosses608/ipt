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

        <div class="container-centered-ajax-lg">
            <div class="staff-report-db">
                <h2><i class="fa fa-graduation-cap"></i> <br> Total Students <br> {{count($students)}}</h2>
            </div>
            <div class="staff-report-db">
                <h2><i class="fas fa-user-tie"></i><br> Total Staffs <br> {{count($hods)}}</h2>
            </div>
           <div class="staff-report-db">
                <h2><i class="fas fa-building"></i> <br>Total Departments <br>{{count($departments)}}</h2>
            </div>

            <div class="staff-report-db">
                <h2><i class="fas fa-briefcase"></i> <br>Total Firms <br> {{count($firms)}}</h2>
            </div><br>
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
