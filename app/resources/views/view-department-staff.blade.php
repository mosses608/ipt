@extends('admin-layout')


@section('content')
<br><br><br>

@include('partials.card-view')

<center>

    @if (count($hods) == 0)
    <br>
    <p>Sorry! such staff does not exist , try to register again.</p>
    @else

    @foreach ($hods as $staff)

    @endforeach

    <div class="container-student-ajax">

        <p class="head-main-head">View Staff</p><br><br>
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
                <th>Role</th><th>Staff Id</th><th>Staff Name</th><th>Phone Number</th><th>College</th><th>Username</th><th>Profile</th><th>Action</th>
            </tr>
            <tr>
                @foreach ($hods as $staff)
                <tr>
                    @if ($staff->role == '1')
                    <td>HoD</td>
                    @else
                    <td>Lecturer</td>
                    @endif
                    <td>{{$staff->employee_id}}</td>
                    <td>{{$staff->full_name}}</td>
                    <td>{{$staff->phone}}</td>
                    <td>{{$staff->college}}</td>
                    <td>{{$staff->username}}</td>
                    <td><img src="{{$staff->profile ? asset('storage/' . $staff->profile) : asset('images/profile.png')}}" alt="" class="profile-image" style="width: 70%"></td>
                    <td class="change-staff-det" style="color: #0000FF;"><a href="/staff-action/{{$staff->id}}"><i class="fa fa-eye"></i></a></td>

                </tr>
                @endforeach
            </tr>
        </table>
    </div>




    <br><br>
        <div class="paginate-link-complexer">
            {{$hods->links()}}
        </div>
    @endif
    <!--<div class="search-single-lg">
        <form action="/view-department-staff" method="GET">
            @csrf
            <input type="text" name="search" id="" placeholder="Search by staff Id"> <button type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>-->
</center>
@endsection
