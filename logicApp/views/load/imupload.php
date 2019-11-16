<html>
    <head>
        <script type="text/javascript" src="<?= JS_PATH; ?>multiupload.js"></script>
        <script src="<?= JS_PATH; ?>jquery-1.8.2.min.js"></script>
        <script type="text/javascript">
            var config = {
                support: "image/jpg,image/png,image/bmp,image/jpeg,image/gif", // Valid file formats
                form: "demoFiler", // Form ID
                dragArea: "dragAndDropFiles", // Upload Area ID
                uploadUrl: "<?=site_url('hotJson/uplodingImg');?>"
            }
            $(document).ready(function () {
                initMultiUploader(config);
            });
        </script>
        <style>
            .uploadArea{
                min-height:150px; 
                width:150px; 
                height:auto; 
                border:1px dotted #ccc; 
                padding:10px; 
                cursor:move; 
                margin-bottom:10px; 
                position:relative; 
                background: url(<?=IMAGES_PATH;?>plus-icon1.png) no-repeat center;
            }
            .uploadArea1{
                min-height:90px; 
                width:90px; 
                height:auto; 
                border:1px dotted #ccc; 
                padding:10px; 
                cursor:move; 
                margin-bottom:10px; 
                position:relative; 
                background:url(<?=IMAGES_PATH;?>/plus-icon1.png) no-repeat center;
            }
            .uploadArea h1{ 
                color:#666; 
                z-index:0; 
                text-align:center;
            }
            .dfiles{ 
                clear:both; 
                border:1px solid #ccc; 
                background-color:#E4E4E4; 
                padding:3px;  
                position:relative; 
                height:25px; 
                margin:3px; 
                z-index:1; 
                width:97%; 
                opacity:0.6; 
                cursor:default;
            }

            .invalid { 
                border:1px solid red !important; 
            }
            .buttonUpload { 
                display:inline-block; 
                padding: 7px 20px 7px 20px; 
                font-weight:bold; 
                text-align: center; 
                text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); 
                background-color: #0074cc; 
                -webkit-border-radius: 4px;-moz-border-radius: 4px; 
                border-radius: 4px; 
                border-color: #e6e6e6 #e6e6e6 #bfbfbf; 
                border: 1px solid #cccccc; color:#fff; 
            }
            .progress img{ 
                margin-top:7px; 
                margin-left:24px; 
            }
        </style>
        <link rel="stylesheet" href="<?= CSS_PATH; ?>dragdrop.css">
    </head>
    <body>
        <div class="grid_12">
        <h2>Upload images</h2>
      </div>
      <div class="grid_12 content" style="background:#d4ecff; padding-top:25px;">
        <div class="grid_4 bg111">
      	 <div class="grid_3 alpha">
          <div id="dragAndDropFiles" class="uploadArea"><b>Drag & Drop Images Here</b></div>
         </div>
         
		    <form name="demoFiler" id="demoFiler" enctype="multipart/form-data">
			  <input type="file" name="multiUpload" id="multiUpload" multiple />
			  <input type="submit" name="submitHandler" id="submitHandler" value="Upload" class="buttonUpload" />
		    </form>
		  <div class="progressBar"><div class="status"></div></div>
        </div>
        <div class="grid_3 tooltip omega">
        	<ul>
            <li>Use original photos in .jpg, .gif or .png</li>
            <li>Choice to add multiple image files.</li>
            <li>Avoid low resolution images</li>
            </ul>
        
        </div>
      </div>
    </body>
</html>