<script type = "text/javascript" >
    function delImg(id, path) {
        id = parseInt(id);
        if (id === NaN || id === "") {
            return;
        }
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("alert").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "<?= site_url('json') ?>/d" + path + "g/" + id, true);
        xmlhttp.send();
    }
    $(document).ready(function () {
        $('#featureslist').change(function () {
            if ($(this).val() === 'new'){
                $('#newfeatures').toggle();
            }
            else{
                $('#newfeatures').hide();
            }
        });
        $('#speclist').change(function () {
            if ($(this).val() === 'new'){
                $('#newspec').toggle();
            }
            else{
                $('#newspec').hide();
            }
        });
        $('#deatilslist').change(function () {
            if ($(this).val() === 'new'){
                $('#newdeatils').toggle();
            }
            else{
                $('#newdeatils').hide();
            }
        });

        function newinput(key) {
            $('#' + key + 'input').parent('div').show();
        }
        $('#featuresul li').click(function () {
            $(this).hide();
            var postData = {};
            postData.value11 = $(this).val();
            postData.value6 = $('#variant').val();
            $.ajax({
                url: "<?PHP echo site_url('json'); ?>/deletefeature",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                $('.alert').show(data.message);
            });
        });
        $('#specul li').click(function () {
            $(this).hide();
            var postData = {};
            postData.value12 = $(this).val();
            postData.value6 = $('#variant').val();
            $.ajax({
                url: "<?PHP echo site_url('json'); ?>/deletespec",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                $('.alert').show(data.message);
            });
        });
        $('#deatilsul li').click(function () {
            $(this).hide();
            var postData = {};
            postData.value13 = $(this).val();
            postData.value6 = $('#variant').val();
            $.ajax({
                url: "<?PHP echo site_url('json'); ?>/deletedetails",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                $('.alert').show(data.message);
            });
        });
        $('.addnew').click(function () {
            $('.progressdiv').show();
            $('.new .select').css('textTransform', 'capitalize');
            var value = $(this).parent('div').children('.new').val();
            $select = $(this).parent('div').parent('div').find('select');
            var id = $select.attr('id');
            var arr = $select.children('option').attr('id');
            if ($('#' + id).find('option[name="' + value + '"]').attr('selected', 'selected')) {
                var postData = {};
                postData.id = $select.val();
                postData.value1 = id;
                postData.value2 = value;
                postData.value3 = $('#vehicletype').val();
                postData.value4 = $('#company').val();
                postData.value5 = $('#model').val();
                postData.value6 = $('#variant').val();
                postData.value7 = $('#web').val();
                postData.comStatus = $("#companystatus").val();
                postData.value11 = $('#featureslist').val();
                postData.value12 = $('#speclist').val();
                postData.value15 = $('#deatilslist').val();
                postData.value13 = $('#featurevalue').val();
                postData.value14 = $('#specvalue').val();
                postData.value16 = $('#deatilsvalue').val();
                if ($(this).attr('id') === 'uploadvariant') {
                    postData.model = $("#model").val();
                    postData.type = $("#vehicletype").val();
                    postData.price = $("#variantprice").val();
                    postData.priceText = $("#variantpriceText").val();
                    postData.fuel = $("#fueltype").val();
                    postData.company = $("#company").val();
                    postData.variant = $('#variant').val();
                    postData.cubicc = $('#cubicCapacity').val();
                    postData.seatingc = $('#seatingCapacity').val();
                    postData.variantstatus = $("#variantstatus").val();
                    postData.variantsname = $("#variantinput").val();
                    postData.about = $("#aboutveriant").val();
                }
                if ($(this).attr('id') === 'uploadcolor') {
                    postData.colors = $("#colorname").val();
                    postData.model = $("#model").val();
                    postData.colorcode = $("#colorcode").val();
                    postData.statuscolor = $("#statuscolor").val();
                }
                if ($(this).attr('id') === 'uploadmodel') {
                    postData.type = $("#vehicletype").val();
                    postData.bodytype = $("#bodytype").val();
                    postData.model = $("#model").val();
                    postData.company = $("#company").val();
                    postData.modelstatus = $("#modelstatus").val();
                    postData.fromyear = $("#fromyear").val();
                    postData.modelname = $("#modelinput").val();
                    postData.toyear = $("#toyear").val();
                    postData.about = $("#aboutModel").val();
                }
                if ($(this).attr('id') === 'addnewfeature') {
                    postData.vehicle_feature = $('#newfeatureadd').val();
                    postData.parentof = $('#parentof').val();
                    postData.newfeaturedis = $('#newfeaturedisadd').val();
                    id = 'features';
                }
                if ($(this).attr('id') === 'addnewspec') {
                    postData.newspecadd = $('#newspecadd').val();
                    postData.parentofspec = $('#parentofspec').val();
                    postData.specdisc = $('#newspecdisadd').val();
                    id = 'specifications';
                }
                if ($(this).attr('id') === 'addnewdeatils') {
                    postData.newdeatiladd = $('#newdeatiladd').val();
                    postData.deatildisc = $('#newdeatildisadd').val();
                    id = 'deatils';
                }
                $.ajax({
                    url: "<?PHP echo site_url('json/add'); ?>" + id,
                    type: 'post',
                    dataType: 'json',
                    data: postData
                }).done(function (data) {
                    $('.alert').show().text(data.message);
                    if (data.process === 'add') {
                        if (data.append === 'featuresul') {
                            $('#' + data.append).append('<li >' + data.content + '</li>');
                        }
                        $('#' + data.append).append('<option value="' + data.id + '" id="img' + data.append + data.id + '"   selected="selected" name="' + data.content + '">' + data.content + '</option>');
                    } else
                    if (data.process === 'up') {
                        $('#img' + data.append + data.id).attr('name', data.content).text(data.content);
                        $('#' + data.append).val(data.id);
                    }
                    $('#' + data.append).parent('div').children('.hideme').hide();
                    $('.progressdiv').hide();
                }).fail(function () {
                    alert("error");
                    $('.progressdiv').hide();
                });
            }
        });
        //getdata('getvehicletype', 0, 0, 0);

        function getdata(path, value1, value2, value3) {
            $('#featuresul li').hide();
            $('#specul li').hide();
            $('#deatilsul li').hide();
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
                    var datas = '';
                    var img = '';
                    var web = '';
                    var model = '';
                    while (i < data.i) {
                        i++;
                        console.log(i);
                        if (data.ids === 'company') {
                            img = ' img="' + data.image[i] + '" web="' + data.web[i] + '" loan="' + data.loan[i] + '" insu="' + data.insu[i] + '" status="' + data.status[i] + '" ';
                        }
                        if (data.ids === 'model') {
                            model = ' start="' + data.start[i] + '" end="' + data.end[i] + '" body="' + data.body[i] + '" about="' + data.about[i] + '" brouchure="' + data.brochure[i] + '" status="' + data.status[i] + '" ';
                        }
                        if (data.ids === 'variant') {
                            model = ' fuel="' + data.fuel[i] + '" price="' + data.price[i] + '" priceText="' + data.price_text[i] + '" about="' + data.about[i] + '" brouchure="' + data.brouchure[i] + '" cc="' + data.cc[i] + '" sc="' + data.sc[i] + '" status="' + data.status[i] + '"  ';
                        }
                        if (data.ids === 'colorslist') {
                            $('#colorimages').append('<img src="<?PHP echo IMAGES_PATH ?>newvehicles/thumbs/' + data.image[i] + '" width="150" /><a href="#" onclick="delImg(' + data.id[i] + ',\'eleteColIm\')"><img src="<?= IMAGES_PATH . "icofail.gif" ?>" /></a>');
                        }
                        if (data.ids === 'specul') {

                            $('#listspec' + data.id[i]).css('display', 'block');
                            $('#listspec' + data.id[i]).html(data.content[i] + " - " + data.value[i] + "<span class='glyphicon glyphicon-remove' ></span>");

                        } else if (data.ids === 'deatil') {

                            console.log('#listdet' + data.id[i]);
                            $('#listdet' + data.id[i]).css('display', 'block');
                            $('#listdet' + data.id[i]).html(data.content[i] + " - " + data.value[i] + "<span class='glyphicon glyphicon-remove' ></span>");

                        } else if (data.ids === 'featuresul') {

                            $('#list' + data.id[i]).css('display', 'block');
                            $('#list' + data.id[i]).html(data.content[i] + " - " + data.value[i] + "<span class='glyphicon glyphicon-remove' ></span>");
                        }
                        if (data.idType === "liList") {
                        } else if (data.idType === "image") {
                            $('#' + data.ids).append('<img src="<?PHP echo IMAGES_PATH ?>newvehicles/thumbs/' + data.image[i] + '" width="150" /><a href="#" onclick="delImg(' + data.id[i] + ',\'eleteIm\')"><img src="<?= IMAGES_PATH . "icofail.gif" ?>" /></a>');
                        } else {
                            $('#' + data.ids).append('<option value="' + data.id[i] + '" id="img' + data.ids + data.id[i] + '"' + img + model + ' name="' + data.content[i] + '">' + data.content[i] + '</option>');
                            datas = datas + '<option >' + data.content[i] + '</option>';
                        }
                    }
                    $('#' + data.ids).parent('div').append('<datalist id="list' + data.ids + '">' + datas + '</datalist>');
                }
                $('.progressdiv').hide();
            }).fail(function () {
                alert("error");
                $('.progressdiv').hide();
            });
        }
        $('#vehicletype').blur(function () {
            if ($('#vehicletype').val() !== 0) {
                $('#company').html('<option value="0">Select please</option><option value="-1">new</option>');
                $('#model').html('');
                $('#bodytype').html('');
                $('#variant').html('');
                getdata('getcompany', $(this).val(), 0, 0);
                getdata('getbody', $(this).val(), 0, 0);
                //getdata('getfuel', 0, 0, 0);
            }
        });
        $('#company').blur(function () {
            if ($(this).val() !== 0) {
                $('#companyimage').show().css('background-image', "url('" + '<?PHP echo IMAGES_PATH ?>' + "companies/thumb/" + $('#imgcompany' + $('#company').val()).attr('img') + "')");
                $('#variant').html('');
                $('#model').html('<option value="0">Select please</option><option value="-1">new</option>');
                $('#web').val($('#imgcompany' + $(this).val()).attr('web'));
                /*$('#web').val($('#imgcompany' + $(this).val()).attr('web'));
                $('#web').val($('#imgcompany' + $(this).val()).attr('web'));*/
                $('#companystatus').val($('#imgcompany' + $(this).val()).attr('status'));
                getdata('getmodel', $(this).val(), 0, 0);
            }
        });
        $('#model').blur(function () {
            if ($(this).val() !== 0) {
                $('#veImgList').html('');
                $('#colorimages').html('');
                $('#variant').html('<option value="0">Select please</option><option value="-1">new</option>');
                $('#bodytype').val($('#imgmodel' + $(this).val()).attr('body'));
                $('#aboutModel').val($('#imgmodel' + $(this).val()).attr('about'));
                if($('#imgmodel' + $(this).val()).attr('brouchure')!="#"){
                    $('#brouchure').attr('href', '<?= base_url() ?>assets/files/' + $('#imgmodel' + $(this).val()).attr('brouchure'));
                    $('#brouchure').html("Brouchure Link Availabile")
                }
                $('#modelstatus').val($('#imgmodel' + $(this).val()).attr('status'));
                $('#fromyear').val($('#imgmodel' + $(this).val()).attr('start'));
                $('#toyear').val($('#imgmodel' + $(this).val()).attr('end'));
                getdata('getvariant', $('#model').val(), 0, 0);
                getdata('getcolorslist', $('#model').val(), '', '');
                getdata('getmodelImgs', $('#model').val(), '', '');
            }
        });
        $('#variant').blur(function () {
            if ($(this).val() !== 0) {
                $('#fueltype').val($('#imgvariant' + $(this).val()).attr('fuel'));
                $('#variantprice').val($('#imgvariant' + $(this).val()).attr('price'));
                $('#variantpriceText').val($('#imgvariant' + $(this).val()).attr('priceText'));
                $('#aboutveriant').val($('#imgvariant' + $(this).val()).attr('about'));
                $('#cubicCapacity').val($('#imgvariant' + $(this).val()).attr('cc'));
                $('#seatingCapacity').val($('#imgvariant' + $(this).val()).attr('sc'));
                $('#variantbrouchurelink').attr('href', '<?= base_url() ?>assets/files/' + $('#imgvariant' + $(this).val()).attr('brouchure'));
                $('#addvariantfeature').show();
                $('#variantstatus').val($('#imgvariant' + $(this).val()).attr('status'));
                getdata('getfeatureslist', $(this).val(), '', '');
                getdata('getspeclist', $(this).val(), '', '');
                getdata('getdetaillist', $(this).val(), '', '');
                //getdata('getcolorcodelist', $('#variant').val(), '', '');
            } else {
                $('#addvariantfeature').hide();
            }
        });
        var error = [];
        $('.select').change(function () {
            $('.hideme').hide();
            if ($(this).val() === -1) {
                $(this).parent('div').find('.addnew').val('Add new');
                id = $(this).attr('id');
                $(this).parent('div').children('div').find('.new').attr('list', 'list' + id);
                newinput($(this).attr('id'));
                $('#' + $(this).attr('id') + 'input').val('');
            } else {
                $('#' + $(this).attr('id') + 'input').val($('#img' + $(this).attr('id') + $('#' + $(this).attr('id')).val()).attr('name') + "");
                $(this).parent('div').find('.addnew').val('Update it');
                newinput($(this).attr('id'));
                if ($(this).attr('id') === 'adtitle') {
                    $('#fuel').val($('#imgadtitle' + $(this).val()).attr('fuel'));
                }
                if ($(this).attr('id') === 'model') {
                    $('#fromyear').val($('#imgmodel' + $(this).val()).attr('start'));
                    $('#toyear').val($('#imgmodel' + $(this).val()).attr('end'));
                    $('#bodytype').val($('#imgmodel' + $(this).val()).attr('body'));
                }
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
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        var files;
        $('input[type=file]').on('change', prepareUpload);

        function prepareUpload(event) {
            files = event.target.files;
        }
        $("#uploadfile").on({
            click: function () {
                $(".alert").hide();
                var postData = {};
                postData.errorFound = 0;
                postData.image = $("#image").val();
                postData.id = $('#company').val();
                postData.company = $("#companyinput").val();
                postData.web = $("#web").val();
                postData.type = $("#vehicletype").val();
                postData.status = $("#companystatus").val();
                if (postData.errorFound === 0) {
                    $('.alert').show().text('error').hide(5000);
                    if (typeof FormData === 'undefined') {
                        var data = [];
                        $.each(files, function (key, value) {
                            data.append(key, value);
                        });
                    } else {
                        var data = new FormData();
                        $.each(files, function (key, value) {
                            if ((value.type === "image/jpeg") || (value.type === "image/png") || (value.type === "image/gif")) {
                                data.append(key, value);
                            } else {
                                foundError = false;
                                data.append(key, value);
                                $(".alert").show().text("Invalid Image file");
                                return false;
                            }
                        });
                    }
                    $.each(postData, function (X, Y) {
                        data.append(X, Y);
                    });
                    $('.progressdiv').show();
                    $.ajax({
                        url: "<?= site_url('json/upload') ?>",
                        type: 'post',
                        dataType: 'json',
                        data: data,
                        cache: false,
                        processData: false,
                        contentType: false,
                        enctype: 'multipart/form-data',
                        fileElementId: 'image'
                    }).done(function (data) {
                        $('#uploadfile').addClass('addnew');
                        if (data.error === true) {
                            $('.alert').fadeIn(1000).text('not uploaded(' + data.message + ')');
                        } else
                        if (data.error === false) {
                            if (data.process === 'add') {
                                $('#' + data.append).append('<option value="' + data.id + '"  id="imgcompany' + data.id + '" img="' + data.image + '" selected="selected" name="' + data.content + '">' + data.content + '</option>');
                            } else
                            if (data.process === 'up') {
                                $('#imgcompany' + data.id).attr('name', data.content).text(data.content);
                                $('#company').val(data.id);
                            }
                            $('#' + data.append).parent('div').children('.hideme').hide();
                            $('.alert').fadeIn(1000).text('uploaded(' + data.message + ')');
                            $('#companyimage').css('background-image', "url('" + '<?PHP echo IMAGES_PATH ?>' + "companies/thumb/" + data.image + "')");
                        }
                        $('.progressdiv').hide();
                    });
                }
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
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        var files;
        $('input[type=file]').on('change', prepareUpload);

        function prepareUpload(event) {
            files = event.target.files;
        }
        $("#uploadmodel").on({
            click: function () {
                $(".alert").hide();
                var postData = {};
                postData.type = $("#vehicletype").val();
                postData.file = $("#modelbrouchure").val();
                postData.bodytype = $("#bodytype").val();
                postData.model = $("#model").val();
                postData.company = $("#company").val();
                postData.modelstatus = $("#modelstatus").val();
                postData.fromyear = $("#fromyear").val();
                postData.modelname = $("#modelinput").val();
                postData.toyear = $("#toyear").val();
                postData.about = $("#aboutModel").val();
                $('.alert').show().text('error').hide(5000);
                if (typeof FormData === 'undefined') {
                    var data = [];
                    $.each(files, function (key, value) {
                        data.append(key, value);
                    });
                } else {
                    var data = new FormData();
                    $.each(files, function (key, value) {
                        if ((value.type === "application/pdf") || (value.type === "application/doc") || (value.type === "application/docs")) {
                            data.append(key, value);
                        } else {
                            foundError = false;
                            data.append(key, value);
                            $(".alert").show().text("Invalid  file");
                            return false;
                        }
                    });
                }
                $.each(postData, function (X, Y) {
                    data.append(X, Y);
                });
                $('.progressdiv').show();
                $.ajax({
                    url: "<?= base_url() ?>json/addmodel",
                    type: 'post',
                    dataType: 'json',
                    data: data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    fileElementId: 'modelbrouchure'
                }).done(function (data) {
                    if (data.error === true) {
                        $('.alert').fadeIn(1000).text(data.message);
                    } else
                    if (data.error === false) {
                        $('#' + data.append).parent('div').children('.hideme').hide();
                        $('.alert').fadeIn(1000).text(data.message);
                    }
                    $('.progressdiv').hide();
                });
            }
        });
        $("#uploadvariant").on({
            click: function () {
                $(".alert").hide();
                var postData = {};
                postData.variant = $('#variant').val();
                postData.type = $("#vehicletype").val();
                postData.file = $("#variantbrouchure").val();
                postData.price = $("#variantprice").val();
                postData.fuel = $("#fueltype").val();
                postData.company = $("#company").val();
                postData.model = $("#model").val();
                postData.variantstatus = $("#variantstatus").val();
                postData.variantsname = $("#variantinput").val();
                postData.about = $("#aboutveriant").val();
                $('.alert').show().text('error').hide(5000);
                if (typeof FormData === 'undefined') {
                    var data = [];
                    $.each(files, function (key, value) {
                        data.append(key, value);
                    });
                } else {
                    var data = new FormData();
                    $.each(files, function (key, value) {
                        if ((value.type === "application/pdf") || (value.type === "application/doc") || (value.type === "application/docs")) {
                            data.append(key, value);
                        } else {
                            foundError = false;
                            data.append(key, value);
                            $(".alert").show().text("Invalid  file");
                            return false;
                        }
                    });
                }
                $.each(postData, function (X, Y) {
                    data.append(X, Y);
                });
                $('.progressdiv').show();
                $.ajax({
                    url: "<?= base_url() ?>json/addvariant",
                    type: 'post',
                    dataType: 'json',
                    data: data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    fileElementId: 'variantbrouchure'
                }).done(function (data) {
                    if (data.error === true) {
                        $('.alert').fadeIn(1000).text(data.message);
                    } else
                    if (data.error === false) {
                        $('#' + data.append).parent('div').children('.hideme').hide();
                        $('.alert').fadeIn(1000).text(data.message);
                    }
                    $('.progressdiv').hide();
                });
            }
        });
        $("#uploadcolor").on({
            click: function () {
                if (($("#colors").val() !== '') && ($("#model").val() !== '') && ($("#colorcode").val() !== '')) {
                    $(".alert").hide();
                    var postData = {};
                    postData.errorFound = 0;
                    postData.image = $("#uploadvehicleimage").val();
                    postData.colors = $("#colorname").val();
                    postData.model = $("#model").val();
                    postData.colorcode = $("#colorcode").val();
                    postData.statuscolor = $("#statuscolor").val();
                    if (postData.errorFound === 0) {
                        $('.alert').show().text('error').hide(5000);
                        if (typeof FormData === 'undefined') {
                            var data = [];
                            $.each(files, function (key, value) {
                                data.append(key, value);
                            });
                        } else {
                            var data = new FormData();
                            $.each(files, function (key, value) {
                                if ((value.type === "image/jpeg") || (value.type === "image/png") || (value.type === "image/gif")) {
                                    data.append(key, value);
                                } else {
                                    foundError = false;
                                    data.append(key, value);
                                    $(".alert").show().text("Invalid Image file");
                                    return false;
                                }
                            });
                        }
                        $.each(postData, function (X, Y) {
                            data.append(X, Y);
                        });
                        $('.progressdiv').show();
                        $.ajax({
                            url: "<?= base_url('json/addcolors') ?>",
                            type: 'post',
                            dataType: 'json',
                            data: data,
                            cache: false,
                            processData: false,
                            contentType: false,
                            enctype: 'multipart/form-data',
                            fileElementId: 'uploadvehicleimage'
                        }).done(function (data) {
                            if (data.error === true) {
                                $('.alert').fadeIn(1000).text(data.message);
                            } else
                            if (data.error === false) {
                                $('#' + data.append).parent('div').children('.hideme').hide();
                                $('.alert').fadeIn(1000).text(data.message);
                            }
                            $('.progressdiv').hide();
                        });
                    }
                } else {
                    $('.alert').fadeIn(1000).text('Fill out Please');
                }
            }
        });
        $("#vehicleimage").on({
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
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        var files;
        $('input[type=file]').on('change', prepareUpload);

        function prepareUpload(event) {
            files = event.target.files;
        }
        $("#upVeImage").on({
            click: function () {
                if (($("#vehicleimage").val() !== '')) {
                    $(".alert").hide();
                    var postData = {};
                    postData.errorFound = 0;
                    postData.image = $("#vehicleimage").val();
                    postData.model = $("#model").val();
                    if (postData.errorFound === 0) {
                        $('.alert').show().text('error').hide(5000);
                        if (typeof FormData === 'undefined') {
                            var data = [];
                            $.each(files, function (key, value) {
                                data.append(key, value);
                            });
                        } else {
                            var data = new FormData();
                            $.each(files, function (key, value) {
                                if ((value.type === "image/jpeg") || (value.type === "image/png") || (value.type === "image/gif")) {
                                    data.append(key, value);
                                } else {
                                    foundError = false;
                                    data.append(key, value);
                                    $(".alert").show().text("Invalid Image file");
                                    return false;
                                }
                            });
                        }
                        $.each(postData, function (X, Y) {
                            data.append(X, Y);
                        });
                        $('.progressdiv').show();
                        $.ajax({
                            url: "<?= site_url('json/uploadvehicleimages') ?>",
                            type: 'post',
                            dataType: 'json',
                            data: data,
                            cache: false,
                            processData: false,
                            contentType: false,
                            enctype: 'multipart/form-data',
                            fileElementId: 'uploadvehicleimage'
                        }).done(function (data) {
                            if (data.error === true) {
                                $('.alert').fadeIn(1000).text(data.message);
                            } else
                            if (data.error === false) {
                                $('#modelimage').show().css('background-image', "url('<?= base_url() ?>assets/images/newvehicles/thumbs/" + data.image + "')");
                                $('#' + data.append).parent('div').children('.hideme').hide();
                                $('.alert').fadeIn(1000).text(data.message);
                            }
                            $('.progressdiv').hide();
                        });
                    }
                } else {
                    $('.alert').fadeIn(1000).text('Fill out Please');
                }
            }
        });
    });
</script>