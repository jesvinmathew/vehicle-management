<div class="col-xs-48 col-xs-offset-1">
    <div class="page1_block1">
        <?PHP
        if ($this->uri->segment(3) == 'car') {
            $this->db->where_in('loc', array('79', '80'));
        } elseif ($this->uri->segment(3) == 'bike') {
            $this->db->where_in('loc', array('76', '77'));
        } else
            $this->db->where('loc', 0);
        $this->db->order_by('loc', 'ASC');
        $add = $this->db->get('add')->result();

        foreach ($add as $ad) {
            if (isset($ad->img_path1)) {
                ?>
                <a href="<?= $ad->link; ?>"><img src="<?= IMAGES_PATH . "advertisement/" . $ad->img_path1; ?>" class="col-xs-23 col-xs-offset-1"/></a>
            <?php
            }
        }
        ?>
    </div>
</div>
<?php
    $this->load->view('includes/sellvehicle');
?>
<div class="col-xs-48 col-xs-offset-1">
    <div class="page1_block1">
<?PHP
if ($this->uri->segment(3) == 'car') {
    $this->db->where('loc', 81);
} elseif (($this->uri->segment(3) == 'bike')) {
    $this->db->where('loc', 78);
} else {
    $this->db->where('loc', 0);
}
$this->db->order_by('loc', 'ASC');
$add = $this->db->get('add')->result();
if (isset($add[0]->img_path1)) {
    ?>
            <a href="<?= $add[0]->link; ?>"><img src="<?= IMAGES_PATH . "advertisement/" . $add[0]->img_path1; ?>" class="col-xs-49 col-xs-offset-1"/></a>    
        <?php } ?>
    </div>
</div>