@extends("admin.adminlayout")
@section("title")
Admin | Topic Edit
@endsection
@section("content")
<br>
<h1>Edit Test</h1>
<br>

<script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>



<form action="{{URL::to('/topiceditpost/'.$updatetest->id)}}"  method="post">
    @csrf
    <label style="font-weight: bold;"> Subject:</label>
    <select  name="updateskill" class="form-control" id="">
    <?php 
    $skillname = DB::table('categorytbls')->where('id',$updatetest->skillid)->first();
    ?>
        <option value="{{$updatetest->skillid}}">{{$updatetest->skillid}}  {{$skillname->category_name}}</option>
        @foreach($skills as $s)
            <option value="{{$s->id}}">{{$s->id}} {{$s->category_name}} </option>
            @endforeach
        </select>
         <br>


        <label style="font-weight: bold;">Topic Name</label>
        <input type="text" class="form-control" required placeholder="Enter Topic Name" name="updatename" value="{{ $updatetest->name }}">
        <br>

        
       
       

        <button type="submit" class="btn btn-success form-control">Update</button>
        <br><br>
        <a href="/fetchtopic" class="btn btn-info form control">Back</a>
</form>


@endsection
