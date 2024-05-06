@if (session()->has('activity_sent'))
<div class="ajax-container-former">
    <p>{{session('activity_sent')}}</p>
</div>
@endif
