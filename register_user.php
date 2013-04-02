<?php
define('INCLUDE_CHECK',1);
require "connect.php";
session_start();
?>
<!-- ====================================================================================================================================================-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link title="new" rel="stylesheet" href="CSS/gentoo.css" type="text/css">    
<link type="text/css" rel="stylesheet" href="CSS/panel.css"/>
<link rel="stylesheet" type="text/css" href="CSS/shopping.css"/>
<link type="text/css" rel="stylesheet" href="CSS/login.css"/>
<link type="text/css" rel="stylesheet" href="CSS/alpha.css"/>
<link type="text/css" rel="stylesheet" href="CSS/master.css"/>

<script type="text/javascript" src="Jquery/jquery.min.js"></script>
<script type="text/javascript" src="Jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="Jquery/jquery.simpletip-1.3.1.pack.js"></script>
<script type="text/javascript" src="javaScript/validar_form.js"></script>
<title>w4rl0ck - Home</title>
</head>

<body style="margin:0px 15px 5px 15px;">
<!-- ====================================================================================================================================================-->
<?php require("menu.php");?>
<!-- ========================================================================================================================================-->

<div class="news">
<td style="valign:top;margin-top:10px;  background: url(img/phones2.jpg) repeat-y;background-attachment: fixed;">
<div class="news" style="background-color: transparent;">
<div id="column-1" class="container">
<div class="overlay" style="margin-top:7px"></div>
<div style="position:relative; color:#FFFFFF; margin: 20px 50px 20px 20px">

<?php 
$error;
function formRegistro($usr,$mail,$dom,$dni,$err){
$error=$err;
?>
<div style="border: 2px solid #666699;  padding: 30px 135px 20px 12px" >  
<?php if (!empty($error)){echo  $error;}?>       
<form style="margin:10px;padding:10px;" action="register_user.php" name="frm1" onsubmit="return validar(this);" method="post">
<table style="width: 100%; border-collapse: collapse;"> 
<tr><td style="width: 190px"><h3>Usuario:</h3></td>
    <td><input type="text" name="username" value="<?php echo $usr;?>" onkeypress="return validarLetras(event)" size="30" maxlength="35" /></td>
</tr><tr/>
<tr><td><h3>Password:</h3></td>
    <td><input type="password" name="password" size="30" maxlength="35" /></td>
</tr>
<tr><td><h3>Confirmar:</h3></td>
    <td><input type="password" name="password2" size="30" maxlength="35" /></td>
</tr>
<tr><td><h3>Domicilio:</h3></td>
    <td><input type="text" name="domicilio" value="<?php echo $dom;?>" size="30" maxlength="45" /></td>
</tr>
<tr><td><h3>DNI:</h3></td>
    <td><input type="text" name="dni" value="<?php echo $dni;?>" size="30" onkeypress="return validarDNI(event)" maxlength="10" /><br/></br></td>
</tr>
<tr><td><h3>Email:</h3></td>
    <td><input type="text" name="email" size="30" value="<?php echo $mail;?>" maxlength="35" /><br /></td>
</tr>
<tr><td> </td>
    <td style="padding-top:5px;">
    <img src="captcha.php" width="100" height="30">
    </td>
</tr>
<tr><td></td>
    <td>
    <input style="width:90px; height:12px; text-transform:none;"type="text" name="captcha" size="30" value="" maxlength="35" /></td>
    </td>
</tr>

<tr><td/>
    <td style="text-align:center;"><input style="width:75px" type="submit" value="Registrar" /></td>
</tr>
</table>
</form>
<?php
}
$username;
$email;
function quitar($mensaje)
{
$mensaje = str_replace("<","&lt;",$mensaje);
$mensaje = str_replace(">","&gt;",$mensaje);
$mensaje = str_replace("\'","'",$mensaje);
$mensaje = str_replace('\"',"&quot;",$mensaje);
$mensaje = str_replace("\\\\","\\",$mensaje);
return $mensaje;
} 
if (isset($_POST["username"])) {
        $username = strtolower($_POST["username"]);
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        $email = strtolower($_POST["email"]);
        $dni = $_POST['dni'];
        $dom = strtolower($_POST['domicilio']);

     if (md5($_POST['captcha']) == md5($_SESSION['captcha'])){
              $checkuser = mysql_query("SELECT username FROM users WHERE username='$username'");
        $username_exist = mysql_num_rows($checkuser);
        if ($username_exist>0){
            $error="<div style='color:red; text-align:center'><h3>Nombre de Usuario no disponible.</h3></div>";
            formRegistro($username,$email,$dom,$dni,$error);
            echo "<SCRIPT LANGUAGE='javascript'>document.frm1.username.focus();</script>";
        }
        else{       
            $checkemail = mysql_query("SELECT mail FROM cliente WHERE mail='$email'");
            $email_exist = mysql_num_rows($checkemail);
   
            if ($email_exist>0) {
                $error="<div style='color:red; text-align:center'><h3>Email no disponible.</h3></div>";
                formRegistro($username,$email,$dom,$dni,$error);
                echo "<SCRIPT LANGUAGE='javascript'>document.frm1.email.focus();</script>";
            }
            else{
                $sql = "INSERT INTO users (username, password,fecha, userType) VALUES (";
                $sql .= "'".quitar($username)."'";
                $sql .= ",'".md5(quitar($password))."'";
                $sql .= ",'".date('Y-m-d')."'";
                $sql .= ",".'1';
                $sql .= ")";
               
                mysql_query($sql) or die(mysql_error());
                $sql = "INSERT INTO cliente (idusuario, nombre, dni, domicilio, mail) VALUES ((SELECT MAX(idusers) from users),";
                $sql .= "'".quitar($username)."'";
                $sql .= ",'".quitar($dni)."'";
                $sql .= ",'".quitar($dom)."'";
                $sql .= ",'".quitar($email)."'";
                $sql .= ")";
                mysql_query($sql) or die(mysql_error());
                header("location.href = 'index.php'");
            }
         }
    }
    else{
        $error = "<div style='color:red; text-align:center'><h3>Error codigo incorrecto.</h3></div>";
        formRegistro($username,$email,$dom,$dni,$error); 
    }
    }
    else{formRegistro(); }

?>
</div>
</div>
</div></div>


<?php require "ofertas.php";?>
