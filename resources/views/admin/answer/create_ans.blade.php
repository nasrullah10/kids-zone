@extends("admin.adminlayout")
@section("title")
Admin | Answer Create
@endsection
@section("content")
<br>
<h1>Answer Create</h1>
<br>

<form action="{{URL::to('/anscreatepost')}}" method="post">
    @csrf

       <label style="font-weight: bold;">Subject</label>
        <select required name="insertskill" class="form-control" onchange="subject12()" id="subject">
          <option value="">Select Subject</option>
        @foreach($skills as $s)
            <option value="{{$s->id}}">{{$s->id}} {{$s->category_name}} </option>
            @endforeach
        </select>
        <br>

        <label style="font-weight: bold;">Grade & Topic</label>
        <select required name="insertskill" class="form-control" onchange="grade12()" id="grade">
          <option value="">Select Subject first</option>
        </select>
        <br>


   
        <label style="font-weight: bold;">Question Id</label>
        <select required name="insertques" class="form-control" id="question">
            <option value="">Select grade first</option>
       
        </select>
        <br>

        <label style="font-weight: bold;">Option A</label>
        <input type="text" class="form-control" required placeholder="Enter Option A" rows="3" name="insertopta">
        <br>

        <label style="font-weight: bold;">Option B</label>
        <input type="text" class="form-control" required placeholder="Enter Option B" rows="3" name="insertoptb">
        <br>

        <label style="font-weight: bold;">Option C</label>
        <input type="text" class="form-control" required placeholder="Enter Option C" rows="3" name="insertoptc">
        <br>

        <label style="font-weight: bold;">Option D</label>
        <input type="text" class="form-control" required placeholder="Enter Option D" rows="3" name="insertoptd">
        <br>

        <label style="font-weight: bold;">Correct Answer</label>
        <input type="text" class="form-control" required placeholder="Enter Correct Answer" rows="3" name="insertcorrect">
        <br>
        
       
        <button type="submit" class="btn btn-info form-control">ADD</button>
        <br><br>
        <a href="/fetchans" class="btn btn-dark form-control">back</a>
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
