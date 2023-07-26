@extends("admin.adminlayout")
@section("title")
Admin | Topic Create
@endsection
@section("content")
<br>
<h1>Topic Create</h1>
<br>

<script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>



<form action="{{URL::to('/topiccreatepost')}}" method="post">
    @csrf
   
        <label style="font-weight: bold;">Subject</label>
        <select required name="insertskill" class="form-control" id="">
          <option value="">Select Subject</option>
        @foreach($skills as $s)
            <option value="{{$s->id}}">{{$s->id}} {{$s->category_name}} </option>
            @endforeach
        </select>
        <br>

       
        <label style="font-weight: bold;">Topic name</label>
        <input type="text"  class="form-control"  required placeholder="Enter Topic Name"  rows="3" name="insertname">
        <br>
        
        <button type="submit" class="btn btn-info form-control">ADD</button>
        <br><br>
        <a href="/fetchtopic" class="btn btn-dark form-control">back</a>
</form>




@endsection
