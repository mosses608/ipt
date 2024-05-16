@extends('admin-layout')

@section('content')
<br><br><br>

@include('partials.card-view')

<x-success-prpgram />

<br>
<center>


    <form action="/colleges" method="POST" class="container-component-ajax-lg">

        <p class="head-main-head">College Registration</p><br><br>
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


        <p>College Registration Form</p><br><br>

        @csrf

        <div class="left-panel-01">
            <label for="College Name">College Name</label><br>
            <input type="text" name="college_name" id="" value="{{old('college_name')}}" placeholder="Enter the college name"><br>
            @error('college_name')
                <span>The college name is required!</span>
            @enderror
            <br>

            <label for="Location">College Location</label><br>
            <select name="college_location" id="">
                <option value="//">Choose location</option>
                <option value="Main Campus">Main Campus</option>
                <option value="Rukwa Campus">Rukwa Campus</option>
            </select><br><br>

            <label for="Level">Education Level</label><br>
            <select name="level" id="">
                <option value="//">Choose level</option>
                <option value="Bachelor">Bachelor</option>
                <option value="Diploma">Diploma</option>
                <option value="Certificate">Certificate</option>
            </select><br>
        </div>

        <div class="right-panel-01">

            <label for="programmes">Programes Offered</label><br>
            <select type="text" name="programme_numbers" id="" class="programes-selector">
                <option value="//">Choose a number of programmes you provide</option>
                <option value="1">1 programme</option>
                <option value="2">2 programme</option>
                <option value="3">3 programme</option>
                <option value="4">4 programme</option>
                <option value="5">5 programme</option>
                <option value="6">6 programme</option>
                <option value="7">7 programme</option>
            </select>
            <br>

            <div class="first-program-input" style="display:none;">
            <br>
                <label for="Singe">Programe Name</label><br>
                <input type="text" name="single_program" id="" placeholder="Enter the programme name">
            </div>
            <br>

            <div class="two-programs-input" style="display:none;">
                <label for="Two">Programes Name</label><br>
                <input type="text" name="program1" id="" placeholder="Enter the first programme name"><br><br>
                <input type="text" name="program2" id="" placeholder="Enter the second programme name">
            </div>

            <div class="three-programs-input" style="display:none;">
                <label for="Three">Programes Name</label><br>
                <input type="text" name="program31" id="" placeholder="Enter the first programme name"><br><br>
                <input type="text" name="program32" id="" placeholder="Enter the second programme name"><br><br>
                <input type="text" name="program33" id="" placeholder="Enter the third programme name">
            </div>

            <div class="four-programs-input" style="display:none;">
                <label for="Three">Programes Name</label><br>
                <input type="text" name="program41" id="" placeholder="Enter the first programme name"><br><br>
                <input type="text" name="program42" id="" placeholder="Enter the second programme name"><br><br>
                <input type="text" name="program43" id="" placeholder="Enter the third programme name"><br><br>
                <input type="text" name="program44" id="" placeholder="Enter the fourth programme name">
            </div>

            <div class="five-programs-input" style="display:none;">
                <label for="Three">Programes Name</label><br>
                <input type="text" name="program51" id="" placeholder="Enter the first programme name"><br><br>
                <input type="text" name="program52" id="" placeholder="Enter the second programme name"><br><br>
                <input type="text" name="program53" id="" placeholder="Enter the third programme name"><br><br>
                <input type="text" name="program54" id="" placeholder="Enter the fourth programme name"><br><br>
                <input type="text" name="program55" id="" placeholder="Enter the fifth programme name">
            </div>
            <div class="six-programs-input" style="display:none;">
                <label for="Three">Programes Name</label><br>
                <input type="text" name="program61" id="" placeholder="Enter the first programme name"><br><br>
                <input type="text" name="program62" id="" placeholder="Enter the second programme name"><br><br>
                <input type="text" name="program63" id="" placeholder="Enter the third programme name"><br><br>
                <input type="text" name="program64" id="" placeholder="Enter the fourth programme name"><br><br>
                <input type="text" name="program65" id="" placeholder="Enter the fifth programme name"><br><br>
                <input type="text" name="program66" id="" placeholder="Enter the sixth programme name">
            </div>
            <div class="seven-programs-input" style="display:none;">
                <label for="Three">Programes Name</label><br>
                <input type="text" name="program71" id="" placeholder="Enter the first programme name"><br><br>
                <input type="text" name="program72" id="" placeholder="Enter the second programme name"><br><br>
                <input type="text" name="program73" id="" placeholder="Enter the third programme name"><br><br>
                <input type="text" name="program74" id="" placeholder="Enter the fourth programme name"><br><br>
                <input type="text" name="program75" id="" placeholder="Enter the fifth programme name"><br><br>
                <input type="text" name="program76" id="" placeholder="Enter the sixth programme name"><br><br>
                <input type="text" name="program77" id="" placeholder="Enter the seventh programme name">
            </div>
            <br>
            <button type="submit" class="right-panel-01-button">Submit</button><br><br>
        </div>
    </form><br><br>
</center>


<script>
    const oneprogram=document.querySelector('.first-program-input');
    const twiprograms=document.querySelector('.two-programs-input');
    const threeprograms=document.querySelector('.three-programs-input');
    const fourprograms=document.querySelector('.four-programs-input');
    const fiveprogrames=document.querySelector('.five-programs-input');
    const sixprogrames=document.querySelector('.six-programs-input');
    const sevenprogrames=document.querySelector('.seven-programs-input');

    const containerholder=document.querySelector('.container-component-ajax-lg');

    const controllchanger=document.querySelector('.programes-selector');

    controllchanger.addEventListener('change', function(){
        const selectvalue=controllchanger.value;
        containerholder.style.height='300px';
        oneprogram.style.display='none';
        twiprograms.style.display='none';
        threeprograms.style.display='none';
        fourprograms.style.display='none';
        fiveprogrames.style.display='none';
        sixprogrames.style.display='none';
        sevenprogrames.style.display='none';

        if(selectvalue === '1'){
            oneprogram.style.display='block';
            containerholder.style.height='320px';
        }else if(selectvalue === '2'){
            twiprograms.style.display='block';
            containerholder.style.height='360px';
        }else if(selectvalue === '3'){
            threeprograms.style.display='block';
            containerholder.style.height='440px';
        }else if(selectvalue ==='4'){
            fourprograms.style.display='block';
            containerholder.style.height='500px';
        }else if(selectvalue === '5'){
            fiveprogrames.style.display='block';
            containerholder.style.height='580px';
        }else if(selectvalue === '6'){
            sixprogrames.style.display='block';
            containerholder.style.height='660px';
        }else if(selectvalue === '7'){
            sevenprogrames.style.display='block';
            containerholder.style.height='720px';
        }
    });
</script>


@endsection
