<?php
	//require_once('conexion_BD.php');
	//$conexion =  new conexion();

	$conexion = mysqli_connect("127.0.0.1", "root", "", "escuela") or die(mysqli_error());
	$respuesta = array();

	$sql = "SELECT * FROM alumnos";
	$consulta = mysqli_query($conexion, $sql);

	if (mysqli_num_rows($consulta) > 0) {
		$respuesta['alumnos'] = array();

		while ($fila = mysqli_fetch_assoc($consulta)) {

			$alumno = array();

			$alumno["nc"] = $fila['Num_Control'];
			$alumno["n"] = $fila['Nombre_Alumno'];
			$alumno["pa"] = $fila['Primer_Ap'];
			$alumno["sa"] = $fila['Segundo_Ap'];
			$alumno["e"] = $fila['Edad_Alumno'];
			$alumno["s"] = $fila['Semestre_Alumno'];
			$alumno["c"] = $fila['Carrera_Alumno'];

			array_push($respuesta["alumnos"], $alumno);
		}

		$respuesta['exito'] = 1;
		echo json_encode($respuesta);

	} else {
		$respuesta['exito'] = 0;
		$respuesta['msj'] = "No hay Registros";
		echo json_encode($respuesta);
	}
?>