<?php
	//variables de conexión a la BD
	$host = 'localhost';
	$usuario = 'root';
	$password = 'root';
	$dbname = 'pdo';

	// Configuración del DSN: Data Source Name... cadena de conexion
	$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

	// Creamos una instancia de PDO. DBH significa Database Handle
	$dbh = new PDO($dsn, $usuario, $password);
	$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

	
	// usar instancia de PDO para un select * from
	$sql = 'SELECT * FROM usuarios';
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$usuarios = $stmt->fetchAll();

	echo 'Todos los usuarios<br><br>';	
	foreach($usuarios as $usuario){
		echo $usuario->nombre.'<br>';
   }
   echo '<br><br>';	

	// usar instancia de PDO para un select * from con where
	 $rol = 'capitan';
	 $sql = 'SELECT * FROM usuarios WHERE rol = :rol';
	 $stmt = $dbh->prepare($sql);
	 $stmt->execute(['rol' => $rol]);
	 $usuarios = $stmt->fetchAll();

	 echo 'Usuarios rol capitan <br><br>';	
	 foreach($usuarios as $usuario){
	 	echo $usuario->nombre.'<br>';
	}

	// inserción basica a la tabla de Usuarios.
	$nombre = 'Monkey D. Luffy';
	$email = 'gomugomu@gmail.com';
	$rol = 'capitan';

	$sql = 'INSERT INTO usuarios(nombre, email, rol) VALUES(:nombre, :email, :rol)';
	$stmt = $dbh->prepare($sql);
	$stmt->execute(['nombre'=> $nombre, 'email' => $email, 'rol' => $rol]);
	echo '<br>Al recargar: usuario agregado.';

	$dbh = null;