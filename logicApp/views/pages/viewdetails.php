<div class="col-xs-50" id="viewcardetails">
    <script src="<?PHP echo JS_PATH; ?>jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".eqry1").hide();
            $(".page").hide();
            $(".page1").show();
            $("#broClick").click(function () {
                $("#brocher").show();
                $("#broLink").hide();
            });
            $(".cpage").click(function () {
                var page = $(this).attr("data_val");
                $(".page").hide();
                $(".page" + page).show();
            });
            $("#linkPrice").click(function () {
                $(".linkPrice").hide();
                $('#formPrice').show();
            });
            $("#prtdrive").click(function () {
                if ($("#prtdrive").prop('checked') == true) {
                    $("#needTestAddDiv").show();
                }
                else{
                    $("#needTestAddDiv").hide();
                }
            });
            $("#SentEnguery").click(function () {
                if ($(".eqry1").is(':visible')) {
                    var msg = "";
                    var toname = "";
                    var toemail = "";
                    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                    if ($("#name1").val() != "") {
                        msg += "Name:" + $("#name1").val();
                        toname = $("#name1").val();
                    }
                    else {
                        alert("Please enter your name");
                        return false;
                    }
                    if ($("#phone1").val().length == 10 && $.isNumeric($("#phone1").val())) {

                        msg += "<br />Phone:" + $("#phone1").val();
                    }
                    else {
                        alert("Please enter your 10 digit mobile number");
                        return false;
                    }
                    if ($("#distct").val() != "") {
                        msg += "<br />District:" + $("#distct option:selected").text();
                    }
                    else {
                        alert("Please select district");
                        return false;
                    }
                    if (emailReg.test($("#eqemail").val()) && $("#eqemail").val()!="") {
                        msg += "<br />Email:" + $("#eqemail").val();
                        toemail = $("#eqemail").val();
                    }
                    else {
                        alert("Please enter your email");
                        return false;
                    }
                    msg += "<br />Brand:" + $("#usCompani").val();
                    msg += "<br />Model:" + $("#usmodName").val();
                    msg += "<br />Vehicle:" + $("#usVarName").val();
                    msg += "<br />User Name:" + $("#usUserName").val();
                    msg += "<br />Reg. Number: " + $("#regNo").val();
                    msg += "<br />Contact Number: " + $("#uscontactNo").val();
                    if ($("#msgg1").val() != "") {
                        msg += "<br />Message:" + $("#msgg1").val();
                    }
                    else {
                        alert("Please enter your message");
                        return false;
                    }
                    if ($("#eqchk").prop('checked') != true) {
                        alert("Please accept our terms and conditions ");
                        return false;
                    }
                    var postdata = {};
                    postdata.msg = msg;
                    postdata.toname = toname;
                    postdata.toemail = toemail;
                    $.ajax({
                        url: "<?= site_url('background'); ?>/unenq",
                        type: 'post',
                        dataType: 'html',
                        data: postdata
                    }).done(function (data) {
                        alert(data);
                    });
                }
                else {
                    $(".eqry1").show();
                }
            });
            $("#prdist").change(function () {
                $("#comp").html('<option value="0">Select</option>');
                var postdata = {};
                postdata.dist = $("#prdist").val();
                postdata.cmpid = $("#companyid").val();
                $.ajax({
                    url: "<?= site_url('newjson'); ?>/get_dealer_dist",
                    type: 'post',
                    dataType: 'json',
                    data: postdata
                }).done(function (data) {
                    $("#prcomp").html("");
                    $.each(data, function (index, value) {
                        $("#prcomp").append('<option value="' + value.dealer_id + '">' + value.name + '</option>');
                    });
                });
            });
            $("#submitPrice").click(function () {
                var msg = "";
                var toname = "";
                var toemail = "";
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if ($("#prname").val() != "") {
                    msg += "Name:" + $("#prname").val();
                    toname = $("#prname").val();
                }
                else {
                    alert("Please enter Name");
                    return false;
                }
                if ($("#prphone").val().length >= 10 && $("#prphone").val().length <= 15) {
                    msg += "<br />Phone:" + $("#prphone").val();
                }
                else {
                    alert("Please enter 10 digit phone");
                    return false;
                }
                if (emailReg.test($("#premail").val()) && $("#premail").val()!="") {
                    msg += "<br />Email:" + $("#premail").val();
                    toemail = $("#premail").val();
                }
                else {
                    alert("Please enter email id");
                    return false;
                }
                if ($("#prvarint").val() != "") {
                    msg += "<br />Varient:" + $("#prvarint option:selected").text();
                }
                else {
                    alert("Please select varient");
                    return false;
                }
                if ($("#moddel").val() != "") {
                    msg += "<br />Model:" + $("#moddel").val();
                }
                if ($("#prcomp").val() != "") {
                    msg += "<br />Dealer:" + $("#prcomp option:selected").text();
                }
                if ($("#prdist").val() != 0) {
                    msg += "<br />District:" + $("#prdist option:selected").text();
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
                if ($("#prmsgg").val() != "") {
                    msg += "<br />Message:" + $("#prmsgg").val();
                }
                else {
                    alert("Please enter message");
                    return false;
                }
                if(!$("#prtems2").prop('checked') == true){
                    alert("Please accept the terms and cunditions");
                    return false;
                }
                var postdata = {};
                postdata.msg = msg;
                postdata.toname = toname;
                postdata.toemail = toemail;
                $.ajax({
                    url: "<?= site_url('background'); ?>/vareq",
                    type: 'post',
                    dataType: 'html',
                    data: postdata
                }).done(function (data) {
                    alert(data);
                });
                $('#form').hide();
                $('#price').show();
            });
            $("#getBrowSer").click(function () {
                var emailRe = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if ($("#broName").val() == "") {
                    alert("Please Enter the Name");
                    return false;
                }
                else if ($("#broEmail").val() == "") {
                    alert("Please Enter the Email id");
                    return false;
                }
                else if (!emailRe.test($("#broEmail").val())) {
                    alert("Please Enter a valid Email id");
                    return false;
                }
                else if ($("#broPh").val() == "") {
                    alert("Please Enter the mobile number");
                    return false;
                }
                else if ($("#broPh").val().length != 10) {
                    alert("Please enter you 10 digit mobile number");
                    return false;
                }
                else if (!$.isNumeric($("#broPh").val())) {
                    alert("Please enter you 10 digit mobile number");
                    return false;
                }
                else if ($("#brodistct").val() == "") {
                    alert("Please Select District");
                    return false;
                }
                else if ($("#chkBrow").prop('checked') == false) {
                    alert("Please accept our terms and conditions ");
                }
                else {
                    var msg = "Name:" + $("#broName").val() + "<br />Email:" + $("#broEmail").val() + "<br />Contact No:" + $("#broPh").val() + "<br/>Make:" + $("#viewMake").val() + "<br/>Model:" + $("#viewModel").val() + "<br />District:" + $("#brodistct option:selected").text();
                    var toname = $("#broName").val();
                    var toemail = $("#broEmail").val();
                    var postdata = {};
                    postdata.toname = toname;
                    postdata.toemail = toemail;
                    postdata.msg = msg;
                    $.ajax({
                        url: "<?= site_url('background'); ?>/browser",
                        type: 'post',
                        dataType: 'html',
                        data: postdata
                    }).done(function (data) {
                        window.open('<?= site_url('assets/files') . "/" ?>' + $("#barLinks").val(), 'BRochurw', 'window settings');
                    });
                }
            });
        });
    </script>
    <style>

        thead, tbody { display: block; }
        tbody {
            height: 400px;       /* Just for the demo          */
            overflow-y: auto;    /* Trigger vertical scroll    */
            overflow-x: hidden;  /* Hide the horizontal scroll */
        }
        .item11 {
            height: 470px;
            overflow: hidden;
        }
        #viewcardetails .details
        {
            border-radius:10px;
            background-color: rgb(240, 240, 240);
            padding: 10px 20px;
            margin-top:5px;
            margin-bottom:5px;
        }
        #viewcardetails .image{
            width: 100%;
            float: left;
        }
        #viewcardetails .listing{


        }

        #viewcardetails .carousel-indicators li{
            width:100px;
            height:100px;
            background-size: cover;
            background-position: center;
            border: 1px solid rgba(0, 0, 0, 0.1);

        }

        #viewcardetails .colorslist li{
            width: 60px;
            height: 30px;
        }
        #viewcardetails .carousel-indicators {
            position: relative;
            /* bottom: 10px; */
            left: 0;
            margin-top: 33px;
            width: 100%;
            margin-left: 0;
        }
        .modal-footer, .modal-header {

            border:none;
        } 
        #viewcardetails .carousel-control
        {
            background-image: none !important;
        }
        #viewcardetails #maintab .nav li{
            background-color: rgba(104, 104, 104, 0.77);
            color: #FFFFFF;
            margin-right: 0px;
            padding-top: 0px;
            font-size: 14px;
            float: left;
        }
        #viewcardetails #maintab .nav li.active{
            background-color: rgb(62, 110, 165);
            color:#FFFFFF;
        }
        #viewcardetails #maintab .nav > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus
        {
            background-color:transparent;

            border:none;

        }
        #viewcardetails .border
        {
            border: 1px solid rgba(29, 29, 29, 0.21);
        }
        #viewcardetails .listing li{
            width: 100%;
            min-height: 22px;
            line-height: 20px;
            float: left;
            background-color: #FFFFFF;
            margin-top: 3px;
            padding: 9px;
            color: rgb(12, 5, 5);
            position: relative;
            z-index: 0;
            border: 1px solid rgba(221, 221, 221, 0.29);
        }

        #viewcardetails .listing li strong{
            width: 35%;
            float: left;
            text-align: right;
            padding-right: 2%;
        }
        @-moz-document url-prefix() {
            fieldset { display: table-cell; }
        }
    </style>

    <?php
    if (isset($_GET['view'])) {
        $id = $this->input->get('view');
        ?>
        <input type="hidden" id="viewId" value="<?= $id; ?>" />
        <?PHP
        $this->db->select('*');
        $query = $this->db->query("SELECT onroad_vehicle_details.title_name,land_no,typename,companyname,model_name,ftype,var_name,onroad_vehicle_details.model_year,contact_number,username,onroad_vehicle_details.place_id,onroad_vehicle_details.ownershipdetails,condition_name,onroad_vehicle_details.color_id,onroad_vehicle_details.transmission,uptypename,kilo_meter,millage,discription,reg_no,exp_prize,pr_type_name FROM `onroad_vehicle_details` left outer join
`onroad_company` on `onroad_vehicle_details`.`cmp_id`=`onroad_company`.`cmp_id` left outer join
`onroad_condition` on `onroad_vehicle_details`.`con_id`=`onroad_condition`.`con_id` left outer join
`onroad_model` on `onroad_vehicle_details`.`model_id`=`onroad_model`.`model_id`  left outer join
`onroad_price_type` on `onroad_vehicle_details`.`pr_id`=`onroad_price_type`.`pr_id`left outer join
`onroad_transmission` on `onroad_vehicle_details`.`tr_id`=`onroad_transmission`.`tr_id`left outer join
`onroad_uptype` on `onroad_vehicle_details`.`uptype_id` =`onroad_uptype`.`uptype_id`  left outer join
`onroad_users` on `onroad_vehicle_details`.`user_id`=`onroad_users`.`user_id`left outer join
`onroad_variant` on `onroad_vehicle_details`.`varient_id`=`onroad_variant`.`varient_id` left outer join 
`onroad_vehicle_type_global` on `onroad_vehicle_details`.`vtype_id`=`onroad_vehicle_type_global`.`vtype_id` where `onroad_vehicle_details`.`pro_id`='$id'");
        $i = 0;
        if ($query->num_rows() > 0) {
            echo '<div class="col-xs-50 col-sm-50 col-md-25 pull-right">';
            foreach ($query->result() as $rows) {
                echo '<ul class="listing">';
                echo '<li><strong>Title:</strong>' . $rows->title_name . '</li>';
                echo '<li><strong>Brand Name:</strong>' . $rows->companyname . '</li><input type="hidden" id="usCompani" value="' . $rows->companyname . '" />';
                echo '<li><strong>Model:</strong>' . $rows->model_name . '</li><input type="hidden" id="usmodName" value="' . $rows->model_name . '" />';
                echo '<li><strong>Variants:</strong>' . $rows->var_name . '</li><input type="hidden" id="usVarName" value="' . $rows->var_name . '" />';
                echo '<li><strong>Year:</strong>' . $rows->model_year . '</li><input type="hidden" id="usUserName" value="' . $rows->username . '" />';
                echo '<li><strong>Place:</strong>' . $rows->place_id . '</li><input type="hidden" id="regNo" value="' . $rows->reg_no . '" />';
                echo '<li><strong>Condition:</strong>' . $rows->condition_name . '</li><input type="hidden" id="uscontactNo" value="' . $rows->contact_number . '" />';
                echo '<li><strong>Color:</strong>' . $rows->color_id . '</li>';
                echo '<li><strong>Transmission:</strong>' . $rows->transmission . '</li>';
                echo '<li><strong>Fuel Type:</strong>' . $rows->ftype . '</li>';
                echo '<li><strong>Odometer  Kms.:</strong>' . $rows->kilo_meter . '</li>';
                echo '<li><strong>Mileage  Kms.:</strong>' . $rows->millage . '</li>';
                echo '<li><strong>Description:</strong><div class="col-xs-25" style="float: left;">' . $rows->discription . '</div></li>';
                echo '<li><strong>Registration Number:</strong>' . $rows->reg_no . '</li>';
                echo '<li><strong>Price:</strong>';
                ?> &#x20B9; <?php
                echo $rows->exp_prize . '</li>';
                if ($this->session->userdata('keralaonroads')) {
                    echo '<li><strong>Ownership Details:</strong><address>' . $rows->ownershipdetails .
                    '</address></li>';
                    echo '<li><strong>Contact Number:</strong>' . $rows->contact_number . '</li>';
                    echo '<li><strong>Land Number:</strong>' . $rows->land_no . '</li>';
                    echo '<li><strong>Posted By:</strong>' . $rows->username . '</li>';
                    ?>
                    <div class="eqry1" style="display: none;">
                        <li style="height: 50px;"><strong class="col-xs-24">Name:</strong><p class="col-xs-24"><input type='text' id="name1" class="text form-control"/></p></li>
                        <li style="height: 50px;"><strong class="col-xs-24">Mobile number:</strong><p class="col-xs-24"><input type='text' id="phone1" class="text form-control" /></p></li>
                        <li style="height: 50px;"><strong class="col-xs-24">Email:</strong><p class="col-xs-24"><input type='email' id="eqemail" class="text form-control" /></p></li>
                        <li style="height: 50px;"><strong class="col-xs-24">Message:</strong><p class="col-xs-24"><input type='text' id="msgg1" class="text form-control" /></p></li>
                        <li style="height: 50px;"><strong class="col-xs-24">District:</strong><p class="col-xs-24"><select id="distct" class="text form-control" >
                                    <option value="">None</option>
                                    <?PHP
                                    $qry = $this->db->get_where('place', array('type' => 3));
                                    foreach ($qry->result() as $row) {
                                        echo "<option value='$row->place_id' > $row->placename</option>";
                                    }
                                    ?>
                                </select></p></li>
                        <li style=" padding-left:250px;">
                            <input type = "checkbox" id = "eqchk" value = "checkbox"  /> I agree to the <a href="<?= site_url('welcome/view/privacy-policy'); ?>">privacy policy</a> and<a href="<?= site_url('welcome/view/terms-and-conditions'); ?>" > terms and conditions</a><li>
                    </div>
                    <li><input type="button" id="SentEnguery" class="btn" value="Send enquiry" /></li>
                    <?PHP
                } else {
                    echo "<li><a href='" . site_url('welcome/login?back=2') . "'><strong class='btn'>Login For More Details</strong></a></li>";
                }
                echo '</ul>';
            }
            echo '</div>';
        }
        $query = $this->db->get_where('vehicle_images', array('pro_id' => $id));
        if ($query->num_rows() > 0) {
            echo ' <div class="col-xs-50 col-sm-50 col-md-25"> <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">';
            $i = 0;
            foreach ($query->result() as $row) {
                echo '<div class="item  item11';
                if ($i == 0) {
                    echo ' active ';
                }
                $images[] = $row->image;
                echo '"><img class="image" align="center"  src="';
                echo base_url() . 'assets/uploads/' . $row->image;
                echo '" alt=""/><div class="carousel-caption">
      </div></div> ';
                $i++;
            }
            echo ' 
    </div>
  </div> <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
<ol class="carousel-indicators">';
            $j = 0;
            while ($j < $i) {
                $image = explode('.', trim($images[$j]));
                $image = $image[0] . '_thumb.' . $image[1];
                echo '<li style="background-image:url(' . "'" . base_url() . "assets/uploads/thumb/" . $image .
                "'" . ')"  data-target="#carousel-example-generic" data-slide-to="' . $j . '" ';
                echo '></li>';
                $j++;
            }
            echo '</ol> 
</div></div>';
        } else {
            echo 'No images found';
        }
    } else
    if (isset($_GET['viewnew'])) {
        ?>

        <div class="col-xs-30 pull-right border" id="maintab">
            <ul class="nav" role="tablist">
                <li class="active"><a href="#overview"  role="tab" data-toggle="tab">Overview</a></li>
                <li><a href="#price"  role="tab" data-toggle="tab" id="pri">Price</a></li>
                <li><a href="#colors"  role="tab" data-toggle="tab">Colors</a></li>
                <li><a href="#pics"  role="tab" data-toggle="tab">Pictures</a></li>
            </ul>
            <div class="col-xs-50">
                <div class="tab-content">
                    <div class="tab-pane " id="price">
                        <?php
                        echo'<h6 style="color:#A52A2A" class="linkPrice"><a href"#"><img  id="linkPrice" src="' . IMAGES_PATH . 'getonroad_button.png' . '" /></a></h6>';
                        $id = $this->input->get('viewnew');
                        $queryofvariant = $this->db->get_where('variant', array('model_id' => $id, 'status' => 1));
                        $array = array('model.status' => 1, 'model.model_id' => $id);
                        $query = $this->db->get_where('model', $array);
                        $pk = array();
                        $pk = $query->result();
                        ?>
                        <div class="col-xs-48 col-xs-offset-1" id="formPrice" style=" display: none">
                            <div class="col-xs-49">
                                <div class="col-xs-24">
                                    <div class="col-xs-50">
                                        <div class="col-xs-10 form-group">
                                            <label class="name">Name</label>
                                        </div>	
                                        <div class="col-xs-34">
                                            <input class="text form-control"  type="text" id="prname" name="name" placeholder="Contact Name" required="required" />
                                        </div>	
                                    </div>
                                    <div class="col-xs-50" >
                                        <div class="col-xs-10 form-group">
                                            <label class="name">Phone</label>
                                        </div>	
                                        <div class="col-xs-34">     
                                            <input class="text form-control" type="text"  id="prphone" name="phone" placeholder="Contact Phone Number" required="required" />

                                        </div>  
                                    </div>
                                    <div class="col-xs-50">
                                        <div class="col-xs-34">   
                                            <input id="moddel" class="text form-control" type="hidden"  value="<?= isset($pk[0]->model_name) ? $pk[0]->model_name : "not Found" ?>" />
                                        </div>  
                                    </div>
                                    <div class="col-xs-50">
                                        <div class="col-xs-10 form-group">
                                            <label class="name" for="email">variant:</label>
                                        </div>	
                                        <div class="col-xs-34">   
                                            <select id="prvarint" class="form-control" >
                                                <option value="">None</option>
                                                <?PHP
                                                $vrr = array();
                                                $vrr = $queryofvariant->result();
                                                foreach ($vrr as $row) {
                                                    echo "<option value='$row->var_name' > $row->var_name</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-xs-50">
                                        <div class="col-xs-10 form-group">
                                            <label class="name" for="email">Dealer:</label>
                                        </div>	
                                        <div class="col-xs-34">   
                                            <select id="prcomp" class="form-control" >
                                                <option value="">None</option>
                                                <?PHP
                                                $qq = $this->db->get_where('model', array('model_id' => $this->input->get('viewnew')));
                                                $modl = $qq->result();
                                                ?>
                                            </select>
                                            <input type="hidden" id="companyid" value="<?= $modl[0]->cmp_id ?>" />
                                        </div>  
                                    </div>
                                    <div class="col-xs-50" >
                                        <div class="col-xs-10">     
                                            <input  type="checkbox"  id="prtdrive" name="tdrive"  />
                                        </div>
                                        <div class="col-xs-19">
                                            Need Test Drive?
                                        </div>
                                    </div>
                                    <div class="col-xs-50">
                                        <div class="col-xs-10">     
                                            <input  type=checkbox  id="prloan" name="loan"  />
                                        </div> 
                                        <div class="col-xs-19">
                                            Need Loan?
                                        </div>
                                    </div>
                                    <div class="col-xs-50">
                                        <div class="col-xs-10">
                                            <input type="checkbox" id="prtems2" />
                                        </div>
                                        <label class="name" class="col-xs-25" for="tems2"> Accept the Terms And Condition </label>
                                    </div>
                                    <div class="col-xs-50">

                                        <div class="col-xs-12 form-group">
                                            <label>&nbsp;</label>
                                            <input type="button" id="submitPrice" class="btn" value="Send" />
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xs-24">
                                    <div class="col-xs-50">

                                        <div class="col-xs-10 form-group">
                                            <label class="name" for="premail">email:</label>
                                        </div>	
                                        <div class="col-xs-34">   
                                            <input placeholder="Enter Your User Name"   id="premail" name="email" class="text form-control" type="email" required="required" />

                                        </div>  
                                    </div>
                                    <div class="col-xs-50">

                                        <div class="col-xs-10 form-group">
                                            <label class="name" for="prmsg">message:</label>
                                        </div>	
                                        <div class="col-xs-34">   
                                            <textarea  id="prmsgg" class="text form-control"  required="required" ></textarea>

                                        </div>  
                                    </div>
                                    <div class="col-xs-50">
                                        <div class="col-xs-10 form-group">
                                            <label class="name" for="prdist">District:</label>
                                        </div>	
                                        <div class="col-xs-34">   
                                            <select id="prdist" class="form-control" >
                                                <option value="0">None</option>
                                                <?PHP
                                                $qry = $this->db->get_where('place', array('type' => 3));
                                                foreach ($qry->result() as $row) {
                                                    echo "<option value='$row->place_id' > $row->placename</option>";
                                                }
                                                ?>
                                            </select>

                                        </div>  
                                    </div>
                                    <div class="col-xs-50" style="display: none;" id="needTestAddDiv">
                                        <div class="col-xs-10 form-group">
                                            <label class="name" for="prdist">Address:</label>
                                        </div>	
                                        <div class="col-xs-34">   
                                            <textarea id="neTestAdd" class="text form-control"></textarea>
                                        </div>  
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="colors">
                        <?php
                        $query = $this->db->get_where('color_new_vehicle', array('model_id' => $id));
                        if ($query->num_rows() > 0) {
                            echo '<div id="carousel-example-generic1" class="carousel slide" data-ride="carousel"><div class="carousel-inner">';
                            $i = 0;
                            foreach ($query->result() as $row) {
                                echo '<div class="item';
                                if ($i == 0) {
                                    echo ' active ';
                                }
                                $color[] = $row->colorcode;
                                $colorName[] = $row->colorname;
                                echo '"><img class="image" align="center"  src="';
                                echo base_url() . 'assets/images/newvehicles/' . $row->colorimage;
                                echo '" alt=""/><div class="carousel-caption">
      </div></div> ';
                                $i++;
                            }
                            echo ' 
    </div></div><a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a><ol class="carousel-indicators colorslist">';
                            $j = 0;
                            while ($j < $i) {
                                echo '<li title="' . $colorName[$j] . '" style="background-color:' . $color[$j] .
                                '"  data-target="#carousel-example-generic1" data-slide-to="' . $j . '" ></li>';
                                $j++;
                            }
                            echo '</ol>';
                        }
                        ?>
                    </div>
                    <?php
                    $image = 'default_thumb.jpg';
                    $this->db->join('model_images', 'model.model_id = model_images.model_id', 'FULL');
                    $this->db->join('company', 'model.cmp_id = company.cmp_id', 'FULL');
                    $this->db->group_by("model.model_id");
                    $array = array('model.status' => 1, 'model.model_id' => $id);
                    $query = $this->db->get_where('model', $array);
                    $i = 0;
                    if ($query->num_rows() > 0) {
                        echo ' <div class="tab-pane active" id="overview"><div class="col-xs-50 col-sm-50 col-md-25">';
                        foreach ($query->result() as $rows) {
                            echo '<ul class="listing">';
                            echo '<li><strong>Make:</strong>' . $rows->companyname . '</li><input type="hidden" id="viewMake" value="' . $rows->companyname . '" />';
                            echo '<li><strong>Option:</strong>' . $rows->model_name . '</li><input type="hidden" id="viewModel" value="' . $rows->model_name . '" />';
                            echo '<li><strong>About:</strong>' . $rows->about_model . '</li>';
                            echo '<li><strong>Price:</strong><b>';
                            $this->db->where('price !=0');
                            $this->db->select('price_text');
                            $this->db->order_by('price', 'desc');
                            $this->db->limit(1);
                            $qry = $this->db->get_where('variant', ['model_id' => $id]);
                            $maxprice = $qry->result();
                            $this->db->where('price !=0');
                            $this->db->select('price_text');
                            $this->db->order_by('price', 'ASC');
                            $this->db->limit(1);
                            $query = $this->db->get_where('variant', ['model_id' => $id]);
                            $minprice = $query->result();
                            if (isset($minprice[0])) {
                                ?>
                                &#x20B9; <?php
                                echo ' ';
                                echo $minprice[0]->price_text;
                                echo ' ';
                                echo '<h7 style="color:#ff0000;"> to </h7>';
                                echo ' ';
                                echo $maxprice[0]->price_text;
                            } else {
                                echo 'Not defined';
                            }
                            echo '</b></li>';
                            $barLinks = "";
                            if (strlen($rows->brochure) > 3)
                                $barLinks = $rows->brochure;
                            ?>
                            <li id="brocher" style="display: none">
                                <div class="col-xs-50">
                                    <div class="col-xs-24" style="padding:5px;">Name:</div>
                                    <div class="col-xs-24" style="padding:5px;"><input type="text" id="broName" class="form-control"></div>
                                    <div class="col-xs-24" style="padding:5px;">Email:</div>
                                    <div class="col-xs-24" style="padding:5px;"><input type="text" id="broEmail" class="form-control"></div>
                                    <div class="col-xs-24" style="padding:5px;">Mobile number:</div>
                                    <div class="col-xs-24" style="padding:5px;"><input type="text" id="broPh" class="form-control"></div>
                                    <div class="col-xs-24" style="padding:5px;">District:</div>
                                    <div class="col-xs-24" style="padding:5px;"><select id="brodistct" style=" width: 150px;"  class="form-control">
                                            <option value="">None</option>
                                            <?PHP
                                            $qry = $this->db->get_where('place', array('type' => 3));
                                            foreach ($qry->result() as $row) {
                                                echo "<option value='$row->place_id' > $row->placename</option>";
                                            }
                                            ?>
                                        </select></div>
                                    <div class="col-xs-50">
                                        <input type="hidden" value="<?= $barLinks; ?>" id="barLinks" />
                                        <input type = "checkbox" id = "chkBrow"/> <label for="chkBrow">I agree to the <a href="<?= site_url('welcome/view/privacy-policy'); ?>">privacy policy</a> and<a href="<?= site_url('welcome/view/terms-and-conditions'); ?>" > terms and conditions</a></label>
                                        <input type='button' id="getBrowSer" class='btn' value='download' />
                                    </div>
                                    <div class="col-xs-50"></div>
                                </div>
                            </li>
                            <?PHP
                            echo '<li id="broLink"><strong>Brochure:</strong><a id="broClick">Click</a></li>';
                            echo '</ul>';
                        }
                        echo '</div></div>';
                    }
                    $this->db->order_by("img_id", 'DESC');
                    $query = $this->db->get_where('model_images', array('model_id' => $id));
                    if ($query->num_rows() > 0) {
                        ?>
                        <div class="tab-pane" id="pics">
                            <div class="col-xs-50 col-sm-50 col-md-50 pull-right" >
                                <div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">

                                        <?php
                                        $i = 0;
                                        foreach ($query->result() as $row) {
                                            echo '<div class="item item11';
                                            if ($i == 0) {
                                                echo ' active ';
                                            }
                                            $images[] = $row->model_image;
                                            echo '"><img class="image" align="center"  src="';
                                            echo base_url() . 'assets/images/newvehicles/' . $row->model_image;
                                            echo '" alt=""/><div class="carousel-caption">
  
      </div></div> ';
                                            $i++;
                                        }
                                        ?>
                                    </div>
                                </div>  
                                <a class="left carousel-control" href="#carousel-example-generic2" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic2" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                                <ol class="carousel-indicators"><?php
                                    $j = 0;
                                    while ($j < $i) {
                                        $image = explode('.', trim($images[$j]));
                                        $image = $image[0] . '_thumb.' . $image[1];
                                        echo '<li style="background-image:url(' . "'" . base_url() .
                                        "assets/images/newvehicles/thumbs/" . $image . "'" . ')" data-target="#carousel-example-generic2" data-slide-to="' . $j . '" ';

                                        echo '></li>';
                                        $j++;
                                    }
                                    ?></ol>
                            </div></div>
                        <?php
                    } else {
                        echo 'No images found';
                    }
                    ?>

                </div>  
            </div>
        </div>
        <div class="col-xs-18 border">
            <img class="image" align="center"  src="<?= base_url() ?>assets/images/newvehicles/thumbs/<?= $image ?>" alt=""/>
        </div>
        <div class="col-xs-50">
            <?php
            if ($queryofvariant->num_rows() > 0) {
                $divstart = '<div class="col-xs-48 col-xs-offset-1 border details">';
                $divends = '</div>';
                echo '<ul class="nav nav-tabs" role="tablist">';
                $content = '';
                foreach ($queryofvariant->result() as $row) {
                    echo '<li class="col-xs-10" style="border:solid #ccc 1px; height: 40px;" title="' . $row->var_name . '"><a href="#idto' . $row->varient_id . '"  role="tab" data-toggle="tab" >' . $row->var_name . '</a></li>';
                    $content = $content . '<div class="tab-pane" id="idto' . $row->varient_id . '">';
                    $content = $content . $divstart;
                    $variants[] = $variant = $row->varient_id;
                    $variantname[$row->varient_id] = $row->var_name;
                    $content = $content . $name = '<h2>' . $row->var_name . '</h2>';
                    $content = $content . $tab = '<div class="col-xs-48 col-xs-offset-1 border details"><ul class="nav nav-pills" role="tablist"> <li class="active"><a href="#spec' . $row->varient_id . '"  role="tab" data-toggle="tab">Specification</a></li><li><a href="#feat' . $row->varient_id . '" role="tab" data-toggle="tab">Features</a></li><li><a href="#deta' . $row->varient_id . '" role="tab" data-toggle="tab">Details</a></li></ul>';
                    $content = $content . $mileage = ''; //<p> Mileage :' . $row->milage;
                    $content = $content . $about = '<p>' . $row->about . '</p>';
                    $content = $content . '<div class="tab-content"><div class="tab-pane active" id="spec' . $row->varient_id . '">';
                    $this->db->join('specification', 'specification_vehicle.spec_id = specification.spec_id', 'LEFT OUTER');
                    $this->db->order_by("patent asc, specification.spec_id asc");
                    $query1 = $this->db->get_where('specification_vehicle', array('verient_id' => $variant, 'specification_vehicle.status' => 1));
                    if ($query1->num_rows() > 0) {
                        $spe = '<table class="table table-striped table-condensed table-hover table-bordered">';
                        foreach ($query1->result() as $rows) {
                            if ($rows->description != "" && $rows->description != $rows->specification) {
                                $Speci = $rows->specification . " <label title='" . $rows->description . "' class='fright img-circle' style='background: #aa649c; color:#fff; padding:0 3px 0 3px;'> ? </label>";
                                $Sptiti = $rows->specification;
                            } else {
                                $Speci = $rows->specification;
                                $Sptiti = $rows->specification;
                            }
                            $trs[] = $rows->spec_id;
                            $spec[$rows->spec_id][0] = $Speci;
                            $spectit[$rows->spec_id][0] = $Sptiti;
                            $spec[$rows->spec_id][$variant] = $rows->value;
                            $rows->description;
                            $spe = $spe . "<tr><td>$Speci</td><td>$rows->value</td></tr>";
                        }
                        $content = $content . $spe . "</table>";
                    }
                    $content = $content . $divends;
                    $content = $content . $feat = '<div class="tab-pane" id="feat' . $row->varient_id . '">';
                    $this->db->join('feaur', 'feaur_vehicle.feachur_id = feaur.feachur_id', 'LEFT OUTER');
                    $this->db->order_by("patent asc, feaur.feachur_id asc");
                    $query1 = $this->db->get_where('feaur_vehicle', array('verient_id' => $variant, 'feaur_vehicle.status' => 1));
                    if ($query1->num_rows() > 0) {
                        $feach = '<table class="table table-striped table-condensed table-hover table-bordered">';
                        foreach ($query1->result() as $rows) {
                            $tr[] = $rows->feachur_id;
                            $features[$rows->feachur_id][0] = $rows->feachur;
                            $features[$rows->feachur_id][$variant] = $rows->value;
                            $rows->description;
                            $feach = $feach . "<tr><td width='35%'> $rows->feachur</td><td>$rows->value</td></tr>";
                        }
                        $content = $content . $feach . "</table>";
                    }
                    $content = $content . $divends;
                    $content = $content . $deta = '<div class="tab-pane" id="deta' . $row->varient_id . '">';
                    $this->db->join('deatils', 'deatils_vehicle.deatil_id = deatils.deatil_id', 'LEFT OUTER');
                    $this->db->order_by("deatils.deatil_id", "asc");
                    $query1 = $this->db->get_where('deatils_vehicle', array('verient_id' => $variant, 'deatils_vehicle.status' => 1));
                    if ($query1->num_rows() > 0) {
                        $deatil = '';
                        foreach ($query1->result() as $row1) {
                            $deatil = $deatil . "<p> <div class='col-xs-7'>$row1->deatil :</div><div class='col-xs-40'>" . nl2br($row1->value) . "</div></p>";
                        }
                        $content = $content . $deatils = $deatil;
                    }
                    $content = $content . $divends;
                    $content = $content . $divends;
                    $content = $content . $divends;
                    $content = $content . $divends;
                    $content = $content . $divends;
                }
                echo '<li style="border:solid #ccc 1px;"><a href="#all' . $row->varient_id . '"  role="tab" data-toggle="tab">All Variant </a></li></ul><div class="tab-content">' . $content . '<div class="tab-pane" id="all' . $row->varient_id . '">';
                ?>
                <div class=" table-responsive"></div>
                <div class="col-xs-50">
                    <table class="table table-striped table-condensed table-hover table-bordered" width="100%" id="tabTable">
                        <?php
                        echo '<thead><tr  style=" background:#e76026; color:#fff; "><th width="150px"></th>';
                        $i = 0;
                        $j = 0;
                        foreach ($variants as $keys2) {
                            if (!($i % 5))
                                $j++;
                            $i++;
                            echo '<th width="150px" class="page page' . $j . ' ">' . $variantname[$keys2] . '</th>';
                        }
                        echo '</tr></thead><tbody>';
                        if (!empty($tr)) {
                            echo '<tr class="info"><th width="150px"><h5>Features</h5></th></tr>';
                            $tr = array_unique($tr);
                            foreach ($tr as $keys) {
                                echo '<tr title="' . $features[$keys][0] . '" class="featch">';
                                echo '<td width="150px">' . $features[$keys][0] . '</td>';
                                $i = 0;
                                $j = 0;
                                foreach ($variants as $keys2) {
                                    if (!($i % 5))
                                        $j++;
                                    $i++;
                                    ?>
                                    <td class="page page<?= $j; ?>" width="150px"><?php
                                        if (isset($features[$keys][$keys2])) {
                                            echo $features[$keys][$keys2];
                                        } else {
                                            echo '----';
                                        }
                                        ?></td>
                                    <?php
                                }
                                echo '</tr>';
                            }
                        }
                        if (isset($spec)) {
                            echo '<tr class="info"><th width="150px"><h5>Specification</h5></th></tr>';
                            $trs = array_unique($trs);
                            foreach ($trs as $keys) {
                                echo '<tr title="' . $spectit[$keys][0] . '">';
                                echo '<td width="150px">' . $spec[$keys][0] . '</td>';
                                $i = 0;
                                $j = 0;
                                foreach ($variants as $keys2) {

                                    if (!($i % 5))
                                        $j++;
                                    $i++;
                                    ?>
                                    <td width="150px" class="page page<?= $j; ?>"><?php
                                        if (isset($spec[$keys][$keys2])) {
                                            echo $spec[$keys][$keys2];
                                        } else {
                                            echo '----';
                                        }
                                        ?></td>

                                    <?php
                                }
                                echo '</tr>';
                            }
                        }
                        ?></tbody>
                    </table>
                </div>
                <div class="col-xs-50">
                    <ul class="pagination pagination-lg bootpag">

                        <?PHP for ($i = 1; $i <= $j; $i++) { ?>
                            <li><a href="#" class="cpage" data_val="<?= $i; ?>"><?= $i; ?></a></li>
                            <?PHP } ?>
                </div>

            <?php } ?>
        </div></div></div>


<?php } ?>
