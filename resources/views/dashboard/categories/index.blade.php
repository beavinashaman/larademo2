@extends('dashboard.layout');
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Category Section</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('categories.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New category</a>
          </div>
         
        </div>
      </div>

@if(!$categories->isEmpty())

      <div class="table-responsive">
        <table class="table table-striped table-sm">
        <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Thumbnail</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Children</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

@foreach($categories as $category)

            <tr>
              <td>{{$category->id}}</td>
              <td>{{$category->title}}</td>
              
              <td>
              <!-- php artisan storage:link -->
              <img src="{{asset('storage/'.$category->thumbnail)}}" class="img-fluid img-thumbnail" height="100" width="100" />
              </td>
              <td>{{$category->created_at}}</td>
              <td>{{$category->updated_at}}</td>
              <td>
              <!-- {{$category->children}} -->
              @if(!$category->children->isEmpty())
              @foreach($category->children as $children)
              {{$children->title}},
              @endforeach
              @else
              {{'Parent category'}}
              @endif
              </td>
              <td>
              <div class="btn-group" role="group" aria-lable="Basic example">
              <a role="button" href="{{route('categories.show', $category->id)}}" class="btn btn-link">View</a>
              <form action="{{route('categories.destroy', $category->id)}}" method="post">
              @csrf
              @method("DELETE")
              <button type="submit" class="btn btn-link">Delete</button>
              </form>
              
              <a role="button" href="{{route('categories.edit', $category->id)}}" class="btn btn-link">Edit</a>
              </div>
              </td>

            </tr>

@endforeach
          </tbody>
        </table>
      </div>
@else
<p class="alert alert-info">No category Record Found..</p>
@endif
@endsection