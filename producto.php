<?php
define('INCLUDE_CHECK',1);
require_once('connect.php');

    class product
    {
        /*
         *function __construct(argument)
         *{
         *    // code...  
         *}
         */
        function limpiarDato($dato){
                if (get_magic_quotes_gpc())
                {
                    $dato = stripslashes($dato);
                }
                elseif (!is_numeric($dato)){
                    $dato = mysql_real_escape_string($dato);
                }
            return $dato;
       }

        function limpiarQuery($datos){
            foreach ($datos as $key => $valor){
                if (get_magic_quotes_gpc())
                {
                    $datos[$key] = stripslashes($valor);
                }
                elseif (!is_numeric($valor)){
                    $datos[$key] = mysql_real_escape_string($valor);
                }
            }
            return $datos;
       }
        function AddProduct($datos) {
            $query  = "insert into internet_shop (name,description,price,id_manufactura,modelo,stock,description_short,promocion,quotas,state)";
            $query .= "values('".$datos['nombre']."', '".$datos['description']."', ".$datos['price'].", ".$datos['manufactura'].", '".$datos['modelo']."'";
            $query .= ", ".$datos['stock'].", '".$datos['desc_short']."', '".$datos['promocion']."', '".$datos['cuotas']."', 1);";
            mysql_query($query) or die(mysql_error());
            
        }
        function addPicture($image,$idProduct){
            $image = mysql_escape_string($image);
            $query = "insert into pictures (picture,id_Producto)values('".$image."', ".$idProduct.");";
            mysql_query($query)or die("Error al subir la imagen");
        }
        function updatePicture($idProd,$picture){
            $query  = "update internet_shop ";
            $query .= "set img='".$picture."' ";
            $query .= "where id=".$idProd.";";
            mysql_query($query)or die(mysql_error());
        }
        
        function UpdateProduct($datos,$id){
            $query  = "update internet_shop set name='".trim($datos['nombre'])."', description='".trim($datos['description'])."', description_short='".trim($datos['desc_short']);
            $query .= "', price=".trim($datos['price']).", modelo='".trim($datos['modelo'])."', stock=".trim($datos['stock']).", promocion='".trim($datos['promocion']);
            $query .= "', id_manufactura=".$datos['manufactura'].", quotas='".$datos['cuotas']."' where id=".$id;
            mysql_query($query) or die(mysql_error());
        }
        function DeleteProduct($id){
            $query  = "update internet_shop ";
            $query .= "set state = 0 ";
            $query .= "where id = ". $id;
            mysql_query($query) or die("Error producido al eliminar un producto");
        }
        function DeleteImages($grupo){
          $query="DELETE FROM pictures where id_Pictures IN (".$grupo.")";
          /*
           *mysql_query($query)or die("Error el eliminar las imagenes");
           */
          mysql_query($query)or die(mysql_error());
        }
        function getMaxId(){
            $result = mysql_query("select max(id) max from internet_shop");
            $id = mysql_fetch_assoc($result);
            return $id['max'];}
        function searchProduct($dato){
            $dato = mysql_real_escape_string($dato);
            $query  = "select id, img, i.name, description_short, price, promocion, quotas ";
            $query .= "from internet_shop i join manufactura m on i.id_manufactura = m.idmanufactura ";
            $query .= "where (upper(i.name) LIKE '%$dato%' or upper(m.name) LIKE '%$dato%') AND i.state = 1";
            return mysql_query($query);
        }
        function getProduct($id){
            $query  = "select id, img, i.name as ProdName, description, price, idmanufactura,modelo,stock, m.name as ManufactName, promocion, o.id_producto, description_short, quotas ";
            $query .= "from internet_shop i join manufactura m on i.id_manufactura = m.idmanufactura LEFT OUTER JOIN ofertas o on i.id = o.id_producto ";
            $query .= "where i.state = 1 AND i.id=".$id;
            $result = mysql_query($query) or die(mysql_error());
            $row=mysql_fetch_assoc($result);
            mysql_free_result($result);
            return $row;
        }
        function getProducts(){
            $result = mysql_query("SELECT id, img ,name, description_short, price, promocion, quotas  FROM internet_shop i where i.state = 1 order by name"); 
            return $result;
        }
        function getProductByManufact($manufact){
            $result = mysql_query("select id, img, i.name, description_short, price, promocion, quotas from internet_shop i join manufactura m on i.id_manufactura = m.idmanufactura where m.name='".$manufact."'");
            return $result;
        }
       function getProductByCategory($category){
            $result = mysql_query("select i.id, img, i.description_short, name, price, quotas, promocion from internet_shop i join `categ-product` cp on cp.id_producto = i.id where cp.id_categoria='".$category."'");
            return $result;
        }
        

        function OfertaAdd($idProd){
            $query="SELECT count(*) Cant FROM ofertas WHERE id_producto = ".$idProd;
            $result = mysql_query($query);
            $row = mysql_fetch_assoc($result);
            if ($row['Cant'] == 0){
            $query="INSERT INTO ofertas(id_producto) VALUES($idProd)";
            mysql_query($query)or die(mysql_error());
        }}
        function OfertaDel($idProd){
            $query="DELETE FROM ofertas WHERE id_producto=$idProd";
            mysql_query($query);
        }
        function getOfertas(){
            return mysql_query("select * from ofertas o join internet_shop i on o.id_producto = i.id where i.state = 1 order by i.name");

        }
}
?>
