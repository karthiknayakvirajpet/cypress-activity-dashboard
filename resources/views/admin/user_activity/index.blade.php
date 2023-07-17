@extends('base')

@section('content')
<div class="container p-3">
    <div class="justify-content-center align-items-center" style="height: 80vh;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>User Activities</h4>
                        </div>
                        <!-- <div class="col-md-4">
                            <a href="/admin/dashboard">
                                <button type="button" class="btn btn-dark float-right">Back</button>
                            </a>
                        </div> -->
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
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Total Activities</th>
                                <th>Last Login At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->user_activity_count }}</td>
                                <td>{{ $user->last_login_at }}</td>
                                <td>
                                    <a href="/admin/user-activities/{{$user->id}}">
                                        <button type="button" class="btn btn-info" data-original-title="" title="View Activities" name="view">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                    </a>
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