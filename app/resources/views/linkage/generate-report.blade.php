@extends('linkage.hil-layout')

@section('content')
<br><br><br>

@include('partials.hil-card')



<center>
    <div class="hil-linkage-dashboard">
        <div class="sub-head">
            <a href="/#">Generate Report</a> / <a href="#">{{Auth::guard('linkage')->user()->full_name}}</a>
        </div><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>



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
