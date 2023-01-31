<?php
namespace controllers;
use views\VentasView;
use models\VentasModel;
use models\CodigosModel;

class VentasController
{
    protected $view; 
    protected $model;
    protected $codModel;

    public function __construct()
    {
        // die('llego aca ');
        //  echo '<pre>'; 
        // print_r($_REQUEST);
        // echo '</pre>';
        // die();
        $this->view = new VentasView();
        $this->model = new VentasModel();
        $this->codModel = new CodigosModel();
        if( $_REQUEST['option'] == 'menuVentas' ){ 
            $this->mainView(); 
        }
        if( $_REQUEST['option'] == 'nuevaVenta' ){ 
            $this->nuevaVenta(); 
        }
        if( $_REQUEST['option'] == 'grabarVenta' ){ 
            $this->grabarVenta(); 
        }
        // if( $_REQUEST['option'] == 'verifiqueStock' ){ 
        //     $this->verifiqueStock(); 
        // }
        if( $_REQUEST['option'] == 'descontarInventario' ){ 
            $this->descontarInventario(); 
        }

    }


    public function mainView()
    {
        $ventas = $this->model->consultarVentas();
        $this->view->mainViewCode($ventas);
    }
    public function nuevaVenta()
    {
        $this->view->nuevaVenta($ventas);
    }
    public function grabarVenta()
    {
        //control antes de grabar venta
        $stock = $this->codModel->verifiqueStock($_REQUEST);
        if($stock['stock'] > 0){
            $this->model->grabarVenta($_REQUEST);
        }else{
            echo 'No es posible realizar la venta porque nel stock es cero o inferior a cero '; 
        }
    }
    public function verifiqueStock()
    {
        $cantidad = $this->codModel->verifiqueStock($_REQUEST);
        return $cantidad; 
    }
    public function descontarInventario()
    {
        $stock = $this->codModel->verifiqueStock($_REQUEST);
        if($stock['stock'] > 0)
        {
            $this->codModel->descontarInventario($_REQUEST);
        }
        else{
            echo 'No es posible realizar la venta porque nel stock es cero o inferior a cero '; 
        }
    }
}


?>