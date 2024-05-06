@extends('admin-layout')


@section('content')
<br><br><br>

@include('partials.card-view')

<x-firm-department-registered-message />

<center>
    <form action="/firmdepartments" method="POST" class="programmes-ajax-card-view">
        @csrf
        <p>Firm Department Registration</p><br><br>
        <div class="side-view-left">
            <label for="">Department Name</label><br>
            <input type="text" name="department_name" id="" placeholder="Enter department name" value="{{old('department_name')}}"><br><br>
            <label for="">Head of Department</label><br>
            <input type="text" name="hod_name" id="" placeholder="Enter HoD Name" value="{{old('hod_name')}}"><br><br>
        </div>
        <div class="side-view-right">
            <label for="">Firm Name</label><br>
            <select name="firm_name" id="">
                <option value="//">Choose Firm Name</option>
                @foreach ($firms as $firm)
                <option value="{{$firm->firm_name}}">{{$firm->firm_name}}</option>
                @endforeach
            </select><br><br>
            <button type="submit">Register</button><br><br>
        </div>

    </form>
</center>
@endsection
