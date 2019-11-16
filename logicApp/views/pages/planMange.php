<div class="col-xs-48 col-xs-offset-1" style="overflow: auto;">
    <h2 class="col-xs-48">User Plans</h2>    
    <table align="center">
    	<tr>
    		<th>Name</th>
    		<th>Price</th>
                <th>Tax</th>
                <th>Total</th>
    		<th>Number of Vehicles</th>
    		<th>Number of cars</th>
    		<th>Number of bikes</th>
    		<th>Life</th>
    		<th>Vehicle Option</th>
    	</tr>
    <?php
    	foreach($plans as $plan){
    		?>
    		<tr>
    			<td><input type="text" value="<?= $plan->uptypename; ?>" id="plan<?=$plan->uptype_id;?>" /></td>
                        <td><input type="number" size="5" value="<?= $plan->price; ?>" id="amo<?=$plan->uptype_id;?>" /></td>
                        <td><input type="text" size="5" value="<?= $plan->tax; ?>" id="tax<?=$plan->uptype_id;?>" /></td>
                        <td><input type="number" size="5" value="<?= $plan->fees; ?>" id="price<?=$plan->uptype_id;?>" /></td>
    			<td><input type="number" value="<?=$plan->num_vehicle;?>" id="numVehi<?=$plan->uptype_id;?>" /></td>
    			<td><input type="number" value="<?=$plan->num_cars;?>" id="numCar<?=$plan->uptype_id;?>" /></td>
    			<td><input type="number" value="<?=$plan->num_bikes;?>" id="numBike<?=$plan->uptype_id;?>" /></td>
    			<td><input type="number" value="<?=$plan->life;?>" id="life<?=$plan->uptype_id;?>" /></td>
    			<td>
    				<select id="type<?=$plan->uptype_id;?>">
    					<option value="0" <?= ($plan->vehicle_type==0)? "selected='selected'":""?>>Free</option>
    					<option value="1" <?= ($plan->vehicle_type==1)? "selected='selected'":""?>>Bike</option>
    					<option value="2" <?= ($plan->vehicle_type==2)? "selected='selected'":""?>>Car</option>
    					<option value="3" <?= ($plan->vehicle_type==3)? "selected='selected'":""?>>Common</option>
    				</select>
    			</td>
    			<td>
    				<input type="button" class="upPlan btn" value="Update" dataValu="<?=$plan->uptype_id;?>" />
    			</td> 
    		</tr>
    		<?PHP
    	}
    ?>
    </table>
</div>