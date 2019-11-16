<div class="bg">
    <div class="container">
        <div class="row-fluid">

            <div class="col-xs-50">
                <h2>insurance-manage</h2>

                <form class="blocks" method="post" id="form">                           
                    <center><p style="color:black">* all fields are mandatory</p></center>
                    <div class="col-xs-15">
                        <div class="col-xs-16 form-group">
                            <label class="name"  style=" line-height: 13px;" for="vehicleType">Vehicle type</label>
                        </div>
                        <div class="col-xs-32">
                            <select name="vehicleType" class="tmSelect auto form-control" id="vehicleType" data-class="tmSelect tmSelect2" data-constraints="">
                                <option value="">Select</option>
                                <option value="1">Bike</option>
                                <option value="2">Car</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-xs-15">
                        <div class="col-xs-16 form-group">
                            <label class="name"  style=" line-height: 13px;" for="make">Make</label>
                        </div>
                        <div class="col-xs-32">
                            <select name="make" class="tmSelect auto form-control" id="make" data-class="tmSelect tmSelect2" data-constraints="">
                                <option value="">Select Make</option>                    
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-15">
                        <div class="col-xs-16 form-group">
                            <label class="name"  style=" line-height: 13px;" for="model">Model</label>
                        </div>
                        <div class="col-xs-32">
                            <select name="model" class="tmSelect auto form-control" id="model" data-class="tmSelect tmSelect2" data-constraints="" >
                                <option value="">Model</option>
                            </select>
                        </div><input type="submit" id="submit" value="Update">

                    </div>

                    <div class="col-xs-50" style="overflow: auto;">
                        <table id="variant">    
                        </table>
                    </div> 
                    
                </form>
            </div>
        </div> 
    </div>
</div>