<div class="col-xs-48 col-xs-offset-1">
    <div class="col-xs-50">
        <div class="col-md-25">

            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8408361746200948"
                 data-ad-slot="9279876118"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        <div class="col-md-25">
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8408361746200948"
                 data-ad-slot="7651158113"
                 data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>

            <?PHP /*
              if ($this->uri->segment(3) == 'used' && $this->uri->segment(4) == 'car') {
              $this->db->where_in('loc', array('16', '17'));
              $this->vvalue=0;
              } elseif ($this->uri->segment(3) == 'used' && $this->uri->segment(4) == 'bike') {
              $this->db->where_in('loc', array('25', '26'));
              $this->vvalue=0;
              } elseif ($this->uri->segment(3) == 'new' && $this->uri->segment(4) == 'car') {
              $this->db->where_in('loc', array('34', '35'));
              $this->vvalue=1;
              } elseif ($this->uri->segment(3) == 'new' && $this->uri->segment(4) == 'bike') {
              $this->db->where_in('loc', array('40', '41'));
              $this->vvalue=1;
              } else
              $this->db->where_in('loc', array('82', '83'));
              $this->db->order_by('loc', 'ASC');
              $add = $this->db->get('add')->result();

              foreach ($add as $ad) {
              if (isset($ad->img_path1)) {
              ?>
              <a href="<?= $ad->link; ?>"><img src="<?= IMAGES_PATH . "advertisement/" . $ad->img_path1; ?>" class="col-xs-23 col-xs-offset-1"/></a>
              <?php
              }
              } */
            ?>
        </div>
    </div>
    <input type="hidden" id="baseurl" value="<?= base_url() ?>" />
    <div class="col-xs-50">
        <h2>Search Vehicle </h2>        
    </div>

    <?PHP if ($this->uri->segment(3) === "used") {
        ?>
        <div class="col-xs-50 page1_block" style=" padding-top:30px; margin-bottom:30px;">
            <div class="col-xs-24 col-md-11 col-xs-offset-1 col-md-offset-2">
                <ul>
                    <?php
                    $i = 0;
                    $query = $this->db->get_where('place', array('type' => '3'));
                    if ($query->num_rows() > 0) {
                        echo '<li class="location"><h5><a href="#" data-value="0" class="checkplace distSelect" >Any<span></span></a></h5></li>';
                        $i++;
                        foreach ($query->result() as $row) {
                            $i++;
                            echo '<li><h5><a href="#" data-value="' . $row->place_id . '" class="checkplace" >' . $row->placename . '</a></h5></li>';
                            if ($i % 4 == 0) {
                                echo '</ul>
                                </div>
                                <div class="col-xs-24 col-md-11 col-xs-offset-1">
                                <ul>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    <?PHP }
    ?>


    <div class="col-xs-50 col-sm-20 col-md-12 search-box alpha" style="background: #B80002; color: #fff;">
        <form>
            <input type="hidden" id="table" value="<?= ( $this->uri->segment(3) == "new" ) ? 1 : 2; ?>" />
            <br/>
            <em><strong>Vehicle Type</strong></em><br/>
            <div class="col-xs-50">
                <select  style="width:90%;" class="form-control select" name="type" id="type">

                    <?php
                    $this->type = 0;
                    if ($this->uri->segment(4) === 'bike') {
                        $this->type = 1;
                        echo '<option value="1" selected>Bike</option>';
                    } else
                    if ($this->uri->segment(4) == 'car') {
                        $this->type = 2;
                        echo '<option value="2" selected>Car</option>';
                    } else {
                        ?>
                        <option value="0">All</option>
                        <option value="1">Bike</option>
                        <option value="2">Car</option>
                    <?php } ?>
                </select>
                <br/>
            </div> 
            <hr style="width:90%;" />
            <em><strong>Search By Keywords</strong></em>
            <div class="col-xs-35">      	
                <input  class=" form-control "  type="text" id="searchinput" placeholder="Search..."/>
                <input type="hidden" id="location" />
            </div>
            <div class="col-xs-15">
                <span  class="search" id="search"><img src="<?= IMAGES_PATH; ?>back.png" style="margin:-2px 0px 0px 5px;" alt="Search" /></span>
                <br/>
            </div>
            <hr class="col-xs-45 " />
            <div class="col-xs-45">
                <em><strong>Price</strong></em><br/>
                <div class="col-xs-16 ">
                    <input  class="tmInput form-control"   type="text" id="frominput" placeholder="From" /><br/></div> 
                <div class="col-xs-3"> -<br/></div> 
                <div class="col-xs-16">
                    <input  class="tmInput form-control" data-class="tmInput" type="text" id="toinput" placeholder="To"/>
                </div> 
                <div class="col-xs-15">
                    <span  id="fromto" class="search" ><img src="<?= IMAGES_PATH; ?>/back.png" style="margin:-2px 0px 0px 5px;" alt="Search" /></span><br/>
                </div> 
            </div>
            <div class="col-xs-50 ">
                <hr class="col-xs-45 " />
                <em><strong>Make</strong></em>
            </div>
            <div class="col-xs-45 " style="height:155px; overflow:auto; text-transform: uppercase;">
                <?php $this->load->view('includes/car_brands'); ?>
            </div>
            <?PHP
            if ($this->uri->segment(3) == 'used' && $this->uri->segment(4) == 'car') {
                ?>
                <div class="col-xs-50">
                    <hr class="col-xs-45 " />
                    <em><strong class="col-xs-50">Certified <input type="checkbox" id="certify" /></strong></em>
                    <?PHP /* <div id="certifyBox" style="display: none;" class="col-xs-50">
                      <ul style="display: block;">
                      <?PHP
                      foreach($certify as $val){
                      ?>
                      <li><label><input type="checkbox" vehicle="<?=$val->id?>" class="certified"  value="<?=$val->id?>" id="cr<?=$val->id?>" /><?=$val->certifyby?></label></li>
                      <?php
                      }
                      ?>
                      </ul>

                      </div><?PHP */ ?>
                </div>
                <?PHP
            }
            ?>
            <?php if ($this->uri->segment(3) == 'used') {
                ?>
                <input type="hidden" value="0" id="place" />

                <div class="col-xs-50">
                    <hr class="col-xs-45 " />
                    <em class="col-xs-45"><strong>Year</strong></em>

                    <div class="col-xs-8">
                        From:<br/></div> 
                    <div class="col-xs-16">
                        <select name="year" id="fromyear" class="form-control select">
                            <option value="">Any</option>
                            <?PHP
                            $yer = date('Y') - 30;
                            for ($i = $yer; $i <= date('Y'); $i++)
                                echo "<option value='$i'>$i</option>";
                            ?>
                        </select><br/></div> 
                    <div class="col-xs-5">To:<br/></div> 
                    <div class="col-xs-16"> 
                        <select name="year" id="toyear" class="form-control select">
                            <option value="">Any</option> 
                            <?PHP
                            $yer = date('Y') - 30;
                            for ($i = date('Y'); $i >= $yer; $i--)
                                echo "<option value='$i'>$i</option>";
                            ?>
                        </select><br/></div>
                </div>
                <hr class="col-xs-45 " />
                <em><strong>Mileage</strong></em><br/>
                <div class="col-xs-50">
                    <select  style="width:90%;" class="form-control select" name="mileage" id="mileage">
                        <option value="">All</option>
                        <option value="10">Less than 10Kms</option>
                        <option value="15">Less than 15Kms</option>
                        <option value="30">Less than 30Kms</option>
                        <option value="50">Less than 50Kms</option>
                        <option value="80">Less than 80Kms</option>
                        <option value="120">Less than 1,20Kms</option>
                        <option value="150">Less than 1,50 Kms</option>
                    </select>
                    <br/></div> 
            <?php } ?>
            <hr class="col-xs-45 " />

            <div class="col-xs-50">
                <em><strong>Fuel</strong></em><br/>
                <select  style="width:90%;" class="form-control select"  name="fueltype" id="fueltype">
                    <option value="">Any</option>
                    <?php
                    $query = $this->db->get('fueltype');
                    if ($query->num_rows() > 0) {
                        foreach ($query->result() as $row) {
                            echo '<option id="fuel' . $row->fl_id . '" value="' . $row->fl_id . '" ';
                            if ($this->input->get('fueltype') == $row->fl_id) {
                                echo ' selected="selected" ';
                            }
                            echo '>' . $row->fueltypename . '</option>';
                        }
                    }
                    ?>
                </select>
                <br/></div> 

            <hr class="col-xs-45 " />

            <div class="col-xs-50">
                <em><strong>Body Type</strong></em><br/>
                <select  style="width:90%;" class="form-control select"  name="bodytype" id="bodytype">
                    <option value="">Any</option>
                    <?php
                    if ($this->uri->segment(4) == 'car') {
                        $this->db->where('vtype_id', 2);
                    } elseif ($this->uri->segment(4) == 'bike') {
                        $this->db->where('vtype_id', 1);
                    }

                    $query = $this->db->get('body_type');
                    if ($query->num_rows() > 0) {
                        foreach ($query->result() as $row) {
                            echo '<option class="fuellist body' . $row->vtype_id . '" value="' . $row->v_id . '"';
                            if ($this->input->get('bodytype') == $row->v_id) {
                                echo ' selected="selected" ';
                            }
                            echo '>' . $row->vehicle_type . '</option>';
                        }
                    }
                    ?>
                </select>
                <br/>
            </div>
        </form>

    </div>
    <div class="col-xs-50 col-sm-30 col-md-38" id="results"><?php $this->load->view('includes/cars'); ?>
    </div>
    <div class="col-xs-50">
    <div class="col-xs-25 page1_block1">
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-8408361746200948"
             data-ad-slot="1604624516"
             data-ad-format="auto"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <div class="col-xs-25 page1_block1">
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-8408361746200948"
             data-ad-slot="3953401318"
             data-ad-format="auto"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    </div>

<?PHP /*
  if (($this->uri->segment(3) == 'used') && ($this->uri->segment(4) == 'car')) {
  $this->db->where('loc', 18);
  } elseif (($this->uri->segment(3) == 'used') && ($this->uri->segment(4) == 'bike')) {
  $this->db->where('loc', 27);
  } elseif (($this->uri->segment(3) == 'new') && ($this->uri->segment(4) == 'car')) {
  $this->db->where('loc', 51);
  } elseif (($this->uri->segment(3) == 'new') && ($this->uri->segment(4) == 'bike')) {
  $this->db->where('loc', 48);
  } else
  $this->db->where('loc', 0);
  $this->db->order_by('loc', 'ASC');
  $add = $this->db->get('add')->result();
  if (isset($add[0]->img_path1)) {
  ?>
  <a href="<?= $add[0]->link; ?>"><img src="<?= IMAGES_PATH . "advertisement/" . $add[0]->img_path1; ?>" class="col-xs-48 col-xs-offset-1"/></a>
  <?php } */ ?>
</div>