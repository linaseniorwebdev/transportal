<!-- BEGIN:: Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2">

<!-- BEGIN:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page container">

	<!-- BEGIN::Body -->
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
		<div class="m-grid__item m-grid__item--fluid m-wrapper">
			<div class="m-content">

				<!-- Begin::Main Portlet -->
				<div class="m-portlet">

					<!-- BEGIN:: Portlet Head -->
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h3 class="m-portlet__head-text">
									Consumer Registration
								</h3>
							</div>
						</div>
						<div class="m-portlet__head-tools">
							<ul class="m-portlet__nav">
								<li class="m-portlet__nav-item">
									<a href="#" data-toggle="m-tooltip" class="m-portlet__nav-link m-portlet__nav-link--icon" data-direction="left" data-width="auto" title="Get help with filling up this form">
										<i class="flaticon-info m--icon-font-size-lg3"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- END:: Portlet Head -->

					<!-- BEGIN:: Form Wizard -->
					<div class="m-wizard m-wizard--1 m-wizard--success" id="m_wizard">

						<!-- BEGIN:: Form Wizard Head -->
						<div class="m-wizard__head m-portlet__padding-x">

							<!-- BEGIN:: Form Wizard Progress -->
							<div class="m-wizard__progress">
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<!-- END:: Form Wizard Progress -->

							<!-- BEGIN:: Form Wizard Nav -->
							<div class="m-wizard__nav">
								<div class="m-wizard__steps">
									<div class="m-wizard__step m-wizard__step--current" m-wizard-target="m_wizard_form_step_1">
										<div class="m-wizard__step-info">
											<a href="#" class="m-wizard__step-number">
												<span><span>1</span></span>
											</a>
											<div class="m-wizard__step-line">
												<span></span>
											</div>
											<div class="m-wizard__step-label">
												Your Information
											</div>
										</div>
									</div>
									<div class="m-wizard__step" m-wizard-target="m_wizard_form_step_2">
										<div class="m-wizard__step-info">
											<a href="#" class="m-wizard__step-number">
												<span><span>2</span></span>
											</a>
											<div class="m-wizard__step-line">
												<span></span>
											</div>
											<div class="m-wizard__step-label">
												Account Setup
											</div>
										</div>
									</div>
									<div class="m-wizard__step" m-wizard-target="m_wizard_form_step_3">
										<div class="m-wizard__step-info">
											<a href="#" class="m-wizard__step-number">
												<span><span>3</span></span>
											</a>
											<div class="m-wizard__step-line">
												<span></span>
											</div>
											<div class="m-wizard__step-label">
												Confirmation
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- END:: Form Wizard Nav -->

						</div>
						<!-- END:: Form Wizard Head -->

						<!-- BEGIN:: Form Wizard Form-->
						<div class="m-wizard__form">

							<!--
								1) Use m-form--label-align-left class to alight the form input lables to the right
								2) Use m-form--state class to highlight input control borders on form validation
							-->
							<form class="m-form m-form--label-align-left- m-form--state-" id="m_form" action="<?php echo base_url() . $this->uri->uri_string(); ?>" method="post">

								<!-- BEGIN:: Form Body -->
								<div class="m-portlet__body">

									<!-- BEGIN:: Form Wizard Step 1-->
									<div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
										<div class="row">
											<div class="col-xl-8 offset-xl-2">
												<div class="m-form__section m-form__section--first">
													<div class="m-form__heading">
														<h3 class="m-form__heading-title">Your Details</h3>
													</div>
													<div class="form-group m-form__group row">
														<label class="col-xl-3 col-lg-3 col-form-label">* First Name:</label>
														<div class="col-xl-9 col-lg-9">
															<input type="text" name="firstname" class="form-control m-input" placeholder="" value="">
															<span class="m-form__help">Please enter your first name</span>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label class="col-xl-3 col-lg-3 col-form-label">* Last Name:</label>
														<div class="col-xl-9 col-lg-9">
															<input type="text" name="lastname" class="form-control m-input" placeholder="" value="">
															<span class="m-form__help">Please enter your last name</span>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label class="col-xl-3 col-lg-3 col-form-label">* Email Address:</label>
														<div class="col-xl-9 col-lg-9">
															<input type="email" name="email" class="form-control m-input" placeholder="" value="<?php echo $email; ?>" readonly="readonly">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- END:: Form Wizard Step 1-->

									<!-- BEGIN:: Form Wizard Step 2-->
									<div class="m-wizard__form-step" id="m_wizard_form_step_2">
										<div class="row">
											<div class="col-xl-8 offset-xl-2">
												<div class="m-form__section m-form__section--first">
													<div class="m-form__heading">
														<h3 class="m-form__heading-title">Account Details</h3>
													</div>
													<div class="form-group m-form__group row">
														<div class="col-lg-6 m-form__group-sub">
															<label class="form-control-label">* Username:</label>
															<input type="text" name="username" class="form-control m-input" placeholder="" value="">
															<span class="m-form__help">Your username to login to your dashboard. Must be unique.</span>
														</div>
														<div class="col-lg-6 m-form__group-sub">
															<label class="form-control-label">* Password:</label>
															<input type="password" name="password" class="form-control m-input" placeholder="" value="">
															<span class="m-form__help">Please use letters and at least one number and symbol</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- END:: Form Wizard Step 2-->

									<!-- BEGIN:: Form Wizard Step 3-->
									<div class="m-wizard__form-step" id="m_wizard_form_step_3">
										<div class="row">
											<div class="col-xl-8 offset-xl-2">

												<!--BEGIN::Section-->
												<div class="m-accordion m-accordion--default" id="m_accordion_1" role="tablist">

													<!--BEGIN::Item-->
													<div class="m-accordion__item active">
														<div class="m-accordion__item-head" role="tab" id="m_accordion_1_item_1_head" data-toggle="collapse" href="#m_accordion_1_item_1_body" aria-expanded="false">
															<span class="m-accordion__item-icon"><i class="fa flaticon-user-ok"></i></span>
															<span class="m-accordion__item-title">1. Your Information</span>
															<span class="m-accordion__item-mode"></span>
														</div>
														<div class="m-accordion__item-body collapse show" id="m_accordion_1_item_1_body" class=" " role="tabpanel" aria-labelledby="m_accordion_1_item_1_head" data-parent="#m_accordion_1">

															<!--BEGIN::Content-->
															<div class="tab-content  m--padding-30">
																<div class="m-form__section m-form__section--first">
																	<div class="form-group m-form__group m-form__group--sm row">
																		<label class="col-xl-4 col-lg-4 col-form-label">Name:</label>
																		<div class="col-xl-8 col-lg-8">
																			<span class="m-form__control-static" id="fullname"></span>
																		</div>
																	</div>
																	<div class="form-group m-form__group m-form__group--sm row">
																		<label class="col-xl-4 col-lg-4 col-form-label">Username:</label>
																		<div class="col-xl-8 col-lg-8">
																			<span class="m-form__control-static" id="username"></span>
																		</div>
																	</div>
																	<div class="form-group m-form__group m-form__group--sm row">
																		<label class="col-xl-4 col-lg-4 col-form-label">Email:</label>
																		<div class="col-xl-8 col-lg-8">
																			<span class="m-form__control-static" id="email"><?php echo $email; ?></span>
																		</div>
																	</div>
																</div>
															</div>
															<!--END::Content-->

														</div>
													</div>
													<!--END::Item-->

													<!--BEGIN::Item-->
													<div class="m-accordion__item">
														<div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_1_item_2_head" data-toggle="collapse" href="#m_accordion_1_item_2_body" aria-expanded="    false">
															<span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span>
															<span class="m-accordion__item-title">2. Account Details</span>
															<span class="m-accordion__item-mode"></span>
														</div>
														<div class="m-accordion__item-body collapse" id="m_accordion_1_item_2_body" class=" " role="tabpanel" aria-labelledby="m_accordion_1_item_2_head" data-parent="#m_accordion_1">

															<!--BEGIN::Content-->
															<div class="tab-content  m--padding-30">
																<div class="m-form__section m-form__section--first">
																	<div class="form-group m-form__group m-form__group--sm row">
																		<label class="col-xl-4 col-lg-4 col-form-label">Type:</label>
																		<div class="col-xl-8 col-lg-8">
																			<span class="m-form__control-static">
																				<?php
																				if ($role == 2)
																					echo "Upload Manager";
																				else
																					echo "Customer";
																				?>
																			</span>
																		</div>
																	</div>
																	<div class="form-group m-form__group m-form__group--sm row">
																		<label class="col-xl-4 col-lg-4 col-form-label">Date:</label>
																		<div class="col-xl-8 col-lg-8">
																			<span class="m-form__control-static"><?php echo $created_at; ?></span>
																		</div>
																	</div>
																	<div class="form-group m-form__group m-form__group--sm row">
																		<label class="col-xl-4 col-lg-4 col-form-label">IP Address:</label>
																		<div class="col-xl-8 col-lg-8">
																			<span class="m-form__control-static"><?php echo $_SERVER['REMOTE_ADDR']; ?></span>
																			<input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
																		</div>
																	</div>
																</div>
															</div>
															<!--END::Content-->

														</div>
													</div>
													<!--END::Item-->

												</div>
												<!--END::Section-->

												<div class="m-separator m-separator--dashed m-separator--lg"></div>
												<div class="form-group m-form__group m-form__group--sm row">
													<div class="col-xl-12">
														<div class="m-checkbox-inline">
															<label class="m-checkbox m-checkbox--solid m-checkbox--brand">
																<input type="checkbox" name="accept" value="1">
																Click here to indicate that you have read and agree to the terms presented in the Terms and Conditions agreement
																<span></span>
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- END:: Form Wizard Step 3-->

								</div>
								<!-- END:: Form Body -->

								<!-- BEGIN:: Form Actions -->
								<div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
									<div class="m-form__actions m-form__actions">
										<div class="row">
											<div class="col-lg-2"></div>
											<div class="col-lg-4 m--align-left">
												<button class="btn btn-secondary m-btn m-btn--custom m-btn--icon" data-wizard-action="prev">
													<span>
														<i class="la la-arrow-left"></i>&nbsp;&nbsp;
														<span>Back</span>
													</span>
												</button>
											</div>
											<div class="col-lg-4 m--align-right">
												<button class="btn btn-primary m-btn m-btn--custom m-btn--icon" data-wizard-action="submit">
													<span>
														<i class="la la-check"></i>&nbsp;&nbsp;
														<span>Submit</span>
													</span>
												</button>
												<button class="btn btn-success m-btn m-btn--custom m-btn--icon" data-wizard-action="next">
													<span>
														<span>Save & Continue</span>&nbsp;&nbsp;
														<i class="la la-arrow-right"></i>
													</span>
												</button>
											</div>
											<div class="col-lg-2"></div>
										</div>
									</div>
								</div>
								<!-- END:: Form Actions -->

							</form>
						</div>
						<!-- END:: Form Wizard Form-->

					</div>
					<!-- END:: Form Wizard-->

				</div>
				<!--End::Main Portlet-->

			</div>
		</div>
	</div>
	<!-- END:: Body -->

</div>
<!-- END:: Page -->

<script>
	var WizardDemo = function() {
		$("#m_wizard");
		var e, r, i = $("#m_form");
		return {
			init: function() {
				var n;
				$("#m_wizard"), i = $("#m_form"), (r = new mWizard("m_wizard", {
					startStep: 1
				})).on("beforeNext", function(r) {
					!0 !== e.form() && r.stop()
					// alert(r.getStep());
				}), r.on("change", function(e) {
					mUtil.scrollTop()
				}), r.on("change", function(e) {
					3 === e.getStep() && prepare()
				}), e = i.validate({
					ignore: ":hidden",
					rules: {
						firstname: {
							required: !0
						},
						lastname: {
							required: !0
						},
						email: {
							required: !0,
							email: !0
						},
						username: {
							required: !0,
							minlength: 4,
							remote: {
								url: "<?php echo base_url('auth/check'); ?>",
								type: "post",
								data: {
									username: function() {
										return $("input[name='username']").val();
									}
								}
							}
						},
						password: {
							required: !0,
							minlength: 6
						},
						accept: {
							required: !0
						}
					},
					messages: {
						accept: {
							required: "You must accept the Terms and Conditions agreement!"
						}
					},
					invalidHandler: function(e, r) {
						mUtil.scrollTop(), swal({
							title: "",
							text: "There are some errors in your submission. Please correct them.",
							type: "error",
							confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
						})
					},
					submitHandler: function(e) {}
				}), (n = i.find('[data-wizard-action="submit"]')).on("click", function(r) {
					r.preventDefault(), e.form() && (mApp.progress(n), i.ajaxSubmit({
						success: function(data) {
							mApp.unprogress(n), swal({
								title: "",
								text: "The application has been successfully submitted!",
								type: "success",
								confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
							}).then(function() {
								location.href = data;
							});
						}
					}))
				})
			}
		}
	}();

	function prepare() {
		$("#fullname").text($("input[name='firstname']").val() + ' ' + $("input[name='lastname']").val());
		$("#username").text($("input[name='username']").val());
	}

	$(document).ready(function() {
		WizardDemo.init();
	});

</script>

</body>
<!-- END:: Body -->