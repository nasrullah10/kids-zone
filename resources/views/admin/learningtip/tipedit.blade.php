@extends("admin.adminlayout")
@section("title")
Admin | Edit-tip
@endsection
@section("content")
<br>
<h1>Edit Learning tip</h1>
<br>

<form action="{{URL::to('/adminupdatetip/'.$update->id)}}" enctype="multipart/form-data" method="post">
    @csrf


        <label style="font-weight: bold;">Category</label>
        <select name="updatetiptype" required class="form-control">
            <option value="{{ $update->type}}">{{ $update->type}}</option>
        @foreach($fetchcat as $id2)
            <option value="{{$id2->id}}">{{$id2->id}} {{$id2->category_name}} </option>
            @endforeach
        </select>
        <br>
       

        <label style="font-weight: bold;">Title:</label>
        <input class="form-control" required placeholder="Enter title" rows="3" name="updatetiptitle" value="{{ $update->Title}}">
        <br>

        <label style="font-weight: bold;">Short Description:</label>
        <textarea class="form-control descriptionid" placeholder="Enter Short Description"  row="3" name="updatetipshortdes">{{ $update->short_Des}}</textarea>
        <br>

        <label style="font-weight: bold;">Long Description:</label>
        <textarea class="form-control descriptionid" placeholder="Enter Long Description"  row="3" name="updatetiplongdes">{{ $update->long_Des}}</textarea>
        <br>

        <label style="font-weight: bold;">Video URL:</label>
        <input type="text" class="form-control"  placeholder="Enter Video URL" rows="3" name="updatetipurl" value="{{ $update->video_url}}">
        <br>

        <label style="font-weight: bold;">Image:</label>
        <input type="file" class="form-control"  name="updatetipimage">
        <br>
        @if($update->image!="null")
        <img src="/tipimages/{{ $update->image }}" width="100px">
        @endif
        <br>
        <br>

    <div>
        <button type="submit" class="btn btn-info form-control">Update</button>
        <a href="/admintip" class="btn btn-secondary">Back to List</a>
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
