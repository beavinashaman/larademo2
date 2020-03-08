@extends('layouts.layout1')
@section('title','List of Posts') 
@section('navigation')
            <ul>
            <li>Home</li>
            <li>About</li>
            <li>Section</li>
            </ul>
@endsection

@section('content')
@component('components.message',['title'=>'<span>Component Title</span>'])
This is a slot message
@endcomponent

<ul>
@foreach($data as $row)
<li>
    
    {{$row['name']}} <br />
    {{$row['company']}}

</li>
@endforeach

    </ul>
@endsection