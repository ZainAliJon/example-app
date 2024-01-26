@extends('main')
@section('content')
<style type="text/css">
  @media (min-width: 576px){
    .modal-dialog {
      max-width: 615px;
      margin: 1.75rem auto;
    }
  </style>
  @if(auth()->user()->role == "Admin")
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header row">
            <h3 class="card-title col-10">Users</h3>
            <button data-target="#user-modal" data-toggle="modal" type="button" class="btn btn-outline-primary btn-block col-2"><i class="fas fa-users"></i> Add User</button>
          </div>

        </div>
        <div class="card">

          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" cellspacing="0" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>User Name</th>
                  <th>Sign Up Date</th>
                  <th>Edit</th>
                  <th>Delete</th>


                </tr>
              </thead>
              <tbody>
                @foreach($users as $index => $user)
                <tr>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->user_name}}</td>
                  <td>{{$user->created_at->format('d/m/y')}}</td>
                  <td><a data-target="#user-edit-modal{{$user->id}}" data-toggle="modal" class="btn btn-sm btn-primary">
                    <i class="fas fa-user"></i> Edit
                  </a></td>
                  <td><a href="{{url('/user/delete',['id'=>$user->id])}}" class="btn btn-danger" style="padding: 3px 8px;">delete</a></td>
                </tr>
                @endforeach
              </tbody>

            </table>
          </div>
          <!-- /.card-body -->
        </div>


        <div class="modal fade" id="user-modal" style="display: none;" aria-hidden="true">
          <div class="modal-dialog">
            <form class="form-horizontal" method="post" action="{{url('/user/create')}}" enctype="multipart/form-data" id="UserPasswordForm">
              @csrf
              <div class="modal-content">
                <div class="modal-body pb-0">
                 <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Add User</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="hidden" name="user_id" >
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="name">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">User Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="user_name" value="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Must be in uppercase, lowercase,number and symbol" name="password" required>
                          <div class="text-danger ErrorDiv" style="display: none;">Password error: Must be in uppercase, lowercase, number, and symbol</div>
                        @if($errors->has('password'))
                        <div class="text-danger">{{ $errors->first('password') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="UserSubmitBtn">Save changes</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
  @foreach($users as $user)
  <div class="row">
    <div class="modal fade" id="user-edit-modal{{$user->id}}" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
        <form user_id="{{$user->id}}" class="form-horizontal usereditform"  method="post" action="{{url('/user/edit/'.$user->id)}}" enctype="multipart/form-data" id="UserEditFrom{{$user->id}}">
          @csrf
          <div class="modal-content">
            <div class="modal-body pb-0">
             <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit User</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="name" value="{{$user->name}}">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="{{$user->email}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">User Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="user_name" value="{{$user->user_name}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control inputPassword4" id="inputPassword3" placeholder="Must be in uppercase, lowercase,number and symbol" name="password">
                    <div class="text-danger ErrorDivEdit" style="display: none;">Password error: Must be in uppercase, lowercase, number, and symbol</div>
                    @if($errors->has('password'))
                    <div class="text-danger">{{ $errors->first('password') }}</div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  @endforeach
  @endsection

