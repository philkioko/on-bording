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
						@if(session('rolesuccess'))
						  <div class="alert alert-success">
						  	{{ session('rolesuccess') }}
						  </div>
						  @elseif(session('roleerror'))
						   <div class="alert alert-danger">
						  	{{ session('roleerror') }}
						  </div>
						  @elseif(session('roleexist'))
						   <div class="alert alert-danger">
						  	{{ session('roleexist') }}
						  </div>

						  @elseif(session('roleremovesuccess'))
						   <div class="alert alert-success">
						  	{{ session('roleremovesuccess') }}
						  </div>
						  @elseif(session('roleremoveerror'))
						   <div class="alert alert-danger">
						  	{{ session('roleremoveerror') }}
						  </div>
						@endif
						<h4>Manage system user roles</h4>

						<table  class="table table-responsive tableusers" cellspacing="0" width="100%" >
						    <thead>
						    <tr>  
						    <th>Fullnames</th>
						    <th>Phone Numbers</th>
						    <th>Email Address</th>
						    <th>Created at</th>
						    <th>Add Roles</th>
						    <th>Remove Roles</th>
						   </tr>
						    </thead>
						    <tbody>
						        @foreach($users as $row)
						        <tr>
						        <td>{{ $row->fullnames }}</td>
						        <td>{{ $row->phonenumber }}</td>
						        <td>{{ $row->email }}</td>
						        <td>{{ $row->created_at	 }}</td>
						        <td>
						        	<div class="btn-group" role="group">
					                    <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					                    Add Roles
					                    <span class="caret"></span>
					                  </button>
					                   <ul class="dropdown-menu">
					                  <li><a class="administrator"     href="{{ url('postroles',['userid'=>$row->id,'role'=>'super administrator'] )}}">Super Administrator</a></li> 
					                     <li><a class="administrator"     href="{{ url('postroles',['userid'=>$row->id,'role'=>'administrator'] )}}">Administrator</a></li> 
					                  </ul>
						        </td>

						        <td>
						        	<div class="btn-group" role="group">
					                    <button type="button" class="btn btn-danger dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					                    Remove Roles
					                    <span class="caret"></span>
					                  </button>
					                   <ul class="dropdown-menu">
					                  <li><a class="administrator"     href="{{ url('Removeroles',['userid'=>$row->id,'role'=>'super administrator'] )}}">Super Administrator</a></li> 
					                     <li><a class="administrator"     href="{{ url('Removeroles',['userid'=>$row->id,'role'=>'administrator'] )}}">Administrator</a></li> 
					                  </ul>
						        </td>
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