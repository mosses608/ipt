@extends('student.student-layout')


@section('content')
<br><br><br>

@include('partials.student-card')


<center>

    <div class="new-element0-dail-add">

        <p class="head-comp"><a href="#">Dashboard</a> / <a href="#">Task Plans</a></p><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        <button class="view-task-plans">Tasks Plan</button><br><br>


        <div class="calendar-task">

            @foreach ($completeapplications as $apps)

            @foreach ($firms as $firm)

            @foreach ($taskplans as $taskplan)



           @if (auth()->guard('student')->user()->username == $apps->reg_number && $taskplan->company == $apps->firm_name)


           <p>Mo</p>


           @endif

           @endforeach

           @endforeach


           @endforeach


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
