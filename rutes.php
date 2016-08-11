<?php 
	require_once ('index.php');
	require_once ($_SERVER['DOCUMENT_ROOT']."/".$nombreProyecto."/configuracion.php");
	require_once(CON.'Conexion.php');
	require_once (CONTROLLER.'HomeController.php');

	

	session_start();

/*--------------------------------Obtener datos desde variables GET o POST-----------------------------------*/
	//Definir Variables
	$numero = 0;
	$tags;
	$valores;

	//Obtener datos desde variables GET o POST
	if (isset($_GET['controller'])) {
		$numero = count($_GET);
		$tags = array_keys($_GET);
		$valores = array_values($_GET);

		for($i=0;$i<$numero;$i++){
			$$tags[$i]=$valores[$i];
		}
	}

	if (isset($_POST['controller'])) {
		$numero = count($_POST);
		$tags = array_keys($_POST);
		$valores = array_values($_POST);

		for($i=0;$i<$numero;$i++){
			$$tags[$i]=$valores[$i];
		}
	}
/*-----------------------------------------------------------------------------------------------------------*/


/*--------------------------------------------Enrutamiento---------------------------------------------------*/
	if ($numero <= 0) {
		if(isset($_SESSION['email'])){
			header('location: rutes.php?controller=admin&method=home');
		}else{
			include 'view/fixed/login.php';
		}

	}
	else{

		switch ($controller) {
				
			case 'home':
				if($method == 'view'){

				}
				break;

			case 'test':
				break;

			default:
				include 'view/fixed/login.php';
				break;
		}
		
	}
	
?>