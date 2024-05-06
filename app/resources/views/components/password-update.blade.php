@if (session()->has('pass_changed'))

<div class="ajax-container-former">
    <p>{{session('pass_changed')}}</p>
</div>

@endif
