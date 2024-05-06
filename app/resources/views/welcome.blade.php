@extends('layout')

@section('content')
<br><r><br><br>

<x-login-error-card />

<x-signout-card-message />

<center>
    <div class="container-lg-gx p-10 mt-10">
        <img src="{{asset('images/background-img.png')}}" alt="My Image Background"><br><br><br>
        <form action="/authenticate" method="POST" class="atialased-bx-lg">
            @csrf
            <h1>IPT Management Portal</h1><br>
            <!--<p>Industrial/Firm Need account? <a href="/registerfirm">Register</a></p>-->
            <r></r>
            <label for="username">Username</label><br>
            <input type="text" name="username" id="" placeholder="Enter email or registration number" value="{{old('username')}}"><br><br>
            <label for="Password">Password</label><br>
            <input type="password" name="password" id="" placeholder="Enter correct password"><br><br>
            <div class="remember-ajax-component" style="display: none;">Remeber me<input type="checkbox" id=""></div> <a href="/reset-password" class="reset-lg-ajax">Forgot password?</a>
            <button type="submit"><i class="fa fa-sign-in"></i> Login</button>

        </form>
    </div>
</center>
@endsection
