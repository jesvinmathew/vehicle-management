<div class="col-xs-48 col-xs-offset-1">
    <div class="col-xs-34">
        <br>
        <p style="text-align: center; font-size: larger; padding: 20px 1px 20px 1px;"><?= "<b>" . $newses[0]->head . "<b>" ?></p>
        <div class="col-xs-48 col-xs-offset-1">
            <div class="col-xs-50">
            	<div class="col-xs-50 col-sm-50 col-md-50 pull-right">
            		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            			<div class="carousel-inner">
            			
            <?PHP
            foreach ($newsimgs as $key=>$imgs) {
                ?>
                <div class="item item11 <?= (!$key)?"active":""; ?>">
                	<img class="col-xs-48 col-xs-offset-1" src="<?= UPLOAD_PATH . "news/" . $imgs->name ?>" />
                	<div class="carousel-caption">
                	</div>
               	</div>
            <?PHP } ?>
            			</div>
            		</div>
            		<a class="left carousel-control" data-slide="prev" role="button" href="#carousel-example-generic">

			    <span class="glyphicon glyphicon-chevron-left"></span>
			
			</a>
			<a class="right carousel-control" data-slide="next" role="button" href="#carousel-example-generic">
			
			    <span class="glyphicon glyphicon-chevron-right"></span>
			
			</a>
		</div>
            </div>
            <div class="col-xs-50">
                <?= $newses[0]->news; ?>
            </div>
        </div>
    </div>
    <div class="col-xs-15 col-xs-offset-1">
    	<?PHP 
            
              $this->db->where_in('loc', array('100', '101'));
              $this->db->order_by('loc', 'ASC');
              $add = $this->db->get('add')->result();
              foreach($add as $ad){
              if(isset($ad->img_path1)){
                        ?>
        <a href="<?=$ad->link;?>"><img src="<?= IMAGES_PATH . "advertisement/" . $ad->img_path1; ?>" style="margin: 20px 0 20px 0"/></a>
          <?php }
                     }
                ?>
    </div>
</div>