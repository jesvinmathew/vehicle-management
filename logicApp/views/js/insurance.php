<style>
    .error{
        color: red;
    }
    .error input, .error select{
        box-shadow: 0 0 10px red inset;
    }
</style>
<script type="text/javascript">
    $(document).ready(function () {
        $('.uservehi').hide();
        $("#userchkd").click(function () {
            if ($("#userchkd").prop('checked') == true) {
                $('.uservehi').show();
                $('.userhave').hide();
                $('#calculate').hide();
            }
            else {
                $('.userhave').show();
                $('.uservehi').hide();
                $('#calculate').show();
            }
        });
        $('.text').blur(function () {
            var getId = $(this).attr('id');

            if ($(this).val().length <= 0) {
                $('#' + getId + 'top').addClass("error");
                $('.ermsg' + getId).html("Please Fill Out The Field!");
            } else {
                $('#' + getId + 'top').removeClass("error");
                $('.ermsg' + getId).html("");
            }
        });
        $('.number').blur(function () {
            var getId = $(this).attr('id');
            if ($(this).val().length <= 3) {
                $('#' + getId + 'top').addClass("error");
                $('.ermsg' + getId).html("Please Fill Out The Field!");
            }
            else
            {
                $('#' + getId + 'top').removeClass("error");
                $('.ermsg' + getId).html("");
            }
        });
        $('.email').blur(function () {
            var getId = $(this).attr('id');
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if ($(this).val().length <= 3) {
                $('#' + getId + 'top').addClass("error");
                $('.ermsg' + getId).html("Please Fill Out The Field!");
            } else if (!emailReg.test($(this).val())) {
                $('#' + getId + 'top').addClass("error");
                $('.ermsg' + getId).html("Please Enter a valid email id!");
            }
            else
            {
                $('#' + getId + 'top').removeClass("error");
                $('.ermsg' + getId).html("");
            }
        });
        $('.date').blur(function () {
            var getId = $(this).attr('id');
            if ($(this).val().length <= 3) {
                $('#' + getId + 'top').addClass("error");
                $('.ermsg' + getId).html("Please Fill Out The Field!");
            }
            else
            {
                $('#' + getId + 'top').removeClass("error");
                $('.ermsg' + getId).html("");
            }
        });
        $('.select').blur(function () {
            var getId = $(this).attr('id');
            if ($(this).val().length <= 0) {
                $('#' + getId + 'top').addClass("error");
                $('.ermsg' + getId).html("Please Fill Out The Field!");
            }
            else
            {
                $('#' + getId + 'top').removeClass("error");
                $('.ermsg' + getId).html("");
            }
        });

        function getdata(path, value1) {
            //$('.progressdiv').show();
            var postData = {};
            postData.value1 = value1;
            $.ajax({
                url: "<?PHP echo site_url('newjson/get'); ?>" + path,
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                $.each(data, function (index, value) {
                    $('#' + path).append('<option value="' + value.id + '">' + value.content + '</option>');
                });
                $('.progressdiv').hide();
            }).fail(function () {
                alert("error");
                $('.progressdiv').hide();
            });
        }
        $("#vehicleType").change(function () {
            if ($(this).val() > 0) {
                $("#make").html("<option value='0'>Select Make</option>");
                getdata('make', $(this).val() == 3 ? 2 : $(this).val());
            }
        });
        $("#make").change(function () {
            if ($(this).val() > 0) {
                $("#model").html("<option value='0'>Select Model</option>");
                getdata('model', $(this).val());
            }
        });
        $("#model").change(function () {
            if ($(this).val() > 0) {
                $("#variant").html("<option value='0'>Select Model</option>");
                getdata('variant', $(this).val());
            }
        });
        $(".action").click(function () {
            var getId = $(this).attr('id');
            if ($("#formid").val() != "") {
                if (($("#make").val() != "") || ($("#newmake").val() != "")) {
                    $("#form").submit();
                    return true;
                }
            }
            else {
                var err = 0;
                if ($("#name").val() == "") {
                    $('#nametop').addClass("error");
                    $('.ermsg').html("Please Fill Out The Field!");
                    err = 1;
                }
                else {
                    $('#nametop').removeClass("error");
                    $('.ermsg').html("");
                }
                if ($("#email").val() == "") {
                    $('#emailtop').addClass("error");
                    $('.ermsg').html("Please Fill Out The Field!");
                    err = 1;
                }
                else {
                    $('#emailtop').removeClass("error");
                    $('.ermsg').html("");
                }
                if ($("#ph").val() == "") {
                    $('#phtop').addClass("error");
                    $('.ermsg').html("Please Fill Out The Field!");
                    err = 1;
                }
                else  if ($("#ph").val().length!=10) {
                    $('#phtop').addClass("error");
                    $('.ermsg').html("Please Fill 10 digit mobile number!");
                    err = 1;
                }
                else {
                    $('#phtop').removeClass("error");
                    $('.ermsg').html("");
                }
                if ($("#lnd").val() != "") {
                    if($("#lnd").val().length!=7 ) {
                        $('#lndtop').addClass("error");
                        $('.ermsg').html("7 dight land number");
                        err = 1;
                    }
                    else {
                        $('#lndtop').removeClass("error");
                        $('.ermsg').html("");
                    }
                }
                else{
                    $('#lndtop').removeClass("error");
                    $('.ermsg').html("");
                }
                if ($("#vehicleType").val() == "") {
                    $('#vehicleTypetop').addClass("error");
                    $('.ermsg').html("Please Fill Out The Field!");
                    err = 1;
                }
                else {
                    $('#vehicleTypetop').removeClass("error");
                    $('.ermsg').html("");
                }
                if ($("#userchkd").prop('checked') != true) {
                    if ($("#make").val() == "") {
                        $('#maketop').addClass("error");
                        $('.ermsg').html("Please Fill Out The Field!");
                        err = 1;
                    }
                    else {
                        $('#maketop').removeClass("error");
                        $('.ermsg').html("");
                    }
                    if ($("#model").val() == "") {
                        $('#modeltop').addClass("error");
                        $('.ermsg').html("Please Fill Out The Field!");
                        err = 1;
                    }
                    else {
                        $('#modeltop').removeClass("error");
                        $('.ermsg').html("");
                    }
                    if ($("#variant").val() == "") {
                        $('#varianttop').addClass("error");
                        $('.ermsg').html("Please Fill Out The Field!");
                        err = 1;
                    }
                    else {
                        $('#varianttop').removeClass("error");
                        $('.ermsg').html("");
                    }
                }
                if ($("#modYear").val() == "") {
                    $('#modYeartop').addClass("error");
                    $('.ermsg').html("Please Fill Out The Field!");
                    err = 1;
                }
                else {
                    $('#modYeartop').removeClass("error");
                    $('.ermsg').html("");
                }
                if ($("#regno").val() == "") {
                    $('#regnotop').addClass("error");
                    $('.ermsg').html("Please Fill Out The Field!");
                    err = 1;
                }
                else {
                    $('#regnotop').removeClass("error");
                    $('.ermsg').html("");
                }
                if ($("#regdate").val() == "") {
                    $('#regdatetop').addClass("error");
                    $('.ermsg').html("Please Fill Out The Field!");
                    err = 1;
                }
                else {
                    $('#regdatetop').removeClass("error");
                    $('.ermsg').html("");
                }
                if ($("#expdate").val() == "") {
                    $('#expdatetop').addClass("error");
                    $('.ermsg').html("Please Fill Out The Field!");
                    err = 1;
                }
                else {
                    $('#expdatetop').removeClass("error");
                    $('.ermsg').html("");
                }
                if (!err) {
                    var postData = {};
                    postData.name = $("#name").val();
                    postData.email = $("#email").val();
                    postData.mob_number = $("#cuCod").val()+"-"+$("#ph").val();
                    postData.land_number = $("#std").val()+"-"+$("#lnd").val();
                    postData.vehicletype = $("#vehicleType").val();
                    if ($("#userchkd").prop('checked') == true) {
                        postData.make = $("#newmake").val();
                        postData.model = $("#newmodel").val();
                        postData.variant = $("#newvariant").val();
                        postData.new_vehi=1;
                    }
                    else{
                        postData.make = $("#make").val();
                        postData.model = $("#model").val();
                        postData.variant = $("#variant").val();
                    }
                    postData.modyear = $("#modYear").val();
                    postData.regno = $("#regno").val();
                    postData.regdate = $("#regdate").val();
                    postData.expdate = $("#expdate").val();
                    if ($("#ncb").prop('checked') == true) {
                    	postData.no_clime=1;
                    }
                    else{
                    	postData.no_clime=0;
                    }
                    $.ajax({
                        url: "<?= site_url('insurance/insu_enqry'); ?>",
                        type: 'post',
                        dataType: 'text',
                        data: postData
                    }).done(function (data) {
                        $.ajax({
                            url: "<?= site_url('welcome/sms'); ?>/"+$("#ph").val()+"/Insurance reguest is reseved our team will contact you soon"
                        });
                        $("#formid").val(data);
                        if ($("#userchkd").prop('checked') == true) {
                            $("#form").submit();
                            return true;
                        }
                        else if (getId == "buy") {
                            $("#form").submit();
                            return true;
                        }
                        
                    }).fail(function () {
                        if ($("#userchkd").prop('checked') == true) {
                            $("#form").submit();
                            return true;
                        }
                        else if (getId == "buy") {
                            $("#form").submit();
                            return true;
                        }
                    });
                    if(getId != "buy"){
                            var postData = {};
                            postData.value1 = $("#variant").val();
                            postData.value2 = $("#vehicleType").val() == 3 ? 2 : $("#vehicleType").val();
                            postData.value3 = $("#regdate").val();
                            postData.value4 = $("#expdate").val();
                            if ($('#ncb').is(':checked')) {
                                postData.value5 = 1;
                            }
                            postData.value6 = $("#modYear").val();
                            var cc;
                            var sc;
                            $.ajax({
                                url: "<?= site_url('newjson/insucalcu'); ?>",
                                type: 'post',
                                dataType: 'json',
                                data: postData
                            }).done(function (data) {
                                $("#bajtp").html(data['tp']);
                                $("#bajnor").html(data['normel']);
                                $('.progressdiv').hide();
                                $('#buy').show();
                                $('#calculate').hide();

                            }).fail(function () {
                                alert("error");
                                $('.progressdiv').hide();
                            });
                        }
                }
                return false;
            }
        });
    });
</script>