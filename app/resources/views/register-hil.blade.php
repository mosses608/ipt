@extends('admin-layout')

@section('content')
<br><br><br>

@include('partials.card-view')

<x-hil_created />

<center>
    <div class="ipt-coordinator">
        <div class="sub-head">
            <a href="/#">Dashboard</a> /
            <a href="#">Head of Industrial Linkage</a>
        </div><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div>

        <form action="/linkages" method="POST" class="register-ipt-coordinator" enctype="multipart/form-data">
            @csrf

            <div class="left-ipt-coordi">
                <label for="">Id</label><br>
                <input type="text" name="employee_id" id="" placeholder="Enter HIL Id"><br><br>

                <label for="">Full Name</label><br>
                <input type="text" name="full_name" id="" placeholder="Enter HIL name"><br><br>

                <label for="">Location</label><br>
                <select name="location" id="">
                    <option value="//">Choose Location</option>
                    <option value="Main campus">Main campus</option>
                </select><br><br>

                <label for="">Department</label><br>
                <input type="text" name="phone_number" id="" placeholder="Enter HIL phone number"><br><br>
            </div>

            <div class="right-ipt-coordi">
                <label for="">Profile Picture</label><br>
                <input type="file" name="profile" id="" placeholder="Enter a username" value="{{old('profile')}}"><br><br>

                <label for="">Username</label><br>
                <input type="text" name="username" id="" placeholder="Enter email as username" value="{{old('username')}}"><br><br>

                <label for="">Password</label><br>
                <input type="password" name="password" id="" placeholder="Enter your password"><br><br><br>

                <button type="submit" class="submit-ipt">Register</button><br><br>
            </div>
        </form><br><br>

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
