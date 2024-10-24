<?php
include('../../app/config.php');
include('../layout/parte1.php'); ?>

<br>
<div class="container">
    <h1>Registrar usuario</h1>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <br>
                    <div class="col-md-6">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Datos del usuario</h3>
                                

                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="../../app/controllers/usuarios/create.php" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nombre completo <b>*</b></label>
                                                <input type="text" name="nombre_completo" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Email <b>*</b></label>
                                                <input type="email" name="email" class="form-control" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Contrasena <b>*</b></label>
                                                <input type="password" name="password" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Verificar contrasena<b>*</b></label>
                                                <input type="password" name="password_verify" class="form-control" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Cargo<b>*</b></label>
                                                <select name="cargo" id="" class="form-control" >
                                                    <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                                    <option value="CLIENTE">CLIENTE</option>
                                                    <option value="VETERINARIO">VETERINARIO</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="" class="btn btn-danger">Cancelar</a>
                                            <input type="submit" class="btn btn-primary" value="Registrar">
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