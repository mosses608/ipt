@extends('principal.principal-layout')

@section('content')
<br><br><br>

@include('partials.principal-card')

<center>
    <div class="container-centered-ajax">

        <p class="head-main-head">College Principal Dashboard / {{Auth::guard('principal')->user()->full_name}}</p><br><br>
        <div class="academic-year-status" id="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        @if (count($studentfeedbacks) == 0)
        <p>No feedbacks posted here!</p>

        @else

       @foreach ($studentfeedbacks as $feedback)

       <div class="feedback-box-cox">
        <p>{{$feedback->feedback}}</p>
       </div>

       @endforeach

        @endif

</div>


<br><br>
        <div class="paginate-link-complexer">
            {{$studentfeedbacks->links()}}
        </div
    </div>
</center>
<script>
    const currentYear=new Date();

    const yearOption={weekly: 'long' , year: 'numeric'};

    //

    const formattedYear=currentYear.toLocaleDateString('en-US', yearOption);

    //

    document.querySelector('.currentYear').textContent=formattedYear;

    document.querySelector('.previousYear').textContent=formattedYear-1;

    //
</script>
@endsection
