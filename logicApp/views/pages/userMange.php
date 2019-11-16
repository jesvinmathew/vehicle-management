<div class="col-xs-50 col-xs-offset-1">
    <div class="col-xs-50 col-sm-20 col-md-12 search-box alpha">
    
    
    <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
    Users
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
  	<?PHP
            foreach ($utypes as $utype) {
                echo "<li role='presentation'><a role='menuitem' tabindex='-1' href='#' class='users' title='$utype->uptype_id'>$utype->uptypename </a></li>";
            }
            ?>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="users" title="delapp">Dealer Head Approval</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="users" title="braapp">Dealer Branch Approval</a></li>
  </ul>
</div>
    <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">
    District
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
  	<?PHP
            foreach ($dist as $dis) {
                echo "<li role='presentation'><a role='menuitem' tabindex='-1' href='#' class='dis' title='$dis->place_id'>$dis->placename</a></li>";
            }
            ?>
  </ul>
</div>
<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-expanded="true">
    Admin users
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu3">
  	<li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="adusers" title="searchUser">new user</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="adusers" title="currentuser" id="currentuser">current user</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="adusers" onclick='adminTraffic()' title="admintraffic" id="usertraffic">admin traffic</a></li>
  </ul>
</div>

<input type="hidden" value="1" id="uTypeId" />
    </div>

    <div class="col-xs-50 col-sm-30 col-md-38 alpha" id="userInfo">
        <?PHP
        if (isset($users)) {
            foreach ($users as $user) {
                ?>
                <div id="userInfo" class="col-xs-50 col-sm-30 col-md-15 box" style="margin: 3px 3px 3px 3px;">
                    <ul>
                        <li><b>Name:</b><?= $user->username; ?></li>
                        <li><b>Contact number:</b><?= $user->contactno; ?></li>
                        <li><b>Location:</b><?= $user->location; ?></li>                           
                        <li><b>Ip:</b><?= $user->ipaddress; ?></li>
                    </ul>

                </div>
                <?PHP
            }
        }
        ?>        
    </div>
</div>