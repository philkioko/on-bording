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
						<h4>Create New Organization</h4>
						 @if(session('success'))
						  <div class="alert alert-success" role="alert">
						  	 {{ session('success') }}
						  </div>
						  @elseif(session('organizationsuccess'))
						  <div class="alert alert-success" role="alert">
						  	 {{ session('organizationsuccess') }}
						  </div>
						  @elseif(session('organizationerror'))
						  <div class="alert alert-danger" role="alert">
						  	 {{ session('organizationerror') }}
						  </div>
						   @elseif(session('organizationexist'))
						  <div class="alert alert-danger" role="alert">
						  	 {{ session('organizationexist') }}
						  </div>
						  @endif
				
						  <fieldset>
							<form class="form-horizontal" role="form" method="POST" action="{{ url('/NewOrganization') }}">
		                        {{ csrf_field() }}
		                        <div class="form-group">
		                            <label for="organization_name" class="control-label">Organization name</label>
		                            <input id="organization_name" type="text" class="form-control" name="organization_name" autofocus required="true">
		                        </div>

		                        <div class="form-group">
		                            <label for="Address" class="control-label">Address</label>
		                            <input id="address" type="text" class="form-control" name="address" required="true">
		                        </div>

		                         <div class="form-group">
		                            <label for="phonenumber" class="control-label">Contact person number</label>
		                            <input id="phonenumber" type="text" class="form-control" name="phonenumber"  required="true">
		                        </div>

		                        <div class="form-group">
		                            <label for="email" class="control-label">Contact person email</label>
		                            <input id="email" type="email" class="form-control" name="email" >
		                        </div>
		                        <div class="row">
		                        	<div class="col-md-10">

		                        		<div class="input_fields_wrap form-group">
										 <label for="officephonenumbers" class="control-label">Office phone numbers</label>
										    
										    <div><input type="text" id="officephonenumbers" name="officephonenumbers[]" class="form-control" >
										</div>
										</div>
		                        	</div>
		                        	<div class="col-md-2 ">
		                        	<br>
		                        		<button class="add_field_button btn btn-default btn-sm">Add phone number</button></div>
		                        	</div>
		                        </div>
		                        

			                    <div class="form-group">
			                     <button type="submit" class="btn btn-primary">Create Organization</button>
			                     </div>
                            </form>
                           </fieldset>
						</div>
					</div>
				</div>
			</div>
			@include('layouts.backendLayouts.footersection')
			@include('layouts.backendLayouts.sidebarsettings')
		</div>
@endsection