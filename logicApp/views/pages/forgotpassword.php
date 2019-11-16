<div class="col-xs-50 col-sm-35 col-md-30 col-lg-25 col-sm-offset-5">
    <center><h2 class="mb1">Forgot Password</h2></center>

    <form class="blocks" method="post" id="form" action="<?= site_url('welcome/login') ?>">
        <?PHP
            if(isset($userData)){
                ?>
                <div class="col-xs-50">
                    <div class="col-xs-12 form-group">
                        <label class="name"  style="margin-right:25px;line-height: 13px;" for="newPass">New Password:</label>
                    </div>
                    <div class="col-xs-38"> 
                        <input placeholder="New Password" required="required"  id="newPass" name="newPass" class="text form-control" type="password" />
                    </div>
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-12 form-group">
                        <label class="name"  style="margin-right:25px;line-height: 13px;" for="conPass">Conform Password:</label>
                    </div>
                    <div class="col-xs-38"> 
                        <input placeholder="Conform Password" required="required"  id="conPass" name="conPass" class="text form-control" type="password" />
                    </div>
                </div>
                <div class="col-xs-50">
                    <a href="<?= site_url('welcome/register'); ?>">New User Sign Up</a>
                </div>
                <div class="col-xs-50">
                    <label>&nbsp;</label>
                    <input type="submit" class="btn" id="submit" name="submit" value="Reset Password" />
                </div>
                <?PHP
            }
            else{
        ?>
        <div class="col-xs-50">
            <div class="col-xs-12 form-group">
                <label class="name"  style="margin-right:25px;line-height: 13px;" for="usName">Email:</label>
            </div>	<div class="col-xs-38"> <input placeholder="Enter Your User Name" required="required"  id="userName" name="userName" class="text form-control" type="email" />
            </div>
        </div>               
        <div class="col-xs-50">
            <a href="<?= site_url('welcome/register'); ?>">New User Sign Up</a>
        </div>
        <div class="col-xs-50">
            <label>&nbsp;</label>
            <input type="submit" class="btn" id="submit" name="submit" value="Reset Password" />
        </div>
        <?PHP
            }
        ?>
    </form>
</div>