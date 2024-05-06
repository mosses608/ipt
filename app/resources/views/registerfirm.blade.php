@extends('layout')

@section('content')
<br><r><br><br></r>
<center>
    <div class="container-lg-gx p-10 mt-10">
        <img src="{{asset('images/background-img.png')}}" alt="My Image Background">
        <form action="/authenticate" method="POST" class="atialased-bx-lg">
            <h1>Register</h1>
            <p>Enter details to create your account</p>
            <label for="Full name">Full Name</label><br>
            <input type="text" name="full_name" id="" placeholder="Representative full name" value="{{old('full_name')}}"><br>
            <label for="Email">Email</label><br>
            <input type="email" name="email" id="" placeholder="johndoe@iptms.com"><br>
            <label for="Password">Password</label><br>
            <input type="password" name="password" id="" placeholder="***********"><br>
            <label for="Confirm Password">Confirm password</label><br>
            <input type="password" name="confirm_password" id="" placeholder="***********"><br>
            <p class="return-back-component">Already Registered? <a href="/">Login</a></p><br>
            <button type="button">Next</button>
            
        </form>
    </div>
</center>
@endsection