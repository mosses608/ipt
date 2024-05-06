@if (session()->has('report_submitted'))

<div class="ajax-container-former">
    <p>{{session('report_submitted')}}</p>
</div>

@endif
