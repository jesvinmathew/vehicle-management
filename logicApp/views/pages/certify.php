<div class="clearfix"></div>
<div style="padding:15px;"></div>
<div class="col-xs-48 col-xs-offset-1">
<div class="col-xs-10"></div>
<div class="col-xs-40">
<form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-xs-10 control-label">Certified By</label>
    <div class="col-xs-25">
   <select class="form-control option">
  <option  value="0">Select Please</option>
  <option value="-1">New</option>
  <?php if(isset($detail)){
 
  foreach($detail as $res)
  {
  ?>
  <option value="<?php echo $res->id ;?>"><?php echo $res->certifyby; ?> </option>
  <?php }}?>
 
</select>
    </div>
  </div>
  <div class="form-group cN" style="display:none;">
    <label for="inputPassword3" class="col-xs-10 control-label">Certifiers Name </label>
    <div class="col-xs-25">
      <input type="text" class="form-control certname" id="cert" name="cert" >
    </div>
  </div>
  <div class="form-group cN" style="display:none;">
    <label for="inputPassword3" class="col-xs-10 control-label">Provided </label>
    <div class="col-xs-25">
      <textarea class="form-control provid" rows="3"></textarea>
    </div>
  </div>
 <div class="form-group cN" style="display:none;">
    <center>
      <button type="button" class="btn btn-default submit">Update</button>
   </center>
  </div>
</form>
    <form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-xs-10 control-label">Dealer</label>
    <div class="col-xs-25">
   <select class="form-control dealer">
  <option  value="0">Select Please</option>
  <option value="-1">New</option>
</select>
    </div>
  </div>
  <div class="form-group cN1" style="display:none;">
    <label for="inputPassword3" class="col-xs-10 control-label">Seach Dealer </label>
    <div class="col-xs-25">
      <input type="email" class="form-control email"  >
   
    </div>
  </div>
     <div class="form-group cN1" style="display:none;" >
    <center>
        <input type="button" value="vhgvjh" name="search" class="btn btn-default search " >
   </center>
  </div>
      <div class="jsonDt" ></div>
    </form>
</div>
</div>