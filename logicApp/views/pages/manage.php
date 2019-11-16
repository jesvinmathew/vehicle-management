<div class="col-xs-48 col-xs-offset-1">
    <div class="alert" id="alert"></div>
    <div class="col-xs-50 ">
        <div class="col-xs-50">
            <h2 class="mb1">Vehicles Details</h2>
        </div>
        <div class="col-xs-50">
            <div class="col-xs-18" style="float: right">
                <div id="companyimage" class="col-xs-50 showimages" style="" >
                </div>
            </div>
            <div class="col-xs-30">
                <div class="col-xs-20">
                    <h5 style="margin-top:5px;">
                        <label class="name">vehicle type</label>
                    </h5>
                </div>
                <div class="col-xs-26">
                    <select class="select required form-control" id="vehicletype">
                        <option value="0">Please Select</option>
                        <option value="1">Bike</option>
                        <option value="2">Car</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-30">
                <div class="col-xs-20">
                    <h5 style="margin-top:5px;">
                        <label class="name">Vehicle Make</label>
                    </h5>
                </div>
                <div class="col-xs-26">
                    <select id="company" class="select required form-control">
                        <option value="0" selected="selected">Please Select</option>
                    </select>
                    <div class="input-group hideme">
                        <span class="col-xs-50">Company Image</span>
                        <input class=" form-control " type="file" id="image" />
                        <span class="col-xs-50">Official web site</span>
                        <input class=" form-control " type="text" id="web" placeholder="Official Website" />
                        <span class="col-xs-50">Official loan</span>
                        <input class=" form-control " type="text" id="loan" placeholder="Official Loan Link" />
                        <span class="col-xs-50">Official insurance</span>
                        <input class=" form-control " type="text" id="insu" placeholder="Official Insurance Link" />
                        <span class="col-xs-50">Status</span>
                        <select id="companystatus" class="form-control">
                            <option value="1">Allow</option>
                            <option value="3">Ceased</option>
                            <option value="0">Reject</option>
                        </select>
                        <span class="col-xs-50">Company Name</span>
                        <input class=" form-control new" id="companyinput" placeholder="add new company here" />
                        <input class="form-control addnew" id="uploadfile" type="button" value="Add new"/>
                    </div>
                </div>
            </div>
            <div class="col-xs-30">
                <div class="col-xs-20">
                    <h5 style="margin-top:5px;">
                        <label class="name">Vehicle Models</label>
                    </h5>

                    <div id="modelimage" class="col-xs-50 showimages"  style="" >
                    </div>
                </div>
                <div class="col-xs-26">

                    <select class="select required form-control" name="model" id="model">
                        <option value="0" selected="selected">Please Select</option>
                    </select>
                    <div class="input-group hideme">
                        <select id="colors" class="hidden"></select>
                        <span class="col-xs-50">body Type</span>
                        <select class="required form-control" name="bodytype" id="bodytype">
                        </select>
                        <span class="col-xs-50">Start year</span>
                        <select name="year" id="fromyear" class="form-control required">
                            <?php $this->load->view('includes/fromyear'); ?> 
                        </select>
                        <span class="col-xs-50">End year</span>
                        <select name="year" id="toyear" class="form-control required">
                            <?php $this->load->view('includes/toyear'); ?>
                        </select>
                        <span class="col-xs-50">About the Model</span>
                        <textarea id="aboutModel" class="form-control" rows="5"></textarea>
                        <span class="col-xs-50">Status</span>
                        <select id="modelstatus" class="form-control">
                            <option value="1">Allow</option>
                            <option value="2">Upcoming</option>
                            <option value="3">Ceased</option>
                            <option value="0">Reject</option>
                        </select>
                        <span class="col-xs-50">Model Brouchure</span>
                        <a href="#" target="_new" id="brouchure">Brouchure Link Not Found</a>
                        <input type="file" class="form-control" id="modelbrouchure" />
                        <span class="col-xs-50">Model Name</span>
                        <input class=" form-control new" id="modelinput" placeholder="add new model here" />
                        <input class="form-control addnew" id="uploadmodel" type="button" value="Save It"/>

                        <span class="col-xs-50">Vehicle Image:</span>
                        <input type="file" class="form-control" id="vehicleimage" />

                        <input type="button" class="form-control btn-primary" id="upVeImage" value="Upload Image" />

                        <div class="col-xs-50">
                            <span class="col-xs-50">Color Image</span>
                            <input type="file" class="form-control" id="uploadvehicleimage" />
                            <span class="col-xs-50">Color Name</span>
                            <input type="text" class=" required form-control" list="listcolorslist" name="" id="colorname"/>
                            <datalist id="colorslist">

                            </datalist>
                            Color #code (eg #FFFFFF)
                            <input type="text"  class=" required form-control" list="listcolorcodelist" name="" id="colorcode"/>
                            <datalist id="colorcodelist"></datalist>
                            <span class="col-xs-50">Status</span>
                            <select id="statuscolor" class="form-control">
                                <option value="1">Allow</option>
                                <option value="0">Reject</option>
                            </select>
                            <input style="width:30%"  class="form-control addnew" id="uploadcolor" type="button" value="Save it "/>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-xs-50">
                <label class="col-xs-50">Vehicle Images</label>
                <div id="veImgList" class="col-xs-50"></div>
                <label class="col-xs-50">Color Images</label>
                <div id="colorimages" class="col-xs-50"></div>
            </div>
            <div class="col-xs-30">
                <div class="col-xs-20">
                    <h5 style="margin-top:5px;">
                        <label class="name">variant type</label>
                    </h5>
                </div>
                <div class="col-xs-26">
                    <select class="select required form-control" name="variant" id="variant">
                        <option value="0">Please Select</option>
                    </select>
                    <div class="input-group hideme">
                        <span class="col-xs-50">Fuel type</span>
                        <select class="required form-control" name="fueltype" id="fueltype">
                            <option value="0">Please Select</option>
                            <?PHP
                            foreach ($fueltype as $fuel) {
                                echo "<option value='$fuel->fl_id'>$fuel->fueltypename</option>";
                            }
                            ?>
                        </select>
                        <a href="#" id="variantbrouchurelink">Brochure link</a>
                        <span class="col-xs-50">Brochure</span>
                        <input type="file" class="form-control" id="veriantbrouchure" />
                        <span class="col-xs-50">About variant</span>
                        <textarea id="aboutveriant" class="form-control"></textarea>
                        <span class="col-xs-50">Price</span>
                        <input type="number" id="variantprice" class="form-control" />
                        <span class="col-xs-50">Price Text</span>
                        <input type="text" id="variantpriceText" class="form-control" />
                        <span class="col-xs-50">Cubic Capacity</span>
                        <input type="number" id="cubicCapacity" class="form-control" />
                        <span class="col-xs-50">Seating Capacity</span>
                        <input type="number" id="seatingCapacity" class="form-control" />
                        <span class="col-xs-50">Status</span>
                        <select id="variantstatus" class="form-control">
                            <option value="1">Allow</option>
                            <option value="2">Upcoming</option>
                            <option value="3">Ceased</option>
                            <option value="0">Reject</option>
                        </select>
                        <span class="col-xs-50">Variant Name</span>
                        <input class=" form-control new" id="variantinput" placeholder="add new variant here" />
                        <input class="form-control addnew" id="uploadvariant" type="button" value="Add new"/>
                    </div>
                </div>
            </div>
            <div id="addvariantfeature">
                <div class="col-xs-50" id="featurDiv">
                    <div class="col-xs-50">
                        <h6 class="mb1">Variant Features</h6>                                
                    </div>
                    <div class="col-xs-50">
                        <div class="col-xs-22"> 
                            <select class=" required form-control" name="featureslist" id="featureslist">
                                <option value="" selected="selected">Select</option>
                                <option value="new">New</option>
                                <?PHP
                                $j = 0;
                                for ($i = 0; $i < count($feaures1); $i++) {
                                    echo '<option>' . $feaures1[$i]->feachur . '</option>';
                                    for (; $j < count($feaures2) && $feaures2[$j]->patent === $feaures1[$i]->feachur_id; $j++)
                                        echo "<option value='" . $feaures2[$j]->feachur_id . "' > -- " . $feaures2[$j]->feachur . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-8">                                    
                            <input type="text" id="featurevalue" class="form-control" />
                        </div>
                        <div class="col-xs-7"> <input type="button" id="add" value="add to it" class="form-control addnew" /></div>
                        <div id="newfeatures" class="col-xs-21" style="display: none;">
                            <div class="col-xs-50">
                                <select id="parentof" class="form-control" >
                                    <option value="0">None</option>
                                    <?PHP
                                    foreach ($feaures1 as $feaur)
                                        echo "<option  value='$feaur->feachur_id'>$feaur->feachur</option>";
                                    ?>
                                </select>
                            </div>
                            <div class="col-xs-30"><input placeholder="Featur" type="text" id="newfeatureadd" class="form-control new" /></div>
                            <div class="col-xs-30"><textarea id="newfeaturedisadd" class="form-control new"></textarea></div>
                            <div class="col-xs-20"><input type="button" id="addnewfeature" class="form-control addnew" value="Save" /></div>

                        </div>
                    </div>
                    <div class="col-xs-50">
                        <ul class="list list-group" id="featuresul">
                            <?php
                            foreach ($feaures2 as $feaur) {
                                echo "<li id='list$feaur->feachur_id' value='$feaur->feachur_id'>$feaur->feachur - $feaur->feachur<span class='glyphicon glyphicon-remove' ></span></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-50" id="specDiv">
                    <div class="col-xs-50">                                
                        <h6 class="mb1">Variant Specifications</h6>                                
                    </div>
                    <div class="col-xs-50">
                        <div class="col-xs-22">
                            <select class=" required form-control" name="speclist" id="speclist">
                                <option value="0" selected="selected">Select</option>
                                <option value="new">New</option>
                                <?PHP
                                $j = 0;
                                for ($i = 0; $i < count($specification1); $i++) {
                                    echo '<option>' . $specification1[$i]->specification . '</option>';
                                    for (; $j < count($specification2) && $specification2[$j]->patent === $specification1[$i]->spec_id; $j++)
                                        echo "<option value='" . $specification2[$j]->spec_id . "' > -- " . $specification2[$j]->specification . "</option>";
                                }
                                /* foreach ($specification as $spec) {
                                  echo '<option ';
                                  echo ( $spec->patent != 0 ) ? " value='$spec->spec_id' > --" : " >";
                                  echo "$spec->specification</option>";
                                  } */
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-8">                                    
                            <input type="text" id="specvalue" class="form-control" />
                        </div>
                        <div class="col-xs-7">
                            <input type="button" id="add" value="add to it" class="form-control addnew" />
                        </div>
                        <div id="newspec" class="col-xs-21" style="display: none;">
                            <div class="col-xs-50">
                                <select id="parentofspec" class="form-control" >
                                    <option value="">None</option>
                                    <?PHP
                                    foreach ($specification1 as $spec) {
                                        echo "<option value='$spec->spec_id' > $spec->specification</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-xs-30"><input placeholder="Specification" type="text" id="newspecadd" class="form-control new" /></div>
                            <div class="col-xs-30"><textarea id="newspecdisadd" class="form-control new"></textarea></div>
                            <div class="col-xs-20"><input type="button" id="addnewspec" class="form-control addnew" value="Save" /></div>

                        </div>
                    </div>
                    <div class="col-xs-50">
                        <ul class="list list-group" id="specul">
                            <?php
                            foreach ($specification2 as $spec) {
                                echo "<li id='listspec$spec->spec_id' value='$spec->spec_id'>$spec->specification - $spec->specification<span class='glyphicon glyphicon-remove' ></span></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-50" id="deatils">
                    <div class="col-xs-50">
                        <h6 class="mb1">Variant Details</h6>                                
                    </div>
                    <div class="col-xs-50">
                        <div class="col-xs-15"> 
                            <select class=" required form-control" name="deatilslist" id="deatilslist">
                                <option value="" selected="selected">Select</option>
                                <option value="new">New</option>
                                <?PHP foreach ($deatils as $deatil)
                                    echo "<option value='$deatil->deatil_id'>$deatil->deatil</option>";
                                ?>
                            </select>
                        </div>
                        <div class="col-xs-25">                                    
                            <textarea id="deatilsvalue"class="form-control"></textarea>
                        </div>
                        <div class="col-xs-7"> <input type="button" id="adddeatil" value="add to it" class="form-control addnew" /></div>
                        <div id="newdeatils" class="col-xs-21" style="display: none;">
                            <div class="col-xs-30"><input placeholder="deatil" type="text" id="newdeatiladd" class="form-control new" /></div>
                            <div class="col-xs-30"><textarea id="newdeatildisadd" class="form-control new"></textarea></div>
                            <div class="col-xs-20"><input type="button" id="addnewdeatils" class="form-control addnew" value="Save" /></div>
                        </div>
                    </div>
                    <div class="col-xs-50">
                        <ul class="list list-group" id="deatilsul">
                            <?php
                            foreach ($deatils as $deatil) {
                                echo "<li id='listdet$deatil->deatil_id' value='$deatil->deatil_id'>$deatil->deatil - $deatil->deatil<span class='glyphicon glyphicon-remove' ></span></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="clear"></div>
        </form>
    </div>
</div>