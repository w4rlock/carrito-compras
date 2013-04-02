<?php
define('INCLUDE_CHECK',1);
require "connect.php";
session_start();
require("login_form.php");
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
<link type="text/css" rel="stylesheet" href="CSS/tabs.css"/>
<link rel="stylesheet" href="CSS/lightbox.css" type="text/css" media="screen" />
<link href="CSS/msg.css" rel="stylesheet" type="text/css" media="screen" />       <!-- para mensajes de avisos -->

<link href="front.css" media="screen, projection" rel="stylesheet" type="text/css">
<link href="img/icon_page.gif" rel="icon" /> 

<script type="text/javascript" src="Jquery/jquery.min.js"></script>
<script type="text/javascript" src="Jquery/tabs.js"></script>
<script type="text/javascript" src="Jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="Jquery/jquery.simpletip-1.3.1.pack.js"></script>

<!--script type="text/javascript" src="javaScript/script.js"></script-->
<script type="text/javascript" src="javaScript/twitter.js"></script>
<script type="text/javascript" src="javaScript/jquery.tipsy.js"></script>
<script src="Jquery/msg.js" type="text/javascript"></script>
<script type="text/javascript">                                                  <!-- mensajes de avisos -->
function deleteProducto(id) {
if (confirm('Desea eliminar el Producto del Carro ?')) {
    location.href = 'index.php?del='+id;
}
}
function deleteProductoFromPage(id) {
if (confirm('Desea eliminar el Producto del sitio ?')) {
    location.href = 'index.php?del='+id;
}
}
function deleteOferta(id) {
if (confirm('Desea eliminar la Oferta ?')) {
    location.href = 'index.php?sacarOferta='+id;
}
}

</script>
<script type="text/javascript">
$(document).ready( function() {
$("#alert_button").click( function() {
jAlert('Para realizar la operacion debes iniciar sesion.', 'Informacion');
});
/*
*$("#confirm_button").click( function() {
*jConfirm('Desea quitar el producto ?', 'Diálogo Confirmación', function(r) {
*if (r){ location.href = 'ver_producto.php?quitar='+$("#productID").val(); }
*});
*});
*/
function msg() {
jConfirm('Desea quitar el producto ?', 'Diálogo Confirmación', function(r) {
if (r){ location.href = 'ver_producto.php?quitar='+$("#productID").val(); }
});
}
            
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

<body style="margin:5px 30px 5px 25px;">
<!-- ===================== LOGIN ======================================= LOGIN ================================= LOGIN ========================================-->
<?php
require("menu.php");
?>

<!-- =======================================================================================================================================================-->

<div class="news">
<td  valign="top" style="margin-top:10px;  background: url(img/phones2.jpg) repeat-y;background-attachment: fixed;">
<div class="news" style="background-color: transparent; valign=top;">
<div id="column-1" class="container" style="valign=top;">
<div class="overlay" style="valign: top;margin-top:7px;"></div>
<div style="valign: top;position:relative;padding-left:20px;margin-top:20px; margin-bottom:30px;">

<?php
require_once('producto.php');
$producto = new product();
if ((isset($_GET['del']))&&(isset($_SESSION['username']))&&(!isset($_SESSION['root']))) {
    require_once('cart.php');
    $carro = new cart($name);
    $carro->delProduct($_GET['del']);
}
if ((isset($_SESSION['root']))&&(isset($_GET['del']))){
       $producto->DeleteProduct($_GET['del']);
}
elseif ((isset($_GET['sacarOferta']))&&(isset($_SESSION['root']))){
        $producto->OfertaDel($_GET['sacarOferta']);
}
if (isset($_GET['search'])){
    $dato= mysql_real_escape_string($_GET['search']);
    $result=$producto->searchProduct($dato);
}

elseif (isset($_GET['id'])){                   //muestra un producto seleccionado por el usuario
    header("location:ver_productos?id=i".$_GET['id']);
}
 
elseif (isset($_GET['categoria'])){       // muestra los productos de una categoria
        $category = mysql_real_escape_string($_GET['categoria']);
        $result=$producto->getProductByCategory($category);
        }
    elseif (isset($_GET['manufact'])) {   // muestra los productos de una manufactura
        $manufact = mysql_real_escape_string($_GET['manufact']);
        $result=$producto->getProductByManufact($manufact);
        }
        else{ 
            $result = $producto->getProducts();}// muestra todos los productos
            if (isset($_SESSION['root'])) {
            while($row=mysql_fetch_assoc($result)){
?>
                <div id="product" style="margin-bottom: 3px;width:95%; padding:2px">
                <table>
                    <tr>
                    <td rowspan="2" valign="top">
                         <img src="img/img/products/no.png" title="eliminar producto" onclick="deleteProductoFromPage(<?php echo $row['id'];?>)"; width="15" height="15">
                    </td>
                    <td rowspan="2">
                    <a href="img/img/products/<?php echo $row['img'];?>">
                    <img src="img/img/products/<?php echo $row['img']?>" alt="<?php echo htmlspecialchars($row['name']) ?>" width="90" height="90" class="pngfix" />
                    </a> </td>
                    <td style="width:80%;text-align: left;vertical-align:top;padding-top:0px;"> <a href="ver_producto.php?id=<?php echo $row['id']; ?>"><?php echo $row['name'] ;?></a> </td>
                    <td rowspan="1" style="text-align:right;color:white;width:120px;color:#DF01D7;font-weight:bold;">$<?php echo $row['price'];?></td>
                    </tr>
                    <tr>
                    <td style="vertical-align: top;color:white; font-size:12"><?php echo $row['description_short'];?></td>
                    <td style="vertical-align: top;color:white; font-size:12; text-align:right;text-weight:bold;color:#FF0080;"><?php echo $row['quotas'];?></td>
                    </tr>
                </table>
                </div>

     <?php }} else{
       while($row=mysql_fetch_assoc($result))
       {
      ?>
                <div id="product" style="margin-bottom: 3px;width:95%; padding:5px">
                <table>
                    <tr>
                    <td rowspan="2"><a href="img/img/products/<?php echo $row['img'];?>" rel="lightbox">
                    <img src="img/img/products/<?php echo $row['img']?>" alt="<?php echo htmlspecialchars($row['name']) ?>" width="90" height="90" class="pngfix" /></a> </td>
                    <td style="width:80%;text-align: left;vertical-align:top;padding-top:0px;"> <a href="ver_producto.php?id=<?php echo $row['id']; ?>"><?php echo $row['name'] ;?></a> </td>
                    <td rowspan="1" style="text-align:right;color:white;width:120px;color:#DF01D7;font-weight:bold;">$<?php echo $row['price'];?></td>
                    </tr>
                    <tr>
                    <td style="vertical-align: top;color:white; font-size:12"><?php echo $row['description_short'];?></td>
                    <td style="vertical-align: top;color:white; font-size:12; text-align:right;text-weight:bold;color:#FF0080;"><?php echo $row['quotas'];?></td>
                    </tr>
                </table>
                </div>
 <?php }}  ?>
                </div>
</div>
</div> </div>
</div>

<?php require "ofertas.php";?>
