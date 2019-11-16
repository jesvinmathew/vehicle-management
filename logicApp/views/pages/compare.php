<div class="col-xs-30" style="margin-top: 30px; margin-left: 59px;">
    
       <button type="button" class="col-xs-15 btn btn-success v_option" id="car" value="2">Car</button>       
       <button type="button" class="col-xs-15 btn btn-danger v_option" id="bike" value="1">Bike</button>   
    
</div>
<br/>
<div class="col-xs-48 col-xs-offset-1" style="margin-top: 30px; margin-left: 34px;">
<b style="color:#505050; font-size: 20px; ">Compare</b></div>
<div class="col-xs-48 col-xs-offset-1"  style="margin-top: 30px;">

    <div class="col-xs-12 views">
    <div class="col-xs-40 col-xs-offset-2 contents" style="margin-top: 16px;">
            <div class="col-xs-45">
                <img src="../assets/uploads/thumb/new.jpg"> 
                
            </div>
            
        </div>
        <div class="col-xs-40 col-xs-offset-2 contents" style="margin-top: 4px;">
        
        <div class="col-xs-45">
            <select class="col-xs-38 brand1  bike_make tmSelect auto form-control"  style="display:none;">
                    <option value="0">Brand</option>
                   <?php 
                   foreach ($bmake as $res) {
                  
                echo "<option value='$res->id'>$res->content</option>";
               
                 }
                   ?>
               </select>
               <select class="col-xs-38 brand1 car_make tmSelect auto form-control"  >
                    <option value="0">Brand</option>
                    <?php 
                   foreach ($cmake as $res) {
                  
                echo "<option value='$res->id'>$res->content</option>";
               
                 }
                   ?>
               </select>
        </div>
    </div>
        
        <div class="col-xs-40 col-xs-offset-2 contents" style="margin-top: 4px;">
        
        <div class="col-xs-45">
            <select id="model1" class="form-control model" >
                 <option value="">Select model</option>   

            </select>
        </div>
            
    </div>
        <div class="col-xs-40 col-xs-offset-2 contents" style="margin-top: 4px; margin-bottom: 16px;">
        
        <div class="col-xs-45">
            <select id="variant1" class="form-control variant" >
                  <option value="">Select variant</option>  

            </select>
        </div>
    </div>
    </div>

    <div class="col-xs-12 views">
    <div class="col-xs-40 col-xs-offset-2 contents" style="margin-top: 16px;">
            <div class="col-xs-45">
                <img src="../assets/uploads/thumb/new.jpg"> 
                
            </div>
            
        </div>
        <div class="col-xs-40 col-xs-offset-2 contents" style="margin-top: 4px;">
        
        <div class="col-xs-45">
             <select class="col-xs-38 brand2 bike_make tmSelect auto form-control" style="display:none;">
                    <option value="0">Brand</option>
                   <?php 
                   foreach ($bmake as $res) {
                  
                echo "<option value='$res->id'>$res->content</option>";
               
                 }
                   ?>
               </select>
               <select class="col-xs-38 brand2 car_make tmSelect auto form-control" >
                    <option value="0">Brand</option>
                    <?php 
                   foreach ($cmake as $res) {
                  
                echo "<option value='$res->id'>$res->content</option>";
               
                 }
                   ?>
               </select>
        </div>
    </div>
        
        <div class="col-xs-40 col-xs-offset-2 contents" style="margin-top: 4px;">
        
        <div class="col-xs-45">
            <select id="model2" class="form-control model" >
                 <option value="">Select model</option>   

            </select>
        </div>
           
    </div>
        <div class="col-xs-40 col-xs-offset-2 contents" style="margin-top: 4px; margin-bottom: 16px;">
        
        <div class="col-xs-45">
            <select id="variant2" class="form-control variant" >
                  <option value="">Select variant</option>  

            </select>
        </div> 
    </div>
    </div>
    <div class="col-xs-12 views">
    <div class="col-xs-40 col-xs-offset-2 contents" style="margin-top: 16px;">
            <div class="col-xs-45">
                <img src="../assets/uploads/thumb/new.jpg"> 
                
            </div>
            
        </div>
        <div class="col-xs-40 col-xs-offset-2 contents" style="margin-top: 4px;">
        
        <div class="col-xs-45">
             <select class="col-xs-38 brand3 bike_make tmSelect auto form-control"  style="display:none;">
                    <option value="0">Brand</option>
                   <?php 
                   foreach ($bmake as $res) {
                  
                echo "<option value='$res->id'>$res->content</option>";
               
                 }
                   ?>
               </select>
               <select class="col-xs-38 brand3 car_make tmSelect auto form-control"  >
                    <option value="0">Brand</option>
                    <?php 
                   foreach ($cmake as $res) {
                  
                echo "<option value='$res->id'>$res->content</option>";
               
                 }
                   ?>
               </select>
        </div>
    </div>
        
        <div class="col-xs-40 col-xs-offset-2 contents" style="margin-top: 4px;">
        
        <div class="col-xs-45">
            <select id="model3" class="form-control model" >
                 <option value="">Select model</option>   

            </select>
        </div>
           
    </div>
        <div class="col-xs-40 col-xs-offset-2 contents" style="margin-top: 4px; margin-bottom: 16px;">
        
        <div class="col-xs-45">
            <select id="variant3" class="form-control variant" >
                  <option value="">Select variant</option>  

            </select>
        </div>
    </div>
    </div>
    <div class="col-xs-12 views">
    <div class="col-xs-40 col-xs-offset-2 contents" style="margin-top: 16px;">
            <div class="col-xs-45">
                <img src="../assets/uploads/thumb/new.jpg"> 
                
            </div>
            
        </div>
        <div class="col-xs-40 col-xs-offset-2 contents" style="margin-top: 4px;">
        
        <div class="col-xs-45">
             <select class="col-xs-38 brand4  bike_make tmSelect auto form-control"  style="display:none;">
                    <option value="0">Brand</option>
                   <?php 
                   foreach ($bmake as $res) {
                  
                echo "<option value='$res->id'>$res->content</option>";
               
                 }
                   ?>
               </select>
               <select class="col-xs-38 brand4 car_make tmSelect auto form-control" >
                    <option value="0">Brand</option>
                    <?php 
                   foreach ($cmake as $res) {
                  
                echo "<option value='$res->id'>$res->content</option>";
               
                 }
                   ?>
               </select>
        </div>
    </div>
        
        <div class="col-xs-40 col-xs-offset-2 contents" style="margin-top: 4px;">
        
        <div class="col-xs-45">
            <select id="model4" class="form-control model" >
                 <option value="">Select model</option>   

            </select>
        </div>
            
    </div>
        <div class="col-xs-40 col-xs-offset-2 contents" style="margin-top: 4px; margin-bottom: 16px;">
        
        <div class="col-xs-45">
            <select id="variant4" class="form-control variant" >
                  <option value="">Select variant</option>  

            </select>
        </div>
    </div>
    </div>
    
    
</div>
<div class="col-xs-18" style="margin-top: 30px; margin-bottom: 10px; margin-left: 59px;"><button type="button" id="cmp_button" class="btn btn-info btn-lg btn-block cmp_button">compare</button></div>
<div class="col-xs-30" id="aa">


</div>