<style>
	.nopadding {
		padding: 0px !important;
	}

	.nomargin {
		margin: 0px !important;
	}

	.table-row {
		height: 45px;
		line-height: 45px;
		transition: background-color 0.5s linear;
	}
	
	.table-row:hover {
		background-color: rgba(200, 200, 200, 0.3);
	}
</style>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Media Status
						</h3>
					</div>
				</div>
			</div>
			<div class="m-portlet__body">
				<div class="row nomargin nopadding table-row" style="border-bottom: 1px solid #5867dd;">
					<div class="col-1">#</div>
					<div class="col-11 nomargin nopadding">Title</div>
				</div>
				<?php
				$idx = 1;
				foreach ($status as $row) {
					echo '<div class="row nomargin nopadding table-row">';
					echo '<div class="col-1">' . $row['id'] . '</div>';
					echo '<div class="col-11 nomargin nopadding"><a href="javascript:;" class="editable editable-click" data-pk="' . $row['id'] . '" data-title="' . $row['title'] . '">' . $row['title'] . '</a></div>';
					echo '</div>';
					$idx++;
				}
				?>
				<div class="row nomargin nopadding table-row">
					<div class="col-1"></div>
					<div class="col-11 nomargin nopadding">
						<a href="javascript:;" class="btn btn-info btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--outline-2x m-btn--pill m-btn--air" onclick="addNew(this)"><i class="la la-plus"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var id, title, parent;

	$(document).ready(function() {

	});

	$(".editable").click(function() {
		id = $(this).data('pk');
		title = $(this).data('title');
		parent = $(this).parent().get(0);
		$(this).fadeOut("fast", function() {
			$(parent).addClass("nopadding");
			var buffer = '<div class="nomargin nopadding" style="max-width: 250px;">';
			buffer += ('<input name="title" value="' + title + '" style="width: calc(100% - 80px); line-height: 35px !important;" autofocus="autofocus" />');
			buffer += ('<input type="hidden" name="id" value="' + id + '" />');
			buffer += '<a href="javascript:;" class="btn btn-info m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--outline-2x m-btn--pill m-btn--air" onclick="saveChanges(this)"><i class="la la-check"></i></a>';
			buffer += '<a href="javascript:;" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--outline-2x m-btn--pill m-btn--air" onclick="discardChanges(this)"><i class="la la-close"></i></a>';
			buffer += '</div>';
			$(parent).append(buffer);
		});
	});

	function saveChanges(obj) {
		if ($(obj).hasClass("m-loader"))
			return;
		$(obj).addClass('m-loader m-loader--light');
		var url = "<?php echo base_url('api/media/status/update'); ?>";
		$.post(url, {id: $("input[name='id']").val(), title: $("input[name='title']").val()}, function(data) {
			data = JSON.parse(data);
			if (data.status == "success") {
				$(obj).removeClass('m-loader m-loader--light');
				var par = obj.parentElement;
				var org = par.previousElementSibling;
				$(org).text($("input[name='title']").val());
				$(org).data('title', $("input[name='title']").val());
				$(par).remove();
				$(org).fadeIn("fast");
			}
		});
	}

	function discardChanges(obj) {
		var par = obj.parentElement;
		var org = par.previousElementSibling;
		$(par).remove();
		$(org).fadeIn("fast");
	}
	
	function addNew(obj) {
		
	}
</script>