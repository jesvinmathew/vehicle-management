<?PHP
$data = array();
    foreach ($qry as $res) {
            if(!isset($data[$res->spec_id][0])){
                $data[$res->spec_id][0]=$res->specification;
            }
            $data[$res->spec_id][$res->verient_id] = $res->value;
        }
        $hilight=  array();
        $hilight['price'][0]="Ex-showroom Price (Kerala)";
        $hilight['milage'][0]="Milage";
        $hilight['cc'][0]="Cubic capacity";
        $hilight['seating'][0]="Seating capacity";
        foreach ($query as $res)
        {
            $hilight['price'][$res->varient_id]=$res->price_text;
            $hilight['milage'][$res->varient_id]=$res->milage;
            $hilight['cc'][$res->varient_id]=$res->cubicc;
            $hilight['seating'][$res->varient_id]=$res->seatingc;
        }
        ?>
        <table  class="table  table-condensed table-hover table-bordered">
            <tr style=" background-color:#e76026; color:#fff; ">
                <td></td>';
                <?PHP
         if(!empty($_POST['name1']))  {     
          echo'<td>'.$this->input->post('name1').'</td>';
          }
           if(!empty($_POST['name2'])) {     
           echo'<td>'.$this->input->post('name2').'</td>';
          }
           if(!empty($_POST['name3'])){     
          echo'<td>'.$this->input->post('name3').'</td>';
          }
           if(!empty($_POST['name4'])) {     
           echo'<td>'.$this->input->post('name4').'</td>';
          }
          ?>
            </tr>
            <tr>
                <td style="background-color: #80DAEB; color:#fff;">Highlights</td>
            </tr>
            <?PHP
          foreach ($hilight as $key=>$val){
                
                 echo'<tr>'; 
                    echo "<td>".$hilight[$key][0]."</td>";
                    foreach ($var as $var1)
                    {
                        echo "<td>";
                         echo ($hilight[$key][$var1])!=0?$hilight[$key][$var1]:"--";
                        echo"</td>";  
                    }
                    echo'</tr>';
            }
            ?>
            <tr>
                <td style="background-color: #80DAEB; color:#fff;">Specification</td>
            </tr>
            <?PHP
        foreach ($data as $key=>$val)
        {
            echo'<tr>';
            echo "<td>".$data[$key][0]."</td>";
            foreach($var as $vari){
                echo "<td> ";
                echo isset($data[$key][$vari])?$data[$key][$vari]:"--";
                echo " </td>";
            }
            echo '</tr>';
        }
        echo'</table>';
        ?>