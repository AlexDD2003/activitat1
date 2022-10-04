<?php
require 'src/db.php';
//agafar $_REQUEST['email], i ['password]
//comprova si existeixen a la base de dades
// tenim dos possibilitats
//1. Existeix -> dashboard i obrim sessió usari
//2. No existeix -> o retornem a home o ens qudm al formulari

$db=connectMysql($dsn,$dbuser,$dbpass);

if(!empty($_POST['email']) && !empty($_POST['password'])){
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_REQUEST['email'];
        $password=$_REQUEST['password'];
        if (auth($db, $email, $password)){
            //desem sessió
            //redirigir a dashboard
        }
    }
}