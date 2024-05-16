@extends('ipt.ipt-layout')

@section('content')
<br><br><br>

@include('partials.coordinator')

<center>
    <div class="ipt-coordintor-dashboard-class">
        <p class="ipt-parag">Single Student</p><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        <div class="load-data-student-list">
            <table>
                <tr>
                    <th>Student Name</th>
                    <th>Registration Number</th>
                    <th>Programme</th>
                    <th>Department</th>
                    <th>College</th>
                    <th>Academic Year</th>
                    <th>Level</th>
                    <th>IPT Supervisor</th>
                    <th>Actions</th>
                </tr>
                <tr>

                    <td>{{$student->full_name}}</td>
                    <td>{{$student->username}}</td>
                    <td>{{$student->programme}}</td>
                    <td>{{$student->department}}</td>
                    <td>{{$student->college}}</td>
                    <td>{{$student->year}}</td>
                    <td>{{$student->level}}</td>
                    @if ($student->supervisor !="")
                    <td>{{$student->supervisor}}</td>
                    @else
                    <td><button onclick="showUpdateForm()">Assign</button></td>
                    @endif
                    <td class="activity-button"><button onclick="showDailyTasks()">Daily</button> <button class="weekly-summary-button" onclick="showWeeklySummary()">Weekly</button> <button class="permission-button" onclick="showPermissionData()">Permission</button></td>

                </tr>


            </table><br><br>

        </div>

        <div class="assign-person-container">
            <form action="/students/updateassign/{{$student->id}}" method="POST" class="assign-drive">
                @csrf
                @method('PUT')
                <label for="">Assign IPT Supervisor</label><select name="supervisor" id="">
                    <option value="//">Choose IPT Supervisor Name</option>
                    @foreach ($assignments as $assignment)
                    <option value="{{$assignment->full_name}}">{{$assignment->full_name}}, {{$assignment->college}}</option>
                    @endforeach
                </select><br><br>
                <button type="submit" class="assign-act-button">Assign Supervisor</button><br>
            </form>
        </div>

        <div class="view-daily-tasks">
            @foreach ($activities as $activity)
            @if ($activity->reg_number == $student->username)
            <p>In this day {{$activity->submit_day}} I conducted {{$activity->nu_activities}} activity(s) </p>
            @if ($activity->task01 !="")
                <li>{{$activity->task01}}</li>
                <a href="{{asset('storage/' . $activity->attachment)}}"><img src="{{$activity->attachment ? asset('storage/' . $activity->attachment) : asset('images/profile.png')}}" alt="Attachment"></a>
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

            <textarea>{{$summary->weekly_summary}} <br>
            </textarea><br><br>

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
    document.querySelector('.ipt-coordintor-dashboard-class').style.height='350px';
    //document.querySelector('.load-data-student-list').sty
}

function showDailyTasks(){
    document.querySelector('.view-daily-tasks').style.display='block';
    document.querySelector('.load-data-student-list').style.opacity='0';
    document.querySelector('.ipt-coordintor-dashboard-class').style.height='600px';
}

function showWeeklySummary(){
    document.querySelector('.view-weekly-summary-class-con').style.display='block';
    document.querySelector('.load-data-student-list').style.opacity='0';
    document.querySelector('.ipt-coordintor-dashboard-class').style.height='600px';
}

function showPermissionData(){
    document.querySelector('.permission-form-data-uplo').style.display='block';
    document.querySelector('.load-data-student-list').style.opacity='0';
    document.querySelector('.ipt-coordintor-dashboard-class').style.height='600px';
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
