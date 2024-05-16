@extends('staffs.staff-layout')

@section('content')
<br><br><br>

@include('partials.staff-card')

<center>
    <div class="ipt-coordintor-dashboard-class">
        <p class="ipt-parag">Student Activities</p><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        <div class="load-data-student-list">
            <table>
                <tr>
                    <th>Student Name</th>
                    <th>Registration Number</th>
                    <th>Programme</th>
                    <th>Department</th>
                    <th>College</th>
                    <th>Academic Year</th>
                    <th>Level</th>
                    <th>IPT Supervisor</th>
                    <th>Progress</th>
                </tr>
                <tr>

                    <td>{{$student->full_name}}</td>
                    <td>{{$student->username}}</td>
                    <td>{{$student->programme}}</td>
                    <td>{{$student->department}}</td>
                    <td>{{$student->college}}</td>
                    <td>{{$student->year}}</td>
                    <td>{{$student->level}}</td>
                    @if ($student->supervisor !="" && $student->supervisor== auth()->guard('hod')->user()->full_name)
                    <td>{{$student->supervisor}}</td>
                    @endif
                    <td><button onclick="showProgress()"><i class="fa fa-eye"></i></button></td>

                </tr>


            </table><br><br>

        </div>

        <div class="progress-report-student">

            <canvas id="progressChart" width="600" height="200"></canvas>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                var ctx = document.getElementById('progressChart').getContext('2d');
                var studentNames = @json($studentNames);
                var scores = @json($scores);

                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: studentNames,
                        datasets: [{
                            label: 'Total Score',
                            data: scores,
                            barThickness: 10,
                            //borderWidth: 1,
                            backgroundColor: 'blue'
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>


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

    function showProgress(){
        document.querySelector('.progress-report-student').style.display='block';
    }
</script>

@endsection
