<?=  $this->load->view('js/calendar2.php'); ?>
<script type="text/javascript">
    $(document).ready(function (){
        $(function () {
                $("#date").datepicker({
                    beforeShow: function () {
                        $("#date").datepicker("option", "changeYear", true);
                        $("#date").datepicker("option", "dateFormat", "dd-mm-yy");
                    },
                });
            });
        $("#submitService").click(function(){
            var msg="";
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if($("#name").val()!=""){
                msg+="Name:"+$("#name").val();
            }
            else{
                alert("Please enter Name");
                return false;
            }
            if($("#address").val()!=""){
                msg+="<br />Address:"+$("#address").val();
            }
            else{
                alert("Please enter address");
                return false;
            }
            if($("#city").val()!=""){
                msg+="<br />City:"+$("#city").val();
            }
            else{
                alert("Please enter City");
                return false;
            }
            if($("#pin").val().length==6 && $.isNumeric( $("#pin").val()) ){
                msg+="<br />Pin:"+$("#pin").val();
            }
            else{
                alert("Please enter Pin");
                return false;
            }
            if($("#1ph").val()!=""){
                if($("#1ph").val().length==11 && $.isNumeric( $("#1ph").val())){
                    msg+="<br />Land Phone:"+$("#1ph").val();
                }
                else{
                    alert("Please enter Phone number");
                    return false;
                }
            }
            if($("#mobile").val().length==10 && $.isNumeric( $("#mobile").val())){
                msg+="<br />Mobile Phone:"+$("#mobile").val();
            }
            else{
                alert("Please enter 10 digit Mobile Phone number");
                return false;
            }
            if (emailReg.test($("#email").val()) && $("#email").val()!="") {
                msg+="<br />Email:"+$("#email").val();
            }
            else{
                alert("Please enter Email");
                return false;
            }      
            if($("#model").val()!=""){
                msg+="<br />Model:"+$("#model").val();
            }
            else{
                alert("Please enter Model");
                return false;
            }
            if($("#variant").val()!=""){
                msg+="<br />Variant:"+$("#variant").val();
            }
            else{
                alert("Please enter Variant");
                return false;
            }
            if($("#date").val()!=""){
                msg+="<br />date:"+$("#date").val();
            }
            else{
                alert("Please enter date");
                return false;
            }
            if($("#time").val()!=""){
                msg+="<br />time:"+$("#time").val();
            }
            else{
                alert("Please enter time");
                return false;
            }
            if($("#vNumber").val()!=""){
                msg+="<br />Vehicle Number:"+$("#vNumber").val();
            }
            else{
                alert("Please enter Vehicle number");
                return false;
            }
            if ($("#pickup").prop('checked') == true) {
                msg += "<br />Need Pick Up  And Drop";
            }
            if ($("#free").prop('checked') == true) {
                msg += "<br />Free Service";
            }
            if($("#km").val()!=""){
                msg+="<br />Km:"+$("#km").val();
            }
            else{
                alert("Please enter km");
                return false;
            }            
            if($("#message").val()!=""){
                msg+="<br />Message:"+$("#message").val();
            }
            else{
                alert("Please enter Your message");
                return false;
            } 
            if(!$("#temsBrService").prop('checked') == true){
                alert("Please accept the terms and cunditions");
                return false;
            }
            var postdata = {};
            postdata.msg = msg; 
            postdata.email=$("#email").val();
            postdata.name=$("#name").val();
            $.ajax({
                url: "<?= site_url('background'); ?>/bookService",
                type: 'post',
                dataType: 'html',
                data: postdata
            }).done(function (data) {
                alert(data);
            });
        });
    });
</script>
<center><h4>Breakdown Service Form</h4></center>
<div class="col-xs-40 col-xs-offset-1">
    <div class="col-xs-40">
        <div class="col-xs-15 form-group">
            <label class="name"  style=" line-height: 13px;" for="name">Name:</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="name">
        </div>
    </div>
    <div class="col-xs-40">
        <div class="col-xs-15 form-group">
            <label class="name"  style=" line-height: 13px;" for="address">Address:</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="address">
        </div>
    </div>
    <div class="col-xs-40">
        <div class="col-xs-15 form-group">
            <label class="name"  style=" line-height: 13px;" for="city">City:</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="city">
        </div>
    </div>
    <div class="col-xs-40">
        <div class="col-xs-15 form-group">
            <label class="name"  style=" line-height: 13px;" for="pin">PIN Code:</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="pin">
        </div>
    </div>
    <div class="col-xs-40">
        <div class="col-xs-15 form-group">
            <label class="name"  style=" line-height: 13px;" for="1ph">Land Phone:</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="1ph">
        </div>
    </div>
    <div class="col-xs-40">
        <div class="col-xs-15 form-group">
            <label class="name"  style=" line-height: 13px;" for="mobile">Mobile:</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="mobile">
        </div>
    </div>
    <div class="col-xs-40">
        <div class="col-xs-15 form-group">
            <label class="name"  style=" line-height: 13px;" for="email">Email Id:</label>
        </div>
        <div class="col-xs-32">
            <input type='text' class="form-control" id="email">
        </div>
    </div>
    <div class="col-xs-40">
        <div class="col-xs-15 form-group">
            <label class="name"  style=" line-height: 13px;" for="message">Message:</label>
        </div>
        <div class="col-xs-32">
            <textarea class="form-control" id="message"></textarea>
        </div>
    </div>
    <div class="col-xs-40">
        <div class="col-xs-24">
            <input type='text' class="form-control" id="model" placeholder="Model Name">
        </div>
        <div class="col-xs-24">
            <input type='text' class="form-control" id="variant" placeholder="variant Name">
        </div>
    </div>
    <div class="col-xs-40">
        <div class="col-xs-24">
            <input type='text' class="form-control" id="date" placeholder="Date">
        </div>
        <div class="col-xs-24">
            <input type='text' class="form-control" id="time" placeholder="Time">
        </div>
     </div>
     <div class="col-xs-40">
        <div class="col-xs-24">
            <input type='text' class="form-control" id="vNumber" placeholder="Vehicle Number">
        </div>
    </div>
    <div class="col-xs-40">
        <div class="col-xs-24">
        	<input type="checkbox" id="free" />Free Service
        </div>
        <div class="col-xs-24">
            <input type='text' class="form-control" id="km" placeholder="km">
        </div>
    </div>
    <div class="col-xs-40">
            <input type="checkbox" id="pickup" />Need pickup and drop
    </div>
    <div class="col-xs-40">
                                    <div class="col-xs-10">
                                        <input type="checkbox" id="temsBrService" />
                                    </div>
                                    <label class="name" class="col-xs-25" for="temsVehiView"> Accept the Terms And Condition </label>
                                </div>
    
    
</div>
<div class="clear"></div>
<div class="col-xs-40">
    <button class="btn" id="submitService" type="button">

    Submit

</button>
</div>