<?php
include('../../app/config.php');
include('../layout/parte1.php');
$id_usuario = $_GET['id_usuario'];
include('../../app/controllers/usuarios/datos_del_usuario.php');
?>

<br>
<div class="container">
    <h1>Editar el usuario: <?php echo $nombre_completo ?></h1>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <br>
                    <div class="col-md-6">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title">Datos del usuario</h3>


                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="../../app/controllers/usuarios/update.php" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nombre completo <b>*</b></label>
                                                <input type="text" name="nombre_completo" value="<?php echo $nombre_completo ?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Email <b>*</b></label>
                                                <input type="email" name="email" class="form-control" value="<?php echo $email ?>" disabled>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Contrasena <b>*</b></label>
                                                <input type="password" name="password" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Verificar contrasena<b>*</b></label>
                                                <input type="password" name="password_verify" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Cargo<b>*</b></label>
                                                <select name="cargo" id="" class="form-control">
                                                    <?php
                                                    if ($cargo == "ADMINISTRADOR") { ?>
                                                        <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                                        <option value="CLIENTE">CLIENTE</option>
                                                        


                                                    <?php
                                                    } else { ?>
                                                        <option value="CLIENTE">CLIENTE</option>
                                                        <option value="ADMINISTRADOR">ADMINISTRADOR</option>

                                                    <?php
                                                    }
                                                    ?>



                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <input type="text" name="id_usuario" value="<?php echo $id_usuario ?>" hidden>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="" class="btn btn-danger">Cancelar</a>
                                            <input type="submit" class="btn btn-success" value="Actualizar Usuario">
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>



<?php
include('../layout/mensaje.php');
include('../layout/parte2.php'); ?>