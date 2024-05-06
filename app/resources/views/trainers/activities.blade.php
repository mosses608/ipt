@extends('trainers.trainer-layout')

@section('content')
<br><br><br>

@include('partials.trainer-card-view')

<center>
    <div class="staff-dashboard-home-pan">
        <div class="sub-head">
            <a href="/trainers/trainer-dashboard">Firm Trainer Dashboard</a> /
            <a href="/trainers/activities">Students Activities</a>
        </div><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        <table>

            <tr>
                <th>Date</th>
                <th>Student Name</th>
                <th>Programme</th>
                <th>Department</th>
                <th>Academin Year</th>
                <th>Level</th>
                <th>Action</th>
            </tr>

        @foreach ($trainers as $trainer)

        @foreach ($students as $student)

        @foreach ($completeapplications as $apps)

        @if ($student->username == $apps->reg_number && $apps->firm_name == $trainer->company_name)
        <tr>
            <td><p class="currentDay"></p></td>

            <script>
                const currentDay=new Date();

                const optionDay={weekly: 'long', year: 'numeric' , month: 'long', day: 'numeric'};

                const formattedDay=currentDay.toLocaleDateString('en-US',optionDay);

                document.querySelector('.currentDay').textContent=formattedDay;
            </script>

            <td>{{$student->full_name}}</td>
            <td>{{$student->programme}}</td>
            <td>{{$student->department}}</td>
            <td>{{$student->year}}</td>
            <td>{{$student->level}}</td>
            <td>
                <a href="/trainers/single-activity/{{$student->id}}"><i class="fa fa-eye"></i></a>
                <!--<button class="view-daily">Daily</button>
                <button class="weekly-view">Weekly</button>
                <button class="permission-form">Permission</button>-->
            </td>

</tr>
        @endif
        @endforeach
        @endforeach
        @endforeach
    </table>
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
