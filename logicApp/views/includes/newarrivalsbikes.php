<div class="holder1"></div>
<hr>
<div class="clear"></div>
<ul id="itemContainer1">
    <?PHP
    $this->db->join('model_images', 'model.model_id = model_images.model_id', 'FULL');
    $this->db->join('company', 'model.cmp_id = company.cmp_id', 'FULL');
    $this->db->group_by("model.model_id");
    $this->db->order_by("model.model_id", 'DESC');
    $this->db->limit(21);
    $this->db->where_in('model.status', array(1, 2));
    $onroad_usedCar = $this->db->get_where('model', 'model.vtype_id = 1');
    /* $this->db->join('model_images', 'model.model_id = model_images.model_id','FULL');
      $this->db->join('company', 'model.cmp_id = company.cmp_id','FULL');
      $this->db->group_by("model.model_id");
      $array = array( 'model.status' => 1,'model.vtype_id'=>1);
      $onroad_usedCar = $this->db->get_where('model',$array); */
    $i = 0;
    if ($onroad_usedCar->num_rows() > 0) {
        foreach ($onroad_usedCar->result() as $usCar) {
            ?>
            <li>
                <div class="col-xs-50 col-sm-15 col-md-15 col-lg-15 col-xs-offset-1 <?PHP echo ($i % 3) ? '' : 'alpha';
        $i++;
        ?> ">
                    <div class="block1" >

                        <div class="img" style="background-image:url('<?php
                        if ($usCar->model_image != '') {
                            $image = explode('.', trim($usCar->model_image));
                            echo base_url() . 'assets/images/newvehicles/thumbs/' . $image[0] . '_thumb.' . $image[1];
                        } else {
                            echo IMAGES_PATH . '/4m.jpg';
                        }
                        ?>') ;">
                         <div class="col-xs-15" style="padding:90px; padding-left:60px;">
                        <a href="#myModal" class="btn details fullview" get="viewnew" value="<?= $usCar->model_id ?>"  data-toggle="modal" data-target="#myModal" id="<?= $usCar->model_id ?>" >details</a> </div></div>
                        <div class="title">
                            
                                <?= $usCar->model_name ?></br>
                                <?= $usCar->companyname ?>
                            </a>
                        </div>


                        
                    </div>
                </div>
            </li>
        <?PHP }
    }
    ?>
</ul>