<div class="col-xs-48 col-xs-offset-1">
    <div class="col-xs-34">
        <div id="content">
        <?PHP
            foreach ($newses as $news){
                ?>
        <div class="col-xs-24" style="border: solid 1px; margin: 10px 5px 10px 5px; height: 450px;">
            <p style="height: 45px; overflow: hidden; background: #ccc; text-align: center; font-size: larger; padding: 20px 1px 20px 1px;"><?="<b>$news->head<b>"?></p>
            <div class="col-xs-48 col-xs-offset-1" style="height: 342px; overflow: hidden;">
                
                <?PHP
                    $qry=$this->db->get_where('news_image',  array('news_id'=>$news->id));
                    if(!empty($qry->result()[0])){
                        ?>
                <img class="col-xs-48 col-xs-offset-1" src="<?=UPLOAD_PATH."news/".$qry->result()[0]->name?>" />
                <?PHP
                    }
                ?>
                <p>
                    <?=$news->news;?>
                </p>
            </div>
            <div class="col-xs-48 col-xs-offset-1" style="text-align: center;">
                <label style="background: #ccc;" class="col-xs-14 col-xs-offset-1">
                    <a href="#" class="like" data-link="<?=$news->id?>">Like </a> 
                    <?PHP
                        $this->db->select_sum('value');
                        $qry=$this->db->get_where('newse_likes', array('news_id'=>$news->id));
                        echo ($qry->result()[0]->value)?$qry->result()[0]->value:0;
                    ?>
                </label>
                <label style="background: #ccc;" class="col-xs-14 col-xs-offset-3"><a href="<?=site_url('news/details/'.$news->id);?> ">View More</a></label>
                <label style="background: #ccc;" class="col-xs-14 col-xs-offset-3">Read <?= $news->read; ?></label>
            </div>
        </div>
        <?PHP
            }
        ?>
        </div>
        <div class="col-xs-50">
            <label class="btn">
                <a href="<?=site_url('news/index/like');?>">Most Like </a>
            </label>
            <label class="btn"><a href="<?=site_url('news/index/read');?>">Most Read </a></label>
            <label class="btn"><a href="<?=site_url('news');?>">Latest New</a></label>
            <div class="col-xs-20" id="page-selection"></div>
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
<div id="page-selection"></div>
<script>
    $('#page-selection').bootpag({
        total: <?=$count/4;?>,
        page: 1,
        maxVisible: 7 
    }).on("page", function(event,  num){
        var postdata = {};
        postdata.page = num;
        $.ajax({
            url: "<?= site_url('news'); ?>/jindex/<?=$this->uri->segment(3)?>",
            type: 'post',
            dataType: 'html',
            data: postdata
        }).done(function (data) {
            $("#content").html(data);
        });
    });
</script>