@extends("admin.adminlayout")
@section("title")
Admin | Answer Edit
@endsection
@section("content")
<br>
<h1>Edit Answer</h1>
<br>

<form action="{{URL::to('/anseditpost/'.$updateans->id)}}"  method="post">
    @csrf

    <label style="font-weight: bold;">Subject</label>
        <select  name="insertskill" class="form-control" onchange="subject12()" id="subject">
          <option value="">Select Subject</option>
        @foreach($skills as $s)
            <option value="{{$s->id}}">{{$s->id}} {{$s->category_name}} </option>
            @endforeach
        </select>
        <br>

        <label style="font-weight: bold;">Grade & Topic</label>
        <select  name="insertskill" class="form-control" onchange="grade12()" id="grade">
          <option value="">Select Subject first</option>
        </select>
        <br>


   
        <label style="font-weight: bold;">Question Id</label>
        <select required name="insertques" class="form-control" id="question">
        <?php 
    $question1 = DB::table('questiontbls')->where('id',$updateans->quesid)->first();
    ?>
           <option value="{{$updateans->quesid}}">{{$updateans->quesid}}  {{$question1->question}}</option>
            <option value="">Select grade first</option>
       
        </select>
        <br>
 

        <label style="font-weight: bold;">Option A</label>
        <input type="text" class="form-control" required placeholder="Enter Option A" name="updateopta" value="{{ $updateans->optionA }}">
        <br>

        <label style="font-weight: bold;">Option B</label>
        <input type="text" class="form-control" required placeholder="Enter Option B" name="updateoptb" value="{{ $updateans->optionB }}">
        <br>

        <label style="font-weight: bold;">Option C</label>
        <input type="text" class="form-control" required placeholder="Enter Option C" name="updateoptc" value="{{ $updateans->optionC }}">
        <br>

        <label style="font-weight: bold;">Option D</label>
        <input type="text" class="form-control" required placeholder="Enter Option D" name="updateoptd" value="{{ $updateans->optionD }}">
        <br>

        <label style="font-weight: bold;">Correct Answer</label>
        <input type="text" class="form-control" required placeholder="Enter Correct Answer" name="updatecorrect" value="{{ $updateans->correct_opt }}">
        <br>

      
        <button type="submit" class="btn btn-success form-control">Update</button>
        <br><br>
        <a href="/fetchans" class="btn btn-info form control">Back</a>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    function subject12()
   {
    var subject = $("#subject option:selected").attr('value');
    console.log(subject);
    $("#grade").empty();
    $("#a4").hide();
    $.ajax({
        url:"/subject",
        type:"POST",
        data:"subject="+subject+
         '&_token={{csrf_token()}}',
         success:function(result)
        {
            $("#grade").append(result);

        },


    });
}

function grade12()
   {
    var grade = $("#grade option:selected").attr('value');
    console.log(grade);
    $("#question").empty();
    $("#a4").hide();
    $.ajax({
        url:"/grade",
        type:"POST",
        data:"grade="+grade+
         '&_token={{csrf_token()}}',
         success:function(result)
        {
            $("#question").append(result);

        },


    });
}
</script>

@endsection
