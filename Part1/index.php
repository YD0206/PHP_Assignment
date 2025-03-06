<?php

if($_SERVER["REQUEST_METHOD"]="POST"){
    $name=trim($_POST["name"]);
    $sid=trim($_POST["sid"]);
    $age=trim($_POST["age"]);
    $email=trim($_POST["email"]);
    $password=trim($_POST["password"]);

    $errors=[];

    if (empty($name)||!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $errors[]= "Incorrect name. Name should contain only letters and spaces.";
    }
    if(strlen($sid)!=8||!ctype_digit($sid)){
        $errors[]="Incorrect Student ID Format";
    }
    if($age<18||$age>60||!ctype_digit($age)){
        $errors[]= "Age should be between 18 and 60.";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[]= "Invalid email format!";
    }
    if(strlen($password)<8){
        $errors[]= "Invalid password length";
    }
}

if(count($errors)>0){
    echo"<h3>Errors:</h3>";
    foreach($errors as $error){
        echo $error."<br>";
    }
    echo "<br>";
    exit;
}

$birth_year=date("Y")-$age;
$n=substr($name,0,4);
$s=substr(strval($sid),-4);
$user_code="$n$s";

echo"<h2>Registration Successful!</h2>";
echo"<strong>Name:</strong>".$name."<br>";
echo"<strong>Student ID:</strong>".$sid."<br>";
echo"<strong>Age:</strong>".$age."<br>";
echo"<strong>Email:</strong>".$email."<br>";

echo "<strong>Your birth year is</strong>:".$birth_year."<br>";
echo"<strong>Your user code is:</strong>".$user_code;

?>