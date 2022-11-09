<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <!-- <h1>Contenido principal</h1 -->
    <h1 class="text-uppercase">Sistema <?php echo Rol($_SESSION["s_rol"]) ?></h1>

    <?php
        
        $listado = $_SESSION["s_vendedores"];
        // print "<pre>";
        // foreach ($listado as $vendedor) {
        //     print_r($vendedor['datos']['nombre']);
        // }
        // echo $listado[0]['datos']['nombre'];
        // print "</pre>";
    ?>

    <div class="container">
        <hr class="sidebar-divider d-none d-md-block">
        <h2>Clientes</h2>
            <?php if($_SESSION['s_rol'] == 10002){ ?>
                <div class="row">
                    <div class="col-lg-12">            
                    <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
                    </div>    
                </div>    
            <?php } ?>
    </div> 
     
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaVendedores" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>                                
                                <th>Rol</th>  
                                <!-- <th>Acciones</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($listado as $vendedor) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $vendedor['uid'] ?></td>
                                <td><?php echo $vendedor['datos']['nombre'] ?></td> 
                                <td><?php echo $vendedor['datos']['apellido'] ?></td>
                                <!-- <td><?php echo $vendedor['datos']['rol'] ?></td> -->

                                <td></td> 
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    

    <!-- <?php
        // print "<pre>";
        // $listado = $_SESSION["s_vendedores"];
        // foreach ($listado as $vendedor) {
        //     print_r($vendedor['uid']);
        // }
        // echo $listado[0]['datos']['nombre'];
        // print "</pre>";
    ?> -->
</div>

<?php require_once "vistas/parte_inferior.php"?>