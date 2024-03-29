@extends('main')
@section('content')
<style type="text/css">
  @media (min-width: 576px){
    .modal-dialog {
      max-width: 615px;
      margin: 1.75rem auto;
    }
    .dataTables_length{
      display: none;
    }
    #example1_wrapper #example1_wrapper .dataTables_filter{
      display: none;
    }
    #example1{
      margin-right: 100%;
    }
    .dataTables_info{
     display: none;
   }
   .pagination{
     display: none;
   }
   .alphabet-info-display{
     display: none;
   }
   .alphabet{
    padding:8px 8px;
  }
  .alphabet ul{
    display: flex!important;
    justify-content: space-between;
  }
  .alphabet ul li a{
    padding: 6px !important;
    border-radius: 6px;
    font-size: 20px;
    color: black;
  }
  .alphabet ul li:first-child a{
    background: #00ff088c;
  }
  .alphabet ul li:nth-child(2) a{
    background: #906fd1ad;
  }
  .alphabet ul li:nth-child(3) a{
    background: #004eff8c;
  }
  .alphabet ul li:nth-child(4) a{
    background: #ff0c008c;
  }
  .alphabet ul li:nth-child(5) a{
    background: #ffbc008c;
  }
  .alphabet ul li:nth-child(6) a{
    background: #9dff008c;
  }
  .alphabet ul li:nth-child(7) a{
    background: #00ff728c;
  }
  .alphabet ul li:nth-child(8) a{
    background: #00ffff8c;
  }
  .alphabet ul li:nth-child(9) a{
    background: #007eff8c;
  }
  .alphabet ul li:nth-child(10) a{
    background: #7a00ff8c;
  }
  .alphabet ul li:nth-child(11) a{
    background: #ff00f76b;
  }
  .alphabet ul li:nth-child(12) a{
    background: #ff002f6b;
  }
  .alphabet ul li:nth-child(13) a{
    background: #ff18006b;
  }
  .alphabet ul li:nth-child(14) a{
    background: #ff81006b;
  }
  .alphabet ul li:nth-child(15) a{
    background: #ffb1006b;
  }
  .alphabet ul li:nth-child(16) a{
    background: #fbff006b;
  }
  .alphabet ul li:nth-child(17) a{
    background: #b4ff006b;
  }
  .alphabet ul li:nth-child(18) a{
    background: #00ff146b;
  }
  .alphabet ul li:nth-child(19) a{
    background: #00ffad6b;
  }
  .alphabet ul li:nth-child(20) a{
    background: #00adff6b;
  }
  .alphabet ul li:nth-child(21) a{
    background: #002bff6b;
  }
  .alphabet ul li:nth-child(22) a{
    background: #9f28a77a;
  }
  .alphabet ul li:nth-child(23) a{
    background: #2a28a76b;
  }
  .alphabet ul li:nth-child(24) a{
    background: #a7288c6b;
  }
  .alphabet ul li:nth-child(25) a{
    background: #d9b2b2;
  }
  .alphabet ul li:nth-child(26) a{
    background: #17c9876b;
  }
  .alphabet ul li:nth-child(27) a{
    background: #d5c7c2;
  }
  .alphabet ul li:nth-child(28) a{
    background: #17c9876b;
  }
  .alphabet ul li .empty {
    color: #221f1f !important;
  }
  .alphabet ul{
    justify-content: start;
    flex-wrap: wrap;
  }
  #example1_paginate{
   /*display: none;*/
 }


 .table {
  border-spacing: 0 0.85rem !important;
}

.table .dropdown {
  display: inline-block;
}

.table td,
.table th {
  vertical-align: middle;
  margin-bottom: 10px;
  border: none;
}

.table thead tr,
.table thead th {
  border: none;
  font-size: 12px;
  letter-spacing: 1px;
  text-transform: uppercase;
  background: transparent;
}

.table td {
  background: #fff;
}

.table td:first-child {
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
}

.table td:last-child {
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
}

.avatar {
  width: 2.75rem;
  height: 2.75rem;
  line-height: 3rem;
  border-radius: 50%;
  display: inline-block;
  background: transparent;
  position: relative;
  text-align: center;
  color: #868e96;
  font-weight: 700;
  vertical-align: bottom;
  font-size: 1rem;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.avatar-sm {
  width: 2.5rem;
  height: 2.5rem;
  font-size: 0.83333rem;
  line-height: 1.5;
}

.avatar-img {
  width: 100%;
  height: 100%;
  -o-object-fit: cover;
  object-fit: cover;
}

.avatar-blue {
  background-color: #c8d9f1;
  color: #467fcf;
}

table.dataTable.dtr-inline.collapsed
> tbody
> tr[role="row"]
> td:first-child:before,
table.dataTable.dtr-inline.collapsed
> tbody
> tr[role="row"]
> th:first-child:before {
  top: 28px;
  left: 14px;
  border: none;
  box-shadow: none;
}

table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > td:first-child,
table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > th:first-child {
  padding-left: 48px;
}

table.dataTable > tbody > tr.child ul.dtr-details {
  width: 100%;
}

table.dataTable > tbody > tr.child span.dtr-title {
  min-width: 50%;
}

table.dataTable.dtr-inline.collapsed > tbody > tr > td.child,
table.dataTable.dtr-inline.collapsed > tbody > tr > th.child,
table.dataTable.dtr-inline.collapsed > tbody > tr > td.dataTables_empty {
  padding: 0.75rem 1rem 0.125rem;
}

div.dataTables_wrapper div.dataTables_length label,
div.dataTables_wrapper div.dataTables_filter label {
  margin-bottom: 0;
}

@media (max-width: 767px) {
  div.dataTables_wrapper div.dataTables_paginate ul.pagination {
    -ms-flex-pack: center !important;
    justify-content: center !important;
    margin-top: 1rem;
  }
}

.btn-icon {
  background: #fff;
}
.btn-icon .bx {
  font-size: 20px;
}

.btn .bx {
  vertical-align: middle;
  font-size: 20px;
}

.dropdown-menu {
  padding: 0.25rem 0;
}

.dropdown-item {
  padding: 0.5rem 1rem;
}

.badge {
  padding: 0.5em 0.75em;
}

.badge-success-alt {
  background-color: #d7f2c2;
  color: #7bd235;
}

.table a {
  color: #212529;
}

.table a:hover,
.table a:focus {
  text-decoration: none;
}

table.dataTable {
  margin-top: 12px !important;
}

.icon > .bx {
  display: block;
  min-width: 1.5em;
  min-height: 1.5em;
  text-align: center;
  font-size: 1.0625rem;
}

.btn {
  font-size: 0.9375rem;
  font-weight: 500;
  padding: 0.5rem 0.75rem;
}

.avatar-blue {
  background-color: #c8d9f1;
  color: #467fcf;
}

.avatar-pink {
  background-color: #fcd3e1;
  color: #f66d9b;
}
.body {
  background: #f7f7f7;
}

#example1 thead tr th{
  border-bottom:none;
}
.alphabet-group{
  visibility: hidden;
  height: 0px !important;
  max-height: 0px !important;
} 
.alphabet-group td{
  background: #F4F6F9;
  color: #F4F6F9;
  font-size: 0px;
  padding: 0px;
}
.card-header::after{
  display: none;
}
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@if(auth()->user()->role == "Admin")
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header row mx-2 justify-content-between">
          <h3 class="card-title text-left" style="align-self: center;">Users</h3>
          <div><button data-target="#user-modal" data-toggle="modal" type="button" class="btn btn-outline-primary text-right"><i class="fas fa-users"></i> Add User</button></div>
        </div>
      </div>



      <table id="example1" class="table table-hover responsive nowrap border-0" style="width:100%">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>User Name</th>
            <th>Sign Up Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
         @foreach($users as $index => $user)
         <tr>
          <td class="font-weight-bold">{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->user_name}}</td>
          <td>{{$user->created_at->format('d/m/y')}}</td>
          <td class="d-flex">
            <div class="mx-2"><a data-target="#user-edit-modal{{$user->id}}" data-toggle="modal" class="btn btn-sm btn-primary text-white" style="padding: 3px 8px;">
              <i class="fas fa-user"></i> Edit
            </a></div>
            <div class="">
             <a href="{{url('/user/delete',['id'=>$user->id])}}" class="btn btn-danger text-white" style="padding: 3px 8px;">delete</a>
           </div>
         </td>
       </tr>
       @endforeach
     </tbody>
   </table>


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
                <div class="col-sm-10 " >
                  <div class="d-flex custom-form-control" style="border: 1px solid #ced4da;border-radius: .25rem">
                    <input type="password" class="form-control" style="border: none" id="inputPassword3" placeholder="" name="password">
                    <div class="text-danger ErrorDiv" style="display: none;">Password error: Must be in uppercase, lowercase, number, and symbol</div>

                    <button type="button" id="togglePassword" class="btn btn-link">
                      <i class="far fa-eye"></i>
                    </button>
                  </div>
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
                <div class="col-sm-10 " >
                  <div class="d-flex custom-form-control" style="border: 1px solid #ced4da;border-radius: .25rem">
                    <input type="password" class="form-control inputPassword33" style="border: none" id="" value="{{$user->password}}" placeholder="" name="password">
                    <div class="text-danger ErrorDivEdit" style="display: none;">Password error: Must be in uppercase, lowercase, number, and symbol</div>

                    <button type="button"  class="btn btn-link togglePasswordEdit">
                      <i class="far fa-eye"></i>
                    </button>
                  </div>
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
<script  src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>



<script type="text/javascript">
  $('#example1').DataTable( {
    dom: 'Bfrtip',
    buttons: [
      'copy', 'csv', 'excel'
      ]
  } );
  $(document).ready(function(){
   var table = $('#example1').DataTable({
    dom: 'Alfrtip',
    alphabetSearch: {
     column: 0
   }      
 });
 });
</script>
<script type="text/javascript">
  $('#togglePassword').click(function() {
    var passwordInput = $('#inputPassword3');
    var passwordFieldType = passwordInput.attr('type');

    if (passwordFieldType === 'password') {
      passwordInput.attr('type', 'text');
      $('#togglePassword i').removeClass('far fa-eye').addClass('far fa-eye-slash');
    } else {
      passwordInput.attr('type', 'password');
      $('#togglePassword i').removeClass('far fa-eye-slash').addClass('far fa-eye');
    }
  });
  $('.togglePasswordEdit').click(function() {
    var passwordInput = $('.inputPassword33');
    var passwordFieldType = passwordInput.attr('type');

    if (passwordFieldType === 'password') {
      passwordInput.attr('type', 'text');
      $('.togglePasswordEdit i').removeClass('far fa-eye').addClass('far fa-eye-slash');
    } else {
      passwordInput.attr('type', 'password');
      $('.togglePasswordEdit i').removeClass('far fa-eye-slash').addClass('far fa-eye');
    }
  });
</script>
@endsection

