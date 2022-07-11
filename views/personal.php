<?php
    ob_start();
    session_start();
    if (!isset($_SESSION["nombre"])){
        header("Location: ../");
    }
    else{
        include "headers.php";
?>
        <div class="content-wrapper">        
            <section class="content">
                <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <h1 class="box-title">Personal <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i>Agregar </button></h1>
                        </div>
                        <div class="panel-body table-responsive" id="listadoregistros">
                            <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <th>Opciones</th>
                                <th>CI</th>
                                <th>Nombre</th>
                                <th>Paterno</th>
                                <th>Materno</th>
                                <th>Telefono</th>
                                <th>Usuario</th>
                                <th>Rol</th>
                            </thead>
                            <tbody>                            
                            </tbody>
                            </table>
                        </div>
                        <div class="panel-body" style="height: 400px;" id="formularioregistros">
                            <form name="formulario" id="formulario" method="POST">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>CI:</label>
                                <input type="hidden" name="idpersonal" id="idpersonal">
                                <input type="text" class="form-control" name="ci" id="ci" maxlength="10" placeholder="Carnet Identidad" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Nombre(s):</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" maxlength="30" placeholder="Nombre(s)" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Paterno:</label>
                                <input type="text" class="form-control" name="paterno" id="paterno" maxlength="15" placeholder="Ap. Paterno">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Materno:</label>
                                <input type="text" class="form-control" name="materno" id="materno" maxlength="15" placeholder="Ap. Materno">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Teléfono:</label>
                                <input type="text" class="form-control" name="telefono" id="telefono" maxlength="10" placeholder="Teléfono" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Usuario:</label>
                                <input type="text" class="form-control" name="usuario" id="usuario" maxlength="15" placeholder="Usuario" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Contraseña:</label>
                                <input type="password" class="form-control" name="contraseña" id="contraseña" maxlength="30" placeholder="Contraseña" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Rol:</label>
                                <input type="text" class="form-control" name="cargo" id="cargo" maxlength="20" placeholder="Cargo" required>
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
<script type ="text/javascript" src="scripts/personal.js"></script>
<?php
    }
    ob_end_flush();
?>
<script type="text/javascript">
    $('#siPersonal').addClass("active");
</script>