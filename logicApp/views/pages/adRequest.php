
<div class="col-xs-48 col-xs-offset-1">
    <div class="col-xs-49">
        <?=isset($msg)?"<center><h4 class='mb1'>$msg</h4></center>":"";?>
        <center><h2 class="mb1">Advertise with Us</h2></center>
        <div class="col-xs-24">
            <form class="blocks" method="post" id="form">
                <div class="col-xs-50">
                    <div class="col-xs-10 form-group">
                        <label class="name">Name</label>
                    </div>	
                    <div class="col-xs-34">
                        <input class="text form-control"  type="text" id="name" name="name" placeholder="Contact Name" required="required" />
                    </div>	
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-10 form-group">
                        <label class="name">Phone</label>
                    </div>	
                    <div class="col-xs-34">     
                        <input class="text form-control" type="text"  id="phone" name="phone" placeholder="Contact Phone Number" required="required" />

                    </div>  
                </div>
                <div class="col-xs-50">

                    <div class="col-xs-10 form-group">
                        <label class="name" for="email">Email:</label>
                    </div>	
                    <div class="col-xs-34">   
                        <input placeholder="Enter Your User Name"   id="email" name="email" class="text form-control" type="email" required="required" />

                    </div>  
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-10 form-group">
                        <label class="name" for="msg">Message:</label>
                    </div>
                    <div class="col-xs-34">
                        <textarea class="text form-control"  id="message" name="message" required="required"></textarea>
                    </div>
                </div>
                <div class="col-xs-50">

                    <div class="col-xs-12 form-group">
                        <label>&nbsp;</label>
                        <input type="submit"   class="btn" value="Send" />
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xs-24" id="details">
            
        </div>
    </div>
</div>