@extends('base')

@section('content')
<div class="container p-3">
    <div class="justify-content-center align-items-center" style="height: 80vh;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>Global Activities</h4>
                        </div>
                        <div class="col-md-4">
                            <a href="/admin/add-activity">
                                <button type="button" id="add-activity" class="btn btn-warning float-right">Add Global Activity</button>
                            </a>
                        </div>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" style="background-color: #FCFCFC;">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Activity Date</th>
                                <!-- <th>Created At</th> -->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $activity)
                            <tr>
                                <td>{{ $activity->title }}</td>
                                <td>{{ $activity->description }}</td>
                                <td><img src="{{ asset('storage/' . $activity->image) }}" alt="Activity Image" width="100"></td>
                                <td>{{ $activity->date }}</td>
                                <!-- <td>{{ $activity->created_at }}</td> -->
                                <td>
                                    <a href="/admin/edit-activity/{{$activity->id}}">
                                        <button type="button" class="btn btn-info" data-original-title="" title="Edit" name="edit">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    </a>

                                    <button type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="Delete" name="delete" value="{{ $activity->id }}">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    //Delete activity
    $('[name=delete]').click(function (){
        var value = $(this).val();
        
        swal("Are you sure you want to delete?", {
          dangerMode: true,
          buttons: true,
        }).then((Delete) => 
        {
            if (Delete)
            {
                $.ajax({
                      url: "/admin/delete-activity/" + value,
                      type: 'GET',
                      success: function(){
                          swal({
                            title: "Activity deleted successfully!",
                          }).then(function(){ 
                              location.reload();
                             }
                          );
                      }
                });
            }    
        }).catch(swal.noop);
    });
});
</script>