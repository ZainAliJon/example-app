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
            <h3 class="card-title col-10">Customers</h3>
            <button data-target="#user-modal" data-toggle="modal" type="button" class="btn btn-outline-primary btn-block col-2"><i class="fas fa-users"></i> Add Customer</button>
          </div>
          <div class="row">

            @foreach($customers as $customer)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column mt-2">
              <div class="card bg-light d-flex flex-fill mx-2">
                <div class="card-header text-muted border-bottom-0">
                  {{$customer->role}}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7 mt-3">
                      <h2 class="lead"><b>{{$customer->name}}</b></h2>
                      <p class="text-muted text-sm"><b>Email: </b> {{$customer->email}} </p>

                    </div>
                    <div class="col-5 text-center">

                      <img src="{{$customer->image}}" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a data-target="#user-edit-modal{{$customer->id}}" data-toggle="modal" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> Edit
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach 
          </div>
        </div>

        <div class="modal fade" id="user-modal" style="display: none;" aria-hidden="true">
          <div class="modal-dialog">
            <form class="form-horizontal" method="post" action="{{url('/customer/create')}}" enctype="multipart/form-data">
              @csrf
              <div class="modal-content">
                <div class="modal-body pb-0">
                 <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Add Customer</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Profile Image</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" id="inputEmail3" placeholder="Name" name="image">
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
    </div>
  </div>

    @foreach($customers as $custome)
    <div class="row">
    <div class="modal fade" id="user-edit-modal{{$custome->id}}" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
        <form class="form-horizontal" method="post" action="{{url('/customer/edit/'.$custome->id)}}" enctype="multipart/form-data">
          @csrf
          <div class="modal-content">
            <div class="modal-body pb-0">
             <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Customer</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="name" value="{{$custome->name}}">
                  </div>
                </div>
                                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Profile Image</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="inputEmail3" placeholder="Name" name="image">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="{{$custome->email}}">
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

