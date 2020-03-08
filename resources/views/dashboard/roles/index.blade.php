@extends('dashboard.layout');
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Roles Section</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('roles.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New Role</a>
          </div>
         
        </div>
      </div>

@if(!$roles->isEmpty())

      <div class="table-responsive">
        <table class="table table-striped table-sm">
        <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Users</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

@foreach($roles as $role)

            <tr>
              <td>{{$role->id}}</td>
              <td>{{$role->name}}</td>
              <td>{{$role->created_at}}</td>
              <td>{{$role->updated_at}}</td>
              <td></td>
              <td>
              <div class="btn-group" role="group" aria-lable="Basic example">
              <a role="button" href="{{route('roles.show', $role->id)}}" class="btn btn-link">View</a>
              <form action="{{route('roles.destroy', $role->id)}}" method="post">
              @csrf
              @method("DELETE")
              <button type="submit" class="btn btn-link">Delete</button>
              </form>
              
              <a role="button" href="{{route('roles.edit', $role->id)}}" class="btn btn-link">Edit</a>
              </div>
              </td>

            </tr>

@endforeach
          </tbody>
        </table>
      </div>
@else
<p class="alert alert-info">No Roles Record Found..</p>
@endif
@endsection