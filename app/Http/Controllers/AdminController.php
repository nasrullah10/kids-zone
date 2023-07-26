<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mediacentertbl;
use App\Models\articletbl;
use App\Models\allcategorytbl;
use App\Models\cstorytbl;
use App\Models\announcementtbl;
use App\Models\learningtiptbl;
use App\Models\certificatetbl;
use App\Models\teamtbl;
use App\Models\winnertbl;
use App\Models\topictbl;
use App\Models\DailyQuizQuestion;
use App\Models\DailyQuizOption;
use App\Models\AttemptDailyQuizQuestion;
use Validator;
use App\Models\User;
use App\Models\TeacherCourse;
use App\Models\categorytbl;
use App\Models\admintesttbl;
use App\Models\questiontbl;
use App\Models\answertbl;
use App\Models\storyleveltbl;
use App\Models\round1storytbl;
use App\Models\round2storytbl;
use App\Models\round3storytbl;
use App\Models\gradetbl;
use App\Models\Collaboration;
use DB;
use App\Models\Course;
class AdminController extends Controller
{
    public function viewCourses()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }
    public function createCourse()
    {
        return view('admin.courses.create');
    }
    public function storeCourse(Request $request)
    {
        
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

        return redirect()->route('admin.courses.viewCourses')
            ->with('success', 'Course created successfully.');
    }
    public function editCourse(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }
    public function updateCourse(Request $request, $id)
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
        
        return redirect()->route('admin.courses.viewCourses')
            ->with('success', 'Course updated successfully.');
        
    }
    public function destroyCourse(Course $course)
    {
        $users = $course->users;

    if ($users->isNotEmpty()) {
        return redirect()->route('admin.courses.viewCourses')
            ->with('error', 'Course cannot be deleted because it has been assigned to one or more users.');
    }

        $course->delete();

        return redirect()->route('admin.courses.viewCourses')
            ->with('success', 'Course deleted successfully.');
    }
    public function addTeacher(){
        $courses = Course::where('status',0)->get();
        return view("admin.Teachers.AddTeacherForm",compact('courses'));
    }
    public function viewAllTeachers(){
        $teachers = User::where('role',3)->get();
        return view("admin.Teachers.viewAllTeachers",compact('teachers'));
    }
    public function teacherPost(Request $request){
        $validator = Validator::make($request->all(),[
            'firstname'=>"required|min:3|max:12|regex:/^[a-z ,.'-]+$/i",
            'lastname'=>"required|min:3|max:12|regex:/^[a-z ,.'-]+$/i",
            'email'=>'required|email|unique:users|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
            'password'=>'required|min:8|max:15',
            'age'=>"required|min:1",
            
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
            $image1 = $request->file('insertimage');
          $user = new user();

          $user->firstname = $request->firstname;
          $user->lastname = $request->lastname;
          $user->password = $request->password;
          $user->age = $request->age;
          $user->email = $request->email;
          $user->role = 3;
         if($image1)
          {
          $destinationPath = 'userimages/';
          $ext =  $image1->getClientOriginalName();
          $userimage = $destinationPath."/".$ext;
          $image1->move($destinationPath,$ext);
          $user->image = $userimage;
          }

          $user->save();

          $teacher_id = $user->id;
            $teacherCoruse = new TeacherCourse();
            $teacherCoruse->course_id = $request->course_id;
            $teacherCoruse->teacher_id = $teacher_id;
            $teacherCoruse->save();
            if( $user ){
                return redirect()->route('teacher.viewAllTeachers')
            ->with('success', 'Course created successfully.');
                
            }
        }
    }
    public function DailyQuizForm(){
        // return "sf";
        return view("admin.DailyQuiz.DailyQuizForm");
    }
    public function editDailyQuizForm($id)
    {
       // $editDailyQuiz = DailyQuizQuestion::with('DailyQuizOptions')->get();
       // dd($editDailyQuiz);


        $question = DailyQuizQuestion::where('id', '=', $id)->with(['DailyQuizOptions' => function($query){
            $query->inRandomOrder();
        }])->inRandomOrder()->first();
       // dd($questions);
        return view("admin.DailyQuiz.editDailyQuizForm",compact('question'));
    }
    public function dailyQuizUpdate(Request $request, $id)
{
    DB::beginTransaction();

    try {

        // dd("sss",$request->all());
    $question = DailyQuizQuestion::findOrFail($id);
    $question->question_title = $request->input('question_title');
    $question->question_marks = $request->input('marks');
    $question->status = "new-quiz";
    $question->save();

    $options = $request->input('option');
    $correct_option = $request->input('correct_option');
    $data = [
        'daily_quiz_option'=>$options,
        'correct_option'=>$correct_option
    ];
    // dd($data);
    $optionModel = DailyQuizOption::where('daily_quiz_question_id', $id)->update($data);
      
      } catch (\Exception $e) {
      
        DB::rollback();
          return $e->getMessage();
      }
    
    //$optionModel->daily_quiz_option = $options;
   // $optionModel->save();
    // Update options
    // foreach ($options[$id] as $optionIndex => $optionValue) {
    //     $optionModel = DailyQuizOption::where('daily_quiz_question_id', $id)
    //         ->where('id', $optionIndex+1)
    //         ->first();

    //     if ($optionModel) {
    //         $optionModel->daily_quiz_option = $optionValue;
    //         $optionModel->save();
    //     }
    // }

    // Redirect or return a response as per your requirements
    DB::commit();
    return redirect(route('viewDailyQuiz'))->with('mesg', 'Quiz updated successfully');
}

    
    public function viewDailyQuiz()
    {
        $getAllDailyQuiz = DailyQuizQuestion::with('dailyQuizOptions')->where('status','new-quiz')->get();
        // dd($getAllDailyQuiz);
        return view("admin.DailyQuiz.viewDailyQuiz",compact('getAllDailyQuiz'));
    }
    public function deleteDailyQuiz($id)
    {
        $question = DailyQuizQuestion::where('id',$id)->delete();
        $optionModel = DailyQuizOption::where('daily_quiz_question_id', $id)->delete();
    return redirect(route('viewDailyQuiz'))->with('mesg', 'Daily Quiz Deleted successfully');

       // dd($questions);
       // return view("admin.DailyQuiz.editDailyQuizForm",compact('question'));
    }

    public function showQuizResults()
{
  
    $startDate = now()->subMonth(); // Start date for the time range
    $endDate = now(); // End date for the time range
    
    $userIds = AttemptDailyQuizQuestion::whereBetween('created_at', [$startDate, $endDate])
        ->distinct('user_id')
        ->pluck('user_id'); // Retrieve distinct user IDs of attempted questions
    
    $results = [];
    
    foreach ($userIds as $userId) {
        $user = User::find($userId);
    
        $attempts = AttemptDailyQuizQuestion::where('user_id', $userId)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();
    
        $totalAttempts = $attempts->count();
        $correctAttempts = 0;
        $marks = 0;
    
        foreach ($attempts as $attempt) {
            $isCorrect = $this->isAnswerCorrect($attempt->daily_quiz_question_id, $attempt->question_answer);
            if ($isCorrect) {
                $correctAttempts++;
                $marks += 2; // Add 2 marks for each correct attempt
            }
        }
    
        $wrongAttempts = $totalAttempts - $correctAttempts;
    
        $results[] = [
            'user' => $user->firstname." ". $user->lastname,
            'totalAttempts' => $totalAttempts,
            'correctAttempts' => $correctAttempts,
            'wrongAttempts' => $wrongAttempts,
            'marks' => $marks,
        ];
    }
    
    // return view('admin.quizResults', compact('results'));
    


    return view('admin.DailyQuiz.QuizResults', compact('results'));
}





private function isAnswerCorrect($questionId, $answer)
{
    $correctOption = DailyQuizOption::where('daily_quiz_question_id', $questionId)
        ->where('correct_option', $answer)
        ->exists();

    return $correctOption;
}

public function dailyQuizWinnerList(Request $request){
    $startDate = now()->subMonth(); // Start date for the time range
$endDate = now(); // End date for the time range

$userIds = AttemptDailyQuizQuestion::whereBetween('created_at', [$startDate, $endDate])
    ->distinct('user_id')
    ->pluck('user_id'); // Retrieve distinct user IDs of attempted questions

$results = [];

foreach ($userIds as $userId) {
    $user = User::find($userId);

    $attempts = AttemptDailyQuizQuestion::where('user_id', $userId)
        ->whereBetween('created_at', [$startDate, $endDate])
        ->get();

    $totalAttempts = $attempts->count();
    $correctAttempts = 0;
    $marks = 0;

    foreach ($attempts as $attempt) {
        $isCorrect = $this->isAnswerCorrect($attempt->daily_quiz_question_id, $attempt->question_answer);
        if ($isCorrect) {
            $correctAttempts++;
            $marks += 2; // Add 2 marks for each correct attempt
        }
    }

    $wrongAttempts = $totalAttempts - $correctAttempts;

    $results[] = [
        'user' => $user->firstname." ".$user->lastname, // Get the name of the user
        'totalAttempts' => $totalAttempts,
        'correctAttempts' => $correctAttempts,
        'wrongAttempts' => $wrongAttempts,
        'marks' => $marks,
    ];
}

// Sort the results by the number of correct attempts in descending order
usort($results, function ($a, $b) {
    return $b['correctAttempts'] - $a['correctAttempts'];
});

$topUsers = array_slice($results, 0, 3); // Get the top 3 users

return view('admin.DailyQuiz.WinnerDailyQuizResults', compact('results', 'topUsers'));

}
    public function dailyQuizPost(Request $request)
    {
        DB::beginTransaction();
        try {

            $questionTitles = $request->input('question_title');
            $options = $request->input('option');
            $marks = $request->input('marks');
            $correct_option = $request->input('correct_option');
    
            // Create the quiz question
            $quizQuestion = new DailyQuizQuestion();
            $quizQuestion->question_title = $questionTitles;
            $quizQuestion->question_marks = $marks;
            $quizQuestion->status="new-quiz";
            $quizQuestion->save();
    
            $quizOption = new DailyQuizOption();
            $quizOption->daily_quiz_question_id = $quizQuestion->id;
            $quizOption->daily_quiz_option = $options;
            $quizOption->correct_option = $correct_option;
            $quizOption->save();
          
          } catch (\Exception $e) {
            DB::rollback();
              return $e->getMessage();
          }
        
            // Insert the options for the question
            // foreach ($options as $option) {
            //     $quizOption = new DailyQuizOption();
            //     $quizOption->daily_quiz_question_id = $quizQuestion->id;
            //     $quizOption->daily_quiz_option = $option;
            //     $quizOption->save();
            // }
            DB::commit();
            return redirect()->back()->with('success', 'Successfully added!');
        // Redirect or return a response as per your requirements
    }
    
    //
    public function adminlayout()
    {
        $checksession = session('name');
        if($checksession)
        {
            return view('admin.adminlayout');
        }

        else
        {
            return redirect("/login");
        }
    }


    public function alogout()
    {
        session()->forget('name');
        session()->forget('aid');
        return redirect("login");
    }

    public function users()
    {
        $user = User::where('role', '!=', 1)->get();
        return view("admin.users", compact('user'));
    }
  
  
    function status_update($id)
    {
        $p = DB::table('users')->select('role')->where('id', '=', $id)->first();
        if($p->role == '2')
        {
            $role = '0';
        }
        else
        {
            $role = '2';
        }
        $values = array('role' =>  $role);
        DB::table('users')->where('id', $id)->update($values);
        return redirect()->back()->with('mesg',"Status Has Been Updated...");
    }
  
    public function delete_user($id)
    {
        $delete = User::find($id);
        $delete->delete();
        return redirect()->back()->with('del',"User Has Been Deleted...");
    }
  
  
    //++++++++++++++++++++++++++All category++++++++++++++++++++++++++++

    public function allcat_get()
    {
        $checksession = session('name');
        if($checksession)
        {
            return view('admin.allcategory.allcat');
        }
        else
        {
            return redirect("/login");
        }
    }

    public function allcat_post(Request $req)
    {
        $checksession = session('name');
        if($checksession)
        {
            $category = new allcategorytbl();
            $category->category_name = $req->insertcat;
            $category->save();
            return redirect('/allcatfetch')->with("mesg","Category Created...");
        }
        else
        {
            return redirect("/login");
        }
    }

    public function allcat_fetch()
    {
        $checksession = session('name');
        if($checksession)
        {
            $cat_fetch = allcategorytbl::paginate(6);
            return view('admin.allcategory.allcatfetch', compact('cat_fetch'));
        }
        else
        {
            return redirect("/login");
        }
    }

    public function edit_allcat($id)
    {
        $checksession = session('name');
        if($checksession)
        {
        $update_cat = allcategorytbl::find($id);
        return view('admin.allcategory.allcatedit', compact('update_cat'));
        }
        else
        {
            return redirect("/login");
        }
    }

    public function update_allcat(Request $req, $id)
    {
        $checksession = session('name');
        if($checksession)
        {
            $category = allcategorytbl::find($id);
            $category->category_name = $req->updatecat;
            $category->update();
            return redirect('/allcatfetch')->with('mesg', "Category Has Been Updated...");
        }
        else
        {
            return redirect("/login");
        }
    }

     public function allcat_delete($id)
     {
        $checksession = session('name');
        if($checksession)
        {
            $delete_category = allcategorytbl::find($id);
            $delete_category->delete();
            return redirect('allcatfetch')->with('mesg', "Category Has Been Deleted...");
        }
        else
        {
            return redirect("/login");
        }

     }

     //+++++++++++++++media+++++++++++++++++++++++++++++++++

    public function media_get()
    {
        $checksession = session('name');
        if($checksession)
        {
            $fetchmed = allcategorytbl::all();
            return view('admin.media.media', compact('fetchmed'));
        }
        else
        {
            return redirect("/login");
        }
    }

    public function media_post(Request $req)
    {
        $checksession = session('name');
        if($checksession)
        {
            $media = new mediacentertbl();
            $media->type = $req->insertmediatype;
            $media->headline = $req->insertmediaheadline;
            $media->media_date = $req->insertmediadate;
            $media->short_Des = $req->insertmediashortdes ?? "null";
            $media->long_des = $req->insertmedialongdes ?? "null";
            $media->video_url = $req->insertmediaurl ?? "null";
            if($req->file('insertmediaimage'))
            {
            $image=$req->file('insertmediaimage');
            $ext = rand().".".$image->getClientOriginalName();
            $image->move('mediaimages/',$ext);
            $media->image_video=$ext;
            }
            else
            {
                $media->image_video = "null";
            }
            
            $media->save();
            return redirect('fetchmedia')->with("created","Media Data Created!!!");;
        }
        else
        {
            return redirect("/login");
        }
    }

    public function fetch_media()
    {
        $checksession = session('name');
        if($checksession)
        {
            $fetchmedia = mediacentertbl::paginate(6);
            return view('admin.media.fetch_media', compact('fetchmedia'));
        }
        else
        {
            return redirect("/login");
        }
    }

    public function edit_media($id)
    {
        $checksession = session('name');
        if($checksession)
        {
            $fetchmed = allcategorytbl::all();
            $update = mediacentertbl::find($id);
            return view('admin.media.edit', compact('update','fetchmed'));
        }
        else
        {
            return redirect("/login");
        }
    }

    public function update_media(Request $req, $id)
    {
        $checksession = session('name');
        if($checksession)
        {

            $media = mediacentertbl::find($id);
            $media->type = $req->updatemediatype;
            $media->headline = $req->updatemediaheadline;
            $media->media_date = $req->updatemediadate;
            $media->short_Des = $req->updatemediashortdes ?? "null";
            $media->long_des = $req->updatemedialongdes ?? "null";
            $media->video_url = $req->updatemediavideourl ?? "null";
            if($req->file('updatemediaimage'))
            {
            $image=$req->file('updatemediaimage');
            $ext = rand().".".$image->getClientOriginalName();
            $image->move('mediaimages/',$ext);
            $media->image_video=$ext;
                }
                else
                {
                    $media->image_video = "null";
                }
            $media->update();
            return redirect('/fetchmedia')->with("edit","Media Data Updated!!!");;
        }

        else
        {
            return redirect("/login");
        }

    }

    public function delete_media($id)
    {
        $checksession = session('name');
        if($checksession)
        {
            $delete = mediacentertbl::find($id);
            $delete->delete();
            return redirect()->back()->with('mesg', "Record Has Been Deleted...");
        }
        else
        {
            return redirect("/login");
        }
    }

    public function detail_media($id)
    {
        $checksession = session('name');
        if($checksession)
        {
            $fetchmed = allcategorytbl::all();
            $detail = mediacentertbl::where('id',$id)->get();
            return view('admin.media.detail',compact('detail','fetchmed'));
        }
        else
        {
            return redirect("/login");
        }
    }

     //+++++++++++++++++++++++++++++++++++Article Start
     public function article_get()
     {
        $checksession = session('name');
        if($checksession)
        {
            $fetcharticle = allcategorytbl::paginate(6);
            return view('admin.article.article',compact('fetcharticle'));
        }
        else
        {
            return redirect("/login");
        }
    }

     public function article_post(Request $req)
     {
        $checksession = session('name');
        $checkid = session('aid');
        if($checksession)
        {
            $article = new articletbl();
            $article->type = $req->insertarticletype;
            $article->headline = $req->insertarticleheadline;
            $article->art_date = $req->insertarticledate;
            $article->short_Des = $req->insertarticleshortdes ?? "null";
            $article->long_des = $req->insertarticlelongdes ?? "null";
            if($req->file('insertarticleimage'))
            {
            $a_image=$req->file('insertarticleimage');
            $ext = rand().".".$a_image->getClientOriginalName();
            $a_image->move('articleimages/',$ext);
            $article->image=$ext;
            }
            else
            {
            $article->image = "null";
            }
            $article->userid = $checkid;
            $article->video_url = $req->insertarticleurl ?? "null";
            $article->save();
            return redirect('fetcharticle')->with('mesg', "Article Has Been Added...");
        }
        else
        {
            return redirect("/login");
        }
    }

     public function fetch_article()
     {
        $checksession = session('name');
        if($checksession)
        {
            $fetcharticle = articletbl::all();
            return view('admin.article.fetch_article', compact('fetcharticle'));
        }
        else
        {
            return redirect("/login");
        }
    }

    public function edit_article($id)
    {
        $checksession = session('name');
        if($checksession)
        {
            $fetchcat = allcategorytbl::all();
            $update_article = articletbl::find($id);
            return view('admin.article.edit_article', compact('update_article','fetchcat'));
        }
        else
        {
            return redirect("/login");
        }
    }

    public function update_article(Request $req, $id)
    {
        $checksession = session('name');
        if($checksession)
        {
            $article = articletbl::find($id);
            $article->type = $req->updatearticletype;
            $article->headline = $req->updatearticleheadline;
            $article->art_date = $req->updatearticledate;
            $article->short_Des = $req->updatearticleshortdes?? "null";
            $article->long_des = $req->updatearticlelongdes ?? "null";
            if($req->file('updatearticleimage'))
            {
            $image=$req->file('updatearticleimage');
            $ext = rand().".".$image->getClientOriginalName();
            $image->move('articleimages/',$ext);
            $article->image=$ext;
            }
            else
            {
                $article->image = $article->image;
            }
            $article->video_url = $req->updatearticleurl ??  "null";
            $article->update();
            return redirect('/fetcharticle')->with('mesg', "Article Has Been Updated...");
            }
        else
        {
            return redirect("/login");
        }
    }

    public function delete_article($id)
    {
        $checksession = session('name');
        if($checksession)
        {
            $delete_article = articletbl::find($id);
            $delete_article->delete();
            return redirect('fetcharticle')->with('mesg', "Article Has Been Deleted...");
        }
        else
        {
            return redirect("/login");
        }
    }
     //Article End


      //++++++++++++++++++++++++++STORY+++++++++++++++++++++++++++
    public function adminstory()
    {

        $checksession = session('name');
        if($checksession)
        {
            $fetchcat = allcategorytbl::all();
            $fetchstory = cstorytbl::paginate(6);
            return view('admin.story.story', compact('fetchstory','fetchcat'));
        }
        else
        {
            return redirect("/login");
        }
    }

    public function adminstory_get()
    {
        $checksession = session('name');
        if($checksession)
        {
            $fetchcat = allcategorytbl::all();
            return view('admin.story.storycreate',compact('fetchcat'));
        }
        else
        {
            return redirect("/login");
        }
    }

    public function adminstorycreatepost(Request $req)
    {
        $checksession = session('name');
        $checkid = session('aid');
        if($checksession)
        {
            $story = new cstorytbl();
            //$story->userid =$uname;
            $story->type = $req->insertstorytype;
            $story->Title = $req->insertstorytitle;
            $story->typefic = $req->inserttypef;
            $story->short_Des = $req->insertstoryshortdes ?? "null";
            $story->long_des = $req->insertstorylongdes ?? "null";
            if($req->file('insertstoryimage'))
            {
            $image=$req->file('insertstoryimage');
            $ext = rand().".".$image->getClientOriginalName();
            $image->move('storyimages/',$ext);
            $story->image=$ext;
            }
            else
            {
                $story->image = "null";
            }
            $story->userid = $checkid;
            $story->video_url = $req->insertstoryurl ?? "null";
            $story->save();
            return redirect('/adminstory')->with('mesgs', "Record Has Been added...");
        }
        else
        {
            return redirect("/login");
        }
    }

    public function admineditstory($id)
    {
        $checksession = session('name');
        if($checksession)
        {
            $fetchcat = allcategorytbl::all();
            $update = cstorytbl::find($id);
            return view('admin.story.storyedit', compact('update','fetchcat'));
        }
        else
        {
            return redirect("/login");
        }
    }

    public function adminupdatestory(Request $req, $id)
    {
        $checksession = session('name');
        if($checksession)
        {
            $story = cstorytbl::find($id);
            $story->type = $req->updatestorytype;
            $story->Title = $req->updatestorytitle;
            $story->typefic = $req->updatetypef;
            $story->short_Des = $req->updatestoryshortdes ?? "null";
            $story->long_des = $req->updatestorylongdes ?? "null";
            if($req->file('updatestoryimage'))
            {
            $image=$req->file('updatestoryimage');
            $ext = rand().".".$image->getClientOriginalName();
            $image->move('storyimages/',$ext);
            $story->image=$ext;
            }
            else
            {
                $story->image =  $story->image;
            }
            $story->video_url = $req->updatestoryurl ?? "null";
            $story->update();
            return redirect('/adminstory')->with('mesgs', "Record Has Been Updated...");
        }
        else
        {
            return redirect("/login");
        }
    }

    public function admindeletestory($id)
    {
        $checksession = session('name');
        if($checksession)
        {
            $delete = cstorytbl::find($id);
            $delete->delete();
            return redirect()->back()->with('mesg', "Record Has Been Deleted...");
        }
        else
        {
            return redirect("/login");
        }
    }

    public function adminstorydetail($id)
    {
        $checksession = session('name');
        if($checksession)
        {
            $fetchcat = allcategorytbl::all();
            $detail = cstorytbl::where('id',$id)->get();
            return view('admin.story.storydetail',compact('detail','fetchcat'));
        }
        else
        {
            return redirect("/login");
        }
    }

    //++++++++++++++++++++++++++Announcement+++++++++++++++

    public function ann_get()
    {
        $checksession = session('name');
        if($checksession)
        {
            $fetchan = allcategorytbl::all();
            return view('admin.announcement.anncreate',compact('fetchan'));
        }
        else
        {
            return redirect("/login");
        }
    }

    public function ann_post(Request $req)
    {
        $checksession = session('name');
        if($checksession)
        {
            $ann = new announcementtbl();
            $ann->type = $req->insertanntype;
            $ann->headline = $req->insertannheadline;
            $ann->a_date = $req->insertanndate;
            $ann->short_Des = $req->insertannshortdes ?? "null";
            $ann->long_des = $req->insertannlongdes ?? "null";
            if($req->file('insertannimage'))
            {
            $image=$req->file('insertannimage');
            $ext = rand().".".$image->getClientOriginalName();
            $image->move('annimages/',$ext);
            $ann->image=$ext;
            }
            else
            {
                $ann->image = "null";
            }
           
            $ann->video_url = $req->insertannurl ?? "null";
            $ann->save();
            return redirect('/fetchann')->with("created","Annoucement Data Created!!!");
        }
        else
        {
            return redirect("/login");
        }
    }

    public function fetch_ann()
    {
        $checksession = session('name');
        if($checksession)
        {
            $fetchann = announcementtbl::paginate(6);
            return view('admin.announcement.annfetch', compact('fetchann'));
        }
        else
        {
            return redirect("/login");
        }
    }

    public function edit_ann($id)
    {
        $checksession = session('name');
        if($checksession)
        {
            $fetchan = allcategorytbl::all();
            $updateann = announcementtbl::find($id);
            return view('admin.announcement.annedit', compact('updateann','fetchan'));
        }
        else
        {
            return redirect("/login");
        }
    }

    public function update_ann(Request $req, $id)
    {
        $checksession = session('name');
        if($checksession)
        {
            $ann = announcementtbl::find($id);
            $ann->type = $req->updateanntype;
            $ann->headline = $req->updateannheadline;
            $ann->a_date = $req->updateanndate;
            $ann->short_Des = $req->updateannshortdes ?? "null";
            $ann->long_des = $req->updateannlongdes ?? "null";
            if($req->file('updateannimage'))
            {
            $image=$req->file('updateannimage');
            $ext = rand().".".$image->getClientOriginalName();
            $image->move('annimages/',$ext);
            $ann->image=$ext;
            }
            else
            {
                $ann->image =   $ann->image;
            }
           
            $ann->video_url = $req->updateannurl ?? "null";
            $ann->update();
            return redirect('/fetchann')->with("edit","Announcement data has been updated!!!");
        }
        else
        {
            return redirect("/login");
        }
    }

    public function delete_ann($id)
    {
        $checksession = session('name');
        if($checksession)
        {
            $delete = announcementtbl::find($id);
            $delete->delete();
            return redirect()->back()->with('mesg', "Record Has Been Deleted...");
        }

        else
        {
            return redirect("/login");
        }
    }

    public function anndetail($id)
    {
        $checksession = session('name');
        if($checksession)
        {
        $fetchan = allcategorytbl::all();
        $detail = announcementtbl::where('id',$id)->get();
        return view('admin.announcement.anndetail',compact('detail'));
        }
        else
        {
            return redirect("/login");
        }
    }


      //++++++++++++++++++++++Article approval+++++++++++++++++++++

  public function approveart($id)
  {
   $checksession = session('name');
   if($checksession)
   {
   $app = articletbl::find($id);
   $app->status = 1;
   $app->update();
   return redirect()->back();
  }
  else
      {
          return redirect("/login");
      }
   }

    //++++++++++++++++++++++Story approval+++++++++++++++++++++

  public function approvestory($id)
  {
   $checksession = session('name');
   if($checksession)
   {
   $app = cstorytbl::find($id);
   $app->status = 1;
   $app->update();
   return redirect()->back();
  }
  else
      {
          return redirect("/login");
      }
   }



         //++++++++++++++++++++++++++Learning Tips+++++++++++++++++++++++++++
         public function admintip()
         {
     
             $checksession = session('name');
             if($checksession)
             {
                 $fetchcat = allcategorytbl::all();
                 $fetchtip = learningtiptbl::paginate(6);
                 return view('admin.learningtip.tip', compact('fetchtip','fetchcat'));
             }
             else
             {
                 return redirect("/login");
             }
         }
     
         public function admintip_get()
         {
             $checksession = session('name');
             if($checksession)
             {
                 $fetchcat = allcategorytbl::all();
                 return view('admin.learningtip.tipcreate',compact('fetchcat'));
             }
             else
             {
                 return redirect("/login");
             }
         }
     
         public function admintipcreatepost(Request $req)
         {
             $checksession = session('name');
             $checkid = session('aid');
             if($checksession)
             {
                 $tip = new learningtiptbl();
                 //$story->userid =$uname;
                 $tip->type = $req->inserttiptype;
                 $tip->Title = $req->inserttiptitle;
                 $tip->short_Des = $req->inserttipshortdes ?? "null";
                 $tip->long_des = $req->inserttiplongdes ?? "null";
                 if($req->file('inserttipimage'))
                 {
                 $image=$req->file('inserttipimage');
                 $ext = rand().".".$image->getClientOriginalName();
                 $image->move('tipimages/',$ext);
                 $tip->image=$ext;
                 }
                 else
                 {
                     $tip->image = "null";
                 }
                 $tip->userid = $checkid;
                 $tip->video_url = $req->inserttipurl ?? "null";
                 $tip->save();
                 return redirect('/admintip')->with('mesgs', "Record Has Been added...");
             }
             else
             {
                 return redirect("/login");
             }
         }
     
         public function adminedittip($id)
         {
             $checksession = session('name');
             if($checksession)
             {
                 $fetchcat = allcategorytbl::all();
                 $update = learningtiptbl::find($id);
                 return view('admin.learningtip.tipedit', compact('update','fetchcat'));
             }
             else
             {
                 return redirect("/login");
             }
         }
     
         public function adminupdatetip(Request $req, $id)
         {
             $checksession = session('name');
             if($checksession)
             {
                 $tip = learningtiptbl::find($id);
                 $tip->type = $req->updatetiptype;
                 $tip->Title = $req->updatetiptitle;
                 $tip->short_Des = $req->updatetipshortdes ?? "null";
                 $tip->long_des = $req->updatetiplongdes ?? "null";
                 if($req->file('updatetipimage'))
                 {
                 $image=$req->file('updatetipimage');
                 $ext = rand().".".$image->getClientOriginalName();
                 $image->move('tipimages/',$ext);
                 $tip->image=$ext;
                 }
                 else
                 {
                     $tip->image =  $tip->image;
                 }
                 $tip->video_url = $req->updatetipurl ?? "null";
                 $tip->update();
                 return redirect('/admintip')->with('mesgs', "Record Has Been Updated...");
             }
             else
             {
                 return redirect("/login");
             }
         }
     
         public function admindeletetip($id)
         {
             $checksession = session('name');
             if($checksession)
             {
                 $delete = learningtiptbl::find($id);
                 $delete->delete();
                 return redirect()->back()->with('mesg', "Record Has Been Deleted...");
             }
             else
             {
                 return redirect("/login");
             }
         }
     
         public function admintipdetail($id)
         {
             $checksession = session('name');
             if($checksession)
             {
                 $fetchcat = allcategorytbl::all();
                 $detail = learningtiptbl::where('id',$id)->get();
                 return view('admin.learningtip.tipdetail',compact('detail','fetchcat'));
             }
             else
             {
                 return redirect("/login");
             }
         }
      //++++++++++++++++++++++Learning tips approval+++++++++++++++++++++

  public function approvetip($id)
  {
   $checksession = session('name');
   if($checksession)
   {
   $app = learningtiptbl::find($id);
   $app->status = 1;
   $app->update();
   return redirect()->back();
  }
  else
      {
          return redirect("/login");
      }
   }

           //+++++++++++++++++team++++++++
           public function team_get()
           {
              $checksession = session('name');
              if($checksession)
              {
              return View("admin.team.team");
          }
          else
              {
                  return redirect("/login");
              }
      
           }
      
           public function team_post(Request $req)
           {
              $checksession = session('name');
              if($checksession)
              {
             $team = new teamtbl();
             $team->title = $req->insertteamtitle;
             $team->short_Des = $req->insertteamshortdes ?? "null";
             $team->long_des = $req->insertteamlongdes ?? "null";
             $image=$req->file('insertteamimage');
             $ext = rand().".".$image->getClientOriginalName();
             $image->move('teamimages/',$ext);
             $team->image=$ext;
             $team->save();
             return redirect('fetchteam')->with("created","team Data Created...");
      
          }
          else
              {
                  return redirect("/login");
              }
      
           }
      
           public function fetchteam()
           {
              $checksession = session('name');
              if($checksession)
              {
             $fetchteam = teamtbl::paginate(6);
             return view('admin.team.fetch_team', compact('fetchteam'));
          }
          else
              {
                  return redirect("/login");
              }
      
           }
      
      
           public function edit_team($id)
           {
              $checksession = session('name');
              if($checksession)
              {
               $update_team = teamtbl::find($id);
               return view('admin.team.edit', compact('update_team'));
              }
              else
                  {
                      return redirect("/login");
                  }
      
           }
      
           public function update_team(Request $req, $id)
           {
              $checksession = session('name');
              if($checksession)
              {
               $team = teamtbl::find($id);
               $team->title = $req->updateteamtitle;
               $team->short_Des = $req->updateteamshortdes ?? "null";
               $team->long_des = $req->updateteamlongdes ?? "null";
               if($req->file('updateteamimage'))
               {
               $image=$req->file('updateteamimage');
               $ext = rand().".".$image->getClientOriginalName();
               $image->move('teamimages/',$ext);
               $team->image=$ext;
               }
               else
               {
               $team->image= $team->image;
               }
               $team->update();
               return redirect('/fetchteam')->with("edit","team Data Updated...");;
              }
              else
                  {
                      return redirect("/login");
                  }
      
           }
      
           public function delete_team($id)
           {
               $checksession = session('name');
              if($checksession)
              {
               $delete = teamtbl::find($id);
               $delete->delete();
               return redirect()->back()->with('mesg', "Record Has Been Deleted...");
              }
              else
                  {
                      return redirect("/login");
                  }
      
           }
      
            public function detail_team($id)
           {
                $checksession = session('name');
              if($checksession)
              {
               $detail = teamtbl::where('id',$id)->get();
               return view('admin.team.detail',compact('detail'));
              }
              else
                  {
                      return redirect("/login");
                  }
      
      
           }
               //++++++++++team End+++++++++
    
               //++++++++++++++++++++Quiz work+++++++++++++++++++++++++++

               public function category_get()
               {
                   $checksession = session('name');
                   if($checksession)
                   {
                       return view('admin.category.category_create');
                   }
                   else
                   {
                       return redirect("/login");
                   }
               }
           
               public function category_post(Request $req)
               {
                   $checksession = session('name');
                   if($checksession)
                   {
                       $category = new categorytbl();
                       $category->category_name = $req->insertcat;
                       $category->save();
                       return redirect('/categoryfetch')->with("mesg","Category Created...");
                   }
                   else
                   {
                       return redirect("/login");
                   }
               }
           
               public function category_fetch()
               {
                   $checksession = session('name');
                   if($checksession)
                   {
                       $cat_fetch = categorytbl::paginate(6);
                       return view('admin.category.category_fetch', compact('cat_fetch'));
                   }
                   else
                   {
                       return redirect("/login");
                   }
               }
           
               public function edit_category($id)
                {
                   $checksession = session('name');
                   if($checksession)
                   {
                       $update_cat = categorytbl::find($id);
                       return view('admin.category.category_edit', compact('update_cat'));
                   }
                   else
                   {
                       return redirect("/login");
                   }
               }
           
                public function update_category(Request $req, $id)
                {
                   $checksession = session('name');
                   if($checksession)
                   {
                       $category = categorytbl::find($id);
                       $category->category_name = $req->updatecat;
                       $category->update();
                       return redirect('/categoryfetch')->with('mesg', "Category Has Been Updated...");
                   }
                   else
                   {
                       return redirect("/login");
                   }
                }
           
                public function delete_category($id)
                {
                   $checksession = session('name');
                   if($checksession)
                   {
                       $delete_category = categorytbl::find($id);
                       $delete_category->delete();
                       return redirect('categoryfetch')->with('mesg', "Category Has Been Deleted...");
                   }
                   else
                   {
                       return redirect("/login");
                   }
           
               }

               public function grade_get()
               {
                   $checksession = session('name');
                   if($checksession)
                   {
                       return view('admin.grade.grade_create');
                   }
                   else
                   {
                       return redirect("/login");
                   }
               }
           
               public function grade_post(Request $req)
               {
                   $checksession = session('name');
                   if($checksession)
                   {
                       $grade = new gradetbl();
                       $grade->grade = $req->insertcat;
                       $grade->save();
                       return redirect('/gradefetch')->with("mesg","grade Created...");
                   }
                   else
                   {
                       return redirect("/login");
                   }
               }
           
               public function grade_fetch()
               {
                   $checksession = session('name');
                   if($checksession)
                   {
                       $cat_fetch = gradetbl::paginate(6);
                       return view('admin.grade.grade_fetch', compact('cat_fetch'));
                   }
                   else
                   {
                       return redirect("/login");
                   }
               }
           
               public function edit_grade($id)
                {
                   $checksession = session('name');
                   if($checksession)
                   {
                       $update_cat = gradetbl::find($id);
                       return view('admin.grade.grade_edit', compact('update_cat'));
                   }
                   else
                   {
                       return redirect("/login");
                   }
               }
           
                public function update_grade(Request $req, $id)
                {
                   $checksession = session('name');
                   if($checksession)
                   {
                       $grade = gradetbl::find($id);
                       $grade->grade = $req->updatecat;
                       $grade->update();
                       return redirect('/gradefetch')->with('mesg', "grade Has Been Updated...");
                   }
                   else
                   {
                       return redirect("/login");
                   }
                }
           
                public function delete_grade($id)
                {
                   $checksession = session('name');
                   if($checksession)
                   {
                       $delete_grade = gradetbl::find($id);
                       $delete_grade->delete();
                       return redirect('gradefetch')->with('mesg', "grade Has Been Deleted...");
                   }
                   else
                   {
                       return redirect("/login");
                   }
           
               }

//++++++++++++++++++++Test +++++++++++++++++++++++++++
public function fetchtest()
{
   $checksession = session('name');
   if($checksession)
   {
       $fetchtest = admintesttbl::paginate(6);
       return view('admin.test.fetch_test', compact('fetchtest'));
   }
   else
   {
       return redirect("/login");
   }
}

public function testget()
{
   $checksession = session('name');
   if($checksession)
   {
       $skills = DB::table('categorytbls')->get();
       $grade = DB::table('gradetbls')->get();
       return view('admin.test.create_test',compact('grade','skills'));
   }
   else
   {
       return redirect("/login");
   }
}

public function testpost(Request $req)
{
   $checksession = session('name');
   if($checksession)
   {
       $test = new admintesttbl();
       $test->userid = session('aid');
       $test->skillid = $req->insertskill;
       $test->grade = $req->insertgrade;
       $test->topicid = $req->inserttopic;
       $test->time_dur = $req->insertdur;
       $test->total_mcq = $req->insertmcq;
       $test->total_marks = $req->insertmarks;
       $test->pass_marks = $req->insertpmarks;
       $test->status = 1;
       $test->save();
       return redirect('/fetchtest')->with("createc","Test Created!!");
   }
   else
   {
       return redirect("/login");
   }
}

public function testeditget($id)
{
   $checksession = session('name');
   if($checksession)
   {
       $updatetest = admintesttbl::find($id);
       $skills = DB::table('categorytbls')->get();
       $grade = DB::table('gradetbls')->get();
       return view('admin.test.edit_test', compact('updatetest','skills','grade'));
   }
   else
   {
       return redirect("/login");
   }
}

public function testeditpost(Request $req, $id)
{
   $checksession = session('name');
   if($checksession)
   {
       $test = admintesttbl::find($id);
       $test->skillid = $req->updateskill;
       $test->grade = $req->insertgrade;
       $test->topicid = $req->updatetopic;
       $test->time_dur = $req->updatedur;
       $test->total_mcq = $req->updatemcq;
       $test->total_marks = $req->updatemarks;
       $test->pass_marks = $req->updatepmarks;
       $test->status = 1;
       $test->update();
       return redirect('/fetchtest')->with("editc","Test Updated!!");
   }
   else
   {
       return redirect("/login");
   }
}

public function testdelete($id)
{
   $checksession = session('name');
   if($checksession)
   {
       $delete = admintesttbl::find($id);
       $delete->delete();
       return redirect()->back()->with('mesg', "Test Record Has Been Deleted...");
   }
   else
   {
       return redirect("/login");
   }

}

   //++++++++++++++++++++topic +++++++++++++++++++++++++++
   public function fetchtopic()
   {
      $checksession = session('name');
      if($checksession)
      {
          $fetchtest = topictbl::paginate(6);
          return view('admin.topic.fetch_topic', compact('fetchtest'));
      }
      else
      {
          return redirect("/login");
      }
   }
   
   public function topicget()
   {
      $checksession = session('name');
      if($checksession)
      {
          $skills = DB::table('categorytbls')->get();
         return view('admin.topic.create_topic',compact('skills'));
      }
      else
      {
          return redirect("/login");
      }
   }
   
   public function topicpost(Request $req)
   {
      $checksession = session('name');
      if($checksession)
      {
          $topic = new topictbl();
          $topic->skillid = $req->insertskill;
          $topic->name = $req->insertname;
          $topic->save();
          return redirect('/fetchtopic')->with("createc","topic Created!!");
      }
      else
      {
          return redirect("/login");
      }
   }
   
   public function topiceditget($id)
   {
      $checksession = session('name');
      if($checksession)
      {
          $updatetest = topictbl::find($id);
          $skills = DB::table('categorytbls')->get();
          return view('admin.topic.edit_topic', compact('updatetest','skills'));
      }
      else
      {
          return redirect("/login");
      }
   }
   
   public function topiceditpost(Request $req, $id)
   {
      $checksession = session('name');
      if($checksession)
      {
          $topic = topictbl::find($id);
          $topic->skillid = $req->updateskill;
          $topic->name = $req->updatename;
          $topic->update();
          return redirect('/fetchtopic')->with("editc","topic Updated!!");
      }
      else
      {
          return redirect("/login");
      }
   }
   
   public function topicdelete($id)
   {
      $checksession = session('name');
      if($checksession)
      {
          $delete = topictbl::find($id);
          $delete->delete();
          return redirect()->back()->with('mesg', "topic Record Has Been Deleted...");
      }
      else
      {
          return redirect("/login");
      }
   
   }
//++++++++++++++++++++Question +++++++++++++++++++++++++++
public function fetchques()
{
   $checksession = session('name');
   if($checksession)
   {
       $fetchques = questiontbl::paginate(6);
       return view('admin.question.fetch_ques', compact('fetchques'));
   }
   else
   {
       return redirect("/login");
   }
}

public function quesget()
{
   $checksession = session('name');
   if($checksession)
   {
       $test = DB::table('admintesttbls')->get();
       return view('admin.question.create_ques',compact('test'));
   }
   else
   {
       return redirect("/login");
   }
}

public function quespost(Request $req)
{
   $checksession = session('name');
   if($checksession)
   {
       $ques = new questiontbl();
       $ques->userid = session('aid');
       $ques->testid = $req->inserttest;
       $ques->question = $req->insertques;
       $ques->marks = $req->insertmarks;
       $ques->save();

       $ans = new answertbl();
       $ans->quesid = $ques->id;
      
       $ans->optionA = $req->insertopta;
       $ans->optionB = $req->insertoptb;
       $ans->optionC = $req->insertoptc;
       $ans->optionD = $req->insertoptd;
       $ans->correct_opt = $req->insertcorrect;
       $ans->save();
       return redirect('/fetchques')->with("createc","Question Created!!");
   }
   else
   {
       return redirect("/login");
   }

}

public function queseditget($id)
{
   $checksession = session('name');
   if($checksession)
   {
       $updateques = questiontbl::find($id);
       $test = DB::table('admintesttbls')->get();
       return view('admin.question.edit_ques', compact('updateques','test'));
   }
   else
   {
       return redirect("/login");
   }
}

public function queseditpost(Request $req, $id)
{
   $checksession = session('name');
   if($checksession)
   {
       $ques = questiontbl::find($id);
       $ques->testid = $req->updatetest;
       $ques->question = $req->updateques;
       $ques->marks = $req->updatemarks;
       $ques->update();

       $ans = answertbl::where('quesid',$id)->first();
       $ans->quesid = $ques->id;
       $ans->optionA = $req->updateopta;
       $ans->optionB = $req->updateoptb;
       $ans->optionC = $req->updateoptc;
       $ans->optionD = $req->updateoptd;
       $ans->correct_opt = $req->updatecorrect;
       $ans->update();
       return redirect('/fetchques')->with("editc","Question Updated!!");
   }
   else
   {
       return redirect("/login");
   }

}

public function quesdelete($id)
{
   $checksession = session('name');
   if($checksession)
   {
       $delete = questiontbl::find($id);
       $delete->delete();
       $delete1 = answertbl::where('quesid',$id)->first();
       $delete1->delete();
       return redirect()->back()->with('mesg', "Question Has Been Deleted...");
   }
   else
   {
       return redirect("/login");
   }
}

public function apptest($id)
{
 $checksession = session('name');
 if($checksession)
 {
 $app = admintesttbl::find($id);
 $app->status = 1;
 $app->update();

 return redirect()->back();
}
else
    {
        return redirect("/login");
    }
 }


//++++++++++++++++++++Answer +++++++++++++++++++++++++++
public function subjecttest(Request $req)
 {


$subject = $req->post("subject");
$subjecta = DB::table('topictbls')->where('skillid',$subject)->get();
$subjectc = DB::table('topictbls')->where('skillid',$subject)->count();

    if($subjectc>0)
    {
      $html = "<option value=''>Select Please</option>";
      echo $html;

    foreach($subjecta as $r)
          {
            // $gradename = DB::table('topictbls')->where('id',$r->topicid)->first();
            $html = "<option value='$r->id'>".$r->id. " " .$r->name."</option>";
            echo $html;
          }
}
else
{
    $html = "<option>Not Found</option>";
            echo $html;
}
 }

//  //subject jqeury
//  public function subject(Request $req)
//  {


// $subject = $req->post("subject");
// $subjecta = DB::table('admintesttbls')->where('skillid',$subject)->get();
// $subjectc = DB::table('admintesttbls')->where('skillid',$subject)->count();

//     if($subjectc>0)
//     {
//       $html = "<option value=''>Select Please</option>";
//       echo $html;

//     foreach($subjecta as $r)
//           {
//             $gradename = DB::table('gradetbls')->where('id',$r->grade)->first();
//             $topicname = DB::table('topictbls')->where('id',$r->topicid)->first();
//             $html = "<option value='$r->id'>".$r->id. " " .$gradename->grade. " " .$topicname->name. "</option>";
//             echo $html;
//           }
// }
// else
// {
//     $html = "<option>Not Found</option>";
//             echo $html;
// }
//  }

//  //grade jqeury
//  public function grade(Request $req)
//  {


// $grade = $req->post("grade");
// $gradea = DB::table('questiontbls')->where('testid',$grade)->get();
// $gradec = DB::table('questiontbls')->where('testid',$grade)->count();

//     if($gradec>0)
//     {
//       $html = "<option value=''>Select Please</option>";
//       echo $html;

//     foreach($gradea as $r)
//           {
//             $checkop = DB::table('answertbls')->where('quesid',$r->id)->first();
//             if($checkop=="")
//             {
//             $html = "<option value='$r->id'>".$r->id. " " .$r->question."</option>";
//             echo $html;
//           }
//           }
// }
// else
// {
//     $html = "<option>Not Found</option>";
//             echo $html;
// }
//  }

// public function fetchans()
// {
//    $checksession = session('name');
//    if($checksession)
//    {
//    $fetchans = answertbl::paginate(6);
//    return view('admin.answer.fetch_ans', compact('fetchans'));
//    }
//    else
//    {
//        return redirect("/login");
//    }

// }

// public function ansget()
// {
//    $checksession = session('name');
//    if($checksession)
//    {
//        $question = DB::table('questiontbls')->get();
//        $skills = DB::table('categorytbls')->get();
//        return view('admin.answer.create_ans',compact('skills','question'));
//    }
//    else
//    {
//        return redirect("/login");
//    }
// }

// public function anspost(Request $req)
// {
//    $checksession = session('name');
//    if($checksession)
//    {
//        $ans = new answertbl();
//        $ans->quesid = $req->insertques;
//        $ans->optionA = $req->insertopta;
//        $ans->optionB = $req->insertoptb;
//        $ans->optionC = $req->insertoptc;
//        $ans->optionD = $req->insertoptd;
//        $ans->correct_opt = $req->insertcorrect;
//        $ans->save();
//        return redirect('/fetchans')->with("createc","Options Created!!");
//    }
//    else
//    {
//        return redirect("/login");
//    }

// }

// public function anseditget($id)
// {
//    $checksession = session('name');
//    if($checksession)
//    {
//        $updateans = answertbl::find($id);
//        $question = DB::table('questiontbls')->get();
//        $skills = DB::table('categorytbls')->get();
//        return view('admin.answer.edit_ans', compact('skills','updateans','question'));
//    }
//    else
//    {
//        return redirect("/login");
//    }
// }

// public function anseditpost(Request $req, $id)
// {
//    $checksession = session('name');
//    if($checksession)
//    {
//        $ans = answertbl::find($id);
//        $ans->quesid = $req->updateques;
//        $ans->optionA = $req->updateopta;
//        $ans->optionB = $req->updateoptb;
//        $ans->optionC = $req->updateoptc;
//        $ans->optionD = $req->updateoptd;
//        $ans->correct_opt = $req->updatecorrect;
//        $ans->update();
//        return redirect('/fetchans')->with("editc","Options Updated!!");
//    }
//    else
//    {
//        return redirect("/login");
//    }
// }

// public function ansdelete($id)
// {
//    $checksession = session('name');
//    if($checksession)
//    {
//        $delete = answertbl::find($id);
//        $delete->delete();
//        return redirect()->back()->with('mesg', "Answer Has Been Deleted...");
//    }
//    else
//    {
//        return redirect("/login");
//    }

// }

//+++++++++++++++++++quiz end+++++++++++++++++++++++++++++++++

//++++++++++++++++++++Story competition start +++++++++++++++++++++

public function round_get()
{
    $checksession = session('name');
    if($checksession)
    {
        return view('admin.storyround.round_create');
    }
    else
    {
        return redirect("/login");
    }
}

public function round_post(Request $req)
{
    $checksession = session('name');
    if($checksession)
    {
        $round = new storyleveltbl();
        $round->title = $req->title;
        $round->round = $req->roundname;
        $round->date = $req->date;
        $round->description = $req->termandcondition;
        $round->save();
        return redirect('/roundfetch')->with("mesg","Round Created...");
    }
    else
    {
        return redirect("/login");
    }
}

public function round_fetch()
{
    $checksession = session('name');
    if($checksession)
    {
        $fetch = storyleveltbl::paginate(1);
        return view('admin.storyround.round_fetch', compact('fetch'));
    }
    else
    {
        return redirect("/login");
    }
}

public function edit_round($id)
 {
    $checksession = session('name');
    if($checksession)
    {
        $update_round = storyleveltbl::find($id);
        return view('admin.storyround.round_edit', compact('update_round'));
    }
    else
    {
        return redirect("/login");
    }
}

 public function update_round(Request $req, $id)
 {
    $checksession = session('name');
    if($checksession)
    {
        $round = storyleveltbl::find($id);
        $round->title = $req->title;
        $round->round = $req->roundname;
        $round->date = $req->date;
        $round->description = $req->termandcondition;
        $round->update();
        return redirect('/roundfetch')->with('mesg', "Round Has Been Updated...");
    }
    else
    {
        return redirect("/login");
    }
 }

 public function delete_round($id)
 {
    $checksession = session('name');
    if($checksession)
    {
        $delete_round = storyleveltbl::find($id);
        $delete_round->delete();
        return redirect('roundfetch')->with('mesg', "Round Has Been Deleted...");
    }
    else
    {
        return redirect("/login");
    }

}

//round1
public function adminround1storyfetch()
{

    $checksession = session('name');
    if($checksession)
    {
        $fetchcat = allcategorytbl::all();
        $fetchstory = round1storytbl::paginate(6);
        return view('admin.allround1story', compact('fetchstory','fetchcat'));
    }
    else
    {
        return redirect("/login");
    }
}

public function approveround1story($id)
{
 $checksession = session('name');
 if($checksession)
 {
 $app = round1storytbl::find($id);
 $app->status = 1;
 $app->update();

 $story = new cstorytbl();
$story->type = $app->type;
$story->Title = $app->Title;
$story->typefic = $app->typefic;
$story->short_Des = $app->short_Des;
$story->long_Des = $app->long_Des;
$story->image = $app->image;
$story->userid = $app->userid;
$story->status = 1;
$story->video_url = $app->video_url;
$story->save();
 return redirect()->back();
}
else
    {
        return redirect("/login");
    }
 }

 public function rejectround1story($id)
{
 $checksession = session('name');
 if($checksession)
 {
 $app = round1storytbl::find($id);
 $app->status = 2;
 $app->update();
 return redirect()->back();
}
else
    {
        return redirect("/login");
    }
 }

 //round2
public function adminround2storyfetch()
{

    $checksession = session('name');
    if($checksession)
    {
        $fetchcat = allcategorytbl::all();
        $fetchstory = round2storytbl::paginate(6);
        return view('admin.allround2story', compact('fetchstory','fetchcat'));
    }
    else
    {
        return redirect("/login");
    }
}

public function approveround2story($id)
{
 $checksession = session('name');
 if($checksession)
 {
 $app = round2storytbl::find($id);
 $app->status = 1;
 $app->update();
 $story = new cstorytbl();
$story->type = $app->type;
$story->Title = $app->Title;
$story->typefic = $app->typefic;
$story->short_Des = $app->short_Des;
$story->long_Des = $app->long_Des;
$story->image = $app->image;
$story->userid = $app->userid;
$story->status = 1;
$story->video_url = $app->video_url;
$story->save();
 return redirect()->back();
}
else
    {
        return redirect("/login");
    }
 }

 public function rejectround2story($id)
 {
  $checksession = session('name');
  if($checksession)
  {
  $app = round2storytbl::find($id);
  $app->status = 2;
  $app->update();
  return redirect()->back();
 }
 else
     {
         return redirect("/login");
     }
  }

 //round3
public function adminround3storyfetch()
{

    $checksession = session('name');
    if($checksession)
    {
        $fetchcat = allcategorytbl::all();
        $fetchstory = round3storytbl::paginate(6);
        return view('admin.allround3story', compact('fetchstory','fetchcat'));
    }
    else
    {
        return redirect("/login");
    }
}

public function approveround3story($id)
{
 $checksession = session('name');
 if($checksession)
 {
 $app = round3storytbl::find($id);
 $app->status = 1;
 $app->update();
 $story = new cstorytbl();
$story->type = $app->type;
$story->Title = $app->Title;
$story->typefic = $app->typefic;
$story->short_Des = $app->short_Des;
$story->long_Des = $app->long_Des;
$story->image = $app->image;
$story->userid = $app->userid;
$story->status = 1;
$story->video_url = $app->video_url;
$story->save();
 return redirect()->back();
}
else
    {
        return redirect("/login");
    }
 }


 public function rejectround3story($id)
 {
  $checksession = session('name');
  if($checksession)
  {
  $app = round3storytbl::find($id);
  $app->status = 2;
  $app->update();
  return redirect()->back();
 }
 else
     {
         return redirect("/login");
     }
  }




//+++++++++++++++++++++story competition end++++++++++++++++
       

 // +++++++++++++ ++++++++++  certificate++++++++++++++++++++
 public function certificatefetch()
 {

    $fetchc= certificatetbl::paginate(6);
    return view("admin.certificate",compact('fetchc'));

 }

 public function certificatecreatepost(Request $req)
 {

     $catmodel = new certificatetbl();
     $catmodel->certificate_id = rand(10000, 99999);
     $catmodel->firstname = $req->insertfname;
     $catmodel->lastname = $req->insertlname;
     $catmodel->remark = $req->insertremark;
     $catmodel->genre = $req->insertgenre;
     $catmodel->issuedate = $req->insertidate;
     $catmodel->partdate = $req->insertpdate;

     $catmodel->save();
     return redirect('/certificatefetch')->with("added","Certificate added successfully");

 }

 public function certificatedelete($id)
 {

     $delete = certificatetbl::find($id);
     $delete->delete();
     return redirect('/certificatefetch')->with("del","Data Has Been Deleted");


 }

 public function getcertificate(Request $req)
 {

     $id = $req->post("id");
     $record = DB::table("certificatetbls")->where("id",$id)->get();
     foreach($record as $r)
     {
         $user = $r;
         echo json_encode($user);
     }

 }



 public function certificateupdatepost(Request $req)
 {

     $catmodel = certificatetbl::find($req->recordid);
     $catmodel->firstname = $req->updatefname;
     $catmodel->lastname = $req->updatelname;
     $catmodel->remark = $req->updateremark;
     $catmodel->genre = $req->updategenre;
     $catmodel->issuedate = $req->updateidate;
     $catmodel->partdate = $req->updatepdate;

     $catmodel->update();
     return redirect('/certificatefetch')->with("update","Certificate Updated Successfully");

 }
 public function changefetch()
 {
     $checksession = session('name');
     if($checksession)
     {
         $fetch = user::where('role',1)->get();
         return view('admin.changefetch', compact('fetch'));
     }
     else
     {
         return redirect("/login");
     }
 }
 

 public function change($id)
 {
     $checksession = session('name');
     if($checksession)
     {
     $update_cat = user::where('role',1)->first();
     return view('admin.change', compact('update_cat'));
     }
     else
     {
         return redirect("/login");
     }
 }

 public function updatechange(Request $req, $id)
 {
     $checksession = session('name');
     if($checksession)
     {
         $category = user::find($id);
         $category->email = $req->updateemail;
         $category->password = $req->updatepassword;
         $category->firstname = $req->updatefname;
         $category->lastname = $req->updatelname;
         $category->age = $req->updateage;
        //  if($req->file('insertimage'))
        //  {
        //  $image=$req->file('insertimage');
        //  $ext = rand().".".$image->getClientOriginalName();
        //  $image->move('userimages/',$ext);
        //  $category->image=$ext;
        //  }
        //  else
        //  {
        //  $category->image= $category->image;
        //  }
         $category->update();
         return redirect('/changefetch')->with('mesg', "Your Data Has Been Updated...");
     }
     else
     {
         return redirect("/login");
     }
 }

 //+++++++++++Collaboration Start++++++++++++++++++++++++++++++
    public function collab_get()
    {
        $checksession = session('name');
        if($checksession)
        {
            $fetchcollab = Collaboration::all();
            return view('admin.collaboration.collabcreate',compact('fetchcollab'));
        }
        else
        {
            return redirect("/login");
        }
    }

    public function collab_post(Request $req)
    {
        $checksession = session('name');
        if($checksession)
        {
            $collab = new Collaboration();
            $collab->title = $req->insertcollabtitle;
            $collab->long_Des = $req->insertcollablongdes;
            $collab->video_url = $req->insertcollaburl;
            $image=$req->file('insertcollabimage');
            $ext = rand().".".$image->getClientOriginalName();
            $image->move('collabimages/',$ext);
            $collab->image=$ext;
            $collab->save();
            return redirect('/fetchcollab')->with("created","Collaboration Data Created!!!");
        }
        else
        {
            return redirect("/login");
        }
    }

    public function fetch_collab()
    {
        $checksession = session('name');
        if($checksession)
        {
            $fetchcollab = Collaboration::paginate(6);
            return view('admin.collaboration.collabfetch', compact('fetchcollab'));
        }
        else
        {
            return redirect("/login");
        }
    }

    public function edit_collab($id)
    {
        $checksession = session('name');
        if($checksession)
        {
        $updateco = Collaboration::find($id);
        return view('admin.collaboration.collabedit', compact('updateco'));
        }
        else
        {
            return redirect("/login");
        }

    }

    public function update_collab(Request $req, $id)
    {
        $checksession = session('name');
        if($checksession)
        {
            $collab = Collaboration::find($id);
            $collab->title = $req->updatecollabtitle;
            $collab->long_des = $req->updatecollablongdes;
            $collab->video_url = $req->updatecollaurl;

            $image=$req->file('insertcollabimage');
            $ext = rand().".".$image->getClientOriginalName();
            $image->move('collabimages/',$ext);
            $collab->image=$ext;




          


            $collab->update();
            return redirect('/fetchcollab')->with("edit","Collaboration data has been updated!!!");
        }
        else
        {
            return redirect("/login");
        }
    }

    public function delete_collab($id)
    {
        $checksession = session('name');
        if($checksession)
        {
            $delete = Collaboration::find($id);
            $delete->delete();
            return redirect()->back()->with('mesg', "Record Has Been Deleted...");
        }
        else
        {
            return redirect("/login");
        }
    }
//+++++++++++Collaboration End++++++++++++++++++++++++++++++
   //+++++++++++++++++team++++++++
   public function winner_get()
   {
      $checksession = session('name');
      if($checksession)
      {
        $users = User::where('role', 2)->get();
      return View("admin.winner.winner",compact('users'));
  }
  else
      {
          return redirect("/login");
      }

   }

   public function winner_post(Request $req)
   {
      $checksession = session('name');
      if($checksession)
      {
     $team = new winnertbl();
     $team->userid = $req->insertwinnertitle;
     $team->position = $req->insertwinnerposition;
     $team->part = $req->insertwinnerpart;
     $team->short_Des = $req->insertwinnershortdes ?? "null";
     $team->link = $req->insertwinnerlink;
     $image=$req->file('insertwinnerimage');
     $ext = rand().".".$image->getClientOriginalName();
     $image->move('winnerimages/',$ext);
     $team->image=$ext;
     $team->save();
     return redirect('fetchwinner')->with("created","winner Data Created...");

  }
  else
      {
          return redirect("/login");
      }

   }

   public function fetchwinner()
   {
      $checksession = session('name');
      if($checksession)
      {
     $fetchwinner = winnertbl::paginate(6);
     return view('admin.winner.fetch_winner', compact('fetchwinner'));
  }
  else
      {
          return redirect("/login");
      }

   }


   public function edit_winner($id)
   {
      $checksession = session('name');
      if($checksession)
      {
        $users = User::where('role', 2)->get();
       $update_winner = winnertbl::find($id);
       return view('admin.winner.edit', compact('update_winner','users'));
      }
      else
          {
              return redirect("/login");
          }

   }

   public function update_winner(Request $req, $id)
   {
      $checksession = session('name');
      if($checksession)
      {
       $team = winnertbl::find($id);
       $team->userid = $req->updatewinnertitle;
       $team->short_Des = $req->updatewinnershortdes ?? "null";
       $team->position = $req->updatewinnerposition;
       $team->part = $req->updatewinnerpart;
       $team->link = $req->updatewinnerlink;
       if($req->file('updatewinnerimage'))
       {
       $image=$req->file('updatewinnerimage');
       $ext = rand().".".$image->getClientOriginalName();
       $image->move('winnerimages/',$ext);
       $team->image=$ext;
       }
       else
       {
       $team->image= $team->image;
       }
       $team->update();
       return redirect('/fetchwinner')->with("edit","winner Data Updated...");;
      }
      else
          {
              return redirect("/login");
          }

   }

   public function delete_winner($id)
   {
       $checksession = session('name');
      if($checksession)
      {
       $delete = winnertbl::find($id);
       $delete->delete();
       return redirect()->back()->with('mesg', "Record Has Been Deleted...");
      }
      else
          {
              return redirect("/login");
          }

   }

    public function detail_winner($id)
   {
        $checksession = session('name');
      if($checksession)
      {
       $detail = winnertbl::where('id',$id)->get();
       return view('admin.winner.detail',compact('detail'));
      }
      else
          {
              return redirect("/login");
          }


   }
       //++++++++++winner End+++++++++

}
