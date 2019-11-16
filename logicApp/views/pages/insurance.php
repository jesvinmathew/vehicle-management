<style>
    #maintab .nav li{
        background-color: rgba(104, 104, 104, 0.77);
        color: #FFFFFF;
        margin-right: 0px;
        padding-top: 0px;
        font-size: 14px;
        float: left;
    }
    #maintab .nav li.active{
        background-color: rgb(62, 110, 165);
        color:#FFFFFF;
    }
    #maintab .nav > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus
    {
        background-color:transparent;

        border:none;

    }
</style>
<script>
    $(function () {
        var calendar = $.calendars.instance('persian');
        $('#expdate').calendarsPicker({calendar: calendar});
        $('#regdate').calendarsPicker({calendar: calendar});
        $('#inlineDatepicker').calendarsPicker({calendar: calendar});
    });
</script>
<div class="bg">
    <div class="container">
        <div class="row-fluid">
            <div class="col-xs-50">
                <h2>Apply Insurance</h2>
                <div class="col-xs-30">
                    <form class="blocks" method="post" id="form" action="<?= site_url('insurance/buyinsuranse'); ?>">                        
                        
                        <div class="col-xs-45 erdisplay " id="nametop">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="name">Name</label>
                            </div>
                            <div class="col-xs-32">
                                <input type="text" name="name" id="name" required class="text form-control">
                                <div class="ermsgname" id="nameError"></div>
                            </div>
                        </div>
                        <div class="col-xs-45 erdisplay" id="emailtop">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="email">Email</label>
                            </div>
                            <div class="col-xs-32">
                                <input type="email" name="email" id="email" required class="email form-control">
                                <div class="ermsgemail" id="nameError"></div>
                            </div>
                        </div>
                        <div class="col-xs-45 erdisplay" id="phtop">
                                <div class="col-xs-15 form-group">
                                    <label class="name"  style=" line-height: 13px;" for="ph">Mobile Number</label>
                                </div>
                                <div class="col-xs-5">
                                    <input type="tel" name="cuCod" id="cuCod" required class="number form-control" value="+91">
                                </div>
                                <div class="col-xs-27">
                                    <input type="tel" name="ph" id="ph" required class="number form-control">
                                    <div class="ermsgph" id="nameError"></div>
                                </div>
                            </div>
                            <div class="col-xs-45 erdisplay" id="lndtop">
                                <div class="col-xs-15 form-group">
                                    <label class="name"  style=" line-height: 13px;" for="lnd">Land Number</label>
                                </div>
                                <div class="col-xs-12">
                                    <input type="tel" name="std" id="std" required class="number form-control">
                                </div>
                                <div class="col-xs-20">
                                    <input type="tel" name="lnd" id="lnd" required class="number form-control">
                                </div>
                                    <div class="ermsglnd" id="nameError"></div>
                            </div>
                        <div class="col-xs-45 erdisplay" id="vehicleTypetop">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="vehicleType">Vehicle Type</label>
                            </div>
                            <div class="col-xs-32">
                                <select name="vehicleType" class="select tmSelect auto form-control" id="vehicleType"  data-class="tmSelect tmSelect2" data-constraints="">
                                    <option value="">Select</option>
                                    <option value="1">Bike</option>
                                    <option value="2">Private Car</option>
                                    <option value="3">Taxi Car</option>
                                </select>
                                <div class="ermsgvehicleType" id="nameError"></div>
                            </div>
                        </div>
                        <div class="col-xs-45 userhave " id="maketop">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="make">Make</label>
                            </div>
                            <div class="col-xs-32">
                                <select name="make" class=" select tmSelect auto form-control" id="make" data-class="tmSelect tmSelect2" data-constraints="">
                                    <option value="">Select Make</option>                    
                                </select>
                                <div class="ermsgmake" id="nameError"></div>
                            </div>
                        </div>
                        <div class="col-xs-45 userhave " id="modeltop">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="model">Model</label>
                            </div>
                            <div class="col-xs-32">
                                <select name="model" class="select tmSelect auto form-control" id="model" data-class="tmSelect tmSelect2" data-constraints="" >
                                    <option value="">Model</option>
                                </select>
                                <div class="ermsgmodel" id="nameError"></div>
                            </div>
                        </div>
                        <div class="col-xs-45 userhave "  id="varianttop">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="variant">Variant</label>
                            </div>
                            <div class="col-xs-32">
                                <select name="variant" class="select tmSelect auto form-control" id="variant" data-class="tmSelect tmSelect2" data-constraints="" >
                                    <option value="">Select Variant</option>
                                </select>
                                <div class="ermsgvariant" id="nameError"></div>
                            </div>
                        </div>
                        <div class="col-xs-45 uservehi" id="usermaketop">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="Make">Make</label>
                            </div>
                            <div class="col-xs-32">
                                <input type="text" class="number form-control"  name="newmake" id="newmake" placeholder="Make"> 
                                <div class="ermsgnewmake" id="nameError"></div>
                            </div>
                        </div>
                        <div class="col-xs-45 uservehi" id="usermodeltop">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="Model">Model</label>
                            </div>
                            <div class="col-xs-32">
                                <input type="text" class="number form-control"  name="newmodel" id="newmodel" placeholder="Model"> 
                                <div class="ermsgnewmodel" id="nameError"></div>
                            </div>
                        </div>
                        <div class="col-xs-45 uservehi" id="uservarianttop">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="variant">Variant</label>
                            </div>
                            <div class="col-xs-32">
                                <input type="text" class="number form-control"  name="newvariant" id="newvariant" placeholder="Variant"> 
                                <div class="ermsgnewvariant" id="nameError"></div>
                            </div>
                        </div>
                        <div class="col-xs-50 " id="userchk">
                            <input type="checkbox"  class="checkbox_check" value="1" name="userchkd" id="userchkd" > 
                            <label><font color="red">Click the box if your vehicle is not found in the above list</font></label><br>
                        </div>
                        <div class="col-xs-45 erdisplay" id="modYeartop">
                            <div class="col-xs-15 form- group">
                                <label class="name"  style="line-height: 13px;" for="variant">Year of Make</label>
                            </div>
                            <div class="col-xs-32">
                                <input type="number" class="number form-control"  name="modYear" id="modYear" placeholder="Year of make"> 
                                <div class="ermsgmodYear" id="nameError"></div>
                            </div>
                        </div>
                        <div class="col-xs-45 erdisplay" id="regnotop">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="regno">Registration Number</label>
                            </div>
                            <div class="col-xs-32">
                                <input type="text" class="number form-control"  name="regno" id="regno" placeholder="Registration No"> 
                                <div class="ermsgregno" id="nameError"></div>
                            </div>
                        </div>
                        <div class="col-xs-45 erdisplay" id="regdatetop">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="date">Registration Date</label>
                            </div>
                            <div class="col-xs-32">
                                <input type='text' class="date form-control" value="<?= date('Y/m/d'); ?>" name="regdate" id="regdate" data-date-format="YYYY/MM/DD"/>
                                <div class="ermsgregdate" id="nameError"></div>
                            </div>
                        </div>
                        <div class="col-xs-45 erdisplay" id="expdatetop">
                            <div class="col-xs-15 form-group">
                                <label class="name"  style=" line-height: 13px;" for="date">Current Policy validity Date</label>
                            </div>
                            <div class="col-xs-32">
                                <input type='text' class="date form-control" value="<?= date('Y/m/d'); ?>" name="expdate" id="expdate" data-date-format="YYYY/MM/DD"/>
                                <div class="ermsgexpdate" id="nameError"></div>
                            </div>
                        </div>
                        <input id="formid" name="formid" type="hidden"  value="" />
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
                            <div class="col-xs-5"></div>
                            <div class="col-xs-10">
                                <input type="button" class="btn action" id="calculate" value="Calculate">
                            </div>
                            <div class="col-xs-10"></div>
                            <div class="col-xs-10">
                            	<input type="button" class="btn action" id="buy" value="go for insurance">
                            </div>
                        </div>
                        <div class="col-xs-43">
                            <br>
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

                        </div>
                    </form>
                </div>
                <div class="col-xs-20">
                    <br> <?PHP 
            
              $this->db->where_in('loc', array('106', '107'));
              $this->db->order_by('loc', 'ASC');
              $add = $this->db->get('add')->result();
              foreach($add as $ad){
              if(isset($ad->img_path1)){
                        ?>
        <a href="<?=$ad->link;?>"><img src="<?= IMAGES_PATH . "advertisement/" . $ad->img_path1; ?>" style="margin: 20px 0 20px 0"/></a>
          <?php }
                     }
                ?>
                </div>
            </div>
        </div> 
    </div>
</div>