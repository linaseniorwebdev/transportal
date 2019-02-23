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
							<a href="javascript:;">
								<img src="public/app/media/img/logos/logo-2.png">
							</a>
						</div>
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">Welcome to Our Distribution</h3>
							</div>
							<form class="m-login__form m-form" action="<?php echo base_url() . $this->uri->uri_string(); ?>" method="post">
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Username or Email" name="username" autocomplete="off">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
								</div>
								<div class="row m-login__form-sub">
									<div class="col m--align-left">
										<label class="m-checkbox m-checkbox--focus">
											<input type="checkbox" name="remember"> Remember me
											<span></span>
										</label>
									</div>
									<div class="col m--align-right">
										<a href="<?php echo base_url(); ?>auth/request" class="m-link">Forget Password ?</a>
									</div>
								</div>
								<div class="m-login__form-action">
									<button class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air" type="submit">Sign In</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="m-stack__item m-stack__item--center">
					<div class="m-login__account">
						<span class="m-login__account-msg">
							Don't have an account yet ?
						</span>&nbsp;&nbsp;
						<a href="<?php echo base_url(); ?>auth/signup" class="m-link m-link--focus m-login__account-link">Sign Up</a>
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

	$(document).keypress(function(e) {
		if(e.which == 13) {
			e.preventDefault();
		}
	});

	$("input[name='password']").keypress(function(e) {
		if(e.which == 13) {
			$("form").submit();
		}
	});
</script>
</body>
<!-- END:: Body -->