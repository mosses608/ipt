@extends('admin-layout')


@section('content')
<br><br><br>

@include('partials.card-view')

<x-ipt-coordinator />

<center>
    <div class="ipt-coordinator">
        <p class="head-sub-head">Register IPT Coordinator</p><br><br>

        <form action="/coordinators" method="POST" class="register-ipt-coordinator">
            @csrf

            <div class="left-ipt-coordi">
                <label for="">Id</label><br>
                <input type="text" name="employee_id" id="" placeholder="Enter IPT Coordinator Id"><br><br>
                <label for="">Full Name</label><br>
                <input type="text" name="full_name" id="" placeholder="Enter ipt coordinator name"><br><br>
                <label for="">Location</label><br>
                <select name="location" id="">
                    <option value="//">Choose Location</option>
                    <option value="Main campus">Main campus</option>
                    <option value="Rukwa campus">Rukwa campus</option>
                </select><br><br>
                <label for="">Department</label><br>
                <select name="department" id="">
                    <option value="//">Choose department</option>
                    @foreach ($departments as $department)
                    <option value="{{$department->department_name}}">{{$department->department_name}}</option>
                    @endforeach
                </select><br><br>
            </div>

            <div class="right-ipt-coordi">
                <label for="">Phone Number</label><br>
                <input type="number" name="contact" id="" placeholder="Enter phone number" value="{{old('contact')}}"><br><br>
                <label for="">Username</label><br>
                <input type="email" name="username" id="" placeholder="Enter email as username" value="{{old('username')}}"><br><br>
                <label for="">Password</label><br>
                <input type="password" name="password" id="" placeholder="Enter your password"><br><br><br>
                <button type="submit" class="submit-ipt">Register</button><br><br>
            </div>
        </form>
    </div>
</center>


@endsection
