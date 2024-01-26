@extends('main')
@section('content')
<style type="text/css">
  @media (min-width: 576px){
    .modal-dialog {
      max-width: 670px;
      margin: 1.75rem auto;
    }
  </style>
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header row">
            <h3 class="card-title col-10">Password Mananger</h3>
            <button data-target="#user-modal" data-toggle="modal" type="button" class="btn btn-outline-primary btn-block col-2"><i class="fas fa-users"></i> Add Sites</button>
          </div>

        </div>
        <div class="card">

          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Site Name</th>
                  <th>Name</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Sign Up Date</th>
                  <th>Action</th>
                  


                </tr>
              </thead>
              <tbody>
                @foreach($sites as $index => $site)
                <tr>
                  <td>{{$site->site_name}}</td>
                  <td>{{$site->first_name}} {{$site->last_name}}</td>
                  <td>{{$site->user_name}}</td>
                  <td>{{$site->email}}</td>
                  <td>{{$site->password}}</td>
                  <td>{{$site->created_at->format('d/m/y')}}</td>
                  <td>
                    <a data-target="#site-edit-modal{{$site->id}}" data-toggle="modal" class="btn btn-sm btn-primary">
                     Edit
                   </a>
                   <a href="{{url('/site/delete',['id'=>$site->id])}}" class="btn btn-danger" style="padding: 3px 8px;">delete</a>
                 </td>

               </tr>
               @endforeach
             </tbody>

           </table>
         </div>
         <!-- /.card-body -->
       </div>


       <div class="modal fade" id="user-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <!-- onsubmit="return validateForm()" -->
          <form class="form-horizontal"  method="post" action="{{url('/site/create')}}" enctype="multipart/form-data" id="PasswordForm">
            @csrf
            <div class="modal-content">
              <div class="modal-body pb-0">
               <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Add Sites</h3>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Site Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Site name or url" name="site_name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="First name" name="first_name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Last name" name="last_name">
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
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Must be in uppercase, lowercase,number and symbol" name="password">
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
                <button type="button" class="btn btn-primary" id="SubmitBtn">Save changes</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@foreach($sites as $site)
<div class="row">
  <div class="modal fade" id="site-edit-modal{{$site->id}}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <form site_id="{{$site->id}}" class="form-horizontal editform" method="post" action="{{url('/site/edit/'.$site->id)}}" enctype="multipart/form-data" id="EditFrom{{$site->id}}">
        @csrf
        <div class="modal-content">
          <div class="modal-body pb-0">
           <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Edit Site</h3>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Site Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="{{$site->site_name}}" placeholder="Site name" name="site_name">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="{{$site->first_name}}" placeholder="First name" name="first_name">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="{{$site->last_name}}" placeholder="Last name" name="last_name">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputEmail3" value="{{$site->email}}" placeholder="Email" name="email">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" value="{{$site->user_name}}" placeholder="Name" name="user_name" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control inputPassword33"  placeholder="Must be in uppercase, lowercase,number and symbol" value="{{$site->password}}" name="password">
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


