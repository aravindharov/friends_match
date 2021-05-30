<?php
$this->load->view('header');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Home</h1>
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
