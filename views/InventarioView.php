<?php
namespace views;
use models\InventarioModel;
class InventarioView
{
    public function __construct()
    {

    }

    public function mainView()
    {
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <title>Document</title>
            </head>
            <body>
                <div id="divPrincipal" align="center">
                    <div id="divTitulo">
                        <h2>MANEJO DE VENTAS E INVENTARIOS KONECTA </h2>
                    </div>
                    <div id="divBotones">
                        <button class="btn btn-primary" id="btnProductos" onclick="listarMenuProductos();">INVENTARIO </button>
                        <button class="btn btn-primary" id = btnVentas onclick="listarVentas();">VENTAS </button>
                    </div>
                    <br>
                    <div id ="divResultados"></div>
                    <?php  $this->modalClientes(); ?>   
                </div>
            </body>
            </html>
            <script src = "js/jquery-2.1.1.js"> </script>    
            <script src="js/bootstrap.min.js"></script>
            <script src="js/app.js"></script>
            <script src="js/ventas.js"></script>
        <?php
    }
    public function mainViewCode($codes)
    {
       ?> 
       <div id="div_botones_codigos">
       <button class="btn btn-primary" onclick="btnNuevoPropietario();"  data-toggle="modal" data-target="#myModalClientes">Nuevo Codigo</button>
            <button class="btn btn-primary" >Ver Codigos</button>
       </div>
       <div id="div_resultados_codigos">
        <table class ="table">
            <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Referencia</th>
            <th>Precio</th>
            <th>Peso</th>
            <th>Categoria</th>
            <th>Stock</th>
            <th>Fecha Creacion</th>
            <th>Editar</th>
            <th>Eliminar</th>
            </thead>
            <tbody>
        <?php
        foreach($codes as $item )
        {
                echo '<tr>';
                echo '<td>'.$item['id'].'</td>';
                echo '<td>'.$item['nombre'].'</td>';
                echo '<td>'.$item['referencia'].'</td>';
                echo '<td>'.$item['precio'].'</td>';
                echo '<td>'.$item['peso'].'</td>';
                echo '<td>'.$item['categoria'].'</td>';
                echo '<td>'.$item['stock'].'</td>';
                echo '<td>'.$item['fecha_creacion'].'</td>';
                echo '<td><button class="editar" value="'.$item['id'].'" onclick="editCode('.$item['id'].');"   data-toggle="modal" data-target="#myModalClientes" >Editar</button></td>';
                echo '<td><button class="eliminar" value="'.$item['id'].'" onclick="deleteCode('.$item['id'].');"   data-toggle="modal" data-target="#myModalClientes">Eliminar</button></td>';
                echo '</tr>';
        }
        echo '</table>';
        echo '<div>';
    }

    public function modalClientes ()
    {
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div  class="modal fade " id="myModalClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header" id="headerNuevoCliente">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Agregar</h4>
                  </div>
                  <div id="cuerpoModalClientes" class="modal-body">
                      
                      
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                      <button type="button" class="btn btn-default" data-dismiss="modal" onclick="listarMenuProductos();">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }

    public function nuevoCodigo($codigo = '' )
    {
        
        $fechapan =  time();
        $fechapan = date ( "Y/m/j" , $fechapan );

        if( isset($codigo['id']))
              {
              ?>
              <div class="form-group row" >
                     <div class="col-md-4">
                         <span >Id :</span>
                     </div>
                     <div class="col-md-8">
                          <input type="text" class="form-control" id="txtid" value ="<?php echo $codigo['id'] ?>" onfocus="blur();">
                   </div>
               </div>
            <?php
              }
        ?>
        <div class="form-group row" >
            <div class="col-md-4">
                <span >Nombre :</span>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="txtnombre" value ="<?php echo $codigo['nombre'] ?>">
            </div>
        </div>
        <div class="form-group row" >
            <div class="col-md-4">
                <span >Referencia :</span>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="txtreferencia" value ="<?php echo $codigo['referencia'] ?>">
            </div>
        </div>
        <div class="form-group row" >
            <div class="col-md-4">
                <span >Precio :</span>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="txtprecio" value ="<?php echo $codigo['precio'] ?>">
            </div>
        </div>
        <div class="form-group row" >
            <div class="col-md-4">
                <span >Peso:</span>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="txtpeso" value ="<?php echo $codigo['peso'] ?>">
            </div>
        </div>
           
        <div class="form-group row" >
            <div class="col-md-4">
                <span >Categoria:</span>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="txtcategoria" value ="<?php echo $codigo['categoria'] ?>">
            </div>
        </div>
        <div class="form-group row" >
            <div class="col-md-4">
                <span >Stock:</span>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="txtstock" value ="<?php echo $codigo['stock'] ?>">
            </div>
        </div>
        <div class="form-group row" >
            <div class="col-md-4">
                <span >Fecha Creacion:</span>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="txtfecha" value= "<?php  echo  $fechapan ?>" onfocus="blur();">
            </div>
            <br><br>
            <?php
              if( isset($codigo['id']))
              {
                echo '<button class ="btn btn-primary btn-block" onclick="btnActualizarCodigo();">Actualizar Codigo</button>';
              }else{
                echo '<button class ="btn btn-primary btn-block" onclick="btnGrabarCodigo();">Grabar Codigo</button>'; 
              }

            ?>

            

            

        </div>
           


       


        <?php
    
    }

}


?>