@extends('hod.hod-layout')


@section('content')
<br><br><br>

@include('partials.hod-card')


<center>
    <div class="hr-dashboard-container">
        <p class="head-main-head">Assigned IPT Supervisors</p><br><br>
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
                </tr>

                @foreach ($hods as $hod)


                <tr>
                    @if ($hod->college == Auth::guard('hod')->user()->college)

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

                    @endif
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
