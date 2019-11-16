<div class="col-xs-48 col-xs-offset-1">
    <div class="col-xs-50">
        <div class="page1_block1">
          <?PHP 
            
                    $this->db->where_in('loc', array('19', '20'));
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
    <div class="col-xs-50">
        <center><h2 class="mb1">User Plans Car</h2></center>
        <div class="col-xs-5"></div>
        <div class="pricing_table" style="padding:20px 7px 50px 7px;">

            <ul>
                <li>Plan</li>
                <li>Price</li>
                <li>Tax</li>
                <li>Total</li>
                <li>Total Vehicles</li>
                <li>Cars</li>
                <li>Bikes</li>
                <li>Added vehicle Life</li>
                <li>Email Alert</li>
                <li>SMS Alert</li>
            </ul>
            <?PHP
            foreach ($carPlan as $plans) {
                ?>
                <ul>
                    <li><?= $plans->uptypename ?></li>
                    <li>&#x20B9;<?= $plans->price ?></li>
                    <li><?= $plans->tax ?></li>
                    <li>&#x20B9;<?= $plans->fees ?></li>
                    <li><?= $plans->num_vehicle ?></li>
                    <li><?= $plans->num_cars ?></li>
                    <li><?= $plans->num_bikes ?></li>
                    <li><?= $plans->life ?> Days</li>
                    <li><image src="<?PHP echo IMAGES_PATH; ?>yes.png" width="30px;" /></li>
                    <li><image src="<?PHP echo IMAGES_PATH; ?>yes.png" width="30px;" /></li>
                    <li>
                        <?PHP
                        if (isset($user)) {
                            if ($user[0]->ac_type) {
                                ?>
                                <a class="btn" <?= ($user[0]->ac_type == $plans->uptype_id) ? " href='#'>Current Plan" : " href='" . site_url('welcome/upgrade') . "/" . $plans->uptype_id . "'>Activate Now"; ?></a>
                                <?PHP
                            } else {
                                ?>
                                <a class="btn"  href="#">not allow</a>
                                <?PHP
                            }
                        } else {
                            ?>
                            <a href="<?= site_url('welcome/login?url=welcome/plans'); ?>" class="btn" tittle="Login for activate the account">Login First</a>
                            <?PHP
                        }
                        ?>
                    </li>
                </ul>
    <?PHP
}
?>
        </div>
    </div>
    <div class="col-xs-50">
        <center><h2 class="mb1">User Plans Bike</h2></center>
        <div class="col-xs-5"></div>
        <div class="pricing_table" style="padding:20px 7px 50px 7px">

            <ul>
                <li>Plan</li>
                <li>Price</li>
                <li>Tax</li>
                <li>Total</li>
                <li>Total Vehicles</li>
                <li>Cars</li>
                <li>Bikes</li>
                <li>Added vehicle Life</li>
                <li>Email Alert</li>
                <li>SMS Alert</li>
            </ul>
<?PHP
foreach ($bikePlan as $plans) {
    ?>
                <ul>
                    <li><?= $plans->uptypename ?></li>
                    <li>&#x20B9;<?= $plans->price ?></li>
                    <li><?= $plans->tax ?></li>
                    <li>&#x20B9;<?= $plans->fees ?></li>
                    <li><?= $plans->num_vehicle ?></li>
                    <li><?= $plans->num_cars ?></li>
                    <li><?= $plans->num_bikes ?></li>
                    <li><?= $plans->life ?> Days</li>
                    <li><image src="<?PHP echo IMAGES_PATH; ?>yes.png" width="30px;" /></li>
                    <li><image src="<?PHP echo IMAGES_PATH; ?>yes.png" width="30px;" /></li>
                    <li>
    <?PHP
    if (isset($user)) {
        if ($user[0]->ac_type) {
            ?>
                                <a class="btn" <?= ($user[0]->ac_type == $plans->uptype_id) ? " href='#'>Current Plan" : " href='" . site_url('welcome/upgrade') . "/" . $plans->uptype_id . "'>Activate Now"; ?></a>
                                <?PHP
                            } else {
                                ?>
                                <a class="btn"  href="#">not allow</a>
                                <?PHP
                            }
                        } else {
                            ?>
                            <a href="<?= site_url('welcome/login?url=welcome/plans'); ?>" class="btn" tittle="Login for activate the account">Login First</a>
                            <?PHP
                        }
                        ?>
                    </li>
                </ul>
                        <?PHP
                    }
                    ?>
        </div>
    </div>
    <div class="col-xs-50">
        <br /><br/></div>
    <div class="col-xs-50">
        <div class="page1_block1">
            <?PHP 
                $this->db->where('loc', 21);
                $this->db->order_by('loc', 'ASC');
                    $add = $this->db->get('add')->result();
                    if(isset($add[0]->img_path1)){
                        ?>
                <a href="<?=$add[0]->link;?>"><img src="<?= IMAGES_PATH . "advertisement/" . $add[0]->img_path1; ?>" class="col-xs-49 col-xs-offset-1"/></a>
                    <?php }?>
        </div>
    </div>
</div>