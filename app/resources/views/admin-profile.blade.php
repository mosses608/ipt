@extends('admin-layout')

@section('content')
<br><br><br>

@include('partials.card-view')

<x-profile-updated />

<x-password-update />

<center>
    <div class="left-side-pane">

        <div class="min-object-cont">
            <br>
        <p>My Profile</p>
        <p><a href="/admin_dashboard">Dashboard</a> / <a href="/admin-profile">Profile</a></p><br>
    </div>
    <br><br><br><br>

        <div class="left-container-block-side">
            <img src="{{auth()->user()->profile ? asset('storage/' . auth()->user()->profile) : asset('images/profile.png')}}" alt="Profile Image">
            <br>
            <p>{{auth()->user()->full_name}}</p><br>
            <p style="color: orange;"><i class="fas fa-user-shield"></i> Admin</p>
        </div>

        <div class="right-side-container-panne">
            <a href="#" class="edit-profile" onclick="hideProContent()">Edit Profile</a><a href="#" class="edit-pass" onclick="showContent()">Change Password</a>
            <br><br>
            <form action="/users/admin_update/{{auth()->user()->id}}" method="POST" class="edit-all-profile-doc" enctype="multipart/form-data" style="display: block;">
                @csrf
                @method('PUT')
                <label for="">Profile Image</label><br>
                @if (auth()->user()->profile !="")
                <img src="{{auth()->user()->profile ? asset('storage/' . auth()->user()->profile) : asset('images/profile.png')}}" alt="My Image Profile" class="edited-profile-img">
                <br>
                @else
                <img src="{{asset('images/profile.png')}}" alt="My Image Profile" style="float: left;"><br><br>
                <input type="file" name="profile" id="">
                @endif
                <br><br>
                <label for="">Full Name</label><br>
                <input type="text" name="full_name" id="" value="{{auth()->user()->full_name}}"><br><br>
                <button type="submit">Update</button><br>
            </form>
            <form action="/users/admin_pass_upd/{{auth()->user()->id}}" method="POST" class="change-admin-pass">
                @csrf
                @method('PUT')
                <label for="">Password</label><br>
                <input type="password" name="password" id="" value="{{auth()->user()->password}}"><br><br>
                <button type="submit">Update</button><br>
            </form>
        </div>

        <script>
            document.querySelector('.edit-pass').addEventListener('click', function(){
                document.querySelector('.change-admin-pass').style.display='block';
                document.querySelector('.edit-all-profile-doc').style.display='none';
                document.querySelector('.edit-pass').style.color='blue';
                //document.querySelector('.edit-pass').style.decoration='underline';
                document.querySelector('.edit-profile').style.color='black';
            })

            document.querySelector('.edit-profile').addEventListener('click', function(){
                document.querySelector('.change-admin-pass').style.display='none';
                document.querySelector('.edit-all-profile-doc').style.display='block';
                document.querySelector('.edit-pass').style.color='black';
                //document.querySelector('.edit-pass').style.decoration='underline';
                document.querySelector('.edit-profile').style.color='blue';
            })
        </script>

    </div>
</center>
@endsection

