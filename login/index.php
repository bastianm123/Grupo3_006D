<?php include ('../app/config.php'); ?>

<?php include ('../admin/layout/header-principal.php'); ?>

<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Iniciar Sesion</h2>
            <ul>
                <li>
                    <a href="<?php echo $URL; ?>">
                        Home
                    </a>
                </li>
                <li>Inicia Sesion</li>

            </ul>
        </div>
    </div>
</div>

<section class="user-area-all-style log-in-area ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="contact-form-action">
							<div class="form-heading text-center">
								<h3 class="form-title">Iniciar Sesion!</h3>
							</div>
							<form action="<?php echo $URL  ?>/app/controllers/login/controller_login.php" method="post">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<input class="form-control" type="email" name="email" placeholder="Email">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input class="form-control" type="password" name="password" placeholder="Contraseña">
										</div>
									</div>
									<div class="col-lg-12 col-sm-12">
										<a class="forget" href="recover-password.html">Olvidaste tu contrasena?</a>
									</div>
									<div class="col-12">
										<button class="default-btn btn-two" type="submit">
											Entrar
											<i class="flaticon-right"></i>
										</button>
									</div>
									<div class="col-12">
										<p class="account-desc">
											No tienes una cuenta?
											<a href="<?php echo $URL ?>/login/registro.php">Registrarse</a>
										</p>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>




</body>

</html>