@extends('ipt.ipt-layout')

@section('content')
<br><br><br>

@include('partials.coordinator')

<x-failed_submit />

<center>
    <div class="ipt-coordintor-dashboard-class">

        <p class="ipt-parag">IPT Vaccancies</p><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>
        <table class="assign-class-container">
            <tr>
                <th>Number of Vaccancies</th>
                <th>College</th>
                <th>Date</th>

            </tr>

            @foreach ($fieldvaccancies as $vaccancy)
            <tr>

                <td>{{$vaccancy->vaccany_number}}</td>
                <td>{{$vaccancy->college}}</td>
                <td>{{$vaccancy->created_at}}</td>

            </tr>

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
