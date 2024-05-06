@if (session()->has('approved'))

<div class="ajax-container-former">
    <p>{{session('approved')}}</p>
</div>

@endif
