<ul style="display: block;">
<?php
if($this->type!=0)
{
    $this->db->where('type', $this->type);
}
if(isset($this->vvalue) && $this->vvalue==1)
{
    $this->db->where('status', 1);
}
        $this->db->order_by("companyname","asc");
        $onroad_companyquery = $this->db->get('company');
        foreach ($onroad_companyquery->result() as $rowonroad_company)
        {
      ?>
   <li><label><input type="checkbox" <?php
                  if($this->input->get('company')== $rowonroad_company->cmp_id )
          {
          echo ' checked="checked" ';
		}
  
   ?> vehicle="<?=$rowonroad_company->type?>" class="checkme"  value="<?=$rowonroad_company->cmp_id?>" id="br<?=$rowonroad_company->cmp_id?>"/><?=$rowonroad_company->companyname?></label></li>
   <?php
     }
   ?>
</ul>    