<?php
//error_reporting(0);
require('connect.php');
date_default_timezone_set("Asia/Kolkata");
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['message'];
echo $address;
class contact{
    public $email;
    public $name;
    public $address;
    public $con;
    public function __construct($name,$email,$address,$con)
    {
        $this->email = $email;
        $this->name = $name;
        $this->address = $address;
        $this->con = $con;
    }
    
    public function save(){

            $res1= mysqli_query($this->con,"INSERT INTO contactus (name,email,message) VALUES('".$this->name."','".$this->email."','".$this->address."')");
            if($res1){
                echo "<script>alert('We will Soon Contact You!');window.location='contact';</script>";
            }else{
                echo "<script>alert('Error Occured! Try after some Time!');window.location='contact';</script>";
   
            }
    }
    
       
}
$newcontact = new contact($name,$email,$address,$con);
$newcontact->save();
?>