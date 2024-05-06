@if (session()->has('student_created'))

<div class="ajax-container-former">
    <p>{{session('student_created')}}</p>
</div>

@endif
