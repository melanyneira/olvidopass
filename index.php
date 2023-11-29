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
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="" type="text/css" media="all" />
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" 	type="text/css" media="all">
	<style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f0f0;
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
            color: rgb(141, 177, 216); /* Código de color lila */
        }

        .regisFrm {
            margin-top: 20px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .send-button {
            margin-top: 20px;
        }

		.send-button input[type="submit"]:hover {
    	background-color: rgba(154, 187, 224, 0.936);
}

        input[type="submit"] {
            background-color: rgb(141, 177, 216);
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        a {
            color: rgb(141, 177, 216);
            text-decoration: none;
        }

        .BotonInicio{
            height: 35px; 
            background-color:#a5c3e4; 
            padding-top: 8.5px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            width: 100px; 
            font-family: 'Bebas Neue'; 
            color: white; 
            color: #ecf0f1;
            font-size: 17px;
            background-color: #8DB1D8;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0px 6px 0px #8DB1D8;
            transition: all .1s;

        }
 
    </style>
	
</head>
<body>
    <h1></h1>
	<div class="container">
        <?php
			if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
				include 'user.php';
				$user = new User();
				$conditions['where'] = array(
					'id' => $sessData['userID'],
				);
				$conditions['return_type'] = 'single';
				$userData = $user->getRows($conditions);
		?>
        <h2>Bienvenid@ <?php echo $userData['first_name']; ?>!</h2>
        <a href="userAccount.php?logoutSubmit=1" class="logout">Cerrar Sesión</a>
		<div class="regisFrm">
			<p><b>Nombre: </b><?php echo $userData['first_name'].' '.$userData['last_name']; ?></p>
            <p><b>Correo: </b><?php echo $userData['email']; ?></p>
            <p><b>Teléfono: </b><?php echo $userData['phone']; ?></p>
            <a href="../index.html">
            <button class= BotonInicio href> Ir al Inicio </button>
            </a>
            
		</div>
        <?php }else{ ?>
		<h2></h2></a>
		<h2 align="center">Iniciar Sesión</h2>
        <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
		<div class="regisFrm">
			<form action="userAccount.php" method="post">
				<input type="email" name="email" placeholder="Correo Electrónico" required="">
				<input type="password" name="password" placeholder="Contraseña" required="">
				<div class="send-button">
					<input type="submit" name="loginSubmit" value="Ingresar">
				</div>
				<br><br><a href="forgotPassword.php">¿Olvidaste tu Contraseña?</a>
			</form>
            <p>¿No tienes cuenta aún? <a href="registration.php">Regístrate acá</a></p>
            
		</div>
        <?php } ?>
	</div>
</body>
</html>


