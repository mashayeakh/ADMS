<?php
include ("../Model/DB.php");


$errUser =$errPass= "";
$err=false;

if (isset($_POST["submit"])) {
    $username=$_REQUEST["username"];
    $password=$_REQUEST["password"];

    if($username ==""){
        $errUser="Username must enter";
        $err=true;
    }
    else {
        $errUser="";
        $err=false;
    }


    if($password=="" || strlen($password)<5){
        $errPass="Password Must contains 5 character";
        $err=true;
    }
    else{
        $errPass="";
        $err=false;
    }

    if($err==false){
        $connection=new DatabaseConnection();
        $conobj=$connection->OpenCon();
        $result=$connection->AdminLogin($conobj,$username,$password);
        // $num_row = oci_num_rows($result);
        // $row = oci_fetch_all($result, $both);
        $row = oci_fetch_all($result, $both);
        if ($row)
        {
           $_SESSION['Username']= "";
           header("location: ../View/Home.php");
        }
    }

}

?>