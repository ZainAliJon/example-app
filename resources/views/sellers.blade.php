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
            <h3 class="card-title col-10">Sellers</h3>
            <button data-target="#user-modal" data-toggle="modal" type="button" class="btn btn-outline-primary btn-block col-2"><i class="fas fa-users"></i> Add Sellers</button>
          </div>
          <div class="row">

            @foreach($sellers as $seller)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column mt-2">
              <div class="card bg-light d-flex flex-fill mx-2">
                {{-- <div class="card-header text-muted border-bottom-0">
                  {{$customer->role}}
                </div> --}}
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7 mt-3">
                      <h2 class="lead"><b>{{$seller->name}}</b></h2>
                      {{-- <p class="text-muted text-sm"><b>Email: </b> {{$customer->email}} </p> --}}
                    </div>
                    <div class="col-5 text-center">

                      <img src="{{$seller->image}}" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a data-target="#user-edit-modal{{$seller->id}}" data-toggle="modal" class="btn btn-sm btn-primary">
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
            <form class="form-horizontal" method="post" action="{{url('/seller/create')}}" enctype="multipart/form-data">
              @csrf
              <div class="modal-content">
                <div class="modal-body pb-0">
                 <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Add Seller</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                       <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
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

  @foreach($sellers as $seller)
  <div class="row">
    <div class="modal fade" id="user-edit-modal{{$seller->id}}" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
        <form class="form-horizontal" method="post" action="{{url('/seller/edit/'.$seller->id)}}" enctype="multipart/form-data">
          @csrf
          <div class="modal-content">
            <div class="modal-body pb-0">
             <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Seller</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                     <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="name" value="{{$seller->name}}">
                  </div>
                </div>
                                                   <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Profile Image</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="inputEmail3" placeholder="Name" name="image">
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



