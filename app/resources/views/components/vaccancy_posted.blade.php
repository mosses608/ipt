@if (session()->has('vaccancy_posted'))
<div class="login-success-message">
    <p>{{session('vaccancy_posted')}}</p>
</div>
@endif
