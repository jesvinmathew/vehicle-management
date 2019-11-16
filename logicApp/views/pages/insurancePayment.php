<div class="col-xs-48 col-xs-offset-1">
    
        <?PHP
        if(isset($insData[0])){
        ?>
    <div class="col-xs-50">
        <center><h2 class="mb1">Verify The Information</h2></center>
        <div class="col-xs-5"></div>
        <div class="pricing_table" style="padding:20px 7px 50px 7px;">
            <ul>
                <li></li>
                <li>Name:</li>
                <li>Email id</li>
                <li>Mob Number</li>
                <li>Land Number</li>
                <li>Make:</li>
                <li>Model</li>
                <li>Variant</li>
                <li>Year of Make</li>
                <li>Registration Number</li>
                <li>Registration Date</li>
            </ul>
            <ul>
                <li></li>
                <li><?= $insData[0]->name ?></li>
                <li><?= $insData[0]->email ?></li>
                <li><?= $insData[0]->mob_number ?></li>
                <li><?= $insData[0]->land_number ?></li>
                <?PHP
                if($insData[0]->new_vehi){
                    ?>
                    <li><?= $insData[0]->make ?></li>
                    <li><?= $insData[0]->model ?></li>
                    <li><?= $insData[0]->variant ?></li>
                    <?PHP
                }
                else{
                    $brand=$this->db->get_where('company',  array('cmp_id'=>$insData[0]->make))->result();
                    $model=$this->db->get_where('model',  array('model_id'=>$insData[0]->model))->result();
                    $vari=$this->db->get_where('variant',  array('varient_id'=>$insData[0]->variant))->result();
                    ?>
                    <li><?= $brand[0]->companyname ?></li>
                    <li><?= $model[0]->model_name ?></li>
                    <li><?= $vari[0]->var_name ?></li>
                    <?PHP
                }
                ?>
                <li><?= $insData[0]->modyear ?></li>
                <li><?= $insData[0]->regno ?></li>
                <li><?= $insData[0]->regdate ?></li>
            </ul>
        </div>
        <div class="pricing_table" style="padding:20px 7px 50px 7px;">
            <div>The amount below is insurance amount and additional 2% of transaction charge</div>
            <ul>
                <li></li>
                <li>Third party</li>
                <li>&#x20B9;<?= $insData[0]->thiParty ?></li>
                <li><form method="post">
                        <input type="hidden" name="user" value="<?= $this->uri->segment(3);?>" />
                        <input type="hidden" name="plan" value="1" />
                        <input type="submit" class="btn" value="Pay Now" />
                    </form>
                </li>
                
            </ul>
            <ul>
                <li></li>
                <li>Normal</li>
                <li>&#x20B9;<?= $insData[0]->normel ?></li>
                <li><form method="post">
                        <input type="hidden" name="user" value="<?= $this->uri->segment(3);?>" />
                        <input type="hidden" name="plan" value="2" />
                        <input type="submit" class="btn" value="Pay Now" />
                    </form>
                </li>
            </ul>
            <ul>
                <li></li>
                <li>Extra</li>
                <li>&#x20B9;<?= $insData[0]->extra ?></li>                
                <li><form method="post">
                        <input type="hidden" name="user" value="<?= $this->uri->segment(3);?>" />
                        <input type="hidden" name="plan" value="3" />
                        <input type="submit" class="btn" value="Pay Now" />
                    </form>
                </li>
            </ul>
            
            
            
        </div>
    </div>
    <?PHP
}
?>
</div>
    