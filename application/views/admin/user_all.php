<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							All Users
						</h3>
					</div>
				</div>
			</div>
			<div class="m-portlet__body">
				<!--begin: Datatable -->
				<div class="m_datatable" id="auto_column_hide"></div>
				<!--end: Datatable -->
			</div>
		</div>
	</div>
</div>
<script>
	var DatatableAuto = {
		init: function() {
			$(".m_datatable").mDatatable({
				data: {
					type: "remote",
					source: {
						read: {
							url: "<?php echo base_url('admin/users'); ?>"
						}
					},
					pageSize: 10,
					saveState: !1,
					serverPaging: !0,
					serverFiltering: !0,
					serverSorting: !0
				},
				sortable: !1,
				pagination: !0,
				toolbar: {
					items: {
						pagination: {
							pageSizeSelect: [10, 20, 30, 50, 100]
						}
					}
				},
				rows: {
					autoHide: !0
				},
				columns: [
					{	field: "username",
						title: "Username",
						template: function(t) {
							return '<a href="javascript:;" onclick="toggleRow(this);">' + t.username + '</a>'
						}
					}, {field: "role",
						title: "Type",
						template: function(t) {
							var e = {
								"2": {
									title: "Manager",
									class: "m-badge--info"
								},
								"3": {
									title: "Customer",
									class: "m-badge--focus"
								}
							};
							return '<span class="m-badge ' + e[t.role].class + ' m-badge--wide">' + e[t.role].title + '</span>'
						},
						textAlign: 'center',
						width: 80
					}, {field: "status",
						title: "Status",
						template: function(t) {
							var e = {
								"2": {
									title: "Active",
									class: "m-badge--success"
								},
								"1": {
									title: "Inactive",
									class: "m-badge--warning"
								},
								"3": {
									title: "Disabled",
									class: "m-badge--metal"
								}
							};
							return '<span class="m-badge ' + e[t.status].class + ' m-badge--wide">' + e[t.status].title + '</span>'
						},
						textAlign: 'center',
						width: 70
					}, {field: "firstname",
						title: "First Name",
						textAlign: 'center'
					}, {field: "lastname",
						title: "Last Name",
						textAlign: 'center'
					}, {field: "created_at",
						title: "Created at",
						template: function(t) {
							return (t.created_at).substr(0, 10)
						},
						textAlign: 'center',
						width: 90
					}, {field: "last_ip",
						title: "IP Address",
						textAlign: 'center',
						width: 90
					}, {field: "Extra",
						title: "Actions",
						template: function(t) {
							return '<div class="p-2"><input type="hidden" value="' + t.id + '"/><a class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" href="javascript:;" onclick="edit(this)" style="padding: .75rem .75rem;"><i class="la la-edit"></i></a></div>'
						},
						textAlign: 'center',
						width: 90
					}
				]
			})
		}
	};

	$(document).ready(function() {
		DatatableAuto.init();
	});

	function toggleRow(obj) {
		var target = obj.parentElement.parentElement.previousSibling.firstChild;
		$(target).click();
	}
</script>