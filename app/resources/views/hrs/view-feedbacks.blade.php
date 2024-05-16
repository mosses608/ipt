@extends('hrs.hr-layout')

@section('content')
<br><br><br>

@include('partials.hr-card')


<center>
    <div class="hr-dashboard-container">
        <p class="head-main-head">View Feedbacks</p><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        @foreach ($feedbacks as $feedback)

        <div class="view-feedbacks-dashboard-clas">
            <p>{{$feedback->feedback}} <span style="color: orange; font-size:12px;">{{$feedback->created_at}}</span></p><br><br><br>
        </div>

        @endforeach
    </div>
    <br>

    <div class="paginate-link-complexer">
        {{$feedbacks->links()}}
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
