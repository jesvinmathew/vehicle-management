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
	<div class="image_stack" onclick="getSlider(<?=$name[0]->news_id;?>);">
	<?php 
		$i=$name[0]->news_id;
		$j=1;
		$qry=$this->db->get_where('newses',array('id'=>$i))->result();
		$heaad=$qry[0]->head;
		foreach($name as $nimag){
			if($i!=$nimag->news_id){
				$i=$nimag->news_id;
				$qry=$this->db->get_where('newses',array('id'=>$i))->result();
				$j=1;
				?>
				</div>
				<center class="col-lg-offset-15"><b><?= $heaad; ?></b></center>
				</div>
				<div class="col-xs-12" style="height: 200px; ">
				<div class="image_stack"  onclick="getSlider(<?=$i;?>);">
				<?PHP
				$heaad=$qry[0]->head;
			}
			if($j>3){
			continue;}
			?>
			<img id="photo<?= $j; ?>" class="stackphotos" src="<?= UPLOAD_PATH.'news/'.$nimag->name ; ?>"  >
			<?PHP
			$j++;
		}
	?>
        </div>
        <center><b><?= $heaad; ?></b></center>
        </div>
</div>