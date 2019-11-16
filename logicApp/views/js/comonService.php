<?= $this->load->view('js/calendar2.php'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $(function () {
            $("#date").datepicker({
                beforeShow: function () {
                    $("#date").datepicker("option", "changeYear", true);
                    $("#date").datepicker("option", "dateFormat", "dd-mm-yy");
                },
            });
        });
        $(".km").hide();
        $("#free").click(function () {
            if ($("#free").prop('checked') == true) {
                $(".paid").hide();
                $(".km").show();
            }
            else {
                $(".paid").show();
                $(".km").hide();
            }
        });
        $("#paid").click(function () {
            if ($("#paid").prop('checked') == true) {
                $(".free").hide();
                $(".km").show();
            }
            else {
                $(".free").show();
                $(".km").hide();
            }
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
        $("#variant11").change(function () {
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
        $("#model").change(function () {
            var postData = {};
            postData.value1 = $(this).val();
            $.ajax({
                url: "<?PHP echo site_url('newjson'); ?>/getvariant",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                $('#variant11').html('<option value="">Select</option>');
                $.each(data, function (index, value) {
                    $('#variant11').append('<option value="' + value.content + '">' + value.content + '</option>');
                });
            });
        });
        $("#submitService").click(function () {
            var msg = "";
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if ($("#name1").val() != "") {
                msg += "Name:" + $("#name1").val();
            }
            else {
                alert("Please enter Name");
                return false;
            }

            if ($("#email1").val() != "" && emailReg.test($("#email1").val())) {
                msg += "<br />Email:" + $("#email1").val();
            }
            else {
                alert("Please enter Email");
                return false;
            }

            if ($("#address1").val() != "") {
                msg += "<br />Address:" + $("#address1").val();
            }
            else {
                alert("Please enter address");
                return false;
            }
            if ($("#city1").val() != "") {
                msg += "<br />City:" + $("#city1").val();
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
            if ($("#lph").val() != "") {
                if ($("#lph").val().length == 11 && $.isNumeric($("#lph").val())) {
                    msg += "<br />Land Phone:" + $("#lph").val();
                }
                else {
                    alert("Please enter your Land nuber number (with std code)");
                    return false;
                }
            }
            if ($("#mobile1").val().length == 10 && $.isNumeric($("#mobile1").val())) {
                msg += "<br />Mobile Phone:" + $("#mobile1").val();
            }
            else {
                alert("Please enter your 10 digit mobile  number");
                return false;
            }
            if ($("#absent").prop('checked') == true) {

                msg += "<br />Customer vehicle not in the list!";
            }
            else
            {
                if ($(".brand").val() != "") {
                    msg += "<br />Brand:" + $(".brand").val();
                }
                else {
                    alert("Please enter brand");
                    return false;
                }
                if ($("#model").val() != "") {
                    msg += "<br />Model:" + $("#model").val();
                }
                else {
                    alert("Please enter model");
                    return false;
                }
                if ($("#variant11").val() != "") {
                    msg += "<br />Variant:" + $("#variant11").val();
                }
                else {
                    alert("Please enter variant");
                    return false;
                }
                if ($("#dealer11").val() != "") {
                    msg += "<br />dealer:" + $("#dealer11").val();
                }
                else {
                    alert("Please enter dealer");
                    return false;
                }
            }
            if ($("#year").val() != "") {
                msg += "<br />Year:" + $("#year").val();
            }
            else {
                alert("Please Select year");
                return false;
            }
            if ($("#regno").val() != "") {
                msg += "<br />Register No:" + $("#regno").val() + "<br />";
            }
            else {
                alert("Please enter Register No");
                return false;
            }
            if ($("#free").prop('checked') == true) {
                msg += "Type of service is free";
            }
            if ($("#paid").prop('checked') == true) {
                msg += "Type of service is paid";
            }
            if (!($("#free").prop('checked') == true || $("#paid").prop('checked') == true)) {
                alert("Plese select service type");
                return false;
            }
            if ($("#km").val() != "") {
                msg += "<br />Km covered:" + $("#km").val();
            }
            else {
                alert("Please enter the km covered");
                return false;
            }
            if ($("#pickup").prop('checked') == true) {
                msg += "<br />Need Pick Up  And Drop";
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
                msg += "<br /><b>Message</b> <br />" + $("#message").val();
            }
            else {
                alert("Please enter work details");
                return false;
            }

            if (!$("#temsconBser").prop('checked') == true) {
                alert("Please accept the terms and cunditions");
                return false;
            }
            var postdata = {};
            postdata.msg = msg;
            $.ajax({
                url: "<?= site_url('background'); ?>/bookService",
                type: 'post',
                dataType: 'html',
                data: postdata
            }).done(function (data) {
                alert(data);
                window.location.href = "<?php
if ($_GET['url'] == 'welcome') {
    echo site_url('welcome');
}
?>";
            });
        });

    });
</script>