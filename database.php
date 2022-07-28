<?php

session_start();

/**
 * Variables de loggeo
 * Reemplazar por acceso a tu base de datos
 */
$host = 'localhost';
$userDB = 'root';
$passwordDB = '';
$nameDB = 'crud-task';

$connectionDB = mysqli_connect($host, $userDB, $passwordDB, $nameDB);

/**
 * Descomentar estas lineas si desea ver los errores de conexion
 */
/* if (!$connectionDB)
{
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
} */

/**
 * Creación de la base de datos y tabla
 */

/* $sql = array();

$sql[] = "CREATE DATABASE IF NOT EXISTS `crud-task` COLLATE utf8mb4_general_ci";

$sql[] = "CREATE TABLE IF NOT EXISTS `crud-task`.`task`(
    `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

foreach($sql as $query)
{
  if($connectionDB->query($query) == false) {
    return false;
  }
} */

/* mysqli_close($connectionDB); */

?>