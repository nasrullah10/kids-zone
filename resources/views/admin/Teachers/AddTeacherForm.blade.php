@extends("admin.adminlayout")
@section("title")
Admin | Category Details
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
<h1>Create Quiz Question</h1>
<br>
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<form method="POST"  action="{{ route('teacher.save') }}" id="main_form" enctype="multipart/form-data">
                        @csrf
                        <div class="text-danger"></div>
                        <div class="form-group">
                        <div class="row">
                        <div class="col-md-12">
                            <input type="file" name="insertimage">
                                <img width="180" height="180px"  class="rounded-circle"  src="Mytemplate/assets/images/user.png" alt="Add Your Profile Picture" />
                                <br>
                        </div>
                    </div>
                        </div>
                        <div class="form-group">
                            <label  class="control-label">First Name:</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" value="{{ old('firstname') }}"/>
                            <span class="text-danger error-text firstname_error"></span>
                          
                        </div>
                        <div class="form-group">
                            <label class="control-label">Last Name:</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" value="{{ old('lastname') }}"/>
                            <span class="text-danger error-text lastname_error"></span>
                           
                        </div>
                        <div class="form-group">
                            <label class="control-label">Age:</label>
                            <input type="number" class="form-control" name="age" id="age" value="{{ old('age') }}"/>
                            <span class="text-danger error-text age_error"></span>
                           
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"/>
                            <span class="text-danger error-text email_error"></span>
                          
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password:</label>
                            <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}"/>
                            <span class="text-danger error-text password_error"></span>
                           
                        </div>
                        <div class="form-group">
        <label class="control-label">Course:</label>
        <select name="course_id" class="form-control">
            <option value="">Select Course</option>
            @forelse($courses as $course)
            <option value="{{ $course->id }}">{{ $course->name }}</option>
            @empty
            <option disabled>No Course Found!</option>

            @endforelse

        </select>
    </div>
    
                        <div class="form-group" style="text-align:center">
                            <input type="submit" value="Register" class="btn btn-danger" />
                        </div>
                     
                      
                    </form>

                    <div class="form-group" style="text-align:center">
                            <a href="{{route('teacher.viewAllTeachers')}}">View All Teachers</a>
                        </div>
@endsection