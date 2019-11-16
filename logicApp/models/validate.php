<?php class validate extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->key =
            "kdsksddksdksdiiiueewiuidsssdsdy667sdskddndjdidsksdsd";
    }
    public function password_enc($password = null)
    {
        unset($this->enc_password);
        if ($password != null)
        {
            $this->passwords = hash('sha512', $this->key . ($password));
        }
    }
    
    public function success($title)
    {
        $this->datas->data->error = false;
        $this->datas->data->message = '' . $title . ' is ok';
    }
    public function match_or_not($value1, $value2, $title)
    {
        if ($value1 != $value2)
        {
            $this->datas->data->error = true;
            $this->datas->data->message = '' . $title . ' do not match';
            $this->datas->output();
        }
    }
    public function same_value($value1, $value2, $title1, $title2)
    {
        if ($value1 == $value2)
        {
            $this->datas->data->error = true;
            $this->datas->data->message = '' . $title1 . 'and' . $title2 . ' are same';
            $this->datas->output();
        }
    }
    public function none($value, $title)
    {
        if ($value == '')
        {
            $this->datas->data->error = true;
            $this->datas->data->message = 'please enter ' . $title . ' (not be empty)';
            $this->datas->output();
        }
    }
    public function length($value, $min, $max, $title)
    {
        if (((strlen($value)) < $min) || ((strlen($value)) > $max))
        {
            $this->datas->data->error = true;
            $this->datas->data->message = 'please enter your ' . $title . ' with ' . $min .
                '-' . $max . ' characters';
            $this->datas->output();
        }
    }
     public function a_to_Z_num($value, $title)
    {
        if (!preg_match("/^[a-zA-Z0-9]+$/", $value))
        {
            $this->datas->data->error = true;
            $this->datas->data->message = 'please enter ' . $title .
                'use 0-9, A-Z and a-z characters';
            $this->datas->output();
        }
    }
    public function a_to_Z($value, $title)
    {
        if (!preg_match("/^[a-zA-Z]+$/", $value))
        {
            $this->datas->data->error = true;
            $this->datas->data->message = 'please enter ' . $title .
                'use A-Z and a-z characters';
            $this->datas->output();
        }
    }
    public function a_to_z_only($value, $title)
    {
        if (!preg_match("/^[a-z]+$/", $value))
        {
            $this->datas->data->error = true;
            $this->datas->data->message = 'please enter ' . $title . ' use a-z characters';
            $this->datas->output();
        }
    }
    public function numerical($value, $title)
    {
        if (!preg_match("/^[0-9]+$/", $value))
        {
            $this->datas->data->error = true;
            $this->datas->data->message = 'please enter ' . $title . ' use 0-9 numbers';
            $this->datas->output();
        }
    }
    public function A_to_Z_cap($value, $title)
    {
        if (!preg_match("/^[A-Z]+$/", $value))
        {
            $this->datas->data->error = true;
            $this->datas->data->message = 'please enter ' . $title . ' use A-Z characters';
            $this->datas->output();
        }
    }
    public function email($value, $title)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL))
        {
            if ($value == '')
            {
                $this->datas->data->error = true;
                $this->datas->data->message = 'please enter a valid ' . $title;
                $this->datas->output();
            }
        }
    }
    //validate sql
    public function already_exists($value, $table, $field, $title)
    {
        $sql = $this->db->get_where($table, array($field => $value));
        if ($sql->num_rows() > 0)
        {
            $this->datas->data->error = true;
            $this->datas->data->message = 'This ' . $title . ' is already exists';
            $this->datas->output();
        }
    }
}
