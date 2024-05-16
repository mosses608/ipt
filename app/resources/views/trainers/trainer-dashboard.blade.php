@extends('trainers.trainer-layout')

@section('content')
<br><br><br>

@include('partials.trainer-card-view')

<x-trainer_login />

<center>
    <div class="staff-dashboard-home-pan">
        <div class="sub-head">
            <a href="/trainers/trainer-dashboard">Firm Trainer Dashboard</a>
        </div><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        <table>

            <tr>
                <th>Full Name</th>
                <th>Programme</th>
                <th>Department</th>
                <th>College</th>
                <th>Academic Year</th>
                <th>Level</th>
                <th>Gender</th>
                <th>Firm Name</th>
                <th>Action</th>
                <th>Response</th>
            </tr>

        @foreach ($completeapplications as $apps)

        @foreach ($students as $student)

        @if ($apps->reg_number == $student->username && Auth::guard('trainer')->user()->company_name == $apps->firm_name)

        <tr>
            <td>{{$student->full_name}}</td>

            <td>{{$student->programme}}</td>

            <td>{{$student->department}}</td>

            <td>{{$student->college}}</td>

            <td>{{$student->year}}</td>

            <td>{{$student->level}}</td>

            @if ($apps->gender1 !="")
            <td>{{$apps->gender1}}</td>
            @else
            <td>{{$apps->gender2}}</td>
            @endif

            <td>{{$apps->firm_name}}</td>

            <td>{{$apps->action}}</td>

            @if ($student->response != "")
            <td><button class="upadted-verif-cont-button">{{$student->response}}</button></td>
            @else
            <td>
                <button class="upadted-verif-cont">Pending</button>
                <!--<form action="/students/upadateResponse/{{$student->id}}" method="POST" class="upadted-verif-cont">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="response" id=""  value="accepted">
                    <button type="submit" class="upadted-verif-cont-button">Accept</button>
                </form>-->
            </td>
            @endif
        </tr>

        @endif

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
