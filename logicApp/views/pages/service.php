<style>
    .search{
        background-color: #3f7da2;
        border-radius: 5px;
        border: solid 1px #000;
        background-image: url("<?= IMAGES_PATH; ?>search1.png");
        width: 150px;
        height: 41px;
    }
    .dotBorderBox{
        border: dotted 1px #000;
    }
</style>
<script type="text/javascript">
    function service(id,cid) {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $('#myModal').find('.modal-body').html(xmlhttp.responseText);
            }
        }
        xmlhttp.open("GET", "<?= site_url('background/service'); ?>?delId=" + id+"&&cmp_id="+cid);
        xmlhttp.send();
    }
    function breakservice(id) {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $('#myModal').find('.modal-body').html(xmlhttp.responseText);
            }
        }
        xmlhttp.open("GET", "<?= site_url('background/breakservice'); ?>?brachId=" + id);
        xmlhttp.send();
    }
    function pageing(pnum){
        $(".serPage").hide();
        $(".serpage"+pnum).show();
    }
    $(document).ready(function () {
        $("#search").click(function () {
            var postData = {};
            postData.dist = $("#dist").val();
            postData.comp = $("#comp").val();
            postData.uuri = $("#uid").val();
            $.ajax({
                url: "<?= site_url('newjson/service'); ?>",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                $("#list").html("");
                var page;
                $.each(data, function (index, value) {
                    page=Math.floor(index/10);
                    $("#list").append('<div class="dotBorderBox col-xs-50 serPage serpage'+page+'"><div calss="col-xs-48 col-xs-offset-1"><h5 class="col-xs-50">' + value.name + '</h5><div class="col-xs-25"><p class="col-xs-50">' + value.address.replace(/\n/g, "<br>") + '</p><p class="col-xs-50"><i class="glyphicon glyphicon-envelope"></i>' + value.sar_email + '</p><p class="col-xs-50"><i class="glyphicon glyphicon-phone-alt"></i>' + value.sar_ph + '</p></div><div  class="col-xs-25">  <div style="background:#3f7da2; border-radius:7px; margin:5px 0px 5px; padding:20px;" class="col-xs-48"> <strong style="font-size: medium; background:#3f7da2;"><a onclick="service(' + value.branch_id + ', ' + value.company_id + ');" style="color:#fff" href="#myModal" data-toggle="modal" class="lightBox" value="" data-link="service">Book Your Service</a></strong></div><div style="background:#F00; border-radius:7px; color:#fff; margin:5px 0px 5px;  padding:20px;" class="col-xs-48"><strong style="font-size: medium;"><a onclick="breakservice(' + value.branch_id + ', ' + value.company_id + ');" href="#myModal" data-toggle="modal" class="lightBox" value="" data-link="service">Breakdown Service</a></strong></div></div></div><div>');
                });
                $(".serPage").hide();
                $(".serpage0").show();
                var cont='<ul  class="pagination">';
                for(i=0;i<=page;){
                     cont+='<li nclick="pageing('+i+')"><a href="#list">'+ ++i +'</a></li>';
                }
                cont+="</ul>";
                $("#page-selection").html(cont);
            }).fail(function (){
                alert("error");
            });
        });
    });
</script>
<div class="col-xs-48 col-xs-offset-1" o>
    <div class="col-xs-50" style="padding:15px;">
           <?php 
        if($uri=='car'){
        echo '<center><strong>Car Service Centers In Kerala</strong></center>';
        
        }
 else {
      echo '<center><strong>Bike Service Centers In Kerala</strong></center>';
 }
        ?>
    </div>
    <div class="col-xs-50 col-md-35" style="padding:15px;">

        <div class="col-xs-15">
            <select id="comp" class="select  required form-control"> 
                <option value="0">Select Brand</option>
                <?php
                foreach ($company as $brand) {
                    $cmp_id = $brand->cmp_id;
                    echo '<option  value="' . $cmp_id . '">' . $brand->companyname . '</option>';
                }
                ?>  
            </select>
        </div>
        <div class="col-xs-15">
            <select id="dist" class="select  required form-control">
                <option value="0">Select District</option>
                <?php
                foreach ($district as $rowonroad_place) {
                    $place_id = $rowonroad_place->place_id;
                    echo '<option  value="' . $place_id . '">' . $rowonroad_place->placename . '</option>';
                }
                ?>   
            </select>
        </div>
        <div class="col-xs-15">
            <input class="search" type="button" id="search">
        </div>

        <div class="col-xs-50" id="list">

        </div>
        <input id="uid" name="uid" class="text form-control" type="hidden"  value="<?php echo $uri;?>" />
        <div class="col-xs-50" id="page-selection"></div>
    </div>
    <div class="col-xs-50 col-md-15" id="addDiv"></div>
</div>