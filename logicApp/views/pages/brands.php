<div class="bg">
    <div class="col-xs-50 col-xs-offset-1">
        <h2>Brands</h2>
        <?PHP
        foreach($brands as $brand){
            ?>
        <div class="col-xs-6 " style="">
            <div class="col-xs-50" style="height: 100px; border: 1px solid #dddbdb; margin-top: 8px; border-radius: 3px">
                <a href="<?= site_url('welcome/brandView?company='.$brand->cmp_id)?>"><center><img height="70" src="<?= IMAGES_PATH."companies/thumb/".strrev(implode(strrev("_thumb."), explode(".", strrev($brand->image), 2)))?>" /></center>
                    <label class="col-xs-50" style="text-align: center"><?= $brand->companyname; ?></label></a>
            </div>
        </div>
            <?PHP
        }
        ?>
    </div>
</div>