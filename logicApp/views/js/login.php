<script>                
    $(document).ready(function(){
        console.log('jquery works');
        $('#form').submit(function(){
            $('.progressdiv').show();
            $('.progressdiv').html('Validating');
            $('.options').html('');
            console.log('its ok');
            var postdata={};
            postdata.userName=$('#userName').val();
            postdata.pass=$('#pass').val();
            $.ajax({
                url:"<?= site_url('json/login') ?>",
                type:'post',
                dataType:'json',
                data:postdata
            }).done(function(data){
                if(data.error==true){
                    $('.progressdiv').hide();
                    $('.options').append('<li class="warning">'+data.message+'</li>');
                }
                else if(data.error==false){
                    $('.options').append('<li class="success">'+data.message+' </br>You have successfully logged in, if you are not directed please <a href="<?=base_url()?>welcome">Click here</a></li>');
                    setTimeout(function(){
                        $('.progressdiv').hide();
                        <?PHP
                        if(isset($_GET['back'])){
                        ?>
                        window.history.back(2);
                        <?PHP
                        }
                        else{
                        ?>
                        window.location="<?=isset($_GET['url'])?site_url($_GET['url']):site_url('welcome')?>";
                        <?PHP
                        } ?>
                    },4000);
                }
                else{
                    $('.options').append('<li >Unknown error</li>');
                }
            });
            return false;
        })
    });    
</script>