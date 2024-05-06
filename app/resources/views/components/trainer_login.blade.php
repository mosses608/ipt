@if (session()->has('trainer_login'))

<div class="login-success-message">
    <p>{{session('trainer_login')}}</p>
</div>

@endif
