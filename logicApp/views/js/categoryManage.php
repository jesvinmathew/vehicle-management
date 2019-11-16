<script type="text/javascript">
    $(document).ready(function () {
        if ($("#catagry").val()!="0") {
            if ($("#catagry").val() != "-1") {
                getdata("getProducts", $("#catagry").val(), 0, 0, 0);
            }
        }
        else {
            $("#cname").hide();
        }
        var gate=0;
        function getdata(path, value1, value2, value3, result) {
            if(gate==0){
            	gate=1;
	            var postData = {};
	            postData.value1 = value1;
	            postData.value2 = value2;
	            $("#"+value3).hide();
	            $.ajax({
	                url: "<?PHP echo site_url('json'); ?>/" + path,
	                type: 'post',
	                dataType: 'json',
	                data: postData
	            }).done(function (data) {
	                gate=0;
	                $("#"+value3).show('slow');
	                $("#product").html('<option value="0">Please select</option><option value="-1">New</option>');
	                $.each(data, function (index, value) {
	                    $("#product").append('<option value="' + value['id'] + '#' + value['price'] + '#' + value['discription'] + '#' + value['latest'] + '#' + value['status'] +'">' + value['name'] + '</option>');
	                });
	            });
	       }
	       else{
	       		alert("Processing Please wait. If it takes long time reload the page");
	       	}
        }
        $("#catagry").blur(function () {
            if ($(this).val()!="0") {
                $("#cname").show();
                $("#addc").html("Add");
                if ($(this).val() != -1) {
                    $("#addc").html("Updae");
                    $('#cata_name1').val($("#catagry option:selected").text());
                    pro = $(this).val().split('#');
                    $('#prio_C1').val(pro[1]);
                    $('#cat_id').val(pro[0]);
                    getdata("getProducts", $("#catagry").val(), 0, 'proDiv', 0);
                }
                else {
                    $('#cata_name1').val("");
                }
            }
        });
        $("#delc").click(function () {
            var postData = {};
            postData.delID = $("#catagry").val();
            $.ajax({
                type: "POST",
                url: "<?= site_url('AdminJson/deleteCata'); ?>",
                dataType: 'json',
                data: postData
            }).done(function (data) {
                alert(data['message']);
                location.reload();
            });
        });
        $("#product").click(function () {
            if ($(this).val() != "-1" && $(this).val() != "0") {
                $('#pro_name').val($("#product option:selected").text());
                pro1 = $("#product").val().split('#');
                $('#price').val(pro1[1]);
                $('#descib').val(pro1[2]);
                $('#pro_id').val(pro1[0]);
                $('#prio_P').val(pro1[4]);
                if(pro1[3]==1)
                	$('#lp').attr('checked', true);
                else
                	$('#lp').attr('checked', false);
            }
        });
        $("#addc").click(function () {
            if(gate==0){
	            var postData = {};
	            postData.name = $("#cata_name1").val();
	            postData.priority = $("#prio_C1").val();
	            if($("#subCat").prop('checked'))
	            	postData.subCat = 1;
	            else
	            	postData.subCat = 0;
	            postData.new = $("#catagry").val();
	            $.ajax({
	                type: "POST",
	                url: "<?= site_url('AdminJson/addCategory'); ?>",
                	dataType: 'json',
	                data: postData
	            }).done(function (data) {
	                gate==0;
	                alert(data['message']);
	                location.reload();
	            });
            }
            else{
            	alert("Processing Please wait. If it takes long time reload the page");
            }
        });

    });
</script>