@extends('dashboard.layout');
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Category Section</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('categories.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New Category</a>
          </div>
         
        </div>
      </div>



      <div class="table-responsive">
        <table class="table table-striped table-sm">
        <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>image</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Users</th>
            
            </tr>
          </thead>
          <tbody>
   <tr>
              <td>{{$category->id}}</td>
              <td>{{$category->title}}</td>
              <td><img src="{{asset('storage/'.$category->thumbnail)}}" class="img-fluid img-thumbnail" height="100" width="100" /></td>
              <td>{{$category->created_at}}</td>
              <td>{{$category->updated_at}}</td>
              <td></td>
             
            </tr>

          </tbody>
        </table>
      </div>

@endsection