@if (session()->has('ipt_coordinator_login'))

<div class="login-success-message">
    <p>{{session('ipt_coordinator_login')}}</p>
</div>

@endif
