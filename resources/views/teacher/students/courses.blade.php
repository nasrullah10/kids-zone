@extends("teacher.teacherlayout")
@section("title")
Teacher | Fetch-all-student-list
@endsection
@section("content")
<br>
<h1>Course List</h1><a href="/teacher-create-course" class="btn btn-outline-info">Create Course</a>
<br><br>

@if (session('error'))
<div class="alert alert-primary" role="alert">
    <strong>{{session('error')}}</strong>
</div>
@endif
@if (session('success'))
<div class="alert alert-primary" role="alert">
    <strong>{{session('success')}}</strong>
</div>
@endif

<table class="table table-responsive">
  <thead class="text-center">
    <tr>
    <th>Course Name</th>
            <th>Description</th>
            <th>Image</th>
            
            <th>Course Packge Type</th>
            <th>Action</th>
    </tr>
  </thead>

  <tbody class="text-center">

  @foreach($courses as $course)
   <tr>
   <td>{{ $course->name }}</td>
            <td>{{ $course->description }}</td>
            <td>
                    @if ($course->image)
                    <img src="{{ asset($course->image) }}" width="200px" height="100px" alt="">
                    @else
                    No Image
                    @endif
                </td>
                <td>
                @if($course->package_type === 'free')
                    Free
                @elseif($course->package_type === 'paid')
                    Paid
                @else
                No Package    
                @endif
                </td>
            <td>
                <a href="{{ route('teacher.courses.editTeacherCourseForm', $course->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('teacher.courses.destroyTeacherCourse', $course->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this course?');" >Delete</button>
                </form>
            </td>
   </tr>
   @endforeach

  </tbody>
</table>

{!! $courses->links() !!}

@endsection
