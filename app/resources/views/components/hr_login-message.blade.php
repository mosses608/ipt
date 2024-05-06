@if (session()->has('hr_login'))
<div class="login-success-message">
    <p>{{session('hr_login')}}</p>
</div>
@endif
