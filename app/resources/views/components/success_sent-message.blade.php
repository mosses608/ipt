@if (session()->has('success_sent'))
<div class="ajax-container-former">
    <p>{{session('success_sent')}}</p>
</div>
@endif
