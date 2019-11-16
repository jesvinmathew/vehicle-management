<div class="col-xs-48 col-xs-offset-1">
    
        <?PHP
        if(isset($account[0],$new[0],$current[0])){
        ?>
    <div class="col-xs-50">
        <center><h2 class="mb1">Verify The Information</h2></center>
        <div class="col-xs-5"></div>
        <div class="pricing_table" style="padding:20px 7px 50px 7px;">
            <ul>
                <li>Name:</li>
                <li>Email id</li>
                <li>Place</li>
                <li>Contact Number</li>
                <li>Profile Created</li>
            </ul>
            <ul>
                    <li><?= $account[0]->username ?></li>
                    <li title="<?= $account[0]->email ?>"><?= $account[0]->email ?></li>
                    <li><?= $account[0]->location ?></li>
                    <li><?= $account[0]->contactno ?></li>
                    <li><?= $account[0]->created_at ?></li>
            </ul>
        </div>
        <div class="pricing_table" style="padding:20px 7px 50px 7px;">
            <ul>
                <li></li>
                <li>Plan</li>
                <li>Price</li>
                <li>Total Vehicles</li>
                <li>Cars</li>
                <li>Bikes</li>
                <li>Added vehicle Life</li>
                <li>Email Alert</li>
                <li>SMS Alert</li>
            </ul>
            <ul>
                <li>Current Plan</li>
                <li><?= $current[0]->uptypename ?></li>
                <li>&#x20B9;<?= $current[0]->fees ?></li>
                <li><?= $current[0]->num_vehicle ?></li>
                <li><?= $current[0]->num_cars ?></li>
                <li><?= $current[0]->num_bikes ?></li>
                <li><?= $current[0]->life ?> Days</li>
                <li><image src="<?PHP echo IMAGES_PATH; ?>yes.png" width="30px;" /></li>
                <li><image src="<?PHP echo IMAGES_PATH; ?>yes.png" width="30px;" /></li>
            </ul>
            <ul>
                <li>New Plan</li>
                <li><?= $new[0]->uptypename ?></li>
                <li>&#x20B9;<?= $new[0]->fees ?></li>
                <li><?= $new[0]->num_vehicle ?></li>
                <li><?= $new[0]->num_cars ?></li>
                <li><?= $new[0]->num_bikes ?></li>
                <li><?= $new[0]->life ?> Days</li>
                <li> <image src="<?PHP echo IMAGES_PATH; ?>yes.png" width="30px;" /> </li>
                <li><image src="<?PHP echo IMAGES_PATH; ?>yes.png" width="30px;" /></li>
                <il>
                    <form method="post">
                        <input type="hidden" name="user" value="<?= $account[0]->user_id;?>" />
                        <input type="hidden" name="plan" value="<?= $new[0]->uptype_id;?>" />
                        <input type="submit" class="btn" value="Pay Now" />
                    </form>
                </il>
            </ul>
            
            
        </div>
    </div>
    <?PHP
}
?>
</div>
    