<script>
    $(document).ready(function () {
        $(".link").click(function () {
            var postdata = {};
            postdata.link = $(this).attr('data-bind');
            $.ajax({
                url: "<?= site_url('hotJson/getLink'); ?>",
                type: 'post',
                dataType: 'html',
                data: postdata
            }).done(function (data) {
                $("#data").html(data);
            });
        });
        $("#search").change(function () {
            var postdata = {};
            postdata.search = $(this).val();
            $.ajax({
                url: "<?= site_url('hotJson/searchLink'); ?>",
                type: 'post',
                dataType: 'html',
                data: postdata
            }).done(function (data) {
                $("#newlinks").html(data);
            });
        });
    });
    function viewVedio(id) {
        var postdata = {};
        postdata.link = id;
        $.ajax({
            url: "<?= site_url('hotJson/getLink'); ?>",
            type: 'post',
            dataType: 'html',
            data: postdata
        }).done(function (data) {
            $("#data").html(data);
        });
    }
</script>
<div class="col-xs-50 col-xs-offset-1" id="main_page">
    <div class="col-xs-48 whiteBox1">
        <div class="col-xs-48">
            <br /><br />
        </div>
        <div class="col-xs-30" style="padding: 5px 0 0 0;" align='center' id="data"><?= $links[0]->datainfo; ?></div>
        <div class="col-xs-20" style="padding: 5px 0 0 0;">
            <div class="col-xs-48" style="background: #918e8e; color: #fff; padding: 10px 10px 10px 10px;">
                <div class="col-xs-25">
                    <img class="col-xs-50" src="<?=IMAGES_PATH?>hot_group_vedios.jpg" />
                </div>
                <div class="col-xs-25">
                    <input id="search" type="text" class="form-control" style="background:url(<?=IMAGES_PATH?>search2.png) no-repeat right; background-color: #fff;" />
                </div>
            </div>
            <ul id="newlinks">
                <?PHP
                foreach ($links as $link) {
                    ?>
                    <li> <b><a  data-bind="<?= $link->id; ?>" class="link"><?= $link->username . " - " . $link->text ?></a></b></li>
                    <?PHP
                }
                ?>

            </ul>
        </div>
        <div class="col-xs-48">
            <br /><br />
        </div>
    </div>
</div>
