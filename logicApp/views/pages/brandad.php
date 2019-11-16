<form method="POST" enctype="multipart/form-data">
    <div class="col-xs-50" style="padding:20px;">

        <div class="col-xs-15"  style=" padding: 10px;">
            <label>select brand</label>
        </div>

        <div class="col-xs-25"  style=" padding: 10px;">   
            <select  name="company" id="varint" class="form-control" >
                <option value="">None</option>
                <?PHP
                foreach ($brand1 as $row) {
                    echo "<option value='$row->cmp_id' > $row->companyname</option>";
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
            <label>Paste Link Here</label>
        </div>
        <div class="col-xs-25" style=" padding: 10px;">
            <input  class="form-control" name="link" id="link" type="text" style="width: 500px;"  />
        </div>
        <div class="col-xs-10" style="float:right">
            <input type="submit" name="submit1" value="upload" class="form-control" style="width: 70px;" />
        </div>
    </div>
</form>

