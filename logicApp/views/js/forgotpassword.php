<script>                
    $(document).ready(function(){
        $('#form').submit(function(){
            var postdata={};
            postdata.userName=$('#userName').val();
            $.ajax({
                url:"<?= site_url('json/forgotpassword') ?>",
                type:'post',
                dataType:'json',
                data:postdata
            }).done(function(data){
                alert(data)
            }).fail(function () {
                alert("error");
                $('.progressdiv').hide();
            });
            return false;
        })
    });    
</script>