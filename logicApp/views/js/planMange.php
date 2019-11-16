<script>                
    $(document).ready(function(){
    	$(".upPlan").click(function(){
    		var id=$(this).attr("dataValu");
    		var postData = {};
    		postData.uptype_id = id;
            	postData.uptypename = $("#plan"+id).val();
            	postData.fees = $("#price"+id).val();
                postData.price = $("#amo"+id).val();
                postData.tax = $("#tax"+id).val();
            	postData.num_vehicle = $("#numVehi"+id).val();
            	postData.num_cars = $("#numCar"+id).val();
            	postData.num_bikes = $("#numBike"+id).val();
            	postData.life = $("#life"+id).val();
            	postData.vehicle_type = $("#type"+id).val();
            	$.ajax({
	                url: "<?=site_url("admin/updatePlan");?>",
	                type: 'post',
	                dataType: 'html',
	                data: postData
	      	}).done(function (data) {
	                alert(data);
	        }).fail(function () {
	                alert("error");
	        });
    	});
    });
</script>