@extends("user.userlayout")
@section("title")
Article
@endsection
@section("content")
<br>
<h1>Add Article</h1>
<br>

@if (session('mesg'))
<div class="alert alert-primary" role="alert">
    <strong>{{session('mesg')}}</strong>
</div>
@endif


<form action="{{URL::to('/uarticlecreatepost')}}" enctype="multipart/form-data" method="post">
    @csrf



    <label style="font-weight: bold;">Category:</label>
    <select name="insertarticletype" class="form-control" id="">
        <option id="coursedd" value="">Select Category</option>
    @foreach($fetcharticle as $id1)
        <option value="{{$id1->id}}">{{$id1->id}}. {{$id1->category_name}} </option>
        @endforeach
    </select>
   <br>


        <label style="font-weight: bold;">Headline:</label>
        <input class="form-control" required placeholder="Enter Headline" rows="3" name="insertarticleheadline">
        <br>

        <label style="font-weight: bold;">Date:</label>
        <input type="date" class="form-control" required placeholder="Enter Type" rows="3" name="insertarticledate">
        <br>

        <label style="font-weight: bold;">Short Description:</label>
        <textarea class="form-control description1" placeholder="Enter Short Description" rows="3" name="insertarticleshortdes"></textarea>
        <br>

        <label style="font-weight: bold;">Long Description:</label>
        <textarea class="form-control description1" placeholder="Enter Long Description" rows="3" name="insertarticlelongdes"></textarea>
        <br>

        <label style="font-weight: bold;">Image:</label>
        <input type="file" class="form-control"  name="insertarticleimage">
        <br>

        <label style="font-weight: bold;">Video URL:</label>
        <input type="url" class="form-control"  placeholder="Enter Video URL" rows="3" name="insertarticleurl">
        <br>

        <button type="submit" class="btn btn-outline-info form-control">SUBMIT</button>
        <br><br>
        <a href="/ufetcharticle" class="btn btn-outline-dark form-control">Back</a>
</form>


<script src="/texteditor/texteditor.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea.description1',
        skin: 'bootstrap',
        plugins: 'lists, link, media',
        toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
        menubar: true,
    });
</script>

@endsection
