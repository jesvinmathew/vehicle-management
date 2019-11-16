<?PHP
    if (!isset($_POST['submitHandler'])){
        /*/*<script src="<?PHP echo JS_PATH; ?>jquery.js"></script>*/
        ?>
        <script src="<?PHP echo JS_PATH; ?>multiupload.js"></script>
        <?php
     }
 ?>
<script>
    $(document).ready(function () {        
        getdata('getcompany', $('#vehicletype').val(), 0);
        function getdata(path, value1, value2) {
            var postData = {};
            postData.value1 = value1;
            postData.value2 = value2;
            $.ajax({
                url: "<?PHP echo site_url('json'); ?>/" + path,
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                var i = 0;
                while (i < data.i)
                {
                    i++;
                    $('#' + data.ids).append('<option value="' + data.id[i] + '">' + data.content[i] + '</option>');
                }
            });
        }
        $('#company').blur(function () {
            if ($(this).val() !== 0) {
                $('#model').html('');
                $('#variant').html('');
                getdata('getmodel', $(this).val(), 0);
            }
        });
        $('#model').blur(function () {
            if ($(this).val() !== 0) {
                $('#variant').html('');
                getdata('getvariant', $(this).val(), 0);
            }
        });
        $('#submitHandler').click(function () {
            $(this).text('Uploading please wait');
        });
        console.log('jquery ok');
        $('#sendinformation').attr('type', 'button');
        var postData = {};
        postData['adtitle'] = '';
        postData['vehicletype'] = $('#vehicletype').val();
        postData['company'] = '';
        postData['Mileage'] = '';
        postData['model'] = '';
        postData['cartype'] = '';
        postData['Fuel'] = '';
        postData['condition'] = '';
        postData['Transmission'] = '';
        postData['Odometer'] = '';
        postData['textarea'] = '';
        postData['price'] = '';
        postData['inr'] = '';
        postData['cuncode'] = '';
        postData['number'] = '';
        postData['stdCod'] = '';
        postData['lnumber'] = '';
        postData['vehicleauth'] = '';
        $.extend({}, postData);

        var error = {};
        $('.required').blur(function () {
            var variable = $(this).attr('id');
            if ($(this).val().length <= 0) {
                $(this).parent('div').children('.alert').remove();
                $(this).parent('div').append('<div class="alert">This field is required</div>').children('.alert').css('background-color', 'red');
                error[variable] = true;
                $.extend({}, error);
            } else {
                $(this).parent('div').children('.alert').css('background-color', 'green').text('Its Ok').fadeOut(3000);
                var variable = $(this).attr('id');
                postData[variable] = $(this).val();
                $.extend({}, postData);
                error[variable] = false;
                $.extend({}, error);
            }
        });
        $('.nonmand').change(function () {
            $(this).parent('div').children('.alert').css('background-color', 'green').text('Its Ok').fadeOut(3000);
            var variable = $(this).attr('id');
            postData[variable] = $(this).val();
            $.extend({}, postData);
            error[variable] = false;
            $.extend({}, error);
        });
        $('.select').change(function () {
            console.log($(this).val());
            if ($(this).val() <= 99) {
                $(this).parent('div').children('.alert').remove();
                $(this).parent('div').append('<div class="alert">This field is required</div>').children('.alert').css('background-color', 'red');
                error[variable] = true;
                $.extend({}, error);
            } else {
                $(this).parent('div').children('.alert').css('background-color', 'green').text('Its Ok').fadeOut(3000);
                var variable = $(this).attr('id');
                postData[variable] = $(this).val();
                $.extend({}, postData);
                error[variable] = false;
                $.extend({}, error);
            }
        });
        $('.number').change(function () {
            if (!$.isNumeric($(this).val())) {
                
                $(this).parent('div').children('.alert').remove();
                $(this).parent('div').append('<div class="alert">This field is required</div>').children('.alert').css('background-color', 'red');
                error[variable] = true;
                $.extend({}, error);
            } else {
                $(this).parent('div').children('.alert').css('background-color', 'green').text('Its Ok').fadeOut(3000);
                var variable = $(this).attr('id');
                postData[variable] = $(this).val();
                $.extend({}, postData);
                error[variable] = false;
                $.extend({}, error);
            }
        });
        $('#sendinformation').click(function () {            
            $.ajax({
                url: "<?= base_url() ?>json/addvehicle",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                alert(data.message);
                if (data.error === true) {
                    $('#' + data.id).parent('div').append('<div class="alert">' + data.message + '</div>').children('.alert').css('background-color', 'red');
                }
                else
                if (data.error === false) {
                    $('#sendinformation').val(data.message).attr('id', 'uploadimage');
                    $('#vehicleimage').fadeIn(3000);
                    $('#upload_id').val(data.id);
                    $("html, body").animate({scrollTop: 0}, 5000);
                }
            });
        });
    });
    $(function () {
        var calendar = $.calendars.instance('persian');
        $('#edate').calendarsPicker({calendar: calendar});
        $('#inlineDatepicker').calendarsPicker({calendar: calendar, onSelect: showDate});
    });
    
</script>