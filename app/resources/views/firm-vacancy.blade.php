@extends('admin-layout')


@section('content')
<br><br><br>

@include('partials.card-view')

<x-vacancy />

<center>
    <div class="firm-vacancy-admin">
        <form action="/vacancies" method="POST" class="vacancy-container">
            @csrf
            <p>Vacancy Registration Form</p><br><br>
            <div class="left-panel-manual">
                <label for="">Firm Name<span>*</span></label>
                <select name="firm_name" id="" class="firm_name">
                    <option value="//">Choose Firm Name</option>
                    @foreach ($firms as $firm)
                    <option value="{{$firm->firm_name}}">{{$firm->firm_name}}, {{$firm->location}}</option>
                    @endforeach
                </select><br><br>
            </div>


            <div class="middle-panel-manual">
                <label for="">Department</label>
                <input type="text" name="department" id="" placeholder="Department">
            </div>

            <script>
                //const pDepartment=document.querySelector('.department-component').value;
                //const pvalue=document.querySelector('.hideFromNoWhereP').value;
                //const firmName=document.querySelector('.firm_name');

                firmName.addEventListener('change', function(){
                    //const selectedFirmValue=firmName.value;

                    if(selectedFirmValue === pvalue){
                        var optioned=document.createElement("option");
                        optioned.text=pDepartment;
                    }
                });
            </script>

            <div class="right-panel-manual">
                <label for="">Vacancy Number<span>*</span></label>
                <select name="vacancy_number" id="" class="select">
                    <option value="//">Choose vacancy number</option>
                </select><br><br>
            </div><br><br><br>

            <div class="gender-component" style="display: none;">
                <label for="">Vacancy Provision<span>*</span></label><br><br>
                <em>Male<span>*</span></em> <input type="number" name="maleValue" id="" placeholder="Enter a number"> <em>Female<span>*</span> </em><input type="number" name="femaleValue" id="" placeholder="Enter a number"><br><br>
                <button type="submit" class="submit-vacancy">Submit</button>
            </div><br><br>
        </form>

        <script>

            const selectOpt=document.querySelector('.select');

            //var selectValue=do.querySelector('.select').value;
            document.addEventListener("DOMContentLoaded", function(){

                //var selectValue=50;

                var select=document.querySelector('.select');

                for(var i=1; i<=100;i++){
                    var optionValue=document.createElement("option");
                    optionValue.text = i;
                    optionValue.value = i;
                    select.add(optionValue);
                }

                document.querySelector('.select').addEventListener('change', function(){
                    const selectedValue=selectOpt.value;

                    document.querySelector('.gender-component').style.display='none';


                    if(selectedValue>=1 || selectedValue <=100){
                        document.querySelector('.gender-component').style.display='block';
                    }
                });
            });


        </script>
    </div>
</center>
@endsection
