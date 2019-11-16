<?php

class Convert extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function religion_id_to_text($rid)
    {
        $X = $this->db->query("SELECT religion FROM global_religion WHERE id = $rid");
        foreach($X->result() as $Y)
        {
            return ucfirst(strtolower($Y->religion));
        }
    }
    public function cast_id_to_text($rid)
    {
        $X = $this->db->query("SELECT cast_name FROM global_cast WHERE id = $rid");
        foreach($X->result() as $Y)
        {
            return ucfirst(strtolower($Y->cast_name));
        }
    }
    public function language_id_to_text($rid)
    {
        $X = $this->db->query("SELECT language FROM global_lang WHERE id = $rid");
        foreach($X->result() as $Y)
        {
            return ucfirst(strtolower($Y->language));
        }
    }
    
    public function country_id_to_text($rid)
    {
        $X = $this->db->query("SELECT name FROM countries WHERE alpha_2 = '$rid'");
        foreach($X->result() as $Y)
        {
            return ucfirst(strtolower($Y->name));
        }
    }
    
    
    public function state_id_to_text($rid)
    {
        $X = $this->db->query("SELECT state FROM global_state WHERE id = $rid");
        foreach($X->result() as $Y)
        {
            return ucfirst(strtolower($Y->state));
        }
    }
    
    public function work_stream_id_to_text($rid)
    {
       
        $X = $this->db->query("SELECT work_with FROM global_work_with WHERE id = $rid");
        $this->db->last_query();
        foreach($X->result() as $Y)
        {
            return ucfirst(strtolower($Y->work_with));
        }
    }
    public function industry_id_to_text($rid)
    {
        $X = $this->db->query("SELECT industry FROM global_industry WHERE id = $rid");
        foreach($X->result() as $Y)
        {
            return ucfirst(($Y->industry));
        }
    }
    public function education_id_to_text($rid)
    {
        $X = $this->db->query("SELECT qualification FROM global_education WHERE id = $rid");
        foreach($X->result() as $Y)
        {
            return ucfirst(($Y->qualification));
        }
    }
    
    public function profilefor_id_to_text($rid)
    {
        $X = $this->db->query("SELECT submited_by FROM global_submited_by WHERE id = $rid");
        foreach($X->result() as $Y)
        {
            return ucfirst(($Y->submited_by));
        }
    }
    
    public function smoking_id_to_text($rid)
    {
        $X = $this->db->query("SELECT smoking FROM global_smoking WHERE id = $rid");
        foreach($X->result() as $Y)
        {
            return ucfirst(($Y->smoking));
        }
    }
    
    public function drinking_id_to_text($rid)
    {
        $X = $this->db->query("SELECT drinking FROM global_drinking WHERE id = $rid");
        foreach($X->result() as $Y)
        {
            return ucfirst(($Y->drinking));
        }
    }
    
    public function diet_id_to_text($rid)
    {
        $X = $this->db->query("SELECT diet FROM global_diet WHERE id = $rid");
        foreach($X->result() as $Y)
        {
            return ucfirst(($Y->diet));
        }
    }
        public function  validateDate($data)
        {
            
            if (date('Y-m-d', strtotime($data)) == $data) {
                    return true;
                } else {
                    return false;
                }
        }
        public function cm2in($cms) {
            $inches = $cms/2.54;
            $feet = intval($inches/12);
            $inches = $inches%12;
            return sprintf("%d' %d''", $feet, $inches);
        }
        
        function zodiac($DOB){ 
            $DOB = date("m-d", strtotime($DOB)); 
            list($month,$day) = explode("-",$DOB); 
            if(($month == 3 || $month == 4) && ($day > 22 || $day < 21)){ 
                $zodiac = "Aries"; 
            } 
            elseif(($month == 4 || $month == 5) && ($day > 22 || $day < 22)){ 
                $zodiac = "Taurus"; 
            } 
            elseif(($month == 5 || $month == 6) && ($day > 23 || $day < 22)){ 
                $zodiac = "Gemini"; 
            } 
            elseif(($month == 6 || $month == 7) && ($day > 23 || $day < 23)){ 
                $zodiac = "Cancer"; 
            } 
            elseif(($month == 7 || $month == 8) && ($day > 24 || $day < 22)){ 
                $zodiac = "Leo"; 
            } 
            elseif(($month == 8 || $month == 9) && ($day > 23 || $day < 24)){ 
                $zodiac = "Virgo"; 
            } 
            elseif(($month == 9 || $month == 10) && ($day > 25 || $day < 24)){ 
                $zodiac = "Libra"; 
            } 
            elseif(($month == 10 || $month == 11) && ($day > 25 || $day < 23)){ 
                $zodiac = "Scorpio"; 
            } 
            elseif(($month == 11 || $month == 12) && ($day > 24 || $day < 23)){ 
                $zodiac = "Sagittarius"; 
            } 
            elseif(($month == 12 || $month == 1) && ($day > 24 || $day < 21)){ 
                $zodiac = "Cpricorn"; 
            } 
            elseif(($month == 1 || $month == 2) && ($day > 22 || $day < 20)){ 
                $zodiac = "Aquarius"; 
            } 
            elseif(($month == 2 || $month == 3) && ($day > 21 || $day < 21)){ 
                $zodiac = "Pisces"; 
            } 
        
            return $zodiac; 
        } 
        
        
        function kg2lb($val)
        {
              return round($val * 2.20462, 0, PHP_ROUND_HALF_UP);
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    
}    