<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

session_start();

if (isset($_SESSION["acceso"]) && $_SESSION["acceso"] === true) {
    header("location: administrar_viajes.php");
    exit;
}

include "../clases/conexionBd.php";

$login_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $sql = "SELECT id, username, password FROM users WHERE username = :username";

    if ($stmt = $connBd->prepare($sql)) {
        $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
        $param_username = $username;

        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $id = $row["id"];
                    $username_bd = $row["username"];
                    $password_bd = $row["password"];

                    if ($password === $password_bd) {
                        $_SESSION["acceso"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username_bd;

                        header("location: administrar_viajes.php");
                        exit;
                    } else {
                        $login_err = "Usuario o contraseña incorrectos.";
                    }
                }
            } else {
                $login_error = "Usuario o contraseña incorrectos.";
            }
        } else {
            echo "Algo salió mal. Inténtalo más tarde.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar Sesión</title>
        <link rel="stylesheet" href="../assets/estilosPag.css?v=<?php echo time(); ?>">
    </head>
    <body class="body-login">

        <div class="login-container">
            <h2>Login Admin</h2>
            <p>Introduce tus credenciales para acceder.</p>

            <?php if (!empty($login_error)): ?>
                <div class="alerta-error"><?php echo $login_error; ?></div>
            <?php endif; ?>

            <form action="" method="post">

                <div class="texto-caja">
                    <label>Usuario</label>
                    <input type="text" name="username" class="form-clave" required>
                </div>    

                <div class="texto-caja">
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-clave" required>
                </div>

                <div class="texto-caja">
                    <input type="submit" class="btn-login" value="Entrar">
                </div>

                <div>
                    <a href="../public/index.php">← Volver a la web</a>
                </div>

            </form>
        </div>

    </body>
</html>