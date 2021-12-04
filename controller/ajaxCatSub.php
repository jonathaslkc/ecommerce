<?php 

    ////Conecta ao Banco
    //$conexao = mysql_connect("localhost", "root", "")
    //or die ('Não foi possivel conectar ao banco porque; ' . mysql_error());
    //$db = mysql_select_db("db_radiologiahoje") or die ("Banco de Dados Inexistente");
    //$id = $_POST["rel_tags_post"];
    //$sql = "SELECT * FROM tags WHERE rel_tags_post = '$id'";
    //$totalBusca = mysql_query($sql);
    
    //foreach ($totalBusca as $key => $value):
		//return "<option value='".$value->nome."'>".$value->nome."</option>\n";
	//endforeach;
    
// Instancia o objeto PDO
require_once ('../model/config.class.php');

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
// define para que o PDO lance exceções caso ocorra erros
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$idcategoria = $_POST["id"];

$consulta = $pdo->query("SELECT * FROM sub_categoria WHERE categoria_id = '$idcategoria'");

while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    // aqui eu mostro os valores de minha consulta
    echo "<option value='{$linha['subcategoria_id']}'>".$linha['nome']."</option>";
}
