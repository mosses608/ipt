@if (session()->has('feedbacks'))
<div class="ajax-container-former">
    <p>{{session('feedbacks')}}</p>
</div>
@endif
