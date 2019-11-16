<?PHP
                if(isset($vehicles)) {
                    foreach($vehicles as $vehicl){
                        ?>
<div class="box col-xs-50 col-sm-50 col-md-23 " style="height: 200px; margin: 1px">
    <?PHP  ;?>
                            <div class="col-xs-15 thumbnail ">
                                <img src="<?= UPLOAD_PATH.'thumb/'.strrev(implode(strrev('_thumb.'), explode('.', strrev($vehicl->image), 2))); ?>" />
                            </div>
                            <div class="col-xs-35">
                                
                                
                                <ul>
                                    <li>
                                        <h5><?= $vehicl->title_name; ?></h5>
                                    </li>
                                    
                                    <li>
                                        <?= $vehicl->companyname." - ".$vehicl->model_name."(".$vehicl->var_name.")"; ?>
                                    </li>
                                    <li>
                                        <a href="#myModal" class="btn details fullview" get="view" value="<?php echo $vehicl->pro_id; ?>"  data-toggle="modal" data-target="#myModal" id="<?php echo $vehicl->pro_id; ?>" >view</a>
                                        
                                            <a href="uvManage?block=<?php echo $vehicl->pro_id; ?>" id="block" role="button"  class="btn" name="block" >block</a>
                                       
                                        
                                        <a href="uvManage?del=<?= $vehicl->pro_id; ?>"  role="button"  class="btn" name="delete" >delete</a>
                                        <a href="<?= site_url('welcome/profile_edit')."?pid=$vehicl->pro_id" ?>">Edit</a>
                                    </li>
                                    <li>
                                        <a id="29" class="fullview" data-target="#myModal" data-toggle="modal" value="29" get="view" href="#myModal"></a>
                                    </li>
                                </ul>
                            </div>

                    </div> <?PHP 
                    
                }}
                    ?>
