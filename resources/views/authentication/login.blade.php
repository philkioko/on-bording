@extends('layouts.master')
@section('content')
@include('layouts.clientLayouts.navbar')
        <!-- start: LOGIN -->
        <div class="row">
            <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <div class="logo margin-top-30">
                </div>
                <!-- start: LOGIN BOX -->
                <div class="box-login">
                    <form class="form-login" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                        <fieldset>
                            <legend>
                                Sign in to your account
                            </legend>
                            @if(session('errors'))
                                 <div class="alert alert-danger">
                                    {{ session('errors') }}
                                </div>
                            @endif
                            <p>
                                Please enter your email and password to log in.
                            </p>
                            <div class="form-group">
                                <span class="input-icon">
                                    <input type="email" class="form-control" name="email" placeholder="email" required="true">
                                    <i class="fa fa-user"></i> </span>
                            </div>
                            <div class="form-group form-actions">
                                <span class="input-icon">
                                    <input type="password" class="form-control password" name="password" placeholder="Password" required="true">
                                    <i class="fa fa-lock"></i>
                                     </span>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Login <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                            
                            </div>
                        </fieldset>
                    </form>
                    <!-- start: COPYRIGHT -->
                    <div class="copyright">
                        &copy; <span class="current-year"></span><span class="text-bold text-uppercase"></span>. <span>All rights reserved</span>
                    </div>
                    <!-- end: COPYRIGHT -->
                </div>
                <!-- end: LOGIN BOX -->
            </div>
        </div>
        <!-- end: LOGIN -->
@endsection