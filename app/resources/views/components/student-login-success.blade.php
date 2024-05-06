@if (session()->has('student_login'))

<div class="login-success-message">
    <p>{{session('student_login')}}</p>
</div>

@endif
