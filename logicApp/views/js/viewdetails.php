<script>
$(document).ready(function(){
    console.log('its ok');
    $('.carousel').carousel({
  interval: 2000
})
$('#privacymodel').click(function(){
    $.ajax({
        url:"<?PHP echo site_url('welcome/viewprivacy');?>",
        type:'post',
        data:'data=data'
    }).done(function(data){
        $('#myModal').find('.modal-body').html(data);
        })
})
$('.fullview').click(function(){
    var bigdata=[];
    bigdata['need']='dsdsd';
    bigdata[$(this).attr('get')]=$(this).attr('value');
    $.ajax({
        url:"<?PHP echo site_url('welcome/viewdetails');?>?"+$(this).attr('get')+'='+$(this).attr('value'),
        type:'get',
        data:bigdata
    }).done(function(data){
        $('#myModal').find('.modal-body').html(data);
        })
})

})
</script>
	