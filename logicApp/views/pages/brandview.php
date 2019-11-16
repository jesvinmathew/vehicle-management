<script>
    $(document).ready(function () {
        $('#left,#right').click(function () {
            changeplace($(this).attr('id'));
        });
        function friendView(id) {
            //$( "#brandCur" ).load( "<?= site_url("welcome/vehiView"); ?>" + "/"+id);
            $.ajax({
                url: "<?= site_url("welcome/vehiView"); ?>" + "/" + id,
            }).done(function (data) {
                $('#brandCur').html(data);
            }).fail(function () {
                alert("error");
            });
        }
        $('.placename').click(function () {
            id = $(this).attr('data-dismiss');
            friendView(id);
        });
        changeplace('right');
<?PHP if (!empty($models[0]->model_id)) { ?>
            friendView(<?= $models[0]->model_id; ?>);
    <?PHP
}
?>
        function changeplace(path)
        {
            var total = $('#total').val();
            var from = parseInt($('#left').attr('value'));
            var to = parseInt($('#right').attr('value'));
            var i = from;
            console.log(from + '-' + to);
            $('.placename').slideUp().hide();
            while (i <= to)
            {

                if (i > (total))
                {
                    $('#itemid' + (i - (total))).slideDown(1000);
                }
                else
                {
                    $('#itemid' + i).slideDown(1000);
                }
                i++;
            }
            console.log(i);
            if (i > total)
            {
                from = 1;
                to = from + 2;
            }
            else
            {
                from = i;
                to = from + 2;
            }
            $('#left').attr('value', from);
            $('#right').attr('value', to);
        }

    })</script>
<style>
    .box{
        margin-left: 1%;
        margin-right: 1%;
    }
    #left , #right{
        font-size:40px;
        line-height: 130px;
        color: rgba(0, 0, 0, 0.18);
    }
    .placename{
        height: 120px;
    }
    .search-box .carousel-inner > .item > img, .carousel-inner > .item > a > img {
        line-height: 1;
        width:100%;
        height: auto;
    }
    .places{
        margin-top: 50px;
        height: 300px;
    }
    .search-box .carousel-indicators li{
        width:100px;
        height: 60px;
        background-size: cover;
        background-position: center;
    }
    .search-box .carousel-inner > .item {
        height: 400px;
        overflow: hidden;
    }
    .search-box .carousel-indicators {
        position: relative;
        /* bottom: 10px; */
        left: 0;
        margin-top: 33px;
        width: 100%;
        margin-left: 0;
    }
    .search-box .carousel-control{
        background-image: none !important;
    }
    .search-box .carousel-caption {
        bottom: -5%;
        color: black;
    }
</style>
<div class="col-xs-48 col-xs-offset-1">
    <h2><?= $brands[0]->companyname; ?></h2>
    <div class="col-xs-50 col-sm-20 col-md-12 search-box">
        <center>
            <img src="<?= IMAGES_PATH . "companies/" . $brands[0]->image ?>" />
        </center>
    </div>
    <div class="col-xs-50 col-sm-25 col-md25">
        <div class="col-xs-1"></div>
        <div class="col-xs-48 search-box" id="brandCur">

        </div>
    </div>
    <div class="col-xs-50 col-sm-20 col-md-12 fright">
        <div class="col-xs-50 search-box">
            <?php $this->db->where ('cmp_id',$brands[0]->cmp_id);   
            $add = $this->db->get('brand_ad')->result();
            if(isset($add[0]->img_name)){
            ?>
            <a href="<?=$add[0]->link;?>"><img src="<?= IMAGES_PATH . "advertisement/" . $add[0]->img_name; ?>" /></a>
            <?php }?>
            <div class="col-xs-50">
                <br>
            </div>
            <h5>Useful Link</h5>
            <ul class="uslink">
                <li><a href="<?= $brands[0]->web ?>" target="_blank">Official Web site</a></li>
                <li><a href="<?= site_url('welcome/loan'); ?>">Loan</a></li>
                <li><a href="<?= site_url('insurance'); ?>">Insurance</a></li>
                <li><a href="<?= site_url('welcome/dealers/new/car'); ?>">Dealers</a></li>
                <li><strong style="font-size: medium"><a href="#myModal "   data-toggle="modal" class="lightBox" value="<?= $this->uri->segment(3); ?>" data-link="testDrive?brId=<?php echo $brands[0]->cmp_id; ?>&cmp_id=<?php echo $brands[0]->cmp_id;?>">Book Your Test Drive</a></strong></li>
            </ul>
        </div>
    </div>
    <?PHP
    	if($models[0]->status==2){
    		if (!empty($models[0]->model_image))
        		$img = "newvehicles/thumbs/" . strrev(implode(strrev("_thumb."), explode(".", strrev($models[0]->model_image), 2)));
       		else
                	$img = "page1_img1.jpg";
            ?>
    
    <div class="col-xs-50 col-sm-30 col-md-38">
        <div class="col-xs-46 col-xs-offset-2">
            <img src="<?=IMAGES_PATH?>upcommingCars.png" class="col-xs-50" />
        </div>
    	<div class="col-xs-35">
    		<div class="tab-pane">
    		<?PHP
    			$images=$this->db->get_where('model_images', array('model_id'=>$models[0]->model_id))->result();
    			if(isset($images[0]->model_image)){
    				echo '<div id="carousel-example-generic1" class="carousel slide" data-ride="carousel"><div class="carousel-inner">';
                            $i = 0;
                            foreach ($images as $row) {
                                echo '<div class="item';
                                if ($i == 0) {
                                    echo ' active ';
                                }
                                echo '"><img class="image" align="center"  src="';
                                echo base_url() . 'assets/images/newvehicles/' . $row->model_image;
                                echo '" alt=""/><div class="carousel-caption">
      </div></div> ';
                                $i++;
                            }
                            echo ' 
    </div></div><a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>';
    			}
    		?>
    		</div>
    	</div>
        <div class="col-xs-14 col-xs-offset-1" style="text-align: justify;">
    		<?= nl2br($models[0]->about_model); ?>
    		<br /><br/>
    		<?= ' <a href="#myModal" class="details fullview" style="color:#00F" get="viewnew" value="' . $models[0]->model_id . '"  data-toggle="modal" data-target="#myModal" id="' . $models[0]->model_id . '" >More Details</a>' ?>
    	</div>
    </div>
    <?PHP
    }
    ?>
    <div class="places col-xs-50">
        <h3>Current Vehicles</h3>
        <div class="col-xs-5 col-sm-2">
            <span  value="1" class="glyphicon glyphicon-chevron-left" id="left"></span>
        </div>
        <?PHP
        $i = 0;
        foreach ($models as $model) {
            $i++;
            if (!empty($model->model_image))
                $img = "newvehicles/thumbs/" . strrev(implode(strrev("_thumb."), explode(".", strrev($model->model_image), 2)));
            else
                $img = "page1_img1.jpg";
            ?>
            <div class="box col-xs-14 placename" data-dismiss="<?= $model->model_id ?>" id="itemid<?= $i ?>" >
                <div class="col-xs-15 thumbnail ">
                    <img src="<?= IMAGES_PATH . $img; ?>" />
                </div>
                <div>
                    <ul class="modelInfo">
                        <li>Model: <?= $model->model_name ?></li>
                        <li>
                            <?= ' <a href="#myModal" class="details fullview" style="color:#00F" get="viewnew" value="' . $model->model_id . '"  data-toggle="modal" data-target="#myModal" id="' . $model->model_id . '" >More Details</a>' ?>
                        </li> <li><?= nl2br($model->about_model); ?></li>
                    </ul>
                </div>
            </div>
            <?PHP
        }
        ?>
        <input type="hidden" id="total" value="<?= $i ?>" />
        <div class="col-xs-5 col-sm-2">
            <span  value="3" class="glyphicon glyphicon-chevron-right" id="right"></span>
        </div>
    </div>
</div>