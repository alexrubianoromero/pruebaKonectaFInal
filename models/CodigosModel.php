<?php

namespace models;
use \PDO;
use conexion\Conexion;
use PDOException;

class CodigosModel extends Conexion
{
    public function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function consultarItemsOrden($fechain,$fechafin,$selectCodigo)
    {
        $sql = "select * from codigos order by id desc";

         $execute = $this->conexion->query($sql);
         $request = $execute->fetchall(PDO::FETCH_ASSOC);
         return $request;       

    }
    public function grabarCodigo($request)
    {
        //   echo '<pre>'; 
        // print_r($request);
        // echo '</pre>';
        // die();
        $fechapan =  time();
        $fechapan = date ( "Y/m/j" , $fechapan );
        // echo '<br>'.$fechapan.'<br>';
        // die();
        $conexion = $this->connectMysql();
        $sql = "insert into codigos (nombre,referencia,precio,peso,categoria,stock,fecha_creacion) 
        values ('".$request['txtnombre']."'
        ,'".$request['txtreferencia']."'
        ,'".$request['txtprecio']."'
        ,'".$request['txtpeso']."'
        ,'".$request['txtcategoria']."'
        ,'".$request['txtstock']."'
        ,'".$fechapan."'
        )";
        $consulta = mysql_query($sql,$conexion); 
        echo 'Codigo Grabado';
    }
    

    public function buscarIdCodigo($id)
    {
        $conexion = $this->connectMysql();
        $sql = "select * from codigos where id =  ".$id."   "; 
        $consulta = mysql_query($sql,$conexion);
        $arreglo = mysql_fetch_assoc($consulta); 
        return $arreglo;
        
    }
    
    public function actualizarCodigo($request)
    {
        $conexion = $this->connectMysql();
        $sql = "update codigos set   nombre = '".$request['txtnombre']."'
        ,referencia = '".$request['txtreferencia']."'
        ,precio = '".$request['txtprecio']."'
        ,peso = '".$request['txtpeso']."'
        ,categoria = '".$request['txtcategoria']."'
        ,stock = '".$request['txtstock']."'
        where    id =  '".$request['txtid']."' ";
        $consulta = mysql_query($sql,$conexion); 
        
        echo 'Codigo Actualizado';
        
    }
    
    public  function deleteCodigo($id)
    {
      $conexion = $this->connectMysql();
      $sql = "delete from codigos where id = '".$id."' ";
      $consulta = mysql_query($sql,$conexion);  
      
      echo 'Codigo Eliminado';
    }
    
    public function traerCodigos()
    {
       $conexion = $this->connectMysql();
       $sql = "select * from codigos order by nombre ";
       $consulta = mysql_query($sql,$conexion); 
     
    return $consulta;


   }

   public function verifiqueStock($request)
   {
       $conexion = $this->connectMysql();
       $sql = "select stock from codigos where id =  '".$request['idCodigo']."'  ";
       $consulta = mysql_query($sql,$conexion); 
       $respu = mysql_fetch_assoc($consulta); 
       return $respu;
    }
    
   
    
    
    public function descontarInventario($request)
    {
        //viene el codigo y la cantidad
        //idCodigo
        //txtcantidad 
        //   echo '<pre>'; 
        // print_r($request);
        // echo '</pre>';
        // die();
       $conexion = $this->connectMysql();
       $stock = $this->verifiqueStock($request);
        //  echo '<pre>'; 
        // print_r($stock);
        // echo '</pre>';
        // die();
       $saldo = $stock['stock'] - $request['txtcantidad'];
       $sql = "update codigos set stock = '".$saldo."' where  id = '".$request['idCodigo']."' "; 
       $consulta = mysql_query($sql,$conexion); 

   }




}



?>