@extends('dashboard.layout')
@section('content')
<form action="{{route('categories.update', $category->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="form-row align-items-center">
<div class="col-md-12">
<label for="inputCategoryTitle">Add new Category</label>
<input type="text" name="title" id="inputCategoryTitle" class="form-controll" value="{{$category->title}}" placeholde="Category Title">
</div>

<div class="col-md-12">
<label for="inputContent">Content</label>
<textarea  name="content" id="inputContent" class="form-controll" >{{$category->content}}</textarea>
</div>


<div class="col-md-12">
<img src="{{asset('storage/'.$category->thumbnail)}}" class="img-fluid img-thumbnail" height="100" width="100" />

<label for="inputFileName">Thumbnail</label>
<input type="file" name="thumbnail" id="inputFileName" class="form-controll form-file-control mb2" >
</div>

<div class="col-md-12">
<label for="inputFileName">Name</label>
<select name="parent_id" id="">
<option value="0">Select Parent Category</option>
@if(!$categories->isEmpty())
@foreach($categories as $cats)
<option @if($category->parent->id == $cats->id){{'selected'}} @endif value="{{$cats->id}}">{{$cats->title}}</option>

@endforeach
@endif
</select>
</div>

<div class="col-md-12">

<button type="submit" class="btn btn-primary">Save</button>

</div>
</div>
</form>
@endsection