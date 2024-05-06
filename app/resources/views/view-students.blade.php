@extends('admin-layout')


@section('content')
<br><br><br>

@include('partials.card-view')

<center>

    @if(count($students) == 0)
    <p>There is no registered student!</p>
    @else



    <div class="container-student-ajax">
        <table>
            <tr>
                <th>Registration Number</th><th>Name</th><th>Programme</th><th>Department</th><th>College</th><th>Academic Year</th><th>Level</th><th>Profile</th><th>Edit</th><th>Delete</th>
            </tr>
    @foreach ($students as $student)
    <div class="container-student-ajax--">

            <tr>
                <td>{{$student->username}}</td><td>{{$student->full_name}}</td><td>{{$student->programme}}</td><td>{{$student->department}}</td><td>{{$student->college}}</td><td>{{$student->year}}</td><td>{{$student->level}}</td><td><img src="{{$student->profile ? asset('storage/' . $student->profile) : asset('images/profilr.png')}}" alt="Profile Image"></td><td><button class="edit-student-data"><i class="fa fa-edit"></i></button></td><td><form action="/students/delete/{{$student->id}}" method="POST">
                    @csrf
                    <button type="submit"><i class="fa fa-trash"></i></button>
                </form></td>
            </tr>

    </div>
    @endforeach
</table>
</div>

<!--<div class="search-single-lg">
    <form action="/view-students" method="GET">
        <input type="number" name="search" id="" placeholder="Search by registration number"> <button type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>-->

@endif

<br><br>
        <div class="paginate-link-complexer">
            {{$students->links()}}
        </div>
</center>
@endsection
