<style>
	.edit{
		display:none;
	}
</style>
<?PHP 
if(!$enqu[0]->new_vehi){
?>
<script>
	$(document).ready(function () {
                            var postData = {};
                            postData.value1 = "<?=$enqu[0]->variant?>";
                            postData.value2 = "<?=($enqu[0]->vehicletype== 3 )? 2 : $enqu[0]->vehicletype ?>";
                            postData.value3 =  "<?=$enqu[0]->regdate?>";
                            postData.value4 =  "<?=$enqu[0]->expdate?>";
                            postData.value5 = "<?=$enqu[0]->no_clime?>";
                            postData.value6 =  "<?=$enqu[0]->modyear?>";
                            var cc;
                            var sc;
                            $.ajax({
                                url: "<?= site_url('newjson/insucalcu'); ?>",
                                type: 'post',
                                dataType: 'json',
                                data: postData
                            }).done(function (data) {
                                $("#bajtp").html(data['tp']);
                                $("#bajnor").html(data['normel']);
                                $('.progressdiv').hide();
                                $('#buy').show();
                                $('#calculate').hide();

                            }).fail(function () {
                                alert("error");
                                $('.progressdiv').hide();
                            });
                        });
</script>
<?PHP
}
?>
<div class="bg">
    <div class="col-xs-48 col-xs-offset-1">
    	<?PHP
    	if(isset($enqu[0])&& is_array($enqu)){?>
    	<div class="col-xs-50">    		
    		<div class="col-xs-15 form-group">
    			Name
    		</div>
    		<div class="col-xs-15 form-group">
    		:<?=$enqu[0]->name;?>
    		</div>
    		<div class="col-xs-15 edit">
    			<input type="text" name="name" id="name" class="text form-control" value="<?=$enqu[0]->name;?>" />
    		</div>
    	</div>
    	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
    			Email
    		</div>
    		<div class="col-xs-15 form-group">
    		:<?=$enqu[0]->email;?>
    		</div>
    		<div class="col-xs-15 edit">
    			<input type="text" name="email" id="email" class="text form-control" value="<?=$enqu[0]->email;?>" />
    		</div>
    	</div>
    	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
    			Mob Number
    		</div>
    		<div class="col-xs-15 form-group">
    		:<?=$enqu[0]->mob_number;?>
    		</div>
    		<div class="col-xs-15 edit">
    			<input type="text" name="mob_number" id="mob_number" class="text form-control" value="<?=$enqu[0]->mob_number;?>" />
    		</div>
    	</div>
    	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
    			Land phone
    		</div>
    		<div class="col-xs-15 form-group">
    		:<?=$enqu[0]->land_number;?>
    		</div>
    		<div class="col-xs-15 edit">
    			<input type="text" name="land_number" id="land_number" class="text form-control" value="<?=$enqu[0]->land_number;?>" />
    		</div>
    	</div>
    	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
    			Vehicle Type
    		</div>
    		<div class="col-xs-15 form-group">
    		:<?PHP
    			switch($enqu[0]->vehicletype){
    				case 1:
    					echo "Bike";
    					break;
    				case 2:
    					echo "Private Car";
    					break;
    				case 3:
    					echo "Taxi";
    					break;
    			}
    		?>
    		</div>
    		<div class="col-xs-15 edit">
    			<input type="text" name="name" id="name" class="text form-control" value="<?=$enqu[0]->name;?>" />
    		</div>
    	</div>
    	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
	    			New Vehicle
    		</div>
    		<div class="col-xs-15 form-group">
    		:<?=($enqu[0]->new_vehi)?"Yes":"No";?>
    		</div>
    		<div class="col-xs-15 edit">
    			<input type="text" name="name" id="name" class="text form-control" value="<?=$enqu[0]->make;?>" />
    		</div>
    	</div>
    	
    	<?PHP
    		if(!$enqu[0]->new_vehi){
    			?>
    			<div class="col-xs-50">
		    		<div class="col-xs-15 form-group">
			    			Make
		    		</div>
		    		<div class="col-xs-15 form-group">
		    		:<?PHP 
		    		$res=$this->db->get_where('company',array('cmp_id'=>$enqu[0]->make))->result();
        			echo isset($res[0]->companyname)?$res[0]->companyname:$enqu[0]->make;
        			?>
		    		</div>
		    		<div class="col-xs-15 edit">
		    			<input type="text" name="name" id="name" class="text form-control" value="<?=$enqu[0]->make;?>" />
		    		</div>
		    	</div>
		    	<div class="col-xs-50">
		    		<div class="col-xs-15 form-group">
			    			Model
		    		</div>
		    		<div class="col-xs-15 form-group">
		    		:<?PHP 
		    		$res=$this->db->get_where('model',array('model_id'=>$enqu[0]->model))->result();
        			echo isset($res[0]->model_name)?$res[0]->model_name:$enqu[0]->model;
        			?>
		    		</div>
		    		<div class="col-xs-15 edit">
		    			<input type="text" name="name" id="name" class="text form-control" value="<?=$enqu[0]->model;?>" />
		    		</div>
		    	</div>
		    	<div class="col-xs-50">
		    		<div class="col-xs-15 form-group">
			    			Variant
		    		</div>
		    		<div class="col-xs-15 form-group">
		    		:<?PHP
		    		$res=$this->db->get_where('variant',array('varient_id'=>$enqu[0]->variant))->result();
        			echo isset($res[0]->var_name)?$res[0]->var_name:$enqu[0]->variant;
        			?>
		    		</div>
		    		<div class="col-xs-15 edit">
		    			<input type="text" name="name" id="name" class="text form-control" value="<?=$enqu[0]->variant;?>" />
		    		</div>
		    	</div>
    			<?PHP
    			
    		}
    		else{
    			?>
    			<div class="col-xs-50">
		    		<div class="col-xs-15 form-group">
			    			Make
		    		</div>
		    		<div class="col-xs-15 form-group">
		    		:<?=$enqu[0]->make?>
		    		</div>
		    		<div class="col-xs-15 edit">
		    			<input type="text" name="name" id="name" class="text form-control" value="<?=$enqu[0]->make;?>" />
		    		</div>
		    	</div>
		    	<div class="col-xs-50">
		    		<div class="col-xs-15 form-group">
			    			Model
		    		</div>
		    		<div class="col-xs-15 form-group">
		    		:<?=$enqu[0]->model;?>
		    		</div>
		    		<div class="col-xs-15 edit">
		    			<input type="text" name="name" id="name" class="text form-control" value="<?=$enqu[0]->model;?>" />
		    		</div>
		    	</div>
		    	<div class="col-xs-50">
		    		<div class="col-xs-15 form-group">
			    			Variant
		    		</div>
		    		<div class="col-xs-15 form-group">
		    		:<?=$enqu[0]->variant;?>
		    		</div>
		    		<div class="col-xs-15 edit">
		    			<input type="text" name="name" id="name" class="text form-control" value="<?=$enqu[0]->variant;?>" />
		    		</div>
		    	</div>
		    	<?PHP
		}
	?>
    	
    	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
	    			Year of Make
    		</div>
    		<div class="col-xs-15 form-group">
    		:<?=$enqu[0]->modyear;?>
    		</div>
    		<div class="col-xs-15 edit">
    			<input type="text" name="modyear" id="modyear" class="text form-control" value="<?=$enqu[0]->modyear;?>" />
    		</div>
    	</div>
    	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
    			Register Number
    		</div>
    		<div class="col-xs-15 form-group">
    		:<?=$enqu[0]->regno;?>
    		</div>
    		<div class="col-xs-15 edit">
    			<input type="text" name="regno" id="regno" class="text form-control" value="<?=$enqu[0]->regno;?>" />
    		</div>
    	</div>
    	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
    			Registration Date
    		</div>
    		<div class="col-xs-15 form-group">
    		:<?=$enqu[0]->regdate;?>
    		</div>
    		<div class="col-xs-15 edit">
    			<input type="text" name="regdate" id="regdate" class="text form-control" value="<?=$enqu[0]->regdate;?>" />
    		</div>
    	</div>
    	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
    			Expiry Date
    		</div>
    		<div class="col-xs-15 form-group">
    		:<?=$enqu[0]->expdate;?>
    		</div>
    		<div class="col-xs-15 edit">
    			<input type="text" name="expdate" id="expdate" class="text form-control" value="<?=$enqu[0]->expdate;?>" />
    		</div>
    	</div>
    	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
    			No claim
    		</div>
    		<div class="col-xs-15 form-group">
    		:<?=($enqu[0]->no_clime)?"Yes":"No";?>
    		</div>
    		<div class="col-xs-15 edit">
    			<input type="text" name="no_clime" id="no_clime" class="text form-control" value="<?=$enqu[0]->no_clime;?>" />
    		</div>
    	</div>
    	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
    			Address
    		</div>
    		<div class="col-xs-15 form-group">
    		:<?=$enqu[0]->address;?>
    		</div>
    		<div class="col-xs-15 edit">
    			
    		</div>
    	</div>
    	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
    			Location
    		</div>
    		<div class="col-xs-15 form-group">
    		:<?=$enqu[0]->location;?>
    		</div>
    		<div class="col-xs-15 edit">
    			<input type="text" name="location" id="location" class="text form-control" value="<?=$enqu[0]->location;?>" />
    		</div>
    	</div>
    	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
    			City
    		</div>
    		<div class="col-xs-15 form-group">
    		:<?=$enqu[0]->city;?>
    		</div>
    		<div class="col-xs-15 edit">
    			<input type="text" name="city" id="city" class="text form-control" value="<?=$enqu[0]->city;?>" />
    		</div>
    	</div>
    	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
    			Pin
    		</div>
    		<div class="col-xs-15 form-group">
    		:<?=$enqu[0]->pin;?>
    		</div>
    		<div class="col-xs-15 edit">
    			<input type="text" name="pin" id="pin" class="text form-control" value="<?=$enqu[0]->pin;?>" />
    		</div>
    	</div>
    	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
    			km
    		</div>
    		<div class="col-xs-15 form-group">
    		:<?=$enqu[0]->km;?>
    		</div>
    		<div class="col-xs-15 edit">
    			<input type="text" name="km" id="km" class="text form-control" value="<?=$enqu[0]->km;?>" />
    		</div>
    	</div>
    	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
    			Fuel
    		</div>
    		<div class="col-xs-15 form-group">
    		:<?=$enqu[0]->fual;?>
    		</div>
    		<div class="col-xs-15 edit">
    			<input type="text" name="fual" id="fual" class="text form-control" value="<?=$enqu[0]->fual;?>" />
    		</div>
    	</div>
    	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
    			Insurance Company
    		</div>
    		<div class="col-xs-15 form-group">
    		:<?=$enqu[0]->insu_cmp;?>
    		</div>
    		<div class="col-xs-15 edit">
    			<input type="text" name="insu_cmp" id="insu_cmp" class="text form-control" value="<?=$enqu[0]->insu_cmp;?>" />
    		</div>
    	</div>
    	<table  width="100%" border="1" style=" background: #ADD8E6; border-radius: 5px; border: solid 1px;">
                                <tr>
                                    <th colspan="2" style="padding: 10px;"><center><b> Insurance Amount</b></center></th>
                                </tr>
                                <tr  style="background:#ADD8E6">
                                    <th width='50%' style="padding: 10px;">Third Party</th>
                                    <td id="bajtp" style="padding: 10px;"></td>
                                </tr>
                                <tr style="background:#ADD8E6">
                                    <th style="  padding: 10px;">Normal</th>
                                    <td id="bajnor" style="padding: 10px;"></td>
                                </tr>
                            </table>
        <div class="col-xs-50">
            <?PHP
            $img=$this->db->get_where('insu_eqry_images',  array('ins_id'=>$enqu[0]->id))->result();
            foreach ($img as $imgs){
                ?>
            <img src="<?= UPLOAD_PATH.'insu_eqry/'.$imgs->name; ?>" class="col-xs-15" />
                <?PHP
            }
            ?>
        </div>
                            <form method="post">
                            <input type="hidden" value="" />
                            	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
    			Third Party
    		</div>
    		<div class="col-xs-15 form-group">
    		<input type="text" name="tparty" id="tparty" class="text form-control" value="<?= $enqu[0]->thiParty;?>" />
    		</div>
    	</div>
    	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
    			Normal
    		</div>
    		<div class="col-xs-15 form-group">
    		<input type="text" name="normel" id="normel" class="text form-control" value="<?=$enqu[0]->normel;?>" />
    		</div>
    	</div>
    	<div class="col-xs-50">
    		<div class="col-xs-15 form-group">
    			Extra
    		</div>
    		<div class="col-xs-15 form-group">
    		<input type="text" name="extra" id="extra" class="text form-control" value="<?=$enqu[0]->extra;?>" />
    		</div>
    		<div class="col-xs-15 form-group">
    		<input type="submit" name="submit" class="btn" value="Update" />
    		</div>
    	</div>
                            </form>
                            <form method="post">
                            <input id="toemail" name="toemail" class="text form-control" type="hidden"  value="<?=$enqu[0]->email;?>" />
                            <input type="submit" name="g_email" class="btn"  value="Genarate Email" /></form>
    	</div>
    	<?PHP
    	}
    	?>
    	
    </div>
</div>