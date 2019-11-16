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
<div class="bg">
    <div class="container">
        <div class="row-fluid">
            <div class="col-xs-50">
                <h2>Buy Insurance</h2>
                <div class="col-xs-50">
                    <form class="blocks" enctype="multipart/form-data" method="post" id="form" action="<?= site_url('insurance/buyinsuranseInsert'); ?>">
                        <div class="col-xs-45">
                            <div class="col-xs-50">
                                <div class="col-xs-10 form-group">
                                    Name: 
                                </div>
                                <div class="col-xs-15">
                                    <b><?= $this->input->post('name'); ?></b>
                                </div>
                                <div class="col-xs-10 form-group">
                                    Email:
                                </div>
                                <div class="col-xs-15">
                                    <b><?= $this->input->post('email'); ?></b>
                                </div>
                            </div>
                            <div class="col-xs-50">
                                <div class="col-xs-10 form-group">
                                    Contact Number  :
                                </div>
                                <div class="col-xs-15">
                                    <b><?= $this->input->post('ph'); ?></b>
                                </div>
                                <div class="col-xs-10 form-group">
                                    Vehicle Type  :
                                </div>
                                <div class="col-xs-15">
                                    <b><?php
                                        if ($this->input->post('vehicleType') == 1) {
                                            echo 'bike';
                                        } elseif ($this->input->post('vehicleType') == 2) {
                                            echo'Private Car';
                                        } else
                                            echo 'Taxi Car';
                                        ?></b>
                                </div>
                            </div>
                            <?PHP
                            if (!isset($_POST['userchkd'])) {
                                ?>
                                <div class="col-xs-50">
                                    <div class="col-xs-10 form-group">
                                        Make :
                                    </div>
                                    <div class="col-xs-15">
                                        <b><?= $make[0]->companyname; ?></b>
                                    </div>
                                    <div class="col-xs-10 form-group">
                                        Model  :
                                    </div>
                                    <div class="col-xs-15">
                                        <b><?= $model[0]->model_name; ?></b>
                                    </div>
                                </div>
                                <div class="col-xs-50">
                                    <div class="col-xs-10 form-group">
                                        Variant  :
                                    </div>
                                    <div class="col-xs-15">
                                        <b><?= $var[0]->var_name; ?></b>
                                    </div>
                                    <?PHP
                                } else {
                                    ?>
                                    <div class="col-xs-50">
                                        <div class="col-xs-10 form-group">
                                            Make :
                                        </div>
                                        <div class="col-xs-15">
                                            <b><?= $this->input->post('newmake'); ?></b>
                                        </div>
                                        <div class="col-xs-10 form-group">
                                            Model  :
                                        </div>
                                        <div class="col-xs-15">
                                            <b><?= $this->input->post('newmodel'); ?></b>
                                        </div>
                                    </div>
                                    <div class="col-xs-50">
                                        <div class="col-xs-10 form-group">
                                            Variant  :
                                        </div>
                                        <div class="col-xs-15">
                                            <b><?= $this->input->post('newvariant'); ?></b>
                                        </div>    
                                        <?PHP
                                    }
                                    ?>
                                    <div class="col-xs-10 form-group">
                                        Registration Number  :
                                    </div>
                                    <div class="col-xs-15">
                                        <b><?= $this->input->post('regno'); ?></b>
                                    </div>
                                </div>
                                <div class="col-xs-50">
                                    <div class="col-xs-10 form-group">
                                        Registration Date  :
                                    </div>
                                    <div class="col-xs-15">
                                        <b><?= $this->input->post('regdate'); ?></b>
                                    </div>
                                    <div class="col-xs-10 form-group">
                                        Current Policy Validity Date  :
                                    </div>
                                    <div class="col-xs-15">
                                        <b><?= $this->input->post('expdate'); ?></b>
                                    </div>
                                </div>
                                <div class="col-xs-50">
                                    <div class="col-xs-10 form-group">
                                        Model Year  :
                                    </div>
                                    <div class="col-xs-15">
                                        <b><?= $this->input->post('modYear'); ?></b>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-45">
                                <div class="col-xs-15 form-group">
                                    <label class="name"  style=" line-height: 13px;" for="ph">Address:</label>
                                </div>
                                <div class="col-xs-32">
                                    <textarea id="address" name="address" required class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-45">
                                <div class="col-xs-15 form-group">
                                    <label class="name"  style=" line-height: 13px;" for="location">Location Area</label>
                                </div>
                                <div class="col-xs-32">
                                    <input type='text' class="form-control" id="location" name="location" />
                                </div>
                            </div>
                            <div class="col-xs-45">
                                <div class="col-xs-15 form-group">
                                    <label class="name"  style=" line-height: 13px;" for="city">City</label>
                                </div>
                                <div class="col-xs-32">
                                    <input type='text' class="form-control" id="city" name="city" />
                                </div>
                            </div>
                            <div class="col-xs-45">
                                <div class="col-xs-15 form-group">
                                    <label class="name" style=" line-height: 13px;" for="pin">Pin Code</label>
                                </div>
                                <div class="col-xs-32">
                                    <input type="text" class="form-control" pattern=".{6,6}" id="pin" name="pin" placeholder="Pin Code"> 
                                </div>
                            </div>
                            <div class="col-xs-45">
                                <div class="col-xs-15 form-group">
                                    <label class="name"  style=" line-height: 13px;" for="date">Vehicle KM</label>
                                </div>
                                <div class="col-xs-32">
                                    <input type="text" class="form-control" id="km" name="km" placeholder="Km Covered">
                                </div>
                            </div>
                            <div class="col-xs-45">
                                <div class="col-xs-15 form-group">
                                    <label class="name"  style=" line-height: 13px;" for="fual">Fuel Type:</label>
                                </div>
                                <div class="col-xs-32">
                                    <input type="text" class="form-control" name="fual" id="fual" placeholder="Fuel Type">
                                </div>
                            </div>
                            <div class="col-xs-45">
                                <div class="col-xs-15 form-group">
                                    <label class="name"  style=" line-height: 13px;" for="fual">Current Company:</label>
                                </div>
                                <div class="col-xs-32">
                                    <input type="text" class="form-control" id="insu_cmp" name="insu_cmp" placeholder="Current Insurance Company">
                                </div>
                            </div>                           
                            <input id="fid" name="fid" type="hidden"  value="<?= empty($_POST['formid'])?$id:$_POST['formid']; ?>" />
                            <div class="col-xs-45">
                                <div class="col-xs-15 form-group">
                                    <label class="name"  style=" line-height: 13px;" for="fual">Rc-Book Copy:</label>
                                </div>
                                <div class="col-xs-32">
                                    <input type="file" required="required" class="form-control" name="rc" />
                                </div>
                            </div>
                            <div class="col-xs-45">
                                <div class="col-xs-15 form-group">
                                    <label class="name"  style=" line-height: 13px;" for="fual">Current Insurance Copy:</label>
                                </div>
                                <div class="col-xs-32">
                                    <input type="file"  class="form-control" name="incopy" />
                                </div>
                            </div>
                            <?PHP
                            if($this->input->post('vehicleType')==3){
                                ?>
                            <div class="col-xs-45">
                                <div class="col-xs-15 form-group">
                                    <label class="name"  style=" line-height: 13px;" for="fual">Tax Receipt:</label>
                                </div>
                                <div class="col-xs-32">
                                    <input type="file" class="form-control" name="taxRec" />
                                </div>
                            </div>
                                <?PHP
                            }
                            if(date('Y/m/d')>$this->input->post('expdate')){
                            ?>
                            <div class="col-xs-45 col-xs-offset-5"><p style="font-size: large;">Upload Vehicle Images</p></div>
                            <div class="col-xs-45">
                                <div class="col-xs-15 form-group">
                                    <label class="name"  style=" line-height: 13px;" for="fual">Front View Image:</label>
                                </div>
                                <div class="col-xs-32">
                                    <input type="file" class="form-control" name="fImg" />
                                </div>
                            </div>
                            <div class="col-xs-45">
                                <div class="col-xs-15 form-group">
                                    <label class="name"  style=" line-height: 13px;" for="fual">Back View Image:</label>
                                </div>
                                <div class="col-xs-32">
                                    <input type="file" class="form-control" name="bImg" />
                                </div>
                            </div>
                            <div class="col-xs-45">
                                <div class="col-xs-15 form-group">
                                    <label class="name"  style=" line-height: 13px;" for="fual">Right Side Image:</label>
                                </div>
                                <div class="col-xs-32">
                                    <input type="file" class="form-control" name="rImg" />
                                </div>
                            </div>
                            <div class="col-xs-45">
                                <div class="col-xs-15 form-group">
                                    <label class="name"  style=" line-height: 13px;" for="fual">Left Side Image:</label>
                                </div>
                                <div class="col-xs-32">
                                    <input type="file" class="form-control" name="lImg" />
                                </div>
                            </div>
                            
                            <?PHP                                
                            }
                            ?>
                            <center> <input type="submit" id="submit" class="btn" name="Submit"  value="submit"></center>
                            
                        </div>
                       
                    </form>
                </div>

            </div>

        </div> 
    </div>
</div>