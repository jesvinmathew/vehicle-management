<ul style="display: block;">
	<?php
	$onroad_vehicle_type_globalquery = $this->db->get('vehicle_type_global');
        $onroad_companyquery = $this->db->get('company');
        
        foreach ($onroad_companyquery->result() as $rowonroad_company){
        	?>
   		<li><label><input type="checkbox" class="checkme"  value="<?=$rowonroad_company->cmp_id?>" id="1"/><?=$rowonroad_company->companyname?></label></li>
  		<?php
     	}
   	?>
</ul>    
