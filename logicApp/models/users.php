<?php

class Users extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->HIGH_SECURITY_STRING =
            "ZPbpRQvV4riylfQVAUqLupMJ7y24FC0570PCDKtR43A4Y3aD3i6F0X1Ki8LxAsq84z7IM13U50Qe8sEoLNz6TLbzY1Dm6o4g";
    }
    public function make_password($password = null)
    {
        unset($this->enc_password);
        if ($password != null)
        {
            $this->enc_password = hash('sha512', $this->HIGH_SECURITY_STRING . ($password));
        }
    }
    public function make_email_conf_key($username = null)
    {
        unset($this->confirmkey);
        if ($username != null)
        {
            $random = rand();
            $this->confirmkey = hash('sha512', $random . $username . $this->HIGH_SECURITY_STRING);
        }
    }

    /***
    public function sendmail($username,$key)
    {
    $this->load->library('email');
    $mail = $username;
    $subject= "Confirm mail";
    $message = $key;
    $to="justnshalom@gmail.com";
    $subject=$subject;
    $headers="none";
    mail($to, $subject, $message, $headers);
    }
    ***/
    
    public function make_session_key()
    {
        $this->session_key_generated = hash('sha512',$this->HIGH_SECURITY_STRING.mt_rand().date("Y-m-d H:i:s"));
    } 
    
    
}