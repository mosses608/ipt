@extends('student.student-layout')


@section('content')
<br><br><br>

@include('partials.student-card')


<center>

    <div class="new-element0-dail-add">

        <p class="head-comp"><a href="#">Dashboard</a> / <a href="#">My Selections</a></p><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

    <table class="application-viewable">
        <tr>
            <th>Photo</th>
            <th>Names</th>
            <th>Course</th>
            <th>Department</th>
            <th>College</th>
            <th>Gender</th>
            <th>Firm Name</th>
            <th>Status</th>
        </tr>


        @foreach ($completeapplications as $apps)
    <tr>


        @if (auth()->guard('student')->user()->username == $apps->reg_number)

        <td><img src="{{auth()->guard('student')->user()->profile ? asset('storage/' . auth()->guard('student')->user()->profile) : asset('images/profile.png')}}" alt=""></td>
        <td>{{auth()->guard('student')->user()->full_name}}</td>
        <td>{{auth()->guard('student')->user()->programme}}</td>
        <td>{{auth()->guard('student')->user()->department}}</td>
        <td>{{auth()->guard('student')->user()->college}}</td>


        @if ($apps->gender1 == "")
        <td>{{$apps->gender2}}</td>
        @else
        <td>{{$apps->gender1}}</td>
        @endif

        <td>{{$apps->firm_name}}</td>

        @foreach ($students as $student)

        @if (auth()->guard('student')->user()->username == $student->username)

        @if ($student->response == "")

        <td><span class="nun-approved">Pending</span></td>

        @else
        <td> <span class="approved">Approved</span></td>
        @endif


        @endif


        @endforeach

        @endif

    </tr>

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
