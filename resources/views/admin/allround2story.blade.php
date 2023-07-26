@extends("admin.adminlayout")
@section("title")
Admin | Round 2 Stories
@endsection
@section("content")

<br><br>
<h2 style="color:teal">Round 2 Stories</h2>
<br>
<p>

</p>

<table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">Posted by</th>
      <th scope="col">Subject</th>
      <th scope="col">Title</th>
      <th scope="col">Type</th>
      <th scope="col">Video Link</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col" colspan="3">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($fetchstory as $fs)
   <tr>
    <?php
    $topic = DB::table('allcategorytbls')->where('id',$fs->type)->first();
       $user = DB::table('users')->where('id',$fs->userid)->first();
    ?>
     <td>
      @if($user)
      {{ $user->firstname }}
    @else
    null
    @endif
    </td>
    <td>
    @if($topic)
      {{ $topic->category_name }}
    @else
    null
    @endif
    </td>
    <td>{{ $fs->Title }}</td>
    <td>{{ $fs->typefic }}</td>
   <td>{{ $fs->video_url }}</td>
    <td>
    @if($fs->image!="null")
      <img src="storyimages/{{ $fs->image }}" width="100px">
      @else
      null
      @endif
    </td>
    @if($fs->status ==0)
    <td><a href="/approveround2story/{{$fs->id}}" class="btn btn-outline-info">Approve..</a>
    <a href="/rejectround2story/{{$fs->id}}" class="btn btn-outline-danger">Reject..</a></td>
    @elseif($fs->status==1)
    <td><button class="btn btn-success" disabled>Selected</button></td>
    @elseif($fs->status==2)
    <td><button class="btn btn-danger" disabled>Rejected</button></td>
    @endif
   <td><button data-toggle="modal" data-id="{{$fs->id}}" data-target="#modelId{{$fs->id}}" class="btn btn-warning text-white">Detail</button></td>
   </tr>
   <div class="modal fade" id="modelId{{$fs->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" style="color:teal">Story Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
             </div>
                        <div class="modal-body">
                      
            <dt style="color:teal">
            Type
            </dt>
            <dd>
                <?php
                $topic = DB::table('allcategorytbls')->where('id',$fs->type)->first();
                 ?>
             {{ $topic->category_name }}
            </dd>
            <br>
            <dt style="color:teal">
            Title
            </dt>
            <dd>
            {{$fs->Title}}
            </dd>
            <br>
            <dt style="color:teal">
            Short Description
            </dt>
            <dd>
                {!! html_entity_decode($fs->short_Des) !!}
            </dd>
            <br>
            <dt style="color:teal">
            Long Description
            </dt>
            <dd>
                {!! html_entity_decode($fs->long_Des) !!}
            </dd>
            <br>
           

            <dt style="color:teal">
            Video Link
            </dt>
            <dd>
            {{$fs->video_url}}
            </dd>
            <br>

            @if($fs->image!="null")
            <dt style="color:teal">
            Image
            </dt>
            <dd>
            <img src="/storyimages/{{$fs->image}}" alt="storyimages" style="height:100px">
            </dd>
            @endif
            <br>
            <hr/>


                       </div>

                   

                   
                </div>
                <hr>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <hr>
            </div>
        </div>
    
   @endforeach
  </tbody>
</table>

{!! $fetchstory->links() !!}



@endsection
