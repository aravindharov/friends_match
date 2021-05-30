<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8" />
		<title>Login  <?= title_tag ?></title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

		<!--end::Fonts -->

		<!--begin::Page Custom Styles(used by this page) -->
		<link href="<?php echo asset_url; ?>css/pages/login/login-6.css" rel="stylesheet" type="text/css" />

		<!--end::Page Custom Styles -->

		<!--begin::Global Theme Styles(used by all pages) -->

		<!--begin:: Vendor Plugins -->
		<link href="<?php echo asset_url; ?>plugins/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/quill/dist/quill.snow.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/plugins/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/plugins/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/plugins/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo asset_url; ?>plugins/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

		<!--end:: Vendor Plugins -->
		<link href="<?php echo asset_url; ?>css/style.bundle.css" rel="stylesheet" type="text/css" />

	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
		<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->
		
		<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v6 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
					<div class="kt-grid__item  kt-grid__item--order-tablet-and-mobile-2  kt-grid kt-grid--hor kt-login__aside" style="margin: 0 auto;">
						<div class="kt-login__wrapper">
							<div class="kt-login__container">
								<div class="kt-login__body">
									
									<div class="kt-login__signin">
										<div class="kt-login__form">
											<form class="kt-form" action="<?php echo site_url; ?>login/process" method="post" class=" ">
												<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" id="csrf_token" value="<?php echo $this->security->get_csrf_hash(); ?>"/>
												<input type="hidden" name="type" value="1">
												<div class="input-group">
													<input value="<?php echo $form_data['user_name'] ?>" required name="user_name" type="text" placeholder="Email address" class="form-control" autofocus/>
												</div>
												<div class="input-group">
													<input  type="password" name="user_password" required placeholder="password" class="form-control"/>
												</div>
												<div class="kt-login__actions">
													<button id="kt_login_signin_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Sign In</button>
												</div>
											</form>
										</div>
									</div>
									<div class="kt-login__signup">
										<div class="kt-login__head">
											<h3 class="kt-login__title">Sign Up</h3>
										</div>
										<div class="kt-login__form">
											<form class="kt-form" action="" id="upload" method="post">
												<input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>" id="csrf_token" value="<?php echo  $this->security->get_csrf_hash(); ?>" />
												<div class="form-group">
													<input class="form-control" type="text" placeholder="Fullname" name="fullname">
													<span class="invalid-feedback"></span>
												</div>
												<div class="form-group">
													<input class="form-control" type="text" placeholder="Email" name="uEmail" autocomplete="off">
													<span class="invalid-feedback"></span>
												</div>
												<div class="form-group">
													<input class="form-control" type="password" placeholder="Password" name="password">
													<span class="invalid-feedback"></span>
												</div>
												<div class="form-group">
													<input class="form-control " type="password" placeholder="Confirm Password" name="rpassword">
													<span class="invalid-feedback"></span>
												</div>
												<div class="form-group">
													<input class="form-control datePicker " type="text" placeholder="DOB" name="dob">
													<span class="invalid-feedback"></span>
												</div>
												<div class="form-group">
													<input class="form-control " type="text" placeholder="Designation" name="designation">
													<span class="invalid-feedback"></span>
												</div>
												<div class="form-group">

													<label for="message-text" class="form-control-label">Gender&nbsp;&nbsp;<sup><span class="fa fa-asterisk"></span></sup></label>

													<div class="kt-radio-inline">

														<label class="kt-radio">

															<input type="radio" name="gender" value="male" checked>Male

															<span></span>

														</label>

														<label class="kt-radio">

															<input type="radio" name="gender" value="female" > Female

															<span></span>
														</label>

													</div>

													<span class="invalid-feedback"></span>

												</div>

												<div class="form-group">
													<label for="message-text" class="form-control-label">Profile Picture&nbsp;&nbsp;<sup><span class="fa fa-asterisk"></span></sup></label>
													<input class="form-control " type="file" name="profile_picture" accept="image/*">
													<span class="invalid-feedback"></span>
												</div>

												<div class="form-group">
													<input class="form-control " type="text" placeholder="Country" name="country">
													<span class="invalid-feedback"></span>
												</div>

												<div class="form-group">
													<input class="form-control " type="text" placeholder="Favorite Color" name="fav_color">
													<span class="invalid-feedback"></span>
												</div>

												<div class="form-group">
													<input class="form-control " type="text" placeholder="Favorite Actor" name="fav_actor">
													<span class="invalid-feedback"></span>
												</div>
												
												<div class="kt-login__actions">
													<button type="submit" id="signup" class="btn btn-brand btn-pill btn-elevate">Sign Up</button>
													<button id="kt_login_signup_cancel" class="btn btn-outline-brand btn-pill">Cancel</button>
												</div>
											</form>
										</div>
									</div>
									<div class="kt-login__forgot">
										<div class="kt-login__head">
											<h3 class="kt-login__title">Forgotten Password ?</h3>
											<div class="kt-login__desc">Enter your email to reset your password:</div>
										</div>
										<div class="kt-login__form">
											<form class="kt-form" action="" id="forgotUpload">
												<input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>" id="csrf_token" value="<?php echo  $this->security->get_csrf_hash(); ?>" />
												<div class="form-group">
													<input class="form-control" type="text" placeholder="Email" name="resEmail" id="kt_email" autocomplete="off">
												</div>
												<div class="kt-login__actions">
													<button type="kt_login_signin_submit" id="forget" class="btn btn-brand btn-elevate kt-login__btn-primary">Send Link</button>
													<button id="kt_login_forgot_cancel" class="btn btn-outline-brand btn-pill"><a href="<?= site_url ?>/login">Cancel</a></button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="kt-login__account">
								<span class="kt-login__account-msg">
									Don't have an account yet ?
								</span>&nbsp;&nbsp;
								<a href="javascript:;" id="kt_login_signup" class="kt-login__account-link">Sign Up!</a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div><!-- begin:: Page -->
	

		<!-- end:: Page -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#2c77f4",
						"light": "#ffffff",
						"dark": "#282a3c",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			}
		</script>

		<!--begin:: Vendor Plugins -->
		<script src="<?php echo asset_url; ?>plugins/general/jquery/dist/jquery.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/moment/min/moment.min.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/wnumb/wNumb.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/js/global/integration/plugins/bootstrap-datepicker.init.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/js/global/integration/plugins/bootstrap-timepicker.init.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/plugins/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/js/global/integration/plugins/bootstrap-switch.init.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/autosize/dist/autosize.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/js/global/integration/plugins/dropzone.init.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/quill/dist/quill.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/@yaireo/tagify/dist/tagify.polyfills.min.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/@yaireo/tagify/dist/tagify.min.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/summernote/dist/summernote.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/markdown/lib/markdown.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/js/global/integration/plugins/bootstrap-markdown.init.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/js/global/integration/plugins/bootstrap-notify.init.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/js/global/integration/plugins/jquery-validation.init.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/toastr/build/toastr.min.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/dual-listbox/dist/dual-listbox.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/raphael/raphael.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/morris.js/morris.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/plugins/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/plugins/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/counterup/jquery.counterup.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/js/global/integration/plugins/sweetalert2.init.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
		<script src="<?php echo asset_url; ?>plugins/general/dompurify/dist/purify.js" type="text/javascript"></script>

		<!--end:: Vendor Plugins -->
		<script src="<?php echo asset_url; ?>js/scripts.bundle.js" type="text/javascript"></script>
<!-- <script src="<?php echo asset_url ?>js/pages/custom/login/login-general.js" type="text/javascript"></script> -->
		

		<!--end::Global Theme Bundle -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="<?php echo asset_url; ?>js/pages/custom/login/login-general.js?v=23" type="text/javascript"></script>

		<script>
			$('.datePicker').datepicker({
           // rtl: KTUtil.isRTL(),
           		todayHighlight: true,
              	orientation: "bottom left",
              	format:"dd/mm/yyyy",
              	autoclose:true
	           // templates: arrows
	       });
			var showErrorMsg = function(form, type, msg) {
	        var alert = $('<div class="alert alert-' + type + ' alert-dismissible" role="alert">\
					<div class="alert-text">'+msg+'</div>\
					<div class="alert-close">\
		                <i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i>\
		            </div>\
				</div>');

		        form.find('.alert').remove();
		        alert.prependTo(form);
		        //alert.animateClass('fadeIn animated');
		        KTUtil.animateClass(alert[0], 'fadeIn animated');
		        alert.find('span').html(msg);
		    }
			$('#kt_login_signin_submit').click(function(e) {

            	e.preventDefault();
	            var btn = $(this);
	            var form = $(this).closest('form');
	            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
	            form.ajaxSubmit({
	            	type: "POST",
	            	dataType: "json",
	                url: "<?php echo site_url ?>login/process",
	                success: function(response, status, xhr, $form) {
	                	
	                	if(response.status == '1')
	                	{
	                		
		                   
		                    showErrorMsg(form, 'success', 'Login success. You will be redirected in a moment.');
		                    setTimeout(function() {
		                    	window.location=response.newUrl;
		                    },2000);

	                		// window.location = response.newUrl;
	                	}
	                	else
	                	{
	                		showErrorMsg(form, 'danger', response.message);
	                	}
	                	// similate 2s delay
	                	
	                    
	                },
	                complete: function (data) 
					{
						setTimeout(function() {
						btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
					},1000);
					},
					error: function(jqXHR, textStatus, errorThrown) { alert('Please try again'); }
	            });
	        });
		</script>
		<script>
			$(document).ready(function() { 	
		       	$("#upload").on("submit", function(event) {
		        	var dat=new FormData( this );
		           	$('#loader').show();
		           	$('#signup').addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
		         	var desc = $("#abstract_1").html();
		         	event.preventDefault();
		           	var x = 0;

					var k1 = $("span").removeClass('is-invalid');
					var err = '';
					$('#loader').show();
		   
					$.ajax({
						type: "POST",
						url: "<?php echo site_url; ?>login/addProcess",
						dataType: "json",
						//  data: data11,
						data: dat,
						cache: false,
						dataType: 'json',   //No I18N
						processData: false, // Don't process the files
						contentType: false, // Set cont
						success: function(html) {
						   
							$('input').removeClass('is-invalid');
							$('textarea').removeClass('is-invalid');
							$('select').removeClass('is-invalid');
							$('#error_add').empty();
							if (html.status == 0) {
					        	$('input').removeClass('is-invalid');
					           	$('textarea').removeClass('is-invalid');
					           	$('select').removeClass('is-invalid');
					            $('.invalid-feedback').html('');
					            swal.fire({
					                title: 'Please fill valid data',
					            	timer: 1000,
					                onOpen: function() {
					                    swal.showLoading()
					                }
					            }); 
					            var s = 0;
					           	$.each(html.message, function(k, v) {
									err += '<p>' + v + '</p>';
									if (s < 1) {
									   $("#upload [name='" + k + "']").focus();
									   s++;
									}
									var k1 = $("#upload [name='" + k + "'] ~span.invalid-feedback");
					     			k1.html(v);
					     			$("#upload [name='"+k+"']").addClass( "is-invalid" );
					     		});
					        } 
							else if(html.status == 2){
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
		       				$('#signup').removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
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
		       	});
		   	});
		   
			$('#myModal').on('shown.bs.modal', function() {
		       $('.modal-footer .btn').focus();
		   	});
   
		</script>
		
		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>

