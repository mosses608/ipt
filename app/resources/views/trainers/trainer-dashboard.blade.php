@extends('trainers.trainer-layout')

@section('content')
<br><br><br>

@include('partials.trainer-card-view')

<x-trainer_login />

<center>
    <div class="staff-dashboard-home-pan">
        <div class="sub-head">
            <a href="/trainers/trainer-dashboard">Firm Trainer Dashboard</a>
        </div><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>
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
