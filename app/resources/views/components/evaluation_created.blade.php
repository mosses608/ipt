@if (session()->has('evaluation_created'))

<div class="login-success-message">
    <p>{{session('evaluation_created')}}</p>
</div>

@endif
