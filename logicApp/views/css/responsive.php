<script type = "text/javascript">
var config = {
	support: "image/jpg,image/png,image/bmp,image/jpeg,image/gif",
	// Valid file formats
	form: "demoFiler",
	// Form ID
	dragArea: "dragAndDropFiles",
	// Upload Area ID
	uploadUrl: "<?= base_url() ?>json/upload",
	imgpath: "<?= IMAGES_PATH ?>" // Server side upload url
}
$(document).ready(function() {
	initMultiUploader(config);
	var postData = {};
	postData['adtitle'] = '';
	postData['brandname'] = '';
	postData['mileage'] = '';
	postData['model'] = '';
	postData['cartype'] = '';
	postData['Fuel'] = '';
	postData['condition'] = '';
	postData['Transmission'] = '';
	postData['Odometer'] = '';
	postData['textarea'] = '';
	postData['price'] = '';
	postData['inr'] = '';
	postData['vehicleauth'] = '';
	$.extend({}, postData);
	var error = {};
	$('.required').blur(function() {
		var variable = $(this).attr('id');
		if ($(this).val().length <= 0) {
			$(this).parent('div').children('.alert').remove();
			$(this).parent('div').append('<div class="alert">This field is required</div>').children('.alert').css('background-color', 'red');
			error[variable] = true;
			$.extend({}, error);
		} else {
			$(this).parent('div').children('.alert').css('background-color', 'green').text('Its Ok').fadeOut(3000);
			postData[variable] = $(this).val();
			$.extend({}, postData);
			error[variable] = false;
			$.extend({}, error);
		}
	})
	$('.select').change(function() {
		if ($(this).val() <= 99) {
			$(this).parent('div').children('.alert').remove();
			$(this).parent('div').append('<div class="alert">This field is required</div>').children('.alert').css('background-color', 'red');
			error[variable] = true;
			$.extend({}, error);
		} else {
			$(this).parent('div').children('.alert').css('background-color', 'green').text('Its Ok').fadeOut(3000);
			var variable = $(this).attr('id');
			postData[variable] = $(this).val();
			$.extend({}, postData);
			error[variable] = false;
			$.extend({}, error);
		}
	})
	$('.number').change(function() {
		if ($(this).val() <= 0) {
			$(this).parent('div').children('.alert').remove();
			$(this).parent('div').append('<div class="alert">This field is required</div>').children('.alert').css('background-color', 'red');
			error[variable] = true;
			$.extend({}, error);
		} else {
			$(this).parent('div').children('.alert').css('background-color', 'green').text('Its Ok').fadeOut(3000);
			var variable = $(this).attr('id');
			postData[variable] = $(this).val();
			$.extend({}, postData);
			error[variable] = false;
			$.extend({}, error);
		}
		if ($(this).val() <= 0) {
			$(this).parent('div').children('.alert').remove();
			$(this).parent('div').append('<div class="alert">This field is required</div>').children('.alert').css('background-color', 'red');
			error[variable] = true;
			$.extend({}, error);
		} else {
			$(this).parent('div').children('.alert').css('background-color', 'green').text('Its Ok').fadeOut(3000);
			var variable = $(this).attr('id');
			postData[variable] = $(this).val();
			$.extend({}, postData);
			error[variable] = false;
			$.extend({}, error);
		}
	})
	$('#sendinformation').click(function() {
		$.ajax({
			url: "<?= base_url() ?>json/addvehicle",
			type: 'post',
			dataType: 'json',
			data: postData
		}).done(function(data) {
			if (data.error == true) {
				$('#' + data.id).parent('div').append('<div class="alert">' + data.message + '</div>').children('.alert').css('background-color', 'red');
			} else
			if (data.error == false) {
				$('#sendinformation').val(data.message).attr('id', 'uploadimage');
				$('#vehicleimage').fadeIn(3000);
				$('#upload_id').val(data.id);
				$("html, body").animate({
					scrollTop: 0
				}, 5000);
			}
		});
	})
}); 
</script>

<style>

.select ,.textarea ,.input{

    border: 2px solid #CFCFCF;

box-shadow: 0px 0px 3px 1px #707070;

background-color: rgba(2, 1, 1, 0.03);

background-color: rgba(2, 1, 1, 0.03);

padding: 6px 5px 5px 10px;

}

.select:hover ,.textarea:hover ,.input:hover{

    border:2px solid #CFCFCF;

box-shadow: 0px 1px 10px 2px #707070;

background-color: rgba(255, 255, 255, 1);

}

.alert{

  color: white;



width: 289px;

height: 21px;

padding: 0px 5px 0px 20px;

border: 3px solid #FFFFFF;

border-radius: 3px;

box-shadow: 0px 0px 1px 0px #000000;`

    

}

	.btn{

font-size: 14px;

line-height: 16px;

padding: 8px 16px 14px 16px;

font-weight: bold;

text-align: center;

color: #fff;

background-color: #2b5f90;

margin-top: 16px;

text-transform: uppercase;}

.uploadArea{ min-height:200px; width:200px; height:auto; border:1px dotted #ccc; padding:10px; cursor:move; margin-bottom:10px; position:relative; background:url(<?= IMAGES_PATH ?>plus-icon1.png) no-repeat center;}

.uploadArea1{min-height:90px; width:90px; height:auto; border:1px dotted #ccc; padding:10px; cursor:move; margin-bottom:10px; position:relative; background:url(<?= IMAGES_PATH ?>plus-icon1.png) no-repeat center;}

.uploadArea h1{ color:#666; z-index:0; text-align:center;}

.dfiles{ clear:both; border:1px solid #ccc; background-color:#E4E4E4; padding:3px;  position:relative; height:25px; margin:3px; z-index:1; width:97%; opacity:0.6; cursor:default;}



.invalid { border:1px solid red !important; }

.buttonUpload { display:inline-block; padding: 7px 20px 7px 20px; font-weight:bold; text-align: center; text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); background-color: #0074cc; -webkit-border-radius: 4px;-moz-border-radius: 4px; border-radius: 4px; border-color: #e6e6e6 #e6e6e6 #bfbfbf; border: 1px solid #cccccc; color:#fff; }

.progress img{ margin-top:7px; margin-left:24px; }





</style>

<div class="bg1">

	<!--==============================Content=================================-->

	<div class="content">

		<div class="container">

			<div class="row" id="vehicleimage" style="display: block;">

				<div class="grid_12">

					<h2>

						Post Your Vehicle Here

					</h2>

				</div>

				<div class="grid_12 content" style="background:#d4ecff; padding-top:25px;">

					<div class="grid_7 bg111">

						<div class="grid_3 alpha">

							<div id="dragAndDropFiles" class="uploadArea">

								<h1>

									Drag & Drop Images Here

								</h1>

							</div>

						</div>

						<div class="grid_4 omega">

							<ul>

								<li style="float:left;">

									<div class="uploadArea1">

									</div>

								</li>

								<li style="float:left;">

									<div class="uploadArea1">

									</div>

								</li>

								<li style="float:left;">

									<div class="uploadArea1">

									</div>

								</li>

								<li style="float:left; margin-top:-10px;">

									<div class="uploadArea1">

									</div>

								</li>

								<li style="float:left; margin-top:-10px;">

									<div class="uploadArea1">

									</div>

								</li>

								<li style="float:left; margin-top:-10px;">

									<div class="uploadArea1">

									</div>

								</li>

							</ul>

						</div>

						<form name="demoFiler" id="demoFiler" enctype="multipart/form-data">

                        <input id="upload_id" name="upload_id" type="hidden" value="1111" />

							<input type="file" name="multiUpload" id="multiUpload" multiple />

							<input type="submit" name="submitHandler" id="submitHandler" value="Upload" class="buttonUpload" />

						</form>

						<div class="progressBar">

							<div class="status">

							</div>

						</div>

					</div>

					<div class="grid_3 tooltip omega">

						<ul>

							<li>

								Use original photos in .jpg, .gif or .png

							</li>

							<li>

								Choice to add multiple image files.

							</li>

							<li>

								Avoid low resolution images

							</li>

						</ul>

					</div>

				</div>

			</div>

   

			<div class="grid_12 alpha">

				<div class="grid_12 alpha">

					<h2 class="mb1">

						Vehicle Information

					</h2>

				</div>

				<div class="grid_6 alpha">

				

						<div class="grid_2 alpha">

							<h5>

								<label class="name">

									Your Add's Title

								</label>

							</h5>

						</div>

						<div class="grid_4 alpha">

							<input required="required" id="adtitle" class="input required" type="text" placeholder=""/>

						</div>

                        

						<div class="grid_2 alpha">

							<h5 style="margin-top:5px;">

								<label class="name">

									vehicle type

								</label>

							</h5>

						</div>

						<div class="grid_4 alpha">

							<select class="select required" name="vehicletype" id="vehicletype">

                            	<option value="0" selected="selected">

									Please Select

								</option>

 <?php $onroad_vehicle_type_globalquery = $this->db->get('vehicle_type_global');

foreach ($onroad_vehicle_type_globalquery->result() as $rowonroad_vehicle_type_global)

{

    $vtype_id = $rowonroad_vehicle_type_global->vtype_id + 111;

    echo '	<option value="' . $vtype_id . '">	' . $rowonroad_vehicle_type_global->

        typename . '	</option>';

} ?>

							

							</select>

						</div>

						<div class="grid_2 alpha">

							<h5 style="margin-top:5px;">

								<label class="name">

									Vehicle Make

								</label>

							</h5>

						</div>

						<div class="grid_4 alpha">

							<select id="company" class="select required" name="company">

                            	<option value="0" selected="selected">

									Please Select

								</option>

                            <?php $onroad_companyquery = $this->db->get('company');

foreach ($onroad_companyquery->result() as $rowonroad_company)

{

    $cmp = $rowonroad_company->cmp_id + 111;

    echo '	<option value="' . $cmp . '">	' . $rowonroad_company->companyname .

        '	</option>';

} ?>

							

							

							</select>

						</div>

						<div class="grid_2 alpha">

							<h5 style="margin-top:5px;">

								<label class="name">

									Vehicle Brand

								</label>

							</h5>

						</div>

						<div class="grid_4 alpha">

							<select name="Brand" class="select required" id="brandname">

                            	<option value="0" selected="selected">

									Please Select

								</option>

                            <?php $onroad_brandquery = $this->db->get('brand');

foreach ($onroad_brandquery->result() as $rowonroad_brand)

{

    $cmp = $rowonroad_brand->cmp_id + 111;

    $brand = $rowonroad_brand->brand_id + 111;

    echo '	<option cmp="' . $cmp . '" value="' . $brand . '">	' . $rowonroad_brand->

        brand_name . '	</option>';

} ?>

							

							</select>

						</div>

						<div class="grid_2 alpha">

							<h5 style="margin-top:5px;">

								<label class="name">

									Vehicle Option

								</label>

							</h5>

						</div>

						<div class="grid_4 alpha">

							<select class="select required" name="model" id="model">

                            	<option value="0" selected="selected">

									Please Select

								</option>

                            <?php $onroad_modelquery = $this->db->get('model');

foreach ($onroad_modelquery->result() as $rowonroad_model)

{

    $model = $rowonroad_model->model_id + 111;

    $brand = $rowonroad_model->brand_id + 111;

    $vtype = $rowonroad_model->vtype_id + 111;

    echo '	<option type="' . $vtype . '" brand="' . $brand . '" value="' . $model .

        '">	' . $rowonroad_model->model_name . '	</option>';

} ?>

							

							</select>

						</div>

                        	<div class="grid_2 alpha">

							<h5 style="margin-top:5px;">

								<label class="name">

									Variant

								</label>

							</h5>

						</div>

						<div class="grid_4 alpha">

							<select class="required select" name="variant" id="variant" data-ga="car-body-style">

                            <option value="0" selected="selected">

									Please Select

								</option>

                            <?php $onroad_variantquery = $this->db->get('variant');

foreach ($onroad_variantquery->result() as $rowonroad_variant)

{

    $varient = $rowonroad_variant->varient_id + 111;

    $model = $rowonroad_variant->model_id + 111;

    $vtype = $rowonroad_variant->vtype_id + 111;

    echo '	<option type="' . $vtype . '" model="' . $model . '" value="' . $varient .

        '">	' . $rowonroad_variant->var_name . '	</option>';

} ?>

							

							</select>

						</div>

						<div class="grid_2 alpha">

							<h5 style="margin-top:5px;">

								<label class="name">

									Body Style

								</label>

							</h5>

						</div>

						<div class="grid_4 alpha">

							<select class="required select" name="cartype" id="cartype" data-ga="car-body-style">

                             <option value="0" selected="selected">

									Please Select

								</option>

                            <?php $onroad_vehicle_typequery = $this->db->get('vehicle_type');

foreach ($onroad_vehicle_typequery->result() as $rowonroad_vehicle_type)

{

    $v_id = $rowonroad_vehicle_type->v_id + 111;

    $vtype = $rowonroad_vehicle_type->vtype_id + 111;

    echo '	<option type="' . $vtype . '"  value="' . $v_id . '">	' . $rowonroad_vehicle_type->

        vehicle_type . '	</option>';

} ?>

								

							</select>

						</div>

						<div class="grid_2 alpha">

							<h5 style="margin-top:5px;">

								<label class="name">

									Vehicle Year

								</label>

							</h5>

						</div>

						<div class="grid_4 alpha">

							<select name="year" class="select required" id="year">

                            <option value="0" selected="selected">

									Please Select

								</option>

                            <?php $i = 2014;

while ($i >= 1920)

{

    echo '<option value="' . $i . '">

									' . $i . '

								</option>';

    $i--;

} ?>

							

							</select>

						</div>

						<div class="grid_2 alpha">

							<h5 style="margin-top:5px;">

								<label class="name">

									Fuel Type

								</label>

							</h5>

						</div>

						<div class="grid_4 alpha">

							<select class="select required" name="Fuel" id="Fuel">

                            <option value="0" selected="selected">

									Please Select

								</option>

                                <?php $onroad_fueltypequery = $this->db->get('fueltype');

foreach ($onroad_fueltypequery->result() as $rowonroad_fueltype)

{

    $fl_id = $rowonroad_fueltype->fl_id + 111;

    echo '	<option type="' . $fl_id . '"  value="' . $v_id . '">	' . $rowonroad_fueltype->

        fueltypename . '	</option>';

} ?>

								

							</select>

						</div>

                        <div class="grid_2 alpha">

							<h5 style="margin-top:5px;">

								<label class="name">

									Place

								</label>

							</h5>

						</div>

						<div class="grid_4 alpha">

							<input class="input required" list="places" name="place" id="place"/>

                           <datalist id="places">

                                <?php $onroad_placequery = $this->db->get_where('place');

foreach ($onroad_placequery->result() as $rowonroad_place)

{

    $place_id = $rowonroad_place->place_id + 111;

    echo '	<option  val="' . $place_id . '">	' . $rowonroad_place->placename .

        '	</option>';

} ?></datalist>

							

						</div>

                        

						<div class="grid_2 alpha">

							<h5 style="margin-top:5px;">

								<label class="name">

									Condition

								</label>

							</h5>

						</div>

						<div class="grid_4 alpha">

							<select class="select required" name="condition" id="condition">

                            

                            <option value="0" selected="selected">

									Please Select

								</option>

                                <?php $onroad_conditionquery = $this->db->get('condition');

foreach ($onroad_conditionquery->result() as $rowonroad_condition)

{

    $con_id = $rowonroad_condition->con_id + 111;

    echo '	<option  value="' . $con_id . '">	' . $rowonroad_condition->

        condition_name . '	</option>';

} ?>

							</select>

						</div>

				</div>

				<div class="grid_6 omega">

					<div class="grid_2 alpha">

						<h5 style="margin-top:5px;">

							<label class="name">

								Color

							</label>

						</h5>

					</div>

					<div class="grid_4 alpha">

						<input  required="required" type="color" class="input required" name="color" id="color"/>

						

					</div>

                    	<div class="grid_2 alpha">

						<h5 style="margin-top:5px;">

							<label class="name">

								Transmission

							</label>

						</h5>

					</div>

					<div class="grid_4 alpha">

						<select class="select required" name="Transmission" id="Transmission">

                        <option value="0" selected="selected">

									Please Select

								</option>

                        <?php $onroad_transmissionquery = $this->db->get('transmission');

foreach ($onroad_transmissionquery->result() as $rowonroad_transmission)

{

    $tr = $rowonroad_transmission->tr_id + 111;

    echo '	<option  value="' . $tr . '">	' . $rowonroad_transmission->transmission .

        '	</option>';

} ?>

							

						</select>

					</div>

                    	<div class="grid_2 alpha">

						<h5 style="margin-top:5px;">

							<label class="name">

								Up type

							</label>

						</h5>

					</div>

					<div class="grid_4 alpha">

						<select class="select required" name="uptype" id="uptype">

                        <option value="0" selected="selected">

									Please Select

								</option>

                        <?php $onroad_uptypequery = $this->db->get('onroad_uptype');

foreach ($onroad_uptypequery->result() as $rowonroad_uptype)

{

    $uptype_id = $rowonroad_uptype->uptype_id + 111;

    $tr = $rowonroad_transmission->tr_id + 111;

    echo '	<option  value="' . $uptype_id . '">	' . $uptypename = $rowonroad_uptype->

        uptypename . '	</option>';

} ?>

							

						</select>

					</div>

					<div class="grid_2 alpha">

						<h5>

							<label class="name">

								Odometer

							</label>

						</h5>

					</div>

					<div class="grid_4 alpha">

						<input id="Odometer"  required="required" class="input required number" type="number" placeholder=""/>

						&nbsp;&nbsp;&nbsp;Kms.

					</div>

                    <div class="grid_2 alpha">

						<h5>

							<label class="name">

								Mileage

							</label>

						</h5>

					</div>

					<div class="grid_4 alpha">

						<input id="Mileage"  required="required" class="input required number" type="number" placeholder=""/>

						&nbsp;&nbsp;&nbsp;Kms.

					</div>

					<div class="grid_2 alpha">

						<h5>

							<label class="name">

								Vehicle description

							</label>

						</h5>

					</div>

					<div class="grid_4 alpha">

						<textarea required="required" id="textarea" class="required textarea" data-constraints='@Required @Length(min=20,max=999999)'></textarea>

					</div>

                    	<div class="grid_2 alpha">

						<h5>

							<label class="name">

								Register number

							</label>

						</h5>

					</div>

					<div class="grid_4 alpha">

						<input id="register"  required="required" type="text" class="required input" placeholder=""/>

						

					</div>

					<div class="grid_2 alpha">

						<h5>

							<label class="name">

								Price

							</label>

						</h5>

					</div>

					<div class="grid_4 alpha">

						<input id="inr"  required="required" type="number" class="required input" placeholder=""/>

						<select  class="select required" name="price" id="price">

                        <option value="0" selected="selected">

									Please Select

								</option>

                                <?php $onroad_price_typequery = $this->db->get('onroad_price_type');

foreach ($onroad_price_typequery->result() as $rowonroad_price_type)

{

    $pr_id = $rowonroad_price_type->pr_id + 111;

    echo '	<option  value="' . $pr_id . '">	' . $rowonroad_price_type->pr_type_name .

        '	</option>';

} ?>

							<option value="" id="1">

								Fixed

							</option>

							<option value="" id="2">

								Negotiable

							</option>

							<option value="" id="2">

								Free

							</option>

						</select>

					</div>

				</div>

			

			</div>

			<div class="grid_12 alpha">

				<div class="grid_12 alpha">

					<h2 class="mb1">

						Seller Information

					</h2>

				</div>

                 <?php if ($this->session->userdata('keralaonroads') == false)

{ ?>

				<div class="nav">

					<ul id="tabs2">

						<li>

							<a class="current" href="#">Already A User</a>

						</li>

						<li>

							<a href="#">New User</a>

						</li>

					</ul>

					<span id="indicator2">

					</span>

				</div>

               

				<div id="content2">

					<section>

						<form>

							<div class="grid_2 alpha">

								<h5>

									<label class="name">

										User Name

									</label>

								</h5>

							</div>

							<div class="grid_4 alpha">

								<input id="input" type="text" placeholder=""/>

							</div>

							<div class="grid_2 alpha">

								<h5>

									<label class="name">

										Password

									</label>

								</h5>

							</div>

							<div class="grid_4 alpha">

								<input id="input" type="password" placeholder=""/>

							</div>

						</form>

					</section>

					<section>

						<form>

							<div class="grid_2 alpha">

								<h5>

									<label class="name">

										Contact Name

									</label>

								</h5>

							</div>

							<div class="grid_4 alpha">

								<input id="input" type="text" placeholder=""/>

							</div>

							<div class="grid_2 alpha">

								<h5>

									<label class="name">

										Email

									</label>

								</h5>

							</div>

							<div class="grid_4 alpha">

								<input id="input" type="email" placeholder=""/>

							</div>

							<div class="grid_2 alpha">

								<h5>

									<label class="name">

										Contact Number

									</label>

								</h5>

							</div>

							<div class="grid_4 alpha">

								<input id="input" type="text" placeholder=""/>

							</div>

							<div class="grid_2 alpha">

								<h5>

									<label class="name">

										Location

									</label>

								</h5>

							</div>

							<div class="grid_4 alpha">

								<input id="input" type="text" placeholder=""/>

							</div>

							<div class="grid_2 alpha">

								<h5>

									<label class="name">

										Password

									</label>

								</h5>

							</div>

							<div class="grid_4 alpha">

								<input id="input" type="password" placeholder=""/>

							</div>

							<div class="grid_2 alpha">

								<h5>

									<label class="name">

										Confirm Password

									</label>

								</h5>

							</div>

							<div class="grid_4 alpha">

								<input id="input" type="password" placeholder=""/>

							</div>

							<div class="grid_12 alpha">

								<center>

									<br>

									<input class="line" id="saveMyData" type="checkbox" data-ga="remember-contact-information" checked="checked">

									<a href="#">Read and Agreed to the terms & Conditions of Kerala On Road.</a>

								</center>

							</div>

					

					</section>

				</div>

                <?php } else

{

    $sname = $this->session->userdata('keralaonroads');

    $this->db->select('fname,lname,address,contactno');

    $onroad_usersquery = $this->db->get_where('users', array('user_id' => $sname));

    foreach ($onroad_usersquery->result() as $rowonroad_users)

    {

        echo '<div class="grid_2 alpha">

								<h5>

									<label class="name">

										Ownership details

									</label>

								</h5>

							</div>

							<div class="grid_4 alpha">

								<textarea id="vehicleauth" class="required textarea">' . $rowonroad_users->

            fname . '  ' . $rowonroad_users->lname . '

' . $rowonroad_users->address . '

                                </textarea>

							</div>

                            <div class="grid_2 alpha">

								<h5>

									<label class="name">

										Contact number

									</label>

								</h5>

							</div>

							<div class="grid_4 alpha">

								<input type="number" id="number" class="required input" value="' . $rowonroad_users->

            contactno . '"/>

							</div>';

    }

} ?>

			</div>

            

			<div class="clear">

			</div>

			<hr style="margin:25px 0px !important;">

			<div class="grid_12" align="center">

				<div class="btns">

					<input type="submit" id="sendinformation" class="btn" value="send"/>

				</div>

			</div>

            

		</div>

	</div>

</div>