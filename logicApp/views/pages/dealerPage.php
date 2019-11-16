<script>
    $(document).ready(function () {
        $('#left,#right').click(function () {
            changeplace($(this).attr('id'));
        });
        $('.placeIdent').click(function () {
            $(".braData").hide();
            //$('.placeIdent').removeClass('active');
            $(this).addClass('active');
            $("#" + $(this).attr('formData')).show();
        });
        function friendView(id) {
            $.ajax({
                url: "<?= site_url("welcome/vehiView"); ?>" + "/" + id + "/<?= $this->uri->segment(3); ?>",
            }).done(function (data) {
                $('#brandCur').html(data);
            }).fail(function () {
                alert("error");
            });
        }
        $('.placename').click(function () {
            id = $(this).attr('data-dismiss');
            friendView(id);
        });
        changeplace('right');
<?PHP if (!empty($models[0]->model_id)) { ?>
            friendView(<?= $models[0]->model_id; ?>);
    <?PHP
}
?>
        function changeplace(path)
        {
            var total = $('#total').val();
            var from = parseInt($('#left').attr('value'));
            var to = parseInt($('#right').attr('value'));
            var i = from;
            console.log(from + '-' + to);
            $('.placename').slideUp().hide();
            while (i <= to)
            {

                if (i > (total))
                {
                    $('#itemid' + (i - (total))).slideDown(1000);
                }
                else
                {
                    $('#itemid' + i).slideDown(1000);
                }
                i++;
            }
            console.log(i);
            if (i > total)
            {
                from = 1;
                to = from + 2;
            }
            else
            {
                from = i;
                to = from + 2;
            }
            $('#left').attr('value', from);
            $('#right').attr('value', to);
        }

    })</script>
<style>
    .box{
        margin-left: 1%;
        margin-right: 1%;
    }
    #left , #right{
        font-size:40px;
        line-height: 130px;
        color: rgba(0, 0, 0, 0.18);
    }
    .placename{
        height: 120px;
    }
    .search-box .carousel-inner > .item > img, .carousel-inner > .item > a > img {
        line-height: 1;
        width:100%;
        height: auto;
    }
    .braData{
        display: none;
    }
    .placeIdent .active a{
        color: #CCC;
    }
    .places{
        margin-top: 50px;
        height: 300px;
    }
    .search-box .carousel-indicators li{
        width:100px;
        height: 60px;
        background-size: cover;
        background-position: center;
    }
    .search-box .carousel-inner > .item {
        height: 400px;
        overflow: hidden;
    }
    .search-box .carousel-indicators {
        position: relative;
        /* bottom: 10px; */
        left: 0;
        margin-top: 33px;
        width: 100%;
        margin-left: 0;
    }
    .search-box .carousel-control{
        background-image: none !important;
    }
    .search-box .carousel-caption {
        bottom: -5%;
        color: black;
    }
</style>
<div class="col-xs-48 col-xs-offset-1">
    <h2><?= $branch[0]->name; ?></h2>
    <div class="col-xs-50 col-sm-20 col-md-12 search-box" style="min-height: 300px;"><br>
        <?PHP
        if (isset($brands[0]->image)) {
            ?>
            <center>
                <img src="<?= IMAGES_PATH . "companies/" . $brands[0]->image ?>" />
            </center>
            <hr class="col-xs-48">
            <?PHP
        }
        echo nl2br($branch[0]->address) . "<br /> Ph1:" . $branch[0]->ph1 . "<br> Ph2:" . $branch[0]->ph2 . "<br />Email:" . $branch[0]->email;
        if (!isset($models)) {
            ?><br><br><div style="background:#0F0; border-radius:7px; margin:5px 0px 5px; padding:20px;" class="col-xs-48"> <strong style="font-size: medium; background:#0F0;"><a href="#myModal" data-toggle="modal" class="lightBox" value="<?= $this->uri->segment(3); ?>" data-link="testDrive?delId=<?= $this->uri->segment(3); ?>&cmp_id=<?php echo $comp_id[0]->company_id; ?>&delname=<?= $branch[0]->name; ?>&used=<?php echo '1'; ?>">Book Your Test Drive</a></strong></div><?PHP
        } else {
            ?>
            <br />
            <div style="background:#0F0; border-radius:7px; margin:5px 0px 5px; padding:20px;" class="col-xs-48"> <strong style="font-size: medium; background:#0F0;"><a href="#myModal" data-toggle="modal" class="lightBox" value="<?= $this->uri->segment(3); ?>" data-link="testDrive?delId=<?= $this->uri->segment(3); ?>&cmp_id=<?php echo $comp_id[0]->company_id; ?>&new=<?php echo '1'; ?> ">Book Your Test Drive</a></strong></div>
            <div style="background:#F00; border-radius:7px; color:#fff; margin:5px 0px 5px;  padding:20px;" class="col-xs-48">
                <strong style="font-size: medium;"><a href="#myModal" data-toggle="modal" class="lightBox" value="<?= $this->uri->segment(3); ?>" data-link="service?delId=<?= $this->uri->segment(3); ?>&cmp_id=<?php echo $comp_id[0]->company_id; ?>&delname=<?= $branch[0]->name; ?>&cmp_type=<?php echo $comp_id[0]->type; ?> ">Book Your Service</a></strong></div>
            <?PHP
        }
        ?>

    </div>
    <?PHP
    if (isset($models)) {
        ?>
        <div class="col-xs-50 col-sm-25 col-md25">
            <div class="col-xs-1"></div>
            <div class="col-xs-48 search-box" id="brandCur">
            </div>
        </div>
        <div class="col-xs-50 col-sm-20 col-md-12">
            <?PHP
            if (isset($otherBranches)) {
                ?>
                <div class="col-xs-50">
                    <h2>Other Branches</h2>           
                    <div class="navbar bg-info">
                        <?PHP
                        $val = count($otherBranches) - 1;
                        foreach ($otherBranches as $key => $branch) {
                            ?>
                        <p class='placeIdent' formData='bra<?= $key; ?>'><b class='col-xs-48 col-xs-offset-1'><a href="#" onclick="return false;"><?= $branch->placename ?></a></b>
                            </p>
                            <nav class='braData' id='bra<?= $key; ?>'>
                                <div class="col-xs-46 col-xs-offset-2" style="color: #f00;">
                                    <b class='col-xs-50'><?= $branch->name ?></b>
                                    <div><?= nl2br($branch->address) ?></div>
                                    <div>Phone1:<?= $branch->ph1.", ".$branch->ph2 ?></div>
                                    <div>Email:<?= $branch->email ?></div>
                                    <div class='col-xs-23' style='background:#0F0; padding:5px; color: #000; border-radius: 3px;'>
                                        <a href='#myModal' data-toggle='modal' class='lightBox' value='<?= $branch->branch_id ?>' data-link='testDrive?delId=<?= $branch->branch_id ?>&cmp_id=<?= $comp_id[0]->company_id ?>' >Book Test Drive</a>
                                    </div>
                                    <div class='col-xs-23 col-xs-offset-2' style='background:#F00; padding:5px; color: #FFF; border-radius: 3px;'>
                                        <a href='#myModal' data-toggle='modal' class='lightBox' value='<?= $branch->branch_id ?>' data-link='service?delId=<?= $branch->branch_id ?>&cmp_id= <?= $comp_id[0]->company_id ?>'>Book Your Service</a>
                                    </div>
                                </div>
                            </nav>
                            <?PHP if ($val != $key) { ?>
                                <hr class="col-xs-50" style="padding: 0; margin: 0;" />
                                <?PHP
                            }
                        }
                        ?>
                    </div>
                </div>
        <?PHP
    }
    ?>
        </div>
        <div class="places col-xs-50">

    <?PHP
    $i = 0;
    ?>
            <div class="col-xs-5 col-sm-2">
                <span  value="1" class="glyphicon glyphicon-chevron-left" id="left"></span>
            </div>
    <?PHP
    foreach ($models as $model) {
        $i++;
        if (!empty($model->model_image))
            $img = "newvehicles/thumbs/" . strrev(implode(strrev("_thumb."), explode(".", strrev($model->model_image), 2)));
        else
            $img = "page1_img1.jpg";
        ?>
                <div class="box col-xs-14 placename" data-dismiss="<?= $model->model_id ?>" id="itemid<?= $i ?>" >
                    <div class="col-xs-15 thumbnail ">
                        <img src="<?= IMAGES_PATH . $img; ?>" />
                    </div>
                    <div>
                        <ul class="modelInfo">
                            <li>Model: <?= $model->model_name ?></li>
                            <li>
        <?= ' <a href="#myModal" style="color:#00f;" class="details fullview" get="viewnew" value="' . $model->model_id . '"  data-toggle="modal" data-target="#myModal" id="' . $model->model_id . '" >More Details</a>' ?>
                            </li> <li><?= nl2br($model->about_model); ?></li>
                        </ul>
                    </div>
                </div>

        <?PHP
    }
    ?>
            <input type="hidden" id="total" value="<?= $i ?>" />
            <div class="col-xs-5 col-sm-2">
                <span  value="3" class="glyphicon glyphicon-chevron-right" id="right"></span>
            </div>
    <?PHP
}
if (isset($userVehiDel)) {
    if ($this->session->userdata('keralaonroads')) {
        echo "<div class='col-xs-50 col-sm-29 col-md-37 col-xs-offset-1'>";
        foreach ($userVehiDel as $model) {
            if (!empty($model->image))
                $img = "thumb/" . strrev(implode(strrev("_thumb."), explode(".", strrev($model->image), 2)));
            else
                $img = "page1_img1.jpg";
            ?>
                    <div class="box col-xs-15" style="height:160px;" data-dismiss="<?= $model->pro_id ?>" >
                        <div class="col-xs-15 thumbnail ">
                            <img src="<?= UPLOAD_PATH . $img; ?>" />
                        </div>
                        <div>
                            <ul class="modelInfo">
                                <li><b> <?= $model->title_name ?></b></li>
                                <li>
            <?= '<a href="#myModal" style="color:#00f;" class="details fullview" get="view" value="' . $model->pro_id . '"  data-toggle="modal" data-target="#myModal" id="' . $model->pro_id . '" >More Details</a>' ?>
                                </li> <li><?= nl2br($model->discription); ?></li>
                            </ul>
                        </div>
                    </div>
            <?PHP
        }
        echo "</div>";
    }
    else {
        redirect('welcome/login');
    }
}

if (isset($userVehi)) {
    if ($this->session->userdata('keralaonroads')) {
        echo "<div class='col-xs-50 col-sm-29 col-md-37 col-xs-offset-1'>";
        foreach ($userVehi as $model) {
            if (!empty($model->image))
                $img = "thumb/" . strrev(implode(strrev("_thumb."), explode(".", strrev($model->image), 2)));
            else
                $img = "page1_img1.jpg";
            ?>
                    <div class="box col-xs-15" style="height:160px;" data-dismiss="<?= $model->pro_id ?>" >
                        <div class="col-xs-15 thumbnail ">
                            <img src="<?= UPLOAD_PATH . $img; ?>" />
                        </div>
                        <div>
                            <ul class="modelInfo">
                                <li><b> <?= $model->title_name ?></b></li>
                                <li>
            <?= '<a href="#myModal" style="color:#00f;" class="details fullview" get="view" value="' . $model->pro_id . '"  data-toggle="modal" data-target="#myModal" id="' . $model->pro_id . '" >More Details</a>' ?>
                                </li> <li><?= nl2br($model->discription); ?></li>
                            </ul>
                        </div>
                    </div>
            <?PHP
        }
        echo "</div>";
    }
    else {
        redirect('welcome/login');
    }
}
?>

    </div>
</div>