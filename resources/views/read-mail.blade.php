@extends('main')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<a href="{{url('/task/inbox/'.@$inbox->task_id)}}" class="btn btn-primary btn-block mb-3">Inbox</a>
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
							<a href="#" class="nav-link">
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
					<h3 class="card-title">Read Mail</h3>
					<div class="card-tools">
						<a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
						<a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
					</div>
				</div>

				<div class="card-body p-0">
					<div class="mailbox-read-info">
						<h5>Message: {{$inbox->subject}}</h5>
						<h6>From: {{$inbox->user->email}}
							<span class="mailbox-read-time float-right">{{$inbox->created_at}}</span></h6>

						</div>

						{{-- <div class="mailbox-controls with-border text-center">
							<div class="btn-group">
								<button type="button" class="btn btn-default btn-sm" data-container="body" title="Delete">
									<i class="far fa-trash-alt"></i>
								</button>
								<button type="button" class="btn btn-default btn-sm" data-container="body" title="Reply">
									<i class="fas fa-reply"></i>
								</button>
								<button type="button" class="btn btn-default btn-sm" data-container="body" title="Forward">
									<i class="fas fa-share"></i>
								</button>
							</div>

							<button type="button" class="btn btn-default btn-sm" title="Print">
								<i class="fas fa-print"></i>
							</button>
						</div> --}}

						<div class="mailbox-read-message">
							{!! $inbox->Message !!}
						</div>

					</div>
					@php
					$filename = $inbox->attachment;
					$file_info = pathinfo($filename);
					$file_extension = $file_info['extension'];
					$fileUrl = $inbox->attachment;
					$headers = get_headers($fileUrl, 1);
					$fileSize = $headers['Content-Length']." bytes";
					$fileName = basename($fileUrl);
					// dd($fileSize);
					@endphp
					<div class="card-footer bg-white">
						<ul class="mailbox-attachments d-flex align-items-stretch clearfix">
							@if($file_extension == "pdf" || $file_extension == "doc" || $file_extension == "docx")
							<li>
								<span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>
								<div class="mailbox-attachment-info">
									<a  class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> {{$fileName}}</a>
									<span class="mailbox-attachment-size clearfix mt-1">
										<span>1,245 KB</span>
										<a href="{{$inbox->attachment}}" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
									</span>
								</div>
							</li>
							@else
							<li>
								<span class="mailbox-attachment-icon has-img"><img src="{{$inbox->attachment}}" alt="Attachment"></span>
								<div class="mailbox-attachment-info">
									<a   class="mailbox-attachment-name"><i class="fas fa-camera"></i> {{$fileName}}</a>
									<span class="mailbox-attachment-size clearfix mt-1">
										<span>{{$fileSize}}</span>
										<a href="{{$inbox->attachment}}" download="{{$inbox->attachment}}" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
									</span>
								</div>
							</li>
							@endif
						</ul>
					</div>

					{{-- <div class="card-footer">
						<div class="float-right">
							<button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
							<button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
						</div>
						<button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
						<button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
					</div> --}}

				</div>

			</div>
		</div>
	</div>
	@endsection
