@extends("userside.userlayout")
@section("title")
<head>
<title>Test Your Skills | Digital Kid Zone</title>
<meta name="description" content="Test Your Skills Page" />
<meta name="keywords" content="digitalkidzone" />

</head>
@endsection
@section("content")
<style>


body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin-top:20px;
  font-family: Raleway;
  padding: 40px;
  width: 100%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}



select {
  padding: 5px;
  width: 100%;
  border: 1px solid #aaaaaa;
}
textarea {
  padding: 5px;
  width: 100%;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

input.ab {
 margin-right:200px;
}

select.invalid {
  background-color: #ffdddd;
}

textarea.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}

#ab1 label {
  font-size: 24px;
  font-family: Raleway;
}

#ab2 label {
  font-size: 24px;
  font-family: Raleway;
}

#ab1 #p1 {
  margin-top :-3px;
  width: 30px;
  height: 20px;
}

#ab2 #c1 {
  margin-top :-3px;
  width: 30px;
  height: 20px;
}

#ab1{
  margin-top:5px;
}

#ab2{
  margin-top:5px;
}

#t1 
{
  height:30px;
  overflow:hidden;
  resize:none;
}

</style>
<!-- ============================ Page Title Start================================== -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">Quiz</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Quiz</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->			


<!-- ============================ Full Width Shop  ================================== -->

<br>
<br>
<?php
$time="";
?>
@if($ques!="" && $qcount>0)
@yield('scripts')
<dl class="dl-horizontal">
            <dt style="color:teal">
            <?php
            $course = DB::table('categorytbls')->where('id',$totalmcq->skillid)->first();
            ?>
           <h4 style="text-align:center;color:teal"> {{$course->category_name}}</h4>

            <?php
            $fetch = DB::table('admintesttbls')->where('skillid',$totalmcq->skillid)->first();
            $time = explode(':',$fetch->time_dur)
            ?>

<p class="text-right time">{{$fetch->time_dur}}</p>

          
            </dt>
</hr>
</dl>
<form   id="regForm" action="/submitquiz" method="post">
  @csrf
@foreach($ques as $q)
<div class="tab">

<h4>Q. {{$q->question}}</h4>
<input type="hidden" class="quesid" value="{{$q->id}}">
<input type="hidden" class="quesmark" value="{{$q->marks}}">
<br>
<?php
$option = DB::table('answertbls')->where('quesid',$q->id)->first();
?>
<input type="checkbox" id="a{{$q->id}}" class="opta{{$q->id}}" name="optionname1[]" value="{{$option->optionA}}">
<label for="a{{$q->id}}">{{$option->optionA}}</label><br>
<input type="checkbox" id="b{{$q->id}}" name="optionname2[]" class="optb{{$q->id}}" value="{{$option->optionB}}" >
<label for="b{{$q->id}}">{{$option->optionB}}</label><br>
<input type="checkbox" id="c{{$q->id}}" name="optionname3[]" class="optc{{$q->id}}" value="{{$option->optionC}}">
<label for="c{{$q->id}}">{{$option->optionC}}</label>
<br>
<input type="checkbox" id="d{{$q->id}}" name="optionname4[]" class="optd{{$q->id}}" value="{{$option->optionD}}">
<label for="d{{$q->id}}">{{$option->optionD}}</label>

<input type="hidden" class="correct" name="" value="{{$option->correct_opt}}">


<br>
 
    </div>
    @endforeach
<input type="hidden" class="selectedoption" name="selectedoption" value="">
<input type="hidden" class="selectedquestion" name="selectedquestion" value="">
<input type="hidden" class="totalsum" name="studentmarks" value="">
<input type="hidden" class="correctanswer" name="correctanswer" value="">
<input type="hidden" class="totalquestion" name="totalquestion" value="{{$totalmcq->total_mcq}}">
<input type="hidden" class="totalmarks" name="totalmarks" value="{{$totalmcq->total_marks}}">
<input type="hidden" class="passmarks" name="passmarks" value="{{$totalmcq->pass_marks}}">
<input type="hidden" class="grade" name="grade" value="{{$totalmcq->grade}}">
<input type="hidden" class="skillid" name="skillid" value="{{$totalmcq->skillid}}">
<input type="hidden" class="attemptquestion" name="attemptquestion" value="">
    </form>
    <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
  @foreach($ques as $q)
    <span class="step"></span>
    @endforeach
  </div>
@endif



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    sum1 = 0;
    var selectedOption = [], selectedQuestion = [], checkoption=0,correctanswer=0,attemptquestion=0;

    $("input:checkbox").change(function(){
    var1 = $(this).val();
    var correct = $(this).closest('.tab').find('.correct').val();
    var qid = $(this).closest('.tab').find('.quesid').val();
    var qmark1 = $(this).closest('.tab').find('.quesmark').val();
    var qmark = parseInt(qmark1);
    var curclass = this.className;
    attemptquestion = attemptquestion+1;
    for(var i=0;i<selectedOption.length;i++)
    {
        if(selectedQuestion[i]==qid)
        {
          
            if(selectedOption[i]==var1)
            {
              attemptquestion = attemptquestion-1;
                 checkoption = 1;
                 break;
            }
            else
            {
              attemptquestion = attemptquestion-1;
                if(selectedOption[i]==correct)
                {
                    sum1 = sum1-qmark;
                    correctanswer = correctanswer-1;
                }
                if(var1==correct)
                {
                    sum1 = sum1+qmark;
                    correctanswer = correctanswer+1;
                }
                checkoption = 1;
                selectedOption[i]=var1;
                break;
            }
           
        }
        else
        {
            checkoption = 0;
        }
    }
    if(checkoption==0)
    {
        if(var1==correct)
        {
            sum1 = sum1+qmark;
            correctanswer = correctanswer+1;
        }
        selectedOption.push(var1) //option;
        selectedQuestion.push(qid) //1; //1)option1 2)option2
    }
    // for(var i=0;i<selectedOption.length;i++)
    // {
     
     
    //   $('.abc').val(selectedOption[i]);
    //     alert(selectedOption[i] +selectedQuestion[i])
    // }
    $('.selectedoption').val(selectedOption);
    $('.selectedquestion').val(selectedQuestion);
    $('.totalsum').val(sum1);
    $('.correctanswer').val(correctanswer);
    $('.attemptquestion').val(attemptquestion);
    
    
    var a = 'opta'+qid;
   var b = 'optb'+qid;
   var c = 'optc'+qid;
   var d = 'optd'+qid;
    if(a==curclass)
    {   
    
        $('.opta'+qid).prop("checked", true);
        $('.optb'+qid).prop("checked", false);
        $('.optc'+qid).prop("checked", false);
        $('.optd'+qid).prop("checked", false);
    }
    else if(b==curclass)
    {   
     
        $('.opta'+qid).prop("checked", false);
        $('.optb'+qid).prop("checked", true);
        $('.optc'+qid).prop("checked", false);
        $('.optd'+qid).prop("checked", false);
    }
    else if(c==curclass) 
    {   
        $('.opta'+qid).prop("checked", false);
        $('.optb'+qid).prop("checked", false);
        $('.optc'+qid).prop("checked", true);
        $('.optd'+qid).prop("checked", false);
    }
    else if(d==curclass)
    {   
        $('.opta'+qid).prop("checked", false);
        $('.optb'+qid).prop("checked", false);
        $('.optc'+qid).prop("checked", false);
        $('.optd'+qid).prop("checked", true);
    }

    
    // $(".ques").html(qid);
    // $(".name1").html(var1);
    $(".sum").html(sum1);
   
});

</script>




<script>
 $(document).ready(function(){

  var time = @json($time);
  
  
  $('.time').text(time[0]+':'+time[1]+':00 left time');

  var seconds = 59;
  var hours = time[0];//5
  var minutes = time[1]-1;//0
  var timer = setInterval(() => {

    if(hours == 0 && minutes == 0 && seconds == 0)
    {
      clearInterval(timer);
      $('#regForm').submit();
    }
// console.log(hours+"-:-"+minutes+"-:-"+seconds);
    if(seconds <=0) {
      minutes--;
      seconds = 59;   
    }

    if(minutes <0 && hours != 0) {
      hours--;
      minutes = 59;
      seconds = 59;
      
    }
    
    let tempHours = hours.toString().length > 1? hours:'0'+hours;
    let tempMinutes = minutes.toString().length > 1? minutes:'0'+minutes;
    let tempSeconds = seconds.toString().length > 1? seconds:'0'+seconds;


    $('.time').text(tempHours+':'+tempMinutes+':'+tempSeconds+ ' left time');
    seconds--;
    
  }, 1000);

 });
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
    
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  if (n == 1 && !validateForm1()) return false;
  
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x,i,valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("select");
  
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
 
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
   
        document.getElementsByClassName("step")[currentTab].className += " finish";
   
  }
  return valid;
  

 
}

function validateForm1() {
  // This function deals with validation of the form fields
  var c,j,z,valid1=true;
 c = document.getElementsByClassName("tab");
 z = c[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
 

  for (j = 0; j < z.length;j++) {
    // If a field is empty...
   
    if (z[j].value == "") {
      // add an "invalid" class to the field:
      z[j].className += " invalid";
      // and set the current valid status to false
      valid1 = false;
    }
  
}
  // If the valid status is true, mark the step as finished and valid:
  if (valid1) {
   
        document.getElementsByClassName("step")[currentTab].className += " finish";
   
  }
  return valid1;
  

 
}



function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

<script>


</script>


@endsection