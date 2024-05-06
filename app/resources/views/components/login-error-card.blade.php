@if(session()->has('error'))

<div class="login-success-message">
    <p style="color:red;">{{session('error')}}</p>
</div>

@endif