<div class="bg">
    <div class="content">
        <div class="container" style="">
            <ul>
                <?php
                $display = 'none';
                $formdisplay = 'block';
                $value;
                if (isset($_POST['submitHandler'])) {
                    $value;
                    echo $error;
                    if ($value != '') {
                        $display = 'block';
                    }
                    $formdisplay = 'none';
                    ?>
                    <p><?php echo anchor('#', 'You can Upload Another File for same vehicle without refresh this page');
                    ?></p>
                <?php } ?>
            </ul>
            <div class="col-xs-50 " style="display: <?= $formdisplay ?>;">
                <form method="post">
                    <div class="col-xs-50">
                        <h2 class="mb1">Dealers Information - <?= $this->uri->segment(3); ?> Vehicle</h2>
                    </div>  
                    <div class="col-xs-50 col-sm-20 col-sm-offset-13 ">
                        <div class="alert" style="display:none"></div>
                            <div class="col-xs-50">
                                <select class="select required form-control hidden" name="condition" id="condition">
                                    <?php
                                    if ($this->uri->segment(3) == 'used') {
                                        echo '<option value="1" selected>used</option>';
                                    } else
                                    if ($this->uri->segment(3) == 'new') {
                                        echo '<option value="4" selected>new</option>';
                                    }
                                    ?>
                                </select>
                                <div class="col-xs-18">
                                    <h5>
                                        <label class="name">Vehicle Type:</label>
                                    </h5>
                                </div>
                                <div class="col-xs-30 form-group">

                                    <select class="select required form-control" name="vehicletype" id="vehicletype">
                                        <option value="0">Select Please</option>
                                        <option value="1">Bike</option>
                                        <option value="2">Car</option>                                        
                                    </select>
                                </div>
                            </div>
                        <?php if ($this->uri->segment(3) == "new") {
                            ?>
                            <div class="col-xs-50">
                                <div class="col-xs-18 ">
                                    <h5>
                                        <label class="name">Vehicle Make:</label>
                                    </h5>
                                </div>
                                <div class="col-xs-30 form-group">
                                    <select id="company" class="select required form-control" name="company">
                                        <option value="0" selected="selected">Please Select</option>                                        
                                    </select>
                                </div>
                            </div>   
                            <div class="col-xs-20 pull-right form-group">
                                <div id="companyimage" class="col-xs-50" style="height:100px;background-size: 100%; background-position: top center;display:none">
                                </div>
                            </div>
<?php } ?>
                        <div class="col-xs-50">
                            <div class="col-xs-18">
                                <h5>
                                    <label class="name">Dealer Title</label>
                                </h5>
                            </div>
                            <div class="col-xs-30 form-group">
                                <select class="required form-control" name="adtitle" id="adtitle">
                                    <option value="0" selected="selected">Please Select</option>
                                    <option value="-1">new</option>
                                </select>
                                <div class="input-group hideme">
                                    <div class="col-xs-20 pull-right form-group">
                                        <div id="adtitleimage" class="col-xs-50" style="height:100px;background-size: 100%; background-position: top center;display:none">
                                        </div>
                                    </div>
                                    <span class="col-xs-50">Title</span>
                                    <input class=" form-control " type="text" id="adtitleinput" list="listadtitle" placeholder="add new dealer here"/>
                                    <span class="col-xs-50">Email</span>
                                    <input class="form-control" type="email" id="dealeremail"  placeholder="Enter email here"/>
                                    <span class="col-xs-50">Number</span>
                                    <input class="form-control" type="number" id="dealernumber"  placeholder="Enter phone number here"/>
                                    <span class="col-xs-50">Logo</span>
                                    <input class=" form-control " type="file" id="image" />
                                    <span class="col-xs-50"></span>
                                    <input class="form-control" type="button" id="adddealer" value="Add new"/>

                                </div>
                            </div>
                        </div>
                        <div class="col-xs-50">
                            <div class="col-xs-18">
                                <h5><label class="name">Branch Title</label></h5>
                            </div>
                            <div class="col-xs-30 form-group">
                                <select name="branch" id="branch" class="text required form-control">
                                    <option value="-1">New</option>
                                </select>
                            </div>
                            <div class="col-xs-40 form-group"><input required="required" name='brtitle' id="brtitle" class="text required form-control" type="text" placeholder=""/>
                            </div>
                        </div>
                        <div class="col-xs-50">
                            <div class="col-xs-18 ">
                                <h5 style="margin-top:5px;">
                                    <label class="name">District</label>
                                </h5>
                            </div>
                            <div class="col-xs-30 form-group">
                                <select id="district" class="select form-control">
                                    <option value="0" selected="selected">Please Select</option>
                                    <?php
                                    $onroad_placequery = $this->db->get_where('place', array('type' => 3));
                                    foreach ($onroad_placequery->result() as $rowonroad_place) {
                                        echo '<option  value="' . $rowonroad_place->place_id . '">' . $rowonroad_place->placename .'</option>';
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-xs-50">
                            <div class="col-xs-18">
                                <h5 style="margin-top:5px;">
                                    <label class="name">Town</label></h5>
                            </div>
                            <div class="col-xs-30 form-group">
                                <select name="town" id="town" class="select form-control">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-50">
                            <div class="col-xs-18">
                                <h5>
                                    <label class="name">
                                        Map Code
                                    </label>
                                </h5>
                            </div>
                            <div class="col-xs-30 form-group">
                                <textarea id="map" class="textarea form-control" name="map"></textarea>
                            </div>
                        </div>                        
                        <div class="col-xs-50">
                            <div class="col-xs-18">
                                <h5 style="margin-top:5px;">
                                    <label class="name">Test Drive Ph</label></h5>
                            </div>
                            <div class="col-xs-30 form-group">
                                <input type="number" class="number required form-control" name="salesPh" id="salesPh"/>
                            </div>
                        </div>
                        <div class="col-xs-50">
                            <div class="col-xs-18">
                                <h5 style="margin-top:5px;">
                                    <label class="name">Test Drive Email</label></h5>
                            </div>
                            <div class="col-xs-30 form-group">
                                <input type="email" class="number required form-control" name="salesEmail" id="salesEmail"/>
                            </div>
                        </div>
                        <div class="col-xs-50">
                            <div class="col-xs-18">
                                <h5 style="margin-top:5px;">
                                    <label class="name">Service booking Ph</label></h5>
                            </div>
                            <div class="col-xs-30 form-group">
                                <input type="number" class="number required form-control" name="serPh" id="serPh"/>
                            </div>
                        </div>
                        <div class="col-xs-50">
                            <div class="col-xs-18">
                                <h5 style="margin-top:5px;">
                                    <label class="name">Service booking Email</label></h5>
                            </div>
                            <div class="col-xs-30 form-group">
                                <input type="email" class="number required form-control" name="serEmail" id="serEmail"/>
                            </div>
                        </div>
                        <div class="col-xs-50">
                            <div class="col-xs-18">
                                <h5 style="margin-top:5px;">
                                    <label class="name">Phone</label></h5>
                            </div>
                            <div class="col-xs-30 form-group">
                                <input type="number" class="number required form-control" name="phone1" id="phone1"/>
                            </div>
                        </div>

                        <div class="col-xs-50">
                            <div class="col-xs-18">
                                <h5 style="margin-top:5px;">
                                    <label class="name">Second Phone</label></h5>
                            </div>
                            <div class="col-xs-30 form-group">
                                <input  required="required" type="number" class="number required form-control" name="phone2" id="phone2"/>
                            </div>
                        </div>
                        <div class="col-xs-50">
                            <div class="col-xs-18">
                                <h5 style="margin-top:5px;">
                                    <label class="name">Email</label></h5>
                            </div>
                            <div class="col-xs-30 form-group">
                                <input  required="required" type="email" class="email required form-control" name="email" id="email"/>
                            </div>
                        </div>
                        <div class="col-xs-50">
                            <div class="col-xs-18">
                                <h5>
                                    <label class="name">
                                        Address
                                    </label>
                                </h5>
                            </div>
                            <div class="col-xs-30 form-group">
                                <textarea required="required" id="address" class="required textarea form-control" name="address" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
                            </div>
                        </div>
                        <div class="col-xs-50">
                            <div class="col-xs-18">
                                    <label class="name">
                                        Breakdown Number
                                    </label>
                            </div>
                            <div class="col-xs-30 form-group">
                                <input type="text" class="required textarea form-control" name="rec_number" id="rec_number" placeholder="Brakedown number"/>
                            </div>
                        </div>
                        <div class="col-xs-50">
                        <input type="checkbox" name="certy" id ="certy" >
                        <label>Certyfief dealer ?</label>
                        
									</div>
                             <div class="col-xs-50 certi_deal" style="display:none;">
                             
                             <div class="col-xs-18">
                                    <label class="name">
                                        Certified dealer
                                    </label>
                                    
                            </div>
                            <div class="col-xs-30 form-group">
                                <select name="" id="certi_deal" class="form-control">
                                    <option value="0">Please select</option>
                                    <?php if(isset($cert_dealer)){
                                    foreach($cert_dealer as $res) {
                                    
                                    echo'<option value="'.$res->id.'">'.$res->certifyby.'</option>';
                                    
                                    
                                    
                                    }
                                    
                                    }?>
                                    
                                </select>
                            </div>
                             
                             </div>
                             
                        <div class="col-xs-50">
                            <div class="col-xs-18">
                                    <label class="name">
                                        Priority
                                    </label>
                            </div>
                            <div class="col-xs-30 form-group">
                                <select name="" id="priority" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="0">3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="clear">
                    </div>
                    <div class="grid_12" align="center">
                        <p>
                            <label>&nbsp;</label>
                            <input id="submit" name="submit" type="button" class="btn" value="Add Dealers" />
                            <input id="del_branch" name="del_branch" type="button" class="btn" value="Delete" />
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>