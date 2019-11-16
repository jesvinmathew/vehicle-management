<div class="col-xs-48 col-xs-offset-1">   
    <?php
    if ($this->uri->segment(3)) {
        $page = $this->uri->segment(3);
        $this->db->like('post_name', "$page");
        $this->db->limit(1, 0);
        $query = $this->db->get('wpposts');
        foreach ($query->result() as $row) {
            ?>
            
            <div class="col-xs-48" style='text-align: justify;'>
                <?= nl2br($row->post_content); ?>
            </div>
            <?php
        }
    }
    ?>
</div>