@extends('ipt.ipt-layout')

@section('content')
<br><br><br>

@include('partials.coordinator')

<center>
    <div class="ipt-instructor-body">
        <p class="ipt-parag">Single Student</p><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        <div class="load-data-student-list">
            <table>
                <tr>
                    <th>Instructor Name</th>
                    <th>Phone Number</th>
                    <th>College</th>
                    <th>Assigned To</th>
                    <th>Firm Name</th>
                </tr>

                @foreach ($hods as $staff)





                <tr>

                    @foreach ($students as $student)

                    @if ($student->supervisor == $staff->full_name)
                    <td>{{$staff->full_name}}</td>
                    <td>{{$staff->phone}}</td>
                    <td>{{$staff->college}}</td>
                    <td>{{$student->full_name}}</td>



                    @foreach ($completeapplications as $apps)

                    @if ($apps->reg_number == $student->username)
                    <td>{{$apps->firm_name}}</td>

                    @endif

                    @endforeach


                    @endif

                    @endforeach


                </tr>




                @endforeach



            </table>

            <div class="search-single-lg">
                <form action="/ipt/instructors" method="GET">
                    <input type="number" name="search" id="" placeholder="Search by registration number"> <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>

        </div>

        <div class="paginate-link-complexer">
            {{$hods->links()}}
        </div>
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
