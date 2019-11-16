<?=  $this->load->view('js/calendar2.php'); ?>
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
                if ($("#lph").val().length == 11 && $.isNumeric( $("#lph").val())) {
                    msg += "<br />Land Phone:" + $("#lph").val();
                }
                else{
                    alert("Please enter your Land nuber number (with std code)");
                    return false;
                }
            }
            if ($("#mobile1").val().length == 10 && $.isNumeric( $("#mobile1").val())) {
                msg += "<br />Mobile Phone:" + $("#mobile1").val();
            }
            else {
                alert("Please enter your 10 digit mobile  number");
                return false;
            }
            if ($("#model").val() != "") {
                msg += "<br />Model:" + $("#model").val();
            }
            else {
                alert("Please enter model");
                return false;
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
            if(!($("#free").prop('checked') == true || $("#paid").prop('checked') == true)){
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
            msg += "<br /><b>Dealer Informations</b><br />Name : <?= $name; ?><br />Address : '"+ $("#delAdd").val()+"'<b />";
            if ($("#message").val() != "") {
                msg += "<br /><b>Message</b> <br />" + $("#message").val();
            }
            else {
                alert("Please enter work details");
                return false;
            }
            
            if(!$("#temsconBser").prop('checked') == true){
                alert("Please accept the terms and cunditions");
                return false;
            }
            var postdata = {};
            postdata.msg = msg;
            postdata.email = $("#email1").val();
            postdata.name = $("#name1").val();
            //postdata.delId = <?= $this->uri->segment(3); ?>;
            $.ajax({
                url: "<?= site_url('background'); ?>/bookService",
                type: 'post',
                dataType: 'html',
                data: postdata
            }).done(function (data) {
                alert(data);
            });
        });
    });
</script>
<b style="color:black; font-size: 20px;">Book A Service </b><br/>
<br/>Please fill in the form as accurately as <br/>possible.<br/><br/>When you have completed the form,<br/> please press send. The form will clear<br/> and we will be in contact as soon as<br/> possible.<br/><br/>Please note that this is only a request<br/> form, we will contact you with <br/>confirmation of your service date and<br/> time.<br/><br/>

<div class="col-xs-40 col-xs-offset-1">
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 ">
            <b style="color:black;">Personal Details</b>
        </div>

    </div>
    <textarea style="display:none" id="delAdd"><?= $address; ?></textarea>
    <br/>
    <br/>
    <div class="col-xs-40 col-xs-offset-2" >
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="name">Contact Name</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="name1" >
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="email">Email Address</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="email1">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="naddress">Address</label>
        </div>
        <div class="col-xs-32 ">
            <input type='text' class="form-control" id="address1">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="city">Town/City</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="city1">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="message">District</label>
        </div>
        <div class="col-xs-32">
            <select id="dist21" class="form-control" >
                <option value="">None</option>
                <?PHP
                $qry = $this->db->get_where('place', array('type' => 3));
                foreach ($qry->result() as $row) {
                    echo "<option value='$row->place_id' > $row->placename</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="mobile">Contact Telephone</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="mobile1">
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
            <b>Vehicle Details</b>
        </div>

    </div>

    <div class="col-xs-40 col-xs-offset-2 ">
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
                        echo'<option value="' . $model->model_name . '"> ' . $model->model_name . '</option>';
                    }
                }
                ?> 

            </select>
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="lph">Registration No</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="regno">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="message">Year</label>
        </div>
        <div class="col-xs-32">
            <select name="model_year" class="select required form-control" id="year">
                <option value="" selected="selected">Please select</option>
<?php
$i = date('Y');
while ($i >= 1920) {
    echo '<option value="' . $i . '">' . $i . '</option>';
    $i--;
}
?>
            </select>
        </div>
    </div>
    <div class="col-xs-32 free " style="padding-left: 37px;">
        <input type="checkbox" name="free1" id="free" /><label style="padding-left: 10px;" for="free">Free Service</label>
    </div>
    <div class="col-xs-32 paid" style="padding-left: 37px;">
        <input type="checkbox" name="free1" id="paid" /><label style="padding-left: 10px;" for="paid">Paid Service</label>
    </div>

    <div class="col-xs-40 col-xs-offset-2 km">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="km">Km</label>
        </div>
        <div class="col-xs-32">
            <input type='number' class="form-control" id="km">
        </div>
    </div>
    <div class="col-xs-40 col-xs-offset-2">
        <div class="col-xs-11 form-group">
            <label class="name"  style=" line-height: 13px;" for="message">Details of work required</label>
        </div>
        <div class="col-xs-32">
            <textarea class="form-control" id="message"></textarea>
        </div>
    </div>
    <?PHP
    	if(isset($vtype) && $vtype==2){
    	?>
            <div class="col-xs-32" style="padding-left: 37px;">
                <input type="checkbox" name="pickup" id="pickup" /><label style="padding-left: 10px;">If you need pick up & drop</label>
            </div>
        <?PHP
        }
    ?>
    <div class="col-xs-40 col-xs-offset-2" style="padding:5px; ">
        <div class="col-xs-11 form-group ">
            <label class="name"  style=" line-height: 13px;" for="message">Preferred date for service</label>
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

</div>
<div class="col-xs-40 col-xs-offset-2">
        <input type="checkbox" id="temsconBser" /><label class="name"  style=" line-height: 13px;" for="temsconBser"> Accept the Terms And Condition </label>
    </div>
<div class="clear"></div>
<div class="col-xs-40">
    <button class="btn" id="submitService" type="button">

        Submit

    </button>
</div>