<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\cstorytbl;
use DB;
use App\Models\TeacherCourse;

use App\Models\Course;

class TeacherController extends Controller
{
    public function TeacherDashboard(Request $request)
    {
        $checksession = session('tname');
        
        if($checksession)
        {
            return view('teacher.teacherlayout');
        }

        else
        {
            return redirect("/login");
        }

    }

    public function alogout()
    {
        session()->forget('tname');
        session()->forget('tid');
        return redirect("login");
    }

    public function StudentList()
    {
        $teacherId = session('tid');

        // Get the list of students who applied for the course taught by the teacher
        $students = DB::table('users')
            ->join('course_students', 'users.id', '=', 'course_students.student_id')
            ->join('courses', 'courses.id', '=', 'course_students.course_id')
            ->join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_id')
            ->where('teacher_courses.teacher_id', $teacherId)
            ->where('users.role', 2) // Assuming student role ID is 2
            ->select('users.*')
            ->get();

            // dd($students);
        return view('teacher.students.studentlist',compact('students'));
    }

    public function TeacherCreateCourseForm()
    {
        return view('teacher.students.createCourse');
    }
    public function destroyTeacherCourse($id)
    {
    

             // Check if there are any associated records in the teachercourses table for this course
        $associatedTeachers = DB::table('teacher_courses')
        ->where('course_id', $id)
        ->count();

    // If there are associated records, prevent the course from being deleted
    if ($associatedTeachers > 0) {
        return redirect()->back()->with('error', 'Course has associated teachers. It cannot be deleted.');
    }

    // If there are no associated records, proceed with deleting the course
    DB::table('courses')->where('id', $id)->delete();
    return redirect()->route('admin.courses.viewCourses')
    ->with('success', 'Course deleted successfully.');
    }
    public function TeacherCreateCoursePost(Request $request)
    {
        $teacher_id = session('tid');
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $image1 = $request->file('image');
        $course = new Course();

        $course->name = $request->name;
        $course->description = $request->description;
        $course->package_type = $request->package_type;
        $course->course_price = $request->course_price;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        
       if($image1)
        {
        $destinationPath = 'courseimages/';
        $ext =  $image1->getClientOriginalName();
        $courseimage = $destinationPath."/".$ext;
        $image1->move($destinationPath,$ext);
        $course->image = $courseimage;
        }

        $course->save();
        //Course::create($data);
        $teacherCoruse = new TeacherCourse();
        $teacherCoruse->course_id = $course->id;
        $teacherCoruse->teacher_id = $teacher_id;
        $teacherCoruse->save();
        return redirect()->route('CoursesList')
            ->with('success', 'Course created successfully.');
    }
    public function CoursesList()
    {
        // Get the current teacher's ID (you can replace this with your own method to get the teacher's ID)
        $teacherId = session('tid');

        // Get the courses associated with the current teacher
        $courses = DB::table('courses')
            ->join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_id')
            ->where('teacher_courses.teacher_id', $teacherId)
            ->select('courses.*')
            ->paginate();

        return view('teacher.students.courses', compact('courses'));
    }

    public function editTeacherCourseForm($id)
    {
        $course = Course::findOrFail($id); // Assuming $id is the ID of the course being edited
        
        return view('teacher.students.editTeacherCourseForm', compact('course'));
    }
    public function updateTeacherCourse(Request $request, $id)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        
        $course = Course::findOrFail($id); // Assuming $id is the ID of the course being edited
        
        $course->name = $request->name;
        $course->description = $request->description;
        $course->package_type = $request->package_type;
        $course->course_price = $request->course_price;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        
        $image1 = $request->file('image');
        if ($image1) {
            $destinationPath = 'courseimages/';
            $ext = $image1->getClientOriginalName();
            $courseimage = $destinationPath . "/" . $ext;
            $image1->move($destinationPath, $ext);
            $course->image = $courseimage;
        }
        
        $course->save();
        
        return redirect()->route('CoursesList')
            ->with('success', 'Course updated successfully.');
        
    }
}

