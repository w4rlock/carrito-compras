<?php
define('INCLUDE_CHECK',1);
session_start();
require("connect.php"); 
function msg($msg){
echo "<script languaje='javascript'> alert('$msg') </script>";
echo "<SCRIPT LANGUAGE='javascript'>  location.href = 'index.php';</SCRIPT>";
}

if(trim($_POST["Username"]) != "" && trim($_POST["Password"]) != "")
{
    $usuario = strtolower(htmlentities($_POST["Username"], ENT_QUOTES));   
    $password = $_POST["Password"];
    $result = mysql_query('SELECT password, username, userType from users u join userType t on t.iduserType = u.userType WHERE username=\''.$usuario.'\'');

  if($row = mysql_fetch_array($result)){
        if($row["password"] == md5($password)){
            if ($row["userType"] == 0){
                $_SESSION["root"] = "root";
            }
            $_SESSION["username"] = $row['username'];
            $_SESSION["url"] = "index.php";
            header ("Location: index.php");
        }
        else{ msg ('Error: Password incorrecto');}
   }
    else{ msg("Error:  Usuario incorrecto. No te Conozco!"); }
    mysql_free_result($result);
    mysql_close();
}else{ msg("Debe especificar un usuario y password");}

?>
