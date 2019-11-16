<section>

  <p>
    <div class="holder4"></div>
      <hr>
        <div class="clear"></div>
            <ul id="itemContainer4">
                <?PHP
 $onroad_usedCar = $this->db->query("SELECT 
                `onroad_vehicle_details`.`pro_id`,`exp_prize`,`onroad_vehicle_images`.`image`,`title_name`,`companyname`,`model_name`,`kilo_meter` 
                 FROM `onroad_vehicle_details` left outer join
`onroad_company` on `onroad_vehicle_details`.`cmp_id`=`onroad_company`.`cmp_id` left outer join
`onroad_model` on `onroad_vehicle_details`.`model_id`=`onroad_model`.`model_id`  left outer join
`onroad_variant` on `onroad_vehicle_details`.`varient_id`=`onroad_variant`.`varient_id` left outer join 
`onroad_vehicle_images` on `onroad_vehicle_images`.`pro_id`=`onroad_vehicle_details`.`pro_id` 
where `onroad_vehicle_details`.`vtype_id`='1' and `onroad_vehicle_details`.`status`!='0'
group by `onroad_vehicle_images`.`pro_id`
order by `onroad_vehicle_details`.`pro_id` DESC LIMIT 21");


$i = 0;
if ($onroad_usedCar->num_rows() > 0)
{
                    foreach ($onroad_usedCar->result() as $usCar){
                        ?>
                <li>
                    <div class="col-xs-50 col-sm-15 col-md-15 col-lg-15 col-xs-offset-1 <?PHP echo ($i%3)?'':'alpha'; $i++;?> ">
                        <div class="block1">
                        <div class="img" style="background-image:url('<?php         if ($usCar->image!='')
        {
            $image = explode('.',trim($usCar->image));
            echo base_url().'assets/uploads/thumb/'.$image[0].'_thumb.'.$image[1];
        } else
        {
            echo IMAGES_PATH . '/4m.jpg';
        } ?>') ;">
        <div class="col-xs-15" style="padding:90px; padding-left:66px;">
        <a href="#myModal" class="btn details fullview" get="view" value="<?=$usCar->pro_id?>"  data-toggle="modal" data-target="#myModal" id="<?=$usCar->pro_id?>" >details</a>
        </div></div>
                          
                            <div class="title">
                                
                                    <?=$usCar->title_name?></br>
                                    <?=$usCar->companyname.'  '.$usCar->model_name?>
                                </a>
                                </a>
                            </div>
                          <?PHP echo $usCar->kilo_meter; ?>Km covered.
                            <div class="price">&#x20B9;<?PHP echo $usCar->exp_prize; ?><span></span></div>
                       
          		</div>
                    </div>
            </li>
             <?PHP
             }
             }
             ?>
        </ul>
       	<div class="clear"></div>
        </hr>
    </p>
</section>