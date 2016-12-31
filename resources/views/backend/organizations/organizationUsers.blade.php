@extends('backend.organization_layout.organization_master')
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
							<table  class="table table-responsive tableusers" cellspacing="0" width="100%" >
						    <thead>
						    <tr>  
						    <th>Fullnames</th>
						    <th>Title</th>
						    <th>Phone Numbers</th>
						    <th>Email Address</th> 
						    <th>Created at</th>
						    <th>Status</th>
						   </tr>
						    </thead>
						    <tbody>
						    
						    <?php
						     use App\User;
						     $users=User::all();	
						       foreach($organization as $org){	
						         foreach($users as $row){
						         	$act=User::find($row->id)->ActivationUser;
						   		    $act->user_id;
						   		    if ($org->id==$act->user_id) { ?>
						   		    <tr>
						   		     <td><?php echo  $org->fullnames;?></td>
						   		     <td><?php echo  $org->title;?></td>
						   		     <td><?php echo  $org->phonenumber;?></td>
						   		     <td><?php echo  $org->email;?></td>
						   		     <td><?php echo  $org->created_at;?></td>
						   		     <td>
						   		     <?php
						   		     $activation=$act->completed;
						   		     	if ($activation=='0') { ?>
						   		     	<div class="btn-group" role="group">
					                    <button type="button" class="btn btn-danger dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					                    In-active
					                    </button>
						   		     	<?php }else if ($activation=='1') { ?>
						   		     	  <div class="btn-group" role="group">
					                      <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					                      Active
					                      </button>
						   		     	<?php }
						   		     	?>
						   		     </td>
						   		     </tr>
						   		  <?php }
						         }  
 							}
					   		?>
					   		
						    </tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
			@include('layouts.backendLayouts.footersection')
			@include('layouts.backendLayouts.sidebarsettings')
		</div>
