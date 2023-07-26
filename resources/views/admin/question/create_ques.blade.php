@extends("admin.adminlayout")
@section("title")
Admin | Question Create
@endsection
@section("content")
<br>
<h1>Question Create</h1>
<br>

<form action="{{URL::to('/quescreatepost')}}" method="post">
    @csrf
   
        <label style="font-weight: bold;">Test Id</label>
        <select name="inserttest" class="form-control" id="">
        @foreach($test as $t)
        <?php 
    $skillname = DB::table('categorytbls')->where('id',$t->skillid)->first();
    $gradename = DB::table('gradetbls')->where('id',$t->grade)->first();
    $topicname = DB::table('topictbls')->where('id',$t->topicid)->first();
    ?>
            <option value="{{$t->id}}">{{$t->id}} {{$skillname->category_name ?? ""}} {{$topicname->name ?? ""}} {{$gradename->grade ?? ""}} </option>
            @endforeach
        </select>
        <br>

        <label style="font-weight: bold;">Question</label>
        <input type="text" class="form-control" rows="3" required placeholder="Enter Test Question" rows="3" name="insertques">
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
        
        <label style="font-weight: bold;">Marks</label>
        <input type="number" class="form-control" required placeholder="Enter marks" rows="3" name="insertmarks">
        <br>

      

        <button type="submit" class="btn btn-info form-control">ADD</button>
        <br><br>
        <a href="/fetchques" class="btn btn-dark form-control">back</a>
</form>

@endsection
