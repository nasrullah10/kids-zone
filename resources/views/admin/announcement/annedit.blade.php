@extends("admin.adminlayout")
@section("title")
Admin | Edit-Announcement
@endsection
@section("content")
<br>
<h1>Edit Announcement</h1>
<br>

<form action="{{URL::to('/updateann/'.$updateann->id)}}" enctype="multipart/form-data" method="post">
    @csrf


        <label style="font-weight: bold;">Category</label>
        <select name="updateanntype" required class="form-control">

        @foreach($fetchan as $id2)
            <option value="{{$id2->id}}">{{$id2->id}} {{$id2->category_name}} </option>
            @endforeach
        </select>
        <br>

        <label style="font-weight: bold;">Headline:</label>
        <input class="form-control" required placeholder="Enter Headline" rows="3" name="updateannheadline" value="{{ $updateann->headline }}">
        <br>

        <label style="font-weight: bold;">Date:</label>
        <input type="date" class="form-control" required placeholder="Enter Type" rows="3" name="updateanndate" value="{{ $updateann->a_date}}">
        <br>

        <label style="font-weight: bold;">Short Description:</label>
        <textarea class="form-control descriptionid1"  row="2" name="updateannshortdes">{{ $updateann->short_Des}}</textarea>
        <br>

        <label style="font-weight: bold;">Long Description:</label>
        <textarea class="form-control descriptionid1"  row="2" name="updateannlongdes">{{ $updateann->long_des}}</textarea>
        <br>

        <label style="font-weight: bold;">Video URL:</label>
        <input type="text" class="form-control"  placeholder="Enter Video URL" rows="3" name="updateannurl" value="{{ $updateann->video_url}}">
        <br>

        <label style="font-weight: bold;">Image:</label>
        <input type="file" class="form-control"  name="updateannimage">
        <br>
        <img src="/annimages/{{ $updateann->image }}" width="100px";>
        <br>
        <br>

        <button type="submit" class="btn btn-info form-control">Update</button>
        <br>
        <br>
        <a href="/fetchann" class="btn btn-dark form-control">Back</a>
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
