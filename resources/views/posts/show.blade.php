@extends('layouts.layout1')
@section('title','Single Record via show method')
@section('content')
<ul>
<li>
     
    {{$data['name']}} <br />
    {{$data['age']}}
    
    </li>

</ul>
@endsection