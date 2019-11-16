<div class="col-xs-50">
<a href="<?= site_url('ad/info'); ?>"  >Ad info</a>
<div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/10'); ?>"  >HOME PAGE DOUBLE BANNER AD1</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/11'); ?>"  >HOME PAGE DOUBLE BANNER AD2</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/brandad'); ?>"  >BRAND AD</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/dealerad/1'); ?>"  >USED CAR DEALER AD</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/dealerad/2'); ?>"  >USED BIKE DEALER  AD</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/dealerad/3'); ?>"  > NEW CAR DEALER AD</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/dealerad/4'); ?>"  >NEW BIKE DEALER AD</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/61'); ?>"  >USED CAR DEALER  DOUBLE AD1</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/62'); ?>"  >USED CAR DEALER DOUBLE AD2</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/54'); ?>"  >USED CAR DEALER SINGLE AD</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/64'); ?>"  >USED BIKE DEALER DOUBLE AD1</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/65'); ?>"  >USED BIKE DEALER DOUBLE AD2</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/57'); ?>"  >USED BIKE DEALER  SINGLE AD</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/67'); ?>"  >NEW CAR DEALER DOUBLE AD1</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/68'); ?>"  >NEW CAR DEALER DOUBLE AD2</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/60'); ?>"  >NEW CAR DEALER SINGLE AD</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/70'); ?>"  >NEW BIKE DEALER DOUBLE AD1</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/71'); ?>"  >NEW BIKE DEALER DOUBLE AD2</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/63'); ?>"  >NEW BIKE DEALER SINGLE AD</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/dealerad/5'); ?>"  >SERVICE AD</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/3'); ?>" style=" color: #006400;"  >slider1</a>
        <?php foreach ($path3 as $row) { ?>
            <div class="col-xs-50">
                <img src="<?= IMAGES_PATH . "advertisement/" . $row->img_path1; ?>" class="col-xs-23 col-xs-offset-1"/>
                <a href="<?= site_url('ad/delete'); ?>?did=<?php echo $row->id; ?>" style=" color: #ff0000;">delete</a></div>
        <?php } ?> 
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/4'); ?>"  >slider2</a>
        <?php foreach ($path4 as $row) { ?>
            <div class="col-xs-50">
                <img src="<?= IMAGES_PATH . "advertisement/" . $row->img_path1; ?>" class="col-xs-23 col-xs-offset-1"/>
                <a href="<?= site_url('ad/delete'); ?>?did=<?php echo $row->id; ?>" style=" color: #ff0000;">delete</a></div>
        <?php } ?> 
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/1'); ?>"  >sliderpopup1</a>  
        <?php foreach ($path1 as $row) { ?>
            <div class="col-xs-50">
                <img src="<?= IMAGES_PATH . "advertisement/" . $row->img_path1; ?>" class="col-xs-23 col-xs-offset-1"/>
                <a href="<?= site_url('ad/delete'); ?>?did=<?php echo $row->id; ?>" style=" color: #ff0000;">delete</a></div>
        <?php } ?> 
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/2'); ?>">sliderpopup2</a> 
        <?php foreach ($path2 as $row) { ?>
            <div class="col-xs-50">
                <img src="<?= IMAGES_PATH . "advertisement/" . $row->img_path1; ?>" class="col-xs-23 col-xs-offset-1"/>
                <a href="<?= site_url('ad/delete'); ?>?did=<?php echo $row->id; ?>" style=" color: #ff0000;">delete</a></div>
        <?php } ?> 
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/15'); ?>">About ussingle banner ad</a>    
    </div>   
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/13'); ?>">About us double banner ad 1</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/14'); ?>">About us double banner ad 2</a>    
    </div>

    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/18'); ?>"  >Buy car pagesingle banner ad</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/16'); ?>"  >Buy car pagedouble banner ad1</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/17'); ?>"  >Buy car pagedouble banner ad2</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/21'); ?>"  >User plan  pagesingle banner ad</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/19'); ?>"  >User plan  pagedouble banner ad1</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/20'); ?>"  >User plan  pagedouble banner ad2</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/24'); ?>"  >Car buying tips pagesingle banner ad</a>    
    </div><div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/22'); ?>"  >Car buying tips pagedouble banner ad1</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/23'); ?>"  >Car buying tips pagedouble banner ad2</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/27'); ?>"  >Buy bike pagesingle banner ad</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/25'); ?>"  >Buy bike pagedouble banner ad1</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/26'); ?>"  >Buy bike pagedouble banner ad2</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/36'); ?>"  >Bike buying tipssingle banner ad</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/31'); ?>"  >Bike buying tipsdouble banner ad1</a>    
    </div>

    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/32'); ?>"  >Bike buying tipsdouble banner ad2</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/34'); ?>"  >New car search pagedoublebanner ad1</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/35'); ?>"  >New car search pagedoublebanner ad2</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/51'); ?>"  >New car search page single banner ad</a>    
    </div>

    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/40'); ?>"  >New bike search pagedouble banner ad1</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/41'); ?>"  >New bike search pagedouble banner ad2</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/48'); ?>"  >newbike searchpage singlebanner</a>    
    </div>  

    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/46'); ?>"  >New car/bike dealer page, pagedouble banner ad1</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/47'); ?>"  >New car/bike dealer page, pagedouble banner ad2</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/49'); ?>"  >Used car/bike dealer pagedouble banner ad1</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/50'); ?>"  >Used car/bike dealer pagedouble banner ad2</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/39'); ?>"  >New car/bike dealer page,single banner ad</a>    
    </div>

    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/52'); ?>"  >Loan Page double banner ad1</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/53'); ?>"  >Loan Page double banner ad2</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/42'); ?>"  >EMI calculator pagesingle banner ad</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/55'); ?>"  >EMI calculator pagedouble banner ad1</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/56'); ?>"  >EMI calculator pagedouble banner ad2</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/58'); ?>"  >Terms Page double banner ad1</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/59'); ?>"  >Terms Page double banner ad2</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/45'); ?>"  >Terms Pagesingle banner ad</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/100'); ?>"  >NEWS AND EVENTS TOP AD</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/101'); ?>"  >NEWS AND EVENTS BOTTOM AD</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/102'); ?>"  >HOTGROUP TOP AD</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/103'); ?>"  >HOTGROUP BOTTOM AD</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/106'); ?>"  >INSURANCE TOP AD</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/107'); ?>"  >INSURANCE BOTTOM AD</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/104'); ?>"  >LOAN TOP AD</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/105'); ?>"  >LOAN BOTTOM AD</a>    
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/75'); ?>"  >LoGIN PAGE SINGLE BANNER AD</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/78'); ?>"  >SELL BIKE SINGLE BANNER AD</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/76'); ?>"  >SELL BIKE DOUBLE BANNER AD1</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/77'); ?>"  >SELL BIKE DOUBLE BANNER AD2</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/81'); ?>"  >SELL CAR SINGLE BANNER AD</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/79'); ?>"  >SELL CAR DOUBLE BANNER AD1</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/80'); ?>"  >SELL CAR DOUBLE BANNER AD2</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/82'); ?>"  >SEARCH DOUBLE BANNER AD1</a>   
    </div>
    <div class="col-xs-15" style="padding: 50px;">
        <a href="<?= site_url('ad/adupload/83'); ?>"  >SEARCH DOUBLE BANNER AD2</a>   
    </div>
</div>