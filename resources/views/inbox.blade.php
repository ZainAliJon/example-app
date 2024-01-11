@extends('main')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<a href="{{url('/task/compose/'.@$task->id)}}" class="btn btn-primary btn-block mb-3">Compose</a>
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
								<span class="badge bg-primary float-right">{{count($task->inboxes)}}</span>
							</a>
						</li>
					</ul>
				</div>

			</div>

		</div>

		<div class="col-md-9">
			<div class="card card-primary card-outline">
				<div class="card-header">
					<h3 class="card-title">Inbox</h3>
				{{-- 	<div class="card-tools">
						<div class="input-group input-group-sm">
							<input type="text" class="form-control" placeholder="Search Mail">
							<div class="input-group-append">
								<div class="btn btn-primary">
									<i class="fas fa-search"></i>
								</div>
							</div>
						</div>
					</div> --}}

				</div>

				<div class="card-body p-0">
					{{-- <div class="mailbox-controls">

						<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
						</button>
						<div class="btn-group">
							<button type="button" class="btn btn-default btn-sm">
								<i class="far fa-trash-alt"></i>
							</button>
							<button type="button" class="btn btn-default btn-sm">
								<i class="fas fa-reply"></i>
							</button>
							<button type="button" class="btn btn-default btn-sm">
								<i class="fas fa-share"></i>
							</button>
						</div>

						<button type="button" class="btn btn-default btn-sm">
							<i class="fas fa-sync-alt"></i>
						</button>
						<div class="float-right">
							1-50/200
							<div class="btn-group">
								<button type="button" class="btn btn-default btn-sm">
									<i class="fas fa-chevron-left"></i>
								</button>
								<button type="button" class="btn btn-default btn-sm">
									<i class="fas fa-chevron-right"></i>
								</button>
							</div>

						</div>

					</div> --}}
					<div class="table-responsive mailbox-messages">
						<table class="table table-hover table-striped">
							<tbody>
								@foreach($task->inboxes as $inbox)
								<?php

								$created_at = $inbox->created_at; 

								$currentDateTime = new DateTime();
								$createdDateTime = new DateTime($created_at);
								$interval = $createdDateTime->diff($currentDateTime);

								if ($interval->y >= 1) {
									$time =  $interval->y . " year" . ($interval->y > 1 ? "s" : "") . " ago";
								} elseif ($interval->m >= 1) {
									$time =  $interval->m . " month" . ($interval->m > 1 ? "s" : "") . " ago";
								} elseif ($interval->d >= 1) {
									$time =  $interval->d . " day" . ($interval->d > 1 ? "s" : "") . " ago";
								} elseif ($interval->h >= 1) {
									$time =  $interval->h . " hour" . ($interval->h > 1 ? "s" : "") . " ago";
								} elseif ($interval->i >= 1) {
									$time =  $interval->i . " minute" . ($interval->i > 1 ? "s" : "") . " ago";
								} else {
									$time =  "Just now";
								}

								?>

								<tr>
									{{-- <td>
										<div class="icheck-primary">
											<input type="checkbox" value="" id="check1">
											<label for="check1"></label>
										</div>
									</td> --}}
									<td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
									<td class="mailbox-name"><a href="{{url('/task/readMessage/'.$inbox->id)}}">{{@$inbox->user->name}}</a></td>
									<td class="mailbox-subject"><b>{{$inbox->subject}}</b> 
									</td>
									<td class="mailbox-attachment"></td>
									<td class="mailbox-date">{{$time}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>

					</div>

				</div>

				<div class="card-footer p-0">
					<div class="mailbox-controls">

						{{-- <button type="button" class="btn btn-default btn-sm checkbox-toggle">
							<i class="far fa-square"></i>
						</button>
						<div class="btn-group">
							<button type="button" class="btn btn-default btn-sm">
								<i class="far fa-trash-alt"></i>
							</button>
							<button type="button" class="btn btn-default btn-sm">
								<i class="fas fa-reply"></i>
							</button>
							<button type="button" class="btn btn-default btn-sm">
								<i class="fas fa-share"></i>
							</button>
						</div>

						<button type="button" class="btn btn-default btn-sm">
							<i class="fas fa-sync-alt"></i>
						</button> --}}
						{{-- <div class="float-right">
							1-50/200
							<div class="btn-group">
								<button type="button" class="btn btn-default btn-sm">
									<i class="fas fa-chevron-left"></i>
								</button>
								<button type="button" class="btn btn-default btn-sm">
									<i class="fas fa-chevron-right"></i>
								</button>
							</div>

						</div> --}}

					</div>
				</div>
			</div>

		</div>

	</div>
</div>
@endsection