<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mediacentertbl;
use App\Models\teamtbl;
use App\Models\contactustbl;
use App\Models\User;

use App\Models\round1storytbl;
use App\Models\round2storytbl;
use App\Models\round3storytbl;
use App\Models\allcategorytbl;
use App\Models\cstorytbl;
use App\Models\announcementtbl;
use App\Models\learningtiptbl;
use App\Models\categorytbl;
use App\Models\admintesttbl;
use App\Models\questiontbl;
use App\Models\answertbl;
use App\Models\cltesttbl;
use App\Models\storyleveltbl;
use App\Models\Collaboration;
use App\Models\certificatetbl;
use App\Models\winnertbl;
use Validator;
use DB;
use App\Models\DailyQuizQuestion;
use App\Models\DailyQuizOption;
use App\Models\AttemptDailyQuizQuestion;
use App\Models\Course;
use App\Models\TeacherCourse;
use App\Models\CourseStudent;


use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function PurchaseCourse(Request $request)
    {
        
        $courseId = $request->course_id;
        $studentId = $request->user_id;
    
        // Check if the entry already exists in the CourseStudent table
        $existingPurchase = CourseStudent::where('course_id', $courseId)
                                        ->where('student_id', $studentId)
                                        ->first();
    
        if ($existingPurchase) {
            // The user has already purchased this course
            Session::flash('error', 'You have already purchased this course.'); 
            return redirect()->back();
        }
        \Stripe\Stripe::setApiKey(config('sk'));
 
        $course_name = $request->course_name;
        $totalprice = $request->course_price;
        $two0 = "00";
        $total = "$totalprice$two0";
 
        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'USD',
                        'product_data' => [
                            "name" => $course_name,
                        ],
                        'unit_amount'  => $total,
                    ],
                    'quantity'   => 1,
                ],
                 
            ],
            'mode'        => 'payment',
            'success_url' => route('PurchaseSuccess'),
            'cancel_url'  => route('home'),
        ]);
        // dd($session);
        session(['user_id'=>$request->user_id]);
        session(['course_id'=>$request->course_id]);
        
        return redirect()->away($session->url);
    }
 
    public function PurchaseSuccess()
    {
        
            $teacherCoruse = new CourseStudent();
            $teacherCoruse->course_id =   session('course_id');            
            $teacherCoruse->student_id =  session('user_id');;
            $teacherCoruse->save();
            return view('userside.purchaseSuccess');
    }
    public function FreeCourse(Request $request)
    {
        $courseId = $request->course_id;
        $studentId = $request->user_id;
    
        // Check if the entry already exists in the CourseStudent table
        $existingPurchase = CourseStudent::where('course_id', $courseId)
                                        ->where('student_id', $studentId)
                                        ->first();
    
        if ($existingPurchase) {
            // The user has already purchased this course
            Session::flash('error', 'You have already purchased this course.'); 
            return redirect()->back();
        }
        else{
            // If the entry does not exist, proceed with the purchase
        $teacherCourse = new CourseStudent();
        $teacherCourse->course_id = $courseId;
        $teacherCourse->student_id = $studentId;
        $teacherCourse->save();
    
        
            return view('userside.purchaseSuccess');
        }
        
    }
    public function home()
    {
        $comp = storyleveltbl::all();
     $media = mediacentertbl::all();
     $learn = learningtiptbl::where('status',1)->get();
     $cat = categorytbl::all();
     $cat = DB::table('admintesttbls')->where('status',1)->select('skillid')->distinct()->get();
     $team = teamtbl::all();
     $ann = announcementtbl::all();
     $fetchfic = cstorytbl::where('status',1)->get();
     $round3 = round3storytbl::where('status' ,1)->orderBy('id', 'DESC')->get();
     $round3c = round3storytbl::where('status' ,1)->orderBy('id', 'DESC')->count();
     $collab = Collaboration::limit(3)->get();
        // $company = companytbl::all();
        // $career = careertbl::limit(3)->get();
        // $fetchp = servicetbl::limit(3)->get();
        // $fetchpot = portfoliotbl::all();
        $quiz = DailyQuizQuestion::where('status','activated')->first();
        $options = DailyQuizOption::where('daily_quiz_question_id', $quiz->id)->first();
        $result = winnertbl::all();
        // $courses = Course::where('status',0)->get();
        $courses = Course::join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_id')
        ->join('users', 'teacher_courses.teacher_id', '=', 'users.id')
        ->where('courses.status', 0)
        ->where('users.role', 3)
        ->select('courses.*', 'users.firstname', 'users.lastname')
        ->get();
        // dd($courses);
        return view('userside.home',compact('result','courses','round3c','options','quiz','comp','fetchfic','ann','media','learn','cat','team', 'round3', 'collab'));
    }
    public function courseDetails($id)
    {
        $course = Course::join('teacher_courses', 'courses.id', '=', 'teacher_courses.course_id')
        ->join('users', 'teacher_courses.teacher_id', '=', 'users.id')
        ->where('courses.id', $id)
        ->select('courses.*', 'users.firstname', 'users.lastname')
        ->first();
        // dd($course);
        return view('userside.courseDetail', compact('course'));
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
    
    return view('userside.monthlyresult', compact('results', 'topUsers'));
    
    }

    public function attemptUserAnswer(Request $request)
    {
        $userId = $request->user_id;
        $questionId = $request->daily_quiz_question_id;
        $answer = $request->question_answer;
    
        // Check if the user has already attempted the question
        $existingAttempt = AttemptDailyQuizQuestion::where('user_id', $userId)
            ->where('daily_quiz_question_id', $questionId)
            ->first();
    
        if ($existingAttempt) {
            return redirect()->back()->with('error', 'You have already attempted this question.');
        }
    
        $insert = new AttemptDailyQuizQuestion();
        $insert->user_id = $userId;
        $insert->question_answer = $answer;
        $insert->daily_quiz_question_id = $questionId;
        $insert->save();
    
        return redirect()->route('DailyWiseQuizResult');
    }

    public function DailyWiseQuizResult()
    {
        $userId = session('cid'); // Assuming you store the user ID in the session

        $attempts = AttemptDailyQuizQuestion::where('user_id', $userId)->get();

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

        return view('userside.DailyWiseQuizResult', compact('totalAttempts', 'correctAttempts', 'wrongAttempts', 'marks'));
    }

    private function isAnswerCorrect($questionId, $answer)
    {
        $correctOption = DailyQuizOption::where('daily_quiz_question_id', $questionId)
            ->where('correct_option', $answer)
            ->exists();

        return $correctOption;
    }

  
    public function getQuizResult($quizId,$answer){
        //dd($answer);
        $result = DailyQuizOption::where('daily_quiz_question_id',$quizId)->where('correct_option',$answer)->count();
        return $result;
    }
    public function register()
    {
        return view('userside.register');
    }


    function registerpost(Request $request){
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
            $image1 = $request->insertimage;
          $user = new user();

          $user->firstname = $request->firstname;
          $user->lastname = $request->lastname;
          $user->password = $request->password;
          $user->age = $request->age;
          $user->email = $request->email;
         if($image1)
          {
          $destinationPath = 'userimages/';
          $ext =  $image1->getClientOriginalName();
          $userimage = $destinationPath."/".$ext;
          $image1->move($destinationPath,$ext);
          $user->image = $userimage;
          }

          $user->save();
            if( $user ){
                return response()->json(['status'=>1, 'msg'=>'Your Account has been successfully registered']);
            }
        }
  }


    public function login()
    {
        return view('userside.login');
    }


    public function Loginpost(Request $req)
    {
        $email = $req->loginemail;
        $pass = $req->loginpass;
        $login = DB::table('users')->select('firstname', 'role','id')->where(["email"=>$email, "password"=>$pass])->first();
        if($login!="")
        {

            if($login->role == 1)
            {
              session(['name'=>$login->firstname]);
              session(['aid'=>$login->id]);
              return redirect('/allcatget');
            }
            else if($login->role == 2)
            {
              session(['cname'=>$login->firstname,]);
              session(['cid'=>$login->id]);
              return redirect("/");
            }
            else if($login->role == 3)
            {
              session(['tname'=>$login->firstname,]);
              session(['tid'=>$login->id]);
              
              return redirect()->route('TeacherDashboard');
            }
            else
            {
                return redirect()->back()->with("loginfailed", "Wait for the verification");
            }
        }
        else
        {
            return redirect()->back()->with("loginfailed", "Invalid Credentials");
        }
    }

   

    public function about()
    {
        $team = teamtbl::all();
        return view('userside.about',compact('team'));
    }

    public function storyresult()
    {
        $fetchcat = allcategorytbl::all();
        $round1 = round1storytbl::where('status','!=' ,0)->get();
        $round2 = round2storytbl::where('status','!=' ,0)->get();
        $round3 = round3storytbl::where('status','!=' ,0)->get();
        return view('userside.storyresult',compact('round1','round2','round3'));
    }

    public function contact()
    {
        return view('userside.contact');
    }

    public function contactuspost(Request $req)
    {
        $contactmodel = new contactustbl();
        $contactmodel->name = $req->insertname;
        $contactmodel->email = $req->insertemail;
        $contactmodel->phone = $req->insertphone;
        $contactmodel->message = $req->insertmessage;
        $contactmodel->save();
        return redirect()->back()->with('sent', "Your Message Has Been Send...");


    }


    public function winner()
    {
        $result = winnertbl::all();
        return view('userside.winner', compact('result'));
    }
    public function team()
    {
        $fetch = teamtbl::all();
        return view('userside.team', compact('fetch'));
    }

    public function teamdetail($title , $id)
    {
         $fetchall = teamtbl::where('id','!=',$id)->limit(4)->get();
        $fetchp = teamtbl::where('id',$id)->first();
       
        return view('userside.teamdetail', compact('fetchall','fetchp'));
    }
    public function mediacenter()
    {
        $fetchmedia = mediacentertbl::all();
        return view('userside.mediacenter', compact('fetchmedia'));
    }
    public function mediadetail($headline , $id)
    {
        $fetchall = mediacentertbl::where('id','!=',$id)->limit(4)->get();
        $fetch = mediacentertbl::where('id',$id)->first();
        return view('userside.mediadetail', compact('fetchall','fetch'));
    }

    public function collaboration()
    {
        $fetchcollab = Collaboration::all();
        return view('userside.collaboration', compact('fetchcollab'));
    }
    public function collabdetail($title , $id)
    {
        $fetchall = Collaboration::where('id','!=',$id)->limit(4)->get();
        $fetch = Collaboration::where('id',$id)->first();
        return view('userside.collabdetail', compact('fetchall','fetch'));
    }

    
    public function announcement()
    {
        $fetchmedia = announcementtbl::all();
        return view('userside.announcement', compact('fetchmedia'));
    }
    public function announcementdetail($headline , $id)
    {
        $fetchall = announcementtbl::where('id','!=',$id)->limit(4)->get();
        $fetch = announcementtbl::where('id',$id)->first();
        return view('userside.announcementdetail', compact('fetchall','fetch'));
    }
    public function story()
    {
        $fetchfic = cstorytbl::where('status',1)->where('typefic','Fiction')->get();
        $fetchnfic = cstorytbl::where('status',1)->where('typefic','Non-Fiction')->get();
        return view('userside.story', compact('fetchfic','fetchnfic'));
    }
    public function storydetail($headline , $id)
    {
        $fetchall = cstorytbl::where('id','!=',$id)->where('status',1)->limit(4)->get();
        $fetch = cstorytbl::where('id',$id)->first();
        return view('userside.storydetail', compact('fetchall','fetch'));
    }
    public function tip()
    {
        $fetchmedia = learningtiptbl::where('status',1)->get();
        return view('userside.tip', compact('fetchmedia'));
    }
    public function tipdetail($Title , $id)
    {
        $fetchall = learningtiptbl::where('id','!=',$id)->where('status',1)->limit(4)->get();
        $fetch = learningtiptbl::where('id',$id)->first();
        return view('userside.tipdetail', compact('fetchall','fetch'));
    }


    //+++++++++++++++++++++++++++++Test your skill++++++++++++++++++++
    public function testyourskill()
    {
        $category = DB::table('categorytbls')->get();
        $grade = DB::table('gradetbls')->get();
        return view('userside.testyourskill', compact('category','grade'));
    }

    public function skilltest($categoryname,$id,$grade,$topic)
    {
       
            $totalmcq = admintesttbl::where('skillid',$id)->where('grade',$grade)->where('topicid',$topic)->first();
            if($totalmcq)
            {
            $ques = questiontbl::where('testid',$totalmcq->id)->get();
             $qcount = questiontbl::where('testid',$totalmcq->id)->count();
            }
            else
            {
                $ques="";
                $qcount=0;
            }
           
            return view('userside.testquestion',compact('ques','totalmcq','qcount'));
    }

    public function submitquiz(Request $req)
    {
       
          
            $result = new cltesttbl();
            
            $result->skillid = $req->skillid;
            $result->userid =  session('cid');

            
            $result->selectedoption = $req->selectedoption ?? "null";
            $result->selectedquestion = $req->selectedquestion ?? "null";
            $result->totalquestion = $req->totalquestion;
            $result->grade = $req->grade;
            $result->totalmarks = $req->totalmarks;
            $result->correctanswer = $req->correctanswer ?? 0;
            $result->studentmarks = $req->studentmarks ?? 0;
            $result->passmarks = $req->passmarks;
            $result->attemptquestion = $req->attemptquestion ?? 0;
            if($req->studentmarks>=$req->passmarks)
            {
                $result->remarks = "PASS";
            }
            else
            {
                $result->remarks = "FAIL";
            }
            
            $result->save();
            return redirect('/quizresult');
        
       
    }

    public function quizresult()
    {
        if(session('cid'))
        {
        $result = DB::table('cltesttbls')->where('userid',session('cid'))->orderby('id','desc')->first();
        return View('userside.quizresult',compact('result'));
        }
        else
        {
            $result = "Please Login";
            return View('userside.quizresult',compact('result'));
        }
    }

    public function privacy()
    {
        return view('userside.privacy');
    }
    public function terms()
    {
        return view('userside.terms');
    }

    public function certificate()
    {
        return view('userside.certificate');
    }

    public function search(Request $request)
    {
        
            
            $certificate = certificatetbl::where('certificate_id', 'LIKE', '%' .$request->search_input. '%')->get();
            return view('userside.certificate', compact('certificate'));
     
          
        
    
        
    }
  
}