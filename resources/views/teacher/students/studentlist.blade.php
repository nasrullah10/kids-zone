@extends("teacher.teacherlayout")
@section("title")
Teacher | Fetch-all-student-list
@endsection
@section("content")
<br>
<h1>Students Details</h1>
<br><br>

@if (session('mesg'))
<div class="alert alert-primary" role="alert">
    <strong>{{session('mesg')}}</strong>
</div>
@endif


<table class="table table-responsive">
  <thead class="text-center">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Student Full Name</th>
      <th scope="col">Student Email</th>
      <th scope="col">Student Age</th>
      <th scope="col">Student Image</th>
    </tr>
  </thead>

  <tbody class="text-center">

  @foreach($students as $student)
   <tr>
   <td>{{ $student->id }}</td>
    <td>{{ $student->firstname }} {{ $student->lastname }}</td>
    <td>{{ $student->email }} </td>
    <td>{{ $student->age }} </td>
    <td>
        @if ($student->image)
        <img src="{{ asset($student->image) }}" width="200px" height="100px" alt="">
        @else
        No Image
        @endif  
    </td>

   </tr>
   @endforeach

  </tbody>
</table>


@endsection
