<script type = "text/javascript" > 
    $(document).ready(function () {
        function getdata(path, value1, value2, value3) {
            var postData = {};
            postData.value1 = value1;
            postData.value2 = value2;
            postData.value3 = value3;
            $.ajax({
                url: "<?PHP echo site_url('staff'); ?>/" + path,
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                if(postData.value1==="delapp"){
                    $("#userInfo").html("");
                    $.each(data, function(idx, obj) {
                        htmlbox='<div id="userInfo" class="col-xs-50 col-sm-30 col-md-22 box" style="margin: 3px 3px 3px 3px;"><ul  class="col-xs-24"><li><b>Personal</b></li><li><b>Name:</b>'+obj.username+'</li><li><b>Contact number:</b>'+ obj.contactno +'</li><li><b>Location:</b>'+obj.location+'</li><li><b>Ip:</b>'+obj.ipaddress+'</li></ul>';
                        htmlbox= htmlbox+'<ul  class="col-xs-24"><li><b>Dealer</b></li><li><b>Name:</b>'+obj.name+'</li><li><b>Contact number:</b>'+ obj.phnum +'</li><li title="'+obj.email+'"><b>email:</b>'+obj.email+'</li></ul>';
                        if(obj.usid==="0")
                             htmlbox= htmlbox+'<a href="#" class="btn" onclick="compain('+obj.id+','+obj.user_id+')">Compain Users</a>';
                        else
                            htmlbox= htmlbox+'<a href="#" class="btn" onclick="suprate('+obj.id+')">Supprate Users</a>';
                        $("#userInfo").append(htmlbox);
                    });
                    
                }
                else{
                    $("#userInfo").html("");
                    $.each(data, function(idx, obj) {
                        $("#userInfo").append('<div id="userInfo" class="col-xs-50 col-sm-30 col-md-15 box" style="margin: 3px 3px 3px 3px;"><ul><li><b>Name:</b>'+obj.username+'</li><li><b>Contact number:</b>'+ obj.contactno +'</li><li><b>Location:</b>'+obj.location+'</li><li><b>Ip:</b>'+obj.ipaddress+'</li></ul></div>')
                    });
                }
            }).fail(function () {
                alert("error");
                $('.progressdiv').hide();
            });
            if($("#userInfo").html()==="")
                $("#userInfo").html("No data Found");
        };
        $('.users').click(function(){
            if($.isNumeric($(this).attr('title'))){
                getdata("getmsg",$(this).attr('title'),0,0)
            }
        });
    });
</script>