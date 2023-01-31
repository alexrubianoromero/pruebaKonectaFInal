<?php
namespace views;
use models\CodigosModel;
class VentasView
{
    protected $codModel;
    public function __construct()
    {
        $this->codModel = new CodigosModel();
    }
    public function mainViewCode($codes)
    {
       ?> 
       <div id="div_botones_codigos">
       <button class="btn btn-primary" onclick="btnNuevaVenta();"  data-toggle="modal" data-target="#myModalClientes">Nuevo Venta</button>
            <button class="btn btn-primary" >Ver Ventas</button>
       </div>
       <div id="div_resultados_codigos">
        <table class ="table">
            <thead>
            <th>Id</th>
            <th>Id Producto</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Fecha Creacion</th>
           
            </thead>
            <tbody>
        <?php
        foreach($codes as $item )
        {
                $codigo = $this->codModel->buscarIdCodigo($item['idProducto']);
                echo '<tr>';
                echo '<td>'.$item['idVenta'].'</td>';
                echo '<td>'.$item['idProducto'].'</td>';
                echo '<td>'.$codigo['nombre'].'</td>';
                echo '<td>'.$item['cantidad'].'</td>';
                echo '<td>'.$item['fecha'].'</td>';
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
                      <h4 class="modal-title" id="myModalLabel">Nuevo Codigo</h4>
                  </div>
                  <div id="cuerpoModalClientes" class="modal-body">
                      
                      
                  </div>
                  <div class="modal-footer" id="footerNuevoCliente">
                      <button type="button" class="btn btn-default" data-dismiss="modal" onclick="listarVentas();">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }


    public function nuevaVenta($codigo = '' )
    {
        $codigos = $this->codModel->traerCodigos();
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
                <span >Producto :</span>
            </div>
            <div class="col-md-8">
                <select class="form-control" id="idCodigo" onchange="reviseStock();">
                    <option value = "">Seleccione un producto...</option>
                    <?php
                   while($codi = mysql_fetch_assoc($codigos))
                   {
                       echo '<option   id="idCodigo" value = "'.$codi['id'].'">'.$codi['nombre'].'</option>';
                   }

                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row" >
            <div class="col-md-4">
                <span >Cantidad :</span>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="txtcantidad" value ="<?php echo $codigo['cantidad'] ?>">
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
                echo '<button class ="btn btn-primary btn-block" onclick="btnGrabarVenta();">Grabar Venta</button>'; 
              }

            ?>
        </div>

        <?php
    }
      
}


?>