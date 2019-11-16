<div  class="greeBg">    
    <div class="row columns">
        <div class="medium-12"></div>
        <div class="medium-6 medium-push-2">
            <form class="form-horizontal" role="form" method="post">
                <b>Category Management</b>                
                <label class="columns">
                    <div class="medium-4 columns">Select</div>
                    <div class="medium-8 columns">
                        <select name="catagry" id="catagry">
                            <option value="0">Select</option>
                            <option value="-1">New</option>
                            <?PHP
                            foreach($cat as $category){
                                echo"<option value='".$category->id."#".$category->priority."'> ".$category->name."</option>";
                            }
                            ?>
                        </select>
                    </div>
                </label>
                <label class="columns" id="cname">
                    <div class="medium-4 columns">Category Name</div>
                    <div class="medium-8 columns">
                        <input type="text" id="cata_name1" class="text-control" required name="catName" />
                    </div>
		    <div class="medium-4 columns">Add As sub Category</div>
                    <div class="medium-8 columns">
                        <input type="checkbox" name="subCat" id="subCat" value="1" />
                    </div>
                </label>
                <label class="columns">
                    <div class="medium-4 columns">Priority</div>
                    <div class="medium-8 columns">
                        <select name="prority" id="prio_C1">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="0">0</option>
                        </select>
                    </div>
                </label>
                <div class="columns">
                    <div class="medium-8 medium-push-2 columns">
                        <button type="button" id="addc" class="small round button columns medium-5">Update</button>
                        <button type="button" id="delc"  class="small round button columns medium-5">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div style="clear: both"></div>
    <div class="medium-6 medium-push-2" id="proDiv">
          <center><h3>Product</h3></center>
          <form class="form-horizontal" method="post" enctype="multipart/form-data">
         	<div class="form-group">
                <label class="medium-4 control-label">Product</label>
                <div class="medium-8">
                <select id="product" name="product" class="form-control">
                    <option value="0">Please select</option>
                    <option value="-1">New</option>
                      
                </select>
                </div>
            </div>
            
            <div class="form-group" id="pname">
                <label class="medium-4 control-label">Product name</label>
                <div class="medium-8">
                <input type="text" id="pro_name" name="pro_name" class ="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label class="medium-4 control-label">Price</label>
                <div class="medium-8">
                <input type="text" id="price" name="price" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label class="medium-4 control-label">Description</label>
                <div class="medium-8">
                <textarea id="descib" name="descib" class="form-control" ></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="medium-4 control-label">Browser</label>
                <div class="medium-8">
                <input type="file" id="brow" name="brow" class="form-control"/>
                </div>
            </div>
            <input type="hidden" id="cat_id" name="cat_id">
            <input type="hidden" id="pro_id" name="pro_id">
            <div class="form-group">
                <label class="medium-4 control-label">Image</label>
                <div class="medium-8">
                <input type="file" id="img" name="img" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label class="medium-4 control-label">Latest Product</label>
                <div class="medium-8">
                	<input type="checkbox" id="lp" name="lp" value="1" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label class="medium-4 control-label">Priority</label>
                <div class="medium-8">
                    <select id="prio_P" name="prio_P" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="0">3</option>
                </select>
                </div>
            </div>
            <div style="padding-left:350px;">
                <button type="submit" id="addp" name="update" value="update" class="btn btn-success">Update</button>
            <button type="submit" id="delp" name="delete" value="delete"  class="btn btn-danger">Delete</button>
   
            </div>
 
        </form>
    </div>
</div>



<div class="container">
    <div class="row content" style="padding-bottom: 0px;">         
        <div class="col-lg-3"></div>
        
    <div class="clearfix"></div>
    <div class="clearfix" style="padding: 2px;"></div>
    <div class="col-lg-12">
        <br />
    </div>
    </div>
</div>