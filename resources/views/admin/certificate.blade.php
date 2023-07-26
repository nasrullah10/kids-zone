@extends("admin.adminlayout")
@section("title")
Admin | Certificate
@endsection
@section("content")

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<br><br>
<h2 >Certificate List</h2>


        <p>
        <button class="btn btn-info" type="button" id="btncreate">Create New</button>
        </p>

        @if(session('added'))
<div class="alert alert-info" role="alert">
    <strong>{{session('added')}}</strong>
</div>
@endif

        @if(session('del'))
<div class="alert alert-danger" role="alert">
    <strong>{{session('del')}}</strong>
</div>
@endif

@if(session('update'))
<div class="alert alert-success" role="alert">
    <strong>{{session('update')}}</strong>
</div>
@endif
        <table class="table table-striped table-responsive">
    <thead>
        <tr>
            <th>Certificate Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Genre/PArticipated In</th>
            <th>Remarks</th>
            <th>Issue Date</th>
            <th>Participation Date</th>
            <th>Action</th>
        </tr>
    </thead>

        @foreach($fetchc as $f)

        <tr>
            <td>{{$f->certificate_id}}</td>
            <td>{{$f->firstname}}</td>
            <td>{{$f->lastname}}</td>
            <td>{{$f->genre}}</td>
            <td>{{$f->remark}}</td>
            <td>{{$f->issuedate}}</td>
            <td>{{$f->partdate}}</td>
            <td><a href="/certificatedelete/{{$f->id}}" class="btn btn-danger">Delete</a>
                <button class="btn btn-success" type="button" data-id="{{$f->id}}" id="btnedit">Edit</button></td>
        </tr>
        @endforeach

  <!-- ++++++++++++++++++++CREATE MODAL+++++++++++++++++++++++ -->
  <div class="modal fade" id="btncreatemodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" style="color:teal">Insert Color</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                  </div>
                  <form action="{{URL::to('/certificatecreatepost')}}"  method="post">
                      @csrf
                  <div class="modal-body">
                
                  {{-- <input type="text" class="form-control" hidden required placeholder="Enter Certificate Id" name="insertcertid">
                        <br> --}}
                        First Name:
                        <input type="text" class="form-control" required placeholder="Enter First Name" name="insertfname">
                        <br>
                        Last Name:
                        <input type="text" class="form-control" required placeholder="Enter Last Name" name="insertlname">
                        <br>
                        Genre/Participated In
                        <input type="text" class="form-control" required placeholder="Enter Genre/Participated In" name="insertgenre">
                        <br>
                        Remarks
                        <input type="text" class="form-control" required placeholder="Enter Remarks" name="insertremark">
                        <br>
                        Issue Date
                        <input type="date" class="form-control" required placeholder="Enter Issue Date" name="insertidate">
                        <br>
                        Participation Date
                        <input type="date" class="form-control" required placeholder="Enter Participation Date" name="insertpdate">
                        <br>

                       </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success">Create</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>



        <!-- ++++++++++++++++++++UPDATE MODAL+++++++++++++++++++++++ -->
        <div class="modal fade" id="btneditmodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" style="color:teal">Update Color</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                  </div>
                  <form action="{{URL::to('/certificateupdatepost')}}" enctype="multipart/form-data" method="post">
                      @csrf
                  <div class="modal-body">
                  <label style="font-weight: bold;">Id</label>
                      <input type="text" name="recordid" required id="recordid" readonly class="form-control">
                      <br>
                      <label style="font-weight: bold;">First Name</label>
                      <input type="text" name="updatefname" required id="recordfname" class="form-control">
                    <br>
                    <label style="font-weight: bold;">Last Name</label>
                    <input type="text" name="updatelname" required id="recordlname" class="form-control">
                  <br>
                  <label style="font-weight: bold;">Remarks</label>
                  <input type="text" name="updateremark" required id="recordremark" class="form-control">
                <br>
                <label style="font-weight: bold;">Genre/Participated In</label>
                <input type="text" name="updategenre" required id="recordgenre" class="form-control">
              <br>
              <label style="font-weight: bold;">Issue Date</label>
              <input type="date" name="updateidate" required id="recordidate" class="form-control">
            <br>
            <label style="font-weight: bold;">Participation Date</label>
            <input type="text" name="updatepdate" required id="recordpdate" class="form-control">
          <br>
         

</div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success">Update</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>

   </table>
   {!! $fetchc->links() !!}
<script>
    $(document).ready(function(){
        $(document).on("click","#btnedit",function(){
            var id = $(this).attr("data-id");
            console.log(id);
            $("#btneditmodal").modal("show");
            $.ajax({
                url:"/getcertificate",
                type:"POST",
                data:"id="+id+
                '&_token={{csrf_token()}}',
                success:function(result){
                    console.log(result);
                    var result = JSON.parse(result);
                    $("#btneditmodal").modal("show");
                    $("#recordid").val(result["id"]);
                    $("#recordfname").val(result["firstname"]);
                    $("#recordlname").val(result["lastname"]);
                    $("#recordremark").val(result["remark"]);
                    $("#recordgenre").val(result["genre"]);
                    $("#recordidate").val(result["issuedate"]);
                    $("#recordpdate").val(result["partdate"]);
                   }

            });
        });
    });
    </script>

<script>
    $(document).ready(function(){
        $(document).on("click","#btncreate",function(){
             $("#btncreatemodal").modal("show");
        });
    });
    </script>



@endsection
