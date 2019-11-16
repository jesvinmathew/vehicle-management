<div class="col-xs-48 col-xs-offset-1">
    <form method="POST" enctype="multipart/form-data">
        <div class="col-xs-50" style=" padding: 20px;">
            <div class="col-xs-15">
                <label>News Heading</label>
            </div>
            <div class="col-xs-35">
                <textarea  class="form-control" name="ehead" id="ehead" placeholder="News Heading" style="display:inline-block;  min-height:50px; width: 500px;"><?php echo $enews[0]->head; ?></textarea>
            </div>  
        </div>
        <div class="col-xs-50" style=" padding: 20px;">
            <div class="col-xs-15">
                <label>News</label>
            </div>
            <div class="col-xs-35">
                <textarea  class="form-control" name="enews" id="enews" placeholder="News" style="display:inline-block;  min-height:200px; width: 500px;"><?php echo $enews[0]->news; ?></textarea>
            </div>  
        </div>
        
        <div class="col-xs-50" style="padding:20px;">
            <div class="col-xs-15">
                <label>Upload New Image Here</label>
            </div>
            <div class="col-xs-25">
                <input  class="form-control" name="userfiles[]" id="images" type="file" multiple="" style="width: 500px;"  />
            </div>
            <div class="col-xs-10" style="float:right">
                <input type="submit" value="Update" class="form-control" style="width: 70px;" />
            </div>
        </div>

    </form>
</div>

