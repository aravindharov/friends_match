<?php
$this->load->view('header');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Search Friends</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      	<div class="form-group">
	      	<div class="col-sm-3">
			      <div class="input-group input-group-sm">
			        <input class="form-control form-control-navbar" onkeydown="search(this);" type="search" placeholder="Search" aria-label="Search">
			      </div>
	      	</div>
      	</div>  
	      
      	<div class="kt-portlet container-fluid">
  				<form class="kt-form kt-form--label-right" id="filter" method="post" action="">
  					<input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>" id="csrf_token" value="<?php echo  $this->security->get_csrf_hash(); ?>" />
            
	      		<div class="kt-portlet_header">
	      			<h3>Filter</h3>
	      		</div>
	      		<div class="kt-portlet_body">
          
              <div class="form-group row">
		            <div class="col-sm-3">
                  <select class="select form-control" name="user_gender">
                      <option value="">Select Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                  </select>
                </div>
		            <div class="col-sm-3">
		                
		                    <input type="text" name="user_dob" class="form-control datePicker" placeholder="DOB">
		                
		            </div>
		            <div class="col-sm-3">
		                
		                    <input type="text" name="user_fav_actor" class="form-control " placeholder="Favorite Actor">
		                
		            </div>
		            <div class="col-sm-3">
		                    <input type="text" name="user_fav_color" class="form-control " placeholder="Favorite Color">
		            </div>
              </div>
          
	      		</div>
	      		<div class="kt-portlet_footer">
	      			<input type="submit" class="btn btn-success" value="Filter">
	      		</div>
  				</form>
      	</div>
       
        <!-- Main row -->
        <div class="row" id="friends_data">
        	<?php
        	if ($friends!=false) {
        		foreach($friends as $ke=>$val){ ?>
        			<section class="col-md-4">
			        	<div class="card ">
									<div class="card-body">
				              	<div class="card-body box-profile">
				              		<a href="<?php echo site_url.'home/user_profile/'.$val['user_id']?>">
						                <div class="text-center">
						                  <img class="profile-user-img img-fluid img-circle"
						                       src="<?php echo asset_url.'image/'.$val['user_picture']?>"
						                       alt="User profile picture">
						                </div>

						                <h3 class="profile-username text-center"><?= $val['user_fname']?></h3>

						                <p class="text-muted text-center"><?= $val['user_designation']?></p>
				              		</a>
					            </div>
					        	</div>
			            </div>
			        </section>
			        <?php
        		}
        	}
        	?>
        	
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php
$this->load->view('footer');
?>
<script type="text/javascript">
	$('.datePicker').datepicker({
           // rtl: KTUtil.isRTL(),
           		todayHighlight: true,
              	orientation: "bottom left",
              	format:"dd/mm/yyyy",
              	autoclose:true
	           // templates: arrows
	       });
	function search(e) {
		var val=$(e).val();
		var msg='';
		$('#friends_data').empty();
		$.ajax({
				type: "POST",
				url: "<?php echo site_url; ?>home/search_friend_data",
				dataType: "json",
				//  data: data11,
				data:'val='+val+'&<?php echo  $this->security->get_csrf_token_name(); ?>=<?php echo  $this->security->get_csrf_hash(); ?>',
				dataType: 'json',
				success: function(html) {
				   $('#friends_data').empty();
					if (html.status == 0) {
						swal.fire(html.message, "", "error")
					}
					else
		     	{
		     		$.each(html.message,function(k,v)
		     		{
			     		msg+='<section class="col-md-4">'+
				        	'<div class="card ">'+
										'<div class="card-body">'+
					              	'<div class="card-body box-profile">'+
					              		'<a href="<?php echo site_url.'home/user_profile/'?>'+v['user_id']+'">'+
							                '<div class="text-center">'+
							                  '<img class="profile-user-img img-fluid img-circle" src="<?php echo asset_url.'image/'?>'+v['user_picture']+'" alt="User profile picture">'+
							                '</div>'+

							                '<h3 class="profile-username text-center">'+v['user_fname']+'</h3>'+

							                '<p class="text-muted text-center">'+v['user_designation']+'</p>'+
					              		'</a>'+
						            '</div>'+
						        	'</div>'+
				            '</div>'+
				        '</section>';
				      });
		     		$('#friends_data').append(msg);
		     	}
				},
				complete: function(data) {
					$('#loader').hide();
					$('#friend').removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
					$("#upload [name='submit']").attr('disabled',false);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					swal.fire({
						title: "Please try again!",
						timer: 2000,
						onOpen: function() {
							swal.showLoading()
						}
					})
				}
			});
	}
	$('#filter').on('submit',function(){ 	
		var msg='';
		$('#friends_data').empty();
		$.ajax({
				type: "POST",
				url: "<?php echo site_url; ?>home/search_friend_filter",
				dataType: "json",
				//  data: data11,
				data:$('#filter').serialize(),
				dataType: 'json',
				success: function(html) {
				   $('#friends_data').empty();
					if (html.status == 0) {
						swal.fire(html.message, "", "error")
					}
					else
		     	{
		     		$.each(html.message,function(k,v)
		     		{
			     		msg+='<section class="col-md-4">'+
				        	'<div class="card ">'+
										'<div class="card-body">'+
					              	'<div class="card-body box-profile">'+
					              		'<a href="<?php echo site_url.'home/user_profile/'?>'+v['user_id']+'">'+
							                '<div class="text-center">'+
							                  '<img class="profile-user-img img-fluid img-circle" src="<?php echo asset_url.'image/'?>'+v['user_picture']+'" alt="User profile picture">'+
							                '</div>'+

							                '<h3 class="profile-username text-center">'+v['user_fname']+'</h3>'+

							                '<p class="text-muted text-center">'+v['user_designation']+'</p>'+
					              		'</a>'+
						            '</div>'+
						        	'</div>'+
				            '</div>'+
				        '</section>';
				      });
		     		$('#friends_data').append(msg);
		     	}
				},
				complete: function(data) {
					$('#loader').hide();
					$('#friend').removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
					$("#upload [name='submit']").attr('disabled',false);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					swal.fire({
						title: "Please try again!",
						timer: 2000,
						onOpen: function() {
							swal.showLoading()
						}
					})
				}
			});
		return false
	});
</script>