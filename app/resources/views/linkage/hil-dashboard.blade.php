@extends('linkage.hil-layout')

@section('content')
<br><br><br>

@include('partials.hil-card')

<x-hil_login_message />

<center>
    <div class="hil-linkage-dashboard">
        <div class="sub-head">
            <a href="/#">Dashboard</a> / <a href="#">{{Auth::guard('linkage')->user()->full_name}}</a>
        </div><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div>

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
