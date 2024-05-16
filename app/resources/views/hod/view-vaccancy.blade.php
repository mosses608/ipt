@extends('hod.hod-layout')


@section('content')
<br><br><br>

@include('partials.hod-card')




<center>
    <div class="hr-dashboard-container">
        <p class="head-main-head">IPT Vaccancy</p><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        <table class="load-data-student-list" style="width: 100%;">
            <tr>
                <th>Vaccancy Number</th>
                <th>College</th>
                <th>Date</th>

            </tr>

            @foreach ($fieldvaccancies as $vaccancy)

            @if ($vaccancy->college == Auth::guard('hod')->user()->college)

            <tr>
                <td>{{$vaccancy->vaccany_number}}</td>
                <td>{{$vaccancy->college}}</td>
                <td>{{$vaccancy->created_at}}</td>
            </tr>

            @else

            <tr>
                <td>No data</td>
                <td>No data</td>
                <td>No data</td>
            </tr>

            @endif
            @endforeach

    </table>

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
