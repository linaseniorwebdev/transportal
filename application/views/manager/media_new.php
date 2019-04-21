<link href="public/vendors/custom/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" type="text/css" />
<script src="public/vendors/custom/jasny-bootstrap/js/jasny-bootstrap.js"></script>
<script src="public/vendors/custom/md5.js"></script>
<style>
	.progress {
		border: 1px solid #0099CC;
		padding: 1px;
		position: relative;
		height: 32px;
		border-radius: 3px;
		text-align: left;
		background: #fff;
		box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);
	}

	.progress .progress-bar {
		height: 100%;
		border-radius: 3px;
		background-color: #f39ac7;
		width: 0;
		box-shadow: inset 1px 1px 10px rgba(0, 0, 0, 0.11);
	}

	.progress .status {
		top: 50%;
		left: 50%;
		position: absolute;
		display: inline-block;
		color: #000000;
		transform: translateX(-50%) translateY(-50%);
	}

	div.fileinput-preview img {
		width: 200px;
		height: 150px;
	}
</style>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">Upload New Media</h3>
			</div>
		</div>
	</div>
	<!-- END: Subheader -->

	<div class="m-content">
		<!-- Begin::Media Section -->
		<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							1: Media To Be Uploaded
						</h3>
					</div>
				</div>
			</div>
			<div class="m-portlet__body">
				<div class="form-group m-form__group">
					<label>Language of Source Video</label>
					<select class="form-control m-input" id="source" style="max-width: 200px;">
						<option value="-1" selected>[Not Selected]</option>
						<?php
						foreach ($langs as $row) {
							echo '<option value="' . $row['id'] . '">' . $row['original'] . '</option>';
						}
						?>
					</select>
				</div>
				<div class="form-group m-form__group">
					<span class="btn btn-default btn-file ">
						<span class="fileinput-new">Select Media</span>
						<input type="file" name="video" accept="video/mp4" />
						<input type="hidden" name="hash_video" />
					</span>
				</div>
				<div class="row" style="margin-top: 10px;" id="video_preview">

				</div>
				<div class="form-group m-form__group mb-0">
					<div class="progress" id="video_progress" style="width: 100%;">
						<div class="progress-bar"></div>
						<div class="status">Uploading... 0%</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End::Media Section -->

		<!-- Begin::Language Section -->
		<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							2: Languages Should Translated Into
						</h3>
					</div>
				</div>
			</div>
			<div class="m-portlet__body">
				<select class="form-control m-select2" id="languages" name="languages" style="width: 100%" multiple="multiple">
					<?php
					foreach ($langs as $row) {
						echo '<option value="' . $row['id'] . '">' . $row['original'] . '</option>';
					}
					?>
				</select>
			</div>
		</div>
		<!-- End::Language Section -->

		<!-- Begin::Receipt Section -->
		<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							3: Users Can Receive This Media
						</h3>
					</div>
				</div>
			</div>
			<div class="m-portlet__body">
				<select class="form-control m-select2" id="users" name="users" style="width: 100%" multiple="multiple">
					<?php
					foreach ($users as $row) {
						echo '<option value="' . $row['id'] . '">' . $row['firstname'] . ' ' . $row['lastname'] . '</option>';
					}
					?>
				</select>
			</div>
		</div>
		<!-- End::Receipt Section -->

		<!-- Begin::Extra Information -->
		<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							4: Detail of This Media
						</h3>
					</div>
				</div>
			</div>
			<div class="m-portlet__body">
				<div class="form-group m-form__group">
					<label>Media Title</label>
					<input type="email" class="form-control m-input" id="title" placeholder="Enter Title of Media" />
				</div>
				<div class="form-group m-form__group">
					<label>Media Description</label>
					<textarea class="form-control m-input" id="description" rows="5"></textarea>
				</div>
				<div class="text-center pt-4">
					<button type="button" class="btn m-btn--pill m-btn--air btn-primary" onclick="confirmMe(this)">Confirm & Submit</button>
				</div>
			</div>
		</div>
		<!-- End::Extra Information -->
	</div>
</div>

<script>
	var selFile1, btn, langs, users;

	$(document).ready(function() {
		$("#languages").select2({placeholder:"Select Languages"});
		$("#users").select2({placeholder:"Select Users"});
		$("#video_progress").fadeOut("fast");
	});

	var Upload = function (file, channel) {
		this.file = file;
		this.channel = channel;
	};

	Upload.prototype.getType = function () {
		return this.file.type;
	};

	Upload.prototype.getSize = function () {
		return this.file.size;
	};

	Upload.prototype.getName = function () {
		return this.file.name;
	};

	Upload.prototype.doUpload = function(lang) {
		var that = this;
		var formData = new FormData();
		var channel = this.channel;
		// add assoc key values, this will be posts values
		formData.append("file", this.file, this.getName());
		formData.append("lang", lang);
		formData.append("hash", $("input[name='hash_video']").val());

		$.ajax({
			type: "POST",
			url: "<?php echo base_url('api/media/upload/video') ?>",
			xhr: function () {
				var myXhr = $.ajaxSettings.xhr();
				if (myXhr.upload) {
					myXhr.upload.addEventListener('progress', that.progressHandling, false);
				}
				return myXhr;
			},
			success: function (data) {
				$("#video_progress").fadeOut("fast");
				data = JSON.parse(data);
				if (data.status == "success") {
					$.post(
						"<?php echo base_url('api/media/upload/save') ?>",
						{
							hash: data.uri,
							origin: $("#source").val(),
							languages_into: langs,
							consumers_to: users,
							title: $("#title").val(),
							description: $("#description").val()
						},
						function(data) {
							data = JSON.parse(data);
							if (data.status == "success")
								swal({
									title: "Viola!",
									text: "Media upload successful!",
									type: "success",
									confirmButtonText: "Yeah, I know"
								}).then(function(e) {
									location.reload();
								});
							$(btn).removeClass("m-loader");
							$(btn).removeClass("m-loader--light");
							$(btn).removeClass("m-loader--right");
						}
					);
				} else {
					$(btn).removeClass("m-loader");
					$(btn).removeClass("m-loader--light");
					$(btn).removeClass("m-loader--right");
				}
			},
			error: function (error) {
				console.log('error');
			},
			async: true,
			data: formData,
			cache: false,
			contentType: false,
			processData: false
		});
	};

	Upload.prototype.progressHandling = function (event) {
		var percent = 0;
		var position = event.loaded || event.position;
		var total = event.total;
		if (event.lengthComputable)
			percent = Math.ceil(position / total * 100);
		$("#video_progress .progress-bar").css("width", +percent + "%");
		$("#video_progress .status").text(percent + "%");
	};

	function fileHash(file, hasher, callback) {
		var reader = new FileReader();
		reader.onload = function (e) {
			var hash = hasher(e.target.result);
			callback(hash);
		};
		reader.readAsBinaryString(file);
	}

	$("input[name='video']").change(function (e) {
		if ($(this)[0].files[0] === undefined) {
			$("#id_first").val("");
			selFile1 = null;
			return;
		}
		selFile1 = $(this)[0].files[0];
		var buf = '<div class="col-md-12 text-center"><p>' + selFile1.name + '</p><video width="100%" controls><source src="' + URL.createObjectURL(selFile1) + '" type="video/mp4"></video></div>';
		$("#video_preview").empty();
		$("#video_preview").append(buf);
		fileHash(selFile1, calcMD5, function (x) {
			$("input[name='hash_video']").val(x);
		});
	});

	function confirmMe(obj) {
		if ($(obj).hasClass("m-loader").toString() == 'true')
			return;
		var source = $("#source").val();
		if (source < 0) {
			swal("Warning", "Pleases select Language of Source Video.", "warning");
			return;
		}
		if ((typeof selFile1 == 'undefined')) {
			swal("Warning", "Pleases select media to upload.", "warning");
			return;
		}
		langs = $("#languages").val().toString();
		if (langs.length < 1) {
			swal("Warning", "Pleases select languages that media should translated into.", "warning");
			return;
		}
		users = $("#users").val().toString();
		if (users.length < 1) {
			swal("Warning", "Pleases select users that can receive this media.", "warning");
			return;
		}

		var arr = langs.split(",");
		var len = arr.length;
		for (var i = 0; i < len; i++)
			arr[i] = '(' + arr[i] + ')';
		langs = arr.toString();

		arr = users.split(",");
		len = arr.length;
		for (var i = 0; i < len; i++)
			arr[i] = '(' + arr[i] + ')';
		users = arr.toString();

		$(obj).addClass("m-loader");
		$(obj).addClass("m-loader--light");
		$(obj).addClass("m-loader--right");
		btn = obj;
		var upload = new Upload(selFile1, 1);
		$("#video_progress").fadeIn("fast");
		upload.doUpload(source);
	}
</script>