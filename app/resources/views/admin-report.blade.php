@extends('admin-layout')

@section('content')
<br><br><br>
<x-login-card-success />

@include('partials.card-view')

<center>

    <div class="container-centered-ajax-report">

        <p class="head-main-head">Generate Report</p><br><br>
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

        <table>
            <tr>
                <th>Reg Number</th>
                <th>Student Name</th>
                <th>Course</th>
                <th>Department</th>
                <th>College</th>
                <th>Year</th>
                <th>Firm Name</th>
            </tr>

    @foreach ($completeapplications as $apps)

    <div class="container-class-holder">



        <tr>

            <td>{{$apps->reg_number}}</td>

            @foreach ($students as $student)

            @if ($apps->reg_number == $student->username)

            <td>{{$student->full_name}}</td>

            <td>{{$student->programme}}</td>

            <td>{{$student->department}}</td>

            <td>{{$student->college}}</td>

            <td>{{$apps->academic_year}}</td>

            <td>{{$apps->firm_name}}</td>

            @endif

            @endforeach
        </tr>




    </div>


    @endforeach
    </table>
</div>

    <div class="control-menu-items">
        <button class="print-class"><i class="fa fa-print"></i></button>
        <button class="search-class"><i class="fa fa-search"></i></button>
        <button class="download-class"><i class="fa fa-download"></i></button>
    </div>

</center>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add event listener to the print button
        document.querySelector('.print-class').addEventListener('click', function () {
            // Select the content to be printed
            var contentToPrint = document.querySelector('.container-centered-ajax-report').innerHTML;

            //contentToPrint.style.border='2px solid #000';

            // Create a new window for printing
            var printWindow = window.open('', '_blank');

            // Write the content into the new window
            printWindow.document.write('<html><head><title></title></head><body>' + contentToPrint + '</body></html>');

            // Close the document after printing
            printWindow.document.close();

            // Initiate printing
            printWindow.print();
        });
    });
    </script>

@endsection
