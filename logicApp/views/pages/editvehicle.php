
<div class="bg1">
<div class="table-responsive">
<div class="alert alert-success ">Manage it</div>

 <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Company</th>
          <th>Model</th>
           <th>Approve</th>
        </tr>
      </thead>
      
      <?php
      if($this->uri->segment(5))
      {
        $from=($this->uri->segment(5))*10;
        $to=(($this->uri->segment(5))*10)-10;
      }
      else
      {
        $from=0;
        $to=10;
      }
      if($this->uri->segment(4)=='bike')
      {
        $vtype=1;
      }
      else
      if($this->uri->segment(4)=='car')
      {
        $vtype=2;
      }
      else
      {
          $vtype=2;
      }
      if($this->uri->segment(3)=='new')
      {
        $type=1;
      }
      else
      if($this->uri->segment(3)=='used')
      {
        $type=2;
    
      $query = $this->db->query("SELECT `onroad_vehicle_details`.`pro_id`,`onroad_vehicle_details`.`status`,`exp_prize`,`title_name`,`companyname`,`model_name`,`kilo_meter` 
                FROM `onroad_vehicle_details` left outer join `onroad_company` on `onroad_vehicle_details`.`cmp_id`=`onroad_company`.`cmp_id` 
                left outer join `onroad_model` on `onroad_vehicle_details`.`model_id`=`onroad_model`.`model_id`  
                left outer join `onroad_variant` on `onroad_vehicle_details`.`varient_id`=`onroad_variant`.`varient_id` 
                where `onroad_vehicle_details`.`vtype_id`='".$vtype."' order by `onroad_vehicle_details`.`pro_id` DESC limit ".$to.",".$from);
                
      $count=$query->num_rows;
      if( $query->num_rows()>0)
      {
      
      foreach ($query->result() as $row)
      {
        
          ?>
          <tbody>
          <tr>
          <td><?=  $row->pro_id?></td>
          <td><?=  $row->title_name?></td>
          <td><?=  $row->companyname?></td>
          <td><?=  $row->model_name?></td>
          <td><select class="form-control approve" ids="<?=  $row->pro_id?>" type="<?=$type?>">
          <?php
          if($row->status==1)
          {
            echo '<option selected value="1">Approve</option><option value="0">Reject</option> ';
          }
          else
          {
            echo '<option selected value="0">Reject</option>  <option value="1">Approve</option>';
          }
          ?>
          </select></td>
        </tr>
         
      </tbody>
          <?php
          
      }
      
      }
      else
      {
        echo 'Not Found';
      }
        }
      else
      {
          $type=2;
      }
      ?>
      
      </table>
      <?php
      if($this->uri->segment(5))
      {
        $previos=($this->uri->segment(5))-1;
      }
      else
      {
        $previos=1;
      }
      if($this->uri->segment(5))
      {
        $next=($this->uri->segment(5))+1;
      }
      else
      {
        $next=2;
      }
      ?>
      <ul class="pager" style="cursor: pointer;">
  <li class="previous" <?php
      if( ($this->uri->segment(5))<2 )
      {
        echo 'style="display:none"';
      }
      
      ?> value="0"><a href="<?= base_url()?>welcome/vehiclemanage/<?=$this->uri->segment(3)?>/<?=$this->uri->segment(4)?>/<?=$previos?>" >Previous</a></li>
  <li  class="next" <?php
      if($count<10)
      {
        echo 'style="display:none"';
      }
      
      ?> value="10" ><a href="<?= base_url()?>welcome/vehiclemanage/<?=$this->uri->segment(3)?>/<?=$this->uri->segment(4)?>/<?=$next?>"  >Next</a></li>
</ul>

      </div>
</div>