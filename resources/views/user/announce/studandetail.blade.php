@extends("user.userlayout")
@section("title")
Announcement details
@endsection
@section("content")
<br>
<h2>Announcement Detail</h2>
<hr />

<br>
<br>

        <dl class="dl-horizontal">
            <dt style="color:teal">
            Type
            </dt>
            <dd>
            {{$fetchande->type}}
            </dd>
            <br>
            <dt style="color:teal">
            Headline 
            </dt>
            <dd>
            {{$fetchande->headline}}
            </dd>
            <br>
            <dt style="color:teal">
            Short Description
            </dt>
            <dd>
            {!! html_entity_decode($fetchande->short_Des) !!}

            </dd>
            <br>
            <dt style="color:teal">
            Long Description
            </dt>
            <dd>
            {!! html_entity_decode($fetchande->long_des) !!}
         
            </dd>
            <br>
            <dt style="color:teal">
            Image
            </dt>
            <dd>
            <img src="/annimages/{{$fetchande->image}}" alt="storyimages" style="height:200px">
            </dd>
            <hr/>

            <div>
                <a href="/studan" class="btn btn-secondary">Back to List</a>
            </div>

            <hr/>
            
           
        </dl>

  
  @endsection