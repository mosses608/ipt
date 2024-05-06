@extends('trainers.trainer-layout')

@section('content')
<br><br><br>

@include('partials.trainer-card-view')

<center>
    <div class="staff-dashboard-home-pan">
        <div class="sub-head">
            <a href="/trainers/trainer-dashboard">Firm Trainer Dashboard</a> /
            <a href="/trainers/activities">Students Activities</a> / <a href="#">{{$student->full_name}}</a>
        </div><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>



    <table class="table-data-content">

        <tr>
            <th>Student Name</th>
            <th>Programme</th>
            <th>Department</th>
            <th>Academin Year</th>
            <th>Level</th>
            <th>Action</th>
        </tr>

        @foreach ($trainers as $trainer)

        @foreach ($completeapplications as $apps)

        @if ($student->username == $apps->reg_number && $apps->firm_name == $trainer->company_name)
        <tr>

            <td>{{$student->full_name}}</td>
            <td>{{$student->programme}}</td>
            <td>{{$student->department}}</td>
            <td>{{$student->year}}</td>
            <td>{{$student->level}}</td>
            <td>
                <button class="view-daily" onclick="showDailyTasks()">Daily</button>
                <button class="weekly-view" onclick="showWeeklySummary()">Weekly</button>
                <button class="permission-form" onclick="showPermissionData()">Permission</button>
            </td>

</tr>
        @endif
        @endforeach
        @endforeach

    </table>



    <div class="view-daily-tasks">
        @foreach ($activities as $activity)
        @if ($activity->reg_number == $student->username)
        <p>In this day {{$activity->submit_day}} I conducted {{$activity->nu_activities}} activity(s) </p><br>
        @if ($activity->task01 !="")
            <li>{{$activity->task01}}</li>
            @elseif($activity->task21 !="")
            <li>{{$activity->task21}}</li>
            <li>{{$activity->task22}}</li>
            @elseif($activity->task31 !="")
            <li>{{$activity->task31}}</li>
            <li>{{$activity->task32}}</li>
            <li>{{$activity->task33}}</li>
            @elseif($activity->task41 !="")
            <li>{{$activity->task41}}</li>
            <li>{{$activity->task42}}</li>
            <li>{{$activity->task43}}</li>
            <li>{{$activity->task44}}</li>


        @endif
        @else
        <p>No daily activity uploaded!</p><br><br>
        <i class="fa fa-upload"></i><br><br> <i class="fas fa-cloud"></i>
        @endif
        @endforeach
        <br>

    </div>

    <div class="view-weekly-summary-class-con">
        @foreach ($summaries as $summary)
        @if ($summary->reg_number == $student->username)

        <textarea>{{$summary->weekly_summary}}</textarea><br><br>

        <p>Submitted on {{$summary->created_at}}</p>

        @else
        <p>No weekly summary uploaded!</p><br><br>

        <i class="fa fa-upload"></i><br><br> <i class="fas fa-cloud"></i>
        @endif
        @endforeach
    </div>

    <div class="permission-form-data-uplo">
        <br>
        <p>No data found!</p>
    </div>

    <script>


        function showUpdateForm(){
            document.querySelector('.assign-person-container').style.display='block';
            document.querySelector('.load-data-student-list').style.opacity='0';
            //document.querySelector('.load-data-student-list').sty
        }

        function showDailyTasks(){
            document.querySelector('.view-daily-tasks').style.display='block';
            document.querySelector('.table-data-content').style.opacity='0';
            document.querySelector('.staff-dashboard-home-pan').style.height='400px';
        }

        function showWeeklySummary(){
            document.querySelector('.view-weekly-summary-class-con').style.display='block';
            document.querySelector('.table-data-content').style.opacity='0';
            document.querySelector('.staff-dashboard-home-pan').style.height='600px';
        }

        function showPermissionData(){
            document.querySelector('.permission-form-data-uplo').style.display='block';
            document.querySelector('.table-data-content').style.opacity='0';
            document.querySelector('.staff-dashboard-home-pan').style.height='600px';
        }
                </script>

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
