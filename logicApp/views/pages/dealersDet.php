  <div class="col-xs-48 col-xs-offset-1" id="mainbox">
         <div class="subheader">
                  <p><?php
                  if ( 	$this->found == 1 ) {
                  echo $this->dealername ;
                  }
                  else
                  {
                    echo 'Not Found';
                  }
                   ?></p>
                  </div>
                  <div class="col-xs-11 col-xs-offset-1 details bg-white ">
                 	
                  <?php
                  if ( 	$this->found == 1 ) {
                  echo '<blockquote>Branch Info</blockquote>
                  <span class="h4">'.$this->name.'</span>
                  <address><h6>Address :</h6>'.$this->address.'</address>
                  <span class="time">PH:'.$this->number.'</span>
                  <span class="number"> <br/>'.$this->number2.'</span>
                  <span class="number"><br/>Email:'.$this->email.'</span>
                  <blockquote>Dealer Info</blockquote> <span class="number"> :'.$this->dealername.'</span>
                  <span class="number"><br/> PH:'.$this->dealernumber.'</span>
                  <span class="number"><br/> Email:'.$this->dealeremail.'</span>
                  ' ;
                 
                  }
                  else
                  {
                    echo 'Not Found';
                  }
                   ?>
                  </div>
                  <div class="col-xs-36 col-xs-offset-1 bg-white">
                  <?php
                $i=1;  
               
			if (isset($this->pro[$i])) {
				
				while ($i <= $this->i) {
				
					if ($this->millage[$i] != '') {
						$mileage = " | Mileage: " + $this->millage[$i] + " Kms ";
					} else {
						$mileage = "";
					}
                    if($this->get=='viewnew')
                    {
                        
                        $url = "'".base_url()."assets/images/newvehicles/thumbs/" . $this->image[$i]. "'";
                    }
                    else
                    {
					$url = "'".base_url()."assets/uploads/thumb/" . $this->image[$i]. "'";
                    }
					echo '<div class="box col-xs-50 col-sm-50 col-md-25  ">
                    <div class="col-xs-15 thumbnail ">
                    <div style="background-image: url(' . $url .');" ></div></div>
                    <div class="col-xs-35"><ul><li><h5>' . $this->title[$i] .'</h5></li> <li>Make: ' . $this->company[$i] . ' </li>
                    <li>Year: ' . $this->year[$i] . $mileage .' | Condition: ' . $this->condition[$i] .'</li> <li>
                    <h6 class="col3"><u>Price: &#8377; ' . $this->price[$i] . '/-</u></h6></li>
                    <li><a href="#myModal" class="fullview" get="'.$this->get.'" value="' . $this->pro[$i] . '"  data-toggle="modal" data-target="#myModal" id="' . $this->pro[$i] . '" >View more</a> 
                    </li> </ul> </div> </div>';
                    	$i++;
				}
			} else {
				echo 'Ooops... No result found';
			}
                  ?>
                  </div>
                  </div>
        