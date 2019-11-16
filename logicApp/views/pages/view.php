<div class="col-xs-48 col-xs-offset-1">
    <div class="col-xs-50">
        <div class="page1_block1">
            <?PHP 
            if($this->uri->segment(3)=='about') {
            $this->db->where_in('loc', array('13', '14'));}
            elseif ($this->uri->segment(3)=='car-buying-tips') {
            $this->db->where_in('loc', array('22', '23'));}
            elseif ($this->uri->segment(3)=='bike-buying-tips') {
            $this->db->where_in('loc', array('31', '32'));}
            elseif ($this->uri->segment(3)=='banktearms'){
            $this->db->where_in('loc', array('58', '59'));}
            else
                   $this->db->where ('loc',0);   
                    $this->db->order_by('loc', 'ASC');
                    $add = $this->db->get('add')->result();
                    
                    foreach($add as $ad){
                    if(isset($ad->img_path1)){
                        ?>
                <a href="<?=$ad->link;?>"><img src="<?= IMAGES_PATH . "advertisement/" . $ad->img_path1; ?>" class="col-xs-23 col-xs-offset-1"/></a>
                    <?php }
                     }
                ?>
        </div>
    </div>
    <?php
    if ($this->uri->segment(3)) {
        $page = $this->uri->segment(3);
        $this->db->limit(1, 0);
        $query = $this->db->get_where('wpposts', array('post_name'=>$page, 'post_status'=>'publish'));
        foreach ($query->result() as $row) {
            ?>
            <h2><?= $row->post_title ?></h2> 
            <div class="col-xs-50" style='text-align: justify;'>
                <?= nl2br($row->post_content); ?>
            </div>
            <?php
        }
    }
    ?>
    <div class="col-xs-50">
        <div class="page1_block1">
            <?PHP if($this->uri->segment(3)=='about') {
                $this->db->where('loc', 15);}
                elseif($this->uri->segment(3)=='car-buying-tips') {
                $this->db->where('loc', 18);}
                elseif($this->uri->segment(3)=='bike-buying-tips') {
                $this->db->where('loc', 36);}
                elseif($this->uri->segment(3)=='banktearms'){
                $this->db->where('loc', 45);}
                else
                    $this->db->where('loc', 0);
                
                    $this->db->order_by('loc', 'ASC');
                    $add = $this->db->get('add')->result();
                    if(isset($add[0]->img_path1)){
                        ?>
                <a href="<?=$add[0]->link;?>"><img src="<?= IMAGES_PATH . "advertisement/" . $add[0]->img_path1; ?>" class="col-xs-49 col-xs-offset-1"/></a>
                    <?php }?>
        </div>
    </div>
</div>