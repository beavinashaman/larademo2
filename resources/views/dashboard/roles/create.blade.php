@extends('dashboard.layout')
@section('content')
<form action="{{route('roles.store')}}" method="post">
@csrf
<div class="form-row align-items-center">
<div class="col-md-8">
<label for="">Add new Role</label>
<input type="text" name="name" class="form-controll" placeholde="Role Name">
</div>

<div class="col-md-4">

<button type="submit" class="btn btn-primary">Save</button>

</div>
</div>
</form>
@endsection