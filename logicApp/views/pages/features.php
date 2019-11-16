<div class="bg1">
	<!--==============================Content=================================-->
	<div class="content">
		<div class="container">
			<div class="alert" id="alert" style="color:#000000">
			</div>
			<div class="col-xs-50 " style="">
				<form>
					<div class="col-xs-50">
						<h2 class="mb1">
							Vehicles Features
						</h2>
					</div>
					<div class="col-xs-50 col-sm-25">
                    <div class="form-group">
							<label>
								Vehicle feature
							</label>
                            <datalist id="featureparent">
                            <?php
                            $query = $this->db->get_where('feaur',array('status'=>1,'patent'=>0));
                            if( $query->num_rows()>0)
                            {
                            foreach ($query->result() as $row)
                            {
                                echo '<option>'.$row->feachur.'</option>';
                            }
                            }
                            ?>
                            </datalist>
							<input class="form-control" list="featureparent" type="text" id="vehicle_feature_parent" placeholder="Enter Your vehicle feature"/>
						</div>
						<div class="form-group">
							<label>
								Vehicle feature
							</label>
                            <datalist id="featurelist">
                            <?php
                            $query = $this->db->get_where('feaur',array('status'=>1,'patent !='=>0));
                            if( $query->num_rows()>0)
                            {
                            foreach ($query->result() as $row)
                            {
                                echo '<option>'.$row->feachur.'</option>';
                                
                            }
                            
                            }
                            ?>
                            </datalist>
							<input class="form-control" list="featurelist" type="text" id="vehicle_feature" placeholder="Enter Your vehicle feature"/>
						</div>
						<div class="form-group">
							<label>
								Description
							</label>
							<textarea placeholder="Enter Your description" class="form-control" id="description"></textarea>
						</div>
                        <div class="form-group">
                        <button type="button" class="btn btn-primary" id="addnew">Save It</button>
                        </div>
						
						
					</div>
					<div id="companyimage" class="col-xs-20" style="min-height: 200px;
					height: 100%;
					background-size: cover;
					background-position: top center;">
					</div>
					<div class="clear">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>