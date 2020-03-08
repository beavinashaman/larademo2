<div class="title m-b-md">
<h1> Welocome to Laravel 6.0</h1>

<table class="table table-hover">
<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Address</th>

</tr>
</thead>

<tbody>
@foreach($users as $user)

<tr>
<td>{{$user->name}}</td>
<td>{{$user->email}}</td>
<td>{{$user->profile->address}}</td>


</tr>

@endforeach


</tbody>


</table>
         
</div>