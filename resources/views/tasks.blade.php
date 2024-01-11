@include('header')
<style type="text/css">
</style>
<div class="content-wrapper kanban" style="min-height: 273px;">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<h1>Tasks</h1>
				</div>
				<div class="col-sm-6 d-none d-sm-block">
					<ol class="breadcrumb float-sm-right">
						{{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Tasks</li> --}}
						@if(auth()->user()->role == "customer")
						<button  data-target="#task-modal" data-toggle="modal" type="button" class="btn btn-outline-info btn-block btn-flat"><i class="fa fa-book"></i> Add a Task</button>
						@endif
					</ol>
				</div>
			</div>
		</div>
	</section>
	<section class="content pb-3">
		<div class="container-fluid h-100">
			<div class=" card card-row card-secondary">
				<div class="card-header">
					<h3 class="card-title">
						Pending Task
					</h3>
				</div>
				<div class="card-body">
					<div class="card card-info card-outline">
						@foreach($pending_tasks as $task)
						<div class="card-header">
							
							<h5 class="card-title row">
								<div class="col-4"><img @if($task->file == "") src="http://localhost/example-app/public/dashboard/dist/img/user2-160x160.jpg" @else src="{{$task->file}}" @endif width="50px" height="100%" class="mr-2"></div>
								<div class="col-8"><span>{{$task->product_name}} <br> <span style="font-size: 14px;">Price: ${{$task->price}}</span></span></div>
							</h5>

							<div class="card-tools">
								<a href="{{url('/task/inbox/'.$task->id)}}" class="btn btn-info"><i class="fas fa-envelope"></i></a>
								<a @if(auth()->user()->role != "classifier") data-target="#task-edit-modal{{$task->id}}" @else data-target="#task-check-modal{{$task->id}}" @endif data-toggle="modal" class="btn btn-success">
									<i class="fas fa-edit"></i>
								</a>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class=" card card-row card-primary">
				<div class="card-header">
					<h3 class="card-title">
						In Review
					</h3>
				</div>
				<div class="card-body">
					<div class="card card-primary card-outline">
						@foreach($in_reviews_tasks as $task)
						<div class="card-header">
							<h5 class="card-title row">
								<div class="col-4"><img @if($task->file == "") src="http://localhost/example-app/public/dashboard/dist/img/user2-160x160.jpg" @else src="{{$task->file}}" @endif width="50px" height="100%" class="mr-2"></div>
								<div class="col-8"><span>{{$task->product_name}} <br> <span style="font-size: 14px;">Price: ${{$task->price}}</span></span></div>
							</h5>
							<div class="card-tools">
								<a href="{{url('/task/inbox/'.$task->id)}}" class="btn btn-info"><i class="fas fa-envelope"></i></a>
								@if(auth()->user()->role == "customer")
								<a @if(auth()->user()->role == "customer") data-target="#task-check-modal{{$task->id}}" @endif data-toggle="modal" class="btn btn-success">
									<i class="fas fa-edit"></i>
								</a>
								@endif
							</div>
						</div>
						<div class="card-body">
							{{-- @dd($task->rejection) --}}
							<h3 class="text-center" style="font-weight:700;font-size:1rem;">Rejection Notes</h3>
							@foreach($task->rejection as $rejection)
							<div class="reject px-2 py-1 rounded mt-1" style="background-color: #b5d7b3;">
								<p class="">{{$rejection->note}}</p>
							</div>
							@endforeach
							{{-- <h3 class="text-center mt-2" style="font-weight:700;font-size:1rem;">Rejection File</h3>
							<div class="reject px-0 py-1 rounded" style="background-color: ;">
								@foreach($task->rejection as $rejection)
								<img class="rounded" src="{{$rejection->file}}" width="50%;">
								@endforeach
							</div> --}}
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class=" card card-row card-default">
				<div class="card-header bg-info">
					<h3 class="card-title">
						Processing
					</h3>
				</div>
				<div class="card-body">
					<div class="card card-light card-outline">
						@foreach($reviewed_tasks as $task)
						<div class="card-header">
							<h5 class="card-title row">
								<div class="col-4"><img @if($task->file == "") src="http://localhost/example-app/public/dashboard/dist/img/user2-160x160.jpg" @else src="{{$task->file}}" @endif width="50px" height="100%" class="mr-2"></div>
								<div class="col-8"><span>{{$task->product_name}} <br> <span style="font-size: 14px;">Price: ${{$task->price}}</span></span></div>
							</h5>
							<div class="card-tools">
								<a href="{{url('/task/inbox/'.$task->id)}}" class="btn btn-info"><i class="fas fa-envelope"></i></a>
								@if(auth()->user()->role == "classifier") 
								<a data-target="#task-check-modal{{$task->id}}" data-toggle="modal"  class="btn btn-success">
									<i class="fas fa-edit"></i>
								</a>
								@endif
							</div>
						</div>
						<div class="card-body">
							<h3 class="text-center" style="font-weight:700;font-size:1rem;">Reviewed Notes</h3>
							@foreach($task->rejection as $rejection)
							<div class="reject px-2 py-1 rounded mt-1" style="background-color: #b5d7b3;">
								<p class="">{{$rejection->note}}</p>
							</div>
							@endforeach
							<h3 class="text-center mt-2" style="font-weight:700;font-size:1rem;">Reviewed File</h3>
							<div class="reject px-0 py-1 rounded row" style="background-color: ;">
								@foreach($task->rejection as $rejection)
								<img class="rounded col-6" src="{{$rejection->file}}" width="50%;">
								@endforeach
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class=" card card-row card-success">
				<div class="card-header">
					<h3 class="card-title">
						Done
					</h3>
				</div>
				<div class="card-body">
					@foreach($done_tasks as $task)
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h5 class="card-title row">
								<div class="col-4"><img @if($task->file == "") src="http://localhost/example-app/public/dashboard/dist/img/user2-160x160.jpg" @else src="{{$task->file}}" @endif width="50px" height="100%" class="mr-2"></div>
								<div class="col-8"><span>{{$task->product_name}} <br> <span style="font-size: 14px;">Price: ${{$task->price}}</span><br> <span style="font-size: 14px;">Product Code: {{$task->number}}</span></span></div>
							</h5>
						</div>
						<div class="card-body">
							<a href="{{url('/task/inbox/'.$task->id)}}" class="btn btn-info"><i class="fas fa-envelope"></i></a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>

	{{-- create model --}}
	<div class="modal fade" id="task-modal" style="display: none;" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<form class="form-horizontal" method="post" action="{{url('/task/create')}}" enctype="multipart/form-data">
				@csrf
				<div class="modal-content">
					<div class="modal-body pb-0">
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">Add Task</h3>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="product_name">
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" id="inputEmail3" placeholder="price" name="price">
									</div>
								</div>

								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Seller</label>
									<div class="col-sm-10">
										<select class="form-control" name="seller_id" required="">
											<option value="">Select</option>
											@foreach($sellers as $seller)
											<option value="{{$seller->id}}">{{$seller->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Buyer</label>
									<div class="col-sm-10">
										<select class="form-control" name="buyer_id" required="">
											<option value="">Select</option>
											@foreach($buyers as $buyer)
											<option value="{{$buyer->id}}">{{$buyer->name}}</option>
											@endforeach
										</select>
									</div>
								</div>


								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Request ID</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" id="inputPassword3" placeholder="Request ID" name="request_id" >
									</div>
								</div>
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Request Date</label>
									<div class="col-sm-10">
										<input type="date" class="form-control" id="inputPassword3" placeholder="Request Date" name="request_date" >
									</div>
								</div>
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Entry Ref</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputPassword3" placeholder="Entry Ref" name="entry_ref" >
									</div>
								</div>
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">CatalogID</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" id="inputPassword3" placeholder="CatalogID" name="catalog_id" >
									</div>
								</div>
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Notes</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputPassword3" placeholder="notes" name="notes" >
									</div>
								</div>
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">InvoiceLine Item</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" id="inputPassword3" placeholder="InvoiceLine Item" name="invoice_line_item" >
									</div>
								</div>
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Invoice ID</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" id="inputPassword3" placeholder="Invoice ID" name="invoice_id" >
									</div>
								</div>
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">File</label>
									<div class="col-sm-10">
										<div class="custom-file">
											<input type="file" class="" id="exampleInputFile" name="file">
											<label class="custom-file-label" for="exampleInputFile">Choose file</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Classifier</label>
									<div class="col-sm-10">
										<select class="form-control" name="classifier_id" required="">
											<option value="">Select</option>
											@foreach($classifiers as $classifier)
											<option value="{{$classifier->id}}">{{$classifier->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Description</label>
									<div class="col-sm-10">
										<textarea class="form-control" rows="3" placeholder="Enter ..." name="description"></textarea>
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

	{{--  --}}


	{{-- edit model  --}}
	@foreach($pending_tasks as $taskaa)
	<div class="modal fade" id="task-edit-modal{{$taskaa->id}}" style="display: none;" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<form class="form-horizontal" method="post" action="{{url('/task/edit',['id'=>$taskaa->id])}}" enctype="multipart/form-data">
				@csrf
				<div class="modal-content">
					<div class="modal-body pb-0">
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">Edit Task</h3>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="product_name" value="{{$taskaa->product_name}}">
									</div>
								</div>
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" id="inputEmail3" placeholder="price" name="price" value="{{$taskaa->price}}">
									</div>
								</div>

								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Seller</label>
									<div class="col-sm-10">
										<select class="form-control" name="seller_id" required="">
											<option value="">Select</option>
											@foreach($sellers as $seller)
											<option value="{{$seller->id}}"  @if($seller->id == $taskaa->seller_id) selected=""  @endif>{{$seller->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Buyer</label>
									<div class="col-sm-10">
										<select class="form-control" name="buyer_id" required="">
											<option value="">Select</option>
											@foreach($buyers as $buyer)
											<option value="{{$buyer->id}}"  @if($buyer->id == $taskaa->buyer_id) selected=""  @endif>{{$buyer->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Request ID</label>
									<div class="col-sm-10">
										<input type="number" value="{{$taskaa->request_id}}" class="form-control" id="inputPassword3" placeholder="Request ID" name="request_id" >
									</div>
								</div>
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Request Date</label>
									<div class="col-sm-10">
										<input type="date" value="{{$taskaa->request_date}}" class="form-control" id="inputPassword3" placeholder="Request Date" name="request_date" >
									</div>
								</div>
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Entry Ref</label>
									<div class="col-sm-10">
										<input type="text" value="{{$taskaa->entry_ref}}" class="form-control" id="inputPassword3" placeholder="Entry Ref" name="entry_ref" >
									</div>
								</div>
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">CatalogID</label>
									<div class="col-sm-10">
										<input type="number" value="{{$taskaa->catalog_id}}" class="form-control" id="inputPassword3" placeholder="CatalogID" name="catalog_id" >
									</div>
								</div>
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Notes</label>
									<div class="col-sm-10">
										<input type="text" value="{{$taskaa->notes}}" class="form-control" id="inputPassword3" placeholder="notes" name="notes" >
									</div>
								</div>
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">InvoiceLine Item</label>
									<div class="col-sm-10">
										<input type="number" value="{{$taskaa->invoice_line_item}}" class="form-control" id="inputPassword3" placeholder="InvoiceLine Item" name="invoice_line_item" >
									</div>
								</div>
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Invoice ID</label>
									<div class="col-sm-10">
										<input type="number" value="{{$taskaa->invoice_id}}" class="form-control" id="inputPassword3" placeholder="Invoice ID" name="invoice_id" >
									</div>
								</div>


								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">File</label>
									<div class="col-sm-10">
										<div class="custom-file">
											<input type="file" class="" id="exampleInputFile" name="file">
											<label class="custom-file-label" for="exampleInputFile">Choose file</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputPassword3" class="col-sm-2 col-form-label">Classifier</label>
									<div class="col-sm-10">
										<select class="form-control" name="classifier_id" required="">
											<option>Select</option>
											@foreach($classifiers as $classifier)
											<option value="{{$classifier->id}}"  @if($classifier->id == $taskaa->classifier_id) selected=""  @endif>{{$classifier->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Description</label>
									<div class="col-sm-10">
										<textarea class="form-control" rows="3" placeholder="Enter ..." name="description">{{$taskaa->description}}</textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	@endforeach
	@foreach($tasks as $tasked)
	<div class="row">
		<div class="modal fade" id="task-check-modal{{$tasked->id}}" style="display: none;" aria-hidden="true">
			<div class="modal-dialog">
				<form class="form-horizontal" method="post" action="{{url('/task/change_status/'.$tasked->id)}}" enctype="multipart/form-data">
					@csrf
					<div class="modal-content">
						<div class="modal-body pb-0">
							<div class="card card-info">
								<div class="card-header">
									<h3 class="card-title">Add Task</h3>
								</div>
								<div class="card-body">

									<div class="row">
										<div class="col-sm-12">
											@if($tasked->status == "in_review")
											<div class="rejection_note">
												<div class="form-group">
													<div class="form-group w-100">
														<label>Note</label>
														<textarea class="form-control" rows="3" placeholder="Enter ..." name="note"></textarea>
													</div>
												</div>
												<div class="custom-file">
													<input type="file" class="custom-file-input" id="customFile" name="file">
													<label class="custom-file-label" for="customFile">Choose file</label>
												</div>
												<input type="hidden" name="status" value="reviewed">
											</div>
											@else
											<div class="form-group clearfix mt-2">
												<div class="icheck-primary d-inline">
													<input type="radio" id="radioPrimary1{{$tasked->id}}" name="status" class="task_status" checked="" value="Accept">
													<label for="radioPrimary1{{$tasked->id}}">
														Accept
													</label>
												</div>
												<div class="icheck-danger d-inline">
													<input type="radio" id="radioPrimary2{{$tasked->id}}" name="status" class="task_status" value="Reject">
													<label for="radioPrimary2{{$tasked->id}}">
														Reject
													</label>
												</div>
											</div>
											<div class="accepted_div">
												<div class="form-group">
													<label>Product Code</label>
													<input type="text" name="number" class="form-control" placeholder="Product Code..." >
												</div>
											</div>
											<div class="rejection_note d-none">
												<div class="form-group">
													<div class="form-group w-100">
														<label>Rejection Note</label>
														<textarea class="form-control" rows="3" placeholder="Enter ..." name="note"></textarea>
													</div>
												</div>
											</div>
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
		@include('footer')
		<script type="text/javascript">
			$(document).ready(function(){
				$('.task_status').on('change', function(){
					if($(this).val() == "Reject"){
						$('.rejection_note').removeClass('d-none');
						$('.accepted_div').addClass('d-none');
					}else{
						$('.rejection_note').addClass('d-none');
						$('.accepted_div').removeClass('d-none');
					}
				})
			})
		</script>
		<script>
			$(function () {
				bsCustomFileInput.init();
			});
		</script>
