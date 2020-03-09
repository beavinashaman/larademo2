@extends('dashboard.layout');
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Users Section</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('users.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New user</a>
          </div>
         
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
        <thead>
            <tr>
              <th>#</th>
              <th>User Name</th>
              <th>Name</th>
              <th>Thumbnail</th>
              <th>City</th>
              <th>Country</th>
              <th>Roles</th>
              <th>Created At</th>
              <th>Updated At</th>
        
            </tr>
          </thead>
          <tbody>


            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->username}}</td>
              <td>{{$user->name}}</td>
              <td>
              <!-- php artisan storage:link -->
              <img src="{{asset('storage/'.$user->profile->photo)}}" class="img-fluid img-thumbnail" height="100" width="100" />
              </td>
              <td>{{$user->profile->city}}</td>
              <td>{{$user->profile->country->name}}</td>
              <td>
              @if(!$user->roles->isEmpty())
             {{$user->roles->implode('name',',')}}
              @else
              {{'No role assign'}}
              @endif
              </td>
              
              
              <td>{{$user->created_at}}</td>
              <td>{{$user->updated_at}}</td>
            </tr>


          </tbody>
        </table>
      </div>

@endsection