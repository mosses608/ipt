@if (session()->has('attendance'))

<div class="login-success-message">
    <p>{{session('attendance')}}</p>
</div>

@endif
