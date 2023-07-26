@extends("admin.adminlayout")
@section("title")
Admin | Fetch-Media
@endsection
@section("content")
<br>
<h1>Edit Media</h1>
<br>

<form action="{{URL::to('/update/'.$update->id)}}" enctype="multipart/form-data" method="post">
    @csrf

        <label style="font-weight: bold;">Category</label>
        <select name="updatemediatype" class="form-control">

        @foreach($fetchmed as $id2)
            <option value="{{$id2->id}}">{{$id2->id}} {{$id2->category_name}} </option>
            @endforeach
        </select>
        <br>

        <label style="font-weight: bold;">Headline:</label>
        <input class="form-control" required placeholder="Enter Headline" rows="3" name="updatemediaheadline" value="{{ $update->headline }}">
        <br>

        <label style="font-weight: bold;">Date:</label>
        <input type="date" class="form-control" required placeholder="Enter Type" rows="3" name="updatemediadate" value="{{ $update->media_date}}">
        <br>

        <label style="font-weight: bold;">Short Description:</label>
        <textarea class="form-control descriptionid1" row="2"  name="updatemediashortdes" >{{ $update->short_Des }}</textarea>
        <br>

        <label style="font-weight: bold;">Long Description:</label>
        <textarea class="form-control descriptionid1" row="2"  name="updatemedialongdes" >{{ $update->long_des }}</textarea>
        <br>

        <label style="font-weight: bold;">Video URL:</label>
        <input class="form-control"  placeholder="Enter Video URL" rows="3" name="updatemediavideourl" value="{{ $update->video_url }}">
        <br>

        <input type="file" class="form-control"  name="updatemediaimage">
        @if($update->image_video!="null")
        <img src="/mediaimages/{{ $update->image_video }}" width="200px"; height="150px">
        @endif
        <br>

        <button type="submit" class="btn btn-info form-control">Update</button>
        <br><br>
        <a href="/fetchmedia" class="btn btn-dark form-control">back</a>
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
