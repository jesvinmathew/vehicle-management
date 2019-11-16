<script type="text/javascript">

  $(document).ready(function () {

$(".v_option").click(function () {

            if ($(this).val() == '1') {
            $("#bike").removeClass("btn-danger");    
            $("#bike").addClass("btn-success");
                 $("#car").removeClass("btn-success");
                 $("#car").addClass("btn-danger");
                $("#car_make").hide();
                $("#bike_make").show();

            }
            else if ($(this).val() == '2')
            {
                $("#car").removeClass("btn-danger");    
            $("#car").addClass("btn-success");
                 $("#bike").removeClass("btn-success");
                 $("#bike").addClass("btn-danger");
                $("#bike_make").hide();
                $("#car_make").show();

            }
        });
       $(".brand").change(function () {
            var postData = {};
            postData.value1 = $(this).val();
            $.ajax({
                url: "<?PHP echo site_url('newjson'); ?>/getmodel",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                $.each(data, function (index, value) {
                    $('#model').append('<option value="' + value.id + '">' + value.content + '</option>');
                });
            });
        });
        $("#model").change(function () {
            var postData = {};
            postData.value1 = $(this).val();
            $.ajax({
                url: "<?PHP echo site_url('newjson'); ?>/getvariant",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                $.each(data, function (index, value) {
                    $('#variant').append('<option value="' + value.id + '">' + value.content + '</option>');
                });
            });
        });
        $("#variant").change(function () {
            var postdata = {};
                postdata.dist = $("#dist").val();
                if ($("#bike_make option:selected").length>0) {
            postdata.cmpid = $("#car_make").val();
            }
            else
            {
            postdata.cmpid = $("#bike_make").val();
            }
         
           $.ajax({
                    url: "<?= site_url('newjson'); ?>/get_dealer_dist",
                    type: 'post',
                    dataType: 'json',
                    data: postdata
                }).done(function (data) {
                
                    $("#dealer").html("");
                    $.each(data, function (index, value) {
                        $("#dealer").append('<option value="' + value.dealer_id + '">' + value.name + '</option>');
                    });
                });
        });
        
        
        
        
        $("#submitPrice").click(function () {
                var msg = "";
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if ($("#name").val() != "") {
                    msg += "Name:" + $("#name").val();
                    toname = $("#name").val();
                }
                else {
                    alert("Please enter Name");
                    return false;
                }
                if ($("#phone").val().length >= 10 && $("#phone").val().length <= 15) {
                    msg += "<br />Phone:" + $("#phone").val();
                }
                else {
                    alert("Please enter 10 digit phone");
                    return false;
                }
                if (emailReg.test($("#email").val()) && $("#email").val()!="") {
                    msg += "<br />Email:" + $("#email").val();
             
                }
                else {
                    alert("Please enter email id");
                    return false;
                }
                if ($(".brand").val() != "") {
                    msg += "<br />Brand:" + $(".brand option:selected").text();
                }
                else
                {
                    alert("Please enter the Brand");
                    return false;
                }
                if ($("#model").val() != "") {
                    msg += "<br />Model:" + $("#model option:selected").text(); 
                }
                else
                {
                    alert("Please enter the model");
                    return false;
                }
                if ($("#variant").val() != "") {
                    msg += "<br />Varient:" + $("#variant option:selected").text();
                }
                else {
                    alert("Please select variant");
                    return false;
                }
                if ($("#dealer").val() != "") {
                    msg += "<br />Dealer:" + $("#dealer option:selected").text();
                }
                else {
                    alert("Please select dealer");
                    return false;
                }
              
                if ($("#dist").val() != 0) {
                    msg += "<br />District:" + $("#dist option:selected").text();
                }
                else {
                    alert("Please select district");
                    return false;
                }                
                if ($("#prtdrive").prop('checked') == true) {
                    msg += "<br />Customer Need Test Drive";
                    if ($("#neTestAdd").val() != "") {
                        msg += "<br />Address:" + $("#neTestAdd").val();
                    }
                    else {
                        alert("Please enter your address");
                        return false;
                    }
                }
                if ($("#prloan").prop('checked') == true) {
                    msg += "<br />Customer Need Loan";
                }
                if ($("#msg").val() != "") {
                    msg += "<br />Message:" + $("#msg").val();
                }
                else {
                    alert("Please enter message");
                    return false;
                }
                if(!$("#prtems2").prop('checked') == true){
                    alert("Please accept the terms and conditions");
                    return false;
                }
                var postdata = {};
                postdata.msg = msg;
                $.ajax({
                    url: "<?= site_url('background'); ?>/vareq",
                    type: 'post',
                    dataType: 'html',
                    data: postdata
                }).done(function (data) {
                    alert(data);
                     window.location.href="<?php if($_GET['url']=='welcome'){
   echo site_url('welcome');
   
   } ?>";
                });
                
            });
        
        
        
        
        
        

});

</script>