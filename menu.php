<?php session_start();?>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr>
<td valign="top" height="125" rowspan="3" width="1%" bgcolor="#45347b">
<img border="0" src="img/img/tienda-virtual-logo.jpg" width="129" height="125" alt="logo" valign="top" align="center">
</td>

<tr><td colspan="2" style="padding-left:30%;"bgcolor="#45347b" height="25px">
<form method="get" action="index.php">
<span style="color: white;"><b>Buscar:</b> </span><input name="search" style="text-transform:none" type="text" size="27">
</form>
</td></tr>
<td valign="bottom" align="left" bgcolor="#000000" colspan="2" lang="en">
<p class="menu">
<a class="menulink" href="langs/es/Software Libre.html">link1</a> | 
<a class="menulink" href="langs/es/Diestros.html">link2</a> | 
<a class="menulink" href="langs/es/galleryview.html">link3</a> | 
<a class="menulink" href="langs/es/Software.html">link4</a> | 
<a class="menulink" href="langs/es/contact.html">link5</a> | 
</p></td>

</ul>  
</p></td>
</tr>

<!-- =======================================================================================================================================================-->

<tr>
<td valign="top" align="right" width="1%" bgcolor="#dddaec"> 
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td height="99%" valign="top" align="left">

<table cellspacing="0" cellpadding="5" border="0"><tr><td valign="top" class="leftmenu" lang="en">
<A HREF="INDEX_I.html"><img border="2" align="left" style="margin-left:5px" width="55" height="25" src="img/img/icono-bandera-inglesa2.jpg"></a>
<A HREF="INDEX.html">
<img border="0" align="right" width="55" height="25" style="margin-right:3px" src="img/img/bandera_espanola.gif"></a>
<div style="border: 2px solid #BE81F7; margin:30px 4px 5px 4px;background-color:#EFFBFB;padding:0px 0px 20px 0px;" >       
<div style="border: 2px solid #AC58FA; background-color:#AC58FA; color:#FFFFFF;">
<b><?php if (!$_SESSION['root']){echo "CATEGORIAS";} else{echo "ROOT MENU";}?></b></div>
<p class="altmenu" style="font-size:10pt; padding:5px 5px 5px 5px">
<?php
if ($_SESSION['root']){
    $result=mysql_query("select * from root_menu");
    while($row=mysql_fetch_assoc($result)){ ?>
    <a class="altlink" href="index.php?categoria=<?php echo $row['id'];?>"> <?php echo $row['item'];?></a><br>
    <?php }
}
    echo "<a class='altlink' href='index.php'> Todos</a><br>";
    $result=mysql_query("select * from categoria");
while($row=mysql_fetch_assoc($result)){ ?>
<a class="altlink" href="index.php?categoria=<?php echo $row['id'];?>"> <?php echo $row['item'];?></a><br>
<?php }?>
</p>
</div>
</div>
<!--
   -Sistemas<br>
   -<a class="altlink" href="http://www.gentoo.org/">Gentoo</a><br>
   -<a class="altlink" href="http://www.pentoo.ch/">Pentoo</a><br>
   -<a class="altlink" href="http://www.openbsd.org/es/">Slackware</a><br>
   -<a class="altlink" href="http://www.backtrack-linux.org/backtrack/backtrack4-release/">BT4</a><br>
   -<a class="altlink" href="http://www.debian.org/index.es.html">Debian</a><br>
   -->
<!--
   -</p>
   -->
<br><br>
</td></tr>
</table></td></tr>
</table></td>
