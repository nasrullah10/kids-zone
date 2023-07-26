@extends("user.userlayout")
@section("title")
Edit| question
@endsection
@section("content")
<br>
<h1>Question Test</h1>
<br>

<form action="{{URL::to('/uqueseditpost/'.$updateques->id)}}"  method="post">
    @csrf
    <label style="font-weight: bold;">Test Id:</label>
    <select  name="updatetest" class="form-control" id="">
    <?php 
     $testsk = DB::table('admintesttbls')->where('id',$updateques->testid)->first();
    $skillname = DB::table('categorytbls')->where('id',$testsk->skillid)->first();
    $topicname = DB::table('topictbls')->where('id',$testsk->topicid)->first();
    $updateans = DB::table('answertbls')->where('quesid',$updateques->id)->first();
    ?>
        <option value="{{$updateques->testid}}">{{$updateques->testid}}   {{$topicname->name ?? ""}}  {{$skillname->category_name}}</option>
        @foreach($test as $t)
        <?php  
          $topicname = DB::table('topictbls')->where('id',$t->topicid)->first();
    $skillname = DB::table('categorytbls')->where('id',$t->skillid)->first();
    ?>
            <option value="{{$t->id}}">{{$t->id}}  {{$topicname->name ?? ""}} {{$skillname->category_name}}  </option>
            @endforeach
        </select>
         <br>


        <label style="font-weight: bold;">Question</label>
        <input type="text" class="form-control" rows="3" required placeholder="Enter Test Question" name="updateques" value="{{ $updateques->question }}">
        <br>
 
        <label style="font-weight: bold;">Option A</label>
        <input type="text" class="form-control" required placeholder="Enter Option A" name="updateopta" value="{{ $updateans->optionA ?? ''}}">
        <br>

        <label style="font-weight: bold;">Option B</label>
        <input type="text" class="form-control" required placeholder="Enter Option B" name="updateoptb" value="{{ $updateans->optionB ?? ''}}">
        <br>

        <label style="font-weight: bold;">Option C</label>
        <input type="text" class="form-control" required placeholder="Enter Option C" name="updateoptc" value="{{ $updateans->optionC ?? ''}}">
        <br>

        <label style="font-weight: bold;">Option D</label>
        <input type="text" class="form-control" required placeholder="Enter Option D" name="updateoptd" value="{{ $updateans->optionD ?? ''}}">
        <br>

        <label style="font-weight: bold;">Correct Answer</label>
        <input type="text" class="form-control" required placeholder="Enter Correct Answer" name="updatecorrect" value="{{ $updateans->correct_opt }}">
        <br>

        
        <label style="font-weight: bold;">Marks</label>
        <input type="number" class="form-control" required placeholder="Enter Marks" name="updatemarks" value="{{ $updateques->marks }}">
        <br>

        
     
        <button type="submit" class="btn btn-success form-control">Update</button>
        <br><br>
        <a href="/ufetchques" class="btn btn-info form control">Back</a>
</form>



@endsection
