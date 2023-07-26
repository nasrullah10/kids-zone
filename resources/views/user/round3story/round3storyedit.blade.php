@extends("user.userlayout")
@section("title")
Edit-Story
@endsection
@section("content")
<br>
<h1>Edit Story</h1>
<br>

<form action="{{URL::to('/updateround3story/'.$update->id)}}" enctype="multipart/form-data" method="post">
    @csrf


    <label style="font-weight: bold;">Round:</label>
    <input class="form-control" readonly value="{{$firstround->round}}" rows="3" name="round3">
        <br>

        <label style="font-weight: bold;">Title:</label>
    <input class="form-control" readonly value="{{$firstround->title}}" rows="3" name="updatestorytitle">
        <br>


    <label style="font-weight: bold;">Category</label>
        <select name="updatestorytype" required class="form-control">
            <option value="{{ $update->type}}">{{ $update->type}}</option>
        @foreach($fetchcat as $id2)
            <option value="{{$id2->id}}">{{$id2->id}} {{$id2->category_name}} </option>
            @endforeach
        </select>
        <br>
        <label style="font-weight: bold;">Type:</label>
        <select name="updatetypef" required class="form-control" id="">
            <option  value="{{ $update->typefic}}">{{ $update->typefic}}</option>
           <option  value="Fiction">Fiction</option>
           <option  value="Non-Fiction">Non-Fiction</option>
        </select>
        <br>

        <label style="font-weight: bold;">Short Description:</label>
        <textarea class="form-control descriptionid" placeholder="Enter Short Description"  row="3" name="updatestoryshortdes">{{ $update->short_Des}}</textarea>
        <br>

        <label style="font-weight: bold;">Long Description:</label>
        <textarea class="form-control descriptionid" placeholder="Enter Long Description"  row="3" name="updatestorylongdes">{{ $update->long_Des}}</textarea>
        <br>

        <label style="font-weight: bold;">Video URL:</label>
        <input type="text" class="form-control"  placeholder="Enter Video URL" rows="3" name="updatestoryurl" value="{{ $update->video_url}}">
        <br>

        <label style="font-weight: bold;">Image:</label>
        <input type="file" class="form-control"  name="updatestoryimage">
        <br>
        @if($update->image!="null")
        <img src="/storyimages/{{ $update->image }}" width="100px">
        @endif
        <br>
        <br>

    <div>
        <button type="submit" class="btn btn-info form-control">Update</button>
        <a href="/round3story" class="btn btn-secondary">Back to List</a>
    </div>
</form>

<script src="/texteditor/texteditor.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: 'textarea.descriptionid',
    skin: 'bootstrap',
    plugins: 'lists, link, media',
    toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
    menubar: true,
});
</script>

@endsection
