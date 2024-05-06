@if(session()->has('deleted'))

<div class="ajax-container-message">
    <p>{{session('deleted')}}</p>
</div>

@endif
