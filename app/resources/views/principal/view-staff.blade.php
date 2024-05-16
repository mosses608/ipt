@extends('principal.principal-layout')

@section('content')
<br><br><br>

@include('partials.principal-card')

<center>
    <div class="container-centered-ajax">

        <p class="head-main-head">College Principal Dashboard / {{Auth::guard('principal')->user()->full_name}}</p><br><br>
        <div class="academic-year-status" id="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        @if (count($hods) == 0)


        <p>No student found here</p>

        @else


        <table class="container-centered-ajax-table">
            <tr>
                <th>Role</th><th>Full Name</th><th>Phone Number</th><th>College</th><th>Department</th>
            </tr>
    @foreach ($hods as $staff)
    <div class="container-student-ajax--">

            <tr>
                @if ($staff->role == '1')
                <td>HoD</td>
                @else
                <td>Lecturer</td>
                @endif
                <td>{{$staff->full_name}}</td>
                <td>{{$staff->phone}}</td>
                <td>{{$staff->college}}</td>
                <td>{{$staff->department}}</td>
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
            {{$hods->links()}}
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
