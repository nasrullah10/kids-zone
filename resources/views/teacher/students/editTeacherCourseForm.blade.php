@extends("teacher.teacherlayout")
@section("title")
Teacher | Edit Course
@endsection
@section("content")

<style>
    .question-container {
        margin-bottom: 20px;
    }

    .option-container {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .option-container label {
        flex: 0 0 100px;
        margin-right: 10px;
        font-weight: bold;
    }
</style>
<br>
<br>
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<h2>Edit Course</h2>
@if ($errors->any())

<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST"  action="{{ route('teacher.courses.updateTeacherCourse', $course->id) }}" id="main_form" enctype="multipart/form-data">
    @csrf
   
    <div class="form-group">
    <label  class="control-label">Course Name:</label>
    <input  class="form-control" type="text" name="name" id="name" required value="{{ $course->name }}"/>
    <span class="text-danger error-text firstname_error"></span>
</div>

<div class="form-group">
    <label class="control-label">Description:</label>
    <input type="text" class="form-control" name="description" id="description" value="{{ $course->description }}"/>
    <span class="text-danger error-text lastname_error"></span>
</div>
<div class="form-group">
    <label class="control-label">Course Price:</label>
    <input type="text" class="form-control" name="course_price" id="course_price" value="{{ $course->course_price }}"/>
    <span class="text-danger error-text lastname_error"></span>
</div>
<div class="form-group">
    <label class="control-label">Course Package Type:</label>

    <input type="radio" id="free" name="package_type" value="free" {{ $course->package_type === 'free' ? 'checked' : '' }}>
    <label for="free">Free</label>

    <input type="radio" id="paid" name="package_type" value="paid" {{ $course->package_type === 'paid' ? 'checked' : '' }}>
    <label for="paid">Paid</label>

    <span class="text-danger error-text package_type_error"></span>
</div>

<div class="form-group">
    <label class="control-label">Start Date:</label>
    <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $course->start_date }}"/>
    <span class="text-danger error-text lastname_error"></span>
</div>

<div class="form-group">
    <label class="control-label">End Date:</label>
    <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $course->end_date }}"/>
    <span class="text-danger error-text lastname_error"></span>
</div>

<div class="form-group">
    <label class="control-label">Image:</label>
    <input type="file" class="form-control" name="image" id="image" />
    <span class="text-danger error-text lastname_error"></span>
</div>
                   
<div class="form-group" style="text-align:center">
    <input type="submit" value="Update Course" class="btn btn-danger" />
</div>
</form>

@endsection