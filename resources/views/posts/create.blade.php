@extends('layouts.layout1');
@section('title','Create New Post')
@section('content')

<!-- @if($errors->any())
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
@endif -->
<form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
<table>
@csrf

<tr>
<td>Title</td>
<td><input type="text" name="title" value="{{old('title')}}"/></td>

</tr>

<tr>

@error('title')
<p>{{$message}}</p>
@enderror 

</tr>

<tr>
<td>Start Date</td>
<td><input type="date" name="start_date" value="{{old('start_date')}}"/></td>

</tr>

<tr> 
@if($errors->has('start_date'))
@foreach($errors->get('start_date') as $error)
<td>{{$error}}</td> 
@endforeach 
@endif 
</tr>

<tr>
<td>End Date</td>
<td><input type="date" name="end_date" value="{{old('end_date')}}"/></td>

</tr>

<tr>
 
@if($errors->has('end_date'))
@foreach($errors->get('end_date') as $error) 
<td>{{$error}}</td>
@endforeach 
@endif 
</tr>

<tr>
<td>Content</td>
<td><textarea name="content" id="" cols="30" rows="10"></textarea></td>
</tr>

<tr>
@if($errors->has('content'))
@foreach($errors->get('content') as $error) 
<td>{{$error}}</td>
@endforeach
@endif 
</tr>

<tr>
<td>General 1<input type="checkbox" name="check[]" id="" /></td>
<td>General 2<input type="checkbox" name="check[]" id="" /></td>
<td>General 3<input type="checkbox" name="check[]" id="" /></td>
<td>General 4<input type="checkbox" name="check[]" id="" /></td>
</tr>

<tr>

@if($errors->has('check'))
@foreach($errors->get('check') as $error) 
<td>{{$error}}</td>
@endforeach
@endif 
</tr>

<tr>
<td>File</td>
<td><input type="file" name="photo" id="" /></td>
</tr>

<tr>

@if($errors->has('photo'))
@foreach($errors->get('photo') as $error) 
<td>{{$error}}</td>

@endforeach
@endif 
</tr>

<tr>
<td>Website<input type="url" name="website" id="" /></td>
</tr>

<tr>

@if($errors->has('website'))
@foreach($errors->get('website') as $error) 

<td>{{$error}}</td>

@endforeach
@endif 
</tr>



<tr>
<td>TOS<input type="checkbox" name="tos" id="" /></td>
</tr>

<tr>

@if($errors->has('tos'))
@foreach($errors->get('tos') as $error) 
<td>{{$error}}</td>
@endforeach
@endif

</tr>

<tr>
<td><input type="submit" name="submit" vslue="Save" /></td>

</tr>

</table>
</form>

@endsection