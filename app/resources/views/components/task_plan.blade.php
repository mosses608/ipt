@if (session()->has('task_plan'))

<div class="login-success-message">
    <p>{{session('task_plan')}}</p>
</div>


@endif
