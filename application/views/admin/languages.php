<link rel="stylesheet" href="public/vendors/custom/x-editable/css/bootstrap-editable.css" />
<link rel="stylesheet" href="public/vendors/custom/x-editable/css/typeahead.js-bootstrap.css" />
<script src="public/vendors/custom/x-editable/js/bootstrap-editable.js"></script>
<script src="public/vendors/custom/x-editable/js/typeahead.js"></script>
<script src="public/vendors/custom/x-editable/js/typeaheadjs.js"></script>
<script src="public/vendors/custom/x-editable/js/address.js"></script>

<link rel="stylesheet" href="public/vendors/custom/datatables/datatables.bundle.css" />
<script src="public/vendors/custom/datatables/datatables.bundle.js"></script>
<style>
	td {
		vertical-align: middle;
	}
</style>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Langauges
						</h3>
					</div>
				</div>
			</div>
			<div class="m-portlet__body">
				<table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap" id="langs">
					<thead>
					<tr>
						<th>#</th>
						<th>Original Name</th>
						<th>English Name</th>
						<th>ISO</th>
						<th>RTL</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					foreach ($langs as $row) {
						echo '<tr>';
						echo '<th scope="row">' . $row['id'] . '</th>';
						echo '<td>' . $row['original'] . '</td>';
						echo '<td>' . $row['english'] . '</td>';
						echo '<td>' . $row['iso'] . '</td>';
						echo '<td>' . $row['ltr'] . '</td>';
						echo '<td>' . $row['enabled'] . '</td>';
						echo '<td></td>';
						echo '</tr>';
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- BEGIN:: Modal-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Language</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?php base_url('api/language/update') ?>">
					<input type="hidden" name="id" />
					<div class="form-group m-form__group row">
						<label class="col-3 col-form-label">Original:</label>
						<div class="col-9">
							<input class="form-control m-input" name="original" />
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-3 col-form-label">English:</label>
						<div class="col-9">
							<input class="form-control m-input" name="english" />
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-3 col-form-label">ISO:</label>
						<div class="col-9">
							<input class="form-control m-input" name="iso" />
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-3 col-form-label">RTL:</label>
						<div class="col-9">
							<span class="m-switch m-switch--outline m-switch--icon m-switch--info">
								<label>
									<input type="checkbox" checked="checked">
									<input type="hidden" name="ltr"/>
									<span></span>
								</label>
							</span>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-3 col-form-label">Status:</label>
						<div class="col-9">
							<span class="m-switch m-switch--outline m-switch--icon m-switch--info">
								<label>
									<input type="checkbox" checked="checked">
									<input type="hidden" name="enabled"/>
									<span></span>
								</label>
							</span>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!-- END:: Modal-->

<script>
	var DatatablesExtensionsResponsive = {
		init: function() {
			$("#langs").DataTable({
				responsive: !0,
				columnDefs: [{
					targets: -1,
					title: "Actions",
					orderable: !1,
					render: function(e, a, t, n) {
						return '<input type="hidden" value="' + t.join('|') + '" /><a href="javascript:;" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit" onclick="showEdit(this)">\n <i class="la la-edit"></i>\n </a>'
					}
				}, {
					targets: 4,
					render: function(e, a, t, n) {
						var s = {
							0: {
								title: "Yes",
								class: "m-badge--focus"
							},
							1: {
								title: "No",
								class: " m-badge--info"
							}
						};
						return void 0 === s[e] ? e : '<input type="hidden" value="' + e + '" /><span class="m-badge ' + s[e].class + ' m-badge--wide">' + s[e].title + "</span>"
					}
				}, {
					targets: 5,
					render: function(e, a, t, n) {
						var s = {
							1: {
								title: "Enabled",
								class: "m-badge--success"
							},
							0: {
								title: "Disabled",
								class: " m-badge--metal"
							}
						};
						return void 0 === s[e] ? e : '<input type="hidden" value="' + e + '" /><span class="m-badge ' + s[e].class + ' m-badge--wide">' + s[e].title + "</span>"
					}
				}]
			})
		}
	};

	$(document).ready(function() {
		DatatablesExtensionsResponsive.init();
		$.fn.editable.defaults.mode = 'popup';
	});

	function showEdit(obj) {
		var str = obj.previousSibling.value;
		var arr = str.split('|');
		$("input[name='id']").val(arr[0]);
		$("input[name='original']").val(arr[1]);
		$("input[name='english']").val(arr[2]);
		$("input[name='iso']").val(arr[3]);
		$("input[name='ltr']").val(arr[4]);
		var ltr = $("input[name='ltr']").prev().get(0);
		if (arr[4] == 0) {
			$("input[name='original']").attr('dir', 'rtl');
			ltr.checked = true;
		} else {
			$("input[name='original']").attr('dir', 'ltr');
			ltr.checked = false;
		}
		$("input[name='enabled']").val(arr[5]);
		var ena = $("input[name='enabled']").prev().get(0);
		if (arr[5] == 0)
			ena.checked = false;
		else
			ena.checked = true;
		$("#edit").modal("toggle");
	}
</script>