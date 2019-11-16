<div class="clear"></div>
<center><h2 class="mb1" >User Register</h2></center>
<div class="col-xs-50 col-sm-50 col-md-50 col-lg-50 col-sm-offset-5">
    
    <?php
    if ($this->session->userdata('keralaonroads')) {
        redirect(base_url() . 'welcome');
    }
    ?>       
    <?php
    echo '<ul class="options">';
    $display = 'block';
    if (isset($_POST['submit'])) {
        if ($error == 0) {
            $display = 'none';
            echo '<li class="success">' . $data . '</li>';
        }
        if ($error > 0) {
            echo '<li >' . $data . '</li>';
        }
    }

    echo '</ul>';
    ?>
    <style>
        .name{
            line-height: 14px !important;
            padding-right:20px;
        }
    </style>

    <form class="blocks" method="post" id="form" action="<?= base_url() ?>welcome/register" style="display: <?= $display ?>;">
        <div class="col-xs-50">
            <div class="col-xs-23">

                <div class="col-xs-10 form-group">
                    <label class="name">Name</label>
                </div>	<div class="col-xs-34">  <input class="text form-control"  type="text" id="name" name="name" placeholder="Contact Name" required="required" />

                </div>	  
            </div>
            <div class="col-xs-23">

                <div class="col-xs-10 form-group">
                    <label class="name" for="email">Email:</label>
                </div>	<div class="col-xs-34">   <input placeholder="Enter Your User Name"   id="email" name="email" class="text form-control" type="email" required="required" />

                </div>  
            </div>
            <div class="col-xs-23">

                <div class="col-xs-10 form-group">
                    <label class="name" for="pass">Password:</label>
                </div>	<div class="col-xs-34">  <input placeholder="Enter Password Here"    type="password" name="pass" id="pass" class="text form-control" required="required" />

                </div>  
            </div>
            <div class="col-xs-23">

                <div class="col-xs-10 form-group">
                    <label class="name" for="rpass">Confirm:</label>
                </div>	<div class="col-xs-34">    <input placeholder="Confirm Password"  type="password" name="rpass" id="rpass" class="text form-control" required="required" />

                </div>  
            </div>

            <div class="col-xs-23">
                <div class="col-xs-10 form-group">
                    <label class="name">Phone</label>
                </div>	<div class="col-xs-34">     <input class="text form-control" type="text"  id="phone" name="phone" placeholder="Contact Phone Number" required="required" />

                </div>  
            </div>

            <div class="col-xs-23">
                <div class="col-xs-10 form-group">
                    <label class="name">Location</label>
                </div>	<div class="col-xs-34">    <input class="text form-control" type="text"   id="location" name="location" placeholder="Your Location" required="required" />
                    <!-- Selection from database  -->

                </div>  
            </div>

            <div class="col-xs-50">

                <input class="line" id="saveMyData"    type="checkbox" data-ga="remember-contact-information" checked="checked" required="required"><a href="<?=site_url('welcome/view/user_agrement')?>">I have read and agree to the terms & conditions of Keralaonroad.com.</a>

            </div>  
            <div class="col-xs-50">

                <div class="col-xs-10 form-group">
                    <label>&nbsp;</label>
                    <input type="submit" class="btn" value="Register" id="submit" name="submit" />
                </div>
                <div class="col-xs-38 form-group" style="color:#f00">
                	<h1 class="col-xs-3 glyphicon glyphicon-warning-sign" style"text-decoration:none; padding:0; margin:0;" aria-hidden="true"></h1>
                    <label class="col-xs-40" style="padding-top: 20px;">Depending on your personal spam filter settings it is possible the verification E-mail may be directed to your junk folder rather than your inbox. Please check in both.</label>
                </div>
            </div>
        </div>
    </form>

</div>
