<div class="col-xs-48 col-xs-offset-1">
    <div class="col-xs-50">
        <div class="page1_block1">
            <a href=""><img src="<?= IMAGES_PATH . "advertisement/adimage.jpg" ?>" class="col-xs-23 col-xs-offset-1"/></a>
        </div>
    </div>
    <div class="col-xs-50">
        <div class="col-xs-50 col-md-35">
            <div class="h1">Advertise With Us </div>
	<table id='exampletable' class="col-xs-50">
            <thead>
                <tr>
                    <th>Location</th>
                    <th>Type</th>
                    <th>Position</th>
                    <th>Duration</th>
                    <th>Specification</th>
                    <th>Contact us</th>
                </tr>
            </thead>
            <tbody>
                <?PHP
                    foreach ($ad as $add){
                        ?>
                <tr>
                    <td><?=$add->location;?></td><td><?=$add->type;?></td><td><?=$add->postion;?></td><td><?=$add->duration;?></td>
                    <td><a onclick="adDetails(<?= $add->id; ?>)" class="adDetails" data-target="#myModal" data-toggle="modal" href="#myModal">Details</a></td>
                    <td><a href="<?=site_url('ad/adRequest');?>"><img src="<?= IMAGES_PATH ?>adcontact.png" width="103" height="38" alt="contact"></a></td>
                </tr>
                        <?PHP
                    }
                ?>
            </tbody>
        </table>
        </div>
    </div>
</div>