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
						<h4>Manage Organizations</h4>
						@if(session('orgusersuccess'))
						 <div class="alert alert-sucess">
						 	{{ orgusersuccess }}
						 </div>

						 @elseif(session('organizationUsererror'))
						 <div class="alert alert-danger">
						 	{{ organizationUsererror }}
						 </div>

						 @elseif(session('organizationUserexist'))
						 <div class="alert alert-danger">
						 	{{ organizationUserexist }}
						 </div>
						@endif
						<table  class="table table-responsive tableusers" cellspacing="0" width="100%" >
						    <thead>
						    <tr>  
						    <th>Organization Name</th>
						    <th>Address</th>
						    <th>Phone Number</th>
						    <th>Email</th>
						    <th>Office Phone Number</th>
						    <th>Created at</th>
						    <th>Add users</th>
						   </tr>
						    </thead>
						    <tbody>
						        @foreach($organization as $row)
						        
						       <tr>
						        <td><a  href="{{ url('VieworganizationUsers',$row->id)}}"> {{ $row->organization_name }}</a></td>
						        <td>{{ $row->address }}</td>
						        <td>{{ $row->phonenumber }}</td>
						        <td>{{ $row->email }}</td>
						        <td>{{ $row->officephonenumbers}}</td>
						        <td>{{ $row->created_at	 }}</td>
						         <td><a  data-organizationid="{{ $row->id}}" class="btn btn-primary btn-sm organizationid">Add users</a></td>
								</tr>
							    @endforeach
						    </tbody>
						</table>
						</div>
					</div>
				</div>


				<!--start of shopupdate modal-->
				<div class="modal fade bs-example-modal-lg addorganizationUsers" data-backdrop="static" to click out and data-keyboard="false" tabindex="-1"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				      <div class="modal-dialog modal-dialog modal-lg">
				         <div class="modal-content">
				           <div class="modal-header">
				             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				               <span aria-hidden="true">&times;</span>
				             </button>
				             <h4 class="modal-title" id="myModalLabel">Add Users to Organization</h4>
				           </div>
				           <div class="modal-body">
				            <div class="row">
				              <div class="col-md-12">
								<form class="form" role="form" method="POST" action="{{ url('/CreateUserOrg') }}">
		                        {{ csrf_field() }}
		                        <input type="hidden" name="organization_id" class="orgid">
		                        <div class="form-group">
		                            <label for="name" class="control-label">FullNames</label>
		                            <input id="name" type="text" class="form-control" name="fullnames" required autofocus>
		                        </div>

		                        <div class="form-group">
		                            <label for="email" class="control-label">E-Mail Address</label>
		                            <input id="email" type="email" class="form-control" name="email"  required>
		                        </div>

		                        <div class="form-group">
		                            <label for="title" class="control-label">Title</label>
		                            <input id="title" type="text" class="form-control" name="title"  required>
		                        </div>

		                         <div class="form-group">
		                            <label for="phonenumber" class="control-label">Phone number</label>
		                            <input id="number" type="text" class="form-control" name="phonenumber"  required>
		                        </div>

		                        <div class="form-group">
		                            <label for="password" class="control-label">Password</label>
		                            <input id="password" type="password" class="form-control" name="password" required>
		                        </div>

			                    <div class="form-group">
			                     <button type="submit" class="btn btn-success btn-o">Register Users</button>
			                     <button type="button" class="btn btn-danger btn-o" data-dismiss="modal">
				               Cancel
				             </button>
			                     </div>
			                     
                            </form>
				              </div>
				            </div>
				           </div>
				           <div class="modal-footer">
				           
				         </div>
				       </div>
				</div><!--end -->
			</div>
			@include('layouts.backendLayouts.footersection')
			@include('layouts.backendLayouts.sidebarsettings')
		</div>
@endsection
