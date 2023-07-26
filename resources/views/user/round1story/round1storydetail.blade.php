@extends("user.userlayout")
@section("title")
Edit-Round1 Story
@endsection
@section("content")
<br>
<br>

            <h2>Story Detail</h2>
            <hr />
            @foreach($detail as $d)
        <dl class="dl-horizontal">
            <dt style="color:teal">
            Type
            </dt>
            <dd>
                <?php
                $topic = DB::table('allcategorytbls')->where('id',$d->type)->first();
                 ?>
             <td>{{ $topic->category_name }}</td>
            </dd>
            <br>
            </dd>
            <br>
            <dt style="color:teal">
            Title
            </dt>
            <dd>
            {{$d->Title}}
            </dd>
            <br>
            <dt style="color:teal">
            Short Description
            </dt>
            <dd>
                {!! html_entity_decode($d->short_Des) !!}
            </dd>
            <br>
            <dt style="color:teal">
            Long Description
            </dt>
            <dd>
                {!! html_entity_decode($d->long_Des) !!}
            </dd>
            <br>
            <dt style="color:teal">
            <br>

            <dt style="color:teal">
            Video Link
            </dt>
            <dd>
            {{$d->video_url}}
            </dd>
            <br>

            @if($d->image!="null")
            <dt style="color:teal">
            Image
            </dt>
            <dd>
            <img src="/storyimages/{{$d->image}}" alt="storyimages" style="height:100px">
            </dd>
            @endif
            <br>
            <hr/>

            <div>
                <a href="/round1story" class="btn btn-secondary">Back to List</a>
            </div>

            <hr/>


        </dl>
  @endforeach

@endsection
