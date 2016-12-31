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
									<h1 class="mainTitle">Add new users</h1>
								</div>
							</div>
						</section>
						<div class="container-fluid container-fullw bg-white">
						 @if(session('success'))
						  <div class="alert alert-success" role="alert">
						  	 {{ session('success') }}
						  </div>
						  @endif
						  <fieldset>
							<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
		                        {{ csrf_field() }}
		                        <div class="form-group">
		                            <label for="name" class="control-label">FullNames</label>
		                            <input id="name" type="text" class="form-control" name="fullnames" required autofocus>
		                        </div>

		                        <div class="form-group">
		                            <label for="email" class="control-label">E-Mail Address</label>
		                            <input id="email" type="email" class="form-control" name="email"  required>
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
			                     <button type="submit" class="btn btn-primary">Register</button>
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