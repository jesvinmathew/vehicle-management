$(document).ready(function(){
  var foundError = false;
    var postData={};
    $("#submit").click(function(){
     $(".remove").remove();
     
        $(this).attr('disabled','true');
        foundError = false;
        $(".errorDisplay").html('');
          console.log(foundError);
          var truereport=0;
          
           validate('title','title','3','30','1');
           validate('aboutproject','about project','15','150','0');
            validate('category','category','0','2','2');
             validate('price','price range','0','2','2');
             validate('closing','closing date','10','10','4');
             validate('location','location','3','30','0');
              validate('Address','Address','10','150','0');
              validate('file','File','4','150','5');
               validate('featured','featured project','0','30','7');
                validate('privacy','privacy settings','0','1','2');
                 validate('increement','increement amount','4','30','3');
                  validate('bidprivacy','bid privacy','0','1','2');
          function validate(title,name,min,max,reg)
          {
           
            console.log($("#"+title).val());
            
            if($("#"+title).val().length<1)
        {
            console.log(title+' error1');
             $("#"+title).parent('div').find('.glyphicon').removeClass('glyphicon-ok');
             $("#"+title).parent('div').find('.glyphicon').addClass('glyphicon-warning-sign');
           $('#'+title).parent('div').append('<div class="remove alert alert-danger" role="alert">Please enter a valid '+name+'</div>')
             foundError = true;
        }
        else
        if($("#"+title).val().length>max)
        {
             $("#"+title).parent('div').find('.glyphicon').removeClass('glyphicon-ok');
             $("#"+title).parent('div').find('.glyphicon').addClass('glyphicon-warning-sign');
            
            console.log(title+' error2');
               $('#'+title).parent('div').append('<div class="remove alert alert-danger" role="alert">Please enter a valid '+name+' use '+min+' to '+max+' charcters</div>')
             foundError = true;
        }
        else
        if((reg!=2)&&($("#"+title).val().length<min))
        {
            console.log(title+' error3');
             $("#"+title).parent('div').find('.glyphicon').removeClass('glyphicon-ok');
             $("#"+title).parent('div').find('.glyphicon').addClass('glyphicon-warning-sign');
             $('#'+title).parent('div').append('<div class="remove alert alert-danger" role="alert">Please enter a valid '+name+' use '+min+' to '+max+' charcters</div>')
              foundError = true;
        }
        else
        if((reg==2)&&($("#"+title).val()<1)) 
        
        {
            console.log($("#"+title).val());
            console.log(title+' error4');
             $("#"+title).parent('div').find('.glyphicon').removeClass('glyphicon-ok');
             $("#"+title).parent('div').find('.glyphicon').addClass('glyphicon-warning-sign');
             $('#'+title).parent('div').append('<div class="remove alert alert-danger" role="alert">Please select  '+name+'</div>')
            
        }
        else
         if((reg==1)&&(!$("#"+title).val().match(/^[-A-Za-z\&\#0-9\;' .]*$/))) 
        
        {
            console.log(title+' error5');
             $("#"+title).parent('div').find('.glyphicon').removeClass('glyphicon-ok');
             $("#"+title).parent('div').find('.glyphicon').addClass('glyphicon-warning-sign');
             $('#'+title).parent('div').append('<div class="remove alert alert-danger" role="alert">Please enter a valid '+name+' , use only A-Z a-z 0-9</div>')
             foundError = true;
        }
        else
        if((reg==3)&&(!$("#"+title).val().match(/^[0-9]*$/))) 
        
        {
            console.log(title+' error6');
             $("#"+title).parent('div').find('.glyphicon').removeClass('glyphicon-ok');
             $("#"+title).parent('div').find('.glyphicon').addClass('glyphicon-warning-sign');
            $('#'+title).parent('div').append('<div class="remove alert alert-danger" role="alert">Please enter a valid '+name+' , use only  0-9</div>')
              foundError = true;
        }
        else
                {
                    console.log(title+' error7');
             $("#"+title).parent('div').find('.glyphicon').removeClass('glyphicon-warning-sign');
             $("#"+title).parent('div').find('.glyphicon').addClass('glyphicon-ok');
            $("#"+title).parent('div').removeClass('has-error');
             
             $("#"+title).parent('div').addClass('has-success');
             foundError = true;
             truereport++;
             console.log(truereport);
             postData[title]=$('#'+title).val();
        }
        }
        
if(truereport==12)
{
    foundError = false;
}
  console.log(foundError);

       
        if(foundError==false)
        {
             $('.progress').show();
            $('.progress-bar').addClass('progressed').html('Validating');
           $("#submit").html('Validating..');
    $(".alert").slideUp().removeClass('alert-alert alert-success  alert-info alert-warning alert-danger');
    $.ajax({
        url:"<?=base_url()?>json/postnew",
        type:'post',
        dataType:'json',
        data:postData
        
    }).done(function(data){
        
        $('.progress').hide();
        $('.progress-bar').removeClass('progressed');
        if(data.error==false){
            
            $(".alert").addClass('alert-success');
              $("#submit").attr('disabled','true').fadeOut();  
              $("#alert").html('Success fully registered');     
              $(".alert").slideUp(300,function(){
                
                $(".alert").slideDown();
                 $(".alert").show();
              (".alert").text('Success fully Posted');
              
              });
                 
        }
        if(data.error==true)
        {
            $(".alert").addClass('alert-warning');
            $("#alert").html("<.glyphicon style='color:red'>"+data.message+"</.glyphicon>");
              $("#submit").removeAttr('disabled').text('Re-Post Now').fadeIn();
        }
        $(".alert").slideDown();
      
    })
    .fail(function(xhr, status, error){
        console.log(xhr);
        if(xhr.status==404)
        {
            $("#alert").html("NETWORK_ERROR_404");
        }
        else if(xhr.status==500)
        {
            $("#alert").html("NETWORK_ERROR_500");
        }
        else
        {
            $("#alert").html("NETWORK_ERROR'");
        }
        $(".alert").addClass('alert-danger').slideDown();
        $("#submit").removeAttr('disabled');
        $("#submit").text('Post Now');
    })
        }
        else
        {
            $(this).removeAttr('disabled');
        }
        
        
    }) ;
    
    $("#full_name").blur(function(){
        if($(this).val().length<1)
        {
            $(".errorDisplay[connection='full_name']").html('Please enter a valid Full Name'); foundError = true;
        }
        else{$(".errorDisplay[connection='full_name']").html('');}
    })
    $("#email_address").blur(function(){
        if($(this).val().length<5)
        {
            $(".errorDisplay[connection='email_address']").html('Please enter a valid email address'); foundError = true;
        }
        else{$(".errorDisplay[connection='email_address']").html('');}
    })  
    $("#password").blur(function(){
        if($(this).val().length<1)
        {
            $(".errorDisplay[connection='password']").html('Please enter a valid Password min 8 characters'); foundError = true;
        }
        else{$(".errorDisplay[connection='password']").html('');}
    }) 
    
    $("#mobile_number").blur(function(){
        if($(this).val().length<1)
        {
            $(".errorDisplay[connection='mobile_number']").html('Please enter a valid Mobile Number'); foundError = true;
        }
       
            else
            {
            $(".errorDisplay[connection='mobile_number']").html('');
            }
            
            }
    ) 
     })
    
$(document).on('serverValidate',function(){
    
})
