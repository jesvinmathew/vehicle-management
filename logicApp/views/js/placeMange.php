<script>                
    $(document).ready(function(){
        $("#country").change(function(){
           if($(this).val()>0){
               $('#cuntryVal').val($('#country option:selected').html());
               getPlace($(this).val(),2,'state');
           }
           else{
                $('#cuntryVal').val("");
           }
        });
        $("#state").change(function(){
           if($(this).val()>0){
               $('#stateVal').val($('#state option:selected').html());
               getPlace($(this).val(),3,'district');
           }
           else{
               $("#stateVal").val("");
           }
        });
        $("#district").change(function(){
           if($(this).val()>0){
               $('#districtVal').val($('#district option:selected').html());
               getPlace($(this).val(),4,'town');
           }
           else{
               $("#districtVal").val("");
           }
        });
        function getPlace(pid,type,result){
            var postData = {};
            postData.value1 = pid;
            postData.value2 = type;
            $.ajax({
                url: "<?PHP echo site_url('newjson'); ?>/getPlace",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                $('#'+result).empty();
                $('#'+result).append( new Option("Select","0") );
                $('#'+result).append( new Option("New","-1") );
                $.each(data,function(index,place){
                    $('#'+result).append( new Option(place.placename,place.place_id) );
                });
            });
        }
        $("#cuntPro").click(function(){
            if($("#country").val())
                addPlace($('#cuntryVal').val(),0,$("#country").val(),1);
        });
        $("#statePro").click(function(){
            if($("#country").val()>0 && $(this).val())
                addPlace($("#stateVal").val(),$("#country").val(),$("#state").val(),2);
        });
        $("#districtPro").click(function(){
            if($("#state").val()>0 && $(this).val())
                addPlace($('#districtVal').val(),$("#state").val(),$("#district").val(),3);
        });        
        $("#townPro").click(function(){
            if($("#district").val()>0 && $(this).val())
                addPlace($('#townVal').val(),$("#district").val(),$('#town').val(),4);
        });
        function addPlace(pName,pid,cid,tid){
            var postData = {};
            postData.value1 = pName;
            postData.value2 = pid;
            postData.value3 = cid;
            postData.value4 = tid;
            $.ajax({
                url: "<?PHP echo site_url('newjson'); ?>/addPlace",
                type: 'post',
                dataType: 'html',
                data: postData
            }).done(function (data) {
                alert(data);
            });
        }
    });    
</script>