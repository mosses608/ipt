@extends('admin-layout')

@section('content')
<br><br><br>
<x-login-card-success />

@include('partials.card-view')

<center>
    <div class="container-centered-ajax">

        <p class="head-main-head">Admin Dashboard / {{Auth::user()->full_name}}</p><br><br>
        <div class="academic-year-status" id="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

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

        <div class="staff-report-db">
            <h2><i class="fa fa-graduation-cap"></i> <br> Total Students <br> {{count($students)}}</h2>
        </div>
        <div class="staff-report-db">
            <h2><i class="fas fa-user-tie"></i><br> Total Staffs <br> {{count($hods)}}</h2>
        </div>
        <div class="staff-report-db">
            <h2><i class="fas fa-building"></i> <br>Total Colleges <br> {{count($colleges)}} </h2>

        </div>
        <div class="staff-report-db">
            <h2><i class="fas fa-building"></i> <br>Total Departments <br>{{count($departments)}}</h2>
        </div>
        <div class="staff-report-db">
            <h2><i class="fas fa-book"></i> <br>Total Programmes <br> {{count($programmes)}}</h2>
        </div>
        <div class="staff-report-db">
            <h2><i class="fas fa-user"></i> <br>Total Firm Trainers <br> {{count($trainers)}}</h2>
        </div>
        <div class="staff-report-db">
            <h2><i class="fas fa-briefcase"></i> <br>Total Firms <br> {{count($firms)}}</h2>
        </div>
        <div class="staff-report-db">
            <h2><i class="fas fa-user-shield"></i> <br>Total Admins <br> {{count($users)}}</h2>
        </div>
    </div>
    <br><br><br>

    <div class="group-analytics-data">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

        <!--<img src="{{asset('images/sample-bar-graph.jpg')}}" alt="">-->

        <canvas id="lineChart"></canvas>

        <style> width="900" height="400"
            /* CSS for responsive container */
            @media(max-width:768px){
                #lineChart {
                width: 100%;
                max-width: 800px; /* Optional: Limit maximum width of the chart */
                margin: 0 auto; /* Center the container */
            }
            }
        </style>

    <script>
        var ctx = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Total Students',
                    data: <?php echo json_encode($data); ?>,
                    borderColor: 'blue',
                    backgroundColor: 'rgba(0, 0, 255, 0.1)'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                animation: {
                    duration: 2000, // Set animation duration in milliseconds
                    easing: 'easeInOutQuart', // Set animation easing function
                },
                elements: {
                    line: {
                        tension: 0.4 // Set line tension to curve the line
                    }
                },

            }
        });
    </script>
    </div><br><br>




</center>


@endsection
