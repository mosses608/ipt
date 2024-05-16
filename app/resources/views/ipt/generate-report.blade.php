@extends('ipt.ipt-layout')


@section('content')
<br><br><br>

@include('partials.coordinator')

<center>
    <div class="report-generate-container">
        <p class="ipt-parag">Generate Report</p><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        <div class="load-data-student-list">
            <div class="printed-download-single-lgx">
            <table>
                <tr>
                    <th>Instructor Name</th>
                    <th>Phone Number</th>
                    <th>College</th>
                    <th>Student Assigned</th>
                    <th>Firm Name</th>
                </tr>

                @foreach ($hods as $staff)

                @foreach ($students as $student)

                <tr>



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




                </tr>
                @endforeach

                @endforeach



            </table>

            </div>
<br>
            <button class="print-document-button"><i class="fa fa-print"></i></button> <button class="download-document-button"><i class="fa fa-download"></i></button><br>
        </div>

    </div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add event listener to the print button
        document.querySelector('.print-document-button').addEventListener('click', function () {
            // Select the content to be printed
            var contentToPrint = document.querySelector('.printed-download-single-lgx').innerHTML;

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



<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var downloadButton = document.querySelector(".download-document-button");

        if (downloadButton) {
            downloadButton.addEventListener("click", function() {
                // Find the element containing the content to be downloaded
                var contentElement = document.querySelector(".printed-download-single-lgx");

                if (contentElement) {
                    // Get the content HTML
                    var contentHTML = contentElement.innerHTML;

                    // Create a Blob with the content
                    var blob = new Blob([contentHTML], { type: 'text/html' });

                    // Create a temporary link element
                    var a = document.createElement('a');
                    a.href = window.URL.createObjectURL(blob);
                    a.download = 'document.html'; // Set the filename
                    document.body.appendChild(a);

                    // Trigger the click event to download the HTML file
                    a.click();

                    // Clean up
                    document.body.removeChild(a);
                } else {
                    console.error("Content element not found.");
                }
            });
        } else {
            console.error("Download button not found.");
        }
    });
</script>

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
