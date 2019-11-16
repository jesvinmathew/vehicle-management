<script src="<?= base_url() ?>assets/bs/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/bs/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">    
    $(document).ready(function() {        
        function getdata(path, value1) {
            var postData = {};
            postData.value1 = value1;
            $.ajax({
                url: "<?PHP echo site_url('newjson/get'); ?>" + path,
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                $.each(data, function( index, value ) {
                     $('#' + path).append('<option value="' + value.id + '">' + value.content+ '</option>');
                });
                $('.progressdiv').hide();
            }).fail(function () {
                alert("error");
                $('.progressdiv').hide();
            });
        }
        $("#vehicleType").change(function(){
            if($(this).val()>0){
                $("#make").html("<option value='0'>Select Make</option>");
                getdata('make', $(this).val()==3?2:$(this).val());
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
                $("#variant").html("<option value='0'>Select Model</option>");
                getdata('variant', $(this).val());
            }
        });
    });
</script>