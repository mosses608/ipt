@extends('trainers.trainer-layout')

@section('content')
<br><br><br>

@include('partials.trainer-card-view')

<center>
    <div class="staff-dashboard-home-pan">
        <div class="sub-head">
            <a href="/trainers/trainer-dashboard">Firm Trainer Dashboard</a> /
            <a href="/trainers/attendance">Students Attendance</a> / <a href="#">{{$student->full_name}}</a>
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
                <th>Attendance</th>
            </tr>

        @foreach ($trainers as $trainer)

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
                <button class="showAttendanceForm" onclick="showAttendanceForm()">Show</button>
            </td>

</tr>
        @endif
        @endforeach
        @endforeach
    </table>
<br>


    <form action="/attendances" method="POST" class="upload-attendnce-data">
        @csrf
        <br>
        <input type="hidden" name="reg_number" value="{{$student->username}}">
        <input type="hidden" name="full_name" id="" value="{{$student->full_name}}">
        <input type="hidden" name="programme" id="" value="{{$student->programme}}">
        <input type="hidden" name="department" id="" value="{{$student->department}}">
        <input type="hidden" name="year" id="" value="{{$student->year}}">
        <input type="hidden" name="level" id="" value="{{$student->level}}">
        <!--<p>Is {{$student->full_name}} present?</p>--><br>
        <label for="">Present</label>
        <input type="radio" name="present" id="" value="present">
        <label for="">Absent</label>
        <input type="radio" name="absent" id="" value="absent"><br><br><br>
        <center><button type="submit" class="submit-attendance">Submit</button></center>
    </form>
    <button class="close-content-displayed" onclick="closeContent()">Close</button><br><br>
    <br>
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

    function showAttendanceForm(){
        document.querySelector('.upload-attendnce-data').style.display='block';
        document.querySelector('.close-content-displayed').style.display='block';
    }

    function closeContent(){
        location.reload();
    }
</script>

@endsection
