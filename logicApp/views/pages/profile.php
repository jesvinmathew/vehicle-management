    <div class="col-xs-50 col-xs-offset-1">
        <div class="page1_block">
                    <img src="<?= IMAGES_PATH . '/ad.jpg'; ?>" />
                </div>
        <h3>My Account</h3>
        <div class="col-xs-50 col-sm-20 col-md-12">
            <?PHP
            if(isset($profile)){
                if(!empty($profile[0]->pro_img)){
                    ?><img class="col-xs-15" src="<?= IMAGES_PATH."profile/".$profile[0]->pro_img ?>" /><?PHP
                }
                else{
                    ?><img class="col-xs-15" src="<?= IMAGES_PATH ?>profile_image.jpg" /><?PHP
                }
                ?><br><a href="#" id="changePicture">Change Profile Picture</a><?PHP
            }
            ?>
                <div class="col-xs-50" id="proPic">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="file" name="proImg" /><input type="submit" value="Change Image" />
                    </form>
                
                </div>
            <div class="col-xs-50 search-box alpha">
                <ul>
                    <li><a href="<?= site_url('welcome/profile');?> ">Profile</a></li>
                    <li><a href="<?= site_url('welcome/profile/myvehicle');?>">My Vehicles</a></li>
                    <li><a href="<?= site_url('welcome/profile/mylikes');?>">My likes</a></li>
                    <li><a href="<?= site_url('welcome/profile/chpassword');?>">Change Password</a></li>
                </ul>
            </div>
        </div>
        <div class="col-xs-50 col-sm-30 col-md-38">
            <?PHP
                if(isset($vehicles)) {
                    foreach($vehicles as $vehicl){
                        ?>
            <div class="box col-xs-50 col-sm-50 col-md-23 " style="height: 200px; margin: 1px">

                            <div class="col-xs-15 thumbnail ">
                                <img src="<?= UPLOAD_PATH.'thumb/'.strrev(implode(strrev('_thumb.'), explode('.', strrev($vehicl->image), 2))); ?>" />
                            </div>
                            <div class="col-xs-35">
                            <a href="<?= site_url('welcome/profile_edit')?>?pid=<?php echo $vehicl->pro_id?>" >edit</a>
                                <ul>
                                    <li>
                                        <h5><?= $vehicl->title_name; ?></h5>
                                    </li>
                                    <li>
                                        <?= $vehicl->companyname." - ".$vehicl->model_name."(".$vehicl->var_name.")"; ?>
                                    </li>
                                    <li>
                                        Year: <?=$vehicl->model_year?>  | Mileage: <?=$vehicl->millage?> Kms  | <?=$vehicl->kilo_meter?>
                                    </li>
                                    <li>
                                        <h6 class="col3">
                                            <u>
                                                Price: ₹ <?=$vehicl->exp_prize?>/-
                                            </u>
                                        </h6>
                                    </li>
                                    <li>
                                        <a id="29" class="fullview" data-target="#myModal" data-toggle="modal" value="29" get="view" href="#myModal"></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <?PHP
                    }
                }
                else if(isset($profile)){
                    ?>
            <form method="post">
            <div class="col-xs-24">
                <div class="col-xs-10 form-group">
                    <label class="name">First Name</label>
                </div>	
                <div class="col-xs-34">
                    <input class="text form-control" required="required" name="fname" type="text" id="fname" value="<?=$profile[0]->fname;?>" placeholder="First Name" />
                </div>
            </div>
            <div class="col-xs-24">
                <div class="col-xs-10 form-group">
                    <label class="name">Last Name</label>
                </div>	
                <div class="col-xs-34">
                    <input class="text form-control" required="required" name="lname" type="text" id="lname" value="<?=$profile[0]->lname;?>" placeholder="Last Name" />
                </div>
            </div>
            <div class="col-xs-24">
                <div class="col-xs-10 form-group">
                    <label class="name">Contact Name</label>
                </div>	
                <div class="col-xs-34">
                    <input class="text form-control" required="required"  type="text" id="cname" name="username" value="<?=$profile[0]->username;?>" placeholder="Contact Name" required="required" />
                </div>
            </div>
            <div class="col-xs-24">
                <div class="col-xs-10 form-group">
                    <label class="name">User id</label>
                </div>
                <div class="col-xs-34">
                    <input class="text form-control"  required="required" type="text" value="<?=$profile[0]->email;?>" disabled="disabled" />
                </div>
            </div>
            <div class="col-xs-24">
                <div class="col-xs-10 form-group">
                    <label class="name">Address</label>
                </div>	
                <div class="col-xs-34">
                    <textarea class="text form-control" id="address" name="address"  placeholder="Address" required="required" ><?=$profile[0]->address;?></textarea>
                </div>
            </div>
            <div class="col-xs-24">
                <div class="col-xs-10 form-group">
                    <label class="name">Contact No</label>
                </div>	
                <div class="col-xs-34">
                    <input class="text form-control"   name="contactno"   type="text" id="contactno" value="<?=$profile[0]->contactno;?>" placeholder="Contact Number" required="required" />
                </div>
            </div>
            <div class="col-xs-30">
                <div class="col-xs-34">
                    <input class="btn"  name="submit" type="submit" value="Update" />
                </div>
            </div>
        </form>    
                <?PHP
                }
                else{
                    ?>
            <div class="col-xs-30">
                <div class="col-xs-10 form-group">
                    <label class="name">Current Password</label>
                </div>	
                <div class="col-xs-34">
                    <input class="text form-control"  type="password" id="fname" placeholder="First Name" />
                </div>
            </div>
            <div class="col-xs-30">
                <div class="col-xs-10 form-group">
                    <label class="name">New Password</label>
                </div>	
                <div class="col-xs-34">
                    <input class="text form-control"  type="password" id="lname" placeholder="Last Name" />
                </div>
            </div>
            <div class="col-xs-30">
                <div class="col-xs-10 form-group">
                    <label class="name">Conform Password</label>
                </div>	
                <div class="col-xs-34">
                    <input class="text form-control"  type="password" id="cname" placeholder="Contact Name" required="required" />
                </div>
            </div>
            <div class="col-xs-30">
                <div class="col-xs-34">
                    <input class="btn"  type="submit" value="Change Password" />
                </div>
            </div>
                    <?PHP
                }
            ?>
        </div>
    </div>