<div class="col-xs-48 col-xs-offset-1">
    <ul>

        <?php
        $display = 'none';
        $formdisplay = 'block';
        $value;
        if (isset($_POST['submitHandler'])) {
            $value;
            echo $error;
            if ($value != '') {
                $display = 'block';
            }
            $formdisplay = 'none';
            ?>
            <p><?php echo anchor('#', 'You can Upload Another File for same vehicle without refresh this page'); ?></p>
            <?php
        }
        ?>
    </ul>




    <div class="row" id="vehicleimage" style="display: <?= $display ?>;">

        <div class="grid_12">

            <h2>

                Post your vehicle images here

            </h2>

        </div>

        <div class="grid_12 content" style="background:#d4ecff; padding-top:25px;">

            <div class="grid_7 bg111" >

                <div class="grid_3 alpha"  style="display: none;">

                    <div id="dragAndDropFiles" class="uploadArea">

                        <h1>

                            Drag & drop images here

                        </h1>

                    </div>

                </div>

                <div class="grid_4 omega" style="display: none;">

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


                <form method="post" name="demoFiler" id="demoFiler" enctype="multipart/form-data" action="/upload/do_upload">

                    <input id="upload_id" name="upload_id" type="hidden" value="<?= $value ?>" />

                    <input type="file" name="userfile" size="20" />
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
        <a href="<?= site_url('welcome/profile/myvehicle'); ?>" role="button" class="btn">Finish</a>
    </div>
    <div class="col-xs-50 " style="display: <?= $formdisplay ?>;">
        <form method="post" action="<?= base_url() ?>welcome/usedCarsSell">
            <div class="col-xs-50">
                <h2 class="mb1">Vehicle Information</h2>
            </div>
            <div class="col-xs-50 col-sm-25">
                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">Title for your Ad</label>
                    </div>
                    <div class="col-xs-26"><input required="required" name='adtitle' id="adtitle" class="text required form-control" type="text" placeholder=""/>
                    </div>
                </div>
                <div class="col-xs-50" hidden="hidden">
                    <div class="col-xs-20">
                        <label class="name">Vehicle type</label>
                    </div>
                    <div class="col-xs-26">
                        <?php
                        if ($this->uri->segment(3) == 'bike') {
                            $type = 1;
                        } else
                        if ($this->uri->segment(3) == 'car') {
                            $type = 2;
                        }
                        ?>
                        <input type="text" value="<?php echo $type; ?>" id="vehicletype" name="vehicletype">
                    </div>
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">Brand Name</label>
                    </div>
                    <div class="col-xs-26">
                        <select id="company" class="select required form-control" name="company">
                            <option value="0" selected="selected">Please select</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">Model</label>
                    </div>
                    <div class="col-xs-26">
                        <select class="select required form-control" name="model" id="model">
                            <option value="0" selected="selected">Please select</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">Variants</label>
                    </div>
                    <div class="col-xs-26">
                        <select class="select required form-control" name="variant" id="variant">
                            <option value="0">Please select</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-50">

                    <div class="col-xs-20">
                        <label class="name">Vehicle Year & Month</label>
                    </div>
                    <div class="col-xs-26">
                        <div class="col-xs-25">
                            <select name="model_year" class="select required form-control" id="year">
                                <option value="0" selected="selected">Please select</option>
                                <?php
                                $i = date('Y');
                                while ($i >= 1920) {
	                                echo '<option value="' . $i . '">' . $i . '</option>';
	    				$i--;
				}
				?>
                            </select>
                        </div>
                        <div class="col-xs-25">
                            <select name="month" class="select required form-control" id="month">
                                <option value="0" selected="selected">Please select</option>
                                <option value="1" >January</option>
                                <option value="2" >February</option>
                                <option value="3">March</option>
                                <option value="4" >April</option>
                                <option value="5" >May</option>
                                <option value="6" >June</option>
                                <option value="7" >July</option>
                                <option value="8">August</option>
                                <option value="9" >September</option>
                                <option value="10" >October</option>
                                <option value="11" >November</option>
                                <option value="12" >December</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">District</label>
                    </div>
                    <div class="col-xs-26">
                        <select id="district" class="select  required form-control">
                            <option value="0" selected="selected">Please select</option>
<?php
$onroad_placequery = $this->db->get_where('place', array('type' => 3));
foreach ($onroad_placequery->result() as $rowonroad_place) {
    $place_id = $rowonroad_place->place_id;
    echo '<option  value="' . $place_id . '">' . $rowonroad_place->placename . '</option>';
}
?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">Place</label>
                    </div>
                    <div class="col-xs-26">
                        <input class="text required form-control" list="places" name="place_id" id="place"/>

                    </div>
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">Condition</label>
                    </div>

                    <div class="col-xs-26">
                        <select class="select required form-control" name="con_id" id="condition">
                            <option value="0" selected="selected">Please Select</option>
<?php
$onroad_conditionquery = $this->db->get('condition');
foreach ($onroad_conditionquery->result() as $rowonroad_condition) {
    $con_id = $rowonroad_condition->con_id;
    echo '<option  value="' . $con_id . '">	' . $rowonroad_condition->condition_name . '	</option>';
}
?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">Color</label>
                    </div>
                    <div class="col-xs-26">
                        <input  required="required" type="text" class="text required form-control" name="color_id" id="color"/>
                    </div>
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">
                            Insurance End Date
                        </label>
                    </div>
                    <div class="col-xs-26">
                        <input id="edate" name="edate" type="text" class="date form-control" value="<?= date('Y/m/d'); ?>" data-date-format="YYYY/MM/DD"/>
                    </div>
                </div>

                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">
                            IDV Value
                        </label>
                    </div>
                    <div class="col-xs-26">
                        <input id="idv" name="idv" type="number" class=" form-control nonmand" placeholder=""/>
                    </div>
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">
                            Current Insurance Company
                        </label>
                    </div>
                    <div class="col-xs-26">
                        <input id="inscomp" name="inscomp"  required="required" type="text" class="text required form-control" placeholder=""/>
                    </div>
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">
                            Kilometers Covered
                        </label>
                    </div>
                    <div class="col-xs-26">
                        <div  class="col-xs-40">
                            <input id="Odometer" name="kilo_meter" required="required" class="text required number form-control" type="number" placeholder=""/>
                        </div>
                        <div  class="col-xs-10" style="padding-top:7px">
                        	&nbsp;&nbsp;&nbsp;Kms.
                        </div>
                    </div>
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">
                            Mileage
                        </label>
                    </div>
                    <div class="col-xs-26">
                        <div  class="col-xs-40">
                            <input id="Mileage"   name="millage" class=" form-control nonmand" type="number" placeholder=""/>
                        </div>
                        <div  class="col-xs-10" style="padding-top:7px">
                        	&nbsp;&nbsp;&nbsp;Kms.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-50 col-sm-25">                
                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">
                            Description
                        </label>
                    </div>
                    <div class="col-xs-26">
                        <textarea required="required" id="textarea" class="required textarea form-control" name="discription" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
                    </div>
                </div>
                <div class="col-xs-50" style="padding-top:-2px;">
                    <div class="col-xs-20">
                        <label class="name">
                            Register Number
                        </label>
                    </div>
                    <div class="col-xs-26">
                        <input id="register" name="reg_no"  required="required" type="text" class="text required form-control" placeholder=""/>
                    </div>
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">
                            Price
                        </label>
                    </div>
                    <div class="col-xs-26">
                        <div class="col-xs-25">
                            <input id="inr" name="inr"  required="required" type="number" style="padding-left: 30px;" class="required input form-control" placeholder=""/>
                        </div>
                        <div class="col-xs-25">
                            <select  class="select required form-control" name="price" id="price">
                                <option value="0" selected="selected">
                                    Please select
                                </option>
                                <?php
                                	$onroad_price_typequery = $this->db->get('onroad_price_type');
                                	foreach ($onroad_price_typequery->result() as $rowonroad_price_type) {
                                		$pr_id = $rowonroad_price_type->pr_id;
                                		echo '<option  value="' . $pr_id . '">' . $rowonroad_price_type->pr_type_name.'	</option>';
                                	}
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">
                            Ownership Details
                        </label>
                    </div>
                    <div class="col-xs-26">
                        <textarea required="required" id="vehicleauth" class="required textarea form-control" name="vehicleauth" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
                    </div>
                </div>
                <div class="col-xs-50" style="padding-top:2px;">
                    <div class="col-xs-20">
                        <label class="name">
                            Mobile Number
                        </label>
                    </div>
                    <div class="col-xs-26">
                        <div class="col-xs-10">
                            <input id="cuncode" name="cuncode" value="+91"  required="required" type="text" class="number form-control" />
                        </div>
                        <div class="col-xs-40">
                            <input id="number" name="number" required="required" type="text" class="number form-control" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">
                            Land Number
                        </label>
                    </div>
                    <div class="col-xs-26">
                        <div class="col-xs-18">
                            <input id="stdCod" name="stdCod"   type="text" class=" form-control" placeholder="STD Code"/>
                        </div>
                        <div class="col-xs-32">
                            <input id="lnumber" name="lnumber"   type="text" class=" form-control" placeholder="Number"/>
                        </div>
                    </div>
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">
                            Fuel Type
                        </label>
                    </div>
                    <div class="col-xs-26">
                        <select name="ftype" class="select tmSelect auto form-control" id="ftype"  data-class="tmSelect tmSelect2" data-constraints="">
                            <option value="">Select</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Petrol">Petrol</option>
                            <option value="LPG">LPG</option>
                            <option value="CNG">CNG</option>
                            <option value="Electric">Electric</option>
                            <option value="Hybrid">Hybrid</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">
                            Transmission 
                        </label>
                    </div>
                    <div class="col-xs-26">
                        <select name="tmission" class="select tmSelect auto form-control" id="tmission"  data-class="tmSelect tmSelect2" data-constraints="">
                            <option value="">Select</option>
                            <option value="Manual">Manual</option>
                            <option value="Automatic">Automatic</option>

                        </select>
                    </div>
                </div>
                <?PHP
                    if(isset($ceritfy)){
                    ?>
                <div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">
                            Is it certified vehicle? 
                        </label>
                    </div>
                <input type='checkbox' name='cert' value="<?= $ceritfy ?>" id='cert'>
</div>
<div class="col-xs-50">
                    <div class="col-xs-20">
                        <label class="name">
                            certified Note
                        </label>
                    </div>
                <textarea id="certifyNote"></textarea>
</div>
               <?PHP
               }
               ?>
            </div>
            <div class="clear">
            </div>
            <div class="grid_12" align="center">
                <p>
                    <label>&nbsp;</label>
                    <input id="sendinformation" name="sendinformation" type="submit" class="btn" value="Next&#8594;" />
                </p>
            </div>
        </form>
    </div>
</div>