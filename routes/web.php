<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//useride
Route::get('/userlayout', function () {
    return view('userside.userlayout');
});

Route::controller(HomeController::class)->group(function(){

    Route::post('/free-course', [HomeController::class,'FreeCourse'])->name('FreeCourse');

    Route::post('/purchase-course', [HomeController::class,'PurchaseCourse'])->name('PurchaseCourse');
    Route::get('/purchase-success', [HomeController::class,'PurchaseSuccess'])->name('PurchaseSuccess');
    Route::get('/', "home")->name('home');
    Route::get('/course-details/{id}', "courseDetails")->name('courseDetails');
    Route::get('/contact', "contact");
    Route::post('/contactuspost', "contactuspost");
    Route::get('/mediacenter', "mediacenter");
    Route::get('/mediadetail/{headline}/{id}', "mediadetail");


    Route::get('/collaboration', "collaboration");
    Route::get('/collabdetail/{title}/{id}', "collabdetail");
    Route::get('/announcement', "announcement");
    Route::get('/announcementdetail/{headline}/{id}', "announcementdetail");
    Route::get('/learningtips', "tip");
    Route::get('/tipdetail/{Title}/{id}', "tipdetail");
    Route::get('/kidstory', "story");
    Route::get('/kidstorydetail/{Title}/{id}', "storydetail");
    Route::get('/team', "team");
    Route::get('/teamdetail/{Title}/{id}', "teamdetail");
    Route::get('/about', "about");
    Route::get('/storyresult', "storyresult");
    Route::get('/privacy ', "privacy");
    Route::get('/winners', "winner");
    Route::get('/terms', "terms");
    Route::get('/certificate', "certificate");
    Route::post('/search', "search");
});

//forget
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');



Route::controller(AdminController::class)->group(function(){
    Route::get("/users", 'users');
    Route::get('/status_update/{id}', 'status_update');
    Route::get('/delete_user/{id}', 'delete_user');

    
});

// daily quiz start
Route::get("/daily-quiz", [AdminController::class,"DailyQuizForm"])->name('DailyQuizForm');
Route::get("/edit-daily-quiz/{id}", [AdminController::class,"editDailyQuizForm"])->name('editDailyQuizForm');
Route::post("/daily-quiz-update/{id}", [AdminController::class,"dailyQuizUpdate"])->name('dailyQuizUpdate');
Route::get("/daily-quiz-delete/{id}", [AdminController::class,"deleteDailyQuiz"])->name('deleteDailyQuiz');
Route::get("/view-daily-quiz", [AdminController::class,"viewDailyQuiz"])->name('viewDailyQuiz');
Route::post("/daily-quiz-post", [AdminController::class,"dailyQuizPost"])->name('dailyQuizPost');


Route::get('/show-quiz-results', [AdminController::class,"showQuizResults"])->name('showQuizResults');
Route::get('/winner-quiz-results', [AdminController::class,"dailyQuizWinnerList"])->name('dailyQuizWinnerList');
//end deaily quiz

//result
Route::get('/monthlyresult', [HomeController::class,"dailyQuizWinnerList"])->name('monthlyresult');


//submit answer 

Route::post("/submit-answer",[HomeController::class,'attemptUserAnswer'])->name('attemptUserAnswer');
Route::get("/daily-wise-quiz-result",[HomeController::class,'DailyWiseQuizResult'])->name('DailyWiseQuizResult');

Route::get('register', [HomeController::class, 'register']);
Route::post('Register_post',[HomeController::class, 'registerpost'])->name('user.save');
Route::get('login', [HomeController::class, 'login']);
Route::post('Login_post', [HomeController::class, 'Loginpost'])->name('login.post');
//logout
Route::get('/alogout',[AdminController::class,"alogout"]);
Route::get('/clogout',[UserController::class,"clogout"]);


//admin
Route::get('/adminlayout', [AdminController::class, 'adminlayout']);
//All Category Start
Route::get('/allcatget', [AdminController::class, 'allcat_get']);
Route::post('/allcatpost', [AdminController::class, 'allcat_post']);
Route::get('/allcatfetch', [AdminController::class, 'allcat_fetch']);
Route::get('/allcatedit/{id}', [AdminController::class, 'edit_allcat']);
Route::post('/allcatupdate/{id}', [AdminController::class, 'update_allcat']);
Route::get('/allcatdelete/{id}', [AdminController::class, 'allcat_delete']);
//All Category End
//media start
Route::get('/media', [AdminController::class, 'media_get']);
Route::post('/mediacreatepost', [AdminController::class, 'media_post']);
Route::get('/fetchmedia', [AdminController::class, 'fetch_media']);
Route::get('/edit/{id}', [AdminController::class, 'edit_media']);
Route::post('/update/{id}', [AdminController::class, 'update_media']);
Route::get('/delete/{id}', [AdminController::class, 'delete_media']);
Route::get('/detail/{id}', [AdminController::class, 'detail_media']);
//media end

//article start
Route::get('/article', [AdminController::class, 'article_get']);
Route::post('/articlecreatepost', [AdminController::class, 'article_post']);
Route::get('/fetcharticle', [AdminController::class, 'fetch_article']);
Route::get('/editarticle/{id}', [AdminController::class, 'edit_article']);
Route::post('/updatearticle/{id}', [AdminController::class, 'update_article']);
Route::get('/deletearticle/{id}', [AdminController::class, 'delete_article']);
// //article end
// adminstory
Route::get('/adminstory', [Admincontroller::class, 'adminstory']);
Route::get('/adminstory_get', [Admincontroller::class, 'adminstory_get']);
Route::post('/adminstorycreatepost', [Admincontroller::class, 'adminstorycreatepost']);
Route::get('/admineditstory/{id}', [Admincontroller::class, 'admineditstory']);
Route::post('/adminupdatestory/{id}', [Admincontroller::class, 'adminupdatestory']);
Route::get('/admindeletestory/{id}', [Admincontroller::class, 'admindeletestory']);
Route::get('/adminstorydetail/{id}', [Admincontroller::class, 'adminstorydetail']);
Route::get('/storystatus_updated/{id}', [Admincontroller::class, 'storystatus_updated']);


//Announcement start
Route::get('/announce', [AdminController::class, 'ann_get']);
Route::post('/anncreatepost', [AdminController::class, 'ann_post']);
Route::get('/fetchann', [AdminController::class, 'fetch_ann']);
Route::get('/editann/{id}', [AdminController::class, 'edit_ann']);
Route::post('/updateann/{id}', [AdminController::class, 'update_ann']);
Route::get('/deleteann/{id}', [AdminController::class, 'delete_ann']);
Route::get('/detailann/{id}', [AdminController::class, 'anndetail']);
//Announcement end

//User dashboard
Route::get('/userlayout', [UserController::class, 'userlayout']);
//article start
Route::get('/uarticle', [UserController::class, 'uarticle_get']);
Route::post('/uarticlecreatepost', [UserController::class, 'uarticle_post']);
Route::get('/ufetcharticle', [UserController::class, 'ufetch_article']);
Route::get('/ueditarticle/{id}', [UserController::class, 'uedit_article']);
Route::post('/uupdatearticle/{id}', [UserController::class, 'uupdate_article']);
Route::get('/udeletearticle/{id}', [UserController::class, 'udelete_article']);
// //article end
// user story
Route::get('/ustory', [UserController::class, 'ustory']);
Route::get('/ustory_get', [UserController::class, 'ustory_get']);
Route::post('/ustorycreatepost', [UserController::class, 'ustorycreatepost']);
Route::get('/ueditstory/{id}', [UserController::class, 'ueditstory']);
Route::post('/uupdatestory/{id}', [UserController::class, 'uupdatestory']);
Route::get('/udeletestory/{id}', [UserController::class, 'udeletestory']);
Route::get('/ustorydetail/{id}', [UserController::class, 'ustorydetail']);
Route::get('/ustorystatus_updated/{id}', [UserController::class, 'ustorystatus_updated']);


//Annoucements
Route::get('/studan', [UserController::class, 'studan']);
Route::get('/studandetail/{id}', [UserController::class, 'studandetail']);

//approval 
Route::get("/approveart/{id}",[AdminController::class,'approveart']);
Route::get("/approvestory/{id}",[AdminController::class,'approvestory']);
Route::get("/approvetip/{id}",[AdminController::class,'approvetip']);


 // admin learning tip
 Route::get('/admintip', [Admincontroller::class, 'admintip']);
 Route::get('/admintip_get', [Admincontroller::class, 'admintip_get']);
 Route::post('/admintipcreatepost', [Admincontroller::class, 'admintipcreatepost']);
 Route::get('/adminedittip/{id}', [Admincontroller::class, 'adminedittip']);
 Route::post('/adminupdatetip/{id}', [Admincontroller::class, 'adminupdatetip']);
 Route::get('/admindeletetip/{id}', [Admincontroller::class, 'admindeletetip']);
 Route::get('/admintipdetail/{id}', [Admincontroller::class, 'admintipdetail']);

 Route::get('/utip', [UserController::class, 'utip']);
 Route::get('/utip_get', [UserController::class, 'utip_get']);
 Route::post('/utipcreatepost', [UserController::class, 'utipcreatepost']);
 Route::get('/uedittip/{id}', [UserController::class, 'uedittip']);
 Route::post('/uupdatetip/{id}', [UserController::class, 'uupdatetip']);
 Route::get('/udeletetip/{id}', [UserController::class, 'udeletetip']);
 Route::get('/utipdetail/{id}', [UserController::class, 'utipdetail']);



 //++++++++++Team Start+++++++++
Route::get('/team_get',[AdminController::class, "team_get"]);
Route::post('/team_post',[AdminController::class, "team_post"]);
Route::get('/fetchteam', [AdminController::class, 'fetchteam']);
Route::get('/edit_team/{id}', [AdminController::class, 'edit_team']);
Route::post('/updateteam/{id}', [AdminController::class, 'update_team']);
Route::get('/delete_team/{id}', [AdminController::class, 'delete_team']);
Route::get('/detail_team/{id}', [AdminController::class, 'detail_team']);

 //++++++++++winner Start+++++++++
 Route::get('/create-teacher',[AdminController::class, "addTeacher"])->name('addTeacher');
 Route::post('teacher-post',[AdminController::class, 'teacherPost'])->name('teacher.save');
 Route::get('teachers',[AdminController::class, 'viewAllTeachers'])->name('teacher.viewAllTeachers');
 
//+++++++++++++++++quiz work+++++++++++++++++++++++++++++++++++
//////////////// start course


Route::get('/view-all-course', [AdminController::class, 'viewCourses'])->name('admin.courses.viewCourses');
Route::get('create-course', [AdminController::class, 'createCourse'])->name('admin.courses.createCourse');
Route::post('store-course', [AdminController::class, 'storeCourse'])->name('admin.courses.storeCourse');
Route::get('/edit-course/{course}', [AdminController::class, 'editCourse'])->name('admin.courses.editCourse');
Route::post('/update-course/{course}', [AdminController::class, 'updateCourse'])->name('admin.courses.updateCourse');
Route::delete('/delete-course/{course}', [AdminController::class, 'destroyCourse'])->name('admin.courses.destroyCourse');


/////////////end course
 //++++++++++winner Start+++++++++
 Route::get('/winner_get',[AdminController::class, "winner_get"]);
 Route::post('/winner_post',[AdminController::class, "winner_post"]);
 Route::get('/fetchwinner', [AdminController::class, 'fetchwinner']);
 Route::get('/edit_winner/{id}', [AdminController::class, 'edit_winner']);
 Route::post('/updatewinner/{id}', [AdminController::class, 'update_winner']);
 Route::get('/delete_winner/{id}', [AdminController::class, 'delete_winner']);
 Route::get('/detail_winner/{id}', [AdminController::class, 'detail_winner']);
//+++++++++++++++++quiz work+++++++++++++++++++++++++++++++++++
//Category Start
Route::get('/categoryget', [AdminController::class, 'category_get']);
Route::post('/categorypost', [AdminController::class, 'category_post']);
Route::get('/categoryfetch', [AdminController::class, 'category_fetch']);
Route::get('/editcategory/{id}', [AdminController::class, 'edit_category']);
Route::post('/updatecategory/{id}', [AdminController::class, 'update_category']);
Route::get('/deletecategory/{id}', [AdminController::class, 'delete_category']);
//Category End

//AAdmintopic
Route::get('/topiccreateget', [AdminController::class, 'topicget']);
Route::post('/topiccreatepost', [AdminController::class, 'topicpost']);
Route::get('/fetchtopic', [AdminController::class, 'fetchtopic']);
Route::get('/topiceditget/{id}', [AdminController::class, 'topiceditget']);
Route::post('/topiceditpost/{id}', [AdminController::class, 'topiceditpost']);
Route::get('/topicdelete/{id}', [AdminController::class, 'topicdelete']);
//Admintopic

//grade Start
Route::get('/gradeget', [AdminController::class, 'grade_get']);
Route::post('/gradepost', [AdminController::class, 'grade_post']);
Route::get('/gradefetch', [AdminController::class, 'grade_fetch']);
Route::get('/editgrade/{id}', [AdminController::class, 'edit_grade']);
Route::post('/updategrade/{id}', [AdminController::class, 'update_grade']);
Route::get('/deletegrade/{id}', [AdminController::class, 'delete_grade']);
//grade End

//AAdminTest
Route::post('/subjecttest', [AdminController::class, 'subjecttest']);
Route::get('/testcreateget', [AdminController::class, 'testget']);
Route::post('/testcreatepost', [AdminController::class, 'testpost']);
Route::get('/fetchtest', [AdminController::class, 'fetchtest']);
Route::get('/testeditget/{id}', [AdminController::class, 'testeditget']);
Route::post('/testeditpost/{id}', [AdminController::class, 'testeditpost']);
Route::get('/testdelete/{id}', [AdminController::class, 'testdelete']);
Route::get("/apptest/{id}",[AdminController::class,'apptest']);
//AdminTest

//Question
Route::get('/quescreateget', [AdminController::class, 'quesget']);
Route::post('/quescreatepost', [AdminController::class, 'quespost']);
Route::get('/fetchques', [AdminController::class, 'fetchques']);
Route::get('/queseditget/{id}', [AdminController::class, 'queseditget']);
Route::post('/queseditpost/{id}', [AdminController::class, 'queseditpost']);
Route::get('/quesdelete/{id}', [AdminController::class, 'quesdelete']);
//Question


//Category Start
Route::get('/ucategoryfetch', [UserController::class, 'ucategory_fetch']);
//Category End

//AAdmintopic
Route::get('/utopiccreateget', [UserController::class, 'utopicget']);
Route::post('/utopiccreatepost', [UserController::class, 'utopicpost']);
Route::get('/ufetchtopic', [UserController::class, 'ufetchtopic']);
Route::get('/utopiceditget/{id}', [UserController::class, 'utopiceditget']);
Route::post('/utopiceditpost/{id}', [UserController::class, 'utopiceditpost']);
Route::get('/utopicdelete/{id}', [UserController::class, 'utopicdelete']);
//Admintopic

//grade Start
Route::get('/ugradefetch', [UserController::class, 'ugrade_fetch']);
//grade End

//AAdminTest
Route::post('/usubjecttest', [UserController::class, 'usubjecttest']);
Route::get('/utestcreateget', [UserController::class, 'utestget']);
Route::post('/utestcreatepost', [UserController::class, 'utestpost']);
Route::get('/ufetchtest', [UserController::class, 'ufetchtest']);
Route::get('/utesteditget/{id}', [UserController::class, 'utesteditget']);
Route::post('/utesteditpost/{id}', [UserController::class, 'utesteditpost']);
Route::get('/utestdelete/{id}', [UserController::class, 'utestdelete']);
//AdminTest

//Question
Route::get('/uquescreateget', [UserController::class, 'uquesget']);
Route::post('/uquescreatepost', [UserController::class, 'uquespost']);
Route::get('/ufetchques', [UserController::class, 'ufetchques']);
Route::get('/uqueseditget/{id}', [UserController::class, 'uqueseditget']);
Route::post('/uqueseditpost/{id}', [UserController::class, 'uqueseditpost']);
Route::get('/uquesdelete/{id}', [UserController::class, 'uquesdelete']);
//Question

//Answer
// Route::post('/subject', [AdminController::class, 'subject']);
// Route::post('/grade', [AdminController::class, 'grade']);
// Route::get('/anscreateget', [AdminController::class, 'ansget']);
// Route::post('/anscreatepost', [AdminController::class, 'anspost']);
// Route::get('/fetchans', [AdminController::class, 'fetchans']);
// Route::get('/anseditget/{id}', [AdminController::class, 'anseditget']);
// Route::post('/anseditpost/{id}', [AdminController::class, 'anseditpost']);
// Route::get('/ansdelete/{id}', [AdminController::class, 'ansdelete']);
//Answer

Route::get('testyourskill', [HomeController::class, 'testyourskill']);
Route::get('skilltest/{categoryname}/{id}/{grade}/{topic}', [HomeController::class, 'skilltest']);
Route::post('/submitquiz', [HomeController::class, 'submitquiz']);
Route::get('/quizresult', [HomeController::class, 'quizresult']);
Route::get('/stresultget', [UserController::class, 'client_resultget']);

//++++++++++++++++++++quiz end+++++++++++++++++++++++++++++++++++

//+++++++++++++++++++++++++++Story competition++++++++++++++++++
Route::get('/roundget', [AdminController::class, 'round_get']);
Route::post('/roundpost', [AdminController::class, 'round_post']);
Route::get('/roundfetch', [AdminController::class, 'round_fetch']);
Route::get('/editround/{id}', [AdminController::class, 'edit_round']);
Route::post('/updateround/{id}', [AdminController::class, 'update_round']);
Route::get('/deleteround/{id}', [AdminController::class, 'delete_round']);

Route::get('/compdetail', [UserController::class, 'compdetail']);

//+++round1
Route::get('/round1story', [UserController::class, 'round1story']);
Route::get('/round1story_get', [UserController::class, 'round1story_get']);
Route::post('/round1storycreatepost', [UserController::class, 'round1storycreatepost']);
Route::get('/editround1story/{id}', [UserController::class, 'editround1story']);
Route::post('/updateround1story/{id}', [UserController::class, 'updateround1story']);
Route::get('/deleteround1story/{id}', [UserController::class, 'deleteround1story']);
Route::get('/round1storydetail/{id}', [UserController::class, 'round1storydetail']);

Route::get('/adminround1storyfetch', [AdminController::class, 'adminround1storyfetch']);
Route::get('/adminround1storydetail/{id}', [AdminController::class, 'adminround1storydetail']);
Route::get("/approveround1story/{id}",[AdminController::class,'approveround1story']);
Route::get("/rejectround1story/{id}",[AdminController::class,'rejectround1story']);

//++++round2
Route::get('/round2story', [UserController::class, 'round2story']);
Route::get('/round2story_get', [UserController::class, 'round2story_get']);
Route::post('/round2storycreatepost', [UserController::class, 'round2storycreatepost']);
Route::get('/editround2story/{id}', [UserController::class, 'editround2story']);
Route::post('/updateround2story/{id}', [UserController::class, 'updateround2story']);
Route::get('/deleteround2story/{id}', [UserController::class, 'deleteround2story']);
Route::get('/round2storydetail/{id}', [UserController::class, 'round2storydetail']);

Route::get('/adminround2storyfetch', [AdminController::class, 'adminround2storyfetch']);
Route::get('/adminround2storydetail/{id}', [AdminController::class, 'adminround2storydetail']);
Route::get("/approveround2story/{id}",[AdminController::class,'approveround2story']);
Route::get("/rejectround2story/{id}",[AdminController::class,'rejectround2story']);

//++++round3
Route::get('/round3story', [UserController::class, 'round3story']);
Route::get('/round3story_get', [UserController::class, 'round3story_get']);
Route::post('/round3storycreatepost', [UserController::class, 'round3storycreatepost']);
Route::get('/editround3story/{id}', [UserController::class, 'editround3story']);
Route::post('/updateround3story/{id}', [UserController::class, 'updateround3story']);
Route::get('/deleteround3story/{id}', [UserController::class, 'deleteround3story']);
Route::get('/round3storydetail/{id}', [UserController::class, 'round3storydetail']);

Route::get('/adminround3storyfetch', [AdminController::class, 'adminround3storyfetch']);
Route::get('/adminround3storydetail/{id}', [AdminController::class, 'adminround3storydetail']);
Route::get("/approveround3story/{id}",[AdminController::class,'approveround3story']);
Route::get("/rejectround3story/{id}",[AdminController::class,'rejectround3story']);

//certificate
Route::get('/certificatefetch',[AdminController::class, "certificatefetch"]);
Route::post('/certificatecreatepost',[AdminController::class, "certificatecreatepost"]);
Route::get('/certificatedelete/{id}',[AdminController::class, "certificatedelete"]);
Route::post('/getcertificate',[AdminController::class,'getcertificate']);
Route::post('/certificateupdatepost',[AdminController::class, "certificateupdatepost"]);

Route::get('/changefetch', [AdminController::class, 'changefetch']);
Route::get('/change/{id}', [AdminController::class, 'change']);
Route::post('/updatechange/{id}', [AdminController::class, 'updatechange']);

//collaboration start
Route::get('/collab', [AdminController::class, 'collab_get']);
Route::post('/collabcreatepost', [AdminController::class, 'collab_post']);
Route::get('/fetchcollab', [AdminController::class, 'fetch_collab']);
Route::get('/editcollab/{id}', [AdminController::class, 'edit_collab']);
Route::post('/updatecollab/{id}', [AdminController::class, 'update_collab']);
Route::get('/deletecollab/{id}', [AdminController::class, 'delete_collab']);
Route::get('/detailcollab/{id}', [AdminController::class, 'collabdetail']);
//collaboration end

// teacher module
Route::get('/teacher-dashboard', [TeacherController::class, 'TeacherDashboard'])->name('TeacherDashboard');
Route::get('/student-list', [TeacherController::class, 'StudentList'])->name('StudentList');
Route::get('/courses-list', [TeacherController::class, 'CoursesList'])->name('CoursesList');
Route::get('/teacher-create-course', [TeacherController::class, 'TeacherCreateCourseForm'])->name('TeacherCreateCourseForm');
Route::post('/teacher-create-course-post', [TeacherController::class, 'TeacherCreateCoursePost'])->name('TeacherCreateCoursePost');

Route::get('/edit-teacher-course/{id}', [TeacherController::class, 'editTeacherCourseForm'])->name('teacher.courses.editTeacherCourseForm');
Route::post('/update-teacher-course/{id}', [TeacherController::class, 'updateTeacherCourse'])->name('teacher.courses.updateTeacherCourse');
Route::delete('/delete-teacher-course/{id}', [TeacherController::class, 'destroyTeacherCourse'])->name('teacher.courses.destroyTeacherCourse');


//end teacher module