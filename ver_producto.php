<?php
define('INCLUDE_CHECK',1);
define('UPLOADDIR','/srv/http/GentooPage/img/img/products/');
require_once ("connect.php");
session_start();
require_once ("login_form.php");
/*
 *if ((!isset($_GET['id']))&&(!isset($_POST['id']))) {
 *    header("location:index.php");
 *}
 */
?>
<!-- ====================================================================================================================================================-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link title="new" rel="stylesheet" href="CSS/gentoo.css" type="text/css">    
<link type="text/css" rel="stylesheet" href="CSS/panel.css"/>
<link rel="stylesheet" type="text/css" href="CSS/shopping.css"/>
<link type="text/css" rel="stylesheet" href="CSS/login.css">
<link type="text/css" rel="stylesheet" href="CSS/alpha.css"/>
<link type="text/css" rel="stylesheet" href="CSS/tabs.css"/>
<link rel="stylesheet" href="CSS/lightbox.css" type="text/css" media="screen" />  <!-- para la galeria de imagenes -->
<link rel="stylesheet" href="CSS/lightbox2.css" type="text/css" media="screen" /> <!-- para la galeria de imagenes -->
<link href="CSS/msg.css" rel="stylesheet" type="text/css" media="screen" />       <!-- para mensajes de avisos -->


<link href="front.css" media="screen, projection" rel="stylesheet" type="text/css">
<link href="img/icon_page.gif" rel="icon" /> 

<script type="text/javascript" src="jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="jquery/jquery.simpletip-1.3.1.pack.js"></script>

<!--script type="text/javascript" src="javaScript/script.js"></script-->
<script type="text/javascript" src="javaScript/twitter.js"></script>      <!-- w4rlockpara el login de twitter ;) -->
<script type="text/javascript" src="javaScript/jquery.tipsy.js"></script>
<script type="text/javascript" src="javaScript/validar_producto.js"/></script>

<script type="text/javascript" src="Jquery/jquery.min.js"></script>       <!-- para la galeria de imagenes y mensajes de avisos-->
<script type="text/javascript" src="Jquery/lightbox.js"></script>         <!-- para la galeria de imagenes -->
<script type="text/javascript" src="javaScript/lightbox.js"></script>     <!-- para la galeria de imagenes -->
<script type="text/javascript" src="Jquery/tabs.js"></script>             <!-- para los tabs del producto -->
<script src="Jquery/msg.js" type="text/javascript"></script>
<script type="text/javascript">
function deleteProducto(id) {
    if (confirm('Desea eliminar el Producto del Carro ?')) {
        location.href = 'ver_producto.php?del='+id;
    }
}
function deleteOferta(id) {
    if (confirm('Desea eliminar la Oferta ?')) {
        location.href = 'ver_producto.php?sacarOferta='+id;
    }
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
<body style="margin:5px 30px 5px 25px;">
<?php require_once ("menu.php"); ?>
<div class="news">
<td style="margin-top:10px;  background: url(img/phones2.jpg) repeat-y;background-attachment: fixed;" valign="top">
<div class="news" style="background-color: transparent;">
<div id="column-1" class="container">
<div class="overlay" style="vertical-align: top;margin-top:7px;"></div>
<div style="vertical-align: top;position:relative;padding-left:20px;margin-top:20px; margin-bottom:30px;">
<?php if (isset($_SESSION['root'])){?>
<script type="text/javascript">
function refreshImg(){
    /*
     *document.frm1..src = 'file:///'+ document.form1.imageField.value;
     */
return 0;
}
function ver(){
alert(document.getElementById("upload3").value);

}
function addRow()
{
var indiceFila=1;
cantidad = document.getElementById("tab2").getElementsByTagName("input").length;
cantidad += 1;
myNewRow = document.getElementById('tabla').insertRow(-1);
myNewRow.id=indiceFila;
myNewCell=myNewRow.insertCell(-1);
myNewCell.innerHTML='<td><img id="img'+cantidad+'" style="margin:5px;" src="img/img/products/no_image-100x100.jpg" alt="" height="70" width="70" /></td>';
myNewCell=myNewRow.insertCell(-1);
myNewCell.innerHTML='<td><input type="file" id="userfile" name="userfile"/></td>';
indiceFila++;
} 
function remove(t)
{
var td = t.parentNode;
var tr = td.parentNode;
var table = tr.parentNode;
table.removeChild(tr);
}
function limpiarForm(){
document.frm1.nombre.value="";
document.frm1.precio.value="";
document.frm1.promocion.value="";
document.frm1.modelo.value="";
document.frm1.stock.value="";
document.frm1.descripcion.value="";
document.frm1.descripcion_short.value="";
document.frm1.PonerOferta.checked=false;
document.getElementById("pic").style.backgroundImage = "url('img/img/products/no_image-100x100.jpg')";
tabla   = document.getElementById("tabla");
/*
 *var node= document.getElementById("subila");
 */
while(tabla.hasChildNodes()){
    tabla.removeChild(tabla.firstChild);}
/*
 *var newNode = node.cloneNode(true);
 *tabla.appendChild(newNode);
 */
camb = document.getElementById("img1");
if (camb!=null){ camb.src = 'img/img/products/no_image-100x100.jpg'; }
document.frm1.cuotas.value = "";
document.frm1.submit.value = "insertar";
document.frm1.id.value = "-1"; //para saber si actualiza o inserta;
document.getElementById("producto").innerHTML = "<h3> Nuevo Producto </h3>";
document.frm1.nombre.focus();
return 0;
}            
</script>
<?php }?>

<div style="position:relative; padding: 0px 30px 20tpx 0px; margin: 30px">
     <table style="width: 100%; border-collapse: collapse;"> 
     <tr>
<?php
require_once "producto.php";
$id = ($_GET['id']) ? $id=$_GET['id'] : $_POST['id']; 
$producto = new product();
if ((isset($_SESSION['username']))&&(!isset($_SESSION['root'])) && (isset($_POST['data']))){
    require_once('cart.php');

    $datos = explode(',', $_POST['data']);
    $name = $_SESSION['username'];
    $product = array('Prod'  => $datos[0],
                     'Price' => $datos[1],
                     'Cant'  => $_POST['cant'],
                     'Img'   => $datos[2],
                     'Stock' => $datos[3]);

   if ($product['Cant'] > $product['Stock']) {
                echo '<script type="text/javaScript">alert("La cantidad del producto '.$product['Prod'].' no puede ser mayor que '.$product['Stock'].'");</script>';
    }
    else{
        $carro = new cart($name);
        $error = $carro->addProduct($id, $product);
        if ($error != ""){
                echo '<script type="text/javaScript">alert("'.$error.'");</script>';
        }
}}
elseif ((isset($_GET['del']))&&(isset($_SESSION['username']))&&(!isset($_SESSION['root']))) {
    require_once('cart.php');
    $carro = new cart($name);
    $carro->delProduct($_GET['del']);
    $id=$_GET['del'];}

elseif ((isset($_SESSION['root']))&&(isset($_GET['sacarOferta']))){
    $producto->OfertaDel($_GET['sacarOferta']);
    $id=$_GET['sacarOferta'];}

elseif ((isset($_SESSION['root'])) && (isset($_POST['precio']))) {
    foreach ($datos as $key => $val) {
        $product[$key] = $val;
    }
    $datos = array('nombre'      => $_POST['nombre'],
                   'description' => $_POST['descripcion'],
                   'desc_short'  => $_POST['descripcion_short'],
                   'price'       => $_POST['precio'],
                   'modelo'      => strtoupper($_POST['modelo']),
                   'stock'       => $_POST['stock'],
                   'promocion'   => $_POST['promocion'],
                   'manufactura' => $_POST['manufactura'],
                   'cuotas'      => $_POST['cuotas']
               );
   $datos = $producto->limpiarQuery($datos);
   $accion = (int)$_POST['id'];
   if(!empty($_POST['eliminar'])) { //$aLista=array_keys($_POST['eliminar']);
          $grupo = $_POST['eliminar'][0];
          for ($i = 1; $i<count($_POST['eliminar']); $i++){ $grupo .= ', '.$_POST['eliminar'][$i];}
          $producto->DeleteImages($grupo);
   }
   $fileSize = $_FILES['userfile']['size'];
   $fileName = $_FILES['userfile']['name'];
   $tmpName = $_FILES['userfile']['tmp_name'];
   $fileType = $_FILES['userfile']['type'];
   $filePath = UPLOADDIR . $fileName;
            
   if ($fileSize > 0){
          $result = move_uploaded_file($tmpName, $filePath);
          if (!$result) {echo "Error al subir el archivo al Servidor."; exit;}
   }
   if ($accion == -1){
         $producto->AddProduct($datos);
         
         if ($fileSize > 0){
            $idP = (int)$producto->getMaxId();
            $producto->updatePicture($idP,$fileName);
            $producto->addPicture($fileName,$idP);
            $id = $idP;
         }
   }
   elseif ($accion > 0){
         if ((isset($_POST['fotoPerfil']))&&($_POST['fotoPerfil']!=$_POST['fotoActual'])) {
                $producto->updatePicture($id,$_POST['fotoPerfil']);
         }
         if ($fileSize >0){
            $producto->addPicture($fileName,$id);
         }
         $producto->UpdateProduct($datos,$id);
    }
    if (isset($_POST['PonerOferta']) && (!isset($_POST['id_Ofert']))) {
        $producto->OfertaAdd($id);
    }
    elseif (isset($_POST['id_Ofert'])&&(!isset($_POST['PonerOferta']))) {
        $producto->OfertaDel($_POST['id_Ofert']);
    }
}

    $row = $producto->getProduct($id);
if($_SESSION['root']){?>
    <div style="margin-bottom:20px; height:30px;background:#ac58fa; color:#FFFFFF;">
       <div id="producto" style="float:left; clear:none;padding:5px"><h3><?php echo ' '.$row['ProdName'] ;?></h3></div>
       <div style="float:right; padding:5px">
                <input type="reset" value="nuevo" onClick="limpiarForm();">
       </div>
     </div>
     <script type="text/javascript" src="crearControlesInput.js"></script>
     <table style="width: 100%; border-collapse: collapse;"> 
     <tr> 
        <td style="text-align: center; padding-top:20px;width: 220px; vertical-align: top;"> 
         <div name="dvImg" id="pic" class="pic" style="background:url('img/img/products/<?php echo $row['img'];?>') no-repeat 50% 50%;">
              <?php if (!isset($_SESSION['root'])) {?><a href="img/img/products/<?php echo $row['img'];?>" target="_black"></a><?php }?>
         </div>
        <!--img src="img/img/products/<php echo $row['img']?>" alt="<php echo htmlspecialchars($row['ProdName']) ?>" width="210" height="210" class="pngfix" /-->
        <br/>
        <!--span style="font-size: 11px;color:#FFFFFF;">Click para Cambiar</span--></td> 
 
        <td style="padding-left: 10px; width: 296px; vertical-align: top;">
        <br>
        <form name="frm1" method="post" enctype="multipart/form-data" action="ver_producto.php" onsubmit="return validar(this);">
        <table width="99%" cellspacing="10" style="color:#FFFFFF; margin-left:0px;"> 
        <tr> 
        <td><b>Nombre:</b></td> 
        <td><input id="name" type="text" name="nombre" style="text-transform:none;" value="<?php echo $row['ProdName'];?>"> </td> 
        </tr> 
        <tr> 
        <td><b>Precio:</b></td> 
        <td><input id="precio" type="text" name="precio" onkeypress="return validarNum(event)" value="<?php echo $row['price'];?>"> </td> 
            <input id="id" type="hidden" name="id" value="<?php echo $row['id'];?>">
        </tr> 
        <tr> 
        <td><b>Cuotas:</b></td> 
        <td><input type="text" name="cuotas" value="<?php echo $row['quotas'];?>"></td> 
        </tr> 
        <tr> 
        <td><b>Promocion:</b></td> 
        <td><input type="text" name="promocion" value="<?php echo $row['promocion'];?>"></td> 
        </tr> 
        <tr> 
        <td><b>Modelo:</b></td> 
        <td><input type="text" name="modelo" value="<?php echo $row['modelo'];?>">
        </td> 
        </tr> 
        <tr> 
        <td><b>Manufactura:</b></td> 
        <td>
        <select name="manufactura">
        <?php 
        $result=mysql_query("select idmanufactura AS id, name from manufactura");
        while($r=mysql_fetch_assoc($result)){
        if ($r['name']==$row['ManufactName']){
        ?>
            <option value="<?php echo $r['id']; ?>" SELECTED>
        <?php } else{?>
            <option value="<?php echo $r['id']; ?>">
        <?php } echo $r['name']; ?>
        </option>
        <?php }?>
        </a></td> 
        </tr> 
        <tr> 
        <td><b>Stock:</b></td> 
        <td><input type="text" name="stock"  onkeypress="return validarNum(event)" value="<?php echo $row['stock'];?>"></td> 
        </tr> <tr>
        <td/>
        <td>
            <input type="checkbox" name="PonerOferta" <?php if (isset($row['id_producto'])) echo "checked";?>/><span style="font-size:12px">Poner en Oferta.</span></td>
            <?php if (isset($row['id_producto'])){?> 
            <input id="id_Ofert" type="hidden" name="id_Ofert" value="<?php echo $row['id_producto'];?>">
            <?php }?>
        <tr>
        <td/><td><input name="submit" type="SUBMIT" style="width:70px; height:25px;" value="Actualizar"/></td></tr>
        </table> 
                    </td> 
                    </tr> 
                    </table>
                    <ul class="tabs">
                    <li><a href="#tab1">Descripcion</a></li>
                    <li><a href="#tab2">Imagenes</a></li>
                    </ul>
  <div class="tab_container">
          <div id="tab1" class="tab_content">
          <span>Descripcion Corta.</span><br/>
          <textarea rows="3" name="descripcion_short" cols="110"> <?php echo $row['description_short']?></textarea>
           <br/>
           <br/>
          <span>Descripcion Larga.</span><br/>
          <textarea rows="7" name="descripcion" cols="110"> <?php echo $row['description']?></textarea>
          </div> 

          <div id="tab2"class="tab_content">
            <table id="tabla">
                <!--form method="post" enctype="multipart/form-data" action="uploadser.php"-->
          <?php 
               $result=mysql_query("select p.picture, id_Pictures, img from internet_shop i join pictures p on i.id = p.id_Producto where i.id=".$id);
               $i=0;
               $numRows = mysql_num_rows($result);
               $row;
               while($row=mysql_fetch_assoc($result)){$i++;
               ?>
          <tr><td rowspan="2"> <img  style="margin:5px;" id="img<?php echo $i;?>" src="img/img/products/<?php echo $row['picture']?>" alt="" height="70" width="70" /></td>
              <td>
                   <?php if  ($row['img'] != $row['picture']){?>
                   <input id="eliminar" type="checkbox" name="eliminar[]" value="<?php echo $row['id_Pictures'];?>"><!--a href="#" onclick="remove(this)">Eliminar</a-->
                    <a href="#">Eliminar</a>
                    <?php }?>
             </td>
          </tr>
          <tr>
             <td> <?php if  ($row['img'] == $row['picture']){?>
                 <input type="radio" name="fotoPerfil" value="<?php echo $row['picture'];?>" checked>De Perfil
                 <input type="hidden" name="fotoActual" value="<?php echo $row['img'];?>">
                 <?php } else {?>
                 <input type="radio" name="fotoPerfil" value="<?php echo $row['picture'];?>">De Perfil
                 <?php }?>                
             </td>
         </tr>
          <?php }?>
          </table>
          <table>
          <tr id="subila">
                <td><img id="img" style="margin:5px;" src="img/img/products/no_image-100x100.jpg" alt="" height="70" width="70" /></td>
                <td><input type="file" id="userfile" name="userfile"/></td>
                 <input type="hidden" name="fotoActual" value="<?php echo $row['img'];?>">
          </tr>
          </table>
        <!--table>
          <tr><td width="70"></td>
              <td width="190" style="text-align:center">
                <a href="#" onClick="addRow()"><b>Subir mas...</b></a>
              </td>
          </tr>
        </table-->

        </div>
  </div> 
</form>
</div>

<?php } 
 else{ ?>

 <!--div style="color:#FFFFFF;"><h3> ?php echo $row['ProdName'] ;?></h3><br/></div-->
    <div style="border: 2px margin-bottom:20px;solid #AC58FA; background-color:#AC58FA; color:#FFFFFF;text-align:left;"><h3><?php echo ' '.$row['ProdName'] ;?></h3></div>
        <td style="text-align: center; padding-top:20px;width: 220px; vertical-align: top;"> 
         <div id="pic" class="pic" style="float: none; background:url('img/img/products/<?php echo $row['img'];?>') no-repeat 50% 50%;">
              <a href="img/img/products/<?php echo $row['img'];?>" target="_black"></a>
         </div>
        <!--a href="img/img/products/<hp echo $row['img']?>" rel="lightbox">
        <img src="img/img/products/<ph echo $row['img']?>" alt="<php echo htmlspecialchars($row['ProdName']) ?>" width="210" height="190" class="pngfix" />
        </a-->
        <br/>
        <span style="font-size: 11px;color:#FFFFFF;">Click para Agrandar</span></td> 
        <td style="padding-left: 15px; width: 296px; vertical-align: top;">
        <br>
        <table width="99%" style="color:#FFFFFF; margin-left:40px;"> 
        <tr> 
        <td><b>Precio:</b></td> 
        <td>$ <?php echo $row['price'];?> </td> 
        </tr> 
        <tr> 
        <td><b>Promocion:</b></td> 
        <td><?php echo $row['promocion'];?></td> 
        </tr> 
        <tr> 
        <td><b>Cuotas:</b></td> 
        <td><?php echo $row['quotas'];?></td> 
        </tr> 
        <tr> 
        <td><b>Modelo:</b></td> 
        <td><?php echo $row['modelo']?></td> 
        </tr> 
        <tr> 
        <td><b>Manufactura:</b></td> 
        <td><a href="index.php?manufact=<?php echo $row['ManufactName'];?>"><?php echo $row['ManufactName'];?></a></td> 
        </tr> 
        <tr> 
        <td><b>Stock:</b></td> 
        <td><?php echo $row['stock'];?></td> 
        </tr> 
        </table> 
        <form action="ver_producto.php" method="post" encytype="multipart/form-data"> 
              <div style="background: #FFFFCC;border: 1px solid #FFCC33;margin-left:40px; padding: 10px; margin-top: 20px; margin-bottom: 15px;"> 
              <table style="width: 100%; border-collapse: collapse;"> 
              <tr><td> Cant: <input type="text" name="cant" maxlength="3" size="3" value="1" onkeypress="return validarNum(event)"/> </td>
                      <td><?php if (isset($_SESSION['username'])){ ?> <input type="image" src="img/img/target-add.gif" style="padding-left:0px" height="20" width="100"/> </td></tr>
                           <?php }else{ ?>

                      <img src="img/img/target-add.gif" id="alert_button" style="padding-left:0px" height="23" width="100"/> </td></tr>
                            <?php }?>
                    </table> </div> 
                          <input type="hidden" name="data" value="<?php echo $row['ProdName'] . ',' . $row['price'] .','.'img/img/products/'.$row['img'] . ','.$row['stock'];?>" /> 
                          <input type="hidden" name="id" value="<?php echo $row['id'];?>" /> 
                          <input type="hidden" name="redirect" value="" />                
                    </div> 
                    </form> 
                    </td> 
                    </tr> 
                    </table>
                    <ul class="tabs">
                    <li><a href="#tab1">Descripcion</a></li>
                    <li><a href="#tab2">Imagenes</a></li>
                    </ul>
  <div class="tab_container">
          <div id="tab1" class="tab_content">
          <span style="font-size:15;"><?php echo $row['description'];?></span>
          </div> 
          <div id="tab2" class="tab_content">

          <div id="gallery">
          <?php 
               $result=mysql_query("select p.picture from internet_shop i join pictures p on i.id = p.id_Producto where i.id=".$_GET['id']);
               while($row=mysql_fetch_assoc($result)){
               ?>
          <div id="pic" class="pic" style="background:url('img/img/products/<?php echo $row['picture'];?>') no-repeat 50% 50%; center">
              <a href="img/img/products/<?php echo $row['picture'];?>" target="_black"></a>
          </div>

              <!--img src="img/img/products/<?php echo $row['picture'];?>" alt="" height="140" width="140" /-->
              <?php } ?>
          </div> <!--galeria-->
          </div> <!-- tab2 -->
   </div>
   </div>
  </div> 
</div>
<?php } ?>
</div>
</div> </div>
</div>
<?php require "ofertas.php";?>
