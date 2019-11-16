<script src="<?PHP echo JS_PATH; ?>jquery.js"></script>
<script src="<?= base_url() ?>assets/bs/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#form").submit(function(){
            if($("#phone").val().length==10 && $.isNumeric( $("#phone").val() )){
                return true;
            }
            else{
                alert("Please enter your 10 digit phone");
                return false;
            }
        });
        $.ajax({
            url: "<?PHP echo base_url('ad/wpview/ad-contact'); ?>"
        }).done(function (data) {
            $('#details').html(data);
        }).fail(function () {
            alert("error");
        });
    });
</script>