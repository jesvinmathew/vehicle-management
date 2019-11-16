<script type="text/javascript">
    $(document).ready(function () {
        $("#acc").click(function () {
            if ($("#acc").prop("checked") == true) {
                $(".cond").show();
            }
            else
            {
                $(".cond").hide();
            }
        });
        $("#brak").click(function () {
            if ($("#brak").prop('checked') == true) {
                $(".msg").show();
            }
            else
            {
                $(".msg").hide();
            }
        });
        $("#bbrand").change(function () {
            var postData = {};
            postData.value1 = $(this).val();
            $.ajax({
                url: "<?PHP echo site_url('newjson'); ?>/getmodel",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                $.each(data, function (index, value) {
                    $('#bmodel').append('<option value="' + value.id + '">' + value.content + '</option>');
                });
            });
        });
        $("#bmodel").change(function () {
            var postData = {};
            postData.value1 = $(this).val();
            $.ajax({
                url: "<?PHP echo site_url('newjson'); ?>/getvariant",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                $.each(data, function (index, value) {
                    $('#bvariant').append('<option value="' + value.id + '">' + value.content + '</option>');
                });
            });
        });







$("#submitService").click(function(){
            var msg="";
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if($("#name").val()!=""){
                msg+="Name:"+$("#name").val();
            }
            else{
                alert("Please enter Name");
                return false;
            }
            
            if($("#mobile").val().length==10 && $.isNumeric( $("#mobile").val())){
                msg+="<br />Mobile Phone:"+$("#mobile").val();
            }
            else{
                alert("Please enter 10 digit Mobile Phone number");
                return false;
            }
            
            if($("#city").val()!=""){
                msg+="<br />Location:"+$("#city").val();
            }
            else{
                alert("Please enter Location");
                return false;
            }
             if($("#bdist").val()!=""){
                msg+="<br />District:"+$("#bdist").val();
            }
            else{
                alert("Please enter District");
                return false;
            }
            if($("#bbrand").val()!=""){
                msg+="<br />Brand:"+$("#bbrand").val();
            }
            else{
                alert("Please enter Vehicle Brand");
                return false;
            }
            if($("#bmodel").val()!=""){
                msg+="<br />Model:"+$("#bmodel").val();
            }
            else{
                alert("Please enter Model");
                return false;
            }
            if($("#bvariant").val()!=""){
                msg+="<br />Variant:"+$("#bvariant").val();
            }
            else{
                alert("Please enter Variant");
                return false;
            }
             if ($(".comon").prop('checked') == true) {
           if ($("#acc").prop('checked') == true) {
                if ($(".con").prop('checked') == true) {
               if ($("#rcondi").prop('checked') == true) {
                   
                  msg += "<br />running condition"; 
               }
               if ($("#ncondi").prop('checked') == true) {
                   
                  msg += "<br />not running condition"; 
               }
           }
           else{
               alert("Select vehicle condiotion");
               return false;
           }
            }
            if ($("#brak").prop('checked') == true) {
            if($("#message").val()!=""){
                msg+="<br />Message:"+$("#message").val();
            }
            else{
                alert("Please enter Your message");
                return false;
            } 
        }}
    else
    {
        alert("select service");
        return false;
    }
            if(!$("#temsBrService").prop('checked') == true){
                alert("Please accept the terms and cunditions");
                return false;
            }
            var postdata = {};
            postdata.msg = msg; 
            $.ajax({
                url: "<?= site_url('background'); ?>/bookService",
                type: 'post',
                dataType: 'html',
                data: postdata
            }).done(function (data) {
                alert(data);
              
   window.location.href="<?php if($_GET['url']=='welcome'){
   echo site_url('welcome');
   
   } ?>";

            });
        });












    });

</script>