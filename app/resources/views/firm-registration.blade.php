@extends('admin-layout')


@section('content')
<br><br><br>

@include('partials.card-view')

<x-firm-created-message />

<center>
    <form action="/firms" method="POST" class="firm-register-form">
        @csrf
        <p>Firm Registration Form</p><br><br>

        <div class="left-side-firm">
            <label for="">Firm Name</label><br>
            <input type="text" name="firm_name" id="" placeholder="Enter firm name" value="{{old('firm_name')}}"><br><br>
            <label for="">Firm Location</label><br>
            <input type="text" name="location" id="" placeholder="Region, District eg, Dar es salaam, Mnazi mmoja" value="{{old('location')}}"><br><br>
            <label for="">Postal Address</label><br>
            <input type="text" name="address" id="" placeholder="Enter firm address eg P.O.Box 1770"><br><br>
        </div>
        <div class="right-side-firm">
            <label for="">Firm Type</label><br>
            <select name="firm_type" id="">
                <option value="//">Choose Firm Type</option>
                <option value="Government">Government</option>
                <option value="Private">Private</option>
            </select><br><br>
            <label for="">Services or Products offered</label><br>
            <input type="text" name="serives" id="" placeholder="Enter firm services offered"><br><br><br>
            <button type="submit">Register</button><br><br>
        </div>
    </form>
</center>

@endsection

