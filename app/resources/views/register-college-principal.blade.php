@extends('admin-layout')

@section('content')
<br><br><br>

@include('partials.card-view')

<x-pricipal-registered-card />

<br>
<center>
    <form action="/principals" method="POST" class="container-component-ajax" enctype="multipart/form-data">
        @csrf
        <p>College Principal Registration Form</p><br><br><br>

        <div class="left-panel">
            <label for="Full Name">Full Name</label><br>
            <input type="text" name="full_name" id="" value="{{old('full_name')}}" placeholder="Enter college principal full name"><br>
            @error('full_name')
                <span>Full name is required!</span>
            @enderror
            <br>
            <label for="Id">College Principal ID</label><br>
            <input type="text" name="employee_id" id="" placeholder="Enter college principal ID" value="{{old('employee_id')}}"><br>
            @error('employee_id')
                <span>College principal Id is required!</span>
            @enderror
            <br>
            <label for="Level">Education Level</label><br>
            <input type="text" name="level" id="" placeholder="Enter college principal education level" value="{{old('level')}}"><br>
            @error('level')
                <span>College principal education level is required</span>
            @enderror
            <br>
            <label for="Location">Location</label><br>
            <select name="location" id="">
                <option value="//">Choose location</option>
                <option value="Main Campus">Main Campus</option>
                <option value="Rukwa Campus">Rukwa Campus</option>
            </select><br><br>
            <label for="">Phone Number</label><br>
            <input type="number" name="phone_number" id="" placeholder="Enter your phone number"><br>
        </div>

        <div class="right-panel">

            <label for="Username">Username</label><br>
            <input type="text" name="username" id="" placeholder="Generate a username" value="{{old('username')}}"><br>
            @error('username')
                <span>Username is required!</span>
            @enderror
            <br>
            <label for="Password">Password</label><br>
            <input type="password" name="password" id="" placeholder="Generate a password"><br>
            @error('password')
                <span>Password is required!</span>
            @enderror
            <br>
            <label for="profile">Upload Profile Picture</label><br>
            <input type="file" name="profile" id=""><br><br><br>
            <button type="submit">Register</button>
        </div>
    </form><br><br>
</center>

@endsection
