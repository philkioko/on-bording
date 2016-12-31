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
						   <h4>Create System Roles </h4>
						   @if(session('success'))
						   <div class="alert alert-success">
						   	 {{ session('success') }}
						   </div>
						   @endif
							<fieldset>
								<form class="form-horizontal" role="form" method="POST" action="{{ url('/roles') }}">
		                        {{ csrf_field() }}
		                        <div class="form-group">
		                            <label for="rolename" class="control-label">Role name</label>
		                            <input id="rolename" type="text" class="form-control" name="slug" required autofocus>
		                        </div>

			                    <div class="form-group">
			                     <button type="submit" class="btn btn-primary">Create Roles</button>
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