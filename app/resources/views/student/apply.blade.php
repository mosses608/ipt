@extends('student.student-layout')

@section('content')
<br><br><br>

@include('partials.student-card')

<x-application-submit />

<center>
    <div class="main-component-application-container">
        <p id="status-page-p">Field Application Dashboard</p>
        <br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>
        <div class="application-main">
            <p>Apply For IPT</p>


            @if (auth()->guard('student')->user()->response =="")
            <span>Status: Application on processing ....</span>
            @else
            <span>Status : Application {{auth()->guard('student')->user()->response}} successfully</span>
            @endif



            <br><br>
            <form action="/applications" method="POST" class="">
                @csrf
                <div class="input-set-0">

                    <label for="">Academic Year <span class="important">*</span></label>
                    <select name="academic_year" id="" class="yearSelect">
                        <option value="//">Select Academic Year <i class="fa chevron-down-angle"></i></option>
                    </select>



                    <script>
                        document.addEventListener("DOMContentLoaded", function() {

                          var current_year = new Date().getFullYear();


                          var selectElement = document.querySelector(".yearSelect");


                          for (var i = 2010; i <= current_year; i++) {
                            var option = document.createElement("option");
                            option.text = i;
                            option.value = i;
                            selectElement.add(option);
                          }
                        });
                        </script>

                </div>
                <div class="input-select-00">
                    @foreach ($applications as $application) @endforeach

                    <label for="">Firm or Company <span class="important">*</span></label>
                    <select name="firm_name" id="">
                        <option value="//">Select Firm/Company</option>
                        @foreach ($firms as $firm)
                        <option value="{{$firm->firm_name}}">{{$firm->firm_name}}, {{$firm->location}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="input-select-000">
                    @foreach ($applications as $application) @endforeach

                    <label for="">Firm Location <span class="important">*</span></label>
                    <select name="firm_location" id="">
                        <option value="//">Region and District</option>
                        @foreach ($firms as $firm)
                        <option value="{{$firm->location}}">{{$firm->location}}</option>
                        @endforeach
                    </select>

                </div><br><br>

                <input type="hidden" name="reg_no" value="{{auth()->guard('student')->user()->username}}">

        <button class="showHiddenContent" type="submit">Save</button>
        @foreach ($applications as $application)
        @if ($application->reg_no == auth()->guard('student')->user()->username)
        <a href="#" class="next-show" onclick="showHiddenContents()">Next</a>
        @endif
        @endforeach
        <br><br>
            </form>

            <center>
                <div class="valid-content-container" style="display: none;">

                    @foreach ($applications as $application)
                    @if ($application->reg_no == auth()->guard('student')->user()->username)
                    <p>Academic Year: <span class="previousYear">{{$application->academic_year}}</span>/<span class="currentApp">{{$application->academic_year}}</span></p>
                    <p>Firm Name: {{$application->firm_name}}</p>
                    <p>Firm Location: {{$application->firm_location}}</p>
                    @endif
                    @endforeach
                    <br><br>
                    <script>
                        document.querySelector('.previousYear').textContent===document.querySelector('.currentApp').textContent-1;
                    </script>
                </div>

            </center>

            <form action="/completeapplications" method="POST" class="update-application">
                @csrf
                <input type="hidden" name="reg_number" id="" value="{{auth()->guard('student')->user()->username}}">
                <div class="hidden-content-item">
                    <label for="">Your Gender</label> Male <input type="radio" name="gender1" id="" value="Male">   Female <input type="radio" name="gender2" id="" value="Female">
                </div><br>
                <div class="firm-select-container-main">
                    <table>
                        <tr>
                            <th>Firm Name</th><th>Firm Department</th><th>Male</th><th>Female</th><th>Pick</th>
                        </tr>


                        @foreach ($applications as $application)


                        <tr>

                            @foreach ($vacancies as $vacancy)
                            @endforeach

                            @if ($application->reg_no == auth()->guard('student')->user()->username)

                            <input type="hidden" name="firm_name" id="" value="{{$application->firm_name}}, {{$application->firm_location}}">
                            <input type="hidden" name="academic_year" id="" value="{{$application->academic_year}}">
                            @endif


                            @if ($application->firm_name == $vacancy->firm_name && $application->reg_no==auth()->guard('student')->user()->username)
                            <td>{{$vacancy->firm_name}}</td>
                            <td>{{$vacancy->department}}</td>
                            <td>{{$vacancy->maleValue}}</td>
                            <td>{{$vacancy->femaleValue}}</td>
                            <td><input type="radio" name="action" id="" value="Applied"></td>
                            @endif




                        </tr>
                        @endforeach
                    </table>
                </div><br> <button type="submit" class="submit-edi-button">Submit Application</button>
                <br><br>
            </form>
        </div>

        <script>
            const hiddenClass=document.querySelector('.update-application');

            function showHiddenContents(){
                hiddenClass.style.display='block';
                hiddenClass.style.animation='slideSlowly 4s forwards';
            }
        </script>
    </div>
</center>
<script>
    const currentYear=new Date();

    const yearOption={weekly: 'long' , year: 'numeric'};

    const formattedYear=currentYear.toLocaleDateString('en-US', yearOption);

    document.querySelector('.currentYear').textContent=formattedYear;

    document.querySelector('.previousYear').textContent=formattedYear-1;

</script>

@endsection
