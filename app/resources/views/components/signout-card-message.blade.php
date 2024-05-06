@if(session()->has('signout'))

<div class="login-success-message">
    <p>{{session('signout')}}</p>
</div>

@endif