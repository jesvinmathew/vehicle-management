<div class="col-xs-48 col-xs-offset-1">
    <div class="col-xs-50">
        <div class="page1_block1">
             <?PHP 
            
                    $this->db->where_in('loc', array('55', '56'));
                    $this->db->order_by('loc', 'ASC');
                    $add = $this->db->get('add')->result();
                    foreach($add as $ad){
                    if(isset($ad->img_path1)){
                        ?>
                <a href="<?=$ad->link;?>"><img src="<?= IMAGES_PATH . "advertisement/" . $ad->img_path1; ?>" class="col-xs-23 col-xs-offset-1"/></a>
                    <?php }
                     }
                ?>
        </div>
    </div>
    <div class="col-xs-50">

        <center><h2>EMI Calculator</h2></center>
        <div class="col-xs-25">
            <div class="col-xs-12 form-group">
                <label class="name"  style=" line-height: 13px;" for="loanAmount">Loan Amount</label>
            </div>
            <div class="col-xs-30"> <input placeholder="Loan Amount" required="required"  id="loanAmount" class="text form-control emi" type="number" />
            </div>
            <div class="clear"></div>
            <div class="col-xs-12 form-group">
                <label class="name"  style=" line-height: 13px;" for="interestRate">Interest Rate:</label>
            </div>
            <div class="col-xs-30"> <input placeholder="Interest Rate" required="required"  id="interestRate" class="text form-control emi" type="number" />
            </div>
            <div class="clear"></div>
            <div class="col-xs-12 form-group">
                <label class="name"  style="line-height: 13px;" for="loanTenure">Loan Tenure:</label>
            </div>
            <div class="col-xs-30"> <input placeholder="Loan Tenure" required="required"  id="loanTenure" class="text form-control emi" type="number" />
            </div>
            <div class="clear"></div>
        </div>
        <div class="col-xs-25">
            <div class="col-xs-12 form-group">
                <label class="name"  style=" line-height: 13px;" >Loan Amount:</label>
            </div>
            <div class="col-xs-30"> <input disabled="disabled" id="loanAmountR" class="text form-control" type="text" />
            </div>
            <div class="clear"></div>
            <div class="col-xs-12 form-group">
                <label class="name"  style=" line-height: 13px;">Monthly Instalment (EMI):</label>
            </div>
            <div class="col-xs-30"> <input disabled="disabled" id="emi" class="text form-control" type="text" />
            </div>
            <div class="clear"></div>
            <div class="col-xs-12 form-group">
                <label class="name"  style="line-height: 13px;">Total Interest Amount:</label>
            </div>
            <div class="col-xs-30"> <input disabled="disabled"  id="interest" class="text form-control" type="text" />
            </div>
            <div class="clear"></div>
            <div class="col-xs-12 form-group">
                <label class="name"  style="line-height: 13px;">Total Amount (Principal + Interest):</label>
            </div>
            <div class="col-xs-30"> <input disabled="disabled"  id="totamo" class="text form-control" type="text" />
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="col-xs-50">
        <div class="page1_block1">
            <?PHP 
                $this->db->where('loc', 42);
                $this->db->order_by('loc', 'ASC');
                    $add = $this->db->get('add')->result();
                    if(isset($add[0]->img_path1)){
                        ?>
                <a href="<?=$add[0]->link;?>"><img src="<?= IMAGES_PATH . "advertisement/" . $add[0]->img_path1; ?>" class="col-xs-48 col-xs-offset-1"/></a>
                    <?php }?>
        </div>
    </div>
</div>