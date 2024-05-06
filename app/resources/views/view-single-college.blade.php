@extends('admin-layout')

@section('content')
<br><br><br>

@include('partials.card-view')

<x-college-edited />

<center>
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
                <th>Edit</th>
                <th>Erase</th>
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
                <td class="go-edit" onclick="showEditForm()"><i class="fas fa-edit"></i></td>
                <td>
                    <form action="/delete/{{$college->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit"  class="go-delete"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
        </table>
    </div>
    <form action="/colleges/{{$college->id}}" method="POST" class="edit-added-college-ajax">
        @csrf
        @method('PUT')

        <p>Update {{$college->college_name}} College Data</p><br><br>
        <label for="">College Name</label><br>
        <input type="text" name="college_name" id="" value="{{$college->college_name}}"><br><br>
        <label for="">Location</label><br>
        <input type="text" name="college_location" id="" value="{{$college->college_location}}"><br><br>
        <label for="">Level</label><br>
        <input type="text" name="level" id="" value="{{$college->level}}"><br><br>
        <label for="">Total Progarammes</label><br>
        <input type="number" name="programme_numbers" id="" value="{{$college->programme_numbers}}"><br><br>
        @if ($college->single_program !="")
        <label for="">Programme Name</label><br>
        <input type="text" name="single_program" id="" value="{{$college->single_program}}"><br><br>
        @endif
        @if ($college->program1 !="")
        <label for="">Program 1</label><br>
        <input type="text" name="program1" id="" value="{{$college->program1}}"><br><br>
        @endif
        @if ($college->program1 !="")
        <label for="">Program 1</label><br>
        <input type="text" name="program1" id="" value="{{$college->program1}}"><br><br>
        @endif
        @if ($college->program2 !="")
        <label for="">Program 2</label><br>
        <input type="text" name="program2" id="" value="{{$college->program2}}"><br><br>
        @endif
        @if ($college->program31 !="")
        <label for="">Program 1</label><br>
        <input type="text" name="program31" id="" value="{{$college->program31}}"><br><br>
        @endif
        @if ($college->program32 !="")
        <label for="">Program 2</label><br>
        <input type="text" name="program32" id="" value="{{$college->program32}}"><br><br>
        @endif
        @if ($college->program33 !="")
        <label for="">Program 3</label><br>
        <input type="text" name="program33" id="" value="{{$college->program33}}"><br><br>
        @endif
        @if ($college->program41 !="")
        <label for="">Program 1</label><br>
        <input type="text" name="program41" id="" value="{{$college->program41}}"><br><br>
        @endif
        @if ($college->program42 !="")
        <label for="">Program 2</label><br>
        <input type="text" name="program42" id="" value="{{$college->program42}}"><br><br>
        @endif
        @if ($college->program43 !="")
        <label for="">Program 3</label><br>
        <input type="text" name="program43" id="" value="{{$college->program43}}"><br><br>
        @endif
        @if ($college->program44 !="")
        <label for="">Program 4</label><br>
        <input type="text" name="program44" id="" value="{{$college->program44}}"><br><br>
        @endif
        @if ($college->program51 !="")
        <label for="">Program 1</label><br>
        <input type="text" name="program51" id="" value="{{$college->program51}}"><br><br>
        @endif
        @if ($college->program52 !="")
        <label for="">Program 2</label><br>
        <input type="text" name="program52" id="" value="{{$college->program52}}"><br><br>
        @endif
        @if ($college->program53 !="")
        <label for="">Program 3</label><br>
        <input type="text" name="program53" id="" value="{{$college->program53}}"><br><br>
        @endif
        @if ($college->program54 !="")
        <label for="">Program 4</label><br>
        <input type="text" name="program54" id="" value="{{$college->program54}}"><br><br>
        @endif
        @if ($college->program55 !="")
        <label for="">Program 5</label><br>
        <input type="text" name="program55" id="" value="{{$college->program55}}"><br><br>
        @endif
        @if ($college->program61 !="")
        <label for="">Program 1</label><br>
        <input type="text" name="program61" id="" value="{{$college->program61}}"><br><br>
        @endif
        @if ($college->program62 !="")
        <label for="">Program 2</label><br>
        <input type="text" name="program62" id="" value="{{$college->program62}}"><br><br>
        @endif
        @if ($college->program63 !="")
        <label for="">Program 3</label><br>
        <input type="text" name="program63" id="" value="{{$college->program63}}"><br><br>
        @endif
        @if ($college->program64 !="")
        <label for="">Program 4</label><br>
        <input type="text" name="program64" id="" value="{{$college->program64}}"><br><br>
        @endif
        @if ($college->program65 !="")
        <label for="">Program 5</label><br>
        <input type="text" name="program65" id="" value="{{$college->program65}}"><br><br>
        @endif
        @if ($college->program66 !="")
        <label for="">Program 6</label><br>
        <input type="text" name="program66" id="" value="{{$college->program66}}"><br><br>
        @endif
        @if ($college->program71 !="")
        <label for="">Program 1</label><br>
        <input type="text" name="program71" id="" value="{{$college->program71}}"><br><br>
        @endif
        @if ($college->program72 !="")
        <label for="">Program 2</label><br>
        <input type="text" name="program72" id="" value="{{$college->program72}}"><br><br>
        @endif
        @if ($college->program73 !="")
        <label for="">Program 3</label><br>
        <input type="text" name="program73" id="" value="{{$college->program73}}"><br><br>
        @endif
        @if ($college->program74 !="")
        <label for="">Program 4</label><br>
        <input type="text" name="program74" id="" value="{{$college->program74}}"><br><br>
        @endif
        @if ($college->program75 !="")
        <label for="">Program 5</label><br>
        <input type="text" name="program75" id="" value="{{$college->program75}}"><br><br>
        @endif
        @if ($college->program76 !="")
        <label for="">Program 6</label><br>
        <input type="text" name="program76" id="" value="{{$college->program76}}"><br><br>
        @endif
        @if ($college->program77 !="")
        <label for="">Program 7</label><br>
        <input type="text" name="program77" id="" value="{{$college->program77}}"><br><br>
        @endif
        <button type="submit"><i class="fas fa-edit"></i> Edit</button><br><br>
    </form>

    <script>
        function showEditForm(){
            document.querySelector('.edit-added-college-ajax').style.display='block';
        }
    </script>
</center>
@endsection
