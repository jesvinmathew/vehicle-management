<div class="col-xs-50 col-xs-offset-1" id="main_page">
    <div class="col-xs-33" style="color: #fff;" >
        <?PHP
        if($this->session->userdata('keralaonroads')){
             ?>
        <form method="POST">
            <div style="background:#fff; color: #000;" >
                <textarea  class="col-xs-50" name="textarea" id="textarea" style="resize: none"onkeyup="textAreaAdjust(this)" style="overflow:hidden"></textarea>
                <img src="<?= IMAGES_PATH; ?>upload_image.png"  id="img1" class="upload" data-toggle="img" />
                <img src="<?= IMAGES_PATH; ?>upload_link.png"  id="img2" class="upload" data-toggle="link"/>
                <img src="<?= IMAGES_PATH; ?>upload_video.png"  id="img3" class="upload" data-toggle="img" />
                <input type="submit" class="post_submit" name="submit" id="submit" style="float: right;" value="" >
            </div>
        </form>
        <?PHP
         }
         ?>        
        <ul id="post">
            <?php
            foreach ($posts->result() as $post){
                $query=$this->db->get_where('post_datas',  array('post_id'=>$post->id));
                foreach($query->result() as $key=>$val){
                    if(!$key){
                        if($val->type==1){
                            ?>
            <img src="<?= UPLOAD_PATH."post/".$val->datainfo ?>" class="col-xs-45" />
                            <?PHP
                        }
                        elseif($val->type==2){
                            ?>
            <div class="col-xs-45">
                <iframe width="560" height="315" src="<?=$val->datainfo;?>" frameborder="0" allowfullscreen></iframe></div><?PHP 
                        }
                    }
                }
                echo '<li class="col-xs-50">' . nl2br(str_replace(' ', '&nbsp;', $post->text)) . '</li>';
            }
            ?>
        </ul>
    </div>
</div>
<script>
    function textAreaAdjust(o) {
        o.style.height = "1px";
        o.style.height = (25 + o.scrollHeight) + "px";
    }
    $(document).ready(function () {
        $(".upload").click(function (){
            $(".modal").show();
            $('#myModal').find('.modal-body').html("");
            var link = "<?= site_url("json/upload"); ?>"+$(this).attr("data-toggle");
            $.ajax({
                url: link
            }).done(function (data) {
                $('#myModal').find('.modal-body').html(data);
                return false;
            }).fail(function () {
                alert("error");
            });
            $(".close,.btn").click(function()
            {$(".modal").hide();});
        });
        });
</script>



