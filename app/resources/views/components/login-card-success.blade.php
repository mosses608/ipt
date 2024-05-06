@if(session()->has('message'))

<div class="login-success-message">
    <p>{{session('message')}}</p>
</div>

@endif
