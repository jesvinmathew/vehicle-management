<script type="text/javascript">

     $(document).ready(function () {
 $(".v_option").click(function () {

            if ($(this).val() == '1') {
            $("#bike").removeClass("btn-danger");    
            $("#bike").addClass("btn-success");
                 $("#car").removeClass("btn-success");
                 $("#car").addClass("btn-danger");
                $(".car_make").hide();
                $(".bike_make").show();

            }
            else if ($(this).val() == '2')
            {
                $("#car").removeClass("btn-danger");    
            $("#car").addClass("btn-success");
                 $("#bike").removeClass("btn-success");
                 $("#bike").addClass("btn-danger");
                $(".bike_make").hide();
                $(".car_make").show();

            }
        });
        
        $(".brand1").change(function () {
           var postData = {};
            postData.value1 = $(this).val();
            $.ajax({
                url: "<?PHP echo site_url('newjson'); ?>/getmodel",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
             
                $.each(data, function (index, value) {
                    $('#model1').append('<option value="' + value.id + '">' + value.content + '</option>');
                });
            });
        });
        $("#model1").change(function () {
            var postData = {};
            postData.value1 = $(this).val();
            $.ajax({
                url: "<?PHP echo site_url('newjson'); ?>/getvariant",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                
                $.each(data, function (index, value) {
                    $('#variant1').append('<option value="' + value.id + '">' + value.content + '</option>');
                });
            });
        });
       $(".brand2").change(function () {
           var postData = {};
            postData.value1 = $(this).val();
            $.ajax({
                url: "<?PHP echo site_url('newjson'); ?>/getmodel",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
             
                $.each(data, function (index, value) {
                    $('#model2').append('<option value="' + value.id + '">' + value.content + '</option>');
                });
            });
        });
        $("#model2").change(function () {
            var postData = {};
            postData.value1 = $(this).val();
            $.ajax({
                url: "<?PHP echo site_url('newjson'); ?>/getvariant",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                
                $.each(data, function (index, value) {
                    $('#variant2').append('<option value="' + value.id + '">' + value.content + '</option>');
                });
            });
        });
        $(".brand3").change(function () {
            
           var postData = {};
            postData.value1 = $(this).val();
            $.ajax({
                url: "<?PHP echo site_url('newjson'); ?>/getmodel",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
             
                $.each(data, function (index, value) {
                    $('#model3').append('<option value="' + value.id + '">' + value.content + '</option>');
                });
            });
        });
        $("#model3").change(function () {
            var postData = {};
            postData.value1 = $(this).val();
            $.ajax({
                url: "<?PHP echo site_url('newjson'); ?>/getvariant",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                
                $.each(data, function (index, value) {
                    $('#variant3').append('<option value="' + value.id + '">' + value.content + '</option>');
                });
            });
        });
        
        
        
        $(".brand4").change(function () {
            
           var postData = {};
            postData.value1 = $(this).val();
            $.ajax({
                url: "<?PHP echo site_url('newjson'); ?>/getmodel",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
             
                $.each(data, function (index, value) {
                    $('#model4').append('<option value="' + value.id + '">' + value.content + '</option>');
                });
            });
        });
        $("#model4").change(function () {
            var postData = {};
            postData.value1 = $(this).val();
            $.ajax({
                url: "<?PHP echo site_url('newjson'); ?>/getvariant",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                
                $.each(data, function (index, value) {
                    $('#variant4').append('<option value="' + value.id + '">' + value.content + '</option>');
                });
            });
        });
        
        $("#cmp_button").click(function(){
      
        var postData = {};
            postData.vehi1 = $("#variant1").val();
            postData.vehi2 = $("#variant2").val();
            postData.vehi3 = $("#variant3").val();
            postData.vehi4 = $("#variant4").val();
            if($("#variant1").val()!=""){
            postData.name1 = $(".brand1  option:selected").text()+$("#model1  option:selected").text()+$("#variant1  option:selected").text();
        }
         if($("#variant2").val()!=""){
            postData.name2 = $(".brand2  option:selected").text()+$("#model2  option:selected").text()+$("#variant2  option:selected").text();
            
            }
             if($("#variant3").val()!=""){
            postData.name3 = $(".brand3  option:selected").text()+$("#model3  option:selected").text()+$("#variant3  option:selected").text();
            } if($("#variant4").val()!=""){
            postData.name4 = $(".brand4  option:selected").text()+$("#model4  option:selected").text()+$("#variant4  option:selected").text();
          }
         
         $.ajax({
                url: "<?PHP echo site_url('welcome/getcompare'); ?>",
                type: 'post',
                dataType: 'html',
                data: postData
            }).done(function (data) {
             
          $("#aa").html(data);
             
           
                
            }).fail(function () {
       
                alert("faail");
            });
        });

     });

</script>