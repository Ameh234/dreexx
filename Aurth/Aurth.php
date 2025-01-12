<?php
require_once '../Database/reg.php';

class Aurthcontroller{
    private $db;
    private $connection;
    function __construct(){
        $this->db=new Mysqliconnector();
        $this->connection = $this->db->db_Connection();
    }
public function signup(){

$firstname=$_POST["fname"];
$lastname=$_POST["lname"];
$email=$_POST["email"];
$usertype=$_POST["option"];
$password=$_POST["passcode"];
$conpassword=($_POST["conpasscode"]);
if($conpassword != $password){
    echo("Password do not match");
}
$password=password_hash($_POST["passcode"], PASSWORD_DEFAULT);

$sql = "insert into user_table(First_name, Last_name, Email, Password, user_type_id) values('".$firstname."', '".$lastname."', '".$email."', '".$password."', '".$usertype."')";
 if(mysqli_query($this->connection,$sql)){
  
    echo("new record created succesfully");

}
else{
echo("error" . mysqli_error( $this->connection));
}
mysqli_close( $this->connection);
}
}
?>