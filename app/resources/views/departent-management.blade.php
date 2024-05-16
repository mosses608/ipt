@extends('admin-layout')


@section('content')
<br><br><br>

@include('partials.card-view')

<x-department-created-message />

<center>
    <form action="/departments" method="POST" class="programmes-ajax-card">

        <p class="head-main-head">Department Registration</p><br><br>
        <div class="academic-year-status" id="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

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

<br>
        @csrf
        <p>Department Registration Form</p><br><br>
        <div class="left-menus-class">
            <label for="">Department Name</label><br>
            <input type="text" name="department_name" id="" placeholder="Enter a department name" value="{{old('programme_name')}}"><br><br>

            <label for="">Location</label><br>
            <select name="location" id="">
                <option value="//">Choose location</option>
                <option value="Main campus">Main campus</option>
                <option value="Rukwa campus">Rukwa campus</option>
            </select>
        </div>

        <div class="right-menus-class">
            <label for="">Head of Department</label><br>
            <select name="hod" id="">
                <option value="//">Choose Head of Department</option>
                @foreach ($hods as $staff)
                @if ($staff->role == '1')
                <option value="{{$staff->full_name}}">{{$staff->full_name}}</option>
                @endif
                @endforeach
            </select><br><br><br>
            <button type="submit">Register</button><br>
        </div>
    </form>
</center>
@endsection
