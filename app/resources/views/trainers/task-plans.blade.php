@extends('trainers.trainer-layout')

@section('content')
<br><br><br>

@include('partials.trainer-card-view')

<x-task_plan />

<center>
    <div class="staff-dashboard-home-pan">
        <div class="sub-head">
            <a href="#">Dashboard</a> /
            <a href="#">Task Plans</a>
        </div><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        <button class="load-task-pna-form" onclick="loadTakPlanForm()">Load Form</button><br><br>

        <form action="/taskplans" method="POST" class="set-up-task-plan" enctype="multipart/form-data">
            @csrf

            <label for="">Day & Date</label><br>
            <input type="date" name="date_day" id=""><br><br>
            <label for="">Activity/Task</label><br>
            <input type="text" name="task" id="" placeholder="Specify tasks to be performed"> <br><br>
            <label for="">Suggested Tools</label><br>
            <input type="text" name="tools" id="" placeholder="Suggest tools used"><br><br>
            <input type="hidden" name="supervisor" id="" value="{{auth()->guard('trainer')->user()->full_name}}">
            <input type="hidden" name="company" id="" value="{{auth()->guard('trainer')->user()->company_name}}">
            <button type="submit" class="submit-task-plan">Submit</button><br><br>
        </form>
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

    function loadTakPlanForm(){
        document.querySelector('.set-up-task-plan').style.display='block';
    }
</script>

@endsection
