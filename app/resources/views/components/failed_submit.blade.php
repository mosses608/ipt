@if (session()->has('failed_submit'))
<div class="login-success-message">
    <p>{{session('failed_submit')}}</p>
</div>
@endif

