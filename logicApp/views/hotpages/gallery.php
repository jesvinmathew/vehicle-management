<div class="col-xs-30" id="slider">
		
	</div>
	<div class="col-xs-20">
		<div class="col-xs-50">
		<br />
		</div>
		<img src="/assets/images/advertisement/ad_right22.png" class="col-xs-48 col-lg-offset-1"></img>
	</div>
	<div class="col-xs-50">	
	<div class="col-xs-12" style="height: 200px; ">
	<div class="image_stack" onclick="getSlider(<?=$images[0]->user_id;?>);">
	<?php 
		$i=$images[0]->user_id;
		$j=1;
		$qry=$this->db->get_where('users',array('user_id'=>$i))->result();
		$heaad=$qry[0]->username;
		foreach($images as $nimag){
			if($i!=$nimag->user_id){
				$i=$nimag->user_id;
				$qry=$this->db->get_where('users',array('user_id'=>$i))->result();
				$j=1;
				?>
				</div>
				<center class="col-lg-offset-15"><b><?= $heaad; ?></b></center>
				</div>
				<div class="col-xs-12" style="height: 200px; ">
				<div class="image_stack"  onclick="getSlider(<?=$i;?>);">
				<?PHP
				$heaad=$qry[0]->username;
			}
			if($j>3){
			continue;}
			?>
			<img id="photo<?= $j; ?>" class="stackphotos" src="<?= HOT_UPLOADS.'post/'.$nimag->datainfo ; ?>"  >
			<?PHP
			$j++;
		}
	?>
        </div>
        <center class="col-lg-offset-15"><b><?= $heaad; ?></b></center>
        </div>
</div>


