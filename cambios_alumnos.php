<?php 
	$conexion = mysqli_connect("127.0.0.1", "root", "", "escuela") or die(mysqli_error());
	$respuesta = array();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$cadena_jdon = file_get_contents('php://input'); //Reecibe informacion por HTTP
		$datos = json_decode($cadena_jdon, true);

		$nc = $datos['num_control'];
		$n = $datos['nombre'];
		$pa = $datos['primer_ap'];
		$sa = $datos['segundo_ap'];
		$e = $datos['edad'];
		$s = $datos['semestre'];
		$c = $datos['carrera'];

		$sql = "UPDATE alumnos SET Nombre_Alumno='$n', Primer_Ap='$pa', Segundo_Ap='$sa', Edad_Alumno=$e, Semestre_Alumno=$s, Carrera_Alumno='$c' WHERE Num_Control='$nc'";
		$resultado =  mysqli_query($conexion, $sql);

		if ($resultado) {
			$respuesta['exito'] = 1;
			$respuesta['msj'] = 'exito';
			echo json_encode($respuesta);
		} else {
			$respuesta['exito'] = 0;
			$respuesta['msj'] = 'error';
			echo json_encode($respuesta);
		}
	}
?>