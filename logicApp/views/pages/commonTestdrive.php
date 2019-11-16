<div style="padding-top: 35px; background-color:  gainsboro;"></div>
<div style=" background-color:  gainsboro; border-bottom: 4px  solid brown;" ><center><b style="color:green; font-size: 20px; margin-top: 10px;">Book A Test-Drive</b></center><br/>
    <div style="margin-left: 25px; margin-right: 15px;">Please fill in the form as accurately as possible.When you have completed the form, <br/><br/>please press send. The form will clear and we will be in contact as soon as possible.<br/><br/></div></div>
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
            <input type='text' class="form-control" id="names" >
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="email">Email Address</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="emails">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="address">Address Line 1</label>
        </div>
        <div class="col-xs-32 ">
            <input type='text' class="form-control" id="addresss">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="address2">Address Line 2</label>
        </div>
        <div class="col-xs-32 ">
            <input type='text' class="form-control" id="add2">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="city">Town/City</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="city">
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
            <label class="name"  style=" line-height: 13px;" for="pin">Pin code</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="pin">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="mobile">Mobile No</label>
        </div>
        <div class="col-xs-32">
            <input type='number' class="form-control" id="mobile">
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
            <b>Test Drive Details</b>
        </div>

    </div>

    <div class="col-xs-40 col-xs-offset-2 brand">
            <div class="col-xs-11 form-group">
                <label class="name"  style=" line-height: 13px;" for="message">Brand</label>
            </div>
            <div class="col-xs-32">
                 <select class="col-xs-38 brand  bike_make tmSelect auto form-control" id="bike_make"  style="display:none;">
                   
                   <?php 
                   foreach ($bmake as $res) {
                  
                echo "<option value='$res->id'>$res->content</option>";
               
                 }
                   ?>
               </select>
                                            <select class="col-xs-38 brand car_make tmSelect auto form-control" id="car_make" >
                  
                    <?php 
                   foreach ($cmake as $res) {
                  
                echo "<option value='$res->id'>$res->content</option>";
               
                 }
                   ?>
               </select>
            </div>
        </div>
        <div class="col-xs-40 col-xs-offset-2 model">
            <div class="col-xs-11 form-group">
                <label class="name"  style=" line-height: 13px;" for="message">Model</label>
            </div>
            <div class="col-xs-32">
                <select id="model" class="form-control"  required="required">
       </select>
            </div>
        </div>

        <div class="col-xs-40 col-xs-offset-2 variant">
            <div class="col-xs-11 form-group">
                <label class="name"  style=" line-height: 13px;" for="message">Variant</label>
            </div>
            <div class="col-xs-32">
                <select id="variant" class="form-control"  required="required">
                </select>
            </div>
        </div>

<div class="col-xs-40 col-xs-offset-2">
            <div class="col-xs-11 form-group">
                <label class="name"  style=" line-height: 13px;" for="message">Select a dealer</label>
            </div>
            <div class="col-xs-32">
                <select id="dealer11" class="form-control">
                </select>
            </div>
        </div>

    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="message">Preferred date for viewing</label>
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
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="message">Anything to add?</label>
        </div>
        <div class="col-xs-32">
            <textarea class="form-control" id="message"></textarea>
        </div>
    </div>
        
</div>
    <div class="col-xs-40 col-xs-offset-2">
        <input type="checkbox" id="temscon" /> <label class="name"  style=" line-height: 13px;" for="temscon"> Accept The Terms And Condition </label>
    </div>
<div class="clear"></div>
<div class="col-xs-40 col-xs-offset-2">
    <button class="btn" id="submitTestDricve" type="button">
        Submit
    </button>
</div>