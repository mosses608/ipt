@extends('admin-layout')

@section('content')
<br><br><br>

@include('partials.card-view')

<x-college-delete />

@foreach ($colleges as $college)

@endforeach

<center>

    @if (count($colleges) == 0)
    <p>No college registered here!</p>
    @endif

        @foreach ($colleges as $college)
        <div class="view-college-prorammes-container">
        <h2>{{$college->college_name}} Programmes</h2>
        <table>
            <tr>
                <th>College Name</th>
                <th>Location</th>
                <th>Level</th>
                <th>Total Programmes</th>
                @if ($college->single_program != "")
                <th>Single Program</th>
                @endif
                @if ($college->program1 != "")
                <th>Program 1</th>
                @endif
                @if ($college->program2 !="")
                <th>Program 2</th>
                @endif
                @if ($college->program31 !="")
                <th>Program 1</th>
                @endif
                @if ($college->program32 !="")
                <th>Program 2</th>
                @endif
                @if ($college->program33 !="")
                <th>Program 3</th>
                @endif
                @if ($college->program41 !="")
                <th>Program 1</th>
                @endif
                @if ($college->program42 !="")
                <th>Program 2</th>
                @endif
                @if ($college->program43 !="")
                <th>Program 3</th>
                @endif
                @if ($college->program44 !="")
                <th>Program 4</th>
                @endif
                @if ($college->program51 !="")
                <th>Program 1</th>
                @endif
                @if ($college->program52 !="")
                <th>Program 2</th>
                @endif
                @if ($college->program53 !="")
                <th>Program 3</th>
                @endif
                @if ($college->program54 !="")
                <th>Program 4</th>
                @endif
                @if ($college->program55 !="")
                <th>Program 5</th>
                @endif
                @if ($college->program61 !="")
                <th>Program 1</th>
                @endif
                @if ($college->program62 !="")
                <th>Program 2</th>
                @endif
                @if ($college->program63 !="")
                <th>Program 3</th>
                @endif
                @if ($college->program64 !="")
                <th>Program 4</th>
                @endif
                @if ($college->program65 !="")
                <th>Program 5</th>
                @endif
                @if ($college->program66 !="")
                <th>Program 6</th>
                @endif
                @if ($college->program71 !="")
                <th>Program 1</th>
                @endif
                @if ($college->program72 !="")
                <th>Program 2</th>
                @endif
                @if ($college->program73 !="")
                <th>Program 3</th>
                @endif
                @if ($college->program74 !="")
                <th>Program 4</th>
                @endif
                @if ($college->program75 !="")
                <th>Program 5</th>
                @endif
                @if ($college->program76 !="")
                <th>Program 6</th>
                @endif
                @if ($college->program77 !="")
                <th>Program 7</th>
                @endif
                <th>Action</th>
            </tr>

            <tr>
                <td>{{$college->college_name}}</td>
                <td>{{$college->college_location}}</td>
                <td>{{$college->level}}</td>
                <td>{{$college->programme_numbers}}</td>
                @if ($college->single_program !="")
                <td>{{$college->single_program}}</td>
                @endif
                @if ($college->program1 !="")
                <td>{{$college->program1}}</td>
                @endif
                @if ($college->program2 !="")
                <td>{{$college->program2}}</td>
                @endif
                @if ($college->program31 !="")
                <td>{{$college->program31}}</td>
                @endif
                @if ($college->program32 !="")
                <td>{{$college->program32}}</td>
                @endif
                @if ($college->program33 !="")
                <td>{{$college->program33}}</td>
                @endif
                @if ($college->program41 !="")
                <td>{{$college->program41}}</td>
                @endif
                @if ($college->program42 !="")
                <td>{{$college->program42}}</td>
                @endif
                @if ($college->program43 !="")
                <td>{{$college->program43}}</td>
                @endif
                @if ($college->program44 !="")
                <td>{{$college->program44}}</td>
                @endif
                @if ($college->program51 !="")
                <td>{{$college->program51}}</td>
                @endif
                @if ($college->program52 !="")
                <td>{{$college->program52}}</td>
                @endif
                @if ($college->program53 !="")
                <td>{{$college->program53}}</td>
                @endif
                @if ($college->program54 !="")
                <td>{{$college->program54}}</td>
                @endif
                @if ($college->program55 !="")
                <td>{{$college->program55}}</td>
                @endif
                @if ($college->program61 !="")
                <td>{{$college->program61}}</td>
                @endif
                @if ($college->program62 !="")
                <td>{{$college->program62}}</td>
                @endif
                @if ($college->program63 !="")
                <td>{{$college->program63}}</td>
                @endif
                @if ($college->program64 !="")
                <td>{{$college->program64}}</td>
                @endif
                @if ($college->program65 !="")
                <td>{{$college->program65}}</td>
                @endif
                @if ($college->program66 !="")
                <td>{{$college->program66}}</td>
                @endif
                @if ($college->program71 !="")
                <td>{{$college->program71}}</td>
                @endif
                @if ($college->program72 !="")
                <td>{{$college->program72}}</td>
                @endif
                @if ($college->program73 !="")
                <td>{{$college->program73}}</td>
                @endif
                @if ($college->program74 !="")
                <td>{{$college->program74}}</td>
                @endif
                @if ($college->program75 !="")
                <td>{{$college->program75}}</td>
                @endif
                @if ($college->program76 !="")
                <td>{{$college->program76}}</td>
                @endif
                @if ($college->program77 !="")
                <td>{{$college->program77}}</td>
                @endif
                <td class="go-ahed-link"><a href="/view-single-college/{{$college->id}}"><i class="fas fa-eye"></i></a></td>
            </tr>
        </table>
    </div>
        @endforeach

        <br><br>
        <div class="paginate-link-complexer">
            {{$colleges->links()}}
        </div>

</center>
@endsection
