<ul id="itemContainer6">
    <?PHP
    $this->db->select('hot_pub_chat.id,chat, username,  pro_img');
    $this->db->join('users', 'users.user_id=hot_pub_chat.user_id');
    $this->db->order_by("id", "desc");
    $this->db->limit(3, 0);
    $qry = $this->db->get('hot_pub_chat');
    foreach ($qry->result() as $chat) {
        ?>
        <li>
            <div class="col-xs-48 col-xs-offset-1">
                <?PHP
                        if($chat->pro_img!=""){
                            ?><img class="col-xs-15" src="<?= IMAGES_PATH."profile/".$chat->pro_img ?>" /><?PHP
                        }else{
                    ?>
                        <img class="col-xs-3" src="<?= IMAGES_PATH ?>profile_image.jpg" /><?PHP } ?>
                <b><?= $chat->username ?> : </b> <?= nl2br($chat->chat) ?>
            <div class="clear"></div>
            </div>
            <hr class="col-xs-50" style="border-top: solid 1px #cccccc; height: 1px;" />            
        </li>
        <?PHP
    }
    ?>
        <a href="<?= site_url('hotties') ?>" class="fright"><img src="<?= IMAGES_PATH ?>cat_button.png" /></a>

</ul>