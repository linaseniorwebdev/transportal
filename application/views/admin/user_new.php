<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<!--begin::Portlet-->
		<div class="m-portlet m-portlet--tab">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
				                <span class="m-portlet__head-icon m--hide">
				                    <i class="la la-gear"></i>
				                </span>
						<h3 class="m-portlet__head-text">
							Add New User
						</h3>
					</div>
				</div>
			</div>

			<!--begin::Form-->
			<form class="m-form m-form--fit m-form--label-align-right" action="<?php echo base_url() . $this->uri->uri_string(); ?>" method="post">
				<div class="m-portlet__body">
					<?php
					if (isset($message)) {
						?>
						<div class="form-group m-form__group m--margin-top-10">
							<div class="alert m-alert m-alert--default" role="alert">
								<?php echo $message; ?>
							</div>
						</div>
						<?php
					}
					?>
					<div class="form-group m-form__group">
						<label for="email">Email address:</label>
						<input type="email" class="form-control m-input" id="email" name="email" placeholder="Enter email" style="max-width: 350px;" />
						<span class="m-form__help">Make sure before submit that you wrote email address correctly.</span>
					</div>
					<div class="form-group m-form__group">
						<label style="padding-top: 5px;">Role:</label>
						<div>
							<ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link active show" href="javascript:;" onclick="setType(this, 1);">
										Uploader
									</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" href="javascript:;" onclick="setType(this, 2);">
										Customer
									</a>
								</li>
							</ul>
						</div>
						<input type="hidden" name="role" value="1"/>
					</div>
				</div>
				<div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>
			<!--end::Form-->
		</div>
		<!--end::Portlet-->
	</div>
</div>
<script>
	function setType(obj, type) {
		var par = obj.parentElement.parentElement;
		$(par).find("a").removeClass("active").removeClass("show");
		$(obj).addClass("active").addClass("show");
		$("input[name='role']").val(type);
	}
</script>