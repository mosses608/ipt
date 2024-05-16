@extends('staffs.staff-layout')

@section('content')
<br><br><br>

@include('partials.staff-card')

<center>
    <div class="ipt-coordintor-dashboard-class">
        <p class="ipt-parag">Student Activities</p><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div>

        <div class="load-data-student-list">

            <form action="/assessments" method="POST" class="upload-evaluation-form-on" style="display: block; margin-top
            0%;">
                @csrf

                <!--<h1>MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY</h1>-->
                <h1 class="heading-component">INDUSTRIAL / FIELD SUPERVISOR'S ASSESSMENT FORM</h1><br>

                <div class="assessment-part0">
                @foreach ($completeapplications as $apps)

                @if ($apps->reg_number == $student->username)
                <label for="">NAME OF UNIVERSITY SUPERVISOR</label>
                <input type="text" name="supervisor" id="" value="{{auth()->guard('hod')->user()->full_name}}"><br><br>
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
                <label for="">INDUSTRY / FIRM: </label>
                <input type="text" name="firm_name" id="" value="{{$apps->firm_name}}"><br><br>

                @endif
                @endforeach
            </div><br><br><br>

            <div class="evaluation-part01">

            </div>

                <br><br>

                <div class="evaluation-part02">
                    <h2>AWARDS OF MARKS</h2><br><br>
                    <p>The marks given range from 1 to 10 i.e</p><br>
                    <p>10: Excellent, 8 - 9: Very Good, 6 - 7: Good, 4 - 5: Satisfactory, 1 - 3: Unsatisfactory</p><br><br>
                    <h2>A: ASSESSMENT</h2><br><br><br>
                    <h3>DISCUSSION WITH THE MANAGEMENT (based on students's ability to work in industry)</h3>

                    <table>
                        <tr>
                            <th>S/N</th>
                            <th>ITEM DESCRIPTION</th>
                            <th>Max score % </th>
                            <th>Actual score %</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>His/her attitude towards practical work</td>
                            <td>10</td>
                            <td><input type="number" name="score1" id="" class="score1" value="{{old('score1')}}"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>The student's ability to execute jobs assigned to him/her intelligently and with integrity</td>
                            <td>10</td>
                            <td><input type="number" name="score2" id="" class="score2" value="{{old('score2')}}"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>His/her work habits (punctuality, attendance, etc)</td>
                            <td>10</td>
                            <td><input type="number" name="score3" id="" class="score3" value="{{old('score3')}}"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>His/her ability to cooporate with co-workers, foreman and management</td>
                            <td>10</td>
                            <td><input type="number" name="score4" id="" class="score4" value="{{old('score4')}}"></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Do you thinkm the Management is quite happy with the student as good as all hard worker</td>
                            <td>10</td>
                            <td><input type="number" name="score5" id="" class="score5" value="{{old('score5')}}"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Subtotal</td>
                            <td></td>
                            @foreach ($assessments as $assessment)
                                @if ($assessment->adm_no == $student->username)
                                <td class="sub-total-score1">
                                {{$assessment->score1 + $assessment->score2 + $assessment->score3 + $assessment->score4 + $assessment->score5}}
                                </td>
                                @endif
                                @endforeach
                        </tr>
                    </table><br><br>
<!--
                    <script>

                        document.addEventListener('DOMContentLoaded', function(){

                        const score1=document.querySelector('.score1').value;
                        const score2=document.querySelector('.score2').value;
                        const score3=document.querySelector('.score3').value;
                        const score4=document.querySelector('.score4').value;
                        const score5=document.querySelector('.score5').value;

                        const sub_total=score1+score2+score3+score4+score5;

                        document.querySelector('.sub-total-score1').addEventListener('mousemove', function(){
                                document.querySelector('.sub-total-score1').textContent=sub_total;
                                alert(sub_total);
                        });
                       });
                    </script>
                -->
                    <h3>DISCUSSION WITH THE STUDENT (based on student's skills and knowledge obtained from industry)</h3>
                    <table>
                        <tr>
                            <th>S/N</th>
                            <th>ITEM DESCRIPTION</th>
                            <th>Max Score %</th>
                            <th>Actual Score %</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Neatness, cleanness and up to date recording in the logbook</td>
                            <td>10</td>
                            <td><input type="number" name="score6" id="" class="score6" value="{{old('score6')}}"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Does the student understand what he/she has done?</td>
                            <td>10</td>
                            <td><input type="number" name="score7" id="" class="score7" value="{{old('score7')}}"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Knowledge on the student on what he/she has written</td>
                            <td>10</td>
                            <td><input type="number" name="score8" id="" class="score8" value="{{old('score8')}}"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Interest of eagerness to learn new skills and knowledge</td>
                            <td>10</td>
                            <td><input type="number" name="score9" id="" class="score9" value="{{old('score9')}}"></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Ability to do assigned jobs related to the relevant field</td>
                            <td>10</td>
                            <td><input type="number" name="score10" id="" class="score10" value="{{old('score10')}}"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Subtotal Actual score 2</td>
                            <td></td>

                                @foreach ($assessments as $assessment)
                                @if ($assessment->adm_no == $student->username)
                                <td class="sub-total-score2">
                                {{$assessment->score6 + $assessment->score7 + $assessment->score8 + $assessment->score9 + $assessment->score10}}
                                </td>
                                @endif
                                @endforeach

                        </tr>
                    </table><br><br>


                    <h3>AWARDED MARKS</h3>
                    <table>
                        <tr>
                            <th>S/N</th>
                            <th>Subtotal 1</th>
                            <th>Subtotal 2</th>
                            <th>Total</th>
                        </tr>
                        <tr>
                            <td>1</td>

                                @foreach ($assessments as $assessment)
                                @if ($assessment->adm_no == $student->username)
                                <td class="sub-total1">
                                {{$assessment->score1 + $assessment->score2 + $assessment->score3 + $assessment->score4 + $assessment->score5}}
                                </td>
                                @endif
                                @endforeach



                                @foreach ($assessments as $assessment)
                                @if ($assessment->adm_no == $student->username)
                                <td class="sub-total2">
                                {{$assessment->score6 + $assessment->score7 + $assessment->score8 + $assessment->score9 + $assessment->score10}}
                                </td>
                                @endif
                                @endforeach


                                @foreach ($assessments as $assessment)
                                @if ($assessment->adm_no == $student->username)
                                <td class="total-all">
                                    {{($assessment->score1 + $assessment->score2 + $assessment->score3 + $assessment->score4 + $assessment->score5 + $assessment->score6 + $assessment->score7 + $assessment->score8 + $assessment->score9 + $assessment->score10) * 0.2}}
                                </td>
                                @endif
                                @endforeach

                        </tr>
                    </table><br><br>
                </div><br><br><br>
                <button type="submit" class="submit-attendance">Submit</button><br><br>
            </form><br><br><br>


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

    function showProgress(){
        document.querySelector('.progress-report-student').style.display='block';
    }
</script>

@endsection
