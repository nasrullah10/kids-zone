@extends("admin.adminlayout")
@section("title")
Admin | Test Edit
@endsection
@section("content")
<br>
<h1>Edit Test</h1>
<br>

<script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>



<form action="{{URL::to('/testeditpost/'.$updatetest->id)}}"  method="post">
    @csrf
    <label style="font-weight: bold;"> Subject:</label>
    <select  name="updateskill" class="form-control" required  onchange="subject12()" id="subject" >
    <?php 
    $skillname = DB::table('categorytbls')->where('id',$updatetest->skillid)->first();
    ?>
        <option value="{{$updatetest->skillid}}">{{$updatetest->skillid}}  {{$skillname->category_name}}</option>
        @foreach($skills as $s)
            <option value="{{$s->id}}">{{$s->id}} {{$s->category_name}} </option>
            @endforeach
        </select>
         <br>

         <label style="font-weight: bold;">Topic</label>
        <select  name="updatetopic" required class="form-control" id="topic">

            <?php 
                $topicname = DB::table('topictbls')->where('id',$updatetest->topicid)->first();
                ?>
        <option value="{{$updatetest->topicid}}">{{$updatetest->topicid}}  {{$topicname->name}}</option>
        </select>
        <br>

         <label style="font-weight: bold;">Grade</label>
        <select name="insertgrade" required class="form-control" id="">
        <?php 
    $skillname = DB::table('gradetbls')->where('id',$updatetest->grade)->first();
    ?>
        <option value="{{$updatetest->grade}}">{{$updatetest->grade}}  {{$skillname->grade}}</option>
        @foreach($grade as $s)
            <option value="{{$s->id}}">{{$s->id}} {{$s->grade}} </option>
            @endforeach
        </select>
        <br>


        <label style="font-weight: bold;">Test Duration</label>
        <input type="text" id="time" class="form-control" required placeholder="Enter Test Duration" name="updatedur" value="{{ $updatetest->time_dur }}">
        <br>

        
        <label style="font-weight: bold;">Total MCQ</label>
        <input type="number" class="form-control" required placeholder="Enter Total MCQS Duration" name="updatemcq" value="{{ $updatetest->total_mcq }}">
        <br>

        
        <label style="font-weight: bold;">Total Marks</label>
        <input type="number" class="form-control" required placeholder="Enter Total Marks" name="updatemarks" value="{{ $updatetest->total_marks }}">
        <br>

        
        <label style="font-weight: bold;">Psssing Marks</label>
        <input type="number" class="form-control" required placeholder="Enter Passing Marks" name="updatepmarks" value="{{ $updatetest->pass_marks }}">
        <br>
       

        <button type="submit" class="btn btn-success form-control">Update</button>
        <br><br>
        <a href="/fetchtest" class="btn btn-info form control">Back</a>
</form>
<script>
    var timepicker = new TimePicker('time', {
      lang: 'en',
      theme: 'dark'
    });
    timepicker.on('change', function(evt) {
      
      var value = (evt.hour || '00') + ':' + (evt.minute || '00');
      evt.element.value = value;
    
    });
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    function subject12()
   {
    var subject = $("#subject option:selected").attr('value');
    console.log(subject);
    $("#topic").empty();
    $("#a4").hide();
    $.ajax({
        url:"/subjecttest",
        type:"POST",
        data:"subject="+subject+
         '&_token={{csrf_token()}}',
         success:function(result)
        {
            $("#topic").append(result);

        },


    });
}
</script>

@endsection
