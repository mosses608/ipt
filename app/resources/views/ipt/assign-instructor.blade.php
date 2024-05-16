@extends('ipt.ipt-layout')

@section('content')
<br><br><br>

@include('partials.coordinator')

<x-failed_submit />

<center>
    <div class="ipt-coordintor-dashboard-class">

        <p class="ipt-parag">IPT Supervisor Assignment</p><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        <div class="assign-class-container">
            <table class="assign-class-container">
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Phone Number</th>
                    <th>College</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                @foreach ($hods as $hod)


                <tr>
                    <td>{{$hod->full_name}}</td>
                    @if ($hod->role == '1')
                    <td>HoD</td>
                    @else
                    <td>Lecturer</td>
                    @endif
                    <td>{{$hod->phone}}</td>
                    <td>{{$hod->college}}</td>

                    @foreach ($assignments as $assign)

                    @if ($assign->status !="" && $assign->phone == $hod->phone)
                    <td style="color: orange;">Selected</td>

                    @endif

                    @endforeach
                    <td><a href="/ipt/single-assignment/{{$hod->id}}"><i class="fa fa-eye"></i></a></td>

                </tr>

                @endforeach
            </table>
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
