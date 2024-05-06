@extends('trainers.trainer-layout')

@section('content')
<br><br><br>

@include('partials.trainer-card-view')

<center>
    <div class="staff-dashboard-home-pan">
        <div class="sub-head">
            <a href="/trainers/trainer-dashboard">Firm Trainer Dashboard</a> /
            <a href="/trainers/single-evaluation/{{$student->id}}">Students Assessment & Evaluation</a> / <a href="#">{{$student->full_name}}</a>
        </div><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        <table class="content-table">

            <tr>
                <th>Date</th>
                <th>Student Name</th>
                <th>Programme</th>
                <th>Department</th>
                <th>Academic Year</th>
                <th>Level</th>
                <th>Assessment</th>
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
                <button class="showAttendanceForm" onclick="showAEvaluationForm()">Show Form</button>
            </td>

</tr>
        @endif
        @endforeach
        @endforeach
    </table>
</div>
    <form action="/evaluations" method="POST" class="upload-evaluation-form">
        @csrf

        <!--<h1>MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY</h1>-->
        <h1 class="heading-component">INDUSTRIAL / FIELD SUPERVISOR'S ASSESSMENT FORM</h1><br>

        <div class="assessment-part0">
        @foreach ($completeapplications as $apps)

        @if ($apps->reg_number == $student->username)
        <label for="">INDUSTRY / FIRM: </label>
        <input type="text" name="firm_name" id="" value="{{$apps->firm_name}}"><br><br>
        <label for="">NAME OF STUDENT: </label>
        <input type="text" name="student_name" id="" value="{{$student->full_name}}"><br><br>
        <label for="">ADM NO: </label>
        <input type="text" name="adm_no" id="" value="{{$student->username}}"><br><br>
        <label for="">COURSE: </label>
        <input type="text" name="course" id="" value="{{$student->programme}}"><br><br>
        <label for="">DEPARTMENT: </label>
        <input type="text" name="department" id="" value="{{$student->department}}"><br><br>
        <label for="">ACADEMIC YEAR: </label>
        <input type="text" name="year" id="" value="{{$student->year}}"><br><br>
        <label for="">LEVEL: </label>
        <input type="text" name="level" id="" value="{{$student->level}}"><br><br>

        @endif
        @endforeach
    </div><br><br><br>

    <div class="evaluation-part01">
        <p>This is to certify that the above-mentioned student has attended Industrial practical training (IPT) / Field Practical Training (FTP)</p>
        <label for="">With us for a period of </label><br><br><br>
        <input type="number" name="total_days" id="" placeholder=".................................... days"><br><br>
        <label for="">i.e From</label><br><br>
        <input type="date" name="from" id=""  placeholder="...................................."><br><br>
        <label for=""> To</label><br><br>
        <input type="date" name="to" id=""  placeholder="...................................."><br><br>
        <label for="">Name of Supervisor</label><br><br>
        <input type="text" name="field_supervisor" id="" value="{{auth()->guard('trainer')->user()->full_name}}"><br><br>
        <label for="">Position</label><br><br>
        <input type="text" name="supervisor_position" id="" placeholder="...................................."><br><br>
    </div>

        <br><br>

        <div class="evaluation-part02">
            <h2>AWARDS OF MARKS</h2><br><br>
            <p>The marks given range from 1 to 10 i.e</p><br>
            <p>10: Excellent, 8 - 9: Very Good, 6 - 7: Good, 4 - 5: Satisfactory, 1 - 3: Unsatisfactory</p><br><br>
            <h2>A: ASSESSMENT</h2><br><br><br>
            <table class="evaluation-form-data">
                <tr>
                    <th>S/N</th>
                    <th>ITEM DESCRIPTION</th>
                    <th>SCORE</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Ability in planning and carrying out assigned job</td>
                    <td><input type="number" name="score1" id=""></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Selection of proper tools and their handling</td>
                    <td><input type="number" name="score2" id=""></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Execution of assigned job</td>
                    <td><input type="number" name="score3" id=""></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Quality and tidiness of finished job</td>
                    <td><input type="number" name="score4" id=""></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Self confidence</td>
                    <td><input type="number" name="score5" id=""></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Coorperation with other members of staff</td>
                    <td><input type="number" name="score6" id=""></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Attendance and punctuality</td>
                    <td><input type="number" name="score7" id=""></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Obedience</td>
                    <td><input type="number" name="score8" id=""></td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Initiative (Self drive)</td>
                    <td><input type="number" name="score9" id=""></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Willingness to learn</td>
                    <td><input type="number" name="score10" id=""></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Average score</td>
                    @foreach ($evaluations as $evaluate)
                    @if ($evaluate->adm_no == $student->username)
                    <td class="average-score">{{$evaluate->score1}}*{{$evaluate->score2}}</td>
                    @endif
                    @endforeach
                </tr>
            </table>
        </div><br><br><br>
        <button type="submit" class="submit-attendance">Submit</button><br><br>
    </form>


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
    }

    function showAEvaluationForm(){
        document.querySelector('.upload-evaluation-form').style.display='block';
        document.querySelector('.upload-evaluation-form').style.animation='slowInside 3s forwards';
        //document.querySelector('.staff-dashboard-home-pan').style.width='900px';
        document.querySelector('.content-table').style.opacity='1';
    }
</script>

@endsection
