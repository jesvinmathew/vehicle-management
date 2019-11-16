<div class="bg">
    <div class="col-xs-48 col-xs-offset-1">
    	<table>
    		<tr>
    			<th class="col-xs-7">Name</th>
    			<th class="col-xs-7">Email</th>
    			<th class="col-xs-7">Mobile</th>
    			<th class="col-xs-7">Model</th>
    			<th class="col-xs-7">Variant</th>
    			<th class="col-xs-7">Model Year</th>
    			<th></th>
    		</tr>
    		
        <?PHP
        foreach($enqu as $en){
            ?>
        <tr>
        	<td><?=$en->name;?></td>
        	<td><?=$en->email;?></td>
        	<td><?=$en->mob_number?></td>
        	<?PHP
        		if($en->new_vehi){
        			$model=$en->model;
        			$variant=$en->variant;
        		}
        		else{
        			$res=$this->db->get_where('model',array('model_id'=>$en->model))->result();
        			$model=isset($res[0]->model_name)?$res[0]->model_name:$en->model;
        			$res=$this->db->get_where('variant',array('varient_id'=>$en->variant))->result();
        			$variant=isset($res[0]->var_name)?$res[0]->var_name:$en->variant;        			
        		}
        	?>
        	<td><?=$model;?></td>
        	<td><?=$variant;?></td>
        	<td><?=$en->modyear;?></td>
        	<td><a href="<?=site_url('insurance/enqueryInfo/'.$en->id)?>">Get details</a></td>
        	
        </tr>
            <?PHP
        }
        ?>
        </table>
    </div>
</div>