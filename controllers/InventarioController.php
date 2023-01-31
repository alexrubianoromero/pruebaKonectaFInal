<?php

namespace controllers;

use views\InventarioView;
use models\CodigosModel;

class InventarioController
{
    protected $view;
    protected $model;

    public function __construct()
    {   
        // echo '<pre>'; 
        // print_r($_REQUEST);
        // echo '</pre>';
        // die();
        
        $this->view = new InventarioView();
        $this->model = new CodigosModel();
        
        if(!isset($_REQUEST['option'])){
            $this->mainView();
        }
        if( $_REQUEST['option'] == 'menuCodigos' ){ 
            $this->callViewCode(); 
        }
        if( $_REQUEST['option'] == 'nuevoCodigo' ){ 
            $this->nuevoCodigo(); 
        }
        if( $_REQUEST['option'] == 'grabarCodigo' ){ 
            $this->grabarCodigo(); 
        }
        if( $_REQUEST['option'] == 'buscarIdCodigo' ){ 
            $this->buscarIdCodigo(); 
        }
        if( $_REQUEST['option'] == 'actualizarCodigo' ){ 
            $this->actualizarCodigo(); 
        }
        if( $_REQUEST['option'] == 'deleteCodigo' ){ 
            $this->deleteCodigo(); 
        }
    

    } 

    public  function mainView()
    {
        $this->view->mainView();
    }
    
    public function callViewCode()
    {
       $codes =  $this->model->consultarItemsOrden();
       $this->view->mainViewCode($codes);
    }

    public function nuevoCodigo()
    {
        $this->view->nuevoCodigo();
    }


    public function grabarCodigo()
    { 
        $this->model->grabarCodigo($_REQUEST);
    }
    
    public function buscarIdCodigo($id)
    { 
        $codigo = $this->model->buscarIdCodigo($_REQUEST['id']);
        $this->view->nuevoCodigo($codigo);
    }
    
    public function actualizarCodigo()
    { 
        $this->model->actualizarCodigo($_REQUEST);
    }
    public function deleteCodigo()
    { 
        $this->model->deleteCodigo($_REQUEST['id']);
    }
    public function descontarInventario()
    { 
        $this->model->descontarInventario($_REQUEST);

    }




}


?>