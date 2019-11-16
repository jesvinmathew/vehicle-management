<script type = "text/javascript" > 
function adminTraffic() {
            var postData = {};
            postData.id = '1';
$.ajax({
                url: "<?PHP echo site_url('AdminJson/getTraffic'); ?>",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {

$.each(data, function( index, value ) {
$("#userInfo").append("<div style='padding:10px;'> <table style='width:100%'><tr><td>User name</td><td>Ip</td><td>Page visited</td><td>Date</td><td>Time</td></tr><tr><td>"+value.username+"</td><td>"+value.ip+"</td><td>"+value.page+"</td><td>"+value.date+"</td><td>"+value.time+"</td></tr></table> </div>");
});
});
}	

function searchUser() {
	    var postData = {};
            postData.email = $("#email").val();
            $.ajax({
                url: "<?PHP echo site_url('AdminJson/searchUser'); ?>",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                $.each(data, function( index, value ) {
                var type="";
                if(value.vehicle_type=='0'){
                type="free";
                }
                else if(value.vehicle_type=='1'){
                type="bike";
                }
               	else if(value.vehicle_type=='2'){
                type="car";
                }
               else if(value.vehicle_type=='3'){
               type="all";
                }
                
                $("#usDatas").append("<center><div class=' col-xs-25' style='padding:10px; margin-left: 150px;'> <label>Displayname:</label>"+ value.username+"</div><div class=' col-xs-25' style='margin-left: 150px;'> <label>Firstname:</label>"+ value.fname+"</div><div class=' col-xs-25' style='margin-left: 150px;'> Lastname:"+ value.lname+"</div><div class=' col-xs-25' style='margin-left: 150px;'> Gender:"+ value.gender+"</div><div class=' col-xs-25' style='margin-left: 150px;'> Address:"+ value.address+"</div><div class=' col-xs-25' style='margin-left: 150px;'> Contat no:"+ value.contactno+"</div><div class=' col-xs-25' style='margin-left: 150px;'> Plan:"+ value.uptypename+"</div><div class=' col-xs-25' style='margin-left: 150px;'> Vehicle type:"+ type+"</div> <input type='button' class ='btn' id='chngPlan' value='change plan'><input type='button' class='btn' id='adPrvlg' onclick='adminPvg()' value='admin pivilage' ><form method='post'><input type='hidden' name='userid' id='userid' value= "+value.user_id+"><div id='setPvg'></div></form></center>" );
                });
                
            });
	}
function adminPvg() {
$("#setPvg").html("<div class='col-xs-45' style='padding:10px;'><div class='col-xs-20' style='padding:10px;'><table><tr><td><input type='checkbox' id='chk1' name='chk[]' value='1' /> <label> New vehicle manage</label></tr></td><tr><td><input type='checkbox' id='chk2' name='chk[]' value='2' /> <label> User Manage(Register)</label></tr></td><tr><td><input type='checkbox'  id='chk3' name='chk[]' value='3' /> <label> Advertisement Manage</label></tr></td><tr><td><input type='checkbox'  id='chk4' name='chk[]'value='4' /> <label> Place Manage</label></tr></td><tr><td><input type='checkbox'  id='chk5' name='chk[]' value='5' /> <label> Used Vehicle Manage</label></tr></td><tr><td><input type='checkbox'  id='chk6' name='chk[]' value='6' /> <label> User Plan Manage</label></table></div><div class='col-xs-20' style='padding:10px;'> <table><tr><td><input type='checkbox'  id='chk7' name='chk[]' value='7' /> <label> Dealer Manage</label></tr></td><tr><td><input type='checkbox'  id='chk8' name='chk[]' value='8' /> <label> Insurance Manage</label></tr></td><tr><td><input type='checkbox' id='chk9' name='chk[]' value='9' /> <label> News Manage</label></tr></td><tr><td><input type='checkbox'  id='chk10' name='chk[]' value='10' /> <label> Traffic Details</label></tr></td><tr><td><input type='checkbox'  id='chk11' name='chk[]' value='11' /> <label> Loan</label></table></div><div class='col-xs-11' style='padding:10px;'><input type='submit' class='btn' id='update'  value='update'></div></div>");

}

    function compain(id,usid){
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else { 
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                alert(xmlhttp.responseText);
            }
        }
        xmlhttp.open("GET", "<?PHP echo site_url('json/compain'); ?>" + "/"+id+"/"+usid, true);
        xmlhttp.send();
    }
    function suprate(id){
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                alert(xmlhttp.responseText);
            }
        }
        xmlhttp.open("GET", "<?PHP echo site_url('json/suprate'); ?>" + "/"+id, true);
        xmlhttp.send();
    }
    function compainbr(id,usid){
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else { 
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                alert(xmlhttp.responseText);
            }
        }
        xmlhttp.open("GET", "<?PHP echo site_url('json/compainbr'); ?>" + "/"+id+"/"+usid, true);
        xmlhttp.send();
    }
    function supratebr(id){
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                alert(xmlhttp.responseText);
            }
        }
        xmlhttp.open("GET", "<?PHP echo site_url('json/supratebr'); ?>" + "/"+id, true);
        xmlhttp.send();
    }
    $(document).ready(function () {

        function adminGetJson(path, value1, value2, value3){
            var postData = {};
            postData.value1 = value1;
            postData.value2 = value2;
            postData.value3 = value3;
            $.ajax({
                url: "<?PHP echo site_url('AdminJson'); ?>/" + path,
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                
            });
        }
        function adminGetHtml(path, value1, value2, value3){
            var postData = {};
            postData.value1 = value1;
            postData.value2 = value2;
            postData.value3 = value3;
            $.ajax({
                url: "<?PHP echo site_url('AdminHtml'); ?>/" + path,
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                $("#userInfo").html(data);
            });
        }
        function getdata(path, value1, value2, value3) {
            var postData = {};
            postData.value1 = value1;
            postData.value2 = value2;
            postData.value3 = value3;
            $.ajax({
                url: "<?PHP echo site_url('json'); ?>/" + path,
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                if(postData.value1==="delapp"){
                    $("#userInfo").html("");
                    $.each(data.main, function(idx, obj) {
                        htmlbox='<div id="userInfo" class="col-xs-50 col-sm-30 col-md-22 box" style="margin: 3px 3px 3px 3px; height: 250px;"><ul  class="col-xs-24"><li><b>Personal</b></li><li><b>Name:</b>'+obj.username+'</li><li><b>Contact number:</b>'+ obj.contactno +'</li><li><b>Location:</b>'+obj.location+'</li><li><b>Ip:</b>'+obj.ipaddress+'</li></ul>';
                        htmlbox= htmlbox+'<ul  class="col-xs-24"><li><b>Dealer</b></li><li><b>Name:</b>'+obj.name+'</li><li><b>Contact number:</b>'+ obj.phnum +'</li><li title="'+obj.email+'"><b>email:</b>'+obj.email+'</li></ul>';
                        if(obj.usid==="0")
                             htmlbox= htmlbox+'<p class="btn" onclick="compain('+obj.id+','+obj.user_id+')">Compain Users</p>';
                        else
                            htmlbox= htmlbox+'<p class="btn" onclick="suprate('+obj.id+')">Supprate Users</p>';
                        $("#userInfo").append(htmlbox);
                    });
                     $.each(data.branch, function(idx, obj) {
                        htmlbox='<div id="userInfo" class="col-xs-50 col-sm-30 col-md-22 box" style="margin: 3px 3px 3px 3px; height: 250px;"><ul  class="col-xs-24"><li><b>Personal</b></li><li><b>Name:</b>'+obj.username+'</li><li><b>Contact number:</b>'+ obj.contactno +'</li><li><b>Location:</b>'+obj.location+'</li><li><b>Ip:</b>'+obj.ipaddress+'</li></ul>';
                        htmlbox= htmlbox+'<ul  class="col-xs-24"><li><b>Dealer</b></li><li><b>Name:</b>'+obj.name+'</li><li><b>Contact number:</b>'+ obj.phnum +'</li><li title="'+obj.email+'"><b>email:</b>'+obj.email+'</li></ul>';
                        if(obj.usid==="0")
                             htmlbox= htmlbox+'<p class="btn" onclick="compainbr('+obj.branch_id+','+obj.user_id+')">Compain Users</p>';
                        else
                            htmlbox= htmlbox+'<p class="btn" onclick="supratebr('+obj.branch_id+')">Supprate Users</p>';
                        $("#userInfo").append(htmlbox);
                    });
                }
                else if(postData.value1==="braapp"){
                    $("#userInfo").html("");
                     $.each(data.branch, function(idx, obj) {
                        htmlbox='<div id="userInfo" class="col-xs-50 col-sm-30 col-md-22 box" style="margin: 3px 3px 3px 3px; height: 250px;"><ul  class="col-xs-24"><li><b>Personal</b></li><li><b>Name:</b>'+obj.username+'</li><li><b>Contact number:</b>'+ obj.contactno +'</li><li><b>Location:</b>'+obj.location+'</li><li><b>Ip:</b>'+obj.ipaddress+'</li></ul>';
                        htmlbox= htmlbox+'<ul  class="col-xs-24"><li><b>Dealer</b></li><li><b>Name:</b>'+obj.name+'</li><li><b>Contact number:</b>'+ obj.phnum +'</li><li title="'+obj.email+'"><b>email:</b>'+obj.email+'</li></ul>';
                        if(obj.usid==="0")
                             htmlbox= htmlbox+'<p class="btn" onclick="compainbr('+obj.branch_id+','+obj.user_id+')">Compain Users</p>';
                        else
                            htmlbox= htmlbox+'<p class="btn" onclick="supratebr('+obj.branch_id+')">Supprate Users</p>';
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
            $("#uTypeId").val($(this).attr('title'));
            getdata("users",$(this).attr('title'),0,0);
        });
        $('.dis').click(function(){
            getdata("users",$("#uTypeId").val(),$(this).attr('title'),0);
        });
        
        /* Admin only
         */
        $('.adusers').click(function(){
            $("#uTypeId").val(0);
            if($(this).attr('title')=="searchUser"){
                $("#userInfo").html(" <div class='col-xs-15' style='padding:10px;'><h6>please enter the email</h6> <input type='email' class='form-control' placeholder='enter your email' id='email' /> <input type='button' class='btn' id='subEmail' onclick='searchUser()' value='submit'></div><div id='usDatas'></div><div id='userPvg'></div>");
            }
else if($(this).attr('title')=="admintraffic"){
                $("#userInfo").html(" <div class='col-xs-15' style='padding:10px;'><h6>Traffic deatils</h6></div>");
            }
            adminGetHtml("users",$(this).attr('title'),0,0);
        });

       
    });
</script>