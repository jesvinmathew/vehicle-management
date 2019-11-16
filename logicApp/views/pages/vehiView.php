<div class="col-xs-50" id="viewcardetails">
    <script>
        $(document).ready(function () {            $("#link").click(function () {
                $("#linkprice").hide();
                $('#form').show();
            });
            <?php
            if(!$this->uri->segment(4)){
            ?>
            $("#dist").change(function () {
                $("#comp").html("");
                var postdata = {};
                postdata.dist = $("#dist").val();
                postdata.cmpid = $("#companyid").val();
                $.ajax({
                    url: "<?= site_url('newjson'); ?>/get_dealer_dist",
                    type: 'post',
                    dataType: 'json',
                    data: postdata
                }).done(function (data) {
                    $("#comp").html("");
                    $.each(data, function (index, value) {
                        $("#comp").append('<option value="' + value.dealer_id + '">' + value.name + '</option>');
                    });
                });
            });
            <?PHP
            }
            ?>
            $("#submit").click(function () {
		var toname = "";
		var toemail = "";
                var msg = "";
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if ($("#name").val() != "") {
                    msg += "Name:" + $("#name").val();
                    toname=$("#name").val();
                }
                else {
                    alert("Please enter Name");
                    return false;
                }
                if ($("#phone").val().length == 10) {

                    msg += "<br />Phone:" + $("#phone").val();
                }
                else {
                    alert("Please enter your 10 digit mobile");
                    return false;
                }
                if ($("#email").val() != "" && emailReg.test($("#email").val())) {
                    msg += "<br />Email:" + $("#email").val();
                    toemail=$("#email").val();
                }
                else {
                    alert("Please enter email id");
                    return false;
                }                
                if ($("#moddel").val() != "") {
                    msg += "<br />Model:" + $("#moddel").val();
                }
                else {
                    alert("Please select Model");
                    return false;
                }
                if ($("#varint").val() != "") {
                    msg += "<br />Varient:" + $("#varint option:selected").text();
                }
                else {
                    alert("Please select varient");
                    return false;
                }
                if ($("#dist").val() != 0) {
                    msg += "<br />District:" + $("#dist option:selected").text();
                }
                else
                {
                    alert("Please fill district");
                    return false;
                }
                if ($("#comp").val() != "") {
                    msg += "<br />Dealer:" + $("#comp option:selected").text();
                }
                if ($("#tdrive").prop('checked') == true) {
                    msg += "<br />Customer Need Test Drive";
                }
                if ($("#loan").prop('checked') == true) {
                    msg += "<br />Customer Need Loan";
                }
                if ($("#msgg").val() != "") {
                    msg += "<br />Message:" + $("#msgg").val();
                }
                else {
                    alert("Please enter message");
                    return false;
                }
                if(!$("#temsVehiView").is(':checked')){
                    alert("Please accept the terms and cunditions");
                    return false;
                }
                var postdata = {};
                postdata.toname = toname;
                postdata.toemail = toemail;
                postdata.msg = msg;
                $.ajax({
                    url: "<?= site_url('background'); ?>/vareq",
                    type: 'post',
                    dataType: 'html',
                    data: postdata
                }).done(function (data) {
                    alert(data);
                });
                $('#form').hide();
                $('#price1').show();

            });

        });

    </script>
    <style>
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
        #viewcardetails .border{
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
        };
        @-moz-document url-prefix() {
            fieldset { display: table-cell; }
        }
    </style>
    <?PHP
    if ($models[0]->model_id) {
        ?>
        <ul class="nav nav-pills" role="tablist">
            <li class="active"><a href="#overview1"  role="tab" data-toggle="tab">Overview</a></li>
            <li><a href="#price1"  role="tab" data-toggle="tab">Price</a></li>
            <li><a href="#pics1"  role="tab" data-toggle="tab">Pictures</a></li>
        </ul>
        <div class="col-xs-50">
            <div class="tab-content">
                <div class="tab-pane " id="price1">
                    <?php
                    echo '<div style="padding:25px;"  id="linkprice">';
                    echo'<h6 style="color:#A52A2A"><a href"#" id="link" ><img src="'. IMAGES_PATH.'getonroad_button.png'.'" /></a></h6>';
                    echo '</div>';
                    $id = $this->input->get('viewnew');
                    ?>
                    <div class="col-xs-48 col-xs-offset-1" id="form" style=" display: none">
                        <div class="col-xs-49" style="padding:7px;">
                            <div class="col-xs-24">
                                <div class="col-xs-50">
                                    <div class="col-xs-12 form-group">
                                        <label class="name">Name</label>
                                    </div>	
                                    <div class="col-xs-37">
                                        <input class="text form-control"  type="text" id="name" name="name" placeholder="Contact Name" required="required" />
                                    </div>	
                                </div>
                                <div class="col-xs-50" >
                                    <div class="col-xs-12 form-group">
                                        <label class="name">Phone</label>
                                    </div>	
                                    <div class="col-xs-37">     
                                        <input class="text form-control" type="text"  id="phone" name="phone" placeholder="Contact Phone Number" required="required" />

                                    </div>  
                                </div>
                                <div class="col-xs-50">


                                    <div class="col-xs-34">   
                                        <input id="moddel" name="email" class="text form-control" type="hidden"  value="<?= $models[0]->model_name; ?>" />

                                    </div>  
                                </div>
                                <div class="col-xs-50">

                                    <div class="col-xs-12 form-group">
                                        <label class="name" for="email">variant:</label>
                                    </div>	
                                    <div class="col-xs-37">   
                                        <select id="varint" class="form-control" >
                                            <option value="">None</option>
                                            <?PHP
                                            foreach ($variants as $row) {
                                                echo "<option value='$row->var_name' > $row->var_name</option>";
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" id="companyid" value="<?= $models[0]->cmp_id ?>" />
                                    </div>  
                                </div>
                                <div class="col-xs-50">
                                	<?PHP
                                	if(isset($delName)){
                                	?>
                                    	<select id="comp" class="form-control" style="display:none">
                                            <option value="<?= $delName; ?>"><?= $delName; ?></option>                                            
                                        </select>
                                    	<?PHP
                                	}
                                	else{
                                	?>
                                    <div class="col-xs-12 form-group">
                                        <label class="name" for="email">Dealer:<?= $this->uri->segment(2) ?></label>
                                    </div>	
                                    <div class="col-xs-37">   
                                        <select id="comp" class="form-control" >
                                            <option value="">None</option>
                                            <?PHP
                                            $qq = $this->db->get_where('model', array('model_id' => $models[0]->model_id));
                                            $modl = $qq->result();
                                            $qryy = $this->db->get_where('dealer', array('company_id' => $modl[0]->cmp_id));

                                            foreach ($qryy->result() as $row) {
                                                echo "<option value='$row->name' > $row->name</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    	<?PHP
                                    	}
                                    ?>
                                </div>
                                <div class="col-xs-50" >

                                    <div class="col-xs-10">     
                                        <input  type="checkbox"  id="tdrive" name="tdrive"  />

                                    </div>
                                    <div class="col-xs-25">
                                        Need Test Drive?
                                    </div>
                                </div>
                                <div class="col-xs-50" >

                                    <div class="col-xs-10">     
                                        <input  type=checkbox  id="loan" name="loan"  />
                                    </div> 
                                    <div class="col-xs-25">
                                        Need Loan?
                                    </div>
                                </div>
                                <div class="col-xs-50">
                                    <div class="col-xs-10">
                                        <input type="checkbox" id="temsVehiView" />
                                    </div>
                                    <label class="name" class="col-xs-25" for="temsVehiView"> Accept the Terms And Condition </label>
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

                                    <div class="col-xs-12 form-group">
                                        <label class="name" for="email">email:</label>
                                    </div>	
                                    <div class="col-xs-37">   
                                        <input placeholder="Enter Email id"   id="email" name="email" class="text form-control" type="email" required="required" />

                                    </div>  
                                </div>
                                <div class="col-xs-50">

                                    <div class="col-xs-12 form-group">
                                        <label class="name" for="email">message:</label>
                                    </div>	
                                    <div class="col-xs-37">   
                                        <textarea  id="msgg" name="email" class="text form-control"  required="required" ></textarea>

                                    </div>  
                                </div>
                                <div class="col-xs-50" style="padding:5px;">
                                    <div class="col-xs-12 form-group">
                                        <label class="name" for="email">District:</label>
                                    </div>	
                                    <div class="col-xs-37">   
                                        <select id="dist" class="form-control" >
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

                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane active" id="overview1">
                    <div class="col-xs-50 col-sm-50 col-md-30">
                        <ul class="listing">
                            <li><strong>VEHICLE OPTION:</strong><?= $models[0]->model_name; ?></li>
                            <li><strong>About:</strong><?= $models[0]->about_model ?></li>
                            <li><strong>Price:</strong><b>
                                <?PHP
                            $this->db->where('price !=0');
                            $this->db->select('price_text');
                            $this->db->order_by('price','desc');
                            $this->db->limit(1);
                            $qry = $this->db->get_where('variant', ['model_id' => $models[0]->model_id ]);
                            $maxprice = $qry->result();
                            $this->db->where('price !=0');
                            $this->db->select('price_text');
                            $this->db->order_by('price','ASC');
                            $this->db->limit(1);
                            $query = $this->db->get_where('variant', ['model_id' => $models[0]->model_id]);
                            $minprice = $query->result();
                                if (isset($minprice[0])) {
                                ?>
                                &#x20B9;<?php
                                echo ' ';
                                echo $minprice[0]->price_text;
                                echo' ';
                                echo '<h7 style="color:#ff0000;">to</h7>';
                                echo' ';
                                echo $maxprice[0]->price_text;
                            } else {
                                    echo 'Not defined';
                                }
                                ?>
                            </b></li>
                        </ul>
                    </div>
                    <div class="col-xs-50 col-sm-50 col-md-20">
                        <?PHP
                        if (!empty($modelsImg[0]->model_image))
                            echo '<img class="image" align="center"  src="' . base_url() . 'assets/images/newvehicles/' . $modelsImg[0]->model_image . '" alt=""/>';
                        ?>
                    </div>
                </div>
                <div class="tab-pane" id="pics1">
                    <?PHP
                    if (!empty($modelsImg[0]->model_image)) {
                        ?>
                        <div class="col-xs-50 col-sm-50 col-md-50 pull-right" > <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">

                                    <?php
                                    $i = 0;
                                    foreach ($modelsImg as $row) {
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
                        </div>
                        <?php
                    } else {
                        echo 'No images found';
                    }
                    ?>
                </div>

            </div>  
        </div>
    </div><?PHP
}
?>