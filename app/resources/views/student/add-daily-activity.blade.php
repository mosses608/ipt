@extends('student.student-layout')

@section('content')
<br><br><br>

@include('partials.student-card')

<x-message-card-view />

@foreach ($activities as $activity)

@endforeach

<center>
    <div class="new-element0-dail-add">
        <p class="head-comp"><a href="/student/student-dashboard">Dashboard</a> / <a href="/student/add-daily-activity">Daily Activities</a></p><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        <button class="load-items-hidden" onclick="shiwForm()">Load Form</button>
        @if ($activity->reg_number == auth()->guard('student')->user()->username)
        <button class="display-content-button" onclick="showMyDailyTasks()"><i class="fa fa-eye"></i> View</button>
        @endif
        <br>

        <form action="/activities" method="POST" class="add-daily-task-class" enctype="multipart/form-data">
            @csrf
            <p>Industrial/Field Placement Report <br>Weekly Activities Log</p><br>
            <div class="head-component">
                <h4>Name of Student: {{auth()->guard('student')->user()->full_name}}</h4>
                @foreach ($completeapplications as $apply)
                @if ($apply->reg_number == auth()->guard('student')->user()->username)
                <h4>Name of Industry/Firm: {{$apply->firm_name}}</h4>
                @endif
                @endforeach
                <input type="hidden" name="full_name" id="" value="{{auth()->guard('student')->user()->full_name}}">
                <input type="hidden" name="reg_number" id="" value="{{auth()->guard('student')->user()->username}}">




                <br>
                <div class="inp-select-0">
                    <label for="">Day<span>*</span></label>
                <select name="submit_day" id="">
                    <option value="//">Choose day</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                </select>
                </div>
                <div class="input-select-01">
                    <label for="">Number of Activities<span>*</span></label>
                    <select name="nu_activities" id="" class="select">
                        <option value="None">None</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div><br><br>

                <div class="single-activity-class" style="display: none;">
                    <label for="">Activity Name</label>
                    <input type="text" name="task01" id="" placeholder="Enter activity name"><br><br>
                    <!--<label for="">Attachment</label>
                    <input type="file" name="attachment" id=""><br><br><br>-->
                </div>

                <div class="double-activity-class" style="display: none;">
                    <label for="">Activity 1</label>
                    <input type="text" name="task21" id="" placeholder="Enter activity name"><br><br>
                    <!--<label for="">Attachment</label>
                    <input type="file" name="attachment01" id="">-->

                    <label for="">Activity 2</label>
                    <input type="text" name="task22" id="" placeholder="Enter activity name"><br><br>
                    <!--<label for="">Attachment</label>
                    <input type="file" name="attachment02" id=""><br><br>-->
                </div>

                <div class="tripple-activity-class" style="display: none;">
                    <label for="">Activity 1</label>
                    <input type="text" name="task31" id="" placeholder="Enter activity name"><br><br>
                    <!--<label for="">Attachment</label>
                    <input type="file" name="attachment01" id="">-->

                    <label for="">Activity 2</label>
                    <input type="text" name="task32" id="" placeholder="Enter activity name"><br><br>
                    <!--<label for="">Attachment</label>
                    <input type="file" name="attachment02" id=""><br><br>-->
                    <label for="">Activity 3</label>
                    <input type="text" name="task33" id="" placeholder="Enter activity name"><br><br>
                   <!-- <label for="">Attachment</label>
                    <input type="file" name="attachment03" id=""><br><br><br>-->
                </div>

                <div class="multiple-activity-class" style="display: none;">
                    <label for="">Activity 1</label>
                    <input type="text" name="task41" id="" placeholder="Enter activity name"><br><br>
                    <!--<label for="">Attachment</label>
                    <input type="file" name="attachment01" id="">-->

                    <label for="">Activity 2</label>
                    <input type="text" name="task42" id="" placeholder="Enter activity name"><br><br>
                    <!--<label for="">Attachment</label>
                    <input type="file" name="attachment02" id=""><br><br>-->
                    <label for="">Activity 3</label>
                    <input type="text" name="task43" id="" placeholder="Enter activity name"><br><br>
                   <!-- <label for="">Attachment</label>
                    <input type="file" name="attachment03" id=""><br><br>-->
                    <label for="">Activity 4</label>
                    <input type="text" name="task44" id="" placeholder="Enter activity name"><br><br>
                    <!--<label for="">Attachment</label>
                    <input type="file" name="attachment04" id=""><br><br><br>-->
                </div>

                <div class="attachment-activity-class">
                    <label for="">Attachments</label>
                    <input type="file" name="attachment" id=""><br><br>
                </div>

<br><br>
            </div>
            <button type="submit" class="submit-acivity-button">Submit Activity</button><br><br>

        </form>

        <script>
            const fillDay=new Date();

            const DateOption={weekly: 'long', year: 'numeric', month: 'long', day: 'numeric'};

            const formatDate=fillDay.toLocaleDateString('en-US',DateOption);

            document.querySelector('.input-date').value=formatDate;

        </script>
<br>
<div class="view-daily-activities-class-container">
    @foreach ($activities as $activity)
    @if ($activity->reg_number == auth()->guard('student')->user()->username)
    <table>
        <tr>
            <th>Submitted On</th>
            <th>Submitted At</th>
            <th>Number of Activities Done</th>
            <th>Task Name</th>
            <th>Attachment</th>
        </tr>
        <tr>
            <td>{{$activity->submit_day}}</td>

            <td>{{$activity->created_at}}</td>

            <td>{{$activity->nu_activities}}</td>

            @if ($activity->task01 !="")

            <td>{{$activity->task01}}</td>

            @elseif($activity->task21!="")

            <td>{{$activity->task21}} <br> {{$activity->task22}}</td>,

            @elseif($activity->task22!="")

            <td>{{$activity->task22}}</td>

            @elseif($activity->task31!="")

            <td>{{$activity->task31}} <br> {{$activity->task32}} <br> {{$activity->task33}}</td>

            @elseif($activity->task32!="")

            <td>{{$activity->task32}}</td>

            @elseif($activity->task33!="")

            <td>{{$activity->task33}}</td>

            @elseif($activity->task41!="")

            <td>{{$activity->task41}} <br> {{$activity->task42}} <br>{{$activity->task43}} <br> {{$activity->task44}}  </td>

            @elseif($activity->task42!="")

            <td>{{$activity->task42}}</td>

            @elseif($activity->task43!="")

            <td>{{$activity->task43}}</td>

            @elseif($activity->task44!="")

            <td>{{$activity->task44}}</td>

            @endif

            <td><a href="{{asset('storage/' . $activity->attachment)}}"><img src="{{$activity->attachment ? asset('storage/' . $activity->attachment) : asset('images/profile.png')}}" alt="My Acivity"></a></td>

        </tr>
    </table>
    @endif
    @endforeach

    <br><br>
        <div class="paginate-link-complexer">
            {{$activities->links()}}
        </div>

        <script>

            function showMyDailyTasks(){
                document.querySelector('.view-daily-activities-class-container').style.display='block';
                document.querySelector('.view-daily-activities-class-container').style.animation='slideSlowly 3s forwards';
            }
        </script>
</div>








        <br>
    </div>

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
</center>

<script>
    //FORM SELECT MANIPULATE
            document.addEventListener('DOMContentLoaded', function(){
                const select0=document.querySelector('.select');

                select0.addEventListener('change', function(){
                    const selectValue=select0.value;

                    document.querySelector('.single-activity-class').style.display='none';
                    document.querySelector('.double-activity-class').style.display='none';
                    document.querySelector('.tripple-activity-class').style.display='none';
                    document.querySelector('.multiple-activity-class').style.display='none';

                    if(selectValue === '1'){
                        document.querySelector('.single-activity-class').style.animation='slideSlowly 2s forwards';
                        document.querySelector('.single-activity-class').style.display='block';
                        document.querySelector('.submit-acivity-button').style.display='block';
                        document.querySelector('.add-daily-task-class').style.height='370px';
                        document.querySelector('.attachment-activity-class').style.display='block';
                    }else if(selectValue === '2'){
                        document.querySelector('.double-activity-class').style.animation='slideSlowly 2s forwards';
                        document.querySelector('.double-activity-class').style.display='block';
                        document.querySelector('.submit-acivity-button').style.display='block';
                        document.querySelector('.add-daily-task-class').style.height='450px';
                        document.querySelector('.attachment-activity-class').style.display='block';
                    }else if(selectValue === '3'){
                        document.querySelector('.tripple-activity-class').style.animation='slideSlowly 2s forwards';
                        document.querySelector('.tripple-activity-class').style.display='block';
                        document.querySelector('.submit-acivity-button').style.display='block';
                        document.querySelector('.add-daily-task-class').style.height='570px';
                        document.querySelector('.attachment-activity-class').style.display='block';
                    }
                    else if(selectValue === '4'){
                        document.querySelector('.multiple-activity-class').style.animation='slideSlowly 2s forwards';
                        document.querySelector('.multiple-activity-class').style.display='block';
                        document.querySelector('.submit-acivity-button').style.display='block';
                        document.querySelector('.add-daily-task-class').style.height='670px';
                        document.querySelector('.attachment-activity-class').style.display='block';
                    }
                });
            });
</script>

<script>
    function shiwForm(){
                    document.querySelector('.add-daily-task-class').style.display='block';
                    document.querySelector('.add-daily-task-class').style.animation='slideSlowly 3s forwars';
                }
</script>
@endsection
