<html>
    <head>
        <script src="<?= JS_PATH; ?>jquery-1.8.2.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#linkadd").click(function(){
                    if($("#link").val()){
                        var postData = {};
                        postData.value1 = $("#link").val();
                        $.ajax({
                            type:"POST",
                            url:'<?=site_url('hotJson/uplodingLink');?>',
                            data:postData
                        }).done(function (data) {
                            alert(data);
                            $("#link").val("")
                        });
                    }                        
                });
            });
        </script>
    </head>
    <body>
        <div class="grid_12 content" style="background:#d4ecff; padding-top:25px;">
            <label>Link:</label><input type="text" id="link" /> <input type="button" id="linkadd" value="Add Link" class="btn" />
        </div>
    </body>
</html>