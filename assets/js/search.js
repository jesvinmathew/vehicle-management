<script type="text/javascript">
$(document).ready(function() {
	var postData = {};
		var from = 0;
		var to = 10;
		getinput(from, to);

	function getdata(type, frominput, toinput, searchinput, checkme, fromyear, toyear, mileage, condition, sellertype, from, to, totalcheck, check,table,location) {
$('.progressdiv').show();
            $('.progressdiv').html('Searching');
    	postData.totalcheck = totalcheck;
		postData.check = check;
		postData.from = from;
		postData.to = to;
		postData.type = type;
		postData.frominput = frominput;
		postData.toinput = toinput;
		postData.searchinput = searchinput;
		postData.checkme = checkme;
		postData.fromyear = fromyear;
		postData.toyear = toyear;
		postData.mileage = mileage;
		postData.condition = condition;
		postData.sellertype = sellertype;
        postData.location=location;
        postData.table = table;
        
		$.ajax({
			url: $('#baseurl').val()+"/json/search",
			type: 'post',
			dataType: 'json',
			data: postData
		}).done(function(data) {
		   $('.progressdiv').hide();
			$('.previous').addClass('disabled');
			$('.next').addClass('disabled');
			$('.previous').val(data.from);
			$('.next').val(data.to);
			if (data.from >= 10) {
				$('.previous').removeClass('disabled');
			}
           var mileage='';
			$('#showresults').html('');
			var i = 0;
			if (data.i == 11) {
				$('.next').removeClass('disabled');
			}
			if (data.i > 0) {
				var datas = '';
				data.i--;
				while (i < data.i) {
					i++;
                    
                     if( data.millage[i]!='')
            {
                 mileage=" | Mileage: " + data.millage[i] + " Kms ";
            }
            else
            {
                 mileage="";
            }
					var url = "'<?=base_url()?>" + "assets/uploads/thumb/" + data.image[i] + "'";
					$('#showresults').append('<div class="box col-xs-25  "><div class="col-xs-15 thumbnail "><div style="background-image: url(' + url + ');" ></div></div><div class="col-xs-35"><a href="#myModal" class="fullview" get="view" value="' + data.id[i] + '"  data-toggle="modal" data-target="#myModal" id="' + data.id[i] + '" ><ul><li><h5>' + data.title[i] + '</h5></li> <li>Make: ' + data.company[i] +  ' </li><li>Year: ' + data.year[i] + ' '+mileage+' | Condition: ' + data.condition[i] + '</li> <li><h6 class="col3"><u>Price: &#8377; ' + data.price[i] + '/-</u></h6></li></a>  </ul> </div> </div>');
				$('#showresults').append('<script >$(document).ready(function(){ $(".fullview").click(function(){  var bigdata=[]; bigdata["need"]="dsdsd";  bigdata[$(this).attr("get")]=$(this).attr("value"); $.ajax({ url:"<?PHP echo site_url('welcome/viewdetails');?>?"+$(this).attr("get")+'='+$(this).attr("value"),    type:"get", data:bigdata    }).done(function(data){    $("#myModal").find(".modal-body").html(data);}) })  })</script>');                }
} else {
				$('#showresults').append('Ooops... No result found');
			}
		})
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
		var condition = $('#condition').val();
		var sellertype = $('#sellertype').val();
        var location = $('#location').val();
		var totalcheck = 0;
		var check=[];
		var i = 0;
		$('input[type=checkbox]:checked').each(function() {
			
			check[i] = $(this).val();
		
            console.log(totalcheck);
			i++;
            	totalcheck = i;
		});
	
		var type = $('#type').val();
		getdata(type, frominput, toinput, searchinput, checkme, fromyear, toyear, mileage, condition, sellertype, from, to, totalcheck, check,table,location);
	}
	$('.search').click(function() {
		var from = 0;
		var to = 10;
		getinput(from, to);
	})
    $('.location').click(function() {
        $('#location').val($(this).attr('value'));
       
		var from = 0;
		var to = 10;
		getinput(from, to);
	})
    
	$('.select').change(function() {
		var from = 0;
		var to = 10;
		getinput(from, to);
	})
	$('.checkme').click(function() {
		var from = 0;
		var to = 10;
		getinput(from, to);
	})
	$('.previous').click(function() {
		var to = $('.previous').val();
		var from = to - 10;
		getinput(from, to);
	})
	$('.next').click(function() {
		var from = $('.next').val();
		var to = from + 10;
		getinput(from, to);
	})
    $('#type').change(function(){
        if($(this).val()==1)
        {
            $('.checkme').parent('label').parent('li').hide();
            $('input[vehicle=1]').parent('label').parent('li').show();
        }
        else
        if($(this).val()==2)
        {
            $('.checkme').parent('label').parent('li').hide();
            $('input[vehicle=2]').parent('label').parent('li').show();
        }
        else
        {
            $('.checkme').parent('label').parent('li').show();
        }
    })
})
