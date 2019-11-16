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
        
        $("#dist21").change(function () {
            $("#dealer11").html('<option value="0">Select</option>');
            var postdata = {};
            postdata.dist = $("#dist21").val();
            postdata.cmpid = $("#cmp_id").val();
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
                $('#variant').html('<option value="">Select</option>');
                $.each(data, function (index, value) {
                    $('#variant').append('<option value="' + value.content + '">' + value.content + '</option>');
                });
            });
        });

        $("#submitTestDricve").click(function () {
            var msg = "";
            var toname = "";
            var toemail = "";
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if ($("#names").val() != "") {
                msg += "Name:" + $("#names").val();
                toname = $("#names").val();
            }
            else {
                alert("Please enter Name");
                return false;
            }
            if (emailReg.test($("#emails").val()) && $("#emails").val()!="") {
                msg += "<br />Email:" + $("#emails").val();
                toemail = $("#emails").val();
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
<?php
if (isset($_GET['brId']) || isset($_GET['new'])) {
    ?>
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

<?php
} elseif (isset($_GET['used'])) {
    ?>

                if ($("#umodel").val() != "") {
                    msg += "<br />Model:" + $("#umodel").val();
                }
                else {
                    alert("Please enter Model");
                    return false;
                }
                if ($("#uvariant").val() != "") {
                    msg += "<br />Variant:" + $("#uvariant").val();
                }
                else {
                    alert("Please enter Variant");
                    return false;
                }

    <?php }
?>

<?php
if (isset($_GET['brId'])) {
    ?>
                if ($("#dealer11").val() != "") {
                    msg += "<br />Dealer:" + $("#dealer11 option:selected").text();
                }
                else {
                    alert("Please select dealer");
                    return false;
                }


<?php
} elseif (isset($_GET['delId'])) {
    ?>

                msg += "<br /><b>Dealer Details</b> <br />Name:<?= $name; ?><br />Address : '"+ $("#delAdd").val()+"'<b />";


    <?php
}
?>
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
                postdata.toname = toname;
                postdata.toemail = toemail;
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
<b style="color:black; font-size: 20px;">Book A Test-Drive</b><br/>
<br/>Please fill in the form as accurately as possible.<br/>
When you have completed the form, please<br/>press send. The form will clear and we will be <br/>in contact as soon as possible.<br/><br/>	
<div class="col-xs-40 col-xs-offset-1">
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 ">
<?PHP
if (isset($_GET['cmp_id'])) {
    ?>
                <input type="hidden" id="cmp_id" value="<?php echo $_GET['cmp_id']; ?>" >

            <?php } ?>
<?php if (isset($_GET['delId'])) {
    ?>

                <textarea style="display:none" id="delAdd"><?= $address; ?></textarea>

<?php } ?>
            <b style="color:black;">Personal Details</b>
        </div>

    </div>
    <br/>
    <br/>
    <div class="col-xs-40 col-xs-offset-2" >
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="name">Contact Name</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="names" >
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="email">Email Address</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="emails">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="address">Address Line 1</label>
        </div>
        <div class="col-xs-32 ">
            <input type='text' class="form-control" id="addresss">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="address2">Address Line 2</label>
        </div>
        <div class="col-xs-32 ">
            <input type='text' class="form-control" id="add2">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="city">Town/City</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="city">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="message">District</label>
        </div>
        <div class="col-xs-32">
            <select id="dist21" class="form-control" >
                <option value=""></option>
<?PHP
$qry = $this->db->get_where('place', array('type' => 3));
foreach ($qry->result() as $row) {
    echo "<option value='$row->place_id'> $row->placename</option>";
}
?>
            </select>
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="pin">Pin code</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="pin">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="mobile">Mobile No</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="mobile">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="lph">Land No</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="lph">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11" style="color:black;">
            <b>Test Drive Details</b>
        </div>

    </div>
<?php
if (isset($_GET['brId']) || isset($_GET['new'])) {
    ?>
        <div class="col-xs-40 col-xs-offset-2 model">
            <div class="col-xs-11 form-group">
                <label class="name"  style=" line-height: 13px;" for="message">Model</label>
            </div>
            <div class="col-xs-32">
                <select id="model" class="form-control"  required="required">

    <?php
    if (isset($_GET['cmp_id'])) {
        $qry = $this->db->get_where('model', array('cmp_id' => $_GET['cmp_id']));
        echo'<option value=""></option>';
        foreach ($qry->result() as $model) {
            echo'<option value="' . $model->model_id . '"> ' . $model->model_name . '</option>';
        }
    }
    ?>
                </select>
            </div>
        </div>

        <div class="col-xs-40 col-xs-offset-2 variant">
            <div class="col-xs-11 form-group">
                <label class="name"  style=" line-height: 13px;" for="message">Variant</label>
            </div>
            <div class="col-xs-32">
                <select id="variant" class="form-control"  required="required">
                </select>
            </div>
        </div>
<?php } elseif ($_GET['used']) {
    ?>

        <div class="col-xs-40 col-xs-offset-2 umodel" >
            <div class="col-xs-11 form-group">
                <label class="name"  style=" line-height: 13px;" for="message">Model</label>
            </div>
            <div class="col-xs-32">
                <input type="text" id="umodel" name="umodel" class="form-control">

            </div>
        </div>
        <div class="col-xs-40 col-xs-offset-2 uvariant" >
            <div class="col-xs-11 form-group">
                <label class="name"  style=" line-height: 13px;" for="message">Variant</label>
            </div>
            <div class="col-xs-32">
                <input type="text" id="uvariant" name="uvariant" class="form-control">

            </div>
        </div><?php } ?>
<?php
if (isset($_GET['brId'])) {
    ?>
        <input type="hidden" id="brId" value="<?php echo $_GET['brId']; ?>" >


        <div class="col-xs-40 col-xs-offset-2">
            <div class="col-xs-11 form-group">
                <label class="name"  style=" line-height: 13px;" for="message">Select a dealer</label>
            </div>
            <div class="col-xs-32">
                <select id="dealer11" class="form-control">
                </select>
            </div>
        </div>
<?php } ?>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="message">Preferred date for viewing</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="date">
        </div>

    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="message">Preferred time of day</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="time">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="message">Anything to add?</label>
        </div>
        <div class="col-xs-32">
            <textarea class="form-control" id="message"></textarea>
        </div>
    </div>
        
</div>
    <div class="col-xs-40 col-xs-offset-2">
        <input type="checkbox" id="temscon" /> <label class="name"  style=" line-height: 13px;" for="temscon"> Accept The Terms And Condition </label>
    </div>
<div class="clear"></div>
<div class="col-xs-40 col-xs-offset-2">
    <button class="btn" id="submitTestDricve" type="button">
        Submit
    </button>
</div>