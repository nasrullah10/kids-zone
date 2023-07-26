@extends("admin.adminlayout")
@section("title")
Admin | Create Course
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
<h2>Create Course</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST"  action="{{ route('admin.courses.storeCourse') }}" id="main_form" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label  class="control-label">Course Name:</label>
                            <input  class="form-control" type="text" name="name" id="name" required value="{{ old('name') }}"/>
                            <span class="text-danger error-text firstname_error"></span>
                          
                        </div>
                        <div class="form-group">
                            <label class="control-label">Description:</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}"/>
                            <span class="text-danger error-text lastname_error"></span>
                           
                        </div>
                        <div class="form-group">
                            <label class="control-label">Course Price:</label>
                            <input type="number" class="form-control" name="course_price" id="course_price" value="{{ old('course_price') }}"/>
                            <span class="text-danger error-text lastname_error"></span>
                           
                        </div>
                        <div class="form-group">
                            <label class="control-label">Course Package Type:</label>
                            
                                <input type="radio" id="free" name="package_type" value="free" {{ old('package_type') === 'free' ? 'checked' : '' }}>
                                <label for="free">Free</label>
                           
                            
                                <input type="radio" id="paid" name="package_type" value="paid" {{ old('package_type') === 'paid' ? 'checked' : '' }}>
                                <label for="paid">Paid</label>
    
                            <span class="text-danger error-text package_type_error"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Start Date:</label>
                            <input type="date" class="form-control" name="start_date" id="start_date" value="{{ old('start_date') }}"/>
                            <span class="text-danger error-text lastname_error"></span>
                           
                        </div>

                        <div class="form-group">
                            <label class="control-label">End Date:</label>
                            <input type="date" class="form-control" name="end_date" id="end_date" value="{{ old('end_date') }}"/>
                            <span class="text-danger error-text lastname_error"></span>
                           
                        </div>
                        <div class="form-group">
                            <label class="control-label">Image:</label>
                            <input type="file" class="form-control" name="image" id="image" />
                            <span class="text-danger error-text lastname_error"></span>
                           
                        </div>
                       
                        
                       
                        
                        <div class="form-group" style="text-align:center">
                            <input type="submit" value="Add Course" class="btn btn-danger" />
                        </div>
                     
                      
                    </form>

                    <div class="form-group" style="text-align:center">
                            <a href="{{route('admin.courses.viewCourses')}}">View All Course</a>
                        </div>
@endsection