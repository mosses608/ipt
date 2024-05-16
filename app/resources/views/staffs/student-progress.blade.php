@extends('staffs.staff-layout')


@section('content')
<br><br><br>

@include('partials.staff-card')

<x-staff_login-card />

<center>
    <div class="staff-dashboard-home-pan">
        <div class="sub-head">
            <br>
            <a href="#">Student Progress</a>
        </div><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>



        @foreach ($hods as $staff)

        @endforeach


        @if ($staff->full_name == auth()->guard('hod')->user()->full_name)





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
                    <th>Firm Name</th>
                    <th>Actions</th>
                </tr>
                @foreach ($students as $student)

                @if ($student->response !="" && $student->supervisor == auth()->guard('hod')->user()->full_name)


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
                    <td style="color: #0000FF; cursor:pointer; font-size:14px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Not Assigned</td>
                    @endif

                    @foreach ($completeapplications as $apps)
                    @if ($apps->reg_number == $student->username)

                    <td>{{$apps->firm_name}}</td>

                    @endif
                    @endforeach



                    <td><a href="/staffs/view-progress/{{$student->id}}"><i class="fa fa-eye"></i></a></td>



                </tr>

                @endif

                @endforeach

            </table><br><br>

        </div>

        @endif



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
