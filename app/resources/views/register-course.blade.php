@extends('admin-layout')


@section('content')
<br><br><br>

@include('partials.card-view')

<x-programmed-message-card />

<center>
    <form action="/programmes" method="POST" class="programmes-ajax-card">
        @csrf
        <p>Programmes Registration Form</p><br><br>
        <div class="left-menus-class">
            <label for="">Programme Name</label><br>
            <input type="text" name="programme_name" id="" placeholder="Enter a programme name" value="{{old('programme_name')}}"><br><br>

            <label for="">Department</label><br>
            <select name="department" id="">
                <option value="//">Choose department</option>
                @foreach ($departments as $department)
                <option value="{{$department->department_name}}">{{$department->department_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="right-menus-class">
            <label for="">College</label><br>
            <select name="college" id="">
                <option value="//">Choose college</option>
                @foreach ($colleges as $college)
                <option value="{{$college->college_name}}">{{$college->college_name}}</option>
                @endforeach
            </select><br><br><br>
            <button type="submit">Register</button><br>
        </div>
    </form>
</center>

@endsection
