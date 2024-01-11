@extends('main')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<a href="{{url('/task/inbox/'.@$task->id)}}" class="btn btn-primary btn-block mb-3">Inbox</a>
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Folders</h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
							<i class="fas fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="card-body p-0">
					<ul class="nav nav-pills flex-column">
						<li class="nav-item active">
							<a href="{{url('/task/inbox/'.@$task->id)}}" class="nav-link">
								<i class="fas fa-inbox"></i> Inbox
								<span class="badge bg-primary float-right">{{$total}}</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="card card-primary card-outline">
				<div class="card-header">
					<h3 class="card-title">Compose New Message</h3>
				</div>
				<form method="post" action="{{url('/task/compose/'.$task->id)}}" enctype="multipart/form-data">
					@csrf
					<div class="card-body">
						<div class="form-group">
							<input class="form-control" placeholder="To:" name="to">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Subject:" name="subject">
						</div>
						<div class="form-group">
							<textarea id="compose-textarea" class="form-control" style="height: 600px; display:;" name="Message">                      
							</textarea>
							
						</div>
						<div class="form-group">
							<div class="btn btn-default btn-file">
								<i class="fas fa-paperclip"></i> Attachment
								<input type="file" name="attachment">
							</div>
							<p class="help-block">Max. 32MB</p>
						</div>
					</div>
					<div class="card-footer">
						<div class="float-right">
							<button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button>
							<button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
						</div>
						<button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
