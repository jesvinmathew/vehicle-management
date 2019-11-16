<?php 
if ($this->uri->segment(3) === 'newuser')
{
?><form method="post" id="target">
<div class="col-xs-10" style="padding:30px; padding-right: 4px;" >
<input type="email" id="serEmail" name="email" placeholder="enter email" class="form-control" >
</div>
<div class="col-xs-10" style="padding:10px;" >
<input type="submit" value="search" class="btn" id="serch">
</div> 
</form>
<?php
if(isset($getuser)){
if(isset($getuser[0]->email))
    {
    echo '<li>'.$getuser[0]->username.'</li>';
    echo '<li>'.$getuser[0]->email.'</li>';
    echo '<li>'.$getuser[0]->address.'</li>';
    echo '<li>'.$getuser[0]->contactno.'</li>';
    echo '<br/>';
    echo '<div class="col-xs-50">';
    echo '<div class="col-xs-24 col-xs-offset-7">';
    echo' <input type ="checkbox" id="chkBox1" name="chkBox1"> <label> manage things</label>';
    echo'</div>';
    echo '<div class="col-xs-24 col-xs-offset-7">';
    echo' <input type ="checkbox" id="chkBox2" name="chkBox2"> <label> manage things</label>';
    echo'</div>';
    echo '<div class="col-xs-24 col-xs-offset-7">';
    echo' <input type ="checkbox" id="chkBox3" name="chkBox3"> <label> manage things</label>';
    echo'</div>';
    echo '<div class="col-xs-24 col-xs-offset-7">';
    echo'<input type="button" class="btn" id="update" name=update value="update">';
    echo'</div>';
    echo'</div>';
}
else
echo "sorry unknown email";    
}}
elseif (($this->uri->segment(3) === 'currentuser')) {

foreach ($alluser as $users)
{
    echo'<li>'.$users->username .' </li>';
    echo'<li>'.$users->email .' </li>';
    echo'<li>'.$users->address .' </li>';
    echo'<li><a href="currentuser?eid=' . $users->utype_id. '" role="button" class="btn">delete</a></li>';
    echo'<br/>';
}
}

?>
