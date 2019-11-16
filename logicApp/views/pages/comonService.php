<div style="padding-top: 35px; background-color:  gainsboro;"></div>
<div style=" background-color:  gainsboro; border-bottom: 4px  solid brown;" ><center><b style="color:green; font-size: 20px; margin-top: 10px;">Book A Service </b></center><br/>
    <div style="margin-left: 25px; margin-right: 15px;">Please fill in the form as accurately as possible.When you have completed the form, <br/><br/>please press send. The form will clear and we will be in contact as soon as possible.<br/><br/>Please note that this is only a request form, we will contact you with confirmation of your service date and time.<br/><br/></div></div>
<div class="col-xs-30" style="margin-top: 30px; margin-left: 59px;">
    
       <button type="button" class="col-xs-15 btn btn-success v_option" id="car" value="2">Car</button>       
       <button type="button" class="col-xs-15 btn btn-danger v_option" id="bike" value="1">Bike</button>   
    
</div>
<div class="col-xs-40 col-xs-offset-1">
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 ">
            <b style="color:black;">Personal Details</b>
        </div>

    </div>
   
    <br/>
    <br/>
    <div class="col-xs-40 col-xs-offset-2" >
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="name">Contact Name</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="name1" >
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="email">Email Address</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="email1">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="naddress">Address</label>
        </div>
        <div class="col-xs-32 ">
            <input type='text' class="form-control" id="address1">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="city">Town/City</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="city1">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="message">District</label>
        </div>
        <div class="col-xs-32">
            <select id="dist21" class="form-control" >
                <option value=""></option>
                                                  <?PHP
               foreach ($district as $dis) {
                echo "<option value='$dis->place_id'>$dis->placename</option>";
               }
          ?>

            </select>
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="mobile">Contact Telephone</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="mobile1">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="lph">Land No</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="lph">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11" style="color:black;">
            <b>Vehicle Details</b>
        </div>

    </div>
<div class="col-xs-40 col-xs-offset-2 ">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="message">Brand</label>
        </div>
        <div class="col-xs-32">
           <select class="col-xs-38 brand  bike_make tmSelect auto form-control" id="bike_make"  style="display:none;">
                    <option value="0">Brand</option>
                   <?php 
                   foreach ($bmake as $res) {
                  
                echo "<option value='$res->id'>$res->content</option>";
               
                 }
                   ?>
               </select>
                                            <select class="col-xs-38 brand car_make tmSelect auto form-control" id="car_make" >
                    <option value="0">Brand</option>
                    <?php 
                   foreach ($cmake as $res) {
                  
                echo "<option value='$res->id'>$res->content</option>";
               
                 }
                   ?>
               </select>
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2 ">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="message">Model</label>
        </div>
        <div class="col-xs-32">
            <select id="model" class="form-control"  required="required">


            </select>
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2 ">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="message">Variant</label>
        </div>
        <div class="col-xs-32">
            <select id="variant11" class="form-control"  required="required">


            </select>
        </div>
    </div>
    <div class="col-xs-32 free " style="padding-left: 37px;">
        <input type="checkbox" name="absent" id="absent" /><label style="padding-left: 10px;" for="absent">Click the box if your vehicle is not found in the above list</label>
    </div>
    <div class="col-xs-40 col-xs-offset-2 ">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="message">Select a dealer</label>
        </div>
        <div class="col-xs-32">
            <select id="dealer11" class="form-control"  required="required">


            </select>
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="lph">Registration No</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="regno">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="message">Year</label>
        </div>
        <div class="col-xs-32">
            <select name="model_year" class="select required form-control" id="year">
                <option value="" selected="selected">Please select</option>
<?php
$i = date('Y');
while ($i >= 1920) {
    echo '<option value="' . $i . '">' . $i . '</option>';
    $i--;
}
?>
            </select>
        </div>
    </div>
    <div class="col-xs-32 free " style="padding-left: 37px;">
        <input type="checkbox" name="free1" id="free" /><label style="padding-left: 10px;" for="free">Free Service</label>
    </div>
    <div class="col-xs-32 paid" style="padding-left: 37px;">
        <input type="checkbox" name="free1" id="paid" /><label style="padding-left: 10px;" for="paid">Paid Service</label>
    </div>

    <div class="col-xs-40 col-xs-offset-2 km">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="km">Km</label>
        </div>
        <div class="col-xs-32">
            <input type='number' class="form-control" id="km">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="message">Details of work required</label>
        </div>
        <div class="col-xs-32">
            <textarea class="form-control" id="message"></textarea>
        </div>
    </div>
   
            <div class="col-xs-32" style="padding-left: 37px;">
                <input type="checkbox" name="pickup" id="pickup" /><label style="padding-left: 10px;" for="pickup">If you need pick up & drop</label>
            </div>
     
    <div class="col-xs-40 col-xs-offset-2" style="padding:5px; ">
        <div class="col-xs-11 form-group ">
            <label class="name"  style=" line-height: 13px;" for="message">Preferred date for service</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="date">
        </div>

    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="message">Preferred time of day</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="time">
        </div>
    </div>

</div>
<div class="col-xs-40 col-xs-offset-2">
        <input type="checkbox" id="temsconBser" /><label class="name"  style=" line-height: 13px;" for="temsconBser"> Accept the Terms And Condition </label>
    </div>
<div class="clear"></div>
<div class="col-xs-40">
    <button class="btn" id="submitService" type="button">

        Submit

    </button>
</div>
