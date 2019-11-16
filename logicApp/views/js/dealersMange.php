<script type="text/javascript">
    $(document).ready(function () {
        $("#del_branch").click(function () {
            if ($("#branch").val() > 0) {
                if (confirm("Do yo realy want to delete !")) {
                    var postData = {};
                    postData.branchId = $("#branch").val();
                    $.ajax({
                        url: "<?PHP echo site_url('dealer'); ?>/del_deal_branch",
                        type: 'post',
                        dataType: 'json',
                        data: postData
                    }).done(function (data) {
                        alert(data);

                    });
                }
            }
            else {
                alert("please select dealer branch to delete");
                return false;
            }
        });
        function getdata(path, value1, value2, value3) {
            $('.progressdiv').show();
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
                var i = 0;
                if (data.i > 0) {
                    var img = '';
                    var datas = '';
                    if (data.ids == 'company') {
                        for (i = 1; i <= data.i; i++) {
                            img = ' img="' + data.image[i] + '" ';
                            $('#' + data.ids).append('<option value="' + data.id[i] + '" id="img' + data.ids + data.id[i] + '"' + img + '  name="' + data.content[i] + '">' + data.content[i] + '</option>');
                            datas = datas + '<option >' + data.content[i] + '</option>';
                        }
                    }
                    else if (data.ids == 'adtitle') {
                        var model = '';
                        $('#' + data.ids).html("<option value='0'>Select</option><option value='-1'>New</option>");
                        for (i = 1; i <= data.i; i++) {
                            model = ' email="' + data.email[i] + '" phone="' + data.phone[i] + '" ';
                            img = ' img="' + data.image[i] + '" ';
                            $('#' + data.ids).append('<option value="' + data.id[i] + '" id="img' + data.ids + data.id[i] + '"' + img + model + '  name="' + data.content[i] + '">' + data.content[i] + '</option>');
                            datas = datas + '<option >' + data.content[i] + '</option>';
                        }
                    }
                    else if (data.ids == 'branch') {
                        $('#' + data.ids).html("<option value='0'>Select</option><option value='-1'>New</option>");
                        for (i = 1; i <= data.i; i++) {
                            model = ' name="' + data.content[i] + '" add="' + data.add[i] + '" map_iframe="' + data.map_iframe[i] + '"  email="' + data.email[i] + '" ph1="' + data.ph1[i] + '"  sale_ph="' + data.sale_ph[i] + '" ph2="' + data.ph2[i] + '" sar_ph="' + data.sar_ph[i] + '"  sale_email="' + data.sale_email[i] + '" sar_email="' + data.sar_email[i] + '" priority="' + data.priority[i] + '" district="' + data.district[i] + '" town="' + data.town[i] + '"';
                            $('#' + data.ids).append('<option value="' + data.id[i] + '" id="br' + data.ids + data.id[i] + '"' + model + '  name="' + data.content[i] + '">' + data.content[i] + '</option>');
                            datas = datas + '<option >' + data.content[i] + '</option>';
                        }
                    }
                    $('#' + data.ids).parent('div').append('<datalist id="list' + data.ids + '">' + datas + '</datalist>');

                }
                $('.progressdiv').hide();
            });
        }
        $('#vehicletype').blur(function () {
            $type = $('#vehicletype').val() * $('#condition').val();
            if ($('#vehicletype').val() != 0) {
<?php
if ($this->uri->segment(3) == "new") {
    ?>
                    $('#company').html('');
                    $('#adtitle').html('');
                    getdata('getcompany', $(this).val(), 0);
    <?PHP
} else {
    ?>
                    $('#adtitle').html('');
                    getdata('getdealers', 0, $(this).val());
    <?PHP
}
?>
            }
        });
        $('#company').blur(function () {
            $type = $('#vehicletype').val() * $('#condition').val();
            if ($(this).val() != 0) {
                $('#companyimage').show().css('background-image', "url('" + '<?PHP echo IMAGES_PATH ?>' + "companies/thumb/" + $('#imgcompany' + $('#company').val()).attr('img') + "')");
                $('#adtitle').html('');
                $('#adtitle').html('<option value="0">Select please</option><option value="-1">new</option>');
                getdata('getdealers', $(this).val(), $type);
            }
        });

        $('#adtitle').change(function () {
            if ($(this).val() > 0) {
                $('#adtitleinput').val($('#imgadtitle' + $(this).val()).attr('name'));
                $('#dealernumber').val($('#imgadtitle' + $(this).val()).attr('phone'));
                $('#dealeremail').val($('#imgadtitle' + $(this).val()).attr('email'));
                $('#adtitleimage').show().css('background-image', "url('" + '<?PHP echo IMAGES_PATH ?>' + "dealers/thumb/" + $('#imgadtitle' + $('#adtitle').val()).attr('img') + "')");
                getdata('getBranches', $(this).val(), 0, 0);
            }
        });
        $("#branch").change(function () {
            $('#brtitle').val($('#brbranch' + $(this).val()).attr('name'));
            $('#map').val($('#brbranch' + $(this).val()).attr('map_iframe'));
            $('#address').val($('#brbranch' + $(this).val()).attr('add'));
            $('#salesPh').val($('#brbranch' + $(this).val()).attr('sale_ph'));
            $('#district').val($('#brbranch' + $(this).val()).attr('district'));
            $('#salesEmail').val($('#brbranch' + $(this).val()).attr('sale_email'));
            $('#serPh').val($('#brbranch' + $(this).val()).attr('sar_ph'));
            $('#serEmail').val($('#brbranch' + $(this).val()).attr('sar_email'));
            $('#phone1').val($('#brbranch' + $(this).val()).attr('ph1'));
            $('#phone2').val($('#brbranch' + $(this).val()).attr('ph2'));
            $('#email').val($('#brbranch' + $(this).val()).attr('email'));
            $('#priority').val($('#brbranch' + $(this).val()).attr('priority'));
            getPlace($('#district').val(), 4, 'town');
        });
        $("#certy").click(function () {
        	if($('#certy').is(':checked')){
        	$(".certi_deal").show();
        	}
        	else {
        		$(".certi_deal").hide();
        	}
        	
        });
        $('#submit').click(function () {
            if ($('#adtitle').val() > 0) {
                var postData = {};
                postData.branch_id = $('#branch').val();
                postData.dealer_id = $('#adtitle').val();
                postData.district = $('#district').val();
                postData.town = $('#town').val();
                postData.address = $('#address').val();
                postData.map_iframe = $('#map').val();
                postData.salesPh = $('#salesPh').val();
                postData.salesEmail = $('#salesEmail').val();
                postData.serPh = $('#serPh').val();
                postData.serEmail = $('#serEmail').val();
                postData.phone1 = $('#phone1').val();
                postData.brtitle = $('#brtitle').val();
                postData.phone2 = $('#phone2').val();
                postData.email = $('#email').val();
                postData.rec_number = $('#rec_number').val();
                postData.priority = $('#priority').val();
                if($('#certy').is(':checked')){
        	postData.cer_status =1;
        	}
        	else{
        	postData.cer_status =0;
                }
                postData.cer_id = $('#certi_deal').val();
                alert(postData.cer_status);
                $.ajax({
                    url: "<?= base_url() ?>AdminJson/add_dealer",
                    type: 'post',
                    dataType: 'json',
                    data: postData
                }).done(function (data) {
                    alert(data.message);
                    if (data.error == true) {
                        $('#' + data.id).parent('div').append('<div class="alert">' + data.message + '</div>').children('.alert').css('background-color', 'red');
                    } else
                    if (data.error == false) {
                        $('.alert').hide();
                        $('#submit').val(data.message).attr('id', 'uploadimage');
                        $('#vehicleimage').fadeIn(3000);
                        $('#upload_id').val(data.id);
                        $("html, body").animate({
                            scrollTop: 0
                        }, 5000);
                    }
                });
            }
            else {
                alert("Select a Dealer")
            }
        });
        $('head').append('<meta http-equiv="Expires" content="-1"><meta http-equiv="Cache-control" content="no-cache">');
        $("#upimage").on({
            change: function () {
                $('.thumb').show().append('<img class="photos currentfile"  src=""/>');
                readURL(this);
            }
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.currentfile').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        var files;
        $('input[type=file]').on('change', prepareUpload);

        function prepareUpload(event) {
            files = event.target.files;
        }
        $("#adddealer").on({
            click: function () {
                $(".alert").hide();
                var postData = {};
                postData.errorFound = 0;
                postData.image = $("#image").val();
                postData.id = $('#adtitle').val();
                postData.dealer = $("#adtitleinput").val();
                postData.condition = $("#condition").val();
<?php
if ($this->uri->segment(3) == "new") {
    ?>
                    postData.company = $("#company").val();
    <?PHP
}
?>
                postData.type = $("#vehicletype").val();
                postData.dealeremail = $("#dealeremail").val();
                postData.dealernumber = $("#dealernumber").val();
                /*if ($("#image").val()) {
                 if (postData.errorFound === 0) {
                 $('.alert').show().text('error').hide(5000);
                 if (typeof FormData === 'undefined') {
                 $.each(files, function (key, value) {
                 postData.append(key, value);
                 });
                 } else {
                 $.each(files, function (key, value) {
                 if ((value.type === "image/jpeg") || (value.type === "image/png") || (value.type === "image/gif")) {
                 postData.append(key, value);
                 } else {
                 foundError = false;
                 postData.append(key, value);
                 $(".alert").show().text("Invalid Image file");
                 return false;
                 }
                 });
                 }
                 }
                 $.each(postData, function (X, Y) {
                 postData.append(X, Y);
                 });
                 }*/
                $('.progressdiv').show();
                $.ajax({
                    url: "<?= base_url() ?>json/uploaddealerlogo",
                    type: 'post',
                    dataType: 'json',
                    data: postData
                }).done(function (data) {
                    alert(data.process);
                    /*$('#adddealer').addClass('addnew');
                     if (data.error == true) {
                     $('.alert').fadeIn(1000).text('not uploaded(' + data.message + ')');
                     } else
                     if (data.error == false) {
                     if (data.process == 'add') {
                     $('#' + data.append).append('<option value="' + data.id + '"  id="imgadtitle' + data.id + '" img="' + data.image + '" selected="selected" name="' + data.content + '">' + data.content + '</option>');
                     } else
                     if (data.process == 'up') {
                     $('#imgadtitle' + data.id).attr('name', data.content).text(data.content);
                     $('#adtitle').val(data.id);
                     }
                     $('#' + data.append).parent('div').children('.hideme').hide();
                     $('.alert').fadeIn(1000).text('uploaded(' + data.message + ')').fadeOut(1000);
                     $('#adtitleimage').css('background-image', "url('" + '<?PHP echo IMAGES_PATH ?>' + "dealers/thumb/" + data.image + "')")
                     }*/
                    $('.progressdiv').hide();
                });

            }
        });
        $("#district").change(function () {
            if ($(this).val()) {
                getPlace($(this).val(), 4, 'town', 0);
            }
        });
        function getPlace(pid, type, result, val) {
            var postData = {};
            postData.value1 = pid;
            postData.value2 = type;
            $.ajax({
                url: "<?PHP echo site_url('newjson'); ?>/getPlace",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                $('#' + result).empty();
                $.each(data, function (index, place) {
                    $('#' + result).append(new Option(place.placename, place.place_id));
                });
                if(val)
                $('#' + result).val(val);
            });
        }
    });
</script>c