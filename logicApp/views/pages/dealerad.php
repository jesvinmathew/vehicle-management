<form method="POST" enctype="multipart/form-data">
    <div class="col-xs-50" style="padding:20px;">
    <div class="col-xs-15"  style=" padding: 10px;">
            <label>select District</label>
        </div>

       <div class="col-xs-25" style=" padding: 10px;">
           <select id="district" name="dist" class="select  required form-control">
                                    <option value="0" selected="selected">Please Select</option>
                                    <?php
                                    $onroad_placequery = $this->db->get_where('place', array('type' => 3));
                                    foreach ($onroad_placequery->result() as $rowonroad_place) {
                                        $place_id = $rowonroad_place->place_id;
                                        echo '<option  value="' . $place_id . '">' . $rowonroad_place->placename . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                
        <div class="col-xs-15" style=" padding: 10px;">
            <label>Upload Image Here</label>
        </div>
        <div class="col-xs-25"  style=" padding: 10px;">
            <input  class="form-control" name="userfile" id="image" type="file" style="width: 500px;"  />
        </div>
        <div class="col-xs-15" style=" padding: 10px;">
            <label>Select Position</label>
        </div>
        <div class="col-xs-25" style=" padding: 10px;">
            <select id="position" name="position" class="select  required form-control">
		  <option value="0">select position</option>
		  <option value="1">Top</option>
		  <option value="2">Down</option>
	    </select>
        </div>
        <div class="col-xs-15" style=" padding: 10px;">
            <label>Paste Link Here</label>
        </div>
        <div class="col-xs-25" style=" padding: 10px;">
            <input  class="form-control" name="link" id="link" type="text" style="width: 500px;"  />
        </div>
        <div class="col-xs-10" style="float:right">
            <input type="submit" name="submit2" value="upload" class="form-control" style="width: 70px;" />
        </div>
    </div>
</form>