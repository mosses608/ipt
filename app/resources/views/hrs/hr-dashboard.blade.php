@extends('hrs.hr-layout')


@section('content')
<br><br><br>

@include('partials.hr-card')

<x-hr_login-message />

<x-approved-student />

<center>
    <div class="hr-dashboard-container">
        <p class="head-main-head">HR Dashboard</p><br><br>
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

        @if ($apps->reg_number == $student->username)

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
                <button class="upadted-verif-cont-button"><a href="/hrs/show-single/{{$student->id}}" style="color: #FFFFFF;"><i class="fa fa-eye"></i></a></button>
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

    <div class="paginate-link-complexer">
        {{$students->links()}}
    </div>

    <div class="search-single-lg">
        <form action="/hrs/hr-dashboard" method="GET">
            @csrf
            <input type="text" name="search" id="" placeholder="Search by student name, firm name"> <button type="submit"><i class="fas fa-search"></i></button>
        </form>
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
</script>

@endsection
