<?php
// access-action.php
// este archivo sirve para procesar las opciones de login y logout

if (isset($_GET["o"]) && $_GET["o"] == "login") {

	if (!isset($_SESSION["user_id"])) {

		$user = $_POST['username'];
		$pass = sha1(md5($_POST['password']));

		$base = new Database();
		$con = $base->connect();
		$sql = "select * from user where email= \"" . $user . "\" and password= \"" . $pass . "\" and status=1";
		//print $sql;
		$query = $con->query($sql);

		$found = false;
		$userid = null;
		while ($r = $query->fetch_array()) {
			$found = true;
			$userid = $r['id'];
		}

		if ($found == true) {
			$_SESSION['user_id'] = $userid;
			print "Cargando ... $user";
			Core::redir("./");
		} else {
			Core::redir("./?view=login");
		}
	} else {
		Core::redir("./");
	}
}

if (isset($_GET["o"]) && $_GET["o"] == "logout") {
	unset($_SESSION);
	session_destroy();
	Core::redir("./");
}

if (isset($_GET["o"]) && $_GET["o"] == "change") {

	if ($_POST["password"] == $_POST["cpassword"]) {

		$user = new UserData();
		$user->email = $_POST['email'];
		$user->password = sha1(md5($_POST["password"]));
		$user->update_passwdByEmail();

		Core::alert('Se ha actualizado el password');
		print "<script>window.location='index.php?view=recpass';</script>";
	} else {

		Core::alert("Las contraseñas deben coincidir");
		print "<script>window.location='index.php?view=recpass';</script>";
	}
}

if (isset($_GET["o"]) && $_GET["o"] == "sendrec") {
	
	$ux = UserData::getByEmail($_POST["email"]);
	if ($ux !== NULL) {
		$asunto = "Cambio de contraseña";

		$email = "noreply@psicologostemuco.com";
		$emailEmpresa = $_POST['email'];

		$header = 'MIME-Version: 1.0';
		$header .= 'From:' . $email . "\r\n" .
			/* 'Reply-To: webmaster@example.com' . "\r\n" . */
			'X-Mailer: PHP/' . phpversion() . "\r\n";
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";



		$msg = '
				<html>
				<head>
				  <title>Recupere su contraseña</title>
				</head>
				<body>
					<div>
						<p>	Para verificar que la cuenta coresponde a este correo, usted recibe este mensaje. 
								Presione el siguiente boton que lo enviara al modulo de CAMBIO DE CONTRASEÑA: </p>
						</br>
						</br>
						</br>
						<a href="http://foro.psicologostemuco.com/?view=recpass" style="font-size: x-large;" >Cambiar PASS</a>
					</div>
				</body>
				</div>
				</html>
				';


		$sw = true;
		if (filter_var($emailEmpresa, FILTER_VALIDATE_EMAIL)) {
			$sw = true;
		} else {
			$sw = false;
		}
		/* $header = "Mail del contacto: .$email. " ."\r\n";
				$header = "Reply-To: noreply@example.com" ."\r\n";
				$header = "X-Mailer: PHP/". phpversion(); */


		if ($sw == false) {
			echo "<div class='alert alert-danger' role='alert'>
					Debe ingresar un email válido!
				  </div>";
		} else {
			$mail = mail($emailEmpresa, $asunto, $msg, $header);
			if ($mail) {
				echo "<div class='alert alert-info' role='alert'>
						  Solicitud enviada correctamente!
					</div>";
			}
		}
	} else {

		echo "	<div class='alert alert-danger' role='alert'>
					El email ingresado no esta REGISTRADO!
				</div>	";

		Core::redir("./?view=recsend");

	}
}
