@if (session()->has('admin_updated'))

<div class="ajax-container-former">
    <p>{{session('admin_updated')}}</p>
</div>

@endif
