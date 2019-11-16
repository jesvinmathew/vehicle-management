<div style=" background-color:  gainsboro; border-bottom: 4px  solid brown; padding: 35px;" ><center><b style="color:green; font-size: 20px; margin-top: 20px;">Only for cars</b></center></div>
<div class="col-xs-40 col-xs-offset-1" style="margin-top: 30px;">
    <div class="col-xs-40">
        <div class="col-xs-15 form-group">
            <label class="name"  style=" line-height: 13px;" for="name">Name:</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="name">
        </div>
    </div>

    <div class="col-xs-40">
        <div class="col-xs-15 form-group">
            <label class="name"  style=" line-height: 13px;" for="mobile">Mobile No</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="mobile">
        </div>
    </div>
    <div class="col-xs-40">
        <div class="col-xs-15 form-group">
            <label class="name"  style=" line-height: 13px;" for="city">breakdown Location</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="city">
        </div>
    </div>
    <div class="col-xs-40">
        <div class="col-xs-15 form-group">
            <label class="name"  style=" line-height: 13px;" for="dist">Breakdown District</label>
        </div>
        <div class="col-xs-32">
            <select class="col-xs-38  tmSelect auto form-control" id="bdist">
                <option value="0" >District</option>
                <?PHP
                foreach ($district as $dis) {
                    echo "<option value='$dis->place_id'>$dis->placename</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="col-xs-40">
        <div class="col-xs-15 form-group">
            <label class="name"  style=" line-height: 13px;" for="city">Vehicle Brand</label>
        </div>
        <div class="col-xs-32">
            <select class="col-xs-38  tmSelect auto form-control" id="bbrand">
                <option value="0" >Please select</option>
                <?PHP
                foreach ($cmake as $res) {

                    echo "<option value='$res->id'>$res->content</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="col-xs-40">
        <div class="col-xs-15 form-group">
            <label class="name"  style=" line-height: 13px;" for="city">Model</label>
        </div>
        <div class="col-xs-32">
            <select class="col-xs-38  tmSelect auto form-control" id="bmodel">
                <option value="0" >Please select</option>
            </select>
        </div>
    </div>
    <div class="col-xs-40">
        <div class="col-xs-15 form-group">
            <label class="name"  style=" line-height: 13px;" for="city">Variant</label>
        </div>
        <div class="col-xs-32">
            <select class="col-xs-38  tmSelect auto form-control" id="bvariant">
                <option value="0" >Please select</option>
            </select>
        </div>
    </div>
    <div class="col-xs-40">
        <div class="col-xs-24">
            <input type="checkbox" id="acc" class="comon"/><label>Accident</label>
        </div>
        <div class="col-xs-24">
            <input type="checkbox" id="brak" class="comon" /><label>Breakdown assist</label>
        </div>
    </div>
    <div class="col-xs-40">
        <div class="col-xs-24 cond" style="display: none;">
            <div class="col-xs-50">
                <input type="checkbox" id="rcondi" class="con" /><label>running Condition</label>
            </div>
            <div class="col-xs-50">
                <input type="checkbox" id="ncondi"  class="con" /><label>not running Condition</label>
            </div>
        </div>
        <div class="col-xs-24 msg" style="display: none;">
            <div class="col-xs-50">
            <textarea class="form-control" id="message"></textarea>
            </div>
        </div>
    </div>
    <div class="col-xs-24">
        
            <input type="checkbox" id="temsBrService" />
       <label class="name" class="col-xs-25" for="temsVehiView"> Accept the Terms And Condition </label>
    </div>
</div>
<div class="clear"></div>
<div class="col-xs-40">
    <button class="btn" id="submitService" type="button">

        Submit

    </button>
</div>