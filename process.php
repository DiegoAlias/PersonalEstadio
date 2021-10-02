<?php
require_once('config.php');
?>
<?php

if (isset($_POST)) {

	$nombre 					= $_POST['nombre'];
	$apellido 				= $_POST['apellido'];
	$dni 					= $_POST['dni'];
	$dia_nac			= $_POST['dia_nac'];
	$mes_nac 				= sha1($_POST['mes_nac']);
	$año_nac 				= $_POST['año_nac'];
	$titulo_profesional 		= $_POST['titulo_profesional'];
	$expedido 					= $_POST['expedido'];
	$estado_civil			= $_POST['estado_civil'];
	$padre_nombre 				= sha1($_POST['padre_nombre']);
	$padre_apellido 		= $_POST['padre_apellido'];
	$padre_nacionalidad 		= $_POST['padre_nacionalidad'];
	$padre_fechaDeNacimiento 			= $_POST['padre_fechaDeNacimiento'];
	$padre_dni					= $_POST['padre_dni'];
	$madre_nombre 				= sha1($_POST['madre_nombre']);
	$madre_apellido 				= $_POST['madre_apellido'];
	$madre_nacionalidad 			= $_POST['madre_nacionalidad'];
	$madre_fechaDeNacimiento 			= $_POST['madre_fechaDeNacimiento'];
	$madre_dni						= $_POST['madre_dni'];

	$sql_insert_personal = "INSERT INTO personal_estadio (nombre, apellido, dni, dia_nac, mes_nac, año_nac, titulo_profesional, expedido, estado_civil, padre_nombre, padre_apellido, padre_nacionalidad,
	padre_fechaDeNacimiento, padre_dni, madre_nombre, madre_apellido, madre_nacionalidad, madre_fechaDeNacimiento, madre_dni  ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";

	$stmtinsert = $db->prepare($sql_insert_personal);

	$result = $stmtinsert->execute([
		$nombre, $apellido, $dni, $dia_nac, $mes_nac, $año_nac, $titulo_profesional, $expedido, $estado_civil, $padre_nombre, $padre_apellido, $padre_nacionalidad,
		$padre_fechaDeNacimiento, $padre_dni, $madre_nombre, $madre_apellido, $madre_nacionalidad, $madre_fechaDeNacimiento, $madre_dni
	]);
	if ($result) {
		echo 'Successfully saved.';
	} else {
		echo 'There were erros while saving the data.';
	}
} else {
	echo 'No data';
}
