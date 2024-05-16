@extends('admin-layout')


@section('content')
<br><br><br>

@include('partials.card-view')

<x-firm-trainer-message />

<center>
    <form action="/trainers" method="POST" class="firm-trainer-component-ajax">


        <p class="head-main-head">Firm Trainer Registration</p><br><br>
        <div class="academic-year-status" id="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br><br>
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


        @csrf

        <div class="left-firm-trainer-sub-form">
            <label for="">Full Name</label><br>
            <input type="text" name="full_name" id="" placeholder="Enter firm trainer full name" value="{{old('full_name')}}"><br><br>
            <label for="">Firm Trainer Id</label><br>
            <input type="text" name="employee_id" id="" placeholder="Enter firm trainer Id" value="{{old('employee_id')}}"><br><br>
            <label for="">Phone Number</label><br>
            <input type="number" name="phone" id="" placeholder="Enter firm trainer phone number" value="{{old('phone')}}"><br><br>
            <label for="">Organization Name</label><br>
            <select name="company_name" id="">
                <option value="//">Choose organization</option>
                @foreach ($firms as $firm)
                <option value="{{$firm->firm_name}}, {{$firm->location}}">{{$firm->firm_name}}, {{$firm->location}}</option>
                @endforeach
            </select>
        </div>
        <div class="righ-firm-trainer-sub-form">
            <label for="">Firm Trainer Department</label><br>
            <input type="text" name="firm_trainer_department" id="" placeholder="Enter the firm trainer department" value="{{old('firm_trainer_department')}}"><br><br>
            <label for="">Firm Trainer Username</label><br>
            <input type="text" name="username" id="" placeholder="Enter firm triner username" value="{{old('username')}}"><br><br>
            <label for="">Firm Trainer Password</label><br>
            <input type="password" name="password" id="" placeholder="Enter firm trainer password" value="{{old('password')}}"><br><br><br>
            <button type="submit">Register</button><br><br>
        </div>
    </form>
</center>
@endsection
