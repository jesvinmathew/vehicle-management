<script>
    $(document).ready(function () {
    	adView();
        $('.placename').click(function () {
            $('.progressdiv').show();
            $(".placename").removeClass("active");
                $(this).addClass("active");
            var postdata = {};
            postdata.placeid = $(this).attr('place');
            postdata.vehicle = $('#vehicle').val();
            postdata.condition = $('#condition').val();
            $("#placeId").val($(this).attr('place'));
            $("#pagNum").val(1);
            var placename=$(this).attr('placename');
            $.ajax({
                url: "<?= site_url('newjson'); ?>/viewdealers",
                type: 'post',
                dataType: 'json',
                data: postdata
            }).done(function (data) {
                $('#divthrd').html("");
                $('html, body').animate({ scrollTop: $('#divSecond').offset().top }, 'slow');
                $("#divSecond").html("");
                if($('#condition').val()=="new"){
                    var divSecond="<div class='col-xs-50 tittle'>Select brands in "+placename+" </div><div class='col-xs-50'><br /></div><div class='col-xs-50 col-xs-offset-1'>";
                    $.each(data, function( index, value ) {                    
                        divSecond+="<a href='#'><div onclick='companydealers("+value.cmp_id+",\""+value.companyname+"\")' class='col-xs-15 col-xs-offset-1 company borderBox' style='height: 100px;'><p align='center'><img height='70px' src='<?= IMAGES_PATH; ?>/companies/"+value.image+"' /><br>" +value.companyname+ "</p></div></a>";
                    });
                    divSecond+="</div>";
                    $("#divSecond").html(divSecond);
                }
                else{
                    var c;
                    $("#divSecond").append("<div class='col-xs-50 tittle'>Select dealer</div>");
                    $.each(data, function( index, value ) {                        
                        $("#divSecond").append("<a href='#'><div onclick='dealerpageLoad("+value.branch_id+")' class='col-xs-48 col-xs-offset-1'><h4>"+value.name+"</h4><p>"+value.address+"</p></div></a>");
                        c=index;
                    });
                    var divData="<div class='col-xs-50'><ul class='pagination bootpag'><li class='prev'><a href='javascript:delerPage(0)'>1</a></li>";
                    if(c===4){
                       $("#pagNum").val(2);
                       divData+="<li class='prev'><a href='javascript:delerPage(2)'>2</a></li>";
                       divData+="<li class='prev'><a href='javascript:delerPage(2)'> Next </a></li>";
                    }
                    divData+="</ul></div>";
                    $("#divSecond").append(divData);
                }
                $('.progressdiv').hide();
                adView();
            }).fail(function () {
                alert("error");
                $('.progressdiv').hide();
            });
        });
    });
    function adView(){
    	var postdata = {};
        postdata.placeid = $("#placeId").val();
    	postdata.delid=<?php if($this->uri->segment(3)=="used" && $this->uri->segment(4)=="car") echo 1; elseif($this->uri->segment(3)=="used" && $this->uri->segment(4)=="bike") echo 2; elseif($this->uri->segment(3)=="new" && $this->uri->segment(4)=="car") echo 3; elseif($this->uri->segment(3)=="new" && $this->uri->segment(4)=="bike") echo 4;?>;
    	$.ajax({
    	     url: "<?= site_url('ad'); ?>/getDealerAd",
             type: 'post',
             dataType: 'html',
             data: postdata
        }).done(function (data) {
             $("#divthrd").html(data); 	
        });
    }
    function companydealers(id){
        placeid=document.getElementById('placeId').value;
        $('html, body').animate({ scrollTop: $('#divthrd').offset().top }, 'slow');
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("divthrd").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","<?= site_url('dealer'); ?>/getnewDel/"+id+"/"+placeid,true);
        xmlhttp.send();
    }
    function dealerpageLoad(id){
        window.location="<?= site_url('dealer'); ?>/dealerPage/"+id;
    }
    function delerPage(page){
        if(page){
            var pagNum=$("#pagNum").val();
            var postdata = {};
            postdata.page=page;
            postdata.placeid = $("#placeId").val();
            postdata.vehicle = $('#vehicle').val();
            postdata.condition = $('#condition').val();
            $.ajax({
                url: "<?= site_url('newjson'); ?>/viewdealers",
                type: 'post',
                dataType: 'json',
                data: postdata
            }).done(function (data) {
                $('#divthrd').html("");
                $('html, body').animate({ scrollTop: $('#divSecond').offset().top }, 'slow');
                $("#divSecond").html("");
                if($('#condition').val()==="new"){
                }
                else{
                    var c;
                    $("#divSecond").append("<div class='col-xs-50 tittle'>Select Town</div>");
                    $.each(data, function( index, value ) {                        
                        $("#divSecond").append("<a href='#'><div onclick='dealerpageLoad("+value.branch_id+")' class='col-xs-48 col-xs-offset-1'><h4>"+value.name+"</h4><p>"+value.address+"</p></div></a>");
                            c=index;
                        });
                        var divData="<div class='col-xs-50'><ul class='pagination bootpag'><li class='prev'><a href='javascript:delerPage(1)'>1</a></li>";
                        for(i=2;i<=pagNum;i++){
                            divData+="<li class='prev'><a href='javascript:delerPage("+i+")'>"+i+"</a></li>";
                        }
                        if(c===4 && page>=pagNum){
                           pagNum=parseInt(pagNum)+1;
                           divData+="<li class='prev'><a href='javascript:delerPage("+pagNum+")'>"+pagNum+"</a></li>";
                           divData+="<li class='prev'><a href='javascript:delerPage("+pagNum+")'> Next </a></li>";
                           $("#pagNum").val(pagNum);
                        }
                        divData+="</ul></div>";
                        $("#divSecond").append(divData);
                    }
                    $('.progressdiv').hide();
            }).fail(function () {
                alert("error");
                $('.progressdiv').hide();
            });
        }
    }
</script>