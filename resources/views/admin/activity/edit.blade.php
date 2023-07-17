@extends('base')

@section('content')
<div class="container p-3">
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>Edit Global Activity - {{ $activity->title }}</h4>
                        </div>
                        <div class="col-md-4">
                            <a href="/admin/dashboard">
                                <button type="button" class="btn btn-dark float-right">Back</button>
                            </a>
                        </div>
                    </div>
                </div>

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

                <form action="{{ route('admin.activity.update', $activity->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title" class="form-control-label">Title</label>
                                    <input class="form-control" type="text" name="title" id="title" required value="{{ $activity->title }}">
                                </div>
                            </div>
                        </div>                                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description" class="form-control-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="2" required>{{ $activity->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="date" class="form-control-label">Date</label>
                                    <input class="form-control" id="date" type="text" name="date" required value="{{ $activity->date }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">                        
                                    <label for="image" class="form-control-label">Image</label>
                                    <span style="font-style: italic;font-size: 11px;"> (*Leave blank if no change)</span>
                                    <input class="form-control" type="file" name="image" id="image">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if(@$activity->image)
                                <div id="preview">
                                    <label for="image_preview" class="form-control-label">Image Preview</label>
                                    <br/>
                                    <img id="image_preview" width="50%" height="70%" src="{{ asset('storage/' . $activity->image) }}"/>
                                </div>
                                @endif
                            </div>
                        </div>                    
                        <button type="submit" id="submit" class="btn btn-primary">Update Activity</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
    //datepicker
    $("#date").datepicker({    
        format: 'yyyy-mm-dd',
        startDate: new Date()
    });

    //Check count of activities for selected date
    $('#submit').click(function (){
        var selected_date = $('#date').val();
        
        $.ajax({
            url: "/admin/check-activity-count/" + selected_date,
            type: 'GET',
            success: function(response){
                if(selected_date != '{{ $activity->date }}' && response.activity_count >= 4)
                {
                    alert("You can add upto 4 activities for the date: " + selected_date);
                    event.preventDefault();
                }
            }
        });
    });
});    
</script>