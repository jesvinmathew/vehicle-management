<div class="col-xs-48 col-xs-offset-1">
    <div class="col-xs-50">
        <div class="page1_block1">
            <?PHP 
            if($this->uri->segment(3)=='used'&&$this->uri->segment(4)=='car') {
            $this->db->where_in('loc', array('61', '62'));}
            elseif($this->uri->segment(3)=='used'&&$this->uri->segment(4)=='bike')
                {
            $this->db->where_in('loc', array('64', '65'));}
            elseif($this->uri->segment(3)=='new'&&$this->uri->segment(4)=='car')
                {
            $this->db->where_in('loc', array('67', '68'));}
            elseif($this->uri->segment(3)=='new'&&$this->uri->segment(4)=='bike')
                {
            $this->db->where_in('loc', array('70', '71'));}
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
    <div class="clear"></div>
    <div id="mainbox">
        <div class="subheader">
        <?php if($this->uri->segment(3)=='used'){
            $print= 'Pre Owned';
            }
	 else {
      	$print= 'New';
		 }
            ?>
            <p><?= $print ?> <?= $this->uri->segment(4) ?> Dealers In Kerala</p>
            <input type="hidden" id="condition" value="<?= $this->uri->segment(3) ?>" />
            <input type="hidden" id="vehicle" value="<?= $this->uri->segment(4) ?>" />
            <input type="hidden" id="placeId" value="<?= $place[1]->place_id; ?>" />
            <input type="hidden" id="pagNum" value="1" />
        </div>
        <?PHP
        if(isset($place)){
            ?> 
            <div class="col-xs-50 col-sm-15 borderBox">
                <div class="col-xs-50 tittle">Select a Place<br/> </div>
                <div class='col-xs-50'><br /></div>
                <?PHP
                    foreach($place as $key=>$val){
                        ?>
                        <div place="<?= $val->place_id ?>" placename="<?= $val->placename; ?>" class="col-xs-50 placename <?PHP 
                            if($key===1){
                                echo "active";
                            }
                        ?>">
                            <h4><?= $val->placename ?></h4>
                        </div><?PHP
                    }?>
            </div>
        <div class="col-xs-50 col-sm-19" id="divSecond"> 
            <div class="col-xs-50 tittle">
            	<?PHP 
            		if($this->uri->segment(3)=="used")
            			echo "Select Dealer";
            		else
            			echo "Select Brands";
            	?> 
            </div>
            <div>
                <?PHP
                if(isset($brands))
                foreach($brands as $brand){
                    ?><div onclick=" companydealers(<?= "$brand->cmp_id,'$brand->companyname'";?> ) " class='col-xs-15 col-xs-offset-1 company borderBox' style='height: 100px;'><p align='center'><img height='70px' src='<?= IMAGES_PATH."/companies/$brand->image";?>' /><br /><?= $brand->companyname;?></p></div><?PHP
                }
                if(isset($delers))
                foreach($delers as $brand){
                    ?><a href="#">

    <div class="col-xs-48 col-xs-offset-1" onclick="dealerpageLoad(<?= $brand->branch_id?>)">

        <h4><?= $brand->name?></h4>
        <p>
            <?= nl2br($brand->address); ?>
        </p>
    </div>

</a><?PHP
                }
                ?>
                <div class='col-xs-50'><ul class='pagination bootpag'><li class='prev'><a href='javascript:delerPage(0)'>1</a></li>
                    <li class='prev'><a href='javascript:delerPage(2)'>2</a></li>
                    <li class='prev'><a href='javascript:delerPage(2)'> Next </a></li>
                    </ul></div>
            </div>
        </div>
            <div class="col-xs-50 col-sm-16 borderBox" style="min-height: 942px; background: #fff;" id="divthrd">
                
            </div>
            <?PHP
        }
        ?>
        <div class="clear"></div>
    </div>
    <div class="col-xs-50">
        <div class="page1_block1">
            <?PHP if(($this->uri->segment(3)=='used')&& ($this->uri->segment(4)=='car')){
                $this->db->where('loc', 54);}
                elseif(($this->uri->segment(3)=='used')&& ($this->uri->segment(4)=='bike')){
                $this->db->where('loc', 57);}
                elseif(($this->uri->segment(3)=='new')&& ($this->uri->segment(4)=='car')){
                $this->db->where('loc', 60);}
                elseif(($this->uri->segment(3)=='new')&& ($this->uri->segment(4)=='bike')){
                $this->db->where('loc', 63);}
                else{
                $this->db->where('loc', 0);
                }
                    $this->db->order_by('loc', 'ASC');
                    $add = $this->db->get('add')->result();
                    if(isset($add[0]->img_path1)){
                        ?>
                    <a href="<?=$add[0]->link;?>"><img src="<?= IMAGES_PATH . "advertisement/" . $add[0]->img_path1; ?>" class="col-xs-48 col-xs-offset-1"/></a>    
                    <?php }?>
        </div>
    </div>
</div>