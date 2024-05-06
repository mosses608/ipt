@if (session()->has('principal_created'))

<div class="ajax-container-former">
    <p>{{session('principal_created')}}</p>
</div>

@endif
