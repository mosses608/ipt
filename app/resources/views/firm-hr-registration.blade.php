@extends('admin-layout')

@section('content')
<br><br><br>

@include('partials.card-view')

<x-hr-created-message />

<center>
    <form action="/hrs" method="POST" class="firm-hr-reg-lx">

        <p class="head-main-head">Firm HR Registration</p><br><br>
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


        @csrf

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
            <select name="company_name" id="">
                <option value="//">Choose firm name</option>
                @foreach ($firms as $firm)
                <option value="{{$firm->firm_name}}, {{$firm->location}}">{{$firm->firm_name}}, {{$firm->location}}</option>
                @endforeach
            </select><br><br>
            <label for="">Password</label><br>
            <input type="password" name="password" id="" placeholder="Strong password is recommended"><br><br>
            <button type="submit">Register</button><br><br>
        </div>
    </form>
</center>


@endsection
