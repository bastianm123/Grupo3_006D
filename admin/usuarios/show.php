<?php
include('../../app/config.php');
include('../layout/parte1.php');
$id_usuario = $_GET['id_usuario'];
include('../../app/controllers/usuarios/datos_del_usuario.php');
?>

<br>
<div class="container">
    <h1>Datos del usuario <?php echo $id_usuario; ?></h1>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <br>
                    <div class="col-md-6">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Informacion usuario</h3>


                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nombre completo <b>*</b></label>
                                            <input type="text" value="<?php echo $nombre_completo ?>" name="nombre_completo" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email <b>*</b></label>
                                            <input type="email" value="<?php echo $email ?>" name="email" class="form-control" disabled>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Cargo<b>*</b></label>
                                            <input type="text" class="form-control" value="<?php echo $cargo ?>" disabled>
                                        </div>
                                    </div>

                                </div>
                                <hr>


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