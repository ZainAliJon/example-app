@extends('main')
@section('content')
<style type="text/css">
  @media (min-width: 576px){
    .modal-dialog {
      max-width: 570px;
      margin: 1.75rem auto;
    }
  </style>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header row">
            <h3 class="card-title col-10">Classifier</h3>
            <button data-target="#classifier-modal" data-toggle="modal" type="button" class="btn btn-outline-primary btn-block col-2"><i class="fas fa-users"></i> Add Classifier</button>
          </div>

          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th style="width: 40px">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($classifiers as $index => $classifier)
                <tr>
                  <td>{{++$index}}</td>
                  <td>{{$classifier->name}}</td>
                  <td>{{$classifier->email}}</td>
                  <td>
                    <span class="badge bg-info">{{$classifier->role}}</span>
                  </td>
                  <td>
                    <a data-target="#classifier-edit-modal{{$classifier->id}}" data-toggle="modal" type="button"><i class="fas fa-edit">Edit</i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="card-footer clearfix">
          {{-- <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">»</a></li>
          </ul> --}}
        </div>
      </div>
    </div>
    <!-- /.col-md-6 -->
  </div>
  <!-- /.row -->
</div>
<div class="row">
  
<div class="modal fade" id="classifier-modal" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <form class="form-horizontal" method="post" action="{{url('/classifier/create')}}">
      @csrf
      <div class="modal-content">
        <div class="modal-body pb-0">
         <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Add Classifier</h3>
          </div>
          <div class="card-body">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
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
              <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
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
<div class="row">
  
@foreach($classifiers as $classifier)
<div class="modal fade" id="classifier-edit-modal{{$classifier->id}}" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <form class="form-horizontal" method="post" action="{{url('/classifier/edit/'.$classifier->id)}}">
      @csrf
      <div class="modal-content">
        <div class="modal-body pb-0">
         <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Edit Classifier</h3>
          </div>
          <div class="card-body">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="name" value="{{$classifier->name}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="{{$classifier->email}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
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