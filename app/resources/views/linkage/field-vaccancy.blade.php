@extends('linkage.hil-layout')

@section('content')
<br><br><br>

@include('partials.hil-card')

<x-vaccancy_posted />

<center>
    <div class="hil-linkage-dashboard">
        <div class="sub-head">
            <a href="/#">Field Vaccancy</a> / <a href="#">{{Auth::guard('linkage')->user()->full_name}}</a>
        </div><br><br>
        <div class="academic-year-status">
            <p>Active Academic Year: <span class="previousYear"></span>/<span class="currentYear"></span></p><br>
        </div><br>

        <form action="/fieldvaccancies" method="POST" class="post-field-vaccancy">
            @csrf
            <label for="">College</label><br>
            <select name="college" id="">
                <option value="//">Choose college</option>
                @foreach ($colleges as $college)
                <option value="{{$college->college_name}}">{{$college->college_name}}</option>
                @endforeach
            </select><br><br>
            <label for="">Vaccancy Number</label><br>
            <input type="number" name="vaccany_number" id="" placeholder="Enter vaccancy number"><br><br>
            <button type="submit" class="submit-vaccancy">Submit</button><br><br>
        </form>
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
