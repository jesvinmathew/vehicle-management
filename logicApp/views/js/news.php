<script src="<?=BS_PATH;?>js/jquery.bootpag.min.js"></script>
<script>
    $(document).ready(function () {
        $(".like").click(function(){
            var postdata = {};
            postdata.newsId = $(this).attr("data-link");
            $.ajax({
                url: "<?= site_url('news'); ?>/likes",
                type: 'post',
                dataType: 'html',
                data: postdata
            }).done(function (data) {
                alert(data);
            });
        });
    });
</script>