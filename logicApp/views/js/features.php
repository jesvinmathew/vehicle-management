<script type="text/javascript">
	$(document).ready(function() {
	    $('#alert').hide();
		function newinput(key) {
			$('#' + key + 'input').parent('div').show();
		}
		$('#addnew').click(function() {
			
 $('#alert').html('')
			var postData = {};
		
			postData.vehicle_feature = $('#vehicle_feature').val();
			postData.description = $('#description').val();
		if($('#vehicle_feature').val().length>6 && $('#description').val().length>10)
        {
            $('.progressdiv').show();
			$.ajax({
				url: "<?PHP echo site_url( 'json' ) ; ?>/addfeatures",
				type: 'post',
				dataType: 'json',
				data: postData
			}).done(function(data) {
				$('#alert').show().html(data.alert);
				$('.progressdiv').hide();
			})
}
else
{
    $('#alert').show().text('Please enter feature 6-30 characters and description above 10 characters')
}

		})
		getdata('getvehicletype', 0, 0, 0);

		function getdata(path, value1, value2, value3) {
			$('.progressdiv').show();
			var postData = {};
			postData.value1 = value1;
			postData.value2 = value2;
			postData.value3 = value3;
			$.ajax({
				url: "<?PHP echo site_url( 'json' ) ; ?>/" + path,
				type: 'post',
				dataType: 'json',
				data: postData
			}).done(function(data) {
				var i = 0;
				if (data.i > 0) {
					if (data.ids != 'vehicletype') {}
					var datas = '';
					var img = '';
					var model = '';
					while (i < data.i) {
						i++;
						if (data.ids == 'company') {
							img = ' img="' + data.image[i] + '" ';
						}
						data.content[i] = data.content[i].toLowerCase();
						if (data.ids == 'model') {
							model = ' start="' + data.start[i] + '" end="' + data.end[i] + '" body="' + data.body[i] + '"';
						}
						if (data.ids == 'variant') {
							model = ' fuel="' + data.fuel[i] + '" ';
						}
						$('#' + data.ids).append('<option value="' + data.id[i] + '" id="img' + data.ids + data.id[i] + '"' + img + model + ' name="' + data.content[i] + '">' + data.content[i] + '</option>');
						datas = datas + '<option >' + data.content[i] + '</option>';
					}
					$('#' + data.ids).parent('div').append('<datalist id="list' + data.ids + '">' + datas + '</datalist>');
					if (data.ids != 'vehicletype') {}
				}
				$('.progressdiv').hide();
			})
		}
		$('#vehicletype').blur(function() {
			if ($('#vehicletype').val() != 0) {
				$('#company').html('<option value="0">Select please</option><option value="-1">new</option>');
				$('#model').html('');
				$('#bodytype').html('');
				$('#fueltype').html('');
				$('#variant').html('');
				getdata('getcompany', $(this).val(), 0, 0);
				getdata('getbody', $(this).val(), 0, 0);
				getdata('getfuel', 0, 0, 0);

			}
		})
		$('#company').blur(function() {
			if ($(this).val() != 0) {



				$('#companyimage').css('background-image', "url('" + '<?PHP echo IMAGES_PATH ?>' + "companies/thumb/" + $('#imgcompany' + $('#company').val()).attr('img') + "')");

				$('#variant').html('');

				$('#model').html('<option value="0">Select please</option><option value="-1">new</option>');

				getdata('getmodel', $(this).val(), 0, 0);
			}
		})
		$('#bodytype').blur(function() {
			if ($(this).val() != 0) {

			}
		})
		$('#model').blur(function() {
			if ($(this).val() != 0) {
				$('#variant').html('<option value="0">Select please</option><option value="-1">new</option>');
				getdata('getvariant', $('#model').val(), 0, 0);
			}
		})
		$('#fueltype').blur(function() {
			if ($(this).val() != 0) {

			}
		})
		var error = [];
		$('.select').change(function() {
			$('.hideme').hide();
			if ($(this).val() == -1) {
				$(this).parent('div').find('.addnew').val('Add new')
				id = $(this).attr('id');
				$(this).parent('div').children('div').find('.new').attr('list', 'list' + id);
				newinput($(this).attr('id'));
				$('#' + $(this).attr('id') + 'input').val('');
			} else {
				$('#' + $(this).attr('id') + 'input').val($('#img' + $(this).attr('id') + $('#' + $(this).attr('id')).val()).attr('name') + "");
				$(this).parent('div').find('.addnew').val('Update it')

				newinput($(this).attr('id'));
				if ($(this).attr('id') == 'adtitle') {

					$('#fuel').val($('#imgadtitle' + $(this).val()).attr('fuel'));

				}
				if ($(this).attr('id') == 'model') {

					$('#fromyear').val($('#imgmodel' + $(this).val()).attr('start'));
					$('#toyear').val($('#imgmodel' + $(this).val()).attr('end'));
					$('#bodytype').val($('#imgmodel' + $(this).val()).attr('body'));

				}
			}
		})
	});
	$(document).ready(function() {
		$('head').append('<meta http-equiv="Expires" content="-1"><meta http-equiv="Cache-control" content="no-cache">');
		$("#upimage").on({
			change: function() {
				$('.thumb').show().append('<img class="photos currentfile"  src=""/>');
				readURL(this);
			}
		})

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('.currentfile').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		var files;
		$('input[type=file]').on('change', prepareUpload);

		function prepareUpload(event) {
			files = event.target.files;


		}
		$("#uploadfile").on({
			click: function() {
				$(".alert").hide();
				var postData = {};
				postData.errorFound = 0;
				postData.image = $("#image").val();
				postData.id = $('#company').val();
				postData.company = $("#companyinput").val();
				postData.type = $("#vehicletype").val();
				if (postData.errorFound == 0) {
					$('.alert').show().text('error').hide(5000);
					if (typeof FormData == 'undefined') {
						var data = [];
						$.each(files, function(key, value) {
							data.append(key, value);
						});
					} else {
						var data = new FormData();
						$.each(files, function(key, value) {
							if ((value.type == "image/jpeg") || (value.type == "image/png") || (value.type == "image/gif")) {
								data.append(key, value);
							} else {
								foundError = false;
								data.append(key, value);
								$(".alert").show().text("Invalid Image file");
								return false;
							}
						});
					}
					$.each(postData, function(X, Y) {
						data.append(X, Y);
					})
					$('.progressdiv').show();
					$.ajax({
						url: "<?= base_url() ?>json/upload",
						type: 'post',
						dataType: 'json',
						data: data,
						cache: false,
						processData: false,
						contentType: false,
						enctype: 'multipart/form-data',
						fileElementId: 'image',
					}).done(function(data) {
						$('#uploadfile').addClass('addnew');
						if (data.error == true) {
							$('.alert').fadeIn(1000).text('not uploaded(' + data.message + ')');
						} else
						if (data.error == false) {
							if (data.process == 'add') {
								$('#' + data.append).append('<option value="' + data.id + '"  id="imgcompany' + data.id + '" img="' + data.image + '" selected="selected" name="' + data.content + '">' + data.content + '</option>');
							} else
							if (data.process == 'up') {
								$('#imgcompany' + data.id).attr('name', data.content).text(data.content);
								$('#company').val(data.id);
							}
							$('#' + data.append).parent('div').children('.hideme').hide();
							$('.alert').fadeIn(1000).text('uploaded(' + data.message + ')').fadeOut(1000);
							$('#companyimage').css('background-image', "url('" + '<?PHP echo



IMAGES_PATH ?>' + "companies/thumb/" + data.image + "')")
						}
						$('.progressdiv').hide();
					})
				}
			}
		})
	})
</script>