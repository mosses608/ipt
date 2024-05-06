@extends('admin-layout')

@section('content')
<br><br><br>

@include('partials.card-view')

<x-hr-created-message />

<center>
    <form action="/hrs" method="POST" class="firm-hr-reg-lx">
        @csrf
        <p>Firm HR Registration</p><br>

        <div class="left-hr-side-pane">
            <label for="">Full Name</label><br>
            <input type="text" name="full_name" id="" placeholder="Enter full name" value="{{old('full_name')}}"><br><br>
            <label for="">HR Id</label><br>
            <input type="text" name="employee_id" id="" placeholder="Enter HR Id" value="{{old('id')}}"><br><br>
            <label for="">Phone Number</label><br>
            <input type="number" name="phone" id="" placeholder="Enter HR phone number" value="{{old('phone')}}"><br><br>
        </div>

        <div class="right-hr-side-pane">
            <label for="">Username</label><br>
            <input type="email" name="username" id="" placeholder="Enter HR email as username" value="{{old('username')}}"><br><br>
            <label for="">Company name</label><br>
            <input type="text" name="company_name" id="" placeholder="Enter company name" value="{{old('company_name')}}"><br><br>
            <label for="">Password</label><br>
            <input type="password" name="password" id="" placeholder="Strong password is recommended"><br><br>
            <button type="submit">Register</button><br><br>
        </div>
    </form>
</center>


@endsection
