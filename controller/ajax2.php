<?php 

// Instancia o objeto PDO
require_once ('../model/config.class.php');

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
// define para que o PDO lance exceções caso ocorra erros
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$email = $_POST["id"];
if ($email <> ''):
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false):
        $consulta = $pdo->query("SELECT * FROM cliente WHERE email = '$email'");
        if ($consulta->fetch()):
            echo "<label class='text-danger'>Já existe uma conta cadastrada com este email - $email !</label>";
        else:
            echo "<label class='text-success'>Email válido!</label>";
        endif;
    else:
        echo("<label class='text-danger'>O email -$email- não é válido! Favor, corrigir!</label>");
    endif;
else:
    echo("<label class='text-danger'>Favor, insira um Email!</label>");
endif;
