<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="" type="text/css" media="all" />
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" 	type="text/css" media="all">
	<style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #ecf0f1; /* Celeste claro */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        h2 {
            color: rgb(141, 177, 216); /* celeste*/
        }

        .regisFrm {
            margin-top: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #bdc3c7; /* Gris claro */
            border-radius: 4px;
        }

        .send-button {
            margin-top: 20px;
        }

		
		.send-button input[type="submit"]:hover {
    	background-color: rgba(154, 187, 224, 0.936);
}

        input[type="submit"] {
            background-color: rgb(141, 177, 216); /* celeste*/
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1></h1>
	<div class="container">
		<h2 align="center">Registrarse</h2>
		<?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
		<div class="regisFrm">
			<form action="userAccount.php" method="post">
				<input type="text" name="first_name" placeholder="Nombre" required="">
				<input type="text" name="last_name" placeholder="Apellido" required="">
				<input type="email" name="email" placeholder="Correo Electrónico" required="">
				<input type="text" name="phone" placeholder="Número Telefónico" required="">
				<input type="password" name="password" placeholder="Contraseña" required="">
				<input type="password" name="confirm_password" placeholder="Confirma tu Contraseña" required="">
				<div class="send-button">
					<input type="submit" name="signupSubmit" value="Crear Cuenta">
				</div>
			</form>
		</div>
	</div>
</body>
</html>