<?=  $this->load->view('js/calendar2.php'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        var sent=0;
        $(function () {
                $("#date").datepicker({
                    beforeShow: function () {
                        $("#date").datepicker("option", "changeYear", true);
                        $("#date").datepicker("option", "dateFormat", "dd-mm-yy");
                    },
                });
            });
        
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
        
        $("#variant").change(function () {
            $("#dealer11").html('<option value="0">Select</option>');
            var postdata = {};
            postdata.dist = $("#dist21").val();
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
                $("#dealer11").html("");
                $.each(data, function (index, value) {
                    $("#dealer11").append('<option value="' + value.dealer_id + '">' + value.name + '</option>');
                });
            });
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
                $('#model').html('<option value="">Select</option>');
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
                $('#variant').html('<option value="">Select</option>');
                $.each(data, function (index, value) {
                    $('#variant').append('<option value="' + value.content + '">' + value.content + '</option>');
                });
            });
        });

        $("#submitTestDricve").click(function () {
            var msg = "";
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if ($("#names").val() != "") {
                msg += "Name:" + $("#names").val();
              
            }
            else {
                alert("Please enter Name");
                return false;
            }
            if (emailReg.test($("#emails").val()) && $("#emails").val()!="") {
                msg += "<br />Email:" + $("#emails").val();
             
            }
            else {
                alert("Please enter Email");
                return false;
            }
            if ($("#addresss").val() != "") {
                msg += "<br />Address Line 1:" + $("#addresss").val();
            }
            else {
                alert("Please enter address");
                return false;
            }
            if ($("#add2").val() != "") {
                msg += "<br />Address Line 2:" + $("#add2").val();
            }
            if ($("#city").val() != "") {
                msg += "<br />City:" + $("#city").val();
            }
            else {
                alert("Please enter City");
                return false;
            }
            if ($("#dist21").val() != "") {
                msg += "<br />District:" + $("#dist21 option:selected").text();
            }
            else {
                alert("Please select district");
                return false;
            }
            if ($("#pin").val().length == 6 && $.isNumeric( $("#pin").val())) {
                msg += "<br />Pin:" + $("#pin").val();
            }
            else {
                alert("Please enter Pin");
                return false;
            }
            if ($("#mobile").val().length == 10 && $.isNumeric( $("#mobile").val())) {
                msg += "<br />Mobile Phone:" + $("#mobile").val();
            }
            else {
                alert("Please enter your 10 digit mobile  number");
                return false;
            }
            if ($("#lph").val() != "") {
                if ($("#lph").val().length == 11 && $.isNumeric( $("#lph").val())) {
                    msg += "<br />Land Phone:" + $("#lph").val();
                }
                else{
                    alert("Please enter your Land nuber number (with std code)");
                    return false;
                }
            }            

        if ($(".brand").val() != "") {
                    msg += "<br />Brand:" + $(".brand option:selected").text();
                }
                else {
                    alert("Please enter Brand");
                    return false;
                }        
        if ($("#model").val() != "") {
                    msg += "<br />Model:" + $("#model option:selected").text();
                }
                else {
                    alert("Please enter Model");
                    return false;
                }
                if ($("#variant").val() != "") {
                    msg += "<br />Variant:" + $("#variant option:selected").text();
                }
                else {
                    alert("Please enter Variant");
                    return false;
                }



       

         if ($("#dealer11").val() != "") {
                    msg += "<br />Dealer:" + $("#dealer11 option:selected").text();
                }
                else {
                    alert("Please select dealer");
                    return false;
                }

            if ($("#date").val() != "") {
                msg += "<br />Date:" + $("#date").val();
            }
            else {
                alert("Please enter date");
                return false;
            }
            if ($("#time").val() != "") {
                msg += "<br />Time:" + $("#time").val();
            }
            else {
                alert("Please enter time");
                return false;
            }
            if ($("#message").val() != "") {
                msg += "<br />Message:" + $("#message").val();
            }
            else {
                alert("Please enter Your message");
                return false;
            }
            if(!$("#temscon").is(':checked')){
                alert("Please accept the terms and cunditions");
                return false;
            }
            if(!sent){
                sent=1;
                var postdata = {};
                postdata.msg = msg;
                postdata.delId = <?= ((int) $this->uri->segment(3)) ? $this->uri->segment(3) : 0; ?>;
                $.ajax({
                    url: "<?= site_url('background'); ?>/bookTestDrive",
                    type: 'post',
                    dataType: 'html',
                    data: postdata
                }).done(function (data) {
                    sent=2;
                    alert(data);
                    window.location.href="<?php if($_GET['url']=='welcome'){
   echo site_url('welcome');
   
   } ?>";

                });
            }
            else if(sent==1){
                alert("Your request under processing");
            }
            else{
            	alert("Request already sent");
            }
        });
    });
</script>