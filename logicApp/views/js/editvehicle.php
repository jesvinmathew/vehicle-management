<script type="text/javascript">
$(document).ready(function(){
  var foundError = false;
    var postData={};
    $(".approve").change(function(){
    postData.product_id=$(this).attr('ids');
       postData.type=$(this).attr('type');
           postData.approve=$(this).val();
    
    $.ajax({
        url:"<?=base_url()?>json/changestatus",
        type:'post',
        dataType:'json',
        data:postData
        
    }).done(function(data){
        
  
        if(data.error==false){
            
           
              $(".alert").text('Success fully Changed');
              
           
                 
        }
        if(data.error==true)
        {
             $(".alert").text('Error');
        }
        
      
    })
   
   
     })

    
})

</script>