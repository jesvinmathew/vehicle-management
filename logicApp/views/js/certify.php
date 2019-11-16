<script type="text/javascript">
$(document).ready(function(){
var provide = {};
<?php
	foreach($detail as $data){	
	?>
	provide[<?= $data->id; ?>]="<?=$data->provided?>";<?php
	}
?>
$(".option").change(function(){
if($(this).val()!=0)
{
$(".cN").show();
if($(this).val()!=-1){
$("#cert").val($(this).find("option:selected").text());
 $(".provid").val(provide[$(this).val()]);
}
else{
 $("#cert").val("");
 $(".provid").val("");
 }
}
else
$(".cN").hide();
});

$(".dealer").change(function(){

if($(this).val()!=0)
{

$(".cN1").show();

}
else
{
$(".cN1").hide();
}
});

    $(".submit").click(function(){
    if($(".option").val()==0){
    alert("Please select");
    return false;
    }
  
        var postData= {};
	postData.value1=$(".option").val();
	postData.value2=$(".certname").val();
	postData.value3=$(".provid").val();
	
        $.ajax({
            method:'post',
            url:"<?=site_url('admin/certifyAdd')?>",
            data :postData
           
        }).done(function(data){
            
            alert("success");
            
        }).fail(function(){
            
            alert("failed");
        });
        
        
        
    });    
      $(".search").click(function(){
       var postData= {};
	postData.value1=$(".email").val();
      $.ajax({
            method:'post',
            url:"<?=site_url('admin/searchDealer')?>",
            data :postData,
            dataType:'json'
           
        }).done(function(data){
          
     $(".jsonDt").append( '<li>'+JSON.stringify(data)+'</li>');
    
          
            
        }).fail(function(){
            
            alert("failed");
        });
      
      });
            
            
    });    
    
</script>