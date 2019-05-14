<html>

<head>
	<?php include('view/src/modules/head.php'); ?>
</head>

<body>

	<header>
		<?php include('view/src/modules/navbar.php'); ?>
		<div class="container-fluid signupdiv" style="padding-top: 10vh;">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<form role="form" name="registro" action="model/signupModel.php" method="post">
						<div class="form-group">
							<label for="username">Nombre de usuario</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
						</div>
						<div class="form-group">
							<label for="fullname">Nombre Completo</label>
							<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nombre Completo">
						</div>

						<div class="form-group">
							<label for="provincia">Provincia</label>

							<select class="form-control" id="provincia" name="provincia" placeholder="Provincia">
								<option value="01">Azuay</option>
								<option value="02">Bolivar</option>
								<option value="03">Cañar</option>
								<option value="04">Carchi</option>
								<option value="05">Cotopaxi</option>
								<option value="06">Chimborazo</option>
								<option value="07">El Oro</option>
								<option value="08">Esmeraldas</option>
								<option value="09">Guayas</option>
								<option value="10">Imbabura</option>
								<option value="11">Loja</option>
								<option value="12">Los Rios</option>
								<option value="13">Manabi</option>
								<option value="14">Morona Santiago</option>
								<option value="15">Napo</option>
								<option value="16">Pastaza</option>
								<option value="17">Pichincha</option>
								<option value="18">Tungurahua</option>
								<option value="19">Zamora Chinchipe</option>
								<option value="20">Galapagos</option>
								<option value="21">Sucumbios</option>
								<option value="22">Orellana</option>
								<option value="23">Santo Domingo de los Tsachilas</option>
								<option value="24">Santa Elena</option>

							</select>


						</div>



						<div class="form-group">
							<label for="telefono">Telefono</label>
							<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono"
								pattern="[0-9]{11}" required>
						</div>

						<div class="form-group">
							<label for="genero">Genero</label>

							<select class="form-control" id="genero" name="genero" placeholder="Genero">
								<option value="Masculino">Masculino</option>
								<option value="Femenino">Femenino</option>
								<option value="Otro">Otro</option>


							</select>


						</div>

						<div class="form-group">
							<label for="ocupacion">Ocupacion</label>
							<input type="ocupacion" class="form-control" id="ocupacion" name="ocupacion" placeholder="Ocupacion"
								required>
						</div>


						<div class="form-group">
							<label for="estadocivil">Estado Civil</label>

							<select class="form-control" id="estadocivil" name="estadocivil" placeholder="Estado Civil">
								<option value="Soltero">Soltero(a)</option>
								<option value="Casado">Casado(a)</option>
								<option value="Divorciado">Divorciado(a)</option>
								<option value="Viudo">Viudo(a)</option>


							</select>


						</div>





						<div class="form-group">
							<label for="email">Correo Electronico</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico" required
								pattern="[a-zA-Z0-9]+([_][a-zA-Z0-9]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
						</div>
						<div class="form-group">
							<label for="password">Contrase&ntilde;a</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a"
								required pattern="[a-zA-Z0-9]+([_][a-zA-Z0-9]+)*">
						</div>
						<div class="form-group">
							<label for="confirm_password">Confirmar Contrase&ntilde;a</label>
							<input type="password" class="form-control" id="confirm_password" name="confirm_password"
								placeholder="Confirmar Contrase&ntilde;a" required>
						</div>





						<button type="submit" class="btn btn-light btn-purple px-5 py-2 primary-btn text-white curvy-button" style="widht: 100%;">Registrar</button>

					</form>
				</div>
			</div>
		</div>

		<script src="js/valida_registro.js"></script>





		</div>
		</div>
	</header>


</body>

</html>