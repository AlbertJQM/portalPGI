<?php
    ob_start();
    session_start();

    if (!isset($_SESSION["nombre"])){
        header("Location: ../");
    }else{
        require 'headers.php';
?>
      <div class="content-wrapper">        
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Noticia <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Portada</th>
                            <th>Archivo</th>
                            <th>Condición</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Título:</label>
                            <input type="hidden" name="idnoticia" id="idnoticia">
                            <input type="hidden" name="idpersonal" id="idpersonal">
                            <input type="text" class="form-control" name="titulo" id="titulo" maxlength="50" placeholder="Título" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripción:</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Descripción" rows="6" required></textarea>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha:</label>
                            <input type="date" class="form-control" name="fecha" id="fecha" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Portada:</label>
                            <input type="file" class="form-control" name="portada" id="portada">
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <img src="" width="150px" height="120px" id="imagenmuestra">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Archivo:</label>
                            <input type="file" class="form-control" name="archivo" id="archivo">
                            <input type="hidden" name="archivoactual" id="archivoactual">
                            <a href="" name="archivomuestra" id="archivomuestra"></a>
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                  </div>
              </div>
          </div>
      </section>
    </div>
<?php
  require 'footers.php';
?>
<script type="text/javascript" src="scripts/noticia.js"></script>
<?php 
    }
    ob_end_flush();
?>
<script type="text/javascript">
    $('#siNoticias').addClass("active");
</script>