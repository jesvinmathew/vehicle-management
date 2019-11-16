<script>      
    $(document).ready(function(){
        console.log('jquery works');
        $('#form').submit(function(){
            if($("#name").val()=="")
            {
                alert("enter the name");
                $("#name").focus();
                return false;
                
            }
            if($("#email").val()=="")
            {
                alert("enter the email");
                $("#email").focus();
                return false;
                
            }
            if($("#rpass").val()=="")
            {
                alert("enter the password");
                $("#rpass").focus();
                return false;
                
            }
            if($("#pass").val()=="")
            {
                alert("confirm password");
                $("#pass").focus();
                return false;
                
            }
            if($("#phone").val()=="")
            {
                alert("enter the phone number");
                $("#phone").focus();
                return false;
                
            }
            if($("#location").val()=="")
            {
                alert("enter the location");
                $("#location").focus();
                return false;
                
            }
            var myLength = $("#name").val().length;
                if(myLength<3)
                {
                    alert("name shoul be atleast 3 charecters");
                    $("#name").focus();
                }
                  var myLength = $("#pass").val().length;
                if(myLength<5)
                {
                    alert("password should be atleast 5 charecters");
                    $("#pass").focus();
                }
                if($("#pass").val()!=$("#rpass").val())
                {
                    alert("password doesnot match");
                }
                var loc=/^[A-z]+$/;
                if(loc.test($.trim($("#location").val())) == false)
                {
                    alert("location should contain alphabets only")
                }
                var mb = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
                if (mb.test($.trim($("#phone").val())) == false)
                {
                     alert("Please enter valid mobile number.");
                     $("#phone").focus();
                     return false;
                } 
                 var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
               if (testEmail.test($.trim($("#email").val())) == false)
                {
                     alert("Please enter valid email id");
                     $("#email").focus();
                     return false;
                } 
          
            $('.progressdiv').show();
            $('.progressdiv').html('Validating');
            $('.options').html('');
            console.log('its ok');
            var postdata={};
            postdata.name=$('#name').val();
            postdata.email=$('#email').val();
            postdata.rpass=$('#rpass').val();
            postdata.pass=$('#pass').val();
            postdata.phone=$('#phone').val();
            postdata.location=$('#location').val();
            $.ajax({
                url:"<?= site_url('json/register'); ?>",
                type:'post',
                dataType:'html',
                data:postdata
            }).done(function(data){if(data.error==true){
                    $('.progressdiv').hide();
                    $('.options').append('<li class="warning">'+data.message+'</li>');
                    $.ajax({
                        url:"<?= site_url('welcome/sms/'); ?>"+$('#phone').val()+"/Thank you for Register in keralaonroad.com. Check your email for continue"
                    });
                }
                else if(data.error==false){
                alert(data.ph);
                    setTimeout(function(){
                        $('.progressdiv').hide();
                        window.location="<?=site_url('welcome/plans')?>";
                    },4000);
                }
                else{
                    $('.options').append('<li >Unknown error</li>');
                }
            });
        })
    })
</script>