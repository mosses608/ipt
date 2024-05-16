@extends('linkage.hil-layout')

@section('content')
<br><br><br>

@include('partials.hil-card')


<center>
    <div class="hil-linkage-dashboard">
        <div class="sub-head">
            <a href="/#">Assigned Supervisors</a> / <a href="#">{{Auth::guard('linkage')->user()->full_name}}</a>
        </div><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div>

        <table class="load-data-student-list" style="width: 100%;">
            <tr>
                <th>Names</th>
                <th>Role</th>
                <th>Phone Number</th>
                <th>College</th>
            </tr>


        @foreach ($assignments as $assignment)
        <tr>
            <td>{{$assignment->full_name}}</td>
            <td>{{$assignment->role}}</td>
            <td>{{$assignment->phone}}</td>
            <td>{{$assignment->college}}</td>
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
