@extends('backend.master')
@section("content")
	<div id="app">
			@include('layouts.backendLayouts.sidebar')
			<div class="app-content">
				@include('layouts.backendLayouts.topnavbar')
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<section id="page-title" class="padding-top-15 padding-bottom-15">
							<div class="row">
								<div class="col-sm-7">
									<h1 class="mainTitle">Dashboard</h1>
								</div>
							</div>
						</section>
						<div class="container-fluid container-fullw bg-white">
						
						<h4>Manage system users</h4>

						<table  class="table table-responsive tableusers" cellspacing="0" width="100%" >
						    <thead>
						    <tr>  
						    <th>Fullnames</th>
						    <th>Phone Numbers</th>
						    <th>Email Address</th>
						    <th>Created at</th>
						   </tr>
						    </thead>
						    <tbody>
						        @foreach($users as $row)
						        <tr>
						        <td>{{ $row->fullnames }}</td>
						        <td>{{ $row->phonenumber }}</td>
						        <td>{{ $row->email }}</td>
						        <td>{{ $row->created_at	 }}</td>
								</tr>
							    @endforeach
						    </tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
			@include('layouts.backendLayouts.footersection')
			@include('layouts.backendLayouts.sidebarsettings')
		</div>
@endsection