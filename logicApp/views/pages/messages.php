<div class="col-xs-50 col-xs-offset-1">
    <div class="col-xs-50 col-sm-20 col-md-12 search-box alpha">
        <ul>
            <?PHP
            foreach ($utypes as $utype) {
                echo "<li><a href='#' class='users' title='$utype->id'>$utype->name</a></li>";
            }
            ?>
        </ul>
    </div>
    <div class="col-xs-50 col-sm-30 col-md-38 alpha" id="userInfo">
        <?PHP
        if (isset($users)) {
            foreach ($users as $user) {
                ?>
                <div id="userInfo" class="col-xs-50 col-sm-30 col-md-15 box" style="margin: 3px 3px 3px 3px;">
                    <ul>
                        <li><b>Name:</b><?= $user->name; ?></li>
                        <li><b>Contact:</b><?= $user->phone; ?></li>
                        <li><b>email:</b><?= $user->email; ?></li>                           
                        <li><b>message:</b><textarea><?= $user->message; ?></textarea></li>
                    </ul>

                </div>
                <?PHP
            }
        }
        ?>        
    </div>
</div>
