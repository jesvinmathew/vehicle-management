<div class="form_block col-lg-50"  style="background: #B80002; color: #fff;">
    <div class="title col-lg-50">
        <a href="#" class="col-lg-25 serBox" form-data="carSearch">Cars</a>
        <a href="#" class="col-lg-25 serBox" form-data="bikeSearch">Bikes</a>
    </div>
    <div>
        <section id="carSearch" class="serBoxs">
            <form id="carSearchForm" action="<?=site_url('welcome/search/new/car');?>">  
                <em>CAR Make</em>
                <select name="ncbrand" class="tmSelect auto form-control" id="carCompany" data-class="tmSelect tmSelect2" data-constraints="">
                    <option value="">ALL CAR TYPES</option>
                    <?php 
                    
                    $this->db->select('cmp_id as id,companyname as content');
                    $this->db->order_by('companyname', 'ASC');
                    $this->db->where('status !=', 0);
                    $qry=$this->db->get_where('company', ['type' => 2])->result();
                     foreach ($qry as $res)
                     {
                         echo'<option value="'.$res->id.'">'.$res->content.'</option>';
                         
                     }
                    
                    
                    ?>

                </select>
                <div class="clear"></div>
                <em>Fuel Type</em>
                <select id="fueltype" name="fueltype" class="tmSelect auto form-control" data-class="tmSelect tmSelect2" data-constraints="">
                    <option value="">Any</option>
                     <option value="1">Petrol</option>
                      <option value="2">Diesel</option>
                      <option value="3">LPG</option>
                      <option value="4">CNG</option>
                     <option value="5">Electric (Battery)</option>
                </select>


                <div class="clear"></div>
                <input type="submit" class="btn1" value="search">
            </form>
        </section>
        <section id="bikeSearch" class="serBoxs" style="display: none;">
            <form id="bickSearchForm" action="<?=site_url('welcome/search/new/bike');?>">  
                <em>Bike Make</em>
                <select name="nbbrand" class="tmSelect auto form-control" id="bikeCompany" data-class="tmSelect tmSelect2" data-constraints="">
                    <option value="">ALL Bike TYPES</option>
                     <?php 
                    
                    $this->db->select('cmp_id as id,companyname as content');
                    $this->db->order_by('companyname', 'ASC');
                    $this->db->where('status !=', 0);
                    $qry=$this->db->get_where('company', ['type' => 1])->result();
                     foreach ($qry as $res)
                     {
                         echo'<option value="'.$res->id.'">'.$res->content.'</option>';
                         
                     }
                    
                    
                    ?>
                </select>
                <div class="clear"></div>
                <em>Fuel Type</em>
                <select id="bikefuel" name="fueltype" class="tmSelect auto form-control" data-class="tmSelect tmSelect2" data-constraints="">
                    <option value="">Any</option>
                    <option value="1">Petrol</option>
                    <option value="5">Electric (Battery)</option>
                </select>
                <div class="clear"></div>
                <input type="submit" class="btn1" value="search">
            </form>
        </section>
    </div>
    <div class="clear"></div>
</div>