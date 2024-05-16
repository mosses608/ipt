@extends('ipt.ipt-layout')

@section('content')
<br><br><br>

@include('partials.coordinator')


<center>
    <div class="ipt-coordintor-dashboard-class">

        <p class="ipt-parag">IPT Supervisor Assignment / {{$hod->full_name}}</p><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        <form action="/assignments" method="POST" class="assign-class-container">
            @csrf
            <table class="assign-class-container">
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Phone Number</th>
                    <th>College</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input type="text" name="full_name" id="" value="{{$hod->full_name}}"></td>
                    @if ($hod->role == '1')
                    <td><input type="text" name="role" id="" value="HoD"></td>
                    @else
                    <td><input type="text" name="role" id="" value="Lecturer"></td>
                    @endif
                    <td><input type="text" name="phone" id="" value="{{$hod->phone}}"></td>
                    <td><input type="text" name="college" id="" value="{{$hod->college}}"></td>
                    <input type="hidden" name="status" id="" value="Selected">


                    <td><button type="submit" class="assign-class-container-button">Assign</button></td>

                </tr>
            </table>
        </form>
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
