<?php
error_reporting(E_ALL ^ E_STRICT);

define('BASEPATH', '/localhost/');

include_once BASEPATH.'Connection.php';
set_include_path(BASEPATH);

// creates new connection
$con = new Connection();

header("location: courses.php");
?>