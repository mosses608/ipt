@extends('principal.principal-layout')

@section('content')
<br><br><br>

@include('partials.principal-card')

<center>
    <div class="container-centered-ajax">

        <p class="head-main-head">Admin Dashboard / {{Auth::guard('principal')->user()->full_name}}</p><br><br>
        <div class="academic-year-status" id="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        @if (count($students) == 0)


        <p>No student found here</p>

        @else


        <table class="container-centered-ajax-table">
            <tr>
                <th>Registration Number</th><th>Name</th><th>Programme</th><th>Department</th><th>College</th><th>Academic Year</th><th>Level</th><th>Edit</th><th>Delete</th>
            </tr>
    @foreach ($students as $student)
    <div class="container-student-ajax--">

            <tr>
                <td>{{$student->username}}</td><td>{{$student->full_name}}</td><td>{{$student->programme}}</td><td>{{$student->department}}</td><td>{{$student->college}}</td><td>{{$student->year}}</td><td>{{$student->level}}</td><td><button class="edit-student-data"><i class="fa fa-edit"></i></button></td><td><form action="/students/delete/{{$student->id}}" method="POST">
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
        </div
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
