<?php
class datas extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data = new StdClass();
       
    }
    public function output()
    {
        if ($this->input->get('callback'))
        {
            echo $this->input->get('callback') . "(" . json_encode($this->data) . ");";
         
        } else
        {
          
            echo json_encode($this->data);
         
        }
        exit;
    }
}
