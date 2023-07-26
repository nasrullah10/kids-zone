@extends("user.userlayout")
@section("title")
Create| test
@endsection
@section("content")
<br>
<h1>Test Create</h1>
<br>

<script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>



<form action="{{URL::to('/utestcreatepost')}}" method="post">
    @csrf
   
    <label style="font-weight: bold;">Subject</label>
        <select required name="insertskill" class="form-control" onchange="subject12()" id="subject">
          <option value="">Select Subject</option>
        @foreach($skills as $s)
            <option value="{{$s->id}}">{{$s->id}} {{$s->category_name}} </option>
            @endforeach
        </select>
        <br>

        <label style="font-weight: bold;">Topic</label>
        <select required name="inserttopic" class="form-control" id="topic">
          <option value="">Select Subject first</option>
        </select>
        <br>

        <label style="font-weight: bold;">Grade</label>
        <select required name="insertgrade" class="form-control" id="">
          <option value="">Select</option>
        @foreach($grade as $s)
            <option value="{{$s->id}}">{{$s->id}} {{$s->grade}} </option>
            @endforeach
        </select>
        <br>

        <label style="font-weight: bold;">Test Duration</label>
        <input type="text" id="time" class="form-control"  required placeholder="Enter Test Duration"  rows="3" name="insertdur">
        <br>
        
        <label style="font-weight: bold;">Total Mcqs</label>
        <input type="number" class="form-control" required placeholder="Enter Total MCQS" rows="3" name="insertmcq">
        <br>

        <label style="font-weight: bold;">Total Marks</label>
        <input type="number" class="form-control" required placeholder="Enter Total Marks" rows="3" name="insertmarks">
        <br>

        <label style="font-weight: bold;">Passing Marks</label>
        <input type="number" class="form-control" required placeholder="Enter Passing Marks" rows="3" name="insertpmarks">
        <br>




        <button type="submit" class="btn btn-info form-control">ADD</button>
        <br><br>
        <a href="/ufetchtest" class="btn btn-dark form-control">back</a>
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
        url:"/usubjecttest",
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
