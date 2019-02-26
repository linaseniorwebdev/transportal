<!-- BEGIN:: Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- BEGIN:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin">
		<div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
			<div class="m-stack m-stack--hor m-stack--desktop">
				<div class="m-stack__item m-stack__item--fluid">
					<div class="m-login__wrapper">
						<div class="m-login__logo">
							<a href="#">
								<img src="public/app/media/img/logos/logo-2.png">
							</a>
						</div>
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">
									<?php
									if ($status == 'invalid')
										echo 'Invalid Request';
									elseif ($status == 'expired')
										echo 'This request has been expired';
									else
										echo 'Enter your new password';
									?>
								</h3>
							</div>
							<?php
							if ($status == 'confirmed') {
							?>
							<form class="m-login__form m-form" action="<?php echo base_url() . $this->uri->uri_string(); ?>" method="post">
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
									<input type="hidden" value="<?php echo $uid; ?>" name="uuid"/>
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" name="password_confirm">
								</div>
								<div class="m-login__form-action">
									<input type="hidden" name="ipadress" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
									<button class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air" type="button">Reset</button>
								</div>
							</form>
							<?php
							}
							?>
						</div>
					</div>
				</div>
				<div class="m-stack__item m-stack__item--center">
					<div class="m-login__account">
						<span class="m-login__account-msg">
							Go back to
						</span>
						<a href="<?php echo base_url(); ?>auth/login" class="m-link m-link--focus m-login__account-link">Sign in</a>
					</div>
				</div>
			</div>
		</div>
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1 m-login__content m-grid-item--center" style="background-image: url(public/app/media/img/bg/bg-4.jpg)">
			<div class="m-grid__item">
				<h3 class="m-login__welcome">Join Our Community</h3>
				<p class="m-login__msg">
					Lorem ipsum dolor sit amet, coectetuer adipiscing<br>elit sed diam nonummy et nibh euismod
				</p>
			</div>
		</div>
	</div>
</div>
<!-- END:: Page -->

<script>
	$(document).ready(function() {

	});

	$("button").click(function() {
		var pass = $("input[name='password']").val();
		var cnfm = $("input[name='password_confirm']").val();
		if (pass == cnfm) {
			if (pass.length > 7)
				$("form").submit();
			else
				swal({
					text: "Minimum password length is 8!",
					icon: "warning",
					confirmButtonText: "I got it!",
					confirmButtonClass: "btn btn-focus m-btn m-btn--pill m-btn--air"
				});
		} else
			swal({
				text: "Password doesn't match. Please try again!",
				icon: "warning",
				confirmButtonText: "I got it!",
				confirmButtonClass: "btn btn-focus m-btn m-btn--pill m-btn--air"
			});
	});
</script>

</body>
<!-- END:: Body -->