<div class="col-xs-50 ">
    <form method="post" enctype="multipart/form-data">
        <div class="col-xs-50">
            <h2 class="mb1">Vehicle Information	</h2>
        </div>
        <div class="col-xs-50 col-sm-25">
            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">Title for your ad</label>
                </div>
                <div class="col-xs-26"><input required="required" name='adtitle' id="adtitle" class="text required form-control" type="text" placeholder="" value="<?php echo $vedit[0]->title_name; ?>"/>
                </div>
            </div>
            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">vehicle type</label>
                </div>
                <div class="col-xs-26">
                    <?php
                    $vid = $vedit[0]->vtype_id;
                    $qq = $this->db->get_where('vehicle_type_global', array('vtype_id' => $vid));
                    $vname = $qq->result();
                    ?>
                    <input type="text" class=" form-control" value="<?= $vname[0]->typename; ?>">
                </div>
            </div>
            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">Vehicle Make</label>
                </div>
                <div class="col-xs-26">
                    <?php
                    $cid = $vedit[0]->cmp_id;
                    $qq = $this->db->get_where('company', array('cmp_id' => $cid));
                    $cname = $qq->result();
                    ?>


                    <input type="text" class=" form-control" value="<?= $cname[0]->companyname; ?>">
                </div></div>
            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">Vehicle Option</label>
                </div>
                <div class="col-xs-26">
                    <?php
                    $mid = $vedit[0]->model_id;
                    $qq = $this->db->get_where('model', array('model_id' => $mid));
                    $mname = $qq->result();
                    ?>
                    <input type="text" class="form-control"  value="<?= $mname[0]->model_name; ?>">
                </div>
            </div>
            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">variant type</label>
                </div>
                <div class="col-xs-26">
                    <?php
                    /* $vrid=$vedit[0]->model_id;
                      $qq=$this->db->get_where('varient', array('varient_id' => $vrid));
                      $vrname= $qq->result();
                      //$vrname[0]->var_name; */
                    ?>
                    <input type="text" class="form-control" value="">
                </div>
            </div>
            <div class="col-xs-50">

                <div class="col-xs-20">
                    <label class="name">Vehicle Year</label>
                </div>
                <div class="col-xs-26">
                    <select name="model_year" class="select required form-control" id="year">
                        <option value="<?php echo $vedit[0]->model_year; ?>" ><?php echo $vedit[0]->model_year; ?></option>
                        <?php
                        $i = 2014;
                        while ($i >= 1920) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                            $i--;
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">Vehicle Month</label>
                </div>
                <div class="col-xs-26">
                    <select name="month" class="select required form-control" id="month">
                        <option value="0" selected="selected">Please Select</option>
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
            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">District</label>
                </div>
                <div class="col-xs-26">
                    <?php
                    $did = $vedit[0]->district_id;
                    $qq = $this->db->get_where('place', array('place_id' => $did));
                    $dname = $qq->result();
                    ?>
                    <select id="district" class="select  required form-control" name="district">
                        <option  value="<?php echo$vedit[0]->district_id; ?>" ><?php echo $dname[0]->placename; ?></option>
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
                    <input class="text required form-control" list="places" name="place" id="place" value="<?php echo $vedit[0]->place_id; ?>"/>

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
                    <input  required="required" type="text" class="text required form-control" name="color" id="color" value="<?php echo $vedit[0]->color_id; ?>"/>
                </div>
            </div>
            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">
                        insurance start date
                    </label>
                </div>
                <div class="col-xs-26">
                    
                    <input id="sdate" name="sdate"  required="required" type="date" class="text required form-control" value="<?= $vedit[0]->sdate; ?>" />
                </div>
            </div>
            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">
                        idv value
                    </label>
                </div>
                <div class="col-xs-26">
                    <input id="idv" name="idv" type="number" required="required"  class="text required form-control" placeholder="" value="<?php echo $vedit[0]->idv; ?>" />
                </div>
            </div>
            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">
                        Transmission
                    </label>
                </div>
                <div class="col-xs-26">
                    <input id="tmission" name="Transmission"  required="required" type="text" class="text required form-control" placeholder="" value="<?php echo $vedit[0]->transmission; ?>"/>
                </div>
            </div>
            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">
                        Current insurance company
                    </label>
                </div>
                <div class="col-xs-26">
                    <input id="inscomp" name="inscomp"  required="required" type="text" class="text required form-control" placeholder="" value="<?php echo $vedit[0]->insurance_comp; ?>"/>
                </div>
            </div>
        </div>
        <div class="col-xs-50 col-sm-25">

            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">
                        Kilometers covered
                    </label>
                </div>
                <div class="col-xs-26">
                    <div  class="col-xs-40">
                        <input id="Odometer" type="number" name="Odometer" required="required" class="text required number form-control"  placeholder="" value="<?php echo $vedit[0]->kilo_meter; ?>"/></div>
                    &nbsp;&nbsp;&nbsp;Kms.
                </div>	</div>
            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">
                        Mileage
                    </label>
                </div>
                <div class="col-xs-26">
                    <div  class="col-xs-40">
                        <input id="Mileage" type="number" required="required" name="Mileage" class="text required number form-control"  placeholder="" value="<?php echo $vedit[0]->millage; ?>"/></div>
                    &nbsp;&nbsp;&nbsp;Kms.
                </div>
            </div>
            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">
                        Vehicle description
                    </label>
                </div>
                <div class="col-xs-26">
                    <textarea required="required" id="textarea" class="required textarea form-control" name="textarea" data-constraints='@Required @Length(min=20,max=999999)'><?php echo $vedit[0]->discription; ?></textarea>
                </div>
            </div>
            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">
                        Register number
                    </label>
                </div>
                <div class="col-xs-26">
                    <input id="register" name="register"  required="required" type="text" class="text required form-control" placeholder="" value="<?php echo $vedit[0]->reg_no; ?>"/>
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
                        <input id="inr" name="inr"  required="required"  style="padding-left: 30px;" class="required input form-control" placeholder="" value="<?php echo $vedit[0]->exp_prize; ?>" />
                    </div>
                    <div class="col-xs-25">
                        <select  class="select required form-control" name="price" id="price">
                            <option value="0" selected="selected">
                                Please Select
                            </option>
                            <?php
                            $onroad_price_typequery = $this->db->get('onroad_price_type');
                            foreach ($onroad_price_typequery->result() as $rowonroad_price_type) {
                                $pr_id = $rowonroad_price_type->pr_id;
                                echo '	<option  value="' . $pr_id . '">	' . $rowonroad_price_type->pr_type_name .
                                '	</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">
                        Ownership details
                    </label>
                </div>
                <div class="col-xs-26">
                    <textarea required="required" id="vehicleauth" class="required textarea form-control" name="vehicleauth" data-constraints='@Required @Length(min=20,max=999999)'><?php echo $vedit[0]->ownershipdetails; ?></textarea>
                </div>
            </div>
            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">
                        Mobile number
                    </label>
                </div>
                <div class="col-xs-26">
                    <input id="number" name="number" type="number"  required="required"  class="text required form-control" placeholder="" value="<?php echo $vedit[0]->contact_number; ?>"/>
                </div>
            </div>
            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">
                        Land number
                    </label>
                </div>
                <div class="col-xs-26">
                    <input id="lnumber" name="lnumber"   type="number" class=" form-control" placeholder="" value="<?php echo $vedit[0]->land_no; ?>"/>
                </div>
            </div>

            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">
                        insurance end date
                    </label>
                </div>
                <div class="col-xs-26">
                    <input id="edate" name="edate"  required="required" type="date" class="text required form-control" value="<?= $vedit[0]->edate; ?>" />
                </div>
            </div>
            <div class="col-xs-50">
                <div class="col-xs-20">
                    <label class="name">
                        Fuel type
                    </label>
                </div>
                <div class="col-xs-26">
                    <input id="ftype" name="ftype"  required="required" type="text" class="text required form-control" placeholder="" value="<?= $vedit[0]->ftype; ?>"/>
                </div>
            </div>


        </div>
        <div class="clear">
        </div>
        <?php
        $this->load->helper('directory'); //load directory helper
        $dir = "assets/uploads/thumb/"; // Your Path to folder
        ?>
        <?php
        $length1 = count($eimage);
        for ($i = 0; $i < $length1; $i++) {
            $k = $eimage[$i]->image;
            // echo '<img src="' . base_url($dir) .strrev(implode(strrev('_thumb.'), $k . '" alt="">';
            echo "<img src='" . UPLOAD_PATH . "thumb/" . strrev(implode(strrev('_thumb.'), explode('.', strrev($eimage[$i]->image), 2))) . "' />";
            echo'<a href="profile_edit?img=' . $eimage[$i]->vimg_id . '&pid=' . $rid . '">delete</a>';
        }
        ?>
        <div id="dropbox">
            <span class="message">Drop images here to upload. </span>
	</div>
        <div class="col-xs-50" style="padding:20px;">
            <div class="col-xs-10" style="float:right">

                <input type="hidden" name="pid" value="<? echo $rid ?>" />
                <input type="submit" name="Update"  value="Update" class="form-control" style="width: 70px;" />
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function(){
	
	var dropbox = $('#dropbox'),
		message = $('.message', dropbox);
	
	dropbox.filedrop({
		// The name of the $_FILES entry:
		paramname:'userfile',
		
		maxfiles: 5,
    	maxfilesize: 15,
		url: "<?= site_url('upload/multyUpload/')."/".$_GET['pid']; ?>",
		
		uploadFinished:function(i,file,response){
			$.data(file).addClass('done');
			// response is the JSON object that post_file.php returns
		},
		
    	error: function(err, file) {
			switch(err) {
				case 'BrowserNotSupported':
					showMessage('Your browser does not support HTML5 file uploads!');
					break;
				case 'TooManyFiles':
					alert('Too many files! Please select 5 at most! (configurable)');
					break;
				case 'FileTooLarge':
					alert(file.name+' is too large! Please upload files up to 15mb.');
					break;
				default:
					break;
			}
		},
		
		// Called before each upload is started
		beforeEach: function(file){
			if(!file.type.match(/^image\//)){
				alert('Only images are allowed!');
				
				// Returning false will cause the
				// file to be rejected
				return false;
			}
		},
		
		uploadStarted:function(i, file, len){
			createImage(file);
		},
		
		progressUpdated: function(i, file, progress) {
			$.data(file).find('.progress').width(progress);
		}
    	 
	});
	
	var template = '<div class="preview">'+
						'<span class="imageHolder">'+
							'<img />'+
							'<span class="uploaded"></span>'+
						'</span>'+
						'<div class="progressHolder">'+
							'<div class="progress"></div>'+
						'</div>'+
					'</div>'; 
	
	
	function createImage(file){

		var preview = $(template), 
			image = $('img', preview);
			
		var reader = new FileReader();
		
		image.width = 100;
		image.height = 100;
		
		reader.onload = function(e){
			
			// e.target.result holds the DataURL which
			// can be used as a source of the image:
			
			image.attr('src',e.target.result);
		};
		
		// Reading the file as a DataURL. When finished,
		// this will trigger the onload function above:
		reader.readAsDataURL(file);
		
		message.hide();
		preview.appendTo(dropbox);
		
		// Associating a preview container
		// with the file, using jQuery's $.data():
		
		$.data(file,preview);
	}
	function showMessage(msg){
		message.html(msg);
	}
});
</script>