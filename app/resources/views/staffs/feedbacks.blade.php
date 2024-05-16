@extends('staffs.staff-layout')


@section('content')
<br><br><br>

@include('partials.staff-card')


<center>
    <div class="staff-dashboard-home-pan">
        <div class="sub-head">
            <a href="/staffs/staff-dashboard">Department Dashboard</a>
        </div><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        @foreach ($studentfeedbacks as $studentfeedback)

        <div class="feedback-container">
            <p>{{$studentfeedback->feedback}} <span>{{$studentfeedback->created_at}}</span></p><br><br><br>
        </div><br>

        @endforeach

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
