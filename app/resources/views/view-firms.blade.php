@extends('admin-layout')


@section('content')
<br><br><br>

@include('partials.card-view')

<center>
    @if (count($firms) == 0)
    <p>No firm found here, please try to register</p>

    @else

<div class="container-student-ajax">
    <table>
        <tr>
            <th>Firm Name</th><th>Location</th><th>Postal Address</th><th>Firm Type</th><th>Service/Products offered</th><th>Edit</th><th>Delete</th>
        </tr>

        @foreach ($firms as $firm)

        <tr>

            <td>{{$firm->firm_name}}</td>
            <td>{{$firm->location}}</td>
            <td>{{$firm->address}}</td>
            <td>{{$firm->firm_type}}</td>
            <td>{{$firm->serives}}</td>
            <td><i class="fa fa-edit"></i></td>
            <td><i class="fa fa-trash"></i></td>

        </tr>
        @endforeach
    </table>
</div>

<!--
<div class="search-single-lg">
    <form action="/view-firms" method="GET">
        <input type="number" name="search" id="" placeholder="Search by firm name"> <button type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>-->


    @endif

    <div class="paginate-link-complexer">
        {{$firms->links()}}
    </div>
</center>

@endsection
