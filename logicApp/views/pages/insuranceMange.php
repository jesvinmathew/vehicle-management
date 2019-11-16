<div class="bg">
    <div class="container">
        <div class="row-fluid">
            <div class="col-xs-50">
                <h2>Apply insurance</h2>
                <div class="col-xs-30">
                    <form class="blocks" method="post" id="form">                        
                        <center><p style="color:black">* all fields are mandatory</p></center>
                        <?PHP
                        $ses=$this->session->userdata('keralaonroads');
                        if(empty($ses)){
                        ?>
                        <div class="col-xs-45">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="name">Name</label>
                            </div>
                            <div class="col-xs-32">
                                <input type="text" name="name" id="name" required class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-45">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="email">Email</label>
                            </div>
                            <div class="col-xs-32">
                                <input type="email" name="email" id="email" required class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-45">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="ph">Contact Number</label>
                            </div>
                            <div class="col-xs-32">
                                <input type="number" name="ph" id="ph" required class="form-control">
                            </div>
                        </div>
                        <?PHP
                        }
                        ?>
                        <div class="col-xs-45">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="vehicleType">Vehicle type</label>
                            </div>
                            <div class="col-xs-32">
                                <select name="type" class="tmSelect auto form-control" id="vehicleType" data-class="tmSelect tmSelect2" data-constraints="">
                                    <option value="">Select</option>
                                    <option value="1">Bike</option>
                                    <option value="2">Private Car</option>
                                    <option value="3">Taxi Car</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-45">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="make">Make</label>
                            </div>
                            <div class="col-xs-32">
                                <select name="type" class="tmSelect auto form-control" id="make" data-class="tmSelect tmSelect2" data-constraints="">
                                    <option value="">Select Make</option>                    
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-45">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="model">Model</label>
                            </div>
                            <div class="col-xs-32">
                                <select name="type" class="tmSelect auto form-control" id="model" data-class="tmSelect tmSelect2" data-constraints="" >
                                    <option value="">Model</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-45">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="variant">Variant</label>
                            </div>
                            <div class="col-xs-32">
                                <select name="type" class="tmSelect auto form-control" id="variant" data-class="tmSelect tmSelect2" data-constraints="" >
                                    <option value="">Select Variant</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-45">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="date">Registration Date</label>
                            </div>
                            <div class="col-xs-32">
                                    <div class='input-group date datetimepicker1'>
                                        <input type='date' class="form-control" id="datepicker" data-date-format="YYYY/MM/DD"/>
					<span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
					</span>
                                    </div>
                            </div>
                        </div>
                        <div class="col-xs-45">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="date">Current Policy validity Date</label>
                            </div>
                            <div class="col-xs-32">
                                    <div class='input-group date datetimepicker1'>
                                        <input type='date' class="form-control" id="expdate" data-date-format="YYYY/MM/DD"/>
					<span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
					</span>
                                    </div>
                            </div>
                        </div>
                        <div class="col-xs-50">
                            <input type="checkbox" id="ncb" name="ncb" title="I / We declare that the rate of NCB claimed by me/us is correct and

that no claim has arisen in the expiring policy period . I/we further

confirm that the proof of NCB availed will be submitted at the time of

any claim reported under the Policy. I/We further undertake that if

this declaration is found to be incorrect, all benefits under the policy

in respect of Section I of the Policy will stand forfeited."> <label title="I / We declare that the rate of NCB claimed by me/us is correct and

that no claim has arisen in the expiring policy period . I/we further

confirm that the proof of NCB availed will be submitted at the time of

any claim reported under the Policy. I/We further undertake that if

this declaration is found to be incorrect, all benefits under the policy

in respect of Section I of the Policy will stand forfeited.">I /We Accept No Claim Bonus Declaration</label>
                        </div>
                        <div class="col-xs-45">
                            <div class="col-xs-38"><br /></div>
                            <div class="col-xs-10">
                                <input type="submit" class="btn" id="calculate" value="Calculate"></div>
                        </div>
                    </form>
                </div>
                <div class="col-xs-20">
                    <br> <img src="<?= IMAGES_PATH . "/addinsurance1.png"; ?>"/>
                    <div class="col-xs-50">
                        <br>
                        <table width="100%" border="1" style="border-radius: 5px; border: solid 1px;">
                            <tr>
                                <th colspan="2" style="padding: 10px;"> Insurance Amount</th>
                            </tr>
                            <tr>
                                <th width='50%' style="padding: 10px;">Third Party</th>
                                <td id="bajtp" style="padding: 10px;"></td>
                            </tr>
                            <tr>
                                <th style="padding: 10px;">Normal</th>
                                <td id="bajnor" style="padding: 10px;"  ></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
        </div> 
    </div>
</div>