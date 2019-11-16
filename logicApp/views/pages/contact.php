<script src="<?PHP echo JS_PATH; ?>jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $.ajax({
            url: "<?PHP echo base_url('ad/wpview/contact-us'); ?>"
        }).done(function (data) {
            $('#details').html(data);
        });
        $("#submit").click(function(){
            var toname="";
            var toemail="";
            var msg="";
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if($("#name").val()!=""){
                msg+="Name:"+$("#name").val();
                toname=$("#name").val();
            }
            else{
                alert("Please enter Name");
                return false;
            }
            if($("#phone").val().length==10 && $.isNumeric( $("#phone").val())){
                msg+="<br />Phone:"+$("#phone").val();
            }
            else{
                alert("Please enter your 10 digit phone");
                return false;
            }
            if(emailReg.test($("#email").val())&& $("#email").val()!=""){
                msg+="<br />Email:"+$("#email").val();
                toemail=$("#email").val();
            }
            else{
                alert("Please enter email id");
                return false;
            }
            if($("#message").val()!=""){
        
                msg+="<br />Message:"+$("#message").val();
            }
            else{
                alert("Please enter your message");
                return false;
            }
            var postdata = {};
            postdata.toname = toname;
            postdata.toemail = toemail;
            postdata.msg = msg;
            $.ajax({
                url: "<?= site_url('welcome'); ?>/contact",
                type: 'post',
                dataType: 'html',
                data: postdata
            }).done(function (data) {
                alert(data);
            });
        });
    });
</script>
<div class="col-xs-48 col-xs-offset-1">
    <div class="col-xs-49">
        <?=isset($msg)?"<center><h4 class='mb1'>$msg</h4></center>":"";?>
        <center><h2 class="mb1">Contact Us</h2></center>
        <div class="col-xs-24">
            
                <div class="col-xs-50">
                    <div class="col-xs-10 form-group">
                        <label class="name">Name :</label>
                    </div>	
                    <div class="col-xs-34">
                        <input class="text form-control" type="text" id="name" name="name" placeholder="Contact Name" required="required" />
                    </div>	
                </div>
                <div class="col-xs-50" >
                    <div class="col-xs-10 form-group">
                        <label class="name">Phone :</label>
                    </div>	
                    <div class="col-xs-34">     
                        <input class="text form-control" type="text"  id="phone" name="phone" placeholder="Contact Phone Number" />

                    </div>  
                </div>
                <div class="col-xs-50">

                    <div class="col-xs-10 form-group">
                        <label class="name" for="email">Email :</label>
                    </div>	
                    <div class="col-xs-34">   
                        <input placeholder="Enter Your User Name"   id="email" name="email" class="text form-control" type="email" />

                    </div>  
                </div>
                <div class="col-xs-50">
                    <div class="col-xs-10 form-group">
                        <label class="name" for="msg">Message :</label>
                    </div>
                    <div class="col-xs-34">
                        <textarea class="text form-control"  id="message" name="message" placeholder="Eneter Your Message"></textarea>
                    </div>
                </div>
                <div class="col-xs-50">

                    <div class="col-xs-12 form-group">
                        <label>&nbsp;</label>
                        <input type="button" id="submit" class="btn" value="Send" />
                    </div>
                </div>
            
        </div>
        <div class="col-xs-24" id="details">
        </div>
    </div>
</div> 