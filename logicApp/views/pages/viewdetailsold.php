<div class="col-xs-50" id="viewcardetails">
    <script src="<?PHP echo JS_PATH; ?>jquery.js"></script>
    <script>
        $(document).ready(function () {
            $('.spec').hide();
            $("#fetchHed").click(function () {
                $('.featch').show();
                $('.spec').hide();
            });
            $("#specHead").click(function () {
                $('.featch').hide();
                $('.spec').show();
            });
            $("#link").click(function () {
                $("#linkprice").hide();
                $('#form').show();
            });
            $("#SentEnguery").click(function(){
            	 var msg = "";
                if ($("#name1").val() != "") {
                    msg += "Name:" + $("#name1").val();
                }
                else {
                    alert("Please enter Name");
                    return false;
                }
                if ($("#phone1").val() != "") {

                    msg += "<br />phone:" + $("#phone1").val();
                }
                else {
                    alert("Please enter phone");
                    return false;
                }
                if ($("#msgg1").val() != "") {
                    msg += "<br />message:" + $("#msgg1").val();
                }
                else {
                    alert("Please enter message");
                    return false;
                }
                var postdata = {};
                postdata.msg = msg;
                $.ajax({
                    url: "<?= site_url('background'); ?>/uvenq",
                    type: 'post',
                    dataType: 'html',
                    data: postdata
                }).done(function (data) {
                    alert(data);
                }) ;
            });
            $("#submit").click(function () {

                var msg = "";
                if ($("#name").val() != "") {
                    msg += "Name:" + $("#name").val();
                }
                else {
                    alert("Please enter Name");
                    return false;
                }
                if ($("#phone").val() != "") {

                    msg += "<br />phone:" + $("#phone").val();
                }
                else {
                    alert("Please enter phone");
                    return false;
                }

                if ($("#email").val() != "") {
                    msg += "<br />email:" + $("#email").val();
                }
                else {
                    alert("Please enter email id");
                    return false;
                }
                if ($("#msgg").val() != "") {
                    msg += "<br />message:" + $("#msgg").val();
                }
                else {
                    alert("Please enter message");
                    return false;
                }
                if ($("#varint").val() != "") {
                    msg += "<br />varient:" + $("#varint option:selected").text();
                }
                else {
                    alert("Please select varient");
                    return false;
                }
                if ($("#moddel").val() != "") {
                    msg += "<br />model:" + $("#moddel").val();
                }
                if ($("#tdrive").prop('checked') == true) {
                    msg += "<br />customer need test drive";
                }
                if ($("#loan").prop('checked') == true) {
                    msg += "<br />customer need loan";
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
                }) ;
                $('#form').hide();
                $('#price').show();
            });
        });

    </script>
    <style>
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
            width: 46%;
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
        <?PHP
        $this->db->select('*');
        $query = $this->db->query("SELECT onroad_vehicle_details.title_name,typename,companyname,model_name,ftype,var_name,onroad_vehicle_details.model_year,contact_number,username,onroad_vehicle_details.place_id,onroad_vehicle_details.ownershipdetails,condition_name,onroad_vehicle_details.color_id,onroad_vehicle_details.transmission,uptypename,kilo_meter,millage,discription,reg_no,exp_prize,pr_type_name FROM `onroad_vehicle_details` left outer join
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
                echo '<li><strong>TITLES:</strong>' . $rows->title_name . '</li>';
                echo '<li><strong>VEHICLE TYPE:</strong>' . $rows->typename . '</li>';
                echo '<li><strong>VEHICLE MAKE:</strong>' . $rows->companyname . '</li>';
                echo '<li><strong>VEHICLE OPTION:</strong>' . $rows->model_name . '</li>';
                echo '<li><strong>VARIANT TYPE:</strong>' . $rows->var_name . '</li>';
                echo '<li><strong>VEHICLE YEAR:</strong>' . $rows->model_year . '</li>';
                echo '<li><strong>PLACE:</strong>' . $rows->place_id . '</li>';
                echo '<li><strong>CONDITION:</strong>' . $rows->condition_name . '</li>';
                echo '<li><strong>COLOR:</strong>' . $rows->color_id . '</li>';
                echo '<li><strong>TRANSMISSION:</strong>' . $rows->transmission . '</li>';
                echo '<li><strong>Fuel Type:</strong>' . $rows->ftype . '</li>';
                echo '<li><strong>ODOMETER  Kms.:</strong>' . $rows->kilo_meter . '</li>';
                echo '<li><strong>MILEAGE  Kms.:</strong>' . $rows->millage . '</li>';
                echo '<li><strong>VEHICLE DESCRIPTION:</strong><div class="col-xs-25" style="float: left;">' . $rows->discription . '</div></li>';

                echo '<li><strong>REGISTER NUMBER:</strong>' . $rows->reg_no . '</li>';
                echo '<li><strong>PRICE:</strong>' . $rows->exp_prize . 'Rs</li>';
                if ($this->session->userdata('keralaonroads')) {
                    echo '<li><strong>OWNERSHIP DETAILS:</strong><address>' . $rows->ownershipdetails .
                    '</address></li>';
                }
                if ($this->session->userdata('keralaonroads')) {
                    echo '<li><strong>CONTACT NUMBER:</strong>' . $rows->contact_number . '</li>';
                    echo '<li><strong>POSTED BY:</strong>' . $rows->username . '</li>';
                    ?>
                    <li><strong>Your Name:</strong><input type='text' id="name1"/></li>
                    <li><strong>Your Phone Number:</strong><input type='text' id="phone1" /></li>
                    <li><strong>Your Message:</strong><input type='text' id="msgg1" /></li>
                    <li><input type="button" id="SentEnguery" class="btn" value="Sent enquery" /></li>
                    <?PHP
                } else {
                    echo "<li><a href='" . site_url('welcome/login?back=2') . "'><strong>Login For more details</strong></a></li>";
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
  <!-- Controls -->
 
</div></div>';
        } else {
            echo 'No images found';
        }
    } else
    if (isset($_GET['viewnew'])) {
        ?>

        <div class="col-xs-30 pull-right border" id="maintab">
            <!-- Nav tabs -->
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
                        echo '<div style="padding:25px;"  id="linkprice">';
                        echo'<a href"#" id="link" >Get On Road Price</a>';
                        echo '</div>';
                        $id = $this->input->get('viewnew');
                        $queryofvariant = $this->db->get_where('variant', array('model_id' => $id, 'status' => 1));
                        $array = array('model.status' => 1, 'model.model_id' => $id);
                        $query = $this->db->get_where('model', $array);
                        $pk = array();
                        $pk = $query->result();
                        ?>
                        <div class="col-xs-48 col-xs-offset-1" id="form" style=" display: none">
                            <div class="col-xs-49">
                                <div class="col-xs-24">
                                    <div class="col-xs-50">
                                        <div class="col-xs-10 form-group">
                                            <label class="name">Name</label>
                                        </div>	
                                        <div class="col-xs-34">
                                            <input class="text form-control"  type="text" id="name" name="name" placeholder="Contact Name" required="required" />
                                        </div>	
                                    </div>
                                    <div class="col-xs-50" >
                                        <div class="col-xs-10 form-group">
                                            <label class="name">Phone</label>
                                        </div>	
                                        <div class="col-xs-34">     
                                            <input class="text form-control" type="text"  id="phone" name="phone" placeholder="Contact Phone Number" required="required" />

                                        </div>  
                                    </div>
                                    <div class="col-xs-50">


                                        <div class="col-xs-34">   
                                            <input    id="moddel" name="email" class="text form-control" type="hidden"  value="<?= $pk[0]->model_name ?>" />

                                        </div>  
                                    </div>
                                    <div class="col-xs-50">

                                        <div class="col-xs-10 form-group">
                                            <label class="name" for="email">varient:</label>
                                        </div>	
                                        <div class="col-xs-34">   
                                            <select id="varint" class="form-control" >
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
                                    <div class="col-xs-50" >

                                        <div class="col-xs-10">     
                                            <input  type="checkbox"  id="tdrive" name="tdrive"  />

                                        </div>
                                        <div class="col-xs-19">
                                            Need Test Drive?
                                        </div>
                                    </div>
                                    <div class="col-xs-50" >

                                        <div class="col-xs-10">     
                                            <input  type=checkbox  id="loan" name="loan"  />

                                        </div> 
                                        <div class="col-xs-19">
                                            Need Loan?
                                        </div>
                                    </div>


                                    <div class="col-xs-50">

                                        <div class="col-xs-12 form-group">
                                            <label>&nbsp;</label>
                                            <input type="button" id="submit" class="btn" value="Send" />
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xs-24">
                                    <div class="col-xs-50">

                                        <div class="col-xs-10 form-group">
                                            <label class="name" for="email">email:</label>
                                        </div>	
                                        <div class="col-xs-34">   
                                            <input placeholder="Enter Your User Name"   id="email" name="email" class="text form-control" type="email" required="required" />

                                        </div>  
                                    </div>
                                    <div class="col-xs-50">

                                        <div class="col-xs-10 form-group">
                                            <label class="name" for="email">message:</label>
                                        </div>	
                                        <div class="col-xs-34">   
                                            <textarea  id="msgg" name="email" class="text form-control"  required="required" ></textarea>

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

                    <?php $image = 'default_thumb.jpg'; ?>
                    <?PHP
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
                            echo '<li><strong>VEHICLE MAKE:</strong>' . $rows->companyname . '</li>';
                            echo '<li><strong>VEHICLE OPTION:</strong>' . $rows->model_name . '</li>';
                            echo '<li><strong>About:</strong>' . $rows->about_model . '</li>';
                            echo '<li><strong>Price:</strong>';
                            if (isset($prices)) {
                                $prices = array_unique($prices);
                                echo'&#x20B9';
                                echo min($prices);
                                echo '-';
                                echo max($prices);
                            } else {
                                echo 'Not defined';
                            }
                            echo '</li>';
                            if (strlen($rows->brochure) > 5)
                                echo '<li><strong>Brochure:</strong><a target="_blank" href="' . site_url('assets/files') . "/" . $rows->brochure . '">Click</a></li>';
                            echo '</ul>';
                        }
                        echo '</div></div>';
                    }
                    $this->db->order_by("img_id", 'DESC');
                    $query = $this->db->get_where('model_images', array('model_id' => $id));
                    if ($query->num_rows() > 0) {
                        ?>
                        <div class="tab-pane" id="pics">
                            <div class="col-xs-50 col-sm-50 col-md-50 pull-right" > <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
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
                                </div>  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                                <ol class="carousel-indicators"><?php
                                    $j = 0;
                                    while ($j < $i) {
                                        $image = explode('.', trim($images[$j]));
                                        $image = $image[0] . '_thumb.' . $image[1];
                                        echo '<li style="background-image:url(' . "'" . base_url() .
                                        "assets/images/newvehicles/thumbs/" . $image . "'" . ')" data-target="#carousel-example-generic" data-slide-to="' . $j . '" ';

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
                    echo '<li class="col-xs-10" style="border:solid #ccc 1px;" title="' . $row->var_name . '"><a href="#idto' . $row->varient_id . '"  role="tab" data-toggle="tab" >' . $row->var_name . '</a></li>';
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
                            if ($rows->description != "") {
                                $Speci = $rows->specification . " <label title='" . $rows->description . "'> ?</label>";
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
                    /* $this->db->join('feaur', 'feaur_vehicle.feachur_id = feaur.feachur_id', 'LEFT OUTER');
                      $query1 = $this->db->get_where('feaur_vehicle', array(
                      'verient_id' => $variant,
                      'feaur_vehicle.status' => 1));
                      if ($query1->num_rows() > 0) {
                      foreach ($query1->result() as $row) {
                      $tr[] = $row->feachur_id;
                      $features[$row->feachur_id][0] = $row->feachur;
                      $features[$row->feachur_id][$variant] = $row->value;
                      $row->description;
                      }
                      }
                      $this->db->join('deatils', 'deatils_vehicle.deatil_id = deatils.deatil_id', 'LEFT OUTER');
                      $query1 = $this->db->get_where('deatils_vehicle', array(
                      'verient_id' => $variant,
                      'deatils_vehicle.status' => 1));
                      if ($query1->num_rows() > 0) {
                      foreach ($query1->result() as $row) {
                      $trd[] = $row->deatil_id;
                      $det[$row->deatil_id][0] = $row->deatil;
                      $det[$row->deatil_id][$variant] = $row->value;
                      $row->description;
                      }
                      }
                      $this->db->join('specification', 'specification_vehicle.spec_id = specification.spec_id', 'LEFT OUTER');
                      $query1 = $this->db->get_where('specification_vehicle', array(
                      'verient_id' => $variant,
                      'specification_vehicle.status' => 1));
                      if ($query1->num_rows() > 0) {
                      foreach ($query1->result() as $row) {
                      $trs[] = $row->spec_id;
                      $spec[$row->spec_id][0] = $row->specification;
                      $spec[$row->spec_id][$variant] = $row->value;
                      $row->description;
                      }
                      } */
                    $content = $content . $divends;
                }
                echo '<li style="border:solid #ccc 1px;"><a href="#all' . $row->varient_id . '"  role="tab" data-toggle="tab">All Models</a></li></ul><div class="tab-content">' . $content . '<div class="tab-pane" id="all' . $row->varient_id . '">';
                ?>
                <div class=" table-responsive"></div>
                <div class="col-xs-50">
                    <table class="table table-striped table-condensed table-hover table-bordered" style="width: 50px;">
                        <?php
                        echo '<tr class="warning"><th></th>';
                        foreach ($variants as $keys2) {
                            echo '<th class="col-xs-5">' . $variantname[$keys2] . '</th>';
                        }
                        echo '</tr>';

                        if (!empty($tr)) {
                            echo '<tr class="info"><th class="col-xs-10"><h5><a href="#" id="fetchHed">Features</a></h5></th></tr>';
                            $tr = array_unique($tr);
                            foreach ($tr as $keys) {
                                echo '<tr title="' . $features[$keys][0] . '" class="featch">';
                                echo '<td>' . $features[$keys][0] . '</td>';
                                foreach ($variants as $keys2) {
                                    ?>
                                    <td><?php
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
                            echo '<tr class="info"><th><h5><a href="#" id="specHead">Specification</a></h5></th></tr>';
                            $trs = array_unique($trs);
                            foreach ($trs as $keys) {
                                echo '<tr title="' . $spectit[$keys][0] . '" class="spec">';
                                echo '<td>' . $spec[$keys][0] . '</td>';
                                foreach ($variants as $keys2) {
                                    ?>

                                    <td><?php
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
                        /* if (isset($det)) {
                          echo '<tr class="info"><th><h5>Details</h5></th></tr>';
                          $trd = array_unique($trd);
                          foreach ($trd as $keys) {
                          echo '<tr >';
                          echo '<td>' . $det[$keys][0] . '</td>';
                          foreach ($variants as $keys2) {
                          ?>

                          <td><?php
                          if (isset($det[$keys][$keys2])) {
                          echo $det[$keys][$keys2];
                          } else {
                          echo '----';
                          }
                          ?></td>

                          <?php
                          }
                          echo '</tr>';
                          }
                          } */
                        ?>
                    </table>
                </div></div></div></div>
    <?php } ?>
    </div>
    </div>


<?php } ?>

</div>