@extends('admin-layout')

@section('content')
<br><br><br>

@include('partials.card-view')

<x-staff-registered-message />

<center>
    <form action="/hods" method="POST" class="flex-ajax-lx-bg" enctype="multipart/form-data">
        @csrf
        <p>Department Staff Registration Form</p><br>

        <div class="left-staff-field">
            <label for="">Staff Role</label><br>
            <select name="role" id="">
                <option value="//">Choose staff role</option>
                <option value="1">Admin</option>
                <option value="0">Normal staff</option>
            </select><br><br>
            <label for="">Staff Name</label><br>
            <input type="text" name="full_name" id="" placeholder="Enter staff full name" value="{{old('full_name')}}"><br><br>
            <label for="">Phone Number</label><br>
            <input type="number" name="phone" id="" placeholder="Enter staff phone number" value="{{old('phone')}}"><br><br>
            <label for="">Staff Id</label><br>
            <input type="text" name="employee_id" id="" placeholder="Enter staff Id" value="{{old('employee_id')}}"><br><br>
            <label for="">Staff College</label><br>
            <select name="college" id="">
                <option value="//">Choose college</option>
                @foreach ($colleges as $college)
                <option value="{{$college->college_name}}">{{$college->college_name}}</option>
                @endforeach
            </select><br><br>
        </div>
        <div class="right-staff-field">
            <label for="">Staff Username</label><br>
            <input type="text" name="username" id="" placeholder="Create staff username" value="{{old('username')}}"><br><br>
            <label for="">Staff Password</label><br>
            <input type="password" name="password" id="" placeholder="Strong password is recommended"><br><br>
            <label for="">Profile Picture</label><br>
            <input type="file" name="profile" id=""><br><br><br>
            <button type="submit">Register</button><br><br>
        </div>
    </div>
</center>
@endsection
