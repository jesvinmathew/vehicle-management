<header>
    <div class="col-xs-50" style="background: #ca0002;">
        <div class="col-sm-48 col-sm-offset-1">
            <div class="col-xs-35 col-sm-40">
                <h1>
                    <a href="<?=site_url()?>" class="col-xs-15"><img src="<?= IMAGES_PATH; ?>logo.png" alt="Kerala On Road"></a>
                    <a href="#" class="col-xs-30"><img src="<?= IMAGES_PATH; ?>hot_group_logo.jpg" alt="Kerala On Road"></a>
                </h1>
            </div>
            <div class="col-xs-15 col-sm-10 social">
                <br/>
                <a href="#" class="col-xs-12 col-sm-10 twitter"> &nbsp;</a>
                <a href="#" class="col-xs-12 col-sm-10 facebook"> &nbsp;</a>
                <a href="#" class="col-xs-12 col-sm-10 rss"> &nbsp;</a>
                <a href="#" class="col-xs-12 col-sm-10 linkdin"> &nbsp;</a>
                <br/>
            </div>
        </div>
        <div class="col-sm-48 col-sm-offset-1">   
            <div class="ul col-xs-50">
                <div class="ultop col-xs-2 col-sm-2 home">
                    <a href="<?= site_url('welcome'); ?>"></a>
                </div>
                <div class="ultop col-xs-9 col-sm-5  col-md-5  col-lg-7">
                    <a href="<?= site_url('hotties/index'); ?>">HOT CARS</a>
                </div>
                <div class="ultop col-xs-9 col-sm-5 col-md-5 col-lg-6 drop">
                    <a href="<?PHP echo site_url('hotties/hotBike'); ?>">HOT BIKES</a>
                </div>
                <div class="ultop col-xs-16 col-sm-8 col-md-5 col-lg-6  drop">
                    <a href="<?= site_url('hotties/gallery'); ?>">PHOTOS</a>
                </div>
                <div class="ultop col-xs-13 col-sm-5 col-md-5 col-lg-6  drop">
                    <a href="<?= site_url('hotties/links'); ?>">VIDEOS</a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</header>
    