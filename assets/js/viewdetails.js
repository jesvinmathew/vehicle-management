
$(document).ready(function(){
    console.log('its ok');
    $('.carousel').carousel({
  interval: 2000
})
$('#privacymodel').click(function(){
    $.ajax({ 
        url:$('#baseurl').val()+"welcome/viewprivacy",
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
    $('#myModal').find('.modal-body').html("<img class='col-xs-offset-23' src='"+$('#baseurl').val()+"assets/images/camera-loader.gif' />");
    $.ajax({
        url:$('#baseurl').val()+"welcome/viewdetails?"+$(this).attr('get')+'='+$(this).attr('value'),
        type:'get',
        data:bigdata
    }).done(function(data){
        $('#myModal').find('.modal-body').html(data);
        })
})

})

	