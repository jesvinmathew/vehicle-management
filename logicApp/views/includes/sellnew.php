<script type = "text/javascript">
$(document).ready(function() {
    getdata('getcompany',$('#vehicletype').val(),0);
    
    function getdata(path,value1,value2)
    { 
       
        var postData={};
        postData.value1=value1;
        postData.value2=value2;
     $.ajax({
        url:"<?PHP echo site_url('json');?>/"+path,
        type:'post',
        dataType:'json',
        data:postData
    }).done(function(data){
        var i=0;
        while(i<data.i)
        {
            i++;
        $('#'+data.ids).append('<option value="'+data.id[i]+'">'+data.content[i]+'</option>');
    }
    })
    }
    $('#vehicletype').blur(function(){
   
    if($('#vehicletype').val()!=0)
    {
         $('#company').html('');
    $('#model').html('');
    $('#variant').html('');
        getdata('getcompany',$(this).val(),0);
    }
    })
    $('#company').blur(function(){
        
    if($(this).val()!=0)
    {
        
    $('#model').html('');
    $('#variant').html('');
        getdata('getmodel',$(this).val(),0);
    }
    })
    $('#model').blur(function(){
       
    if($(this).val()!=0)
    {
         
    $('#variant').html('');
        getdata('getvariant',$(this).val(),0);
    }
    })
    

	   $('#submitHandler').click(function(){
	       $(this).text('Uploading please wait')
	   })
	   console.log('jquery ok');
       $('#sendinformation').attr('type','button');
      
    
    	var postData = {};
      
      
                      $.extend({}, postData);
                      
		var error = {};
        $('.required').blur(function(){
            	var variable = $(this).attr('id');
            	if ($(this).val().length <= 0) {
				$(this).parent('div').children('.alert').remove();
				$(this).parent('div').append('<div class="alert">This field is required</div>').children('.alert').css('background-color','red');
   	            error[variable] = true;
                $.extend({}, error);

			} else {
				$(this).parent('div').children('.alert').css('background-color','green').text('Its Ok').fadeOut(3000);
				postData[variable] = $(this).val();
                $.extend({}, postData);
                error[variable] = false;
                $.extend({}, error);
                
                
			}
        })
        
	 $('.select').change(function(){
console.log($(this).val());
			if ($(this).val() <= 99) {
				$(this).parent('div').children('.alert').remove();
				$(this).parent('div').append('<div class="alert">This field is required</div>').children('.alert').css('background-color','red');
                 error[variable] = true;
                $.extend({}, error);

			} else {
				$(this).parent('div').children('.alert').css('background-color','green').text('Its Ok').fadeOut(3000);
				var variable = $(this).attr('id');
				postData[variable] = $(this).val();
                $.extend({}, postData);
                error[variable] = false;
                $.extend({}, error);
                
                
			}
		
		})
         $('.number').change(function(){
			if ($(this).val() <= 0) {
				$(this).parent('div').children('.alert').remove();
				$(this).parent('div').append('<div class="alert">This field is required</div>').children('.alert').css('background-color','red');
                 error[variable] = true;
                $.extend({}, error);

			} else {
				$(this).parent('div').children('.alert').css('background-color','green').text('Its Ok').fadeOut(3000);
				var variable = $(this).attr('id');
				postData[variable] = $(this).val();
                $.extend({}, postData);
                error[variable] = false;
                $.extend({}, error);
                
                
			}
            	if ( $(this).val() <= 0) {
				$(this).parent('div').children('.alert').remove();
				$(this).parent('div').append('<div class="alert">This field is required</div>').children('.alert').css('background-color','red');
                 error[variable] = true;
                $.extend({}, error);

			} else {
				$(this).parent('div').children('.alert').css('background-color','green').text('Its Ok').fadeOut(3000);
				var variable = $(this).attr('id');
				postData[variable] = $(this).val();
                $.extend({}, postData);
                error[variable] = false;
                $.extend({}, error);
                
                
			}
		
		})
        	$('#sendinformation').click(function() {
        	    $.ajax({
        url:"<?= base_url() ?>json/addnew",
        type:'post',
        dataType:'json',
        data:postData
    }).done(function(data){
			if(data.error==true)
            {
                $('#'+data.id).parent('div').append('<div class="alert">'+data.message+'</div>').children('.alert').css('background-color','red');
            }
            else
            if(data.error==false)
            {
                $('#sendinformation').val(data.message).attr('id','uploadimage');
                $('#vehicleimage').fadeIn(3000);
            $('#upload_id').val(data.id);
                   $("html, body").animate({ scrollTop: 0 }, 5000);
            }
            
				});
			})
	});
	
	</script>
        <div class="col-xs-64">
      



<ul>

<?php 
$display='none';
$formdisplay='block';
 $value;
if (isset($_POST['submitHandler']))
            {
                $value;
             echo $error;
             if($value!='')
             {
             $display='block';
             
             }
             $formdisplay='none';
?>
<p><?php echo anchor('#', 'You can Upload Another File for same vehicle without refresh this page'); ?></p>
<?php
}
 ?>
</ul>




        	<div class="row" id="vehicleimage" style="display: <?=$display?>;">

				<div class="grid_12">

					<h2>

						Post Your Vehicle Images Here

					</h2>

				</div>

				<div class="grid_12 content" style="background:#d4ecff; padding-top:25px;">

					<div class="grid_7 bg111" >

						<div class="grid_3 alpha"  style="display: none;">

							<div id="dragAndDropFiles" class="uploadArea">

								<h1>

									Drag & Drop Images Here

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


						<form method="post" name="demoFiler" id="demoFiler" enctype="multipart/form-data" action="/upload/do_upload_new">

                        <input id="upload_id" name="upload_id" type="hidden" value="<?=$value?>" />

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

			</div>
            <div class="col-xs-50 " style="display: <?=$formdisplay?>;">
                <form method="post" action="<?=base_url()?>welcome/usedCarsSell">
                <div class="col-xs-50">
                    <h2 class="mb1">Vehicle Information	</h2>
		</div>
                   
		<div class="col-xs-50 col-sm-25">
                     <div class="col-xs-50">
                    <div class="col-xs-20">
                        <h5><label class="name">Your New vehicle Title</label></h5>
                    </div>
                    <div class="col-xs-26"><input required="required" name='adtitle' id="adtitle" class="text required form-control" type="text" placeholder=""/>
                    </div>
                     </div>
                     <div class="col-xs-50">
                    <div class="col-xs-20">
                        <h5 style="margin-top:5px;">
                            <label class="name">vehicle type</label>
                        </h5>
                    </div>
                    <div class="col-xs-26">
                        <select class="select required form-control" name="vehicletype" id="vehicletype">
                            	
                              <?php if ($this->uri->segment(3) == 'bike')
{
    echo '<option value="1" selected>Bike</option>';
}
else
if ($this->uri->segment(3) == 'car')
{
    echo '<option value="2" selected>Car</option>';
} else
{ ?>
 			<option value="0">Please Select</option>
			 <option value="1">Bike</option>
			 <option value="2">Car</option>
 	<?php } ?> 
                        </select>
                    </div>
                     </div>
                     <div class="col-xs-50">
                    <div class="col-xs-20">
                        <h5 style="margin-top:5px;">
                            <label class="name">Vehicle Make</label>
                        </h5>
                    </div>
                    <div class="col-xs-26">
                        <select id="company" class="select required form-control" name="company">
                            <option value="0" selected="selected">Please Select</option>
                           
                        </select>
                    </div> </div>
                     <div class="col-xs-50">
                    <div class="col-xs-20">
                        <h5 style="margin-top:5px;">
                            <label class="name">Vehicle Option</label>
                        </h5>
                    </div>
                    <div class="col-xs-26">
                        <select class="select required form-control" name="model" id="model">
                            <option value="0" selected="selected">Please Select</option>
                            
                        </select>
                    </div>
                     </div>
                     <div class="col-xs-50">
                     <div class="col-xs-20">
                        <h5 style="margin-top:5px;">
                            <label class="name">variant type</label>
                        </h5>
                    </div>
                    <div class="col-xs-26">
                        <select class="select required form-control" name="variant" id="variant">
                            	<option value="0">Please Select</option>
                               
                        </select>
                    </div>
                     </div>
                     
                           
                     
                    
                    
                </div>
                <div class="col-xs-50 col-sm-25">
                    <div class="col-xs-50">
                    <div class="col-xs-20">
                        <h5 style="margin-top:5px;">
                            <label class="name">Price(INR)</label>
                        </h5>
                    </div>
                    <div class="col-xs-26">
                        <input class="number required form-control" list="places" name="place_id" id="inr" style="padding-left: 30px;"/>
                        
                    </div>
                          </div>
                     
				<div class="col-xs-50">
                    <div class="col-xs-20">
                        <h5 style="margin-top:5px;">
                            <label class="name">Colors</label></h5>
                    </div>
                    <div class="col-xs-26">
                        <input  required="required" type="text" class="text required form-control" name="color_id" id="color"/>
                    </div>
                     </div>
                   
                    <div class="col-xs-50">
                    <div class="col-xs-20">
						<h5>
							<label class="name">
								Vehicle description
							</label>
						</h5>
					</div>
					<div class="col-xs-26">
                                            <textarea required="required" id="textarea" class="required textarea form-control" name="discription" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
					</div>
                    </div>
                    
                    
                    
				</div>
			
			
			<div class="clear">
			</div>
			<div class="grid_12" align="center">
                            <p>
                                <label>&nbsp;</label>
                                <input id="sendinformation" name="sendinformation" type="submit" class="btn" value="Add Vehicle" />
                            </p>
                        </div>
                </form>
            </div>
		</div>
