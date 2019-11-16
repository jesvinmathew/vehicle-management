<div class="main col-xs-50 col-lg-46 col-lg-offset-2">
    <br>
    <form class="col-xs-offset-2" method="post">
        <?PHP
        if(isset($data[0]->id)){
            ?>
        <input type="hidden" name="id" value="<?=$data[0]->id;?>" />
            <?PHP
        }
        ?>
        <div class="col-xs-30 form-group">
            <div class="col-xs-25">
                Page Location
            </div>
            <div class="col-xs-25">
                <input type="text" placeholder="Page Location" value="<?=isset($data[0]->location)?$data[0]->location:""?>"  required="required" id="pLoc" name="pLoc" class="required form-control" />
            </div>
        </div>
        <div class="col-xs-30 form-group">
            <div class="col-xs-25">
                Type Of Ad
            </div>
            <div class="col-xs-25">
                <input type="text" placeholder="Type of Advertisement" value="<?=isset($data[0]->type)?$data[0]->type:""?>"  required="required" id="tAd" name="tAd" class="required form-control" />
            </div>
        </div>
        <div class="col-xs-30 form-group">
            <div class="col-xs-25">
                Position
            </div>
            <div class="col-xs-25">
                <input type="text" placeholder="Position"  required="required" value="<?=isset($data[0]->postion)?$data[0]->postion:""?>" id="position" name="position" class="required form-control" />
            </div>
        </div>
        <div class="col-xs-30 form-group">
            <div class="col-xs-25">
                Duration
            </div>
            <div class="col-xs-25">
                <input type="text" placeholder="Duration" value="<?=isset($data[0]->duration)?$data[0]->duration:""?>"  required="required" id="duration" name="duration" class="required form-control" />
            </div>
        </div>
        <div class="col-xs-30 form-group">
            <div class="col-xs-25">
                Specification
            </div>
            <div class="col-xs-25">
                <textarea id="seeci" name="seeci" class="required form-control"><?=isset($data[0]->specification)?$data[0]->specification:""?></textarea>
            </div>
        </div>
        <div class="col-xs-30 form-group">
            <div class="col-xs-25">
                <input type="submit" class="btn" Value="Add" />
            </div>
        </div>
    </form>
</div>