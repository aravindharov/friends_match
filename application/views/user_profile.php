<?php $this->load->view('header');?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Profile</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Main row -->
        <div class="row">
        	<section class="col-md-4">
	        	<div class="card ">
							<div class="card-body">
              	<div class="card-body box-profile">
	                <div class="text-center">
	                  <img class="profile-user-img img-fluid img-circle"
	                       src="<?php echo asset_url.'image/'.$user_details[0]['user_picture']?>"
	                       alt="User profile picture">
	                </div>

	                <h3 class="profile-username text-center"><?= $user_details[0]['user_fname']?></h3>

	                <p class="text-muted text-center"><?= $user_details[0]['user_designation']?></p>
	                <p class="text-muted text-center"><?= $user_details[0]['user_email']?></p>
	                <p class="text-muted text-center"><?= $user_details[0]['user_dob']?></p>
	                <ul class="list-group list-group-unbordered mb-3">
	                  <li class="list-group-item">
	                    <b>Gender</b> <a class="float-right"><?= $user_details[0]['user_gender']?></a>
	                  </li>
	                  <li class="list-group-item">
	                    <b>Country</b> <a class="float-right"><?= $user_details[0]['user_country']?></a>
	                  </li>
	                  <li class="list-group-item">
	                    <b>Favorite Color</b> <a class="float-right"><?= $user_details[0]['user_fav_color']?></a>
	                  </li>
	                  <li class="list-group-item">
	                    <b>Favorite Actor</b> <a class="float-right"><?= $user_details[0]['user_fav_actor']?></a>
	                  </li>
	                </ul>
	                <?php
	                $add='<a href="javascript:void(0);" class="btn btn-primary btn-block" onclick="add_friend('.
	                $user_details[0]["user_id"].')" id="friend"><b>Add a Frined</b></a>';
	                if ($friend!=false) {
	                	$add='<a href="javascript:void(0);" class="btn btn-primary btn-block" id="friend"><b>Already as Frined</b></a>';
	                }
	                ?>
	                <?= $add?>

			          </div>
			        </div>
			      </div>
	        </section>
	       
        	
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php $this->load->view('footer');?>
  <script type="text/javascript">
  	function add_friend(id) {
  		$('#loader').show();
	   	$('#friend').addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
	 		var x = 0;

			var k1 = $("span").removeClass('is-invalid');
			var err = '';
			$('#loader').show();

			$.ajax({
				type: "POST",
				url: "<?php echo site_url; ?>home/add_friend",
				dataType: "json",
				//  data: data11,
				data:'id='+id+'&<?php echo  $this->security->get_csrf_token_name(); ?>=<?php echo  $this->security->get_csrf_hash(); ?>',
				dataType: 'json',
				success: function(html) {
				   
					if (html.status == 0) {
						swal.fire(html.message, "", "error")
					}
					else
		     	{
		         	$('#loader').hide();
		         	swal.fire({
		         		position: 'center',
		             	type: 'success',
		             	title: html.message,
		             	showConfirmButton: false,
		             	timer: 2000
		     		}).then(function() {
		            location.reload();
		        	});
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
			return false;
  	}
  </script>