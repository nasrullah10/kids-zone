@extends("admin.adminlayout")
@section("title")
Admin | Account Setting
@endsection
@section("content")
<br>
<h1>Your Account</h1>


@if (session('mesg'))
<div class="alert alert-primary" role="alert">
    <strong>{{session('mesg')}}</strong>
</div>
@endif


<table class="table table-responsive">
  <thead class="text-center">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Age</th>
      <th scope="col">Password</th>
      {{-- <th scope="col">Image</th> --}}
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>

  <tbody class="text-center">

  @foreach($fetch as $cf)
   <tr>
   <td>{{ $cf->id }}</td>
    <td>{{ $cf->firstname }}</td>
    <td>{{ $cf->lastname }}</td>
    <td>{{ $cf->email }}</td>
    <td>{{ $cf->age }}</td>
    <td>{{ $cf->password }}</td>
    {{-- <td>  <img src="/userimages/{{ $cf->image }}" width="100px"></td> --}}

    <td><a href="/change/{{$cf->id}}" class="btn btn-outline-primary">Edit</a></td>
   
   </tr>
   @endforeach

  </tbody>
</table>



@endsection
