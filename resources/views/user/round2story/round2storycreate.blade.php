@extends("user.userlayout")
@section("title")
Create-round2 Story
@endsection
@section("content")
<br>
<h1>Story Add</h1>
<br>

<form action="{{URL::to('/round2storycreatepost')}}" enctype="multipart/form-data" method="post">
    @csrf

    <label style="font-weight: bold;">Round:</label>
    <input class="form-control" readonly value="{{$firstround->round}}" rows="3" name="round2">
        <br>

        <label style="font-weight: bold;">Title:</label>
    <input class="form-control" readonly value="{{$firstround->title}}" rows="3" name="insertstorytitle">
        <br>

        <label style="font-weight: bold;">Category:</label>
        <select name="insertstorytype" class="form-control" id="">
            <option id="coursedd" value="">Select Category</option>
            @foreach($fetchcat as $id1)
            <option value="{{$id1->id}}">{{$id1->id}} {{$id1->category_name}} </option>
            @endforeach
        </select>
        <br>

        <label style="font-weight: bold;">Type:</label>
        <select name="inserttypef" required class="form-control" id="">
            <option  value="">Select Type</option>
           <option  value="Fiction">Fiction</option>
           <option  value="Non-Fiction">Non-Fiction</option>
        </select>
        <br>



        <label style="font-weight: bold;">Short Description:</label>
        <textarea class="form-control descriptionid1" placeholder="Enter Short Description"  row="3" name="insertstoryshortdes"></textarea>
        <br>

        <label style="font-weight: bold;">Long Description:</label>
        <textarea class="form-control descriptionid1" placeholder="Enter Long Description"  row="3" name="insertstorylongdes"></textarea>
        <br>

        <input type="file" class="form-control"  name="insertstoryimage">
        <br>

        <label style="font-weight: bold;">Video URL:</label>
        <input type="url" class="form-control"  placeholder="Enter Video URL" rows="3" name="insertstoryurl">
        <br>

        <button type="submit" class="btn btn-info ">ADD</button>
        <a href="/round2story" class="btn btn-secondary">Back to List</a>
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
