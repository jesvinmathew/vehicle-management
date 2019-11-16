<div class="col-xs-48 col-xs-offset-1">
    <form method="POST" enctype="multipart/form-data">
        <div class="col-xs-50" style=" padding: 20px;">
            <div class="col-xs-15">
                <label>News Heading</label>
            </div>
            <div class="col-xs-35">
                <textarea  class="form-control" name="head" id="head" placeholder="News Heading" style="display:inline-block;  min-height:50px; width: 500px;"></textarea>
            </div>  
        </div>
        <div class="col-xs-50" style=" padding: 20px;">
            <div class="col-xs-15">
                <label>News</label>
            </div>
            <div class="col-xs-35">
                <textarea  class="form-control" name="news" id="news" placeholder="News" style="display:inline-block;  min-height:200px; width: 500px;"></textarea>
            </div>  
        </div>
        <div class="col-xs-50" style="padding:20px;">
            <div class="col-xs-15">
                <label>Upload Image Here</label>
            </div>
            <div class="col-xs-25">
                <input  class="form-control" name="userfile[]" id="image" type="file" multiple="" style="width: 500px;"  />
            </div>
            <div class="col-xs-10" style="float:right">
                <input type="submit" value="upload" class="form-control" style="width: 70px;" />
            </div>
        </div>
    </form>

    <?php
    $length = count($news);
    for ($i = 0; $i < $length; $i++) {
        echo' <div class="col-xs-18">';
        echo '<li style="overflow:hidden">' . $news[$i]->head . '</li>';
        echo '</div>';
        echo '<div class="col-xs-30">';
        echo '<div class="col-xs-30">';
        echo '<li  style="overflow:hidden">' . $news[$i]->news . '</li>';
        echo '</div>';
        echo '<div class="col-xs-15">';
        echo '<div class="col-xs-20 edit" data-id="' . $news[$i]->id . '">';
        echo'<a href="editnews?eid=' . $news[$i]->id . '" role="button" class="btn">edit</a>';
        echo '</div>';

        echo '<div class="col-xs-20 delete" data-id="' . $news[$i]->id . '" >';
        echo'<a href="manage?dimg=' . $news[$i]->id . '" role="button" class="btn" name="del">delete</a>';
        echo '</div>';

        echo '</div>';
        echo '</div>';
    }   //
    ?>

</div>
