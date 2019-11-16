<div class="col-xs-49 col-xs-offset-1" id="main_page">
    <div class="col-xs-33" style="color: #fff;" >
        <?PHP
        if($this->session->userdata('keralaonroads')){
             ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="whiteBox1 col-xs-49" style="padding-bottom: 5px">
                <h3><?= ($this->uri->segment(2)=="hotBike")?"Bike based items":"Car based items"?></h3>
                <div id="imgUp" class="col-xs-50">
                    <label class="col-xs-10">Choose File:</label><input class="col-xs-25" type="file" name="img" />
                </div>
                <div id="linkUp" class="col-xs-50">
                    <label class="col-xs-10">Link:</label><textarea name="link" class="col-xs-25"></textarea>
                </div>
                <div class="col-xs-50 col-xs-offset-1" style="margin: 5px">
                    <textarea  class="col-xs-40 grborder" name="textarea" id="textarea" style="resize: none" onkeyup="textAreaAdjust(this)" style="overflow:hidden"></textarea>
                    <input type="submit" class="col-xs-7 grborder col-xs-offset-1" name="submit" id="submit" style="height: 45px;" value="SUBMIT" >
                </div>
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                <img src="<?= IMAGES_PATH; ?>upload_image.png"  id="img1" class="upload" data-toggle="img" />
                <img src="<?= IMAGES_PATH; ?>line.png" />
                <img src="<?= IMAGES_PATH; ?>upload_link.png"  id="img2" class="upload" data-toggle="link"/>
                <img src="<?= IMAGES_PATH; ?>line.png" />
                <img src="<?= IMAGES_PATH; ?>upload_video.png"  id="img3" class="upload" data-toggle="img" />                
            </div>
        </form>
        <div class="col-xs-50"><br></div>
        <?PHP
         }
         else{
             ?>
        <div class="whiteBox1 col-xs-49" style="padding-bottom: 5px">
                <div class="col-xs-50 col-xs-offset-1" style="margin: 5px">
                    <textarea  class="col-xs-40 grborder" name="textarea" id="textarea" style="resize: none" onkeyup="textAreaAdjust(this)" style="overflow:hidden"></textarea>
                    <input type="submit" class="col-xs-7 grborder col-xs-offset-1" name="submit" onclick="login('Please login using keralaonroad and continue')" style="height: 45px;" value="SUBMIT" >
                </div>
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                <img src="<?= IMAGES_PATH; ?>upload_image.png"  id="img1" data-toggle="img" />
                <img src="<?= IMAGES_PATH; ?>line.png" />
                <img src="<?= IMAGES_PATH; ?>upload_link.png"  id="img2" data-toggle="link"/>
                <img src="<?= IMAGES_PATH; ?>line.png" />
                <img src="<?= IMAGES_PATH; ?>upload_video.png"  id="img3" data-toggle="img" />                
            </div>
            <div class="col-xs-50"><br></div>
        <?PHP
         }
         ?>
            <?php
            foreach ($posts->result() as $post){
                echo "<ul class='col-xs-49 whiteBox1 post'><li class='col-xs-48  col-xs-offset-1'><b>$post->username</b><hr style='position: relative;top:-10px;' /></li>";
                $query=$this->db->get_where('hot_post_datas',  array('post_id'=>$post->id));
                foreach($query->result() as $key=>$val){
                    if(!$key){
                        if($val->type==1){
                            ?>
            <div class="col-xs-48 col-xs-offset-1"><img src="<?= HOT_UPLOADS."post/".$val->datainfo ?>" class="col-xs-50" /></div>
                            <?PHP
                        }
                        elseif($val->type==2){
                            ?>
            <div class="col-xs-48  col-xs-offset-1"><?=$val->datainfo;?></div><?PHP 
                        }
                    }
                    else{
                        if($val->type==1){
                            ?>
            <div class="col-xs-10 col-xs-offset-1" style="margin-top: 10px;"><img src="<?= HOT_UPLOADS."post/".$val->datainfo ?>" class="col-xs-50" /></div>
                            <?PHP
                        }
                        elseif($val->type==2){
                            ?>
            <div class="col-xs-10  col-xs-offset-1"><?=$val->datainfo;?></div><?PHP 
                        }
                    }
                }
                echo '<li class="col-xs-48 col-xs-offset-1" style="margin:10px 0 10px 15px;"><textarea class="col-xs-50" disabled="" style="resize: none; border: #fff; border-bottom: solid 1px #ccc; background: #fff;">' . $post->text . '</textarea></li>';
                $this->db->select('hot_comments.id,comment, username');
                $this->db->join('users','users.user_id=hot_comments.user_id');
                $qry=$this->db->get_where('hot_comments',  array('post_id'=>$post->id));
                foreach ($qry->result() as $comment)
                    echo "<li  class='col-xs-48  col-xs-offset-1'><b>$comment->username :</b> $comment->comment </li>";
                if($this->session->userdata('keralaonroads')){
                    ?>
            <li class="col-xs-48  col-xs-offset-1"><textarea  class="col-xs-30 comment" name="textarea" id="<?=$post->id?>" style="resize: none;" onkeyup="textAreaAdjust(this)" style="overflow:hidden" rows="2" placeholder="Place your comment"></textarea></li>
            <?PHP
                }
                echo '</ul>';
            }
            ?>
    </div>
    <div class="col-xs-16">
        <div class="col-xs-50 whiteBox1">
            <img class="col-xs-50" src="<?= IMAGES_PATH."ChatHead.png"?>" />
            <div class="col-xs-50" style="height: 350px; overflow: auto;">
                <?PHP
                    $date=array();
                    $date[]= date('Y-m-d');
                    $date[]= date('Y-m-d', strtotime('-1 day', strtotime($date[0])));
                    $this->db->select('hot_pub_chat.id,chat, username, pro_img');
                    $this->db->join('users','users.user_id=hot_pub_chat.user_id');
                    $this->db->order_by("id", "desc");
                    $this->db->where_in('date',$date);
                    $qry=$this->db->get('hot_pub_chat');
                    foreach ($qry->result() as $chat){
                        ?>
                <div class="col-xs-50" style="margin: 10px;">
                    <?PHP
                        if($chat->pro_img!=""){
                            ?><img class="col-xs-7" src="<?= IMAGES_PATH."profile/".$chat->pro_img ?>" /><?PHP
                        }else{
                    ?>
                        <img class="col-xs-7" src="<?= IMAGES_PATH ?>profile_image.jpg" /><?PHP } ?>
                        <b><?=$chat->username?> : </b> <?= nl2br($chat->chat)?>
                </div>
                <?PHP
                    }
                ?>
            </div>
            <div  class="col-xs-50" style="margin: 10px;">
                <img class="col-xs-7" src="<?= IMAGES_PATH ?>profile_image.jpg" /><textarea id="myChat" class="col-xs-40 grborder" style="resize: none;" onkeyup="textAreaAdjust(this)" style="overflow:hidden" rows="2"></textarea>
            </div>
        </div>
        <div class="col-xs-50"><br></div>
        <div class="col-xs-50"><br></div>
        <?PHP 
            
              $this->db->where_in('loc', array('102', '103'));
              $this->db->order_by('loc', 'ASC');
              $add = $this->db->get('add')->result();
              foreach($add as $ad){
              if(isset($ad->img_path1)){
                        ?>
        <a href="<?=$ad->link;?>"><img src="<?= IMAGES_PATH . "advertisement/" . $ad->img_path1; ?>"  class="col-xs-50" style=" padding:10px;"/></a>
          <?php }
                     }
                ?>
        
    </div>
</div>
<script>
    function textAreaAdjust(o) {
        o.style.height = "1px";
        o.style.height = (25 + o.scrollHeight) + "px";
    }
    $(document).ready(function () {
        $("#imgUp").hide();
        $("#linkUp").hide();
        $(".upload").click(function (){
            //alert("");
            $("#"+$(this).attr("data-toggle")+"Up").show();
            /*$('#divUp').html("");
            var link = ""+$(this).attr("data-toggle");
            $.ajax({
                url: link
            }).done(function (data) {
                $('#divUp').html(data);
                return false;
            }).fail(function () {
                alert("error");
            });
            $(".close,.btn").click(function()
            {$(".modal").hide();});*/
        });
        $("#sentChat").click(function(){
            if($("#myChat").val()!=""){
                var postData = {};
                postData.value1 = $("#myChat").val();
                $.ajax({
                    url: "<?PHP echo site_url('hotJson'); ?>/addChat",
                    type: 'post',
                    dataType: 'html',
                    data: postData
                }).done(function (data) {
                    if(data!=""){
                        alert(data);
                        window.location.replace("<?= site_url('welcome/login?url=hotties')."/".$this->uri->segment(2); ?>");
                    }
                    else{
                        $("#myChat").val("");
                        location.reload();
                    }
                }).fail(function () {
                    alert("error");
                });
            }
        });
        $('#myChat').keypress(function (e) {
            if(e.which === 13) {
                var postData = {};
                postData.value1 = $("#myChat").val();
                $.ajax({
                    url: "<?PHP echo site_url('hotJson'); ?>/addChat",
                    type: 'post',
                    dataType: 'html',
                    data: postData
                }).done(function (data) {
                    if(data!=""){
                        alert(data);
                        window.location.replace("<?= site_url('welcome/login?url=hotties')."/".$this->uri->segment(2); ?>");
                    }
                    else{
                        $("#myChat").val("");
                        location.reload();
                    }
                }).fail(function () {
                    alert("error");
                });
            }
        });
        $('.comment').keypress(function (e) {
            if(e.which === 13) {
                var postData = {};
                postData.value1 = $(this).attr('id');
                postData.value2=$(this).val();
                $.ajax({
                    url: "<?PHP echo site_url('hotJson'); ?>/addComment",
                    type: 'post',
                    dataType: 'html',
                    data: postData
                }).done(function (data) {
                    alert(data);
                }).fail(function () {
                    alert("error");
                });
                e.preventDefault();
            }
        });
    });
    function login(msg){
    	alert(msg);
    	window.location.replace("<?= site_url('welcome/login?url=hotties')."/".$this->uri->segment(2); ?>");
    }
</script>