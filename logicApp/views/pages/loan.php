<script type="text/javascript">
    $(function () {
        var calendar = $.calendars.instance('persian');
        $('#dob').calendarsPicker({calendar: calendar});
        $('#inlineDatepicker').calendarsPicker({calendar: calendar});
    });
    $(document).ready(function () {
        $("#samePer").click(function () {
            if ($(this).prop('checked') == true) {
                $("#paddress").val($("#caddress").val());
                $("#pdistrict").val($("#cdistrict").val());
                $("#ppinCode").val($("#cpinCode").val());
            }
        });
        function errDisplay(id, msg) {
            $("#" + id).parent('div').children('.alert').remove();
            $("#" + id).parent('div').append('<div class="alert">' + msg + '</div>').children('.alert').css('background-color', 'red');
            error[id] = true;
            $.extend({}, error);
        }
        $("#form").submit(function () {
            var err = 0;
            if (!($("#newc").prop("checked") || $("#newb").prop("checked") || $("#usedc").prop("checked") || ($("#usedb").prop("checked")))) {
                alert("Please select Lone type");
                $("#newc").focus();
                return false;
            }
            if($("#tYear").val()!=="" || $("#tMonth").val()!==""){
                if($("#tYear").val()==""){
                    errDisplay('tYear', 'Please enter a Year');
                    $("#tYear").focus();
                    err = 1;
                }
                if($("#tMonth").val()==""){
                    errDisplay('tMonth', 'Please enter a Year');
                    $("#tMonth").focus();
                    err = 1;
                }
            }
            if (!($("#male").prop("checked") || $("#female").prop("checked"))) {
                alert("Please select genter");
                $("#male").focus();
                return false;
            }
            if ($("#newc").prop("checked") || $("#newb").prop("checked")) {
                if($("#newc").prop("checked")){
                    if ($("#car").val() == "") {
                        errDisplay('car', 'Please select brand');
                        $("#car").focus();
                        err = 1;
                    }
                }
                else{
                    if ($("#bike").val() == "") {
                        errDisplay('car', 'Please select brand');
                        $("#car").focus();
                        err = 1;
                    }
                }
                if ($("#model").val() == "") {
                    errDisplay('model', 'Please select model');
                    $("#model").focus();
                    err = 1;
                }
                if ($("#variant").val() == "") {
                    errDisplay('variant', 'Please select model');
                    $("#variant").focus();
                    err = 1;
                }
            }
            else {
                if ($("#companyName1").val() == "") {
                    errDisplay('ccompanyName1', 'Please enter brand name');
                    $("#companyName1").focus();
                    err = 1;
                }
                if ($("#usedmodel").val() == "") {
                    errDisplay('usedmodel', 'Please enter a model name');
                    $("#usedmodel").focus();
                    err = 1;
                }
                if ($("#usedvariant").val() == "") {
                    errDisplay('usedvariant', 'Please enter a variant name');
                    $("#usedvariant").focus();
                    err = 1;
                }
            }
            if ($("#ppinCode").val().length != 6) {
                errDisplay('ppinCode', 'Please enter a valid pin pode');
                $("#ppinCode").focus();
                err = 1;
            }
            else if (!$.isNumeric($("#ppinCode").val())) {
                errDisplay('cpinCode', 'Please enter a valid pin code');
                $("#ppinCode").focus();
                err = 1;
            }
            if ($("#cpinCode").val().length != 6) {
                errDisplay('cpinCode', 'Please enter a valid pin pode');
                $("#cpinCode").focus();
                err = 1;
            }
            else if (!$.isNumeric($("#cpinCode").val())) {
                errDisplay('cpinCode', 'Please enter a valid pin code');
                $("#cpinCode").focus();
                err = 1;
            }
            if ($("#landNo").val() != "") {
                if ($("#lCode").val().length != 4) {
                    errDisplay('lCode', 'Please enter a valid STD Code');
                    $("#lCode").focus();
                    err = 1;
                }
                else if (!$.isNumeric($("#lCode").val())) {
                    errDisplay('lCode', 'Please enter a valid STD Code');
                    $("#lCode").focus();
                    err = 1;
                }
                if ($("#landNo").val().length != 7) {
                    errDisplay('landNo', 'Please enter a valid number');
                    $("#landNo").focus();
                    err = 1;
                }
                else if (!$.isNumeric($("#landNo").val())) {
                    errDisplay('landNo', 'Please enter a valid number');
                    $("#landNo").focus();
                    err = 1;
                }
            }
            if ($("#mobileNo").val().length >= 10 && $("#mobileNo").val().length <=15) {
                errDisplay('mobileNo', 'Please enter a valid number');
                $("#mobileNo").focus();
                err = 1;
            }
            else if (!$.isNumeric($("#mobileNo").val())) {
                errDisplay('mobileNo', 'Please enter a valid number');
                $("#mobileNo").focus();
                err = 1;
            }
            if (err)
                return false;
            else {
                return true;
            }
        });
        
        if ($("#newc").prop("checked") || $("#newb").prop("checked")) {
            $(".vehiDat").show();
            $(".newVehi").show();
            $(".usedVehi").hide();
            if ($("#newc").prop("checked")) {
                $("#newCar").show();
                $("#newBike").hide();
            }
            else {
                $("#newBike").show();
                $("#newCar").hide();
            }
        }
        else if ($("#usedb").prop("checked") || $("#usedc").prop("checked")) {
            $(".vehiDat").show();
            $(".newVehi").hide();
            $(".usedVehi").show();
        }
        else {
            $(".vehiDat").hide();
        }
        $(".vehiType").click(function () {
            $(".vehiDat").show();
            if ($(this).attr("data-filed")) {
                $(".newVehi").show();
                $(".usedVehi").hide();
                if($(this).attr("data-filed")=="newBike"){
                    $("#newBike").show();
                    $("#newCar").hide();
                }
                else{
                    $("#newCar").show();
                    $("#newBike").hide();
                }
            }
            else {
                $(".usedVehi").show();
                $(".newVehi").hide();
            }
        });
        $(".companyName").change(function () {
        var postData = {};
        postData.value1 = $(this).val();
        $.ajax({
            url: "<?PHP echo site_url('newjson'); ?>/getmodel",
            type: 'post',
            dataType: 'json',
            data: postData
        }).done(function (data) {
            $('#model').html('<option value="0">Select</option>');
            $.each(data, function (index, value) {
                $('#model').append('<option value="' + value.id + '">' + value.content + '</option>');
            });
        });
    });
    $(".tomodel").change(function () {
        var postData = {};
        postData.value1 = $(this).val();
        $.ajax({
            url: "<?PHP echo site_url('newjson'); ?>/getvariant",
            type: 'post',
            dataType: 'json',
            data: postData
        }).done(function (data) {
            $('#variant').html('<option value="0">Select</option>');
            $.each(data, function (index, value) {
                $('#variant').append('<option value="' + value.id + '">' + value.content + '</option>');
            });
        });
    });
    var error = {};
    $('.required').blur(function () {
        var variable = $(this).attr('id');
        if ($(this).val().length <= 0) {
            $(this).parent('div').children('.alert').remove();
            $(this).parent('div').append('<div class="alert">This field is required</div>').children('.alert').css('background-color', 'red');
            error[variable] = true;
            $.extend({}, error);
        } else {
            $(this).parent('div').children('.alert').css('background-color', 'green').text('Its Ok').fadeOut(3000);
            $.extend({}, postData);
            error[variable] = false;
            $.extend({}, error);
        }
    });
    $('.number').change(function () {
        if (!$.isNumeric($(this).val())) {
            $(this).parent('div').children('.alert').remove();
            $(this).parent('div').append('<div class="alert">This field is required</div>').children('.alert').css('background-color', 'red');
            error[variable] = true;
            $.extend({}, error);
        } else {
            $(this).parent('div').children('.alert').css('background-color', 'green').text('Its Ok').fadeOut(3000);
            $.extend({}, postData);
            error[variable] = false;
            $.extend({}, error);
        }
    });
    });
</script>
<div class="col-xs-48 col-xs-offset-1">
    <div class="col-xs-50">
        <div class="page1_block1">
            <?PHP
            $this->db->where_in('loc', array('52', '53'));
            $this->db->order_by('loc', 'ASC');
            $add = $this->db->get('add')->result();
            foreach ($add as $ad) {
                if (isset($ad->img_path1)) {
                    ?>
                    <a target="_blank" href="<?= $ad->link; ?>"><img src="<?= IMAGES_PATH . "advertisement/" . $ad->img_path1; ?>" class="col-xs-25"/></a>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="box2 col-xs-50">
            <div class="col-xs-50 col-md-35">
                <form class="blocks" method="post" id="form" enctype="multipart/form-data">
                    <center><h2><b>Apply Vehicle Loan</b></h2></center>

                    <div class="col-xs-13"><img class="col-xs-50" src="<?= IMAGES_PATH; ?>button_required_for.png" /></div>
                    <div class="col-xs-8" style="padding:10px 0 0 20px;">
                        <input type="radio"  id="newc" class="vehiType col-xs-10" name="vehiType" data-filed="newCar" value="1"><label for="newc" style="font-weight: normal" class="col-xs-40"> New Car</label>
                    </div>
                    <div class="col-xs-8" style="padding:10px 0 0 0;">
                        <input type="radio" id="newb" class="vehiType col-xs-10" name="vehiType" data-filed="newBike" value="2"> <label for="newb" style="font-weight: normal" class="col-xs-40">New bike</label>
                    </div>
                    <div class="col-xs-9" style="padding:10px 0 0 0;">
                        <input type="radio" id="usedc" class="vehiType col-xs-10" name="vehiType" value="3"> <label for="usedc" style="font-weight: normal" class="col-xs-40">Pre Owned Car</label>
                    </div>
                    <div class="col-xs-9" style="padding:10px 0 0 0;">
                        <input type="radio" id="usedb" class="vehiType col-xs-10" name="vehiType" value="4"> <label for="usedb" style="font-weight: normal" class="col-xs-40">Pre Owned Bike</label>
                    </div>
                    <div class="col-xs-48 form-group col-xs-offset-1" style=" padding: 5px;">
                        <div class="col-xs-50">
                            <h2>Personal Details</h2>  
                        </div>
                        <div class="col-xs-50 col-md-24 form-group">
                            <div class="col-xs-40">
                                First Name
                            </div>
                            <div class="col-xs-40"> 
                                <input type="text" placeholder="First Name"  required="required"  id="fullName" name="fullName" class="required text form-control" />
                            </div>
                        </div>
                        <div class="col-xs-50 col-md-24 form-group">
                            <div class="col-xs-40">
                                Last Name
                            </div>
                            <div class="col-xs-40"> 
                                <input type="text" placeholder="Last Name"  required="required"  id="lName" name="lName" class="required text form-control" />
                            </div>
                        </div>
                        <div class="col-xs-50 col-md-24 form-group">
                            <div class="col-xs-40">
                                D.O.B
                            </div>
                            <div class="col-xs-40"> 
                                <input type="text" placeholder="Date of Birth" value="<?= date('Y/m/d', strtotime(date('Y-m-d') . '-18 year')); ?>" pattern="\d{4}/\d{1,2}/\d{1,2}"  required="required"  id="dob" name="dob" class="text form-control" />
                            </div>
                        </div>
                        <div class="col-xs-50 col-md-24 form-group" ><br/>
                            <div class="col-xs-48 col-xs-offset-1">
                                Gender
                            </div>

                            <div class="col-xs-48 col-xs-offset-1" >
                                <input type="radio" id="male"   name="sex"   value="male" class="col-xs-10 col-md-5" /> <label class="col-xs-40 col-md-10" for="male" style="font-weight: normal">Male</label>
                                <input type="radio" id="female"   name="sex"   value="female" class="col-xs-10 col-md-5" /> <label class="col-xs-40 col-md-10" for="male" style="font-weight: normal">Female</label>
                            </div>
                        </div>
                        <div class="col-xs-50 col-md-24 form-group">
                            <div class="col-xs-50">
                                Mobile Number
                            </div>
                            <div class="col-xs-10"> 
                                <input type="text" required="required"  id="cuCode" name="cuCode" value="+91" class="number form-control" />
                            </div>
                            <div class="col-xs-30"> 
                                <input type="text" placeholder="Mobile No"  required="required"  id="mobileNo" name="mobileNo" class="number form-control" />
                            </div>
                        </div>
                        <div class="col-xs-50 col-md-24 form-group">
                            <div class="col-xs-50">
                                Land No
                            </div>
                            <div class="col-xs-15"> 
                                <input type="text" placeholder="Code" id="lCode" name="lCode" value="" class="required number form-control" />
                            </div>
                            <div class="col-xs-25"> 
                                <input type="text" placeholder="Land Number" id="landNo" name="landNo" class="number required form-control" type="email" />
                            </div>
                        </div>
                        <div class="col-xs-50 col-md-24 form-group">
                            <div class="col-xs-40">
                                Email Id
                            </div>
                            <div class="col-xs-40"> 
                                <input type="email" placeholder="Email Id"  required="required"  id="emailId" name="emailId" class="text form-control" type="email" />
                            </div>
                        </div>
                        <div class="col-xs-50 col-md-24 form-group">
                            <div class="col-xs-40">
                                Residence Type
                            </div>
                            <div class="col-xs-40"> 
                                <select name="residence" class="tmSelect auto form-control" required="required" style="line-height:13px;" id="selectresidence" data-class="tmSelect tmSelect2" data-constraints="">
                                    <option value="">Select Residence Type</option>
                                    <option value="Owned by Self/spouse">Owned by Self/Spouse</option>
                                    <option value="Owned by Parents/Siblings">Owned by Parents/Siblings</option>
                                    <option value="Rented - With family">Rented - With family</option>
                                    <option value="Rented - With friends">Rented - With friends</option>
                                    <option value="Rented - Staying alone">Rented - Staying alone</option>
                                    <option value="Paying guest">Paying guest</option>
                                    <option value="Hostel">Hostel</option>
                                    <option value="Company provided">Company provided</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-50 form-group">
                            <div class="col-xs-40">
                                Current Address
                            </div>
                            <div class="col-xs-50 col-md-24 form-group">
                                <div class="col-xs-40">
                                    <textarea  placeholder="Address"  required="required" rows="5"  id="caddress" name="caddress" class="text form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-50 col-md-24 form-group">
                                <div class="col-xs-40">
                                    District
                                </div>
                                <div class="col-xs-40"> 
                                    <select name="cdistrict" class="tmSelect auto form-control" required="required" style="line-height:13px;" id="cdistrict" data-class="tmSelect tmSelect2" data-constraints="">
                                        <option value="0">Select District</option>
                                        <?PHP
                                        foreach ($district as $dis) {
                                            echo "<option value='$dis->placename'>$dis->placename</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-50 col-md-24 form-group">
                                <div class="col-xs-40">
                                    Pin Code
                                </div>
                                <div class="col-xs-40"> 
                                    <input type="number" placeholder="Pin Code"  required="required"  id="cpinCode" name="cpinCode" class="required text form-control" type="email" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-50 form-group">
                            <input type = "checkbox" id = "samePer" /><label for="samePer">Current Address Same As Permanent Address</label>
                        </div>
                        <div class="col-xs-50 form-group">
                            <div class="col-xs-40">
                                Permanent Address
                            </div>
                            <div class="col-xs-50 col-md-24 form-group">                                
                                <div class="col-xs-40">
                                    <textarea  placeholder="Address"  required="required" rows="5"  id="paddress" name="paddress" class="text form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-50 col-md-24 form-group">
                                <div class="col-xs-40">
                                    District
                                </div>
                                <div class="col-xs-40"> 
                                    <select name="pdistrict" class="tmSelect auto form-control" required="required" style="line-height:13px;" id="pdistrict" data-class="tmSelect tmSelect2" data-constraints="">
                                        <option value="0">Select District</option>
                                        <?PHP
                                        foreach ($district as $dis) {
                                            echo "<option value='$dis->placename'>$dis->placename</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-50 col-md-24 form-group">
                                <div class="col-xs-40">
                                    Pin Code
                                </div>
                                <div class="col-xs-40"> 
                                    <input type="number" placeholder="Pin Code"  required="required"  id="ppinCode" name="ppinCode" class="required text form-control" type="email" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-50 col-md-24 form-group">
                            <div class="col-xs-40">
                                When did you move to current residence
                            </div>
                            <div class="col-xs-20">
                                <select name="tYear" class="select required form-control" id="tYear">
                                    <option value="">Year</option>
                                    <?php
                                    $i = date('Y');
                                    while ($i >= 1920) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                        $i--;
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-xs-20"> 
                                <select name="tMonth" class="select form-control" id="tMonth">
                                    <option value="">Month</option>
                                    <option value="january" >January</option>
                                    <option value="February" >February</option>
                                    <option value="March">March</option>
                                    <option value="April" >April</option>
                                    <option value="May" >May</option>
                                    <option value="June" >June</option>
                                    <option value="July" >July</option>
                                    <option value="August">August</option>
                                    <option value="September" >September</option>
                                    <option value="October" >October</option>
                                    <option value="November" >November</option>
                                    <option value="December" >December</option>
                                </select> 
                            </div>
                        </div>
                    </div>
                    <hr style=" color:  brown">
                    <div class="col-xs-48 form-group col-xs-offset-1" style=" padding: 5px;">
                        <div class="col-xs-50 vehiDat">
                            <div class="col-xs-50">
                                <h2>Vehicle Details:</h2>  
                            </div>

                            <div class="col-xs-50 col-md-24 form-group">
                                <div class="col-xs-40">
                                    Make
                                </div>
                                <div class="col-xs-40 newVehi" id="newCar"> 
                                    <select name="newmakeC" class="companyName tmSelect auto form-control"  style="line-height:13px;" id="car" data-class="tmSelect tmSelect2" data-constraints="">
                                        <option value="">Select make</option>
                                        <?PHP
                                        foreach ($Cbrands as $brand)
                                            echo "<option value='$brand->cmp_id'>$brand->companyname</option>";
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-40 newVehi" id="newBike"> 
                                    <select name="newmakeB" class="companyName tmSelect auto form-control"  style="line-height:13px;" id="bike" data-class="tmSelect tmSelect2" data-constraints="">
                                        <option value="">Select make</option>
                                        <?PHP
                                        foreach ($Bbrands as $brand)
                                            echo "<option value='$brand->cmp_id'>$brand->companyname</option>";
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-40 usedVehi"> 
                                    <input type="text" placeholder="Type make"    id="companyName1" name="usedmake" class="required text form-control" />
                                </div>
                            </div>
                            <div class="col-xs-50 col-md-24 form-group">
                                <div class="col-xs-40">
                                    Model
                                </div>
                                <div class="col-xs-40 usedVehi"> 
                                    <input type="text" placeholder="Type model"  id="model1" name="usedmodel" class="required text form-control" />
                                </div>
                                <div class="col-xs-40 newVehi"> 
                                    <select name="newmodel" class="tmSelect auto form-control tomodel" style="line-height:13px;" id="model" data-class="tmSelect tmSelect2" data-constraints="">
                                        <option value="">Select model type</option>                    
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-50 col-md-24 form-group">
                                <div class="col-xs-40">
                                    Variant
                                </div>
                                <div class="col-xs-40 newVehi"> 
                                    <select name="newvariant" class="tmSelect auto form-control" style="line-height:13px;" id="variant" data-class="tmSelect tmSelect2" data-constraints="">
                                        <option value="">Select variant type</option>                    
                                    </select>
                                </div>
                                <div class="col-xs-40 usedVehi"> 
                                    <input type="text" placeholder="Type variant"  id="variant1" name="usedvariant" class="required text form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-50">
                            <h2>Professional Details:</h2>  
                        </div>
                        <div class="col-xs-50 col-md-24 form-group">
                            <div class="col-xs-40">
                                Type of Employment
                            </div>
                            <div class="col-xs-40"> 
                                <select name="employ" class="tmSelect auto form-control" required="required" style="line-height:13px;" id="selectemploy" data-class="tmSelect tmSelect2" data-constraints="">
                                    <option value="">Select type</option>
                                    <option value="Salaried">Salaried</option>
                                    <option value="Self employed business">Self employed business</option>
                                    <option value="Self employed proffessional">Self employed professional</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-50 col-md-24 form-group">
                            <div class="col-xs-40">
                                Loan Amount
                            </div>
                            <div class="col-xs-40"> 
                                <input type="number" placeholder="Loan amount" required="required"   id="loanAmount" name="loanAmount" class="text form-control" type="email" />
                            </div>
                        </div>
                        <div class="col-xs-50 col-md-24 form-group">
                            <div class="col-xs-40">
                                Annual Income
                            </div>
                            <div class="col-xs-40"> 
                                <input type="number" placeholder="Annual income"  required="required"  id="anualIncome" name="anualIncome" class="text form-control" type="email" />
                            </div>
                        </div>
                        <div class="col-xs-50 col-md-24 form-group">
                            <div class="col-xs-40">
                                Type Your Bank
                            </div>
                            <div class="col-xs-40"> 
                                <input name="bank" class="form-control" required="required" id="selectbank" />
                            </div>
                        </div>
                        <div class="col-xs-50 col-md-24 form-group">
                            <div class="col-xs-40">
                                Upload Pancard Copy (max-size 5 mb)
                            </div>
                            <div class="col-xs-40"> 
                                <input  class="form-control" name="pancard" id="image" type="file"   />
                            </div>
                        </div>
                        <div class="col-xs-50 col-md-24 form-group">
                            <div class="col-xs-40">
                                Upload Address Proof (max-size 5 mb)
                            </div>
                            <div class="col-xs-40"> 
                                <input  class="form-control" name="addrproof" id="image" type="file"   />
                            </div>
                        </div>
                        <div class="col-xs-50 col-md-24 form-group">
                            <div class="col-xs-40">
                                Statements of 3 Month Income(max-size 5 mb)
                            </div>
                            <div class="col-xs-40"> 
                                <input   class="form-control"  name="salaryStmnt" id="image" type="file"   />
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="col-xs-40">
                        <p>Vehicle Booked: <input type="radio"  name="book" value="Yes"> Yes
                            <input type="radio" name="book" value="No"> No</p>
                    </div>
                    <div class="col-xs-50">
                        <input type = "checkbox" id = "chk" value = "checkbox" required="required" /> I declare that the information I have provided above is accurate and complete to the best of my knowledge. I authorize Keralaonroad its representatives to call or sms me with reference to my loan application as per our <a href="<?= site_url('welcome/view/privacy-policy'); ?>">privacy policy</a> and<a href="<?= site_url('welcome/view/terms-and-conditions'); ?>"> Terms and conditions</a>.
                    </div>
                    <div class="col-xs-20">
                        <input type="submit" name="submit" id="sentMail" value="Submit" class="btn" />
                    </div>
                </form>
            </div>

            <div class="col-xs-50 col-md-15" style="padding-top: 75px;">
                <?PHP
                $this->db->where_in('loc', array('104', '105'));
                $this->db->order_by('loc', 'ASC');
                $add = $this->db->get('add')->result();
                foreach ($add as $ad) {
                    if (isset($ad->img_path1)) {
                        ?>
                        <a target="_blank" href="<?= $ad->link; ?>"><img src="<?= IMAGES_PATH . "advertisement/" . $ad->img_path1; ?>" style="margin: 20px 0 20px 0"/></a>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="clear"></div>
        
    </div>
    <div class="col-xs-50">
        <div class="page1_block1">
            <?PHP
            $this->db->where('loc', 45);
            $this->db->order_by('loc', 'ASC');
            $add = $this->db->get('add')->result();
            if (isset($add[0]->img_path1)) {
                ?>
                <a target="_blank" href="<?= $add[0]->link; ?>"><img src="<?= IMAGES_PATH . "advertisement/" . $add[0]->img_path1; ?>" class="col-xs-50"/></a>
                <?php } ?>
        </div>
    </div>
</div>