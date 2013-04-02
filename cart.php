<?php
define('INCLUDE_CHECK',1);
require_once ("connect.php");
session_start();

    /**
     * 
     **/
    class cart
    {
        function __construct($name)
        {
        if (!isset($_SESSION[md5($name)])) {
            $_SESSION[md5($name)] = array();
        }
        }


        function addProduct($id,$details = array()) {
         if ((int)$details['Cant'] > 0) {
            $name = $_SESSION['username'];
            if (!isset($_SESSION[md5($name)][$id])) {
                $_SESSION[md5($name)][$id] = $details;
            }
            else {
                $product = $_SESSION[md5($name)][$id];
                $product['Cant'] += (int)$details['Cant'];
                if ($product['Cant'] <= $product['Stock']){
                    $_SESSION[md5($name)][$id] = $product;
                }
                else{ return "Error: el producto ".$product['Prod']." no puede superar el stock ".$product['Stock'] ;} 
            }
        }
            return "";
        }
        function addCompra($dat){
            $query  = "insert into compras(idcliente,domicilioEntrega,tipoPago,fecha) ";
            $query .= "values(".$dat['id'].", '".$dat['dom']."', ".$dat['tipoPago'].", '".date("Y-m-d")."')";
            mysql_query($query)or die(mysql_error());
            
            $query = "SELECT MAX(idcompras) AS idCompra FROM compras";
            $idCompra = mysql_query($query);
            $idCompra = mysql_fetch_assoc($idCompra);
            $idRes = $idCompra['idCompra'];

            $total = 0;
            $name = $_SESSION['username'];
            foreach ($_SESSION[md5($name)] as $key => $val){ 
                $total = (int)$val['Cant']*(int)$val['Price'];
                $query  = "INSERT INTO detalleCompra(idCliente,idProducto,cantidad,precio,idCompra,precioFinal) VALUES(";
                $query .= $dat['id'].", ".$key.", ".$val['Cant'].", ".$val['Price'].", ".$idRes.", ".$total.")";
                mysql_query($query);}
                
                $query = "update internet_shop set stock = stock -".$val['Cant'];
                $query .= " where id=".$key;
                mysql_query($query);
                unset($_SESSION[md5($name)]);

        }
        function delProduct($id) {
            $name = $_SESSION['username'];
            if (isset($_SESSION[md5($name)][$id])){
                unset($_SESSION[md5($name)][$id]); 
            }
        }
        function getClientId($name) {
            $query = "SELECT idusers FROM users WHERE username='".$name."'";
            $res = mysql_query($query);
            $res = mysql_fetch_assoc($res);
        return $res['idusers'];
        }
        function getTipoPago() {
            $query = "SELECT idtipoPago,descripcion FROM tipoPago order by descripcion";
            $result = mysql_query($query);
        return $result;
        }
    }
?>
