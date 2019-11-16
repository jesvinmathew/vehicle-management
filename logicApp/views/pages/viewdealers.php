<div class="bg">
    <div class="content">
        <div class="container">
            <div class="col-xs-50">
                <?php
                if(isset($_GET['company'])){
                    if(isset($_GET['district'])){
                        
                    }
                    elseif(isset($_GET['dealer'])){
                        
                    }
                    else{
                        ?>
                <div class="col-xs-25">
                        <?PHP
                        $query = $this->db->get_where('dealer', array('company_id' => $this->input->get('company'),'status'=>1));
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $row) {
                                ?>
                                <div class="col-xs-5">
                                    <a href="<?= base_url() ?>welcome/viewdealers?company=<?= $this->input->get('company')?>&dealer=<?= $row->id;?>">
                                        <?PHP
                                        if($row->logo!=""){?>
                                            <img src="<?= IMAGES_PATH."dealers/thumb/".str_replace('.', '_thumb.', $row->logo) ?>" />
                                            <?PHP
                                        }?>
                                        <h3><?= $row->name; ?></h3>
                                    </a>
                                </div>
                                <?php
                            }
                        } else {
                            echo 'Not Found';
                        }
                        ?>
                </div>
                <div class="col-xs-25">
                    <?PHP
                        $this->db->select('dealer_branch.name,address,district_id,ph1,ph2,dealer_branch.email,placename');
                        $this->db->order_by("district_id",'ASC');
                        $this->db->join("dealer",'dealer.id = dealer_branch.dealer_id');
                        $this->db->join("place",'place.place_id = dealer_branch.dealer_id');
                        $query = $this->db->get_where('dealer_branch', array('company_id' => $this->input->get('company'),'dealer.company_id' =>$this->input->get('company')));
                        if ($query->num_rows() > 0) {
                            $disId=0;
                            foreach ($query->result() as $row) {
                                if($disId!=$row->district_id){
                                    $disId=$row->district_id;
                                    echo "<label>$row->placename</label>";
                                }
                            }
                        }
                        else{
                            echo "no result";
                        }
                        ?>
                </div>
                <?PHP
                }
                }else {
                    $this->db->join('company', 'company.cmp_id = dealer.company_id', 'LEFT OUTER');
                    $query = $this->db->get_where('dealer', array('dealer.status'=>1));
                    if ($query->num_rows() > 0) {
                        foreach ($query->result() as $row) {
                            ?>
                            <div class="col-xs-5">
                                <a href="<?= base_url() ?>welcome/viewdealers?company=<?= $row->cmp_id ?>">
                                    <img src="<?= IMAGES_PATH."companies/thumb/".str_replace('.', '_thumb.', $row->image) ?>" />
                                    <h3><?= $row->companyname; ?></h3>
                                </a>
                            </div>
                            <?php
                        }
                    } else {
                        echo 'Not Found';
                    }
                }
                ?>

            </div>
        </div>
    </div> 
</div>