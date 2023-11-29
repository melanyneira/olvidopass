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
    <title></title>
    <link rel="stylesheet" href="" type="text/css" media="all" />
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" 	type="text/css" media="all">
	<style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #ecf0f1; /* Celeste claro */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        a {
            text-decoration: none;
        }

        h1 {
            color: rgb(141, 177, 216); /* Lila */
            margin-bottom: 30px;
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
            color: rgb(141, 177, 216); /* Lila */
        }

        .regisFrm {
            margin-top: 20px;
        }

        input[type="email"] {
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
            background-color: rgb(141, 177, 216); /* Lila */
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
    <a href="index.php"><h1>Cambio de Contraseña</h1></a>
	<div class="container">
		<h2>Ingresa tu Dirección de Correo Electrónico para Resetear tu Contraseña</h2>
        <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
		<div class="regisFrm">
			<form action="userAccount.php" method="post">
				<input type="email" name="email" placeholder="Correo" required="">
				<div class="send-button">
					<input type="submit" name="forgotSubmit" value="Continuar">
				</div>
			</form>
		</div>
	</div>
</body>
</html>