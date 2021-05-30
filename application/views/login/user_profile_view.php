<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
					try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			</script>

			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo site_url ?>">Home</a>
				</li>

				<li>
					<a href="<?php echo site_url ?>user">User</a>
				</li>
				<li class="active">Profile Update</li>
			</ul><!-- /.breadcrumb -->

			
		</div><!-- /.breadcrumb -->
		
				<div class="page-content">
							
			<div class="row">
				<div class="col-xs-12 col-sm-10 col-sm-offset-1">
				<!-- PAGE CONTENT BEGINS -->
				<div class="widget-box">
					
				<div class="widget-header">
					<h4 class="widget-title">
						<i class="ace-icon fa fa-tachometer"></i>
						Profile Update
					</h4>
				</div><!--/.widget-header-->
				<div class="widget-body"><div id="error_add"></div>
					<form class="form-horizontal" method="post" role="form" id="upload" action="<?php echo site_url; ?>user_profile/user_profile_update" >
						
<input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>" id="csrf_token" value="<?php echo  $this->security->get_csrf_hash(); ?>" />
		<div id="error_add"> <?php echo $message_div; ?></div>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		
	<div class="form-group">
		<label class="col-xs-6 col-sm-4 col-md-4 col-lg-4 fmlblother control-label no-padding-right  " for="agt_name"> User Name </label>

		<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7 fullwidth">
			<input type="text" required readonly="readonly" name="username" class="form-control" id="username" value="<?php echo $form_data['username'] ?>" placeholder="Enter Country Name">
		</div><!--/.col-sm-7-->
	</div><!--/.form-group-->
	
</div><!--/.col-sm-4-->
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		
	<div class="form-group">
		<label class="col-xs-6 col-sm-4 col-md-4 col-lg-4 fmlblother control-label no-padding-right  " for="agt_name"> Old Password * </label>

		<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7 fullwidth">
			 <input type="password" name="opassword" class="form-control"  value="<?php echo $form_data['opassword'] ?>" id="opassword" placeholder="Old Password">
		</div><!--/.col-sm-7-->
	</div><!--/.form-group-->
	
</div><!--/.col-sm-4-->
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		
	<div class="form-group">
		<label class="col-xs-6 col-sm-4 col-md-4 col-lg-4 fmlblother control-label no-padding-right  " for="agt_name"> Old Password * </label>

		<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7 fullwidth">
			 <input type="password" name="npassword" class="form-control"  value="<?php echo $form_data['npassword'] ?>" id="npassword" placeholder="New Password">
		</div><!--/.col-sm-7-->
	</div><!--/.form-group-->
	
</div><!--/.col-sm-4-->
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		
	<div class="form-group">
		<label class="col-xs-6 col-sm-4 col-md-4 col-lg-4 fmlblother control-label no-padding-right  " for="agt_name"> Confirm Password  <sup>*</sup></label>

		<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7 fullwidth">
			 <input type="password" name="cpassword" class="form-control"  value="<?php echo $form_data['cpassword'] ?>" id="cpassword" placeholder="Confirm Password">
		</div><!--/.col-sm-7-->
	</div><!--/.form-group-->
	
</div><!--/.col-sm-4-->

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		
	<div class="form-group">
		<label class="col-xs-6 col-sm-4 col-md-4 col-lg-4 fmlblother control-label no-padding-right  " for="email">Email Id. * </label>

		<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7 fullwidth">
			<input type="text" name="email" class="form-control" id="email" value="<?php echo $form_data['email'] ?>" />
		</div><!--/.col-sm-7-->
	</div><!--/.form-group-->
	
</div><!--/.col-sm-4-->
						
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		
	<div class="form-group">
		<label class="col-xs-6 col-sm-4 col-md-4 col-lg-4 fmlblother control-label no-padding-right  " for="mobile">Contact No. *  </label>

		<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7 fullwidth">
			<input type="text" name="mobile" class="form-control" id="mobile" value="<?php echo $form_data['mobile'] ?>" />
		</div><!--/.col-sm-7-->
	</div><!--/.form-group-->
	
</div><!--/.col-sm-4-->
						
						
						
				<div class="clearfix"></div>
						
				<div class="clearfix">
							<div class="col-md-offset-5 col-md-7">
								<button class="btn btn-info mtb10" type="submit" name="submit">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Update Profile
								</button>

							</div>
						</div>
						
						</form>
						

						
						

				</div><!--/.widget-body-->
				</div><!--/.widget-box-->
				
				</div><!-- /.col -->

<!--/.col-->	
				
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	
	</div><!--/.main-content-inner-->
</div><!-- /.main-content -->	




<div id="myModal" class="modal fade" role="dialog">
	
	<div class="modal-dialog">
	<!-- Modal content-->
	    <div class="modal-content">
	      
	      <div class="modal-body">
	        <p id="result"></p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
	      </div>
	      
	    </div><!--/.modal-content-->

	</div>
	
</div><!--/.myModal-->



<link rel="stylesheet" href="<?php echo asset_url; ?>css/datepicker.min.css" />

<script type="text/javascript">
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
		
</script>	


<script>



</script>



 

		<!-- jQuery File Upload Dependencies -->
		
		
		<!-- Our main JS file -->
		<!--<script src="<?php echo asset_url ?>plugins/ajax_upload/assets/js/script.js"></script>-->
		







                
                
                