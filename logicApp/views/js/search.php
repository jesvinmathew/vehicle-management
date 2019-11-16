<script type = "text/javascript" >
    $(document).ready(function () {
        var postData = {};
        var from = 0;
        var to = 10;
<?PHP
if (isset($_GET['placeId'])) {
    ?>
            $("#place").val(<?= $_GET['placeId']; ?>);

<?PHP
}
if (isset($_GET['brand'])) {
    ?>
            $("#br<?= $_GET['brand']; ?>").prop('checked', true);
    <?PHP }
?>
        getinput(from, to);

        function getdata(type, frominput, toinput, searchinput, checkme, fromyear, toyear, mileage, fuel, body, sellertype, from, to, totalcheck, check, checkplace, totalcheckplace, table) {
            $('.progressdiv').show();
            $('.progressdiv').html('Searching');
            postData.totalcheck = totalcheck;
            postData.check = check;
            postData.checkplace = checkplace;
            postData.totalcheckplace = totalcheckplace;
            postData.from = from;
            postData.to = to;
            postData.type = type;
            postData.body = body;
            postData.frominput = frominput;
            postData.toinput = toinput;
            postData.searchinput = searchinput;
            postData.checkme = checkme;
            postData.fromyear = fromyear;
            postData.toyear = toyear;
            postData.mileage = mileage;
            postData.fuel = fuel;
            postData.sellertype = sellertype;
            postData.table = table;
            $.ajax({
                url: "<?PHP echo site_url('json'); ?>/search",
                type: 'post',
                dataType: 'json',
                data: postData
            }).done(function (data) {
                $('.progressdiv').hide();
                $('.previous').addClass('disabled');
                $('.next').addClass('disabled');
                $('.previous').val(data.from);
                $('.next').val(data.to);
                if (data.from >= 10) {
                    $('.previous').removeClass('disabled');
                }
                var mileage = '';
                $('#showresults').html('');
                var i = 0;
                if (data.i === 11) {
                    $('.next').removeClass('disabled');
                }
                if (data.i > 0) {
                    var datas = '';

                    while (i < (data.i)) {
                        i++;
                        if (data.get === 'viewnew') {
                            var url = "'<?= base_url() ?>" + "assets/images/newvehicles/thumbs/" + data.image[i] + "'";
                            $('#showresults').append('<div class="box col-xs-50 col-sm-50 col-md-25  " style="height:200px;"><div class="col-xs-20 thumbnail "><div><img src=' + url + ' /></div></div><div class="col-xs-30"><ul><li><h5>' + data.title[i] + '</h5></li><li><a href="#myModal" style="color:#00f" class="fullview" get="' + data.get + '" value="' + data.id[i] + '"  data-toggle="modal" data-target="#myModal" id="' + data.id[i] + '" onclick="fullView(\'' + data.get + '\', ' + data.id[i] + ')" >View more</a> </li> <li>Make: ' + data.company[i] + ' </li> </ul> </div> </div>');
                        }
                        else {
                            var url = "'<?= base_url() ?>" + "assets/uploads/thumb/" + data.image[i] + "'";
                            $('#showresults').append('<div class="box col-xs-50 col-sm-50 col-md-25  " style="height:200px;"><div class="col-xs-20 thumbnail "><div><img src=' + url + ' /></div></div><div class="col-xs-30"><ul><li><h5>' + data.title[i] + '</h5></li><li><a href="#myModal" style="color:#00f" class="fullview" get="' + data.get + '" value="' + data.id[i] + '"  data-toggle="modal" data-target="#myModal" id="' + data.id[i] + '" onclick="fullView(\'' + data.get + '\', ' + data.id[i] + ')" >View more</a> </li> <li>Make: ' + data.company[i] + ' </li><li>Year: ' + data.year[i] + ' | Kilo Meter: ' + data.kilo_meter[i] + '</li> <li><h6 style=" color: blue"><u>Price: &#8377; ' + data.price[i] + '/-</u></h6></li> </ul> </div> </div>');
                        }
                        if (i === 10) {
                            i++;
                        }
                    }
                } else {
                    $('#showresults').append('Ooops... No result found');
                }
                /*string = string.replace('&lt;', '<').replace('&gt;', '>');
                $('#showresults').append(string);*/
            });
        }

        function getinput(from, to) {
            var table = $('#table').val();
            var frominput = $('#frominput').val();
            var toinput = $('#toinput').val();
            var searchinput = $('#searchinput').val();
            var checkme = $('.checkme').val();
            var fromyear = $('#fromyear').val();
            var toyear = $('#toyear').val();
            var mileage = $('#mileage').val();
            var fuel = $('#fueltype').val();
            var body = $('#bodytype').val();
            var sellertype = $('#sellertype').val();
            var totalcheck = 0;
            var check = [];
            var i = 0;
            $('.checkme[type=checkbox]:checked').each(function () {
                check[i] = $(this).val();
                console.log(totalcheck);
                i++;
                totalcheck = i;
            });
            var totalcheckplace = 0;
            var checkplace = $("#place").val();
            if (checkplace)
                totalcheckplace = 1;
            /*var i = 0;
             $('.checkplace[type=checkbox]:checked').each(function () {
             checkplace[i] = $(this).val();
             console.log(totalcheckplace);
             i++;
             totalcheckplace = i;
             });*/
            var type = $('#type').val();
            getdata(type, frominput, toinput, searchinput, checkme, fromyear, toyear, mileage, fuel, body, sellertype, from, to, totalcheck, check, checkplace, totalcheckplace, table);
        }
        $('.search').click(function () {
            var from = 0;
            var to = 10;
            getinput(from, to);
        });
        $('.location').click(function () {
            $('#location').val($(this).attr('value'));
            var from = 0;
            var to = 10;
            getinput(from, to);
        });
        $('.select').change(function () {
            var from = 0;
            var to = 10;
            getinput(from, to);
        });
        $("#certify").change(function () {
            if ($(this).attr('checked'))
                $("#certifyBox").show();
            else
                $("#certifyBox").hide();
        });
        $(".checkplace").click(function () {
            $("#place").val($(this).attr('dataval'));
            $(".checkplace").removeClass("distSelect");
            $(this).addClass("distSelect");
            var from = 0;
            var to = 10;
            getinput(from, to);
            return false;
        });
        hideandshow($('#type').val());
        $('#type').change(function () {
            hideandshow($(this).val());
        });
        function hideandshow(value)
        {
            if (value === 1)
            {
                $('#fuel3').hide();
                $('.fuellist').hide();
            }
            else
            {
                $('#fuel3').show();
                $('.fuellist').show();
            }
        }
        $('.checkme').click(function () {
            var from = 0;
            var to = 10;
            getinput(from, to);
        });

        $('.previous').click(function () {
            var to = $('.previous').val();
            var from = to - 10;
            getinput(from, to);
        });
        $('.next').click(function () {
            var from = $('.next').val();
            var to = from + 10;
            getinput(from, to);
        });
        $('#type').change(function () {
            if ($(this).val() === 1) {
                $('.checkme').parent('label').parent('li').hide();
                $('input[vehicle=1]').parent('label').parent('li').show();
            } else
            if ($(this).val() === 2) {
                $('.checkme').parent('label').parent('li').hide();
                $('input[vehicle=2]').parent('label').parent('li').show();
            } else {
                $('.checkme').parent('label').parent('li').show();
            }
        });

    });
    function fullView(get, value) {
        var bigdata = [];
        bigdata['need'] = 'dsdsd';
        bigdata[get] = value;
        $('#myModal').find('.modal-body').html("<img class='col-xs-offset-23' src='<?= IMAGES_PATH ?>camera-loader.gif' />");
        $.ajax({
            url: "<?PHP echo site_url('welcome/viewdetails'); ?>?" + get + '=' + value,
            type: 'get',
            data: bigdata
        }).done(function (data) {
            $('#myModal').find('.modal-body').html(data);
        });
    }
</script>