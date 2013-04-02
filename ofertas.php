<td width="1%" bgcolor="#dddaec"  valign="top">
<?php if ($_SESSION['username'] && !$_SESSION['root']) {
?>
<div style="border: 2px solid #BE81F7; margin:15px 5px 5px 5px;background-color:#EFFBFB;padding:0px 0px 20px 0px;" >       
<div style="border: 2px solid #AC58FA; background-color:#AC58FA; color:#FFFFFF;text-align:center;"><b>MI CARRO</b></div>
<table cellpadding="2"  cellspacing="0" style="width: 100%;"> 
<?php 
$name = $_SESSION['username'];
$total = 0;
foreach ($_SESSION[md5($name)] as $key => $val){ $total += (int)$val['Cant'] * (int)$val['Price'];?>
    <tr>
        <td style="padding:0px 0px 0px 7px;">
        <img src="img/img/products/no.png" title="quitar producto" onclick="deleteProducto(<?php echo $key;?>)"; width="12" height="12">
        </td>
        <td style="padding-left:2px">
        <img src="<?php echo $val['Img']?>" width="40" height="40" class="pngfix" /></td>
        <td style="padding:5px 10px 0px 10px"><a href="ver_producto.php?id=<?php echo $key;?>"><?php echo $val['Prod'];?></a>
        <br/><span style="font-size: 11px; color: #900;">$ <?php echo $val['Cant'].' x '.$val['Price'];?></span></td>
    </tr>
<?php } echo "<tr><td height='12'></td></tr><tr><td colspan='3' style='margin-top:0px; text-align: center;font-size: 11px; color:#900;'>Total: $".$total."</td></tr>";
if ($total > 0){?> <tr><td style="text-align:center;" colspan='3'><a href='ver_compra.php'>ver compra</a></td></tr><?php }?>
</table>
</div>
<?php }?>
<div style="border: 2px solid #BE81F7; margin:15px 5px 5px 5px;background-color:#EFFBFB;padding:0px 0px 20px 0px;" >       
<div style="margin-bottom:5px;border: 2px solid #AC58FA; background-color:#AC58FA; color:#FFFFFF;text-align:center;"><b>OFERTAS</b></div>
<table cellpadding="2"  cellspacing="0" style="width: 100%;"> 
<?php
$result = $producto->getOfertas();
while($row=mysql_fetch_assoc($result))
{
?>
<tr>
    <?php if (isset($_SESSION['root'])){ ?> 
    <td style="padding:0px 0px 0px 7px;">
        <img src="img/img/products/no.png" title="quitar oferta" onclick="deleteOferta(<?php echo $row['id'];?>)"; width="12" height="12">
    </td>
    <td  style="padding:0px 0px 0px 2px">
    <?php } 
    else{ ?>
    <td  style="padding:0px 0px 0px 7px">
    <?php }?>
        <img src="img/img/products/<?php echo $row['img']?>" alt="<?php echo htmlspecialchars($row['name']) ?>" width="40" height="40" class="pngfix" />
   </td>
   <td  style="padding:5px 10px 0px 10px">
        <a href="ver_producto.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']?></a>
        <br /> 
        <span style="font-size: 11px; color: #900;">$ <?php echo $row['price']?></span> 
  </td> 
</tr> 
<?php }
mysql_close();
?>
</table>
</div>
</td>
</tr>

<!-- =====================================================================================================================================-->

<tr lang="en"><td align="center" class="infohead" colspan="3">
 warlock.gpl@gmail.com 

</td></tr>
</table></body>
</html>
