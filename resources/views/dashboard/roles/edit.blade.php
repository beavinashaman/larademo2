@extends('dashboard.layout')
@section('content')
<form action="{{route('roles.update', $role->id)}}" method="post">
@csrf
@method('PUT')
<div class="form-row align-items-center">
<div class="col-md-8">

<label for="">Add new Role</label>
<input type="text" name="name" class="form-controll" placeholde="Role Name" value="{{$role->name}}">
</div>

<div class="col-md-4">

<button type="submit" class="btn btn-primary">Update</button>

</div>
</div>
</form>
@endsection