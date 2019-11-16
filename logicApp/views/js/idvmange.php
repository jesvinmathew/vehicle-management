<script type="text/javascript">
    $(document).ready(function() {
        function getdata(path, value1) {
            //$('.progressdiv').show();
            var postData = {};
            postData.value1 = value1;
            $.ajax({
                url: "<?PHP echo site_url('newjson/get'); ?>" + path,
                type: 'post',
                dataType: '',
                data: postData
            }).done(function (data) {
                if(path=='idvvariant'){
                    $.each(data, function( index, value ) {
                         $('#variant').append("<tr><td>"+value.var_name+"<input type='hidden' name='idvid[]' value='"+value.idv_id+"' /><input type='hidden' name='vid[]' value='"+value.varient_id+"' /></td><td>"+value.cubicc+ "</td><td>"+value.seatingc+"</td><td><input type='text' name='ag6m[]' value='"+value.ageless6mon+"'/></td><td><input type='text' name='ag1y[]' value='"+value.age6to1+"' /></td> <td><input type='text' name='ag2y[]' value='"+value.age1to2+"'/></td><td><input type='text' name='ag3y[]' value='"+value.age2to3+"'/></td><td><input type='text' name='ag4y[]'value='"+value.age3to4+"' /></td><td><input type='text' name='ag5y[]' value='"+value.age4to5+"'/></td><td><input type='text' name='ag6y[]' value='"+value.age5to6+"'/></td><td><input type='text' name='ag7y[]' value='"+value.age6to7+"'/></td><td><input type='text' name='ag8y[]'value='"+value.ag7to8+"' /></td><td><input type='text' name='ag9y[]' value='"+value.ag8to9+"'/></td><td><input type='text' name='ag10y[]' value='"+value.ag9to10+"'/></td><td><input type='text' name='ag11y[]' value='"+value.ag10to11+"'/></td><td><input type='text' name='ag12y[]' value='"+value.ag11to12+"'/></td><td><input type='text' name='ag13y[]' value='"+value.age12abow+"'/></td></tr>");
                    });
                }
                else{
                    $.each(data, function( index, value ) {
                        $('#' + path).append('<option value="' + value.id + '">' + value.content+ '</option>');   
                    });
                }
                $('.progressdiv').hide();
            }).fail(function () {
                alert("error");
                $('.progressdiv').hide();
            });
        }
        $("#vehicleType").change(function(){
            if($(this).val()>0){
                $("#make").html("<option value='0'>Select Make</option>");
                getdata('make', $(this).val());
            }
        });
        $("#make").change(function(){
            if($(this).val()>0){
                $("#model").html("<option value='0'>Select Model</option>");
                getdata('model', $(this).val());
            }
        });
        $("#model").change(function(){
            if($(this).val()>0){
                $("#variant").html("<tr><th>Variant</th><th>Cubic capacity</th><th>Seating capacity</th><th>Age less six months</th><th>Age six-twelve months</th><th>Age one-two y</th><th>Age two-three y</th><th>Age three-four y</th><th>Age four-five y</th><th>Age five-six y</th><th>Age six-seven y</th><th>Age seven-eight y</th><th>Age eight-nine y</th><th>Age nine-ten y</th><th>Age ten-eleven y</th><th>Age eleven-twelve y</th><th>Age above twelve y</th></tr>");
                getdata('idvvariant', $(this).val());
            }
        });
        
        $("#submit").click(function(){
        
        }
        );
        
    });
       
    
</script>