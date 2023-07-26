@extends("admin.adminlayout")
@section("title")
Admin | Edit-winner
@endsection
@section("content")
<br>
<h1>Edit winner</h1>
<br>

<form action="{{URL::to('/updatewinner/'.$update_winner->id)}}" enctype="multipart/form-data" method="post">
    @csrf



      
        <label style="font-weight: bold;">Select Winner Name:</label>
        <select name="updatewinnertitle" required class="form-control suitid" id="">
            <?php
            $user = DB::table('users')->where('id',$update_winner->userid)->first();
            ?>
            <option class="districtid" value="">{{ $update_winner->userid }} {{ $user->firstname }}</option>
           
        @foreach($users as $id2)
            <option value="{{$id2->id}}">{{$id2->id}} {{$id2->firstname}} {{$id2->lastname}} </option>
            @endforeach
        </select>
        <br>

        <label style="font-weight: bold;">Short Description:</label>
        <textarea class="form-control descriptionid1" row="2"  name="updatewinnershortdes" >{{ $update_winner->short_Des }}</textarea>
       <br>

       <label style="font-weight: bold;">Position:</label>
       <input class="form-control" required placeholder="Enter Title" rows="3" name="updatewinnerposition" value="{{ $update_winner->position }}">
       <br>

       <label style="font-weight: bold;">Participated At:</label>
       <input class="form-control" required placeholder="Enter Title" rows="3" name="updatewinnerpart" value="{{ $update_winner->part }}">
       <br>

       <label style="font-weight: bold;">Link:</label>
       <input class="form-control" required placeholder="Enter Title" rows="3" name="updatewinnerlink" value="{{ $update_winner->link }}">
       <br>


        <input type="file" class="form-control"  name="updatewinnerimage">
        <img src="/winnerimages/{{ $update_winner->image }}" width="200px"; height="150px">
        <br>

        <button type="submit" class="btn btn-info form-control">Update</button>
        <br><br>
        <a href="/fetchwinner" class="btn btn-dark form-control">back</a>
</form>


<script src="/texteditor/texteditor.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea.descriptionid1',
        skin: 'bootstrap',
        plugins: 'lists, link, media',
        toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
        menubar: true,
    });
</script>
@endsection
