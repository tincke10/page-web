<?php
$conexion=pg_connect("host=190.123.94.162 user=postgres password=postgres dbname=sistema port=5432")
or die("Could not connect to server;n".pg_last_error());

pg_set_client_encoding($conexion, "UTF8");

// Comprueba si se han enviado los datos del formulario
if (isset($_POST['username']) && isset($_POST['password'])) {
  // Verifica que se hayan ingresado ambos campos
  if(empty($_POST['username']) || empty($_POST['password'])){
      echo "Debe ingresar su D.N.I y su Contraseña";
      exit;
  }
  // Recupera los datos del formulario
  $username = $_POST['username'];
  $password = $_POST['password'];

    // Consulta a la base de datos para comprobar si existe un usuario con ese nombre 
    $query = "SELECT * FROM public.usuariosapp WHERE nombusua = $1";
    $result = pg_prepare($conexion, "", $query);
    $result = pg_execute($conexion, "", array($username));
    // Comprueba si se ha encontrado un usuario con ese nombre
    if (pg_num_rows($result) > 0) {
    	$row = pg_fetch_assoc($result);
    	// Codifica la contraseña en base64
      $string_base64 = base64_encode(".1271.");
      $password_codificado = base64_encode($password);
      $password_codificado1 = $string_base64.$password_codificado;
      echo $password_codificado;
        if($row['contraseña'] === $password_codificado){
            // El usuario y la contraseña son correctos, inicia sesión y redirige al usuario a la página principal
            session_start();
            $_SESSION['logged_in'] = true;
            header('Location: https://ostamma.org.ar/ingreso.php');
            exit;
        }else{
            echo "La contraseña es incorrecta";
        }
    } else {
        echo "El usuario no existe";
    }
}
?>

<!-- HTML login form -->
                <form method="post" action="sesion.blade.php">
                    <label for="username">DNI:</label><br>
                    <input type="text" name="username" id="username"><br>
                    <label for="password">Contraseña:</label><br>
                    <input type="password" name="password" id="password"><br><br>
                    <input type="submit" value="Log In">
                </form>

