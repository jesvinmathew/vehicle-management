<div class="clearfix"></div>
<div class="col-xs-30" style="margin-top: 30px; margin-left: 59px;">
    
       <button type="button" class="col-xs-15 btn btn-success v_option" id="car" value="2">Car</button>       
       <button type="button" class="col-xs-15 btn btn-danger v_option" id="bike" value="1">Bike</button>   
    
</div>
<div class="price" id="price" >
                       <div class="col-xs-48 col-xs-offset-1" id="formPrice" style="margin-top: 30px;">
                            <div class="col-xs-49">
                                <div class="col-xs-24">
                                    <div class="col-xs-50">
                                        <div class="col-xs-10 form-group">
                                            <label class="name">Name</label>
                                        </div>	
                                        <div class="col-xs-34">
                                            <input class="text form-control"  type="text" id="name" name="name" placeholder="Contact Name" required="required" />
                                        </div>	
                                    </div>
                                    <div class="col-xs-50" >
                                        <div class="col-xs-10 form-group">
                                            <label class="name">Phone</label>
                                        </div>	
                                        <div class="col-xs-34">     
                                            <input class="number form-control" type="text"  id="phone" name="phone" placeholder="Contact Phone Number" required="required" />

                                        </div>  
                                    </div>
                                    <div class="col-xs-50">
                                        <div class="col-xs-10 form-group">
                                            <label class="name" for="email">Brand:</label>
                                        </div>	
                                        <div class="col-xs-34">   
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
                                    <div class="col-xs-50">
                                        <div class="col-xs-10 form-group">
                                            <label class="name" for="email">Model:</label>
                                        </div>	
                                        <div class="col-xs-34">   
                                            <select id="model" class="form-control" >
                                                <option value="">None</option>
                                                
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-xs-50">
                                        <div class="col-xs-10 form-group">
                                            <label class="name" for="email">Variant:</label>
                                        </div>	
                                        <div class="col-xs-34">   
                                            <select id="variant" class="form-control" >
                                                <option value="">None</option>
                                                
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-xs-50">
                                        <div class="col-xs-10 form-group">
                                            <label class="name" for="email">Dealer:</label>
                                        </div>	
                                        <div class="col-xs-34">   
                                            <select id="dealer" class="form-control" >
                                                <option value="">None</option>
                                                
                                            </select>
                                            
                                        </div>  
                                    </div>
                                    <div class="col-xs-50" >
                                        <div class="col-xs-10">     
                                            <input  type="checkbox"  id="prtdrive" name="tdrive"  />
                                        </div>
                                        <div class="col-xs-19">
                                            Need Test Drive?
                                        </div>
                                    </div>
                                    <div class="col-xs-50">
                                        <div class="col-xs-10">     
                                            <input  type=checkbox  id="prloan" name="loan"  />
                                        </div> 
                                        <div class="col-xs-19">
                                            Need Loan?
                                        </div>
                                    </div>
                                    <div class="col-xs-50">
                                        <div class="col-xs-10">
                                            <input type="checkbox" id="prtems2" />
                                        </div>
                                        <label class="name" class="col-xs-25" for="tems2"> Accept the Terms And Condition </label>
                                    </div>
                                    

                                </div>
                                <div class="col-xs-24">
                                    <div class="col-xs-50">

                                        <div class="col-xs-10 form-group">
                                            <label class="name" for="premail">email:</label>
                                        </div>	
                                        <div class="col-xs-34">   
                                            <input placeholder="Enter Your User Name"   id="email" name="email" class="text form-control" type="email" required="required" />

                                        </div>  
                                    </div>
                                    <div class="col-xs-50">

                                        <div class="col-xs-10 form-group">
                                            <label class="name" for="prmsg">message:</label>
                                        </div>	
                                        <div class="col-xs-34">   
                                            <textarea  id="msg" class="text form-control"  required="required" ></textarea>

                                        </div>  
                                    </div>
                                    <div class="clearfix" style="padding: 7px;"></div>
                                    <div class="col-xs-50">
                                        <div class="col-xs-10 form-group">
                                            <label class="name" for="prdist">District:</label>
                                        </div>	
                                        <div class="col-xs-34">   
                                            <select id="dist" class="form-control" >
                                                <option value="0">None</option>
                                                 <?PHP
               foreach ($district as $dis) {
                echo "<option value='$dis->place_id'>$dis->placename</option>";
               }
          ?>
                                            </select>

                                        </div>  
                                    </div>
                                    <div class="col-xs-50" style="display: none;" id="needTestAddDiv">
                                        <div class="col-xs-10 form-group">
                                            <label class="name" for="prdist">Address:</label>
                                        </div>	
                                        <div class="col-xs-34">   
                                            <textarea id="address" class="text form-control"></textarea>
                                        </div>  
                                    </div>
                                </div>
<div class="col-xs-50">
<div class="col-xs-12 form-group">
                                            <label>&nbsp;</label>
                                            <input type="button" id="submitPrice" class="btn" value="Send" />
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>