@extends("admin.adminlayout")
@section("title")
Admin | Update-Article
@endsection
@section("content")
<br>
<h1>Edit Article</h1>
<br>

<form action="{{URL::to('/updatearticle/'.$update_article->id)}}" enctype="multipart/form-data" method="post">
    @csrf

        <label style="font-weight: bold;">Category</label>
        <select name="updatearticletype" class="form-control">

        @foreach($fetchcat as $id2)
            <option value="{{$id2->id}}">{{$id2->id}} {{$id2->category_name}} </option>
            @endforeach
        </select>
        <br>

        <label style="font-weight: bold;">Headline:</label>
        <input class="form-control" required placeholder="Enter Headline" rows="3" name="updatearticleheadline" value="{{ $update_article->headline }}">
        <br>

        <label style="font-weight: bold;">Date:</label>
        <input type="date" class="form-control" required placeholder="Enter Type" rows="3" name="updatearticledate" value="{{ $update_article->art_date}}">
        <br>

        <label style="font-weight: bold;">Short Description:</label>
        <textarea class="form-control description2" placeholder="Enter Short Description" rows="3" name="updatearticleshortdes">{{ $update_article->short_Des}}</textarea>
        <br>

        <label style="font-weight: bold;">Long Description:</label>
        <textarea class="form-control description2" placeholder="Enter Long Description" rows="3" name="updatearticlelongdes">{{ $update_article->long_des}}</textarea>
        <br>

        <label style="font-weight: bold;">Video URL:</label>
        <input type="text" class="form-control"  placeholder="Enter Video URL" rows="3" name="updatearticleurl" value="{{ $update_article->video_url}}">
        <br>

        <input type="file" class="form-control"  name="updatearticleimage">
        @if($update_article->image!="null")
        <img src="/articleimages/{{ $update_article->image }}" width="100px"; >
        @endif
        <br><br>

        <button type="submit" class="btn btn-outline-success form-control">Update</button>
        <br><br>
        <a href="/fetcharticle" class="btn btn-outline-dark form-control">Back</a>
</form>

<script src="/texteditor/texteditor.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea.description2',
        skin: 'bootstrap',
        plugins: 'lists, link, media',
        toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
        menubar: true,
    });
</script>



@endsection
