@extends('staffs.staff-layout')

@section('content')
<br><br><br>

@include('partials.staff-card')

<center>
    <div class="ipt-coordintor-dashboard-class">
        <p class="ipt-parag">Student Feedbacks</p><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        <button class="load-items-hidden" onclick="showFeedbackForm()">Load</button><br><br>

        <div class="send-feedbacks-feed">
            @foreach ($studentfeedbacks as $studentfeedback)

        <div class="feedback-container">
            <p>{{$studentfeedback->feedback}} <span>{{$studentfeedback->created_at}}</span></p><br><br><br>
        </div><br>

        @endforeach
        </div>
    </div><br>

    <script>
        function showFeedbackForm(){
            document.querySelector('.send-feedbacks-feed').style.display='block';
            document.querySelector('.send-feedbacks-feed').style.animation='slideSlowly 3s forwards';
        }
    </script>



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
