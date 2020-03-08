@extends('dashboard.layout')
@section('content')
<form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-row align-items-center">
<div class="col-md-12">
<label for="inputUsername">User Name</label>
<input type="text" name="username" id="inputUsername" class="form-controll" placeholde="Username">
</div>

<div class="col-md-12">
<label for="inputname">Full Name</label>
<input type="text" name="name" id="inputName" class="form-controll" placeholde="Full Name">
</div>

<div class="col-md-12">
<label for="inputUserEmail">Email</label>
<input type="email" name="email" id="inputUserEmail" class="form-controll" placeholde="Enter a valid Email">
</div>

<div class="col-md-12">
<label for="inputPassword">Password</label>
<input type="password" name="password" id="inputPassword" class="form-controll" placeholde="*********">
</div>

<div class="col-md-12">
<label for="inputPhone">Phone</label>
<input type="text" name="phone" id="inputPhone" class="form-controll" placeholde="Phone no.">
</div>

<div class="col-md-12">
<label for="selectCountry">Select Country</label>
<select name="country" id="" class="form-control">
@if(!$countries->isEmpty())
@foreach($countries as $country)
<option value="{{$country->id}}">{{$country->name}}</option>
@endforeach
@endif
</select>
</div>

<div class="col-md-12">
<label for="inputCity">City</label>
<input type="text" name="city" id="inputCity" class="form-controll" placeholde="City name">
</div>


<div class="col-md-12">
<label for="selectRoles">Select Roles</label>
<select name="roles[]" id="selectRoles" class="form-controll" multiple>
@if(!$roles->isEmpty())
@foreach($roles as $role)
<option value="{{$role->id}}">{{$role->name}}</option>
@endforeach
@endif

</select>
</div>


<div class="col-md-12">
<label for="inputFileName">Profile Image</label>
<input type="file" name="photo" id="inputFileName" class="form-controll form-file-control mb2" >
</div>


<div class="col-md-12">

<button type="submit" class="btn btn-primary">Save</button>

</div>
</div>
</form>
@endsection