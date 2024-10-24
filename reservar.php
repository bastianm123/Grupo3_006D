<?php
include('../Veterinaria/app/config.php');
include('../Veterinaria/admin/layout/header-principal.php');
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script>
    var a;
    var email_sesion = '<?php echo $email_sesion ?>';
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            editable: true,
            selectable: true,
            allDaySlot: false,

            events: 'app/controllers/reservas/cargar_reservas.php',

            dateClick: function(info) {
                a = info.dateStr;
                const fechaCompleta = a;
                var numeroDia = new Date(fechaCompleta).getDay();
                var dias = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes'];

                if (email_sesion == "") {
                    $('#modal_sesion').modal("show");
                } else {
                    if (numeroDia == "5") {
                        Swal.fire({
                            icon: 'info',
                            title: 'No atendemos días sábado',
                            showConfirmButton: true,
                            confirmButtonText: 'Entendido',
                        });
                    } else if (numeroDia == "6") {
                        Swal.fire({
                            icon: 'info',
                            title: 'No atendemos días domingo',
                            showConfirmButton: true,
                            confirmButtonText: 'Entendido',
                        });
                    } else {

                        var ano = new Date().getFullYear();
                        var mes = new Date().getMonth() + 1;
                        var dia = new Date().getDate();
                        var hoy = ano + "-" + mes + "-" + dia

                        if (hoy < a) {
                            $('#modal_reservas').modal("show");
                            $('#dia_semana').html(dias[numeroDia] + " " + a);

                            var fecha = info.dateStr;
                            var res = "";
                            var url = "app/controllers/reservas/verificar_horario.php";

                            $.get(url, {
                                fecha: fecha
                            }, function(datos) {
                                res = datos;
                                $('#respuesta_horario').html(res);
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Día no disponible',
                                text: 'Por favor, elige otra fecha',
                                showConfirmButton: true,
                                confirmButtonText: 'Entendido',
                            });
                        }


                    }
                }


            },
        });
        calendar.render();
    });
</script>

<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Reservar una cita</h2>
            <ul>
                <li>
                    <a href="<?php echo $URL; ?>">
                        Home
                    </a>
                </li>
                <li>Citas</li>

            </ul>
        </div>
    </div>
</div>

<section class="our-rooms-area pb-100">
    <div class="container">
        <div class="section-title">
            <h2 style="margin-top: 30px;">Agendar una cita</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">>
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>>
        </div>


</section>

<div class="modal fade" id="modal_sesion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agendar cita para el día <span id="dia_semana"></span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h3 class="card-title mb-3">Debes iniciar sesión</h3>
                        <p class="card-text mb-4">Para agendar una cita, es necesario que inicies sesión o te registres.</p>
                        <div class="d-grid gap-2">
                            <a href="<?php echo $URL ?>/login" class="btn btn-primary" type="button">Iniciar Sesión</a>
                            <a href="<?php echo $URL ?>/register" class="btn btn-outline-primary" type="button">Registrarse</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_reservas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <h2>Agenda tu cita</h2>
                </center>
                <hr>
                <div class="row">
                    <div id="respuesta_horario"></div>
                    <div class="col-md-6">
                        <b>Horas Manana</b>
                        <br>
                        <div class="d-grid gap-2">
                            <button class="btn btn-success" id="btn_h1" data-bs-dismiss="modal" type="button">09:00 - 10:00</button>
                            <button class="btn btn-success" id="btn_h2" data-bs-dismiss="modal" type="button">10:00 - 11:00</button>
                            <button class="btn btn-success" id="btn_h3" data-bs-dismiss="modal" type="button">11:00 - 12:00</button>
                            <button class="btn btn-success" id="btn_h4" data-bs-dismiss="modal" type="button">12:00 - 13:00</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <b>Horas Tarde</b>
                        <br>
                        <div class="d-grid gap-2">
                            <button class="btn btn-success" id="btn_h5" data-bs-dismiss="modal" type="button">14:00 - 15:00</button>
                            <button class="btn btn-success" id="btn_h6" data-bs-dismiss="modal" type="button">15:00 - 16:00</button>
                            <button class="btn btn-success" id="btn_h7" data-bs-dismiss="modal" type="button">16:00 - 17:00</button>
                            <button class="btn btn-success" id="btn_h8" data-bs-dismiss="modal" type="button">17:00 - 18:00</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-primary">Cancelar</a>
            </div>
        </div>
    </div>
</div>



<!-- Modal 2  -->
<div class="modal fade" id="modal_formulario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agendar cita para el dia <span id="dia_semana"></span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="<?php echo $URL; ?>/app/controllers/reservas/controller_reservas.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Nombre Usuario</label>
                                <input type="text" class="form-control" value="<?php echo $nombre_completo ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="text" class="form-control" value="<?php echo $email_sesion ?>" disabled>
                                <input type="text" name="id_usuario" value="<?php echo $id_usuario_sesion ?>" hidden>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Fecha de reserva</label>
                                <input type="text" class="form-control" id="fecha_reserva" disabled>
                                <input type="text" name="fecha_cita" class="form-control" id="fecha_reserva2" hidden>
                            </div>
                            <div class="col-md-6">
                                <label for="">Hora de reserva</label>
                                <input type="text" class="form-control" id="hora_reserva" disabled>
                                <input type="text" name="hora_cita" class="form-control" id="hora_reserva2" hidden>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Nombre de la mascota</label>
                                <input type="text" class="form-control" name="nombre_mascota">
                            </div>
                            <div class="col-md-6">
                                <label for="">Tipo de servicio</label>
                                <select name="tipo_servicio" id="" class="form-control">
                                    <option value="Consulta veterinaria">Consulta veterinaria</option>
                                    <option value="Lavado e higiene">Lavado e higiene</option>
                                    <option value="Esterilización">Esterilización</option>
                                </select>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#btn_h1').click(function() {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(a);
        $('#fecha_reserva2').val(a);
        var h1 = "09:00 - 10:00";
        $('#hora_reserva').val(h1)
        $('#hora_reserva2').val(h1)
    });

    $('#btn_h2').click(function() {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(a);
        $('#fecha_reserva2').val(a);
        var h2 = "10:00 - 11:00";
        $('#hora_reserva').val(h2)
        $('#hora_reserva2').val(h2)
    });

    $('#btn_h3').click(function() {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(a);
        $('#fecha_reserva2').val(a);
        var h3 = "11:00 - 12:00";
        $('#hora_reserva').val(h3)
        $('#hora_reserva2').val(h3)
    });

    $('#btn_h4').click(function() {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(a);
        $('#fecha_reserva2').val(a);
        var h4 = "12:00 - 13:00";
        $('#hora_reserva').val(h4)
        $('#hora_reserva2').val(h4)
    });

    $('#btn_h5').click(function() {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(a);
        $('#fecha_reserva2').val(a);
        var h5 = "14:00 - 15:00";
        $('#hora_reserva').val(h5)
        $('#hora_reserva2').val(h5)
    });

    $('#btn_h6').click(function() {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(a);
        $('#fecha_reserva2').val(a);
        var h6 = "15:00 - 16:00";
        $('#hora_reserva').val(h6)
        $('#hora_reserva2').val(h6)
    });

    $('#btn_h7').click(function() {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(a);
        $('#fecha_reserva2').val(a);
        var h7 = "16:00 - 17:00";
        $('#hora_reserva').val(h7)
        $('#hora_reserva2').val(h7)
    });
    $('#btn_h8').click(function() {
        $('#modal_formulario').modal("show");
        $('#fecha_reserva').val(a);
        $('#fecha_reserva2').val(a);
        var h8 = "17:00 - 18:00";
        $('#hora_reserva').val(h8)
        $('#hora_reserva2').val(h8)
    });
</script>

<?php


if (isset($_SESSION['mensaje']) && isset($_SESSION['icono'])) {
    $mensaje = $_SESSION['mensaje'];
    $icono = $_SESSION['icono'];
    // Destruye las variables de sesión para que la alerta no se muestre nuevamente al refrescar la página
    unset($_SESSION['mensaje']);
    unset($_SESSION['icono']);
?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: '<?php echo $icono; ?>',
            title: '<?php echo $mensaje; ?>',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
<?php
}
?>

<?php include('../Veterinaria/admin/layout/footer-principal.php');
include('../Veterinaria/admin/layout/mensaje.php');
?>





</body>

</html>