@extends("admin.adminlayout")
@section("title")
Admin | Courses
@endsection
@section("content")

<h2>Course List</h2>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<a href="{{ route('admin.courses.createCourse') }}" class="btn btn-primary">Add Course</a>

<table class="table">
    <thead>
        <tr>
            <th>Course Name</th>
            <th>Description</th>
            <th>Image</th>
            
            <th>Course Packge Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($courses as $course)
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
                <a href="{{ route('admin.courses.editCourse', $course) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('admin.courses.destroyCourse', $course) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this course?');" @if($course->users->isNotEmpty()) disabled @endif>Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No Course Found!</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection
