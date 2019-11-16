<script src="<?PHP echo JS_PATH; ?>imgaeList.js"></script>
<script type="text/javascript" >
	function getSlider(id){
		var postdata = {};
                postdata.imgId = id;
		$.ajax({
                    url: "<?= site_url('hotties/imgsSlid'); ?>",
                    type: 'post',
                    dataType: 'html',
                    data: postdata
                }).done(function (data) {
                    $("#slider").html(data);
                });
	}
	$(document).ready(function(){
		getSlider(<?=$images[0]->user_id; ?>);
	});
</script>