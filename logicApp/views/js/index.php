    
<script src="<?= JS_PATH; ?>jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function () {
        $('#slider').nivoSlider();
        $('#slider1').nivoSlider();
    });
    $(document).ready(function () {
        $(".v_option").change(function () {
 if( $(this).val() == '0'){
$("#tohide").show();
$("#tohide1").hide();
$(".nbrand").hide();
$(".ubrand").hide();
 }
 else{
     $("#tohide").hide();
     $("#tohide1").hide();
             if( $(this).val() == '1'){
                  $("#openid_form").attr("action","<?=site_url('welcome/search/used/bike');?>");
                 $("#bike_make").show();
                  $("#bike_make1").show();
                    $("#car_make").hide();
             }
             else if($(this).val() == '2')
             {
             $("#openid_form").attr("action","<?=site_url('welcome/search/used/car');?>");
              $("#bike_make").hide();
              $("#bike_make1").hide();
              $("#car_make").show();
              
             }
             }
       });
       $(".v_option1").change(function () {
       if( $(this).val() == '0'){
$("#tohide1").show();   
$("#tohide").hide();
$(".nbrand").hide();
$(".ubrand").hide();
 }
 else{
     $("#tohide1").hide(); 
     $("#tohide").hide();
             if( $(this).val() == '1'){
                 $("#form_second").attr("action","<?=site_url('welcome/search/new/bike');?>");
                  $(".nserch").attr('type','submit');
                 $("#bike_make").show();
                 $("#bike_make1").show();
                  $("#car_make1").hide();
             }
             else if($(this).val() == '2')
             {
                 $("#form_second").attr("action","<?=site_url('welcome/search/new/car');?>");
                  $(".nserch").attr('type','submit');
              $("#bike_make1").hide();
               $("#bike_make").hide();
              $("#car_make1").show();
              
             }}
       });
      
      
       $("#ndist").change(function () {
       
        $("#form_second").removeAttr("action");
         $(".nserch").removeAttr('type');
         $(".nserch").attr('type','button');
         
              var postdata = {};
                postdata.dist = $("#ndist").val();
                postdata.cmpid = $(".nbrand").val();
                
                $.ajax({
                    url: "<?= site_url('newjson'); ?>/get_dealer_dist",
                    type: 'post',
                    dataType: 'json',
                    data: postdata
                }).done(function (data) {
                 $('#ndeal').html('<option value="0">Dealer</option>');
                   
                    $.each(data, function (index, value) {
                        $("#ndeal").append('<option value="' + value.branch_id + '">' + value.name + '</option>');
                       // $("#form_second").attr("action","<?=site_url('dealer/dealerPage');?>/"+value.branch_id);
                    });
                });
                
             
            
       });
        $(".nserch").click(function ()  {
        
      
        
        if($("#ndeal").val()!="0"){
            window.location.href = "<?=site_url('dealer/dealerPage');?>/"+$("#ndeal").val();
        }
       if($("#ndist").val()!="0" && $("#ndeal").val()=='0'){
         if( $(".v_option1").val() == '1')
            {
            
            window.location.href ="<?=site_url('dealer/index/new/bike');?>";
        }
        else
            {
            
            window.location.href ="<?=site_url('dealer/index/new/car');?>";
        }
        }
       
       });
       
        $(".ubrand").change(function () {
        var postData = {};
        postData.value1 = $(this).val();
       
        $.ajax({
            url: "<?PHP echo site_url('newjson'); ?>/getmodel",
            type: 'post',
            dataType: 'json',
            data: postData
        }).done(function (data) {
            $('.umodel').html('<option value="0">Select</option>');
            $.each(data, function (index, value) {
                $('.umodel').append('<option value="' + value.content + '">' + value.content + '</option>');
            });
        });
    });
   
        $(".serBox").click(function () {
            $(".serBoxs").hide();
            $("#" + $(this).attr("form-data")).show('slow');
        });
        $(".comtest").click(function () {
            var link1 = "/" + $(this).attr("data-link");
            $.ajax({
                url: "<?= site_url('background'); ?>" + link1,
                type: 'post',
                dataType: 'html'

            }).done(function (data) {
                $('#myModal').find('.modal-body').html(data);
            }).fail(function () {
                alert("error");
            });
        });
        $(".newc").click(function () {
            $(".newc").removeClass("deactive");
            $(".newc").addClass("active");
            $(".prec").addClass("deactive");
            $(".n_search").show();
            $(".u_search").hide();
        });
        $(".prec").click(function () {
            $(".prec").removeClass("deactive");
            $(".prec").addClass("active");
            $(".newc").addClass("deactive");
            $(".u_search").show();
            $(".n_search").hide();
        });
        $(".newVehiHed").click(function () {
            $("#" + $(this).attr("data-show")).removeClass("hidden");
            $("#" + $(this).attr("data-hid")).addClass("hidden");
            return false;
        });
    });
</script>