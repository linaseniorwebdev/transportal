<?php if (!isset($subcomm)) $subcomm = null; ?>
<!-- BEGIN::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<!-- BEGIN:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
	<!-- BEGIN: Header -->
	<header id="m_header" class="m-grid__item m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
		<div class="m-container m-container--fluid m-container--full-height">
			<div class="m-stack m-stack--ver m-stack--desktop">
				<!-- BEGIN: Brand -->
				<div class="m-stack__item m-brand m-brand--skin-dark ">
					<div class="m-stack m-stack--ver m-stack--general">
						<div class="m-stack__item m-stack__item--middle m-brand__logo">
							<a href="<?php echo base_url(); ?>" class="m-brand__logo-wrapper">
								<img alt="Default Logo" src="public/demo/default/media/img/logo/logo_default_dark.png" />
							</a>
						</div>
						<div class="m-stack__item m-stack__item--middle m-brand__tools">

							<!-- BEGIN: Left Aside Minimize Toggle -->
							<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block ">
								<span></span>
							</a>
							<!-- END -->

							<!-- BEGIN: Responsive Aside Left Menu Toggler -->
							<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
								<span></span>
							</a>
							<!-- END -->

							<!-- BEGIN: Topbar Toggler -->
							<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
								<i class="flaticon-more"></i>
							</a>
							<!-- END -->
						</div>
					</div>
				</div>
				<!-- END: Brand -->

				<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
					<!-- BEGIN: Topbar -->
					<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
						<div class="m-stack__item m-topbar__nav-wrapper">
							<ul class="m-topbar__nav m-nav m-nav--inline">
								<li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--mobile-full-width" m-dropdown-toggle="click">
									<a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
										<span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span>
										<span class="m-nav__link-icon"><i class="flaticon-alarm"></i></span>
									</a>
									<div class="m-dropdown__wrapper">
										<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
										<div class="m-dropdown__inner">
											<div class="m-dropdown__header m--align-center" style="background: url(public/app/media/img/misc/notification_bg.jpg); background-size: cover;">
												<span class="m-dropdown__header-title">9 New</span>
												<span class="m-dropdown__header-subtitle">User Notifications</span>
											</div>
											<div class="m-dropdown__body">
												<div class="m-dropdown__content">
													<ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
														<li class="nav-item m-tabs__item">
															<a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
																Alerts
															</a>
														</li>
														<li class="nav-item m-tabs__item">
															<a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_events" role="tab">Events</a>
														</li>
														<li class="nav-item m-tabs__item">
															<a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_logs" role="tab">Logs</a>
														</li>
													</ul>
													<div class="tab-content">
														<div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
															<div class="m-scrollable" data-scrollable="true" data-height="250" data-mobile-height="200">
																<div class="m-list-timeline m-list-timeline--skin-light">
																	<div class="m-list-timeline__items">
																		<div class="m-list-timeline__item">
																			<span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
																			<span class="m-list-timeline__text">12 new users registered</span>
																			<span class="m-list-timeline__time">Just now</span>
																		</div>
																		<div class="m-list-timeline__item">
																			<span class="m-list-timeline__badge"></span>
																			<span class="m-list-timeline__text">System shutdown <span class="m-badge m-badge--success m-badge--wide">pending</span></span>
																			<span class="m-list-timeline__time">14 mins</span>
																		</div>
																		<div class="m-list-timeline__item">
																			<span class="m-list-timeline__badge"></span>
																			<span class="m-list-timeline__text">New invoice received</span>
																			<span class="m-list-timeline__time">20 mins</span>
																		</div>
																		<div class="m-list-timeline__item">
																			<span class="m-list-timeline__badge"></span>
																			<span class="m-list-timeline__text">DB overloaded 80% <span class="m-badge m-badge--info m-badge--wide">settled</span></span>
																			<span class="m-list-timeline__time">1 hr</span>
																		</div>
																		<div class="m-list-timeline__item">
																			<span class="m-list-timeline__badge"></span>
																			<span class="m-list-timeline__text">System error - <a href="#" class="m-link">Check</a></span>
																			<span class="m-list-timeline__time">2 hrs</span>
																		</div>
																		<div class="m-list-timeline__item m-list-timeline__item--read">
																			<span class="m-list-timeline__badge"></span>
																			<span href="" class="m-list-timeline__text">New order received <span class="m-badge m-badge--danger m-badge--wide">urgent</span></span>
																			<span class="m-list-timeline__time">7 hrs</span>
																		</div>
																		<div class="m-list-timeline__item m-list-timeline__item--read">
																			<span class="m-list-timeline__badge"></span>
																			<span class="m-list-timeline__text">Production server down</span>
																			<span class="m-list-timeline__time">3 hrs</span>
																		</div>
																		<div class="m-list-timeline__item">
																			<span class="m-list-timeline__badge"></span>
																			<span class="m-list-timeline__text">Production server up</span>
																			<span class="m-list-timeline__time">5 hrs</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
															<div class="m-scrollable" data-scrollable="true" data-height="250" data-mobile-height="200">
																<div class="m-list-timeline m-list-timeline--skin-light">
																	<div class="m-list-timeline__items">
																		<div class="m-list-timeline__item">
																			<span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
																			<a href="" class="m-list-timeline__text">New order received</a>
																			<span class="m-list-timeline__time">Just now</span>
																		</div>
																		<div class="m-list-timeline__item">
																			<span class="m-list-timeline__badge m-list-timeline__badge--state1-danger"></span>
																			<a href="" class="m-list-timeline__text">New invoice received</a>
																			<span class="m-list-timeline__time">20 mins</span>
																		</div>
																		<div class="m-list-timeline__item">
																			<span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
																			<a href="" class="m-list-timeline__text">Production server up</a>
																			<span class="m-list-timeline__time">5 hrs</span>
																		</div>
																		<div class="m-list-timeline__item">
																			<span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																			<a href="" class="m-list-timeline__text">New order received</a>
																			<span class="m-list-timeline__time">7 hrs</span>
																		</div>
																		<div class="m-list-timeline__item">
																			<span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																			<a href="" class="m-list-timeline__text">System shutdown</a>
																			<span class="m-list-timeline__time">11 mins</span>
																		</div>
																		<div class="m-list-timeline__item">
																			<span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																			<a href="" class="m-list-timeline__text">Production server down</a>
																			<span class="m-list-timeline__time">3 hrs</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
															<div class="m-stack m-stack--ver m-stack--general" style="min-height: 180px;">
																<div class="m-stack__item m-stack__item--center m-stack__item--middle">
																	<span class="">All caught up!<br>No new logs.</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width" m-dropdown-toggle="click">
									<a href="javascript:;" class="m-nav__link m-dropdown__toggle">
										<span class="m-topbar__userpic">
											<img src="public/app/media/img/users/100_5.jpg" class="m--img-rounded m--marginless" alt="" />
										</span>
										<span class="m-topbar__username m--hide">Admin</span>
									</a>
									<div class="m-dropdown__wrapper">
										<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
										<div class="m-dropdown__inner">
											<div class="m-dropdown__header m--align-center" style="background: url(public/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
												<div class="m-card-user m-card-user--skin-dark">
													<div class="m-card-user__pic">
														<img src="public/app/media/img/users/100_5.jpg" class="m--img-rounded m--marginless" alt="" />
													</div>
													<div class="m-card-user__details">
														<span class="m-card-user__name m--font-weight-500">Super Admin</span>
														<a href="" class="m-card-user__email m--font-weight-300 m-link">bogdan.frusina@dejero.com</a>
													</div>
												</div>
											</div>
											<div class="m-dropdown__body">
												<div class="m-dropdown__content">
													<ul class="m-nav m-nav--skin-light">
														<li class="m-nav__section m--hide">
															<span class="m-nav__section-text">Section</span>
														</li>
														<li class="m-nav__item">
															<a href="javascript:;" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-profile-1"></i>
																<span class="m-nav__link-title">
																	<span class="m-nav__link-wrap">
																		<span class="m-nav__link-text">My Profile</span>
																		<span class="m-nav__link-badge"><span class="m-badge m-badge--success">2</span></span>
																	</span>
																</span>
															</a>
														</li>
														<li class="m-nav__item">
															<a href="javascript:;" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-share"></i>
																<span class="m-nav__link-text">Activity</span>
															</a>
														</li>
														<li class="m-nav__item">
															<a href="javascript:;" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-chat-1"></i>
																<span class="m-nav__link-text">Messages</span>
															</a>
														</li>
														<li class="m-nav__separator m-nav__separator--fit">
														</li>
														<li class="m-nav__item">
															<a href="javascript:;" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-info"></i>
																<span class="m-nav__link-text">FAQ</span>
															</a>
														</li>
														<li class="m-nav__item">
															<a href="javascript:;" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																<span class="m-nav__link-text">Support</span>
															</a>
														</li>
														<li class="m-nav__separator m-nav__separator--fit">
														</li>
														<li class="m-nav__item">
															<a href="<?php echo base_url(); ?>auth/logout" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<!-- END: Topbar -->
				</div>
			</div>
		</div>
	</header>
	<!-- END: Header -->

	<!-- BEGIN::Body -->
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
		<!-- BEGIN: Left Aside -->
		<button class="m-aside-left-close m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
		<div id="m_aside_left" class="m-grid__item	m-aside-left m-aside-left--skin-dark ">
			<!-- BEGIN: Aside Menu -->
			<div id="m_ver_menu" class="m-aside-menu m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
				<ul class="m-menu__nav m-menu__nav--dropdown-submenu-arrow ">
					<li class="m-menu__item<?php if ($command == 'index') echo ' m-menu__item--active'; ?>" aria-haspopup="true">
						<a href="<?php if ($command == 'index') echo 'javascript:;'; else echo base_url('admin'); ?>" class="m-menu__link ">
							<i class="m-menu__link-icon flaticon-line-graph"></i>
							<span class="m-menu__link-title">
								<span class="m-menu__link-wrap">
									<span class="m-menu__link-text">Dashboard</span>
								</span>
							</span>
						</a>
					</li>
					<li class="m-menu__item m-menu__item--submenu<?php if ($command == 'user') echo ' m-menu__item--open'; ?>" aria-haspopup="true" m-menu-submenu-toggle="hover">
						<a href="javascript:;" class="m-menu__link m-menu__toggle">
							<i class="m-menu__link-icon flaticon-users"></i>
							<span class="m-menu__link-text">Users</span>
							<i class="m-menu__ver-arrow la la-angle-right"></i>
						</a>
						<div class="m-menu__submenu ">
							<span class="m-menu__arrow"></span>
							<ul class="m-menu__subnav">
								<li class="m-menu__item<?php if ($command == 'user' && $subcomm == 'new') echo ' m-menu__item--active'; ?>" aria-haspopup="true">
									<a href="<?php if ($command == 'user' && $subcomm == 'new') echo 'javascript:;'; else echo base_url('admin/user/new'); ?>" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
										</i>
										<span class="m-menu__link-text">New User</span>
									</a>
								</li>
								<li class="m-menu__item<?php if ($command == 'user' && $subcomm == 'all') echo ' m-menu__item--active'; ?>" aria-haspopup="true">
									<a href="<?php if ($command == 'user' && $subcomm == 'all') echo 'javascript:;'; else echo base_url('admin/user/all'); ?>" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
										</i>
										<span class="m-menu__link-text">All Users</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="m-menu__item<?php if ($command == 'media') echo ' m-menu__item--active'; ?>" aria-haspopup="true">
						<a href="<?php if ($command == 'media') echo 'javascript:;'; else echo base_url('admin/media'); ?>" class="m-menu__link ">
							<i class="m-menu__link-icon flaticon-multimedia-3"></i>
							<span class="m-menu__link-title">
								<span class="m-menu__link-wrap">
									<span class="m-menu__link-text">Uploaded Media</span>
								</span>
							</span>
						</a>
					</li>
					<li class="m-menu__item m-menu__item--submenu<?php if ($command == 'status') echo ' m-menu__item--open'; ?>" aria-haspopup="true" m-menu-submenu-toggle="hover">
						<a href="javascript:;" class="m-menu__link m-menu__toggle">
							<i class="m-menu__link-icon flaticon-diagram"></i>
							<span class="m-menu__link-text">Download Status</span>
							<i class="m-menu__ver-arrow la la-angle-right"></i>
						</a>
						<div class="m-menu__submenu ">
							<span class="m-menu__arrow"></span>
							<ul class="m-menu__subnav">
								<li class="m-menu__item<?php if ($command == 'status' && $subcomm == 'datetime') echo ' m-menu__item--active'; ?>" aria-haspopup="true">
									<a href="<?php if ($command == 'status' && $subcomm == 'datetime') echo 'javascript:;'; else echo base_url('admin/status/datetime'); ?>" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
										</i>
										<span class="m-menu__link-text">By Date/Time</span>
									</a>
								</li>
								<li class="m-menu__item<?php if ($command == 'status' && $subcomm == 'media') echo ' m-menu__item--active'; ?>" aria-haspopup="true">
									<a href="<?php if ($command == 'status' && $subcomm == 'media') echo 'javascript:;'; else echo base_url('admin/status/media'); ?>" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
										</i>
										<span class="m-menu__link-text">By Media</span>
									</a>
								</li>
								<li class="m-menu__item<?php if ($command == 'status' && $subcomm == 'customer') echo ' m-menu__item--active'; ?>" aria-haspopup="true">
									<a href="<?php if ($command == 'status' && $subcomm == 'customer') echo 'javascript:;'; else echo base_url('admin/status/customer'); ?>" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
										</i>
										<span class="m-menu__link-text">By Customers</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="m-menu__item m-menu__item--submenu<?php if ($command == 'setting') echo ' m-menu__item--open'; ?>" aria-haspopup="true" m-menu-submenu-toggle="hover">
						<a href="javascript:;" class="m-menu__link m-menu__toggle">
							<i class="m-menu__link-icon flaticon-cogwheel-1"></i>
							<span class="m-menu__link-text">Settings</span>
							<i class="m-menu__ver-arrow la la-angle-right"></i>
						</a>
						<div class="m-menu__submenu ">
							<span class="m-menu__arrow"></span>
							<ul class="m-menu__subnav">
								<li class="m-menu__item<?php if ($command == 'setting' && $subcomm == 'languages') echo ' m-menu__item--active'; ?>" aria-haspopup="true">
									<a href="<?php if ($command == 'setting' && $subcomm == 'languages') echo 'javascript:;'; else echo base_url('admin/setting/languages'); ?>" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
										</i>
										<span class="m-menu__link-text">Languages</span>
									</a>
								</li>
								<li class="m-menu__item<?php if ($command == 'setting' && $subcomm == 'medstatus') echo ' m-menu__item--active'; ?>" aria-haspopup="true">
									<a href="<?php if ($command == 'setting' && $subcomm == 'medstatus') echo 'javascript:;'; else echo base_url('admin/setting/medstatus'); ?>" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
										</i>
										<span class="m-menu__link-text">Media Status List</span>
									</a>
								</li>
								<li class="m-menu__item<?php if ($command == 'setting' && $subcomm == 'security') echo ' m-menu__item--active'; ?>" aria-haspopup="true">
									<a href="<?php if ($command == 'setting' && $subcomm == 'security') echo 'javascript:;'; else echo base_url('admin/setting/security'); ?>" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
										</i>
										<span class="m-menu__link-text">Account Security</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
			<!-- END: Aside Menu -->
		</div>
		<!-- END: Left Aside -->