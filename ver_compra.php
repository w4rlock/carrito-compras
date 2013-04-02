<?php
define('INCLUDE_CHECK',1);
require_once ("connect.php");
session_start();
require_once ("login_form.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link title="new" rel="stylesheet" href="CSS/gentoo.css" type="text/css">    
<link type="text/css" rel="stylesheet" href="CSS/panel.css"/>
<link rel="stylesheet" type="text/css" href="CSS/shopping.css"/>
<link type="text/css" rel="stylesheet" href="CSS/login.css">
<link type="text/css" rel="stylesheet" href="CSS/alpha.css"/>
<link href="CSS/msg.css" rel="stylesheet" type="text/css" media="screen" />       <!-- para mensajes de avisos -->


<link href="front.css" media="screen, projection" rel="stylesheet" type="text/css">
<link href="img/icon_page.gif" rel="icon" /> 

<script type="text/javascript" src="jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="jquery/jquery.simpletip-1.3.1.pack.js"></script>

<script type="text/javascript" src="javaScript/validar_producto.js"/></script> <!-- validar solo numeros -->
<script type="text/javascript" src="javaScript/twitter.js"></script>      <!-- w4rlock para el login de twitter ;) -->
<script type="text/javascript" src="javaScript/jquery.tipsy.js"></script>

<script type="text/javascript" src="Jquery/jquery.min.js"></script>       <!-- para la galeria de imagenes y mensajes de avisos-->
<script src="Jquery/msg.js" type="text/javascript"></script>
<script type="text/javascript">
function deleteProducto(id) {
    if (confirm('Desea eliminar el Producto ?')) {
        location.href = 'ver_compra.php?del='+id;
    }
}
function validarCompra() {
    if (document.frm1.domicilio.value == " " || document.frm1.domicilio.value.length == 0){
        alert("Ingrese su domicilio");
        document.frm1.domicilio.focus();
        return false;}
return true;
    }
$(document).ready( function() {
$("#alert_button").click( function() {
jAlert('Para realizar la operacion debes iniciar sesion.', 'Informacion');
});
$("#confirm_button,#d2").click( function() {
jConfirm('Desea quitar el producto ?', 'Diálogo Confirmación', function(r) {
if (r){ location.href = 'ver_producto.php?quitar='+$("#productID").val(); }
});
});
                
$("#prompt_button").click( function() {
jPrompt('Escriba algo:', 'Valor cargado', 'Diálogo Prompt', function(r) {
if( r ) alert('Ha introducido ' + r);
});
});
                
$("#alert_button_with_html").click( function() {
jAlert('Puedes usar HTML, como <strong> negrita </ strong>, <em> cursiva </ em>, y <u> subrayado </u>!');
});
                
$(".alert_style_example").click( function() {
$.alerts.dialogClass = $(this).attr('id'); // set custom style class
jAlert('Esta es la clase personalizada llamada &ldquo;style_1"&rdquo;', 'Styles Personalizado', function() {
$.alerts.dialogClass = null; // reset to default
});
                    
});
});
</script>

<title>w4rl0ck - Home</title>
</head>
<!--======================================================================================================BODY===============================================-->
<body style="margin:0px 30px 5px 25px;">
<?php require_once ("menu.php"); ?>
<td style="background: url(img/phones2.jpg) repeat-y;background-attachment: fixed;" valign="top">
<div class="news" style="background-color: transparent;">
<div id="column-1" class="container">
<div class="overlay" style="valign: top;margin-top:7px;"></div>
<div style="valign: top;position:relative;padding-left:20px;margin-top:20px; margin-bottom:30px;">
<div style="position:relative; padding: 0px 30px 20tpx 0px; margin: 30px">
<?php
require_once('producto.php');
require_once('cart.php');
$producto = new product();
$name  = $_SESSION['username'];
$carro = new cart($name);
if ((isset($_GET['del']))&&(isset($_SESSION['username']))&&(!isset($_SESSION['root']))) {
    $name  = $_SESSION['username'];
    $carro = new cart($name);
    $carro->delProduct($_GET['del']);
}
if(isset($_POST['actualizar'])){
    foreach ($_SESSION[md5($name)] as $key => $val){ 
        $prod = $_SESSION[md5($name)][$key];
        $prod['Cant'] = $_POST['product_'.$key];
        if ($prod['Cant'] > 0){
            if ($prod['Cant'] <= $prod['Stock']) {
                $_SESSION[md5($name)][$key] = $prod;
            }
            else{
                echo '<script type="text/javaScript">alert("La cantidad del producto '.$prod['Prod'].' no puede ser mayor que '.$prod['Stock'].'");</script>';
            }
}
}}
elseif (isset($_POST['domicilio'])){
    $id = $carro->getClientId($name);
    $data = array('id' => $id, 'dom' => $_POST['domicilio'], 'tipoPago' => $_POST['pago'], 'dom' => $_POST['domicilio']);
    $data = $producto->limpiarQuery($data);
    $carro->addCompra($data);    
}
if (isset($_SESSION['username'])){ ?>
    <form action="ver_compra.php" method="post" onsubmit="return validar(this);">
    <table border=1 bordercolor="violet" style="width:100%;text-align:center;color:#FFFFFF">
    <tr style="background-color:#AC58FA"><td width="50"> <h3>Img</h3></td>
        <td width="220"><h3>Producto</h3></td>
        <td width="220"><h3>Cantidad</h3></td>
        <td width="220"><h3>Precio</h3></td>
    </tr>
<?php
    $total = 0;
    $cant  = 0;
    foreach ($_SESSION[md5($name)] as $key => $val){ $cant += $val['Cant']; $total += (int)$val['Cant'] * (int)$val['Price'];?>
            <tr>
                <td width=50><img src="<?php echo $val['Img']?>" width="40" height="40" class="pngfix" /></td>
                <td width=220><a href="ver_producto.php?id=<?php echo $key;?>"><?php echo $val['Prod'];?></a></td>
                <td width=220><input type="text"  onkeypress="return validarNum(event)" name="product_<?php echo $key;?>" value="<?php echo $val['Cant'];?>" size="5"></td>
                <td width=220>$ <?php echo $val['Price'].' x '. $val['Cant'];?></td>
            </tr>
<?php } ?>
<tr>
    <td colspan=4 height="20"/>
</tr>
<tr>
    <input type="hidden" name="actualizar" value="actualizar">
    <td colspan=4 height=27 style="background-color:#AC58FA;text-align:right"><input style="height:25;margin-right:25px;" type="submit" value="Actualizar"></td>
</tr>
</table>
</form>
<form name="frm1" action="ver_compra.php" method="post" onsubmit="return validarCompra(this);">

    <br/>
    <br/>
    <table style="width:100%;text-align:center;color:#FFFFFF">
    <tr style="background-color:#AC58FA">
        <td width="220"><h3>Cant. Productos</h3></td>
        <td width="220"><h3>Precio Total</h3></td>
    </tr>
    <tr>
        <td width="220"><?php echo $cant; ?></td>
        <td width="220">$ <?php echo $total; ?></td>
    <tr>
    </table>
        <br/>
    <br/>
    <table style="width:100%;text-align:center;color:#FFFFFF">
    <tr style="background-color:#AC58FA">
        <td colspan="2" width="220"><h3>Finalizar Compra</h3></td>
    </tr>
    <tr>
        <td width="120">Pago</td>
        <td width="220">
        <select name="pago" style="width:320px">
        <?php
            $name = $_SESSION['username'];
            $carro = new cart($name);
            $result = $carro->getTipoPago();
            while($row = mysql_fetch_assoc($result)){ ?> 
                <option value="<?php echo $row['idtipoPago'];?>"><?php echo $row['descripcion'];?></option>
            <?php }?>
        </select>
        
        </td>
    </tr>
    <tr>
        <td width="120">Domicilio</td>
        <td width="220"><input name="domicilio" type="text" size="37"/></td>
    </tr>
    <tr><td colspan="2" style="text-align:right"><input type="submit" value="Guardar"/></td></tr>

    </table>
</form>
</form>


</div> </div>
</div>
<?php } else{ echo "<div style='color:red; text-align:center'><h3>La pagina solicitada no esta disponible.</h3></div>"; }
require "ofertas.php";?>
