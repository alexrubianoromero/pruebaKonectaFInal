<?php
namespace models;
use \PDO;
use conexion\Conexion;
use models\CodigosModel;
use PDOException;

class VentasModel extends Conexion
{
    


    public function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();

    }

    public function consultarVentas()
    {

         $sql = "select * from ventas order by idVenta desc";
         $execute = $this->conexion->query($sql);
         $request = $execute->fetchall(PDO::FETCH_ASSOC);
         return $request;       

    }

    public function grabarVenta($request)
    {
        $conexion = $this->connectMysql();
        //aqui debe verificar si se puede grabar la venta 

        $sql = "insert into ventas (idProducto,cantidad,fecha) 
        values ('".$request['idCodigo']."','".$request['txtcantidad']."','".$request['txtfecha']."')";
        $consulta = mysql_query($sql,$conexion); 
        echo 'Venta grabada ';


    }
    
   


}



?>